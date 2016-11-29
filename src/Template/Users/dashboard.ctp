<div class="row">
    <!-- explore bar -->
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="card">
            <img class="card-img img-fluid" src="/studierent/img/property.jpg" alt="Card image cap">
              <div class="card-img-overlay">
                <h4 class="card-title" style="color:#fff">My Dashboard</h4>
                <p class="card-text"></p>
                <p class="card-text"><small class="text-muted"></small></p>
              </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?= $this->Html->link('Add a Property Ad', '/properties/add', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('My Properties', '/properties/myproperties', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('My Favorites', '/properties/favorites/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('My Profile', '/users/view/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
                <li class="list-group-item"><?= $this->Html->link('Logout', '/users/logout', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
            </ul>
        </div>
    </div>
    <!-- end sidebar -->

    <!-- My Profile -->
    <div class="col-md-9 col-sm-8 col-xs-12">

    	<h1 class="display-4">Welcome User!!</h1>

        <div class="row">
          <div class="col-sm-6">
              <div class="card">
                <div class="card-block">
                  <h4 class="card-title">My Property Ads (3)</h4>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-success">View List</a>
                </div>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="card">
                <div class="card-block">
                  <h4 class="card-title">My Favorite Ads (10)</h4>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-success">View List</a>
                </div>
              </div>
          </div>
        </div>

    </div>
</div>
