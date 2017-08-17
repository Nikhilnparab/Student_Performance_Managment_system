<?php

include('../connect/connect.php');
$Roll_no=$_GET['id'];

$temp1="delete from student where Roll_No=".$Roll_no;
 // echo $Roll_no;
 // echo $temp1;
$temp2="delete from practical where rollNo=".$Roll_no;
$temp3="delete from sessionalm where RollNo=".$Roll_no;
$temp4="delete from theory where rollNo=".$Roll_no;
$res1=mysqli_query($conn,$temp1);
$res2=mysqli_query($conn,$temp2);
$res3=mysqli_query($conn,$temp3);
$res4=mysqli_query($conn,$temp4);
 
echo "<script language=\"JavaScript\">\n";
		echo "alert('Deletion SucessFull!');\n";
		echo "window.location='deleteh.php'";
		echo "</script>";
?>


