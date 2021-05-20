-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2019 at 01:36 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(500) NOT NULL,
  `image` varchar(256) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `gender`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Muhammad Jukahpin', 'muhammadjukahpin@gmail.com', '$2y$10$L1twrTrUp5.2HebECnd9ueuWvo/ShzvPaB9KiJiQR4Xm6fvW6zW/K', 'profile.jpg', 'male', 1, 1, 1573719604),
(6, 'penghuni goa', 'apaapakah798@gmail.com', '$2y$10$L0oc4/qg7IwaueqIZfytZOA.AnC8mt19tcZT/f5AbO5fyJPUSUyvG', 'male.jpg', 'male', 2, 1, 1573725181),
(7, 'Siti Wahyuni Fitri', 'yuni@gmail.com', '$2y$10$5a73Ty9nujJOc4ubpKr0l.YjnUHzld73lcsLb2T55m8dJug/MhIC.', 'yuni.jpg', 'female', 3, 1, 1573996300),
(8, 'Qori Melinda Sandi', 'qori@gmail.com', '$2y$10$p261m03.91Km3/XVyxPG/eeU2w7y7HbQHcJHOxHkQcsj9x1xm0bzy', 'qori.jpg', 'female', 3, 1, 1574772450);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 2),
(5, 2, 3),
(6, 1, 4),
(8, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `label` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `email`, `name`, `address`, `no_hp`, `label`, `description`) VALUES
(2, 'muhammadjukahpin@gmail.com', 'Muhammad Jukahpin', 'Jln.Raya PLP curug Kp.Candu No.81 RT.002 RW.007 Kel.Curug Kulon Kec.Curug Kab.Tangerang Prov.Banten', '089601846870', 'Home', 'First Address'),
(4, 'apaapakah798@gmail.com', 'penghuni goa', 'Jln.Raya PLP curug Kp.Curug No.81 Kel.Curug Kulon Kec.Curug Kab.Tangerang Prov.Banten', '089601846870', 'Home', 'First Address');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu_id`, `menu`) VALUES
(1, 1, 'Admin'),
(2, 2, 'Member'),
(3, 3, 'User'),
(4, 4, 'Menu');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `role` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_id`, `role`) VALUES
(1, 1, 'Administrator'),
(2, 2, 'Member'),
(3, 3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_shop`
--

CREATE TABLE `user_shop` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `image` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `name_item` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_shop`
--

INSERT INTO `user_shop` (`id`, `email`, `name`, `no_hp`, `image`, `category`, `name_item`, `price`, `description`) VALUES
(5, 'apaapakah798@gmail.com', 'penghuni goa', '6289601846870', 'IMG_20191118_143737.jpg', 'clothing', 'Kemeja', 150000, 'Bahannya sangat bagus dan sangat berkualitas dan awet'),
(6, 'apaapakah798@gmail.com', 'penghuni goa', '6289601846870', 'IMG_20191118_143805.jpg', 'clothing', 'Kemeja', 140000, 'Bahannya sangat bagus dan sangat berkualitas dan awet'),
(7, 'apaapakah798@gmail.com', 'penghuni goa', '6289601846870', 'IMG_20191118_143836.jpg', 'clothing', 'Kemeja bagus', 120000, 'Bahannya sangat bagus dan sangat berkualitas dan awet'),
(8, 'apaapakah798@gmail.com', 'penghuni goa', '6289601846870', 'IMG_20191118_143853.jpg', 'clothing', 'Kemeja joss', 160000, 'Bahannya sangat bagus dan sangat berkualitas dan awet'),
(9, 'apaapakah798@gmail.com', 'penghuni goa', '6289601846870', 'IMG_20191118_143908.jpg', 'clothing', 'Kemeja rapih', 135000, 'Bahannya sangat bagus dan sangat berkualitas dan awet'),
(10, 'apaapakah798@gmail.com', 'penghuni goa', '6289601846870', 'IMG_20191118_143931.jpg', 'clothing', 'Kemeja santai', 100000, 'Bahan terbuat dari kain katun dan sangat berkualitas dan sangat awet dan harganya terjangau'),
(16, 'muhammadjukahpin@gmail.com', 'Muhammad Jukahpin', '6289601846870', 'jaket.jpg', 'clothing', 'Jacket Joss', 120000, 'mantepp');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `icon` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Store', 'member', 'fas fa-fw fa-store', 1),
(3, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(4, 3, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(5, 3, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(6, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(7, 4, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(8, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(9, 3, 'Shop', 'user/shop', 'fas fa-fw fa-shopping-cart', 1),
(10, 3, 'My Address', 'user/address', 'fas fa-fw fa-home', 1),
(11, 3, 'Message', 'user/message', 'fas fa-fw fa-envelope', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `token` varchar(500) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(8, 'yuni@gmail.com', 'rITPEOiS46WyeRZDBJG4jckTEd/3nLI6g1TY3uosin0=', 1573995658),
(9, 'dscxc@sasa.jj', 'okiyKrCWf2/nVCEKum1r8VGSK9c+IkqjTpANuxV/bI8=', 1573995802),
(10, 'yuni@gmail.com', '5tzWyPYDtGbvIPwM8JtEf+UuHmO8Ux6EtcaPnBoy2Jk=', 1573996300),
(11, 'qori@gmail.com', 'RxQDXhha5+lD8YkSjI43IJ6GFa72u3wY49V1FwJ0wIA=', 1574772450);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_shop`
--
ALTER TABLE `user_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_shop`
--
ALTER TABLE `user_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
