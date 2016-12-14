<div class="images form large-9 medium-8 columns content">
   
    <fieldset>
        <legend><?= __('You can upload a profile photo here! ') ?></legend>
      
            <?php echo $this->Form->create($user, ['type' => 'file']); ?>
            <?php echo $this->Form->input('photo',['label'=>'Upload Photo','type' => 'file', 'class' => 'form-control']); ?>
            <br/>
            <div class="btn-group" role="group">    
            <input class="btn btn-success" type="submit" value="Submit">
            <input class="btn btn-success" type="reset" value="Cancel">
            <?php echo $this->Html->link('My Profile', '/users/view/'.$id, ['class' => 'btn btn-success']) ?> 
            <?php echo $this->Form->end(); ?>
            </div>
    </fieldset>
 
</div>