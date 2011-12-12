	<h1>Create</h1>
	<?php echo form_open('<%=@model.downcase%>/save'); ?>
		<input type="hidden" name="id" value="<?php echo isset($<%=@model.downcase%>)?$<%=@model.downcase%>->id:''?>"/>
		<% @attributes.each { |f| %>
		<p>
			<label for="<%= f.name %>"><%= f.name %>:</label><br/>
			<input type="text" name="<%= f.name %>" value="<?php echo isset($<%=@model.downcase%>)?$<%=@model.downcase%>-><%= f.name %>:''?>"/>
		</p>
		<% } %>
		<input type="submit" value="Create"/>
	</form>

