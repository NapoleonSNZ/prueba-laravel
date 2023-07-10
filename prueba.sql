CREATE DATABASE prueba;
USE prueba;


-- Tabla 'catalogos'

CREATE TABLE catalogos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  valor VARCHAR(100),
  grupo VARCHAR(100),
  id_padre INT,
  FOREIGN KEY (id_padre) REFERENCES catalogos(id)
);


-- Tabla 'empleados'

CREATE TABLE `prueba`.`empleados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `apellido` VARCHAR(100) NULL,
  `correo` VARCHAR(150) NULL,
  `telefono` VARCHAR(8) NULL,
  `direccion` VARCHAR(200) NULL,
  `id_municipio` INT NULL,
  `id_depto` INT NULL,
  `activo` BOOLEAN DEFAULT TRUE,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_municipio`) REFERENCES `catalogos` (`id`),
  FOREIGN KEY (`id_depto`) REFERENCES `catalogos` (`id`)
) ENGINE = InnoDB;



--Registro de las tablas

INSERT INTO `catalogos` (`id`, `valor`, `grupo`, `id_padre`) VALUES (NULL, 'San Salvador', 'Departamentos', NULL), (NULL, 'La Libertad', 'Departamentos', NULL), (NULL, 'Santa Ana', 'Departamentos', NULL), (NULL, 'Ahuachapan', 'Departamentos', NULL), (NULL, 'Sonsonate', 'Departamentos', NULL), (NULL, 'Chalatenango', 'Departamentos', NULL), (NULL, 'Cabañas', 'Departamentos', NULL), (NULL, 'Cuzcatlan', 'Departamentos', NULL), (NULL, 'La Paz', 'Departamentos', NULL), (NULL, 'San Vicente', 'Departamentos', NULL), (NULL, 'Usulutan', 'Departamentos', NULL), (NULL, 'San Miguel', 'Departamentos', NULL), (NULL, 'Morazan', 'Departamentos', NULL), (NULL, 'La Union', 'Departamentos', NULL);


INSERT INTO `catalogos` (`id`, `valor`, `grupo`, `id_padre`) VALUES (NULL, 'San Salvador', 'Municipios', '1'), (NULL, 'Santa Tecla', 'Municipios', '2'), (NULL, 'Santa Ana', 'Municipios', '3'), (NULL, 'San Miguel', 'Municipios', '12'), (NULL, 'Acajutla', 'Municipios', '5'), (NULL, 'Apaneca', 'Municipios', '4'), (NULL, 'Nueva Concepcion', 'Municipios', '6'), (NULL, 'Cojutepeque', 'Municipios', '8'), (NULL, 'Zacatecoluca', 'Municipios', '9'), (NULL, 'San Ildefonso', 'Municipios', '10'), (NULL, 'Estanzuelas', 'Municipios', '11'), (NULL, 'San Francisco Gotera', 'Municipios', '13'), (NULL, 'Santa Rosa de Lima', 'Municipios', '14'), (NULL, 'Sensuntepeque', 'Municipios', '7'), (NULL, 'Mejicanos', 'Municipios', '15'), (NULL, 'Antiguo Cuscatlan', 'Municipios', '2'), (NULL, 'Soyapango', 'Municipios', '1'), (NULL, 'Metapan', 'Municipios', '3');


INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `direccion`, `id_municipio`, `id_depto`)
VALUES (NULL, 'Carlos Ernesto', 'Perez Cerás', 'perezcarl@yopmail.com', '78964554', 'col. Mirador Este', '15', '1'),
 (NULL, 'Marta Elida', 'Sanchez Caceres', 'caceres2023@yopmail.com', '78900990', 'col. santa eugenia sur', '17', '3'),
(NULL, 'Nelson', 'MArroquin', 'marrp@yopmail.com', '79003444', 'El Calvario', '19', '5'),
 (NULL, 'Edgardo Mauricio', 'Salguero Cruz', 'crucito@yopmail.com', '79009344', 'Centro Santa Tecla', '16', '2');















