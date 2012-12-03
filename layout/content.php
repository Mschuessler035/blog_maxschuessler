<?php
// Use the page in the QS if present
if(isset($_GET['p'])) {
	$page = $_GET['p'];
} else {
	$page = 'home';
}

include("views/public/$page.php");