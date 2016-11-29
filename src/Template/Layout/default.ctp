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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.js"></script>
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
	<nav class="navbar navbar-light bg-faded">
		<button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
		<div class="collapse navbar-toggleable-md" id="navbarResponsive">
			<a class="navbar-brand" href="/studierent">Studierent</a>
			<ul class="nav navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="/studierent">Home <span class="sr-only">(current)</span></a>
				</li>

				<?php if (!$loggedIn): ?>
				<li class="nav-item">
					<?= $this->Html->link(__('Login'), ['controller' => 'users', 'action' => 'login'], ['class' => 'nav-link']); ?>
				</li>
				<?php endif; ?>

				<?php if (!$loggedIn): ?>
				<li class="nav-item">
					<?= $this->Html->link(__('Register'), ['controller' => 'users', 'action' => 'register'], ['class' => 'nav-link']); ?>
				</li>
				<?php endif; ?>
				<?php if ($loggedIn): ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
					<div class="dropdown-menu" aria-labelledby="responsiveNavbarDropdown">
					    <?= $this->Html->link(__('Dashboard'), ['controller' => 'users', 'action' => 'dashboard'], ['class' => 'dropdown-item']); ?>
					    <?= $this->Html->link(__('My Profile'), ['controller' => 'users', 'action' => 'view'], ['class' => 'dropdown-item']); ?>
					    <?= $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'dropdown-item']); ?>
					</div>
				</li>
				<?php endif; ?>
			</ul>
			<?= $this->Form->create(NULL, ['url' => ['controller' => 'properties', 'action' => 'search'], 'class' => 'form-inline float-lg-right', 'type' => 'get']); ?>
				<input class="form-control" type="text" name="address" placeholder="Search">
				<button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
			<?= $this->Form->end(); ?>
		</div>
	</nav>
	<div class="container-fluid clearfix" style="margin-top:1em;">
		<?= $this->Flash->render() ?>
		<?= $this->fetch('content') ?>
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
