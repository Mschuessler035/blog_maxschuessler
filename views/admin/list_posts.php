<?php
// Load DB constants
require('config/db.php');
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

$sql = "SELECT * FROM posts";

echo "<div class='listposts'>";
echo "<tr>";
	echo "<th> Title </th>";
	echo "<th> Date Published";
	echo "<th></th>";

	$results = $conn->query($sql);
			while($post = $results->fetch_assoc()){
				extract($post);
			echo "<table class='table table-striped table-condensed table-bordered'>";
				echo "<tr>";
					echo "<td><a href='./?=public/post.php&amp;id=<?php echo $post['post_id']?>'> $post_title </a></td>";
					echo "<td> $post_datepublished </td>";
					echo "<td>";
						echo "<a class="btn btn-warning btn-mini" title="EDIT" href="./?p=form_edit_post&amp;id=<?php echo $post['post_id']?>"><i class="icon-edit icon-white"></i></a>";
						echo "<a class="btn btn-danger btn-mini" title="DELETE" href="actions/delete_post.php?id=<?php echo $post['post_id']?>"><i class="icon-trash icon-white"></i></a>";
					echo "</td>";
				echo "</tr>";
		}
?>

	<a class="btn btn-warning btn-mini" title="EDIT" href="./?p=form_edit_post&amp;id=<?php echo $post['post_id']?>"><i class="icon-edit icon-white"></i></a>
	<a class="btn btn-danger btn-mini" title="DELETE" href="actions/delete_post.php?id=<?php echo $post['post_id']?>"><i class="icon-trash icon-white"></i></a>

<?php 
	echo "</div>";
?>