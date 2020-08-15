-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Maio-2020 às 02:35
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alimento`
--

CREATE TABLE `alimento` (
  `id_alimento` int(11) NOT NULL,
  `alimento` varchar(45) DEFAULT NULL,
  `quantidade` varchar(45) DEFAULT NULL,
  `horario_refeicao` varchar(30) DEFAULT NULL,
  `id_refeicao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alimento`
--

INSERT INTO `alimento` (`id_alimento`, `alimento`, `quantidade`, `horario_refeicao`, `id_refeicao`) VALUES
(1, 'Batatas', '12', '11:30', 2),
(2, 'brocolis', '12', '12:30', 11),
(3, 'arroz', '2', '34:53', 11),
(4, 'whey protein', '200g', '12:00', 12),
(5, 'banana', '1 unidade', '12:00', 13),
(6, 'beterraba', '1', '12:00', 2),
(7, 'arrozz', '200g', '12:00', 14),
(8, 'feijao ', '200g', '12:00', 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `his_clinico` varchar(500) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `altura` double DEFAULT NULL,
  `imc` double DEFAULT NULL,
  `torax` double DEFAULT NULL,
  `cintura` double DEFAULT NULL,
  `abdomen` double DEFAULT NULL,
  `quadril` double DEFAULT NULL,
  `antebraco_esquerdo` double DEFAULT NULL,
  `antebraco_direito` double DEFAULT NULL,
  `braco_esquerdo` double DEFAULT NULL,
  `braco_direito` double DEFAULT NULL,
  `coxa_esquerdo` double DEFAULT NULL,
  `coxa_direito` double DEFAULT NULL,
  `panturrilha_esquerda` double DEFAULT NULL,
  `panturrilha_direita` double DEFAULT NULL,
  `data_avaliacao` date DEFAULT NULL,
  `id_ficha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id_avaliacao`, `his_clinico`, `peso`, `altura`, `imc`, `torax`, `cintura`, `abdomen`, `quadril`, `antebraco_esquerdo`, `antebraco_direito`, `braco_esquerdo`, `braco_direito`, `coxa_esquerdo`, `coxa_direito`, `panturrilha_esquerda`, `panturrilha_direita`, `data_avaliacao`, `id_ficha`) VALUES
(64, 'tem pressao alta', 95, 1.67, 34, 33.33, 33.33, 33.33, 33.33, 33.33, 33.33, 33.33, 33.33, 33.33, 33.33, 33.33, 33.33, '2020-05-21', 11),
(65, 'pressao alta , diabetes', 80, 1.8, 24, 34.24, 23.43, 32.42, 34.43, 34.43, 34.43, 34.43, 34.43, 34.43, 34.43, 34.43, 34.43, '2020-05-26', 9),
(66, 'diabete', 90, 1.8, 27, 23.42, 24.32, 42.34, 23.42, 23.42, 23.42, 24.23, 24.32, 23.42, 23.42, 23.42, 24.23, '2020-05-26', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `id_exercicio` int(11) NOT NULL,
  `nome_exercicio` varchar(100) DEFAULT NULL,
  `serie` varchar(45) DEFAULT NULL,
  `repeticao` int(11) DEFAULT NULL,
  `descricao_exercicio` varchar(100) DEFAULT NULL,
  `id_treino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`id_exercicio`, `nome_exercicio`, `serie`, `repeticao`, `descricao_exercicio`, `id_treino`) VALUES
(135, 'legpress', 'tes', NULL, 'tes', 43),
(136, 'extensor', '4', 33, 'fazer para sentir o musculo ', 57),
(138, 'legpress', '12', NULL, 'teste', 58),
(140, 'flexoes', '8', NULL, 'pausa 10 min', 55),
(142, 'ed', 'tes', NULL, 'etet', 59),
(143, 'legpress', '4', NULL, 'descricao', 60),
(144, 'perna', '5', 20, 'teste', 42),
(145, 'supino', '8', 20, 'devagar', 56);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha`
--

CREATE TABLE `ficha` (
  `id_ficha` int(11) NOT NULL,
  `objetivo_ficha` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `objetivo_ficha`, `id_usuario`) VALUES
(9, NULL, 2),
(10, NULL, 4),
(11, NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `nome_professor` varchar(100) DEFAULT NULL,
  `sobrenome_professor` varchar(100) DEFAULT NULL,
  `cref_professor` varchar(45) DEFAULT NULL,
  `email_professor` varchar(45) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `senha_professor` varchar(45) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `nome_professor`, `sobrenome_professor`, `cref_professor`, `email_professor`, `telefone`, `senha_professor`, `endereco`, `cep`, `complemento`, `cidade`, `pais`, `estado`, `numero`) VALUES
(1, 'Bruno', 'vicente', '3442423', 'brunovicentealves.ti@gmail.com', '(43) 5.3453-534', '827ccb0eea8a706c4c34a16891f84e7b', 'rua 16', '902.000.01', 'casa', 'Porto Alegre', 'Brasil', 'Brasil', 342),
(2, 'pedro', 'vicente', '5346345334353453', 'pedro@gmail.com', '(99) 9.9999-999', '81dc9bdb52d04dc20036dbd8313ed055', 'rua 17', '900.000.00', 'casa', 'porto alegre', 'brasil', 'rs', 444),
(3, 'Julian', 'Alves', '3453453', 'juliana@gmail.com', NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'bruno', 'pedro', '3453453453', 'bruno@gmail.com', '(99) 9.990', '827ccb0eea8a706c4c34a16891f84e7b', '4543', '345', '345', '345', '3453', '453', 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor_usuario`
--

