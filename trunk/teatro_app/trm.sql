/*drop table Licencias;
drop table Vacaciones;
drop table Trabajadores;
drop table Isapre;
drop table Fonasa;
drop table PlanillaRemuneracion;
drop table CajaCompensacion;
drop table Afp;
drop table Cargas;
drop table Trm;
drop table Usuarios;*/

CREATE TABLE Trm(
Rut integer not null , 
Nombre VARCHAR(60) not null ,
RazonSocial VARCHAR(60) not null ,
Direccion VARCHAR(60) not null , 
Telefono VARCHAR(60) not null, 
Mail VARCHAR(60) not null ,
RepresentacionLegal VARCHAR(60) not null ,
AportePatronal float not null,
constraint pk_Trm primary key (Rut)
);

create table Cargas(
Rut  integer not null ,
Nombres VARCHAR(60) not null ,
Tipo   VARCHAR (60) not null,
FechaVencimiento date not null,
constraint pk_Cargas primary key (Rut)
);

CREATE TABLE Afp(
CodAfp integer not null ,
Nombre VARCHAR(60) not null ,
PorcentajeConvenio integer not null ,
constraint pk_Afp primary key (CodAfp)
);

CREATE TABLE CajaCompensacion(
CodCaja integer not null ,
Nombre VARCHAR(60) not null ,
PorcentajeConvenio integer not null ,
constraint pk_CajaCompensacion primary key (CodCaja)
);

CREATE TABLE PlanillaRemuneracion(
NroPlanilla integer not null ,
RutTrabajador integer not null ,
AsignacionFamiliar VARCHAR(60) not null ,
DescuentosLegales integer not null ,
DescuentosAdicionales integer not null ,
constraint pk_PlanillaRemuneracion primary key (NroPlanilla, RutTrabajador)
);

CREATE TABLE Fonasa(
CodSaludF integer,
Tramo VARCHAR(60),
PorcentajePago integer,
constraint pk_Fonasa primary key (CodSaludF)
);

CREATE TABLE Isapre(
CodSaludI integer,
NombreIsapre VARCHAR (60),
PorcentajePago integer,
constraint pk_Isapre primary key (CodSaludI)
);

CREATE TABLE Usuarios (
Permiso integer not null,
Nombre VARCHAR(60) not null,
Rut integer not null,
login varchar(60) not null,
password varchar(60) not null,
constraint pk_Usuarios primary key (Rut)
);


CREATE TABLE Trabajadores(
Rut integer not null , 
Nombre VARCHAR(60) not null ,
Telefono VARCHAR(60) not null,
Direccion VARCHAR(60) not null, 
Estado Integer not null,
Cargo VARCHAR(60) not null, 
FechaInicioContrato  date not null,
FechaTerminoContrato date not null,
Salario integer not null,
Cargas integer not null ,
CodAfp integer not null ,
CodCaja integer not null ,
Fonasa integer,
Isapre integer, 
constraint pk_Trabajadores  primary key (Rut),
constraint fk_Trabajadores  foreign key (Cargas)  references Cargas (Rut),
constraint fk_Trabajadores2 foreign key (CodAfp)  references Afp (CodAfp),
constraint fk_Trabajadores3 foreign key (CodCaja) references CajaCompensacion (CodCaja),
constraint fk_Trabajadores4 foreign key (Fonasa)  references  Fonasa (CodSaludF),
constraint fk_Trabajadores5 foreign key (Isapre)  references Isapre (CodSaludI) 
);

CREATE TABLE Vacaciones (
Rut integer not null,
CodVacaciones integer not null,
FechaInicio date not null ,
FechaTermino date not null ,
TotalDias integer not null,
constraint pk_Vacaciones primary key (CodVacaciones),
constraint fk_Vacaciones foreign key (Rut) references Trabajadores (Rut) 
);

CREATE TABLE Licencias(
Rut integer not null, 
CodLicencia integer not null,
FechaInicio date not null,
FechaTermino date not null,
TotalDias integer not null, 
constraint pk_Licencias primary key (CodLicencia),
constraint fk_Licencias foreign key (Rut) references Trabajadores (Rut)
);

insert into Usuarios values (0,'TicSoft',16254002,'Admin','Admin');
insert into Usuarios values (1,'TicSoft',16537232,'Super','Super');

select * from Usuarios;