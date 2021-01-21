-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th1 21, 2021 lúc 01:00 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `carjack`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `_id` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`_id`, `street`, `city`, `state`, `country`, `zip`) VALUES
(1, '113 Nguyen Gia Heo', 'Binh Thanh', 'HCM', 'VietNam', 0),
(7, '123', 'hcm', 'dd', 'dd', 700000),
(8, 'dfg', 'HCM', 'hhh', 'vn', 700000),
(9, 'fghfgh', 'fghfgh', 'fghfgh', 'fghfgh', 345345);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cars`
--

CREATE TABLE `cars` (
  `_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cars`
--

INSERT INTO `cars` (`_id`, `name`, `pic`, `info`, `stock`) VALUES
(1, 'Ford Mustang', 'https://img.tinbanxe.vn/images/FORD/Ford%20Mustang/2020-Ford-Mustang-ANHDAIDIEN4.png', 'The current Mustang arrived in 2015, and brought with it a new range of engine choices. The 3.7L V6 became the base engine; it’s good for a not-at-all-shabby 300 horsepower. Next up is a 2.3L, turbocharged four-cylinder that makes 310 horsepower. Yes, only four cylinders, but it sprints from zero to 60 in less than six seconds! Topping the range is a 5.0L V8 good for over 400 horsepower. Transmission choices include a six-speed manual or an automatic with paddle shifters.', 1),
(2, 'Chevrolet Camaro', 'https://i.xeoto.com.vn/auto/chevrolet/camaro/chevrolet-camaro-2020.png', 'The Camaro is available both as a rear-wheel-drive coupe and a convertible, and while both have a backseat, it probably works best as a shelf for your groceries. Before the 2016 refresh, the LS and LT trims got a 3.6L V6 rated at 312 horsepower, while the SS was powered by a mighty 426-horsepower,  6.2L V8. And if that wasn’t enough, for 2014, Chevy unveiled a Z/28 Camaro that packs a huge 7.0L V8 from the Corvette.', 30),
(3, 'Dodge Challenger', 'https://smartcdn.prod.postmedia.digital/driving/wp-content/uploads/2020/05/chrome-image-411876.png', 'The Challenger is Dodge’s flagship enthusiast vehicle. But is it a muscle car or is it a sports car? It has certainly got the brawn to launch it in a straight line (zero to 60 mph in a hair over six seconds, thanks to its big Hemi® engine), using its six-speed manual stickshift; the newer models’ independent suspension means the Challenger is a sportier handler than ever before. Some of the more tricked-out Challengers are factory-built hot rods; the Scat Pack option gives drivers nearly 500 horsepower.', 100),
(4, 'Chevrolet Corvette', 'https://static.tcimg.net/vehicles/primary/62a0ce89fc6b6b54/2020-Chevrolet-Corvette-white-full_color-driver_side_front_quarter.png', 'For a certain set of enthusiasts, the Corvette is more than a sports car — it’s American heritage on wheels. The Corvette has been in production since 1953 and the car is currently in its seventh (C7) generation, which hit showrooms in 2014. At an average price of close to $40,000 on our website, a used Corvette is the priciest sports car on this list; but then, you do get a lot for your money.', 42),
(5, 'Nissan 370Z', 'https://img.tinbanxe.vn/images/Nissan/nissan-370Z-2020.png', 'Launched in 2010, the 370Z replaced the visually similar 350Z and traces its lineage back to the 240Z of the early 1970s. Available as both a coupe or a roadster, this compact two-seater checks all the sports car boxes. Power comes from a 3.7L V6 that puts 330 horsepower to the rear wheels through a six-speed manual or a seven-speed automatic transmission (the auto gearbox version comes with paddle shifters). From standing still, this Nissan zooms to 60 mph in around five seconds. If that’s not fast enough you, seek out the NISMO models, which are sportier and make an extra heap of horsepower.', 72);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car_rates`
--

