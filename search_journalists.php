<?php 
	require_once('include/db.php');
?>
<?php require_once('include/session.php'); ?>
<?php require_once('include/functions.php'); ?>


<?php 
global $con;
if(isset($_GET['search_text'])){
	$query=$_GET['search_text'];
		$usersReturnedQuery = mysqli_query($con, "SELECT * FROM journalists WHERE name LIKE '%$query%'");
		if(mysqli_num_rows($usersReturnedQuery) == 0){
				echo "We can't find anyone with a ".$query." Please try another portal";
			}
		else {
				while ($row= mysqli_fetch_array($usersReturnedQuery)) {
					$id= $row['id'];
				}
				$Location="fullpost.php?id=".$id;
				header("Location: ".$Location);
			}
	}
	
else{
	header("Location: blog.php");
}

?>