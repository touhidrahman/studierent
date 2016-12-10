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
                        value = "9"
                        placeholder="Enter User Id" required="required">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
                <br>
                
                <form method="POST" class="form-inline">
                    <div class="form-group">
                        <label for="uname"><b>&nbsp; - or by user name:</b></label>
                        <input name="username" id="uname" class="form-control" type="email" 
                        value = "shany.ernser@yahoo.com"
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
                <div class="list-group">
            
            <?php   
                foreach ($usersFound as $u):  ?>
                    <div class="list-group-item"> <!--  Display user image, view link, and name          -->
                <?php
                    $imgPath = "/img/boy.jpg";
                    echo $this->Html->image( $imgPath, 
                    [
                    'class'  => "img-thumbnail", 
                    'height' => "100px",
                    'width'  => "100px", 
                    "alt"    => "user photo"
                    ]);
                    echo h($u->first_name).' '.h($u->last_name); 
                ?>
                    <span class="pull-right">
                        <button class="btn btn-danger" type="submit">Block</button>
                    </span>
                    </div><!--  list-group-item-->
    
            <?php   endforeach; 
            }   
            ?>
                </div><!--  list-group-->
            </div><!-- card card-block-->
    </div><!-- end results -->
</div><!-- end row -->