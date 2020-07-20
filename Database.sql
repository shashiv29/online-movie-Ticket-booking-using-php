-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2020 at 12:07 PM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mthmk`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `fullName` varchar(20) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `gmail` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `fullName`, `username`, `gmail`, `password`, `phone`) VALUES
(2, 'shashikant', 'shashi98', 'gupta.shashikant1820', '$2y$10$TvnFJxRbo/Qdt9c3MjhqKuapnzeIXaVU4qHeRLOyVGzuApEd.9LHy', 2147483647),
(3, 'shashikant', 'shashi7', 'gupta.shashi@gmail.c', '$2y$10$bWG5IS0t8BdIjuFpPglYVeh0HxqGeh5rf/ZFNa08u3vQlOuKWA3uq', 2147483647),
(4, 'dfgvdf', 'shashi14', 'cvb@gmail.com', 'shashi14', 4251411);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `book_id` int(100) NOT NULL,
  `book_seat` varchar(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `mov_id` int(100) DEFAULT NULL,
  `cin_id` int(100) DEFAULT NULL,
  `show_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `book_seat`, `user_id`, `mov_id`, `cin_id`, `show_id`) VALUES
(1, 'E4,D4,C4', 1, 36, 1, 31),
(2, 'A1,A2', 7, 36, 1, 31),
(3, 'C5,C6,C7', 8, 36, 1, 31),
(4, 'B5', 9, 36, 1, 31),
(5, '', 9, 36, 1, 31),
(6, '', 9, 36, 1, 31),
(7, '', 9, 36, 1, 31),
(8, 'D1,F1', 2, 36, 1, 31),
(9, 'E5,G3,E3', 2, 37, 1, 53),
(10, 'I5,G7', 2, 37, 1, 53),
(11, '', 2, 36, 1, 31),
(12, 'G7,F8,G9,I9,E10,D10', 9, 36, 1, 31),
(13, 'H4,G5,E6,H6', 2, 36, 1, 31),
(14, 'A8,B7,C6,B6,A6,A7', 9, 37, 1, 77),
(15, 'F4,G4,H4', 5, 36, 1, 37),
(16, 'C7,C8,B8,B9,D9', 11, 37, 1, 53),
(17, '', 11, 37, 1, 53),
(18, 'J5,J6,I6', 1, 36, 1, 31),
(19, 'A8,A9,A10,C10,B9,D9', 12, 36, 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `cin_id` int(10) NOT NULL,
  `cin_name` varchar(200) DEFAULT NULL,
  `cin_address` varchar(200) DEFAULT NULL,
  `cin_image` varchar(200) DEFAULT NULL,
  `cin_description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`cin_id`, `cin_name`, `cin_address`, `cin_image`, `cin_description`) VALUES
(1, 'Cinema-1', 'Andher(E)', 'cinema/pvr1.jpg', 'PVR Ltd. is the largest and the most premium film exhibition company in India. Since its inception in 1997, the brand has redefined the cinema industry and the way people watch movies in the country. '),
(2, 'Cinema-2', 'kalyan(W)', 'cinema/pvr2.jpg', 'Miraj Cinemas - Ulhasnagar is a popular theatre located at Kalyan-Badlapur Road, Housing Board Colony, Ambernath, Near Hindustan Petroleum Petrol Pump, Ulhasnagar, Thane, Mumbai. Miraj Cinemas - Ulhas'),
(3, 'Cinema-3', 'Borivali(E)', 'cinema/pvr3.jpg', 'Anil Ashok Ltd, the integrated ‘film and retail brand’ has PVR Cinemas as its major subsidiary. Its other two subsidiaries are PVR Leisure and PVR Pictures. PVR Pictures has been a prolific distributo'),
(4, 'Cinema-4', 'Dadar(E)', 'cinema/pvr4.jpg', 'PVR Ltd, the integrated ‘film and retail brand’ has PVR Cinemas as its major subsidiary. Its other two subsidiaries are PVR Leisure and PVR Pictures. PVR Pictures has been a prolific distributor of no');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mov_id` int(10) NOT NULL,
  `mov_name` varchar(200) NOT NULL,
  `mov_released_date` date NOT NULL,
  `mov_status` varchar(200) NOT NULL,
  `mov_type` varchar(200) NOT NULL,
  `mov_trend` varchar(200) DEFAULT NULL,
  `mov_description` varchar(500) NOT NULL,
  `mov_image` varchar(200) DEFAULT NULL,
  `mov_tailor` varchar(255) DEFAULT NULL,
  `mov_cast` varchar(500) DEFAULT NULL,
  `mov_banner_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_name`, `mov_released_date`, `mov_status`, `mov_type`, `mov_trend`, `mov_description`, `mov_image`, `mov_tailor`, `mov_cast`, `mov_banner_image`) VALUES
