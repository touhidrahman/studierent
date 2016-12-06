<div class="row">
    <?= $this->element('userSidebar', ['id'=>$id], ['cache' => true]) ?>

    <!-- My Profile -->
    <div class="col-md-9 col-sm-8 col-xs-12">

    	<h1 class="display-4">Welcome <?= $name ?>!</h1>

        <div class="row">
          <div class="col-sm-6">
              <div class="card">
                <div class="card-block">
                  <h4 class="card-title">My Property Ads (<?= $propertyCount ?>)</h4>
                  <p class="card-text">Remember to keep your ads updated to attract more visitors.</p>
                  <?= $this->Html->link('View List', '/properties/myproperties', ['class' => 'btn btn-success', 'escapeTitle' => false]) ?>
                </div>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="card">
                <div class="card-block">
                  <h4 class="card-title">My Favorite Ads (<?= $favCount ?>)</h4>
                  <p class="card-text">Note: Deactivated or deleted ads may get lost from your favorite list!</p>
                  <?= $this->Html->link('View List', '/properties/favorites', ['class' => 'btn btn-success', 'escapeTitle' => false]) ?>
                </div>
              </div>
          </div>
        </div>

    </div>
</div>