CREATE TABLE `professor_usuario` (
  `id_professor_usuario` int(11) NOT NULL,
  `id_professor` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor_usuario`
--

INSERT INTO `professor_usuario` (`id_professor_usuario`, `id_professor`, `id_usuario`) VALUES
(1, 1, 2),
(2, 1, 4),
(3, 2, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `refeicao`
--

CREATE TABLE `refeicao` (
  `id_refeicao` int(11) NOT NULL,
  `nome_refeicao` varchar(200) DEFAULT NULL,
  `descricao_refeicao` varchar(300) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `id_ficha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `refeicao`
--

INSERT INTO `refeicao` (`id_refeicao`, `nome_refeicao`, `descricao_refeicao`, `data_criacao`, `id_ficha`) VALUES
(2, 'teste', 'massa ', '2020-05-25', 9),
(11, 'Ganho de massa ', 'teste', '2020-05-25', 9),
(12, 'dieta do ovo ', 'comer ovo', '2020-05-21', 9),
(13, 'dieta calorica', 'teste', '2020-05-21', 9),
(14, 'Dieta perda de peso', 'Essa dieta para perda de peso', '2020-05-25', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `treino`
--

CREATE TABLE `treino` (
  `id_treino` int(11) NOT NULL,
  `nome_treino` varchar(100) DEFAULT NULL,
  `descricao_treino` varchar(100) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `id_ficha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `treino`
--

INSERT INTO `treino` (`id_treino`, `nome_treino`, `descricao_treino`, `data_criacao`, `id_ficha`) VALUES
(42, 'pernas', 'treino para fortificar as pernas', '2020-05-21', 9),
(43, 'coxa', 'treino para definir coxas', '2020-05-21', 9),
(54, 'Panturrilha', 'Treino paras as panturrilhas', '2020-05-21', 9),
(55, 'BraÃ§o', 'treino para  musculatura dos braÃ§os ', '2020-05-21', 9),
(56, 'AntebraÃ§o ', 'Treino para AntebraÃ§os', '2020-05-21', 9),
(57, 'perna', 'treinos para as pernas', '2020-05-19', 10),
(58, 'perna', 'teste', '2020-05-21', 9),
(59, 'perna', 'treino para pernas', '2020-05-21', 9),
(60, 'Treino Perna', 'treinos para pernas', '2020-05-21', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) DEFAULT NULL,
  `sobrenome_usuario` varchar(100) DEFAULT NULL,
  `email_usuario` varchar(45) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `senha_usuario` varchar(100) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `telefone`, `senha_usuario`, `endereco`, `cep`, `complemento`, `cidade`, `pais`, `estado`, `numero`) VALUES
(2, 'Bruno Vicente', 'Alves', 'brunovicentealves.ti@gmail.com', '(51) 9.9153-453', '827ccb0eea8a706c4c34a16891f84e7b', 'rua 16', '902.000.01', 'casa', 'Porto Alegre', 'Brasil', 'RS', 279),
(4, 'Juliana', 'Alves', 'bruno@hotmail.com', '(51) 9.9999-999', '81dc9bdb52d04dc20036dbd8313ed055', 'rua 16', '342.234.23', 'casa', 'Porto Alegre', 'brasil', 'rs', 11111),
(5, 'Marcia', 'Alves', 'marcia@gmail.com', '(51) 9.9999-999', '81dc9bdb52d04dc20036dbd8313ed055', 'rua 16', '900.000.00', 'casa', 'porto alegre', 'brasil', 'RS', 279);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`id_alimento`),
  ADD KEY `id_refeicao` (`id_refeicao`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `id_ficha` (`id_ficha`);

--
-- Indexes for table `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`id_exercicio`),
  ADD KEY `id_treino` (`id_treino`);

--
-- Indexes for table `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`);

--
-- Indexes for table `professor_usuario`
--
ALTER TABLE `professor_usuario`
  ADD PRIMARY KEY (`id_professor_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_professor` (`id_professor`);

--
-- Indexes for table `refeicao`
--
ALTER TABLE `refeicao`
  ADD PRIMARY KEY (`id_refeicao`),
  ADD KEY `id_ficha` (`id_ficha`);

--
-- Indexes for table `treino`
--
ALTER TABLE `treino`
  ADD PRIMARY KEY (`id_treino`),
  ADD KEY `id_ficha` (`id_ficha`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alimento`
--
ALTER TABLE `alimento`
  MODIFY `id_alimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `id_exercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `professor_usuario`
--
ALTER TABLE `professor_usuario`
  MODIFY `id_professor_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `refeicao`
--
ALTER TABLE `refeicao`
  MODIFY `id_refeicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `treino`
--
ALTER TABLE `treino`
  MODIFY `id_treino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alimento`
--
ALTER TABLE `alimento`
  ADD CONSTRAINT `alimento_ibfk_1` FOREIGN KEY (`id_refeicao`) REFERENCES `refeicao` (`id_refeicao`);

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id_ficha`);

--
-- Limitadores para a tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD CONSTRAINT `exercicio_ibfk_1` FOREIGN KEY (`id_treino`) REFERENCES `treino` (`id_treino`);

--
-- Limitadores para a tabela `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `professor_usuario`
--
ALTER TABLE `professor_usuario`
  ADD CONSTRAINT `professor_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `professor_usuario_ibfk_2` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`);

--
-- Limitadores para a tabela `refeicao`
--
ALTER TABLE `refeicao`
  ADD CONSTRAINT `refeicao_ibfk_1` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id_ficha`);

--
-- Limitadores para a tabela `treino`
--
ALTER TABLE `treino`
  ADD CONSTRAINT `treino_ibfk_1` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id_ficha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
