<html>
	<head>
	<title>CoderBase</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <style type="text/css">
    body { padding-top: 70px; text-align :center;}
    .jumbotron {
      color: #2c3e50;
      background: #ecf0f1;

    }
    .navbar-inverse {
      background: #2c3e50;
    }
		h2{
			font-size: 300%;

		}
		.menu{
			height : 50px;
			width : 360px;
			border-radius : 16px;
			background :  #2c3e50;
			color : #ecf0f1;
			font-size : 150%;
			
		}

  </style>	

	</head>
	
	<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-nav-demo" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
				<a href="companymainmenu.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Main Menu</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<ul class="nav navbar-nav">
					<li><a href="companyprofilepage.php">My Profile</a></li>
					<li><a href="companymainmenu.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Notifications</a></li>
          <li><a href="index.php"> Log out</a></li>
				</ul>
			</div>
		</div>
	</nav>

  <div class="container">


    <div class="jumbotron">
      <h2>For Interview</h2>
      <a href="companypreparecodingchallenge.php"><button class = "menu">Prepare Coding Challenge</button></a><br><br>
      <a href="companypreparenoncodingquestions.php"><button class = "menu">Prepare Non-Coding Challenge</button></a><br><br>
      <a href="prepareinterview.php"><button class = "menu">Prepare Interview</button></a><br><br>
	  <br><br>
	  <br><br>
	  <a href="interviewresults.php"><button class = "menu">Results of the Previous Interviews</button></a><br><br>
    </div>
  </div>

		<?php 
			
			include 'config.php';
			
			session_start();
			$username = $_SESSION['username'];

			// Query to get all tuples in the own table containing the customers id. 
			//$query = "SELECT * FROM owns WHERE cid='$cid'";
			//$result = mysql_query($con, $query);
			
			mysqli_close($con);

		?>
	</body>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>