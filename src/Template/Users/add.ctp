<!-- PHP code
 @author Mythri Manjunath
-->

<div class="col-xs-6 offset-xs-3">
    <div class="card">
        <div class="card-block">
        <h4 class="card-title"><?= __('Upload Profile Photo') ?></h4>
    </p><?= __('Uploading a new photo will replace the earlier profile photo.') ?></p>
        <?php echo $this->Form->create($user, ['type' => 'file']); ?>
        <?php echo $this->Form->input('upload',['label'=>' ','type' => 'file', 'class' => 'form-control']); ?>
        <br/>
        <input class="btn btn-success" type="submit" value="Upload Photo">
        <?php echo $this->Html->link('My Profile', '/users/view/'.$id, ['class' => 'btn btn-success']) ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
</div>
