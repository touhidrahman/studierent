<!-- User side bar -->
<div class="col-md-3 col-sm-4 col-xs-12">
    <div class="card">
        <img class="card-img img-fluid" src="/studierent/img/property.jpg" alt="Card image cap">
          <div class="card-img-overlay">
            <h4 class="card-title" style="color:#fff">My Dashboard</h4>
            <p class="card-text"></p>
            <p class="card-text"><small class="text-muted"></small></p>
          </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $this->Html->link('Add a Property Ad', '/properties/add/'.$property['Property']['id'], ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
            <li class="list-group-item"><?= $this->Html->link('My Properties', '/properties/myproperties', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
            <li class="list-group-item"><?= $this->Html->link('My Favorites', '/properties/favorites/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
            <li class="list-group-item"><?= $this->Html->link('My Profile', '/users/view/'.$id, ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
            <li class="list-group-item"><?= $this->Html->link('Logout', '/users/logout', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
        </ul>
    </div>
</div>
<!-- end User sidebar -->
