<?php
        if($_POST){
                $name=$_POST["username"];
                $pass=$_POST["password"];
                $email=$_POST["email"];
                $phone=$_POST["phone"];
                $fullname=$_POST["fullname"];
        
        $connection=mysqli_connect("localhost","root","","ewu") or die;
        if($connection){
                echo "connected";
            echo"<br>";
                }
                else
                echo "not connected";
        
        $query="INSERT INTO admin(username,password,email,phone,fullname) VALUES('$name','$pass','$email','$phone','$fullname')";
 
        $sql=mysqli_query($connection,$query);
        if($sql){
            echo "Admin Added<br>";
            
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
        
        <a href="../index.php">Home</a>
        <a href="../register.php">Register</a>
        <a href="../login.php">Login</a>
        <a href="index.php">Admin</a>
        <h1>Admin Register</h1>
        <a href="department.php">Add Department</a>
        <a href="course.php">Approve Course</a>
        <a href="register.php">Admin Registration</a>
        <br><br>
        
        <form method="post" action="register.php">
            <label for="username">User name</label>
        <input type="text" name="username" id="username" placeholder="University id" >
            <br>
            <br>
            
            <label for="password">password</label>
            <input type="password"  name="password" id="password" placeholder="Password" >
            <br><br>
            <label for="fullname">Full Name</label>
             <input type="fullname" name="fullname" id="fullname" placeholder="Fullname">
            <br><br>
            
            <label for="email">Email</label>
            <input type="email"  name="email" id="email" placeholder="email">
            <br><br>
            <label for="phone">Phone</label>
             <input type="phone" name="phone" id="phone" placeholder="phone">
            <br><br>
                <input type="submit" value="Register">
                <input type="reset" value="Reset">
         
        </form>
  </body>
</html>