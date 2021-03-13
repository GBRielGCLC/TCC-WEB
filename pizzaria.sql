-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Mar-2021 às 11:20
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`nome`, `preco`, `cardapio`, `idBebida`, `status`) VALUES
('coca 1L', 5, 'off', 2, 'off'),
('Fanta laranja 1L', 5, 'on', 4, 'on'),
('GuarnÃ¡ Antartica 1L', 5, 'on', 14, 'on'),
('coca 500ml', 5, 'on', 7, 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `telefone` char(16) NOT NULL,
  `endereco` text NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idTaxa` int(11) NOT NULL,
  `valorTotal` double NOT NULL,
  `dataPedido` date NOT NULL,
  `local` enum('Mesa','balcao','on-line') NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idCliente` (`idCliente`),
  KEY `idTaxa` (`idTaxa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido-bebida`
--

DROP TABLE IF EXISTS `pedido-bebida`;
CREATE TABLE IF NOT EXISTS `pedido-bebida` (
  `idBebida` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  KEY `idBebida` (`idBebida`),
  KEY `idPedido` (`idPedido`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_pizza`
--

DROP TABLE IF EXISTS `pedido_pizza`;
CREATE TABLE IF NOT EXISTS `pedido_pizza` (
  `idPedido` int(11) NOT NULL,
  `idPizza` int(11) NOT NULL,
  `idSabor` int(11) NOT NULL,
  KEY `idPedido` (`idPedido`),
  KEY `idPizza` (`idPizza`),
  KEY `idSabor` (`idSabor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nome`, `e-mail`, `senha`, `adm`) VALUES
(1, 'Lucas Santana', 'lucas1.stoly@gmail.com', '123', 1),
(4, 'Gabriel', 'gabriel.gclc@gmail.com', '9603', 1),
(33, 'Gilvalda', 'Gilvalda@gmail.com', '1234', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sabor`
--

INSERT INTO `sabor` (`idSabor`, `nome`, `descricao`, `cardapio`, `disponibilidade`, `precoAdd`, `status`) VALUES
(21, 'Marguerita', 'Mussarela, parmesÃ£o, manjericÃ£o e orÃ©gano.', 'off', ',109,110,115,112,111', 0, 'on'),
(20, 'Calabresa Cheddar', 'Mussarela, Calabresa, Cheddar, Azeitona e OrÃ©gano', 'on', ',109,110,115,112,111', 0, 'on'),
(19, 'Baiana', 'Mussarela, Calabresa tirturada, Pimenta calabresa', 'off', ',109', 0, 'on'),
(18, 'Calabresa 2', 'Mussarela, Calabresa, Tomate, Azeitona, Cebola e OrÃ©gano', 'off', '109,110,115,111,112', 0, 'on'),
(22, 'Moda da Casa', 'Presunto', 'on', ',109,110,115,112,111', 0, 'on'),
(23, 'aaaaaaa', 'w', 'on', ',109,110,115,112,111', 0, 'off'),
(24, 'Banana', 'Mussarela, Banana, Canela em PÃ³.', 'on', ',109,115,112,111', 0, 'on'),
(25, 'Mussarela', 'Mussarela, Azeitona e Tomate', 'off', ',109,110,115,111,112', 0, 'on'),
(29, '4 queijos', 'Mussarela, parmesÃ£o, manjericÃ£o e orÃ©gano.', 'on', ',118,109', 1, 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabor_pizza`
--

DROP TABLE IF EXISTS `sabor_pizza`;
CREATE TABLE IF NOT EXISTS `sabor_pizza` (
  `idPizza` int(11) NOT NULL,
  `idSabor` int(11) NOT NULL,
  KEY `idPizza` (`idPizza`),
  KEY `idSabor` (`idSabor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`idPizza`, `nome`, `preco`, `cardapio`, `qtdeSabor`, `status`) VALUES
(109, 'Pequena', 20, 'on', 2, 'on'),
(110, 'MÃ©dia', 27, 'on', 2, 'on'),
(111, 'Grande', 35, 'on', 3, 'on'),
(112, 'FamÃ­lia', 40, 'on', 4, 'on'),
(115, 'Grande Tradicional', 30, 'off', 2, 'on'),
(116, 'ads', 15, 'on', 2, 'off'),
(117, 'aaa', 21.56, 'on', 3, 'off'),
(118, 'Brotinho', 15, 'off', 1, 'on'),
(119, 'Gigante', 60, 'on', 6, 'off');

-- --------------------------------------------------------

--
-- Estrutura da tabela `taxa_entrega`
--

DROP TABLE IF EXISTS `taxa_entrega`;
CREATE TABLE IF NOT EXISTS `taxa_entrega` (
  `idTaxa` int(11) NOT NULL AUTO_INCREMENT,
  `bairro` varchar(60) NOT NULL,
  `taxa` double NOT NULL,
  PRIMARY KEY (`idTaxa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
