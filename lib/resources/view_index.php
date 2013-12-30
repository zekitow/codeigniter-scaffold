	<h2><%=@model.capitalize%></h2>
	<table class="table">
		<tr>
			<th>#</th><% @attributes.each { | f | %>
			<th><%= f.name.capitalize %></th><% } %>
			<th colspan="2"></th>
		</tr>
		<?php foreach ($<%=@model.downcase%> as $object) { ?>
		<tr>
			<td><?=$object->id ?></td><% @attributes.each { | f | %>
			<td><?= $object-><%= f.name %> ?></td><% } %>
			<td width="80"><?= anchor('/<%=@model.downcase%>/edit/'.$object->id, 'Edit','class="btn btn-warning"'); ?></td>
			<td width="80"><?= anchor('/<%=@model.downcase%>/destroy/'.$object->id, 'Destroy','class="btn btn-danger"'); ?></td>
		</tr><?php } ?>
	</table>
	
	<?= anchor('/<%=@model.downcase%>/create','Create','class="btn btn-primary"'); ?>
