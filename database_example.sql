-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           8.0.35 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para local
CREATE DATABASE IF NOT EXISTS `local` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `local`;

-- Copiando estrutura para tabela local.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `image_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela local.cursos: ~10 rows (aproximadamente)
INSERT INTO `cursos` (`id`, `title`, `content`, `image_url`, `is_featured`, `created_at`, `modified_at`) VALUES
	(1, 'This book is a treatise on the theory of ethics, very popular during the Renaissance', 'The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', '/uploads/img_67c115af90eab1.63444950.jpg', 0, '2025-02-27 12:18:02', '2025-02-28 01:47:27'),
	(2, 'To generate Lorem Ipsum which looks reasonable', 'The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '/uploads/img_67c1158deab282.95891739.jpg', 0, '2025-02-27 13:29:33', '2025-02-28 01:46:53'),
	(3, 'All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary', 'Making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures', '/uploads/img_67c1157104f3e9.59790296.jpg', 0, '2025-02-27 13:30:41', '2025-02-28 01:46:25'),
	(4, 'Or randomised words which don\'t look even slightly believable.', 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '/uploads/img_67c11557a724d6.77063636.jpg', 0, '2025-02-27 14:17:39', '2025-02-28 01:45:59'),
	(6, 'Various versions have evolved over the years, sometimes by accident', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', '/uploads/img_67c11538651630.39426658.jpg', 0, '2025-02-27 14:46:52', '2025-02-28 01:45:28'),
	(7, 'Content here, making it look like readable English', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', '/uploads/img_67c11511f1e4f5.66539363.jpg', 0, '2025-02-27 14:49:41', '2025-02-28 01:44:49'),
	(8, 'And more recently with desktop publishing software', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC', '/uploads/img_67c109937f1e74.56342311.jpg', 1, '2025-02-27 16:26:55', '2025-02-28 00:55:47'),
	(9, 'Lorem Ipsum', 'Is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '/uploads/img_67c0f3c9d727b1.09158960.jpg', 1, '2025-02-27 18:58:30', '2025-02-28 00:53:43'),
	(10, 'It has survived not only five centuries', 'But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages', '/uploads/img_67c0ffc439f294.69719595.jpg', 1, '2025-02-27 18:59:07', '2025-02-28 00:54:15'),
	(11, 'Curabitur eleifend sem ac risus posuere facilisis', 'Donec rhoncus lectus ut mi congue vehicula at et erat. Etiam blandit lorem quis purus fringilla, vel sollicitudin velit venenatis. Nulla molestie odio nisl, vel facilisis eros ornare id. In purus orci, scelerisque sed nulla sit amet', '/uploads/img_67c1201f188fa0.52519540.jpg', 0, '2025-02-28 02:31:59', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
