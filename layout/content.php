<?php
if(isset($_GET['p'])) {
	$page = $_GET['p'];
} else {
	$page = 'admin/list_posts';
}

include("views/$page.php");