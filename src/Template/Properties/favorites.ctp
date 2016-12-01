<div class="row">
    <?= $this->element('userSidebar', [], ['cache' => true]) ?>

    <!-- properties -->
        <div class="col-md-9 col-sm-8 col-xs-12">

            <h1 class="display-4">Favorite Properties</h1>
            <?php foreach ($properties as $property){ ?>
            <!-- Single Property Ad Card -->
            <div class="card">
                <div class="card-block" style="padding-bottom: 0rem">
                    <h4 class="card-title"><?= $property['title'] ?></h4>
                    <h6 class="card-subtitle text-muted"><?= $property['address'] . ' | ' . $property['zip_id'] ?></h6>
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

                            <?= $this->Html->link('View Details', '/properties/view/', ['class' => 'card-link']) ?>
                            <?= $this->Html->link('Landlord Profile', '/users/view/', ['class' => 'card-link text-info']) ?>
                            <?= $this->Html->link('<i class="fa fa-heart-o"></i>', '/favorites/add/', ['class' => 'card-link text-danger', 'escapeTitle' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-thumbs-o-up"></i>', '/feedbacks/add/', ['class' => 'card-link text-success', 'escapeTitle' => false]) ?>
                            <?= $this->Html->link('<i class="fa fa-flag-o"></i>', '/report/add/', ['class' => 'card-link text-muted', 'escapeTitle' => false]) ?>
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
            <!-- Single Property Ad Card end -->
            <?php } ?>
    </div>


</div>
