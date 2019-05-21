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
    	margin-left: 650px;

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
	


	
		<?php 
			include 'config.php';
		
			session_start();
			$username = $_SESSION['username'];

			// Query to get all tuples in the own table containing the customers id. 
			$query = "SELECT * FROM member WHERE username='$username'";
			$result = mysqli_query($con, $query);
			$companyInfo = mysqli_fetch_array($result);

		?>

	<div class="container">
      <div class="jumbotron">
        <h1><i class="fa fa-user"></i> Company Information</h1>
      </div>

  		<div class="jumbotron">
    		<p>&emsp; Username: <?php echo $companyInfo[0]?> 
    		<input type="submit" class="button-placement" name="submit" value="Edit Profile " 
    		onclick="window.location.href = 'companyprofilepageedit.php';"/>
    		<h2><span class="glyphicon glyphicon-list-alt"></span> Basic info</h2>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> Name:  <?php echo $companyInfo[2]?> </p></p>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> E-mail:  <?php echo $companyInfo[4]?> </p></p>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> Website:  <?php echo $companyInfo[9]?> </p></p>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> Phone number:  <?php echo $companyInfo[8]?> </p>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> Address</p>
    		<p>&emsp; &emsp; <span class="glyphicon glyphicon-menu-right"></span> Country:  <?php echo $companyInfo[5]?> </p>
    		<p>&emsp; &emsp; <span class="glyphicon glyphicon-menu-right"></span> City:  <?php echo $companyInfo[7]?> </p>
    		<p>&emsp; &emsp; <span class="glyphicon glyphicon-menu-right"></span> Zip Code:  <?php echo $companyInfo[6]?> </p>
    		<p>&emsp; &emsp; <span class="glyphicon glyphicon-menu-right"></span> Street:  <?php echo $companyInfo[8]?> </p>
  		</div>

  	</div>

		<?php mysqli_close($con); ?>

<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</body>
</html>