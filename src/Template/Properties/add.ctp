<div class="row">
    <?= $this->element('userSidebar', [], ['cache' => true]) ?>

    <!-- Add Property -->
    <div class="col-md-9 col-sm-8 col-xs-12">

        <h1 class="display-4">Add a Property Ad</h1>

        <?= $this->Form->create($property, ['horizontal' => false]) ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-block">
                      <h4 class="card-title">Type & Title</h4>
                        <?php  $options = array('Select property type'=>'Select property type','Flat'=>'Flat','Flatshare'=>'Flatshare','Student Residence'=>'Student Residence','House'=>'House'); ?>
									<?= $this->Form->input('type', array('type'=>'select', 'options'=>$options)) ?>
                      <?php echo $this->Form->input('title');?>
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
                      <h4 class="card-title">Details about the property</h4>
                      <?php
                      echo $this->Form->input('room_size');
                      echo $this->Form->input('total_size');
                      echo $this->Form->input('available_from');
                      echo $this->Form->input('available_until');?>
                      <?php  $options = array('Select'=>'Select','M'=>'Male','F'=>'Female','B'=>'Both'); ?>
									<?= $this->Form->input('looking_for', array('type'=>'select', 'options'=>$options)) ?>
                      <?php echo $this->Form->input('rent');
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
                      echo $this->Form->input('dist_from_uni');
                      echo $this->Form->input('time_dist_from_uni');
					   echo $this->Form->input('electricity_bill_included');
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
