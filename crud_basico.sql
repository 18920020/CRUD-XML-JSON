CREATE DATABASE crud_basico CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE crud_basico;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `users` (
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `users` (`firstname`, `middlename`, `lastname`, `birthdate`, `username`, `password`) VALUES
('Fabian', 'Fernandez', 'Lopez', '1998-07-16', 'fabian', '1234abc');


CREATE TABLE `ventas` (
  `id_venta` int (5) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fechaventa` date NOT NULL,
  `precio` DEC(5,2) NOT NULL,
  `cantidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `ventas` (`id_venta`, `producto`, `marca`, `descripcion`, `fechaventa`, `precio`,`cantidad`) VALUES
('12345', 'Agua embotellada', 'Bonafont','Agua pura de 600 ml', '2021-12-5', 12.00, 1),
('41235', 'Refresco', 'Cocacola','Refresco sabor cola de 3L', '2021-12-5', 40.00, 1),
('41237', 'Bolsa de papas', 'Sabritas','Papas sabritas sabor queso de 170 g', '2021-12-5', 40.00, 1),
('41239', 'Gansito', 'Marinela','Pastelito sabor chocolate de 50g', '2021-12-5', 13.00, 1);


CREATE TABLE `almacen` (
  `id_almacen` int (5) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fechacompra` date NOT NULL,
  `precio` DEC(5,2) NOT NULL,
  `cantidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `almacen` (`id_almacen`, `producto`, `marca`, `descripcion`, `fechacompra`, `precio`,`cantidad`) VALUES
('12345', 'Agua embotellada', 'Bonafont','Agua pura de 600 ml', '2021-12-5', 12.00, 26),
('41235', 'Refresco', 'Cocacola','Refresco sabor cola de 3L', '2021-12-5', 40.00, 20),
('41237', 'Bolsa de papas', 'Sabritas','Papas sabritas sabor queso de 170 g', '2021-12-5', 40.00, 30),
('41239', 'Gansito', 'Marinela','Pastelito sabor chocolate de 50g', '2021-12-5', 13.00, 10);


ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_almacen`);

 
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
 
 
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);
 
COMMIT;