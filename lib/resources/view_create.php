	<h1>Create</h1>
	<?php echo form_open('<%=@model.downcase%>/save'); ?>
		<div class="error"><?php echo validation_errors(); ?></div>
		<input type="hidden" name="id" value="<?php echo isset($<%=@model.downcase%>)?$<%=@model.downcase%>->id:''?>"/>
		<% @attributes.each { |f| %>
		<p>
			<label for="<%= f.name %>"><%= f.name %>:</label><br/><% if f.type == 'string' or f.type == 'integer' %>
			<input type="text" name="<%= f.name %>" value="<?php echo isset($<%=@model.downcase%>)?$<%=@model.downcase%>-><%= f.name %>:''?>"/><% end %>
			<% if f.type == 'text' %>
			<textarea name="<%= f.name %>"><?php echo isset($<%=@model.downcase%>)?$<%=@model.downcase%>-><%= f.name %>:''?></textarea><% end %>

		</p>
		<% } %>
		<input type="submit" value="Create"/>
	</form>

