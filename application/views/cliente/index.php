	<h1>Users</h1>
	<table>
		<tr>
			<th>Id</th>
			
			<th>nome</th>
			<th>sobrenome</th>
			<th>data_nascimento</th>
		</tr>
		<?php	foreach ($cliente as $object) { ?>
			<tr>
			<td><?php echo $object->id ?></td>
			
			<td><?php echo $object->nome ?></td>
			<td><?php echo $object->sobrenome ?></td>
			<td><?php echo $object->data_nascimento ?></td>
			<td><?php echo anchor('/cliente/edit/'.$object->id, 'Edit'); ?></td>
			<td><?php echo anchor('/cliente/destroy/'.$object->id, 'Destroy'); ?></td>
			
			</tr>
		<?php } ?>
	</table>
	
	<?php echo anchor('/cliente/create','Create'); ?>
