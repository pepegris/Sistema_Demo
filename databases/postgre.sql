
CREATE TABLE art (
  id  SERIAL PRIMARY KEY,
  co_art VARCHAR(200) NOT NULL unique,
  linea_des VARCHAR(200) NOT NULL,
  ref_art float NOT NULL,
  prec_vta1 float  ,
  prec_vta2 float  ,
  stock INT NOT NULL,
  stock2 INT ,
  art_des VARCHAR(255) NOT NULL,
  img1 varchar (200) ,
  img2 varchar (200) ,
  img3 varchar (200) ,
  img4 varchar (200) ,
  auditoria VARCHAR (200) not null,
  fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP
);


/* CREATE TABLE art (
  id  SERIAL PRIMARY KEY,
  co_art VARCHAR(200) NOT NULL unique,
  linea_des VARCHAR(200) NOT NULL,
  ref_art INT NOT NULL,
  prec_vta1 INT  ,
  prec_vta2 INT  ,
  stock INT NOT NULL,
  stock2 INT ,
  art_des VARCHAR(255) NOT NULL,
  img1 varchar (200) not null,
  img2 varchar (200) ,
  img3 varchar (200) ,
  img4 varchar (200) ,
  auditoria VARCHAR (200) not null,
  fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP
); */

CREATE TABLE linea (
  id SERIAL PRIMARY KEY,
  linea_des VARCHAR(200) NOT NULL unique,
  fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE configuracion (
  ref INT UNIQUE,
  empresa VARCHAR(200) ,
  rif varchar (200) ,
  razon_social varchar(240) ,
  numero varchar (200) ,
  direcion varchar(240) ,
  iva float not null,
  tasa_dia float NOT NULL
);


INSERT INTO  configuracion VALUES (0,'NOMBRE DE LA EMRPESA','j-99999-1','trabajo','+58 0412-2027622','Venezuela',16,4.16);

CREATE TABLE clientes (
  id SERIAL PRIMARY KEY,
  nombre VARCHAR (255) NOT NULL,
  ci varchar (200) NOT NULL,
  numero varchar (200),
  email VARCHAR (255),
  direccion VARCHAR (255),
  informe VARCHAR (255),
  deuda VARCHAR (255),
  auditoria VARCHAR (200) not null,
  fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE vendedores (
  id SERIAL PRIMARY KEY,
  nombre VARCHAR (255) NOT NULL,
  ci varchar (200) NOT NULL,
  numero varchar (200),
  email VARCHAR (255),
  direccion VARCHAR (255),
  auditoria VARCHAR (200) not null,
  fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP 
);





create table usuario(  
  id SERIAL PRIMARY KEY,
  usuario VARCHAR(150) UNIQUE NOT NULL,
  correo varchar (200) not null,
  clave VARCHAR(200) NOT NULL,
  telefono VARCHAR(150),
  auditoria VARCHAR (200) not null,
  fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP
  );

   INSERT INTO  usuario (usuario,correo,clave,telefono,auditoria,fecha) VALUES ('sistema','correo@gmail.com','753159*','5763421','auditor',now()); 



create table factura(

    ID  SERIAL PRIMARY KEY,
    descripcion varchar(35),
    cliente VARCHAR (90),
    precio FLOAT not null,
    cantidad int not null,
    iva float not null,
    fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP

    



);


create table reng_fact (

    ID_FACTURA int PRIMARY KEY not null,
    art VARCHAR (90) not null,
    cantidad int not null,
    precio float,
    ref int,
    iva float not null,
    fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP,
    

    CONSTRAINT fk_reng_fact FOREIGN KEY(ID_FACTURA) REFERENCES factura(ID)



);



