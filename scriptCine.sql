create database cine;

use cine;

create table usuarios(
	id int primary key not null auto_increment,
	usuario varchar(150),
	email varchar(150),
	pwd varchar(250)
);

create table funciones(
	id_pelicula int primary key not null auto_increment,
	titulo varchar(150),
	year varchar(150),
	resumen varchar(150),
	imagen varchar(150)
);
drop table funciones;
create table funciones_usuario(
	id_usuario int,
	id_pelicula int,
	horario varchar(150),
	asientos varchar(10),
	foreign key (id_usuario) references usuarios(id) on delete cascade,
	foreign key (id_pelicula) references funciones(id_pelicula) on delete cascade
);

insert into funciones 
( titulo, year, resumen, imagen ) 
values 
('','','',''),
('','','',''),
('','','',''),
('','','',''),
('','','',''),
('','','',''),
('','','',''),
('','','',''),
('','','','');
('Spiderman','2002','Peter Parker enfrenta a Dr. Octopus mientras equilibra su vida personal y como héroe.','spiderman.jpg');
