<?php
if(!isset($_SESSION))
    session_start();
if($_POST){
    $name=$_POST["username"];
    $pass=$_POST["password"];
    $connection=mysqli_connect("localhost","root","","ewu") or die ("Error");
    if($connection){
        $sql="SELECT * FROM admin WHERE username='$name' AND password='$pass'";
        $query=mysqli_query($connection,$sql);
        $num= mysqli_num_rows($query);
        if($num==0){
            echo "User not found<br>";
            
        }
        else{
            $_SESSION["admin"]="admin";
            $record=mysqli_fetch_assoc($query);
            $_SESSION["adminid"]=$record['adminid'];
            header("location:index.php");
        }
        mysqli_close($connection);
    }else{
        echo "connection error";
    }
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
        <a href="index.php">Admin</a>
        <h1>Admin Login</h1>
        
        <form method="post" action="login.php">
            <div>
            <label for="username">Username</label>
            <input type="text" name="username"id="username" placeholder="User Name">
            </div>
            <br>
            <br>
            
            <label for="password">password</label>
            <input type="password"  name="password" id="password" placeholder="Password"required>
            <br><br>
        
        <input type="submit" value="login">
        </form>  
        
    </body>
</html>