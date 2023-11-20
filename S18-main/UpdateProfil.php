<?php 

require_once "config.php";

session_start();

$user_name = $user_password = $user_email = $user_bio = $user_frequency = $user_age = $user_img = "" ;


$name = $_SESSION["user_name"];
$user_name = $_POST["user_name"];
$user_password = $_POST["user_password"];
$user_email = $_POST["user_email"];
$user_bio =$_POST["user_bio"];
$user_frequency =$_POST["user_frequency"] == 2 ? 1 : 0;
$user_age = $_POST["user_age"] == "under_13" ? 1 : 0 ;


$filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./img/avatar/".$filename;

   if(empty($filename)){


$sql = "UPDATE user SET name=?, email=?, password=?, age=?, bio=?,frequency=? WHERE name=?";


if($stmt = mysqli_prepare($link, $sql)){
  mysqli_stmt_bind_param($stmt, "sssssss", $user_name,$user_email,$user_password,$user_age,$user_bio,$user_frequency,$name);

  if(mysqli_stmt_execute($stmt)){
$_SESSION["user_name"]=$user_name;  
header("location: dashboard.php");
exit;  
    
  }}


   }else{
    move_uploaded_file($tempname, $folder);
    $user_img = "http://localhost/S18/img/avatar/".$filename;



$sql = "UPDATE user SET name=?, email=?, password=?, age=?, bio=?,frequency=?,img_url=? WHERE name=?";


if($stmt = mysqli_prepare($link, $sql)){
  mysqli_stmt_bind_param($stmt, "ssssssss", $user_name,$user_email,$user_password,$user_age,$user_bio,$user_frequency,$user_img,$name);

  if(mysqli_stmt_execute($stmt)){
$_SESSION["user_name"]=$user_name;  
header("location: dashboard.php");
exit;  
    
  }}
   }





   
?>