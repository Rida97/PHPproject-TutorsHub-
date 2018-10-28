<?php
session_start();

require_once 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$password=$_POST['password'];
$email=$_POST['email'];
     //  $sql_cc = "SELECT id,course_code,course_name FROM course WHERE course_name='$course_name2' limit 1";
$sql="SELECT name,password FROM tutor WHERE password = '$password' limit 1";
$result = mysqli_query($con,$sql);
                      $value = mysqli_fetch_object($result); 
                      $username = $value->name;    
                                                    //name of that particular tutor!
$_SESSION['username']=$username;
                    
                       header('location:header_tutor.php');
}
?>

<html>
    
<link rel="stylesheet" href="form.css" type="text/css">

<div class="body-content">
  <div class="module">
    <h1>Tutor Login</h1>
    <form class="form" action="tutorlogin.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      
      <input type="email" placeholder="email" name = "email" required /> 
      <input type="text" placeholder="password" name = "password" required />
      
       <input type="submit" value="Login" name="login" class="btn btn-block btn-primary" />
    </form>
   
         
 
  </div>
</div>
    
</html>