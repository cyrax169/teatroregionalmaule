CREATE TABLE Trm(
Rut integer not null , 
RazonSocial VARCHAR(60) not null ,
Direccion VARCHAR(60) not null ,
MontoAporte float not null,
AportePatronal VARCHAR(10) not null,
constraint pk_Trm primary key (Rut)
);

create table Cargas(
Rut  integer not null ,
Nombres VARCHAR(60) not null ,
Tipo   VARCHAR (60) not null,
FechaVencimiento date not null,
constraint pk_Cargas primary key (Rut)
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
FechaNacimiento DATE not null,
Direccion VARCHAR(60) not null, 
TipoContrato Integer not null,
Estado Integer not null,
Cargo VARCHAR(60) not null, 
FechaInicioContrato  date not null,
FechaTerminoContrato date not null,
Salario integer not null,
Cargas integer not null,
NombreAfp integer not null,
PorcentajeAfp integer not null,
Acaja integer not null,
Amovilizacion integer not null,
Acolacion integer not null,
Afc varchar(10) not null,
Fonasa integer,
Isapre integer, 
constraint pk_Trabajadores  primary key (Rut),
constraint fk_Trabajadores  foreign key (Cargas)  references Cargas (Rut),
constraint fk_Trabajadores2 foreign key (Fonasa)  references  Fonasa (CodSaludF),
constraint fk_Trabajadores3 foreign key (Isapre)  references Isapre (CodSaludI)
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

CREATE TABLE Permisos(
Rut integer not null,
FechaI date not null,
Fechat date not null,
constraint pk_Permisos primary key (Rut),
constraint fk_PErmisos foreign key (Rut) references Trabajadores (Rut)
);

insert into Usuarios values (0,'TicSoft',16254002,'Admin','e3afed0047b08059d0fada10f400c1e5');

select * from Usuarios;