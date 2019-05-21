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
        <h1><i class="fa fa-user"></i> Profile Information</h1>
      </div>

  		<form name="form" class="jumbotron" method="post">
  			<input type="submit" class="button-placement" name="submit" value="Submit" 
    		onclick="window.location.href = 'profilepage.php';"/>
    		<p>&emsp; Username: <input type="text" name="username" size="15" value=""/>  
    		<h2><span class="glyphicon glyphicon-list-alt"></span> Basic info</h2>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> Name: <input type="text" name="name" size="15" value=""/></p>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> E-mail: <input type="text" name="email" size="15" value=""/></p>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> Website: <input type="text" name="website" size="15" value=""/></p>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> Address</p>
    		<p>&emsp; &emsp; <span class="glyphicon glyphicon-menu-right"></span> Country: <input type="text" name="country" size="15" value=""/></p>
    		<p>&emsp; &emsp; <span class="glyphicon glyphicon-menu-right"></span> City: <input type="text" name="city" size="15" value=""/></p>
    		<p>&emsp; &emsp; <span class="glyphicon glyphicon-menu-right"></span> Zip Code: <input type="number" step="1" name="zipcode" pattern="\d+"/></p>
    		<p>&emsp; &emsp; <span class="glyphicon glyphicon-menu-right"></span> Street: <input type="text" name="street" size="15" value=""/></p>
    		<h2><span class="glyphicon glyphicon-list-alt"></span> Experience</h2>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> Work Place: <input type="text" name="wspace" size="15" value=""/></p>
    		<p>&emsp; <span class="glyphicon glyphicon-menu-right"></span> Education: <input type="text" name="education" size="15" value=""/></p>
    		<h2><span class="glyphicon glyphicon-list-alt"></span> Technical Skills: <input type="text" name="techSkill" size="15" value=""/></p></h2>

  		</form>

  		<div class="jumbotron">
    		<h1><i class="far fa-user-circle"></i> Badges</h1>
    		<pre><span class="glyphicon glyphicon-flag"></span>			<span class="glyphicon glyphicon-lock"></span></pre>
    		<pre>  Competitor			  Ambitious</pre>
  		</div>
  	</div>

		

	<?php 
		include 'config.php';
		
		session_start();
		$username = $_SESSION['username'];

		if(isset($_POST['submit'])){
		$newusername = $_POST['username'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$website = $_POST['website'];
		$country = $_POST['country'];
		$city = $_POST['city'];
		$zipcode = $_POST['zipcode'];
		$street = $_POST['street'];
		$wspace = $_POST['wspace'];
		$education = $_POST['education'];
		$techSkill = $_POST['techSkill'];

	
		if ($newusername != ""){
			$query = "UPDATE member SET username='$newusername' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}
		if ($email != ""){
			$query = "UPDATE member SET email='$email' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}
		if ($name != ""){
			$query = "UPDATE member SET name='$name' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}
		if ($website != ""){
			$query = "UPDATE member SET website='$website' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}
		if ($country != ""){
			$query = "UPDATE member SET country='$country' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}
		if ($city != ""){
			$query = "UPDATE member SET city='$city' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}
		if ($zipcode != 0){
			$query = "UPDATE member SET zip_code='$zipcode' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}
		if ($street != ""){
			$query = "UPDATE member SET street='$street' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}

		if ($wspace != ""){
			$query = "UPDATE user SET work_place='$wspace' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}

		if ($education != ""){
			$query = "UPDATE user SET education='$education' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}

		if ($techSkill != ""){
			$query = "UPDATE user SET technical_skills='$techSkill' WHERE username='$username'";
			$result = mysqli_query($con, $query);
		}

		header('location:userprofilepage.php');
}
	
	mysqli_close($con);

	?>

	</body>
</html>