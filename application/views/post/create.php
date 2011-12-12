	<h1>Create</h1>
	<?php echo form_open('post/save'); ?>
		<input type="hidden" name="id" value="<?php echo isset($post)?$post->id:''?>"/>
		
		<p>
			<label for="title">title:</label><br/>
			<input type="text" name="title" value="<?php echo isset($post)?$post->title:''?>"/>
		</p>
		
		<p>
			<label for="body">body:</label><br/>
			<input type="text" name="body" value="<?php echo isset($post)?$post->body:''?>"/>
		</p>
		
		<input type="submit" value="Create"/>
	</form>

