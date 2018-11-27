-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Set-2018 às 03:17
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `casapescador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `celular` float NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `cidade`, `celular`, `email`) VALUES
(1, 'Joao', 'Assis', 991818000, 'joaofornecedor@gmail.com'),
(2, 'Luiz', 'Taruma', 996857000, 'luizfornecedor@gmail.com'),
(3, 'Carlos', 'Pedrinhas', 998143000, 'carlosfornecedor@gmail.com'),
(4, 'Guilherme', 'Assis', 997897000, 'guilhermefornecedor@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_compra`
--

CREATE TABLE `item_compra` (
  `id` int(11) NOT NULL,
  `compra` int(11) NOT NULL,
  `data` date NOT NULL,
  `mercadoria` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  `valor` float NOT NULL,
  `fornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_compra`
--

INSERT INTO `item_compra` (`id`, `compra`, `data`, `mercadoria`, `quantidade`, `valor`, `fornecedor`) VALUES
(1, 5, '2018-10-02', 5, 2, 10, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mercadoria`
--

CREATE TABLE `mercadoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` float NOT NULL,
  `fornecedor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mercadoria`
--

INSERT INTO `mercadoria` (`id`, `descricao`, `quantidade`, `valor`, `fornecedor`) VALUES
(1, 'Vara de bambu', 40, 8, 'Joao'),
(2, 'Molinete', 20, 25, 'Luiz'),
(3, 'Isca artificial', 15, 20, 'Carlos'),
(4, 'Vara com molinete', 10, 150, 'Joao'),
(5, 'Isca artificial', 20, 10, 'Guilherme'),
(6, 'Anzol', 100, 0.5, 'Joao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pwd` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_compra`
--
ALTER TABLE `item_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemcompra_compra` (`compra`),
  ADD KEY `itemcompra_mercadoria` (`mercadoria`),
  ADD KEY `itemcompra_fornecedor` (`fornecedor`);

--
-- Indexes for table `mercadoria`
--
ALTER TABLE `mercadoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_compra`
--
ALTER TABLE `item_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mercadoria`
--
ALTER TABLE `mercadoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_mercadoria` FOREIGN KEY (`id`) REFERENCES `mercadoria` (`id`);

--
-- Limitadores para a tabela `item_compra`
--
ALTER TABLE `item_compra`
  ADD CONSTRAINT `itemcompra_fornecedor` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`id`),
  ADD CONSTRAINT `itemcompra_mercadoria` FOREIGN KEY (`mercadoria`) REFERENCES `mercadoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
