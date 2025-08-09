-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/10/2024 às 01:41
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `megumin`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comment` int(11) UNSIGNED NOT NULL,
  `fk_produto` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL,
  `comment` text NOT NULL,
  `stars` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id_message` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` char(13) NOT NULL,
  `subject` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_product` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `quantity` int(4) NOT NULL,
  `sells` int(11) DEFAULT NULL,
  `brand` enum('FUNKO POP','FIGMA','DARK HORSE','TSUME ARTS') NOT NULL,
  `material` enum('PVC','Vinil','ABS','Polystone') NOT NULL,
  `articulation` tinyint(1) NOT NULL,
  `stars` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_product`, `image`, `name`, `description`, `price`, `quantity`, `sells`, `brand`, `material`, `articulation`, `stars`) VALUES
(1, 0x6c6f676f2e706e67, 'megumin pika das galaxia', 'MUITO FOFO', 42, 1, 0, 'FUNKO POP', 'PVC', 0, 0),
(2, 0x4b6974746965732e6a7067, 'Kitties', 'GATITOS GATITOS GATITOS MUITOS FOFOS', 120, 10, 0, 'DARK HORSE', 'Vinil', 1, 0),
(3, 0x4b6f616c612e6a7067, 'Koala', 'muito fofis :333', 0, 24, 0, 'FUNKO POP', 'PVC', 1, 0),
(4, 0x43c3b36469676f2e6a7067, 'Código Limdu', 'Código do William (não Borner)', 300, 1, 0, 'TSUME ARTS', 'Polystone', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('h','m','nb') NOT NULL,
  `number` char(13) NOT NULL,
  `credits` double NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD KEY `fk_produto` (`fk_produto`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Índices de tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_product`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`fk_produto`) REFERENCES `produto` (`id_product`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `usuario` (`id_user`);

--
-- Restrições para tabelas `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `usuario` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
