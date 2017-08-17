<?php
session_start();
$Name=$_POST['Name'];
$Roll_No=$_POST['Roll_No'];
$Password=$_POST['Password'];
$CPassword=$_POST['CPassword'];
$IT1=$_POST['IT1'];
$IT2=$_POST['IT2'];
$IA=$_POST['IA'];
$SemM=$_POST['SemM'];
$SemGM=$_POST['SemGM'];
$PractM=$_POST['PractM'];
$PractGM=$_POST['PractGM'];


if($CPassword!=$Password)
{
	echo "<script language=\"JavaScript\">\n";
		echo "alert('Password did not match!');\n";
		echo "window.location='index1.html'";
		echo "</script>";
}
else
{

$temp1="INSERT INTO `practical`(`rollNo`, `practicalmarks`, `practicalgrace`) VALUES ('$Roll_No','$PractM','$PractGM')";
$temp2="INSERT INTO `sessionalm`(`IT1`, `IT2`, `Assignment`, `RollNo`) VALUES ('$IT1','$IT2','$IA','$Roll_No')";
$temp3="INSERT INTO `student`(`Roll_No`, `Name`, `Password`) VALUES ('$Roll_No','$Name','$Password')";
$temp4="INSERT INTO `theory`(`TheoryMarks`, `GraceMarks`, `rollNo`) VALUES ('$SemM','$PractGM','$Roll_No')";




include('../../connect/connect.php');
//$temp="select * from teacher where ID=".$username." and Tpassword=".$password;

$res1=mysqli_query($conn,$temp1);
$res2=mysqli_query($conn,$temp2);
$res3=mysqli_query($conn,$temp3);
$res4=mysqli_query($conn,$temp4);
	
//$row=mysqli_fetch_assoc($res3);
//$Roll_no=$row['Roll_No'];
	
	
$roll_no=$_POST['Roll_No'];

header("location:newinfo.php?id=".$roll_no);

//$num=mysqli_num_rows($res);
//if($num!=0)
// {
//    $row=mysqli_fetch_assoc($res);
//	//$roll_no=$row['Roll_No'];
//    $Tid =$row['ID'];
//   $_SESSION['Tid'] = $Tid;
//	 header("location:AllData.php");
// }
// else
// {
//		echo "<script language=\"JavaScript\">\n";
//		echo "alert('Username or Password was incorrect!');\n";
//		echo "window.location='../html/loginpages/loginT.html'";
//		echo "</script>";
// }
}
?>