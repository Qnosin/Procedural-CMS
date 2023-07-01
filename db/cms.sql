-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lip 01, 2023 at 02:16 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'javascript'),
(24, 'PHP'),
(26, 'OOP');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_date`, `comment_email`, `comment_content`, `comment_status`) VALUES
(6, 1, 'Jakub Putaj', '2023-06-20', 'japutaj@gmail.com', 'Hello long friend!', 'approve');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 26, 'Edwin cms PHP course is awesome', 'John Doe', '2023-06-18', 'php.jpg', '                Wow i really really like this course        ', 'edwin, javascript, php, courses', 1, 'draft'),
(2, 2, 'Javascript Course', 'Belinda', '2023-06-18', 'caspar-camille-rubin-89xuP-XmyrA-unsplash.jpg', '        Wow this is a really cool course about javascript!                                        ', 'Belinda', 0, 'draft'),
(5, 2, 'Best PHP Course ', 'Edwin Diaz', '2023-06-18', 'download.jpg', '        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit, tellus vulputate aliquet egestas, sem orci porttitor magna, et pretium nisi ante et nibh. Vestibulum et eros id ligula convallis consectetur ac ac ipsum. Etiam efficitur, mi sed sollicitudin dignissim, sapien enim pretium lectus, quis rhoncus purus lectus tempor justo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In consequat, dui id consectetur eleifend, nisi magna vehicula turpis, a maximus turpis mi et massa. Praesent vehicula lacus a diam tempus ultricies. Proin pretium egestas malesuada. Cras eu est euismod, lacinia lectus id, eleifend libero. Sed orci mi, iaculis eu massa ac, euismod maximus magna. Vestibulum in nunc leo. Pellentesque tempor quam eu odio maximus tincidunt. Praesent viverra elementum leo, vel congue felis mattis mattis.\r\n\r\nAenean ultricies arcu sit amet sem laoreet, nec mattis sapien commodo. Pellentesque elementum dui ut libero ultrices, sed ultricies mi pharetra. Vivamus elementum venenatis fringilla. Integer elementum fringilla tellus, id faucibus magna dictum sed. Sed nulla ante, venenatis vitae tortor quis, luctus volutpat ex. Quisque enim lectus, pellentesque ut sapien sed, luctus volutpat tellus. Donec nec libero odio. Donec id dui venenatis, viverra nulla in, accumsan justo. Integer quis mauris ut tortor convallis lacinia et sed ligula. Proin elit augue, vehicula ac pretium sit amet, porta nec augue. Curabitur interdum condimentum sem, blandit iaculis nisl sodales a.    ', 'php,oop,js,wordpress', 0, 'draft'),
(6, 2, 'Wordpress are fun but it is still good in 2023?', 'Jakub Putaj', '2023-06-18', 'download.png', '        Nullam hendrerit tortor vel velit lobortis, sit amet accumsan nisl vehicula. Sed non lectus at nisl condimentum ultrices. Quisque blandit sagittis eros, nec molestie dolor euismod vel. Pellentesque at dolor tempor, hendrerit quam vitae, pretium ante. Vivamus fermentum, nulla ut auctor auctor, leo quam faucibus sem, et rutrum nisl risus sit amet nulla. Quisque sagittis ligula fringilla porta pellentesque. Maecenas pretium pharetra arcu, eget tempus dui pellentesque eu. Quisque eget venenatis tellus. Ut pellentesque dignissim libero mattis rhoncus. Fusce vulputate convallis turpis, eget iaculis neque varius iaculis. Integer laoreet fringilla metus, id tincidunt arcu tincidunt ac. Nam nec porttitor orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit.    ', 'php,wordpress,webDevelopment', 0, 'draft'),
(7, 2, 'Javascript in 2023 is OVERHYPED!', 'Jakub Putaj', '2023-06-26', '', '                Hello Internet i jus want to say that javascript is overhyped in 2023!        ', 'js,php,comparision,webdev', 0, 'published');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(6, 'admin', '$2y$10$rH1eDHbpbZgnB7MfH8dKjuIhc3uDul2jlDbayIYYSKW8YWIQNndF.', 'admin', 'admin', 'admin@interia.pl', '', 'admin', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
