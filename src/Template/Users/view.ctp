<div class="row">
	<div class="col-xs-12">
		<div class="jumbotron jumbotron-fluid text-xs-center">
		  <div class="container">
			
                     <?php 
                     $path= $user->photo;
                     if(file_exists($path)){
                     $img=basename($path);
                     $userimage='uploads/'.$img;                      
 echo $this->Html->image($userimage, array('alt' => 'CakePHP','class'=>'rounded-circle','height' => '128', 'width' => '128'));
                     }
                     else 
                         echo $this->Html->image('boy.jpg', array('alt' => 'CakePHP','class'=>'rounded-circle','height' => '128', 'width' => '128'));
                         
?>
                          
			<h1 class="display-3">John Doe</h1>
			<p class="lead">"My nice and bold tagline!"</p>
		  </div>
		</div>
	</div>

	<div class="col-xs-4">
		<div class="card">
		  <div class="card-header">
				User Details
			  </div>
			  <div class="card-block">
				<blockquote class="card-blockquote">
                                    <fieldset class="form-group">
                                  <label>Name: <?= h($user->username) ?> </label><br/>
                                       
                                  <label>Address: <?= h($user->address) ?></label><br/>
                                  
                                  <label>Contact_Number: <?= h($user->contact_number) ?></label><br/>
                                  <fieldset>
				</blockquote>
			  </div>
		</div>
	</div>

	<div class="col-xs-4">
		<div class="card">
		  <div class="card-header">
				Posted Properties (3)
			  </div>
			  <div class="card-block">

				  <a href="#">
				  <div class="card">
					  <div class="card-block" style="padding-bottom: 0rem">
						  <h4 class="card-title">A title of the Property</h4>
						  <h6 class="card-subtitle text-muted">SomeStreet | 36037</h6>
					  </div>
					  <div class="card-block">
						  <div class="row">
							  <div class="col-sm-6">
								  <?= $this->Html->image('property.jpg', ['alt' => 'Property image', 'class' => 'rounded-left img-fluid']); ?>
							  </div>

							  <div class="col-sm-6">
								  <p class="text-xs-center text-muted" style="margin-bottom:0">EUR</p>
								  <h4 class="display-4 text-xs-center text-warning font-weight-bold">250</h4>
							  </div>
						  </div>
					  </div>
				  </div>
				</a>

				  <a href="#">
				  <div class="card">
					  <div class="card-block" style="padding-bottom: 0rem">
						  <h4 class="card-title">A title of the Property</h4>
						  <h6 class="card-subtitle text-muted">SomeStreet | 36037</h6>
					  </div>
					  <div class="card-block">
						  <div class="row">
							  <div class="col-sm-6">
								  <?= $this->Html->image('property.jpg', ['alt' => 'Property image', 'class' => 'rounded-left img-fluid']); ?>
							  </div>

							  <div class="col-sm-6">
								  <p class="text-xs-center text-muted" style="margin-bottom:0">EUR</p>
								  <h4 class="display-4 text-xs-center text-warning font-weight-bold">250</h4>
							  </div>
						  </div>
					  </div>
				  </div>
				</a>

				  <a href="#">
				  <div class="card">
					  <div class="card-block" style="padding-bottom: 0rem">
						  <h4 class="card-title">A title of the Property</h4>
						  <h6 class="card-subtitle text-muted">SomeStreet | 36037</h6>
					  </div>
					  <div class="card-block">
						  <div class="row">
							  <div class="col-sm-6">
								  <?= $this->Html->image('property.jpg', ['alt' => 'Property image', 'class' => 'rounded-left img-fluid']); ?>
							  </div>

							  <div class="col-sm-6">
								  <p class="text-xs-center text-muted" style="margin-bottom:0">EUR</p>
								  <h4 class="display-4 text-xs-center text-warning font-weight-bold">250</h4>
							  </div>
						  </div>
					  </div>
				  </div>
				</a>

			  </div>
		</div>
	</div>

	<div class="col-xs-4">
		<div class="card">
		  <div class="card-header">
				Send a Feedback
			  </div>
			  <div class="card-block">
				  <form>


  					<div class="radio">
  						<label style="display:block"><input name="rating" value="5" type="radio">
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  						</label>
  						<label style="display:block"><input name="rating" value="4" type="radio">
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  						</label>
  						<label style="display:block"><input name="rating" value="3" type="radio">
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  						</label>
  						<label style="display:block"><input name="rating" value="2" type="radio">
  							<i class="fa fa-star"></i>
  							<i class="fa fa-star"></i>
  						</label>
  						<label style="display:block"><input name="rating" value="1" type="radio">
  							<i class="fa fa-star"></i>
  						</label>
  					</div>

				    <fieldset class="form-group">
				      <label for="exampleSelect1">How do you know this user?</label>
				      <select class="form-control" id="exampleSelect1">
				        <option>Rented a property from him/her</option>
				        <option>Contacted, but not rented</option>
				        <option>Personal relation</option>
				        <option>Don't know at all</option>
				      </select>
				    </fieldset>
				    <fieldset class="form-group">
				      <label for="exampleTextarea">Details</label>
				      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
				    </fieldset>

				    <button type="submit" class="btn btn-success">Submit</button>
				  </form>
			  </div>
		</div>
	</div>
