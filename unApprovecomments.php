<?php 
	require_once('include/db.php');

?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>
<?php 
 if(isset($_GET['id'])){
	$unapproveCommentId=$_GET['id'];
	global $selected;
	$query="UPDATE comments SET status='OFF' WHERE id='$unapproveCommentId'";
	$execute=mysql_query($query);
	if($execute){
		$_SESSEION['SuccessMessage']="Comment Unapproved Successfully";
		Redirect_to('comments.php');
	}
	else{
		$_SESSEION['ErrorMessage']='Something went Wrong';
		Redirect_to('comments.php');
	}
	
 }

 ?>