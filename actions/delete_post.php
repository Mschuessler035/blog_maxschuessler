<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct select query to get the band name
$sql = "SELECT post_title FROM posts WHERE post_id={$_GET['id']}";

// Execute select query
$result = $conn->query($sql);
$post = $result->fetch_assoc();
extract($post);


// Construct delete query
$sql = 'DELETE FROM posts WHERE post_id='.$_GET['id'];

// Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
	// Message to be displayed on next request
//	$_SESSION['flash'] = array(
//			'message' => "<strong>$post_title</strong> was successfully deleted.",
//			'type'	  => 'info'
//	);

	// Redirect
	header('Location:../?p=admin/list_posts');
}

// Close DB connection
$conn->close();