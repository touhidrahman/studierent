<div class="container-fluid">   
    <fieldset>
        <legend><?= __('Thank you for adding a property! Add images to attract customers! ') ?></legend>      
            <?php echo $this->Form->create($image, ['type' => 'file']); ?>
            <?php echo $this->Form->input('upload',['label'=>'Upload Images','type' => 'file', 'class' => 'form-control']); ?>                    
            <br/>
            <div class="btn-group" role="group">
            <input class="btn btn-success" type="submit" value="Submit">
            <input class="btn btn-success" type="reset" value="Cancel">
            <?php echo $this->Html->link('My Property', '/properties/myproperties/', ['class' => 'btn btn-success']) ?> 
            <?php echo $this->Html->link('Edit Images', '/images/index/'.$id, ['class' => 'btn btn-success']) ?>                         
            <?php echo $this->Form->end(); ?>
            </div>
    </fieldset>
 
</div>
