-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 06:12 AM
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
-- Database: `ecomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `img` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `gender`, `email`, `phone`, `img`, `address`, `city`, `state`, `zip`, `pass`) VALUES
(4, 'Admin', 'Male', 'admin@gmail.com', '7890101401', 'admin_images/user644c93e18ce2c2022-03-19-14-08-08-907.jpg', '10/B Akrabatilane', 'Serampore', 'West Bengal', '712201', '$2y$10$RPReyjdmFWfMxhzwbFs4ueC.bftXVawfc37FI5SrALJq7tVmS1MZm');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `cat_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `cat_img`) VALUES
(1, 'Mens Ware', 'category_images/cat644cce38e5984menswear.png'),
(2, 'Womens Ware', 'category_images/cat644ccec98fa29ladies.png'),
(5, 'Smart Watches', 'category_images/cat644dfa7386005noice_digital_watch.png'),
(6, 'Mens Footware', 'category_images/cat644e6cc093c94mensfootware.png'),
(8, 'Mobiles', 'category_images/cat6454796084d97mobile.png');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_images` varchar(5000) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` varchar(10000) NOT NULL DEFAULT 'This product has no description',
  `category` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brand_img` varchar(255) NOT NULL,
  `discount` float NOT NULL,
  `ratings` float DEFAULT 0,
  `sell` int(11) DEFAULT 0,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_images`, `product_price`, `product_desc`, `category`, `brand`, `brand_img`, `discount`, `ratings`, `sell`, `stock`) VALUES
