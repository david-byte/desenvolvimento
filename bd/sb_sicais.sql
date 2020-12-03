-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Dez-2020 às 04:57
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sb_sicais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acidentado`
--

CREATE TABLE `acidentado` (
  `id_acidentado` int(11) NOT NULL,
  `idade` int(11) NOT NULL,
  `fk_id_posto_graduacao` int(11) NOT NULL,
  `fk_id_om` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acidente`
--

CREATE TABLE `acidente` (
  `id_acidente` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_acidente` datetime NOT NULL,
  `medidas_preventivas` varchar(100) NOT NULL,
  `fk_id_om` int(11) NOT NULL,
  `fk_id_acidentado` int(11) NOT NULL,
  `fk_id_situacao` int(11) NOT NULL,
  `fk_id_gradacao` int(11) NOT NULL,
  `fk_id_tipo` int(11) NOT NULL,
  `fk_users_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aspecto`
--

CREATE TABLE `aspecto` (
  `id_aspecto` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `id_cidade` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fk_id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `c_a_mil`
--

CREATE TABLE `c_a_mil` (
  `id_c_a_mil` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `sigla` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `uf` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fator`
--

CREATE TABLE `fator` (
  `id_fator` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatores_contribuintes`
--

CREATE TABLE `fatores_contribuintes` (
  `id_fatores_contribuintes` int(11) NOT NULL,
  `fk_id_terminologia` int(11) NOT NULL,
  `fk_id_aspecto` int(11) NOT NULL,
  `fk_id_fator` int(11) NOT NULL,
  `fk_id_acidente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gradacao`
--

CREATE TABLE `gradacao` (
  `id_gradacao` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `om`
--

CREATE TABLE `om` (
  `id_om` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sigla` varchar(45) NOT NULL,
  `codom` varchar(45) NOT NULL,
  `fk_id_cidade` int(11) NOT NULL,
  `fk_id_c_a_mil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posto_graduacao`
--

CREATE TABLE `posto_graduacao` (
  `id_posto_graduacao` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `sigla` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id_situacao` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `terminologia`
--

CREATE TABLE `terminologia` (
  `id_terminologia` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `identidade` varchar(45) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ramal` varchar(45) DEFAULT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(10) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `active` tinyint(3) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `fk_id_posto_graduacao` int(11) DEFAULT NULL,
  `fk_om_id_om` int(11) DEFAULT NULL,
  `nome_guerra` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `cpf`, `identidade`, `password`, `email`, `phone`, `ramal`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `fk_id_posto_graduacao`, `fk_om_id_om`, `nome_guerra`) VALUES
(1, '127.0.0.1', 'administrator', NULL, NULL, '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', 'admin@admin.com', '0', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1268889823, 1, 'Admin', 'istrator', 'ADMIN', NULL, NULL, NULL),
(2, '::1', NULL, NULL, NULL, '$2y$10$B64QjlypeXlt9AysQ/B7weZN06HEhkvI/3Rls0PuVsFdb0.B.cwKW', 'davidanderson04@live.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1606967169, NULL, 1, 'David Anderson Lopes de Araujo', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acidentado`
--
ALTER TABLE `acidentado`
  ADD PRIMARY KEY (`id_acidentado`),
  ADD UNIQUE KEY `id_acidentado_UNIQUE` (`id_acidentado`),
  ADD KEY `fk_acidentado_posto_graduacao1_idx` (`fk_id_posto_graduacao`),
  ADD KEY `fk_acidentado_om1_idx` (`fk_id_om`);

--
-- Índices para tabela `acidente`
--
ALTER TABLE `acidente`
  ADD PRIMARY KEY (`id_acidente`),
  ADD UNIQUE KEY `id_acidente_UNIQUE` (`id_acidente`),
  ADD KEY `fk_acidente_om1_idx` (`fk_id_om`),
  ADD KEY `fk_acidente_acidentado1_idx` (`fk_id_acidentado`),
  ADD KEY `fk_acidente_situacao1_idx` (`fk_id_situacao`),
  ADD KEY `fk_acidente_gradacao1_idx` (`fk_id_gradacao`),
  ADD KEY `fk_acidente_tipo1_idx` (`fk_id_tipo`),
  ADD KEY `fk_acidente_users1_idx` (`fk_users_id`);

--
-- Índices para tabela `aspecto`
--
ALTER TABLE `aspecto`
  ADD PRIMARY KEY (`id_aspecto`),
  ADD UNIQUE KEY `id_aspecto_UNIQUE` (`id_aspecto`);

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id_cidade`),
  ADD UNIQUE KEY `id_cidade_UNIQUE` (`id_cidade`),
  ADD KEY `fk_cidade_estado1_idx` (`fk_id_estado`);

--
-- Índices para tabela `c_a_mil`
--
ALTER TABLE `c_a_mil`
  ADD PRIMARY KEY (`id_c_a_mil`),
  ADD UNIQUE KEY `id_c_a_mil_UNIQUE` (`id_c_a_mil`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD UNIQUE KEY `id_estado_UNIQUE` (`id_estado`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`),
  ADD UNIQUE KEY `uf_UNIQUE` (`uf`);

--
-- Índices para tabela `fator`
--
ALTER TABLE `fator`
  ADD PRIMARY KEY (`id_fator`),
  ADD UNIQUE KEY `id_fator_UNIQUE` (`id_fator`);

--
-- Índices para tabela `fatores_contribuintes`
--
ALTER TABLE `fatores_contribuintes`
  ADD PRIMARY KEY (`id_fatores_contribuintes`),
  ADD UNIQUE KEY `id_fatores_contribuintes_UNIQUE` (`id_fatores_contribuintes`),
  ADD KEY `fk_fatores_contribuintes_terminologia1_idx` (`fk_id_terminologia`),
  ADD KEY `fk_fatores_contribuintes_aspecto1_idx` (`fk_id_aspecto`),
  ADD KEY `fk_fatores_contribuintes_fator1_idx` (`fk_id_fator`),
  ADD KEY `fk_fatores_contribuintes_acidente1_idx` (`fk_id_acidente`);

--
-- Índices para tabela `gradacao`
--
ALTER TABLE `gradacao`
  ADD PRIMARY KEY (`id_gradacao`),
  ADD UNIQUE KEY `id_gradacao_UNIQUE` (`id_gradacao`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `om`
--
ALTER TABLE `om`
  ADD PRIMARY KEY (`id_om`),
  ADD UNIQUE KEY `id_om_UNIQUE` (`id_om`),
  ADD KEY `fk_om_cidade1_idx` (`fk_id_cidade`),
  ADD KEY `fk_om_c_a_mil1_idx` (`fk_id_c_a_mil`);

--
-- Índices para tabela `posto_graduacao`
--
ALTER TABLE `posto_graduacao`
  ADD PRIMARY KEY (`id_posto_graduacao`),
  ADD UNIQUE KEY `id_posto_graduacao_UNIQUE` (`id_posto_graduacao`),
  ADD UNIQUE KEY `sigla_UNIQUE` (`sigla`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Índices para tabela `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id_situacao`),
  ADD UNIQUE KEY `id_situacao_UNIQUE` (`id_situacao`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Índices para tabela `terminologia`
--
ALTER TABLE `terminologia`
  ADD PRIMARY KEY (`id_terminologia`),
  ADD UNIQUE KEY `id_terminologia_UNIQUE` (`id_terminologia`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`),
  ADD UNIQUE KEY `id_tipo_UNIQUE` (`id_tipo`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `identidade_UNIQUE` (`identidade`),
  ADD KEY `fk_users_posto_graduacao1_idx` (`fk_id_posto_graduacao`),
  ADD KEY `fk_users_om1_idx` (`fk_om_id_om`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acidentado`
--
ALTER TABLE `acidentado`
  MODIFY `id_acidentado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `acidente`
--
ALTER TABLE `acidente`
  MODIFY `id_acidente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `aspecto`
--
ALTER TABLE `aspecto`
  MODIFY `id_aspecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id_cidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `c_a_mil`
--
ALTER TABLE `c_a_mil`
  MODIFY `id_c_a_mil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fator`
--
ALTER TABLE `fator`
  MODIFY `id_fator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `fatores_contribuintes`
--
ALTER TABLE `fatores_contribuintes`
  MODIFY `id_fatores_contribuintes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gradacao`
--
ALTER TABLE `gradacao`
  MODIFY `id_gradacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `om`
--
ALTER TABLE `om`
  MODIFY `id_om` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `posto_graduacao`
--
ALTER TABLE `posto_graduacao`
  MODIFY `id_posto_graduacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id_situacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `terminologia`
--
ALTER TABLE `terminologia`
  MODIFY `id_terminologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `acidentado`
--
ALTER TABLE `acidentado`
  ADD CONSTRAINT `fk_acidentado_om1` FOREIGN KEY (`fk_id_om`) REFERENCES `om` (`id_om`),
  ADD CONSTRAINT `fk_acidentado_posto_graduacao1` FOREIGN KEY (`fk_id_posto_graduacao`) REFERENCES `posto_graduacao` (`id_posto_graduacao`);

--
-- Limitadores para a tabela `acidente`
--
ALTER TABLE `acidente`
  ADD CONSTRAINT `fk_acidente_acidentado1` FOREIGN KEY (`fk_id_acidentado`) REFERENCES `acidentado` (`id_acidentado`),
  ADD CONSTRAINT `fk_acidente_gradacao1` FOREIGN KEY (`fk_id_gradacao`) REFERENCES `gradacao` (`id_gradacao`),
  ADD CONSTRAINT `fk_acidente_om1` FOREIGN KEY (`fk_id_om`) REFERENCES `om` (`id_om`),
  ADD CONSTRAINT `fk_acidente_situacao1` FOREIGN KEY (`fk_id_situacao`) REFERENCES `situacao` (`id_situacao`),
  ADD CONSTRAINT `fk_acidente_tipo1` FOREIGN KEY (`fk_id_tipo`) REFERENCES `tipo` (`id_tipo`),
  ADD CONSTRAINT `fk_acidente_users1` FOREIGN KEY (`fk_users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_id_acidente` FOREIGN KEY (`id_acidente`) REFERENCES `acidente` (`id_acidente`);

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_estado1` FOREIGN KEY (`fk_id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Limitadores para a tabela `fatores_contribuintes`
--
ALTER TABLE `fatores_contribuintes`
  ADD CONSTRAINT `fk_fatores_contribuintes_acidente1` FOREIGN KEY (`fk_id_acidente`) REFERENCES `acidente` (`id_acidente`),
  ADD CONSTRAINT `fk_fatores_contribuintes_aspecto1` FOREIGN KEY (`fk_id_aspecto`) REFERENCES `aspecto` (`id_aspecto`),
  ADD CONSTRAINT `fk_fatores_contribuintes_fator1` FOREIGN KEY (`fk_id_fator`) REFERENCES `fator` (`id_fator`),
  ADD CONSTRAINT `fk_fatores_contribuintes_terminologia1` FOREIGN KEY (`fk_id_terminologia`) REFERENCES `terminologia` (`id_terminologia`);

--
-- Limitadores para a tabela `om`
--
ALTER TABLE `om`
  ADD CONSTRAINT `fk_om_c_a_mil1` FOREIGN KEY (`fk_id_c_a_mil`) REFERENCES `c_a_mil` (`id_c_a_mil`),
  ADD CONSTRAINT `fk_om_cidade1` FOREIGN KEY (`fk_id_cidade`) REFERENCES `cidade` (`id_cidade`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_om1` FOREIGN KEY (`fk_om_id_om`) REFERENCES `om` (`id_om`),
  ADD CONSTRAINT `fk_users_posto_graduacao1` FOREIGN KEY (`fk_id_posto_graduacao`) REFERENCES `posto_graduacao` (`id_posto_graduacao`);

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
