<?php 
include('include/db.php');
?>
<?php include('include/session.php');
?>
<?php require_once('include/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jcritics</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--Font Awesome-->
	<script src="https://kit.fontawesome.com/f7ef469c0b.js"></script>
	<!--Bootstrap javascript -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<!--Jquery CDN-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/publicstyle.css">
	<style type="text/css">
		.fieldinfo{
			color:rgb(251,174,44);
			font-family: Bitter,Georgia,"Times New Roman",Times,serif;
			font-size: 1.2em;
		}
		.commentblock{
			background-color:#e3e1e180;
			width: 90%;
			border-top: 5px;
		}
		.comment-info{
			color:#365899;
			font-family: sans-serif;
			font-size: 1.1em;
			font-weight: bold;
			padding-top: 5px;
			margin-left: 10px;
		}
		.comment{
			margin-top: -12px;
			padding-bottom: 10px;
			font-size: 1.1em;
		}
		.rating_block{
			margin-top: 35px;

		}
		.tagged{
			background-color:#878a8d;
			color:#fff;
		}
		.rate{
			margin-top: 50px;
			margin-left: 200px;
		}
		.star{
			float: left;
		}
		.unrated{
			position: relative;
		}
		.unrated:before {
			    content: "\f005";
			    font-family: "Font Awesome 5 Free";
			    font-style: normal;
			    font-weight: normal;
			    text-decoration: inherit;
			/*--adjust as necessary--*/	
			    font-size: 40px		    
			   
        }
		.rated{
			position: relative;
		}
		.rated:before {
			    content: "\f005";
			    font-family: "Font Awesome 5 Free";
			    font-style: normal;
			    font-weight: normal;
			    text-decoration: inherit;
			/*--adjust as necessary--*/
			    color: #FFD800FF;
			    font-size: 40px;
			    
        }
        
	</style>
</head>
<body>
	<div style="height: 10px;background-color: #27aae1;"></div>
	<div style="height: 10px;background-color: #27aae1;" class="line"></div>
	<div class="container"><!--Main Area -->
		<div class="blog-header">			
			<?php 
			echo Message();
		    echo SuccessMessage(); 
		    ?>
		</div>
		<div class="row"><!--Row-->
			<div class="col-4">
				<?php			
				if(isset($_POST['search'])){
					$search=$_POST['search'];
					$viewquery="SELECT * FROM admin_panel WHERE datetime LIKE '%$search%' OR title LIKE '%$search%' OR category LIKE '%$search%' OR post LIKE '%$search%'";
				}
				else{
					$postIdFromURL=$_GET['id'];
					$viewquery="SELECT * FROM journalists WHERE id='$postIdFromURL' ";
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
					<div class="card float-left" style="width: 15rem; height: 22rem;margin-left:20px;margin-right: 15px;margin-top: 35px;margin-bottom: 40px">
							 
					<a title="<?php echo $img_title;?>" href="<?php echo $img_link; ?>"><img class="card-img-top" style="width:15rem;height:12rem;" width="512" src="<?php echo $img_src;?>"></a>
							  
						<div class="card-body">
							<div class="card-title">	  	
								<?php 
								echo '<h5>'.htmlentities($name).'</h5>'; 
								?>
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
								<div class="badge badge-pill badge-primary float-left">Pro BJP</div>										<?php
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
									
									<div class="float-left" style="margin-left:10px;margin-top:-11px;"><span style="color:#37C76EC6;font-size: 28px;"><?php echo $rating; ?></span><?php echo '/5' ?>
									</div>
									<div class="float-left" style="margin-left:-39px;margin-top:20px;font-size:15px;color:#808a9f;">
									<span><?php echo '('.$descriptionText.')';?></span>
									</div>	  	
								</div>
							    <?php
							    }
							    else{
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
										<span style="color:#FF1700FF;font-size:28px;"><?php echo $rating; ?></span><?php echo '/5' ?>
										</div>
										<div class="float-left" style="margin-left:-25px;margin-top:20px;font-size:15px;color:#808a9f;">
										<span><?php echo '('.$descriptionText.')'; ?></span>
										</div>
								</div>
								<?php 
								}
								?>
								<!--Total no of ratings-->
							    <div>
								<?php echo '('.$total_ppl_rated.')'; ?>
								</div>
						</div>									 
			        </div>
				<?php
			  	  }
				?>			 
			</div><!--Main Blog Area Ending-->

			<!--Rating Area Beginning-->
			<div class="col">
				
				<div class="rating_block clearfix">
					<?php 
					if(isset($_SESSION['user_id'])){
					global $con;
					$user_id=$_SESSION['user_id'];
					$receiver_id=$_GET['id'];
					$query="SELECT * FROM pro_india WHERE sender='$user_id' AND receiver='$receiver_id'";
					$execute=mysqli_query($con,$query);
					$row=mysqli_fetch_array($execute);
					if($row){  
				    echo '<button class="badge badge-pill tagged float-left pro_india_btn" rel="'.$receiver_id.'">Nationalist</button>'
			     	   ;
			   	    }
				    else{	   	
					echo '<button class="badge badge-pill badge-primary float-left pro_india_btn" rel="'.$receiver_id.'">Nationalist</button>';
			        } 
					?>
					<?php 
					global $con;
					$user_id=$_SESSION['user_id'];
					$receiver_id=$_GET['id'];
					$query="SELECT * FROM anti_india WHERE sender='$user_id' AND receiver='$receiver_id'";
					$execute=mysqli_query($con,$query);
					$row=mysqli_fetch_array($execute);
					if($row){  
					echo '<button class="badge badge-pill tagged float-left anti_india_btn" rel="'.$receiver_id.'">Liberal</button>'
				    ;
			   	    }
                    else{ 	
					echo '<button class="badge badge-pill badge-primary float-left anti_india_btn" rel="'.$receiver_id.'">Liberal</button>';
			        } 
					?>
					<?php 
					global $con;
					$user_id=$_SESSION['user_id'];
					$receiver_id=$_GET['id'];
					$query="SELECT * FROM pro_bjp WHERE sender='$user_id' AND receiver='$receiver_id'";
					$execute=mysqli_query($con,$query);
					$row=mysqli_fetch_array($execute);
					if($row){
				    echo '<button class="badge badge-pill tagged float-left pro_bjp_btn" rel="'.$receiver_id.'">Pro BJP</button>'
				    ;
			   	    }
               	    else{
					echo '<button class="badge badge-pill badge-primary float-left pro_bjp_btn" rel="'.$receiver_id.'">Pro BJP</button>';
		            } 
					?>
					<?php 
					global $con;
					$user_id=$_SESSION['user_id'];
					$receiver_id=$_GET['id'];
					$query="SELECT * FROM pro_cong WHERE sender='$user_id' AND receiver='$receiver_id'";
					$execute=mysqli_query($con,$query);
					$row=mysqli_fetch_array($execute);
					if($row){
				    echo '<button class="badge badge-pill tagged float-left pro_cong_btn" rel="'.$receiver_id.'">Pro Cong</button>'
				    ;
			 	   }
				    else{	   	
					echo '<button class="badge badge-pill badge-primary float-left pro_cong_btn" rel="'.$receiver_id.'">Pro Cong</button>';
			        } 
					?>	
					<?php 
					global $con;
					$user_id=$_SESSION['user_id'];
					$receiver_id=$_GET['id'];
					$query="SELECT * FROM leftist WHERE sender='$user_id' AND receiver='$receiver_id'";
					$execute=mysqli_query($con,$query);
					$row=mysqli_fetch_array($execute);
					if($row){
				    echo '<button class="badge badge-pill tagged float-left leftist_btn" rel="'.$receiver_id.'">Leftist</button>'
			   	    ;
			   	    }
                    else{   	
					echo '<button class="badge badge-pill badge-primary float-left leftist_btn" rel="'.$receiver_id.'">Leftist</button>';
			        } 
					?>
					<?php 
					global $con;
					$user_id=$_SESSION['user_id'];
					$receiver_id=$_GET['id'];
					$query="SELECT * FROM rightist WHERE sender='$user_id' AND receiver='$receiver_id'";
					$execute=mysqli_query($con,$query);
					$row=mysqli_fetch_array($execute);
					if($row){ 
					echo '<button class="badge badge-pill tagged float-left rightist_btn" rel="'.$receiver_id.'">Rightist</button>'
				    ;
			   	    }
			        else{	   	
					echo '<button class="badge badge-pill badge-primary float-left rightist_btn" rel="'.$receiver_id.'">Rightist</button>';
			        } 
			        }
			        else {
					?>
					<form action="login.php">
			      		<button class="badge badge-pill badge-primary float-left " type="submit" rel="0" >Nationalist</button>
			      		<button class="badge badge-pill badge-primary float-left " type="submit" rel="0">Liberal</button>
			      		<button class="badge badge-pill badge-primary float-left " type="submit" rel="0">Pro BJP</button>
			      		<button class="badge badge-pill badge-primary float-left " type="submit" rel="0">Pro Cong</button>
			      		<button class="badge badge-pill badge-primary float-left " type="submit" rel="0">Leftist</button>
			      		<button class="badge badge-pill badge-primary float-left " type="submit" rel="0">Rightist</button>
			      	</form>

					<?php 
					}
					?>
				</div>
				<?php if(isset($_SESSION['user_id'])){
				?>		
				<div class="rate">
				        <div id="star1" data-value="1" name="<?php echo $_GET['id']; ?>" class="star unrated">
				        </div>
				        <div id="star2" data-value="2" name="<?php echo $_GET['id']; ?>" class="star unrated">				        	
				        </div>
				        <div id="star3"  data-value="3" name="<?php echo $_GET['id']; ?>" class="star unrated">				        	
				        </div>
				        <div id="star4"  data-value="4" name="<?php echo $_GET['id']; ?>" class="star unrated">
				        </div>
				        <div id="star5" data-value="5" name="<?php echo $_GET['id']; ?>" class="star unrated">	
				        </div>
                </div>
                <?php 
            	}
            	else{
                ?>
                <div class="rate">
                	<form action="login.php">
				        <button id="star1" data-value="1" name="redirect" class="star unrated" type="submit">
				        </button>
				        <button id="star2" data-value="2" name="redirect" class="star unrated" type="submit">				        	
				        </button>
				        <button id="star3"  data-value="3" name="redirect" class="star unrated" type="submit">				        	
				        </button>
				        <button id="star4"  data-value="4" name="redirect" class="star unrated" type="submit">
				        </button>
				        <button id="star5" data-value="5" name="redirect" class="star unrated" type="submit">	
				        </button>
				    </form>
                </div>

            	<?php 
        		}
            	?>

			</div><!--Rating Area Ending -->
		</div><!-- Row Ending-->

	    	<div class="row">	
				<div class="col-6" id="comment_block">
		            <?php 
		            global $con;
				 	$postid=$_GET['id'];
				 	$query="SELECT * FROM comments WHERE admin_panel_id='$postid'";
				 	$execute=mysqli_query($con,$query);
				 	while ($datarows=mysqli_fetch_array($execute)) {
				 		$commentdate=$datarows['datetime'];
				 		$commentername=$datarows['name'];
				 		$commentbyuser=$datarows['comment'];
				 	?>
					<div class="commentblock">
						<img src="images/facebook-anonymous-app.jpg" alt="" style="width:30px;height: 30px;margin-left: 10px;margin-top:5px;" class="float-left">
					<p class="comment-info" style="margin-left:50px; "><?php echo $commentername; ?></p>	
					<p class="description"  style="margin-left:50px;margin-top: -20px; "><?php echo $commentdate; ?></p>
					<p class="comment"  style="margin-left:50px; margin-top: -5px;"><?php echo $commentbyuser; ?></p>
					</div>		
				    <?php 		
				 	}
				    ?>
				</div>

			   <?php if(isset($_SESSION['user_id'])) { 
			   ?>
				<div style="margin-top: 25px;" class="çol-4">
					<form action="ajax/ajax_comments.php?id=<?php echo $_GET['id'];?>"method="post" class="form-inline" id="comment_form">
							<div class="form-group">
							<input type="text" class="form-control" name="comment" id="commentarea" placeholder="Enter Your Comment"style="width: 330px">	
							</div>
						<input type="submit" name="submit" value="Comment" class="btn btn-info">
					</form>
				</div>
				<?php 
				}
				else{
				?>
				<div style="margin-top: 25px;" class="çol-4">
					<form action="login.php" class="form-inline" >
							<div class="form-group">
							<input type="text" class="form-control"  placeholder="Enter Your Comment"style="width: 330px">	
							</div>
						<input type="submit" value="Comment" class="btn btn-info">
					</form>
				</div>
			<?php 
			}
			?>
				</div>
			</div>
	</div>
	<!-- Main Area Ending-->
	<!--Footer Beginning-->
		<div id="footer" >
			<hr><p>Theme By | Shubham Kumar| &copy;2020-2021 --- All Rights Reserved.</p>
			<a href="" style="color:white;text-decoration: none;cursor: pointer;font-weight: bold;">
				<p>
					 No one is allowed To copy.<br> &trade 
				</p>

			</a>		
		</div>
		<div style="height: 10px;background: #27AAE1;">			
		</div>
	<!--footer Ending-->
    <!--Script Start-->
		<script type="text/javascript" src="jquery/tag.js">
		</script>
		<script type="text/javascript" src="jquery/comment.js"></script>
		<script type="text/javascript" src="jquery/rating.js"></script>
</body>
</html>