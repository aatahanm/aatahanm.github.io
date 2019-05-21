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
      <h1> Sign Up</h1>
      <form name="form1" method="post" action="" onsubmit="return validateInfo()">
      Username
      <input type="text" name="username" size="15" value="">
      <br>
      <br> 
      Password
      <input type="password" name="pass" size="15" value=""> 
      <br>
      <br>
      Confirm Password
      <input type="password" name="cpass" size="15" value=""> 
      <br>
      <br>
      <input type="radio" name="acctype" value="user"> User
      <input type="radio" name="acctype" value="editor"> Editor
      <input type="radio" name="acctype" value="company"> Company 
      <br>
      <br>
      <input type="submit" name="submit" value="Create New Account"/>
      </form>
  </div>		

	<script>	
	function validateInfo() {
    	var user = document.forms["form1"]["username"].value;    
    	var pssw = document.forms["form1"]["pass"].value;
    	var cpssw = document.forms["form1"]["cpass"].value;
    	var	acctype = document.forms["form1"]["acctype"].value;

    	if (user == null || user == "" ||pssw == null || pssw == ""){
        	alert("You need to enter a username and password.");
        	return false;
    	}else if (cpssw != pssw){
    		alert("The passwords you entered does not match.");
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

      $query = "INSERT INTO member (username, password, name, user_type, email, country, zip_code, city, street, website)
        VALUES ('$username', '$password', null, '$acctype', null, null, null, null, null, null)";
      $result = mysqli_query($con, $query);

      if($acctype == "editor"){
        $query2 = "INSERT INTO editor (username) VALUES ('$username')";
        $result2 = mysqli_query($con, $query2);
      }else if ($acctype == "user" ){
        $sql = mysqli_query($con,"INSERT INTO user (username) VALUES ('$username')");
      }
      else if($acctype == "company"){
        $query1 = "SELECT * FROM company";
		    $result1 = mysqli_query($con, $query1);
	  	  $num_rows = mysqli_num_rows($result1);
		    $num_rows++;
        $sql = mysqli_query($con,"INSERT INTO company VALUES ($num_rows,'$username',null)");

      }

      // Check if an account exists.
      if ($result > 0){
        echo "Success ";
      }else{
        echo "User already exists!";
      } 
    }
    mysqli_close($con);
    ?>

  <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 

	</body>
</html>