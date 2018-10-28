<?php session_start(); ?>
<?php 
 
require_once 'db.php';

require_once 'header.php';

echo "<div class='container'>";

 $tutor_id =$_SESSION['tutor_id'] ;
   
if( isset($_POST['delete'])){
	$sql = "DELETE FROM tutor WHERE id=" . $_POST['id'];
	if($con->query($sql) === TRUE){
		echo "<div class='alert alert-success'>Successfully delete user</div>";
	}
}

$sql 	= "SELECT * FROM tutor WHERE id='$tutor_id'";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
	<h2>List of all Tutors</h2>
	<table class="table table-bordered table-striped">
		<tr>
			
			<td>name</td>
			<td>email</td>
			<td>gender</td>
			<td>batch</td>
			<td>dept</td>
			<td>contact_no</td>
			<td width="55px">Delete</td>
			<td width="55px">EDIT</td>
		</tr>
	<?php
	while( $row = $result->fetch_assoc()){ 
		echo "<form action='' method='POST'>";	//added
		echo "<input type='hidden' value='". $row['id']."' name='id' />"; //added
		echo "<tr>";
		echo "<td>".$row['name'] . "</td>";
		echo "<td>".$row['email'] . "</td>";
		echo "<td>".$row['gender'] . "</td>";
		echo "<td>".$row['batch'] . "</td>";
		echo "<td>".$row['dept'] . "</td>";
		echo "<td>".$row['contact_no'] . "</td>";
		echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";  
		echo "<td><a href='edit.php?id=".$row['id']."' class='btn btn-info'>Edit</a></td>";
		echo "</tr>";
		echo "</form>"; //added 
	}
	?>
	</table>
<?php 
}
else
{
	echo "<br><br>No Record Found";
}
?> 
</div>

<?php 

 require_once 'footer.php';