CREATE TABLE `car_rates` (
  `car_id` int(11) NOT NULL,
  `rate_by_hour` int(11) NOT NULL DEFAULT 100,
  `rate_by_day` int(11) NOT NULL DEFAULT 2000,
  `rate_by_km` int(11) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `car_rates`
--

INSERT INTO `car_rates` (`car_id`, `rate_by_hour`, `rate_by_day`, `rate_by_km`) VALUES
(1, 200000, 2000000, 20000),
(2, 350000, 3000000, 35000),
(3, 456000, 3800000, 45000),
(4, 500000, 5400000, 50000),
(5, 615000, 6100000, 70000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `mode` enum('km','day','hour') NOT NULL,
  `value` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`_id`, `user_id`, `car_id`, `mode`, `value`, `time`) VALUES
(7, 2, 5, 'hour', 1, '2021-01-20 09:34:48'),
(8, 2, 4, 'hour', 1, '2021-01-20 09:34:54'),
(10, 2, 2, 'hour', 6, '2021-01-20 10:17:46'),
(11, 2, 2, 'km', 11, '2021-01-20 10:34:26'),
(12, 2, 2, 'hour', 1, '2021-01-20 10:38:41'),
(13, 2, 2, 'hour', 1, '2021-01-20 10:53:41'),
(14, 2, 2, 'hour', 1, '2021-01-20 10:53:42'),
(15, 2, 2, 'hour', 1, '2021-01-20 10:55:49'),
(16, 2, 2, 'hour', 1, '2021-01-20 10:58:40'),
(17, 2, 2, 'hour', 1, '2021-01-20 11:02:28'),
(18, 2, 2, 'hour', 1, '2021-01-20 11:02:44'),
(19, 2, 2, 'hour', 1, '2021-01-20 11:03:05'),
(20, 2, 2, 'hour', 1, '2021-01-20 11:05:09'),
(21, 2, 3, 'hour', 1, '2021-01-20 11:05:16'),
(23, 2, 4, 'hour', 1, '2021-01-20 11:06:02'),
(27, 3, 1, 'day', 2, '2021-01-20 12:25:08'),
(29, 4, 3, 'day', 10, '2021-01-20 12:32:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ph_no` varchar(10) DEFAULT NULL,
  `gender` enum('m','f','u') DEFAULT 'u',
  `join_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `address_id` int(11) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT 'https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`_id`, `first_name`, `last_name`, `email`, `username`, `password`, `ph_no`, `gender`, `join_time`, `address_id`, `avatar`) VALUES
(1, 'Admin', 'Account', 'admin@gmail.com', 'admin', '$2y$10$UPAMoof5OI7TrzXoTlvkMuLn9OVhQCgTOyXb4j5wStUXqzyGJ0UFa', '', 'u', '2021-01-19 13:02:04', 1, 'https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png'),
(2, 'duy', 'duy', 'duy@gmail.com', 'duydang', '$2y$10$D.ExDBoJDYRS.fIq/UCOtOeVhIHdPOGRVvWRhyAsVFSyep4lgh3xy', '0902332911', 'm', '2021-01-20 08:49:09', 7, 'https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png'),
(3, 'huy', 'nguyen', 'huy@gmail.com', 'huynguyen', '$2y$10$3GIV.3OVkIioGxRDn5tRGOhSxQda.F8cNqjJ5WwnGbe76BEc3YtRW', '113', 'm', '2021-01-20 12:23:43', 8, 'https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png'),
(4, 'baoyen', 'baoyen', 'baoyen@gmail.com', 'baoyen', '$2y$10$u/LNthadD/j8A3OeorAB1OsG9uWAGc.dNecvYOJFntoO.w3mVUH3i', '345345', 'u', '2021-01-20 12:32:01', 9, 'https://ssl.gstatic.com/images/branding/product/1x/avatar_circle_blue_512dp.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`_id`);

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `admins_user_id_fk` (`user_id`);

--
-- Chỉ mục cho bảng `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`_id`);

--
-- Chỉ mục cho bảng `car_rates`
--
ALTER TABLE `car_rates`
  ADD KEY `car_rates_car_id_fk` (`car_id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `transaction_user_id_fk` (`user_id`),
  ADD KEY `transaction_car_id_fk` (`car_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `user_email_uindex` (`email`),
  ADD UNIQUE KEY `user_username_uindex` (`username`),
  ADD KEY `user_address_id_fk` (`address_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cars`
--
ALTER TABLE `cars`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `car_rates`
--
ALTER TABLE `car_rates`
  ADD CONSTRAINT `car_rates_car_id_fk` FOREIGN KEY (`car_id`) REFERENCES `cars` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_car_id_fk` FOREIGN KEY (`car_id`) REFERENCES `cars` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_address_id_fk` FOREIGN KEY (`address_id`) REFERENCES `address` (`_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
