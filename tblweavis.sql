-- --------------------------------------------------------
-- Host:                         194.172.129.245
-- Server-Version:               11.4.1-MariaDB - mariadb.org binary distribution
-- Server-Betriebssystem:        Win64
-- HeidiSQL Version:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Exportiere Struktur von Tabelle desy.tblweavis
CREATE TABLE IF NOT EXISTS `tblweavis` (
  `weavisid` int(11) NOT NULL AUTO_INCREMENT,
  `bstatus` int(11) DEFAULT 0,
  `aktionskennzeichen` varchar(3) NOT NULL DEFAULT 'WEA',
  `mandant` varchar(20) NOT NULL,
  `abteilung` varchar(20) NOT NULL,
  `weart` varchar(5) DEFAULT 'WESTD',
  `bestellnr` varchar(50) NOT NULL,
  `kundenreferenz` varchar(50) DEFAULT NULL,
  `terminart` varchar(3) DEFAULT NULL,
  `liefertermin` datetime DEFAULT NULL,
  `lieferantenkundenNr` varchar(15) DEFAULT NULL,
  `lieferantenname1` varchar(40) DEFAULT NULL,
  `lieferantenname2` varchar(40) DEFAULT NULL,
  `lstrasse` varchar(40) DEFAULT NULL,
  `llaenderkennzeichen` varchar(3) DEFAULT NULL,
  `lplz` varchar(15) DEFAULT NULL,
  `lort` varchar(40) DEFAULT NULL,
  `artikel` varchar(255) NOT NULL,
  `meean` varchar(100) DEFAULT NULL,
  `lieferantenartikel` varchar(255) DEFAULT NULL,
  `charge` varchar(255) DEFAULT NULL,
  `mhd` datetime DEFAULT '1970-01-01 00:00:00',
  `sn` varchar(255) DEFAULT NULL,
  `bestellmenge` int(11) NOT NULL DEFAULT 0,
  `meeinheit` varchar(3) DEFAULT NULL,
  `liefermenge` int(11) DEFAULT 0,
  `positionstext` varchar(255) DEFAULT NULL,
  `positionsnr` int(11) DEFAULT 0,
  `import_desy` datetime DEFAULT NULL,
  `angelegtdatum` datetime DEFAULT current_timestamp(),
  `angelegtuser` varchar(45) DEFAULT NULL,
  `gebucht` datetime DEFAULT NULL,
  `rueckmeldungerfolgt` datetime DEFAULT NULL,
  `storniertdatum` datetime DEFAULT NULL,
  `storniertuser` varchar(45) DEFAULT NULL,
  `weid` int(11) DEFAULT NULL,
  `retourenid` varchar(255) DEFAULT NULL,
  `retourengrund` varchar(3) DEFAULT NULL,
  `retoureninfo` varchar(255) DEFAULT NULL,
  `retourenzustand` varchar(3) DEFAULT NULL,
  `retourenshipment` varchar(255) DEFAULT NULL,
  `retourenroutingcode` varchar(255) DEFAULT NULL,
  `tblts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `shop` varchar(100) DEFAULT NULL,
  `versanddatum` datetime DEFAULT NULL,
  `externe_zusatzinfo` varchar(255) DEFAULT NULL,
  `info1` varchar(255) DEFAULT NULL,
  `retourentrackingnrn` varchar(255) DEFAULT NULL,
  `nve` varchar(30) DEFAULT NULL,
  `order_id_shop` varchar(50) DEFAULT NULL,
  `order_item_id_Shop` varchar(50) DEFAULT NULL,
  `stellplatz` varchar(10) DEFAULT NULL,
  `lieferhinweis` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`weavisid`),
  UNIQUE KEY `unq` (`mandant`,`abteilung`,`bestellnr`,`kundenreferenz`,`artikel`,`positionsnr`,`charge`,`retourenid`),
  KEY `idxartikel` (`artikel`),
  KEY `idxweid` (`weid`),
  KEY `idxkundenreferenz` (`kundenreferenz`),
  KEY `idxshop` (`shop`),
  KEY `idxbestellnr` (`bestellnr`),
  KEY `idxkundenreferenzbestellnr` (`bestellnr`,`kundenreferenz`)
) ENGINE=InnoDB AUTO_INCREMENT=754519 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- Daten-Export vom Benutzer nicht ausgewählt

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
