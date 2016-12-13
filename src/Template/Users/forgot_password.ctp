<div class="row">

  <div class="col-xs-6 offset-xs-3">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title"><?= __('Forgot Password?') ?></h4>
            <p class="card-text text-muted">
                Please enter your email and submit. We will send a code in your email. Please use that code to activate
                and reset your password. <br>
                <?php echo $this->Html->link(__('I have a Code. Activate my account'),
                [
                    'controller' => 'users',
                    'action' => 'activation'
                ]
            );
            ?>
            </p>
                <?= $this->Form->create() ?>
                <?= $this->Form->input('email', ['label' => 'Your Email']); ?>
                <?= $this->Form->submit('Submit',array('class'=>'btn btn-success')); ?>
                <?= $this->Form->end(); ?>
        </div>
    </div>
  </div>

</div>
