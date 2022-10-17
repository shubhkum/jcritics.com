<?php 
	require_once('include/db.php');

?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>
<?php 
 if(isset($_GET['id'])){
	$deleteCommentId=$_GET['id'];
	global $selected;
	$query="DELETE FROM comments WHERE id='$deleteCommentId'";
	$execute=mysql_query($query);
	if($execute){
		$_SESSEION['SuccessMessage']="Comment Deleted Successfully";
		Redirect_to('comments.php');
	}
	else{
		$_SESSEION['ErrorMessage']='Something went Wrong';
		Redirect_to('comments.php');
	}
	
 }

 ?>