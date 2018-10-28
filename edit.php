 <?php session_start(); ?>
<?php 

require_once 'db.php';

require_once 'header.php';

?>
<link rel ="stylesheet" type="text/css" href="form.css">
<div class="container">
    <div class ="body-content"></div>
	<?php 
        
           $tutor_id =$_SESSION['tutor_id'] ;
        
	if(isset($_POST['update'])){
if( empty($_POST['name']) || empty($_POST['email']) || 
        empty($_POST['gender']) || empty($_POST['batch']) ||empty($_POST['dept'])||empty($_POST['contact_no'])){
			echo "Please fillout all required fields"; 
		}else{		
			
			$name 	= $_POST['name'];
			$email	= $_POST['email'];
			$gender = $_POST['gender'];
                        $batch  = $_POST['batch'];
                        $dept   = $_POST['dept'];
                        $contact_no = $_POST['contact_no'];
                        $rollno = $_POST['rollno'];


			$sql = "UPDATE tutor SET name     =  '{$name}',
						 email    =  '{$email}',
						 gender   =  '{$gender}',
						 batch    =  '{$batch}',
						 dept    =   '{$dept}',
                                                 contact_no  =  '{$contact_no}' 
						WHERE id=" . $_POST['id'];

			if( $con->query($sql) === TRUE){
				echo "<div class='alert alert-success'>Successfully updated  user</div>";
			}else{
				echo "<div class='alert alert-danger'>Error: There was an error while updating user info</div>";
			}
		}
	}
	$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
	$sql = "SELECT * FROM tutor WHERE id='$tutor_id'";
	$result = $con->query($sql);

	if($result->num_rows < 1){
		
		exit;
	}
	$row = $result->fetch_assoc();
	?>
    <html>
  <input type="text" placeholder="Rollno" name="rollno" />
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="box">
			<h3><i class="glyphicon glyphicon-plus"></i>&nbsp;MODIFY User</h3> 
			<form action="" method="POST">
				<input type="hidden" value="<?php echo $row['id']; ?>" name="id">

				<label for="name">name</label>
				<input type="text" id="name"  name="name" value="<?php echo $row['name']; ?>" class="form-control"><br>

				<label for="email">email</label>
				<input type="text" id="email"  name="email" value="<?php echo $row['email']; ?>" class="form-control"><br>

				<label for="gender">gender</label>
				<input type="text" id="gender"  name="gender" value="<?php echo $row['gender']; ?>" class="form-control"><br>

				<label for="batch">batch</label>
				<input type="text" id="batch"  name="batch" value="<?php echo $row['batch']; ?>" class="form-control"><br>

				<label for="dept">dept</label>
				<input type="text" id="dept"  name="dept" value="<?php echo $row['dept']; ?>" class="form-control"><br>

				<label for="contact">Contact</label> 
				<input type="text"  name="contact_no" id="contact_no"  value="<?php echo $row['contact_no']; ?>" class="form-control"><br>
				<br>
				<input type="submit" name="update" class="btn btn-success" value="Update">
			</form>
		</div>
	</div>
</div>
</div>
</html>
<?php 

 require_once 'footer.php';
 ?>