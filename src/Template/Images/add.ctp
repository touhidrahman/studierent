<div class="images form large-9 medium-8 columns content">
   
    <fieldset>
        <legend><?= __('Thank you for adding a property! Add images to attract customers! ') ?></legend>
      
            <?php echo $this->Form->create($image, ['type' => 'file']); ?>
            <?php echo $this->Form->input('upload',['label'=>'Upload Images','type' => 'file', 'class' => 'form-control']); ?>
            <?php echo $this->Form->button(__('Submit'), ['type'=>'submit','class' => 'btn btn-success']); ?>
            <?php echo $this->Form->end(); ?>
      
    </fieldset>
 
</div>