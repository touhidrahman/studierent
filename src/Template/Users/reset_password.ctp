<div class="row">

  <div class="col-xs-6 offset-xs-3">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title"><?= __('Enter New Password') ?></h4>
            </p>
                <?= $this->Form->create() ?>
                <?= $this->Form->input('password', ['label' => 'New Password','id'=>'pass1']); ?>
                <?= $this->Form->input('confirmPassword', ['label' => 'Confirm Password', 'type' => 'password','id'=>'pass2','onkeyup' => 'myFunction();' ]); ?>
                <span id="confirmMessage" class="confirmMessage"></span>
                <?= $this->Form->submit('Submit',array('class'=>'btn btn-success')); ?>
                <?= $this->Form->end(); ?>
        </div>
    </div>
  </div>

</div>
<script>

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