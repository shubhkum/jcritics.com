<?php 
	require_once('include/db.php');
?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Jcritics</title>
	<!--Google Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Hind|Lato|Lora|Noto+Sans|Open+Sans&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--Font Awesome-->

    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
	<!--Bootstrap javascript -->
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="css/publicstyle.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	

	<div style="height: 80px;background-color:#fffffff0;">				
			<a href="blog.php" style="margin-left:100px;" ><img style="" src="images/logo.png" width="160" height="95">
				</a>			
				<p style="color: #000000FF;font-family: 'Lato', sans-serif;letter-spacing: 3px;font-size:25px;margin: 30px 350px 11px 7px;" class="float-right">A Platform to <span style="color:#E3C230;">Rate</span> your Journalists.</p>
			
	</div>

	<!--Navigation Start-->
	 <nav class="navbar navbar-expand-lg sticky-top" role="navigation" style="height: 55px;">
			
			
			<div style="margin-left:180px;">
			<ul class="navbar-nav" style="margin-right:20px;height: 100%;">
				<li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
				<li class="nav-item"><a class="nav-link active" href="blog.php">Journalists</a></li>
				<li class="nav-item"><a class="nav-link" href="portals.php">Portals</a></li>
			</ul>
			</div>
			<!--<form class="form-inline my-2 my-lg-0" style="margin-left: 212px;" method="post">
			      <input class="form-control mr-sm-5" type="search" name="search" placeholder="Search Journalists , News... " aria-label="Search">
			      <button class="btn btn-outline-light my-2 my-sm-0" name="searchbtn" type="submit">Search</button>
		    </form>-->
		     <form class="form-inline" action="search_journalists.php" method="GET" name="search_form">
	            <div class="input-group">                    
	                <input type="text" class="form-control" placeholder="Search Journalists...." style="width:270px;margin-left: 70px;font-size: 17px;" name="search_text">
	                <div class="input-group-append">
	                    <button type="submit" class="btn btn-secondary"><i class="fa fa-search" style="color:#E3C230;"></i></button>
	                </div>
	            </div>
        	</form>
    
	        <div class="navbar-nav" style="margin-left: 260px;">
	        	<?php if(isset($_SESSION['user_id'])){
	        	?>
	        	<div class="dropdown">
					<a class="nav-link dropdown-toggle" href="#" type="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo $_SESSION['user_name']; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="about-us">
					<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
				</div>
	            <?php 
	        		}
	        		elseif (isset($_COOKIE['user_id'])) {
	        			?>
					<div class="dropdown">
					<a class="nav-link dropdown-toggle" href="#" type="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?php echo $_COOKIE['user_name']; ?>
					</a>
					<div class="dropdown-menu" aria-labelledby="about-us">
					<a class="dropdown-item" href="logout.php">Logout</a>
					</div>
					</div>
	        		<?php
	        		}
	        		else{

	        	  ?>
				<a href="login.php" class="nav-item nav-link">Login<i class="fas fa-sign-out-alt"></i></a>
	        	<?php
	        		}

	             ?>	            
	        </div>

		  
		
	</nav>
	<!--Navigation End-->

	<div class="container"><!--Main Area -->			
		<div class="row"><!--Row-->
			<div class="col-sm-12">
				<div class="clearfix justify-content-center">			
						<?php
					
						global $con; 
						if(isset($_POST['search'])){
							$search=$_POST['search'];
							$viewquery="SELECT * FROM journalists WHERE datetime LIKE '%$search%' OR title LIKE '%$search%' OR category LIKE '%$search%' OR post LIKE '%$search%'";

						}
						elseif (isset($_GET['category'])) {
							$category=$_GET['category'];
							$viewquery="SELECT * FROM journalists WHERE category='$category' ORDER BY datetime DESC";
						}
						elseif(isset($_GET['page'])){
							$page=$_GET['page'];
							if($page==0||$page<1){
								$showPostFrom=0;
							}
							else{
							$showPostFrom=($page*12)-12;
							}
								$viewquery="SELECT * FROM journalists ORDER BY datetime DESC LIMIT $showPostFrom,12";
						}

						else {
							$page=1;
							$viewquery="SELECT * FROM journalists ORDER BY datetime DESC LIMIT 0,12";
						}
							$execute=mysqli_query($con,$viewquery);

							while($datarows=mysqli_fetch_array($execute)){
								$id=$datarows['id'];
								$datetime=$datarows['datetime'];
								$name=$datarows['name'];							
								$rating=$datarows['rating'];
								$pro_india=$datarows['pro_india'];
								$anti_india=$datarows['anti_india'];
								$pro_bjp=$datarows['pro_bjp'];
								$pro_congress=$datarows['pro_congress'];
								$leftist=$datarows['leftist'];
								$rightist=$datarows['rightist'];
								$img_title=$datarows['img_title'];
								$img_link=$datarows['img_link'];
								$img_src=$datarows['img_src'];
								$total_ppl_rated=$datarows['total_ppl_rated'];

						?>
							
							<div class="card float-left" style="width: 15rem; height: 22rem;margin-left:20px;margin-right: 15px;margin-top: 45px;">
							 
							 	<a title="<?php echo $img_title;?>" href="<?php echo $img_link; ?>"><img class="card-img-top" style="width:15rem;height:12rem;" width="512"  src="<?php echo $img_src;?>"></a>
							  
							  <div class="card-body">
								    <div class="card-title">	  	
									<?php echo '<h5>'.htmlentities($name).'</h5>'; ?>
									</div>

									<div class="clearfix" style="margin-top: -10px;">
									
									<?php
																				
												if($pro_india>10){
													?>
												<div class="badge badge-pill badge-primary float-left">Nationalist</div>
												<?php
												}
												if($anti_india>10){
													?>
												<div class="badge badge-pill badge-primary float-left">Liberal</div>
												<?php
												}
												if($pro_bjp>10){
													?>
												<div class="badge badge-pill badge-primary float-left">Pro BJP</div>
												<?php
												}
												if($pro_congress>10){
													?>
												<div class="badge badge-pill badge-primary float-left">Pro Cong</div>
												<?php
												}
												if($leftist>10){
													?>
												<div class="badge badge-pill badge-primary float-left">Leftist</div>
												<?php
												}
												if($rightist>10){
													?>
												<div class="badge badge-pill badge-primary float-left">Rightist</div>
												<?php 
												} 
											
												?>
								
								</div>
								 <?php 
										if($rating>0){
											if($rating<=2){
												$descriptionText='Average';
											}
											elseif ($rating<=4) {
												$descriptionText='Good';
											}
											elseif ($rating>4) {
												$descriptionText='Excellent';
											}
							 	 ?>

					  			<!--Rating System-->
					
								<div class="clearfix rating-area">
									<div class="float-left"><i class="fas fa-star fa-2x" style="color:#12E060C7;"></i>
									</div>
									
									<div class="float-left" style="margin-left:10px;margin-top:-11px;"><span style="color:#37C76EC6;font-size: 28px;"><?php echo $rating; ?></span><?php echo '/5'; ?>
									</div>
									<div class="float-left" style="margin-left:-39px;margin-top:20px;font-size:15px;color:#808a9f;">
									<span><?php echo '('.$descriptionText.')';?></span>
									</div>
									<a href="fullpost.php?id=<?php echo $id; ?>"><span class="btn btn-rate">
										Rate <i class="fas fa-star"></i>
									</span></a>
									  	
								</div>
							    <?php

							     }
							     else {
										if($rating>=-2){
											$descriptionText='Poor';
										}
										elseif ($rating>=-4) {
											$descriptionText='Very bad';
										}
										elseif ($rating<4) {
											$descriptionText='Awful';
										}
									?>
									<div class="clearfix rating-area">
										<div class="float-left">
										<i class="fas fa-star fa-2x" style="color:#F82915CF;"></i>
										</div>

										<div class="float-left" style="margin-left:10px;margin-top:-11px;">
										<span style="color:#FF1700FF;font-size:28px;"><?php echo $rating; ?></span><?php echo '5'; ?>
										</div>

										<div class="float-left" style="margin-left:-25px;margin-top:20px;font-size:15px;color:#808a9f;">
										<span><?php echo '('.$descriptionText.')'; ?></span>
										</div>
										<a href="fullpost.php?id=<?php echo $id; ?>"><span class="btn btn-rate">
											Rate  <i class="fas fa-star"></i>
										</span></a>	


									</div>
								<?php 

								}
								 ?>
									<!--Total no of ratings-->
								    <div style="color:#A0A0A0E0">
										<?php echo '('.$total_ppl_rated.')' ?>
									</div>
							</div>
								 
								
									
			 
			 </div>
			
				 <?php
			  			}

							?>
				</div>

				 <br><br>

						 <!--Pagination Start-->
						 
											<ul class="pagination justify-content-center">
								<?php 
								 if(isset($page)){
									if($page>1){
										?>
									<li class="page-item"><a class="page-link" href="blog.php?page=<?php echo $page-1 ?>">&laquo;</a></li>

								<?php
									}
										}
								 ?>
								<?php 
									global $con;
									$queryPagination="SELECT COUNT(*) FROM journalists";
									$executePagination=mysqli_query($con,$queryPagination);
									$rowPagination=mysqli_fetch_array($executePagination);
									$totalPosts=array_shift($rowPagination);
									$postsPerPage=ceil($totalPosts/12);
									
									for($i=1;$i<=$postsPerPage;$i++){
									 if(isset($page)){
										if($i==$page){
									?>
										
									<li class="page-item active"><a class="page-link" href="blog.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
										
								<?php
									}
								else{
									?>
									<li class="page-item"><a class="page-link" href="blog.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
								<?php
								}
									}
								}
								if(isset($page)){
								if($page<$i-1){
								 ?>
									<li class="page-item"><a class="page-link" href="blog.php?page=<?php echo $page+1 ?>">&raquo;</a></li>

								 <?php }
									} 
								?>
								 	</ul>
						 
						

			 </div><!--col-sm-12 Ending-->

		</div><!-- Row Ending-->
	</div><!-- Container Ending-->






	<div id="footer">
		<hr><p>Theme By | Shubham Kumar| &copy;2020-2021 --- All Rights Reserved.</p>
		<a href="" style="color:white;text-decoration: none;cursor: pointer;font-weight: bold;">
			<p>
				 No one is allowed To copy.<br> &trade 
			</p>

		</a>		
	</div>
	<div style="height: 10px;background: #27AAE1;"></div>


	<!--Javascript Starts-->
	<script src="jquery/search.js">
		</script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>