<div class="row">
<!-- Filter Sidebar -->
<div class="col-md-3 col-sm-4 col-xs-12">
    <div class="card bg-faded">
        <div class="card-block">
            <p class="card-text">
            <form>
            <div class="easy-tree">
                <ul>
                    <li><b>Properties</b>
                        <ul>
                            <li><a href="#">Recent(3)</a></li>
                            <li><a href="#">Flats(7)</a></li>
                            <li><a href="#">Flatshare(8)</a></li>
                            <li><a href="#">Houses(9)</a></li>
                            <li><a href="#">Student Residence(15)</a></li>
                        </ul>
                    </li>
                    <li><b>Users</b>
                        <ul>
                            <li><a href="#">Landlord(10)</a></li>
                            <li><a href="#">Tenants(10)</a></li>
                            <li><a href="#">Blocked(3)</a></li>
                        </ul>
                    </li>
                    
                    <li><b>Reviews</b>
                        <ul>
                            <li><a href="#">Landlord(7)</a></li>
                        </ul>
                    </li>
                    
                    <li><b>My Account</b>
                        <ul>
                            <li><a href="admin.html">Dashboard</a></li>
                            <li><a href="user-profile.html">My Profile</a></li>
                            <li><a href="index.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </form>
            </p>
            </div>
        </div>
    </div>
</div>
<!-- end sidebar -->
<!-- Results -->
<div class="col-md-9 col-sm-8 col-xs-12">
    <h1 class="display-4">Welcome Admin!</h1>
    <div class="card">
       
        <div class="card-block" style="padding-bottom: 0rem">
            <h4 class="card-title">Search For Users</h4>
        </div>
        <div class="card-block">
            <div class="row">
                <label for="uid"><b>&nbsp;&nbsp;Search by User-Id:</b></label>
                <form class="form-inline float-lg-center">
                    <input class="form-control" type="text" placeholder="Enter User Id">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <br>
                <label for="uid"><b>&nbsp;&nbsp;Search by User-Name:</b></label>
                <form class="form-inline float-lg-center">
                    <input class="form-control" type="text" placeholder="Enter User Name">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <br>
                <br>
                <h3><?= __('Users') ?></h3>
                <div class="list-group">
<!-- Here is where we iterate through our $users query object, printing out users info.
    TODO: pagination     -->
<?php foreach ($users as $user): ?>
    <div class="list-group-item ">                   
<?= $this->Html->image("/img/boy.jpg", 
    [
    'class'  => "img-thumbnail", 
    'height' => "100px",
    'width'  => "100px", 
    "alt"    => "user photo",
    'url'    => ['controller' => 'Users', 'action' => 'view', $user->id]
    ]
                      );
    echo $user->id.'. '.h($user->first_name).' '.h($user->last_name); 
?>
    
    <span class="pull-right">
        <button class="btn btn-primary" type="submit">Block</button>
    </span>
    </div>
<?php endforeach; ?>  
                </div><!--  list-group-->
            </div>
        </div>
    </div>
</div>
<!-- end results! -->
</div>