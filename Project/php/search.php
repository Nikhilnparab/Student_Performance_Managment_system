<?php
session_start();
$sData=$_POST['sData'];
include('../connect/connect.php');
$temp="select * from student where Roll_No=".$sData;

$res=mysqli_query($conn,$temp);

$num=mysqli_num_rows($res);
if($num!=0)
 {
	 $row=mysqli_fetch_assoc($res);
    $_SESSION['Sid']=$row['Roll_No'];
	$roll_no=$row['Roll_No'];
	 header("location:searchedinfo.php?id=".$roll_no);
 }
 else
 {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Roll No entered was incorrect or not in database!');\n";
		echo "window.location='AllData.php'";
		echo "</script>";
 }

?>