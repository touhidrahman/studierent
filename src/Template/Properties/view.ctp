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
						<?php $i = 0; foreach ($property->images as $img) : ?>

						<div class="carousel-item <?= ($i==0)? 'active' : ''; ?>">
							<?= $this->Html->image('properties'.DS.$img->path); ?>
						</div>

						<?php $i++; endforeach; ?>
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
						<h3 class="text-success"><?= $property->title ?></h3>
					</div>

					<!-- <div class="row">

					<div class="col-xs-3">
					<div class="card-block bg-success">
					<div class="card-title">
					<h4 class="text-xs-center"><i class="fa fa-check"></i></h4>
				</div>
				<div class="card-subtitle text-xs-center">

			</div>
		</div>
	</div>

</div> -->
<div class="card-block">
	<div class="card-title">
		<h4 class="">Amenities</h4>
	</div>
	<table class="table table-sm table-fluid">
		<?php $check = '<i class="fa fa-check text-success"></i>'; $times = '<i class="fa fa-times text-danger"></i>'; ?>
		<tr>
			<td><?php echo ($property->electricity_bill_included == 1) ? $check : $times; ?> Electricity Bill Included</td>
			<td><?php echo ($property->heating == 1) ? $check : $times; ?> Heating</td>
		</tr>
		<tr><td><?php echo ($property->internet == 1) ? $check : $times; ?> Internet</td>
			<td><?php echo ($property->washing_machine == 1) ? $check : $times; ?> Washing Machine</td>
		</tr>
		<tr>
			<td><?php echo ($property->fire_alarm == 1) ? $check : $times; ?> Fire Alarm</td>
			<td><?php echo ($property->bike_parking == 1) ? $check : $times; ?> Bike Parking</td>
		</tr>
		<tr>
			<td><?php echo ($property->parking == 1) ? $check : $times; ?> Parking</td>
			<td><?php echo ($property->balkony == 1) ? $check : $times; ?> Balkony</td>
		</tr>
		<tr>
			<td><?php echo ($property->handicap == 1) ? $check : $times ?> Handicap Friendly</td>
			<td><?php echo ($property->garden == 1) ? $check : $times; ?> Garden</td>
		</tr>
		<tr>
			<td><?php echo ($property->cable_tv == 1) ? $check : $times; ?> Cable TV</td>
			<td><?php echo ($property->phone == 1) ? $check : $times; ?> Phone</td>
		</tr>
		<tr>
			<td><?php echo ($property->cable_tv == 1) ? $check : $times; ?> Smoking</td>
			<td><?php echo ($property->pets == 1) ?$check : $times; ?> Pets</td>
		</tr>
	</table>
</div>
<div class="card-block">
	<h4>Description</h4>
	<p class="text-justify"><?= h($property->description) ?></p>
</div>
<div class="card-block">
	<h4>Transportation</h4>
	<p><?php echo ($property->direct_bus_to_uni == 1) ? $check : $times; ?>  Direct bus to University</p>
	<p class="text-success"><?php echo $property->dist_from_uni; ?>  KM Far from University / <?php echo $property->time_dist_from_uni; ?> Minutes by Walking (Approximate Estimation)</p>
	<p class="text-justify"><?= h($property->transportation) ?></p>
</div>
<div class="card-block">
	<h4>House Rules</h4>
	<p class="text-justify"><?= h($property->house_rules) ?></p>
</div>
</div>
</div>
</div>

</div>

<div class="col-xs-4">
	<div class="card">
		<div class="card-header">
			<i class="fa fa-home"></i> Basic Info
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th colspan="2" class="text-xs-center">
						<label>Monthly Total Rent (EUR)</label>
						<h4 class="display-4 text-warning"><?= $property->rent + $property->utility_cost ?></h4>
						<label class="text-muted">Rent: <?= $property->rent ?> EUR + Utilities: <?= $property->utility_cost ?> EUR</label><br>
						<label class="text-primary">Deposit: <?= $property->deposit ?> EUR</label>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Room Size</td>
					<td><?= $property->room_size ?> M<sup>2</sup></td>
				</tr>
				<tr>
					<td>Total Flat/House Size</td>
					<td><?= $property->total_size ?> M<sup>2</sup></td>
				</tr>
				<tr>
					<td>Looking For</td>
					<td><?= $property->looking_for ?></td>
				</tr>
				<tr>
					<td>Available From</td>
					<td><?= $property->available_from ?></td>
				</tr>
				<tr>
					<td>Available To</td>
					<td><?= $property->available_until ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo $property->address .' '. $property->house_no .',<br> '. $property->zip->number .' '. $property->zip->city; ?></td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="card">
		<div class="card-header">
			<i class="fa fa-user"></i> Landlord Info
		</div>

		<table class="table">
			<tbody>
				<tr>
					<th>Name</th>
					<td><?= $property->user->first_name . ' ' . $property->user->last_name ?></td>
				</tr>
				<tr>
					<th>Contact Number</th>
					<td><?= $property->contact_number ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?= $property->email ?></td>
				</tr>
				<tr>
					<th>Rating: </th>
					<td>
						<?php
						$avgRatingCount = 0;
						foreach ($avgRating as $avg) {
							$avgRatingCount = $avg->avg_rate;
							if ($avg->user_id == $property['user_id']) {
								if( $avg->avg_rate==0){ ?>
								<p>Not Rated yet</p>
								<?php
								} else {
	                                $filledStar = ceil($avg->avg_rate);
	                                $hollowStar = 5 - $filledStar;
	                                for ($i=0; $i < $filledStar; $i++) {
	                                    echo '<i class="fa fa-star text-info"></i>';
	                                }
	                                for ($i=0; $i < $hollowStar; $i++) {
	                                    echo '<i class="fa fa-star-o text-info"></i>';
	                                }
	                            }
							}
						}
		                ?>
					</td>
				</tr>
			</tbody>
		</table>

		<div class="card-block">
			<p class="text-success">Recent Reviews:</p>
			<blockquote class="card-blockquote">
				<?php if( $avgRatingCount==0){ ?>
					<p>No Review So Far</p>
					<?php }else{  ?>
						<p> <?php echo $feedback->text; ?></p>

						<?php  }?>

					</blockquote>
				</div>
				<div class="card-block">
					<?= $this->Html->link('Landlord Profile', '/users/view/'.$property->user->id, ['class' => 'btn btn-success']) ?>
					<?= $this->Html->link('Submit Review', '/users/view/'.$property->user->id, ['class' => 'btn btn-warning']) ?>
				</div>
			</div>
		</div>


</div>
