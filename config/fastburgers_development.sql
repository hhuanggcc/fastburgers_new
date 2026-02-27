-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2026 at 01:59 AM
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
-- Database: `fastburgers_development`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_type` enum('walk_in','online') NOT NULL,
  `cust_first_name` varchar(50) DEFAULT NULL,
  `cust_last_name` varchar(50) DEFAULT NULL,
  `customer_phoneNo` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_type`, `cust_first_name`, `cust_last_name`, `customer_phoneNo`, `email`, `password`) VALUES
(1, 'walk_in', NULL, NULL, NULL, NULL, ''),
(2, 'online', 'John', 'Smith', '555-1020', 'john.smith@email.com', ''),
(3, 'online', 'Emily', 'Carson', '555-1122', 'emily.carson@email.com', ''),
(4, 'walk_in', NULL, NULL, NULL, NULL, ''),
(5, 'online', 'Daniel', 'Scott', '555-2101', 'daniel.scott@email.com', ''),
(6, 'walk_in', NULL, NULL, NULL, NULL, ''),
(7, 'online', 'Maria', 'Lopez', '555-3300', 'maria.lopez@email.com', ''),
(8, 'walk_in', NULL, NULL, NULL, NULL, ''),
(9, 'online', 'James', 'Walker', '555-8822', 'james.walker@email.com', ''),
(10, 'walk_in', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_type` enum('Regular','Savers') NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_type`, `menu_name`, `start_date`, `end_date`, `is_active`) VALUES
(1, 'Regular', 'Main Menu', '2025-01-01', NULL, 1),
(2, 'Savers', 'Value Meals', '2025-02-01', '2025-12-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `payment_method` enum('cash','card') NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `staff_id`, `outlet_id`, `payment_method`, `order_total`, `order_datetime`) VALUES
(1, 1, 3, 1, 'cash', 11.50, '2025-02-10 09:05:00'),
(2, 2, 3, 1, 'card', 11.00, '2025-02-10 10:00:00'),
(3, 4, 2, 1, 'cash', 9.00, '2025-02-10 11:20:00'),
(4, 5, 9, 2, 'card', 12.00, '2025-02-10 12:05:00'),
(5, 3, 9, 2, 'card', 13.00, '2025-02-10 12:40:00'),
(6, 6, 10, 2, 'cash', 8.50, '2025-02-10 13:15:00'),
(7, 2, 7, 2, 'card', 10.50, '2025-02-10 13:50:00'),
(8, 7, 15, 3, 'cash', 9.00, '2025-02-10 14:20:00'),
(9, 8, 15, 3, 'card', 14.00, '2025-02-10 15:05:00'),
(10, 9, 19, 4, 'cash', 6.50, '2025-02-10 15:40:00'),
(11, 10, 19, 4, 'card', 7.60, '2025-02-10 16:10:00'),
(12, 2, 26, 5, 'card', 12.50, '2025-02-10 17:00:00'),
(13, 7, 26, 5, 'cash', 11.00, '2025-02-10 17:40:00'),
(14, 3, 33, 6, 'cash', 8.20, '2025-02-10 18:10:00'),
(15, 2, 3, 1, 'card', 14.00, '2025-02-10 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `paid_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `paid_price`) VALUES
(1, 1, 5, 1, 4.20),
(3, 2, 1, 1, 8.50),
(4, 2, 3, 1, 3.00),
(5, 3, 12, 1, 5.00),
(6, 3, 13, 1, 2.50),
(7, 4, 2, 1, 9.00),
(8, 4, 4, 1, 2.00),
(9, 5, 7, 1, 5.20),
(10, 5, 9, 1, 2.80),
(11, 6, 1, 1, 8.50),
(12, 7, 3, 1, 3.00),
(13, 7, 4, 1, 2.00),
(14, 8, 10, 1, 7.60),
(15, 9, 2, 1, 9.00),
(16, 10, 13, 1, 2.50),
(17, 10, 14, 1, 1.20),
(18, 11, 11, 1, 3.80),
(19, 11, 4, 1, 2.00),
(20, 12, 1, 1, 8.50),
(21, 12, 3, 1, 3.00),
(22, 13, 15, 1, 3.50),
(23, 14, 5, 1, 4.20),
(24, 14, 8, 1, 2.00),
(25, 15, 2, 1, 9.00),
(26, 15, 3, 1, 3.00);

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `outlet_id` int(11) NOT NULL,
  `outlet_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`outlet_id`, `outlet_name`, `address`, `contact_number`) VALUES
(1, 'Downtown Branch', '12 Main Street', '555-1000'),
(2, 'Eastside Branch', '88 East Ave', '555-2000'),
(3, 'West Market Branch', '45 Market Road', '555-3000'),
(4, 'North Hill Branch', '201 North Hill Rd', '555-4000'),
(5, 'Lakeside Branch', '78 Lakeside Blvd', '555-5000'),
(6, 'Airport Branch', 'Terminal 1 Food Court', '555-6000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `category` enum('Food','Drink') NOT NULL,
  `is_breakfast` tinyint(1) NOT NULL,
  `available_until` time DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `menu_id`, `product_name`, `category`, `is_breakfast`, `available_until`, `price`) VALUES
(1, 1, 'Classic Burger', 'Food', 0, NULL, 9.50),
(2, 1, 'Chicken Burger', 'Food', 0, NULL, 9.00),
(3, 1, 'Fries', 'Food', 0, NULL, 3.00),
(4, 1, 'Cola', 'Drink', 0, NULL, 2.00),
(5, 1, 'Breakfast Muffin', 'Food', 1, '11:00:00', 4.20),
(6, 1, 'Coffee', 'Drink', 1, '11:00:00', 2.80),
(7, 1, 'Pancake Stack', 'Food', 1, '11:00:00', 5.20),
(8, 1, 'Hash Browns', 'Food', 1, '11:00:00', 2.00),
(9, 1, 'Orange Juice', 'Drink', 1, '11:00:00', 2.80),
(10, 1, 'Veggie Burger', 'Food', 0, NULL, 7.60),
(11, 1, 'Iced Latte', 'Drink', 0, NULL, 3.80),
(12, 2, 'Saver Burger', 'Food', 0, NULL, 5.00),
(13, 2, 'Saver Fries', 'Food', 0, NULL, 2.50),
(14, 2, 'Value Cola', 'Drink', 0, NULL, 1.20),
(15, 2, 'Nuggets', 'Food', 0, NULL, 3.50),
(16, 1, 'Chocolate Muffin', 'Food', 1, '11:00:00', 3.50);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `shift_date` date NOT NULL,
  `shift_type` enum('Morning','Afternoon','Night') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `staff_id`, `outlet_id`, `shift_date`, `shift_type`) VALUES
(1, 1, 1, '2025-02-10', 'Morning'),
(2, 3, 1, '2025-02-10', 'Morning'),
(3, 2, 1, '2025-02-10', 'Afternoon'),
(4, 4, 1, '2025-02-10', 'Afternoon'),
(5, 1, 1, '2025-02-10', 'Night'),
(6, 5, 1, '2025-02-10', 'Night'),
(7, 7, 2, '2025-02-10', 'Morning'),
(8, 9, 2, '2025-02-10', 'Morning'),
(9, 8, 2, '2025-02-10', 'Afternoon'),
(10, 10, 2, '2025-02-10', 'Afternoon'),
(11, 7, 2, '2025-02-10', 'Night'),
(12, 11, 2, '2025-02-10', 'Night'),
(13, 13, 3, '2025-02-10', 'Morning'),
(14, 15, 3, '2025-02-10', 'Afternoon'),
(15, 16, 3, '2025-02-10', 'Night'),
(16, 19, 4, '2025-02-10', 'Morning'),
(17, 21, 4, '2025-02-10', 'Afternoon'),
(18, 22, 4, '2025-02-10', 'Night'),
(19, 26, 5, '2025-02-10', 'Morning'),
(20, 27, 5, '2025-02-10', 'Afternoon'),
(21, 30, 5, '2025-02-10', 'Night'),
(22, 33, 6, '2025-02-10', 'Afternoon');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` enum('Manager','Sales','Cook') NOT NULL,
  `staff_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `outlet_id`, `first_name`, `last_name`, `role`, `staff_email`) VALUES
(1, 1, 'Alice', 'Johnson', 'Manager', 'alice.johnson@fastburgers.com'),
(2, 1, 'Brian', 'Cooper', 'Manager', 'brian.cooper@fastburgers.com'),
(3, 1, 'Sarah', 'Lee', 'Sales', 'sarah.lee@fastburgers.com'),
(4, 1, 'Kevin', 'White', 'Sales', 'kevin.white@fastburgers.com'),
(5, 1, 'Sam', 'Rogers', 'Cook', 'sam.rogers@fastburgers.com'),
(6, 1, 'Daniel', 'Cruz', 'Cook', 'daniel.cruz@fastburgers.com'),
(7, 2, 'Lily', 'Brown', 'Manager', ''),
(8, 2, 'George', 'Nelson', 'Manager', ''),
(9, 2, 'Nora', 'Hill', 'Sales', ''),
(10, 2, 'Tina', 'Parker', 'Sales', ''),
(11, 2, 'Tom', 'Davis', 'Cook', ''),
(12, 2, 'Hector', 'Lopez', 'Cook', ''),
(13, 3, 'Jacob', 'Miller', 'Manager', ''),
(14, 3, 'Renee', 'Howard', 'Manager', ''),
(15, 3, 'Olivia', 'Adams', 'Sales', ''),
(16, 3, 'Chloe', 'Sanders', 'Sales', ''),
(17, 3, 'Evan', 'Bryant', 'Cook', ''),
(18, 3, 'Leo', 'Torres', 'Cook', ''),
(19, 4, 'Sophia', 'King', 'Manager', ''),
(20, 4, 'Marcus', 'Cole', 'Manager', ''),
(21, 4, 'Ella', 'Reed', 'Sales', ''),
(22, 4, 'Vera', 'Morgan', 'Sales', ''),
(23, 4, 'Marcus', 'Stone', 'Cook', ''),
(24, 4, 'Isaac', 'Wong', 'Cook', ''),
(25, 5, 'Henry', 'Woods', 'Manager', ''),
(26, 5, 'Derek', 'Stone', 'Manager', ''),
(27, 5, 'Paula', 'Green', 'Sales', ''),
(28, 5, 'Mia', 'Turner', 'Sales', ''),
(29, 5, 'Derek', 'Baker', 'Cook', ''),
(30, 5, 'Jason', 'Hunt', 'Cook', ''),
(31, 6, 'Faith', 'Young', 'Manager', ''),
(32, 6, 'Oscar', 'Kim', 'Manager', ''),
(33, 6, 'Ruby', 'Hayes', 'Sales', ''),
(34, 6, 'Zoe', 'Carter', 'Sales', ''),
(35, 6, 'Ivan', 'Shaw', 'Cook', ''),
(36, 6, 'Elliot', 'Grant', 'Cook', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `outlet_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `current_quantity` int(11) NOT NULL,
  `restock_threshold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `outlet_id`, `product_id`, `current_quantity`, `restock_threshold`) VALUES
(1, 1, 1, 45, 15),
(2, 2, 1, 40, 15),
(3, 3, 1, 30, 10),
(4, 4, 1, 25, 10),
(5, 5, 1, 20, 8),
(6, 6, 1, 18, 8),
(7, 1, 3, 60, 20),
(8, 2, 3, 55, 20),
(9, 3, 3, 40, 15),
(10, 4, 3, 35, 15),
(11, 5, 3, 30, 10),
(12, 6, 3, 28, 10),
(13, 1, 6, 35, 10),
(14, 2, 6, 34, 10),
(15, 3, 6, 28, 8),
(16, 4, 6, 25, 8),
(17, 5, 6, 22, 8),
(18, 6, 6, 20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('Customer','Sales','Manager','Owner') NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password_hash`, `role`, `customer_id`, `staff_id`, `created_at`) VALUES
(1, 'john.smith@email.com', '$2y$10$F.qbIgfi6ekDFX92/uICLuEzU4nU7/0eoof3b.j88TN.vZ/HEyHge', 'Customer', 2, NULL, '2026-02-08 21:01:27'),
(2, 'emily.carson@email.com', '$2y$10$F.qbIgfi6ekDFX92/uICLuEzU4nU7/0eoof3b.j88TN.vZ/HEyHge', 'Customer', 3, NULL, '2026-02-08 21:01:27'),
(3, 'daniel.scott@email.com', '$2y$10$F.qbIgfi6ekDFX92/uICLuEzU4nU7/0eoof3b.j88TN.vZ/HEyHge', 'Customer', 5, NULL, '2026-02-08 21:01:27'),
(4, 'alice.johnson@fastburgers.com', '$2y$10$F.qbIgfi6ekDFX92/uICLuEzU4nU7/0eoof3b.j88TN.vZ/HEyHge', 'Manager', NULL, 1, '2026-02-08 21:02:01'),
(5, 'brian.cooper@fastburgers.com', '$2y$10$F.qbIgfi6ekDFX92/uICLuEzU4nU7/0eoof3b.j88TN.vZ/HEyHge', 'Manager', NULL, 2, '2026-02-08 21:02:01'),
(6, 'sarah.lee@fastburgers.com', '$2y$10$F.qbIgfi6ekDFX92/uICLuEzU4nU7/0eoof3b.j88TN.vZ/HEyHge', 'Sales', NULL, 3, '2026-02-08 21:02:01'),
(7, 'kevin.white@fastburgers.com', '$2y$10$F.qbIgfi6ekDFX92/uICLuEzU4nU7/0eoof3b.j88TN.vZ/HEyHge', 'Sales', NULL, 4, '2026-02-08 21:02:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`email`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`outlet_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `outlet_id` (`outlet_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `outlet_id` (`outlet_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
  MODIFY `outlet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`outlet_id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`);

--
-- Constraints for table `shift`
--
ALTER TABLE `shift`
  ADD CONSTRAINT `shift_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `shift_ibfk_2` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`outlet_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`outlet_id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`outlet_id`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
