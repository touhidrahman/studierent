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
                          
			<h1 class="display-3"><?= $user->first_name .' '. $user->last_name ?></h1>
			<!-- <p class="lead"></p> -->
		  </div>
		</div>
	</div>

	<div class="col-xs-4">
		<div class="card">
	<div class="col-xs-4">
		<div class="card">
		  	<div class="card-header">
				Basic Info
			</div>
			<table class="table">
			  <tbody>
			    <tr>
			      <th>Gender</th>
				  <td><?= $user->gender ?></td>
			    </tr>
			    <tr>
			      <th>Address</th>
				  <td><?= $user->address ?></td>
			    </tr>
			    <tr>
			      <th>Contact No</th>
				  <td><?= $user->contact_number ?></td>
			    </tr>
			    <tr>
			      <th>Email</th>
				  <td><?= $user->username ?></td>
			    </tr>
			  </tbody>
			</table>
		</div>

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

	<div class="col-xs-8">
		<div class="card">
		    <div class="card-header">
				Posted Properties (<?= $propertyCount ?>)
			</div>
			<div class="row">
				<div class="card-block">
						<?php
							foreach ($properties as $property) { ?>
								<div class="col-xs-6">
									<?php echo $this->element('adSnippetUserProfileView', ['property' => $property]); ?>
								</div>
						<?php }
						?>
				</div>
			</div>
		</div>
	</div>
</div>
