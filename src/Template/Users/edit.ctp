<div class="users form large-9 medium-8 columns content">


    <?= $this->Form->create($user) ?>
    <fieldset>

       	<div class="col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-md-8 col-sm-8 col-xs-12" style="padding-top:20px;">

			<?= $this->Form->create($user,['type' => 'file']); ?>



                <h2 style="text-align:center; margin-left:12%;">Edit Profile!</h2>
                <div class="form-group row" style="padding-top:20px;">

					<label for="firstName" class="col-xs-3 col-form-label">First Name</label>
					<div class="col-xs-9">

					<?= $this->Form->input('first_name', array('label'=>false,'placeholder'=>"First Name")); ?>
			    </div>

                </div>
				<div class="form-group row" >
                    <label for="lastName" class="col-xs-3 col-form-label">Last Name</label>
                    <div class="col-xs-9">

					<?= $this->Form->input('last_name', array('label'=>false,'placeholder'=>"Last Name")); ?>

                    </div>
                </div>

				<div class="form-group row">
                    <label for="address" class="col-xs-3 col-form-label">Address</label>
                    <div class="col-xs-9">
                    <?= $this->Form->input('address', array('label'=>false,'placeholder'=>"Address")); ?>
		             </div>
                </div>

				<div class="form-group row">
                    <label for="mobileNo" class="col-xs-3 col-form-label">Contact No</label>
                    <div class="col-xs-9">
                        <?= $this->Form->input('contact_number', array('label'=>false,'placeholder'=>"Contact Number",'type'=>'tel')); ?>
		            </div>
                </div>


                <div class="form-group row">
                    <label for="password" class="col-xs-3 col-form-label">Password</label>
                    <div class="col-xs-9">
						<?= $this->Form->input('password', array('label'=>false,'placeholder'=>"Password",'type'=>'password','id'=>'pass1','value'=>'')); ?>
				   </div>
                </div>
				<div class="form-group row">
                    <label for="confirmPassword" class="col-xs-3 col-form-label" style="padding-top:0px;">Confirm Password</label>
                    <div class="col-xs-9">
                        <input type="password" placeholder="Confirm Password" class="form-control" id="pass2" onkeyup="myFunction();">
                    </div><span id="confirmMessage" class="confirmMessage"></span>
                </div>

                   </fieldset>
	 <div class="form-group row">
                    <div class="col-md-5 col-sm-3"></div>
					<div class="col-md-3 col-sm-9 ">
					<?php echo $this->Form->button(__('Submit'), ['type'=>'submit','class' => 'btn btn-success']); ?>
					<?= $this->Form->end() ?>
                    </div>

                </div>

</div>


<script>
/**
 * Password mismatch indicator
 * @author Ramanpreet Kaur
 */
 function myFunction() {
     //Store the password field objects into variables ...
 var pass1 = document.getElementById('pass1');
 var pass2 = document.getElementById('pass2');
 //Store the Confimation Message Object ...
 var message = document.getElementById('confirmMessage');
 //Set the colors we will be using ...
 var goodColor = "#66cc66";
 var badColor = "#ff6666";
 //Compare the values in the password field
 //and the confirmation field
 if(pass1.value == pass2.value){
     //The passwords match.
     //Set the color to the good color and inform
     //the user that they have entered the correct password
     pass2.style.borderColor = goodColor;
     message.style.color = goodColor;
     message.innerHTML = "Passwords Match!"
 }else{
     //The passwords do not match.
     //Set the color to the bad color and
     //notify the user.
     pass2.style.borderColor = badColor;
     message.style.color = badColor;
     message.innerHTML = "Passwords Do Not Match!"
 }
 }
 </script>
