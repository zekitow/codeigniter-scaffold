	<h1>Create</h1>
	<?php echo form_open('<%=@model.downcase%>/save'); ?>
		<input type="hidden" name="id" value="<?php echo isset($id)?$<%=@model.downcase%>->id:''?>"/>
		<% @fields.each { |f| %>
		<p>
			<label for="<%= f %>"><%= f %>:</label><br/>
			<input type="text" name="<%= f %>" value="<?php echo isset($<%=@model.downcase%>)?$<%=@model.downcase%>-><%= f %>:''?>"/>
		</p>
		<% } %>
		<input type="submit" value="Create"/>
	</form>

