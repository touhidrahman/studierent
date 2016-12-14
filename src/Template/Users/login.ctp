<!-- BEGINING OF LOGIN MODULE -->
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="../webroot/img/logo.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>


				<div id="div-forms">

					<!-- Begining of Login Form -->

					<?= $this->Form->create(); ?>

					<form id="login-form">
						<div class="modal-body">

							<?= $this->Form->input('username',array('placeholder'=>'Your email id', 'label' => 'Email')); ?>


							<?= $this->Form->input('password',array('placeholder'=>'Your password')); ?>

 							<div class="checkbox">
								<label>
                                  <?= $this->Form->checkbox('remember_me'); ?> Keep me signed in
								  </label>
							</div>
						</div>
						<div class="modal-footer">
							<div>
							<?= $this->Form->submit('login',array('class'=>'btn btn-primary btn-lg btn-block', 'legend'=>false,'fieldset'=>false));?>
								<?= $this->Form->end() ?>
								</div>
							<div>
								<?php
									echo $this->Html->link('Forgot your password? Activation?', ['controller' => 'users', 'action' => 'forgotPassword'], ['class' => 'btn btn-link']);
									echo $this->Html->link('Sign Up', ['controller' => 'users', 'action' => 'register'], ['class' => 'btn btn-link']);
								?>
							</div>
						</div>
					</form>
					<!-- End of Login Form -->

				</div>
				<!-- End # DIV Form -->

			</div>
		</div>
<!--	</div>  !-->
	<!-- ENDING OF LOGIN MODULE-->
