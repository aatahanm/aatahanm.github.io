<?php
	include 'config.php';

	session_start();
	$username = $_SESSION['username'];
	
	$newusername = $_POST['username'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$website = $_POST['website'];
	$country = $_POST['country'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
	$street = $_POST['street'];

	
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

	header('location:editorprofilepage.php');
	
	mysqli_close($con);
?>