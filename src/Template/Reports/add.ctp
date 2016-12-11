<!-- BEGINING OF REPORT FORM -->
<div class="card">
  <div class="card-block">
    <h4 class="card-title"><?= __('Report Content to Studierent Staff') ?></h4>
    <p class="card-text text-muted">
		You are reporting against the following ad:
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
	<div class="col-xs-8" style="padding-left:0rem;">
		<?= $this->Form->create($report) ?>
		<?= $this->Form->input('email', ['label' => 'Your Email']); ?>

		<?php  $options = array('Rented a property from him/her'=>'Rented a property from him/her','Contacted but not rented'=>'Contacted but not rented','Personal relation'=>'Personal relation','Dont know at all'=>'Dont know at all'); ?>
		<?= $this->Form->input('landlordlink', array('type'=>'select', 'label'=>'How do you know this Person?', 'options'=>$options)) ?>

		<?= $this->Form->input('message'); ?>
		<?= $this->Form->submit('Report',array('class'=>'btn btn-success')); ?>
		<?= $this->Form->end(); ?>
	</div>
  </div>
</div>
