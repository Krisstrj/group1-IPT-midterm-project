-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 02:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `descriptions`) VALUES
(1, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Fiction', 'A novel set in the 1920s, following the life of Jay Gatsby and his obsessive love for Daisy Buchanan, exploring themes of decadence, idealism, resistance to change, and excess.'),
(2, 'To Kill a Mockingbird', 'Harper Lee', 'Classic Fiction', 'A young girl witnesses her father, lawyer Atticus Finch, defend a black man wrongly accused of raping a white woman in the racially charged South during the 1930s.'),
(3, '1984', 'George Orwell', 'Dystopian Fiction', 'A novel about a totalitarian regime led by Big Brother, exploring themes of surveillance, censorship, and individual freedom in a society where truth is manipulated.'),
(4, 'The Catcher in the Rye', 'J.D. Salinger', 'Coming-of-Age', 'The story of Holden Caulfield, a troubled teenager, as he reflects on his life, struggles with his identity, and his views on society, youth, and adulthood.'),
(5, 'Moby-Dick', 'Herman Melville', 'Adventure', 'A tale of Captain Ahab\'s obsessive quest to kill the white whale, Moby Dick, symbolizing humanity’s struggle against nature, fate, and the consequences of obsession.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
