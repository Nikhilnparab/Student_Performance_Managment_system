<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
include('../connect/connect.php');
$temp="select * from teacher where ID=".$username." and Tpassword=".$password;
$res=mysqli_query($conn,$temp);

$num=mysqli_num_rows($res);
if($num!=0)
 {
    $row=mysqli_fetch_assoc($res);
	//$roll_no=$row['Roll_No'];
    $Tid =$row['ID'];
   $_SESSION['Tid'] = $Tid;
	 header("location:AllData.php");
 }
 else
 {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Username or Password was incorrect!');\n";
		echo "window.location='../html/loginpages/loginT.html'";
		echo "</script>";
 }

?>