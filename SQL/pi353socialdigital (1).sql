-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2022 às 13:59
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

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
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(65) NOT NULL,
  `cpf_usuario` varchar(20) NOT NULL,
  `rg_usuario` varchar(20) NOT NULL,
  `email_usuario` varchar(45) NOT NULL,
  `celular_usuario` varchar(25) NOT NULL,
  `dtNasc_usuario` date NOT NULL,
  `dtCad_usuario` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `cpf_usuario`, `rg_usuario`, `email_usuario`, `celular_usuario`, `dtNasc_usuario`, `dtCad_usuario`) VALUES
(6, 'Arthur', '13232354521', '435654', 'arthur@gmail.com', '8981239123', '2000-02-01', '2020-10-08'),
(7, 'erick', '45343984', '142454245', 'monteirocgk@gmail.com', '1287575275377', '2005-06-04', '2005-05-07'),
(8, 'Vinicius', '123456789', '123.456-98', 'viniciustcolombo@gmail.com', '998070758', '2005-02-01', '2022-02-06'),
(9, 'Arthur', '45343984', '435654', 'arthur@gmail.com', '998070758', '2000-02-08', '2026-12-09');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
