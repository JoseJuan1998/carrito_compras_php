CREATE DATABASE `violetas`;

USE `violetas`;

CREATE TABLE `carrito` (
  `articulo` varchar(50) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `productos` (
  `articulo` text NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `productos` (`articulo`, `precio`, `cantidad`, `imagen`) VALUES
('Brocha', 20, 5, 'brocha'),
('Iluminador', 25, 3, 'iluminador'),
('Labial', 25, 8, 'labial'),
('Mascarilla', 10, 6, 'mascarilla'),
('Paleta', 120, 1, 'paleta'),
('Mini Plancha', 70, 2, 'plancha'),
('Pagina FB', 0, 0, 'violetfb'),
('Aloe', 25, 3, 'aloe'),
('Anillo', 10, 2, 'anillo'),
('Gel Antibacterial', 10, 3, 'antibacterial'),
('Arete', 10, 8, 'aretes'),
('Broches Chicos', 5, 10, 'brochesch'),
('Cartera', 70, 2, 'cartera'),
('Collar', 25, 3, 'collar'),
('Cosmetiquera', 70, 2, 'cosmetiquera'),
('Depilador', 15, 3, 'depilador'),
('Diadema', 15, 2, 'diadema'),
('Esmalte', 25, 5, 'esmalte'),
('Esponjita', 15, 3, 'esponjita'),
('Estrellas', 20, 1, 'estrellas'),
('Fijador', 50, 1, 'fijador'),
('Gloss', 20, 3, 'gloss'),
('Gorra', 60, 3, 'gorra'),
('Lentes', 50, 1, 'lentes'),
('Ligas', 50, 1, 'ligas'),
('Locion', 65, 2, 'locion'),
('Peine', 25, 1, 'peine'),
('Perfume', 65, 3, 'perfume'),
('Rimel', 25, 3, 'rimel'),
('Tequilero', 50, 1, 'tequilero'),
('Sombras', 35, 1, 'sombras'),
('Toallitas', 25, 3, 'toallitas'),
('Tripie', 60, 1, 'tripie');

CREATE TABLE `usuario` (
  `usuario` varbinary(100) NOT NULL,
  `pass` varbinary(100) NOT NULL,
  `nombre` varbinary(100) NOT NULL,
  `curp` varbinary(100) NOT NULL,
  `rfc` varbinary(100) NOT NULL,
  `direccion` varbinary(100) NOT NULL,
  `correo` varbinary(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `ventas` (
  `fecha` datetime NOT NULL,
  `articulo` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
