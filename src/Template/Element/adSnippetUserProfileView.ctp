<!-- Single Property Ad Snippet for User Profile view -->
<a href="/studierent/properties/view/<?= $property['id'] ?>">
<div class="card">
    <div class="card-block" style="padding-bottom: 0rem">
        <h4 class="card-title"><?= $property['title'] ?></h4>
        <h6 class="card-subtitle text-muted">
            <?= $property['address'] ?>
            &nbsp;|&nbsp;
            <?= $property['zip']['number'] ?>
        </h6>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-sm-6">
                <?= $this->Html->image('property.jpg', ['alt' => 'Property image', 'class' => 'rounded-left img-fluid']); ?>
            </div>

            <div class="col-sm-6">
                <p class="text-xs-center text-muted" style="margin-bottom:0">EUR</p>
                <h4 class="display-4 text-xs-center text-warning font-weight-bold"><?= $property['rent'] ?></h4>
            </div>
        </div>
    </div>
</div>
</a>
<!-- Single Property Ad Snippet end -->
