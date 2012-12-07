<?php
	// Connect to the database
	$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);
	
	// Construct query
	$sql = "SELECT * FROM posts WHERE post_id={$_GET['id']} LIMIT 1";
	
	// Execute query
	$results = $conn->query($sql);
	
	// Get the band
	$post = $results->fetch_assoc();
	
	// Close the connection
	$conn->close();
?>

<h2>Edit Post</h2>
<form action="actions/add_post.php" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="band_name">Post Title</label>
		<div class="controls">
			<input class="span4" type="text" name="post_title" placeholder="Title" value="<?php echo $post['post_title']?>" />
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<textarea name="post_text" placeholder="Insert Post Here"><?php echo $post['post_text']?></textarea>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success">Update</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
	</div>
</form>