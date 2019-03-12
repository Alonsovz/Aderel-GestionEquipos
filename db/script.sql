drop database if exists ADEREL;
create database ADEREL;
use ADEREL;

-- ===========================================================================
-- TABLAS
-- ===========================================================================

create table rol(
codigoRol int primary key unique auto_increment,
descRol varchar(50)
);
create table usuario (
    codigoUsuario int primary key unique auto_increment,
    nombre varchar(50),
    apellido varchar(50),
    nomUsuario varchar(75),
    email varchar(100),
    pass varchar(75),
    codigoRol int,
    idEliminado int
);

create table ingresos(
id int primary key unique auto_increment,
title varchar(50),
start date,
cantidad double,
color varchar(50),
textColor varchar(50),
mes varchar(10),
anio varchar(10),
idEliminado int
);

create table egresos(
idEgreso int primary key unique auto_increment,
chNo int,
conceptoEgreso varchar(500),
cantidad double,
retencion double,
pagado double,
fechaEgreso date,
mes varchar(10),
anio varchar(10),
idEliminado int
);

create table remanentes(
idRemanente int primary key unique auto_increment,
saldoAnterior double,
totalSaldoIngresos double,
cuentaCorriente double,
efectivo double,
cajaChica double,
nuevoSaldo double,
mes varchar(10),
anio varchar(10)
);

create table categorias(
idCategoria int primary key auto_increment,
nombreCategoria varchar(100),
edadMinima int,
edadMaxima int,
idEliminado int
);

create table equipos(
idEquipo int primary key auto_increment,
nombre varchar(200),
encargado varchar(200),
idCategoria int,
idEliminado int
);




create table jugadores(
idJugador int primary key auto_increment,
nombre varchar(50),
apellido varchar(50),
dui varchar(15),
foto longtext,
fechaNacimiento date,
edad int,
idEquipo int,
idEliminado int
);



alter table usuario add constraint fk_usuario_rol foreign key (codigoRol) references rol(codigoRol);

alter table jugadores add constraint fk_jugadores_equipo foreign key (idEquipo) references equipos(idEquipo);
alter table equipos add constraint fk_equipos_categorias foreign key (idCategoria) references categorias(idCategoria);

insert into rol values(1,'Administrador');
insert into usuario values(null,'Fabio Alonso','Mejia Velasquez','mejia','fabiomejiash@gmail.com',sha1('123'),1,1);
insert into usuario values(null,'Alonso','Mejia','alonso','mejiafabio383@gmail.com',sha1('123'),1,1);

insert into ingresos values (null,'Escuela','2019-03-02',2000,'#140E93','#E6C404','03','2019',1);

insert into egresos values(null,4089,'Pago de impuestos de la renta',1000,160,840,'2019-03-05','03','2019',1);

insert into remanentes values(null,5000,10000,4000,500,300,7000,'03','2019');

insert into equipos values (null, 'Aderel F.C','Elvis Ramirez',1,1);
insert into categorias values (null, 'Liga menor',12,18,1);
insert into jugadores values(null,'Fabio','Mejia','01234356-1','yo.jpg','2019-03-28',1,1);


-- ===========================================================================
-- Procedimientos Usuarios
-- ===========================================================================

delimiter $$
create procedure login(
	in user varchar(50),
    in contra varchar(75)
)
begin
	select u.*, r.descRol
	from usuario u
	inner join rol r on r.codigoRol = u.codigoRol
    where u.nomUsuario = user and u.pass = contra and u.idEliminado=1;
end	
$$

delimiter $$
create procedure registrarUsuario(
	in nom varchar(50),
    in ape varchar(50),
    in us varchar(50),
    in correo varchar(75),
    in contra varchar(75),
    in rol int,
    in idEli int
)
begin
	insert into usuario values (null, nom, ape, us, correo, contra, 2, rol,idEli);
end
$$

delimiter $$
create procedure editarUsuario(
	in nom varchar(50),
    in ape varchar(50),
    in us varchar(50),
    in correo varchar(75),
    in rol int,
    in idUser int
)
begin
	update usuario
    set nombre = nom, apellido = ape, nomUsuario = us, email = correo, codigoRol = rol
    where codigoUsuario = idUser;
end
$$

delimiter $$
create procedure mostrarUsuarios()
begin
	select u.*, r.descRol
	from usuario u
	inner join rol r on r.codigoRol = u.codigoRol
    where u.idEliminado=1;
