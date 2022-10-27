create table users(
  id int auto_increment primary key, 
  name varchar(250) not null, 
  email varchar(250) not null, 
  username varchar(250) not null, 
  age int not null, 
  pwd varchar(255) not null, 
  img varchar(255)
);