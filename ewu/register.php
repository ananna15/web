<?php
        if($_POST){
            $id=$_POST["uniid"];
                $pass=$_POST["password"];
                $email=$_POST["email"];
                $phone=$_POST["phone"];
        
        $connection=mysqli_connect("localhost","root","","ewu") or die;
        if($connection){
                echo "connected";
                }
                else
                echo "not connected";
        
        $query="INSERT INTO user(uniid,password,email,phone) VALUES('$id','$pass','$email','$phone')";
 
        $sql=mysqli_query($connection,$query);
        if($sql){
            echo "User Added<br>";
            
        }else{
            echo "ERROR!! Try  Again<br>";
        }
    }
        
        ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Home</title>
    
    </head>
    <body>
        <br>
        <a href="../index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
        <a href="admin/index.php">Admin</a>
        <h1> Registration</h1>
        
         <form method="post" action="register.php">
            <label for="uniid">University ID</label>
        <input type="text" name="uniid"id="uniid" placeholder="University Id">
            <br>
            <br>
            
            <label for="password">Password</label>
            <input type="password"  name="password" id="password" placeholder="Password">
            <br><br>
            
            <label for="email">Email</label>
            <input type="email"  name="email" id="email" placeholder="aaaa@gmail.com">
            <br><br>
            <label for="phone">Phone</label>
             <input type="phone" name="phone" id="phone" placeholder="01721000000">
            <br><br>
                <input type="submit" value="Register">
                <input type="reset" value="Reset">
         
        </form>
        
    </body>
</html>