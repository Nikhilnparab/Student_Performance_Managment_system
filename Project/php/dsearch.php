<?php

include('../connect/connect.php');

$Roll_no=$_GET['id'];

$temp1="select * from student where Roll_No=".$Roll_no;
 // echo $Roll_no;
 // echo $temp1;
$temp2="select * from practical where rollNo=".$Roll_no;
$temp3="select * from sessionalm where RollNo=".$Roll_no;
$temp4="select * from theory where rollNo=".$Roll_no;

$res1=mysqli_query($conn,$temp1);
$res2=mysqli_query($conn,$temp2);
$res3=mysqli_query($conn,$temp3);
$res4=mysqli_query($conn,$temp4);
 
 $row1=mysqli_fetch_assoc($res1);
 $row2=mysqli_fetch_assoc($res2);
 $row3=mysqli_fetch_assoc($res3);
 $row4=mysqli_fetch_assoc($res4);
	

$roll_no=$row1['Roll_No'];
	//echo "ROLL NO : ".$row1['Roll_No']."  <br>Name : ".$row1['Name'];
	
	
	//while($row1=mysqli_fetch_assoc($res1))
	//{
		//echo "ROLL NO : ".$row1['Roll_No']."Name : ".$row1['Name'];
	//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Marks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/studentinfo.css">
	<link href="../css/MultiLevelDropdown.css" rel="stylesheet">
	 <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/deleteS.css" rel="stylesheet">
  <script src="../js/alldata1.js"></script>
  <script src="../js/alldata2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>

	
</head>
<body>

	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
	
      			<a class="navbar-brand" href="#">TEACHER</a>
    		</div>
			<ul class="nav navbar-nav">
     			<li><a href="../index1.html">HOME</a></li>
    			<ul class="nav navbar-nav">
      				<li><a href="AllData.php">All Details</a></li>
    
					<ul class="nav navbar-nav">
      						<li class="active"><a href="#">Delete a record</a></li>
			 
					</ul>
				</ul>

	  		</ul>
  		</div>
	</nav>
	
	
	<div class="container">
	<div class="row">
		<h2>Enter The students Roll No You want to delete</h2>
           <div id="custom-search-input">
                            <form class="navbar-form navbar-left" role="search" action="dsearchCheck.php" method=POST>
						<div class="form-group">
							<input type="text" name="sData" class="form-control" placeholder="Search">
						</div>
					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
					</form>
                        </div>
	</div>
		
		
		<div class="container">    
  <h2><b>your search</b></h2>
  
  <table class="table">
    <thead>
      <tr>
        <th>Roll NO</th>
        <th>Name of Student</th>
		<th>Internal Test 1</th>
		<th>Internal Test 2</th>
		<th>internal assesment</th>
		<th>Sessional Marks(50/25)</th>
		<th>Theory Obtd.</th>
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
		echo $row1['Roll_No'];
		?></td>
        <td><?php
		echo $row1['Name'];
		?></td>
		<td><?php
		echo $row3['IT1'];
		?></td>
		<td><?php
		echo $row3['IT2'];
		?></td>
		<td><?php
		echo $row3['Assignment'];
		?></td>
		
		<td><?php
		echo $row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2);
		?></td>
		
		<td><?php
		echo $row4['TheoryMarks'];
		?></td>
		<td><?php
		echo $row4['GraceMarks'];
		?></td>
		<td><?php
		echo $row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2)+$row4['TheoryMarks'];
		?></td>
		<td><?php
		echo $row2['practicalmarks'];
		?></td>
		<td><?php
		echo $row2['practicalgrace'];
		?></td>
		
		<td><?php
		echo $row2['practicalmarks']+$row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2)+$row4['TheoryMarks'];
		?></td>
		
		<td><?php
		if(($row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2)+$row4['TheoryMarks'])>=50)
		{
			echo "PASSES";
		}
		else
		{
			echo "FAILS";
		}
		?></td>
		
	 </tr>      

    </tbody>
  </table>
			
		<!--	<a class="btn btn-danger" href="ActualDelete.php?id=".$roll_no role="button">DELETE</a>-->
		<?php	
		
	echo "<button type='button'class='btn btn-danger' onclick=javascript:window.location.href='actualDelete.php?id=".$row1['Roll_No']."'>Delete</button>";
	
	
	?>
			
			
			
			
</div>
		
		
		

</div>
</body>
</html>


