<?php
if(!isset($_SESSION))
    session_start();
$connection= mysqli_connect("localhost","root","","ewu");
$sql="SELECT * FROM department";
$select=mysqli_query($connection,$sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>EWU Course Catalog</title>
    </head>
    <body>
        
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
    <a href="login.php">Login</a>
        <a href="admin/index.php">Admin</a>
        <h1>East West University | Course Catalog</h1>
    
        
    <?php
        
        while($record= mysqli_fetch_assoc($select)){
            $did=$record["departmentid"];
            echo "<a href='course.php?id=$did'>" .$record["departmentname"] ."</a><br><br>";
        }
        ?>

    
    </body>

</html>