-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:1024
-- Generation Time: Jun 25, 2020 at 06:50 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `media_id`, `start_date`, `finish_date`, `watch_duration`) VALUES
(18, 2, 2, '2020-06-03 00:00:00', '2020-06-17 00:00:00', 0),
(19, 2, 4, '2020-06-17 00:00:00', '2020-06-23 00:00:00', 0),
(20, 1, 1, '2020-06-03 00:00:00', '2020-06-17 00:00:00', 0),
(21, 1, 4, '2020-06-17 00:00:00', '2020-06-23 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`) VALUES
(1, 1, 'Kill Bill : Volume 1', 'type1', 'status1', '2020-06-01', 'Film de Quentin Tarantino avec Uma Thurman, Lucy Liu, Vivica A. Fox', 'https://media.senscritique.com/media/000016306773/160/Kill_Bill_Volume_1.jpg'),
(2, 1, 'THE GENTLEMEN', 'type1', 'status1', '2020-06-01', 'Guy Ritchie revient à la comédie d\'action avec The Gentlemen, annoncé comme une rencontre choc entre criminel britannique et millionnaires américains. Plus proche de Snatch que du Roi Arthur : la Légende d\'Excalibur, ce nouveau blockbuster est annoncé comme soigné, efficace et drôle, et peut compter, côté casting, sur les présences de Matthew McConaughey (Dallas Buyers Club, Interstellar), Colin Farrell (Dumbo, Mise à mort du cerf sacré), Charlie Hunnam (la série Sons of Anarchy, The lost city of Z) et Hugh Grant (Coup de foudre à Notting Hill, Love actually).', 'https://www.cinetrafic.fr/images/affiches/big/aff_3542020200204192817.jpg?1592900896'),
(3, 1, 'FIRST LOVE, LE DERNIER YAKUZA', 'type1', 'status1', '2020-06-01', 'Une nuit, à Tokyo. Leo, un jeune boxeur, rencontre Monica, une callgirl impliquée dans un trafic de drogue. Toute la nuit, un policier corrompu, un yakuza, son ennemi juré et une tueuse envoyée par les triades chinoises, vont les traquer à travers la ville.', 'https://www.cinetrafic.fr/images/affiches/medium/aff_3949020190617180004.jpg'),
(4, 1, 'Birds of Prey et la fantabuleuse histoire de Harley Quinn', 'type1', 'status1', '2020-06-02', '- Malgré Joker (nominé aux Oscars), et le Batman à venir avec Robert Pattinson, le DCEU (DC Extended Universe, ou Univers cinématographique DC) continue sa route. Voici le film qui fait suite à Suicide Squad (2016) : Birds of Prey et la fantabuleuse histoire de Harley Quinn met au centre de son intrigue la super-vilaine déjantée (sans la présence du Joker joué par Jared Leto a priori). Le récit transpose la série de comic-books DC Comics Birds of Prey, et fait donc s\'associer Harley Quinn (Margot Robbie, actrice dans Once upon a time in... Hollywood) à Black Canary (Jurnee Smollett-Bell, vue dans la série Underground) et Huntress (Mary Elizabeth Winstead (Gemini Man, Boulevard de la mort). Pour affronter un ennemi joué par Ewan McGregor. Une comédie policière d\'action, façon film de super-héros.', 'https://www.cinetrafic.fr/images/affiches/big/aff_6629020200204194507.jpg?1592900921'),
(5, 1, 'TYLER RAKE', 'type1', 'status1', '2020-06-07', 'Production Netflix d\'action avec des moyens de blockbuster, Tyler Rake place Chris Hemsworth (interprète de Thor dans la saga Avengers de Marvel) dans la peau d\'un mercenaire, confronté à une mission mortelle face aux cartels. Apprécié par une part de la critique pour ses tentatives côté scènes haletantes, il est réalisé par Sam Hargrave (coordinateur des cascades sur Avengers : Endgame) et compte à son casting David Harbour (Hellboy, la série Stranger Things) ou Golshifteh Faarahani (Mensonges d\'Etat, Les Deux Amis).', 'https://video.cinetrafic.fr/videos/192071_sd.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'coding@gmail.com', '123456'),
(2, 'yuyuan.wu@edu.itescia.fr', '1111111'),
(3, 'yuyuan.wu@edu.itescia.fr', '1111111'),
(5, 'ZZZ@se.dd', '111'),
(6, 'antoinedubranchet@gmail.com', '1111'),
(8, 'jean@hotmail.com', '111'),
(9, 're@ddf.com', '1111'),
(10, '', ''),
(11, 'dgfez@d.com', ''),
(12, 'dgfez@d.com', ''),
(13, 'ss@dd.com', 'fgds'),
(14, 'ss@dd.com', '111'),
(15, 'ss@dd.com', '1111111'),
(16, 'ss@dd.com', '111'),
(17, 'ss@dd.com', '11'),
(18, 'sfds@dd.com', '11'),
(19, 'sfds@dd.com', '11'),
(20, '2540686619@qq.com', '22'),
(21, '2540686619@qq.com', '11'),
(22, '2540686619@qq.com', '11'),
(23, '2540686619@qq.com', '11'),
(24, 'ZZZ@se.dd', '11'),
(25, 'ZZZ@se.dd', '11'),
(26, 'ZZZ@se.dd', '11'),
(27, 'ZZZ@se.dd', '11'),
(28, 'ZZZ@se.dd', '22'),
(29, 'ZZZ@se.dd', '11'),
(30, 'ZZZ@se.dd', 'AAA'),
(34, 'YY@DFDJO.COM', '$2y$10$ZwrpkSmSbZ5uz92tPwNFweqkSu6yGWEiMhJYdIakeuxovFURVdBde'),
(35, 'jean@hotmail.com', '$2y$10$BL4MZrX0tvBbq7.Sls.TXekvnm2Jobt7xOD4KNYSWswisrsmvHYkG'),
(36, 'wu@hotmail.com', '$2y$10$b4xjNEgpJwPErSlVcsVOZO9gMZbsKQ6AfnfPPu.BbzJ5AdH44CL3m'),
(37, 'dd@dd.com', '$2y$10$RAS7x6/3dAX1bsDml/XfCumJau2MLcQMQtP7MU39Q7lRagt1BlSAy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);