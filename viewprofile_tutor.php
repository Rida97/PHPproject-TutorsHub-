
<!DOCTYPE html>
<html>
<head>
 <?php session_start(); ?>

<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        <br />
        
        ?></span>
<?php
      require_once('db.php');
       $tutor_id =$_SESSION['tutor_id'] ;
   
$sql = 'SELECT id,name, email, gender, batch,dept,contact_no
        FROM tutor
         ORDER BY id DESC 
                        LIMIT 1';
      
        
       $sql= "SELECT
 tutor.name ,
tutor.email ,
tutor.gender ,
tutor.batch ,
tutor.dept ,
tutor.contact_no ,
 
 course.course_name ,
 course.course_code 
FROM
 tutor, course, tutorcourse
WHERE 
    tutor.id= tutorcourse.id
AND
 course.id = tutorcourse.id
 ";  
  
$query = mysqli_query($con, $sql);
 
if (!$query) {
    die ('SQL Error: ' . mysqli_error($con));
}
?>

<html>
<head>
 
 <style>
  table {
   border-collapse: collapse;
   width: 60%;
   color: #0d4261;
   font-family: monospace;
   font-size: 10px;
   text-align: left;
     } 
  th {
   background-color: #0d4261;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
 </style>
</head>
<body>
 



<?php

 
echo '<table>
        <thead>
            <tr>

                <th>NAME</th>
                <th>EMAIL</th>
                <th>GENDER</th>
                <th>BATCH</th>
                <th>DEPT</th>
                <th>CONTACT_NO</th>
                 <th>course_name</th>
                  <th>course_code</th>
            </tr>
        </thead>
        <tbody>';
         
while ($row = mysqli_fetch_array($query))
{
    echo '<tr>
      
            <td class="centre">'.$row['name'].'</td>
            <td class="centre">'.$row['email'].'</td>
            <td class="centre">'.$row['gender'].'</td>
            <td class="centre">'.$row['batch'].'</td>
            <td class="centre">'.$row['dept'].'</td>
            <td class="centre">'.$row['contact_no'].'</td>
            <td class="course_name">'.$row['course_name'].'</td>
            <td class="course_code">'.$row['course_code'].'</td>
        </tr>';
}
echo '
    </tbody>
</table>';


?>
</table>
</body>
</html>

