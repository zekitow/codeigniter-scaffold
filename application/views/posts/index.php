	<h1>Users</h1>
	<table>
		<tr>
			<th>Id</th>
			
			<th>title</th>
			<th>body</th>
		</tr>
		<?php	foreach ($posts as $object) { ?>
			<tr>
			<td><?php echo $object->id ?></td>
			
			<td><?php echo $object->title ?></td>
			<td><?php echo $object->body ?></td>
			<td><?php echo anchor('/posts/edit/'.$object->id, 'Edit'); ?></td>
			<td><?php echo anchor('/posts/destroy/'.$object->id, 'Destroy'); ?></td>
			
			</tr>
		<?php } ?>
	</table>
	
	<?php echo anchor('/posts/create','Create'); ?>
