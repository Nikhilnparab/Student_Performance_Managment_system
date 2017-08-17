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
</div>
	
	
	
</body>
</html>