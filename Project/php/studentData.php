<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];
include('../connect/connect.php');
$temp="select * from student where Roll_No=".$username." and Password=".$password;
$res=mysqli_query($conn,$temp);

$num=mysqli_num_rows($res);
if($num!=0)
 {
	 $row=mysqli_fetch_assoc($res);
    //echo $row['Password'];
    //$Sid =$row['Password'];
   $_SESSION['Sid']=$row['Password'];
   // echo $Sid;
    
	$roll_no=$row['Roll_No'];
	 header("location:studentinfo.php?id=".$roll_no);
 }
 else
 {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Username or Password was incorrect!');\n";
		echo "window.location='../html/loginpages/loginS.html'";
		echo "</script>";
 }

?>