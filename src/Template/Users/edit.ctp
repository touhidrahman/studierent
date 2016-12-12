<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        
       	<div class="col-md-2 col-sm-12 col-xs-12"></div>
<div class="col-md-8 col-sm-8 col-xs-12" style="padding-top:20px;">
			
			<?= $this->Form->create($user); ?>
			
                <h2 style="text-align:center; margin-left:12%;">Edit Profile!</h2>
                <div class="form-group row" style="padding-top:20px;">
                    
					<label for="firstName" class="col-xs-2 col-form-label">First Name</label>
					<div class="col-xs-10">                    
				
					<?= $this->Form->input('first_name', array('label'=>false,'placeholder'=>"First Name")); ?>
			    </div> 
                    
                </div>
				<div class="form-group row" >
                    <label for="lastName" class="col-xs-2 col-form-label">Last Name</label>
                    <div class="col-xs-10">
                
					<?= $this->Form->input('last_name', array('label'=>false,'placeholder'=>"Last Name")); ?>
		                
                    </div>
                </div>
				
				<div class="form-group row">
                    <label for="address" class="col-xs-2 col-form-label">Address</label>
                    <div class="col-xs-10">
                    <?= $this->Form->input('address', array('label'=>false,'placeholder'=>"Address")); ?>
		             </div>
                </div>
				
				<div class="form-group row">
                    <label for="mobileNo" class="col-xs-2 col-form-label">Contact No</label>
                    <div class="col-xs-10">
                        <?= $this->Form->input('contact_number', array('label'=>false,'placeholder'=>"Contact Number",'type'=>'tel')); ?>
		            </div>
                </div>
				
                <div class="form-group row">
                    <label for="email" class="col-xs-2 col-form-label">Email</label>
                    <div class="col-xs-10">
                    
					<?= $this->Form->input('username', array('label'=>false,'placeholder'=>"abc@xyz.com",'type'=>'email')); ?>
		            
					</div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-xs-2 col-form-label">Password</label>
                    <div class="col-xs-10">
						<?= $this->Form->input('password', array('label'=>false,'placeholder'=>"Password",'type'=>'password','id'=>'pass1')); ?>
				   </div>
                </div>
				<div class="form-group row">
                    <label for="confirmPassword" class="col-xs-2 col-form-label" style="padding-top:0px;">Confirm Password</label>
                    <div class="col-xs-10">
                        <input type="password" placeholder="Confirm Password" class="form-control" id="pass2" onkeyup="myFunction();">
                    </div><span id="confirmMessage" class="confirmMessage"></span>
                </div>
                 
                <div class="form-group row" >
                     <div class="col-xs-2"></div>
					
					<div class="col-xs-10">
                   
						<div class="row">
    <?php    
       $options=array('M'=>'Male', 'F'=>'Female');
       echo $this->Form->radio('gender',$options,array('class'=>'radioForm'));?>
    </div>
	
	

						
						</div>
                            
                        </div>
						
	       <?php echo $this->Form->input('photo',['type' => 'file']); ?>
           
                    </div>
    </fieldset>
	 <div class="form-group row">
                    <div class="col-md-5 col-sm-3"></div>
					<div class="col-md-3 col-sm-9 ">
					<?= $this->Form->button(__('Submit')) ?>
					<?= $this->Form->end() ?>  
                    </div>
                </div>
    
</div>
