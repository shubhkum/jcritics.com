<?php 
require_once('include/session.php');

?>
<?php require_once('include/functions.php'); ?>

<?php 
	$_SESSION['user_id']=null;
	session_destroy();
	$expireTime=time()-86400;
			  	setcookie("settingEmail",null,$expireTime);
			  	setcookie("user_name",null,$expireTime);
			  	setcookie("user_id",null,$expireTime);
	Redirect_to('login.php');
 ?>