-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Mar-2021 às 21:47
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `cardapio` enum('on','off') NOT NULL,
  `idBebida` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`idBebida`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`nome`, `preco`, `cardapio`, `idBebida`, `status`) VALUES
('coca 1L', 5, 'on', 2, 'on'),
('Fanta laranja 1L', 5, 'on', 4, 'on'),
('11', 11.75, 'off', 5, 'off'),
('coca 500ml', 5, 'on', 7, 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nome`, `e-mail`, `senha`, `adm`) VALUES
(1, 'Lucas Santana', 'lucas1.stoly@gmail.com', '123', 1),
(4, 'Gabriel Christyan', 'gabriel.gclc@gmail.com', '9603', 1),
(3, 'aa', 'a@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabor`
--

DROP TABLE IF EXISTS `sabor`;
CREATE TABLE IF NOT EXISTS `sabor` (
  `idSabor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `descricao` text NOT NULL,
  `cardapio` enum('on','off') NOT NULL,
  `disponibilidade` text NOT NULL,
  `precoAdd` double DEFAULT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`idSabor`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sabor`
--

INSERT INTO `sabor` (`idSabor`, `nome`, `descricao`, `cardapio`, `disponibilidade`, `precoAdd`, `status`) VALUES
(11, 'Marguerita', 'Mussarela, ParmesÃ£o ,manjericÃ£o e orÃ©gano.', 'on', ',108', 2, 'on'),
(16, 'Calabresa Cheddar', 'Mussarela, Calabresa, Tomate, Azeitona, Cebola e OrÃ©gano', 'on', ',109,110,111,112', 1, 'on'),
(15, 'Calabresa 2', 'Mussarela, Calabresa, Tomate, Azeitona, Cebola e OrÃ©gano', 'on', ',109,110,111,112', 0, 'on'),
(17, 'Frango Catupiry', 'Mussarela, Frango Desfiado, Catupiry, Azeitona, Milho e OrÃ©gano.', 'on', ',109,110,115,111,112', 0, 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

DROP TABLE IF EXISTS `tamanho`;
CREATE TABLE IF NOT EXISTS `tamanho` (
  `idPizza` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `preco` double NOT NULL,
  `cardapio` enum('on','off') NOT NULL,
  `qtdeSabor` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`idPizza`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`idPizza`, `nome`, `preco`, `cardapio`, `qtdeSabor`, `status`) VALUES
(109, 'Pequena', 20, 'on', 2, 'on'),
(110, 'MÃ©dia', 27, 'on', 3, 'on'),
(111, 'Grande', 35, 'on', 3, 'on'),
(112, 'FÃ¡milia', 45, 'on', 4, 'on'),
(115, 'Grande Tradicional', 30, 'on', 2, 'on');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
