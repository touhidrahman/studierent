
<h1 class="display-4" style="text-align:center;">Boost your property for more views!</h1>
<div class="card">
    <div class="card-block">
        <h4 class="card-title"><?= $property['title'] ?></h4>
        <h6 class="card-subtitle text-muted">
            <?= $property['address'] ?>
        </h6>
    </div>
    <?php
    if ($property['images']) {
        echo $this->Html->image('properties'.DS.$property['images'][0]->path, ['alt' => 'Property image', 'class' => 'img-fluid', 'style' => 'width:100%;']);
    } else {
    ?>
        <h1 class="display-1 text-xs-center text-success"><i class="fa fa-home fa-lg"></i></h1>
    <?php
    }
    ?>
    <div class="card-block">
        <p class="text-xs-center text-muted" style="margin-bottom:0">EUR</p>
        <h4 class="display-4 text-xs-center text-warning font-weight-bold"><?= $property['rent']?></h4>
    </div>
</div>
<?php if($property['is_boosted']==1){  ?>
<h6 style="text-align: center;">
    This add is already boosted
        </h6>
<?php }else{ ?>
<?= $this->Form->create($property)?>
<p>You can boost your ad with only 2 EUR for 7 days. If you click the "Boost" button, it will take you to the third party payment site, where you can pay through Credit card.</p>
<div class="form-group row" style="text-align: center;" >
    <input type="hidden" name="is_boosted" value="1"/>
    <input type="hidden" name="boosted_till" value=<?=date("y-m-d");?>/>
<?= $this->Form->button(__('Boost'), ['class' => 'btn btn-success']) ?>
    </div>
<?= $this->Form->end(); ?>
<?php }?>
