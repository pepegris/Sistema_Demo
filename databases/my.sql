-- to create a new database
CREATE DATABASE sis_control;

-- to use database
use sis_control;

-- creating a new table
CREATE TABLE art (
  id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
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
  fecha datetime NOT NULL DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE linea (
  id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  linea_des VARCHAR(200) NOT NULL unique,
  fecha datetime NOT NULL DEFAULT CURRENT_TIMESTAMP 

);

CREATE TABLE configuracion (
  ref INT(10) UNIQUE,
  empresa VARCHAR(200) ,
  rif varchar (200) ,
  razon_social varchar(240) ,
  numero varchar (200) ,
  direcion varchar(240) ,
  iva int not null,
  tasa_dia INT NOT NULL
);


INSERT INTO  configuracion VALUES (0,'NOMBRE DE LA EMRPESA','j-99999-1','trabajo','+58 0412-2027622','Venezuela',16,3800000);

CREATE TABLE clientes (
  id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  nombre VARCHAR (255) NOT NULL,
  ci varchar (200) NOT NULL,
  numero varchar (200),
  email VARCHAR (255),
  direccion VARCHAR (255),
  informe VARCHAR (255),
  deuda VARCHAR (255),
  auditoria VARCHAR (200) not null,
  fecha datetime NOT NULL DEFAULT CURRENT_TIMESTAMP 
);





create table usuario(  
  id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  usuario VARCHAR(150) UNIQUE NOT NULL,
  correo varchar (200) not null,
  clave VARCHAR(200) NOT NULL,
  telefono VARCHAR(150),
  auditoria VARCHAR (200) not null,
  fecha datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
  );

/*   INSERT INTO  usuario VALUES (null,'admin','correo@gmail.com','admin1','5763421','auditor',now()); */


  -- FACTURA
/* CREATE TABLE facturas(
  id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  fac_des VARCHAR(255) NOT NULL,
  total_bruto INT NOT NULL,
  total_neto INT NOT NULL,
  total_iva INT NOT NULL,
  fecha datetime NOT NULL DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE reng_fact(
  id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
  reng_art VARCHAR(255) NOT NULL,
  precio_art INT NOT NULL,
  fecha datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY(id) REFERENCES facturas(id)
)
 */

 create table factura(

    ID  INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    descripcion varchar(35),
    cliente VARCHAR (90),
    precio FLOAT not null,
    cantidad int not null,
    iva int not null,
    ffecha datetime NOT NULL DEFAULT CURRENT_TIMESTAMP

    



);


create table reng_fact (

    ID  INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    ID_FACTURA int(255) ,
    articulo VARCHAR (90) not null,
    cantidad int not null,
    precio int,
    ref int,
    iva int not null,
    fecha datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    

    CONSTRAINT fk_reng_fact FOREIGN KEY(ID_FACTURA) REFERENCES factura(id)



);


