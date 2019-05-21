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
		h2{
			font-size: 300%;

		}
        
		.menu{
			height : 50px;
			width : 360px;
			border-radius : 16px;
			background :  #2c3e50;
			color : #ecf0f1;
			font-size : 150%;
			
		}
		.questions{
			
			float:right;
			color :#2c3e50;
			
			border-radius : 36px;

		}

		.questionsBorder{
			padding-top: 25px;
    padding-right: 50px;
     padding-bottom: 25px;
     padding-left: 50px;
			border-style : hidden ;
				background : #2c3e50;
				color :#ecf0f1;
				border-radius : 36px;
		}

		.sub{
			color :#2c3e50;

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
      <h2>Interview Informations</h2>
      </div>
      <form name="form" class="jumbotron" method="post">

			<p class="questionsBorder">text: <textarea class = "sub" name="text" rows="10" cols="41" value="" style="margin-left: 100px;"/></textarea></p>
			<p class="questionsBorder"> Duration: <input class = "sub" type="text" name="duration" size="15" value="" style="margin-left: 55px; width:500px;"/></p>
			<p class="questionsBorder">Position : <input class = "sub" type="text" name="position" size="15" value="" style="margin-left: 52px; width:500px;"/></p>
			<p class="questionsBorder">Specifications: <input class = "sub" type="text" name="specifications" size="15" value="" style="margin-left: 3px; width:500px;"/></p>
			<p class="questionsBorder"><input type="submit" class="sub" name="submit" value="Submit"/></p>
			
  		

        <?php 
        
            include 'config.php';
            session_start();
						$username = $_SESSION['username'];
						$result0 = mysqli_query($con,"SELECT challenge_name,text,challenge_id FROM coding_challenges;");
						echo "<p class = \"questionsBorder\"> Questions:</p>";
						$counter = 0;
						$question_ids;
						while($questions = mysqli_fetch_array($result0))
								{
									echo "<p class=\"questionsBorder\">$questions[0] <input type=\"checkbox\" class =\"questions\" name=\"add[]\" value=\"$counter\"/><br><br> $questions[1]</p>";
									$questions_ids[$counter] = $questions[2];
									$counter++;

						}
						echo "</form>";
						
            if(isset($_POST['submit'])){
								$text = $_POST['text'];
                $duration  = $_POST['duration'];
                $position  = $_POST['position'];
                $specifications  = $_POST['specifications'];
                if($text == "" || $position == "" || $specifications == ""){
								echo "All blanks must be filled.";
								
            	}
            	else{
								$result1 = mysqli_query($con,"SELECT company_id FROM company WHERE username ='$username'");
                $company_id = mysqli_fetch_array($result1)[0];
                $query = "SELECT * FROM interview";
                $result = mysqli_query($con, $query);
                $num_rows = mysqli_num_rows($result);
								$num_rows++;              
								//echo "$num_rows $company_id";

								mysqli_query($con,"INSERT INTO interview VALUES ($num_rows,$company_id,'$position',null,'$specifications',null)");
								
									if(isset($_POST['add'])) {
										$add = $_POST['add'];
								 
								 
										foreach($add as $qs) {
												mysqli_query($con,"INSERT INTO interview_coding_challenges VALUES ($questions_ids[$qs],$num_rows)");
												//mysqli_query($con, "INSERT INTO interview VALUES")
										}
								} else {
										echo 'choose a question';
								}



                
								
								/*$result2 = mysqli_query($con,"SELECT * FROM submission");
								$num_rows1 = mysqli_num_rows($result2);
								$num_rows1++;
								mysqli_query($con,"INSERT INTO submission VALUES ($num_rows1,'$text', $score)");
								mysqli_query($con,"INSERT INTO interviewer_interviewee VALUES ($num_rows,$num_rows1,'$interviewee')");
								*/
            }
            }
            
            echo "</div></div>";
			

			// Query to get all tuples in the own table containing the customers id. 
			//$query = "SELECT * FROM owns WHERE cid='$cid'";
			//$result = mysql_query($con, $query);
			
			mysqli_close($con);

		?>
	</body>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</html>