-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql02-farm57.uni5.net
-- Tempo de geração: 29/09/2019 às 16:22
-- Versão do servidor: 5.5.45-log
-- Versão do PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `wpinfor09`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbaluno`
--

CREATE TABLE IF NOT EXISTS `tbaluno` (
  `idaluno` int(100) unsigned NOT NULL,
  `matricula_aluno` int(11) NOT NULL,
  `nome_completo` varchar(255) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `logradouro` varchar(255) NOT NULL,
  `numero` int(10) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(40) NOT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `nome_da_mae` varchar(255) DEFAULT NULL,
  `nome_do_pai` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone_recado` varchar(255) DEFAULT NULL,
  `email_alternativo` varchar(255) DEFAULT NULL,
  `situacao` varchar(255) NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbaluno`
--

INSERT INTO `tbaluno` (`idaluno`, `matricula_aluno`, `nome_completo`, `data_nascimento`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `cep`, `cpf`, `rg`, `nome_da_mae`, `nome_do_pai`, `telefone`, `email`, `telefone_recado`, `email_alternativo`, `situacao`, `usuario`, `senha`, `status`) VALUES
(1, 100, 'Brener De Melo', '2000-03-19', 'Rua asease', 36, '', 'Santa Clara', 'Nova Lima', 'MG', '34035-222', '123.123.125-68', 'MG1239933', 'Ana De Melo', 'Caio De Melo', '(31) 2525-5836', 'teste@teste.com', '(21) 3133-1233', 'teste1@teste.com', '', 'teste4', 'ea892f89fa5c28fddcb5e6db4af79e3ee8cf62db', 'Inativo'),
(2, 101, 'Josiane Camila Santos', '1990-01-18', 'Rua das Amoras', 36, 'Barraco', 'Águas Claras', 'Nova Lima', 'MG', '34000-000', '123.123.126-69', 'MG1239933', 'Eduarda Santos ', 'Ronaldo dos Santos', '(23) 2312-1212', 'teste@teste.com', '(21) 3133-1232', 'teste1@teste.com', '', 'teste1', 'cbd9bc3e31d775fe34ade3a07ce36d382b1afaa8', 'Ativo'),
(3, 102, 'Camila Bernardes Da Silva', '1990-12-12', 'José de Matos', 25, '', 'Vila Do Ouro', 'Nova Lima', 'MG', '35200-000', '125.365.412-23', '14563236', 'Maria Bernardes Da Silva', 'José Da Silva', '(31) 3528-475', 'camila@bernades', '', 'camila5@bernades', '', 'teste2', '96a62ca98bdec7f55343f8cfa594379bdba76cc9', 'Inativo'),
(4, 103, 'Bruno Henrique', '1992-05-20', 'Rua B', 33, '', 'Vila Do Ouro', 'Nova Lima', 'MG', '34001-234', '429.496.722-95', 'MG12354879', 'Maria Beatriz De Barros', 'Antonio De Barros', '(31) 5283-6388', 'bruno@bruno', '', '', '', 'teste1', '17f9b61099ac5e158010e6eb47c30f6b6c64e6fb', 'Inativo'),
(5, 0, 'Wesley dos Santos', '1990-12-12', 'Rua E', 58, '', 'Vila Bela', 'Nova Lima', 'MG', '34001-256', '035.255.252-41', 'mg15248796', 'Benedita Dos Santos Carvalho', 'Pablo Dos Santos', '(31) 2565-8656', 'josivaldo@josivaldo', '', 'josivaldo@jucicleide', '', 'teste', '2e6f9b0d5885b6010f9167787445617f553a735f', 'Ativo'),
(6, 1003, 'Maria Eduarda Silva', '2000-03-24', 'Rua E', 100, 'B', 'Alvorada', 'Nova Lima', 'MG', '34001-235', '859.672.152-25', 'mg25386569', 'Eloiza Da Silva Castro', 'Marcos Castro', '(31) 2568-9745', 'eduarda@silva', '', 'edu@silva', '', 'teste2', 'ef0722d823bb840443be3f608304696dfcaa1e41', 'Inativo'),
(7, 102, 'Otaviano Da Costa Alves', '1999-06-22', 'Rua E', 222, 'N', 'Vila Operária', 'Nova Lima', 'MG', '34001-253', '255.385.365-21', 'mg25369874', 'Antonia Costa Alves', 'Alberto Costa Alves', '(31) 2555-6858', 'otaviano@costa', '', 'otaviano@alves', '', 'teste3', '2f810d8334d71b90860ea4166547cf349d232917', 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbalunos_da_turma`
--

