	<h1>Create</h1>
	<?php echo form_open('post/save'); ?>
		<input type="hidden" name="id" value="<?php echo isset($post)?$post->id:''?>"/>
		
		<p>
			<label for="nome">nome:</label><br/>
			<input type="text" name="nome" value="<?php echo isset($post)?$post->nome:''?>"/>
		</p>
		
		<p>
			<label for="sobrenome">sobrenome:</label><br/>
			<input type="text" name="sobrenome" value="<?php echo isset($post)?$post->sobrenome:''?>"/>
		</p>
		
		<input type="submit" value="Create"/>
	</form>

