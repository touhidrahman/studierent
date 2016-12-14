<!-- Single Property Ad Snippet for User Profile view -->
<a href="/properties/view/<?= $property['id'] ?>" target="_blank">
<div class="card">
    <div class="card-block">
        <h4 class="card-title"><?= ($property['is_boosted'] == 1)? '<i class="fa fa-diamond fa-lg text-warning"></i>' : '' ?><?= $property['title'] ?></h4>
        <h6 class="card-subtitle text-muted">
            <?= $property['address'] ?>
            &nbsp;|&nbsp;
            <?= $property['zip']['number'] ?>
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
        <h4 class="display-4 text-xs-center text-warning font-weight-bold"><?= $property['rent'] ?></h4>
    </div>
</div>
</a>
<!-- Single Property Ad Snippet end -->
