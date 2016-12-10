<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Zip'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zips index large-9 medium-8 columns content">
    <h3><?= __('Zips') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('province') ?></th>
                <th scope="col"><?= $this->Paginator->sort('country') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zips as $zip): ?>
            <tr>
                <td><?= $this->Number->format($zip->id) ?></td>
                <td><?= $this->Number->format($zip->number) ?></td>
                <td><?= $zip->has('city') ? $this->Html->link($zip->city->name, ['controller' => 'Cities', 'action' => 'view', $zip->city->id]) : '' ?></td>
                <td><?= h($zip->city) ?></td>
                <td><?= h($zip->province) ?></td>
                <td><?= h($zip->country) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $zip->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $zip->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $zip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zip->id)]) ?>
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
</div>
