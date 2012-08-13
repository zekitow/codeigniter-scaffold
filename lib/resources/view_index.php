	<h1><%=@model.capitalize%></h1>
	<table>
		<tr>
			<th>Id</th>
			<% @attributes.each { | f | %>
			<th><%= f.name %></th><% } %>
		</tr>
		<?php	foreach ($<%=@model.downcase%> as $object) { ?>
			<tr>
			<td><?php echo $object->id ?></td>
			<% @attributes.each { | f | %>
			<td><?php echo $object-><%= f.name %> ?></td><% } %>
			<td><?php echo anchor('/<%=@model.downcase%>/edit/'.$object->id, 'Edit'); ?></td>
			<td><?php echo anchor('/<%=@model.downcase%>/destroy/'.$object->id, 'Destroy'); ?></td>
			
			</tr>
		<?php } ?>
	</table>
	
	<?php echo anchor('/<%=@model.downcase%>/create','Create'); ?>
