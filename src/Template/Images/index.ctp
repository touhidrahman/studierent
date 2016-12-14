<h1 class="display-4">My Property Images</h1>
<br>    
<!-- Here's where we loop through our $images query object, printing out images  -->
<?php foreach ($images as $image): ?>
  <?php 
                     $path ='properties/';                     
                     $filename= $image->path;
                     $imgID=$image->id;
                     $userimage=$path.$filename;
?>
<div class="card-group">
<div class="card">  
<?= $this->Html->image($userimage, array('alt' => 'CakePHP','class' => 'img-fluid rounded', 'style' => 'width:10%','height:5%'))?>
<div class="card-block">                        
<div class="btn-group" role="group">
<label class="btn btn-secondary">
<?= $this->Html->link('View', ['action' => 'view',$image->id]) ?>  
</label>
<label class="btn btn-secondary">
<?= $this->Form->postLink('Delete',['action' => 'delete', $image->id],['confirm' => 'Are you sure?'])?>
</label>
<label class="btn btn-secondary">
<?= $this->Html->link('My Properties', ['controller' => 'properties','action' => 'myproperties']) ?>  
</label>                  
</div>                
</div>
</div>
</div>	
<?php endforeach; ?>


