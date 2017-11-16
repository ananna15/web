<?php
if(!isset($_SESSION))
    session_start();

//if(!isset($_SESSION["admin"]))
  //  header("location:admin/index.php");
if(!isset($_SESSION["user"]))
    header("location:index.php");
if(isset($_SESSION["user"])){    
$userid=$_SESSION["userid"];
}
$connection=mysqli_connect("localhost","root","","ewu");
$sql="SELECT * FROM department";
$department=mysqli_query($connection,$sql);

if($_POST){
    $department =$_POST["department"];
    $c_code=$_POST["coursecode"];
    $c_name=$_POST["coursename"];
    $description=$_POST["description"];
    $credit=$_POST["credit"];
    $prerequisite=$_POST["prerequisite"];
        
        $query="INSERT INTO course(coursecode,coursename,description,credit,prerequisite,userid,departmentid) VALUES('$c_code','$c_name','$description','$credit','$prerequisite','$userid','$department')";
 
        $sql=mysqli_query($connection,$query);
        if($sql){
            echo "<script>alert('course Added Successfully.');
            </script>";
            header("location:user.php");
        }
            
    else{
        $_SESSION["error"]= "ERROR Occurred!! Try  Again.";
        }
    echo mysqli_error($connection);
    }
    ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Home</title>
    
    </head>
    <body>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>   
        <a href="register.php">Register</a>
        <a href="admin/index.php">Admin</a>
          <a href="logout.php">Logout</a>
            <h1>Add New Course Into Course Catalog</h1>
        
          <form method="post">
                <label for="department">Department</label> 
              <select name="department">
              <option value="" hidden selected >Select Department</option>
                  <?php while($code = mysqli_fetch_assoc($department)){?>
                  <option value="<?php echo $code['departmentid']?>">
                      <?php echo $code['departmentcode']?>
                  </option>
                  <?php } ?>
              </select><br><br>
             
            <label for="coursecode">Course Code</label>
        <input type="text" name="coursecode"id="coursecode" placeholder="cse101" required>
            <br>
            <br>
            <label for="coursename">Course Name</label>
             <input type="coursename" name="coursename" id="coursename" placeholder="course name">
            <br><br>  
            <label for="description">Description</label>
              <textarea name="description" id="description" placeholder="     description"></textarea>
            <br><br>
            
            <label for="credit">Credit</label>
            <input type="credit"  name="credit" id="credit" placeholder="credit">
            <br><br>
            <label for="prerequisite">Pre-requisite</label>
             <input type="prerequisite" name="prerequisite" id="prerequisite" placeholder="pre-requisite">
            <br><br>
                <input type="submit" value="Add Course">
                <input type="reset" value="Reset">
        </form>
      
    </body>
</html>