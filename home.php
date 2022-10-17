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
				<li class="nav-item"><a class="nav-link active" href="home.php">Home</a></li>
				<li class="nav-item"><a class="nav-link " href="blog.php">Journalists</a></li>
				<li class="nav-item"><a class="nav-link" href="portals.php">Portals</a></li>
			</ul>
			</div>
			<!--<form class="form-inline my-2 my-lg-0" style="margin-left: 212px;" method="post">
			      <input class="form-control mr-sm-5" type="search" name="search" placeholder="Search Journalists , News... " aria-label="Search">
			      <button class="btn btn-outline-light my-2 my-sm-0" name="searchbtn" type="submit">Search</button>
		    </form>-->
		     <form class="form-inline">
	            <div class="input-group">                    
	                <input type="text" class="form-control" placeholder="Search Journalists, News Portals.." style="width:270px;margin-left: 70px;font-size: 17px;">
	                <div class="input-group-append">
	                    <button type="button" class="btn btn-secondary"><i class="fa fa-search" style="color:#E3C230;"></i></button>
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
		 <div class="container">
		 	<div class="row"><!--Row-->
			<div class="col-sm-12">
				<div class="clearfix justify-content-center">
				<div >
					<div class="float-right">
			   	<div class="score float-left">
						Credibility Score:<h3 style="color: #FF2300FF">90</h3>
					</div>
					<div class="score float-left">
						Ideology:<h5 style="color: #FF2300FF">Centrist</h5>
					</div>
				</div>
					<h5 class="toi">
						<img src="https://lh3.googleusercontent.com/AS0Z1xkuhveb3IXzYASn52nhlFDIwcEmu1XmewVDZ39R8fZrQ13wldCy2nbjx9Aa1WCS" alt="" width="40px" height="40px">
						Times of India
					</h5>	
					<h3>
						Anti CAA Protest Turn Violent In Delhi...
					</h3>
					
					<hr>
				</div>		
				<div>
					<div class="float-right">
			   	<div class="score float-left">
						Credibility Score:<h3  style="color: #FF2300FF">70</h3>
					</div>
					<div class="score float-left">
						Ideology:<h5 style="color: #FF2300FF">Leftist</h4>
					</div>
				</div>
					<h5 class="quint">
						<img src="https://i1.sndcdn.com/avatars-000126456494-sc5tcd-t500x500.jpg" alt="" width="40px" height="40px">
						Quint
					</h5>
					<h3>
						Stone Pelting in Delhi among Protesters...
					</h3>
					<hr>
				</div>		
				<div>
					<div class="float-right">
			   	<div class="score float-left">
						Credibility Score:<h3  style="color: #FF2300FF">60</h3>
					</div>
					<div class="score float-left">
						Ideology:<h5 style="color: #FF2300FF">Leftist</h4>
					</div>
				</div>
					<h5 class="print">
						<img src="https://assets.vccircle.com/uploads/2014/07/VCCircle_Scroll.in_logo-4.jpg" alt="" width="40px" height="40px">
						Scroll
					</h5>
					<h3>
						Who Started Violence in delhi?...
					</h3>
					<hr>
				</div>		
				<div>
					<div class="float-right">
			   	<div class="score float-left">
						Credibility Score:<h3  style="color: #FF2300FF">75</h3>
					</div>
					<div class="score float-left">
						Ideology:<h5 style="color: #FF2300FF">Leftist</h4>
					</div>
				</div>
					<h5 class="ndtv">
						<img src="https://pbs.twimg.com/profile_images/570440108424171520/QuGYd7jH_400x400.png" alt="" width="40px" height="40px">
						NDTV
					</h5>
					<h3>
						Key takeaways from Trump's Speech...
					</h3>
					<hr>
				</div>		
			   <div>
			   	<div class="float-right">
			   	<div class="score float-left">
						Credibility Score:<h3  style="color: #FF2300FF">40</h3>
					</div>
					<div class="score float-left">
						Ideology:<h5 style="color: #FF2300FF">Rightist</h4>
					</div>
				</div>
					<h5 class="republic_tv">
						<img src="https://upload.wikimedia.org/wikipedia/commons/7/7a/Republic_TV.jpg" alt="" width="40px" height="40px">
						Republic TV
					</h5>
					<h3>
						Modi's Speech In Varanasi....
					</h3>
					<hr>
				</div>		
				<div>
					<div class="float-right">
					<div class="score float-left">
						Credibility Score:<h3  style="color: #FF2300FF">90</h3>
					</div>
					<div class="score float-left">
						Ideology:<h5  style="color: #FF2300FF">Centrist</h4>
					</div>
					</div>
					<h5 class="indiatimes">
						<img src="https://staticresources.indiatimes.in/resources/themes/indiatimes_desktop_default/images/fbimage.png" alt="" width="40px" height="40px">
						India Times
					</h5>
					<h3>
						Economy Budget 2020. What has Middle class in it?...
					</h3>
					<hr>
				</div>		
				</div>
			</div>
		</div>
		 </div>
	
	<div style="height: 10px;background: #27AAE1;"></div>


	<!--Javascript Starts-->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>