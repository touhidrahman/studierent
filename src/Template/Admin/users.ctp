<!-- Results -->
<div class="">
    <h3><?= __('Users') ?></h3>
    <table class="table table-striped table-sm">
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
					if ($type =='normal')
					{
					?>

				<?=	$this->Form->postLink(__('Make Admin'), ['controller'=>'Users','action' => 'makeAdmin', $user->id], ['confirm' => __('Are you sure you want to make admin # {0}?', $user->id)]); ?>
				<?php } ?>
				</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator text-xs-center">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('<')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('>') . ' >') ?>
        </ul>
        <p class="text-xs-center"><?= $this->Paginator->counter() ?></p>
    </div>
<!-- end results! -->
</div>
