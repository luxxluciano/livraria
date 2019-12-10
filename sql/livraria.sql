-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 08:42 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraria`
--

-- --------------------------------------------------------

--
-- Table structure for table `estoques`
--

CREATE TABLE `estoques` (
  `idestoques` int(11) NOT NULL,
  `livros_idlivros` int(11) NOT NULL,
  `funcionarios_idfuncionarios` int(11) NOT NULL,
  `quant_total` smallint(6) NOT NULL,
  `quant_recebida` smallint(6) NOT NULL,
  `data_atualiza` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estoques`
--

INSERT INTO `estoques` (`idestoques`, `livros_idlivros`, `funcionarios_idfuncionarios`, `quant_total`, `quant_recebida`, `data_atualiza`) VALUES
(4, 5, 1, 10, 5, '2019-07-11'),
(5, 1, 2, 29, 15, '2018-12-06'),
(6, 3, 5, 10, 10, '2019-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `fornecedores`
--

CREATE TABLE `fornecedores` (
  `idfornecedores` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fornecedores`
--

INSERT INTO `fornecedores` (`idfornecedores`, `nome`, `endereco`, `cidade`, `telefone`) VALUES
(2, 'Carla Cristina Gomes', 'Rua Dona Laura, 350', 'Porto Alegre', '30250067'),
(3, 'JoÃ£o Joaquim', 'Rua Poente, 345', 'Salvador', '45549999'),
(4, 'Pedro Ramos', 'Rua do Arvoredo, 34', 'Vitoria', '34344444'),
(5, 'JosÃ© Roberto de Freitas', 'Rua Itapemirim, 32', 'Salto', '45453333');

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idfuncionarios` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `datacontrata` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`idfuncionarios`, `nome`, `datacontrata`) VALUES
(1, 'Tulio Gomes Freitas', '0000-00-00'),
(2, 'Ramires', '2019-06-12'),
(5, 'Tiazinha', '2019-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `livros`
--

CREATE TABLE `livros` (
  `idlivros` int(11) NOT NULL,
  `fornecedores_idfornecedores` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `anopublica` smallint(6) NOT NULL,
  `edicao` smallint(6) NOT NULL,
  `editora` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `livros`
--

INSERT INTO `livros` (`idlivros`, `fornecedores_idfornecedores`, `titulo`, `anopublica`, `edicao`, `editora`) VALUES
(1, 3, 'A Ferro e Fogo 2', 1988, 1, 'L&PM'),
(3, 2, 'O Pequeno PrÃ­ncipe 2', 2019, 5, 'Centauro'),
(5, 4, 'A RevoluÃ§Ã£o dos Bichos', 1965, 3, 'L&PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estoques`
--
ALTER TABLE `estoques`
  ADD PRIMARY KEY (`idestoques`),
  ADD KEY `FK_estoques_2` (`livros_idlivros`),
  ADD KEY `FK_estoques_1` (`funcionarios_idfuncionarios`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`idfornecedores`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idfuncionarios`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`idlivros`),
  ADD KEY `FK_livros_2` (`fornecedores_idfornecedores`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estoques`
--
ALTER TABLE `estoques`
  MODIFY `idestoques` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `idfornecedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idfuncionarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `idlivros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estoques`
--
ALTER TABLE `estoques`
  ADD CONSTRAINT `FK_estoques_1` FOREIGN KEY (`funcionarios_idfuncionarios`) REFERENCES `funcionarios` (`idfuncionarios`),
  ADD CONSTRAINT `FK_estoques_2` FOREIGN KEY (`livros_idlivros`) REFERENCES `livros` (`idlivros`);

--
-- Constraints for table `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `FK_livros_2` FOREIGN KEY (`fornecedores_idfornecedores`) REFERENCES `fornecedores` (`idfornecedores`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
