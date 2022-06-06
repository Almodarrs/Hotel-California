<?php  

session_start();
if(isset($_SESSION['username'])) {
header('location:home.php');
}




?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>CALIFORNIA ADMIN</title>
  
  
     
      <link rel="stylesheet" href="public/style.css?<?php echo time() ?>">

  
</head>
<body>
  <div id="clouds">
	<div class="cloud x1"></div>
	<!-- Time for multiple clouds to dance around -->
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

 <div class="container">

 <?php
if(isset($message)) {
echo $message;
}
?>
      <div id="login">

        <form action="index.php" method="post" >

          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text"  name="username" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password" name="password"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" name="login"  value="Login"></p>

          </fieldset>

        </form>

       

      </div> <!-- end login -->

    </div>
    <div class="bottom">  <h3><a id="atchd-clr" href="../index.php">CALIFORNIA HOMEPAGE</a></h3></div>
  
  
</body>
</html>
<?php
include('db.php');


if(isset($_POST['login'])) {

$user = $_POST['username'];
$pass = $_POST['password'];

if(empty($user) || empty($pass)) {
  $message = 'All field are required';
} else {
$query = $pdo->prepare("SELECT username, password FROM login WHERE 
username=? AND password=? ");
$query->execute(array($user,$pass));
$row = $query->fetch(PDO::FETCH_BOTH);

if($query->rowCount() == 1) {
  $_SESSION['username'] = $user;
  header('location:home.php');
} else {
  $message = "Username/Password is wrong";
}


}

}
?>