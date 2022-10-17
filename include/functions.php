<?php 
	require_once('include/db.php');

?>
<?php require_once('include/session.php'); ?>

<?php 
	function Redirect_to($newLocation){
		header("Location:".$newLocation);
		exit;
	}
	function check_email_exists($email){
		global $con;
		$query="SELECT * FROM users WHERE email='$email'";
		$execute=mysqli_query($con,$query);
		if(mysqli_num_rows($execute)>0){
			return true;
		}
		else {
		    return false;
		}
	}
	function password_encryption($password){
		$blowfish_hash_format="$2y$10$";//2y to tell php to use Blowfish with a cost of "10";
		$salt_length=22; // Blowfish Salt should be 22 characters or long;
		$salt=generate_salt($salt_length);
		$formating_blowfish_with_salt=$blowfish_hash_format.$salt;
		$hash=crypt($password,$formating_blowfish_with_salt);
		return $hash;
	}
	function generate_salt($length){
		//Not 100% unique, not 100% random,but good enough for a salt
		//MD5 Algorithm returns 32 characters
		$unique_random_string=md5(uniqid(mt_rand(),true));
		//Valid Characters for a salt are [a-z A-Z 0-9];
		$base64_string=base64_encode($unique_random_string);
		//But not +, which is valid in base64. So we are replacing it with .;
		$modified_base_string=str_replace('+', '.', $base64_string);
		$salt=substr($modified_base_string,0,$length);
		return $salt;
	}
	function password_check($password,$existing_hash){
		// existing hash contains format and salt that we made in password encryption function
		$hash=crypt($password,$existing_hash);
		if($hash===$existing_hash){
			return true;
		}
		else{
			return false;
		}
	}
	function login_attempt($email,$password){
		global $con;
		$query="SELECT * FROM users WHERE email='$email'";
		$execute=mysqli_query($con,$query);
		if($admin=mysqli_fetch_assoc($execute)){
		   if(password_check($password,$admin['password'])){
		   	return $admin;
		   }
		   else{
		   	return null;
		   }
		}
	

	}
	function login(){
		if(isset($_SESSION['user_id'])||isset($_COOKIE['user_id'])){
			return true;
		}
	}

	function confirm_login(){
		if(!login()){
			Redirect_to('login.php');
		}
	}
?>