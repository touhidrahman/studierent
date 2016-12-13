<div class="row">

  <div class="col-xs-6 offset-xs-3">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title"><?= __('Activation') ?></h4>
            <p class="card-text text-muted">
                Please enter your code you have received from us through email. You will be able to change the password. <br>
                <?php echo $this->Html->link(__('I do not have a Code!'),
                [
                    'controller' => 'users',
                    'action' => 'forgotPassword'
                ]
            );
            ?>
            </p>
                <?= $this->Form->create() ?>
                <?= $this->Form->input('reset_key', ['label' => 'Code']); ?>
                <?= $this->Form->submit('Submit',array('class'=>'btn btn-success')); ?>
                <?= $this->Form->end(); ?>
        </div>
    </div>
  </div>

</div>
