-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2022 às 01:39
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pi353socialdigital`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avalicao` int(11) NOT NULL,
  `nota` int(5) NOT NULL,
  `fk_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE `bairros` (
  `id_bairro` int(11) NOT NULL,
  `nome_bairro` varchar(60) NOT NULL,
  `fk_cidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id_bairro`, `nome_bairro`, `fk_cidade`) VALUES
(1, 'Nossa Senhora da Salete', 2),
(2, 'Nossa Senhora da Salete', 2),
(3, 'Nossa Senhora da Salete', 4),
(4, 'Nossa Senhora da Salete', 4),
(5, 'Nossa Senhora da Salete', 6),
(6, 'Nossa Senhora da Salete', 6),
(7, 'Nossa Senhora da Salete', 8),
(8, 'Nossa Senhora da Salete', 8),
(9, 'Nossa Senhora da Salete', 10),
(10, 'Nossa Senhora da Salete', 10),
(11, 'Nossa Senhora da Salete', 12),
(12, 'Nossa Senhora da Salete', 12),
(13, 'Mina Brasil', 14),
(14, 'Mina Brasil', 14),
(15, 'Consolação', 16),
(16, 'Consolação', 16),
(30, 'Nossa Senhora da Salete', 31),
(31, 'Nossa Senhora da Salete', 31),
(32, 'Nossa Senhora da Salete', 33),
(33, 'Nossa Senhora da Salete', 33),
(34, 'Consolação', 35),
(35, 'Consolação', 35),
(36, 'Centro', 37),
(37, 'Centro', 37),
(38, 'Tucumanzal', 39),
(39, 'Tucumanzal', 39),
(40, 'Prado', 41),
(41, 'Prado', 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id_cidade` int(11) NOT NULL,
  `nome_cidade` varchar(65) NOT NULL,
  `fk_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id_cidade`, `nome_cidade`, `fk_estado`) VALUES
(1, 'Criciúma', 24),
(2, 'Criciúma', 24),
(3, 'Criciúma', 24),
(4, 'Criciúma', 24),
(5, 'Criciúma', 24),
(6, 'Criciúma', 24),
(7, 'Criciúma', 24),
(8, 'Criciúma', 24),
(9, 'Criciúma', 24),
(10, 'Criciúma', 24),
(11, 'Criciúma', 24),
(12, 'Criciúma', 24),
(13, 'Criciúma', 24),
(14, 'Criciúma', 24),
(15, 'São Paulo', 25),
(16, 'São Paulo', 25),
(30, 'Criciúma', 24),
(31, 'Criciúma', 24),
(32, 'Içara', 24),
(33, 'Içara', 24),
(34, 'São Paulo', 25),
(35, 'São Paulo', 25),
(36, 'Belo Horizonte', 13),
(37, 'Belo Horizonte', 13),
(38, 'Porto Velho', 7),
(39, 'Porto Velho', 7),
(40, 'Maceió', 13),
(41, 'Maceió', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `fk_rua` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `fk_rua`) VALUES
(1, 2),
(2, 2),
(3, 4),
(4, 4),
(5, 6),
(6, 6),
(7, 8),
(8, 8),
(9, 10),
(10, 10),
(11, 12),
(12, 12),
(13, 14),
(14, 14),
(28, 29),
(29, 29),
(30, 31),
(31, 31),
(32, 33),
(33, 33),
(34, 35),
(35, 35),
(36, 37),
(37, 37),
(38, 39),
(39, 39);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `uf_estado` char(2) NOT NULL,
  `descricao` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id_estado`, `uf_estado`, `descricao`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RS', 'Rio Grande do Sul'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocantins'),
(28, '24', ''),
(29, '24', ''),
(30, '24', ''),
(31, '24', ''),
(32, '24', ''),
(33, '24', ''),
(34, '24', ''),
(35, '25', ''),
(36, '', ''),
(37, '', ''),
(38, '', ''),
(39, '', ''),
(40, '', ''),
(41, '', ''),
(42, '', ''),
(43, '', ''),
(44, '', ''),
(45, '', ''),
(46, '', ''),
(47, '', ''),
(48, '', ''),
(49, '24', ''),
(50, '24', ''),
(51, '25', ''),
(52, '13', ''),
(53, '7', ''),
(54, '13', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ruas`
--

