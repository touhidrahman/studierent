<!-- Results -->
<div class="properties index large-9 medium-8 columns content">
    <h3><?= __('Properties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_size') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($properties as $property): ?>
            <tr>
                <td><?= $this->Number->format($property->id) ?></td>
                <td><?= h($property->type) ?></td>
                <td><?= h($property->address) ?></td>
                <td><?= $this->Number->format($property->contact_number) ?></td>
                <td><?= h($property->email) ?></td>
                <td><?= $this->Number->format($property->room_size) ?></td>
                <td><?= $this->Number->format($property->total_size) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller'=>'Properties' ,'action' => 'view', $property->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller'=>'Properties' ,'action' => 'edit', $property->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=>'Properties' ,'action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?>
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
