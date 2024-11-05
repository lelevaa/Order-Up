<<<<<<< HEAD
<<<<<<< HEAD
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2024 às 15:27
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
-- Banco de dados: `orderup`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending1',
  `user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payment`
--

INSERT INTO `payment` (`id`, `valor`, `status`, `user_id`, `created`) VALUES
(28, '1', 'approved', 1, '2023-12-07 19:06:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtosgeral`
--

CREATE TABLE `produtosgeral` (
  `ID` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtosgeral`
--

INSERT INTO `produtosgeral` (`ID`, `nome`, `descricao`, `preco`, `categoria`, `imagem`) VALUES
(9, 'croquete', 'dad', '6.00', 'salgados', '6707e1bee1dd17.61152158.jfif'),
(21, 'espirra', 'tetetet', '2.90', 'salgados', '6709335daa9098.40476080.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id` int(25) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id`, `usuario`, `codigo`, `total`) VALUES
(0, '', '', '0.00'),
(0, '', '', '0.00'),
(0, '', '', '0.00'),
(0, '', '', '0.00'),
(0, '', '', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `lancamento` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `categoria`, `lancamento`, `vencimento`, `imagem`) VALUES
(39, 'coxinha com frango', 'coxinha de frango', '6.00', 10, 'salgados', '2024-10-11', '2024-10-14', '6709296c0e0917.66655770.png'),
(48, 'espirra', 'tetetet', '2.90', 0, 'salgados', '', '', '6709335daa9098.40476080.jpg'),
(49, 'croquete', 'dad', '6.00', 28, 'salgados', '2024-10-30', '2024-10-30', NULL),
(50, 'espirra', 'tetetet', '2.90', 89, 'salgados', '2024-10-29', '2024-10-31', NULL),
(51, 'croquete', 'dad', '6.00', 100, 'salgados', '2024-10-29', '2024-11-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos2`
--

CREATE TABLE `tb_produtos2` (
  `id` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `lancamento` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produtos2`
--

INSERT INTO `tb_produtos2` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `categoria`, `lancamento`, `vencimento`, `imagem`) VALUES
(39, 'coxinha com frango', 'coxinha de frango', '6.00', 10, 'salgados', '2024-10-11', '2024-10-14', '6709296c0e0917.66655770.png'),
(48, 'espirra', 'tetetet', '2.90', 0, 'salgados', '', '', '6709335daa9098.40476080.jpg'),
(49, 'croquete', 'dad', '6.00', 100, 'salgados', '2024-10-30', '2024-11-01', NULL),
(50, 'espirra', 'tetetet', '2.90', 100, 'salgados', '2024-10-29', '2024-11-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `balance`) VALUES
(1, 'teste', 'teste', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`) VALUES
(1, 'juninho souza silva', '6680994321', 'juninho_silva@gmail.com', '$2y$10$HhxEvSgul9sCJyioDWfDD.yqCfgukkcuP3gbXTPzFw55Y7qSKOmz.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `senha`) VALUES
(1, 'administrador01', 'adoleta@976854');

-- --------------------------------------------------------

-- Índices para tabelas despejadas
--

--
-- Índices para tabela `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtosgeral`
--
ALTER TABLE `produtosgeral`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_produtos2`
--
ALTER TABLE `tb_produtos2`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `produtosgeral`
--
ALTER TABLE `produtosgeral`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `tb_produtos2`
--
ALTER TABLE `tb_produtos2`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
=======
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2024 às 15:27
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
-- Banco de dados: `orderup`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending1',
  `user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payment`
--

INSERT INTO `payment` (`id`, `valor`, `status`, `user_id`, `created`) VALUES
(28, '1', 'approved', 1, '2023-12-07 19:06:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtosgeral`
--

CREATE TABLE `produtosgeral` (
  `ID` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtosgeral`
--

INSERT INTO `produtosgeral` (`ID`, `nome`, `descricao`, `preco`, `categoria`, `imagem`) VALUES
(9, 'croquete', 'dad', '6.00', 'salgados', '6707e1bee1dd17.61152158.jfif'),
(21, 'espirra', 'tetetet', '2.90', 'salgados', '6709335daa9098.40476080.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id` int(25) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id`, `usuario`, `codigo`, `total`) VALUES
(0, '', '', '0.00'),
(0, '', '', '0.00'),
(0, '', '', '0.00'),
(0, '', '', '0.00'),
(0, '', '', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `lancamento` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `categoria`, `lancamento`, `vencimento`, `imagem`) VALUES
(39, 'coxinha com frango', 'coxinha de frango', '6.00', 10, 'salgados', '2024-10-11', '2024-10-14', '6709296c0e0917.66655770.png'),
(48, 'espirra', 'tetetet', '2.90', 0, 'salgados', '', '', '6709335daa9098.40476080.jpg'),
(49, 'croquete', 'dad', '6.00', 28, 'salgados', '2024-10-30', '2024-10-30', NULL),
(50, 'espirra', 'tetetet', '2.90', 89, 'salgados', '2024-10-29', '2024-10-31', NULL),
(51, 'croquete', 'dad', '6.00', 100, 'salgados', '2024-10-29', '2024-11-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos2`
--

CREATE TABLE `tb_produtos2` (
  `id` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `lancamento` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produtos2`
--

INSERT INTO `tb_produtos2` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `categoria`, `lancamento`, `vencimento`, `imagem`) VALUES
(39, 'coxinha com frango', 'coxinha de frango', '6.00', 10, 'salgados', '2024-10-11', '2024-10-14', '6709296c0e0917.66655770.png'),
(48, 'espirra', 'tetetet', '2.90', 0, 'salgados', '', '', '6709335daa9098.40476080.jpg'),
(49, 'croquete', 'dad', '6.00', 100, 'salgados', '2024-10-30', '2024-11-01', NULL),
(50, 'espirra', 'tetetet', '2.90', 100, 'salgados', '2024-10-29', '2024-11-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `balance`) VALUES
(1, 'teste', 'teste', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`) VALUES
(1, 'juninho souza silva', '6680994321', 'juninho_silva@gmail.com', '$2y$10$HhxEvSgul9sCJyioDWfDD.yqCfgukkcuP3gbXTPzFw55Y7qSKOmz.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `senha`) VALUES
(1, 'administrador01', 'adoleta@976854');

-- --------------------------------------------------------

-- Índices para tabelas despejadas
--

--
-- Índices para tabela `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtosgeral`
--
ALTER TABLE `produtosgeral`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_produtos2`
--
ALTER TABLE `tb_produtos2`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `produtosgeral`
--
ALTER TABLE `produtosgeral`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `tb_produtos2`
--
ALTER TABLE `tb_produtos2`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> 9c7dfa9f6633226fd9780751280e0f40e7712039
=======
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2024 às 15:27
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
-- Banco de dados: `orderup`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending1',
  `user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payment`
--

INSERT INTO `payment` (`id`, `valor`, `status`, `user_id`, `created`) VALUES
(28, '1', 'approved', 1, '2023-12-07 19:06:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtosgeral`
--

CREATE TABLE `produtosgeral` (
  `ID` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtosgeral`
--

INSERT INTO `produtosgeral` (`ID`, `nome`, `descricao`, `preco`, `categoria`, `imagem`) VALUES
(9, 'croquete', 'dad', '6.00', 'salgados', '6707e1bee1dd17.61152158.jfif'),
(21, 'espirra', 'tetetet', '2.90', 'salgados', '6709335daa9098.40476080.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id` int(25) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id`, `usuario`, `codigo`, `total`) VALUES
(0, '', '', '0.00'),
(0, '', '', '0.00'),
(0, '', '', '0.00'),
(0, '', '', '0.00'),
(0, '', '', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `lancamento` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `categoria`, `lancamento`, `vencimento`, `imagem`) VALUES
(39, 'coxinha com frango', 'coxinha de frango', '6.00', 10, 'salgados', '2024-10-11', '2024-10-14', '6709296c0e0917.66655770.png'),
(48, 'espirra', 'tetetet', '2.90', 0, 'salgados', '', '', '6709335daa9098.40476080.jpg'),
(49, 'croquete', 'dad', '6.00', 28, 'salgados', '2024-10-30', '2024-10-30', NULL),
(50, 'espirra', 'tetetet', '2.90', 89, 'salgados', '2024-10-29', '2024-10-31', NULL),
(51, 'croquete', 'dad', '6.00', 100, 'salgados', '2024-10-29', '2024-11-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos2`
--

CREATE TABLE `tb_produtos2` (
  `id` int(25) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `quantidade` int(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `lancamento` varchar(255) NOT NULL,
  `vencimento` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_produtos2`
--

INSERT INTO `tb_produtos2` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `categoria`, `lancamento`, `vencimento`, `imagem`) VALUES
(39, 'coxinha com frango', 'coxinha de frango', '6.00', 10, 'salgados', '2024-10-11', '2024-10-14', '6709296c0e0917.66655770.png'),
(48, 'espirra', 'tetetet', '2.90', 0, 'salgados', '', '', '6709335daa9098.40476080.jpg'),
(49, 'croquete', 'dad', '6.00', 100, 'salgados', '2024-10-30', '2024-11-01', NULL),
(50, 'espirra', 'tetetet', '2.90', 100, 'salgados', '2024-10-29', '2024-11-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `balance`) VALUES
(1, 'teste', 'teste', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`) VALUES
(1, 'juninho souza silva', '6680994321', 'juninho_silva@gmail.com', '$2y$10$HhxEvSgul9sCJyioDWfDD.yqCfgukkcuP3gbXTPzFw55Y7qSKOmz.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `senha`) VALUES
(1, 'administrador01', 'adoleta@976854');

-- --------------------------------------------------------

-- Índices para tabelas despejadas
--

--
-- Índices para tabela `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtosgeral`
--
ALTER TABLE `produtosgeral`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_produtos2`
--
ALTER TABLE `tb_produtos2`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `produtosgeral`
--
ALTER TABLE `produtosgeral`
  MODIFY `ID` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `tb_produtos2`
--
ALTER TABLE `tb_produtos2`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
>>>>>>> 9c7dfa9f6633226fd9780751280e0f40e7712039
