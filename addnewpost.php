<?php 
	require_once('include/db.php');
?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>
<?php confirm_login(); ?>
<?php 
	if(isset($_POST['submit'])){
		global $con;
		$Name=mysqli_real_escape_string($con,$_POST['Name']);
		$img_title=$_POST['img_title'];
		$img_link=$_POST['img_link'];
		$img_src=$_POST['img_src'];
		date_default_timezone_set("Asia/Kolkata");
		$currentTime=time();
		$dateTime=strftime("%B-%d-%Y %H:%M:%S",$currentTime);
		if(empty($Name)){
			$_SESSION['ErrorMessage']='Name Cant be Empty';
			Redirect_to("addnewpost.php");
		}
		elseif (strlen($Name)<2) {
			$_SESSION['ErrorMessage']="Too Short Name";
			Redirect_to("addnewpost.php");
		}
		else{
			global $con;
			$query="INSERT INTO journalists(datetime,name,rating,pro_india,anti_india,pro_bjp,pro_congress,leftist,rightist,img_title,img_link,img_src) VALUES('$dateTime','$Name','0','0','0','0','0','0','0','$img_title','$img_link','$img_src')";
			$execute=mysqli_query($con,$query);
			if($execute){	
				$_SESSION['SuccessMessage']="Journalist Added Successfully";				
				Redirect_to('addnewpost.php');
			}
			else{
				$_SESSION['ErrorMessage']="Something Went Wrong";
				Redirect_to('addnewpost.php');
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Journalist</title>
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--Font Awesome-->
	<script src="https://kit.fontawesome.com/f7ef469c0b.js"></script>
	<!--Bootstrap javascript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<!---CSS FILE-->
	<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
	<style type="text/css">
		.fieldinfo{
			color:rgb(251,174,44);
			font-family: Bitter,Georgia,"Times New Roman",Times,serif;
			font-size: 1.2em;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4 offset-4">
				<h1>Add New Journalist</h1>
				<?php echo Message();
				     echo SuccessMessage(); 
				 ?>
				<div>
					<form action="addnewpost.php" method="post" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
							<label for="Name"><span class="fieldinfo">Name:</span></label>
							<input class="form-control" type="text" name="Name" id="Name" placeholder="Name">
							</div>
							<div class="form-group">
							<label for="postarea"><span class="fieldinfo">Image title:</span></label>
							<textarea class="form-control" name="img_title" id="postarea"></textarea>
							</div>
							<div class="form-group">
							<label for="postarea"><span class="fieldinfo">Image link:</span></label>
							<textarea class="form-control" name="img_link" id="postarea"></textarea>
							</div>
							<div class="form-group">
							<label for="postarea"><span class="fieldinfo">Image Source:</span></label>
							<textarea class="form-control" name="img_src" id="postarea"></textarea>
							</div>
							<br>
							<input type="submit" name="submit" value="Add new Journalist" class="btn btn-success btn-block">
							<br>
						</fieldset>					
					</form>
				</div>			
			</div><!-- Ending of Main Area-->
		</div><!--Row Ending-->
	</div><!--Container Ending-->
</body>
</html>