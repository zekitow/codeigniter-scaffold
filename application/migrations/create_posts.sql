
create table posts (
	id int not null auto_increment, 
	primary key(id),
	title VARCHAR(255), 
	body VARCHAR(255), 
	created_at datetime,
	updated_at datetime
);

