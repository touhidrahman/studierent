<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $property->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
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
<div class="properties form large-9 medium-8 columns content">
    <?= $this->Form->create($property) ?>
    <fieldset>
        <legend><?= __('Edit Property') ?></legend>
        <?php
            echo $this->Form->input('type');
            echo $this->Form->input('title');
            echo $this->Form->input('address');
            echo $this->Form->input('zip_id', ['options' => $zips]);
            echo $this->Form->input('status');
            echo $this->Form->input('contact_number');
            echo $this->Form->input('email');
            echo $this->Form->input('room_size');
            echo $this->Form->input('total_size');
            echo $this->Form->input('description');
            echo $this->Form->input('transportation');
            echo $this->Form->input('direct_bus_to_uni');
            echo $this->Form->input('house_rules');
            echo $this->Form->input('looking_for');
            echo $this->Form->input('available_from');
            echo $this->Form->input('available_until');
            echo $this->Form->input('rent');
            echo $this->Form->input('deposit');
            echo $this->Form->input('utility_cost');
            echo $this->Form->input('dist_from_uni');
            echo $this->Form->input('time_dist_from_uni');
            echo $this->Form->input('smoking');
            echo $this->Form->input('pets');
            echo $this->Form->input('handicap');
            echo $this->Form->input('fire_alarm');
            echo $this->Form->input('washing_machine');
            echo $this->Form->input('parking');
            echo $this->Form->input('heating');
            echo $this->Form->input('bike_parking');
            echo $this->Form->input('garden');
            echo $this->Form->input('balcony');
            echo $this->Form->input('cable_tv');
            echo $this->Form->input('electricity_bill_included');
            echo $this->Form->input('internet');
            echo $this->Form->input('view_times');
            echo $this->Form->input('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
