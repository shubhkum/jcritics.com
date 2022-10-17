<?php 
include('../include/db.php');?>
<?php
include('../classes/class.php'); ?>
<?php
include('../include/session.php');
?>
<?php 
	$get= new Main;
	$submit = new Main;
	//global $con;
	$user_id = $_SESSION['user_id'];
	$journalist_id=$_POST['receiver'];
	$points=$_POST['point'];
	$query="SELECT * FROM rating WHERE sender='$user_id' AND receiver='$journalist_id'";
	$execute=mysqli_query($con,$query);
	$row=mysqli_fetch_array($execute);
	if($row){
		$curr_rating=$row['rating_score'];
		$submit->update_rating($user_id,$journalist_id,$points,$curr_rating);	
	}
	else{
		$submit->add_rating($user_id,$journalist_id,$points);
		//echo "sufheiodjgv";
	}


 ?>