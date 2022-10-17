<?php 
	require_once('include/db.php');
?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>
<?php 
	if(isset($_POST['submit'])){
		global $con;
		$password=mysqli_real_escape_string($con,$_POST['password']);
		$email=mysqli_real_escape_string($con,$_POST['email']);

		if(empty($password)||empty($email)){
			$_SESSION['ErrorMessage']='All fields must be filled out';
			Redirect_to("login.php");
		}

		else{
			$found_account=login_attempt($email,$password);
			
			if($found_account){

			  $_SESSION['user_id']=$found_account['id'];
			  $_SESSION['user_name']=$found_account['username'];
			  $_SESSION['user_email']=$found_account['email'];
			  if (isset($_POST['checkbox'])) {
			  	$expireTime=time()+ 86400;
			  	setcookie("user_email",$email,$expireTime);
			  	setcookie("user_name",$found_account['username'],$expireTime);
			  	setcookie("user_id",$found_account['id'],$expireTime);
			  }
			  Redirect_to('blog.php');

			}
			else{
				$_SESSION['ErrorMessage']="Invalid Email/Password ";
				Redirect_to('login.php');
			}
		}
		
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--Font Awesome-->
	<!--<script src="https://kit.fontawesome.com/f7ef469c0b.js"></script>-->
	<!--Bootstrap javascript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<!---CSS FILE-->
	<link rel="stylesheet" type="text/css" href="css/signin_style.css">
</head>
<body>

	<div class="container-fluid" style="margin-top: 30px;">
		<div class="row">

			<div class="col-sm-4 offset-4">
			<br>

				<?php echo Message();
				     echo SuccessMessage(); ?>
				<h2>Login to Rate</h2>
				<br><br>
				<div>
					<form action="login.php" method="post">
						<fieldset>
							<div class="form-group">
								<label for="email"><span class="fieldinfo">Email:</span></label>
							<div class="input-group input-group-lg">
							<span class="input-group-text text-info">
								@
							</span>
								<input class="form-control" type="email" name="email" id="email" placeholder="Email" autofocus="">
							</div>
							</div>
							<div class="form-group">
							<label for="password"><span class="fieldinfo">Password:</span></label>

							<div class="input-group input-group-lg">
								<span class="input-group-text text-info">
									<i class="fas fa-key"></i>
								</span>
							<input class="form-control" type="password" name="password" id="Password" placeholder="Password">
				
							</div>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="" name="checkbox" checked><span style="font-size:16px;">&nbsp; Remember Me</span></label>
							  <div class="float-right forgot-password"><a href="recover.php" style="color:#1500FFFF;">Forgot your password?</a></div>
							</div>	

							<br>
					
							<input type="Submit" name="submit" value="Login" class="btn btn-info btn-block">
							<div class="float-right" style="margin-top: 10px;">
								<span style="color:#000000DB;margin-right:10px;">Dont have an account?</span><a href="signin.php">Sign in</a>
							</div>
						</fieldset>
						
					</form>
				</div>
				
				
			</div><!-- Ending of Main Area-->
		</div><!--Row Ending-->
	</div><!--Container Ending-->

	
</body>
</html>