<?php 
	require_once('include/db.php');
?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>

<?php 
	if (isset($_GET['token'])) {
		$token=$_GET['token'];

		if(isset($_POST['submit'])){
			$password=mysql_real_escape_string($_POST['password']);
			$Confirm_Password=mysql_real_escape_string($_POST['confirm_password']);

			if(empty($password)||empty($Confirm_Password)){
				$_SESSION['ErrorMessage']='All fields must be filled out';
			}
			elseif ($password!==$Confirm_Password) {
				$_SESSION['ErrorMessage']='Passwords do not match';
				
			}
			elseif (strlen($password)<6) {
				$_SESSION['ErrorMessage']='Passwords should be at least 6 letters long';
				
			}
			
			else{
						global $con;
						$hashed_password=password_encryption($password);
						$query="UPDATE users SET password='$hashed_password' WHERE token='$token'";
						$execute=mysqli_query($con,$query);
						if($execute){
							$_SESSION['SuccessMessage']="Password Changed Successfully";
							Redirect_to('login.php');
						}
						else{
							$_SESSION['ErrorMessage']="Password failed to change";
							Redirect_to('login.php');
						}

			}
		}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>New Password</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--Font Awesome-->
	<script src="https://kit.fontawesome.com/f7ef469c0b.js"></script>
	<!--Bootstrap javascript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<!---CSS FILE-->
	<link rel="stylesheet" type="text/css" href="css/signin_style.css">

</head>
<body>
	<div class="container">
		<div class="row">

			<div class="col-sm-4 offset-4">
				<h2>Create New Password</h2>
				<?php echo Message();
				     echo SuccessMessage(); ?>
				<div>
					<form action="reset_password.php?token=<?php echo $token; ?>" method="post">
						<fieldset>
							
							<div class="form-group">
							<label for="password"><span class="fieldinfo">Password:</span></label>
							<input class="form-control" type="password" name="password" id="Password" placeholder="Password">
							</div>
							<div class="form-group">
							<label for="confirm_password"><span class="fieldinfo">Confirm Password:</span></label>
							<input class="form-control" type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password">
							</div>
							<br>
							<input type="Submit" name="submit" value="Submit" class="btn btn-success btn-block">
							<br>
						</fieldset>
						
					</form>
				</div>
				

				
			</div><!-- Ending of Main Area-->
		</div><!--Row Ending-->
	</div><!--Container Ending-->

	
</body>
</html>