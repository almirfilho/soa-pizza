-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2012 at 12:38 PM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soa_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `appear` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `controller` varchar(25) NOT NULL,
  `controller_label` varchar(50) DEFAULT NULL,
  `action` varchar(25) NOT NULL,
  `action_label` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `appear` (`appear`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=32 ;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` VALUES(1, NULL, 1, 'Users', 'Usu&aacute;rios', 'index', 'Todos');
INSERT INTO `areas` VALUES(2, NULL, 0, 'Users', 'Usu&aacute;rios', 'add', 'Criar Novo');
INSERT INTO `areas` VALUES(3, NULL, 0, 'Users', 'Usu&aacute;rios', 'edit', 'Editar');
INSERT INTO `areas` VALUES(4, NULL, 0, 'Users', 'Usu&aacute;rios', 'delete', 'Excluir');
INSERT INTO `areas` VALUES(5, 1, 1, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'index', 'Todos');
INSERT INTO `areas` VALUES(6, NULL, 0, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'add', 'Criar Novo');
INSERT INTO `areas` VALUES(7, NULL, 0, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'edit', 'Editar');
INSERT INTO `areas` VALUES(8, NULL, 0, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'delete', 'Excluir');
INSERT INTO `areas` VALUES(9, NULL, 0, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'view', 'Visualizar');
INSERT INTO `areas` VALUES(10, NULL, 0, 'Users', 'Usu&aacute;rios', 'view', 'Visualizar');
INSERT INTO `areas` VALUES(11, NULL, 1, 'Flavors', 'Sabores', 'index', 'Todos');
INSERT INTO `areas` VALUES(12, NULL, 0, 'Flavors', 'Sabores', 'add', 'Criar Novo');
INSERT INTO `areas` VALUES(13, NULL, 0, 'Flavors', 'Sabores', 'edit', 'Editar');
INSERT INTO `areas` VALUES(14, NULL, 0, 'Flavors', 'Sabores', 'delete', 'Excluir');
INSERT INTO `areas` VALUES(15, 11, 1, 'Borders', 'Bordas', 'index', 'Todas');
INSERT INTO `areas` VALUES(16, NULL, 0, 'Borders', 'Bordas', 'add', 'Criar Nova');
INSERT INTO `areas` VALUES(17, NULL, 0, 'Borders', 'Bordas', 'edit', 'Editar');
INSERT INTO `areas` VALUES(18, NULL, 0, 'Borders', 'Bordas', 'delete', 'Excluir');
INSERT INTO `areas` VALUES(19, 11, 1, 'Sizes', 'Tamanhos', 'index', 'Todos');
INSERT INTO `areas` VALUES(20, NULL, 0, 'Sizes', 'Tamanhos', 'add', 'Criar Novo');
INSERT INTO `areas` VALUES(21, NULL, 0, 'Sizes', 'Tamanhos', 'edit', 'Editar');
INSERT INTO `areas` VALUES(22, NULL, 0, 'Sizes', 'Tamanhos', 'delete', 'Excluir');
INSERT INTO `areas` VALUES(23, NULL, 1, 'Orders', 'Pedidos', 'index', 'Em Aberto');
INSERT INTO `areas` VALUES(24, NULL, 0, 'Orders', 'Pedidos', 'all', 'Todos');
INSERT INTO `areas` VALUES(25, NULL, 0, 'Orders', 'Pedidos', 'add', 'Novo Pedido');
INSERT INTO `areas` VALUES(26, NULL, 0, 'Orders', 'Pedidos', 'edit', 'Editar');
INSERT INTO `areas` VALUES(27, NULL, 0, 'Orders', 'Pedidos', 'delete', 'Excluir');
INSERT INTO `areas` VALUES(28, NULL, 0, 'Flavors', 'Sabores', 'view', 'Visualizar');
INSERT INTO `areas` VALUES(29, NULL, 0, 'Borders', 'Bordas', 'view', 'Visualizar');
INSERT INTO `areas` VALUES(30, NULL, 0, 'Sizes', 'Tamanhos', 'view', 'Visualizar');
INSERT INTO `areas` VALUES(31, NULL, 0, 'Orders', 'Pedidos', 'view', 'Visualizar');

-- --------------------------------------------------------

--
-- Table structure for table `areas_profiles`
--

CREATE TABLE `areas_profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(11) unsigned NOT NULL,
  `profile_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `area_profile` (`area_id`,`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `areas_profiles`
--

INSERT INTO `areas_profiles` VALUES(7, 1, 1);
INSERT INTO `areas_profiles` VALUES(34, 1, 2);
INSERT INTO `areas_profiles` VALUES(1, 2, 1);
INSERT INTO `areas_profiles` VALUES(35, 2, 2);
INSERT INTO `areas_profiles` VALUES(2, 3, 1);
INSERT INTO `areas_profiles` VALUES(36, 3, 2);
INSERT INTO `areas_profiles` VALUES(3, 4, 1);
INSERT INTO `areas_profiles` VALUES(37, 4, 2);
INSERT INTO `areas_profiles` VALUES(4, 5, 1);
INSERT INTO `areas_profiles` VALUES(5, 6, 1);
INSERT INTO `areas_profiles` VALUES(8, 7, 1);
INSERT INTO `areas_profiles` VALUES(6, 8, 1);
INSERT INTO `areas_profiles` VALUES(14, 9, 1);
INSERT INTO `areas_profiles` VALUES(13, 10, 1);
INSERT INTO `areas_profiles` VALUES(38, 10, 2);
INSERT INTO `areas_profiles` VALUES(39, 11, 1);
INSERT INTO `areas_profiles` VALUES(40, 12, 1);
INSERT INTO `areas_profiles` VALUES(41, 13, 1);
INSERT INTO `areas_profiles` VALUES(42, 14, 1);
INSERT INTO `areas_profiles` VALUES(43, 15, 1);
INSERT INTO `areas_profiles` VALUES(44, 16, 1);
INSERT INTO `areas_profiles` VALUES(45, 17, 1);
INSERT INTO `areas_profiles` VALUES(46, 18, 1);
INSERT INTO `areas_profiles` VALUES(47, 19, 1);
INSERT INTO `areas_profiles` VALUES(48, 20, 1);
INSERT INTO `areas_profiles` VALUES(49, 21, 1);
INSERT INTO `areas_profiles` VALUES(50, 22, 1);
INSERT INTO `areas_profiles` VALUES(51, 23, 1);
INSERT INTO `areas_profiles` VALUES(52, 24, 1);
INSERT INTO `areas_profiles` VALUES(53, 25, 1);
INSERT INTO `areas_profiles` VALUES(54, 26, 1);
INSERT INTO `areas_profiles` VALUES(55, 27, 1);
INSERT INTO `areas_profiles` VALUES(56, 28, 1);
INSERT INTO `areas_profiles` VALUES(57, 29, 1);
INSERT INTO `areas_profiles` VALUES(58, 30, 1);
INSERT INTO `areas_profiles` VALUES(59, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `borders`
--

CREATE TABLE `borders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `price` float unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `borders`
--

INSERT INTO `borders` VALUES(1, 'Catupiry', 4, '2012-06-25 21:35:56', '2012-06-25 21:37:12');
INSERT INTO `borders` VALUES(2, 'Normal', 0, '2012-06-26 00:16:49', '2012-06-26 00:16:49');
INSERT INTO `borders` VALUES(3, 'Cheddar', 5, '2012-06-26 00:17:04', '2012-06-26 00:17:04');
INSERT INTO `borders` VALUES(4, 'Chocolate', 4, '2012-06-26 00:17:19', '2012-06-26 00:17:19');
INSERT INTO `borders` VALUES(5, 'Doce de Leite', 4, '2012-06-26 00:17:29', '2012-06-26 00:17:29');

-- --------------------------------------------------------

--
-- Table structure for table `flavors`
--

CREATE TABLE `flavors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `ingredients` varchar(1024) NOT NULL,
  `price` float unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `flavors`
--

INSERT INTO `flavors` VALUES(2, 'Mussarela', 'Molho de tomate, queijo mussarela e orÃ©gano', 16, '2012-06-25 21:38:24', '2012-06-25 21:47:13');
INSERT INTO `flavors` VALUES(3, 'Portuguesa', 'Molho de tomate, queijo mussarela, ovo, tomate, cebola, pimentÃ£o, azeitona, ervilha, milho e orÃ©gano', 21, '2012-06-25 21:44:51', '2012-06-25 21:44:51');
INSERT INTO `flavors` VALUES(4, 'Frango', 'Molho de tomate, queijo mussarela e frango', 20, '2012-06-25 21:45:44', '2012-06-25 21:45:44');
INSERT INTO `flavors` VALUES(5, 'Frango Catupiry', 'Molho de tomate, queijo mussarela, frango e catupiry', 26, '2012-06-25 21:46:51', '2012-06-25 21:46:51');
INSERT INTO `flavors` VALUES(6, 'Calabresa', 'Molho de tomate, queijo mussarela, calabresa e orÃ©gano', 20, '2012-06-26 01:06:40', '2012-06-26 01:06:40');
INSERT INTO `flavors` VALUES(7, 'Novo Sbaer', 'dlkasndlasndklasnkldaslk dkas dklas kld asd', 20, '2012-06-26 21:00:58', '2012-06-26 21:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_name` varchar(128) NOT NULL,
  `delivery_address` varchar(1024) NOT NULL,
  `delivery_phone` varchar(32) DEFAULT NULL,
  `items` int(11) NOT NULL DEFAULT '0',
  `total_price` float NOT NULL,
  `status` enum('O','C','F') NOT NULL DEFAULT 'O',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` VALUES(1, 'Almir', 'Rua tal', '(98) 9898-9898', 0, 1313, 'O', '2012-06-26 20:07:21', '2012-06-26 20:07:21');
INSERT INTO `orders` VALUES(2, 'Almir', 'Rua tal', '(98) 9898-9898', 2, 62, 'O', '2012-06-26 20:21:17', '2012-06-26 20:21:17');
INSERT INTO `orders` VALUES(3, 'Almir', 'Rua tal', '(98) 9898-9898', 2, 62, 'O', '2012-06-26 20:24:18', '2012-06-26 20:24:18');
INSERT INTO `orders` VALUES(4, 'Almir', 'Rua tal', '(98) 9898-9898', 2, 62, 'O', '2012-06-26 20:28:56', '2012-06-26 20:28:56');
INSERT INTO `orders` VALUES(17, 'dasdasdas', 'dasdasdas', 'dasdasdas', 1, 0, 'O', '2012-06-26 21:50:25', '2012-06-26 21:50:25');
INSERT INTO `orders` VALUES(18, 'dasdasdas', 'dasdasdas', 'dasdasdas', 1, 0, 'O', '2012-06-26 21:51:11', '2012-06-26 21:51:11');
INSERT INTO `orders` VALUES(23, 'dadasdasdadas', 'dadasdasdadas', 'dadasdasdadas', 2, 0, 'O', '2012-06-26 22:12:10', '2012-06-26 22:12:10');
INSERT INTO `orders` VALUES(24, 'dadasdasdadas', 'dadasdasdadas', 'dadasdasdadas', 2, 0, 'O', '2012-06-26 22:12:30', '2012-06-26 22:12:30');
INSERT INTO `orders` VALUES(28, 'caralho', 'dasda', '(23) 2131-2312', 2, 0, 'O', '2012-06-26 22:17:25', '2012-06-26 22:17:25');
INSERT INTO `orders` VALUES(29, 'uuuuuu', 'dsadas', '(12) 3123-1231', 2, 62, 'O', '2012-06-26 22:19:01', '2012-06-26 22:19:01');
INSERT INTO `orders` VALUES(30, 'Almir', '312312', '(31) 2313-2312', 2, 49.8, 'C', '2012-06-26 22:22:09', '2012-06-27 13:28:11');
INSERT INTO `orders` VALUES(31, 'Almir 2', 'dasdsada', '(31) 2312-3123', 1, 36, 'O', '2012-06-26 22:22:34', '2012-06-26 22:22:34');
INSERT INTO `orders` VALUES(32, 'SOA', 'Hduashasdudsa', '(98) 7897-8798', 2, 50.4, 'O', '2012-06-28 09:43:31', '2012-06-28 09:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `flavor_id` int(10) unsigned NOT NULL,
  `size_id` int(10) unsigned NOT NULL,
  `border_id` int(10) unsigned NOT NULL,
  `price` float unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` VALUES(1, 1, 2, 3, 1, 0, '2012-06-26 20:07:21', '2012-06-26 20:07:21');
INSERT INTO `pizzas` VALUES(2, 1, 5, 1, 2, 0, '2012-06-26 20:07:21', '2012-06-26 20:07:21');
INSERT INTO `pizzas` VALUES(3, 2, 2, 3, 1, 36, '2012-06-26 20:21:17', '2012-06-26 20:21:17');
INSERT INTO `pizzas` VALUES(4, 2, 5, 1, 2, 26, '2012-06-26 20:21:17', '2012-06-26 20:21:17');
INSERT INTO `pizzas` VALUES(5, 3, 2, 3, 1, 36, '2012-06-26 20:24:18', '2012-06-26 20:24:18');
INSERT INTO `pizzas` VALUES(6, 3, 5, 1, 2, 26, '2012-06-26 20:24:18', '2012-06-26 20:24:18');
INSERT INTO `pizzas` VALUES(7, 4, 2, 3, 1, 36, '2012-06-26 20:28:56', '2012-06-26 20:28:56');
INSERT INTO `pizzas` VALUES(8, 4, 5, 1, 2, 26, '2012-06-26 20:28:56', '2012-06-26 20:28:56');
INSERT INTO `pizzas` VALUES(9, 17, 1, 1, 1, 0, '2012-06-26 21:50:25', '2012-06-26 21:50:25');
INSERT INTO `pizzas` VALUES(10, 18, 1, 1, 1, 0, '2012-06-26 21:51:11', '2012-06-26 21:51:11');
INSERT INTO `pizzas` VALUES(11, 23, 1, 1, 1, 0, '2012-06-26 22:12:10', '2012-06-26 22:12:10');
INSERT INTO `pizzas` VALUES(12, 23, 1, 1, 1, 0, '2012-06-26 22:12:10', '2012-06-26 22:12:10');
INSERT INTO `pizzas` VALUES(13, 24, 1, 1, 1, 0, '2012-06-26 22:12:30', '2012-06-26 22:12:30');
INSERT INTO `pizzas` VALUES(14, 24, 1, 1, 1, 0, '2012-06-26 22:12:30', '2012-06-26 22:12:30');
INSERT INTO `pizzas` VALUES(15, 28, 6, 1, 2, 0, '2012-06-26 22:17:25', '2012-06-26 22:17:25');
INSERT INTO `pizzas` VALUES(16, 28, 3, 4, 2, 0, '2012-06-26 22:17:25', '2012-06-26 22:17:25');
INSERT INTO `pizzas` VALUES(17, 29, 6, 2, 2, 12, '2012-06-26 22:19:01', '2012-06-26 22:19:01');
INSERT INTO `pizzas` VALUES(18, 29, 6, 4, 2, 50, '2012-06-26 22:19:01', '2012-06-26 22:19:01');
INSERT INTO `pizzas` VALUES(19, 30, 6, 2, 2, 12, '2012-06-26 22:22:09', '2012-06-26 22:22:09');
INSERT INTO `pizzas` VALUES(20, 30, 3, 3, 2, 37.8, '2012-06-26 22:22:09', '2012-06-26 22:22:09');
INSERT INTO `pizzas` VALUES(21, 31, 6, 3, 2, 36, '2012-06-26 22:22:34', '2012-06-26 22:22:34');
INSERT INTO `pizzas` VALUES(22, 32, 2, 3, 4, 36, '2012-06-28 09:43:31', '2012-06-28 09:43:31');
INSERT INTO `pizzas` VALUES(23, 32, 4, 2, 1, 14.4, '2012-06-28 09:43:31', '2012-06-28 09:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` VALUES(1, 'Admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `profiles` VALUES(2, 'Perfil Teste!', '2012-03-25 00:21:45', '2012-04-04 01:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `factor` float unsigned NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` VALUES(1, 'MÃ©dia', 1, '2012-06-25 21:15:43', '2012-06-25 21:17:15');
INSERT INTO `sizes` VALUES(2, 'Pequena', 0.6, '2012-06-25 21:17:03', '2012-06-25 21:17:03');
INSERT INTO `sizes` VALUES(3, 'Grande', 1.8, '2012-06-25 21:17:43', '2012-06-25 21:18:12');
INSERT INTO `sizes` VALUES(4, 'Gigante', 2.5, '2012-06-25 21:17:59', '2012-06-25 21:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) unsigned NOT NULL,
  `password` char(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `pass_switched` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 1, 'a78f76a37a7f699f39b324ba58b2aad5', 'Administrador', 'admin', '2012-06-28 09:36:43', 1, '0000-00-00 00:00:00', '2012-06-28 09:36:43');
INSERT INTO `users` VALUES(5, 2, '9bc5f2b8fb63d9ec807dc1d6e35ebf6e', 'Teste', 'teste@teste.com', '2012-04-02 22:41:30', 1, '2012-03-23 15:49:04', '2012-04-02 22:41:30');
INSERT INTO `users` VALUES(11, 2, 'a78f76a37a7f699f39b324ba58b2aad5', 'dasdsad', 'sistina@efg.com', NULL, 0, '2012-04-04 01:10:19', '2012-04-04 01:10:19');
