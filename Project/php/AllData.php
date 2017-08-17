<?php
session_start();
if(!isset($_SESSION['Tid']))
   {
       Header('location:../html/loginpages/loginT.html',true);
   }
include('../connect/connect.php');
$temp1="select * from student";
$temp2="select * from practical";
$temp3="select * from sessionalm";
$temp4="select * from theory";
$res1=mysqli_query($conn,$temp1);
$res2=mysqli_query($conn,$temp2);
$res3=mysqli_query($conn,$temp3);
$res4=mysqli_query($conn,$temp4);
 
 $row1=mysqli_fetch_assoc($res1);
 $row2=mysqli_fetch_assoc($res2);
 $row3=mysqli_fetch_assoc($res3);
 $row4=mysqli_fetch_assoc($res4);



$t="DELETE FROM `filter` WHERE 1";
$t1="UPDATE `counts` SET `fcount`=0,`pcount`=0,`psessional`=0,`ptheory`=0,`ppractical`=0,`fsessional`=0,`ftheory`=0,`fpractical`=0,`ps2`=0,`fs2`=0 WHERE 1";
$tt=mysqli_query($conn,$t);
$tt1=mysqli_query($conn,$t1);
	
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
  <link rel="stylesheet" href="../css/studentinfo.css">
	<link href="../css/MultiLevelDropdown.css" rel="stylesheet">
	 <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../js/alldata1.js"></script>
  <script src="../js/alldata2.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
<script src="../js/bootstrap-select.min.js"></script>
      <link rel="stylesheet" href="../css/bootstrap-select.min.css">
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
      				<li class="active"><a href="#">All Details</a></li>
         			<ul class="nav navbar-nav">
						<ul class="nav navbar-nav">
     			<li><a href="statistics.php">statistics</a></li>
      						<li><a href="web/index1.html">New Entry</a></li>
			 
					</ul>
					<ul class="nav navbar-nav">
      						<li><a href="deleteh.php">Delete a record</a></li>
			 
					</ul>
				</ul>
				</ul>
				</ul>
	
				<ul class="nav navbar-nav">
            		<li>
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Student Who<b class="caret"></b></a>
                    	<ul class="dropdown-menu multi-level">
                
                         	<li class="dropdown-submenu">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">PASSED</a>
                            	<ul class="dropdown-menu">
                                	<li><a href="Studentwho/passed/passedstudent.php">Overall</a></li>
                                	<li><a href="Studentwho/passed/psessional.php">Sessional</a></li>
									<li><a href="Studentwho/passed/ptheory.php">Theory</a></li>
									<li><a href="Studentwho/passed/ppractical.php">Practical</a></li>
                            	</ul>
                        	</li>
                        
                        	<li class="divider"></li>
                         	<li class="dropdown-submenu">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">FAILED</a>
                            	<ul class="dropdown-menu">
                                	<li><a href="Studentwho/failed/failedstudent.php">Overall</a></li>
                                	<li><a href="Studentwho/failed/fsessional.php">Sessional</a></li>
									<li><a href="Studentwho/failed/ftheory.php">Theory</a></li>
									<li><a href="Studentwho/failed/fpractical.php">Practical</a></li>
                            	</ul>
                        	</li>
							
							<li class="divider"></li>
							<li><a href="Studentwho/distinction.php">Distinction</a></li>
							
							<li class="divider"></li>
							<li><a href="Studentwho/firstclass.php">First Class</a></li>
							
							<li class="divider"></li>
							<li><a href="Studentwho/seconclass.php">Second Class</a></li>
                       
                        
                    	</ul>
                	</li>
            	</ul>
				
        
				<ul class="nav navbar-nav">
            		<li>
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown">SORT <b class="caret"></b></a>
                    	<ul class="dropdown-menu multi-level">
                        	<li><a href="#">SESSIONAL MARKS</a></li>
                         	<li class="dropdown-submenu">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">IT 1 by</a>
                            	<ul class="dropdown-menu">
                                	<li><a href="sort/sessionalM/IT1/it1A.php">ASC</a></li>
                                	<li><a href="sort/sessionalM/IT1/it1D.php">DESC</a></li>
                            	</ul>
							</li>
                        	<li class="dropdown-submenu">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">IT 2 by</a>
                            	<ul class="dropdown-menu">
                                	<li><a href="sort/sessionalM/IT2/it2A.php">ASC</a></li>
                                	<li><a href="sort/sessionalM/IT2/it2D.php">DESC</a></li>
                            	</ul>
							</li>
                        	<li class="dropdown-submenu">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">IA by</a>
                            	<ul class="dropdown-menu">
                                	<li><a href="sort/sessionalM/IA/iaA.php">ASC</a></li>
                                	<li><a href="sort/sessionalM/IA/iaD.php">DESC</a></li>
                            	</ul>
                        	</li>
                        
                        	<li class="divider"></li>
                         	<li class="dropdown-submenu">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">THEORY by</a>
                            	<ul class="dropdown-menu">
                                	<li><a href="sort/theory/thA.php">ACS</a></li>
                                	<li><a href="sort/theory/thD.php">DESC</a></li>
                            	</ul>
                        	</li>
                        
                        	<li class="divider"></li>
								<li class="dropdown-submenu">
                            		<a href="#" class="dropdown-toggle" data-toggle="dropdown">PRACTICAL by</a>
                            	<ul class="dropdown-menu">
                                	<li><a href="sort/practical/prA.php">ACS</a></li>
                                	<li><a href="sort/practical/prD.php">DESC</a></li>
                            	</ul>
                        	</li>
                        
                    	</ul>
                	</li>
            	</ul>		 
			 
			 
  <?php
        $Tid =$row1['Roll_No'];
   $_SESSION['Tid'] = $Tid;
        
        ?>
        
		
		<ul class="nav navbar-nav">
	  			<li>
					<form class="navbar-form navbar-left" role="search" action="search.php" method=POST>
						<div class="form-group">
							<input type="text" name="sData" class="form-control" placeholder="Search">
						</div>
					<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
					</form>
	  			</li>
				<li><a href="logout.php">Log Out</a></li>
	  		</ul>
  		</div>
	</nav>
	


