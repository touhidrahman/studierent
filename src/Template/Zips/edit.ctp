<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $zip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $zip->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Zips'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zips form large-9 medium-8 columns content">
    <?= $this->Form->create($zip) ?>
    <fieldset>
        <legend><?= __('Edit Zip') ?></legend>
        <?php
            echo $this->Form->input('number');
            echo $this->Form->input('city_id', ['options' => $cities]);
            echo $this->Form->input('city');
            echo $this->Form->input('province');
            echo $this->Form->input('country');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
