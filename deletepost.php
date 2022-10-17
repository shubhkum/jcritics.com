<?php 
	require_once('include/db.php');

?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>
<?php confirm_login(); ?>

<?php 

	if(isset($_POST['submit'])){

		$title=mysql_real_escape_string($_POST['title']);
		$category=mysql_real_escape_string($_POST['category']);
		$post=$_POST['post'];

		date_default_timezone_set("Asia/Kolkata");
		$currentTime=time();
		$dateTime=strftime("%B-%d-%Y %H:%M:%S",$currentTime);

		$Admin='Shubham';
		$image=$_FILES['image']['name'];
		$target="upload/".basename($_FILES['image']['name']);

			global $selected;
			$deleteId=$_GET["delete"];
			$query="DELETE FROM admin_panel WHERE id='$deleteId'";
			$execute=mysql_query($query);

			move_uploaded_file($_FILES["image"]["tmp_name"], $target);

			if($execute){
				$_SESSION['SuccessMessage']="Post Deleted Successfully";
				Redirect_to('dashboard.php');
			}
			else{
				$_SESSION['ErrorMessage']="Something Went Wrong";
				Redirect_to('dashboard.php');
			}
		
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Post</title>
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
			<div class="col-sm-2">
			
				<ul class="nav flex-column nav-pills" id="side-menu">
					<li class="nav-item"><a href="dashboard.php" class="nav-link">
						<span class="fa fa-th"></span>&nbsp;&nbsp;Dashboard</a></li>
					<li class="nav-item"><a href="addnewpost.php" class="nav-link active">
					<span class="fa fa-list-alt"></span>&nbsp;&nbsp;Add new Post</a></li>
					<li class="nav-item"><a href="categories.php" class="nav-link">
					<span class="fas fa-tags"></span>&nbsp;&nbsp;Categories</a></li>
					<li class="nav-item"><a href="#" class="nav-link">
					<span class="fas fa-user"></span>&nbsp;&nbsp;Manage Admins</a></li>
					<li class="nav-item"><a href="#" class="nav-link">
					<span class="fas fa-comment"></span>&nbsp;&nbsp;Comments</a></li>
					<li class="nav-item"><a href="#" class="nav-link">
					<i class="fas fa-tasks"></i>&nbsp;&nbsp;Live Blog</a></li>
					<li class="nav-item"><a href="#" class="nav-link">
					<i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a></li>
					
				</ul>
				
			</div><!--Ending of Side Area-->

			<div class="col-sm-10">
				<h1>Delete Post</h1>
				<?php echo Message();
				     echo SuccessMessage(); 
				 ?>
				<div>
					<?php 
						global $selected;
						$searchid=$_GET['delete'];
						$query="SELECT * FROM admin_panel WHERE id='$searchid'";
						$execute=mysql_query($query);
						while ($datarows=mysql_fetch_array($execute)) {
							$title=$datarows['title'];
							$category=$datarows['category'];
							$post=$datarows['post'];
							$image=$datarows['image'];


						?>

					<form action="deletepost.php?delete=<?php echo $_GET['delete']; ?>" method="post" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
							<label for="title"><span class="fieldinfo">Title:</span></label>
							<input class="form-control" disabled type="text" name="title" id="title" placeholder="Title" value="<?php echo $title;?>">
							</div>
							<div class="form-group">
								<span class="fieldinfo">Existing Category:</span>
								<?php echo $category; ?><br><br>
							<label for="categoryselect"><span class="fieldinfo">Category:</span></label>
							<select class="form-control" id="categoryselect" name="category" disabled>
								<?php 
									global $selected;
									$viewQuery="SELECT * FROM category ORDER BY datetime DESC";
									$execute=mysql_query($viewQuery);
									
									while ($datarows=mysql_fetch_array($execute)) {
											echo "<option>".$datarows['name']."</option>";
										
									}

						        ?>
							</select>
							</div>
							<div class="form-group">
								<span class="fieldinfo">Existing Image:</span>
								<img src="upload/<?php echo $image;?>" style="width: 200px;height:50px;"><br><br>
							<label for="imageselect"><span class="fieldinfo">Image:</span></label>
							<br>
							<input type="file" class="" name="image" id="imageselect" disabled>
							</div>
							<div class="form-group">
							<label for="postarea"><span class="fieldinfo">Post:</span></label>
							<textarea class="form-control" name="post" id="postarea" disabled><?php echo $post; ?></textarea>
							</div>
							<br>
							<input type="Submit" name="submit" value="Delete Post" class="btn btn-danger btn-block">
							<br>
						</fieldset>
						
					</form>

					<?php 
						}

					 ?>
				</div>
						

				
			</div><!-- Ending of Main Area-->
		</div><!--Row Ending-->
	</div><!--Container Ending-->

	<div id="footer">
		<hr><p>Theme By | Shubham | &copy;2019-2020 --- All Rights Reserved.</p>
		<a href="" style="color:white;text-decoration: none;cursor: pointer;font-weight: bold;">
			<p>
				This site is used for Study Purpose Only. No one is allowed To copy.<br> &trade 
			</p>

		</a>		
	</div>
	<div style="height: 10px;background: #27AAE1;"></div>
</body>
</html>