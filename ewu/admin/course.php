<?php
if(!isset($_SESSION))
    session_start();
if(!isset($_SESSION["admin"]))
    header("location:login.php");
if(isset($_SESSION["admin"])){
    $connection=mysqli_connect("localhost","root","","ewu");
    $sql= "SELECT * FROM course JOIN department ON course.departmentid=department.departmentid JOIN user ON course.userid=user.userid WHERE adminid IS NULL";
    $select= mysqli_query($connection,$sql);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>EWU Course Catalog</title>
    </head>
    <body>
        
    <a href="../index.php">Home</a>
    <a href="index.php">Admin</a>
    <a href="department.php">Add Department</a>
        <a href="course.php">Approve Course</a>
        <a href="register.php">Add new Admin </a>
        <a href="logout.php">Logout </a>
            <br>
        <h1>Approve Course</h1>
        
        
<?php
        if(isset($_SESSION["success"])){
            echo $_SESSION["success"] . "<br>";
            $_SESSION["success"] = "";
        }
 ?>

<?php
        if(isset($_SESSION["error"])){
            echo $_SESSION["error"] . "<br>";
            $_SESSION["error"] = "";
        }
        
?>  
        
        
<?php
while($course=mysqli_fetch_assoc($select)){ 
    echo "<b> Department:</b> ". $course['departmentcode'] . "<br>";
    echo "<b> Coursecode:</b> ". $course['coursecode'] . "<br>";
    echo "<b> Coursename:</b> ". $course['coursename'] . "<br>";
    echo "<b> Description:</b> ". $course['description'] . "<br>";
    echo "<b> Credit:</b> ". $course['credit'] . "<br>";
    echo "<b> Prerequisite:</b> ". $course['prerequisite'] . "<br>";
    echo "<b>user:</b> ". $course['uniid'] . "<br>";
    
  ?>  
   <form method="post" action="approve.php">
        <input hidden type="text" name="courseid" value="<?php echo $course['courseid']; ?>">
        <input hidden type="text" name="adminid" value="<?php echo $_SESSION['adminid'];?>">
        <input type="submit" value="Approve">      
    </form> 
    <form method="post" action="reject.php">
        <input hidden type="text" name="courseid" value="<?php echo $course['courseid']; ?>">
        <input hidden type="text" name="adminid" value="<?php echo $_SESSION['adminid'];?>">
        <input type="submit" value="Reject">      
    </form> 
 <?php
    
    
}           
        
  ?>      
    
    </body>

</html>