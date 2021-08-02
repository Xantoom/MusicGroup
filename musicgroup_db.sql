-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage des données de la table musicgroup.albums : ~6 rows (environ)
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` (`id`, `name`, `artist`, `songs`, `date`) VALUES
	(1, 'AlbumExemple', 'Jean', '["ChansonExemple1","ChansonExemple2"]', 1621261646),
	(2, 'AutreAlbum', 'Jean', '["1SeuleChanson"]', 1621261676),
	(3, '1erAlbum', 'Hugo', '["Chanson1","Chanson2","Chanson3"]', 1621264443),
	(4, '2èmeAlbum', 'Hugo', '["Chanson1","Chanson2"]', 1621264465),
	(5, '3èmeAlbum', 'Hugo', '["Chanson1","Chanson2","Chanson3","Chanson4"]', 1621264483),
	(6, '4èmeAlbum', 'Hugo', '["Chanson1"]', 1621264494);
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;

-- Listage des données de la table musicgroup.artists : ~9 rows (environ)
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;
INSERT INTO `artists` (`id`, `name`, `bio`, `date`) VALUES
	(1, 'Jean', 'Il a fait plein d\'albums.', 1621261576),
	(2, 'Paul', 'Lui aussi il a fait plein de supers albums.', 1621261723),
	(3, 'Pierre', 'Il ne fait aucun album.', 1621261999),
	(4, 'Jacques', 'Il n\'a fait aucun album.', 1621262040),
	(5, 'Antoine', 'Il n\'a pas fait beaucoup d\'albums.', 1621262790),
	(6, 'Hugo', 'Il a fait plein d\'albums en 1982.', 1621262846),
	(7, 'Benoît', 'Un chanteur médiocre qui a fait quelques albums.', 1621262903),
	(8, 'Donatien', 'Aucun album à son actif.', 1621263776),
	(9, 'Didier', 'Il a pas des albums pas terribles.', 1621263813),
	(10, 'Le10ème', 'Le 10ème artiste de la liste.', 1621263835);
/*!40000 ALTER TABLE `artists` ENABLE KEYS */;

-- Listage des données de la table musicgroup.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `email`, `date`) VALUES
	(1, 'admin', '$2y$10$xKM.mpU57F6LpPLXvYgkpeM3qlSA.IIM6dolZlj7FQ5juCIMHUfri', 'admin@gmail.com', 1621261371);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
