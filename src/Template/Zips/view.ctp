<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Zip'), ['action' => 'edit', $zip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zip'), ['action' => 'delete', $zip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Zips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="zips view large-9 medium-8 columns content">
    <h3><?= h($zip->number) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $zip->has('city') ? $this->Html->link($zip->city->name, ['controller' => 'Cities', 'action' => 'view', $zip->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($zip->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Province') ?></th>
            <td><?= h($zip->province) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= h($zip->country) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($zip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Number') ?></th>
            <td><?= $this->Number->format($zip->number) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Properties') ?></h4>
        <?php if (!empty($zip->properties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Zip Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Contact Number') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Room Size') ?></th>
                <th scope="col"><?= __('Total Size') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Transportation') ?></th>
                <th scope="col"><?= __('Direct Bus To Uni') ?></th>
                <th scope="col"><?= __('House Rules') ?></th>
                <th scope="col"><?= __('Looking For') ?></th>
                <th scope="col"><?= __('Available From') ?></th>
                <th scope="col"><?= __('Available Until') ?></th>
                <th scope="col"><?= __('Rent') ?></th>
                <th scope="col"><?= __('Deposit') ?></th>
                <th scope="col"><?= __('Utility Cost') ?></th>
                <th scope="col"><?= __('Dist From Uni') ?></th>
                <th scope="col"><?= __('Time Dist From Uni') ?></th>
                <th scope="col"><?= __('Smoking') ?></th>
                <th scope="col"><?= __('Pets') ?></th>
                <th scope="col"><?= __('Handicap') ?></th>
                <th scope="col"><?= __('Fire Alarm') ?></th>
                <th scope="col"><?= __('Washing Machine') ?></th>
                <th scope="col"><?= __('Parking') ?></th>
                <th scope="col"><?= __('Heating') ?></th>
                <th scope="col"><?= __('Bike Parking') ?></th>
                <th scope="col"><?= __('Garden') ?></th>
                <th scope="col"><?= __('Balcony') ?></th>
                <th scope="col"><?= __('Cable Tv') ?></th>
                <th scope="col"><?= __('Electricity Bill Included') ?></th>
                <th scope="col"><?= __('Internet') ?></th>
                <th scope="col"><?= __('View Times') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('House No') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($zip->properties as $properties): ?>
            <tr>
                <td><?= h($properties->id) ?></td>
                <td><?= h($properties->type) ?></td>
                <td><?= h($properties->title) ?></td>
                <td><?= h($properties->address) ?></td>
                <td><?= h($properties->zip_id) ?></td>
                <td><?= h($properties->status) ?></td>
                <td><?= h($properties->contact_number) ?></td>
                <td><?= h($properties->email) ?></td>
                <td><?= h($properties->room_size) ?></td>
                <td><?= h($properties->total_size) ?></td>
                <td><?= h($properties->description) ?></td>
                <td><?= h($properties->transportation) ?></td>
                <td><?= h($properties->direct_bus_to_uni) ?></td>
                <td><?= h($properties->house_rules) ?></td>
                <td><?= h($properties->looking_for) ?></td>
                <td><?= h($properties->available_from) ?></td>
                <td><?= h($properties->available_until) ?></td>
                <td><?= h($properties->rent) ?></td>
                <td><?= h($properties->deposit) ?></td>
                <td><?= h($properties->utility_cost) ?></td>
                <td><?= h($properties->dist_from_uni) ?></td>
                <td><?= h($properties->time_dist_from_uni) ?></td>
                <td><?= h($properties->smoking) ?></td>
                <td><?= h($properties->pets) ?></td>
                <td><?= h($properties->handicap) ?></td>
                <td><?= h($properties->fire_alarm) ?></td>
                <td><?= h($properties->washing_machine) ?></td>
                <td><?= h($properties->parking) ?></td>
                <td><?= h($properties->heating) ?></td>
                <td><?= h($properties->bike_parking) ?></td>
                <td><?= h($properties->garden) ?></td>
                <td><?= h($properties->balcony) ?></td>
                <td><?= h($properties->cable_tv) ?></td>
                <td><?= h($properties->electricity_bill_included) ?></td>
                <td><?= h($properties->internet) ?></td>
                <td><?= h($properties->view_times) ?></td>
                <td><?= h($properties->created) ?></td>
                <td><?= h($properties->modified) ?></td>
                <td><?= h($properties->house_no) ?></td>
                <td><?= h($properties->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Properties', 'action' => 'view', $properties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Properties', 'action' => 'edit', $properties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Properties', 'action' => 'delete', $properties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $properties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
