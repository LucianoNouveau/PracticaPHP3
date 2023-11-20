create schema tienda;
use tienda;

select * from usuarios;
select * from productos;


drop table usuarios;
drop table productos;


create table productos(
idProducto int auto_increment primary key,
nombreProducto varchar(40) not null,
precio numeric(8,2) not null,/*numero de 8 digitos y 2 decimales*/
descripcion varchar(255) not null,
cantidad int not null,
imagen LONGBLOB,
categoria varchar(15)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    nombre VARCHAR(50) not null,
    apellidos varchar(50) not null,
    email VARCHAR(100) UNIQUE not null,
    contraseña VARCHAR(255) not null,
    fecha_nac DATE not null,
    rol varchar(10) default 'cliente'
);

create table carrito(
	idProducto int,
    cantidad int,
    precio numeric(8,2)
);

