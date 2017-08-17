<?php
include("../connect/connect.php");
if($_GET['id'] and $_GET['data'] and $_GET['id2'] and $_GET['id3'])
{
	$id = $_GET['id'];
	$data = $_GET['data'];
	$id2 = $_GET['id2'];
	$id3 = $_GET['id3'];
	if(mysqli_query($conn,"update $id2 set $id3='$data' where RollNo='$id'"))	
	echo 'success';
}
?>