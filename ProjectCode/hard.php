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

    .p { 
		font-size: 60px;
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

		<p id="demo"></p> 
		<script>
			var deadline = new Date().getTime() + 15000;
			var x = setInterval(function() { 
			var now = new Date().getTime(); 
			var t = deadline - now; 
			var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
			var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
			var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
			var seconds = Math.floor((t % (1000 * 60)) / 1000); 
			document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s "; 
				if (t < 0) { 
					clearInterval(x); 
					document.getElementById("demo").innerHTML = "<span style=\"color:red\">" + "TIME IS UP!" + "</span>";
					window.location.href = "losingscreen.php";
				}
			}, 1000);
		</script>

		</div>
		</div>


		<div class="container">
    <div class="jumbotron">

      

      	<?php 
			include 'config.php';
		
			session_start();
			$username = $_SESSION['username'];

			$result = mysqli_query($con, "SELECT * FROM coding_challenges WHERE difficulty = 'hard' ORDER BY RAND() LIMIT 1");
			
			
			while($question_Row = mysqli_fetch_array($result)){
				echo '<h1>'.$question_Row[1].'</h1>
						<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> '.$question_Row[2].' </p></p>
  							<p><form action="hard.php" method="post"></p>
  							<p>Type your answer:</p> <textarea name="question" rows="15" cols="100" value="" style="margin-left: 30px;"/></textarea><p></p>
										<p><button name="submit" type="submit" value="">Submit Answer</button></p>
										</form>
  					';
			}
			

			mysqli_close($con);

		?>
      </div>

  	</div>


  	


<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>