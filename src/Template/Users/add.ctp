<div class="images form large-9 medium-8 columns content">
   
    <fieldset>
        <legend><?= __('Add Photo! ') ?></legend>
      
            <?php echo $this->Form->create($user, ['type' => 'file']); ?>
            <?php echo $this->Form->input('photo',['label'=>'Upload Photo','type' => 'file', 'class' => 'form-control']); ?>
            <?php echo $this->Form->button(__('Submit'), ['type'=>'submit','class' => 'btn btn-success']); ?>
            <?php echo $this->Form->end(); ?>
      
    </fieldset>
 
</div>