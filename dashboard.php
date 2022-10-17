<?php 
require_once('include/session.php');

?>
<?php require_once('include/functions.php'); ?>
<?php 
	require_once('include/db.php');
?>
<?php confirm_login(); ?>
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
	<link rel="stylesheet" href="css/publicstyle.css">
</head>
<body>
	<div style="height: 10px;background-color: #27aae1;"></div>
	 <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
			<div class="navbar-header">
				
			<a href="blog.php" style="margin-left:74px" class="navbar-brand"><img style="" src="images/logo.jpg" width="50" height="30">
				</a>	
			
			</div>
			
			<div style="margin-left:200px;">
			<ul class="navbar-nav" style="margin-right:30px;">
				<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
				<li class="nav-item"><a class="nav-link active" href="blog.php" target="_blank">Blog</a></li>
				<li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Services</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Feature</a></li>
			</ul>
			</div>
			<form class="form-inline my-2 my-lg-0" style="margin-left: 212px;" method="post">
			      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
			      <button class="btn btn-outline-success my-2 my-sm-0" name="searchbtn" type="submit">Search</button>
		    </form>
		  
		
	</nav>
	<div style="height: 10px;background-color: #27aae1;" class="line"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
				<br><br><br>
				<ul class="nav flex-column nav-pills" id="side-menu">
					<li class="nav-item"><a href="dashboard.php" class="nav-link active">
						<span class="fa fa-th"></span>&nbsp;&nbsp;Dashboard</a></li>
					<li class="nav-item"><a href="addnewpost.php" class="nav-link">
					<span class="fa fa-list-alt"></span>&nbsp;&nbsp;Add new Post</a></li>
					<li class="nav-item"><a href="categories.php" class="nav-link">
					<span class="fas fa-tags"></span>&nbsp;&nbsp;Categories</a></li>
					<li class="nav-item"><a href="admin.php" class="nav-link">
					<span class="fas fa-user"></span>&nbsp;&nbsp;Manage Admins</a></li>
					<li class="nav-item"><a href="comments.php" class="nav-link">
					<span class="fas fa-comment"></span>&nbsp;&nbsp;Comments
				    <?php 
									$selected;
									$query3="SELECT COUNT(*) FROM comments WHERE status='OFF'";
									$execute3=mysql_query($query3);
									$rows_no=mysql_fetch_array($execute3);
									$total=array_shift($rows_no);
									if($total>0){
							?>
								<span class="badge float-right badge-warning">	
								<?php
										echo $total;

								?>
								</span>	
								<?php } ?></a></li>
					<li class="nav-item"><a href="blog.php" class="nav-link">
					<i class="fas fa-tasks"></i>&nbsp;&nbsp;Live Blog</a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link">
					<i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a></li>
					
				</ul>
				
			</div><!--Ending of Side Area-->

			<div class="col-sm-10"><!--Main Area-->
				<div><?php echo Message();
				     echo SuccessMessage(); ?></div>
				<h1>Admin Dashboard</h1>
				<div>
					<table class="table table-striped table-hover table-bordered ">
						<tr>
							<th>No</th>
							<th>Post Title</th>
							<th>Date&Time</th>
							<th>Author</th>
							<th>Category</th>
							<th>Banner</th>
							<th>Comments</th>
							<th>Action</th>
							<th>Details</th>
						</tr>
						<?php  
						global $selected;
						$viewquery="SELECT * FROM admin_panel ORDER BY datetime DESC";
						$execute=mysql_query($viewquery);
						$no=0;
						while ($datarows=mysql_fetch_array($execute)) {
							$no++;
							$id=$datarows['id'];
							$datetime=$datarows['datetime'];
							$title=$datarows['title'];
							$category=$datarows['category'];
							$admin=$datarows['author'];
							$image=$datarows['image'];
							$post=$datarows['post'];			

						?>
						<tr>
							<td><?php echo $no; ?></td>
							<td style="color: #2D85D1FF;"><?php 
							if(strlen($title)>10){
								$title=substr($title,0,10)."...";
							}
							echo $title; ?></td>
							<td><?php echo $datetime; ?></td>
							<td><?php echo $admin; ?></td>
							<td><?php echo $category; ?></td>
							<td><img src="upload/<?php echo $image; ?>" style="width: 170px;height:70px;" class="rounded img-fluid"></td>
							<td>
							<?php 
									$selected;
									$query2="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$id' AND status='ON'";
									$execute2=mysql_query($query2);
									$rows_no=mysql_fetch_array($execute2);
									$total=array_shift($rows_no);
									if($total>0){
							?>
								<span class="badge float-right badge-success">	
								<?php
										echo $total;

								?>
								</span>	
				
							 <?php } ?>

							 <?php 
									$selected;
									$query3="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$id' AND status='OFF'";
									$execute3=mysql_query($query3);
									$rows_no=mysql_fetch_array($execute3);
									$total=array_shift($rows_no);
									if($total>0){
							?>
								<span class="badge float-left badge-danger">	
								<?php
										echo $total;

								?>
								</span>	
								<?php } ?>
							 	</td>
							 
							<td>
							<a href="editpost.php?edit=<?php echo $id; ?>"><span class="btn btn-warning">Edit</span> </a> & 
						   <a href="deletepost.php?delete=<?php echo $id; ?>"><span class="btn btn-danger">delete</span></a></td>
							<td><a href="fullpost.php?id=<?php echo $id; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a></td>
						</tr>

						<?php			
						}
						?>
					</table>
				</div>
				<?php 
									$selected;
									$query2="SELECT COUNT(*) FROM comments WHERE admin_panel_id='$id' AND status='ON'";
									$execute2=mysql_query($query2);
									$rows_no=mysql_fetch_array($execute2);
									$total=array_shift($rows_no);
									if($total>0){
							?>
								<span class="badge float-right badge-success">	
								<?php
										echo $total;

								?>
								</span>	
							 	</td>
							 <?php } ?>
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