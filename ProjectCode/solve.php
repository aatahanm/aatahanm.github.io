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

			$challenge_no = $_POST['submit'];
 
			$query = "SELECT * FROM coding_challenges WHERE challenge_id = '$challenge_no'";
			$result = mysqli_query($con, $query);
			
			while($question_Row = mysqli_fetch_array($result)){
				echo '<h1>'.$question_Row[1].'</h1>
						<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> '.$question_Row[2].' </p></p>
  							<p><form action="" method="post"></p>
  							<p>Type your answer:</p> <textarea name="question" rows="15" cols="100" value="" style="margin-left: 30px;"/></textarea><p></p>
  							<p><select name="difficulty" class="selectwh" style="margin-left: 30px;" value="Easy"><option  class="selectwh" value="ava"/>Java
									<option  class="selectwh"  value="c++"/>C++
										<option  class="selectwh"  value="Python"/>Python</select></p>
										<p><button name="submit" type="submit" value="'.$challenge_no.'" style="margin-left: 562px;">Run Code</button>
										<button name="submit" type="submit" value="'.$challenge_no.'">Submit Code</button></p>
										</form>
  					';
			}

			if(isset($_POST['question'])){

				$answer = $_POST['question'];

				$sql = mysqli_query($con, "SELECT * FROM coding_challenges WHERE test_case = '$answer'");

				if(mysqli_num_rows($sql) == 0){
					echo "The answer is wrong.";
					$sql = mysqli_query($con, "INSERT INTO submission (text, score) VALUES ('$answer', '0')");
					$sql = mysqli_query($con, "INSERT INTO solves (text, score) VALUES ('$answer', '0')");
				}else{
					echo "The answer is correct.";
					$sql = mysqli_query($con, "INSERT INTO submission (text, score) VALUES ('$answer', '20')");
				}




			}

			mysqli_close($con);

		?>
      </div>

  	</div>

<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>