<!-- Results -->
<div class="col-md-9 col-sm-8 col-xs-12">
    <h1 class="display-4">Welcome Admin!</h1>
    <div class="card">

        <div class="card-block" style="padding-bottom: 0rem">
            <h4 class="card-title">Search For Users</h4>
<!--        </div>-->
<!--        <div class="card-block">-->
            <div class="row">
                <label for="uid"><b>&nbsp;&nbsp; - by user id:</b></label>
                <form method="POST" class="form-inline">
                    <input name="id" id="uid" class="form-control" type="number" min="1"
                    placeholder="Enter User Id">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <br>
                <label for="uname"><b>&nbsp;&nbsp; - or by user name:</b></label>
                <form method="POST" class="form-inline">
                    <input name="username" id="uname" class="form-control" type="email"
                    placeholder="Enter User Name">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                <br>
                <br>
<!-- author: Aleksandr Anfilov    -->
<?php   if (isset($usersFound)) { //true: search form has been submitted  ?>

            <h3><?= __('Users') ?>:</h3>
            <div class="list-group">

    <?php
            if  ( empty($usersFound)) {
                echo "Nobody has been found with ";
            }   else {
                foreach ($usersFound as $u):  ?>
                <div class="list-group-item "> <!--  Display user image, view link, and name          -->
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
                        <button class="btn btn-primary" type="submit">Block</button>
                    </span>
                </div>

        <?php   endforeach;
                }
        } ?>
                </div><!--  list-group-item-->
            </div><!--  list-group-->
        </div>
    </div>
</div>
<!-- end results! -->
