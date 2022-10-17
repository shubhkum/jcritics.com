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
	<title>Comments</title>
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
					<li class="nav-item"><a href="dashboard.php" class="nav-link">
						<span class="fa fa-th"></span>&nbsp;&nbsp;Dashboard</a></li>
					<li class="nav-item"><a href="addnewpost.php" class="nav-link">
					<span class="fa fa-list-alt"></span>&nbsp;&nbsp;Add new Post</a></li>
					<li class="nav-item"><a href="categories.php" class="nav-link">
					<span class="fas fa-tags"></span>&nbsp;&nbsp;Categories</a></li>
					<li class="nav-item"><a href="#" class="nav-link">
					<span class="fas fa-user"></span>&nbsp;&nbsp;Manage Admins</a></li>
					<li class="nav-item"><a href="comments.php" class="nav-link active">
					<span class="fas fa-comment"></span>&nbsp;&nbsp;Comments</a></li>
					<li class="nav-item"><a href="#" class="nav-link">
					<i class="fas fa-tasks"></i>&nbsp;&nbsp;Live Blog</a></li>
					<li class="nav-item"><a href="#" class="nav-link">
					<i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a></li>
					
				</ul>
				
			</div><!--Ending of Side Area-->

			<div class="col-sm-10"><!--Main Area-->
				
				<h1>Un-approved Comments</h1>
				<div><?php echo Message();
				     echo SuccessMessage(); ?></div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Date</th>
							<th>Comment</th>
							<th>Approve</th>
							<th>Delete Comment</th>
							<th>Details</th>
						</tr>
						<?php 
							global $selected;
							$query="SELECT * FROM comments WHERE status='OFF' ORDER BY datetime DESC";
							$execute=mysql_query($query);
							$sr_no=0;

							while ($datarows=mysql_fetch_array($execute)) {
								$sr_no++;
								$commentId=$datarows['id'];
								$dateTimeOfComment=$datarows['datetime'];
								$personName=$datarows['name'];
								$personComment=$datarows['comment'];
								$commentedPostId=$datarows['admin_panel_id'];
								if(strlen($personComment)>20){
									$personComment=substr($personComment, 0,20)."...";
								}
						?>
							<tr>
								<td><?php echo htmlentities($sr_no); ?></td>
								<td style="color:#27A3D7FF;"><?php echo htmlentities($personName); ?></td>
								<td><?php echo htmlentities($dateTimeOfComment); ?></td>
								<td><?php echo htmlentities($personComment); ?></td>
								
								<td><a href="approvecomments.php?id=<?php echo $commentId; ?>"><span class="btn btn-success">Approve Comment</span></a></td>
								<td><a href="deletecomment.php?id=<?php echo $commentId; ?>"><span class="btn btn-danger">Delete Comment</span></a></td>
								<td><a href="fullpost.php?id=<?php echo $commentedPostId; ?>" target="_blank"><span class="btn btn-info">Live Preview</span></a></td>

							</tr>
						

						<?php
							}
						 ?>
					</table>
				</div>

				<h1>Approved Comments</h1>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover">
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Date</th>
							<th>Comment</th>
							<th>Approved By</th>
							<th>Approve</th>
							<th>Delete Comment</th>
							<th>Details</th>
						</tr>
						<?php 
							global $selected;
							$query="SELECT * FROM comments WHERE status='ON' ORDER BY datetime DESC";
							$execute=mysql_query($query);
							$sr_no=0;
							$admin="Shubham";
							while ($datarows=mysql_fetch_array($execute)) {
								$sr_no++;
								$commentId=$datarows['id'];
								$dateTimeOfComment=$datarows['datetime'];
								$personName=$datarows['name'];
								$personComment=$datarows['comment'];
								$commentedPostId=$datarows['admin_panel_id'];
								if(strlen($personComment)>20){
									$personComment=substr($personComment, 0,20)."...";
								}

						?>
							<tr>
								<td><?php echo htmlentities($sr_no); ?></td>
								<td style="color:#27A3D7FF;"><?php echo htmlentities($personName); ?></td>
								<td><?php echo htmlentities($dateTimeOfComment); ?></td>
								<td><?php echo htmlentities($personComment); ?></td>
								<td><?php echo $admin; ?></td>
								<td><a href="unApprovecomments.php?id=<?php echo $commentId; ?>"><span class="btn btn-warning">Dis-Approve Comment</span></a></td>
								<td><a href="deletecomment.php?id=<?php echo $commentId; ?>"><span class="btn btn-danger">Delete Comment</span></a></td>
								<td><a href="fullpost.php?id=<?php echo $commentedPostId; ?>" target="_blank"><span class="btn btn-info">Live Preview</span></a></td>

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