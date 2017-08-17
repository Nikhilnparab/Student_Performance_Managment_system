
<?php
include('../../../connect/connect.php');
$temp1="select * from student";
$temp2="select * from practical";
$temp3="select * from sessionalm";
$temp4="select * from theory";
$res1=mysqli_query($conn,$temp1);
$res2=mysqli_query($conn,$temp2);
$res3=mysqli_query($conn,$temp3);
$res4=mysqli_query($conn,$temp4);
 
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
  <title>Student Marks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../../css/studentinfo.css">
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
      <li><a href="../../AllData.php">All Details</a></li>
		
<ul class="nav navbar-nav">	
	  
        
	<ul class="nav navbar-nav">
            		<li>
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Student Who<b class="caret"></b></a>
                    	<ul class="dropdown-menu multi-level">
                    
                         	<li class="dropdown-submenu">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">PASSED</a>
                            	<ul class="dropdown-menu">
                                	<li><a href="passedstudent.php">Overall</a></li>
                                	<li><a href="#">Sessional</a></li>
									<li><a href="ptheory.php">Theory</a></li>
									<li><a href="ppractical.php">Practical</a></li>
                            	</ul>
                        	</li>
                        
                        	<li class="divider"></li>
                         	<li class="dropdown-submenu">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">FAILED</a>
                            	<ul class="dropdown-menu">
                                	<li><a href="../failed/failedstudent.php">Overall</a></li>
                                	<li><a href="../failed/fsessional.php">Sessional</a></li>
									<li><a href="../failed/ftheory.php">Theory</a></li>
									<li><a href="../failed/fpractical.php">Practical</a></li>
                            	</ul>
                        	</li>
							
							<li class="divider"></li>
							<li><a href="../distinction.php">Distinction</a></li>
							
							<li class="divider"></li>
							<li><a href="../firstclass.php">First Class</a></li>
							
							<li class="divider"></li>
							<li><a href="../seconclass.php">Second Class</a></li>
                       
                        
                    	</ul>
                	</li>
            	</ul>	
		
	  <li>
			<form class="navbar-form navbar-left" role="search" action="../../search.php" method=POST>
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
  <h2><b>Marks of Passed students in sessional</b></h2>
  
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
		while($row1=mysqli_fetch_assoc($res1))
		{
            $row2=mysqli_fetch_assoc($res2);
			$row3=mysqli_fetch_assoc($res3);
			$row4=mysqli_fetch_assoc($res4);
			 if(($row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2))>=10)
             {
			echo "<tr>";
			echo "<td>".$row1["Roll_No"]."</td>";
			echo "<td>".$row1["Name"]."</td>";
			
			echo "<td><i><b>".$row3["IT1"]."</b></i></td>";
			echo "<td><i><b>".$row3["IT2"]."</b></i></td>";
			echo "<td><i><b>".$row3["Assignment"]."</b></i></td>";
			$ses=$row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2);
			echo "<td><i><b>".$ses."</b></i></td>";
			
			echo "<td>".$row4["TheoryMarks"]."</td>";
			echo "<td>".$row4["GraceMarks"]."</td>";
			$ses2=$row4["TheoryMarks"]+$ses;
			echo "<td>".$ses2."</td>";
			
			echo "<td>".$row2["practicalmarks"]."</td>";
			echo "<td>".$row2["practicalgrace"]."</td>";
			
			$ses3=$ses2+$row2["practicalmarks"];
			echo "<td>".$ses3."</td>";
			
			echo "<td> Passed </td>";
         
			echo "</tr>";
             }
		}
		?></td>
	 </tr>      

    </tbody>
  </table>
</div>

</body>
</html>
