CREATE TABLE Trm(
Rut integer not null , 
RazonSocial VARCHAR(60) not null ,
Direccion VARCHAR(60) not null ,
CajaCompensacion VARCHAR(30) not null,
MontoAporte float not null,
AportePatronal VARCHAR(10) not null,
constraint pk_Trm primary key (Rut)
);

create table Cargas(
RutTrabajador integer not null,
Rut  integer not null ,
Nombres VARCHAR(60) not null ,
Tipo   VARCHAR (60) not null,
FechaVencimiento date not null,
constraint pk_Cargas primary key (Rut,RutTrabajador)
);

CREATE TABLE liquidacion(
RutTrabajador INTEGER NOT NULL,
Fecha date NOT NULL,
FechaPago DATE NOT NULL,
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
login varchar(60) not null,
password varchar(60) not null,
constraint pk_Usuarios primary key (Rut)
);


CREATE TABLE Trabajadores(
Rut integer not null , 
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
NombreAfp varchar(20) not null,
PorcentajeAfp integer not null,
Acaja integer not null,
Amovilizacion integer not null,
Acolacion integer not null,
Afc varchar(10) not null,
Fonasa integer,
NombreIsapre varchar (60),
MontoIsapre integer,
apvUf integer,
apvPesos integer,
DiasTrabajados integer,
HorasExtras integer,
Bonos integer,
Cargas varchar (2) not null,

constraint pk_Trabajadores  primary key (Rut),
constraint fk_Trabajadores2 foreign key (Fonasa)  references  Fonasa (CodSaludF)
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
constraint pk_Licencias primary key (RutTrabajador,FechaInicio)
);

CREATE TABLE Prestaciones(
RutTrabajador integer not null,
CodPrestacion integer not null,
Institucion varchar(60),
TipoPrestamo varchar(60),
Monto integer not null,
constraint pk_Licencias primary key (RutTrabajador,CodPrestacion)
);

insert into Usuarios values (0,'TicSoft',16254002,'admin','21232f297a57a5a743894a0e4a801fc3');
insert into Usuarios values (1,'TicSoft',16254001,'super','1b3231655cebb7a1f783eddf27d254ca');