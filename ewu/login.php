<?php
if(!isset($_SESSION))
    session_start();

        if($_POST){
            $name=$_POST["userid"];
                $pass=$_POST["password"]; 
$connection=mysqli_connect("localhost","root","","ewu") or die ("Error");     
        $sql="SELECT * FROM user WHERE uniid='$name' AND password='$pass'";
        $query=mysqli_query($connection,$sql);
            $num= mysqli_num_rows($query);
        if($num){
            $_SESSION["user"]= "user";
            $user= mysqli_fetch_assoc($query);
            $_SESSION["userid"]=$user["userid"];
        $_SESSION["username"]=$user["uniid"];
    $_SESSION["userpassword"]=$user["password"];
            header("location: user.php");
    }
     else
        $_SESSION["error"]="User not found!!! Try again .";
    
        }
    ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Home</title>
    
    </head>
    <body>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="admin/index.php">Admin</a>
        <h1>User Login</h1>
        
        <form method="post" action="login.php">
            <div>
            <label for="user id">Username</label>
            <input type="text" name="userid"id="userid" placeholder="student id">
            </div>
            <div>
            <label for="password">password</label>
            <input type="password"  name="password" id="password" placeholder="Password"required>
            </div>
        <div>
        <input type="submit" value="Login">
            </div>
        </form> 
        <?php
        if(isset($_SESSION["error"])){
            echo $_SESSION["error"] . "<br>";
            $_SESSSION["error"]= "";
        }
        ?>
    </body>
    
</html>