(13, 'Dennis Lingo Men\'s Solid Slim Fit Cotton Casual Shirt with Spread Collar & Full Sleeves', 'product_images/pro644e81e9a892dimage 48.png#$#product_images/pro644e81e9a8fcaimage 49.png#$#product_images/pro644e81e9a96c9image 50.png#$#product_images/pro644e81e9a9b29image 51.png#$#product_images/pro644e81e9a9f38image 52.png', 750, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et ultrices neque ornare aenean euismod elementum nisi quis eleifend. Cursus vitae congue mauris rhoncus aenean vel elit scelerisque mauris. Arcu non odio euismod lacinia at quis. Porta lorem mollis aliquam ut porttitor leo a. Donec pretium vulputate sapien nec. Et tortor at risus viverra adipiscing at in tellus integer. Imperdiet massa tincidunt nunc pulvinar sapien et. Ut enim blandit volutpat maecenas volutpat. Feugiat sed lectus vestibulum mattis ullamcorper velit sed. Nunc pulvinar sapien et ligula ullamcorper. Ac feugiat sed lectus vestibulum mattis ullamcorper velit sed ullamcorper. Elit duis tristique sollicitudin nibh sit amet commodo. Purus semper eget duis at tellus. Lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi. Phasellus vestibulum lorem sed risus ultricies tristique.', 1, 'Peter England', 'brand_images/peterengland.png', 20, 4.3, 0, 20),
(17, 'Adidas Mens Agora 1.0 Multisport Training Shoes', 'product_images/pro644e83a371829image 33.png#$#product_images/pro644e83a372017image 34.png#$#product_images/pro644e83a37272eimage 35.png#$#product_images/pro644e83a372d9fimage 37.png', 2700, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Felis imperdiet proin fermentum leo. Id aliquet risus feugiat in ante. Enim ut sem viverra aliquet eget sit amet. At consectetur lorem donec massa sapien. Morbi tristique senectus et netus et malesuada fames ac. Imperdiet dui accumsan sit amet. Odio tempor orci dapibus ultrices in iaculis. Nisl nunc mi ipsum faucibus. Suspendisse sed nisi lacus sed viverra tellus in hac habitasse. Sodales ut etiam sit amet nisl purus. Proin libero nunc consequat interdum varius sit amet mattis. Elit pellentesque habitant morbi tristique senectus et netus et malesuada. Aliquet risus feugiat in ante metus dictum at.', 6, 'Adidas', 'brand_images/adidas.png', 15, 5, 0, 4),
(18, 'Mens Cotton Slim Shirt', 'product_images/pro644e84d23d422image 53.png#$#product_images/pro644e84d23d9e1image 54.png#$#product_images/pro644e84d23df46image 55.png#$#product_images/pro644e84d23e42bimage 56.png#$#product_images/pro644e84d23e863image 57.png', 950, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Felis imperdiet proin fermentum leo. Id aliquet risus feugiat in ante. Enim ut sem viverra aliquet eget sit amet. At consectetur lorem donec massa sapien. Morbi tristique senectus et netus et malesuada fames ac. Imperdiet dui accumsan sit amet. Odio tempor orci dapibus ultrices in iaculis. Nisl nunc mi ipsum faucibus. Suspendisse sed nisi lacus sed viverra tellus in hac habitasse. Sodales ut etiam sit amet nisl purus. Proin libero nunc consequat interdum varius sit amet mattis. Elit pellentesque habitant morbi tristique senectus et netus et malesuada. Aliquet risus feugiat in ante metus dictum at.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Felis imperdiet proin fermentum leo. Id aliquet risus feugiat in ante. Enim ut sem viverra aliquet eget sit amet. At consectetur lorem donec massa sapien. Morbi tristique senectus et netus et malesuada fames ac. Imperdiet dui accumsan sit amet. Odio tempor orci dapibus ultrices in iaculis. Nisl nunc mi ipsum faucibus. Suspendisse sed nisi lacus sed viverra tellus in hac habitasse. Sodales ut etiam sit amet nisl purus. Proin libero nunc consequat interdum varius sit amet mattis. Elit pellentesque habitant morbi tristique senectus et netus et malesuada. Aliquet risus feugiat in ante metus dictum at.', 1, 'Peter England', 'brand_images/peterengland.png', 22, 4, 0, 125),
(19, 'Adidas Mens Throb M Running Shoes', 'product_images/pro644e852ae9a6aimage 27.png#$#product_images/pro644e852aea28dimage 28.png#$#product_images/pro644e852aea969image 29.png#$#product_images/pro644e852aeafddimage 30.png#$#product_images/pro644e852aeb4a1image 31.png#$#product_images/pro644e852aeb8d9image 32.png', 3500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Felis imperdiet proin fermentum leo. Id aliquet risus feugiat in ante. Enim ut sem viverra aliquet eget sit amet. At consectetur lorem donec massa sapien. Morbi tristique senectus et netus et malesuada fames ac. Imperdiet dui accumsan sit amet. Odio tempor orci dapibus ultrices in iaculis. Nisl nunc mi ipsum faucibus. Suspendisse sed nisi lacus sed viverra tellus in hac habitasse. Sodales ut etiam sit amet nisl purus. Proin libero nunc consequat interdum varius sit amet mattis. Elit pellentesque habitant morbi tristique senectus et netus et malesuada. Aliquet risus feugiat in ante metus dictum at.', 6, 'Adidas', 'brand_images/adidas.png', 14, 3, 0, 35),
(22, 'Noise Pulse 2 Max Advanced Bluetooth Calling Smart Watch', 'product_images/pro64531b8ba986cimage 66.png#$#product_images/pro64531b8ba99c9image 67.png#$#product_images/pro64531b8ba9ad0image 68.png#$#product_images/pro64531b8ba9bf9image 69.png#$#product_images/pro64531b8ba9d63image 70.png#$#product_images/pro64531b8ba9ef4image 71.png#$#product_images/pro64531b8baa028image 72.png#$#product_images/pro64531b8baa13cimage 73.png#$#product_images/pro64531b8baa27dimage 74.png', 1498, ' Massive 1.85\" display: See everyday data clearly under the brightest sun on the 1.85\' TFT LCD that sports 550 nits of brightness and the highest screen-to-body ratio.\r\n    BT calling: Talk directly to your loved ones from your wrist; manage calls, access your favourite contacts and dial from the dial pad.\r\n    Tru Sync: Now connect with the world in a smart way, thanks to Tru Sync technology that ensures faster and stable connection and low power consumption.\r\n    Smart DND: Take a break when you want to and get uninterrupted sleep time.\r\n    Noise Health Suite: Get started on your fitness journey with a whole range of wellness features in Noise Health Suite and 100 sports modes to support you.\r\n    NoiseFit app: Manage your day-to-day life better with the NoiseFit app at your disposal.\r\n    150+ cloud-based watch faces: A new day calls for a new face. With 4 default watch faces in the watch, replace to choose from over 150+ watch faces options available in App and don a new look every day.\r\n\r\n    10-day battery: The 10-day battery is made to stay with you through your busiest days.\r\n    5 colors: Take your pick from 5 timeless shades to find your perfect match.\r\n\r\n', 5, 'Noise', 'brand_images/noise.png', 20, 4.4, 0, 150),
(23, 'Noise Pulse Go Buzz Smart Watch with Advanced Bluetooth Calling', 'product_images/pro64531f4c5eac2image 75.png#$#product_images/pro64531f4cca066image 76.png#$#product_images/pro64531f4ccb889image 77.png#$#product_images/pro64531f4ccbbd6image 78.png#$#product_images/pro64531f4ccbf37image 79.png', 1500, 'Sharp and bright display: The 1.69’’ TFT display with 240*280px and 500 nits brightness ensures visual treat every time you look at the watch.\r\n    Tru Sync: Experience fast and stable connectivity with low power consumption.\r\n    BT calling: Stay in touch with your friends - right from your wrist.\r\n    Utility features: Use the utility features at your disposal and become more productive - get hand wash reminders, idle alert and drink water reminder, weather forecast, set alarms and more.\r\n    Noise Health Suite: Lead a better life with the battery of wellness features available in Noise Health Suite.\r\n    150+ cloud-based & customised watch faces: Style your watch the way you like to – choose from 150 cloud-based & customised watch faces.\r\n    100 sports modes with auto sports detection: Stay active and track all that you are doing with auto sports detection mode.\r\n\r\n    IP68 water resistance: Get ready for everything life throws, with the IP68 water-resistance rating.\r\n    Up to 7 days of battery life as per the usage. Get up to 2 days of battery life when calling is enabled. Battery Capacity : 300mAh\r\n    5 colours: Know your colour and choose it from 5 classic colours.\r\n\r\n', 5, 'Noise', 'brand_images/noise.png', 15, 4.3, 0, 15),
(24, 'Noise Newly Launched Twist Bluetooth Calling Smart Watch', 'product_images/pro64531fee166b1noice_digital_watch.png#$#product_images/pro64531fee16d1bnoice_digital_watch2.png#$#product_images/pro64531fee17567noice_digital_watch3.png#$#product_images/pro64531fee17da1noice_digital_watch4.png#$#product_images/pro64531fee186e6noice_digital_watch5.png', 1498, '1.38” TFT display: Featuring a vibrant round display and a stylish metallic finish, the smartwatch offers a premium on-screen experience.\r\n    Tru SyncTM: Hassle-free pairing, stable connectivity and lower battery consumption combine to provide the most advanced calling experience.\r\n    Noise Buzz: Manage calls directly from your wrist. Access your call logs, make calls from the dial pad and save up to 10 favourite contacts.\r\n    Noise Health SuiteTM: Take better care of your daily health with a series of health monitoring tools – Blood oxygen monitor, Sleep monitor, 24x7 heart rate monitor, Stress measurement, Breathe practice & Female cycle tracker.\r\n    100 sports modes: Indulge in the routine of your preference with several sports modes to choose from.\r\n    Up to 7-day battery: Breeze through an entire week without charging with up to 7 days of battery life. Get up to 2 days of battery life when calling in enabled.\r\n    100+ watch faces: A series of fun and trendy watch faces let you swap into a new background every day.\r\n\r\n    Productivity Suite: Increase your daily productivity with a number of features - call, SMS & app notifications, reminder, calculator, weather, quick reply, smart DND, world clock, alarm, stopwatch & timer.\r\n    IP68 water resistance: Stay protected from splashes, dust and moisture at all times.\r\n\r\n', 5, 'Noise', 'brand_images/noise.png', 7, 3.6, 0, 80),
(25, 'GRECIILOOKS Western Dresses for Women | A-Line Knee-Length Dress | Midi Western Dress for Women| Short Dress', 'product_images/pro64545e973123aimage 80.png#$#product_images/pro64545e973174cimage 81.png#$#product_images/pro64545e9731b9cimage 82.png#$#product_images/pro64545e973203fimage 83.png', 450, 'Care Instructions: Dry Clean Only\r\n    Fit Type: Regular\r\n    Material: Rayon, fabric has no stretch\r\n    Feature: Collor Neck, Long Sleeve, Short Mini Dress, Cocktail Dress, Printed , Contrast Mesh, Black dress, Floral Dress, Party Dress, Overlay Dress\r\n    Washing Instruction: Machine wash with a laundry bag, hand wash cold, do not bleach.\r\n    We loved every little detail with this crochet floral lace dress, especially the hollow-out waist and flowy skirt, lace sheer sleeves and softly scalloping edge are sexy but romantic. This maxi dress can not only wear for a wedding party, it is also perfect to wear with sandals or go barefoot on the beach for a photoshoot.\r\n    Occasion: Great for party, wedding, cocktail, evening, prom, going out, baby shower, beach, holiday, official and special occasions. Pair it with your favorite heels and necklace.\r\n', 2, 'Pantaloons', 'brand_images/pantaloons.png', 5, 4.6, 0, 120),
(26, 'GRECIILOOKS Womens Rayon Full Sleeve A-Line Knee-Length Western Dresses for Women or Girls Western Dress', 'product_images/pro64545f6082643image 85.png#$#product_images/pro64545f6082c26image 86.png#$#product_images/pro64545f608304dimage 87.png#$#product_images/pro64545f60838c8image 88.png#$#product_images/pro64545f6083d2bimage 89.png#$#product_images/pro64545f6084055image 90.png', 470, 'Care Instructions: Machine Wash\r\n    Fit Type: Regular\r\n    Fabric : Rayon\r\n    Color : Multi\r\n    Sleeve Type : Fullsleeve\r\n    Can be be styled both as a breezy casual outfit and a playful party outfit.\r\n    Wash Care : first wash is dry clean after that use machine wash or hand wash\r\n    There might be minor color variation between actual product and image shown on screen due to lighting on the photography\r\n', 2, 'Pantaloons', 'brand_images/pantaloons.png', 6, 4.7, 0, 90),
(27, 'GRECIILOOKS Western Dresses for Women | Short A-Line Dress for Girls | Maxi Dress for Women', 'product_images/pro645460755debeimage 91.png#$#product_images/pro64546075732daimage 92.png#$#product_images/pro645460757371aimage 93.png#$#product_images/pro6454607573bb6image 94.png#$#product_images/pro645460757404aimage 95.png', 750, 'Care Instructions: Dry Clean Only\r\n    Fit Type: Regular\r\n    Fabric : Rayon one piece dress\r\n    Color : Brown party wear dress for women\r\n    Sleeve Type : Short sleeve midi dress for women\r\n    Can be be styled both as a breezy casual outfit and a playful party outfit.\r\n    Wash Care : first wash is dry clean after that use machine wash or hand wash\r\n', 2, 'Pantaloons', 'brand_images/pantaloons.png', 9, 4.6, 0, 80),
(28, 'SGF11 Womens Kanjivaram Soft Silk Saree With Blouse Piece', 'product_images/pro6454612963896image 96.png#$#product_images/pro6454612963efcimage 97.png#$#product_images/pro645461296411aimage 98.png#$#product_images/pro64546129642b2image 99.png', 950, 'Care Instructions: Dry Clean Only\r\n    Fabric: Kanchipuram Silk, Blouse Fabric Kanchipuram Silk. Work: Jacquard Woven Stylish Sari, Zari Woven.\r\n    Saree Length:5.50Meter, Blouse Piece Length: 0.80 Meter( Unsticthed, Attached With Saree)\r\n    Other Details : {Soft Finished Comfortable To Wear and Easy To Take Fleets } {Size-Free Size} { Saree Is Not Transparent } Package Included: 1 Saree with 1 Blouse Piece\r\n    Covid-19: We give you fully sentize product.\r\n    Bold and beautiful, this Kanchipuram KING & QUEEN ATTRACTIVE silk Red color brocade saree is all about impactful presence.\r\n', 2, 'Pantaloons', 'brand_images/pantaloons.png', 10, 3, 0, 50),
(29, 'Flosive Womens Present Banarasi Soft Lichi Silk Saree Beautiful Jacquard Rich Pallu Design Work Zari Woven Kanjivaram Silk Style Saree With Soft Lichi Silk Blouse Piece', 'product_images/pro645462047e70fimage 100.png#$#product_images/pro645462047ead8image 101.png#$#product_images/pro645462047edecimage 102.png#$#product_images/pro645462047f199image 103.png#$#product_images/pro645462047f4a6image 104.png', 1200, 'Care Instructions: Dry Clean Only\r\n    Fit Type: Regular\r\n    Saree Fabric : Banarasi Pure Silk || Blouse Fabric : Banarasi Soft Silk\r\n    Saree Length - 5.50 mtr || Blouse Length : 0.80 mtr || Saree With Unstitched Blouse\r\n    Saree Work - Rich Zari Weaving Saree With Contrast Zari Border\r\n    Occasion:: This Saree is Best Match for Traditional, Party, Festive Occasions, Get Together, Evening Wear Or Various Functions & Best Gift For Your Loved Ones\r\n    Package Contains : 1 Saree With 1 Blouse\r\n    Product color may slightly vary due to photographic lighting sources on your monitor settings or device setting and lighting used in model\r\n', 2, 'Pantaloons', 'brand_images/pantaloons.png', 12, 4.1, 0, 35),
(30, 'Womanista Womens Striped Satin Saree (TI2879_Mauve)', 'product_images/pro6454628650dc5image 105.png#$#product_images/pro6454628651164image 106.png#$#product_images/pro6454628651466image 107.png#$#product_images/pro64546286558b3image 108.png#$#product_images/pro6454628656006image 109.png#$#product_images/pro645462865639aimage 110.png#$#product_images/pro64546286566b3image 111.png', 700, 'Care Instructions: Dry Clean Only\r\n    Fabric: Kanchipuram Silk, Blouse Fabric Kanchipuram Silk. Work: Jacquard Woven Stylish Sari, Zari Woven.\r\n    Saree Length:5.50Meter, Blouse Piece Length: 0.80 Meter( Unsticthed, Attached With Saree)\r\n    Other Details : {Soft Finished Comfortable To Wear and Easy To Take Fleets } {Size-Free Size} { Saree Is Not Transparent } Package Included: 1 Saree with 1 Blouse Piece\r\n    Covid-19: We give you fully sentize product.\r\n    Bold and beautiful, this Kanchipuram KING & QUEEN ATTRACTIVE silk Red color brocade saree is all about impactful presence.\r\n', 2, 'Pantaloons', 'brand_images/pantaloons.png', 20, 2.3, 0, 170),
(31, ' Samsung Galaxy M14 5G (Smoky Teal, 4GB, 128GB Storage) | 50MP Triple Cam | 6000 mAh Battery | 5nm Octa-Core Processor | Android 13 | Without Charger', 'product_images/pro645479c5e934dimage 125.png#$#product_images/pro645479c5e95ecimage 126.png#$#product_images/pro645479c5e996bimage 127.png#$#product_images/pro645479c5e9d05image 128.png#$#product_images/pro645479c5e9fb2image 129.png#$#product_images/pro645479c5ea225image 130.png#$#product_images/pro645479c5ea48aimage 131.png', 1200, '\r\nSamsung Galaxy M14 5G (Smoky Teal, 4GB, 128GB Storage) | 50MP Triple Cam | 6000 mAh Battery | 5nm Octa-Core Processor | Android 13 | Without Charger\r\nSamsung Galaxy M14 5G (Smoky Teal, 4GB, 128GB Storage) | 50MP Triple Cam | 6000 mAh Battery | 5nm Octa-Core Processor | Android 13 | Without Charger\r\nSamsung Galaxy M14 5G (Smoky Teal, 4GB, 128GB Storage) | 50MP Triple Cam | 6000 mAh Battery | 5nm Octa-Core Processor | Android 13 | Without Charger\r\nSamsung Galaxy M14 5G (Smoky Teal, 4GB, 128GB Storage) | 50MP Triple Cam | 6000 mAh Battery | 5nm Octa-Core Processor | Android 13 | Without Charger', 8, 'Samsung', 'brand_images/image 131.png', 10, 4.5, 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(1) NOT NULL,
  `slide1` varchar(255) NOT NULL,
  `slide2` varchar(255) NOT NULL,
  `slide3` varchar(255) NOT NULL,
  `slide4` varchar(255) NOT NULL,
  `slide5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `slide1`, `slide2`, `slide3`, `slide4`, `slide5`) VALUES
(1, 'heroslider_images/slide644beeb73152fs1.png', 'heroslider_images/slide644beeb73153bs2.png', 'heroslider_images/slide644beeb73153es3.png', 'heroslider_images/slide644beeb731540s4.png', 'heroslider_images/slide644beeb731542s5.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `img` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `email`, `phone`, `img`, `address`, `city`, `state`, `zip`, `pass`) VALUES
(1, 'Jeet Sil', 'Male', 'jeet@gmail.com', '7890101401', 'user_images/user6452923018a8a2022-03-23-10-45-27-257.jpg', '10/B Akrabatilane', 'Serampore', 'West Bengal', '712201', '$2y$10$u7Olm70TbZBPi9mdr32qju3jnkOGLQGNEzpQBsohEqOFJBj1DQiDa'),
(3, 'Yuvraj Singh', 'Male', 'yuvi@gmail.com', '8521479325', 'user_images/user644be79199650image 39.png', 'place in Panjab', 'Amritsar', 'Panjab', '852369', '$2y$10$i9gA6kjBmmCT0OxTTqL7eOf6SuyGL1GC4dhQkKiXy3qPmtDEYfGcu');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `oid` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `issue_date` datetime NOT NULL DEFAULT current_timestamp(),
  `delivary_date` datetime NOT NULL,
  `pay_mode` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`oid`, `uid`, `pid`, `Qty`, `issue_date`, `delivary_date`, `pay_mode`, `status`) VALUES
('ord645310f1f352f', 1, 13, 1, '2023-05-04 07:27:05', '2023-05-04 07:31:05', 'UPI', 'Delivered'),
('ord6453131beddb0', 1, 19, 1, '2023-05-04 07:36:19', '2023-05-04 07:37:19', 'COD', 'Delivered'),
('ord6454790be29f4', 1, 22, 2, '2023-05-05 09:03:31', '2023-05-05 09:04:31', 'COD', 'On Going');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`phone`),
  ADD UNIQUE KEY `img` (`img`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`phone`,`img`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
