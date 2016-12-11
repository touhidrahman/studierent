<div class="card">
  <div class="card-block">
    <h4 class="card-title"><?= __('Enter the Zipcode where your property is located') ?></h4>
    <p class="card-text">
		We make finding properties convenient to the users by
		strictly following appropriate zipcode and/or street name.
		In order to make your property ad appear in search, please ensure
		you are entering the correct zipcode.
	</p>
	<div class="col-xs-4" style="padding-left:0rem;">
		<?= $this->Form->create(NULL) ?>
		<?= $this->Form->input('Zip.number'); ?>
		<?= $this->Form->submit('Next',array('class'=>'btn btn-success')); ?>
		<?= $this->Form->end() ?>
	</div>
  </div>
</div>
