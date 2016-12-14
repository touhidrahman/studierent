<div class="row">

  <div class="col-xs-6 offset-xs-3">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title"><?= __('Upload Photo') ?></h4>
        </p><?= __('Thank you for adding a property! Add images to attract customers! ') ?></p>
            <?php echo $this->Form->create($image, ['type' => 'file']); ?>
            <?php echo $this->Form->input('upload',['label'=>' ','type' => 'file', 'class' => 'form-control']); ?>
            <br/>
            <input class="btn btn-success" type="submit" value="Upload Photo">
            <?php echo $this->Html->link('View My Property Ad', '/properties/view/'.$id, ['class' => 'btn btn-warning']) ?>
            <?php echo $this->Html->link('Manage Images', '/images/index/'.$id, ['class' => 'btn btn-info']) ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
  </div>

</div>
