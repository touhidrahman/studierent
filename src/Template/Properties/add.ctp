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
                <li class="list-group-item"><?= $this->Html->link('My Properties', '/properties', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('My Favorites', '/favorites/list/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('My Profile', '/users/view/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('Logout', '/users/logout', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
            </ul>
        </div>
    </div>
    <!-- end sidebar -->

    <!-- Add Property -->
    <div class="col-md-9 col-sm-8 col-xs-12">

        <h1 class="display-4">Add a Property Ad</h1>

        <?= $this->Form->create($property, ['horizontal' => false]) ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-block">
                      <h4 class="card-title">Type & Title</h4>
                      <?php
                      echo $this->Form->input('type');
                      echo $this->Form->input('title');
                      ?>
                  </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                  <div class="card-block">
                      <h4 class="card-title">Address</h4>
                      <?php
                      echo $this->Form->input('address');
                      echo $this->Form->input('zip_id');
                      ?>
                  </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                  <div class="card-block">
                      <h4 class="card-title">Details</h4>
                      <?php
                      echo $this->Form->input('room_size');
                      echo $this->Form->input('total_size');
                      echo $this->Form->input('available_from');
                      echo $this->Form->input('available_until');
                      echo $this->Form->input('looking_for');
                      echo $this->Form->input('rent');
                      echo $this->Form->input('deposit');
                      echo $this->Form->input('utility_cost');
                      ?>
                  </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                  <div class="card-block">
                      <h4 class="card-title">Amenities</h4>
                      <?php
                      echo $this->Form->input('electricity_bill_included');
                      echo $this->Form->input('dist_from_uni');
                      echo $this->Form->input('time_dist_from_uni');
                      echo $this->Form->input('direct_bus_to_uni');
                      echo $this->Form->input('internet');
                      echo $this->Form->input('heating');
                      echo $this->Form->input('cable_tv');
                      echo $this->Form->input('washing_machine');
                      echo $this->Form->input('parking');
                      echo $this->Form->input('bike_parking');
                      echo $this->Form->input('smoking');
                      echo $this->Form->input('pets');
                      echo $this->Form->input('handicap');
                      echo $this->Form->input('fire_alarm');
                      echo $this->Form->input('garden');
                      echo $this->Form->input('balcony');
                      ?>
                  </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                  <div class="card-block">
                      <h4 class="card-title">Details</h4>
                      <?php
                      echo $this->Form->input('description');
                      echo $this->Form->input('transportation');
                      echo $this->Form->input('house_rules');
                      echo $this->Form->input('contact_number');
                      echo $this->Form->input('email');
                      ?>
                  </div>
                </div>
            </div>

        </div>

        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end(); ?>

    </div>
