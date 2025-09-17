-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Sep 17, 2025 at 06:25 AM
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
-- Database: `automation_industry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `email`, `is_active`, `created_at`, `last_login`) VALUES
(1, 'kunal', 'kunal', 'admin@automation-industry.com', 1, '2025-09-11 18:31:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `icon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'Custom websites and web applications', 'code', 1, '2025-09-15 09:00:10', '2025-09-15 09:03:58'),
(2, 'Mobile Apps', 'iOS and Android mobile applications', 'smartphone', 1, '2025-09-15 09:00:10', '2025-09-15 09:03:58'),
(3, 'Digital Marketing', 'SEO, social media, and online marketing', 'trending-up', 1, '2025-09-15 09:00:10', '2025-09-15 09:03:58'),
(4, 'Consulting', 'Business and technology consulting services', 'users', 1, '2025-09-15 09:00:10', '2025-09-15 09:03:58'),
(5, 'E-commerce', 'Online stores and payment solutions', 'shopping-cart', 1, '2025-09-15 09:00:10', '2025-09-15 09:03:58'),
(6, 'Cloud Services', 'Cloud hosting and infrastructure', 'cloud', 1, '2025-09-15 09:00:10', '2025-09-15 09:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `category_id`, `description`, `image`, `features`, `is_active`, `created_at`, `updated_at`) VALUES
(55, 'Custom Web Development', 1, 'Build responsive, modern websites tailored to your business needs with cutting-edge technologies and best practices.', 'public/services/modern-web-development.png', NULL, 1, '2025-09-15 09:06:07', '2025-09-16 12:06:35'),
(57, 'Mobile App Development', 2, 'Native and cross-platform mobile applications for iOS and Android with seamless user experiences.', 'public/services/mobile-app-development.png', NULL, 1, '2025-09-15 09:06:07', '2025-09-16 12:19:15'),
(58, 'Progressive Web Apps', 2, 'Fast, reliable web applications that work offline and provide native app-like experiences.', 'public/services/progressive-web-apps.png', NULL, 0, '2025-09-15 09:06:07', '2025-09-16 12:29:56'),
(59, 'SEO Optimization', 3, 'Improve your search engine rankings and drive organic traffic with comprehensive SEO strategies.', 'public/services/seo-optimization.png', NULL, 1, '2025-09-15 09:06:07', '2025-09-15 09:07:21'),
(61, 'Business Strategy Consulting', 4, 'Strategic planning and business analysis to help you make informed decisions and achieve growth.', 'public/services/business-strategy-consulting.png', NULL, 1, '2025-09-15 09:06:07', '2025-09-15 09:07:21'),
(62, 'Digital Transformation', 4, 'Guide your business through digital transformation with technology adoption and process optimization.', 'public/services/digital-transformation.png', NULL, 1, '2025-09-15 09:06:07', '2025-09-15 09:07:21'),
(63, 'Cloud Infrastructure', 6, 'Scalable cloud solutions for hosting, storage, and application deployment with enterprise-grade security.', 'public/services/cloud-infrastructure.png', NULL, 1, '2025-09-15 09:06:07', '2025-09-15 09:07:21'),
(64, 'Database Design', 6, 'Efficient database architecture and optimization for high-performance applications and data analytics.', 'public/services/database-design.png', NULL, 1, '2025-09-15 09:06:07', '2025-09-15 09:07:21'),
(65, 'Brand Identity Design', NULL, 'Complete brand identity packages including logos, color schemes, typography, and brand guidelines.', 'public/services/brand-identity-design.png', NULL, 1, '2025-09-15 09:06:07', '2025-09-15 09:07:21'),
(66, 'Social Media Management', 3, 'Strategic social media campaigns and content management to build brand awareness and engagement.', 'public/services/social-media-management.png', NULL, 1, '2025-09-15 09:06:07', '2025-09-15 09:07:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `idx_name` (`name`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_category_id` (`category_id`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
