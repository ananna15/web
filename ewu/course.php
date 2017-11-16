<?php
if(!isset($_SESSION))
    session_start();
if($_GET){
    $did=$_GET['id'];
 $connection=mysqli_connect("localhost","root","","ewu");
    $query="SELECT * FROM department WHERE  departmentid='$did'";
    $department=mysqli_query($connection,$query);
    if($department){
        $row=mysqli_fetch_assoc($department);
    }
$sql="SELECT * FROM course WHERE departmentid='$did'";
$table = mysqli_query($connection,$sql);
    
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>EWU Course Catalog</title>
        
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        
    </head>
    <body class="container">
    <a href="index.php">Home</a>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
    <a href="admin/index.php">Admin</a>
<h1>Course Catalog Of Department Of <?php echo  $row['departmentname'];?></h1>
        
<?php
 while($record=mysqli_fetch_assoc($table)){
     
     ?>
        <div class="jumbotron col-sm-6">
<?php
    echo "<b>Course Code:</b> ". $record['coursecode'] . "<br>";
    echo "<b>Coursename:</b> ". $record['coursename'] . "<br>";
    echo "<b>Description:</b> ". $record['description'] . "<br>";
    echo "<b>Credit:</b> ". $record['credit'] . "<br>";
    echo "<b>Prerequisite:</b> ". $record['prerequisite'] . "<br>";
    echo "<br><br>";
        ?>
        </div>
            <?php
        }

    ?>
    </body>

</html>