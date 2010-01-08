CREATE TABLE Trm(
Rut integer not null ,
Digito varchar(2) not null,
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
Digito varchar(2) not null,
Nombres VARCHAR(60) not null ,
Tipo   VARCHAR (60) not null,
FechaVencimiento date not null,
constraint pk_Cargas primary key (Rut)
);

CREATE TABLE Liquidacion(
RutTrabajador INTEGER NOT NULL,
Digito varchar(2) not null,
Mes integer NOT NULL,
Anio integer not null,
Nombre varchar(100),
CantDias integer,
DiasTrabajados integer,
CantHoras integer,
HorasExtras integer,
Bono float,
AMovilizacion float,
Acolacion float,
Acaja float,
TipoContrato varchar(15),
Cargo varchar(60),
FechaPago varchar(20),
Cargas integer,
MontoCargas integer,
AFP integer,
NombreAfp varchar(20),
APV integer,
AFC integer,
Salud integer,
NombreSalud varchar(20),
IUT integer,
Creditos integer,
Ahorro integer,
Anticipo integer,
TotalImponible INTEGER,
TotalNoImponible INTEGER,
TotalHaberes INTEGER,
TotalLiquido INTEGER,
TotalDescuentos INTEGER,
MesPalabras varchar(10),
LiquidoPalabras varchar(1000),
Aux integer,
constraint pk_liquidacion primary key (RutTrabajador,Mes,Anio)
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
Digito varchar(2) not null,
login varchar(60) not null,
password varchar(60) not null,
constraint pk_Usuarios primary key (Rut)
);

CREATE TABLE Trabajadores(
Rut integer not null ,
Digito varchar(2) not null,
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
Afc varchar(2),
Fonasa float,
NombreAfp varchar (30),
NombreIsapre varchar (30),
MontoIsapre float,
apvUf float,
apvPesos integer,
DiasTrabajados integer,
HorasExtras integer,
Bonos integer,
Cargas integer,
constraint pk_Trabajadores  primary key (Rut)

);
-- Le quité la PK a Anticipo (era el rut y la fecha)
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
TotalDias integer not null
);

CREATE TABLE Licencias(
RutTrabajador integer not null,
FechaInicio date not null,
FechaTermino date not null,
TotalDias integer not null
);

CREATE TABLE Permisos(
RutTrabajador integer not null,
FechaInicio date not null,
FechaTermino date not null,
TotalDias integer not null,
GoceSueldo varchar(2)
);

CREATE TABLE Tramos(
Id integer not null,
Inicio integer not null,
Termino integer not null,
Monto integer not null
);
-- Le quité la PK a prestaciones (era el Rut y el ID)
-- Le agregé el atributo CuotasPagadas, para ver el estado de avance de las cuotas.
CREATE TABLE Prestaciones(
RutTrabajador integer not null,
Id integer not null auto_increment,
Institucion varchar(60),
TipoPrestacion varchar(60),
Monto integer not null,
CuotasPendientes integer not null,
CuotasPagadas integer not null,
constraint pk_Prestaciones primary key (Id)
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
Monto decimal(10,2) not null,
constraint pk_UF primary key (Fecha)
);
CREATE TABLE UTM(
Fecha date not null,
MontoUTM decimal(10,2) not null,
constraint pk_UTM primary key (Fecha)
);

CREATE TABLE Afp(
NombreAfp varchar(30) not null,
PorcentajeAfp float not null,
constraint pk_Afp primary key (NombreAfp)
);
CREATE TABLE Planilla(
Mes varchar(10),
anio integer,
Rut integer not null ,
Digito varchar(2) not null,
Nombre VARCHAR(60) not null ,
RentaBruta integer,
DiasTrabajados integer,
HorasExtras integer,
OtrosBonos integer,
RentaImponible integer,
AcajaOtro integer,
NumCargas integer,
AsignacionFamiliar integer,
TotalHaberes integer,
NombreAfp varchar(10),
MontoAfp integer,
Afc integer,
NombreIsapre varchar(10),
MontoIsapre integer,
IsapreAdicional integer,
Fonasa integer,
LosAndes integer,
Apv integer,
TotalDescuentosLegales integer,
BaseImpuesto integer,
IpmUni integer,
Prestamos integer,
AnticiposOtros integer,
TotalDescuentosAdicionaes integer,
TotalLiquido integer,
Afctrabajador integer,
Afctrabajador1 integer,
Aporte integer
);
create table totales(
Mes varchar(10),
anio integer,
TRentaBruta integer,
TDiasTrabajados integer,
THorasExtras integer,
TOtrosBonos integer,
TRentaImponible integer,
TAcajaOtro integer,
TNumCargas integer,
TAsignacionFamiliar integer,
TTotalHaberes integer,
TNombreAfp varchar(10),
TMontoAfp integer,
TAfc integer,
TNombreIsapre varchar(10),
TMontoIsapre integer,
TIsapreAdicional integer,
TFonasa integer,
TLosAndes integer,
TApv integer,
TTotalDescuentosLegales integer,
TBaseImpuesto integer,
TIpmUni integer,
TPrestamos integer,
TAnticiposOtros integer,
TTotalDescuentosAdicionaes integer,
TTotalLiquido integer,
TAfctrabajador integer,
TAfctrabajador1 integer,
TAporte integer,
MontoCuprum integer,
MontoHabitat integer,
MontoPlanVital integer,
MontoCapital integer,
MontoProvida integer
);
insert into Afp values ('Capital',13.31);
insert into Afp values ('Cuprum',13.35);
insert into Afp values ('Habitat',13.23);
insert into Afp values ('Plan Vital',14.23);
insert into Afp values ('Provida',13.41);


insert into Usuarios values (0,'TicSoft',16254002,'1','admin','21232f297a57a5a743894a0e4a801fc3');
insert into Usuarios values (1,'TicSoft',16254001,'1','super','1b3231655cebb7a1f783eddf27d254ca');
insert into USuarios values (1,'Rodrigo',16071696,'1','Rodrigo','c920838d7afb191381bdb1eb7572c30b');

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

insert into UF values ('2010-01-05',0);
insert into UTM values('2010-01-05',0);