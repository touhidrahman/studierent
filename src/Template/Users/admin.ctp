<div class="row">
    <!-- Filter Sidebar -->
    <div class="col-md-3 col-sm-4 col-xs-12  card bg-faded">
        <ul class="easy-tree">
            <li><b>Properties</b>
                <ul>
                    <li><a href="#"><i>Recent(3-static)</i></a></li>

<?php   /** @author: Ramanpreet Kaur
        */
                foreach($results as $r){
                    echo 
                    '<li><a href="#">'.$r['type']."(".$r['counts'].")".'</a></li>';
                }   
?>
                </ul>
            </li>
                    
            <li><b>Users</b>
                <ul>
<?php   /** @author: Ramanpreet Kaur
        */
                foreach($users as $u){
                    echo 
                    '<li><a href="#">' . $u['status'] . '(' .$u['counts'] . ')' .'</a></li>';
                }
?>                           
                </ul>
            </li>
                    
            <li><b>Reviews</b>
                <ul>
                    <li><a href="#">Landlord(7)</a></li>
                </ul>
            </li>
                    
            <li><b>My Account</b>
                <ul>
                    <li><a href="admin">Dashboard</a></li>
                        <li><a href="dashboard">My Profile</a></li>
                        <li><a href="login">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- end sidebar -->

    <!-- Results -->
    <div class="col-md-9 col-sm-8 col-xs-12">
        <h1 class="display-4">Welcome Admin!</h1>
        <div class="card card-block">
            <h4 class="card-title">Search For Users</h4>
                <form method="POST" class="form-inline">
                    <div class="form-group">
                        <label for="uid"><b>&nbsp; - by user id:</b></label>
                        <input name="id" id="uid" class="form-control" type="number" min="1"
                        value = "5"
                        placeholder="Enter User Id" required="required">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
                <br>
                
                <form method="POST" class="form-inline">
                    <div class="form-group">
                        <label for="uname"><b>&nbsp; - or by user name:</b></label>
                        <input name="username" id="uname" class="form-control" type="email" 
                        value = "angeline.glover@stehr.org"
                        placeholder="Enter User Name" required="required">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
                <br>
<?php   /**
        * Display search results. 
        * Precondition: if a result set $usersFound is set() in the UsersController, it is not empty
        * @author: Aleksandr Anfilov
        */
            if (isset($usersFound)) {?>
                <h3><?= __('Users') ?>:</h3>
                
            <?php   foreach ($usersFound as $u): ?>
                    <div class="list-group-item ">
                <?php
                        echo 'id: ' .   $u->id
                        . ' || '  .   h($u->first_name) . ' ' . h($u->last_name)
                        . ' || email: ' . h($u->username);
                ?>
                        <span class="pull-right">      
                <?php   switch ($u->status) {
                        case '0':       // landlord is blocked
                            echo $this->Form->postLink( __('Unblock'), 
                            ['action' => 'adminUserStatus', $u->id, 1],
                            ['confirm' => __('Unblock the Landlord # {0}?', $u->id)] ); 
                        break;
                        
                        case '1':       // landlord is active
                            echo $this->Form->postLink( __('Block'), 
                            ['action' => 'adminUserStatus', $u->id, 0],
                            ['confirm' => __('Are you sure you want to block the Landlord # {0}?', $u->id)] ); 
                        break;
                        }
                            
                ?>
                        </span>
                        </div><!--  list-group-item-->

            <?php   endforeach; 
            }//endif
            ?>
                </div><!--  list-group-->
            </div><!-- card card-block-->
    </div><!-- end results -->
</div><!-- end row -->