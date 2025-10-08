CREATE DATABASE agenda;
USE agenda;

CREATE TABLE `admin` (
 `id_admin` int(11) NOT NULL AUTO_INCREMENT,
 `usuario` varchar(15) NOT NULL,
 `senha` varchar(20) NOT NULL,
 PRIMARY KEY (`id_admin`),
 UNIQUE KEY `senha` (`senha`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
cliente	CREATE TABLE `cliente` (
 `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
 `nome` varchar(50) NOT NULL,
 `telefone` varchar(11) NOT NULL,
 `data_agendada` varchar(10) NOT NULL,
 PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
