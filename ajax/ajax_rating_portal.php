<?php 
include('../include/db.php');?>
<?php
include('../classes/class_portal.php'); ?>
<?php
include('../include/session.php');
?>
<?php 
	//global $con;
	$get= new Main;
	$submit = new Main;
	$user_id = $_SESSION['user_id'];
	$portal_id=$_POST['receiver'];
	$points=$_POST['point'];
	$query="SELECT * FROM rating_portal WHERE sender='$user_id' AND receiver='$portal_id'";
	$execute=mysqli_query($con,$query);
	$row=mysqli_fetch_array($execute);
	if($row){

		$curr_rating=$row['rating_score'];
		$submit->update_rating($user_id,$portal_id,$points,$curr_rating);	
	}
	else{
		$submit->add_rating($user_id,$portal_id,$points);
		//echo "sufheiodjgv";
	}


 ?>