<div class="container">    
  <h2><b>Marks of All students</b></h2>
    
	
	<form action="filter.php" method="post">
	<select class="selectpicker"  multiple data-max-options="1" name="cat">
    <optgroup label="Pass">
        <option value="pit1">IT1</option>
        <option value="pit2">IT2</option>
        <option value="ppract">Practical</option>
        <option value="ptheory">Theory</option>
    </optgroup>
    <optgroup label="Fail">
        <option value="fit1">IT1</option>
        <option value="fit2">IT2</option>
        <option value="fpract">Practical</option>
        <option value="fthoery">Theory</option>
    </optgroup>
  </select>
        <input type="submit" value="Filter" name="Search" data-style="btn-danger">
    </form>
		
  
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
			echo "<tr>";
			echo "<td>".$row1["Roll_No"]."</td>";
			echo "<td>".$row1["Name"]."</td>";
			
			echo "<td><span class= 'xedit' id='".$row3['RollNo']."' id2='sessionalm' id3='IT1'>".$row3["IT1"]."</span></td>";
			echo "<td><span class= 'xedit' id='".$row3['RollNo']."' id2='sessionalm' id3='IT2'>".$row3["IT2"]."</span></td>";
			echo "<td><span class= 'xedit' id='".$row3['RollNo']."' id2='sessionalm' id3='Assignment'>".$row3["Assignment"]."</span></td>";
			$ses=$row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2);
			echo "<td>".$ses."</td>";
			
			echo "<td><span class= 'xedit' id='".$row4['rollNo']."' id2='theory' id3='TheoryMarks'>".$row4["TheoryMarks"]."</span></td>";
			echo "<td><span class= 'xedit' id='".$row4['rollNo']."' id2='theory' id3='GraceMarks'>".$row4["GraceMarks"]."</span></td>";
			$ses2=$row4["TheoryMarks"]+$ses;
			echo "<td>".$ses2."</td>";
			
			echo "<td><span class= 'xedit' id='".$row2['rollNo']."' id2='practical' id3='practicalmarks'>".$row2["practicalmarks"]."</span></td>";
			echo "<td><span class= 'xedit' id='".$row2['rollNo']."' id2='practical' id3='practicalgrace'>".$row2["practicalgrace"]."</span></td>";
			
			$ses3=$ses2+$row2["practicalmarks"];
			echo "<td>".$ses3."</td>";
			
			 if((($row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2)+$row4["TheoryMarks"])>=50) && ($row2['practicalmarks']>=20))
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
<script src="../js/jquery.min.js"></script> 
		<script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap-editable.js" type="text/javascript"></script> 
	
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.xedit').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id');
			var x2 = $(this).closest('td').children('span').attr('id2');
			var x3= $(this).closest('td').children('span').attr('id3');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "process.php?id="+x+"&data="+y+"&id2="+x2+"&id3="+x3,
				type: 'GET',
				success: function(s){
					if(s == 'status'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error Processing your Request!');}
				},
				error: function(e){
					alert('Error Processing your Request!!');
				}
			});
		});
});
</script>
	
	
	
	
	
</body>
</html>
