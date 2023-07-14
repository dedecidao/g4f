-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jul-2023 às 19:05
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `g4f`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `series_tv`
--

CREATE TABLE `series_tv` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `canal` varchar(100) NOT NULL,
  `genero` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `series_tv`
--

INSERT INTO `series_tv` (`id`, `titulo`, `canal`, `genero`) VALUES
(1, 'A Grande Família', 'Rede Globo', 'Comédia'),
(2, 'Cidade dos Homens', 'Rede Globo', 'Drama'),
(3, 'Sob Pressão', 'Rede Globo', 'Drama Médico'),
(4, 'Os Normais', 'Rede Globo', 'Comédia'),
(5, '3%', 'Netflix', 'Ficção Científica'),
(6, 'Avenida Brasil', 'Rede Globo', 'Drama'),
(7, 'Toma Lá, Dá Cá', 'Rede Globo', 'Comédia'),
(8, 'Sítio do Picapau Amarelo', 'Rede Globo', 'Infantil'),
(9, 'Sessão de Terapia', 'GNT', 'Drama'),
(10, 'A Casa das Sete Mulheres', 'Rede Globo', 'Drama Histórico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `series_tv_intervalos`
--

CREATE TABLE `series_tv_intervalos` (
  `id` int(11) NOT NULL,
  `id_serie_tv` int(11) DEFAULT NULL,
  `dia_da_semana` varchar(20) NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `series_tv_intervalos`
--

INSERT INTO `series_tv_intervalos` (`id`, `id_serie_tv`, `dia_da_semana`, `horario`) VALUES
(1, 1, '1', '08:30:00'),
(2, 2, '2', '20:00:00'),
(3, 3, '3', '18:45:00'),
(4, 4, '4', '21:15:00'),
(5, 5, '5', '00:30:00'),
(6, 6, '6', '14:00:00'),
(7, 7, '0', '22:30:00'),
(8, 8, '1', '19:00:00'),
(9, 9, '2', '16:45:00'),
(10, 10, '3', '23:15:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `series_tv`
--
ALTER TABLE `series_tv`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `series_tv_intervalos`
--
ALTER TABLE `series_tv_intervalos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_serie_tv` (`id_serie_tv`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `series_tv`
--
ALTER TABLE `series_tv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `series_tv_intervalos`
--
ALTER TABLE `series_tv_intervalos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `series_tv_intervalos`
--
ALTER TABLE `series_tv_intervalos`
  ADD CONSTRAINT `series_tv_intervalos_ibfk_1` FOREIGN KEY (`id_serie_tv`) REFERENCES `series_tv` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
