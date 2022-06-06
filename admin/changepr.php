<?php

include ('db.php');

?>
<!Doctype HTML>
<html>
<head>
<title> Change The Price</title>
<link href="public/bootstrap.css" rel="stylesheet" />
<link href="public/custom-styles.css" rel="stylesheet" />
</head>

<body>
<div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a  href="home.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>
                    
					</ul>

            </div>

            </nav>
       
       <div id="page-wrapper" >
           <div id="page-inner">
            <div class="row">
                   <div class="col-md-12">
                       <h1 class="page-header">
                           CHANGE THE PRICE <small></small>
                       </h1>
                   </div>
               </div> 
                
                                
           <div class="row">
               
               <div class="col-md-5 col-sm-5">
                   <div class="panel panel-primary">
<div class="panel-heading">
                           Change it below:
                       </div>
                       <form method="post" >
<div class="form-group">
<label> Category</label>
                        <select name="room_category" class="form-control" required>
                        <option value selected ></option>
                        <option vlaue="sweet">Sweet</option>
                        <option value="delux room">Deluxe Room</option>
                        <option value="special room">Special Room</option>
                        <option value="cozy room">Single Room</option>
                        </select>
<label > Price input</lable>
<input name="price" class="form-control" required>
</div>
<input type='submit' name='submit' value='Change'>
<?php
if(isset($_POST['submit']))
{
    $troom = $_POST['room_category'];
    $price = $_POST['price'];
    $sql_update = "UPDATE `categories` SET price =:price WHERE name =:troom";
    $sql_update_stmt = $pdo->prepare($sql_update);
    $sql_update_stmt->execute([':price'=>$price, ':troom'=>$troom]);
}
?>
</body>
</html>