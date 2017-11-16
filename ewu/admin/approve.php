<?php
if(!isset($_SESSSION))
 session_start();

if(!isset($_SESSION["admin"])) 
    header("location:login.php");
if(isset($_SESSION["admin"])){
$connection= mysqli_connect("localhost","root","", "ewu");
}
if($_POST){
 $adminid=$_POST['adminid'];
 $courseid=$_POST['courseid'];
 $sql=" UPDATE course SET adminid='$adminid' WHERE courseid='$courseid'";
 $update = mysqli_query($connection,$sql);
 if($update){
 $_SESSION["success"]= "course approve.";
 header("location:course.php");
 }
else{
 $_SESSION["error"]= "Error Occured!! Try Again.";
 header("location:course.php");
 }
}
?>