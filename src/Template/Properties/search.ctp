<div class="row">
    <!-- Filter Sidebar -->
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="card bg-faded">
            <div class="card-block">
                <h4 class="card-title">Filters</h4>
                <p class="card-text">

                    <form>
                        <fieldset class="form-group">
                            <label >Street or Zipcode</label>
                            <input type="email" class="form-control"  placeholder="Marktstrasse or 36037">
                        </fieldset>

                        <label for="priceRange">Type</label>
                        <div class="checkbox">
                            <label style="display:block"><input type="checkbox" checked> Flatshare</label>
                            <label style="display:block"><input type="checkbox" checked> Flat</label>
                            <label style="display:block"><input type="checkbox" checked> Student Residence</label>
                            <label style="display:block"><input type="checkbox" checked> House</label>
                        </div>
                        <hr>

                        <div class="row">
                            <fieldset class="form-group col-sm-6">
                                <label for="">Min Rent</label>
                                <input type="text" class="form-control" id="" placeholder="EUR">
                            </fieldset>

                            <fieldset class="form-group col-sm-6">
                                <label for="">Max Rent</label>
                                <input type="text" class="form-control" id="" placeholder="EUR">
                            </fieldset>
                        </div>

                        <fieldset class="form-group">
                            <label for="" style="display:block" data-toggle="tooltip" data-placement="right" title="A score ranging 0-100 given by Studierent website to help you find the best match!">Studierent Score <i class="fa fa-question"></i></label>
                            <select class="form-control" id="">
                              <option value="0" checked>Select</option>
                              <option value="0">90+</option>
                              <option value="0">80+</option>
                              <option value="0">70+</option>
                              <option value="0">60+</option>
                              <option value="0">50+</option>
                              <option value="0">0+</option>
                          </select>
                        </fieldset>

                        <div class="radio">
                            <label for="">Distance from University</label>
                            <label style="display:block;"><input type="radio" name="dist" id="dist" value="option1"> 0 - 1 km / 5 - 10 min walking</label>
                            <label style="display:block;"><input type="radio" name="dist" id="dist" value="option1"> 2 - 5 km / 10 - 30 min walking</label>
                            <label style="display:block;"><input type="radio" name="dist" id="dist" value="option1"> 5+ km / 30+ min walking</label>
                        </div>
                        <div class="checkbox">
                            <label style="display:block"><input type="checkbox"> Direct Bus to University</label>
                        </div>

                        <div id="accordion" role="tablist" aria-multiselectable="true">

                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="display:block">
                                  More
                                </a>
                                </div>
                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="card-block">
                                        <!-- Available -->
                                        <div class="row">
                                            <fieldset class="form-group col-xs-12">
                                                <label for="">Available (From - To)</label>
                                            </fieldset>

                                            <fieldset class="form-group col-sm-6">
                                                <input type="text" class="form-control" id="fromDt" placeholder="yyyymmdd">
                                            </fieldset>

                                            <fieldset class="form-group col-sm-6">
                                                <input type="text" class="form-control" id="toDt" placeholder="yyyymmdd">
                                            </fieldset>
                                        </div>
                                        <!-- Available fields end -->

                                        <!-- Sizes -->
                                        <div class="row">
                                            <fieldset class="form-group col-sm-6">
                                                <label for="">Room Size</label>
                                                <input type="text" class="form-control" id="" placeholder="">
                                            </fieldset>

                                            <fieldset class="form-group col-sm-6">
                                                <label for="">Flat Size</label>
                                                <input type="text" class="form-control" id="" placeholder="">
                                            </fieldset>
                                        </div>
                                        <!-- size fields end -->

                                        <!-- Amenities -->
                                        <label for="">Amenities</label>
                                        <div class="checkbox">
                                            <label style="display:block"><input type="checkbox"> Electricity Bill Included</label>
                                            <label style="display:block"><input type="checkbox"> Cable TV</label>
                                            <label style="display:block"><input type="checkbox"> Internet</label>
                                            <label style="display:block"><input type="checkbox"> Washing Machine</label>
                                            <label style="display:block"><input type="checkbox"> Fire Alerm</label>
                                            <label style="display:block"><input type="checkbox"> Heating</label>
                                            <label style="display:block"><input type="checkbox"> Parking</label>
                                            <label style="display:block"><input type="checkbox"> Bike Parking</label>
                                            <label style="display:block"><input type="checkbox"> Garden</label>
                                            <label style="display:block"><input type="checkbox"> Balcony</label>
                                            <label style="display:block"><input type="checkbox"> Smoking</label>
                                            <label style="display:block"><input type="checkbox"> Pets</label>
                                        </div>
                                        <!-- Amenities end -->
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="display:block">
                                  Landlord Rating
                                </a>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="card-block">
                                        <div class="checkbox">
                                            <label style="display:block"><input type="checkbox">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label style="display:block"><input type="checkbox">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label style="display:block"><input type="checkbox">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label style="display:block"><input type="checkbox">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label style="display:block"><input type="checkbox">
                                                <i class="fa fa-star"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="display:block">
                                  Sort By
                                </a>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="card-block">
                                        <div class="radio">
                                            <label style="display:block;"><input type="radio" name="sortby" id="sortby" value="option1"> Rent (High - Low)</label>
                                            <label style="display:block;"><input type="radio" name="sortby" id="sortby" value="option1"> Rent (Low - High)</label>
                                            <label style="display:block;"><input type="radio" name="sortby" id="sortby" value="option1"> Zipcode / Street</label>
                                            <label style="display:block;"><input type="radio" name="sortby" id="sortby" value="option1"> Available From Date</label>
                                            <label style="display:block;"><input type="radio" name="sortby" id="sortby" value="option1"> Available To Date</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
    <!-- end sidebar -->

    <!-- Results -->
    <div class="col-md-9 col-sm-8 col-xs-12">

        <h1 class="display-4">133 Properties Found</h1>
        <?php for ($i=0; $i < 4; $i++){ ?>
        <!-- Single Property Ad Card -->
        <div class="card">
            <div class="card-block" style="padding-bottom: 0rem">
                <h4 class="card-title">Nice Little Title of the Property Ad</h4>
                <h6 class="card-subtitle text-muted">Some Street Name</h6>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-sm-3">
                        <?= $this->Html->image('property.jpg', ['alt' => 'Property image', 'class' => 'rounded-left img-fluid']); ?>
                    </div>
                    <div class="col-sm-6">
                        <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <div class="clearfix">
                            <div class="text-success float-xs-left">
                                Studierent Score <i class="fa fa-bolt"></i> <label><strong>86</strong></label>
                            </div>
                            <div class="text-info float-xs-right">
                                Landlord Rating
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>

                        <?= $this->Html->link('View Details', '/properties/view/', ['class' => 'card-link']) ?>
                        <?= $this->Html->link('Landlord Profile', '/users/view/', ['class' => 'card-link text-info']) ?>
                        <?= $this->Html->link('<i class="fa fa-heart-o"></i>', '/favorites/add/', ['class' => 'card-link text-danger', 'escapeTitle' => false]) ?>
                        <?= $this->Html->link('<i class="fa fa-thumbs-o-up"></i>', '/feedbacks/add/', ['class' => 'card-link text-success', 'escapeTitle' => false]) ?>
                        <?= $this->Html->link('<i class="fa fa-flag-o"></i>', '/report/add/', ['class' => 'card-link text-muted', 'escapeTitle' => false]) ?>
                    </div>
                    <div class="col-sm-3">
                        <p class="text-xs-center text-muted">EUR</p>
                        <h4 class="display-4 text-xs-center text-warning font-weight-bold">250</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Property Ad Card end -->
        <?php } ?>

    </div>
    <!-- end results -->

    <!-- pagination -->


</div>
</div>