end
$$
-- ===========================================================================
-- Procedimientos Ingresos
-- ===========================================================================

delimiter $$
create procedure mostrarIngresos()
begin
	select id,title,start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
    where  idEliminado=1;
end	
$$


delimiter $$
create procedure mostrarIngresosTabla()
begin
	select id,title,format(SUM(Cantidad),2) as cantidad,DATE_FORMAT(start, '%d/%m/%Y') as start from Ingresos where idEliminado=1 
	group by start,title order by start desc ;
end	
$$

delimiter $$
create procedure reporteIngresosPorFechas(
	in fecha date,
    in fecha2 date
)
begin
select id,title,DATE_FORMAT(start, '%d/%m/%Y') as start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
where start between fecha and fecha2 and idEliminado = 1 order by id DESC ;
end $$

delimiter $$
create procedure reporteIngresosPorMes(
	in mess varchar(10),
    in anios varchar(10)
)
begin
select id,title,DATE_FORMAT(start, '%d/%m/%Y') as start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
where mes= mess and anio= anios and idEliminado = 1 order by id DESC ;
end $$

delimiter $$
create procedure reporteDiarioIngresos()
begin
select id,title,DATE_FORMAT(start, '%d/%m/%Y') as start,format(cantidad,2) as cantidad,color,textColor,mes,anio,idEliminado from ingresos
where start=curdate() and idEliminado =1 ;
end $$

-- ===========================================================================
-- Procedimientos Egresos
-- ===========================================================================


delimiter $$
create procedure mostrarEgresos()
begin
	select idEgreso, chNo, conceptoEgreso, format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
    DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
    where  idEliminado=1;
end	
$$



delimiter $$
create procedure registrarEgreso(
	in chNo varchar(50),
    in conceptoEgreso varchar(500),
    in cantidad double,
    in retencion double,
    in pagado double,
    in mes varchar(10),
    in anio varchar(10),
    in idEli int
)
begin
	insert into egresos values (null, chNo, conceptoEgreso, cantidad, retencion, pagado,curdate(),mes,anio,idEli);
end
$$

delimiter $$
create procedure editarEgreso(
	in chNo varchar(50),
    in conceptoEgreso varchar(500),
    in cantidad double,
    in retencion double,
    in pagado double,
    in id int
)
begin
	update egresos
    set chNo = chNo, conceptoEgreso = conceptoEgreso, cantidad = cantidad, retencion = retencion, pagado = pagado
    where idEgreso = id;
end
$$



delimiter $$
create procedure reporteEgresosPorFechas(
	in fecha date,
    in fecha2 date
)
begin
select idEgreso,chNo,conceptoEgreso,format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
where fechaEgreso between fecha and fecha2 and idEliminado=1 order by idEgreso DESC;
end $$

delimiter $$
create procedure reporteEgresosPorMes(
	in mess varchar(10),
    in anios varchar(10)
)
begin
select idEgreso,chNo,conceptoEgreso,format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
where mes= 03 and anio= 2019 and idEliminado = 1 order by idEgreso DESC ;
end $$



delimiter $$
create procedure reporteDiarioEgresos()
begin
select idEgreso,chNo,conceptoEgreso,format(cantidad,2) as cantidad, format(retencion,2) as retencion, format(pagado,2) as pagado,
DATE_FORMAT(fechaEgreso, '%d/%m/%Y') as fechaEgreso,mes,anio,idEliminado from egresos
where fechaEgreso=curdate() and idEliminado=1 order by chNo desc;
end $$


-- ===========================================================================
-- Remanentes
-- ===========================================================================

delimiter $$
create procedure registrarRemanente(
	in total double,
    in saldo double,
    in cuenta double,
    in efectivo double,
    in caja double,
    in nuevo double,
    in mes varchar(10),
    in anio varchar(10)
)
begin
	insert into remanentes values (null, saldo,total, cuenta, efectivo, caja, nuevo, mes, anio);
end
$$

-- ===========================================================================
-- Procedimientos Egresos
-- ===========================================================================


delimiter $$
create procedure mostrarEquipos()
begin
	select e.*, c.nombreCategoria as Categoria from equipos e
    inner join categorias c on c.idCategoria = e.idCategoria
    where  e.idEliminado=1;
end	
$$



delimiter $$
create procedure mostrarCategorias()
begin
	select * from categorias
    where  idEliminado=1;
end	
$$

