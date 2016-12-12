<!-- Results -->
<div class="col-md-9 col-sm-8 col-xs-12">
     <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->username) ?></td>
                <td><?= h($user->address) ?></td>
                <td><?= $this->Number->format($user->contact_number) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller'=>'Users','action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller'=>'Users','action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=>'Users','action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
				    
					  
					<?php 
					if ($type !='admin')
					{
					?>
					
				<?=	$this->Form->postLink(__('Make Admin'), ['controller'=>'Users','action' => 'makeAdmin', $user->id], ['confirm' => __('Are you sure you want to make admin # {0}?', $user->id)]); ?>
				<?php } ?>
				</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
<!-- end results! -->
</div>