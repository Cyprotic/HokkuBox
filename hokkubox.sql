-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Jul-2019 às 00:23
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hokkubox`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contador_promo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `client`
--

INSERT INTO `client` (`id_client`, `user`, `password`, `first_name`, `last_name`, `email`, `contador_promo`) VALUES
(1, 'eva', 'daninha', 'Eva', 'Falcao', 'eva@gmail.com', 1),
(2, 'afonso', 'daninho', 'Afonso', '\"Pila\" Figueira', 'afonso@gmail.com', 1),
(3, 'teste', '1233', 'asd', 'dsa', 'asd@gmail.com', 0),
(5, 'evaaaaaaaaaa', 'pila', 'asda', 'dsad', 'asd@asd.com', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id_product`, `name`, `code`, `price`) VALUES
(1, 'Nigiri salmão (4 p)', '001', 2.99),
(2, 'Original Bento', '002', 5.99),
(3, 'Sashimi (6 p)', '003', 1.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
