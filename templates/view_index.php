	<h1>Users</h1>
	<table>
		<tr>
			<th>Id</th>
			<% @fields.each { |f| %>
			<th><%= f %></th><% } %>
		</tr>
		<?php	foreach ($<%=@model.downcase%> as $object) { ?>
			<tr>
			<td><?php echo $object->id ?></td>
			<% @fields.each { |f| %>
			<td><?php echo $object-><%= f %> ?></td><% } %>
			<td><?php echo anchor('/<%=@model.downcase%>/edit/'.$object->id, 'Edit'); ?></td>
			<td><?php echo anchor('/<%=@model.downcase%>/destroy/'.$object->id, 'Destroy'); ?></td>
			
			</tr>
		<?php } ?>
	</table>
	
	<?php echo anchor('/<%=@model.downcase%>/create','Create'); ?>
