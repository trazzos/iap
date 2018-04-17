
CREATE TABLE IF NOT EXISTS `folio` (
  `folioId` int(11) NOT NULL AUTO_INCREMENT,
  `folioActual` varchar(255) NOT NULL,
  `folioSiguiente` varchar(255) NOT NULL,
  `nomenclatura` varchar(255) NOT NULL,
  `tiposolicitudId` int(11) NOT NULL,
  `anio` varchar(255) NOT NULL,
  PRIMARY KEY (`folioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;



INSERT INTO `folio` (`folioId`, `folioActual`, `folioSiguiente`, `nomenclatura`, `tiposolicitudId`, `anio`) VALUES
(1, '0', '1', 'IAP/DA/', 1, '2017'),
(2, '0', '1', 'IAP/DA/', 2, '2017'),
(3, '0', '1', 'IAP/DA/', 3, '2017'),
(4, '0', '1', 'IAP/DA/', 4, '2017'),
(5, '0', '1', 'IAP/DA/', 5, '2017'),
(6, '0', '1', 'IAP/DA/', 6, '2017'),
(7, '0', '1', 'IAP/DA/', 7, '2017');


ALTER TABLE  `solicitud` ADD  `folio` VARCHAR( 255 ) NOT NULL AFTER  `fechaEntrega` ;
ALTER TABLE  `subject` ADD  `tipoPeriodo` ENUM(  'Cuatrimestre',  'Semestre' ) NOT NULL AFTER  `semesterId` ;


ALTER TABLE  `personal` ADD  `firmaConstancia` ENUM(  'no',  'si' ) NOT NULL AFTER  `semblanza` ;

ALTER TABLE  `solicitud` ADD  `nombreFirma` VARCHAR( 255 ) NOT NULL AFTER  `folio` ;
ALTER TABLE  `solicitud` ADD  `sexoFirma` VARCHAR( 255 ) NOT NULL AFTER  `nombreFirma` ;
ALTER TABLE  `solicitud` ADD  `puestofirmante` VARCHAR( 255 ) NOT NULL AFTER  `nombreFirma` ;



CREATE TABLE IF NOT EXISTS `chat` (
  `chatId` int(11) NOT NULL AUTO_INCREMENT,
  `yoId` int(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `fechaEnvio` date NOT NULL,
  PRIMARY KEY (`chatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;



INSERT INTO `chat` (`chatId`, `yoId`, `usuarioId`, `mensaje`, `fechaEnvio`) VALUES
(1, 116, 1429, 'hola', '2017-10-19'),
(2, 1429, 116, 'hola amigo', '0000-00-00'),
(3, 116, 1429, 'fdgdf', '2017-10-19'),
(4, 116, 1429, 'dsfsdf', '2017-10-19'),
(5, 116, 1429, 'fdf', '2017-10-19'),
(6, 116, 928, 'k', '2017-10-19'),
(7, 116, 1295, '', '2017-10-19');