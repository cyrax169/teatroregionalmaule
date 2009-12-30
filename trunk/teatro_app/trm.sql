CREATE TABLE Trm(
Rut integer not null ,
Digito integer not null,
RazonSocial VARCHAR(60) not null ,
Direccion VARCHAR(60) not null ,
CajaCompensacion VARCHAR(30),
MontoAporte float not null,
AportePatronal VARCHAR(10) not null,
constraint pk_Trm primary key (Rut)
);

create table Cargas(
RutTrabajador integer not null,
Rut  integer not null,
Digito integer not null,
Nombres VARCHAR(60) not null ,
Tipo   VARCHAR (60) not null,
FechaVencimiento date not null,
constraint pk_Cargas primary key (Rut,RutTrabajador)
);

CREATE TABLE Liquidacion(
RutTrabajador INTEGER NOT NULL,
Fecha date NOT NULL,
TotalImponible INTEGER NOT NULL,
TotalNoImponible INTEGER NOT NULL,
TotalHaberes INTEGER NOT NULL,
TotalLiquido INTEGER NOT NULL,
TotalDescuentos INTEGER NOT NULL,
constraint pk_liquidacion primary key (RutTrabajador,Fecha)
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

CREATE TABLE Usuarios (
Permiso integer not null,
Nombre VARCHAR(60) not null,
Rut integer not null,
Digito integer,
login varchar(60) not null,
password varchar(60) not null,
constraint pk_Usuarios primary key (Rut)
);

CREATE TABLE Trabajadores(
Rut integer not null ,
Digito integer not null,
Nombre VARCHAR(60) not null ,
Telefono VARCHAR(60) not null,
FechaNacimiento DATE not null,
Direccion VARCHAR(60) not null, 
TipoContrato varchar(15) not null,
Estado Integer not null,
Cargo VARCHAR(60) not null, 
FechaInicioContrato  date not null,
FechaTerminoContrato date not null,
Salario integer not null,
Acaja integer,
Amovilizacion integer,
Acolacion integer,
Afc float not null,
Fonasa float(4),
NombreAfp varchar (30),
NombreIsapre varchar (30),
MontoIsapre float(10),
apvUf float(10),
apvPesos integer,
DiasTrabajados integer,
HorasExtras integer,
Bonos integer,
Cargas integer,
constraint pk_Trabajadores  primary key (Rut)

);
CREATE TABLE Anticipo(
RutTrabajador integer not null,
Monto integer not null,
Fecha date not null,
constraint pk_Anticipo primary key (RutTrabajador,Fecha)
);
CREATE TABLE Vacaciones (
RutTrabajador integer not null,
FechaInicio date not null ,
FechaTermino date not null ,
TotalDias integer not null,
constraint pk_Vacaciones primary key (RutTrabajador,FechaInicio)
);

CREATE TABLE Licencias(
RutTrabajador integer not null,
FechaInicio date not null,
FechaTermino date not null,
TotalDias integer not null, 
constraint pk_Licencias primary key (RutTrabajador,FechaInicio)
);

CREATE TABLE Permisos(
RutTrabajador integer not null,
FechaInicio date not null,
FechaTermino date not null,
TotalDias integer not null,
GoceSueldo varchar(2),
constraint pk_Licencias primary key (RutTrabajador,FechaInicio)
);

CREATE TABLE Tramos(
Id integer not null,
Inicio varchar(10) not null,
Termino varchar(10) not null,
Monto varchar(10) not null
);

CREATE TABLE Prestaciones(
RutTrabajador integer not null,
Id integer not null  auto_increment,
Institucion varchar(60),
TipoPrestacion varchar(60),
Monto integer not null,
Cuotas integer not null,
constraint pk_Licencias primary key (RutTrabajador,Id)
);

create table IUT(
Id integer not null,
Desde decimal not null,
Hasta decimal not null,
cantidad decimal not null,
constraint pk_IUT primary key (Id)
);

CREATE TABLE UF(
Fecha date not null,
Monto float(10)not null,
constraint pk_UF primary key (Fecha)
);
CREATE TABLE UTM(
Fecha date not null,
MontoUTM float(10) not null,
constraint pk_UTM primary key (Fecha)
);

CREATE TABLE Afp(
NombreAfp varchar(30) not null,
PorcentajeAfp float(10)not null,
constraint pk_Afp primary key (NombreAfp)
);

insert into Afp values ('Capital',13.31);
insert into Afp values ('Cuprum',13.35);
insert into Afp values ('Habitat',13.23);
insert into Afp values ('Plan Vital',14.23);
insert into Afp values ('Provida',13.41);


insert into Usuarios values (0,'TicSoft',16254002,1,'admin','21232f297a57a5a743894a0e4a801fc3');
insert into Usuarios values (1,'TicSoft',16254001,1,'super','1b3231655cebb7a1f783eddf27d254ca');
insert into USuarios values (1,'Rodrigo',16071696,1,'Rodrigo','c920838d7afb191381bdb1eb7572c30b');

insert into Tramos values ('1', '0', '170000', '6500');
insert into Tramos values ('2', '170001', '293624', '4830');
insert into Tramos values ('3', '293625', '457954', '1526');
insert into Tramos values ('4', '457955', '-', '0');
insert into IUT values (1,0,0,0);
insert into IUT values (2,0,0,0);
insert into IUT values (3,0,0,0);
insert into IUT values (4,0,0,0);
insert into IUT values (5,0,0,0);
insert into IUT values (6,0,0,0);
insert into IUT values (7,0,0,0);
insert into IUT values (8,0,0,0);

insert into UF values ('2009-12-29',0);
insert into UTM values('2009-12-29',0);