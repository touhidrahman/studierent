<div class="row">
    <!-- explore bar -->
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="card">
            <img class="card-img img-fluid" src="/studierent/img/property.jpg" alt="Card image cap">
              <div class="card-img-overlay">
                <h4 class="card-title" style="color:#fff">My Dashboard</h4>
                <p class="card-text"></p>
                <p class="card-text"><small class="text-muted"></small></p>
              </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $this->Html->link('Add a Property Ad', '/properties/add', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('My Properties', '/properties/myproperties', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('My Favorites', '/properties/favorites/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('My Profile', '/users/view/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('Logout', '/users/logout', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
            </ul>
        </div>
    </div>
    <!-- end sidebar -->

    <!-- properties -->
        <div class="col-md-9 col-sm-8 col-xs-12">

            <h1 class="display-4">My Properties</h1>
            <?php foreach ($properties as $property){ ?>
            <!-- Single Property Ad Card -->
            <div class="card">
                <div class="card-block" style="padding-bottom: 0rem">
                    <h4 class="card-title"><?= $property['title'] ?></h4>
                    <h6 class="card-subtitle text-muted"><?= $property['address'] . ' | ' . $property['zip_id'] ?></h6>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-3">
                            <?= $this->Html->image('property.jpg', ['alt' => 'Property image', 'class' => 'rounded-left img-fluid']); ?>
                        </div>
                        <div class="col-sm-6">
                            <p class="card-text text-justify"><?= $property['description'] ?></p>

                            <?= $this->Html->link('View Details', '/properties/view/'.$property['id'], ['class' => 'card-link']) ?>
                            <?= $this->Html->link('Edit', '/properties/edit/'.$property['id'], ['class' => 'card-link text-info']) ?>
                        </div>
                        <div class="col-sm-3">
                            <p class="text-xs-center text-muted" style="margin-bottom:0">EUR</p>
                            <h4 class="display-4 text-xs-center text-warning font-weight-bold"><?= $property['rent'] ?></h4>
                            <table class="table table-sm table-fluid text-xs-center text-muted">
                                <tr style="font-size:.8rem"><td>Room:</td><td><?= $property['room_size'] ?> M<sup>2</sup></td><td>Total:</td><td><?= $property['total_size'] ?> M<sup>2</sup></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Property Ad Card end -->
            <?php } ?>
    </div>


</div>
