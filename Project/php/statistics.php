<?php

include('../connect/connect.php');
$temp1="select * from student";
$temp2="select * from practical";
$temp3="select * from sessionalm";
$temp4="select * from theory";
$res1=mysqli_query($conn,$temp1);
$res2=mysqli_query($conn,$temp2);
$res3=mysqli_query($conn,$temp3);
$res4=mysqli_query($conn,$temp4);

$pcount=0;
$fcount=0;
$psessional=0;
$ppractical=0;
$ptheory=0;
$fsessional=0;
$fpractical=0;
$ftheory=0;



while($row1=mysqli_fetch_assoc($res1))
		{
            $row2=mysqli_fetch_assoc($res2);
			$row3=mysqli_fetch_assoc($res3);
			$row4=mysqli_fetch_assoc($res4);
			 if((($row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2)+$row4["TheoryMarks"])>=50) && ($row2['practicalmarks']>=20))
             {
			      $pcount++;
             }
			else
			{
				$fcount++;
			}
		if($row2["practicalmarks"]>=20)
		{
			$ppractical++;
		}
	else
	{
		$fpractical++;
	}
	if(($row3['Assignment']+(($row3['IT1']+$row3['IT2'])/2))>=10)
	{
		$psessional++;
	}
	else
	{
		$fsessional++;
	}
	if($row4["TheoryMarks"]>=40)
	{ $ptheory++;
}
	else
	{ $ftheory++;
}
		}

        $temp1="UPDATE `counts` SET `fcount`='$fcount',`pcount`='$pcount',`psessional`='$psessional',`ptheory`='$ptheory',`ppractical`='$ppractical',`fsessional`='$fsessional',`ftheory`='$ftheory',`fpractical`='$fpractical' WHERE 1";
$res1=mysqli_query($conn,$temp1);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Statistics</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/studentinfo.css">
	<link href="../css/tab.css" rel="stylesheet">
	<!-- <link href="../../../css/bootstrap.min.css" rel="stylesheet">
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
</style>-->

  
  
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">TEACHER</a>
    </div>
	<ul class="nav navbar-nav">
     	<li><a href="../index.html">HOME</a></li>
		<ul class="nav navbar-nav">
     	<li class="active"><a href="#">Statistics</a></li>
    		<ul class="nav navbar-nav">
      			<li><a href="AllData.php">All Details</a></li>
		</ul>
	  </ul>
	  </ul>
	</div>
	</nav>
	
	

	
		<script src="../js/jquery.min.js"></script> 
		<script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrap-editable.js" type="text/javascript"></script> 
	
	
	<script src="../js/highcharts.js"></script>
<script src="../js/data.js"></script>
<script src="../js/drilldown.js"></script>
    
    
    
    
    <div class="container">
	<div class="col-sm-2">
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li class="active"><a href="#tab1" data-toggle="tab">Pie chart</a></li>
          <li class=""><a href="#tab2" data-toggle="tab">Bar graph</a></li>                              
		</ul>
	</nav>
</div>
<!-- tab content -->
<div class="tab-content">
<div class="tab-pane active text-style" id="tab1">
    <h2>Pie chart</h2>
  <div id="tab1" style="min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto"></div>

    
    
    
    
    
    
<script type="text/javascript">
	// Create the chart
Highcharts.chart('tab1', {
    chart: {
        type: 'pie'
    },
    title: {
        text: '<b>Students who passed and failed</b>'
    },
    subtitle: {
        text: 'Click the slices to view versions.'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b>'
    },
    series: [{
        name: ' ',
        colorByPoint: true,
        data: [{
            name: 'Passed',
            <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 echo "y :".$row1['pcount'].""; ?>,
            drilldown: 'Passed'
        }, {
            name: 'Failed',
            <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 echo "y :".$row1['fcount'].""; ?>,
            drilldown: 'Failed'
        }  ]
    }],
    drilldown: {
        series: [{
            name: 'Passed',
            id: 'Passed',
            data: [ <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Sessional',".$row1['psessional']."]";?>,
                <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Theory',".$row1['ptheory']."]";?>,
				   <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Practical',".$row1['ppractical']."]";?>
            ]
        }, {
            name: 'Failed',
            id: 'Failed',
            data: [ <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Sessional',".$row1['fsessional']."]";?>,
                <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Theory',".$row1['ftheory']."]";?>,
				   <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Practical',".$row1['fpractical']."]";?>
            ]
        }]
    }
});
	</script>   
</div>

    
    <div class="tab-pane text-style" id="tab2">
  <h2>Bar graph</h2>
  <div id="tab2" style="min-width: 310px; max-width: 600px; height: 400px; margin: 0 auto"></div>
    
<script type="text/javascript">
	// Create the chart
Highcharts.chart('tab2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: '<b>Students who passed and failed</b>'
    },
    subtitle: {
        text: 'Click the slices to view versions.'
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '{point.name}: {point.y:.1f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b>'
    },
    series: [{
        name: ' ',
        colorByPoint: true,
        data: [{
            name: 'Passed',
            <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 echo "y :".$row1['pcount'].""; ?>,
            drilldown: 'Passed'
        }, {
            name: 'Failed',
            <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 echo "y :".$row1['fcount'].""; ?>,
            drilldown: 'Failed'
        }  ]
    }],
    drilldown: {
        series: [{
            name: 'Passed',
            id: 'Passed',
            data: [ <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Sessional',".$row1['psessional']."]";?>,
                <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Theory',".$row1['ptheory']."]";?>,
				   <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Practical',".$row1['ppractical']."]";?>
            ]
        }, {
            name: 'Failed',
            id: 'Failed',
            data: [ <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Sessional',".$row1['fsessional']."]";?>,
                <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Theory',".$row1['ftheory']."]";?>,
				   <?php $temp1="select * from counts"; $res1=mysqli_query($conn,$temp1); $row1=mysqli_fetch_assoc($res1); 
	 			echo "['Practical',".$row1['fpractical']."]";?>
            ]
        }]
    }
});
	</script>
</div>
</div>

	
	
	
</body>
</html>