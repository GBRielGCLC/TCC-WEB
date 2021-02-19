-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Fev-2021 às 16:27
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

DROP TABLE IF EXISTS `bebida`;
CREATE TABLE IF NOT EXISTS `bebida` (
  `nome` varchar(30) NOT NULL,
  `preco` double NOT NULL,
  `status` enum('on','off') NOT NULL,
  `idBebida` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idBebida`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`nome`, `preco`, `status`, `idBebida`) VALUES
('coca 1L', 5, 'on', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabor`
--

DROP TABLE IF EXISTS `sabor`;
CREATE TABLE IF NOT EXISTS `sabor` (
  `idSabor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `status` enum('on','off') NOT NULL,
  `disponibilidade` varchar(15) NOT NULL,
  `precoAdd` double DEFAULT NULL,
  PRIMARY KEY (`idSabor`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

DROP TABLE IF EXISTS `tamanho`;
CREATE TABLE IF NOT EXISTS `tamanho` (
  `idPizza` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `preco` double NOT NULL,
  `status` enum('on','off') NOT NULL,
  `qtdeSabor` int(11) NOT NULL,
  PRIMARY KEY (`idPizza`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
