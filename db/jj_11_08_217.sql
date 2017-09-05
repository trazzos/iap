

CREATE TABLE IF NOT EXISTS `bank` (
  `bankId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`bankId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `bank_account` (
  `bank_accountId` int(11) NOT NULL AUTO_INCREMENT,
  `numCuenta` varchar(255) NOT NULL,
  `bankId` int(11) NOT NULL,
  PRIMARY KEY (`bank_accountId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

