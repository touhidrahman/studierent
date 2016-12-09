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

                                                
				                 <?= $this->Form->input('user_id'); ?>
                                                <input type="hidden" name="user_id" value="$username" />



				                <?= $this->Form->input('property_id'); ?>



								<?= $this->Form->input('email'); ?>

									<?php  $options = array('Rented a property from him/her'=>'Rented a property from him/her','Contacted but not rented'=>'Contacted but not rented','Personal relation'=>'Personal relation','Dont know at all'=>'Dont know at all'); ?>
									<?= $this->Form->input('landlordlink', array('type'=>'select', 'label'=>'How do you know this Person?', 'options'=>$options)) ?>

				              <?= $this->Form->input('message'); ?>
								</div></div>






                       <div class="form-group row">
                    <div class="col-md-5 col-sm-3"></div>
					<div class="col-md-3 col-sm-9 ">
					<?= $this->Form->submit('Submit',array('class'=>'btn btn-primary btn-block')); ?>
                    <?= $this->Form->end(); ?>
                    </div>
                </div>
            </form> <!-- /form -->
        </div>
