CREATE TABLE `<%=@model.downcase%>` (
  `id` INT NOT NULL AUTO_INCREMENT,<% @attributes.each { |f| %>
  `<%= f.name %>` <%= f.mysql_type %> DEFAULT NULL, <% } %>
  `created_at` DATETIME NOT NULL,
  `updated_at` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
);
