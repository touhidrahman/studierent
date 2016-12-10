<!-- BEGINING OF REPORT FORM -->
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
					<p class="text-muted">You are reporting against the following ad:
						<?php echo $this->Html->link(__($property['title']),
						        [
						            'controller' => 'properties',
						            'action' => 'view', $property['id']
						        ]
						    );
						?>
					We appreciate your concern. Please let us know in details. Your feedback will attribute to reputation of the
					landlord.
					</p>

					<?= $this->Form->input('email', ['label' => 'Your Email']); ?>

					<?php  $options = array('Rented a property from him/her'=>'Rented a property from him/her','Contacted but not rented'=>'Contacted but not rented','Personal relation'=>'Personal relation','Dont know at all'=>'Dont know at all'); ?>
					<?= $this->Form->input('landlordlink', array('type'=>'select', 'label'=>'How do you know this Person?', 'options'=>$options)) ?>

					<?= $this->Form->input('message'); ?>
				</div>
			</div>



			<div class="form-group row">
				<div class="col-md-5 col-sm-3"></div>
				<div class="col-md-3 col-sm-9 ">
					<?= $this->Form->submit('Submit',array('class'=>'btn btn-success')); ?>
					<?= $this->Html->link('Cancel', [
				            'controller' => 'properties',
				            'action' => 'search'
				        ], array('class'=>'btn btn-default')); ?>
					<?= $this->Form->end(); ?>
				</div>
			</div>
		</form> <!-- /form -->
	</div>
