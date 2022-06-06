<?php  

session_start();  
if(!isset($_SESSION["username"]))
{
 header("location:index.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOTEL CALIFORNIA</title>
	<!-- Bootstrap Styles-->
    <link href="public/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="public/font-awesome.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
			
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
                        <a  href="roomav.php"><i class="fa fa-dashboard"></i>Rooms Status</a>
                    </li>
					<li>
                        <a  class="active-menu" href="roomadd.php"><i class="fa fa-plus-circle"></i>Add Room</a>
                    </li>
                    <li>
                        
                    </li>
					

                    
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
       
        
       
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                           NEW ROOM <small></small>
                        </h1>
                    </div>
                </div> 
                 
                                 
            <div class="row">
                
                <div class="col-md-5 col-sm-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ADD NEW ROOM
                        </div>
                        <div class="panel-body">
						<form name="form" method="post">
                            <div class="form-group">
                                            <label>CATEGORIES *</label>
                                            <select name="troom"  class="form-control" required>
												<option value selected ></option>
                                                <option value="Superior Room">SWEET ROOM</option>
                                                <option value="Deluxe Room">DELUX ROOM</option>
												<option value="Guest House">SPECIAL ROOM</option>
												<option value="Single Room">COZY ROOM</option>
                                            </select>
                              </div>
							  
								<div class="form-group">
                                            <label>Bedding Type</label>
                                            <select name="bed" class="form-control" required>
												<option value selected ></option>
                                                <option value="Single">Single</option>
                                                <option value="Double">Double</option>
												<option value="Triple">Triple</option>
                                                <option value="Quad">Quad</option>
												<option value="Triple">None</option>
                                                                                             
                                            </select>
                                            
                               </div>
							 <input type="submit" name="add" value="Add New" class="btn btn-primary"> 
							</form>
							<?php
							 include('db.php');
							 if(isset($_POST['add']))
							 {
										$room = $_POST['troom'];
										$bed = $_POST['bed'];
                                        $place = 'Free';
                                        
										
										$sql="select * from categories c LEFT JOIN rooms r ON c.id = r.category_id WHERE name = '$room' AND bed = '$bed'";
										$sql_stmt = $pdo->query($sql);
                                        $result_sql = $sql_stmt->fetch(PDO::FETCH_BOTH);
                                       
										if($result_sql [0]> 1) {
                                        	echo "<script type='text/javascript'> alert('Room Already Exists')</script>";
                                     
										}
                                       
										 if ($room == "Superior Room")
										{
                                            
                                           // $result_sql = $pdo->query($sql);
                                        //foreach($result_sql as $row){
                                           // $row['r.category_id'];
										
                                        $insert_sql ="INSERT INTO  `rooms` (`bed`,`place`, `category_id`) 
                                                      VALUES (:bed,:place,:catid)";
                                        $stmt = $pdo->prepare($insert_sql);
                                        $stmt->execute([
                                            ':bed'        => $bed,
                                            ':place'      => $place,
                                            ':catid'      => 1,
                                            
                                        ]);
                                        
                                        $lastid = $pdo->lastInsertId();

                                      
										if($insert_sql)
										{
                                         echo '<script>alert("New Room Added") </script>' ;
                                         $sql = "SELECT * FROM `rooms` WHERE id=:lastid";
                                         $stmt = $pdo->prepare($sql);
                                         $stmt->execute([':lastid' => $lastid]);
                                         
                                         while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                                            echo $row->id ."<br>"
                                                . $row->floor ."<br>"
                                                . $row->category_id . "<br>"
                                                . $row->number ."<br>"
                                                . $row->bed ."<br>"
                                                . $row->place;                                        
                                             }


                                        }
                                    }
                                         else if ($room == "Deluxe Room")
										{
                                            
                                           // $result_sql = $pdo->query($sql);
                                        //foreach($result_sql as $row){
                                           // $row['r.category_id'];
										
                                        $insert2_sql ="INSERT INTO  `rooms` (`bed`,`place`, `category_id`) 
                                                      VALUES (:bed,:place,:catid)";
                                        $stmt = $pdo->prepare($insert2_sql);
                                        $stmt->execute([
                                            ':bed'        => $bed,
                                            ':place'      => $place,
                                            ':catid'      => 2,
                                            
                                        ]); 
                                        $lastid2 = $pdo->lastInsertId();
                                        if($insert2_sql)
										{
                                         echo '<script>alert("New Room Added") </script>' ;
                                         $sql = "SELECT * FROM `rooms` WHERE id=:lastid";
                                         $stmt = $pdo->prepare($sql);
                                         $stmt->execute([':lastid' => $lastid2]);
                                         while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                                            echo $row->id ."<br>"
                                                . $row->floor ."<br>"
                                                . $row->category_id . "<br>"
                                                . $row->number ."<br>"
                                                . $row->bed ."<br>"
                                                . $row->place;                                        
                                             }
                                        } }
                                        else if ($room == "Guest House")
										{
                                            
                                           // $result_sql = $pdo->query($sql);
                                        //foreach($result_sql as $row){
                                           // $row['r.category_id'];
										
                                        $insert2_sql ="INSERT INTO  `rooms` (`bed`,`place`, `category_id`) 
                                                      VALUES (:bed,:place,:catid)";
                                        $stmt = $pdo->prepare($insert2_sql);
                                        $stmt->execute([
                                            ':bed'        => $bed,
                                            ':place'      => $place,
                                            ':catid'      => 4,
                                            
                                        ]); 
                                        $lastid2 = $pdo->lastInsertId();
                                        if($insert2_sql)
										{
                                         echo '<script>alert("New Room Added") </script>' ;
                                         $sql = "SELECT * FROM `rooms` WHERE id=:lastid";
                                         $stmt = $pdo->prepare($sql);
                                         $stmt->execute([':lastid' => $lastid2]);
                                         while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                                            echo $row->id ."<br>"
                                                . $row->floor ."<br>"
                                                . $row->category_id . "<br>"
                                                . $row->number ."<br>"
                                                . $row->bed ."<br>"
                                                . $row->place;                                        
                                             }
                                        } }
                                        else if ($room == "Single Room")
										{
                                            
                                           // $result_sql = $pdo->query($sql);
                                        //foreach($result_sql as $row){
                                           // $row['r.category_id'];
										
                                        $insert2_sql ="INSERT INTO  `rooms` (`bed`,`place`, `category_id`) 
                                                      VALUES (:bed,:place,:catid)";
                                        $stmt = $pdo->prepare($insert2_sql);
                                        $stmt->execute([
                                            ':bed'        => $bed,
                                            ':place'      => $place,
                                            ':catid'      => 3,
                                            
                                        ]); 
                                        $lastid2 = $pdo->lastInsertId();
                                        if($insert2_sql)
										{
                                         echo '<script>alert("New Room Added") </script>' ;
                                         $sql = "SELECT * FROM `rooms` WHERE id=:lastid";
                                         $stmt = $pdo->prepare($sql);
                                         $stmt->execute([':lastid' => $lastid2]);
                                         while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                                            echo $row->id ."<br>"
                                                . $row->floor ."<br>"
                                                . $row->category_id . "<br>"
                                                . $row->number ."<br>"
                                                . $row->bed ."<br>"
                                                . $row->place;                                        
                                             }
                                        }
                                        else {
											echo '<script>alert("Sorry ! Check The System") </script>' ;
										}
							 }
							}
							
							?>
                        </div>
                        
                    </div>
                </div>
                
                  
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            ROOMS INFORMATION
                        </div>
                        <div class="panel-body">
								<!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <?php
						$sql = "select * from categories c LEFT JOIN rooms r ON c.id = r.category_id ";
						$res_sql = $pdo->query($sql);
						?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Room ID</th>
                                            <th>Category</th>
											<th>Bedding</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
                                    //	while($row= mysqli_fetch_array($re))
                                    foreach($res_sql as $row)
										{
												$id = $row['id'];
											if($id % 2 == 0) 
											{
												echo "<tr class=odd gradeX>
													<td>".$row['id']."</td>
													<td>".$row['name']."</td>
												   <th>".$row['bed']."</th>
												</tr>";
											}
											else
											{
												echo"<tr class=even gradeC>
													<td>".$row['id']."</td>
													<td>".$row['name']."</td>
												   <th>".$row['bed']."</th>
												</tr>";
											
											}
										}
									?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    
                       
                            
							  
							 
							 
							  
							  
							   
                       </div>
                        
                    </div>
                </div>
                
               
            </div>
                    
            
				
					</div>
			 <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
