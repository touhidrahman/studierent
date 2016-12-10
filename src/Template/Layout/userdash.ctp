<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		Studierent :
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>
	<!-- CSS Deps -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
		<?= $this->Html->css('style') ?>
	<!-- JS Dependencies -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
	<?= $this->Html->script('app') ?>
	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
</head>
<body>
	<!-- NAVBAR -->
	<?= $this->element('navbar', ['loggedIn'=>$loggedIn, 'adminLoggedIn' => $adminLoggedIn], ['cache' => true]) ?>
	<!-- NAVBAR END -->
	<div class="container-fluid clearfix" style="margin-top:1em;">
		<!-- ALERT or NOTIFICATION BLOCK -->
		<div class="row">
			<div class="offset-sm-3 col-sm-6 text-xs-center">
				<?= $this->Flash->render() ?>
			</div>
		</div>
		<!-- END ALERT -->
		<div class="row">
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
			            <li class="list-group-item"><?= $this->Html->link('Add a Property Ad', '/zips/add/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
			            <li class="list-group-item"><?= $this->Html->link('My Properties', '/properties/myproperties', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
			            <li class="list-group-item"><?= $this->Html->link('My Favorites', '/properties/favorites/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
			            <li class="list-group-item"><?= $this->Html->link('My Profile', '/users/view/', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
			            <li class="list-group-item"><?= $this->Html->link('Logout', '/users/logout', ['class' => 'card-link btn-block', 'escapeTitle' => false]) ?></li>
			        </ul>
			    </div>
			</div>
			<!-- end User sidebar -->
			<!-- CONTENT -->
			<div class="col-md-9 col-sm-8 col-xs-12">
				<?= $this->fetch('content') ?>
			</div>
			<!-- END CONTENT -->
		</div>
	</div>


	<footer>
		<div class="">
			<p>&nbsp;</p>
			<div class="card card-inverse" style="background-color: #666; border-radius: 0">
			    <p class="card-text text-xs-center">&copy; This Site is a part of an Academic Project developed by students of Hochschule Fulda, MScGSD WS 2016, Group 4. All data are fake and only for academic purpose.</p>
			  </div>
			</div>
		</div>
	</footer>
</body>
</html>
