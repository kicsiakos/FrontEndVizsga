-- --------------------------------------------------------
-- Hoszt:                        127.0.0.1
-- Szerver verzió:               10.4.32-MariaDB - mariadb.org binary distribution
-- Szerver OS:                   Win64
-- HeidiSQL Verzió:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Adatbázis struktúra mentése a phpvizsga.
CREATE DATABASE IF NOT EXISTS `phpvizsga` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `phpvizsga`;

-- Struktúra mentése tábla phpvizsga. arlista
CREATE TABLE IF NOT EXISTS `arlista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eljaras_neve` varchar(255) DEFAULT NULL,
  `megjegyzes` varchar(255) DEFAULT NULL,
  `eljaras_helyszine` varchar(255) DEFAULT NULL,
  `eljaras_ara` varchar(255) DEFAULT NULL,
  `eljaras_mod` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése phpvizsga.arlista: ~14 rows (hozzávetőleg)
INSERT INTO `arlista` (`id`, `eljaras_neve`, `megjegyzes`, `eljaras_helyszine`, `eljaras_ara`, `eljaras_mod`) VALUES
	(1, 'Russian Lips', '0.55 / 1.1 ML', 'Szigetszentmiklós', '40.000 Ft / 60.000 Ft', 'Esztétika'),
	(2, 'NTFC 135', 'Skinbooster', 'Szigetszentmiklós', '30.000 Ft / ampulla', 'Esztétika'),
	(3, 'Lemon Bottle', 'Zsírbontó injekció', 'Szigetszentmiklós', '35.000 Ft / ampulla', 'Esztétika'),
	(5, 'Aquarelle Lips', 'Ajaktetoválás', 'Kisszállás', '40.000 Ft', 'Tetoválás'),
	(6, 'Frozen Lips', 'Ajaktetoválás', 'Kisszállás', '45.000 Ft', 'Tetoválás'),
	(7, '3D Lips', 'Ajaktetoválás', 'Kisszállás', '50.000 Ft', 'Tetoválás'),
	(8, 'Soft Liner', 'Füstös szemhéjtetoválás', 'Kisszállás', '30.000 Ft', 'Tetoválás'),
	(9, 'Interlash', 'Szempillasűrítő tetoválás', 'Kisszállás', '15.000 Ft', 'Tetoválás'),
	(10, 'Interlash', 'Szempillasűrítő tetoválás', 'Szigetszentmiklós', '35.000 Ft', 'Tetoválás'),
	(11, 'Magic Shading', 'Szemöldöktetoválás', 'Szigetszentmiklós', '35.000 Ft', 'Tetoválás'),
	(12, 'Frozen Lips', 'Ajaktetoválás', 'Szigetszentmiklós', '35.000 Ft', 'Tetoválás'),
	(15, 'Russian Lips', '0.55 / 1.1 ML', 'Kisszállás', '40.000 Ft / 60.000 Ft', 'Esztétika'),
	(16, 'NTFC 135', 'Skinbooster', 'Kisszállás', '30.000 Ft / ampulla', 'Esztétika'),
	(17, 'Lemon Bottle', 'Zsírbontó injekció', 'Kisszállás', '35.000 Ft / ampulla', 'Esztétika');

-- Struktúra mentése tábla phpvizsga. felhasznalok
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `jelszo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése phpvizsga.felhasznalok: ~1 rows (hozzávetőleg)
INSERT INTO `felhasznalok` (`id`, `email`, `jelszo`) VALUES
	(1, 'kissakos23@gmail.com', '$2y$10$smES6PpFXlEszh1EzEebYO7qZKJQ1WWGfPtQEOPhyJ77N7lkXg/2u');

-- Struktúra mentése tábla phpvizsga. foglalasok
CREATE TABLE IF NOT EXISTS `foglalasok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vezeteknev` varchar(255) DEFAULT NULL,
  `keresztnev` varchar(255) DEFAULT NULL,
  `telefonszam` varchar(255) DEFAULT NULL,
  `emailcim` varchar(255) DEFAULT NULL,
  `megjegyzes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tábla adatainak mentése phpvizsga.foglalasok: ~5 rows (hozzávetőleg)
INSERT INTO `foglalasok` (`id`, `vezeteknev`, `keresztnev`, `telefonszam`, `emailcim`, `megjegyzes`) VALUES
	(1, 'Kiss', 'Ákos', '06302480795', 'kissakos23@gmail.com', 'Hajvágás.'),
	(2, 'Labanc', 'Ágnes', '06202358632', 'dikk@szoszo.hu', 'Hajmosás.'),
	(5, 'Labanc', 'Aladár', '06308489898', 'leo@dikk.hu', 'Pajesz mosás.'),
	(6, 'Kerekes', 'Aladár', '06302480795', 'kissakos23@gmail.com', 'dwqdqwdqd'),
	(7, 'Kerekes', 'Aladár', '06302480795', 'kissakos23@gmail.com', 'dwqdqwdqd');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
