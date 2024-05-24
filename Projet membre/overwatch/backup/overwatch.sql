-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 21 mai 2024 à 22:02
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `overwatch`
--
CREATE DATABASE IF NOT EXISTS `overwatch` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `overwatch`;

-- --------------------------------------------------------

--
-- Structure de la table `clic`
--

CREATE TABLE `clic` (
  `id_clic` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL,
  `parametres` varchar(255) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `langue` varchar(255) NOT NULL,
  `moment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clic`
--

INSERT INTO `clic` (`id_clic`, `ip`, `page`, `parametres`, `reference`, `langue`, `moment`) VALUES
(1, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:47:48'),
(2, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:47:50'),
(3, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:48:06'),
(4, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:48:07'),
(5, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:48:33'),
(6, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:50:52'),
(7, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:51:11'),
(8, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:51:14'),
(9, '127.0.0.1', '/php/overwatch/heros.php', 'heros=1', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:53:15'),
(10, '127.0.0.1', '/php/overwatch/liste-heros.php', 'heros=1', 'http://localhost:8080/php/overwatch/heros.php?heros=1', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:53:44'),
(11, '127.0.0.1', '/php/overwatch/heros.php', 'heros=8', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=1', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:53:52'),
(12, '127.0.0.1', '/php/overwatch/liste-heros.php', 'heros=8', 'http://localhost:8080/php/overwatch/heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 08:53:57'),
(13, '127.0.0.1', '/php/overwatch/liste-heros.php', 'heros=8', 'http://localhost:8080/php/overwatch/heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:09:07'),
(14, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:09:08'),
(15, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:09:33'),
(16, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:10:13'),
(17, '127.0.0.1', '/php/overwatch/liste-heros.php', 'heros=8', 'http://localhost:8080/php/overwatch/heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:17:42'),
(18, '127.0.0.1', '/php/overwatch/heros.php', 'heros=8', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=1', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:17:44'),
(19, '127.0.0.1', '/php/overwatch/liste-heros.php', 'heros=1', 'http://localhost:8080/php/overwatch/heros.php?heros=1', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:17:45'),
(20, '127.0.0.1', '/php/overwatch/heros.php', 'heros=8', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=1', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:17:46'),
(21, '127.0.0.1', '/php/overwatch/liste-heros.php', 'heros=8', 'http://localhost:8080/php/overwatch/heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:17:46'),
(22, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:17:46'),
(23, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:22:12'),
(24, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=8', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:22:14'),
(25, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 09:23:56'),
(26, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:29:38'),
(27, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:29:41'),
(28, '127.0.0.1', '/php/overwatch/heros.php', 'heros=1', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:29:47'),
(29, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/heros.php?heros=1', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:29:52'),
(30, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:30:16'),
(31, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/membre/inscription-identification.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:30:25'),
(32, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:30:26'),
(33, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:31:51'),
(34, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/recherche-avancee.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:31:53'),
(35, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:31:54'),
(36, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:31:55'),
(37, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/recherche-avancee.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:31:59'),
(38, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:32:00'),
(39, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/recherche-avancee.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:32:05'),
(40, '127.0.0.1', '/php/overwatch/heros.php', 'heros=2', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:32:17'),
(41, '127.0.0.1', '/php/overwatch/liste-heros.php', 'heros=2', 'http://localhost:8080/php/overwatch/heros.php?heros=2', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:32:24'),
(42, '127.0.0.1', '/php/overwatch/liste-heros.php', 'heros=2', 'http://localhost:8080/php/overwatch/heros.php?heros=2', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 12:32:47'),
(43, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php?heros=2', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 14:57:14'),
(44, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 14:57:23'),
(45, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:04:30'),
(46, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:14:36'),
(47, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:23:37'),
(48, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:38:52'),
(49, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:40:47'),
(50, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:40:58'),
(51, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:42:25'),
(52, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:42:40'),
(53, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:42:41'),
(54, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:42:53'),
(55, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:43:22'),
(56, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:43:42'),
(57, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:45:57'),
(58, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:45:59'),
(59, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:46:14'),
(60, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:46:15'),
(61, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:47:31'),
(62, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:47:34'),
(63, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:47:36'),
(64, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:47:58'),
(65, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:47:59'),
(66, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:48:00'),
(67, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/index.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-01 15:48:07'),
(68, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-02 21:42:44'),
(69, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-02 21:42:52'),
(70, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-02 21:43:01'),
(71, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-02 21:43:09'),
(72, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-02 21:43:13'),
(73, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-02 21:43:17'),
(74, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-02 21:43:18'),
(75, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 08:02:32'),
(76, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 08:02:35'),
(77, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 08:02:38'),
(78, '127.0.0.1', '/php/overwatch/membre.php', '', 'http://localhost:8080/php/overwatch/liste-heros.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 08:03:04'),
(79, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 08:05:09'),
(80, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 08:05:51'),
(81, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 08:06:28'),
(82, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 08:06:37'),
(83, '127.0.0.1', '/php/overwatch/liste-heros.php', '', 'http://localhost:8080/php/overwatch/membre.php', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 08:06:44'),
(84, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-03 09:44:45'),
(85, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-08 08:02:14'),
(86, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-10 08:22:54'),
(87, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-10 09:25:05'),
(88, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'en-CA,en-US;q=0.7,en;q=0.3', '2024-05-10 09:27:09'),
(89, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-17 08:02:31'),
(90, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-21 14:28:12'),
(91, '127.0.0.1', '/php/overwatch/index.php', '', 'http://localhost:8080/php/', 'fr,fr-FR;q=0.8,en-US;q=0.5,en;q=0.3', '2024-05-21 15:15:10');

-- --------------------------------------------------------

--
-- Structure de la table `heros`
--

CREATE TABLE `heros` (
  `id_heros` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `classe` text DEFAULT NULL,
  `pv` text DEFAULT NULL,
  `description_courte` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `gi` varchar(255) DEFAULT NULL,
  `habilite1` text DEFAULT NULL,
  `description_habilite1` text DEFAULT NULL,
  `habilite2` text DEFAULT NULL,
  `description_habilite2` text DEFAULT NULL,
  `ultimate` text DEFAULT NULL,
  `description_ultimate` text DEFAULT NULL,
  `description_longue` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `heros`
--

INSERT INTO `heros` (`id_heros`, `nom`, `classe`, `pv`, `description_courte`, `icon`, `gi`, `habilite1`, `description_habilite1`, `habilite2`, `description_habilite2`, `ultimate`, `description_ultimate`, `description_longue`) VALUES
(1, 'Ana', 'Soutien', '250 HP', 'Membre fondateur d’Overwatch, Ana met son talent et son expertise au service de la défense de sa patrie et de ses proches.', 'icon-ana.jpg', 'gi-ana.jpg', 'Fléchette hypodermique :', 'Ana tire une fléchette avec son arme de poing, rendant un ennemi inconscient (bien que tout dommage le réveille).', 'Grenade biotique :', 'Lance une grenade qui soigne, augmente les soins des alliés, et inflige des dégâts aux ennemis, qui ne peuvent plus être soignés.', 'Nanoboost :', 'Augmente les dégâts d\\\\\\\'un allié, tout en réduisant les dégâts subis.', 'Les Origines :\r\n\r\nImpliquée dans la fondation d’Overwatch et reconnue autrefois comme la meilleure tireuse d’élite au monde, Ana Amari est issue d’une longue lignée de soldats maintes fois décorés. Présumée morte après une fusillade avec la Griffe, Ana a repris du service pour protéger son pays, sa famille et ses camarades les plus proches.\r\n\r\nOverwatch :\r\n\r\nL’Égypte ayant payé un lourd tribut lors de la crise des Omniums, les services armés du pays, affaiblis et en sous-effectif, choisirent de se tourner vers des snipers tels qu’Ana Amari, alors considérée comme l’un des meilleurs éléments du pays. Son adresse, sa capacité à prendre des décisions et son instinct l’amenèrent naturellement à rejoindre les troupes d’Overwatch, qui mirent fin à la guerre.\r\nSuite au succès de cette mission, Ana fut promue au rang de capitaine et servit de nombreuses années en tant que second du commandant Morrison. Malgré ses responsabilités accrues, Ana refusa d’être éloignée des opérations de combat. Elle continua d’opérer sur le terrain jusqu’à la cinquantaine, mais fut déclarée morte après avoir été neutralisée par un agent de la Griffe connu sous le nom de « Fatale », lors d’une prise d’otages.\r\n\r\nPost-Overwatch :\r\n\r\nAna survécut à des blessures graves et à la perte de son œil droit. Pendant sa convalescence, le poids d’une vie entière consacrée au combat se fit sentir et elle décida qu’il valait mieux rester morte aux yeux du monde. Les années passant, et voyant son foyer de plus en plus menacé, elle réalisa qu’elle avait toujours le désir de protéger les siens. C’est pourquoi elle rejoignit le combat, cette fois en tant que guérisseuse, et se consacra à la prévention des menaces planétaires. Avant de perturber les agissements de la Griffe au Caire, elle intercepta un message improbable : le rappel d’Overwatch de la part de son ancien ami, Winston.\r\n\r\nLe rappel :\r\n\r\nMême si elle restait dubitative quant au bien-fondé du rappel, elle décida toutefois d’aider ses camarades depuis les ombres. Elle contacta Cole Cassidy, qui avait survécu à la chute d’Overwatch et était revenu en tant que pistolero mercenaire. Ana savait que l’organisation avait besoin de sang neuf - des gens comme Cassidy et sa propre fille, Pharah - pour avoir une chance de l’emporter, et craignait que la vieille garde n’empêche son retour. Après en avoir parlé à sa fille lors d’une réunion tardive, elle se lança dans sa propre mission avec Soldat : 76. \r\nAyant l’esprit enfin libre, Ana traque désormais la Griffe et les fantômes qui hantent ses anciens alliés partout dans le monde. Même si elle n’a pas rejoint Overwatch, Ana garde un œil attentif sur leurs accomplissements.'),
(2, 'Ange', 'Soutien', '250 HP', 'Véritable ange gardien pour ceux qu’elle prend en charge, le docteur Angela Ziegler est une soignante hors pair, une scientifique brillante et une fervente partisane de la paix. ', 'icon-ange.jpg', 'gi-ange.jpg', 'Ange Gardien :', 'Volez vers un allié. En vol, sauter vous projette en avant et s\'accroupir vous projette en l\'air.', 'Résurrection :', 'Vous ressuscitez vos équipiers.', 'Valkyrie :', 'Vous confère la capacité de voler. Améliore vos capacités.', 'Les Origines :\r\n\r\nAprès qu’Angela Ziegler a perdu ses parents lors de la crise des Omniums, cette jeune surdouée et pionnière de la nanotechnologie a rejoint Overwatch pour en devenir la plus importante secouriste militaire ainsi que la plus ardente défenseure d’une paix mondiale. Mais après la dissolution de l’organisation et tandis qu’une nouvelle guerre se profile, elle se demande si cette paix naîtra de son vivant.\r\n\r\nOverwatch :\r\n\r\nAmie de longue date de Torbjörn Lindholm, Ziegler était encore jeune quand elle lança une percée révolutionnaire dans le domaine des nanotechnologies appliquées qui améliora de façon radicale le traitement des maladies et des traumatismes potentiellement mortels. C’est grâce à ce domaine d’expertise qu’elle attira l’attention d’Overwatch.\r\nPrivée de ses parents par la guerre, Angela Ziegler était opposée à l’approche militariste de l’organisation dans le maintien de la paix mondiale. Mais elle finit par reconnaître qu’Overwatch lui offrait l’opportunité de sauver des vies à bien plus grande échelle. Responsable de la recherche médicale d’Overwatch, Ziegler cherchait à optimiser l’application de ses travaux pour dispenser des soins sur le terrain dans les situations de crise. Ses recherches se concrétisèrent sous la forme de l’armure de traitement des urgences Valkyrie, qu’elle pilota elle-même lors de nombreuses missions d’Overwatch.\r\nMalgré ses contributions significatives, elle était fréquemment en désaccord avec ses supérieurs et les objectifs globaux de l’organisation. Mettre son esprit brillant au service de ses camarades pour les soigner ne l’empêchait pas d’émettre de vives réserves quant à Blackwatch, notamment vis-à-vis du commandant Reyes et de son médecin personnel, Moira O’Deorain. Après la dissolution d’Overwatch, Ziegler prit ses distances avec l’agence et put se consacrer de nouveau à apporter de l’aide à celles et ceux qui, partout dans le monde, avaient vu la guerre les briser et les spolier.\r\n\r\nPost-Overwatch :\r\n\r\nÀ la suite du rappel d’Overwatch, deux équipiers qu’elle croyait morts frappèrent à sa porte : Jack Morrison et Ana Amari. Ziegler ne sut trop que penser du retour d’Overwatch, en particulier face à un Morrison uniquement animé par l’envie d’anéantir quiconque était responsable de la chute de l’organisation. Pourtant, lorsque les troupes de la Griffe prirent Le Caire d’assaut, Ange reprit du service sans discuter pour protéger les civils aux côtés de ses anciens camarades.\r\nSi Soldat : 76, Ana Amari et elle se séparèrent ensuite, les évènements du Caire ravivèrent en Ana la flamme de l’héroïsme qu’elle pensait éteinte depuis longtemps. Après l’attaque du Secteur zéro contre Paris, il ne faisait aucun doute que le monde avait de nouveau besoin d’Overwatch pour ramener la paix. Sachant son combat loin d’être terminé, Ange a depuis réintégré Overwatch et enfile son armure Valkyrie chaque fois que des innocents sont en danger.'),
(3, 'Ashe', 'Dégâts', '250 HP', 'Calculatrice, ambitieuse et respectée dans le milieu de la pègre, Ashe est la cheffe du gang Deadlock Rebels.', 'icon-ashe.jpg', 'gi-ashe.jpg', 'Dynamite :', 'Lancez un explosif qui explose après un court délai ou immédiatement lorsque vous lui tirez dessus.', 'Canon scié :', 'Vous tirez sur les ennemis devant vous et vous projetez en arrière.', 'B.O.B. :', 'Vous déployez Bob. Il charge en avant et projette les ennemis en l\'air, puis attaque avec ses canons à bras.', 'Les origines :\r\n\r\nAshe est la fille d’un couple fortuné qui s’intéressait davantage à ses affaires qu’à sa fille. Ambitieuse et calculatrice, elle s’est révoltée et a formé le gang Deadlock Rebels, qui s’est rapidement fait connaître dans le monde de la pègre. Après avoir convaincu les bandes du Sud-Ouest américain de s’associer, Ashe s’est forgé une légende et a rendu sa notoriété au Far West d’antan.\r\n\r\nJeunesse :\r\n\r\nIssue d’une famille aisée, Ashe grandit dans un milieu privilégié. Ses parents étaient les propriétaires d’Arbalest Arms Company, une entreprise familiale qui avait pris de l’envergure lors de la crise des Omniums. Malgré leur intérêt limité pour l’armement et la technologie, ils n’en étaient pas moins devenus des consultants en affaire très demandés et qui coachaient même l’élite mondiale. S’ils ne prêtaient que peu d’attention à leur fille (et la confiaient souvent aux soins du majordome omniaque de la famille, B.O.B.), ils s’étaient assurés qu’elle ait toutes les chances de réussir. Mais une rencontre fortuite avec un voyou du coin du nom de Cole Cassidy et la série de crimes qu’ils commirent ensemble lui ouvrirent les yeux quant à sa véritable vocation. La satisfaction de se montrer plus maligne que ses cibles ainsi que le frisson de la réussite avaient fait d’elle une hors-la-loi.\r\n\r\nDeadlock Rebel :\r\n\r\nAux côtés des trois autres fondateurs du gang Deadlock Rebels, Ashe se fit un nom en réussissant des casses plus importants et impressionnants. Ses « exploits » finirent par lui valoir l’attention d’Overwatch, qui s’opposa vite à la bande et emprisonna Cassidy. Mais en se hissant ainsi au premier plan, le gang ne s’attira pas seulement les foudres de la loi : les autres organisations criminelles du Sud-Ouest américain voulaient elles aussi leur part du gâteau, et les accrochages étaient souvent violents. Après des années d’échauffourées et de bains de sang, Ashe organisa une rencontre avec les chefs des autres groupes principaux.\r\nElle avait tout à gagner à ce que leur influence grandisse, aussi utilisa-t-elle ce qu’elle avait appris auprès de ses parents pour organiser les différents gangs. Elle leur proposa de travailler ensemble, ou tout du moins, d’arrêter de se tirer dans les pattes. À présent soulagée de ses chamailleries avec les autres gangs, Ashe se fit connaître dans tout le Sud-Ouest américain en enchaînant attaques et hold-up audacieux, obtenant ainsi le statut de hors-la-loi légendaire.\r\nSes principes étaient les suivants : tenez parole, ne collaborez pas avec les autorités, respectez le territoire des autres, et soyez sans pitié envers les traîtres. D’ailleurs, bien des années après que Cole Cassidy les eut trahis pour rejoindre Overwatch, les Deadlock Rebels reçurent un tuyau : une technologie de très grande valeur allait traverser leur territoire en hypertrain. Incapable d’ignorer une opportunité aussi lucrative, le gang projeta de le braquer, avant de comprendre qu’il était la véritable victime de ce coup. Cassidy neutralisa tous ses membres et libéra Écho. À lui tout seul, il venait de priver Ashe de sa moto, de son butin, et de sa chance de se venger.\r\nMais en cette période de doute, une chose est sûre : Ashe obtient toujours ce qu’elle veut. Et avec ses Deadlock Rebels, elle ne reculera devant rien pour récupérer ce qui lui revient (et très certainement ce qui vous appartient).'),
(4, 'Baptiste', 'Soutien', '250 HP', 'Secouriste militaire d’élite et ancien agent de la Griffe, Baptiste utilise désormais ses compétences pour aider ceux que la guerre a le plus durement touchés.', 'icon-baptiste.jpg', 'gi-baptiste.jpg', 'Salve Régénérante :', 'Vous vous soignez et soignez les personnages alliés à proximité instantanément, et rendez également des points de vie sur la durée. Les soins prodigués instantanément sont doublés pour les cibles ayant moins de la moitié de leurs points de vie.', 'Champ d\'immortalité :', 'Vous lancez un dispositif qui empêche les alliés de mourir. Celui-ci peut être détruit.', 'Matrice Amplificatrice :', 'Vous projetez une matrice qui double les dégâts et les effets de soin des projectiles alliés.', 'Coalition Caribéenne :\r\n\r\nJean-Baptiste Augustin faisait partie des trente millions d’orphelins causés par la crise des Omniums. Disposant de peu d’opportunités et de ressources, il s’enrôla dans l’armée. La Coalition caribéenne, une armée insulaire formée en réponse à la crise, devint sa nouvelle famille. Guidé par un profond désir d’aider les gens, Baptiste choisit de suivre la voie de secouriste militaire et servit dans les forces spéciales de la Coalition caribéenne.\r\nUne fois son service accompli, Baptiste eut du mal à trouver comment mettre ses compétences à profit. Il accepta une des rares opportunités qui s’offraient à lui, rejoindre un groupe de mercenaires de la Griffe, une des nombreuses organisations vouées à tirer profit du chaos post-affrontements.\r\n                                                                                                                                                     \r\nLa Griffe :\r\n                                                                                                                                                     \r\nPour la première fois, Baptiste put goûter à une vie facile. Les missions de la Griffe étaient simples et payaient bien, et il put mettre de l’argent de côté pour ouvrir une clinique dans sa ville d’origine. Mais peu à peu, les ordres que recevait son unité devinrent plus brutaux et ce fut l’escalade, entre assassinats et victimes civiles collatérales. Confronté aux actions de son équipe, Baptiste se rendit compte qu’il perpétuait un cycle de violence identique à celui qui avait détruit sa propre communauté. Il quitta la Griffe, écœuré par les actes qu’il avait commis et déterminé à se tracer une nouvelle voie.\r\nMais la Griffe n’était pas prête à le laisser partir. Baptiste en savait trop. Alors l’organisation envoya des agents le réduire au silence. Ils vinrent les uns après les autres, y compris les anciens équipiers de Baptiste. Pour ne pas se faire repérer, Baptiste se déplaçait souvent aux quatre coins du globe, tout en œuvrant dans les secours humanitaires. Les rares membres de la Griffe à avoir réussi à le localiser n’ont jamais refait surface.\r\n                                                                                                                                                     \r\nEn Fuite :\r\n                                                                                                                                                     \r\nAprès des années de cavale, Baptiste regagna Haïti pour apporter son aide à la clinique dont il était le cofondateur. La Griffe se saisit de cette opportunité pour lui tendre un piège sophistiqué. Mauga et Trung Le Nguyen, deux soldats de la Griffe, intimèrent à Baptiste de les accompagner pour dépouiller un homme d’affaires, ou de les affronter, quitte à y laisser la vie. Pour survivre, Baptiste accepta, mais lorsqu’il découvrit que l’homme possédait des informations cruciales au sujet d’Overwatch, il décida de le sauver. Mauga, son ami de jadis, laissa à Baptiste une dernière chance de réintégrer la Griffe autrement que dans un cercueil, mais celui-ci refusa et s’enfuit avec de précieuses données : une liste de noms et de lieux ayant reçu le message de Winston au sujet du rappel d’Overwatch.\r\nLa découverte de cette liste d’agents connus ou présumés d’Overwatch incita Baptiste à prévenir celles et ceux qui y figuraient. Il décida de commencer par contacter le docteur Angela Ziegler. Alors qu’il tentait de la localiser, Baptiste croisa le chemin de Cassidy, lui-même en mission pour recruter des héros et héroïnes dans le monde entier afin de créer le nouvel Overwatch. Cassidy dut mettre ses soupçons de côté lorsque la Griffe les attaqua tous les deux les obligeant à faire équipe, et Baptiste y vit une chance de faire un premier pas vers la rédemption. Aujourd’hui, il œuvre pour un monde meilleur, apportant des soins à ceux qui en ont besoin et affrontant ceux qui le méritent. Il sait qu’il ne peut pas revenir sur le passé, mais faire changer les choses est tout ce qui compte pour lui désormais.'),
(5, 'Bastion', 'Dégâts', '350 HP', 'Autrefois combattant de première ligne lors de la terrible crise des Omniums, ce curieux automate Bastion explore maintenant le monde, fasciné par la nature mais vigilant face à une humanité qui le craint.', 'icon-bastion.jpg', 'gi-bastion.jpg', 'Grenade tactique A-36 :', 'Lance une grenade qui rebondit sur les murs et explose au contact des adversaires ou du sol.', 'Reconfiguration :', 'Alterne la configuration des armes.', 'Configuration : artillerie :', 'Vous vous immobilisez pour tirer 3 puissants obus d’artillerie.', 'Les origines :\r\n\r\nAbandonnée et en veille depuis la fin de la terrible crise des Omniums, cette unité Bastion pour le moins étrange s’est réveillée dans monde nouveau. Autrefois hostile, elle était désormais douée de curiosité et fascinée par la nature. En compagnie de Ganymède, un oiseau qui ne le quitte plus, Bastion a finalement été recueilli par Torbjörn Lindholm, et travaille à présent à ses côtés à aider l’humanité au lieu de la combattre.\r\n\r\nCrise des Omniums :\r\n\r\nInitialement créées pour des missions de maintien de la paix, les unités robotiques Bastion-E54 possédaient la capacité unique de pouvoir se reconfigurer rapidement pour se muer en armes d’assaut. Pendant la crise des Omniums, les Bastions furent dirigés contre leurs concepteurs humains et formèrent ainsi le gros des troupes rebelles des Omniums. À la fin du conflit, ils furent presque tous démantelés ou détruits. Aujourd’hui encore, les unités Bastion incarnent les horreurs de cette période. Une seule unité Bastion, gravement endommagée pendant les derniers moments de la guerre, fut oubliée pendant plus de dix ans. Elle demeura en veille prolongée, exposée à la rouille et aux intempéries, laissant la nature reprendre ses droits. Couvert de lierre et de racines, abritant les nids ou les terriers de petits animaux, le robot resta inerte, apparemment sans conscience du passage des saisons. Jusqu’au jour où il se réactiva brusquement. Sa programmation de combat ayant pour ainsi dire disparu, il développa un grand intérêt pour son environnement naturel et ses occupants. Cette curiosité insatiable poussa l’unité Bastion à arpenter le monde pour découvrir le sens de son existence sur une planète ravagée par la guerre.\r\nMême si « Bastion » semble très doux, voire inoffensif, sa programmation de combat reprend les commandes si l’unité perçoit un danger, et utilise l’ensemble de son arsenal pour éliminer tout ce qu’elle considère comme une menace. Cela a parfois provoqué des conflits avec les rares humains qui ont croisé sa route, et l’a poussé à éviter les zones peuplées en faveur des régions du monde les plus désertes et sauvages.\r\n\r\nTorbjörn :\r\n\r\nLes errances de Bastion finirent par le conduire dans le nord de la Suède, où son apparition réveilla chez la population des peurs enfouies depuis bien longtemps. Torbjörn Lindholm, l’un des concepteurs originaux des unités Bastion, se porta volontaire pour l’éliminer. Pendant sa traque, Torbjörn découvrit que le comportement de cette unité allait à l’encontre de ses directives de combat. Gagné par la curiosité et encouragé par ses recherches préliminaires, il décida d’intégrer Bastion à la guilde des Cuirassés et offrit de l’aider, à condition que le robot respecte ses règles. Torbjörn débarrassa Bastion d’une bonne partie de sa programmation militaire et apporta des réparations cruciales à plusieurs de ses systèmes, détériorés et vieux de plusieurs décennies. Aujourd’hui, Bastion assiste Torbjörn dans son atelier et aide les humains qu’ils combattait autrefois.'),
(6, 'Bouldozer', 'Tank', '325 HP', 'Brillant mécanicien et combattant plein de ressources, Bouldozer a quitté les laboratoires de la colonie lunaire Horizon pour devenir le champion de la reine des Junkers. ', 'icon-ball.jpg', 'gi-ball.jpg', 'Pilonnage :', 'Atterrit avec force, ce qui blesse les ennemis et les projette en l’air.', 'Bouclier dynamique :', 'Vous gagnez des points de vie supplémentaires temporaires, dont le montant dépend du nombre d’adversaires à proximité.', 'Champ de mines :', 'Déploie un large champ de mines de proximité.', 'Les origines :\r\n\r\nLa thérapie génique que ce hamster a subie sur la colonie lunaire Horizon lui a conféré une taille ainsi qu’un intellect exceptionnels. Hammond a appris seul l’ingénierie et la mécanique avant de s’échapper et d’atterrir parmi les Junkers de l’outback australien. Il a alors modifié sa capsule de sauvetage pour en faire un méca de combat, et sous le nom de Bouldozer, il est devenu le champion de l’arène ainsi que le garde du corps de la célèbre reine des Junkers.\r\n\r\nColonie Lunaire Horizon :\r\n\r\nL’une des nombreuses expériences menées sur la colonie lunaire Horizon consistait à traiter des animaux avec une thérapie génique pour évaluer leur adaptation à des séjours prolongés sur la Lune. Effet secondaire inattendu, plusieurs cobayes se mirent à afficher une croissance exceptionnelle de leur taille et de leurs fonctions intellectuelles. Les sujets d’expérience étaient principalement des gorilles et d’autres primates, mais d’autres espèces furent également utilisées, dont un hamster appelé Hammond.\r\nComme chez les autres spécimens, l’intelligence d’Hammond grandit et le hamster devint plus curieux du monde qui l’entourait. Au plus grand étonnement, tinté d’amusement, des scientifiques, Hammond fuyait souvent dans différentes sections de la base lunaire. Et même s’ils le retrouvaient et le rapportaient dans sa cage à chaque fois, ils ne découvrirent jamais le véritable but de ses escapades nocturnes. Comment auraient-ils pu savoir qu’Hammond récupérait toutes sortes de choses et développait ses compétences de mécanicien, qui se révéleraient bientôt utiles ?\r\n\r\nEvasion :\r\n\r\nQuand des gorilles se rebellèrent face aux scientifiques humains et prirent le contrôle, la colonie fut plongée dans le chaos. Mais tous les cobayes ne se mêlèrent pas de la révolte, et l’un des gorilles, Winston, organisa sa fuite vers la Terre. Il ignorait que Hammond cherchait lui aussi un moyen de s’échapper, et avait même conçu sa propre capsule de sauvetage. Winston découvrit les plans du hamster dans les fichiers de la base et se mit au travail, sans savoir qui en était l’auteur. Hammond construisit donc une capsule de fortune et s’arrima au vaisseau de Winston quand le gorille décolla. Alors qu’ils entraient dans l’atmosphère terrestre, Hammond se détacha et atterrit de son côté, dans l’outback australien.\r\n\r\nJunker :\r\nHammond modifia sa capsule pour s’introduire dans la lucrative arène de combats de mécas, le Laminoir. Grimpant les échelons, « Bouldozer » passa de simple concurrent à champion, alors que l’identité de son pilote restait un mystère pour tout le monde, à l’exception d’une personne.\r\n\r\nMême s’il s’aventure dans le vaste monde de temps à autre, Hammond a trouvé un endroit agréable (bien qu’un peu chaotique) où vivre, aux côtés de la reine des Junkers. Après tout, en tant que champion du Laminoir, il a un titre à défendre.'),
(7, 'Brigitte', 'Soutien', '250 HP', 'À présent au cœur de l’action, Brigitte Lindholm a pris les armes et compte bien protéger les plus faibles.', 'icon-brigitte.jpg', 'gi-brigitte.jpg', 'Module de réparation :', 'Soigne un allié pendant une courte durée.', 'Fléau cinglant :', 'Vous propulsez la masse de votre fléau vers l’avant et repoussez votre cible.', 'Ralliement :', 'Vous obtenez de l’armure, votre bouclier-écran est renforcé et vous octroyez des points de vie supplémentaires aux personnages alliés proches.', 'Les origines :\r\n\r\nLe talent pour l’ingénierie de cette Lindholm pure et dure n’a d’égal que son sens de l’honneur. Toute sa jeunesse, les récits épiques de son parrain, Reinhardt, l’ont fait rêver. Une fois adulte, Brigitte est ainsi devenue son écuyère. Tous deux ont rejoint la nouvelle Overwatch afin de combattre l’injustice qui ronge le monde.\r\n\r\nCuirassée :\r\n\r\nFille cadette d’un fabricant d’armes, Torbjörn Lindholm, Brigitte fut la première de ses enfants à s’intéresser à l’ingénierie mécanique. Elle passait la plupart de son temps libre dans l’atelier de son père pour apprendre les ficelles du métier et parfaire sa technique. Torbjörn était mondialement connu (et peut-être détesté) pour les armes qu’il avait mises au point. Brigitte avait hérité de son talent, mais se passionnait surtout pour la fabrication d’armures et de systèmes de défense.\r\nTout le monde s’attendait à ce que Brigitte poursuive son apprentissage et suive les traces de son père. Mais l’influence de Reinhardt Wilhelm, autre figure importante de son entourage, changea ses projets d’avenir. Cet agent d’Overwatch était un bon ami de la famille et le parrain de Brigitte. Durant toute son enfance, il lui raconta des histoires de héros et de chevaliers. Après sa retraite et la chute d’Overwatch, Reinhardt déclara qu’il comptait partir en quête de justice, tel un chevalier errant. Avant son départ, Brigitte lui demanda de se joindre à lui en tant qu’écuyère. Reinhardt, bien que surpris, accepta.\r\n\r\nEcuyère :\r\n\r\nDésormais écuyère, Brigitte avait de nombreuses responsabilités, dont la plus importante consistait à entretenir l’armure de croisé de Reinhardt (un modèle qu’elle connaissait bien puisque sa version actuelle avait été conçue par son père). Petit à petit, elle réalisa qu’elle passait le plus clair de son temps à s’occuper de Reinhardt. Au cours d’un voyage en Europe, le duo découvrit un village terrorisé par un gang local, les Dragons. Emporté par son ardeur au combat, Reinhardt manqua de perdre l’affrontement. Brigitte fit de son mieux pour réparer son armure avec les moyens du bord et panser les blessures de son protégé, dont le corps croulait sous l’effet des années passées à combattre.\r\nMalgré le triomphe de Reinhardt face aux Dragons, Brigitte finit par comprendre que son rôle d’ingénieure n’était pas suffisant. Si elle souhaitait continuer son aventure, elle devait devenir une guerrière accomplie. Reinhardt lui enseigna l’art du combat, et Brigitte conçut sa propre armure. Le rappel d’Overwatch les poussa à quitter les ruines d’Eichenwalde pour rejoindre les rues de Paris, où Brigitte combattit aux côtés de Reinhardt pour le protéger, ainsi que de nombreux innocents, des assauts du Secteur zéro. Peu importe le danger, le chevalier et son écuyère continuent de lutter pour un avenir meilleur, une bataille après l’autre.'),
(8, 'Cassidy', 'Dégâts', '275 HP', 'Armé de son fidèle Pacificateur, le hors-la-loi Cole Cassidy administre la justice d’une façon toute personnelle.', 'icon-cassidy.jpg', 'gi-cassidy.jpg', 'Roulade :', 'Vous effectuez une roulade dans la direction que vous visez, ce qui réduit les dégâts que vous subissez et recharge votre arme.', 'Grenade magnétique :', 'Vous lancez une grenade autoguidée qui s’accroche aux adversaires, les ralentit et les empêche d’utiliser des capacités de déplacement.', 'Implacable :', 'Faites face à vos ennemis. Appuyez sur A pour les verrouiller, puis sur A ou CAPACITÉ 3 pour tirer.', 'Les origines :\r\n\r\nMembre fondateur du célèbre gang Deadlock, Cassidy a finalement été forcé de rejoindre Blackwatch, la division des opérations secrètes d’Overwatch. Il en est ainsi venu à croire qu’il pourrait faire amende honorable en combattant l’injustice de par le monde. Mais après la chute d’Overwatch, Cassidy est entré dans la clandestinité. Ce n’est que plusieurs années plus tard qu’il a refait surface en tant que pistolero mercenaire, ne se battant que pour les causes qu’il estime justes.\r\n\r\nBlackwatch :\r\n\r\nCassidy était déjà célèbre en tant que membre du fameux gang Deadlock Rebels, quand lui et ses associés furent pris en flagrant délit à la suite d’une opération d’infiltration montée par Overwatch. Vu son adresse et son ingéniosité, on lui laissa le choix entre moisir dans une prison de haute sécurité et rallier Blackwatch, la division des opérations secrètes d’Overwatch. Il choisit la seconde option. Bien qu’initialement très cynique, il finit par se convaincre qu’il pourrait faire amende honorable en réparant les injustices aux quatre coins du monde. Cassidy appréciait la flexibilité inhérente au caractère clandestin de Blackwatch, qui ne s’embarrassait pas de bureaucratie et de paperasse. Mais quand l’influence d’Overwatch se mit à décliner, des éléments peu scrupuleux de Blackwatch tentèrent de renverser complètement l’organisation pour la mettre à leur service.Après la destruction du QG suisse d’Overwatch, Cassidy refusa de prendre part à ces luttes intestines et disparut de la circulation.\r\n\r\nPost-Overwatch :\r\n\r\nIl refit surface plusieurs années plus tard en tant que pistolero mercenaire, ne se battant que pour les causes qu’il estimait justes. Mais les vieux hors-la-loi attirent toujours les ennuis, et Cassidy a une longue liste d’ennemis à son actif. Il affronta la Griffe à bord d’un hypertrain au Texas et déjoua un braquage organisé par ses anciens alliés des Deadlock Rebels au Nouveau-Mexique. Au cours de cette dernière opération, il libéra Écho, le robot auquel feu son amie le Dr Mina Liao avait consacré sa vie. Rappelé au sein d’Overwatch, Cassidy ne se précipita pas, mais un accrochage plein de nostalgie avec Ana Amari le força à réfléchir à son avenir. Face aux menaces grandissantes pour la sécurité mondiale, une nouvelle équipe offrait des possibilités intéressantes : le pistolero partit donc en mission internationale de recrutement, à la recherche de héros forgés par divers évènements. Cassidy ramène toute la puissance de ce sang neuf pour renforcer la présence d’Overwatch de par le monde.');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `pseudonyme` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `courriel` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `main` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudonyme`, `motdepasse`, `courriel`, `prenom`, `nom`, `rank`, `main`, `avatar`) VALUES
(1, 'raphael', '$2y$10$rnKAgXyjvNKubedg2aSO/.y71b9gDfjrY71L4nz/AnOCT9emhxQyC', 'raphael@gmail.com', 'Raphaël', 'Lavoie', '', '', 'raphael.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clic`
--
ALTER TABLE `clic`
  ADD PRIMARY KEY (`id_clic`);

--
-- Index pour la table `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id_heros`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clic`
--
ALTER TABLE `clic`
  MODIFY `id_clic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `heros`
--
ALTER TABLE `heros`
  MODIFY `id_heros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
