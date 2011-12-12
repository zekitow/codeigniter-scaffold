	<h1>Post</h1>
	<table>
		<tr>
			<th>Id</th>
			
			<th>nome</th>
			<th>sobrenome</th>
		</tr>
		<?php	foreach ($post as $object) { ?>
			<tr>
			<td><?php echo $object->id ?></td>
			
			<td><?php echo $object->nome ?></td>
			<td><?php echo $object->sobrenome ?></td>
			<td><?php echo anchor('/post/edit/'.$object->id, 'Edit'); ?></td>
			<td><?php echo anchor('/post/destroy/'.$object->id, 'Destroy'); ?></td>
			
			</tr>
		<?php } ?>
	</table>
	
	<?php echo anchor('/post/create','Create'); ?>
