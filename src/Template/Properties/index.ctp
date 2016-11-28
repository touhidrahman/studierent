<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zips'), ['controller' => 'Zips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zip'), ['controller' => 'Zips', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Favorite Properties'), ['controller' => 'FavoriteProperties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Favorite Property'), ['controller' => 'FavoriteProperties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="properties index large-9 medium-8 columns content">
    <h3><?= __('Properties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('contact_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('room_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direct_bus_to_uni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('looking_for') ?></th>
                <th scope="col"><?= $this->Paginator->sort('available_from') ?></th>
                <th scope="col"><?= $this->Paginator->sort('available_until') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deposit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('utility_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dist_from_uni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('time_dist_from_uni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('smoking') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pets') ?></th>
                <th scope="col"><?= $this->Paginator->sort('handicap') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fire_alarm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('washing_machine') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parking') ?></th>
                <th scope="col"><?= $this->Paginator->sort('heating') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bike_parking') ?></th>
                <th scope="col"><?= $this->Paginator->sort('garden') ?></th>
                <th scope="col"><?= $this->Paginator->sort('balcony') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cable_tv') ?></th>
                <th scope="col"><?= $this->Paginator->sort('electricity_bill_included') ?></th>
                <th scope="col"><?= $this->Paginator->sort('internet') ?></th>
                <th scope="col"><?= $this->Paginator->sort('view_times') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($properties as $property): ?>
            <tr>
                <td><?= $this->Number->format($property->id) ?></td>
                <td><?= h($property->type) ?></td>
                <td><?= h($property->title) ?></td>
                <td><?= h($property->address) ?></td>
                <td><?= $property->has('zip') ? $this->Html->link($property->zip->id, ['controller' => 'Zips', 'action' => 'view', $property->zip->id]) : '' ?></td>
                <td><?= $this->Number->format($property->status) ?></td>
                <td><?= $this->Number->format($property->contact_number) ?></td>
                <td><?= h($property->email) ?></td>
                <td><?= $this->Number->format($property->room_size) ?></td>
                <td><?= $this->Number->format($property->total_size) ?></td>
                <td><?= h($property->direct_bus_to_uni) ?></td>
                <td><?= h($property->looking_for) ?></td>
                <td><?= h($property->available_from) ?></td>
                <td><?= h($property->available_until) ?></td>
                <td><?= $this->Number->format($property->rent) ?></td>
                <td><?= $this->Number->format($property->deposit) ?></td>
                <td><?= $this->Number->format($property->utility_cost) ?></td>
                <td><?= $this->Number->format($property->dist_from_uni) ?></td>
                <td><?= h($property->time_dist_from_uni) ?></td>
                <td><?= h($property->smoking) ?></td>
                <td><?= h($property->pets) ?></td>
                <td><?= h($property->handicap) ?></td>
                <td><?= h($property->fire_alarm) ?></td>
                <td><?= h($property->washing_machine) ?></td>
                <td><?= h($property->parking) ?></td>
                <td><?= h($property->heating) ?></td>
                <td><?= h($property->bike_parking) ?></td>
                <td><?= h($property->garden) ?></td>
                <td><?= h($property->balcony) ?></td>
                <td><?= h($property->cable_tv) ?></td>
                <td><?= h($property->electricity_bill_included) ?></td>
                <td><?= h($property->internet) ?></td>
                <td><?= $this->Number->format($property->view_times) ?></td>
                <td><?= h($property->created) ?></td>
                <td><?= h($property->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?>
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
