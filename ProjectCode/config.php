<?php
	// Database connection
	$con = mysqli_connect("dijkstra.ug.bcc.bilkent.edu.tr","atahan.mutlu","R67xFk3B","atahan_mutlu");

	if (mysqli_connect_errno()){
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
?>