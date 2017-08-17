<?php

include('../../../connect/connect.php');
$temp1="SELECT * FROM `theory` ORDER BY `TheoryMarks`";
//$temp2="select * from practical";
//$temp3="select * from sessionalm";
//$temp4="select * from theory";
$res1=mysqli_query($conn,$temp1);
//$res2=mysqli_query($conn,$temp2);
//$res3=mysqli_query($conn,$temp3);
//$res4=mysqli_query($conn,$temp4);
// 
// $row1=mysqli_fetch_assoc($res1);
// $row2=mysqli_fetch_assoc($res2);
// $row3=mysqli_fetch_assoc($res3);
// $row4=mysqli_fetch_assoc($res4);
	
	//echo "ROLL NO : ".$row1['Roll_No']."  <br>Name : ".$row1['Name'];
	
	
	// while($row1=mysqli_fetch_assoc($res1))
	// {
		// echo "ROLL NO : ".$row3['IT1']."Name : ".$row3['IT2'];
	// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student  Marks(sort)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/studentinfo.css">
	<link href="../../../css/MultiLevelDropdown.css" rel="stylesheet">
	 <link href="../../../css/bootstrap.min.css" rel="stylesheet">
  <script src="../../../js/alldata1.js"></script>
  <script src="../../../js/alldata2.js"></script>
	<script type="text/javascript" src="../../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../../js/jquery.min.js"></script>
	
	
  
  <script type="text/javascript" src="//dpidudyah7i0b.cloudfront.net/js/prebid.js" async></script>
	<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>

  
  
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TEACHER</a>
    </div>
	<ul class="nav navbar-nav">
     	<li><a href="../../../index1.html">HOME</a></li>
    		<ul class="nav navbar-nav">
      			<li><a href="../../AllData.php">All Details</a></li>
			 
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">SORT <b class="caret"></b></a>
                    <ul class="dropdown-menu multi-level">
                        <li><a href="#">SESSIONAL MARKS</a></li>
                         <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">IT 1 by</a>
                            <ul class="dropdown-menu">
                                <li><a href="../sessionalM/IT1/it1A.php">ASC</a></li>
                                <li><a href="../sessionalM/IT1/it1D.php">DESC</a></li>
                            </ul>
						</li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">IT 2 by</a>
                            <ul class="dropdown-menu">
                                <li><a href="../sessionalM/IT2/it2A.php">ASC</a></li>
                                <li><a href="../sessionalM/IT2/it2D.php">DESC</a></li>
                            </ul>
						</li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">IA by</a>
                            <ul class="dropdown-menu">
                                <li><a href="../sessionalM/IA/iaA.php">ASC</a></li>
                                <li><a href="../sessionalM/IA/iaD.php">DESC</a></li>
                            </ul>
                        </li>
                        
                        <li class="divider"></li>
                         <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">THEORY by</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">ACS</a></li>
                                <li><a href="thD.php">DESC</a></li>
                            </ul>
                        </li>
                        
                        <li class="divider"></li>
                         <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">PRACTICAL by</a>
                            <ul class="dropdown-menu">
                                <li><a href="../practical/prA.php">ACS</a></li>
                                <li><a href="../practical/prD.php">DESC</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </li>
            </ul>
			 
			 

		<!--	 <div class="dropdown">
  				<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Dropdown
  				<span class="caret"></span></button>
  					<ul class="dropdown-menu">
    					<li><a href="#">HTML</a></li>
    					<li><a href="#">CSS</a></li>
    					<li><a href="#">JavaScript</a></li>
  					</ul>
			 </div> -->
        
	<!--<ul class="nav navbar-nav">	
	<li><a href="passedstudent.php">Passed</a></li>
		<ul class="nav navbar-nav">
	<li><a href="failedstudent.php">Failed</a></li>-->
		
		<ul class="nav navbar-nav">	
	  <li>
			<form class="navbar-form navbar-right" role="search" action="../../search.php" method=POST>
				<div class="form-group">
					<input type="text" name="sData" class="form-control" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			</form>
	  </li>		  
	  
    </ul>
  </div>
</nav>


<div class="container">    
  <h2><b>Marks of students sort by Theory(ASC)</b></h2>
  
  <table class="table">
    <thead>
      <tr>
		 <th>Theory Obtd.</th>
        <th>Roll NO</th>
        <th>Name of Student</th>
		<th>Internal Test 1</th>
		<th>Internal Test 2</th>
		 <th>internal assesment</th>
		<th>Sessional Marks(50/25)</th>
		<th>Theory Grace</th>
		<th>Total Obtd.</th>
		<th>Practical Obtd.</th>
		<th>Practical Grace</th>
		<th>Total</th>
		<th>Remarks</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php
		while($row1=mysqli_fetch_assoc($res1))
		{
			$x=$row1['rollNo'];
			
			$temp2="SELECT * FROM `student` WHERE `Roll_No`=".$x;
			$temp3="SELECT * FROM `sessionalM` WHERE `RollNo`=".$x;
			$temp4="SELECT * FROM `practical` WHERE `rollNo`=".$x;
			
			$res2=mysqli_query($conn,$temp2);
			$res3=mysqli_query($conn,$temp3);
			$res4=mysqli_query($conn,$temp4);
			
 			$row2=mysqli_fetch_assoc($res2);
 			$row3=mysqli_fetch_assoc($res3);
 			$row4=mysqli_fetch_assoc($res4);
			
			echo "<tr>";
			echo "<td>".$row1["TheoryMarks"]."</td>";
			echo "<td>".$row2["Roll_No"]."</td>";
			echo "<td>".$row2["Name"]."</td>";
			
			//echo "<td>".$row3["IT1"]."</td>";
			echo "<td>".$row3["IT1"]."</td>";
			echo "<td>".$row3["IT2"]."</td>";
			echo "<td>".$row3["Assignment"]."</td>";
			$ses=$row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2);
			echo "<td>".$ses."</td>";
			
			echo "<td>".$row1["GraceMarks"]."</td>";
			$ses2=$row1["TheoryMarks"]+$ses;
			echo "<td>".$ses2."</td>";
			
			echo "<td>".$row4["practicalmarks"]."</td>";
			echo "<td>".$row4["practicalgrace"]."</td>";
			
			$ses3=$ses2+$row4["practicalmarks"];
			echo "<td>".$ses3."</td>";
			
			 if(($row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2)+$row1["TheoryMarks"])>=50)
			 {
				 echo "<td> PASSES </td>";
			 }
			 else
			 {
				 echo "<td>FAILS</td>";
			 }
			echo "</tr>";
		}
		?></td>
	 </tr>      
	
    </tbody>
  </table>
</div>

</body>
</html>