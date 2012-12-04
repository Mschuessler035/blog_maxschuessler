<?php
	print_r($_POST);
	extract($_POST);
	
	// Load DB constants
	require('../config/db.php');
	
	// Connect to the database
	$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);
	
	// Construct query
	$sql = "INSERT INTO posts (post_title,post_text) VALUES('$post_title','$post_text')";
	
	// Execute query
	$conn->query($sql);
	
	// Echo error
	//if($conn->error != '') {
	//	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	//	echo "<h3>SQL Executed</h3><p>$sql</p>";
	//	echo '<pre>$_POST: ';
	//	print_r($_POST);
	//	echo '</pre>';
	//} else {
		// Redirect
	//	header('Location:../?p=home');
	
	//	$_SESSION['flash'] = array(
	//			'message' => "Post was successfully added!",
	//			'type' => 'success'
	//	);
//	}
	
	// Close connection
	$conn->close();
?>