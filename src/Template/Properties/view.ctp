<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Property'), ['action' => 'edit', $property->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zips'), ['controller' => 'Zips', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zip'), ['controller' => 'Zips', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Favorite Properties'), ['controller' => 'FavoriteProperties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Favorite Property'), ['controller' => 'FavoriteProperties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Images'), ['controller' => 'Images', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Image'), ['controller' => 'Images', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="properties view large-9 medium-8 columns content">
    <h3><?= h($property->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($property->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($property->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($property->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= $property->has('zip') ? $this->Html->link($property->zip->id, ['controller' => 'Zips', 'action' => 'view', $property->zip->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($property->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Looking For') ?></th>
            <td><?= h($property->looking_for) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Time Dist From Uni') ?></th>
            <td><?= h($property->time_dist_from_uni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($property->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($property->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contact Number') ?></th>
            <td><?= $this->Number->format($property->contact_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Room Size') ?></th>
            <td><?= $this->Number->format($property->room_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Size') ?></th>
            <td><?= $this->Number->format($property->total_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rent') ?></th>
            <td><?= $this->Number->format($property->rent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deposit') ?></th>
            <td><?= $this->Number->format($property->deposit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Utility Cost') ?></th>
            <td><?= $this->Number->format($property->utility_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dist From Uni') ?></th>
            <td><?= $this->Number->format($property->dist_from_uni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('View Times') ?></th>
            <td><?= $this->Number->format($property->view_times) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Available From') ?></th>
            <td><?= h($property->available_from) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Available Until') ?></th>
            <td><?= h($property->available_until) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($property->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($property->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Direct Bus To Uni') ?></th>
            <td><?= $property->direct_bus_to_uni ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Smoking') ?></th>
            <td><?= $property->smoking ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pets') ?></th>
            <td><?= $property->pets ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Handicap') ?></th>
            <td><?= $property->handicap ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fire Alarm') ?></th>
            <td><?= $property->fire_alarm ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Washing Machine') ?></th>
            <td><?= $property->washing_machine ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parking') ?></th>
            <td><?= $property->parking ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Heating') ?></th>
            <td><?= $property->heating ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bike Parking') ?></th>
            <td><?= $property->bike_parking ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Garden') ?></th>
            <td><?= $property->garden ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Balcony') ?></th>
            <td><?= $property->balcony ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cable Tv') ?></th>
            <td><?= $property->cable_tv ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Electricity Bill Included') ?></th>
            <td><?= $property->electricity_bill_included ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Internet') ?></th>
            <td><?= $property->internet ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($property->description)); ?>
    </div>
    <div class="row">
        <h4><?= __('Transportation') ?></h4>
        <?= $this->Text->autoParagraph(h($property->transportation)); ?>
    </div>
    <div class="row">
        <h4><?= __('House Rules') ?></h4>
        <?= $this->Text->autoParagraph(h($property->house_rules)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Favorite Properties') ?></h4>
        <?php if (!empty($property->favorite_properties)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($property->favorite_properties as $favoriteProperties): ?>
            <tr>
                <td><?= h($favoriteProperties->id) ?></td>
                <td><?= h($favoriteProperties->user_id) ?></td>
                <td><?= h($favoriteProperties->property_id) ?></td>
                <td><?= h($favoriteProperties->created) ?></td>
                <td><?= h($favoriteProperties->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FavoriteProperties', 'action' => 'view', $favoriteProperties->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FavoriteProperties', 'action' => 'edit', $favoriteProperties->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FavoriteProperties', 'action' => 'delete', $favoriteProperties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $favoriteProperties->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Images') ?></h4>
        <?php if (!empty($property->images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Property Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Order') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($property->images as $images): ?>
            <tr>
                <td><?= h($images->id) ?></td>
                <td><?= h($images->property_id) ?></td>
                <td><?= h($images->created) ?></td>
                <td><?= h($images->modified) ?></td>
                <td><?= h($images->order) ?></td>
                <td><?= h($images->path) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Images', 'action' => 'view', $images->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Images', 'action' => 'edit', $images->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Images', 'action' => 'delete', $images->id], ['confirm' => __('Are you sure you want to delete # {0}?', $images->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($property->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Gender') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Contact Number') ?></th>
                <th scope="col"><?= __('Photo') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Reset Key') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($property->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->gender) ?></td>
                <td><?= h($users->address) ?></td>
                <td><?= h($users->city_id) ?></td>
                <td><?= h($users->status) ?></td>
                <td><?= h($users->contact_number) ?></td>
                <td><?= h($users->photo) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->reset_key) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
