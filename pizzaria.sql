-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 22-Mar-2021 às 23:42
-- Versão do servidor: 10.3.13-MariaDB
-- versão do PHP: 7.3.23

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

CREATE TABLE `bebida` (
  `nome` text CHARACTER SET utf8mb4 NOT NULL,
  `preco` double NOT NULL,
  `cardapio` enum('on','off') NOT NULL,
  `idBebida` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`nome`, `preco`, `cardapio`, `idBebida`, `status`) VALUES
('coca 2L', 5, 'off', 2, 'off'),
('Fanta laranja 1L', 5, 'on', 4, 'on'),
('Guaraná Antartica 1L', 5, 'on', 14, 'on'),
('coca 500ml', 5, 'on', 7, 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` text NOT NULL,
  `telefone` char(16) NOT NULL,
  `endereco` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idTaxa` int(11) NOT NULL,
  `valorTotal` double NOT NULL,
  `dataPedido` date NOT NULL,
  `local` enum('Mesa','balcao','on-line') NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido-bebida`
--

CREATE TABLE `pedido-bebida` (
  `idBebida` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `qtde` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_pizza`
--

CREATE TABLE `pedido_pizza` (
  `idPedido` int(11) NOT NULL,
  `idPizza` int(11) NOT NULL,
  `idSabor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `e-mail` varchar(50) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `adm` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `sabor` (
  `idSabor` int(11) NOT NULL,
  `nome` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `descricao` text CHARACTER SET utf8 NOT NULL,
  `cardapio` enum('on','off') NOT NULL,
  `disponibilidade` text NOT NULL,
  `precoAdd` double DEFAULT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sabor`
--

INSERT INTO `sabor` (`idSabor`, `nome`, `descricao`, `cardapio`, `disponibilidade`, `precoAdd`, `status`) VALUES
(21, 'Marguerita', 'Mussarela, parmesão, manjericão e orégano.', 'off', ',109,110,115,112,111', 0, 'on'),
(20, 'Calabresa Cheddar', 'Mussarela, Calabresa, Cheddar, Azeitona e Orégano', 'on', ',109,110,115,112,111', 0, 'on'),
(19, 'Baiana', 'Mussarela, Calabresa tirturada, Pimenta calabresa', 'off', ',109', 0, 'on'),
(18, 'Calabresa 2', 'Mussarela, Calabresa, Tomate, Azeitona, Cebola e Orégano', 'off', '109,110,115,111,112', 0, 'on'),
(22, 'Moda da Casa', 'Presunto', 'on', ',109,110,115,112,111', 0, 'on'),
(23, 'aaaaaaa', 'w', 'on', ',109,110,115,112,111', 0, 'off'),
(24, 'Banana', 'Mussarela, Banana, Canela em Pó.', 'on', ',109,115,112,111', 0, 'on'),
(25, 'Mussarela', 'Mussarela, Azeitona e Tomate', 'off', ',109,110,115,111,112', 0, 'on'),
(29, '4 queijos', 'Mussarela, parmesão, manjericão e orégano.', 'on', ',118,109', 1, 'on');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sabor_pizza`
--

CREATE TABLE `sabor_pizza` (
  `idPizza` int(11) NOT NULL,
  `idSabor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `idPizza` int(11) NOT NULL,
  `nome` text CHARACTER SET utf8mb4 NOT NULL,
  `preco` double NOT NULL,
  `cardapio` enum('on','off') NOT NULL,
  `qtdeSabor` int(11) NOT NULL,
  `status` enum('on','off') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`idPizza`, `nome`, `preco`, `cardapio`, `qtdeSabor`, `status`) VALUES
(109, 'Pequena', 20, 'on', 2, 'on'),
(110, 'Média', 27, 'on', 2, 'on'),
(111, 'Grande', 35, 'on', 3, 'on'),
(112, 'Família', 40, 'on', 4, 'on'),
(115, 'Grande Tradicional', 30, 'off', 2, 'on'),
(116, 'ads', 15, 'on', 2, 'off'),
(117, 'aaa', 21.56, 'on', 3, 'off'),
(118, 'Brotinho', 15, 'off', 1, 'on'),
(119, 'Gigante', 60, 'on', 6, 'off');

-- --------------------------------------------------------

--
-- Estrutura da tabela `taxa_entrega`
--

CREATE TABLE `taxa_entrega` (
  `idTaxa` int(11) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `taxa` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`idBebida`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idTaxa` (`idTaxa`);

--
-- Índices para tabela `pedido-bebida`
--
ALTER TABLE `pedido-bebida`
  ADD KEY `idBebida` (`idBebida`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Índices para tabela `pedido_pizza`
--
ALTER TABLE `pedido_pizza`
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idPizza` (`idPizza`),
  ADD KEY `idSabor` (`idSabor`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Índices para tabela `sabor`
--
ALTER TABLE `sabor`
  ADD PRIMARY KEY (`idSabor`);

--
-- Índices para tabela `sabor_pizza`
--
ALTER TABLE `sabor_pizza`
  ADD KEY `idPizza` (`idPizza`),
  ADD KEY `idSabor` (`idSabor`);

--
-- Índices para tabela `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`idPizza`);

--
-- Índices para tabela `taxa_entrega`
--
ALTER TABLE `taxa_entrega`
  ADD PRIMARY KEY (`idTaxa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bebida`
--
ALTER TABLE `bebida`
  MODIFY `idBebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `sabor`
--
ALTER TABLE `sabor`
  MODIFY `idSabor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `idPizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de tabela `taxa_entrega`
--
ALTER TABLE `taxa_entrega`
  MODIFY `idTaxa` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
