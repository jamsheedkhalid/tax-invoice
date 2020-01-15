-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 07:06 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alsanawabar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tax_invoices`
--

CREATE TABLE `tax_invoices`
(
    `id`                int(11)      NOT NULL,
    `family_id`         varchar(100) NOT NULL,
    `student_admission` varchar(100) NOT NULL,
    `is_single`         tinyint(4)   NOT NULL DEFAULT 0,
    `is_multiple`       tinyint(4)   NOT NULL DEFAULT 0,
    `is_book`           tinyint(4)   NOT NULL DEFAULT 0,
    `invoice_date`      date         NOT NULL,
    `is_deleted`        tinyint(4)   NOT NULL DEFAULT 0,
    `created_at`        timestamp    NOT NULL DEFAULT current_timestamp(),
    `updated_at`        timestamp    NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB
  DEFAULT CHARSET = latin1;

--
-- Dumping data for table `tax_invoices`
--

INSERT INTO `tax_invoices` (`id`, `family_id`, `student_admission`, `is_single`, `is_multiple`, `is_book`,
                            `invoice_date`, `is_deleted`, `created_at`, `updated_at`)
VALUES (64, '57', '539975', 0, 0, 1, '2020-01-15', 1, '2020-01-15 05:56:26', '2020-01-15 05:56:26'),
       (65, '85', '799068', 0, 0, 1, '2020-01-15', 0, '2020-01-15 05:57:35', '2020-01-15 05:57:35'),
       (66, '57', '539975', 0, 1, 0, '2020-01-15', 1, '2020-01-15 05:58:45', '2020-01-15 05:58:45'),
       (67, '57', '539975', 1, 0, 0, '2020-01-15', 1, '2020-01-15 05:58:52', '2020-01-15 05:58:52'),
       (68, '57', '539975', 0, 0, 1, '2020-01-15', 0, '2020-01-15 06:04:28', '2020-01-15 06:04:28'),
       (69, '57', '539975', 0, 1, 0, '2020-01-15', 0, '2020-01-15 06:06:09', '2020-01-15 06:06:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tax_invoices`
--
ALTER TABLE `tax_invoices`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tax_invoices`
--
ALTER TABLE `tax_invoices`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
