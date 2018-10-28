
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
       $tutor_id =$_SESSION['student_id'] ;
   
$sql = 'SELECT id, name, email, Rollno, dept
        FROM student
         ORDER BY id DESC 
                        LIMIT 1';
      
        
       $sql= "SELECT
 student.name ,
student.email ,
student.Rollno ,
student.dept ,

 
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
               <th>ROLLNO</th>
                <th>DEPT</th>
                
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
            <td class="centre">'.$row['Rollno'].'</td>
            <td class="centre">'.$row['dept'].'</td>
           
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

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

