-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 07:03 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letsgo`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(6) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `hotel_id` int(6) NOT NULL,
  `room_id` int(6) NOT NULL,
  `bedding` varchar(255) DEFAULT NULL,
  `noOfRoom` tinyint(2) NOT NULL,
  `meal` varchar(255) DEFAULT NULL,
  `cin_date` date NOT NULL,
  `cout_date` date NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `book_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `hotel_id`, `room_id`, `bedding`, `noOfRoom`, `meal`, `cin_date`, `cout_date`, `remarks`, `book_date`, `payment`) VALUES
(13705, 'root', 2, 0, 'Double', 3, 'Half Board', '2020-11-02', '2020-11-11', 'fdsdfd', '2020-11-26 15:43:11', 0),
(22533, 'df@dfdf', 1, 4, 'Double', 3, 'Half Board', '2020-11-01', '2020-11-03', 'fgdfgfdg', '2020-11-26 15:54:11', 0),
(33939, '2', 2, 4, 'Triple', 3, 'Breakfast', '2020-11-04', '2020-12-01', 'ggdfgd', '2020-11-26 15:56:10', 0),
(53223, 'sdsd@dfdf', 17, 4, 'Double', 2, 'Half Board', '2020-11-03', '2020-11-17', 'dfdsfdsf', '2020-11-26 15:53:13', 0),
(89473, '2', 2, 4, 'Triple', 2, 'Half Board', '2020-11-10', '2020-11-16', 'csfsdfds', '2020-11-26 15:49:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(6) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_img` varchar(255) NOT NULL,
  `location_id` int(6) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `hotel_img`, `location_id`, `price`, `description`) VALUES
(1, 'Four Season Hotel', 'four-seasons-hotel-kuala.jpg', 2, 683, 'Surrounded by the multicultural energy of Malaysia’s dynamic capital, Four Seasons Hotel Kuala Lumpur takes centre stage with panache.'),
(2, 'Majestic Malacca Hotel', 'Majestic_Malacca.jpg', 4, 369, 'Awarded the Best Signature Boutique Hotel three years in a row, guests enjoy both the old and the new at Majestic Malacca Hotel.'),
(3, 'Hompton by the Beach Penang', 'Hompton.jpg', 5, 133, 'We warmly welcome you with open arms, and hope that like us, you’ll be able to find Home in Hompton’s cosy suites, friendly staff, delectable cuisines and comprehensive facilities.'),
(4, 'Lexis Hibiscus Port Dickson', 'Lexis.jpg', 7, 648, 'Idyllic views, refined luxury living, modern design, superb quality, world-class amenities and facilities.'),
(5, 'Doubletree by Hilton Melaka', 'Doubletree.jpg', 4, 140, 'Whatever your reason for visiting Malacca, the Doubletree by Hilton Melaka is the perfect venue for an exhilarating and exciting break away.'),
(6, 'Bizz Hotel', 'Bizz.jpg', 2, 130, 'Offering quality accommodations in the religious interests, culture, sightseeing district of Lampang, A BIZZ Hotel is a popular pick for both business and leisure travellers.'),
(7, 'Imperial Heritage Hotel Melaka', 'Imperial.jpg', 4, 65, 'The excellent service and superior facilities make for an unforgettable stay.'),
(8, 'RC Hotel', 'RC.jpg', 4, 119, 'With its convenient location, the hotel offers easy access to the city\'s must-see destinations.'),
(9, 'MTREE Hotel', 'MTREE.jpg', 2, 131, 'Numerous on-site facilities to satisfy even the most discerning guest.'),
(10, 'BSP21 Condominium in Bandar Saujana Putra E', 'BSP21.png', 2, 160, 'The latest award-winning lifestyle serviced residence from us at LBS Bina.'),
(12, 'Mandurah Hotel', 'Mandurah.jpg', 3, 130, 'Impeccable service and all the essential amenities to invigorate travellers.'),
(13, 'Iris House Hotel', 'Iris.jpg', 1, 75, 'Cantered and surrounded by undulating hills, this beautiful highland paradise still retains much of charm of an English village.'),
(14, 'Century Pines Resort', 'Century.jpg', 1, 200, 'Nestled in the heart of Tanah Rata, Century Pines Resort is an ideal spot from which to discover Cameron Highlands.'),
(15, 'The Culvert', 'Culvert.jpg', 8, 175, 'Quality accommodations in the culture and beaches district of Kuching, popular pick for both business and leisure travellers.'),
(16, 'Merdeka Palace Hotel & Suites', 'Merdeka.jpg', 8, 92, 'Strategically situated in an advantageous location which provides guests access to historical landmarks in Kuching.'),
(17, 'Hilton Kuching', 'Hilton.jpg', 8, 217, 'Located in the heart of the city amidst businesses, shops, and restaurants which is a perfect base for exploring charming Borneo.'),
(18, 'The Waterfront Hotel', 'waterfront.jpg', 8, 175, 'Great base from which to explore this vibrant city.'),
(19, 'The Barat Tioman Beach Resort', 'Tioman.jpg', 10, 187, 'Every effort is made to make guests feel comfortable.'),
(20, '1511 Coconut Grove', 'Coconut.jpg', 10, 139, 'Many facilities to enrich your stay in Tioman Island and numerous on-site facilities to satisfy even the most discerning guest.'),
(21, 'Royale Chulan Seremban', 'Royale.jpg', 9, 143, 'Superb facilities and an excellent location make the Royale Chulan Seremban the perfect base from which to enjoy your stay in Seremban.'),
(22, 'Klana Resort', 'Klana.jpg', 9, 180, 'Situated only from the city center, guests are well located to enjoy the town\'s attractions and activities.'),
(23, 'The Putra Regency Hotel', 'Putra.jpg', 6, 126, 'Ideal place of stay for travellers seeking charm, comfort and convenience in Kangar.'),
(24, 'Timurbay Beach Resort By SubHome', 'Timurbay.jpg', 3, 233, 'Bring you a relax and soothing feel while staying.');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(6) NOT NULL,
  `location` varchar(50) NOT NULL,
  `location_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`, `location_img`) VALUES
