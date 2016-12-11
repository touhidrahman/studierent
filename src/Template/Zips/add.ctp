<div class="card">
  <div class="card-block">
    <h4 class="card-title"><?= __('Add Zipcode') ?></h4>
    <p class="card-text">
		We are sorry that your zipcode is not yet in our database. Please fill out this short form to add your Zip.
	</p>
	<div class="col-xs-4" style="padding-left:0rem;">
        <?php
            echo $this->Form->create($zip);
            echo $this->Form->input('number', ['type' => 'text']);
            echo $this->Form->input('city');
            echo $this->Form->input('province');
            echo $this->Form->input('country');
        ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
        <?= $this->Form->end() ?>
	</div>
  </div>
</div>
