<?php
// Load DB constants
require('config/db.php');
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

$sql = "SELECT * FROM posts";

	$results = $conn->query($sql);
			while($post = $results->fetch_assoc()):
				extract($post);
				echo "<h2> $post_title</h2>";
				echo "<p> $post_text </p>";
?>

			<a class="btn btn-warning btn-mini" title="EDIT" href="./?p=form_edit_post&amp;id=<?php echo $post['post_id']?>"><i class="icon-edit icon-white"></i></a>
			<a class="btn btn-danger btn-mini" title="DELETE" href="actions/delete_post.php?id=<?php echo $post['post_id']?>"><i class="icon-trash icon-white"></i></a>
<?php 
 	endwhile;
?>