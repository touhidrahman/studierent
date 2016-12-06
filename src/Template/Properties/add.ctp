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
                      echo $this->Form->input('house_no', ['label' => 'House Number']);
                      echo $this->Form->input('address');
					  echo $this->Form->input('zip_id');
                      echo $this->Form->input('zip', ['type' => 'text', 'label' => 'Zip Code', 'id' => 'zip']);
                      ?>
                  </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                  <div class="card-block">
                      <h4 class="card-title">Details</h4>
                      <?php
                      echo $this->Form->input('room_size', ['min' => 0]);
                      echo $this->Form->input('total_size', ['min' => 0]);
                      echo $this->Form->input('available_from');
                      echo $this->Form->input('available_until');
                      <?php $options = array('Select'=>'Select','M'=>'Male','F'=>'Female','B'=>'Both'); ?>
                      echo $this->Form->input('looking_for', ['type' => 'select', 'options' => ['Any Gender' => 'Any Gender', 'Male' => 'Male', 'Female' => 'Female']]);
                      echo $this->Form->input('rent', ['min' => 0, 'label' => 'Rent (Monthly)']);
                      echo $this->Form->input('deposit', ['min' => 0, 'label' => 'Initial Deposit (One Time)']);
                      echo $this->Form->input('utility_cost', ['min' => 0, 'label' => 'Utilities Cost (Monthly)']);
                      ?>
                  </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                  <div class="card-block">
                      <h4 class="card-title">Amenities</h4>
                      <?php
                      echo $this->Form->input('electricity_bill_included', ['label' => 'Electricity Bill Included in Rent']);
                      echo $this->Form->input('dist_from_uni');
                      echo $this->Form->input('time_dist_from_uni', ['type' => 'number', 'min' => 0, 'max' => 100, 'step' => '5', 'label' => 'Walking Distance From the University (Minutes)', 'placeholder' => '10']);
                      echo $this->Form->input('direct_bus_to_uni', ['label' => 'Direct Bus Route to University']);
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
                      ?>
                  </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                  <div class="card-block">
                      <h4 class="card-title">Owner's Contact Information</h4>
                      <?php
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
