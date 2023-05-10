Create database if not exists Bankstar ;
use Bankstar;
create table if not exists Usuario(
Id_Usuario int not null primary key AUTO_INCREMENT,
nombre varchar(50),
apellido varchar(50),
CURP varchar (18),
corre varchar(50),
contrasena varchar(20),
fecha_nacimiento date,
domicilio varchar(120),
telefono varchar (10));

create table if not exists Cuenta(
id_cuenta int not null primary key auto_Increment,
numero_tarjeta varchar(18),
tipo_tarjeta enum('credito','debito'),
fecha_vencimiento date,
cv varchar(3),
nip varchar(4));

INSERT INTO Usuario values(default,'Luis Eduardo','Murillo Ojeda','MUOL010520HBSRJSA4','lmurillo_20@alu.uabcs.mx',
'platano','2001-12-30','esteban vaca','6121727367');
insert into Cuenta values(default,'123456789456123569','debito','2024-06-24','123','5689');
select * from Cuenta;
select * from Usuario;