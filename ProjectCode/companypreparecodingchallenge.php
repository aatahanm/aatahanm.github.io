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

		<div class="container">
      <div class="jumbotron">
        <h1><i ></i> Information of the Challenge</h1>
      </div>

		<form name="form" class="jumbotron" method="post">
  			<p>Title: <input type="text" name="title" size="15" style="margin-left: 72px; width:500px;" value=""/></p>

			<p>Question: <textarea name="question" rows="10" cols="41" value="" style="margin-left: 25px;"/></textarea></p>
			<p>Difficulty: <select name="difficulty" class="selectwh" value="Easy"><option  class="selectwh" value="Easy"/>Easy
									<option  class="selectwh"  value="Medium"/>Medium
										<option  class="selectwh"  value="Hard"/>Hard</select></p>
			<p>Languages: <input type="text" name="language" size="15" value="" style="margin-left: 3px; width:500px;"/></p>
			<p>Category: <input type="text" name="category" size="15" value="" style="margin-left: 22px; width:500px;"/></p>
			<p>Test Cases: <input type="text" name="testcase" size="15" value="" style="margin-left: 3px; width:500px;"/></p>
			<p><input type="submit" name="submit" value="Submit"/></p>

  		</form>



		<?php 
			include 'config.php';
		
			session_start();
			$username = $_SESSION['username'];

			if(isset($_POST['submit'])){
				$title = $_POST['title'];
				$question = $_POST['question'];
				$difficulty = $_POST['difficulty'];
				$language = $_POST['language'];
				$test = $_POST['testcase'];
				$category = $_POST['category'];

				if($title == "" || $question == "" || $difficulty == "" || $language == ""
					|| $test == "" || $category == ""){
					echo "All blanks must be filled.";
				}else {

					$sql = mysqli_query($con,"INSERT INTO category (category_name) VALUES ('$category')"); 
						
					$sql = mysqli_query($con,"INSERT INTO coding_challenges (challenge_name, text, difficulty, test_case) VALUES ('$title', '$question', '$difficulty', '$test')"); 

					$sql = mysqli_query($con,"INSERT INTO editor_coding_challenges (username) VALUES 
						('$username')");

					$sql = mysqli_query($con,"INSERT INTO category_coding_challenges ( category_name) VALUES ('$category')"); 


					//$result2 = mysqli_multi_query($con, $sql);

					echo "Question created.";
					}
				
			
			}
			
			mysqli_close($con);

		?>

	</body>
</html>