CREATE TABLE IF NOT EXISTS `tbalunos_da_turma` (
  `idaluno_da_turma` int(11) NOT NULL,
  `tbaluno_idaluno` int(100) unsigned NOT NULL,
  `tbturmas_idturma` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbalunos_da_turma`
--

INSERT INTO `tbalunos_da_turma` (`idaluno_da_turma`, `tbaluno_idaluno`, `tbturmas_idturma`) VALUES
(14, 3, 1),
(15, 4, 1),
(16, 5, 1),
(17, 2, 2),
(18, 1, 3),
(19, 6, 2),
(20, 7, 2),
(21, 4, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbarquivos`
--

CREATE TABLE IF NOT EXISTS `tbarquivos` (
  `idarquivo` int(11) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `tipo_arquivo` varchar(255) NOT NULL,
  `caminho_arquivo` varchar(255) NOT NULL,
  `tamanho_arquivo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbarquivos`
--

INSERT INTO `tbarquivos` (`idarquivo`, `nome_arquivo`, `tipo_arquivo`, `caminho_arquivo`, `tamanho_arquivo`) VALUES
(1, 'Horários de Aula - Informática 3ª Etapa', '.jpg', '../arquivos/Desert.jpg', '1.35KB'),
(2, 'Horários de Aula - Enfermagem 2ª Etapa', '.jpg', '../arquivos/Desert.jpg', '858.78KB'),
(3, 'Horários de Aula - Eletrônica 3ª Etapa', '.jpg', '../arquivos/Desert.jpg', '858.78KB'),
(4, 'Nova Vaga de Estágio Prefeitura de Nova Lima', '.jpg', '../arquivos/Desert.jpg', '759.60KB'),
(5, 'Exercício de Banco de Dados - Informática 2ª Etapa', '.jpg', '../arquivos/Desert.jpg', '826.11KB');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbaviso`
--

CREATE TABLE IF NOT EXISTS `tbaviso` (
  `tbaviso_id` int(11) NOT NULL,
  `tipo` varchar(500) NOT NULL,
  `mensagem` varchar(500) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbaviso`
--

INSERT INTO `tbaviso` (`tbaviso_id`, `tipo`, `mensagem`, `data`) VALUES
(1, 'Oportunidade', 'Nova Vaga de Estágio na Utramig', '2019-06-26'),
(2, 'Avisos', 'Não teremos aula no dia 27-06-19', '2019-06-26'),
(3, 'Tarefas', 'Limpar a cozinha', '2019-06-27'),
(4, 'Avisos', 'Mostra Tecnológica acontecerá no dia 05-07', '2019-06-27'),
(5, 'Avisos', 'Alunos da Informática deverão se preparar para a Mostra Tecnológica', '2019-06-27'),
(7, 'Oportunidade', 'Nova Vaga de estágio em Eletrônica', '2019-07-06'),
(8, 'Oportunidade', 'vagas ', '2019-07-06'),
(9, 'Tarefas', 'a123123', '2019-07-29'),
(10, 'Avisos', 'Aulas da Utramig voltarão na Segunda-feira', '2019-08-26'),
(11, 'Avisos', 'Aviso de teste', '2019-08-31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdisciplina`
--

CREATE TABLE IF NOT EXISTS `tbdisciplina` (
  `iddisciplina` int(100) unsigned NOT NULL,
  `tbprofessor_idprofessor` int(10) unsigned NOT NULL,
  `nome_disciplina` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbdisciplina`
--

INSERT INTO `tbdisciplina` (`iddisciplina`, `tbprofessor_idprofessor`, `nome_disciplina`) VALUES
(1, 1, 'Ambiente Operacional'),
(2, 2, 'Linguagem Técnica de Programação'),
(3, 4, 'Primeiros Socorros'),
(5, 1, 'Tecnologia de Sistemas da Informação'),
(6, 2, 'Projetos de Sistemas da Informação'),
(7, 3, 'Eletrônica Digital'),
(8, 4, 'Higiene e Limpeza'),
(9, 6, 'Eletrotécnica'),
(10, 4, 'Enfermagem Neuro Psiquiátrica '),
(11, 7, 'Administração de Empresas'),
(12, 6, 'Normas e Legislação');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbdisciplinas_da_turma`
--

CREATE TABLE IF NOT EXISTS `tbdisciplinas_da_turma` (
  `iddisciplina_da_turma` int(100) NOT NULL,
  `tbturmas_idturma` int(100) NOT NULL,
  `tbdisciplina_iddisciplina` int(100) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbdisciplinas_da_turma`
--

INSERT INTO `tbdisciplinas_da_turma` (`iddisciplina_da_turma`, `tbturmas_idturma`, `tbdisciplina_iddisciplina`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 1, 2),
(4, 1, 5),
(5, 1, 6),
(6, 3, 7),
(7, 2, 8),
(8, 4, 10),
(9, 3, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbfaltas`
--

CREATE TABLE IF NOT EXISTS `tbfaltas` (
  `idfaltas` int(11) NOT NULL,
  `iddisciplina_turma_fk` int(11) DEFAULT NULL,
  `idaluno_turma_fk` int(11) DEFAULT NULL,
  `horario1` enum('P','F') NOT NULL DEFAULT 'P',
  `horario2` enum('P','F') NOT NULL DEFAULT 'P',
  `horario3` enum('P','F') NOT NULL DEFAULT 'P',
  `horario4` enum('P','F') NOT NULL DEFAULT 'P',
  `horario5` enum('P','F') NOT NULL DEFAULT 'P',
  `data_da_falta` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbfaltas`
--

INSERT INTO `tbfaltas` (`idfaltas`, `iddisciplina_turma_fk`, `idaluno_turma_fk`, `horario1`, `horario2`, `horario3`, `horario4`, `horario5`, `data_da_falta`) VALUES
(1, 1, 14, 'P', 'F', 'F', 'P', 'P', '2019-06-19'),
(2, 1, 14, 'P', 'F', 'P', 'P', 'P', '2019-06-16'),
(42, 6, 18, 'P', 'P', 'P', 'P', 'P', '2019-06-19'),
(43, 2, 17, 'P', 'P', 'P', 'P', 'F', '2019-06-18'),
(44, 2, 19, 'P', 'F', 'P', 'P', 'P', '2019-06-18'),
(45, 2, 20, 'P', 'P', 'F', 'P', 'F', '2019-06-18'),
(46, 2, 14, 'P', 'P', 'P', 'P', 'P', '2019-06-18'),
(47, 1, 15, 'P', 'F', 'F', 'F', 'P', '2019-06-18'),
(50, 1, 15, 'P', 'P', 'P', 'P', 'P', '2019-06-20'),
(51, 1, 16, 'F', 'F', 'F', 'P', 'P', '2019-06-20'),
(52, 3, 14, 'P', 'P', 'P', 'P', 'P', '2019-06-20'),
(53, 3, 15, 'P', 'P', 'P', 'P', 'P', '2019-06-20'),
(54, 3, 16, 'F', 'F', 'F', 'F', 'F', '2019-06-20'),
(55, 5, 14, 'P', 'P', 'P', 'P', 'P', '2019-06-21'),
(56, 5, 15, 'P', 'P', 'P', 'P', 'P', '2019-06-21'),
(57, 5, 16, 'F', 'F', 'F', 'F', 'P', '2019-06-21'),
(59, 5, 14, 'P', 'P', 'P', 'P', 'P', '2019-06-27'),
(60, 5, 15, 'P', 'P', 'P', 'P', 'P', '2019-06-27'),
(61, 5, 16, 'F', 'P', 'P', 'P', 'P', '2019-06-27'),
(62, 5, 14, 'P', 'P', 'P', 'P', 'P', '2019-06-28'),
(63, 5, 15, 'P', 'P', 'P', 'P', 'P', '2019-06-28'),
(64, 5, 16, 'F', 'F', 'F', 'P', 'P', '2019-06-28'),
(65, 1, 14, 'P', 'P', 'P', 'P', 'P', '2019-06-18'),
(66, 1, 16, 'P', 'F', 'P', 'P', 'P', '2019-06-18'),
(67, 1, 14, 'F', 'P', 'P', 'P', 'P', '2015-03-25'),
(68, 1, 15, 'P', 'F', 'P', 'P', 'P', '2015-03-25'),
(69, 1, 16, 'P', 'P', 'P', 'F', 'P', '2015-03-25'),
(70, 1, 14, 'P', 'P', 'P', 'P', 'P', '2015-03-12'),
(71, 1, 15, 'F', 'P', 'P', 'P', 'P', '2015-03-12'),
(72, 1, 16, 'P', 'P', 'F', 'P', 'P', '2015-03-12'),
(73, 1, 14, 'P', 'P', 'P', 'P', 'P', '2019-07-05'),
(74, 1, 15, 'F', 'F', 'F', 'P', 'P', '2019-07-05'),
(75, 1, 16, 'P', 'P', 'P', 'P', 'P', '2019-07-05'),
(76, 1, 14, 'F', 'P', 'P', 'P', 'P', '2019-07-11'),
(77, 1, 15, 'F', 'P', 'P', 'P', 'P', '2019-07-11'),
(78, 1, 16, 'P', 'P', 'P', 'P', 'P', '2019-07-11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbnotas`
--

CREATE TABLE IF NOT EXISTS `tbnotas` (
  `idnota` int(11) NOT NULL,
  `iddisciplina_da_turma_fk` int(11) NOT NULL,
  `idaluno_da_turma_fk` int(11) NOT NULL,
  `nota1` double NOT NULL,
  `nota2` double NOT NULL,
  `nota3` double NOT NULL,
  `nota4` double NOT NULL,
  `bimestre` int(11) NOT NULL,
  `n_bimestre` int(11) NOT NULL,
  `etapa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbnotas`
--

INSERT INTO `tbnotas` (`idnota`, `iddisciplina_da_turma_fk`, `idaluno_da_turma_fk`, `nota1`, `nota2`, `nota3`, `nota4`, `bimestre`, `n_bimestre`, `etapa`) VALUES
(161, 2, 17, 10, 0, 0, 0, 0, 1, 2),
(162, 2, 19, 0, 0, 0, 0, 0, 1, 2),
(163, 2, 20, 5, 8, 7, 6, 20, 1, 2),
(164, 2, 17, 0, 0, 0, 0, 0, 2, 2),
(165, 2, 19, 0, 0, 0, 0, 0, 2, 2),
(166, 2, 20, 10, 6, 7, 8, 20, 2, 2),
(167, 7, 17, 0, 0, 0, 0, 0, 1, 2),
(168, 7, 19, 0, 0, 0, 0, 0, 1, 2),
(169, 7, 20, 8, 7, 6, 10, 20, 1, 2),
(170, 7, 17, 0, 0, 0, 0, 0, 2, 2),
(171, 7, 19, 0, 0, 0, 0, 0, 2, 2),
(172, 7, 20, 10, 8, 7, 0, 0, 2, 2),
(173, 1, 14, 10, 4, 0, 4, 15, 1, 2),
(174, 1, 15, 10, 5, 0, 4, 12, 1, 2),
(175, 1, 16, 9, 5, 0, 2, 15, 1, 2),
(177, 1, 15, 0, 0, 0, 0, 0, 2, 2),
(178, 1, 16, 10, 5, 5, 10, 18, 2, 2),
(179, 5, 14, 0, 0, 0, 0, 0, 1, 2),
(180, 5, 15, 0, 0, 0, 0, 0, 1, 2),
(181, 5, 16, 8, 6, 10, 10, 20, 1, 2),
(182, 6, 18, 10, 4, 0, 4, 18, 1, 3),
(183, 3, 14, 0, 0, 0, 0, 0, 1, 3),
(184, 3, 15, 0, 0, 0, 0, 0, 1, 3),
(185, 3, 16, 4, 7, 8, 10, 15, 1, 3),
(186, 4, 14, 0, 0, 0, 0, 0, 1, 3),
(187, 4, 15, 0, 0, 0, 0, 0, 1, 3),
(188, 4, 16, 10, 8, 9, 7, 20, 1, 3),
(189, 4, 14, 0, 0, 0, 0, 0, 2, 3),
(190, 4, 15, 0, 0, 0, 0, 0, 2, 3),
(191, 4, 16, 8, 0, 0, 0, 2, 2, 3),
(192, 3, 14, 0, 0, 0, 0, 0, 2, 3),
(193, 3, 15, 0, 0, 0, 0, 0, 2, 3),
(194, 3, 16, 7, 8, 6, 10, 0, 2, 3),
(195, 5, 14, 0, 0, 0, 0, 0, 2, 3),
(196, 5, 15, 0, 0, 0, 0, 0, 2, 3),
(197, 5, 16, 8, 7, 5, 4, 0, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbprofessor`
--

CREATE TABLE IF NOT EXISTS `tbprofessor` (
  `idprofessor` int(10) unsigned NOT NULL,
  `masp` int(20) NOT NULL,
  `nome_completo` varchar(255) DEFAULT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(40) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `cpf` varchar(40) DEFAULT NULL,
  `formacao` varchar(255) NOT NULL,
  `telefone` varchar(40) NOT NULL,
  `telefone_recado` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_alternativo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbprofessor`
--

INSERT INTO `tbprofessor` (`idprofessor`, `masp`, `nome_completo`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `cep`, `estado`, `rg`, `cpf`, `formacao`, `telefone`, `telefone_recado`, `email`, `email_alternativo`) VALUES
(1, 25156, 'Paulinho Amaral', 'Rua E', 55, 'C', 'Alvorece', 'Belo Horizonte', '0', 'MG', 'MG187722', '132.030.223-32', 'Superior Completo', '(31) 3333-5555', '(31) 2233-4455', 'teste@teste', 'testando@testando'),
(2, 1233, 'Leandro Viana', 'Rua Dos Ypes', 45, '', 'vila Bela', 'Nova Lima', '0', 'MG', 'mg21526369', '236.598.545-65', 'Superior completo em Analise Sistema Da Informação', '(31) 2589-6956', '', 'leandro@viana', 'leandro@utramig'),
(3, 231, 'Alvaro de Matos', 'Rua Trovaldo', 32, 'B', 'Alvorecer', 'Raposos', '0', 'MG', 'MG22332136', '123.123.225-58', 'Superior Completo', '(31) 2465-9899', '(31) 2244-2233', 'alvaro@matos', 'alvaro@alvaro'),
(4, 254, 'Maria Lourdes ', 'Rua Esmeraldas', 33, 'B', 'Barra do céu ', 'Nova Lima', '0', 'MG', 'MG32132155', '335.262.325-55', 'Superior Completo Psicologia', '(31) 3355-4466', '(31) 8899-8844', 'asdasdas@asdasdas', 'asdas@asdasd'),
(5, 695, 'Cristiano Soares ', 'Rua Abolição', 258, '', 'Águas Claras', 'contagem', '', 'MG', 'mg32365896', '253.565.555-51', 'Superior completo em Analise Sistema Da Informação', '(31) 9666-6666', '(31) 2588-9563', 'cristiano@soares', 'cristiano@kjl'),
(6, 256, 'Marcos Paulo', 'rua dos Cristais', 36, '', 'vila são cristovão', 'Itabirito', '', 'MG', 'mg36589425', '125.589.766-74', 'Ensino Superior em Eletrônica', '(31) 2652-8977', '(31) 2598-4666', 'marcos@paulo', 'marcos2@paulo'),
(7, 241, 'Ana Amaral', 'Rua Alvorada', 96, '', 'Bethania', 'Belo Horizonte', '', 'MG', 'mg25938965', '123.659.874-69', 'Ensino Superior em Enfermagem', '(31) 6595-4566', '(31) 2558-9686', 'ana@amaral', 'ana4@amral');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbturmas`
--

CREATE TABLE IF NOT EXISTS `tbturmas` (
  `idturma` int(100) NOT NULL,
  `nome_turma` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `turno` varchar(255) NOT NULL,
  `etapa` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tbturmas`
--

INSERT INTO `tbturmas` (`idturma`, `nome_turma`, `curso`, `turno`, `etapa`) VALUES
(1, 'Informática Pronatec 3ª Etapa Noite', 'Informática', 'Noturno', '3'),
(2, 'Enfermagem Bolsista 3ª Etapa Manhã', 'Enfermagem', 'Manhã', '2'),
(3, 'Eletrônica Pronatec 3ª Etapa', 'Eletrônica', 'Noite', '3'),
(4, 'Informática Pronatec 2ª Etapa Noite', 'Informática', 'Noite', '3'),
(5, 'Enfermagem Pronatec', 'Enfermagem', 'Noite', '2'),
(6, 'Eletrônica 3ª Etapa Noite', 'Eletrônica', 'Noite', '3');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

CREATE TABLE IF NOT EXISTS `tbusuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `telefone` int(100) NOT NULL,
  `cep` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `nomeCompleto` varchar(255) DEFAULT NULL,
  `observacao` text,
  `funcao` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf16;

--
-- Fazendo dump de dados para tabela `tbusuario`
--

INSERT INTO `tbusuario` (`idusuario`, `usuario`, `email`, `senha`, `telefone`, `cep`, `nome`, `dataNascimento`, `celular`, `nomeCompleto`, `observacao`, `funcao`) VALUES
(1, 'TESTE', 'teste@teste1', '59d7ce8a03a7743c243ec38ddafdc2a641fb7e70', 12468, 34001555, 'Josivaldo', NULL, NULL, NULL, NULL, 'aluno'),
(2, 'Bruno', 'brun@bruno', '2e6f9b0d5885b6010f9167787445617f553a735f', 31246598, 34400000, 'Administrador', NULL, NULL, NULL, NULL, 'administrador'),
(15, 'arrouba', 'arrouba@arrouba2', 'daef85dd7a54eb25015c359f4184587504261b14', 123, 123123, 'Jorisclã', NULL, NULL, NULL, NULL, ''),
(16, 'Josias', 'josias@teste', 'billijeans', 998546526, 35445652, 'Josias', '0000-00-00', '996635215', 'Josias Jucelino Billi', 'usuario de teste', '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`idaluno`);

--
-- Índices de tabela `tbalunos_da_turma`
--
ALTER TABLE `tbalunos_da_turma`
  ADD PRIMARY KEY (`idaluno_da_turma`), ADD KEY `tbaluno_idaluno` (`tbaluno_idaluno`), ADD KEY `tbturmas_idturma` (`tbturmas_idturma`);

--
-- Índices de tabela `tbarquivos`
--
ALTER TABLE `tbarquivos`
  ADD PRIMARY KEY (`idarquivo`);

--
-- Índices de tabela `tbaviso`
--
ALTER TABLE `tbaviso`
  ADD PRIMARY KEY (`tbaviso_id`);

--
-- Índices de tabela `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  ADD PRIMARY KEY (`iddisciplina`), ADD KEY `Disciplina_FKIndex1` (`tbprofessor_idprofessor`);

--
-- Índices de tabela `tbdisciplinas_da_turma`
--
ALTER TABLE `tbdisciplinas_da_turma`
  ADD PRIMARY KEY (`iddisciplina_da_turma`), ADD KEY `tbturmas_idturma` (`tbturmas_idturma`), ADD KEY `tbdisciplina_iddisciplina` (`tbdisciplina_iddisciplina`);

--
-- Índices de tabela `tbfaltas`
--
ALTER TABLE `tbfaltas`
  ADD PRIMARY KEY (`idfaltas`), ADD KEY `id_disciplina_turma_fk` (`iddisciplina_turma_fk`), ADD KEY `id_aluno_turma_fk` (`idaluno_turma_fk`);

--
-- Índices de tabela `tbnotas`
--
ALTER TABLE `tbnotas`
  ADD PRIMARY KEY (`idnota`), ADD KEY `iddisciplina_da_turma` (`iddisciplina_da_turma_fk`), ADD KEY `idaluno_da_turma` (`idaluno_da_turma_fk`);

--
-- Índices de tabela `tbprofessor`
--
ALTER TABLE `tbprofessor`
  ADD PRIMARY KEY (`idprofessor`);

--
-- Índices de tabela `tbturmas`
--
ALTER TABLE `tbturmas`
  ADD PRIMARY KEY (`idturma`);

--
-- Índices de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `idaluno` int(100) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `tbalunos_da_turma`
--
ALTER TABLE `tbalunos_da_turma`
  MODIFY `idaluno_da_turma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de tabela `tbarquivos`
--
ALTER TABLE `tbarquivos`
  MODIFY `idarquivo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `tbaviso`
--
ALTER TABLE `tbaviso`
  MODIFY `tbaviso_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
  MODIFY `iddisciplina` int(100) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de tabela `tbdisciplinas_da_turma`
--
ALTER TABLE `tbdisciplinas_da_turma`
  MODIFY `iddisciplina_da_turma` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de tabela `tbfaltas`
--
ALTER TABLE `tbfaltas`
  MODIFY `idfaltas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de tabela `tbnotas`
--
ALTER TABLE `tbnotas`
  MODIFY `idnota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=198;
--
-- AUTO_INCREMENT de tabela `tbprofessor`
--
ALTER TABLE `tbprofessor`
  MODIFY `idprofessor` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `tbturmas`
--
ALTER TABLE `tbturmas`
  MODIFY `idturma` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tbalunos_da_turma`
--
ALTER TABLE `tbalunos_da_turma`
ADD CONSTRAINT `tbaluno_idaluno` FOREIGN KEY (`tbaluno_idaluno`) REFERENCES `tbaluno` (`idaluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `tbturmas_idturma` FOREIGN KEY (`tbturmas_idturma`) REFERENCES `tbturmas` (`idturma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tbdisciplina`
--
ALTER TABLE `tbdisciplina`
ADD CONSTRAINT `tbdisciplina_ibfk_1` FOREIGN KEY (`tbprofessor_idprofessor`) REFERENCES `tbprofessor` (`idprofessor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tbdisciplinas_da_turma`
--
ALTER TABLE `tbdisciplinas_da_turma`
ADD CONSTRAINT `tbdisciplina_iddisciplina_tbdisciplina` FOREIGN KEY (`tbdisciplina_iddisciplina`) REFERENCES `tbdisciplina` (`iddisciplina`) ON DELETE NO ACTION,
ADD CONSTRAINT `tbturmas_idturma_tbdisciplina` FOREIGN KEY (`tbturmas_idturma`) REFERENCES `tbturmas` (`idturma`) ON DELETE NO ACTION;

--
-- Restrições para tabelas `tbfaltas`
--
ALTER TABLE `tbfaltas`
ADD CONSTRAINT `id_aluno_turma_fk` FOREIGN KEY (`idaluno_turma_fk`) REFERENCES `tbalunos_da_turma` (`idaluno_da_turma`),
ADD CONSTRAINT `id_disciplina_turma_fk` FOREIGN KEY (`iddisciplina_turma_fk`) REFERENCES `tbdisciplinas_da_turma` (`iddisciplina_da_turma`);

--
-- Restrições para tabelas `tbnotas`
--
ALTER TABLE `tbnotas`
ADD CONSTRAINT `idaluno_da_turma_constraint` FOREIGN KEY (`idaluno_da_turma_fk`) REFERENCES `tbalunos_da_turma` (`idaluno_da_turma`) ON DELETE NO ACTION,
ADD CONSTRAINT `iddisciplina_da_nota_constraint` FOREIGN KEY (`iddisciplina_da_turma_fk`) REFERENCES `tbdisciplinas_da_turma` (`iddisciplina_da_turma`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