CREATE TABLE `ruas` (
  `id_rua` int(11) NOT NULL,
  `nome_rua` varchar(100) DEFAULT NULL,
  `fk_bairro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ruas`
--

INSERT INTO `ruas` (`id_rua`, `nome_rua`, `fk_bairro`) VALUES
(1, 'Rua Acre', 4),
(2, 'Rua Acre', 4),
(3, 'Rua Acre', 6),
(4, 'Rua Acre', 6),
(5, 'Rua Acre', 8),
(6, 'Rua Acre', 8),
(7, 'Rua Acre', 10),
(8, 'Rua Acre', 10),
(9, 'Rua Acre', 12),
(10, 'Rua Acre', 12),
(11, 'Rua Júlio Gaidzinski', 14),
(12, 'Rua Júlio Gaidzinski', 14),
(13, 'Rua Augusta', 16),
(14, 'Rua Augusta', 16),
(28, 'Rua Acre', 31),
(29, 'Rua Acre', 31),
(30, 'Rua Júlio Gaidzinski', 33),
(31, 'Rua Júlio Gaidzinski', 33),
(32, 'Rua Augusta', 35),
(33, 'Rua Augusta', 35),
(34, 'Rua Espírito Santo', 37),
(35, 'Rua Espírito Santo', 37),
(36, 'Rua Brasília', 39),
(37, 'Rua Brasília', 39),
(38, 'Avenida Siqueira Campos', 41),
(39, 'Avenida Siqueira Campos', 41);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `nome_tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `nome_tipo`) VALUES
(1, 'Desenvolvedor'),
(2, 'Administrador'),
(3, 'Usuário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `cpf_usuario` varchar(15) NOT NULL,
  `rg_usuario` varchar(15) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `senha_user` varchar(8) NOT NULL,
  `celular_usuario` varchar(15) NOT NULL,
  `dtNasc_usuario` date DEFAULT NULL,
  `dtCad_usuario` date DEFAULT NULL,
  `fk_endereco` int(11) NOT NULL,
  `fk_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `cpf_usuario`, `rg_usuario`, `email_usuario`, `senha_user`, `celular_usuario`, `dtNasc_usuario`, `dtCad_usuario`, `fk_endereco`, `fk_tipo`) VALUES
(26, 'Arthur Meira', '11111111111', '1111111', 'arthur@gmail.com', 'z!tf01Ew', '', '2022-11-11', '2022-11-11', 37, 1),
(27, 'Pedro Henrique', '22222222222', '3333333', 'pedro2323@gmail.com', 'k9cR50%I', '', '2000-11-15', '2022-10-25', 39, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas`
--

CREATE TABLE `visitas` (
  `id_visitas` int(11) NOT NULL,
  `local_visita` varchar(150) DEFAULT NULL,
  `data_visita` date NOT NULL,
  `hora_visita` time NOT NULL,
  `observacao_visita` varchar(220) NOT NULL,
  `descricao_visita` varchar(220) NOT NULL,
  `fk_visitante` int(11) DEFAULT NULL,
  `fk_membro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avalicao`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Índices para tabela `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`id_bairro`),
  ADD KEY `fk_cidade` (`fk_cidade`);

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id_cidade`),
  ADD KEY `fk_estado` (`fk_estado`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `fk_rua` (`fk_rua`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Índices para tabela `ruas`
--
ALTER TABLE `ruas`
  ADD PRIMARY KEY (`id_rua`),
  ADD KEY `fk_bairro` (`fk_bairro`);

--
-- Índices para tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_endereco` (`fk_endereco`),
  ADD KEY `fk_tipo` (`fk_tipo`);

--
-- Índices para tabela `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visitas`),
  ADD KEY `fk_visitante` (`fk_visitante`),
  ADD KEY `fk_membro` (`fk_membro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avalicao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE `bairros`
  MODIFY `id_bairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `ruas`
--
ALTER TABLE `ruas`
  MODIFY `id_rua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `bairros`
--
ALTER TABLE `bairros`
  ADD CONSTRAINT `bairros_ibfk_1` FOREIGN KEY (`fk_cidade`) REFERENCES `cidades` (`id_cidade`);

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidades_ibfk_1` FOREIGN KEY (`fk_estado`) REFERENCES `estados` (`id_estado`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`fk_rua`) REFERENCES `ruas` (`id_rua`);

--
-- Limitadores para a tabela `ruas`
--
ALTER TABLE `ruas`
  ADD CONSTRAINT `ruas_ibfk_1` FOREIGN KEY (`fk_bairro`) REFERENCES `bairros` (`id_bairro`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`fk_endereco`) REFERENCES `endereco` (`id_endereco`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`fk_tipo`) REFERENCES `tipo_usuario` (`id_tipo`);

--
-- Limitadores para a tabela `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`fk_visitante`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `visitas_ibfk_2` FOREIGN KEY (`fk_membro`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
