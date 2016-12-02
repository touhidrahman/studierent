<nav class="large-3 medium-4 columns" id="actions-sidebar">
    
</nav>
<!-- BEGINING OF REPORT MODULE -->
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<h2><?= __('Report Content to Studierent Staff') ?></h2>
					
				</div>


				<div id="div-forms">

					<!-- Begining of Report Form -->
					
					<?= $this->Form->create($report) ?>
					
					
					<form id="report-form">
						<div class="modal-body">
                          <label for="userName"><b>Enter your Name:</b></label>
					                             
				                <?= $this->Form->input('user_name', array('label'=>false,'placeholder'=>"Enter your name")); ?>
			               
							
							<label for="propertyName"><b>Enter Name of the Property:</b></label>
					                           
				               <?= $this->Form->input('property_name', array('label'=>false,'placeholder'=>"Property Name")); ?>
			                
						<label for="landlordName"><b>Enter Name of the Landlord:</b></label>
					                           
				               <?= $this->Form->input('landlord_name', array('label'=>false,'placeholder'=>"landlord Name")); ?>
			               
							
							<label for="landlordlink"><b>How do you know this landlord?</b></label><br>
 				            				    
					            
                                <?php    
                                 $options=array('Rented a property from him/her'=>'Rented a property from him/her','Contacted, but not rented'=>'Contacted, but not rented','Personal relation'=>'Personal relation','Dont know at all'=>'Dont know at all');
                                 echo $this->Form->radio('landlord_link',$options,array('class'=>'radioForm'));?>		<br>				 
			                 
							<label for="email"><b>Enter Email:</b></label>
					                             
				               <?= $this->Form->input('email', array('label'=>false,'placeholder'=>"Enter Email")); ?>
			                 
							<label for="message"><b>Enter your message:</b></label>
					                            
				               <?= $this->Form->input('message', array('label'=>false,'placeholder'=>"Enter Message")); ?>
			                <div class="form-group row">
                    <div class="col-md-5 col-sm-3"></div>
					<div class="col-md-3 col-sm-9 ">
					<?= $this->Form->submit('Submit',array('class'=>'btn btn-primary btn-block', 'legend'=>false,'fieldset'=>false)); ?>
                    <?= $this->Form->end(); ?>  
                    </div>
                </div>
            </form> <!-- /form -->
        </div>
								
							
														
 							
						</div>
						
					</form>
  </div>
