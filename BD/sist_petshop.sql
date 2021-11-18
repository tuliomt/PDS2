-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2021 às 13:06
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
  `status` binary(1) DEFAULT '0',
  `codigo_cli` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`codigo_ani`, `nome`, `raca`, `idade`, `categoria`, `status`, `codigo_cli`) VALUES
(7, 'Mel', 'persa', '5', 'gato', 0x31, 14),
(11, 'mart', 'pit bul', '10', 'cÃ£o', 0x31, 12),
(12, 'Stive', 'CanÃ¡rio.', '5', 'pÃ¡ssaro ', 0x31, 12),
(13, 'Booby', 'Sula Nebouxii', '5', 'pÃ¡ssaro', 0x31, 15),
(14, 'Puppy', 'Dogue alemÃ£o', '3', 'cÃ£o', 0x31, 15),
(18, 'Dog', 'Dog', '2', 'Cachorro', 0x31, 12);

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
(38, 25, 14, '13:00', '2021-09-30', 'somente banho', '1');

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
(16, 'JosÃ© Vinicius Thomas Ribeiro', 'Rua Eletricista JosÃ© Monteiro da Silva 823 Padre AntÃ´nio Lima', 'jose@ufu', '82176000584', '26020714', '993704470', 0x31),
(18, 'Bernardo Costa Silva', 'rua 7', 'teste@ufmj', '14774114778', '35477889', '955888778', 0x31),
(19, 'Elaine Isabela Teixeira', 'Rua Doutor Wanilton Finamore n 1020 Bairro\r\nJardim Guanabara Dourados', 'elaineisabelateixeira..elaineisabelateixeira@viamoc.com.br', '14774115965', '38421741', '988544565', 0x31);

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
(35, 18, 12, '13:15', '2021-09-17', 'consulta com a antonella', '1'),
(38, 18, 7, '15:00', '2021-10-18', 'ferida nas costas', '1');

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
(21, 'Marcelo da cunha', '12374125896', '9994554585', 'marceloa@edu', '202cb962ac59075b964b07152d234b70', 0x31),
(18, 'Fernando Cunha', '14774588545', '998554547', 'marcelo@edu', '202cb962ac59075b964b07152d234b70', 0x31),
(19, 'Paulo alves', '12378999858', '999275482', 'paulo@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(20, 'Paulo cardoso da silva', '18332111252', '999877885', 'ph@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(22, 'Alvaro silva', '6468468168', '861681681', 'alv@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(23, 'Daniel de melo Filho', '125965965625', '6656262626262', 'dani@ufu', '202cb962ac59075b964b07152d234b70', 0x31),
(24, 'Gabriel Dias', '351631531635135153', '168161865168', 'ti@edu', '81dc9bdb52d04dc20036dbd8313ed055', 0x31),
(25, 'Fabio melo Ramos', '5464161561', '65165165165', 'gabiog@eud', '202cb962ac59075b964b07152d234b70', 0x31),
(27, 'Yuri BenÃ­cio Pires', '43224872110', '999855875', 'yuribeniciopires-96@modus.com.br', '70baa6bb6da35a191de63a9c05b71cf8', 0x31);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `codigo_prod` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descr` varchar(250) DEFAULT NULL,
  `status` binary(1) DEFAULT '0',
  `preco` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`codigo_prod`, `nome`, `descr`, `status`, `preco`) VALUES
(16, 'Caixa de Transporte FuracÃ£o Pet Luxo Branco e Rosa', 'A Caixa de Transporte FuracÃ£o Pet Luxo Branco e Rosa foi elaborada pensando no conforto de seu pet e para facilitar a vida de seu dono.', 0x31, 200),
(17, 'Banheira Tudo Pet para Calopsita - Tam. Ãšnico', 'O banho faz parte da natureza diÃ¡ria da ave, por este motivo permita que a banheira esteja sempre a disposiÃ§Ã£o com Ã¡gua limpa e mais importante apÃ³s o banho retire do local evitando que o pet beba a Ã¡gua.', 0x31, 200),
(23, 'Areia SanitÃ¡ria Kelco Pipicat Floral', ' Forma torrÃµes resistentes de fÃ¡cil remoÃ§Ã£o', 0x31, 12),
(24, 'Bifinho Kelco Keldog Criadores Churrasco', 'Delicioso sabor carne', 0x31, 15),
(25, 'VermÃ­fugo Biovet Vermivet Composto 600 mg para CÃ£es e Gatos', 'Previne contra infestaÃ§Ãµes por vermes', 0x31, 10),
(26, 'Peitoral H Future Pet Nasa Prata', 'RegulÃ¡vel e de fÃ¡cil ajuste no pescoÃ§o do seu pet', 0x31, 100),
(27, 'Guia Future Pet Logo Nasa Branca', 'MosquetÃ£o Chunky feito a partir de liga de zinco com sistema duplo de seguranÃ§a e giro 360Â°', 0x31, 95),
(28, 'Granulado HigiÃªnico de Madeira CarePet Premium Especial para PÃ¡ssaros', ' BiodegradÃ¡vel e Patas limpas e sem machucar', 0x31, 14),
(29, 'Brinquedo American Pets Bolinha PlÃ¡stica com Guizo para Gatos', 'Massageia os dentes e Resistente', 0x31, 10),
(30, 'Brinquedo American Pets Bolinha PlÃ¡stica com Guizo para Gatos', 'Massageia os dentes e Resistente', 0x31, 10),
(31, 'Kit de Brinquedos FuracÃ£o Pet para RaÃ§as MÃ©dias', 'Indicado para cÃ£es e gatos de raÃ§as mÃ©dias', 0x31, 60),
(32, 'Osso NÃ³ 3/4 PetiscÃ£o', 'Combate o mau hÃ¡lito e Ideal para manter a saÃºde das gengiva', 0x31, 9),
(33, 'Brinquedo Petstages Bola de TÃªnis', 'DiversÃ£o garantida para o seu pet.', 0x31, 75),
(34, 'Bolsa de Transporte FreeFaro Mulher Maravilha', 'Ideal para passeios a pÃ© ou de carro e  Indicada para pets de pequeno porte (atÃ© 7kg).', 0x31, 360),
(35, 'Coleira FreeFaro Mulher Maravilha', ' Produto original e licenciado pela Warner Bros e Dc Comics.', 0x31, 45),
(36, 'Comedouro Interativo Pet Games Pet Fit Vermelho', 'Proporciona bem-estar fÃ­sico e mental na hora da refeiÃ§Ã£o', 0x31, 50),
(37, 'RaÃ§Ã£o importada', 'RaÃ§Ã£o importada com a melhor nutriÃ§Ã£o do mercado', 0x31, 255),
(38, 'Brinquedinho para gatos', 'Brinquedo de material resistente para seu bichano ', 0x31, 25),
(39, 'Tapete HigiÃªnico para CÃ£es Blue Premium 30 Unidades', 'O seu tamanho total 82cm x 60cm garante mais absorÃ§Ã£o, com a sua dupla camada de gel.', 0x31, 68),
(41, 'Bola MaciÃ§a Colorida 50mm, Corda de 2 Nos FuracÃ£o Pet para CÃ£es', 'Estimula habilidades mentais e fÃ­sicas que tornam seu cachorro alegre e entretido.', 0x31, 15),
(42, 'Pneu Slick Borracha FuracÃ£o Pet Black FuracÃ£o Pet para CÃ£es', 'Formato com superfÃ­cie irregular que atrai o cachorro e o instiga a brincar.', 0x31, 15),
(43, 'Brinquedo Rope Catchball Chalesco para CÃ£es', 'Alta Resistencia', 0x31, 20),
(44, 'FuracÃ£o Pet Dental Bone Algodao com No N.4, Tamanho G para CÃ£es (cores sortidas)', 'Os brinquedos especiais FuracÃ£o Pet Ã© perfeito para a diversÃ£o do seu pet.', 0x31, 21),
(46, 'Macaco Chalesco para CÃ£es', 'PelÃºcia macia e atrativa.', 0x31, 50);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codigo_vendas` int(11) NOT NULL,
  `fk_func` int(11) NOT NULL,
  `fk_cli` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `valor_total` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`codigo_vendas`, `fk_func`, `fk_cli`, `data`, `valor_total`) VALUES
(87, 20, 15, '2021-10-13', 887),
(89, 7, 12, '2021-10-15', 200),
(90, 16, 14, '2021-10-15', 200),
(91, 21, 15, '2021-10-15', 12),
(92, 19, 16, '2021-10-15', 15),
(93, 23, 16, '2021-10-15', 427),
(94, 27, 19, '2021-10-15', 1265),
(95, 24, 16, '2021-10-15', 660),
(96, 25, 18, '2021-10-20', 285),
(97, 18, 19, '2021-10-20', 198),
(98, 20, 15, '2021-10-21', 615),
(99, 16, 19, '2021-10-21', 505);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_produto`
--

CREATE TABLE `venda_produto` (
  `codigo_venda` int(11) NOT NULL,
  `codigo_prod` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `venda_produto`
--

INSERT INTO `venda_produto` (`codigo_venda`, `codigo_prod`) VALUES
(87, 16),
(87, 17),
(87, 23),
(87, 24),
(87, 26),
(87, 34),
(89, 16),
(90, 17),
(91, 23),
(92, 24),
(93, 16),
(93, 17),
(93, 23),
(93, 24),
(94, 16),
(94, 17),
(94, 23),
(94, 24),
(94, 25),
(94, 26),
(94, 27),
(94, 28),
(94, 29),
(94, 30),
(94, 31),
(94, 32),
(94, 33),
(94, 34),
(94, 35),
(94, 36),
(95, 16),
(95, 26),
(95, 34),
(96, 16),
(96, 30),
(96, 33),
(97, 25),
(97, 28),
(97, 29),
(97, 30),
(97, 32),
(97, 33),
(97, 35),
(97, 38),
(98, 16),
(98, 30),
(98, 32),
(98, 34),
(98, 41),
(98, 44),
(99, 32),
(99, 34),
(99, 36),
(99, 41),
(99, 44),
(99, 46);

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
  ADD PRIMARY KEY (`codigo_vendas`),
  ADD KEY `fk_func` (`fk_func`),
  ADD KEY `fk_ani` (`fk_cli`);

--
-- Indexes for table `venda_produto`
--
ALTER TABLE `venda_produto`
  ADD PRIMARY KEY (`codigo_venda`,`codigo_prod`);

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
  MODIFY `codigo_ani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bet`
--
ALTER TABLE `bet`
  MODIFY `codigo_bet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `codigo_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `codigo_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `codigo_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codigo_vendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `vet`
--
ALTER TABLE `vet`
  MODIFY `codigo_vet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
