
create table <%=@model.downcase%> (
	id int not null auto_increment, 
	primary key(id),<% @fields.each { |f| %>
	<%= f %> VARCHAR(255), <% } %>
);