(1, 'Cameron Highlands', 'Cameron.jpg'),
(2, 'Kuala Lumpur', 'kl.jpg'),
(3, 'Kuantan', 'kuantan.jpg'),
(4, 'Malacca', 'malacca.jpg'),
(5, 'Penang', 'penang.jpg'),
(6, 'Perlis', 'perlis.jpg'),
(7, 'Port Dickson', 'pd.jpg'),
(8, 'Sarawak', 'sarawak.jpg'),
(9, 'Seremban', 'seremban.jpg'),
(10, 'Tioman Island', 'Tioman.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rate_id` int(6) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `hotel_id` int(6) NOT NULL,
  `rate` int(6) NOT NULL,
  `review_title` varchar(50) NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `rate_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rate_id`, `user_id`, `hotel_id`, `rate`, `review_title`, `review`, `rate_date`) VALUES
(7, '2', 4, 4, 'Excellent!', 'Great hotel! Recommend it!', '2020-11-27 17:12:43'),
(8, '19', 4, 5, 'Great!', 'Wonderful hotel! Clean and neat! Will definitely come again!', '2020-11-27 17:12:30'),
(9, '19', 2, 5, 'Wonderful Hotel!', 'Great and comfy, nice and clean! My family certainly love it! Great customer service as well! Will visit again!', '2020-11-27 17:37:58'),
(10, '2', 16, 5, 'Nice and affordable!', 'As a backpacker, this hotel really put my money in good use! Definitely would recommend it to my friends!', '2020-11-28 16:40:57'),
(11, '19', 16, 5, 'Cheapest in town!', 'Went visiting friends for a few days. This hotel really helps me to save my bucks! ', '2020-11-28 16:40:54'),
(12, '20', 1, 5, 'Enjoyable', 'The rooms were clean, very comfortable, and the staff was amazing. They went over and beyond to help make our stay enjoyable. I highly recommend this hotel for anyone visiting downtown.', '2020-11-28 12:34:43'),
(13, '21', 2, 4, 'Amazing!', 'Everything was great at this hotel.. amazing staff that is friendly and makes customers feel welcome.', '2020-11-28 16:02:30'),
(14, '22', 1, 5, 'Great!', 'Great location. We really loved the character of the hotel. The restaurant was fantastic and staff was friendly and helpful.', '2020-11-28 16:02:30'),
(15, '2', 3, 5, 'Amazing!', 'Quaint downtown hotel with super friendly staff and beautifully clean rooms. The restaurant downstairs has amazing food!', '2020-11-28 16:03:49'),
(16, '21', 3, 5, 'Wonderful!', 'The bed was extremely comfortable. The room was spacious and clean. The vintage aesthetics were awesome. Wish we weren’t just passing through!', '2020-11-28 16:04:28'),
(17, '24', 5, 5, 'Comfortable', 'Every just melt into a bed? It was so amazing! The staff was so friendly. I’ll be back in a month!', '2020-11-28 16:05:42'),
(18, '24', 6, 5, 'Lovely place', 'Lovely hotel with a wonderful restaurant. Very friendly staff. Hotel is full of great art. Just a charming place.', '2020-11-28 16:05:42'),
(19, '25', 5, 5, 'Exceed expectations!', 'Hotel exceeded my expectations was spotless the staff was amazing and the most comfortable bed I have ever slept in.', '2020-11-28 16:08:02'),
(20, '25', 6, 4, 'Great atmosphere', 'We went to the rooftop bar and had an amazing time. The atmosphere and service were great. Definitely a must do if you are looking for a good time.', '2020-11-28 16:08:02'),
(21, '20', 7, 5, 'Recommended', 'They were extremely accommodating and allowed us to check in early at like 10am. We got to hotel super early and I didn’t wanna wait. So this was a big plus. The sevice was exceptional as well. Would definitely send a friend there.', '2020-11-28 16:10:18'),
(22, '22', 7, 5, 'Great overall', 'The staff at this property are all great! They all go above and beyond to make your stay comfortable. Please give your staff awards!', '2020-11-28 16:10:18'),
(23, '22', 13, 5, 'Exceptional', 'The service was exceptional. Would definitely send a friend there.', '2020-11-28 16:12:56'),
(24, '22', 14, 5, 'Great!', 'The staff at this property are all great! They all go above and beyond to make your stay comfortable.', '2020-11-28 16:12:56'),
(25, '22', 12, 5, 'Top Notch!', 'Took advantage of the downtown location to walk to dinner, check out a couple galleries, and have drinks. It was great. Service top notch as always.', '2020-11-28 16:15:00'),
(26, '22', 24, 5, 'Amazing!', 'The rooms were clean, very comfortable, and the staff was amazing.', '2020-11-28 16:14:23'),
(27, '23', 8, 5, 'Excellent', 'Excellent property and very convenient to USC activities. Front desk staff is extremely efficient, pleasant and helpful. Property is clean and has a fantastic old time charm.', '2020-11-28 16:16:45'),
(28, '23', 9, 5, 'Great overall!', 'Overall, I had a great experience here; staff was incredibly helpful, and the amenities were great.', '2020-11-28 16:16:45'),
(29, '2', 23, 5, 'Lovely!', 'Lovely hotel with a wonderful restaurant. Very friendly staff. Hotel is full of great art. Just a charming place.', '2020-11-28 16:17:57'),
(30, '23', 23, 4, 'Comfortable', 'Hotel exceeded my expectations was spotless the staff was amazing and the most comfortable bed I have ever slept in.', '2020-11-28 16:17:57'),
(31, '2', 24, 5, 'Will come again!', 'Walking distance to everything downtown. Beautiful rooms, great ambiance in the hotel dining room and bar.', '2020-11-28 16:19:48'),
(32, '2', 19, 5, 'Great location.', 'We really loved the character of the hotel. The restaurant was fantastic and staff was friendly and helpful.', '2020-11-28 16:19:48'),
(33, '23', 22, 5, 'Great!', 'The atmosphere and service were great. Definitely a must do if you are looking for a good time.', '2020-11-28 16:20:38'),
(34, '23', 20, 5, 'So amazing!', 'Every just melt into a bed? It was so amazing! The staff was so friendly. I’ll be back in a month!', '2020-11-28 16:20:38'),
(35, '25', 22, 5, 'Outstanding!', 'Absolutely outstanding hotel perfectly located. Helpful, friendly staff who go above and beyond to make sure you have the best time.', '2020-11-28 16:22:24'),
(36, '25', 20, 5, 'Marvelous', 'My stay was extremely comfortable. A beautiful hotel surrounded by wonderful staff in a great location.', '2020-11-28 16:22:24'),
(37, '22', 18, 5, 'Lovely', 'Lovely hotel. Very comfortable. 10 minute walk to the old town. Breakfast was really good. Would definitely stay again', '2020-11-28 16:23:38'),
(38, '18', 17, 4, 'Good', 'excellent stay, except WIFI is a bit slow in our room, probably due to its position. Otherwise, a good hotel, with good position', '2020-11-28 16:23:38'),
(39, '19', 8, 5, 'Best!', 'The staff were very approachable and helpful. The breakfast was good. They arranged for a taxi to pick us up from the airport and then back again at the end of our stay.', '2020-11-28 16:25:06'),
(40, '2', 9, 5, 'Enjoy the stay', 'We had a 3 night stay to enjoy the Prague Christmas Markets, and were very satisfied with every aspect of the hotel. The staff are very friendly, helpful, and knowledgeable regarding places to visit in Prague.', '2020-11-28 16:25:06'),
(41, '2', 10, 5, 'Wonderful', 'It was a wonderful experience. Good hospitality', '2020-11-28 16:26:14'),
(42, '2', 11, 5, 'Wonderful', 'It is a good period staying this wonderful hotel. My birthday was during my stay.', '2020-11-28 16:26:14'),
(43, '21', 21, 5, 'Great location', 'Wonderful hotel in a great location, with superb a breakfast. Staff also very helpful.', '2020-11-28 16:26:55'),
(44, '24', 21, 5, 'Convenient', 'The hotel is finely situated in the middle of the city.', '2020-11-28 16:26:55'),
(45, '2', 15, 5, 'Nice and affordable!', 'As a backpacker, this hotel really put my money in good use! Definitely would recommend it to my friends!', '2020-11-28 16:40:57'),
(46, '22', 15, 5, 'Wonderful place', 'Wonderful hotel in a great location, with superb a breakfast. Staff also very helpful.', '2020-11-28 16:42:16'),
(47, '19', 15, 5, 'Superb!', 'It was a good stay! The food was excellent and the staff superb!', '2020-11-28 16:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(6) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_img` varchar(255) NOT NULL,
  `price` int(6) NOT NULL,
  `max_person` int(6) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type`, `room_img`, `price`, `max_person`, `description`) VALUES
(1, 'Family Room', 'room-1.jpg', 185, 5, 'This is the perfect suite to accommodate a family! It offers two separate bedrooms, with a double bed and bunk bed respectively and a bathroom with a walk-in shower.\r\nOccupancy: 2 adults & 3 children'),
(2, 'Luxury Room', 'room-2.jpg', 300, 3, 'Spacious open plan suite overlooking the hotel surroundings and Pirin Mountain picks, the Elegance Suite offers the elite experience of the PREMIER luxury hospitality.\r\n\r\nOccupancy: 2 adults'),
(3, 'Double Room', 'room-3.jpg', 165, 2, 'Experience smart hospitality with fine fabrics, art and wooden furnishings, these rooms offer city views. Relax in the cosy double or twin bed or catch up on your reading whilst seated at the lounge chair.\r\nOccupancy: 2 adults'),
(4, 'Suite Room', 'room-4.jpg', 250, 5, 'Nicely appointed suites with welcoming, residential ambience; offering modern-day comfort, enjoying views of the hotel surrounding areas and partial views of the city of Bansko.\r\n\r\nOccupancy: 4 adults or 2 adult & 2 children'),
(5, 'Superior Double Room', 'room-5.jpg', 200, 2, 'This chic, urban, woody interior suite makes for a most refined stay. Designed to provide a luxurious atmosphere. The separate bedroom and living room, is reminiscent of an exquisite mountain holiday experience, in all seasons.\r\n\r\nOccupancy: 2 adults'),
(6, 'Classic Double Room', 'room-6.jpg', 180, 2, 'Most suitable for couples and the size enables you to relax and feel at home. All rooms are also fitted with a desk, a closet and a washlet.\r\nOccupancy: 2 adults');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sub_id` int(6) UNSIGNED NOT NULL,
  `sub_email` varchar(50) DEFAULT NULL,
  `sub_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`sub_id`, `sub_email`, `sub_date`) VALUES
(61, 'ghgh@fgf', '2020-11-26 07:14:59'),
(62, 'fdff@ddfd', '2020-11-26 07:15:36'),
(63, 'sdsd@sddf', '2020-11-26 08:26:48'),
(64, 'sdsd@dfdf', '2020-11-27 14:01:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `PASSWORD`, `email`, `reg_date`, `isAdmin`) VALUES
(2, 'lala', '$2y$10$GxmjqoqEWLNlSjEVevLxDesIH.hVyjYpF5mOPj9w7Pdyx0D.OBowS', 'la@la.com', '2020-11-22 09:02:47', 0),
(18, 'as', '$2y$10$37RVugTwXZHPwZlMZm8VRuwFKUBELa8sCw.SuWT2MdhZFpArHLuiO', 'as@as', '2020-11-23 06:22:37', 0),
(19, 'qa@qa', '$2y$10$mLGNyqtRoQCzKXflvuFHM.r3sNF7MdZ8jSe9CGrn1BwXR0blfPZpK', 'qa@qa', '2020-11-27 17:02:52', 0),
(20, 'GeorgeMartin69', '$2y$10$mLGNyqtRoQCzKXflvuFHM.r3sNF7MdZ8jSe9CGrn1BwXR0blfPZpK', 'a@qa', '2020-11-28 15:55:21', 0),
(21, 'emmanuellelewis90', '$2y$10$mLGNyqtRoQCzKXflvuFHM.r3sNF7MdZ8jSe9CGrn1BwXR0blfPZpK', 'b@qa', '2020-11-27 17:02:52', 0),
(22, 'vasiliyjusteen', 'aaa', 'aaa@aaa', '2020-11-28 15:54:03', 0),
(23, 'bryant', 'bb', 'bb@bb', '2020-11-28 15:54:03', 0),
(24, 'abysmalmatthew', 'ccc', 'ccc@ccc', '2020-11-28 15:55:03', 0),
(25, 'beggarly', 'qq', 'qq@qq', '2020-11-28 15:55:03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sub_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
