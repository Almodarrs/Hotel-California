<?php
print_r($_POST);

include ('db.php');

?>

<!Doctype HTML>
<html>
<head>
</head>
<body>
<div class="panel-heading">
                            PERSONAL INFORMATION
                        </div>
<form method="post" action=''>
<div>
<label > First Name</lable>
<input name='first_name'>
</div>
<div>
<label> Last Name</label>
<input name='last_name'>
</div>
<div>
<label> Telephone </label>
<input name='phone'>
</div>

<div class="panel-heading">
                            PERSONAL INFORMATION
                        </div>

                        <label> Type Of Room</label>
                        <select name="troom" >
                        <option value selected ></option>
                        <option vlaue="<?php $sql = "SELECT `name` from categories" ?>">Sweet</option>
                        </select>
<input type='submit' name='submit'>
<?php
if(isset($_POST['submit']))
{
    try {

        // connect to mysql

        $pdoConnect = new PDO("mysql:host=$host;dbname=$db","$user","");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }

$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$phone = $_POST['phone'];


$pdoQuery = "INSERT INTO `customers`(`first_name`, `last_name`, `phone`) VALUES (:first_name,:last_name,:phone)";
    
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    
    $pdoExec = $pdoResult->execute(array(":first_name"=>$fname,":last_name"=>$lname,":phone"=>$phone));


    $select_pdoQuery = 'SELECT * FROM categories' ;
    $pdoQuery_stmt = $pdoConnect->query($select_pdoQuery);
    $categories = $result_pdoQuery = $pdoQuery_stmt->fetchAll();

    $select_pdoQuery = 'SELECT * FROM customers' ;
    $pdoQuery_stmt = $pdoConnect->query($select_pdoQuery);
    $customers = $result_pdoQuery = $pdoQuery_stmt->fetchAll();

    foreach ($customers as $customer){
        ?>
        
        <div>
        <hr>
        <h4><?php echo  $customer['first_name']; ?> </h4>
        <?php

        echo "<select name=\"test\">";

        foreach($categories as $category)
        {
            echo "<option value=\"{$category['id']}}\">{$category['name']}</option>";
        }

        echo "</select>" ;
        echo "<hr />";
    }
       
} 

?>
</body>
</html>