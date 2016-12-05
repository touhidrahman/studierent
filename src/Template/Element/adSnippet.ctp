<!-- Single Property Ad Snippet -->
<div class="card">
    <div class="card-block" style="padding-bottom: 0rem">
        <a href="/studierent/properties/view/<?= $property['id'] ?>">
            <h4 class="card-title"><?= $property['title'] ?></h4>
        </a>
        <h6 class="card-subtitle text-muted">
            <?= $this->Html->link($property['address'], '/properties/search?address='.$property['address'], ['title' => 'Click here to search all properties in '.$property['address']]) ?>
            &nbsp;|&nbsp;
            <?= $this->Html->link($property['zip']['number'], '/properties/search?address='.$property['zip']['number'], ['title' => 'Click here to search all properties in '.$property['zip_id']]) ?>
        </h6>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-sm-3">
                <?= $this->Html->image('property.jpg', ['alt' => 'Property image', 'class' => 'rounded-left img-fluid']); ?>
            </div>
            <div class="col-sm-6">
                <p class="card-text text-justify"><?= $property['description'] ?></p>
                <div class="clearfix">
                    <div class="text-success float-xs-left">
                        Studierent Score <i class="fa fa-bolt"></i> <label><strong>86</strong></label>
                    </div>
                    <div class="text-info float-xs-right">
                        Landlord Rating
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>

                <?= $this->Html->link('<i class="fa fa-home"></i> View Details', '/properties/view/'.$property['id'], ['class' => 'card-link', 'escapeTitle' => false]) ?>
                <?= $this->Html->link('<i class="fa fa-user"></i> Landlord Profile', '/users/view/', ['class' => 'card-link text-info', 'escapeTitle' => false]) ?>
                <?= $this->Html->link('<i class="fa fa-heart-o"></i>', '/favorites/add/', ['class' => 'card-link text-danger', 'escapeTitle' => false, 'title' => 'Click to add this property ad to your favorites!']) ?>
                <?= $this->Html->link('<i class="fa fa-thumbs-o-up"></i>', '/feedbacks/add/', ['class' => 'card-link text-success', 'escapeTitle' => false, 'title' => 'Click to leave a feedback for the landlord so that others find it useful!']) ?>
                <?= $this->Html->link('<i class="fa fa-flag-o"></i>', '/reports/add/', ['class' => 'card-link text-muted', 'escapeTitle' => false, 'title' => 'Report this Ad! Help us improve Studierent by filtering abuses.']) ?>
            </div>
            <div class="col-sm-3">
                <p class="text-xs-center text-muted" style="margin-bottom:0">EUR</p>
                <h4 class="display-4 text-xs-center text-warning font-weight-bold"><?= $property['rent'] ?></h4>
                <table class="table table-sm table-fluid text-xs-center text-muted">
                    <tr style="font-size:.8rem"><td>Room:</td><td><?= $property['room_size'] ?> M<sup>2</sup></td><td>Total:</td><td><?= $property['total_size'] ?> M<sup>2</sup></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Single Property Ad Snippet end -->
