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

							<?= $this->Form->input('username',array('placeholder'=>'Your email id')); ?>
							
						
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
								<a href="forgotpassword" class="btn btn-link">Forgot your password?</a>
								<a href="register" class="btn btn-link">New User?</a>
							</div>
						</div>
					</form>
					<!-- End of Login Form -->

					<!-- Begining of Password Reset Form -->
					<form id="lost-form" style="display:none;">
						<div class="modal-body">
							<div id="div-lost-msg">
								<div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
								<span id="text-lost-msg">Please enter your email id</span>
							</div>
							<input id="lost_email" class="form-control" type="text" placeholder="abc@xyz.com" required>
						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
							</div>
							<div>
								<button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
								<a href="signup.html" class="btn btn-link">Register</a>
							</div>
						</div>
					</form>
					<!-- End of Password Reset Form -->

					<!-- Begin | Register Form -->
					<form id="register-form" style="display:none;">
						<div class="modal-body">
							<div id="div-register-msg">
								<div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
								<span id="text-register-msg">Register an account.</span>
							</div>
							<input id="register_username" class="form-control" type="text" placeholder="Username (type ERROR for error effect)" required>
							<input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
							<input id="register_password" class="form-control" type="password" placeholder="Password" required>
						</div>
						<div class="modal-footer">
							<div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
							</div>
							<div>
								<button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
								<button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
							</div>
						</div>
					</form>
					<!-- End | Register Form -->

				</div>
				<!-- End # DIV Form -->

			</div>
		</div>
<!--	</div>  !-->
	<!-- ENDING OF LOGIN MODULE-->
