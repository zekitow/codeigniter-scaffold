	<h1>Post</h1>
	<table>
		<tr>
			<th>Id</th>
			
			<th>title</th>
			<th>body</th>
		</tr>
		<?php	foreach ($post as $object) { ?>
			<tr>
			<td><?php echo $object->id ?></td>
			
			<td><?php echo $object->title ?></td>
			<td><?php echo $object->body ?></td>
			<td><?php echo anchor('/post/edit/'.$object->id, 'Edit'); ?></td>
			<td><?php echo anchor('/post/destroy/'.$object->id, 'Destroy'); ?></td>
			
			</tr>
		<?php } ?>
	</table>
	
	<?php echo anchor('/post/create','Create'); ?>
