<?php 
include('../include/db.php');?>
<?php
include('../classes/class_portal.php'); ?>
<?php
include('../include/session.php');
?>
<?php
//Instantiating  claass
$get = new Main;
$submit = new Main;
$user_id = $_SESSION['user_id'];
//if user submit follow 
if(isset($_POST['tag'])){
 $receiver = $_POST['tag'];
    //run function from main class
 $submit->leftist_tagged($user_id,$receiver);   
}
//if user submit unfollow
if(isset($_POST['Untag'])){
    $receiver = $_POST['Untag'];
    //run function from main class
 $submit->leftist_untagged($user_id,$receiver);     
}
?>