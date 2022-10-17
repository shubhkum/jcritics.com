<?php 
	require_once('include/db.php');

?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>
<?php confirm_login(); ?>

<?php 
	if(isset($_POST['submit'])){
		$category=mysql_real_escape_string($_POST['category']);

		date_default_timezone_set("Asia/Kolkata");
		$currentTime=time();
		$dateTime=strftime("%B-%d-%Y %H:%M:%S",$currentTime);
		$Admin=$_SESSION['admin_name'];
		if(empty($category)){
			$_SESSION['ErrorMessage']='All fields must be filled out';
			Redirect_to("categories.php");
		}
		elseif (strlen($category)>99) {
			$_SESSION['ErrorMessage']="Too long name";
			Redirect_to("categories.php");
		}
		else{
			global $selected;
			$query="INSERT INTO category(datetime,name,creatorname) VALUES('$dateTime','$category','$Admin')";
			$execute=mysql_query($query);
			if($execute){
				$_SESSION['SuccessMessage']="Category Added Successfully";
				Redirect_to('categories.php');
			}
			else{
				$_SESSION['ErrorMessage']="Category Failed to add";
				Redirect_to('categories.php');
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
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
					<li class="nav-item"><a href="addnewpost.php" class="nav-link">
					<span class="fa fa-list-alt"></span>&nbsp;&nbsp;Add new Post</a></li>
					<li class="nav-item"><a href="categories.php" class="nav-link active">
					<span class="fas fa-tags"></span>&nbsp;&nbsp;Categories</a></li>
					<li class="nav-item"><a href="admin.php" class="nav-link">
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
				<h1>Manage Categories</h1>
				<?php echo Message();
				     echo SuccessMessage(); ?>
				<div>
					<form action="categories.php" method="post">
						<fieldset>
							<div class="form-group">
							<label for="categoryname"><span class="fieldinfo">Name:</span></label>
							<input class="form-control" type="text" name="category" id="categoryname" placeholder="Name">
							</div>
							<br>
							<input type="Submit" name="submit" value="Add new Category" class="btn btn-success btn-block">
							<br>
						</fieldset>
						
					</form>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<tr>
							<th>Sr No.</th>
							<th>Date and Time</th>
							<th>Name</th>
							<th>Creator Name</th>
							<th>Action</th>
						</tr>
						<?php 
							global $selected;
							$viewQuery="SELECT * FROM category ORDER BY datetime DESC";
							$execute=mysql_query($viewQuery);
							$sr_no=0;
							while ($datarows=mysql_fetch_array($execute)) {
								$sr_no++;
								$datetime=$datarows['datetime'];
								$name=$datarows['name'];
								$id=$datarows['id'];
								$creatorname=$datarows['creatorname'];

							?>
						<tr>
							<td><?php echo $sr_no; ?></td>
							<td><?php echo $datetime; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $creatorname; ?></td>
							<td><a href="deletecategory.php?id=<?php echo $id; ?>"><span class="btn btn-danger">Delete Category</span></a></td>
							

						</tr>
						<?php
							}


						 ?>


					</table>
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