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
<!-- NAVBAR -->
	<?= $this->element('navbar', ['cache' => true]) ?>
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
<!-- Filter Sidebar -->
<div class="col-md-3 col-sm-4 col-xs-12">
    <div class="card bg-faded">
        <div class="card-block">
            <p class="card-text">
            <form>
            <div class="easy-tree">
                <ul>
                    <li><b>Properties</b>
                        <ul>
						<?php
                        echo
				'<li>'.$this->Html->link(
    'Recently Added'.'('.$recentPropertiesCount.')',
    ['controller' => 'admin', 'action' => 'properties', '_full' => true,'recent']
).'</li>';						
						?>
<!--author: Ramanpreet         -->
<!-- Modifications by Muneeb to display dynamic links -->
						
<?php
                        foreach($results as $r){
                            echo
				'<li>'.$this->Html->link(
    $r['type'].'('.$r['counts'].')',
    ['controller' => 'admin', 'action' => 'properties', '_full' => true,str_replace(' ', '_',strtolower($r['type']))]
).'</li>';							
                        }
?>

                        </ul>
                    </li>
                    
                    <li><b>Users</b>
                        <ul>
                           
<?php   /* @authors:        Ramanpreet, 
        * switch:           Aleksandr Anfilov, 
        * ->Html->link:     ???
        */
        foreach($userslist as $u){
            switch ($u['status']){
            case '9':
                $status = 'Admin';
            break;
            
            case '1':
                $status = 'Normal';
            break;
            
            case '0':
                $status = 'Blocked';
            }
            echo '<li>'.$this->Html->link( $status.'('.$u['counts'].')',
                        ['controller' => 'admin', 'action' => 'users', '_full' => true, strtolower($status) ]                       ).'</li>';
        }
?>                           
                        </ul>
                    </li>
                    
                    <li><b>Reviews</b>
                        <ul>
                            <li><a href="#">Landlord(7)</a></li>
                        </ul>
                    </li>
                    
                    <li><b>My Account</b>
                        <ul>
                            <li><a href="admin.html">Dashboard</a></li>
                            <li><a href="user-profile.html">My Profile</a></li>
                            <li><a href="index.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </form>
            </p>
            </div>
        </div>
    </div>
</div>
<!-- end sidebar --
		
<!-- Results -->

		
		<!-- CONTENT -->
		<?= $this->fetch('content') ?>
		<!-- END CONTENT -->
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
