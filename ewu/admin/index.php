<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["admin"])){
    header("location:login.php");
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Home</title>
    
    </head>
    <body>
        
        <a href="../index.php">Home</a>
        <a href="../register.php">Register</a>
        <a href="../login.php">Login</a>
        <a href="login.php">Admin</a>
        <a href="logout.php">Logout</a>
        
        <h1>Admin Panel</h1>
        <a href="department.php">Add Department</a>
        <a href="course.php">Approve Course</a>
        <a href="register.php">Admin Registration</a>
        
        
        
        
        
        
    </body>
</html>