<?PHP
	include ('./inc/header.php');
	include('session.php');
	
	$database = mysqli_connect("localhost","root","password","user_accounts"); // connect to database
	$account = mysqli_query($database,"SELECT * FROM profiles WHERE username = '$logged_in_user'"); // find the account of the user
	$accountrow = mysqli_fetch_array($account,MYSQLI_ASSOC); // find the row of the account

	$lat = $accountrow['lat'];
	$lon = $accountrow['lon'];
	
	$profiles = "SELECT * from profiles WHERE username !='$username' order by abs($lat-lat)+abs($lon-lon)";
    $result = mysqli_query($database,$profiles)or die(mysqli_error($database));
    while($rws = mysqli_fetch_array($result)){ 
?>
<TITLE>Members</TITLE>
                                                                  <div class="col-md-4 column">
                                                                    <div class="panel-group" id="panel-<?php echo $rws['id']; ?>">
                                                                        <div class="panel panel-default">
                                                                            <div id="panel-element-<?php echo $rws['id']; ?>" class="panel-collapse collapse in">
                                                                                <div class="panel-body">
                                                                                    <div class="col-md-6 column">
																					<?php if($rws['image'] == "")
																							echo "<img width='100' height='100' src= 'pictures/default.png' alt='Default Profile Pic'>";
																						else
																							echo "<img width='100' height='100' src= 'pictures/".$rws['image']."' alt='Profile Pic'>";
																						?>
                                                                                                                        
                                                                                    </div>
                                                                                    <div class="col-md-6 column">
                                                                                         <h2><span><a href="viewprofile.php?id=<?php echo $rws['id'];?>"><?php echo $rws['username'];?></a><?php echo " (", $rws['fname'], " ", $rws['lname'], ")";?></a><?php echo " (", $rws['location'] , ")"; ?></span></h2>
                                                                                    </div> 
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                  </div>
 <?php } ?>                                                         
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>

