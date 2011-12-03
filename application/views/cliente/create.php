	<h1>Create</h1>
	<?php echo form_open('cliente/save'); ?>
		<input type="hidden" name="id" value="<?php echo isset($id)?$cliente->id:''?>"/>
		
		<p>
			<label for="nome">nome:</label><br/>
			<input type="text" name="nome" value="<?php echo isset($cliente)?$cliente->nome:''?>"/>
		</p>
		
		<p>
			<label for="sobrenome">sobrenome:</label><br/>
			<input type="text" name="sobrenome" value="<?php echo isset($cliente)?$cliente->sobrenome:''?>"/>
		</p>
		
		<p>
			<label for="data_nascimento">data_nascimento:</label><br/>
			<input type="text" name="data_nascimento" value="<?php echo isset($cliente)?$cliente->data_nascimento:''?>"/>
		</p>
		
		<input type="submit" value="Create"/>
	</form>

