-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Nov-2020 às 23:51
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `apicash`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `poligono`
--

CREATE TABLE `poligono` (
  `PoligonoCodigo` int(11) NOT NULL,
  `TipoPoligonoCodigo` int(11) NOT NULL,
  `PoligonoNome` varchar(30) NOT NULL,
  `PoligonoLadoA` double NOT NULL,
  `PoligonoLadoB` double NOT NULL,
  `PoligonoLadoC` double NOT NULL,
  `PoligonoLadoD` double NOT NULL,
  `PoligonoTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `poligono`
--

INSERT INTO `poligono` (`PoligonoCodigo`, `TipoPoligonoCodigo`, `PoligonoNome`, `PoligonoLadoA`, `PoligonoLadoB`, `PoligonoLadoC`, `PoligonoLadoD`, `PoligonoTotal`) VALUES
(1, 1, 'Triangulo 1', 3, 3, 3, 0, 9),
(2, 2, 'Retangulo 1', 4, 4, 4, 4, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipopoligono`
--

CREATE TABLE `tipopoligono` (
  `TipoPoligonoCodigo` int(11) NOT NULL,
  `TipoPoligonoNome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipopoligono`
--

INSERT INTO `tipopoligono` (`TipoPoligonoCodigo`, `TipoPoligonoNome`) VALUES
(1, 'Triangulo'),
(2, 'Retangulo');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `poligono`
--
ALTER TABLE `poligono`
  ADD PRIMARY KEY (`PoligonoCodigo`),
  ADD KEY `TipoPoligonoCodigo` (`TipoPoligonoCodigo`);

--
-- Índices para tabela `tipopoligono`
--
ALTER TABLE `tipopoligono`
  ADD PRIMARY KEY (`TipoPoligonoCodigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `poligono`
--
ALTER TABLE `poligono`
  MODIFY `PoligonoCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
