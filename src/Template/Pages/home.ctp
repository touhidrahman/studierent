<!-- HOMEPAGE -->

<img src="/studierent/img/fulda.jpg" alt="Welcome image" class="img-fluid img-thumbnail rounded mx-auto d-block uptop spacewide">
<div class="jumbotron text-xs-center" style="background-color: #ffffff">
    <h1 class="display-3">Hello, Students!</h1>
    <p class="lead">Finding a comfy accomodation so that your studies go on flawless - is hard! To make your life easier, we are HERE!</p>
    <p>We are featuring hundreds of properties that you can choose from. </p>
    <hr class="m-y-md">
    <p class="lead">
        <?= $this->Form->create(NULL, ['url' => ['controller' => 'properties', 'action' => 'search'], 'class' => 'form-inline text-xs-center', 'type' => 'get']); ?>
            <div class="form-group">
                <input type="text" class="form-control" id="zipcode" name="address" placeholder="Zipcode or Street">
            </div>
            <div class="form-group">
                <select class="form-control" name="type">
                    <option value="" checked>Select Property type</option>
                    <option value="Flatshare">Flatshare</option>
                    <option value="Flat">Flat</option>
                    <option value="Student Residence">Student Residence</option>
                    <option value="House">House</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Search Now</button>
        <?= $this->Form->end(); ?>
    </p>
    <hr class="m-y-md">
</div>
<p></p>
<p></p>
<div class="row">
  <div class="col-xs-6">
      <h1 class="text-xs-center text-success">Recent Properties</h1>
      <div id="carousel" class="carousel slide uptop spacewide" data-ride="carousel">
      	<ol class="carousel-indicators">
      		<li data-target="#carousel" data-slide-to="0" class="active"></li>
      		<li data-target="#carousel" data-slide-to="1"></li>
      		<li data-target="#carousel" data-slide-to="2"></li>
      	</ol>
      	<div class="carousel-inner" role="listbox">
      		<div class="carousel-item active center_please">
      			<img src="/studierent/img/hochschule_fulda1.jpg" alt="First slide">
      			<div class="carousel-caption">
      				<h3>First recent property</h3>
      				<a class="" href="login.html">Check it out</a>
      			</div>
      		</div>
      		<div class="carousel-item center_please">
      			<img src="/studierent/img/hochschule_fulda2.jpg" alt="Second slide">
      			<div class="carousel-caption">
      				<h3>Second recent property</h3>
      				<a class="" href="login.html">Check it out</a>
      			</div>
      		</div>
      		<div class="carousel-item center_please">
      			<img src="/studierent/img/hochschule_fulda3.jpg" alt="Third slide">
      			<div class="carousel-caption ">
      				<h3>Third recent property</h3>
      				<a class="" href="login.html">Check it out</a>
      			</div>
      		</div>
      	</div>
      	<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
      		<span class="icon-prev" aria-hidden="true"></span>
      		<span class="sr-only">Previous</span>
      	</a>
      	<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
      		<span class="icon-next" aria-hidden="true"></span>
      		<span class="sr-only">Next</span>
      	</a>
      </div>
  </div>

  <div class="col-xs-6">
      <h1 class="text-xs-center text-success">Top Properties</h1>
      <div id="carousel" class="carousel slide uptop spacewide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active center_please">
                <img src="/studierent/img/hochschule_fulda3.jpg" alt="First slide">
                <div class="carousel-caption">
                    <h3>First top property</h3>
                    <a class="" href="login.html">Check it out</a>
                </div>
            </div>
            <div class="carousel-item center_please">
                <img src="/studierent/img/hochschule_fulda1.jpg" alt="Second slide">
                <div class="carousel-caption">
                    <h3>Second top property</h3>
                    <a class="" href="login.html">Check it out</a>
                </div>
            </div>
            <div class="carousel-item center_please">
                <img src="/studierent/img/hochschule_fulda2.jpg" alt="Third slide">
                <div class="carousel-caption ">
                    <h3>Third top property</h3>
                    <a class="" href="login.html">Check it out</a>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
  </div>
</div>
<p></p>
<p></p>

    <div class="jumbotron text-xs-center" style="background-color: #ffffff">
        <h1 class="display-4">What Our Customers Are Saying?</h1>
        <img src="/studierent/img/boy.jpg" class="img-fluid rounded-circle">
        <p class="lead">
            I am so happy! <br>
            <small>- Alexandr Anfilov</small>
        </p>
        <hr class="m-y-md">
    </div>

<div class="spacewide">
	<div class="card-group uptop ">
		<div class="card">
			<img class="card-img-top img-fluid" src="/studierent/img/pic01.jpg" style="width: 100%" alt="Card image cap">
			<div class="card-block">
				<h4 class="card-title">Advertisement 1</h4>
				<p class="card-text">Eat this and you will never have to diet again, is the miracle plant for fat burning!</p>
				<a href="#" class="btn btn-primary">Read More</a>
			</div>
		</div>
		<div class="card">
			<img class="card-img-top img-fluid " src="/studierent/img/pic02.jpg" style="width: 100%" alt="Card image cap">
			<div class="card-block">
				<h4 class="card-title">Advertisement 2</h4>
				<p class="card-text">You won't belive what nature did to this man, it change his life for ever!</p>
				<a href="#" class="btn btn-primary">Read More</a>
			</div>
		</div>
		<div class="card">
			<img class="card-img-top img-fluid " src="/studierent/img/pic03.jpg" style="width: 100%" alt="Card image cap">
			<div class="card-block">
				<h4 class="card-title">Advertisement 3</h4>
				<p class="card-text"> The bigest garden tournament started! the most beuatiful plants in the world are here!</p>
				<a href="#" class="btn btn-primary">Read More</a>
			</div>
		</div>
		<div class="card">
			<img class="card-img-top img-fluid " src="/studierent/img/pic01.jpg" style="width: 100%" alt="Card image cap">
			<div class="card-block">
				<h4 class="card-title">Advertisement 4</h4>
				<p class="card-text"> Year's largest music night is here!</p>
				<a href="#" class="btn btn-primary">Read More</a>
			</div>
		</div>
	</div>
</div>
