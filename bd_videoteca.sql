-- Database: `db_videoteca`
--
CREATE DATABASE IF NOT EXISTS `db_videoteca` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_cs;
USE `db_videoteca`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_categoria` smallint(5) NOT NULL,
  `nome_categoria` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Ação'),
(2, 'Animação'),
(3, 'Infantil'),
(4, 'Classico'),
(5, 'Comédia'),
(6, 'Documentário'),
(7, 'Drama'),
(8, 'Esportes'),
(9, 'Ficção'),
(10, 'Familia'),
(11, 'Suspense'),
(12, 'Games'),
(13, 'Musical'),
(14, 'Terror');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_classificacao`
--

CREATE TABLE `tb_classificacao` (
  `id_filme` smallint(5) NOT NULL,
  `id_usuario` smallint(5) NOT NULL,
  `avaliacao_classificacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_filmes`
--

CREATE TABLE `tb_filmes` (
  `id_filme` smallint(5) NOT NULL,
  `titulo_filme` varchar(255) NOT NULL,
  `descricao_filme` text NOT NULL,
  `ano_filme` year(4) DEFAULT NULL,
  `duracao_filme` smallint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_filmes`
--

INSERT INTO `tb_filmes` (`id_filme`, `titulo_filme`, `descricao_filme`, `ano_filme`, `duracao_filme`) VALUES
(1009, 'Grito de Horror', 'After a bizarre and near fatal encounter with a serial killer, a television newswoman is sent to a remote mountain resort whose residents may not be what they seem.', 1981, 91),
(1010, 'Bananaas de Pijamas II', 'Um monte de bananas de pijamas correndo pelas escadas.', 2009, 129);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_filmesporcategoria`
--

CREATE TABLE `tb_filmesporcategoria` (
  `id_filme` smallint(5) NOT NULL,
  `id_categoria` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_filmesporcategoria`
--

INSERT INTO `tb_filmesporcategoria` (`id_filme`, `id_categoria`) VALUES
(1009, 1),
(1010, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_listadesejos`
--

CREATE TABLE `tb_listadesejos` (
  `id_usuario` smallint(5) NOT NULL,
  `id_filme` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` smallint(5) NOT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `sobrenome_usuario` varchar(45) NOT NULL,
  `email_usuario` varchar(50) DEFAULT NULL,
  `senha_usuario` varchar(16) NOT NULL,
  `status_usuario` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nome_usuario`, `sobrenome_usuario`, `email_usuario`, `senha_usuario`, `status_usuario`) VALUES
(1, 'MARY', 'SMITH', 'MARY.SMITH@sakilacustomer.org', '1913 Hanoi Way', 1),
(2, 'PATRICIA', 'JOHNSON', 'PATRICIA.JOHNSON@sakilacustomer.org', '1121 Loja Avenue', 1),
(3, 'LINDA', 'WILLIAMS', 'LINDA.WILLIAMS@sakilacustomer.org', '692 Joliet Stree', 1),
(4, 'BARBARA', 'JONES', 'BARBARA.JONES@sakilacustomer.org', '1566 Inegl Manor', 1),
(5, 'ELIZABETH', 'BROWN', 'ELIZABETH.BROWN@sakilacustomer.org', '53 Idfu Parkway', 1),
(6, 'JENNIFER', 'DAVIS', 'JENNIFER.DAVIS@sakilacustomer.org', '1795 Santiago de', 1),
(7, 'MARIA', 'MILLER', 'MARIA.MILLER@sakilacustomer.org', '900 Santiago de ', 1),
(8, 'SUSAN', 'WILSON', 'SUSAN.WILSON@sakilacustomer.org', '478 Joliet Way', 1),
(9, 'MARGARET', 'MOORE', 'MARGARET.MOORE@sakilacustomer.org', '613 Korolev Driv', 1),
(10, 'DOROTHY', 'TAYLOR', 'DOROTHY.TAYLOR@sakilacustomer.org', '1531 Sal Drive', 1),
(11, 'LISA', 'ANDERSON', 'LISA.ANDERSON@sakilacustomer.org', '1542 Tarlac Park', 1),
(12, 'NANCY', 'THOMAS', 'NANCY.THOMAS@sakilacustomer.org', '808 Bhopal Manor', 1),
(13, 'KAREN', 'JACKSON', 'KAREN.JACKSON@sakilacustomer.org', '270 Amroha Parkw', 1),
(14, 'BETTY', 'WHITE', 'BETTY.WHITE@sakilacustomer.org', '770 Bydgoszcz Av', 1),
(15, 'HELEN', 'HARRIS', 'HELEN.HARRIS@sakilacustomer.org', '419 Iligan Lane', 1),
(16, 'SANDRA', 'MARTIN', 'SANDRA.MARTIN@sakilacustomer.org', '360 Toulouse Par', 0),
(17, 'DONNA', 'THOMPSON', 'DONNA.THOMPSON@sakilacustomer.org', '270 Toulon Boule', 1),
(18, 'CAROL', 'GARCIA', 'CAROL.GARCIA@sakilacustomer.org', '320 Brest Avenue', 1),
(19, 'RUTH', 'MARTINEZ', 'RUTH.MARTINEZ@sakilacustomer.org', '1417 Lancaster A', 1),
(20, 'SHARON', 'ROBINSON', 'SHARON.ROBINSON@sakilacustomer.org', '1688 Okara Way', 1),
(21, 'MICHELLE', 'CLARK', 'MICHELLE.CLARK@sakilacustomer.org', '262 A Corua (La ', 1),
(22, 'LAURA', 'RODRIGUEZ', 'LAURA.RODRIGUEZ@sakilacustomer.org', '28 Charlotte Ama', 1),
(23, 'SARAH', 'LEWIS', 'SARAH.LEWIS@sakilacustomer.org', '1780 Hino Boulev', 1),
(24, 'KIMBERLY', 'LEE', 'KIMBERLY.LEE@sakilacustomer.org', '96 Tafuna Way', 1),
(25, 'DEBORAH', 'WALKER', 'DEBORAH.WALKER@sakilacustomer.org', '934 San Felipe d', 1),
(26, 'JESSICA', 'HALL', 'JESSICA.HALL@sakilacustomer.org', '18 Duisburg Boul', 1),
(27, 'SHIRLEY', 'ALLEN', 'SHIRLEY.ALLEN@sakilacustomer.org', '217 Botshabelo P', 1),
(28, 'CYNTHIA', 'YOUNG', 'CYNTHIA.YOUNG@sakilacustomer.org', '1425 Shikarpur M', 1),
(29, 'ANGELA', 'HERNANDEZ', 'ANGELA.HERNANDEZ@sakilacustomer.org', '786 Aurora Avenu', 1),
(30, 'MELISSA', 'KING', 'MELISSA.KING@sakilacustomer.org', '1668 Anpolis Str', 1),
(31, 'BRENDA', 'WRIGHT', 'BRENDA.WRIGHT@sakilacustomer.org', '33 Gorontalo Way', 1),
(32, 'AMY', 'LOPEZ', 'AMY.LOPEZ@sakilacustomer.org', '176 Mandaluyong ', 1),
(33, 'ANNA', 'HILL', 'ANNA.HILL@sakilacustomer.org', '127 Purnea (Purn', 1),
(34, 'REBECCA', 'SCOTT', 'REBECCA.SCOTT@sakilacustomer.org', '61 Tama Street', 1),
(35, 'VIRGINIA', 'GREEN', 'VIRGINIA.GREEN@sakilacustomer.org', '391 Callao Drive', 1),
(36, 'KATHLEEN', 'ADAMS', 'KATHLEEN.ADAMS@sakilacustomer.org', '334 Munger (Mong', 1),
(37, 'PAMELA', 'BAKER', 'PAMELA.BAKER@sakilacustomer.org', '1440 Fukuyama Lo', 1),
(38, 'MARTHA', 'GONZALEZ', 'MARTHA.GONZALEZ@sakilacustomer.org', '269 Cam Ranh Par', 1),
(39, 'DEBRA', 'NELSON', 'DEBRA.NELSON@sakilacustomer.org', '306 Antofagasta ', 1),
(40, 'AMANDA', 'CARTER', 'AMANDA.CARTER@sakilacustomer.org', '671 Graz Street', 1),
(41, 'STEPHANIE', 'MITCHELL', 'STEPHANIE.MITCHELL@sakilacustomer.org', '42 Brindisi Plac', 1),
(42, 'CAROLYN', 'PEREZ', 'CAROLYN.PEREZ@sakilacustomer.org', '1632 Bislig Aven', 1),
(43, 'CHRISTINE', 'ROBERTS', 'CHRISTINE.ROBERTS@sakilacustomer.org', '1447 Imus Way', 1),
(44, 'MARIE', 'TURNER', 'MARIE.TURNER@sakilacustomer.org', '1998 Halifax Dri', 1),
(45, 'JANET', 'PHILLIPS', 'JANET.PHILLIPS@sakilacustomer.org', '1718 Valencia St', 1),
(46, 'CATHERINE', 'CAMPBELL', 'CATHERINE.CAMPBELL@sakilacustomer.org', '46 Pjatigorsk La', 1),
(47, 'FRANCES', 'PARKER', 'FRANCES.PARKER@sakilacustomer.org', '686 Garland Mano', 1),
(48, 'ANN', 'EVANS', 'ANN.EVANS@sakilacustomer.org', '909 Garland Mano', 1),
(49, 'JOYCE', 'EDWARDS', 'JOYCE.EDWARDS@sakilacustomer.org', '725 Isesaki Plac', 1),
(50, 'DIANE', 'COLLINS', 'DIANE.COLLINS@sakilacustomer.org', '115 Hidalgo Park', 1),
(51, 'ALICE', 'STEWART', 'ALICE.STEWART@sakilacustomer.org', '1135 Izumisano P', 1),
(52, 'JULIE', 'SANCHEZ', 'JULIE.SANCHEZ@sakilacustomer.org', '939 Probolinggo ', 1),
(53, 'HEATHER', 'MORRIS', 'HEATHER.MORRIS@sakilacustomer.org', '17 Kabul Bouleva', 1),
(54, 'TERESA', 'ROGERS', 'TERESA.ROGERS@sakilacustomer.org', '1964 Allappuzha ', 1),
(55, 'DORIS', 'REED', 'DORIS.REED@sakilacustomer.org', '1697 Kowloon and', 1),
(56, 'GLORIA', 'COOK', 'GLORIA.COOK@sakilacustomer.org', '1668 Saint Louis', 1),
(57, 'EVELYN', 'MORGAN', 'EVELYN.MORGAN@sakilacustomer.org', '943 Tokat Street', 1),
(58, 'JEAN', 'BELL', 'JEAN.BELL@sakilacustomer.org', '1114 Liepaja Str', 1),
(59, 'CHERYL', 'MURPHY', 'CHERYL.MURPHY@sakilacustomer.org', '1213 Ranchi Park', 1),
(60, 'MILDRED', 'BAILEY', 'MILDRED.BAILEY@sakilacustomer.org', '81 Hodeida Way', 1),
(61, 'KATHERINE', 'RIVERA', 'KATHERINE.RIVERA@sakilacustomer.org', '915 Ponce Place', 1),
(62, 'JOAN', 'COOPER', 'JOAN.COOPER@sakilacustomer.org', '1717 Guadalajara', 1),
(63, 'ASHLEY', 'RICHARDSON', 'ASHLEY.RICHARDSON@sakilacustomer.org', '1214 Hanoi Way', 1),
(64, 'JUDITH', 'COX', 'JUDITH.COX@sakilacustomer.org', '1966 Amroha Aven', 0),
(65, 'ROSE', 'HOWARD', 'ROSE.HOWARD@sakilacustomer.org', '698 Otsu Street', 1),
(66, 'JANICE', 'WARD', 'JANICE.WARD@sakilacustomer.org', '1150 Kimchon Man', 1),
(67, 'KELLY', 'TORRES', 'KELLY.TORRES@sakilacustomer.org', '1586 Guaruj Plac', 1),
(68, 'NICOLE', 'PETERSON', 'NICOLE.PETERSON@sakilacustomer.org', '57 Arlington Man', 1),
(69, 'JUDY', 'GRAY', 'JUDY.GRAY@sakilacustomer.org', '1031 Daugavpils ', 1),
(70, 'CHRISTINA', 'RAMIREZ', 'CHRISTINA.RAMIREZ@sakilacustomer.org', '1124 Buenaventur', 1),
(71, 'KATHY', 'JAMES', 'KATHY.JAMES@sakilacustomer.org', '492 Cam Ranh Str', 1),
(72, 'THERESA', 'WATSON', 'THERESA.WATSON@sakilacustomer.org', '89 Allappuzha (A', 1),
(73, 'BEVERLY', 'BROOKS', 'BEVERLY.BROOKS@sakilacustomer.org', '1947 Poos de Cal', 1),
(74, 'DENISE', 'KELLY', 'DENISE.KELLY@sakilacustomer.org', '1206 Dos Quebrad', 1),
(75, 'TAMMY', 'SANDERS', 'TAMMY.SANDERS@sakilacustomer.org', '1551 Rampur Lane', 1),
(76, 'IRENE', 'PRICE', 'IRENE.PRICE@sakilacustomer.org', '602 Paarl Street', 1),
(77, 'JANE', 'BENNETT', 'JANE.BENNETT@sakilacustomer.org', '1692 Ede Loop', 1),
(78, 'LORI', 'WOOD', 'LORI.WOOD@sakilacustomer.org', '936 Salzburg Lan', 1),
(79, 'RACHEL', 'BARNES', 'RACHEL.BARNES@sakilacustomer.org', '586 Tete Way', 1),
(80, 'MARILYN', 'ROSS', 'MARILYN.ROSS@sakilacustomer.org', '1888 Kabul Drive', 1),
(81, 'ANDREA', 'HENDERSON', 'ANDREA.HENDERSON@sakilacustomer.org', '320 Baiyin Parkw', 1),
(82, 'KATHRYN', 'COLEMAN', 'KATHRYN.COLEMAN@sakilacustomer.org', '927 Baha Blanca ', 1),
(83, 'LOUISE', 'JENKINS', 'LOUISE.JENKINS@sakilacustomer.org', '929 Tallahassee ', 1),
(84, 'SARA', 'PERRY', 'SARA.PERRY@sakilacustomer.org', '125 Citt del Vat', 1),
(85, 'ANNE', 'POWELL', 'ANNE.POWELL@sakilacustomer.org', '1557 Ktahya Boul', 1),
(86, 'JACQUELINE', 'LONG', 'JACQUELINE.LONG@sakilacustomer.org', '870 Ashqelon Loo', 1),
(87, 'WANDA', 'PATTERSON', 'WANDA.PATTERSON@sakilacustomer.org', '1740 Portoviejo ', 1),
(88, 'BONNIE', 'HUGHES', 'BONNIE.HUGHES@sakilacustomer.org', '1942 Ciparay Par', 1),
(89, 'JULIA', 'FLORES', 'JULIA.FLORES@sakilacustomer.org', '1926 El Alto Ave', 1),
(90, 'RUBY', 'WASHINGTON', 'RUBY.WASHINGTON@sakilacustomer.org', '1952 Chatsworth ', 1),
(91, 'LOIS', 'BUTLER', 'LOIS.BUTLER@sakilacustomer.org', '1370 Le Mans Ave', 1),
(92, 'TINA', 'SIMMONS', 'TINA.SIMMONS@sakilacustomer.org', '984 Effon-Alaiye', 1),
(93, 'PHYLLIS', 'FOSTER', 'PHYLLIS.FOSTER@sakilacustomer.org', '832 Nakhon Sawan', 1),
(94, 'NORMA', 'GONZALES', 'NORMA.GONZALES@sakilacustomer.org', '152 Kitwe Parkwa', 1),
(95, 'PAULA', 'BRYANT', 'PAULA.BRYANT@sakilacustomer.org', '1697 Tanauan Lan', 1),
(96, 'DIANA', 'ALEXANDER', 'DIANA.ALEXANDER@sakilacustomer.org', '1308 Arecibo Way', 1),
(97, 'ANNIE', 'RUSSELL', 'ANNIE.RUSSELL@sakilacustomer.org', '1599 Plock Drive', 1),
(98, 'LILLIAN', 'GRIFFIN', 'LILLIAN.GRIFFIN@sakilacustomer.org', '669 Firozabad Lo', 1),
(99, 'EMILY', 'DIAZ', 'EMILY.DIAZ@sakilacustomer.org', '588 Vila Velha M', 1),
(100, 'ROBIN', 'HAYES', 'ROBIN.HAYES@sakilacustomer.org', '1913 Kamakura Pl', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `tb_classificacao`
--
ALTER TABLE `tb_classificacao`
  ADD KEY `id_filme` (`id_filme`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `tb_filmes`
--
ALTER TABLE `tb_filmes`
  ADD PRIMARY KEY (`id_filme`),
  ADD KEY `idx_titulo` (`titulo_filme`);

--
-- Indexes for table `tb_filmesporcategoria`
--
ALTER TABLE `tb_filmesporcategoria`
  ADD KEY `fk_filmesporcategoriaFilmes` (`id_filme`),
  ADD KEY `fk_filmesporcategoriaCategoria` (`id_categoria`);

--
-- Indexes for table `tb_listadesejos`
--
ALTER TABLE `tb_listadesejos`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_filme` (`id_filme`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tb_filmes`
--
ALTER TABLE `tb_filmes`
  MODIFY `id_filme` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_classificacao`
--
ALTER TABLE `tb_classificacao`
  ADD CONSTRAINT `fk_classificacaoFilme` FOREIGN KEY (`id_filme`) REFERENCES `tb_filmes` (`id_filme`),
  ADD CONSTRAINT `tb_classificacao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Limitadores para a tabela `tb_filmesporcategoria`
--
ALTER TABLE `tb_filmesporcategoria`
  ADD CONSTRAINT `fk_filmesporcategoriaCategoria` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_filmesporcategoriaFilmes` FOREIGN KEY (`id_filme`) REFERENCES `tb_filmes` (`id_filme`);

--
-- Limitadores para a tabela `tb_listadesejos`
--
ALTER TABLE `tb_listadesejos`
  ADD CONSTRAINT `fk_listadesejosFilmes` FOREIGN KEY (`id_filme`) REFERENCES `tb_filmes` (`id_filme`),
  ADD CONSTRAINT `fk_listadesejosUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
