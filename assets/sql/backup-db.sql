-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 12, 2017 at 12:42 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpgrupp_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`like_id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=41 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`like_id`, `post_id`, `user_id`) VALUES
(34, 11, 33),
(37, 18, 33),
(38, 3, 33),
(39, 16, 33);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(260) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(260) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `body`, `tags`, `created`, `updated`) VALUES
(2, 1, 'Hej hej första updat', '<h5>K&auml;ra dagbok</h5>\r\n<p><em><strong>Idag var en rolig dag</strong></em></p>', 'Javascript, html', '2017-05-03 03:34:33', '2017-05-03 21:56:23'),
(3, 1, 'Nu gör jag en ny post', '<p>Tjena tjena tjena tjena</p>', '', '2017-05-03 04:51:38', NULL),
(9, 1, 'kollar om tags funkar', '<p>japp japp japp</p>', 'tag, tag, tag', '2017-05-03 20:26:37', '2017-05-04 09:34:44'),
(11, 1, 'Testar htmlpurify', '<h4>Kollar om headings funkar</h4>\r\n<p>Här nedanför ska det vara tre blankrader<br /><br /><br /><strong>Bold</strong> <em>italic</em></p>\r\n<p style="text-align:center;">Centrerad text</p>\r\n<ul><li style="text-align:left;">Punktlista </li>\r\n<li style="text-align:left;">punktlista</li>\r\n</ul><p><code>function foo(){</code></p>\r\n<p><code>} // det här är kod</code></p>\r\n<p><span style="background-color:#ffff00;">Här är överstruken text i gult</span></p>\r\n<p><a href="http://www.example.com">Det här är en länk</a></p>\r\n<p>här är en farlig script-tag</p>\r\n<p> </p>', 'test', '2017-05-04 13:17:51', '2017-05-04 21:34:50'),
(15, 1, 'testing string length', '<p><strong>Lorem Ipsum</strong> är en utfyllnadstext från tryck- och förlagsindustrin. Lorem ipsum har varit standard ända sedan 1500-talet, när en okänd boksättare tog att antal bokstäver och blandade dem för att göra ett provexemplar av en bok. Lorem ipsum har inte bara överlevt fem århundraden, utan även övergången till elektronisk typografi utan större förändringar. Det blev allmänt känt på 1960-talet i samband med lanseringen av Letraset-ark med avsnitt av Lorem Ipsum, och senare med mjukvaror som Aldus PageMaker.</p>', 'test', '2017-05-08 11:30:17', NULL),
(16, 1, 'testing str length again', '<p>Vis ex enim velit utamur. Sed quem disputando teper quis indoctum hendrerit et. Cu pri illum omnesque mediocrem. Eam doctus appetere et, an accusata maiestatis quo, quem purto ex est. Prompta moderatius instructior ut qui, dicat nulla oportere eos id. Error iisque postulant ut has, has nostro feugait te.</p>', 'test', '2017-05-08 11:38:35', NULL),
(18, 23, 'testing session start again', '<p>testing this magic</p>', 'magic, session', '2017-05-08 13:12:45', NULL),
(19, 23, 'another', '<p>adasasd</p>', 'a', '2017-05-08 13:15:18', NULL),
(22, 23, 'hej', '<p>de</p>', 'dede', '2017-05-09 10:27:25', NULL),
(34, 46, 'i''m user', '<p>im userrrrr</p>', 'hej', '2017-05-10 13:26:20', NULL),
(40, 33, 'testar pointer', '<p>as</p>', 'tag', '2017-05-10 22:15:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(260) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(260) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `description`, `profession`, `picture`, `created`, `is_admin`) VALUES
(1, 'jesper', 'admin', 'Jesper', 'Engström', 'jengstro@gmail.com', 'I''m Jesper', 'student', '', '2017-04-27 07:00:00', 0),
(4, 'Jesper1', 'blabla', 'Jesper', 'Engström', 'jengstro1@gmail.com', 'testin', 'Wawawd', '', '2017-04-28 05:10:36', 0),
(12, 'jesper3', 'blaha', 'Jesper', 'Engström', 'jengstro2@gmail.com', 'asdök', 'Wawawd', '', '2017-04-28 05:41:09', 0),
(14, 'john doe', 'hej', 'John', 'Doe', 'johndoe@hotmail.com', 'what do you want to know?', 'student', '', '2017-05-02 18:17:25', 0),
(16, '', '', '', '', '', '', '', '', '2017-05-02 18:29:35', 0),
(17, 'evelinasundin', '1234', 'Evelina', 'Sundin', 'hej@hotmail.se', 'deoje', 'dioedj', '', '2017-05-02 21:14:28', 0),
(20, 'asada', 'dede', 'Evelina', 'Sundin', 'hdede@hotmail.se', 'deoje', 'dioedj', '', '2017-05-02 21:15:09', 0),
(22, 'dedededede', '$2y$10$RQJ8zs8kSqD0YR39G8TbVeD6vjdAvcyMs.XIAbRh65812Smz0Qn/y', 'dede', 'dede', 'dde@hotmail.se', 'dede', 'sede', '', '2017-05-03 18:36:44', 0),
(23, 'evelina1234', '$2y$10$zb7.bcz5PTycEHC7ZuZMiuyfRfNEHoh0i8HcroETJrr1CikFXby8a', 'evelina', 'sundin', 'evelina@hotmail.se', 'dlde', 'lala', '', '2017-05-03 18:40:30', 0),
(24, 'evelinas', '$2y$10$YTg0QEGDD22NGp5rlO/G3ekWPknDymihF4nyiNnrTPhx7uj7S.jNy', 'Evelina', 'Sundin', 'evelinas@hotmail.se', 'dede', 'hded', '', '2017-05-03 21:44:56', 0),
(25, 'saaslkdj', 'admin', 'af', 'sdf', 'lkf@ksdl.com', 'ds', 'sa', '', '2017-05-04 05:28:13', 0),
(26, 'kalle', 'kalle', 'kalle', 'kulis', 'kalle@kula', 'kula', 'dev', '', '2017-05-03 22:53:40', 0),
(27, 'hej', 'hejhej', 'hej', 'hej', 'tja@hotmail.se', 'dede', 'lala', '', '2017-05-04 09:50:33', 0),
(28, 'evelinahej', '$2y$10$Ywo0rshtCAllCtUXLvaUbOzX2XVGWCyDby0BNmA6Ojeyz5fezSHHm', 'evelina', 'edjoe', 'ede@hotmail.se', 'dede', 'dee', '', '2017-05-04 12:00:08', 0),
(29, 'sdkaösdk', '$2y$10$58TfDuqMyXpWP6c/yjDdxOsU8IwYRBAB2wU3xTj.WATuZPatzuhp6', '', '', 'alkdj@xn--sldasl-1xa.com', 'ads', 'sdfada', '', '2017-05-04 20:11:21', 0),
(31, 'aDAF', '$2y$10$RC0JjK150W.qJZWIF4SeU.U8.gIYSBNVneju9l19/mrXcMfFtxGc2', '', '<script>alert("!");</script>', 'LKKLoSAKD@aos.xom', 'ads', 'sdfada', '', '2017-05-04 20:14:42', 0),
(32, 'testing_man', '$2y$10$VuDLe9.3LllTTxsiTkdIbO6B34KwA/k8G/ujyrN0.cjPIxL7z1xR2', 'Testing', 'Man', 'testing_man@gmail.com', 'Don''t know much about myself', 'Student', '', '2017-05-08 07:58:51', 0),
(33, 'jeesper', '$2y$10$/rgGpF3aVZ1Dz1IEVQJaxufc81YL31M8xll.fz7DEWe1xLyBi3Lfm', 'Janne', 'Loffe', 'oaoaoa@gmail.com', 'Jag är en glad kille på 16 jordsnurr.', 'student', 'https://pbs.twimg.com/profile_images/1229880667/hbo-curbyourenthusiasm-header.jpg', '2017-05-08 08:21:26', 1),
(36, 'evelina123', '$2y$10$JjlWRiWN9ts.qkjont4ilebFhWkCuzMlg20xuwylFSWWoGxtbM2Aa', 'asdad', 'asd', 'asda@gmail.com', '', 'adad', '', '2017-05-08 10:18:32', 0),
(37, 'asdasd', '$2y$10$Wld/GYoE9E6AuFpIWTC2X.XWbpm2mBfSGZh3CdMOaEiYZNwksWKNy', 'dadas', 'asd', 'sasda@gmail.com', '', '', '', '2017-05-08 10:50:41', 0),
(38, 'haha', '$2y$10$ThEhbXO2nvyAVXMeWZdIsOYycGFe2L1fPp8WVyPzsAvbBok62YsJ.', 'asd', 'asd', 'asd@gmail.com', '', '', '', '2017-05-08 13:15:41', 0),
(39, 'evelinaaaaaas', '$2y$10$UqBuiG/3BjzgWMGMnsQ8z.WHJvFc5eIESM01tegyNr5Yjdq5oD38m', 'evelina', 'sundin', 'evevvvevve@hotmail.se', 'asasas', 'asas', '', '2017-05-09 11:55:34', 0),
(40, 'lalalala', '$2y$10$oHvHQYvRNMtKvyZjYh3lH.qXeuYR3HSfdRKMDGQ4uN.XcrJEAJV4S', 'slkfsldf', 'dkflksdlkf', 'drtu@ksldd.com', 'öakdöalkfsl', 'köakd', '', '2017-05-09 11:59:19', 0),
(41, 'evevvee', '$2y$10$wpLGUT7oMgw964MsrZS1WuMLqAR2409MOo/YOlzvbxJP1cyq7uc1a', 'evveve', 'eded', 'evelinaaaasss@hotmail.se', 'sdsdsd', 'sdss', '', '2017-05-09 12:10:39', 0),
(42, 'evevvee11212', '$2y$10$i/QY28uwKHHL40WkvqQT3.IXbYr18tzgMgdxUBgm3EBtEsmMGmd7S', 'evveve', 'eded', 'evelinaaas@hotmail.se', 'sdsdsd', 'sdss', '', '2017-05-09 12:11:40', 0),
(43, 'evelina12345', '$2y$10$04gs7X74NArF0B1KhOT0..nT/qghAJSQUzBS/3KYaFj4/EEenw506', 'evelina', 'sundin', 'evelinasundin@hotmail.us', 'assa', 'asas', '', '2017-05-09 12:13:37', 0),
(44, 'fksdlfskdl', '$2y$10$yEU1rR/ecA00G3hKKTtP1O6SYPax0km4kbLF6QXYDKQoNLbEqYuYa', 'dkfsölfk§', 'sdklfsdölfk', 'lfdflk@dsk.com', 'köldfkaf', 'klöaskd', '', '2017-05-09 12:33:26', 0),
(45, 'sdfsdklfjksl', '$2y$10$uyGpd4WseaTXdc5nWCQ1O.Anh/14ZASyRN.A0eGq6ZZX6DAcVlbiO', 'jaskdjaslkd', 'jlkasdjkla', 'skdlk@sldkl.com', 'sköldakd', 'kaldaköl', '', '2017-05-09 12:38:16', 0),
(46, 'user', '$2y$10$65BFc4WaCzuQRJwbQHc.5.7rJ7e4cr9gdOZURSBRIUxjWJGnkeqZK', 'user', 'no admin', 'blaj@blaj.com', 'im just a user', 'user', '', '2017-05-10 11:03:16', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
