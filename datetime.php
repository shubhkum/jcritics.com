<?php 

date_default_timezone_set("Asia/Kolkata");
$currentTime=time();
$dateTime=strftime("%B-%d-%Y %H:%M:%S",$currentTime);

echo $dateTime;

?>