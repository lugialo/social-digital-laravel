-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2022 at 01:26 PM
-- Server version: 10.5.15-MariaDB-0+deb11u1
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pi353socialdigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avalicao` int(11) NOT NULL,
  `nota` double(5,1) NOT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `avaliacao`
--

INSERT INTO `avaliacao` (`id_avalicao`, `nota`, `fk_usuario`) VALUES
(40, 3.0, 61);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `nome_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `nome_tipo`) VALUES
(1, 'Desenvolvedor'),
(2, 'Administrador'),
(3, 'Usuário');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `cpf_usuario` varchar(15) NOT NULL,
  `rg_usuario` varchar(15) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_user` varchar(8) NOT NULL,
  `dtNasc_usuario` date DEFAULT NULL,
  `fk_tipo` int(11) NOT NULL,
  `dtCad_usuario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `cpf_usuario`, `rg_usuario`, `email_usuario`, `senha_user`, `dtNasc_usuario`, `fk_tipo`, `dtCad_usuario`) VALUES
(61, 'Rodrigo Novaski', '00127831297', '3455932', 'rodnovaski@hotmail.com', 'k4-4AuOr', '1998-02-08', 3, '2022-12-01'),
(62, 'Wanda Gomes da Silva', '54712912315', '5462154', 'wand123_silvago@hotmail.com', '12345678', '2000-09-14', 2, '2022-05-01'),
(78, 'Pedro Machado', '78326723849', '6575634', 'pedro_23machado@gmail.com', 'ZMSt0x31', '0005-04-06', 3, '2022-12-04'),
(79, 'Arthur Meira', '13640885929', '6205306', 'arthurmeiraprog@gmail.com', '12345678', '2004-08-16', 1, '2022-12-04'),
(80, 'Marcelo Gomez ', '88762912067', '4431253', 'marcelo123@gmail.com', '@LGP0Z01', '1978-06-09', 2, '2022-12-04'),
(81, 'Wagner Assunção', '88216854912', '2348734', 'wagass21@gmail.com', '33UI49oK', '2003-05-06', 3, '2022-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `visitas`
--

CREATE TABLE `visitas` (
  `id_visitas` int(11) NOT NULL,
  `data_visita` date NOT NULL,
  `hora_visita` time NOT NULL,
  `observacao_visita` varchar(800) NOT NULL,
  `descricao_visita` varchar(800) NOT NULL,
  `cep_visita` varchar(9) NOT NULL,
  `rua_visita` varchar(85) NOT NULL,
  `bairro_visita` varchar(85) NOT NULL,
  `cidade_visita` varchar(85) NOT NULL,
  `estado_visita` char(2) NOT NULL,
  `fk_assistente` int(11) DEFAULT NULL,
  `fk_membro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitas`
--

INSERT INTO `visitas` (`id_visitas`, `data_visita`, `hora_visita`, `observacao_visita`, `descricao_visita`, `cep_visita`, `rua_visita`, `bairro_visita`, `cidade_visita`, `estado_visita`, `fk_assistente`, `fk_membro`) VALUES
(32, '2022-12-04', '12:01:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '57010-002', 'Avenida Siqueira Campos', 'Prado', 'Maceió', 'AL', 80, 61),
(34, '2022-12-06', '14:40:00', 'AL', 'AL', '01304-001', 'Rua Augusta', 'Consolação', 'São Paulo', 'SP', 62, 78);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avalicao`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_tipo` (`fk_tipo`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visitas`),
  ADD KEY `fk_assistente` (`fk_assistente`),
  ADD KEY `fk_membro` (`fk_membro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avalicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`fk_tipo`) REFERENCES `tipo_usuario` (`id_tipo`);

--
-- Constraints for table `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`fk_assistente`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `visitas_ibfk_2` FOREIGN KEY (`fk_membro`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
