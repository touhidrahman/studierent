<h1 class="display-4">Property Images</h1>
<br>
<table class="table table-sm table-bordered">
    <thead class="thead-default">
<tr>
<th>Id</th>
<th>View</th>
<th>Delete</th>
</tr>
    </thead>
<!-- Here's where we loop through our $images query object, printing out images  -->
<?php foreach ($images as $image): ?>
<tr>
<td><?= $image->id ?></td>
<td>
<?= $this->Html->link($image->path, ['action' => 'view',$image->id]) ?>
</td>

<td>
<?= $this->Form->postLink(
'Delete',
['action' => 'delete', $image->id],
['confirm' => 'Are you sure?'])
?>

</td>
</tr>
<?php endforeach; ?>
</table>