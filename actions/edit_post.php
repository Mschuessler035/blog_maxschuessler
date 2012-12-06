<?php

// Load DB constants
require('../config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);
	
extract($_POST);
$sql = "UPDATE posts SET post_title='$post_title',post_text='$post_text'";

