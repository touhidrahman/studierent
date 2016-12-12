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
<!-- author: Aleksandr     -->
                <h3><?= __('Users') ?></h3>
                <div class="list-group">
      
    
<?php //foreach ($users as $usersAll): //TODO: pagination   ?>
  <div class="list-group-item "> <!--  Display user image, view link, and name          -->
<?php /*
    $this->Html->image("/img/boy.jpg", 
    [
    'class'  => "img-thumbnail", 
    'height' => "100px",
    'width'  => "100px", 
    "alt"    => "user photo",
    'url'    => ['controller' => 'Users', 'action' => 'view', $user->id]
    ]
                      );
    echo $user->id.'. '.h($user->first_name).' '.h($user->last_name); 
    */
?>
<!--   Block button
    <span class="pull-right">
        <button class="btn btn-primary" type="submit">Block</button>
    </span>
    </div>
-->
    
<?php 
//  endforeach; 
?>  
                </div><!--  list-group-->
            </div>
        </div>
    </div>
</div>
<!-- end results! -->
