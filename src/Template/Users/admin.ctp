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
                                                                                    foreach($results as $r)
                                                                                           {
                                                                                             echo "<li>".$r['type']."(".$r['counts'].")"."</li>";
                                                                                           }
                                                                                                ?>
                                                                               
                                                                            </ul>

                                                                        </li>
                                                                        <li><b>Users</b>

                                                                            <ul>
                                                                                <?php 
                                                                                    foreach($users as $u)
                                                                                           {
                                                                                             echo "<li>".$u['status']."(".$u['counts'].")"."</li>";
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
                                </div></div>
			<!-- end sidebar -->

 <!-- Results -->
			<div class="col-md-9 col-sm-8 col-xs-12">
				<h1 class="display-4">Welcome Admin!!!</h1>

				
				<div class="card">
					<div class="card-block" style="padding-bottom: 0rem">
					    <h4 class="card-title">Search For Users</h4>
					    
					</div>
					<div class="card-block">
						<div class="row">
                                                    <label for="uid"><b>&nbsp;&nbsp;Search by User-Id:</b></label><form class="form-inline float-lg-center">
				<input class="form-control" type="text" placeholder="Enter User Id">
				<button class="btn btn-primary" type="submit">Search</button>
                                                    </form><br>
                                                    <label for="uid"><b>&nbsp;&nbsp;Search by User-Name:</b></label><form class="form-inline float-lg-center">
				<input class="form-control" type="text" placeholder="Enter User Name">
				<button class="btn btn-primary" type="submit">Search</button>
                                                    </form><br><br>
                                                    <div class="list-group">
  <a href="#" class="list-group-item clearfix">
    
      <img src="/studierent/img/boy.jpg" alt="Card image cap" height="100px" width="100px" class="img-thumbnail">
    
    Touhid Rahman
    <span class="pull-right">
      <button class="btn btn-primary" type="submit">Block</button>
      
    </span>
  </a>
              <a href="#" class="list-group-item clearfix">
    
    <img src="/studierent/img/boy.jpg" alt="Card image cap"height="100px" width="100px" class="img-thumbnail">
    
    Norman Lista
    <span class="pull-right">
      <button class="btn btn-primary" type="submit">Block</button>
      
    </span>
  </a>
              <a href="#" class="list-group-item clearfix">
    
    <img src="/studierent/img/girl.jpg" alt="Card image cap" height="100px" width="100px" class="img-thumbnail">
    
    Mythri Manjunath
    <span class="pull-right">
      <button class="btn btn-primary" type="submit">Block</button>
      
    </span>
  </a>
              <a href="#" class="list-group-item clearfix">
    
    <img src="/studierent/img/girl.jpg" alt="Card image cap" height="100px" width="100px" class="img-thumbnail">
    
    Ramanpreet Kaur
    <span class="pull-right">
      <button class="btn btn-primary" type="submit">Block</button>
      
    </span>
  </a>
</div>
							
							
						</div>
					</div>
				</div>
</div>
			<!-- end results -->

 
 </div>
