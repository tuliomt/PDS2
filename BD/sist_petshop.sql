-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Out-2021 às 20:18
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sist_petshop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `codigo_ani` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `raca` varchar(250) DEFAULT NULL,
  `idade` varchar(250) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `preco` varchar(50) DEFAULT NULL,
  `status` binary(1) DEFAULT '0',
  `codigo_cli` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`codigo_ani`, `nome`, `raca`, `idade`, `categoria`, `preco`, `status`, `codigo_cli`) VALUES
(7, 'Mel', 'persa', '5', 'gato', 'R$ 1332,11', 0x31, 14),
(11, 'mart', 'pit bul', '10', 'cÃ£o', 'R$ 2500,00', 0x31, 12),
(12, 'Stive', 'CanÃ¡rio.', '5', 'pÃ¡ssaro ', 'R$ 500,00', 0x31, 12),
(13, 'Booby', 'Sula Nebouxii', '5', 'pÃ¡ssaro', 'R$ 1612,64', 0x31, 15),
(14, 'Puppy', 'Dogue alemÃ£o', '3', 'cÃ£o', 'R$ 5000,00', 0x31, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bet`
--

CREATE TABLE `bet` (
  `codigo_bet` int(11) NOT NULL,
  `fk_func` int(11) NOT NULL,
  `fk_ani` int(11) NOT NULL,
  `horario` varchar(250) DEFAULT NULL,
  `data_prevista` varchar(250) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bet`
--

INSERT INTO `bet` (`codigo_bet`, `fk_func`, `fk_ani`, `horario`, `data_prevista`, `descricao`, `status`) VALUES
(35, 18, 12, '13:15', '2021-09-17', 'banho e cortar as unhas.', '1'),
(37, 7, 7, '09:00', '2021-09-28', 'banho normal e tosa higiÃªnica ', '1'),
(38, 25, 14, '13:00', '2021-09-30', 'somente banho', '1'),
(39, 16, 14, '11:20', '2021-09-24', 'banho e tosa normal', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codigo_cli` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `ende` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `cpf` varchar(250) DEFAULT NULL,
  `tel_residencial` varchar(50) DEFAULT NULL,
  `tel_celular` varchar(50) DEFAULT NULL,
  `status` binary(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codigo_cli`, `nome`, `ende`, `email`, `cpf`, `tel_residencial`, `tel_celular`, `status`) VALUES
(12, 'Maria Melo da ConceiÃ§Ã£o ', '0432 Leonor Parkways Suite 304 - Indianapolis, DE / 22703', 'mariaddc@gmail.com', '87694747617', '38421225', '999255447', 0x31),
(14, 'AmÃ©lia Santos Coelho', 'rua h n 6 bairro do carmo', 'amelia@ujf', '13548555690', '38421247', '999877885', 0x31),
(15, 'Manoel Leandro Cavalcanti', 'Rua K 256 Novo Oriente MaracanaÃº CE', 'mmanoelleandrocavalcanti@zfenksysteme.com', '15996355874', '38421478', '999855874', 0x31),
(16, 'JosÃ© Vinicius Thomas Ribeiro', 'Rua Eletricista JosÃ© Monteiro da Silva 823 Padre AntÃ´nio Lima', 'jose@edu', '82176000584', '26020714', '993704470', 0x31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `codigo_con` int(11) NOT NULL,
  `fk_vet` int(11) NOT NULL,
  `fk_ani` int(11) NOT NULL,
  `horario` varchar(250) DEFAULT NULL,
  `data_prevista` varchar(250) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`codigo_con`, `fk_vet`, `fk_ani`, `horario`, `data_prevista`, `descricao`, `status`) VALUES
(24, 14, 11, '07:30', '2021-09-11', 'AvaliaÃ§Ã£o da saÃºde do animal semestral', '1'),
(35, 18, 12, '13:15', '2021-09-17', 'consulta com a antonella', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `codigo_func` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(250) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `status` binary(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`codigo_func`, `nome`, `cpf`, `telefone`, `email`, `senha`, `status`) VALUES
(7, 'Tulio Araujo', '13235366962', '988122110', 'tulio@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(16, 'Rafael Araujo', '18778777778', '1999999999', 'rafael@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(21, 'marcelo da cunha', '12374125896', '9994554585', 'marceloa@edu', '202cb962ac59075b964b07152d234b70', 0x31),
(18, 'marcelo', '14774588545', '998554547', 'marcelo@edu', '202cb962ac59075b964b07152d234b70', 0x31),
(19, 'paulo alves', '12378999858', '999275482', 'paulo@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(20, 'paulo cardoso da silva', '18332111252', '999877885', 'ph@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(22, 'alvaro silva', '6468468168', '861681681', 'alv@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(23, 'daniel de melo', '125965965625', '6656262626262', 'dani@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(24, 'tiago', '351631531635135153', '168161865168', 'ti@edu', '81dc9bdb52d04dc20036dbd8313ed055', 0x31),
(25, 'fabio melo', '5464161561', '65165165165', 'gabiog@eud', '202cb962ac59075b964b07152d234b70', 0x31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigo_prod` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descr` varchar(250) DEFAULT NULL,
  `preco` varchar(250) DEFAULT NULL,
  `status` binary(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo_prod`, `nome`, `descr`, `preco`, `status`) VALUES
(16, 'Caixa de Transporte FuracÃ£o Pet Luxo Branco e Rosa', 'A Caixa de Transporte FuracÃ£o Pet Luxo Branco e Rosa foi elaborada pensando no conforto de seu pet e para facilitar a vida de seu dono.', 'R$152,91', 0x31),
(17, 'Banheira Tudo Pet para Calopsita - Tam. Ãšnico', 'O banho faz parte da natureza diÃ¡ria da ave, por este motivo permita que a banheira esteja sempre a disposiÃ§Ã£o com Ã¡gua limpa e mais importante apÃ³s o banho retire do local evitando que o pet beba a Ã¡gua.', 'R$133,11', 0x31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codigo_vendas` int(11) NOT NULL,
  `fk_func` int(11) NOT NULL,
  `fk_cli` int(11) NOT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codigo_vendas`, `fk_func`, `fk_cli`, `status`) VALUES
(10, 16, 12, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vet`
--

CREATE TABLE `vet` (
  `codigo_vet` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(250) NOT NULL,
  `crmv` varchar(250) NOT NULL,
  `status` binary(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vet`
--

INSERT INTO `vet` (`codigo_vet`, `nome`, `cpf`, `crmv`, `status`) VALUES
(1, 'Marcos Pereira', '13235885245', '4554', 0x31),
(14, 'Thereza Matos', '15995175395', '2552', 0x31),
(17, 'Mirella Emilly Costa', '44027692802', '4778', 0x31),
(18, 'Antonella Teresinha Nair Pereira', '16923444985', '6532', 0x31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`codigo_ani`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `codigo_cli` (`codigo_cli`);

--
-- Indexes for table `bet`
--
ALTER TABLE `bet`
  ADD PRIMARY KEY (`fk_func`,`fk_ani`),
  ADD UNIQUE KEY `codigo_bet` (`codigo_bet`),
  ADD KEY `fk_func` (`fk_func`),
  ADD KEY `fk_ani` (`fk_ani`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo_cli`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`fk_vet`,`fk_ani`),
  ADD UNIQUE KEY `codigo_con` (`codigo_con`),
  ADD KEY `fk_vet` (`fk_vet`),
  ADD KEY `fk_ani` (`fk_ani`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`codigo_func`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo_prod`);

--
-- Indexes for table `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`fk_func`,`fk_cli`),
  ADD UNIQUE KEY `codigo_vendas` (`codigo_vendas`),
  ADD KEY `fk_func` (`fk_func`),
  ADD KEY `fk_ani` (`fk_cli`);

--
-- Indexes for table `vet`
--
ALTER TABLE `vet`
  ADD PRIMARY KEY (`codigo_vet`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `codigo_ani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bet`
--
ALTER TABLE `bet`
  MODIFY `codigo_bet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `codigo_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `codigo_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `codigo_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codigo_vendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `vet`
--
ALTER TABLE `vet`
  MODIFY `codigo_vet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
