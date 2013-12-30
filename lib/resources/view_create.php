	<h1>Create</h1>
	<?= form_open('<%=@model.downcase%>/save','role="form"'); ?><?php if(validation_errors() != NULL && validation_errors() != '') { ?>
		<div class="alert alert-danger"><?= validation_errors(); ?></div><?php } ?>
		<input type="hidden" name="id" value="<?= isset($<%=@model.downcase%>)?$<%=@model.downcase%>->id:''?>"/>
		<% @attributes.each { |f| %>
		<div class="form-group">
			<label for="<%= f.name %>"><%= f.name.capitalize %>:</label><br/><% if f.type == 'string' or f.type == 'integer' %>
			<input type="text" class="form-control" name="<%= f.name %>" placeholder="Enter <%= f.name.capitalize %>" value="<?= isset($<%=@model.downcase%>)?$<%=@model.downcase%>-><%= f.name %>:''?>"/><% end %>
			<% if f.type == 'text' %>
			<textarea name="<%= f.name %>"  class="form-control"><?= isset($<%=@model.downcase%>)?$<%=@model.downcase%>-><%= f.name %>:''?></textarea><% end %>
		</div><% } %>
		<input type="submit" value="Save" class="btn btn-primary"/>
		<?= anchor('<%=@model.downcase%>/index','Back','class="btn btn-link"'); ?>
	</form>

