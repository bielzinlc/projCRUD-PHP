admin	CREATE TABLE `admin` (
 `id_admin` int(11) NOT NULL,
 `usuario` varchar(20) NOT NULL,
 `senha` varchar(15) NOT NULL,
 UNIQUE KEY `id_admin` (`id_admin`),
 UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
===========================================================================
cliente	CREATE TABLE `cliente` (
 `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
 `nome` varchar(50) NOT NULL,
 `telefone` varchar(11) NOT NULL,
 `data_agendada` char(10) NOT NULL,
 PRIMARY KEY (`id_cliente`),
 UNIQUE KEY `telefone` (`telefone`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
