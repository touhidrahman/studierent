<!-- Results -->
<div class="col-md-9 col-sm-8 col-xs-12">
    <h1 class="display-4">Welcome Admin!</h1>
    <div class="card card-block">
        <h4 class="card-title">Search For Users</h4>
<!-- @author: Aleksandr Anfilov -->
            <form method="POST" class="form-inline">
                <div class="form-group row">
                  <div class="col-xs-4">
                    <label for="uid"><b>&nbsp; - by user id:</b></label>
                  </div>
                  <div class="col-xs-4">
                      <input name="id" id="uid" class="form-control" type="number" min="1" placeholder="enter user ID" required="required">
                  </div>
                  <div class="col-xs-4"><button class="btn btn-primary" type="submit">Search</button></div>
                </div>
            </form>
            <hr>

            <form method="POST" class="form-inline">
                <div class="form-group">
                    <label for="e-mail"><b>&nbsp; - or by email:</b></label>
                    <input name="email" id="e-mail" class="form-control" type="email" placeholder="enter email" required="required">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            <hr>

            <form method="POST" class="form-inline">
                <div class="form-group">
                    <label for="fname"><b>&nbsp; - or by name:</b></label>
                    <input name="name" id="fname" class="form-control" type="text" placeholder="Name or partial name" required="required">

                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            <hr>
<?php
/**
* Display search results.
* Precondition: if a result set $usersFound is set() in the UsersController, it is not empty
* @author: Aleksandr Anfilov
* Started:  10.12.2016
* Last updated:  13.12.2016
*/
    if (isset($usersFound)) {
        //pr ($usersFound);
    ?>
        <h4><?= __('Users') ?>:</h4>
        <div class="">
            <table class="table table-fluid table-striped table-sm">
              <thead class="thead-inverse"><tr>

                <th>id</th>
                <th>First Name</th>

                <th>Last Name</th>
                <th>Email</th>

                <th>Role</th>
                <th>Action</th>
              </tr></thead>
            <tbody>

    <?php   foreach ($usersFound as $u): ?>
<!--            <div class="list-group-item ">-->
                <tr>

                    <th scope="row"> <?= $u['id'];  ?> </th>
                    <td> <?= h( $u['first_name'] ); ?> </td>

                    <td> <?= h( $u['last_name'] );  ?> </td>
                    <td> <?= h( $u['username'] );   ?> </td>

                    <td> <?= $u['type']; ?> </td>
                    <td>    <?php
                switch ( $u['status'] ) {
                case '0':       // User account is blocked
                    echo $this->Form->postLink( __('Unblock'),
                    ['action' => 'changeUserStatus', $u['id'], 1],
                    ['confirm' => __('Unblock the user # {0}?', $u['id']    )
                    ]);
                break;

                case '1':       // User account is active
                    echo $this->Form->postLink( __('Block'),
                    ['action' => 'changeUserStatus', $u['id'], 0],
                    ['confirm' => __('Are you sure you want to block the user # {0}?', $u['id'] )
                    ]);
                break;
                }//end switch
                            ?> | 
                    <?php echo $this->Html->link(__('View User'),
                            [
                                'controller' => 'users',
                                'action' => 'view',
                                $u['id']
                            ]
                        );
                        ?>
                        </td>
                </tr>
    <?php   endforeach; ?>

               </tbody>
            </table>
        </div> <!--table-responsive-->
    <?php   }//endif
?>

        </div><!--  list-group-->
    </div><!-- card card-block-->
</div><!-- end results -->
