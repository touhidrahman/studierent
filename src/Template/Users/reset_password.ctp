<div class="row">

  <div class="col-xs-6 offset-xs-3">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title"><?= __('Enter New Password') ?></h4>
            </p>
                <?= $this->Form->create() ?>
                <?= $this->Form->input('password', ['label' => 'New Password']); ?>
                <?= $this->Form->input('confirmPassword', ['label' => 'Confirm Password', 'type' => 'password']); ?>
                <?= $this->Form->submit('Submit',array('class'=>'btn btn-success')); ?>
                <?= $this->Form->end(); ?>
        </div>
    </div>
  </div>

</div>
