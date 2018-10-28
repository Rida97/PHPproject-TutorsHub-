<?php
session_start();
$_SESSION['message'] = '';
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
       if ($_POST['password'] == $_POST['confirmpassword'])
     {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password']; //md5 has password for security
                    $gender=$_POST['gender'];
                    $batch=$_POST['batch'];
                    $dept=$_POST['dept'];
                    $contact_no=$_POST['contact_no'];
                    $rollno = $_POST['rollno'];
                    $course_name1 = $_POST['coursename1'];
                    $course_name2 = $_POST['coursename2'];
                    $course_name3 = $_POST['coursename3'];    
                        
             $sql = "INSERT IGNORE INTO tutor(name,email,password,gender,batch,dept,contact_no,rollno) 
                    VALUES ('$name','$email','$password','$gender','$batch','$dept','$contact_no',$rollno)";
               
                    if(mysqli_query($con, $sql))
                      {  $tutor_id = mysqli_insert_id($con); // Obtain last inserted id
                       echo"  tutor id: ".$tutor_id;                     }
                     
                    else
                       { echo "ERROR: Could not able to execute $sql. " . mysqli_error($con); }
 
 echo "</select>";// Closing of list box
//$course_id = $_POST['id'];
                       
                 $_SESSION['tutor_id'] =$tutor_id;
                
                      $sql_c = "SELECT id,course_code,course_name FROM course WHERE course_name='$course_name1' limit 1";
                      $result = mysqli_query($con,$sql_c);
                      $value = mysqli_fetch_object($result); 
                      $course_id1 = $value->id;                         //id of that particular course!
                                        
                 $_SESSION['course_id'] =$course_id1;
                 if($sql_c)
                 {
                      echo"  tutor id: ".$tutor_id;                     
                      echo"  course id: ".$course_id1; 
                      $query = "INSERT INTO tutorcourse(tutor_id,course_id)
                                          VALUES ('$tutor_id','$course_id1')";
                  if(mysqli_query($con, $query))
                   { echo"  course id: ".$course_id1;   
                   echo '  record 01 inserted in tutor course ';
                   }
 else {                       echo ' cant be insered ';}
                 }
                 
                    $sql_cc = "SELECT id,course_code,course_name FROM course WHERE course_name='$course_name2' limit 1";
                      $result = mysqli_query($con,$sql_cc);
                      $value = mysqli_fetch_object($result); 
                      $course_id2 = $value->id;                         //id of that particular course!
                                        
                 $_SESSION['course_id'] =$course_id2;
                 if($sql_cc)
                 {
                      echo"  tutor id: ".$tutor_id;                     
                      echo"  course id: ".$course_id2; 
                      $query = "INSERT INTO tutorcourse(tutor_id,course_id)
                                          VALUES ('$tutor_id','$course_id2')";
                  if(mysqli_query($con, $query))
                   { echo"  course id: ".$course_id2;   
                   echo '  record 02 inserted in tutor course ';
                   }
 else {                       echo ' cant be insered ';}
                 }
                 
                  if( empty($_POST['coursename3']))
                  {
                      echo '            ';
                  }
                  else
                  {
                      $sql_ccc = "SELECT id,course_code,course_name FROM course WHERE course_name='$course_name3' limit 1";
                      $result = mysqli_query($con,$sql_ccc);
                      $value = mysqli_fetch_object($result); 
                      $course_id3 = $value->id;                         //id of that particular course!
                                        
                 $_SESSION['course_id'] =$course_id3;
                 if($sql_ccc)
                 {
                      echo"  tutor id: ".$tutor_id;                     
                      echo"  course id: ".$course_id3; 
                      $query = "INSERT INTO tutorcourse(tutor_id,course_id)
                                          VALUES ('$tutor_id','$course_id3')";
                  if(mysqli_query($con, $query))
                   { echo"  course id: ".$course_id3;   
                   echo '  record 03 inserted in tutor course ';
                       header('location:header.php');
                   }
 else {                       echo ' cant be insered ';}
                 }
                  }
               //  $sql_cc = "SELECT id,course_code,course_name FROM course WHERE course_name='$course_name2' limit 1";
               //       $result = mysqli_query($con,$sql_cc);
               //       $value = mysqli_fetch_object($result); 
                //      $course_id2 = $value->id;                         //id of that particular course!
                                        
             //    $_SESSION['course_id'] =$course_id2;
                    
            //        if(mysqli_query($con, $sql_cc))
            //          {                   
            //        header('location:sample2.php');
                                   
                 //     }
   
   mysqli_close($con);
                                                           }    // if of PASSWORD !                 
 else { $_SESSION['message'] = ' The passwords do not match!';   }
                                                }   // if of POST !!!
            
     else    { echo ' ';}
?>
<html>

<link rel="stylesheet" href="form.css" type="text/css">

<div class="body-content">
  <div class="module">
    <h1>Create account</h1>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="UserName" name="name" required />
       <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required /> 
      <input type="email" placeholder="Email" name="email" required />
      <input type="text" placeholder="Gender" name="gender" />
      <input type="text" placeholder="Batch" name="batch" />
      <input type="text" placeholder="Dept" name="dept" />
      <input type="number" placeholder="Contact No" name="contact_no" />
      <input type="text" placeholder="Rollno" name="rollno" required />
          
        
      <input type="text" placeholder="CourseName #01" name="coursename1"  required/>
         <input type="text" placeholder="CourseName #02" name="coursename2" required/>
          <input type="text" placeholder="CourseName #03" name="coursename3" />              
           
    <?php           
 $sql="SELECT course_name,id FROM course order by id"; 

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select name=course value=''>Course Name</option>"; // list box select command

foreach ($con->query($sql) as $row){//Array or records stored in $row

echo "<option value=$row[id]>$row[course_name]</option>"; 

/* Option values are added by looping through the array */ 

}
?>
     
     <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
   
         
 
  </div>
</div>
</html>