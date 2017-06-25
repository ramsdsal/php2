/*Criar a Base de dados*/
CREATE DATABASE hvmp_rdelgado;
USE hvmp_rdelgado;

/*Criar as tabelas*/

CREATE TABLE groups
(
group_id		INT(11)				NOT NULL AUTO_INCREMENT,
group_name		VARCHAR(100)		NOT NULL,
group_father_id INT(10)				NOT NULL,
PRIMARY KEY(group_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE items
(
item_id			INT(11)				NOT NULL AUTO_INCREMENT,
item_name		VARCHAR(100)		NOT NULL,
item_father_id 	INT(10)				NOT NULL,
PRIMARY KEY(item_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

