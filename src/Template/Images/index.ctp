<h1>Properties</h1>
<p><?= $this->Html->link('Add Images', ['action' => 'add']) ?></p>
<table>
<tr>
<th>Id</th>
<th>Title</th>
<th>Actions</th>
</tr>
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
<?= $this->Html->link('Edit', ['action' => 'edit', $image->id])?>
</td>
</tr>
<?php endforeach; ?>
</table>