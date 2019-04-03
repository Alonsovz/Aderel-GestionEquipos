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

create table tipoCaja(
idTipo int primary key unique auto_increment,
nombre varchar(40),
monto double
);

create table cajaChica(
id int primary key unique auto_increment,
fecha date,
cantidad double,
recibo varchar(500),
concepto varchar(500),
recibido varchar(40),
idTipo int,
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

create table genero(
idGenero int primary key auto_increment,
genero varchar(15)
);

create table categorias(
idCategoria int primary key auto_increment,
nombreCategoria varchar(100),
edadMinima int,
edadMaxima int,
carnetGratis int,
idGenero int,
idEliminado int
);




create table torneos(
idTorneo int primary key auto_increment,
nombreTorneo varchar(100),
numeroEquipos int,
disponibles int,
inscritos int,
idCategoria int,
idGenero int,
sorteo int,
idEliminado int
);




-- -----------------------------------------------------
-- Table `aderel`.`partidos`
-- -----------------------------------------------------
CREATE TABLE partidos (
  id int primary key auto_increment,
  partido_N INT NULL,
  cancha INT NULL,
  equipo1_id varchar(100),
  equipo2_id varchar(100),
  fecha VARCHAR(45) NULL,
  hora VARCHAR(45) NULL,
  jornadas_id INT NOT NULL
  );
  
CREATE TABLE jornadas (
  id int primary key auto_increment,
  vuelta_N INT NULL,
  orden INT NULL,
  descansa_id_Equipo varchar(100),
  idTorneo INT(11) NOT NULL
);




create table inscripcion(
idInscripcion int primary key auto_increment,
estado varchar(20)
);

create table equipos(
idEquipo int primary key auto_increment,
nombre varchar(200),
encargado varchar(200),
telefonoE varchar(20),
encargadoAux varchar(200),
telefonoAux varchar(20),
idCategoria int,
idInscripcion int,
idTorneo int,
idGenero int,
idFondo int,
idEliminado int
);


create table jugadores(
idJugador int primary key auto_increment,
correlativo varchar(10),
nombre varchar(50),
apellido varchar(50),
dui varchar(25),
foto longtext,
fechaNacimiento date,
telefono varchar(20),
idGenero int,
idFondo int,
idEliminado int
);



create table inscriJugador(
idEquipo int,
idJugador int,
idTorneo int,
estado int,
pago int,
fechaInscripcion date
);



create table gimnasio(
idUsuario int primary key auto_increment,
correlativo varchar(10),
foto longtext,
nombre varchar(50),
apellido varchar(50),
fechaNacimiento date,
ddi varchar(50),
fechaInscripcion date,
fechaFinal date,
estado int,
idEliminado int
);

create table pagoGimnasio(
id int primary key auto_increment,
idUsuario int,
fechasPago date,
estado int
);

 
create table natacion(
idUsuario int primary key auto_increment,
correlativo varchar(10),
foto longtext,
nombre varchar(50),
apellido varchar(50),
fechaNacimiento date,
ddi varchar(50),
encargado varchar(100),
dui varchar(100),
telefono varchar(20),
fechaInscripcion date,
fechaFinal date,
estado int,
idEliminado int
);


create table pagoNatacion(
id int primary key auto_increment,
idUsuario int,
fechasPago date,
estado int
);


create table nivelEscuela(
idEscuela int primary key auto_increment,
nivel varchar(20),
profesor varchar(50),
dias varchar(30),
hora varchar(30),
edadInicial int,
edadFinal int,
cancha int
);

create table escuelaFut(
idUsuario int primary key auto_increment,
correlativo varchar(10),
foto longtext,
nombre varchar(50),
apellido varchar(50),
fechaNacimiento date,
carnet varchar(25),
encargado varchar(50),
dui varchar(15),
telefono varchar(20),
fechaInscripcion date,
fechaFinal date,
idEscuela int,
estado int,
idEliminado int
);

create table pagoEscuelaFut(
id int primary key auto_increment,
idUsuario int,
fechasPago date,
estado int
);



alter table partidos add constraint fk_partidos_jornadas foreign key (jornadas_id) references jornadas(id);



alter table jornadas add constraint fk_jornadas_torneos foreign key (idTorneo) references torneos(idTorneo);

alter table cajaChica add constraint fk_cajaChica_tipoCaja foreign key (idTipo) references tipoCaja(idTipo);


alter table pagoGimnasio add constraint fk_pagoGimnasio_gimnasio foreign key (idUsuario) references gimnasio(idUsuario);

alter table pagoEscuelaFut add constraint fk_pagoEscuelaFut_escuelaFut foreign key (idUsuario) references escuelaFut(idUsuario);

alter table pagoNatacion add constraint fk_pagoNatacion_natacion foreign key (idUsuario) references natacion(idUsuario);



alter table inscriJugador add constraint fk_inscriJugador_equipos foreign key (idEquipo) references equipos(idEquipo);
alter table inscriJugador add constraint fk_inscriJugador_jugadores foreign key (idJugador) references jugadores(idJugador);
alter table inscriJugador add constraint fk_inscriJugador_torneos foreign key (idTorneo) references torneos(idTorneo);

alter table escuelaFut add constraint fk_escuelaFut_nivelEscuela foreign key (idEscuela) references nivelEscuela(idEscuela);

alter table usuario add constraint fk_usuario_rol foreign key (codigoRol) references rol(codigoRol);

alter table equipos add constraint fk_equipos_categorias foreign key (idCategoria) references categorias(idCategoria);
alter table equipos add constraint fk_equipos_torneos foreign key (idTorneo) references torneos(idTorneo);
alter table equipos add constraint fk_equipos_inscripcion foreign key (idInscripcion) references inscripcion(idInscripcion);
alter table torneos add constraint fk_torneos_categorias foreign key (idCategoria) references categorias(idCategoria);

alter table jugadores add constraint fk_jugadores_genero foreign key (idGenero) references genero(idGenero);
alter table torneos add constraint fk_torneos_genero foreign key (idGenero) references genero(idGenero);
alter table categorias add constraint fk_categorias_genero foreign key (idGenero) references genero(idGenero);
alter table equipos add constraint fk_equipos_genero foreign key (idGenero) references genero(idGenero);

insert into rol values(1,'Administrador');
insert into usuario values(null,'Fabio Alonso','Mejia Velasquez','mejia','fabiomejiash@gmail.com',sha1('123'),1,1);
insert into usuario values(null,'Alonso','Mejia','alonso','mejiafabio383@gmail.com',sha1('123'),1,1);

insert into ingresos values (null,'Escuela','2019-03-18',2000,'#140E93','#E6C404','03','2019',1);
insert into ingresos values (null,'Fondo Comun','2019-03-19',2000,'#140E93','#E6C404','03','2019',1);

insert into egresos values(null,4089,'Pago de impuestos de la renta',1000,160,840,'2019-03-11','03','2019',1);
insert into egresos values(null,4090,'Pago de recibos',1000,160,840,'2019-03-12','03','2019',1);

insert into remanentes values(null,5000,10000,4000,500,300,7000,'03','2019');


insert into genero values(null,'Femenino');
insert into genero values(null,'Masculino');

insert into categorias values (null, 'Sin Categoria',0,1,1,1,1);
insert into categorias values (null, 'Sin Categoria',0,2,1,2,1);


insert into inscripcion values(null,'Aun no inscrito');
insert into inscripcion values(null,'Esperando Cobro');
insert into inscripcion values(null,'Inscrito');

insert into torneos values(null,'No se ha inscrito en torneo',0,0,0,1,1,1,1);
insert into torneos values(null,'No se ha inscrito en torneo',0,0,0,1,2,1,1);

insert into jugadores values(null,'FF000001','nada','nada','nada','nada','1999-02-12','',1,1,1);

insert into equipos values (null, 'Sin Equipo','No definido','No definido','','',1,1,1,1,1,1);
insert into equipos values (null, 'Sin Equipo','No definido','No definido','','',1,1,2,2,1,1);

insert into gimnasio values(null,'GY000002','','','','2019-02-02','1','2019-02-01','2019-03-01',1,1);



insert into natacion values(null,'EN000001','','','','2019-02-02','1','NA','NA','NA','2019-02-01','2019-03-01',1,1);

insert into nivelEscuela values(null,'1er nivel','Walter Hernandez','Lunes y Miercoles','5:00 pm a 6:00 pm',6,7,1);
insert into nivelEscuela values(null,'2do nivel','Enrique Pacheco','Lunes y Miercoles','5:00 pm a 6:00 pm',8,9,2);
insert into nivelEscuela values(null,'3er nivel','Jose Miguel Sanchez','Lunes y Miercoles','6:00 pm a 7:00 pm',10,11,2);
insert into nivelEscuela values(null,'4to nivel','Carmelo de Jesus Serpas','Lunes y Miercoles','6:00 pm a 7:00 pm',12,13,1);
insert into nivelEscuela values(null,'5to nivel','Ramiro Villalta','Martes y Jueves','5:00 pm a 6:00 pm',14,15,2);
insert into nivelEscuela values(null,'6to nivel','Jorge Cardoza','Martes y Jueves','5:00 pm a 6:00 pm',16,17,1);

insert into escuelaFut values(null,'','','','','1999-02-01','','','','',curdate(),curdate(),1,1,1);

insert into tipoCaja values(null,'Caja General',200);
insert into tipoCaja values(null,'Caja Aderel',200);

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
	select e.*, c.nombreCategoria as Categoria, i.estado as estado, t.nombreTorneo as torneo from equipos e
    inner join categorias c on c.idCategoria = e.idCategoria
    inner join inscripcion i on i.idInscripcion = e.idInscripcion
    inner join torneos t on t.idTorneo = e.idTorneo
    where  e.idEliminado=1 and e.idEquipo>1;
end	
$$


drop table jornadas
delimiter $$
create procedure mostrarCategorias()
begin
	select * from categorias
    where  idEliminado=1 and idCategoria>1;
end	
$$



select * from torneos

       
       