(36, 'Housefull 4', '2019-10-25', 'Running Movies', 'Bollywood', 'Trending Movie', 'When 6 lovers are parted because of an evil conspiracy and revenge in the era of 1419, they cross paths once again in 2019. However, in the present life the 3 boys fall in love with the wrong women and are about to marry their sisters-in-law. As destiny would have it history repeats itself when the 3 couples land up in Sitamgarh once again, where it all began. Will they remember their past lives in time for marriage or will they be stuck with the wrong lovers forever? Housefull 4 is coming to', 'movieImage/housefull4.jpg', 'https://www.youtube.com/watch?v=gcHH34cEl3Y', 'Akshay Kumar as Bala & Harry\r\nRiteish Deshmukh as Bangdu Maharaj & Roy\r\nBobby Deol as Dharamputra & Max\r\nKriti Sanon as Rajkumari Madhu & Kriti\r\nPooja Hegde as Rajkumari Mala & Pooja\r\nKriti Kharbanda as Rajkumari Meena & Neha\r\nA Sajid Nadiadwala Franchise\r\nDirected by Farhad Samji\r\nProduced by Sajid Nadiadwala\r\n\r\nPresented & Co produced by Fox Star Studios\r\nA Nadiadwala Grandson Entertainment production', 'bannerImage/Housefull-4-trailer.jpg'),
(37, 'Ujada Chaman', '2019-11-01', 'Running Movies', 'Bollywood', 'Trending movie', 'Ujda Chaman is about a 30 -year-old bachelor Chaman Kohli, a  Hindi lecturer with Premature Balding & in quest of a beautiful wife. After facing several rejections as a prospective groom because of hi', 'movieImage/UjdaChaman.jpg', 'https://www.youtube.com/watch?v=ls7RHTnCuiY', 'Sunny Singh as Chaman Kohli\r\nMaanvi Gagroo as Apasara Batra\r\nSaurabh Shukla as Guru Ji\r\nAtul Kumar as Shashi Kohli\r\nGrusha Kapoor as Sushma Kohli\r\nGagan Arora as Goldy Kohli\r\nKarishma Sharma as Aaina\r\n', 'bannerImage/Chand-Nikla.jpg'),
(38, 'Saand Ki Aankh', '2019-10-25', 'Running Movies', 'Bollywood', 'Trending movie', 'Before 1998, Johri village in the interiors of Uttar Pradesh was just like any other village in India. But during this time something extraordinary started, which took this village to national ', 'movieImage/saand-ki-aankh.jpg', 'https://www.youtube.com/watch?v=-uA-ONin_5M', 'Produced by : Reliance Entertainment, Anurag Kashyap & Nidhi Parmar\r\nDirected by : Tushar Hiranandani\r\nStarcast : Taapsee Pannu, Bhumi Pednekar\r\nalong with \r\nPrakash Jha, Viineet Kumar, Shaad Randhawa', 'bannerImage/sand.jpg'),
(39, 'Made In China', '2019-10-25', 'Running Movies', 'Bollywood', 'Non-Trending movie', 'What happens when you re down and out, middle-aged and life gives you another chance to get it right?\r\n\r\nYou go to China and bring back the ultimate Jugaad!\r\n\r\nDinesh Vijan Presents in association', 'movieImage/made-in-china.jpg', 'https://www.youtube.com/watch?v=eA6PFnSHo-E', 'Featuring: Rajkummar Rao, Mouni Roy, Boman Irani, Sumeet Vyas, Amyra Dastur, \r\n\r\nSpecial appearance: \r\nParesh Rawal and Gajraj Rao \r\n\r\nProduced by: Dinesh Vijan\r\n\r\nDirected by: Mikhil Musale', 'bannerImage/made.jpg'),
(40, 'Joker', '2019-11-02', 'Running Movies', 'Hollywood', 'Trending movie', 'Arthur Fleck, a man struggling with loneliness and isolation, wears two masks. One, he paints on for his day job as a clown. The other is a guise he projects in an attempt to find his place in Gotham City`s fractured society. Caught in a cyclical existence between apathy and cruelty, Arthur begins to make one bad decision after another. What follows is a new take on the origin story of one of cinema`s most iconic villains.', 'movieImage/joker.jpg', 'https://www.youtube.com/watch?v=koADXiKl8_s', 'Directed by: Todd Phillips\r\nActor: Robert De Niro, Joaquin Phoenix, Franc...\r\nProduction companies: Warner Bros., DC Films', 'bannerImage/joker2.jpeg'),
(41, 'Doctor Sleep', '2019-11-09', 'Comming Soon', 'Hollywood', 'Non-Trending movie', 'Years following the events of \"The Shining,\" a now-adult Dan Torrance meets a young girl with similar powers as he tries to protect her from a cult known as The True Knot who prey on children with powers to remain immortal.', 'movieImage/doctorsleep.jpg', 'https://www.youtube.com/watch?v=BOzFZxB-8cw', 'Emilia Clarke, Henry Golding, Emma Thompson, Michelle Yeoh', 'bannerImage/doctorbanner.jfif'),
(42, 'Last Christmas', '2019-11-15', 'Comming Soon', 'Hollywood', 'Non-Trending movie', 'Kate is a young woman subscribed to bad decisions. Her last date with disaster? That of having accepted to work as Santa\'s elf for a department store. However, she meets Tom there. Her life takes a new turn. For Kate, it seems too good to be true.', 'movieImage/lastchristmas.jpg', 'https://www.youtube.com/watch?v=z9CEIcmWmtA', ' Emilia Clarke, Henry Golding, Emma Thompson | See full cast & crew ', 'bannerImage/lastbanner.jfif'),
(43, 'articdoga.jpg', '2019-11-05', 'Comming Soon', 'Hollyhood', 'Non_Trending ', 'An Arctic fox works in the mailroom of a package delivery service, but wants to be doing the deliveries.', 'movieImage/articdoga.jpg', 'https://www.youtube.com/watch?v=_2Wn0mwoJJA', 'Anjelica Huston, James Franco, Jeremy Renner, Alec Baldwin', NULL),
(44, 'Mr Toilet', '2019-11-15', 'Comming Soon', 'Hollywood', 'Non-Trending movie', 'What do you get when you cross an eccentric self-made man with a load of crap? Jack Sim. To a stranger, he\'s a guy obsessed with toilets, but to those who know him, he\'s \"Mr. Toilet,\"', 'movieImage/mrtoilet.jpg', 'https://www.youtube.com/watch?v=lgfvED5KYAo', ' Lily Zepeda,Tchavdar Georgiev, Hee-Jae Park | 2 more credits \r\nStar: Jack Sim', 'bannerImage/mrtoilet.jpg'),
(45, 'Ekta', '2019-11-15', 'Comming Soon', 'Bollywood', 'Non-Trending movie', 'A young lady cop tries to solve a murder mystery and why it is happening.', 'movieImage/ekta.jpg', 'https://www.youtube.com/watch?v=BywLe4m2j2I', ' Salil Ankola, Navneet Kaur Dhillon, Avneet Kaur', 'bannerImage/mrtoilet.jpg'),
(46, 'Aditya Verma', '2019-11-29', 'Comming Soon', 'Bollywood', 'Non-Trending movie', 'Adithya Varma is an upcoming Indian Tamil-language romantic drama film directed by Gireesaaya (in his directorial debut) and produced by Mukesh Mehta under E4 Entertainment. The film stars newcomer Dhruv Vikram and Banita Sandhu in the lead roles while Priya Anand appears in a supporting role.', 'movieImage/adityavarma.jpg', 'https://www.youtube.com/watch?v=MQEuFT5DUeY', 'Directed by: Bala, Gireesaaya\r\nActor: Dhruv\r\nProduced by: Mukesh Mehta\r\nLanguage: Tamil language', 'bannerImage/adityavarma.jpg'),
(47, 'Charlie\'s Angels', '2019-12-01', 'Comming Soon', 'Hollywood', 'Non-Trending movie', 'Charlie\'s Angels is an upcoming American action comedy film directed by Elizabeth Banks, who also wrote the screenplay, from a story by Evan Spiliotopoulo', 'movieImage/charlies.jpg', 'https://www.youtube.com/watch?v=RSUq4VfWfjE', 'Story byâ€Ž: â€ŽEvan Spiliotopoulosâ€Ž; â€ŽDavid Auburn	Release dateâ€Ž: â€ŽNovember 15, 2019\r\nDistributed byâ€Ž: â€ŽSony Pictures Releasing	\r\nProduced byâ€Ž: â€ŽElizabeth Banksâ€Ž; â€ŽMax Handelmanâ€Ž; \r\n Cameron Diaz, Drew Barrymore, Lucy Liu ', 'bannerImage/charlies.jpg'),
(48, 'Triple Seat', '2019-11-01', 'Running Movies', 'Others', 'Trending movie', 'A young, happy couple`s life gets turned upside down when the guy receives a call from an unknown woman who claims to be in danger. A new take on the classic love triangle, Triple Seat brings to you a light-hearted story about wireless love.', 'movieImage/tripleseat.jpg', 'https://www.youtube.com/watch?v=DiY2GRRRuu8', 'Sanket gupta,Anushka Motion ,Narendra Shantikumar ,\r\nSwwapnil Sanjay Munot, Pushpank Gawade\r\n', 'bannerImage/triplebanner.jpg'),
(49, 'articdoga.jpg', '2019-11-05', 'Comming Soon', 'Hollyhood', 'Non_Trending ', 'An Arctic fox works in the mailroom of a package delivery service, but wants to be doing the deliveries.', 'movieImage/articdoga.jpg', 'https://www.youtube.com/watch?v=_2Wn0mwoJJA', 'Anjelica Huston, James Franco, Jeremy Renner, Alec Baldwin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `showtime`
--

CREATE TABLE `showtime` (
  `show_id` int(30) NOT NULL,
  `show_starttime` time DEFAULT NULL,
  `show_endtime` time DEFAULT NULL,
  `show_date` date DEFAULT NULL,
  `mov_id` int(30) DEFAULT NULL,
  `cin_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showtime`
--

INSERT INTO `showtime` (`show_id`, `show_starttime`, `show_endtime`, `show_date`, `mov_id`, `cin_id`) VALUES
(31, '07:30:00', '10:12:00', '2019-11-05', 36, 1),
(33, '10:15:00', '12:00:00', '2019-11-05', 36, 2),
(34, '13:00:00', '15:00:00', '2019-11-05', 36, 3),
(35, '15:45:00', '19:00:00', '2019-11-05', 36, 4),
(37, '10:15:00', '12:00:00', '2019-11-06', 36, 1),
(38, '13:00:00', '16:00:00', '2019-11-06', 36, 2),
(39, '15:45:00', '19:00:00', '2019-11-06', 36, 3),
(40, '18:30:00', '19:00:00', '2019-11-06', 36, 4),
(41, '10:15:00', '12:00:00', '2019-11-08', 36, 1),
(42, '13:00:00', '16:00:00', '2019-11-08', 36, 2),
(43, '15:45:00', '19:00:00', '2019-11-08', 36, 3),
(44, '18:30:00', '19:00:00', '2019-11-08', 36, 4),
(45, '07:30:00', '12:00:00', '2019-11-07', 36, 1),
(46, '10:15:00', '16:00:00', '2019-11-07', 36, 2),
(47, '13:00:00', '16:00:00', '2019-11-07', 36, 3),
(48, '15:45:00', '19:00:00', '2019-11-07', 36, 4),
(49, '07:30:00', '12:00:00', '2019-11-09', 36, 1),
(50, '10:15:00', '16:00:00', '2019-11-09', 36, 2),
(51, '13:00:00', '16:00:00', '2019-11-09', 36, 3),
(52, '15:45:00', '19:00:00', '2019-11-09', 36, 4),
(53, '15:45:00', '12:00:00', '2019-11-05', 37, 1),
(54, '07:30:00', '16:00:00', '2019-11-05', 37, 2),
(55, '10:15:00', '16:00:00', '2019-11-05', 37, 3),
(56, '13:00:00', '19:00:00', '2019-11-05', 37, 4),
(58, '18:30:00', '16:00:00', '2019-11-06', 37, 2),
(59, '07:30:00', '16:00:00', '2019-11-06', 37, 3),
(60, '10:15:00', '19:00:00', '2019-11-06', 37, 4),
(61, '17:30:00', '12:00:00', '2019-11-08', 37, 1),
(62, '18:30:00', '16:00:00', '2019-11-08', 37, 2),
(63, '07:30:00', '16:00:00', '2019-11-08', 37, 3),
(64, '10:15:00', '19:00:00', '2019-11-08', 37, 4),
(69, '10:15:00', '12:00:00', '2019-11-09', 37, 1),
(70, '13:00:00', '16:00:00', '2019-11-09', 37, 2),
(71, '15:45:00', '16:00:00', '2019-11-09', 37, 3),
(72, '18:30:00', '19:00:00', '2019-11-09', 37, 4),
(73, '15:45:00', '12:00:00', '2019-11-07', 37, 1),
(74, '07:30:00', '16:00:00', '2019-11-07', 37, 2),
(75, '10:15:00', '16:00:00', '2019-11-07', 37, 3),
(76, '13:00:00', '19:00:00', '2019-11-07', 37, 4),
(77, '15:45:00', '12:00:00', '2019-11-06', 37, 1),
(78, '13:00:00', '12:00:00', '2019-11-07', 38, 1),
(79, '15:45:00', '16:00:00', '2019-11-07', 38, 2),
(80, '18:30:00', '16:00:00', '2019-11-07', 38, 3),
(81, '20:45:00', '19:00:00', '2019-11-07', 38, 4),
(82, '20:45:00', '12:00:00', '2019-11-05', 38, 1),
(83, '23:30:00', '16:00:00', '2019-11-05', 38, 2),
(84, '10:15:00', '16:00:00', '2019-11-05', 38, 3),
(85, '07:30:00', '19:00:00', '2019-11-05', 38, 4),
(86, '20:45:00', '12:00:00', '2019-11-07', 38, 1),
(87, '23:30:00', '16:00:00', '2019-11-07', 38, 2),
(88, '10:15:00', '16:00:00', '2019-11-07', 38, 3),
(89, '07:30:00', '19:00:00', '2019-11-07', 38, 4),
(90, '15:45:00', '12:00:00', '2019-11-08', 38, 1),
(91, '07:30:00', '16:00:00', '2019-11-08', 38, 2),
(92, '10:15:00', '16:00:00', '2019-11-08', 38, 3),
(93, '13:00:00', '19:00:00', '2019-11-08', 38, 4),
(94, '20:45:00', '12:00:00', '2019-11-09', 38, 1),
(95, '23:30:00', '16:00:00', '2019-11-09', 38, 2),
(96, '10:15:00', '16:00:00', '2019-11-09', 38, 3),
(97, '07:30:00', '19:00:00', '2019-11-09', 38, 4),
(98, '17:30:00', '10:00:00', '2019-11-05', 39, 1),
(99, '10:15:00', '10:00:00', '2019-11-05', 39, 2),
(100, '13:00:00', '10:00:00', '2019-11-05', 39, 3),
(101, '15:45:00', '10:00:00', '2019-11-05', 39, 4),
(102, '07:30:00', '10:00:00', '2019-11-07', 39, 1),
(103, '10:15:00', '10:00:00', '2019-11-07', 39, 2),
(104, '13:00:00', '10:00:00', '2019-11-07', 39, 3),
(105, '15:45:00', '10:00:00', '2019-11-07', 39, 4),
(106, '07:30:00', '10:00:00', '2019-11-09', 39, 1),
(107, '10:15:00', '10:00:00', '2019-11-09', 39, 2),
(108, '13:00:00', '10:00:00', '2019-11-09', 39, 3),
(109, '15:45:00', '10:00:00', '2019-11-09', 39, 4),
(110, '13:00:00', '10:00:00', '2019-11-06', 39, 1),
(111, '15:45:00', '10:00:00', '2019-11-06', 39, 2),
(112, '18:30:00', '10:00:00', '2019-11-06', 39, 3),
(113, '20:45:00', '10:00:00', '2019-11-06', 39, 4),
(114, '13:00:00', '10:00:00', '2019-11-08', 39, 1),
(115, '15:45:00', '10:00:00', '2019-11-08', 39, 2),
(116, '18:30:00', '10:00:00', '2019-11-08', 39, 3),
(117, '20:45:00', '10:00:00', '2019-11-08', 39, 4),
(118, '13:00:00', '10:00:00', '2019-11-06', 40, 1),
(119, '15:45:00', '10:00:00', '2019-11-06', 40, 2),
(120, '18:30:00', '10:00:00', '2019-11-06', 40, 3),
(121, '20:45:00', '10:00:00', '2019-11-06', 40, 4),
(122, '13:00:00', '10:00:00', '2019-11-08', 40, 1),
(123, '15:45:00', '10:00:00', '2019-11-08', 40, 2),
(124, '18:30:00', '10:00:00', '2019-11-08', 40, 3),
(125, '20:45:00', '10:00:00', '2019-11-08', 40, 4),
(126, '10:15:00', '10:00:00', '2019-11-05', 40, 1),
(127, '13:00:00', '10:00:00', '2019-11-05', 40, 2),
(128, '15:45:00', '10:00:00', '2019-11-05', 40, 3),
(129, '18:30:00', '10:00:00', '2019-11-05', 40, 4),
(130, '10:15:00', '10:00:00', '2019-11-07', 40, 1),
(131, '13:00:00', '10:00:00', '2019-11-07', 40, 2),
(132, '15:45:00', '10:00:00', '2019-11-07', 40, 3),
(133, '18:30:00', '10:00:00', '2019-11-07', 40, 4),
(134, '10:15:00', '10:00:00', '2019-11-06', 48, 1),
(135, '13:00:00', '10:00:00', '2019-11-06', 48, 2),
(136, '15:45:00', '10:00:00', '2019-11-06', 48, 3),
(137, '18:30:00', '10:00:00', '2019-11-06', 48, 4),
(138, '10:15:00', '10:00:00', '2019-11-08', 48, 1),
(139, '13:00:00', '10:00:00', '2019-11-08', 48, 2),
(140, '15:45:00', '10:00:00', '2019-11-08', 48, 3),
(141, '18:30:00', '10:00:00', '2019-11-08', 48, 4),
(142, '20:45:00', '10:00:00', '2019-11-05', 48, 1),
(143, '23:30:00', '10:00:00', '2019-11-05', 48, 2),
(144, '10:15:00', '10:00:00', '2019-11-05', 48, 3),
(145, '07:30:00', '10:00:00', '2019-11-05', 48, 4),
(146, '20:45:00', '10:00:00', '2019-11-07', 48, 1),
(147, '23:30:00', '10:00:00', '2019-11-07', 48, 2),
(148, '10:15:00', '10:00:00', '2019-11-07', 48, 3),
(149, '07:30:00', '10:00:00', '2019-11-07', 48, 4),
(150, '20:45:00', '10:00:00', '2019-11-09', 48, 1),
(151, '23:30:00', '10:00:00', '2019-11-09', 48, 2),
(152, '10:15:00', '10:00:00', '2019-11-09', 48, 3),
(153, '07:30:00', '10:00:00', '2019-11-09', 48, 4);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `user_id` int(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`user_id`, `name`, `username`, `password`, `email`, `phone`) VALUES
(1, 'Rohit Vinod Gupta', 'rohit', '$2y$10$mmMWQCdXkeC4WRl1EyZrHOrlhf7WGU3okOS28XKpjt/UhvYdbTz6y', 'rvgupta2597@gmail.com', 2147483647),
(2, 'Shashi Gupta', 'shashi', '$2y$10$l9yuKOO2MBjA0KIw.egFRuzSu5xBWrvrQcez4QVoqFzbE/ElXPOcO', 'rvgupta2597@gmail.com', 2147483647),
(4, 'Rohit Gupta', 'manoj', '$2y$10$mCCB.YSUEGGcw/iOKDegjOYtCZ/RBRr7xznlHur2ISrtLl/RYm1ui', 'rvgupta@gmail.com', 2147483647),
(5, 'shashikant', 'shashi98', '$2y$10$2xuDcDrw/HlprqYdDhneQer8UskVEVqPrNFIkiKx4AaFMKPJ0qVva', 'gupta.shashikant18201@gmail.com', 2147483647),
(6, 'shalini singh', 'shalini', '$2y$10$1QYQPgO4zJLvA5WSP4vRweEu4VKmojmk0H7WsNrxj0ctkfIG0FCVq', 'shalini7548@gmail.com', 2147483647),
(7, 'shalini singh', 'minu', '$2y$10$tabartHGTfN7qiw3wK.d4O9eHaLRQqpNtqSarRMnMgCUqQwzlKagG', 'shalini7548@gmail.com', 2147483647),
(8, 'Abhishek', 'abhishek', '$2y$10$R8QhjXUBwfhkbC5XTil4CeRa8RIOfPMUbzwGsrKt4xREjxpaaTXtK', 'abhishek@gmail.com', 1234567890),
(9, 'Prachi', 'prachi', '$2y$10$xJ2gpc7K25EBjT9z/ii.A.Jj4B7XdqSeVn9ZGhYBe9ipBI.gfmu5a', 'p@gmail.com', 2147483647),
(10, 'Pradeep', 'Hore', '$2y$10$.RPS1/t7S0dah68tCb9GGuP/w94fvNHfUwwW2zgVvPXK8IhynppKm', 'abhishek@gmail.com', 1234567890),
(11, 'Luci', 'Luci', '$2y$10$gbg32OE.bokbVwtaL0LCq.R1FgPcwWT0l7BtEXCvVi6K6TgruFEAG', 'abhishek@gmail.com', 1234567890),
(12, 'Akash', 'Akash', '$2y$10$vqNT9nsFQKWnImo8fJyb6uA3A45jcmz2wUXjx8Qn6/Y4VhNpTKUSm', 'akash@gmail.com', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `fk_book_cin` (`cin_id`),
  ADD KEY `fk_book_mov` (`mov_id`),
  ADD KEY `fk_book_user` (`user_id`),
  ADD KEY `fk_book_show` (`show_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`cin_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mov_id`);

--
-- Indexes for table `showtime`
--
ALTER TABLE `showtime`
  ADD PRIMARY KEY (`show_id`),
  ADD KEY `fk_show_cin` (`cin_id`),
  ADD KEY `fk_show_mov` (`mov_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `book_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `cin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `mov_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `showtime`
--
ALTER TABLE `showtime`
  MODIFY `show_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_book_cin` FOREIGN KEY (`cin_id`) REFERENCES `cinema` (`cin_id`),
  ADD CONSTRAINT `fk_book_mov` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`),
  ADD CONSTRAINT `fk_book_show` FOREIGN KEY (`show_id`) REFERENCES `showtime` (`show_id`),
  ADD CONSTRAINT `fk_book_user` FOREIGN KEY (`user_id`) REFERENCES `userlogin` (`user_id`);

--
-- Constraints for table `showtime`
--
ALTER TABLE `showtime`
  ADD CONSTRAINT `fk_show_cin` FOREIGN KEY (`cin_id`) REFERENCES `cinema` (`cin_id`),
  ADD CONSTRAINT `fk_show_mov` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
