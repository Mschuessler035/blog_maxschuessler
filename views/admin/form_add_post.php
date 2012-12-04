<?php 
	$post_title='';
	$post_text='';
	extract($_SESSION);
	
	unset($_SESSION['post_title']);
	unset($_SESSION['post_text']);
?>

<h2>New Post</h2>
<form action="actions/add_postinsert_band.php" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="band_name">Post Title</label>
		<div class="controls">
			<input class="span4" type="text" name="post_title" placeholder="Title" value="<?php echo $post_title?>" />
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<textarea name="post_text" placeholder="Insert Post Here" ></textarea>
		</div>
	</div>
</form>