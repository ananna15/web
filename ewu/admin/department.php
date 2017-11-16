
<?php
if(!isset($_SESSION)){
    session_start();

    if($_SESSION["admin"]!="admin"){
        
        header("location:login.php");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EWU Course Catalog</title>
    </head>
    <body>
        
        <a href="../index.php">Home</a>
    <a href="../register.php">Register</a>
    <a href="../login.php">Login</a>
        <a href="index.php">Admin</a>
    <h1>Add Department</h1>
        <a href="department.php">Add Department</a>
        <a href="course.php">Approve Course</a>
        <a href="register.php">Admin Registration</a>
        <br><br>
         <form method="post" action="department.php">
            <label for="departmentname">Department Name</label>
        <input type="text" name="departmentname"id="departmentname" placeholder="department name" required>
            <br>
            <br>
            
            <label for="departmentcode">Department Code</label>
            <input type="text"  name="departmentcode" id="departmentcode" placeholder="cse" required>
            <br><br>
            <input type="submit" value="Add Department">
            <input type="reset" value="Reset">
        </form>
    <?php
        if($_POST){
            $name=$_POST["departmentname"];
            $code=$_POST["departmentcode"];     
         $connection=mysqli_connect("localhost","root","","ewu") or die;
        if($connection){
                echo "connected";
                }
                else{
                echo "not connected";
                }
            
        $query="INSERT INTO department(departmentname,departmentcode) VALUES('$name','$code')";
 
        $sql=mysqli_query($connection,$query);
        if($query){
            echo "Department Added<br>";
            
        }else{
            echo "ERROR!! Try  Again<br>";
        }
    }
        
        ?>
        
    </body>

</html>