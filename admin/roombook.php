<?php  
	
session_start();  
if(!isset($_SESSION["username"]))
{
 header("location:index.php");
}
?> 

<?php
		if(!isset($_GET["rid"]))
		{
				
			 header("location:index.php");
		}
		else {
				$curdate=date("Y/m/d");
				include ('db.php');
				$id = $_GET['rid'];
				
				
				$sql ="SELECT * FROM reservations WHERE id = '$id'";
                $re_stmt = $pdo->query($sql);
                
				while($row= $re_stmt->fetch(PDO::FETCH_BOTH))
				{
					
					$fname = $row['f_name'];
					$lname = $row['l_name'];
					$email = $row['email'];
					
					$country = $row['country'];
					$Phone = $row['phone'];
					$troom = $row['room_category'];
					$nroom = $row['amount'];
					
					
					$cin = $row['start'];
					$cout = $row['end'];
					$sta = $row['confirmation'];
					//$days = $row['nodays'];
					
				
				
				}
					
				
				
		
	}
		
		
		
			?> 

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>
    <!-- Bootstrap Styles-->
    <link href="public/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="public/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="public/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="public/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <?php echo $_SESSION["username"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="home.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="roomav.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    
					<li>
                        <a class="active-menu" href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
                    </li>
                    <li>
                        <a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
                    </li>
					
                    
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                    


                    
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
		
		
		

        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Room Booking<small>	<?php echo  $curdate; ?> </small>
                        </h1>
                    </div>
					
					
					<div class="col-md-8 col-sm-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                           Booking Conformation
                        </div>
                        <div class="panel-body">
							
							<div class="table-responsive">
                                <table class="table">
                                    <tr>
                                            <th>DESCRIPTION</th>
                                            <th>INFORMATION</th>
                                            
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <th><?php echo $fname.$lname; ?> </th>
                                            
                                        </tr>
										<tr>
                                            <th>Email</th>
                                            <th><?php echo $email; ?> </th>
                                            
                                        </tr>
										
										<tr>
                                            <th>Country </th>
                                            <th><?php echo $country;  ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Phone No </th>
                                            <th><?php echo $Phone; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Category</th>
                                            <th><?php echo $troom; ?></th>
                                            
                                        </tr>
										
										<tr>
                                            <th>No Of the Room </th>
                                            <th><?php echo $nroom; ?></th>
                                            
                                        </tr>
										
										
										<tr>
                                            <th>Check-in Date </th>
                                            <th><?php echo $cin; ?></th>
                                            
                                        </tr>
										<tr>
                                            <th>Check-out Date</th>
                                            <th><?php echo $cout; ?></th>
                                            
                                        </tr>
										
										<tr>
                                            <th>Status Level</th>
                                            <th><?php echo $sta; ?></th>
                                            
                                        </tr>
                                   
                                  
                                        
                                        
                                    
                                </table>
                            </div>
                        
					
							
                        </div>
                        <div class="panel-footer">
                            <form method="post">
										<div class="form-group">
														<label>Select the Conformation</label>
														<select name="conf"class="form-control">
															<option value selected>	</option>
															<option value="Conform">Conform</option>
															
															
														</select>
										 </div>
							<input type="submit" name="co" value="Conform" class="btn btn-success">
							
							</form>
                        </div>
                    </div>
					</div>
					
					<?php
					
						$rsql ="select * from rooms";
						$rre= $pdo->query($rsql);
						$r =0 ;
						$sc =0;
						$gh = 0;
						$sr = 0;
						$dr = 0;
						while($rrow=$rre->fetch(PDO::FETCH_BOTH))
						{
							$r = $r + 1;
							$s = $rrow['bed'];
							$p = $rrow['place'];
							if($s=="single" )
							{
								$sc = $sc+ 1;
							}
							
							if($s=="double")
							{
								$gh = $gh + 1;
							}
							if($s=="triple" )
							{
								$sr = $sr + 1;
							}
							if($s=="quad" )
							{
								$dr = $dr + 1;
							}
							
						
						}
						?>
						
						<?php
						$csql ="select * from payment";
						$cre= $pdo->query($csql);
						$cr =0 ;
						$csc =0;
						$cgh = 0;
						$csr = 0;
						$cdr = 0;
						while($crow= $cre->fetch(PDO::FETCH_BOTH))
						{
							$cr = $cr + 1;
							$cs = $crow['room'];
							
							if($cs=="sweet"  )
							{
								$csc = $csc + 1;
							}
							
							if($cs=="delux room" )
							{
								$cgh = $cgh + 1;
							}
							if($cs=="special room" )
							{
								$csr = $csr + 1;
							}
							if($cs=="cozy room" )
							{
								$cdr = $cdr + 1;
							}
							
						
						}
				
					?>
					<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Available Room Details
                        </div>
                        <div class="panel-body">
						<table width="200px">
							
							<tr>
								<td><b>Sweet</b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php  
									$f1 =$sc - $csc;
									if($f1 <=0 )
									{	$f1 = "NO";
										echo $f1;
									}
									else{
											echo $f1;
									}
								
								
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Special Room</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								$f2 =  $gh -$cgh;
								if($f2 <=0 )
									{	$f2 = "NO";
										echo $f2;
									}
									else{
											echo $f2;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Cozy Room	 </b></td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php
								$f3 =$sr - $csr;
								if($f3 <=0 )
									{	$f3 = "NO";
										echo $f3;
									}
									else{
											echo $f3;
									}

								?> </button></td> 
							</tr>
							<tr>
								<td><b>Deluxe Room</b>	 </td>
								<td><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f4 =$dr - $cdr; 
								if($f4 <=0 )
									{	$f4 = "NO";
										echo $f4;
									}
									else{
											echo $f4;
									}
								?> </button></td> 
							</tr>
							<tr>
								<td><b>Total Rooms	</b> </td>
								<td> <button type="button" class="btn btn-danger btn-circle"><?php 
								
								$f5 =$r-$cr; 
								if($f5 <=0 )
									{	$f5 = "NO";
										echo $f5;
									}
									else{
											echo $f5;
									}
								 ?> </button></td> 
							</tr>
						</table>
						
						
						
                        
						
						</div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
					</div>
                </div>
                <!-- /. ROW  -->
				
                </div>
                <!-- /. ROW  -->
				
				
				
				
         </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="public/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="public/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="public/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="public/js/morris/raphael-2.1.0.min.js"></script>
    <script src="public/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="public/js/custom-scripts.js"></script>


</body>

</html>

<?php
print_r($troom); //'','','','','','',''
	include ('db.php');
						if(isset($_POST['co']))
						{	
							$st = $_POST['conf'];
							
							 
							
							if($st=="Conform")
							{
									$urb = "UPDATE `reservations` SET `confirmation`='$st' WHERE id = '$id'";
									$urb_stmt= $pdo->query($urb);
									
									//$urb_stmt->execute(['confirmation'=>'$st', 'id'=>'$id']);
								if($f1=="NO" )
								{
									echo "<script type='text/javascript'> alert('Sorry! Not Available Superior Room ')</script>";
								}
								else if($f2 =="NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Not Available Guest House')</script>";
										
									}
									else if ($f3 == "NO")
									{
										echo "<script type='text/javascript'> alert('Sorry! Not Available Single Room')</script>";
									}
										else if($f4=="NO")
										{
										echo "<script type='text/javascript'> alert('Sorry! Not Available Deluxe Room')</script>";
										}
										

										// else if(isset($troom) )
										// 	{	
										// 		$sql = "SELECT `f_name` FROM `reservations`";
										// $sql_stmt = $pdo->query($sql);
										// $sql_stmt->fetch(PDO::FETCH_BOTH);
												//echo "<script type='text/javascript'> alert('Guest Room booking is conform')</script>";
												//echo "<script type='text/javascript'> window.location='home.php'</script>";
												//  $type_of_room = 0;       
												// 		if($troom=="Sweet")
												// 		{
												// 			$type_of_room = 320;
														
												// 		}
												// 		else if($troom=="Deluxe Room")
												// 		{
												// 			//$type_of_room = 220;
												// 			echo"yeeeeeees";
												// 		}
												// 		else if($troom=="Special Room")
												// 		{
												// 			$type_of_room = 180;
												// 		}
												// 		else if($troom=="Cozy Room")
												// 		{
												// 			$type_of_room = 150;
												// 		}
														
														
													
														
														// if($bed=="single")
														// {
														// 	$type_of_bed = $type_of_room * 1/100;
														// }
														// else if($bed=="double")
														// {
														// 	$type_of_bed = $type_of_room * 2/100;
														// }
														// else if($bed=="triple")
														// {
														// 	$type_of_bed = $type_of_room * 3/100;
														// }
														// else if($bed=="quad")
														// {
														// 	$type_of_bed = $type_of_room * 4/100;
														// }
														// else if($bed=="none")
														// {
														// 	$type_of_bed = $type_of_room * 0/100;
														// }
														
														
														
														
														//$ttot = 20;//$type_of_room * $days * $nroom;
														
														//$btot = 30;//$type_of_room *$days;
														
														//$fintot = $ttot + $btot ;
														
															
															//echo "<script type='text/javascript'> alert('$count_date')</script>";
															
															
														$psql = "INSERT INTO `payment`(`fname`, `lname`, `room_category`, `amount`, `start`, `end`) VALUES (:fname,:lname,:room_category,:amount,:start,:end)";
														$psql_stmt = $pdo->prepare($psql);
														$psql_stmt->execute([":fname"=>$fname,":lname"=>$lname,":room_category"=>$troom,":amount"=>$nroom,":start"=>$cin,":end"=>$cout]);
														
														
														// if($psql_stmt->fetch(PDO::FETCH_OBJ))
														// {	$notfree="NotFree";
															
														// 	$rpsql = "UPDATE `rooms` SET `place`='$notfree' where  `category_id`= '4'";
														// 	$rpsql_stmt = $pdo->query($rpsql);
															
														// 	if($rpsql_stmt->fetchAll())
														// 	{
														// 	echo "<script type='text/javascript'> alert('Booking Conform')</script>";
														// 	echo "<script type='text/javascript'> window.location='roombook.php'</script>";
														// 	}
															
															
														}
														
											}
											
                                        
								
					
						
					
									
									
							
						?>