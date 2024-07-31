-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 31/07/2024 às 17:12
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sgec`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(225) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nomeCategoria`) VALUES
(1, 'Generalista'),
(2, 'Corporativo'),
(3, 'Freelancers'),
(4, 'Comunitário'),
(5, 'Inovação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `espacos`
--

DROP TABLE IF EXISTS `espacos`;
CREATE TABLE IF NOT EXISTS `espacos` (
  `idEspacos` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(225) NOT NULL,
  `endereco` varchar(225) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `capacidade` int NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `idCategoria` int NOT NULL,
  PRIMARY KEY (`idEspacos`),
  UNIQUE KEY `endereço_UNIQUE` (`endereco`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `espacos`
--

INSERT INTO `espacos` (`idEspacos`, `nome`, `endereco`, `descricao`, `capacidade`, `preco`, `idCategoria`) VALUES
(1, 'jjjjjjjjjjjjjjjjjjjjjjj', 'Rua das Flores, 123, São Paulo', 'Espaço moderno com internet rápida e café grátis.', 50, 300.00, 1),
(2, 'WorkSpace ', 'Avenida Paulista, 456, São Paulo', 'Localização privilegiada e ambiente profissional.', 40, 250.00, 1),
(3, 'Tech Haven', 'Rua da Liberdade, 789, Rio de Janeiro', 'Ambiente criativo ideal para startups e freelancers.', 60, 350.00, 3),
(4, 'Office Spot', 'Avenida Brasil, 101, Rio de Janeiro', 'Espaço flexível com salas de reunião e eventos.', 70, 400.00, 1),
(5, 'BizNest', 'Rua XV de Novembro, 202, Curitiba', 'Coworking com design inspirador e infraestrutura completa.', 55, 320.00, 2),
(6, 'Urban Desk', 'Avenida Sete de Setembro, 303, Curitiba', 'Ambiente colaborativo com networking ativo.', 45, 270.00, 3),
(7, 'CoWorkPro', 'Rua da Consolação, 404, São Paulo', 'Espaço profissional com suporte administrativo.', 50, 300.00, 4),
(8, 'Work Junction', 'Rua Augusta, 505, São Paulo', 'Local descontraído com eventos de networking.', 35, 240.00, 5),
(9, 'Innovation Space', 'Avenida Atlântica, 606, Rio de Janeiro', 'Espaço moderno com foco em inovação e tecnologia.', 65, 380.00, 1),
(10, 'StartHub', 'Rua das Palmeiras, 707, Florianópolis', 'Ambiente vibrante ideal para startups e empreendedores.', 40, 260.00, 2),
(11, 'FlexiDesk', 'Avenida Beira Mar, 808, Florianópolis', 'Espaço flexível com vista para o mar.', 30, 220.00, 3),
(12, 'WorkEase', 'Rua Santa Catarina, 909, Belo Horizonte', 'Ambiente confortável com café e snacks inclusos.', 55, 310.00, 4),
(13, 'HubLab', 'Avenida Afonso Pena, 1010, Belo Horizonte', 'Espaço inovador com diversas opções de salas.', 60, 340.00, 5),
(14, 'Nexus Coworking', 'Rua Amazonas, 1111, Porto Alegre', 'Ambiente inspirador com infraestrutura moderna.', 50, 280.00, 1),
(15, 'Synergy Space', 'Avenida Farrapos, 1212, Porto Alegre', 'Espaço colaborativo com foco em sinergia entre negócios.', 45, 290.00, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUsers` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `senha` varchar(15) NOT NULL,
  PRIMARY KEY (`idUsers`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`idUsers`, `nome`, `email`, `senha`) VALUES
(7, 'raisa', 'da@fsaf.com', '000');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `espacos`
--
ALTER TABLE `espacos`
  ADD CONSTRAINT `espacos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
