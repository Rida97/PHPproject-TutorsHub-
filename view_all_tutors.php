<?php 

require_once 'db.php';
session_start();
require_once 'header.php';

echo "<div class='container'>";


$sql 	= "SELECT * FROM tutor";
$result = $con->query($sql); 

if( $result->num_rows > 0)
{ 
	?>
	<h2>List of all Tutors Available</h2>
	<table class="table table-bordered table-striped">
		<tr>
			
			<td>name</td>
			<td>email</td>
			<td>gender</td>
			<td>batch</td>
			<td>dept</td>
			<td>contact_no</td>
			
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