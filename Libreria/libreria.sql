SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE libreria;
use libreria;

CREATE TABLE `generos` (
  `cod` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `generos` (`cod`, `nombre`) VALUES
(1, 'Ciencia Ficción'),
(2, 'Comedia'),
(3, 'Distopía'),
(4, 'Drama'),
(5, 'Histórica'),
(6, 'Terror');

create TABLE bibliotecas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255),
	  descripcion text,
    estado varchar(20)
);

create TABLE compra_libros(
    id int AUTO_INCREMENT PRIMARY KEY,
    idbiblioteca int,
    idlibro int
);
    
create table biblioteca_libros(
	  id int AUTO_INCREMENT PRIMARY KEY,
    idbiblioteca int,
    idlibro int
);

CREATE TABLE `libros` (
  `isbn` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `escritores` varchar(255) NOT NULL,
  `genero` int(11) NOT NULL,
  `numpaginas` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `libros` (`isbn`, `titulo`, `escritores`, `genero`, `numpaginas`, `precio`, `imagen`) VALUES
(1, 'Guía del Autoestopista Galático', 'Douglas Adams', 2, 257, 0, 'img/autoestopista.jpg'),
(2, 'Trilogía de la Fundación', 'Isaac Asimov', 1, 895, 0, 'img/fundacion.jpg'),
(3, 'Las tinieblas y el alba', 'Ken Follet', 5, 1058, 0, 'img/tinieblas.jpg'),
(4, 'El señor de las moscas', 'William Golding', 3, 290, 0, 'img/moscas.jpg'),
(5, 'IT ', 'Stephen King', 6, 1215, 0, 'img/it.jpg');

ALTER TABLE `generos`
  ADD PRIMARY KEY (`cod`);

ALTER TABLE `libros`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `FK_Genero` (`genero`);

ALTER TABLE `generos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `libros`
  MODIFY `isbn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `libros`
  ADD CONSTRAINT `FK_Genero` FOREIGN KEY (`genero`) 
  REFERENCES `generos` (`cod`);

alter table `biblioteca_libros`
  ADD CONSTRAINT fk_idbiblioteca foreign KEY (idbiblioteca) 
  REFERENCES bibliotecas (id) on delete CASCADE on UPDATE CASCADE;
alter table `biblioteca_libros` 
  ADD CONSTRAINT fk_idlibro foreign KEY (idlibro) 
  REFERENCES libros (isbn) on delete CASCADE on UPDATE CASCADE;

alter table `compra_libros` 
  ADD CONSTRAINT fk_idlibro1 foreign KEY (idlibro) 
  REFERENCES libros (isbn) on delete CASCADE on UPDATE CASCADE;

alter table `compra_libros` 
  ADD CONSTRAINT fk_idbiblioteca1 foreign KEY (idbiblioteca) 
  REFERENCES bibliotecas (id) on delete CASCADE on UPDATE CASCADE;

COMMIT;