<!-- Single Property Ad Card -->
<div class="card">
    <div class="card-block" style="padding-bottom: 0rem">
        <a href="/properties/view/<?= $property['id'] ?>">
            <h4 class="card-title"><?= $property['title'] ?></h4>
        </a>
        <h6 class="card-subtitle text-muted">
            <?= $this->Html->link($property['address'], '/properties/search?address='.$property['address']) ?>
            &nbsp;|&nbsp;
            <?= $this->Html->link($property['zip_id'], '/properties/search?address='.$property['zip_id']) ?>
        </h6>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-sm-3">
                <?= $this->Html->image('property.jpg', ['alt' => 'Property image', 'class' => 'rounded-left img-fluid']); ?>
            </div>
            <div class="col-sm-6">
                <p class="card-text text-justify"><?= $property['description'] ?></p>

                <?= $this->Html->link('View Details', '/properties/view/'.$property['id'], ['class' => 'card-link']) ?>
                <?= $this->Html->link('Edit', '/properties/edit/'.$property['id'], ['class' => 'card-link text-info']) ?>
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
