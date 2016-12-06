<div class="images form large-9 medium-8 columns content">
   
    <fieldset>
        <legend><?= __('Please add images to attract tenants') ?></legend>
      
            <?php echo $this->Form->create($image, ['type' => 'file']); ?>
            <?php echo $this->Form->input('upload', ['type' => 'file', 'class' => 'form-control']); ?>
            <?php echo $this->Form->button(__('Submit'), ['type'=>'submit','class' => 'btn btn-success']); ?>
             
            <?php echo $this->Form->end(); ?>
      
    </fieldset>
 
</div>