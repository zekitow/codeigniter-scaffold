
create table <%=@model.downcase%> (
	id int not null auto_increment, 
	primary key(id),<% @fields.each { |f| %>
	<%= f %> VARCHAR(255), <% } %>
	created_at datetime,
	updated_at datetime
);

