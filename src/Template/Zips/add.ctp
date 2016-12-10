
<div class="zips form large-9 medium-8 columns content">
    <?= $this->Form->create($zip) ?>
    <fieldset>
        <legend><?= __('Add Zip') ?></legend>
        <?php
            echo $this->Form->input('number');
            echo $this->Form->input('city_id', ['options' => $cities]);
            
            echo $this->Form->input('province');
            echo $this->Form->input('country');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
