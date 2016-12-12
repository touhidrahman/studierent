<div class="row">
    <!-- Filter Sidebar -->
    <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="card bg-faded">
            <div class="card-block">
                <h4 class="card-title">Filters</h4>
                <p class="card-text">

                    <?= $this->Form->create(NULL, ['type' => 'get']); ?>

                        <fieldset class="form-group">
                            <label >Street or Zipcode</label>
                            <input type="text" class="form-control" name="address" placeholder="Marktstrasse or 36037" value="<?= ($qs['address']) ? $qs['address'] : ''; ?>">
                        </fieldset>

                        <label for="priceRange">Type</label>
                        <div class="checkbox">
                            <label style="display:block"><input type="radio" name="type" value="Flatshare" <?= ($qs['type']=='Flatshare') ? 'checked' : ''; ?>> Flatshare</label>
                            <label style="display:block"><input type="radio" name="type" value="Flat" <?= ($qs['type']=='Flat') ? 'checked' : ''; ?>> Flat</label>
                            <label style="display:block"><input type="radio" name="type" value="Student Residence" <?= ($qs['type']=='Student Residence') ? 'checked' : ''; ?>> Student Residence</label>
                            <label style="display:block"><input type="radio" name="type" value="House" <?= ($qs['type']=='House') ? 'checked' : ''; ?>> House</label>
                        </div>
                        <hr>

                        <div class="row">
                            <fieldset class="form-group col-sm-6">
                                <label for="">Min Rent</label>
                                <input type="text" class="form-control" id="" name="min" placeholder="EUR" value="<?= ($qs['min']) ? $qs['min'] : ''; ?>">
                            </fieldset>

                            <fieldset class="form-group col-sm-6">
                                <label for="">Max Rent</label>
                                <input type="text" class="form-control" id="" name="max" placeholder="EUR" value="<?= ($qs['max']) ? $qs['max'] : ''; ?>">
                            </fieldset>
                        </div>

                        <fieldset class="form-group">
                            <label for="" style="display:block" data-toggle="tooltip" data-placement="right" title="A score ranging 0-100 given by Studierent website to help you find the best match!">Studierent Score <i class="fa fa-question"></i></label>
                            <select class="form-control" id="" name="score">
                              <option value="0" checked>Select</option>
                              <option value="90">90+</option>
                              <option value="80">80+</option>
                              <option value="70">70+</option>
                              <option value="60">60+</option>
                              <option value="50">50+</option>
                              <option value="0">0+</option>
                          </select>
                        </fieldset>

                        <div class="radio">
                            <label for="">Distance from University</label>
                            <label style="display:block;"><input type="radio" name="dist" id="dist" <?= ($qs['dist'] == 2) ? 'checked' : ''; ?> value="2"> 0 - 2 km / 5 - 10 min walking</label>
                            <label style="display:block;"><input type="radio" name="dist" id="dist" <?= ($qs['dist'] == 5) ? 'checked' : ''; ?> value="5"> 2 - 5 km / 10 - 30 min walking</label>
                            <label style="display:block;"><input type="radio" name="dist" id="dist" <?= ($qs['dist'] == 100) ? 'checked' : ''; ?> value="100"> 5+ km / 30+ min walking</label>
                        </div>
                        <div class="checkbox">
                            <label style="display:block"><input name="directBus" type="checkbox" value="1" <?= ($qs['directBus']) ? 'checked' : ''; ?>> Direct Bus to University</label>
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
                                                <input type="text" name="avalFrom" class="form-control" id="fromDt" placeholder="yyyymmdd" value="<?= ($qs['avalFrom']) ? $qs['avalFrom'] : ''; ?>">
                                            </fieldset>

                                            <fieldset class="form-group col-sm-6">
                                                <input type="text" name="avalTo" class="form-control" id="toDt" placeholder="yyyymmdd" value="<?= ($qs['avalTo']) ? $qs['avalTo'] : ''; ?>">
                                            </fieldset>
                                        </div>
                                        <!-- Available fields end -->

                                        <!-- Sizes -->
                                        <div class="row">
                                            <fieldset class="form-group col-sm-6">
                                                <label for="">Room Size</label>
                                                <input type="text" name="rSize" class="form-control" id="" placeholder="Sq M." value="<?= ($qs['rSize']) ? $qs['rSize'] : ''; ?>">
                                            </fieldset>

                                            <fieldset class="form-group col-sm-6">
                                                <label for="">Flat Size</label>
                                                <input type="text" name="fSize" class="form-control" id="" placeholder="Sq M." value="<?= ($qs['fSize']) ? $qs['fSize'] : ''; ?>">
                                            </fieldset>
                                        </div>
                                        <!-- size fields end -->

                                        <!-- Amenities -->
                                        <label for="">Amenities</label>
                                        <div class="checkbox">
                                            <label style="display:block"><input type="checkbox" <?= ($qs['eBillIncl']) ? 'checked' : ''; ?> name="eBillIncl" value="1"> Electricity Bill Included</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['internet']) ? 'checked' : ''; ?> name="internet" value="1"> Internet</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['cableTv']) ? 'checked' : ''; ?> name="cableTv" value="1"> Cable TV</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['wMachine']) ? 'checked' : ''; ?> name="wMachine" value="1"> Washing Machine</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['fireAlarm']) ? 'checked' : ''; ?> name="fireAlarm" value="1"> Fire Alerm</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['heating']) ? 'checked' : ''; ?> name="heating" value="1"> Heating</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['parking']) ? 'checked' : ''; ?> name="parking" value="1"> Parking</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['bikeParking']) ? 'checked' : ''; ?> name="bikeParking" value="1"> Bike Parking</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['garden']) ? 'checked' : ''; ?> name="garden" value="1"> Garden</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['balcony']) ? 'checked' : ''; ?> name="balcony" value="1"> Balcony</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['smoking']) ? 'checked' : ''; ?> name="smoking" value="1"> Smoking Allowed</label>
                                            <label style="display:block"><input type="checkbox" <?= ($qs['pets']) ? 'checked' : ''; ?> name="pets" value="1"> Pets Allowed</label>
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
                                            <label style="display:block"><input name="rating" value="5" type="radio" <?= ($qs['rating'] == 5) ? 'checked' : ''; ?>>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label style="display:block"><input name="rating" value="4" type="radio" <?= ($qs['rating'] == 4) ? 'checked' : ''; ?>>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label style="display:block"><input name="rating" value="3" type="radio" <?= ($qs['rating'] == 3) ? 'checked' : ''; ?>>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label style="display:block"><input name="rating" value="2" type="radio" <?= ($qs['rating'] == 2) ? 'checked' : ''; ?>>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </label>
                                            <label style="display:block"><input name="rating" value="1" type="radio" <?= ($qs['rating'] == 1) ? 'checked' : ''; ?>>
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
                                            <label style="display:block;"><input type="radio" <?= ($qs['sortby']=='rentUp') ? 'checked' : ''; ?> name="sortby" id="sortby" value="rentUp"> Rent (High - Low)</label>
                                            <label style="display:block;"><input type="radio" <?= ($qs['sortby']=='rentDown') ? 'checked' : ''; ?> name="sortby" id="sortby" value="rentDown"> Rent (Low - High)</label>
                                            <label style="display:block;"><input type="radio" <?= ($qs['sortby']=='zipStreet') ? 'checked' : ''; ?> name="sortby" id="sortby" value="zipStreet"> Zipcode / Street</label>
                                            <label style="display:block;"><input type="radio" <?= ($qs['sortby']=='available_from_dt') ? 'checked' : ''; ?> name="sortby" id="sortby" value="available_from_dt"> Available From Date</label>
                                            <label style="display:block;"><input type="radio" <?= ($qs['sortby']=='available_to_dt') ? 'checked' : ''; ?> name="sortby" id="sortby" value="available_to_dt"> Available To Date</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                        <?= $this->Html->link('Reset', '/properties/search', ['class' => 'btn btn-warning']); ?>
                    <?= $this->Form->end(); ?>
                </p>
            </div>
        </div>
    </div>
    <!-- end sidebar -->

    <!-- Results -->
    <div class="col-md-9 col-sm-8 col-xs-12">

        <h1 class="display-4"><?= $count ?> Properties Found</h1>
        <?php foreach ($properties as $property){
            echo $this->element('adSnippet', ['property' => $property, 'avgRatings' => $avgRatings]);
        } ?>

        <div class="text-xs-center">
            <?php echo $this->Paginator->prev('<<'); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->next('>>'); ?>
        </div>
    </div>
    <!-- end results -->

    <!-- pagination -->


</div>
