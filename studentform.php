<?php

session_start();
$_SESSION['message'] = '';
//connection variables
require_once('db.php');

//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        //set all the post variables
        $name = $_POST['name'];
        $Rollno = $POST['Rollno'];
        $dept = $POST['dept'];
        $email = $_POST['email'];
      
                //insert user data into database
                  $sql = "INSERT INTO student(name,Rollno,dept,email) 
                         VALUES ('$name','$Rollno','$dept','$email')";
                $query=mysqli_query($con,$sql);
                //if the query is successsful, redirect to welcome.php page, done!
                if ($query){
                    echo ' Registered. ';
                    header('location:header_for_stud.php');
             
                }
                else {
                  
                    $_SESSION['message'] = 'User could not be added to the database!';
                }
                $mysqli->close();          
    
}
?>

<html>
<link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
  <div class="module">
    <h1>Create account as a Student!</h1>
    <form class="form" action="studentform.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="UserName" name="name" required />
      <input type="Email" placeholder="Email" name="email" required />
     
      <input type="number" placeholder="Roll_no" name="Rollno" required />
      <input type="text" placeholder="Dept" name="dept" required />
      
     
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>

</html>

