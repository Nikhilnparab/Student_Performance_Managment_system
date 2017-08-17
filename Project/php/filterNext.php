<?php

$cat=$_POST['cat'];
include('../connect/connect.php');
$tem="select * from filter";
$re=mysqli_query($conn,$tem);
if($cat=="pit1")    
{
	$t="UPDATE `counts` SET `psessional`=-1 WHERE 1";
$r=mysqli_query($conn,$t);

    while($row=mysqli_fetch_assoc($re))
    {
        if($row['IT1']<7)
		{
			$temp="DELETE FROM `filter` WHERE `filter`.`RollNo` = ".$row['RollNo'];
			$res=mysqli_query($conn,$temp);	
		}
    }
}
else if($cat=="fit1")
{
	$t="UPDATE `counts` SET `fsessional`=-1 WHERE 1";
$r=mysqli_query($conn,$t);
    while($row=mysqli_fetch_assoc($re))
    {

		{
			$temp="DELETE FROM `filter` WHERE `filter`.`RollNo` = ".$row['RollNo'];
			$res=mysqli_query($conn,$temp);	
		}
    }
}
else if($cat=="pit2")
{
	$t="UPDATE `counts` SET `ps2`=-1 WHERE 1";
$r=mysqli_query($conn,$t);
    while($row=mysqli_fetch_assoc($re))
    {
        if($row['IT2']<7)
		{
			$temp="DELETE FROM `filter` WHERE `filter`.`RollNo` = ".$row['RollNo'];
			$res=mysqli_query($conn,$temp);	
		}
    }
}
else if($cat=="fit2")
{
$t="UPDATE `counts` SET `fs2`=-1 WHERE 1";
$r=mysqli_query($conn,$t);
    while($row=mysqli_fetch_assoc($re))
    {
        if($row['IT2']>=7)
		{
			$temp="DELETE FROM `filter` WHERE `filter`.`RollNo` = ".$row['RollNo'];
			$res=mysqli_query($conn,$temp);	
		}
    }
    
}
else if($cat=="ppract")
{
	$t="UPDATE `counts` SET `ppractical`=-1 WHERE 1";
$r=mysqli_query($conn,$t);
    while($row=mysqli_fetch_assoc($re))
    {
        if($row['Practical']<20)
		{
			$temp="DELETE FROM `filter` WHERE `filter`.`RollNo` = ".$row['RollNo'];
			$res=mysqli_query($conn,$temp);	
		}
    }	
}
else if($cat=="fpract")
{
	$t="UPDATE `counts` SET `fpractical`=-1 WHERE 1";
$r=mysqli_query($conn,$t);
    while($row=mysqli_fetch_assoc($re))
    {
        if($row['Practical']>=20)
		{
			$temp="DELETE FROM `filter` WHERE `filter`.`RollNo` = ".$row['RollNo'];
			$res=mysqli_query($conn,$temp);	
		}
    }
}
else if($cat=="ptheory")
{
$t="UPDATE `counts` SET `ptheory`=-1 WHERE 1";
$r=mysqli_query($conn,$t);
    while($row=mysqli_fetch_assoc($re))
    {
        if($row["Theory"]<40)
		{
			$temp="DELETE FROM `filter` WHERE `filter`.`RollNo` = ".$row['RollNo'];
			$res=mysqli_query($conn,$temp);	
		}
    }
}
else if($cat=="fthoery")
{
	$t="UPDATE `counts` SET `ftheory`=-1 WHERE 1";
$r=mysqli_query($conn,$t);
    while($row=mysqli_fetch_assoc($re))
    {
        if($row4["Theory"]>=40)
		{
			$temp="DELETE FROM `filter` WHERE `filter`.`RollNo` = ".$row['RollNo'];
			$res=mysqli_query($conn,$temp);	
		}
    }
}
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
  <script src="../js/alldata1.js"></script>
  <script src="../js/alldata2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../js/bootstrap-select.min.js"></script>
  <link rel="stylesheet" href="../css/bootstrap-select.min.css">

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
     			<li><a href="../index1.html">HOME</a></li>
				
    			<ul class="nav navbar-nav">
      				<li class="active"><a href="AllData.php">All Details</a></li>
				</ul>
				</ul>	
        
  		</div>
	</nav>
	

        
        
        <div class="container">
				
				
  <h2><b>Marks of students</b></h2>
					<?php		
		$tem="select * from counts";
					$r=mysqli_query($conn,$tem);
					$ro=mysqli_fetch_assoc($r);
					if($ro["psessional"]=="-1")
					{echo "<h5><b>Passed in IT1</b></h5>"; }
					if($ro["ps2"]=="-1")
					{echo "<h5><b>Passed in IT2</b></h5>";}
					if($ro["ppractical"]=="-1")
					{echo "<h5><b>Passed in Practical</b></h5>";}
					if($ro["ptheory"]=="-1")
					{echo "<h5><b>Passed in Theory</b></h5>";}
					if($ro["fsessional"]=="-1")
					{echo "<h5><b>Failed in IT1</b></h5>";}
					if($ro["fs2"]=="-1")
					{echo "<h5><b>Failed in IT2</b></h5>";}
					if($ro["fpractical"]=="-1")
					{echo "<h5><b>Failed in Practical</b></h5>";}
					if($ro["ftheory"]=="-1")
					{echo "<h5><b>Failed in Theory</b></h5>";}
