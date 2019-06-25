-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jun-2019 às 02:27
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acompanhamento`
--

CREATE TABLE `acompanhamento` (
  `cod` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `preco_adicional` double DEFAULT NULL,
  `foto_acompanhamento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acompanhamento`
--

INSERT INTO `acompanhamento` (`cod`, `nome`, `preco_adicional`, `foto_acompanhamento`) VALUES
(7, 'Mc Fritas', 2.5, 'a5f232979e84a2ba830a8f5fca9166be2730e717.png'),
(8, 'CHICKEN MCNUGGETS', 2.32, 'df788b152c9169515ba1824fbc2da7cd0fcb7fdc.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `cod` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`cod`, `login`, `senha`) VALUES
(1, 'itallo', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `cod` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cod`, `nome`) VALUES
(19, 'SANDUíCHE '),
(20, 'BEBIDAS'),
(21, 'SOBREMESAS'),
(22, 'TEST');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `cod` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `funcao` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`cod`, `nome`, `funcao`, `foto`) VALUES
(8, 'Jorge assunção', 'cozinheiro', '7b33043f923ccaca06b5083bf868feb7d705fd32.jpg'),
(9, 'Severino Maia', 'Segurança', '44c7c770eeb61f33bc522cfb62e2c7cd1f0921bb.jpg'),
(10, 'Alice Cunha', 'Atendente', '2efa98305a3560fcefde41d852f56f16de7bcd3f.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prato`
--

CREATE TABLE `prato` (
  `cod` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `ingredientes` varchar(200) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `cod_promocao` int(11) DEFAULT NULL,
  `foto_prato` varchar(100) DEFAULT NULL,
  `cod_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prato`
--

INSERT INTO `prato` (`cod`, `nome`, `ingredientes`, `preco`, `cod_promocao`, `foto_prato`, `cod_categoria`) VALUES
(64, 'Big test ', 'O maior hambúrguer de carne 100% bovina do McDonald’s, 3 deliciosas fatias de queijo, tomate, alface crocante, cebola e o saboroso molho tasty.', 15, 5, 'd4921a48a7127d7991c11c840e4f0770ee58e21a.png', 22),
(65, 'Big Mac', 'Dois hambúrgueres, alface, queijo e molho especial, cebola e picles num pão com gergelim.', 16.5, 6, '41cd4bb4043f0b5e0dea511119f73c361d2b5394.png', 19),
(66, 'Cheddar McMelt ', 'Feito com carne bovina, delicioso queijo tipo cheddar derretido, cebola grelhada ao molho shoyu e para completar um pão escuro com gergelim.', 16.5, 2, '94bf20661bda198e600f4540660ed1fcb4ec86cc.png', 19),
(67, 'Triplo chessburguer', 'O sabor de McDonald’s triplamente delicioso. Com três hambúrgueres de carne 100% bovina, queijo derretido, cebola, picles, ketchup e mostarda.', 20, 6, 'd7a2698eb95ed043370810a673db80d25e857fa0.png', 19),
(68, 'Sonho de Valsa', 'Leite e batido na hora e o apaixonante sabor de Sonho de Valsa. Experimente e Ame, é por tempo limitado.', 7.8, 2, '885066d611adf7810a802aa5d8cdf81040c66315.png', 20),
(69, 'McShake', 'O novo McShake é feito com leite e batido na hora. Você pode escolher nos sabores Ovomaltine ®, Chocolate Kopenhagen ou morango.', 16.5, 2, '2c800e6775e27bd6259a3fadcda3ed8e79a4cf32.png', 20),
(70, 'Chá', 'Refrescante Ice Tea Leão Pêssego, disponível também no sabor Matte Leão.', 10, 2, 'e36718c4f9699a472b806e47c463af53baa30721.png', 20),
(71, 'Refrigerantes ', 'Uma bebida assim refresca a vida. Você pode escolher entre Coca-Cola, Coca-Cola Zero, Fanta Guaraná, Fanta Guaraná Zero, Fanta Laranja ou Sprite Zero.', 5, 2, '9b5bf46d4aadd2eca50f2a47a668750801aa62d0.png', 20),
(72, 'McFlurry', 'Massa gelada, calda de chocolate e o apaixonante sabor de Sonho de Valsa. Experimente e Ame, é por tempo limitado.', 12.55, 2, '1050f4d07215429b4336f5020f30804cbb7880f5.png', 21),
(73, 'McKopenhagen Avelã', 'Massa gelada, calda de chocolate e pedaços de Avelã Kopenhagen. Experimente mais essa delícia, é por tempo limitado.', 16.5, 2, '94463d835992bd29fe1e71aa93f8b6181fcb8449.png', 21),
(74, 'McOvomaltine ', 'Massa gelada, calda de chocolate e sempre uma nova combinação irresistível.', 15, 2, '43ca2aa640a0669416cff510eb06e3ad0e7a1870.png', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prato_possui_acompanhamento`
--

CREATE TABLE `prato_possui_acompanhamento` (
  `cod` int(11) NOT NULL,
  `cod_prato` int(11) DEFAULT NULL,
  `cod_acompanhamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prato_possui_acompanhamento`
--

INSERT INTO `prato_possui_acompanhamento` (`cod`, `cod_prato`, `cod_acompanhamento`) VALUES
(5, 64, 7),
(6, 65, 7),
(7, 66, 7),
(8, 66, 8),
(9, 67, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE `promocao` (
  `cod` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `duracao` varchar(100) DEFAULT 'duração indeterminada',
  `texto_promocional` varchar(500) DEFAULT NULL,
  `foto_promocional` varchar(100) DEFAULT NULL,
  `porcentagem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `promocao`
--

INSERT INTO `promocao` (`cod`, `nome`, `duracao`, `texto_promocional`, `foto_promocional`, `porcentagem`) VALUES
(2, 'sem promocao', 'duração indeterminada', NULL, NULL, NULL),
(5, 'Mega Promoção', '4 dias', 'Venha curtir essa imperdível promoção de Sanduiches!!!', '21479e790ea34436e54cbe556fadcb26d995002d.jpg', 34),
(6, 'Hyper Promoção', '2 dias', 'Melhor promoção já feita!!', '2222b5f9694fc22175ae3482ad49fe8b070a5bf9.png', 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `restaurante`
--

CREATE TABLE `restaurante` (
  `cod` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `horarioDeFuncionamento` varchar(50) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `slogan` varchar(200) DEFAULT NULL,
  `fixo` varchar(25) DEFAULT NULL,
  `celular` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `restaurante`
--

INSERT INTO `restaurante` (`cod`, `nome`, `endereco`, `email`, `horarioDeFuncionamento`, `logo`, `slogan`, `fixo`, `celular`) VALUES
(1, 'McDonalds-Brasil', 'Rua Coronel José Ambrósio - 409', 'mc-donalds@hotmail.com', '18:00 as 22:00', 'c039fb8453ae3547d108f0eee280c6c516203bf2.png', 'Melhor fast-food do mundo você so encontra aqui!', '(88) 4002-8777', '(88) 99838-3118');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acompanhamento`
--
ALTER TABLE `acompanhamento`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `prato`
--
ALTER TABLE `prato`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_categoria` (`cod_categoria`),
  ADD KEY `fk_promocao` (`cod_promocao`);

--
-- Indexes for table `prato_possui_acompanhamento`
--
ALTER TABLE `prato_possui_acompanhamento`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `cod_prato` (`cod_prato`),
  ADD KEY `cod_acompanhamento` (`cod_acompanhamento`);

--
-- Indexes for table `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`cod`);

--
-- Indexes for table `restaurante`
--
ALTER TABLE `restaurante`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acompanhamento`
--
ALTER TABLE `acompanhamento`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prato`
--
ALTER TABLE `prato`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `prato_possui_acompanhamento`
--
ALTER TABLE `prato_possui_acompanhamento`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promocao`
--
ALTER TABLE `promocao`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurante`
--
ALTER TABLE `restaurante`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `prato`
--
ALTER TABLE `prato`
  ADD CONSTRAINT `fk_promocao` FOREIGN KEY (`cod_promocao`) REFERENCES `promocao` (`cod`),
  ADD CONSTRAINT `prato_ibfk_1` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod`);

--
-- Limitadores para a tabela `prato_possui_acompanhamento`
--
ALTER TABLE `prato_possui_acompanhamento`
  ADD CONSTRAINT `prato_possui_acompanhamento_ibfk_1` FOREIGN KEY (`cod_prato`) REFERENCES `prato` (`cod`),
  ADD CONSTRAINT `prato_possui_acompanhamento_ibfk_2` FOREIGN KEY (`cod_acompanhamento`) REFERENCES `acompanhamento` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
