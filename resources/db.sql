

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `address` (
  `id` int(255) NOT NULL,
  `streetAddress` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `postalCode` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `employee` (
  `id` int(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `age` int(2) NOT NULL,
  `phoneNumber` int(15) NOT NULL,
  `adressId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adressId` (`adressId`);


ALTER TABLE `address`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;


ALTER TABLE `employee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;


ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`adressId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


