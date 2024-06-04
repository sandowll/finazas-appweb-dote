-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS Dote;

USE Dote;

-- Estructura de tabla para la tabla `cuentas`
CREATE TABLE IF NOT EXISTS `cuentas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `realname` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `tdocumento` varchar(250) NOT NULL,
  `documento` varchar(250) NOT NULL,
  `pasadmin` varchar(250) NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Estructura de tabla para la tabla `dinero`
CREATE TABLE IF NOT EXISTS `dinero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dinero` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insertar datos en la tabla `cuentas`
INSERT INTO `cuentas` (`user`, `realname`, `password`, `email`, `tdocumento`, `documento`, `pasadmin`, `rol`) VALUES
('admin', 'Administrador', '1000213244', 'd-capsulam54@gmail.com', 'DNI', '12345678', '1000213244', 1);
