<?php 
session_start();
require_once 'db.php';

require_once 'header.php';
   $tutor_id =$_SESSION['tutor_id'] ;
      $course_id1 =$_SESSION['course_id'] ;
        $course_id2 =$_SESSION['course_id'] ;
          $course_id3 =$_SESSION['course_id'] ;
echo "<div class='container'>";
 
$sql= "SELECT tutor.id, tutor.name, course.course_name
  FROM tutor
LEFT OUTER JOIN tutorcourse
  ON tutor.id = tutorcourse.tutor_id
 
LEFT OUTER JOIN course
  ON tutorcourse.course_id = course.id";


$result = $con->query($sql); 

while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['id']."' name='id' />"; //added
		echo "<tr>";
                echo "<td>".$row['id'] . "</td>";
		echo "<td>".$row['name'] . "</td>";
		echo "<td>".$row['course_name'] . "</td>";
		
		echo "</tr>";
		echo "</form>"; //added 
	}
       
        ?>