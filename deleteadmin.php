<?php 
	require_once('include/db.php');

?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>
<?php 
 if(isset($_GET['id'])){
	$deleteCategoryId=$_GET['id'];
	global $selected;
	$query="DELETE FROM admins WHERE id='$deleteCategoryId'";
	$execute=mysql_query($query);
	if($execute){
		$_SESSEION['SuccessMessage']="Category Deleted Successfully";
		Redirect_to('admin.php');
	}
	else{
		$_SESSEION['ErrorMessage']='Something went Wrong';
		Redirect_to('admin.php');
	}
	
 }

 ?>