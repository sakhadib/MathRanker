-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 07:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `verdict` tinyint(1) NOT NULL,
  `xp` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `p_id`, `uname`, `verdict`, `xp`, `created_at`, `updated_at`) VALUES
(19, '1', 'rahim', 0, 0.00, '2024-05-05 12:15:42', '2024-05-05 12:15:42'),
(20, '1', 'rahim', 0, 0.00, '2024-05-05 12:15:51', '2024-05-05 12:15:51'),
(21, '1', 'rahim', 0, 0.00, '2024-05-05 12:16:02', '2024-05-05 12:16:02'),
(22, '1', 'rahim', 0, 0.00, '2024-05-05 12:16:09', '2024-05-05 12:16:09'),
(23, '1', 'rahim', 1, 65.98, '2024-05-05 12:17:12', '2024-05-05 12:17:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `uname`, `content`, `created_at`, `updated_at`) VALUES
(3, 1, 'sakhadib', 'hi this is a comment \\(E=mc^2\\)\r\n\\[\r\nF = ma\r\n\\]', '2024-04-16 03:51:20', '2024-04-16 03:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `c_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_09_160224_create_solvers_table', 2),
(6, '2024_04_09_164140_create_problems_table', 3),
(7, '2024_04_09_164518_create_contests_table', 3),
(8, '2024_04_09_164911_create_attempts_table', 3),
(9, '2024_04_09_165548_change_description_column_type_to_text_in_problems_table', 4),
(10, '2024_04_15_135228_add_xp_and_rating_to_solvers_table', 5),
(11, '2024_04_15_141833_create_tags_table', 6),
(12, '2024_04_16_022335_create_posts_table', 7),
(13, '2024_04_16_022644_create_post__tags_table', 7),
(14, '2024_04_16_023231_create_votes_table', 7),
(15, '2024_04_16_023435_create_comments_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `uname`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'sakhadib', 'Bessel\'s Theorem', 'Bessel\'s Theorem states that for any integer \\(n\\) and any real number \\(x\\), the Bessel function of the first kind of order \\(n\\), denoted by \\(J_n(x)\\), can be expressed as:\r\n\r\n\\[\r\nJ_n(x) = \\frac{1}{\\pi} \\int_{0}^{\\pi} \\cos(n\\theta - x\\sin(\\theta)) \\, d\\theta\r\n\\]\r\n\r\nThis theorem provides a crucial relationship between Bessel functions and trigonometric functions, facilitating their evaluation and analysis in various mathematical contexts.\r\n\r\nNow, let\'s prove this theorem using the method of complex exponentials:\r\n\r\n\\[\r\n\\begin{align*}\r\nJ_n(x) &= \\frac{1}{2\\pi} \\int_{0}^{2\\pi} e^{i(n\\theta - x\\sin(\\theta))} \\, d\\theta \\quad \\text{(Using Euler\'s formula)} \\\\\r\n&= \\frac{1}{2\\pi} \\int_{0}^{2\\pi} e^{in\\theta} e^{-ix\\sin(\\theta)} \\, d\\theta \\\\\r\n&= \\frac{1}{2\\pi} \\int_{0}^{2\\pi} (\\cos(n\\theta) + i\\sin(n\\theta)) (\\cos(x\\sin(\\theta)) - i\\sin(x\\sin(\\theta))) \\, d\\theta \\\\\r\n&= \\frac{1}{2\\pi} \\int_{0}^{2\\pi} (\\cos(n\\theta)\\cos(x\\sin(\\theta)) + \\sin(n\\theta)\\sin(x\\sin(\\theta))) \\, d\\theta \\\\\r\n&= \\frac{1}{2\\pi} \\int_{0}^{2\\pi} \\cos(n\\theta)\\cos(x\\sin(\\theta)) \\, d\\theta \\quad \\text{(Since $ \\sin(n\\theta)\\sin(x\\sin(\\theta)) $ is odd)} \\\\\r\n&= \\frac{1}{2\\pi} \\int_{0}^{2\\pi} \\frac{1}{2} \\left[ \\cos(n\\theta - x\\sin(\\theta)) + \\cos(n\\theta + x\\sin(\\theta)) \\right] \\, d\\theta \\\\\r\n&= \\frac{1}{4\\pi} \\left[ \\int_{0}^{2\\pi} \\cos(n\\theta - x\\sin(\\theta)) \\, d\\theta + \\int_{0}^{2\\pi} \\cos(n\\theta + x\\sin(\\theta)) \\, d\\theta \\right] \\\\\r\n&= \\frac{1}{4\\pi} \\left[ \\int_{0}^{2\\pi} \\cos(n\\theta - x\\sin(\\theta)) \\, d\\theta + \\int_{0}^{2\\pi} \\cos(n\\theta - x\\sin(\\theta)) \\, d\\theta \\right] \\quad \\\\\r\n&= \\frac{1}{2\\pi} \\int_{0}^{2\\pi} \\cos(n\\theta - x\\sin(\\theta)) \\, d\\theta \\\\\r\n\\end{align*}\r\n\\]\r\n\r\nFinally, dividing both sides by \\(2\\), we obtain:\r\n\r\n\\[\r\nJ_n(x) = \\frac{1}{\\pi} \\int_{0}^{\\pi} \\cos(n\\theta - x\\sin(\\theta)) \\, d\\theta\r\n\\]\r\n\r\nThis completes the proof of Bessel\'s Theorem.', '2024-04-15 21:10:36', '2024-04-15 21:10:36'),
(2, 'yasir', 'Title', 'jhguykfkv\r\n\r\n\\(\\textbf{Bold}\\)lshvkjbj', '2024-04-17 03:11:41', '2024-04-17 03:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `post__tags`
--

CREATE TABLE `post__tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(100) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post__tags`
--

INSERT INTO `post__tags` (`id`, `tag_name`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'math', 1, '2024-04-15 21:10:36', '2024-04-15 21:10:36'),
(2, 'integration', 1, '2024-04-15 21:10:36', '2024-04-15 21:10:36'),
(3, 'differential equation', 1, '2024-04-15 21:10:36', '2024-04-15 21:10:36'),
(4, 'math', 2, '2024-04-17 03:11:41', '2024-04-17 03:11:41'),
(5, 'trigonometry', 2, '2024-04-17 03:11:41', '2024-04-17 03:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `p_id` int(20) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `c_id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `answer` decimal(8,2) NOT NULL,
  `max_xp` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`p_id`, `uname`, `c_id`, `title`, `description`, `answer`, `max_xp`, `created_at`, `updated_at`) VALUES
(1, 'sakhadib', 'QXA', 'The Big Boss', 'This is a problem with,\n\n\\(x^2\\)\n\n\\[F = G\\frac{Mm}{r^2}\\]\n\n\\[E = mc^2 \\]', 25.00, 100.00, '2024-04-30 19:11:21', '2024-04-30 13:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `solvers`
--

CREATE TABLE `solvers` (
  `uname` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'solver',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `XP` decimal(8,2) DEFAULT 0.00,
  `rating` decimal(8,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `solvers`
--

INSERT INTO `solvers` (`uname`, `fname`, `lname`, `email`, `institution`, `city`, `country`, `password`, `remember_token`, `role`, `created_at`, `updated_at`, `XP`, `rating`) VALUES
('rahim', 'Rahim', 'Mia', 'rahimmia@gmail.com', 'Islamic University of Technology', NULL, 'Bangladesh', '25d55ad283aa400af464c76d713c07ad', NULL, 'solver', '2024-05-05 12:13:32', '2024-05-05 12:13:32', 0.00, 0.00),
('rayshu', 'Tahsin', 'Islam', 'tahsinislam2200@gmail.com', 'Islamic University of Technology', NULL, 'Bangladesh', '25d55ad283aa400af464c76d713c07ad', NULL, 'solver', '2024-04-15 08:03:06', '2024-04-15 08:03:06', 0.00, 0.00),
('sakhadib', 'Adib', 'sakhawat', 'sakhawatadib@gmail.com', 'Islamic University of Technology', NULL, 'Bangladesh', '8c0cade4ece08f46a2b410b2ba98cbeb', NULL, 'solver', '2024-04-12 11:04:28', '2024-04-12 11:04:28', 0.00, 0.00),
('takiafarhin', 'Takia', 'Farhin', 'Takia03@gmail.com', 'Islamic University of Technology', NULL, 'Bangladesh', '25d55ad283aa400af464c76d713c07ad', NULL, 'solver', '2024-04-15 08:04:05', '2024-04-15 08:04:05', 0.00, 0.00),
('yasir', 'Yasir', 'Raiyan', 'yasir@gmail.com', 'Islamic University of Technology', NULL, 'Bangladesh', '25d55ad283aa400af464c76d713c07ad', NULL, 'solver', '2024-04-17 02:28:12', '2024-04-17 02:28:12', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `p_id` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sakhadib', 'sakhadib@gmail.com', NULL, '$2y$12$ry7qMLwmFg0mOcbCCe0BfeXwlJadIDSdST27XUvsCoQxjy1AiYxry', 'aVLjCGAxOkwJ0qZYmnjNNMp4aSMn3ST6TtniI6NIkWf7g2yJ335pJLHLuSpX', '2024-04-09 08:21:02', '2024-04-09 08:21:02');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uname` varchar(255) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `vote` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `uname`, `post_id`, `vote`, `created_at`, `updated_at`) VALUES
(1, 'sakhadib', 1, 1, '2024-04-15 21:21:56', '2024-04-15 21:21:56'),
(2, 'takiafarhin', 1, 1, '2024-04-16 11:54:09', '2024-04-16 11:54:27'),
(3, 'yasir', 1, 0, '2024-04-17 03:07:01', '2024-04-17 03:07:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post__tags`
--
ALTER TABLE `post__tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post__tags_post_id_foreign` (`post_id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `solvers`
--
ALTER TABLE `solvers`
  ADD PRIMARY KEY (`uname`),
  ADD UNIQUE KEY `solvers_email_unique` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votes_post_id_foreign` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post__tags`
--
ALTER TABLE `post__tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `p_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post__tags`
--
ALTER TABLE `post__tags`
  ADD CONSTRAINT `post__tags_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
