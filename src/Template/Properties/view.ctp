<div class="row">
	<div class="col-xs-8">

        <div class="row">
          <div class="col-xs-12">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active">
                    <img data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img data-src="holder.js/900x500/auto/#666:#444/text:Second slide" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img data-src="holder.js/900x500/auto/#555:#333/text:Third slide" alt="Third slide">
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="icon-prev" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="icon-next" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

          </div>

          <div class="col-xs-12">
              <div class="card">
      		      <div class="card-header">
      				<h3>A Nice little Property Title to attract users</h3>
      			  </div>
                  <div class="card-block">
                      <table class="table table-sm table-fluid">
                          <tr><td><i class="fa fa-check"></i> Electricity Bill Included</td>
                          <td><i class="fa fa-check"></i> Heating</td></tr>
                          <tr><td><i class="fa fa-check"></i> Internet</td>
                          <td><i class="fa fa-check"></i> Washing Machine</td></tr>
                          <tr><td><i class="fa fa-check"></i> Fire Alarm</td>
                          <td><i class="fa fa-check"></i> Bike Parking</td></tr>
                          <tr><td><i class="fa fa-check"></i> Parking</td>
                          <td><i class="fa fa-check"></i> Balkony</td></tr>
                          <tr><td><i class="fa fa-times"></i> Handicap Friendly</td>
                          <td><i class="fa fa-times"></i> Garden</td></tr>
                          <tr><td><i class="fa fa-times"></i> Smoking</td>
                          <td><i class="fa fa-times"></i> Pets</td></tr>
                      </table>
                </div>
      			  <div class="card-block">
                      <h4>Description</h4>
      				  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      			  </div>
      			  <div class="card-block">
                      <h4>Transportation</h4>
                      <p><i class="fa fa-check"></i> Direct bus to University</p>
      				  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
      			  </div>
                  <div class="card-block">
                      <h4>House Rules</h4>
                      <p class="text-justify">ommodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
      		</div>
          </div>
        </div>

	</div>

	<div class="col-xs-4">
		<div class="card">
    		<div class="card-header">
    				Landlord Info
    		</div>
            <div class="card-block">
                Rating:
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <div class="card-block">
                <p class="text-success">Recent Reviews:</p>
              <blockquote class="card-blockquote">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
              </blockquote>
            </div>
            <div class="card-block">
            <?= $this->Html->link('Landlord Profile', '/users/view/', ['class' => 'btn btn-success']) ?>
            <?= $this->Html->link('Submit Review', '/users/view/', ['class' => 'btn btn-warning']) ?>
            </div>
		</div>
	</div>


</div>
