<html>
	<head>
	<title>CoderBase</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <style type="text/css">
    body { padding-top: 70px; }
    .jumbotron {
      color: #2c3e50;
      background: #ecf0f1;

    }
    .navbar-inverse {
      background: #2c3e50;
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
				<a href="editormainmenu.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Main Menu</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<ul class="nav navbar-nav">
					<li><a href="editorprofilepage.php">My Profile</a></li>
					<li><a href="editormainmenu.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Notifications</a></li>
          <li><a href="index.php"> Log out</a></li>
				</ul>
			</div>
		</div>
	</nav>

  <div class="container">


    <div class="jumbotron">
      <h2>For Practice</h2>
      <a href="preparecodingchallenge.php"><button>Prepare Coding Challenge</button></a>
      <a href="preparenoncodingquestions.php"><button>Prepare Non-Coding Challenge</button></a>
      <a href="'preparecodingcontests"><button>Prepare Coding Contests</button></a>
      <!--<a href="'preparesurvivalchallenges.php"><button>Prepare Survival Challenges</button></a>-->
    </div>
  </div>

		<?php 
			include 'config.php';
		
			session_start();
			$username = $_SESSION['username'];

			// Query to get all tuples in the own table containing the customers id. 
			//$query = "SELECT * FROM owns WHERE cid='$cid'";
			//$result = mysqli_query($con, $query);
			
			mysqli_close($con);

		?>
	</body>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>