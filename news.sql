-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 02:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Sports', 2),
(2, 'Entertainment', 4),
(3, 'Politics', 4),
(4, 'Health', 1),
(5, 'Gaming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(1, 'testing', 'mayur tari file bv time kariu upload karvama na chale aa badhu.                ', 2, '14 Aug, 2021', 2, 'aditya-chinchure-ZhQCZjr9fHo-unsplash .jpg'),
(4, 'testing4', 'finalllyy...!!!!\r\n                    ', 3, '14 Aug, 2021', 2, 'jon-tyson-49ybMyLB7HM-unsplash.jpg'),
(5, 'testing5', 'health is wealth.\r\n                    ', 4, '14 Aug, 2021', 2, 'hush-naidoo-jade-photography-pA0uoltkwao-unsplash.jpg'),
(6, 'testing6 ', 'pop concert allowed only who have car.\r\n                    ', 2, '14 Aug, 2021', 2, 'mika-baumeister-EVT9gF4jP9Q-unsplash.jpg'),
(8, 'testing6', 'yeah i am doing every thing perfect.\r\n                    ', 1, '14 Aug, 2021', 2, 'markus-spiske-WUehAgqO5hE-unsplash.jpg'),
(9, 'testing', 'this post is uploaded from temp1 account let\'s see this is working or not\r\n                    ', 5, '15 Aug, 2021', 5, 'florian-olivo-Mf23RF8xArY-unsplash.jpg'),
(10, 'testing recent bar', 'yeah that is good i made a good siderbar which shows me latest 6 post\r\n                    ', 3, '15 Aug, 2021', 5, '1629215001-tania-malrechauffe-Tq7lbAeF9BQ-unsplash.jpg'),
(12, 'BTS Postpones Map of the Soul Tour For Second Time | Hereâ€™s Why', 'South Korea: BTS ARMY is left disheartened after the globally famous K-pop group announced that the Map of the Soul Tour has been postponed for the second time.Also Read - BTS ARMY Celebrate As Dynamite Turns 1: \'Iconic Song That Broke All Records and United Fans\'\r\n\r\nThe South Korean entertainment company that manages BTS shared the news with fans and mentioned that it has become difficult to resume performances. â€œOur company has worked hard to resume preparations for the BTS Map of the Soul Tour, knowing that all fans have been waiting eagerly and long for the tour. Due to changing circumstances beyond our control, it has become difficult to resume performances at the same scale and timeline as previously planned,â€ the statement read. Also Read - The BTS Game Show: J-Hope Reveals His Biggest Fear, RM Talks About His Best Feature and More\r\n\r\nThe group also mentioned that the future update regarding Map Of the Soul Tour will be shared soon. â€œWe are working to prepare a viable schedule and performance format that can meet your expectations, and we will provide updated notices as soon as possible,â€ the statement concluded. Also Read - Taarak Mehta\'s Tappu Aka Raj Anadkat Dances On BTS\' Permission To Dance, Fans Asks \'You Too ARMY?\'\r\n                    ', 2, '23 Aug, 2021', 6, '1629697342-btsTeam.jpg'),
(13, 'Spider-Man: No Way Home\' trailer leaked; Sony shuts it down?', 'A trailer for Spider-Man: No Way Home was leaked on Sunday. It wasn\'t long before the leaked video started trending on Twitter after some accounts shared it. It still remains unclear as to how many people have actually seen the video by now, but it doesn\'t seem like the number is small. Some Twitter users also began trending the film, discussing what consequences the alleged leaker will face. \r\n\r\nWhile Republic has seen the alleged leak, no specifics from the video will be shared. However, we can confirm that the content of the leak appears to be legitimate. Some tweets containing the video of the alleged trailer were immediately taken down and the message, \"The media has been disabled in response to a report from the copyright owner,\" appeared instead. However, several tweets containing the Spider-Man: No Way Home trailer video is still doing rounds on the internet.\r\n\r\nWhile it might just be impossible for Sony to delete every video off of the internet, it\'s worth noting that both media companies have responded quickly to the alleged leak. However, no official comment about the leak has been made by Sony or Marvel, yet. Currently, the studios seem to be in the middle of a \"whack-a-mole\" type of situation, where they block one video of the leak and 10 others show up in its place. \r\n                    ', 2, '23 Aug, 2021', 6, '1629698693-siperman.jpeg'),
(18, 'Assam MP Lists \'Failures\' of Himanta Govt\'s 100 Days', 'Congress leader and Rajya Sabha MP Ripun Bora has slammed the Himanta Biswa Sarma-led Assam government for the alleged slow pace of vaccination in the state and \"jeopardising\" age-old social harmony by bringing in a cattle preservation law. Making an analysis of the 100 days performance of the BJP-led government in Assam, Bora also alleged that the inter-state border disputes have escalated during the new dispensation and it has gone back on the promise of waiving off the micro finance loan of women.\r\n\r\nThe Congress leader said in a statement that Sarma\'s government has made tall claims about success in various fields but \"practically there is nothing to show as achievements\". Out of Assam\'s 3.35 crore population, just 20 lakh were fully vaccinated till now while 1.28 crore people got just single dose and 1.07 crore people of the age of above 18 years did not get even a single dose of vaccine, which is very alarming, he said.\r\n\r\nBora claimed that there were 35 encounters between police and drugs peddlers in the first 100 days of the BJP government in the state, which is a serious threat to human rights and against a Supreme Court ruling. Even the chief minister has provoked the police to shoot the accused, he claimed.\r\n                    ', 3, '23 Aug, 2021', 6, '1629699290-himanta-biswa-sarma.png'),
(19, 'After Afghanistan, Pakistan eyeing â€˜more aggressiveâ€™ tactics in Jammu & Kashmir', 'Pakistanâ€™s ISI, widely acknowledged to be in a stronger posi ..\r\n                    ', 3, '07 Sep, 2021', 2, '1631015919-pizza.png'),
(20, 'test', 'test\r\n                    ', 1, '07 Sep, 2021', 2, '1631015971-backgroung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `websitename` varchar(60) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `footerDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`websitename`, `logo`, `footerDescription`) VALUES
('News Daily', 'News logo-2.png', '@ Copyright 2021 | Powered By MAYUR       \r\n                                       \r\n                                       \r\n                                       \r\n                                       \r\n                                       \r\n      ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Brahmkhatri', 'Mayur', 'khatriMayur', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Mayur', 'Brahmkhatri', 'mayur123', '21232f297a57a5a743894a0e4a801fc3', 1),
(5, 'temp1', 'temp', 'temp1', '78475d71e72a3c181c077cb779475f1e', 0),
(6, 'temp2', 'temp', 'temp2', 'c8d17a56c85e8521a3837c85ce4e6c4a', 0),
(7, 'temp3', 'temp', 'temp3', '60fc9053a2844ff0116aef3d985a0b18', 0),
(8, 'temp3', 'temp', 'temp4', '4bcf7e68ce148c9257761943bc3f20db', 0),
(10, 'sarthi', 'temp', 'temp6', '5b3f98dd18eeeef808b90994ae381fb6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
