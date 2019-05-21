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
    		<h2>Non-coding Questions</h2>
  		</div>

  		<?php 
			include 'config.php';
		
			session_start();
			$username = $_SESSION['username'];

			$category = $_POST['submit'];
 
			$query = "SELECT question_id, question_name FROM non_coding_question WHERE question_id IN (SELECT question_id FROM category_non_coding_question WHERE category_name = '$category')";
			$result = mysqli_query($con, $query);

			
			
			while($question_Row = mysqli_fetch_array($result)){
				echo '<div class="jumbotron">
  							<p>'.$question_Row[1].'&emsp;</p>
  							
  							<p><form action="answer.php" method="post"><button name="submit" type="submit" value="'.$question_Row[0].'">Answer the Question</button></form></p>
  					</div>';
			}

			mysqli_close($con);

		?>
  	</div>


<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>