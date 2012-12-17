<?php
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

$sql = "SELECT * FROM posts";

echo "<table class='table table-striped table-condensed table-bordered'>";
echo "<div class='listposts'>";
	echo "<tr>";
		echo "<th> Title </th>";
		echo "<th> Date Published </th>";
		echo "<th> Actions </th>";
 	echo "</tr>";
	$results = $conn->query($sql);
			while($post = $results->fetch_assoc()){
				extract($post);
				// Make a PHP timestamp
					$time = strtotime($post['post_datepublished']);
				// Format timestamp for display
					$date = date('n j, Y',$time) ;
				echo "<tr>";
					echo "<td><a href='./?=public/post.php&amp;id={$post['post_id']}'> $post_title </a></td>";
					echo "<td> $date </td>";
					
					echo "<td>"; 
					?>
						<a class="btn btn-warning btn-mini" title="EDIT" href="./?p=admin/form_edit_post&amp;id=<?php echo $post['post_id']?>"><i class="icon-edit icon-white"></i></a>
						<a class="btn btn-danger btn-mini" title="DELETE" href="actions/delete_post.php?id=<?php echo $post['post_id']?>"><i class="icon-trash icon-white"></i></a>
					<?php 	
					echo "</td>";
				echo "</tr>";
		}
echo "</table>";
echo "</div>";
?>