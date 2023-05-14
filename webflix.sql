-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2023 at 06:27 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HNDSOFTS2A13`
--
CREATE DATABASE IF NOT EXISTS `HNDSOFTS2A13` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `HNDSOFTS2A13`;

-- --------------------------------------------------------

--
-- Table structure for table `movie_list`
--

CREATE TABLE IF NOT EXISTS `movie_list` (
  `movie_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`movie_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `movie_reviews`
--

CREATE TABLE IF NOT EXISTS `movie_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_movie_id` int(11) DEFAULT NULL,
  `review_user_id` int(11) DEFAULT NULL,
  `review_rating` int(1) DEFAULT NULL,
  `review_comment` text,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `movie_reviews`
--

INSERT INTO `movie_reviews` (`review_id`, `review_movie_id`, `review_user_id`, `review_rating`, `review_comment`, `review_date`) VALUES
(14, 1, 1, 5, 'Please bug code not.', '2023-04-23 14:42:10'),
(15, 6, 1, 4, 'Great SF movie!.', '2023-04-23 19:32:56'),
(16, 0, 1, 5, 'sssssss', '2023-04-24 21:00:10'),
(17, 0, 1, 5, 'omhomg', '2023-04-24 21:01:49'),
(18, 4, 1, 5, 'Good movie.', '2023-04-26 11:05:06'),
(19, 0, 1, 5, 'Want to watch.', '2023-04-26 11:12:06'),
(20, 7, 1, 5, 'Best fantasy story of the century', '2023-04-26 19:45:55'),
(21, 4, 1, 4, 'Watched again. Still good movie.', '2023-04-27 19:35:52'),
(22, 0, 1, 3, 'Average...', '2023-04-27 21:08:12'),
(23, 0, 1, 5, 'Favourite season!', '2023-04-27 21:19:45'),
(24, 0, 1, 5, 'Liked it.', '2023-04-27 21:20:33'),
(25, 13, 24, 5, 'Best movie! Watch it!', '2023-05-02 15:01:18'),
(26, 8, 1, 5, 'Very funny.', '2023-05-02 16:01:23'),
(27, 7, 24, 3, 'Nice.', '2023-05-02 16:25:30'),
(28, 6, 24, 5, 'Love it!', '2023-05-02 16:25:52'),
(29, 10, 24, 5, 'Watch it!', '2023-05-02 16:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `movie_title` varchar(255) NOT NULL,
  `movie_cover_image` varchar(255) NOT NULL,
  `movie_category` varchar(50) NOT NULL,
  `movie_description` text NOT NULL,
  `movie_release_year` int(4) NOT NULL,
  `movie_language` varchar(50) NOT NULL,
  `movie_duration` int(4) NOT NULL,
  `movie_youtube_link` varchar(255) NOT NULL,
  `movie_is_free` tinyint(1) DEFAULT '0',
  `movie_long_desc` text,
  PRIMARY KEY (`movie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `movie_cover_image`, `movie_category`, `movie_description`, `movie_release_year`, `movie_language`, `movie_duration`, `movie_youtube_link`, `movie_is_free`, `movie_long_desc`) VALUES
