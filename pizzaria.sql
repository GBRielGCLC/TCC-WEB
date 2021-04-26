-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26-Abr-2021 às 20:09
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
('coca 500ml', 2.5, 'on', 7, 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text CHARACTER SET utf8 NOT NULL,
  `telefone` char(16) NOT NULL,
  `endereco` text CHARACTER SET utf8 NOT NULL,
  `idTaxa` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `telefone`, `endereco`, `idTaxa`) VALUES
(9, 'Lucas', '79996347743', ' rua SP 48', 1),
(11, 'Osvaldo henrique de jesus', '999088080', ' rua SP', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

DROP TABLE IF EXISTS `imagem`;
CREATE TABLE IF NOT EXISTS `imagem` (
  `imagens` longblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`imagens`) VALUES
(''),
(''),
(0x6d),
(0x6d),
(0x47);

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
  `status` enum('aguardando','recusado','aceito','despachado') NOT NULL,
  `formaPagamento` enum('dinheiro','cartao') NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `idCliente` (`idCliente`),
  KEY `idTaxa` (`idTaxa`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idCliente`, `idTaxa`, `valorTotal`, `dataPedido`, `local`, `status`, `formaPagamento`) VALUES
(16, 9, 1, 10, '2021-04-14', 'on-line', 'recusado', 'dinheiro'),
(17, 6, 1, 80, '2021-04-12', 'on-line', 'aguardando', 'dinheiro'),
(18, 10, 1, 15, '2021-04-16', 'on-line', 'aguardando', 'dinheiro'),
(19, 11, 1, 30, '2021-04-16', 'on-line', 'aguardando', 'dinheiro'),
(20, 11, 1, 40, '2021-04-16', 'on-line', 'aguardando', 'dinheiro'),
(21, 9, 1, 45, '2021-03-30', 'on-line', 'aguardando', 'dinheiro'),
(22, 9, 1, 45, '2021-03-30', 'on-line', 'aguardando', 'dinheiro'),
(23, 9, 1, 45, '2021-03-30', 'on-line', 'aguardando', 'dinheiro'),
(24, 9, 1, 45, '2021-03-30', 'on-line', 'aguardando', 'dinheiro'),
(25, 9, 1, 45, '2021-03-30', 'on-line', 'aguardando', 'dinheiro'),
(26, 9, 1, 45, '2021-03-30', 'on-line', 'aguardando', 'dinheiro'),
(27, 9, 1, 45, '2021-03-30', 'on-line', 'aguardando', 'dinheiro'),
(28, 9, 1, 45, '2021-03-30', 'on-line', 'aguardando', 'dinheiro'),
(29, 9, 1, 45, '2021-03-30', 'on-line', 'aguardando', 'dinheiro'),
(30, 9, 1, 35, '2021-04-16', 'on-line', 'aguardando', 'dinheiro'),
(31, 9, 1, 35, '2021-03-17', 'on-line', 'despachado', 'dinheiro'),
(32, 9, 1, 30, '2021-03-17', 'on-line', 'aguardando', 'dinheiro'),
(33, 9, 1, 35, '2021-04-17', 'on-line', 'despachado', 'dinheiro');

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

--
-- Extraindo dados da tabela `pedido-bebida`
--

INSERT INTO `pedido-bebida` (`idBebida`, `idPedido`, `qtde`) VALUES
(9, 20, 9),
(9, 20, 9),
(9, 21, 9),
(9, 22, 9),
(9, 23, 9),
(9, 24, 9),
(9, 25, 9),
(9, 26, 9),
(9, 27, 9),
(9, 28, 9),
(9, 29, 9),
(9, 30, 1),
(9, 31, 1),
(9, 32, 0),
(9, 33, 1);

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
  `nome` varchar(30) CHARACTER SET utf8 NOT NULL,
  `e-mail` varchar(50) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(16) CHARACTER SET utf8 NOT NULL,
  `adm` tinyint(1) NOT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nome`, `e-mail`, `senha`, `adm`) VALUES
(1, 'Lucas ', 'lucas1.stoly@gmail.com', '123', 1),
(4, 'Gabriel', 'gabriel.gclc@gmail.com', '9603', 1),
(40, 'Pedro', 'pedro@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabor`
--

DROP TABLE IF EXISTS `sabor`;
CREATE TABLE IF NOT EXISTS `sabor` (
  `idSabor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) CHARACTER SET utf8 NOT NULL,
  `descricao` text CHARACTER SET utf8 NOT NULL,
  `cardapio` enum('on','off') NOT NULL,
  `precoAdd` double DEFAULT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`idSabor`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sabor`
--

INSERT INTO `sabor` (`idSabor`, `nome`, `descricao`, `cardapio`, `precoAdd`, `status`) VALUES
(21, 'Marguerita', 'Mussarela, parmesÃ£o, manjericÃ£o e orÃ©gano.', 'on', 0, 'on'),
(20, 'Calabresa Cheddar', 'Mussarela, Calabresa, Cheddar, Azeitona e OrÃ©gano', 'on', 0, 'on'),
(19, 'Baiana', 'Mussarela, Calabresa tirturada, Pimenta calabresa', 'on', 0, 'on'),
(31, 'Calabresa 2', 'Mussarela, Calabresa, Tomate, Azeitona, Cebola e OrÃ©gano', 'on', 0, 'on'),
(30, 'Moda da Casa', 'Mussarela, Calabresa, Tomate, Azeitona, Cebola e OrÃ©gano', 'on', 0, 'on'),
(25, 'Mussarela', 'Mussarela, Azeitona e Tomate', 'on', 0, 'on'),
(32, 'portuguesa', 'Mussarela', 'on', 0, 'on'),
(36, 'Frango Catupiry', 'Mussarela, Frango desfiado, Catupiry, Azeitona e OrÃ©gano', 'on', 0, 'on'),
(34, 'Carne De Sol 1', 'Mussarela, Carne De Sol, Cebola, Azeitona e OrÃ©gano', 'on', 0, 'on'),
(35, 'Carne De Sol 2', 'Mussarela, Carne De Sol, Catupiry, Azeitona e OrÃ©gano', 'on', 0, 'on'),
(37, '2 Queijos', 'mussarela e parmesÃ£o', 'on', 0, 'on'),
(38, 'Atum', 'Mussarela, atum, azeitona e orÃ©gano', 'on', 0, 'on'),
(39, 'Lombinho', 'Mussarela, lombinho canadense, azeitona e orÃ©gano', 'on', 0, 'on'),
(40, 'Chocolate', 'Mussarela e chocolate', 'on', 0, 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabor_pizza`
--

DROP TABLE IF EXISTS `sabor_pizza`;
CREATE TABLE IF NOT EXISTS `sabor_pizza` (
  `idSabor` int(11) NOT NULL,
  `idPizza` int(11) NOT NULL,
  KEY `idPizza` (`idPizza`),
  KEY `idSabor` (`idSabor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sabor_pizza`
--

INSERT INTO `sabor_pizza` (`idSabor`, `idPizza`) VALUES
(37, 109),
(37, 115),
(37, 111),
(37, 112),
(38, 109),
(38, 115),
(38, 111),
(38, 112),
(39, 109),
(39, 111),
(39, 112),
(40, 109),
(40, 115),
(40, 111),
(40, 112);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

DROP TABLE IF EXISTS `tamanho`;
CREATE TABLE IF NOT EXISTS `tamanho` (
  `idPizza` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) CHARACTER SET utf8 NOT NULL,
  `preco` double NOT NULL,
  `cardapio` enum('on','off') NOT NULL,
  `qtdeSabor` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL,
  PRIMARY KEY (`idPizza`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`idPizza`, `nome`, `preco`, `cardapio`, `qtdeSabor`, `status`) VALUES
(109, 'Pequena', 20, 'on', 2, 'on'),
(110, 'MÃ©dia', 27, 'on', 2, 'off'),
(111, 'Grande', 35, 'on', 3, 'on'),
(112, 'FamÃ­lia', 40, 'on', 4, 'on'),
(115, 'Grande Tradicional', 30, 'on', 2, 'on'),
(122, 'Brotinho', 16, 'on', 1, 'off');

-- --------------------------------------------------------

--
-- Estrutura da tabela `taxa_entrega`
--

DROP TABLE IF EXISTS `taxa_entrega`;
CREATE TABLE IF NOT EXISTS `taxa_entrega` (
  `idTaxa` int(11) NOT NULL AUTO_INCREMENT,
  `bairro` varchar(60) CHARACTER SET utf8 NOT NULL,
  `taxa` double NOT NULL,
  PRIMARY KEY (`idTaxa`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `taxa_entrega`
--

INSERT INTO `taxa_entrega` (`idTaxa`, `bairro`, `taxa`) VALUES
(1, 'São Carlos', 3),
(2, 'Veneza', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
