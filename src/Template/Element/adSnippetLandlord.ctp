<!-- Single Property Ad Card -->
<div class="card">
    <div class="card-block" style="padding-bottom: 0rem">
        <a href="/studierent/properties/view/<?= $property['id'] ?>" target="_blank">
            <h4 class="card-title"><?= $property['title'] ?></h4>
        </a>
        <h6 class="card-subtitle text-muted">
            <?= $this->Html->link($property['address'], '/properties/search?address='.$property['address'], ['title' => 'Click here to search all properties in '.$property['address']]) ?>
            &nbsp;|&nbsp;
            <?= $this->Html->link($property['zip']['number'], '/properties/search?address='.$property['zip']['number'], ['title' => 'Click here to search all properties in '.$property['zip']['number']]) ?>
        </h6>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-sm-3">
                <?= $this->element('propertyImage', ['path'=>$property['image']['path']], ['cache' => true]) ?>
            </div>
            <div class="col-sm-6">
                <p class="card-text text-justify"><?= $this->Text->truncate($property['description'], 100, ['exact' => false, 'html' => true]) ?></p>

                <?= $this->Html->link('<i class="fa fa-eye"></i> View Details ', '/properties/view/'.$property['id'], ['class' => 'card-link', 'escapeTitle' => false]) ?>
                <?= $this->Html->link('<i class="fa fa-pencil"></i> Edit ', '/properties/edit/'.$property['id'], ['class' => 'card-link text-info', 'escapeTitle' => false]) ?>
                <?= $this->Html->link('<i class="fa fa-image"></i> Upload Images ', '/images/add/'.$property['id'], ['class' => 'card-link text-info', 'escapeTitle' => false]) ?>
                <?= $this->Form->postlink('&nbsp;<i class="fa fa-trash-o"></i> Delete ',
                    ['action' => 'delete', $property['id']],
                    ['confirm' => 'Are you sure to delete this property ad?', 'class' => 'card-link text-danger', 'escapeTitle' => false]) ?>
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