(4, 'The Shawshank Redemption', '../img/01.jpg', 'Drama', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 1994, 'English', 0, 'NmzuHjWmXOc', 1, 'The Shawshank Redemption tells the story of Andy Dufresne, a young and successful banker who is wrongly convicted of the murder of his wife and her lover. Sentenced to life in Shawshank State Penitentiary, Andy finds himself struggling to adjust to life behind bars. But despite the daily challenges he faces, Andy manages to form deep and meaningful friendships with his fellow inmates, including the charismatic and irreverent Red.\r\n\r\nAs the years go by, Andy becomes an invaluable asset to the prison staff, using his financial expertise to help them launder money and manage their finances. But he also remains determined to prove his innocence and seek justice for the crimes he did not commit. With the help of his friends, Andy develops a daring plan to escape from Shawshank and start a new life.\r\n\r\nThe Shawshank Redemption is a powerful and thought-provoking film about hope, perseverance, and the resilience of the human spirit. With its unforgettable performances, richly drawn characters, and unforgettable moments of humor, heartache, and redemption, it has become one of the most beloved and acclaimed films of all time.'),
(6, 'The Dark Knight', '../img/02.jpg', 'Drama', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept.', 2008, 'English', 0, 'EXeTwQWrcwY', 1, 'The Dark Knight is a 2008 superhero film directed by Christopher Nolan and starring Christian Bale, Heath Ledger, and Aaron Eckhart. It is the second installment in Nolan''s Batman film series, and follows the titular character as he confronts the chaotic and anarchic Joker, who seeks to undermine the stability of Gotham City.\r\n\r\nLedger''s portrayal of the Joker has been widely praised and is often regarded as one of the greatest performances in film history. The film was a critical and commercial success, grossing over $1 billion worldwide and receiving eight Academy Award nominations, including Best Picture and Best Supporting Actor for Ledger, who won the award posthumously.\r\n\r\nThe Dark Knight explores themes of justice, morality, and the nature of evil, and is known for its dark and gritty tone. It has been credited with revitalizing the superhero genre and has influenced many subsequent films in the genre.'),
(7, 'The Return of the King', '../img/03.jpg', 'Adventure', 'Gandalf and Aragorn lead the World of Men against Sauron''s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.', 2003, 'English', 0, 'r5X-hFf6Bwo', 1, 'The Return of the King is a 2003 epic fantasy adventure film directed by Peter Jackson and based on the third volume of J.R.R. Tolkien''s The Lord of the Rings. It is the third and final installment in the Lord of the Rings film series, following The Fellowship of the Ring (2001) and The Two Towers (2002).\r\n\r\nThe film follows hobbit Frodo Baggins as he and the Fellowship continue their quest to destroy the One Ring and defeat the dark lord Sauron. Meanwhile, Aragorn, Legolas, and Gimli lead an army in a final battle against Sauron''s forces at the gates of Mordor. The film features an ensemble cast, including Elijah Wood, Ian McKellen, Viggo Mortensen, Orlando Bloom, and many others.\r\n\r\nThe Return of the King was a critical and commercial success, winning all eleven Academy Awards for which it was nominated, including Best Picture, Best Director, and Best Adapted Screenplay. It grossed over $1.1 billion worldwide, becoming one of the highest-grossing films of all time.'),
(8, 'Forrest Gump', '../img/04.jpg', 'Romance', 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other historical events unfold through.', 1994, 'English', 0, 'bLvqoHBptjg', 1, 'Forrest Gump is a 1994 American comedy-drama film directed by Robert Zemeckis and written by Eric Roth. The story depicts several decades in the life of Forrest Gump, a slow-witted but kind-hearted and athletically-talented man from Alabama who witnesses and unwittingly influences several defining historical events in the 20th century United States. The film stars Tom Hanks, Robin Wright, Gary Sinise, and Sally Field.\r\n\r\nThe film is based on the 1986 novel of the same name by Winston Groom. The novel was adapted for the screen by Eric Roth, who completed the screenplay in 1988. The film was produced by Wendy Finerman, Steve Tisch, and Steve Starkey. It was released in the United States on July 6, 1994, and received critical acclaim, with praise for Zemeckis'' direction, Hanks'' performance, and the film''s story, visual effects, and music. It grossed over $677 million worldwide, becoming the highest-grossing film of 1994.'),
(9, 'Black Widow', '../img/09.jpg', 'Action', 'Natasha Romanoff, aka Black Widow, confronts the darker parts of her ledger when a dangerous conspiracy with ties to her past arises. Pursued by a force that will stop at nothing to bring her down, Natasha must deal with her history as a spy and the broken relationships left in her wake.', 2021, 'English', 134, 'ybji16u608U', 0, 'In "Black Widow," Natasha confronts her history as a former KGB assassin and is drawn into a web of conspiracy and danger. She reunites with her estranged family, including Yelena Belova (Florence Pugh), Melina Vostokoff (Rachel Weisz), and Alexei Shostakov/Red Guardian (David Harbour). Together, they face off against the formidable Taskmaster, a mysterious and formidable adversary with the ability to mimic the fighting style of any opponent.\r\n\r\nThe film delves into Natasha''s complex character, exploring her vulnerabilities, traumas, and resilience. It provides deeper insights into her backstory and the events that led her to become a superhero. Through a mix of intense action sequences, thrilling spy missions, and heartfelt moments, "Black Widow" showcases Natasha''s growth and transformation as she grapples with her past and finds her own redemption.'),
(10, 'No Time to Die', '../img/10.jpg', 'Action ', 'James Bond has left active service. His peace is short-lived when Felix Leiter, an old friend from the CIA, turns up asking for help, leading Bond onto the trail of a mysterious villain armed with dangerous new technology.', 2021, 'English', 163, 'BIhNsAtPbPI', 0, '"No Time to Die" is a 2021 spy film and the twenty-fifth installment in the iconic James Bond film series produced by Eon Productions. Directed by Cary Joji Fukunaga, the film serves as the fifth and final installment featuring Daniel Craig as the suave and enigmatic British secret agent, James Bond.\r\n\r\nThe story of "No Time to Die" picks up after the events of the previous film, "Spectre." Bond has left active service and is enjoying a tranquil life in Jamaica when he is suddenly called back into action. His old friend, CIA agent Felix Leiter, seeks his help in rescuing a kidnapped scientist, setting Bond on a mission that brings him face-to-face with a new adversary, Safin, played by Rami Malek. As Bond delves deeper into Safin''s sinister plot, he uncovers a shocking secret that poses a threat to the world as we know it.'),
(11, 'Dune', '../img/11.jpg', 'Adventure ', 'Paul Atreides, a brilliant and gifted young man born into a great destiny beyond his understanding, must travel to the most dangerous planet in the universe to ensure the future of his family and his people.', 2021, 'English', 155, 'n9xhJrPXop4', 0, '\r\n"Dune" is a 2021 epic science fiction film directed by Denis Villeneuve and based on the influential 1965 novel of the same name by Frank Herbert. The film takes viewers on a breathtaking journey to the distant future, where interstellar travel, political intrigue, and mystical powers shape the destiny of humanity.\r\n\r\nSet in a desert planet known as Arrakis, "Dune" follows the story of Paul Atreides, played by Timothée Chalamet, a young nobleman who becomes embroiled in a complex power struggle for control over the planet''s most valuable resource: a rare spice called melange. As Paul navigates the treacherous political landscape of Arrakis, he discovers his own hidden powers and becomes a central figure in a prophetic destiny that could change the course of the universe.'),
(12, 'Cruella', '../img/12.jpg', 'Comedy ', 'Estella is a young and clever fashion-obsessed orphan determined to make a name for herself in the world of design. She befriends a pair of young thieves who appreciate her appetite for mischief, and together they are able to build a life for themselves on the London streets.', 2021, 'English', 134, 'gmRKv7n2If8', 0, '"Cruella" is a 2021 American crime comedy-drama film that serves as a prequel to the beloved 1961 animated film "One Hundred and One Dalmatians." The film delves into the backstory of one of Disney''s most iconic villains, Cruella de Vil, exploring her transformation from Estella, a young aspiring fashion designer, to the notorious Cruella we know.\r\n\r\nSet in 1970s London, "Cruella" takes us on a wild and rebellious journey as Estella, played by Emma Stone, navigates the fashion world and tries to establish her own identity in a society that is determined to suppress her creativity. Alongside her trusted accomplices, Horace and Jasper, Estella embraces her dark side and embraces the persona of Cruella, a stylish and mischievous character known for her obsession with fur.'),
(13, 'Shang-Chi and the Legend of the Ten Rings', '../img/13.jpg', 'Action ', 'Shang-Chi must confront the past he thought he left behind when he is drawn into the web of the mysterious Ten Rings organization.', 2021, 'English', 132, 'giWIr7U1deA', 0, 'Shang-Chi and the Legend of the Ten Rings" is a 2021 American superhero film based on the Marvel Comics character Shang-Chi. The film follows the story of Shang-Chi, a skilled martial artist who is drawn into the clandestine world of the Ten Rings organization. As he confronts his past and the secrets of his family, Shang-Chi must harness his extraordinary abilities to face powerful enemies and protect the world from a great threat.\r\n\r\nWith stunning action sequences, compelling storytelling, and a diverse cast, "Shang-Chi and the Legend of the Ten Rings" explores themes of identity, heritage, and the power of self-discovery. It showcases the rich mythology of the Marvel Cinematic Universe while introducing audiences to a new hero with his own unique journey.');

-- --------------------------------------------------------

--
-- Table structure for table `tv_list`
--

CREATE TABLE IF NOT EXISTS `tv_list` (
  `tv_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tv_list_id`),
  KEY `fk_tv_list_tv` (`tv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tv_list`
--

INSERT INTO `tv_list` (`tv_list_id`, `tv_id`, `user_id`) VALUES
(16, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tv_reviews`
--

CREATE TABLE IF NOT EXISTS `tv_reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review_tv_id` int(11) DEFAULT NULL,
  `review_user_id` int(11) DEFAULT NULL,
  `review_rating` int(1) DEFAULT NULL,
  `review_comment` text,
  `review_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tv_reviews`
--

INSERT INTO `tv_reviews` (`review_id`, `review_tv_id`, `review_user_id`, `review_rating`, `review_comment`, `review_date`) VALUES
(1, 1, 1, 4, 'Nice.', '2023-04-27 21:21:20'),
(2, 8, 1, 4, 'I like it.', '2023-05-03 11:37:52');

-- --------------------------------------------------------

--
-- Table structure for table `tvshows`
--

CREATE TABLE IF NOT EXISTS `tvshows` (
  `tv_id` int(11) NOT NULL AUTO_INCREMENT,
  `tv_title` varchar(255) NOT NULL,
  `tv_season` int(11) DEFAULT NULL,
  `tv_image` varchar(255) NOT NULL,
  `tv_category` varchar(255) NOT NULL,
  `tv_description` text NOT NULL,
  `tv_long_desc` text,
  `tv_release_year` year(4) NOT NULL,
  `tv_language` varchar(50) NOT NULL,
  `tv_num_seasons` int(11) NOT NULL,
  `tv_num_episodes` int(11) NOT NULL,
  `tv_youtube_link` varchar(255) NOT NULL,
  `tv_is_free` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tvshows`
--

INSERT INTO `tvshows` (`tv_id`, `tv_title`, `tv_season`, `tv_image`, `tv_category`, `tv_description`, `tv_long_desc`, `tv_release_year`, `tv_language`, `tv_num_seasons`, `tv_num_episodes`, `tv_youtube_link`, `tv_is_free`) VALUES
(1, 'Stranger Things', 1, '../img/05.jpg', 'Science Fiction', 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying supernatural forces in order to get him back.', 'Stranger Things is an American science fiction horror streaming television series created by the Duffer Brothers and released on Netflix. The siblings also serve as executive producers with Shawn Levy and Dan Cohen. The series premiered on Netflix on July 15, 2016. Set in the fictional town of Hawkins, Indiana, in the 1980s, the first season focuses on the investigation into the disappearance of a young boy amid supernatural events occurring around the town, including the appearance of a girl with psychokinetic abilities.', 2016, 'English', 4, 25, 'b9EkMc79ZSU', 1),
(2, 'Game of Thrones', 1, '../img/08.jpg', 'Fantasy', 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.', 'The story begins with the Seven Kingdoms of Westeros on the brink of a power struggle. The noble houses, including the Starks, Lannisters, Targaryens, and Baratheons, each have their own ambitions and allegiances. As they navigate a web of alliances, betrayals, and conflicts, they must contend with not only their human adversaries but also the supernatural threat of the White Walkers, an ancient enemy that has awakened from its slumber beyond the Wall.\r\n\r\nThe characters in "Game of Thrones" are diverse and multi-dimensional, each with their own agendas and motivations. From the honorable and stoic Ned Stark to the cunning and manipulative Cersei Lannister, the series showcases a vast array of complex and flawed individuals. Viewers become deeply invested in their struggles, triumphs, and tragedies as they navigate the treacherous world of Westeros.\r\n\r\nThroughout the series, themes of power, loyalty, honor, and morality are explored. The pursuit of the Iron Throne, the symbol of ultimate power, drives many characters to make ruthless choices and sacrifices. As the story unfolds, viewers witness the consequences of these decisions and the toll it takes on individuals, families, and the realm itself.', 2011, 'English', 1, 1, 'KPLWWIOCOOQ', 0),
(3, 'Breaking Bad', 1, '../img/06.jpg', 'Drama', '"Breaking Bad" follows high school chemistry teacher Walter White as he turns to producing and selling methamphetamine after being diagnosed with cancer.', 'Breaking Bad follows the story of Walter White, a high school chemistry teacher diagnosed with cancer who turns to cooking and selling methamphetamine in order to provide for his family''s financial future. Along the way, he becomes involved with a motley crew of criminals and experiences the consequences of his actions, ultimately leading to a dramatic and explosive finale. The show explores themes of morality, family, and the consequences of one''s choices, and is widely regarded as one of the greatest television dramas of all time.', 2008, 'English', 1, 1, 'HhesaQXLuRY', 1),
(4, 'Westworld', 1, '../img/07.jpg', 'Science Fiction', 'In a futuristic Western-themed amusement park, Westworld, the visitors interact with automatons. However, all hell breaks loose when the robots begin malfunctioning.', 'Westworld is a high-tech, Western-themed amusement park where guests can indulge in any fantasy they desire. The park is populated by advanced androids who are indistinguishable from humans, and they are programmed to fulfill the guests’ every desire. However, when the androids start to malfunction and gain sentience, the guests’ idyllic vacation turns into a brutal struggle for survival.', 2016, 'English', 1, 1, '9BqKiZhEFFw', 1),
(6, 'Stranger Things', 2, 'stranger_things.jpg', 'Sci-Fi', 'A group of young friends in a small town encounter supernatural mysteries.', 'As the town of Hawkins recovers from the mysterious events of Season 1, the Upside Down continues to pose a threat to its residents. In Season 2 of Stranger Things, the gang reunites to face new supernatural forces that emerge in the aftermath of Will Byers'' return. Eleven, the telekinetic girl, escapes from her seclusion and joins the group in their battle against the Upside Down creatures. The secrets of the Hawkins Laboratory are further unraveled, revealing a larger conspiracy and a new danger that looms over the town. With its nostalgic 80s setting, gripping storyline, and a mix of sci-fi and horror elements, Stranger Things Season 2 takes viewers on another thrilling and suspenseful journey', 2016, 'English', 4, 9, 'R1ZXOOLMJ8s', 1),
(7, 'Stranger Things', 3, 'stranger_things.jpg', 'Sci-Fi', 'A group of young friends in a small town encounter supernatural mysteries.', 'In the midst of a vibrant mid-summer in Hawkins, Indiana, the cheerful town becomes a hub of both excitement and trepidation. With school out and the enticing pool open for enjoyment, the residents find themselves entangled in a sinister plot orchestrated by none other than the Russians. Determined to reopen the dreaded portal to the nightmarish Upside Down, they cunningly construct a brand new mall called Starcourt Mall, which swiftly becomes a hotbed of controversy and protest.\r\n\r\nAmidst this backdrop, the familiar gang of Hawkins faces a variety of challenges and mysteries that test their bonds and mettle. Joyce Byers, ever resilient, finds herself aiding Chief Jim Hopper in managing the complicated dynamic between Eleven and her devoted boyfriend, Mike. Simultaneously, she delves into the peculiar phenomenon that follows a recent power outage: the inexplicable loss of magnetism in the town''s once-reliable magnets. With her characteristic determination, Joyce unravels this perplexing enigma, driven by her unyielding curiosity.', 2016, 'English', 4, 8, 'Ml8JuxprNv4', 1),
(8, 'Stranger Things', 4, 'stranger_things.jpg', 'Sci-Fi', 'A group of young friends in a small town encounter supernatural mysteries.', 'March 1986 brings us back to the enigmatic town of Hawkins, eight months after the harrowing events of the third season. As the fourth season unfolds, we find ourselves immersed in a tale of intertwining plotlines, each one weaving its own web of mystery and intrigue.\r\n\r\nThe first plotline thrusts us directly into the heart of Hawkins, where a series of perplexing and chilling teenage murders plague the once-peaceful community. Suspicion falls upon Eddie Munson, the charismatic leader of the Hellfire Club, a group of avid Dungeons & Dragons players from Hawkins High School. When Chrissy Cunningham, the esteemed senior cheerleading captain, tragically meets her demise in Eddie''s trailer, he becomes the primary suspect in these gruesome crimes. However, a group consisting of familiar faces—Dustin Henderson, Lucas and Erica Sinclair, Max Mayfield, Steve Harrington, Nancy Wheeler, and Robin Buckley—band together to unravel the truth and exonerate Eddie. Their relentless investigation leads them to a startling revelation: a formidable and otherworldly entity, dwelling within the treacherous Upside Down, emerges as the true perpetrator. This mysterious being, subsequently named "Vecna" by our intrepid group, poses an unprecedented threat to Hawkins and its inhabitants.', 2016, 'English', 4, 8, 'sBEvEcpnG7k', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_dob` date NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_country` varchar(255) DEFAULT NULL,
  `user_type_paid` tinyint(1) NOT NULL,
  `user_card` varchar(255) DEFAULT NULL,
  `user_cvv` varchar(255) DEFAULT NULL,
  `user_exp_date` varchar(255) DEFAULT NULL,
  `user_status` tinyint(1) NOT NULL,
  `user_join_date` datetime NOT NULL,
  `user_is_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_country` (`user_country`(191)),
  KEY `user_country_2` (`user_country`(191)),
  KEY `user_country_3` (`user_country`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_surname`, `user_dob`, `user_email`, `user_pass`, `user_phone`, `user_country`, `user_type_paid`, `user_card`, `user_cvv`, `user_exp_date`, `user_status`, `user_join_date`, `user_is_admin`) VALUES
(1, 'Ellen', 'Hughes', '1985-09-08', 'eg@email.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '44708319 1128', 'United Kingdom', 0, NULL, NULL, NULL, 1, '2023-04-18 18:57:11', 0),
(2, 'Lara', 'Black', '1981-04-07', 'lb@email.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '447737667165', 'United Kingdom', 0, NULL, NULL, NULL, 1, '2023-04-18 19:52:29', 0),
(4, 'Lauren', 'Lauren', '2010-01-25', 'elel@mail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '44781596 5514', 'United Kingdom', 0, NULL, NULL, NULL, 1, '2023-04-19 14:19:22', 0),
(5, 'Janet', 'Benjamin', '1979-02-08', 'jb@email.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '16464007510', 'United States', 0, NULL, NULL, NULL, 1, '2023-04-19 22:09:46', 0),
(7, 'Donald', 'Millar', '2016-03-17', 'dm@email.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '01234567890', 'United Kingdom', 0, NULL, NULL, NULL, 1, '2023-04-22 02:01:37', 0),
(8, 'John', 'Smith', '1981-02-01', 'js@email.com', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', '1234567890', 'United Kingdom', 0, NULL, NULL, NULL, 1, '2023-04-26 20:34:05', 0),
(9, 'Ann', 'Smith', '1969-11-25', 'ann@email.com', 'c775e7b757ede630cd0aa1113bd102661ab38829ca52a6422ab782862f268646', '12345678890', 'United Kingdom', 0, NULL, NULL, NULL, 1, '2023-04-27 23:03:06', 0),
(20, 'Sam', 'Fisher', '2023-06-04', 'jf@user.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '07934023303', 'United Kingdom', 0, NULL, NULL, NULL, 1, '2023-05-02 13:04:43', 0),
(21, 'Ann', 'White', '1978-10-06', 'aw@email.com', '19cb0c81077687080551c63fd013e82ab921d3473f99940d311d74184ee5a169', '22222222222', 'United Kingdom', 0, NULL, NULL, NULL, 1, '2023-05-02 13:34:19', 0),
(22, 'Benjamin', 'Godfrey', '1978-05-04', 'bbg@paid.com', '19cb0c81077687080551c63fd013e82ab921d3473f99940d311d74184ee5a169', '07934023303', 'United Kingdom', 0, '455620210425100', '123', '2023-12', 1, '2023-05-02 13:57:34', 0),
(24, 'Christopher', 'Higgins', '1967-09-07', 'chris@paid.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '07721253929', 'United Kingdom', 1, 'd7949119808db9936574aaa14d135eadd59586d4424580bd8b9d90dd48587c4d', '123', '2041-10', 1, '2023-05-02 15:31:22', 0),
(26, 'Ross', 'Wood', '1956-02-07', 'rw@admin.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '', NULL, 0, NULL, NULL, NULL, 1, '2023-05-03 07:26:32', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tv_list`
--
ALTER TABLE `tv_list`
  ADD CONSTRAINT `fk_tv_list_tv` FOREIGN KEY (`tv_id`) REFERENCES `tvshows` (`tv_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
