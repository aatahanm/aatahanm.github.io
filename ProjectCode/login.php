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
				<a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Main Menu</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-nav-demo">
				<ul class="nav navbar-nav">
					<li><a href="login.php">My Profile</a></li>
					<li><a href="login.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Notifications</a></li>
          <li><a href="index.php"> Log out</a></li> 
				</ul>
			</div>
		</div>
	</nav>

  <div class="container">

    <div class="jumbotron">
      <h1> Login</h1>
      <form name="form1" method="post" action="" onsubmit="return validateUser()">
      Username
      <input type="text" name="username" size="15" value=""/></p>
      <br>
      <br> 
      Password
      <input type="password" name="pass" size="15" value=""/></p>
      <br>
      <br>
      <input type="radio" name="acctype" value="user">User
      <input type="radio" name="acctype" value="editor">Editor
      <input type="radio" name="acctype" value="company">Company
      <br>
      <br>
      <p><input type="submit" name="submit" value="Login"/></p>
      </form>
    </div>

	<script>	
	function validateUser() {
    	
    	var user = document.forms["form1"]["username"].value;    
    	var pssw = document.forms["form1"]["pass"].value;
    	var	acctype = document.forms["form1"]["acctype"].value;
    	
    	if (user == null || user == "" ||pssw == null || pssw == ""){
        	alert("You need to enter a username and password.");
        	return false;
    	}else if (acctype == ""){
    		alert("You have to select an account type.");
        	return false;
    	}        
    }
    </script>

	<?php
	include 'config.php';
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password     = $_POST['pass'];
		$acctype = $_POST['acctype'];

		if($username == "" || $password == "" || $acctype == ""){
			echo ("All blanks must be filled.");
		}else {
			// Query to get all customers with the given user name and password.
			$query = "SELECT * FROM member WHERE username='$username' and password='$password' and user_type = '$acctype'";
			$result = mysqli_query($con, $query);
			$num = mysqli_num_rows($result);

			// Check if an account exists.
			if ($num > 0){
  				session_start();
				$_SESSION['username']=$username;

				if($acctype == "user"){
					header('location:usermainmenu.php');
				}else if($acctype == "editor"){
					header('location:editormainmenu.php');
				}else if($acctype == "company"){
					header('location:companymainmenu.php');
				}
			}else{
				echo("Incorrect Username or Password!");
			}
		}
		mysqli_close($con);
	}
?>

<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	</body>
</html>