echo "<form action='filterNext.php' method='post'>
	<select class='selectpicker'  multiple data-max-options='1' name='cat'>
    <optgroup label='Pass'>";
		if($ro["psessional"]!="-1"&&$ro["fsessional"]!="-1"){
		echo "<option value='pit1'>IT1</option>";
		}
       if($ro["fs2"]!="-1"&&$ro["ps2"]!="-1"){
				echo "<option value='pit2'>IT2</option>";
			 }
				if($ro["ppractical"]!="-1"&&$ro["fpractical"]!="-1")
				{
				echo "<option value='ppract'>Practical</option>";	
				}
					if($ro["ptheory"]!="-1"&&$ro["ftheory"]!="-1")
					{
						echo "<option value='ptheory'>Theory</option>";
					}
					
  echo " </optgroup>
    <optgroup label='Fail'>";
					if($ro["psessional"]!="-1"&&$ro["fsessional"]!="-1")
					{
        echo "<option value='fit1'>IT1</option>";
					}
					if($ro["fs2"]!="-1"&&$ro["ps2"]!="-1")
					{
					echo "<option value='fit2'>IT2</option>";
					}
        if($$ro["ppractical"]!="-1"&&$ro["fpractical"]!="-1")
				{
					echo "<option value='fpract'>Practical</option>";
				}
        if($ro["ptheory"]!="-1"&&$ro["ftheory"]!="-1")
					{
						echo "<option value='ftheory'>Theory</option>";
					}
    echo "</optgroup>
  </select>
		
	
        <input type='submit' value='Filter' name='Search' data-style='btn-danger'>
    </form>";
		?>
					
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
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php
			
			$tem="select * from filter";
			$re=mysqli_query($conn,$tem);
		while($ro=mysqli_fetch_assoc($re))
		{
			echo "<tr>";
			echo "<td>".$ro['RollNo']."</td>";
			echo "<td>".$ro['Name']."</td>";
			
			echo "<td>".$ro['IT1']."</td>";
			echo "<td>".$ro['IT2']."</td>";
			echo "<td>".$ro['IA']."</td>";
			$ses=$ro['IA']+(($ro['IT1']+$ro['IT2'])/2);
			echo "<td>".$ses."</td>";
			
			echo "<td>".$ro['Theory']."</td>";
			echo "<td>".$ro['theoryGrace']."</td>";
			$ses2=$ro['Theory']+$ses;
			echo "<td>".$ses2."</td>";
			
			echo "<td>".$ro['Practical']."</td>";
			echo "<td>".$ro['practGrace']."</td>";
			
			$ses3=$ses2+$ro['Practical'];
			echo "<td>".$ses3."</td>";
         
			echo "</tr>";
		}
		?></td>
	 </tr>      

    </tbody>
  </table>
            
    </div>
	
	<script src="../js/jquery.min.js"></script> 
		<script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap-editable.js" type="text/javascript"></script> 
    
    
    </body>
</html>