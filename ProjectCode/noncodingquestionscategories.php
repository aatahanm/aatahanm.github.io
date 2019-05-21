<html>
	<head>
<title>CoderBase</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="MyProfile.css">
  <style type="text/css">
    body { padding-top: 70px; }
    .jumbotron {
      color: #2c3e50;
      background: #ecf0f1;

    }
    .navbar-inverse {
      background: #2c3e50;
    }

    .button-placement{
    	margin-left: 900px;
    	width: 100px;
    	height: 30px;

    }

    .text-field{
    	margin-left: 27px;
    	width: 500px;
    	height: 200px;
    }

    .selectwh{
    	margin-left: 30px;
    	width: 100px;
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
				<a href="usermainmenu.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Main Menu</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<ul class="nav navbar-nav">
					<li><a href="userprofilepage.php">My Profile</a></li>
					<li><a href="usermainmenu.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Notifications</a></li>
          <li><a href="index.php"> Log out</a></li>
				</ul>
			</div>
		</div>
	</nav>

		<div class="container">
		<div class="jumbotron">
    		<h2>Categories for Non-coding Challenges</h2>
  		</div>

  		<div class="jumbotron">

		<?php 
			include 'config.php';
		
			session_start();
			$username = $_SESSION['username'];

			// Query to get all tuples in the own table containing the customers id. 
			$query = "SELECT category_name, COUNT(*) AS count FROM category_non_coding_question GROUP BY category_name";
			$result = mysqli_query($con, $query);

			
			
			while($question_Row = mysqli_fetch_array($result)){
				echo '<p><form action="noncodingquestions.php" method="post"><button name="submit" type="submit" value="'.$question_Row[0].'"">'.$question_Row[0].''." ".''.$question_Row[1].'</button></form></p>';
			}

			
			
			mysqli_close($con);

		?>
		</div>
		</div>
	</body>
</html>