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
      	<?php 
			include 'config.php';
		
			session_start();
			$username = $_SESSION['username'];

			$question_no = $_POST['submit'];
 
			$query = "SELECT * FROM non_coding_question WHERE question_id = '$question_no'";
			$result = mysqli_query($con, $query);

			
			
			while($question_Row = mysqli_fetch_array($result)){
				echo '<h1>'.$question_Row[1].'</h1>
						<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> '.$question_Row[2].' </p></p>
  							<p><form action="" method="post"></p>
  							<p>Type your answer:</p> <textarea name="question" rows="15" cols="100" value="" style="margin-left: 30px;"/></textarea><p></p>
										<p><button name="submit" type="submit" value="'.$question_no.'">Submit Answer</button></p>
										</form>
  					';
			}

			if(isset($_POST['question'])){
				$question =  $_POST['question'];
				$sql = mysqli_query($con,"INSERT INTO user_non_coding_question (username, question_id, text, rate) VALUES ('$username', '$question_no', '$question', '0')"); 
				unset($_POST['question']);
			}

			

		?>
      </div>
  	</div>


  	  <div class="container">
      <div class="jumbotron">
      	<h2>Answers of Other Users</h2>
      	<?php 
      	include 'config.php';
      	
			$question_no = $_POST['submit'];

      	$query = "SELECT * FROM user_non_coding_question WHERE question_id = '$question_no'";
		$result = mysqli_query($con, $query);

		while($question_Row = mysqli_fetch_array($result)){
				echo '<h3>'.$question_Row[0].'</h3>
						<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> '.$question_Row[2].' </p></p>
  							<p><form action="" method="post"><img name="img" src="thumbs.png" data-picture_id="'.$question_Row[3].'">   '.$question_Row[3]. '<button name="submit" style="margin-left: 10px;" type="submit" value="'.$question_no.'">Thumbs up</button><br><br><input type="text" name="user" size="15" value="'.$question_Row[0].'" style="margin-left: 22px; visibility: hidden;"></form>
  					';
			}


			if(isset($_POST['user'])){
				$user =  $_POST['user'];
				$sql = mysqli_query($con,"SELECT rate FROM user_non_coding_question WHERE username='$user'");
				$rate = mysqli_fetch_array($sql);
				$rate[0]++;

				$sql = mysqli_query($con,"UPDATE user_non_coding_question SET rate = '$rate[0]' WHERE username='$user'"); 
				unset($_POST['user']);
			}

			mysqli_close($con);

      	?>
      </div>
      </div>


  	


<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>