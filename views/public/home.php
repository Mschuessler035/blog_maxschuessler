<?php
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);
// Order
if(isset($_GET['order'])) {
	$order = $_GET['order'];
} else {
	$order = 'post_datepublished';
}
$sql = "SELECT * FROM posts ORDER BY post_datepublished DESC";
$results = $conn->query($sql);

echo "<table class='table table-striped table-condensed table-bordered'>";
echo "<div class='listposts'>";
	echo "<tr>";
		echo "<th> Title </th>";
		echo "<th> Date Published </th>";
 	echo "</tr>";
	
	// Display first post
	$post = $results->fetch_assoc();
	extract($post);
	echo "<div id='post'>";
	echo "<h2><a href='./?=public/post.php&amp;id={$post['post_id']}'>$post_title</a></h2>";
	echo "<p>$post_text</p>";
	echo'</div>';
	
	// Display other posts
	while($post = $results->fetch_assoc()){
		extract($post);
	// Make a PHP timestamp
		$time = strtotime($post['post_datepublished']);
	// Format timestamp for display
		$date = date('n j, Y',$time) ;
	echo "<tr>";
		echo "<td><a href='./?=public/post.php&amp;id={$post['post_id']}'> $post_title </a></td>";
		echo "<td> $date </td>";
	echo "</tr>";
	}
echo "</table>";
echo "</div>";
?>