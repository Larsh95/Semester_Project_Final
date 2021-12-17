CREATE DATABASE IF NOT EXISTS `winetimedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `winetimedb`;

DROP USER IF EXISTS 'admin5'@'localhost';
CREATE USER 'admin5'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON WineTimeDB.* To 'admin5'@'localhost' IDENTIFIED BY '123456'; 
FLUSH PRIVILEGES;

REVOKE ALL PRIVILEGES ON *.* FROM 'admin5'@'localhost'; GRANT ALL PRIVILEGES ON *.* TO 'admin5'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; 

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `rank` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `pType` varchar(100) NULL,
  `pName` varchar(100) NULL,
  `pPrice` int(11) NULL,
  `pDiscount` int(11) NULL,
  `pStock` int(11) NULL,
  `pBoxsale` varchar(255) NULL,
  `pDescription` varchar(255) NULL,
  `pImgUrl` varchar(255) NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderID` int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `fname` varchar(255) NULL,
  `lname` varchar(255) NULL,
  `email` varchar(255) NULL,
  `postCode` varchar(255) NULL,
  `city` varchar(255) NULL,
  `address` varchar(255) NULL,
  `phoneNum` varchar(255) NULL,
  `userID` varchar(255) NULL,
  `totalPrice` varchar(255) NULL,
  `pItems` varchar(10000) NULL,
  `status` varchar(255) NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
)ENGINE=InnoDB;

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `transacID` int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `orderID` int(11) NOT NULL,
  `shipped` varchar(255) NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp(),
  FOREIGN KEY (orderID) REFERENCES orders(orderID)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `aboutID` int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `title` varchar(255),
  `subtitle` varchar(255),
  `company1` varchar(510),
  `company2` varchar(510),
  `cInfo1` varchar(510),
  `cInfo2` varchar(510),
  `openHour` varchar(510)
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `newsID` int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `ProductID` int NULL,
  `maintitle` varchar(255) NULL,
  `newsTitle` varchar(255) NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `subID` int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB;

DROP TABLE IF EXISTS `delUser`;
CREATE TABLE `delUser` (
  `delUserID` int AUTO_INCREMENT NOT NULL PRIMARY KEY,
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB;

INSERT INTO `users` (`id`, `rank`, `fName`, `lName`, `user`, `pass`, `email`) VALUES
(1, 0, 'aaa', 'aaa', 'aaa', '$2y$10$reW9o4qUCo18Y0I/98kzIOse333l4aek6.FkhYDEH44E1vyMfWo8O', 'aaa@aaa.com');

INSERT INTO `products` (`ProductID`, `pType`, `pName`, `pPrice`, `pDiscount`, `pStock`, `pBoxsale`, `pDescription`, `pImgUrl`) VALUES
(1, 'Red Wine', 'Dancing boi', 11, 0, 99, 'Yes', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/16/28/wine-150955_1280.png'),
(2, 'Whiskey', 'Fresh Grape', 1499, 0, 999, 'No', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/13/21/champagne-146885_1280.png'),
(3, 'Vodka', 'Grape Bro', 3499, 0, 99, 'Yes', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/13/21/champagne-146885_1280.png'),
(4, 'Red Wine', 'Prezzzed', 449, 0, 99, 'Yes', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/16/28/wine-150955_1280.png'),
(5, 'White Wine', 'Good Curtains', 90, 0, 90, 'Yes', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/16/28/wine-150955_1280.png'),
(6, 'Vodka', 'Round Body', 149, 0, 99, 'No', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/16/28/wine-150955_1280.png'),
(7, 'Red Wine', 'Monkey Wine', 499, 0, 99, 'Yes', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/16/28/wine-150955_1280.png'),
(8, 'White Wine', 'Right Wine', 249, 0, 99, 'No', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/13/21/champagne-146885_1280.png'),
(9, 'Whiskey', 'Left Wine', 99, 25, 99, 'No', '&lt;Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/13/21/champagne-146885_1280.png'),
(10, 'White Wine', 'Trying Boi', 999, 50, 99, 'Yes', 'Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.', 'https://cdn.pixabay.com/photo/2013/07/12/13/21/champagne-146885_1280.png'),
(11, 'Danish Cheese', 'cheese with holes', 11, 5, 10, 'Yes', 'hehe', 'https://www.nicepng.com/png/full/166-1669342_swiss-cheese-png-cheese-transparent-png.png?fbclid=IwAR2JqwuyseHtDI5wyGhzz5S6kqIksxZV4EUEu5kwqtRfbbG3yWEXQ_mZSl4'),
(12, 'Danish Cheese', 'another hole', 55, 5, 55, 'Yes', 'good holed cheese', 'https://www.nicepng.com/png/full/166-1669342_swiss-cheese-png-cheese-transparent-png.png?fbclid=IwAR2JqwuyseHtDI5wyGhzz5S6kqIksxZV4EUEu5kwqtRfbbG3yWEXQ_mZSl4'),
(13, 'Vodka', 'HELLO KITTY', 670, 10, 25, 'Yes', 'hello kitty super alcohol', 'https://cdn11.bigcommerce.com/s-d4ygz9et8q/images/stencil/1280x1280/products/2361/562/SparklingRoseSE_800x__29007.1579212996.png');

INSERT INTO `about` (`aboutID`, `title`, `subtitle`, `company1`, `company2`, `cInfo1`, `cInfo2`, `openHour`) VALUES
(1, 'hehe', 'hehe', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis id dignissimos ipsa aut, adipisci architecto, nisi aliquam vero voluptate quos quaerat obcaecati, asperiores explicabo dolorem repudiandae? Labore eius veritatis architecto.      &lt;', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis id dignissimos ipsa aut, adipisci architecto, nisi aliquam vero voluptate quos quaerat obcaecati, asperiores explicabo dolorem repudiandae? Labore eius veritatis architecto.     &lt;', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis id dignissimos ipsa aut, adipisci architecto, nisi aliquam vero voluptate quos quaerat obcaecati, asperiores explicabo dolorem repudiandae? Labore eius veritatis architecto.      &lt;', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis id dignissimos ipsa aut, adipisci architecto, nisi aliquam vero voluptate quos quaerat obcaecati, asperiores explicabo dolorem repudiandae? Labore eius veritatis architecto.     &lt;', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis id dignissimos ipsa aut, adipisci architecto, nisi aliquam vero voluptate quos quaerat obcaecati, asperiores explicabo dolorem repudiandae? Labore eius veritatis architecto.  &lt;');

INSERT INTO `news` (`newsID`, `ProductID`, `maintitle`, `newsTitle`) VALUES
(1, 11, 'tihi', 'tihi'),
(2, 13, 'hehe', 'hehe'),
(3, 16, 'hehe', 'hehe');




INSERT INTO `newsletter` (`subID`, `email`) VALUES
(1, 'aaa@aaa.com');

DROP VIEW IF EXISTS `viewCheese`;
CREATE VIEW `viewCheese` AS SELECT * FROM products WHERE pType = 'Brie' OR pType = 'Danish Cheese';
DROP VIEW IF EXISTS `viewWine`;
CREATE VIEW `viewWine` AS SELECT * FROM products WHERE pType = 'Red Wine' OR pType = 'White Wine';
DROP VIEW IF EXISTS `viewLiquore`;
CREATE VIEW `viewLiquore` AS SELECT * FROM products WHERE pType = 'Vodka' OR pType = 'Whiskey';
DROP VIEW IF EXISTS `viewArrivals`;
CREATE VIEW `viewArrivals` AS SELECT * FROM products ORDER BY ProductID DESC LIMIT 6;
DROP VIEW IF EXISTS `viewRandom`;
CREATE VIEW `viewRandom` AS SELECT * FROM products ORDER BY RAND() LIMIT 6;
DROP VIEW IF EXISTS `viewTransact`;
CREATE VIEW `viewTransact` AS SELECT transactions.transacID, transactions.orderID, transactions.shipped, transactions.timeStamp, orders.fname, orders.lname, orders.email, orders.postCode, orders.city, orders.address, orders.phoneNum, orders.userID, orders.totalPrice, orders.pItems FROM transactions INNER JOIN orders ON transactions.orderID = orders.orderID;
DROP VIEW IF EXISTS `viewNews`;
CREATE VIEW `viewNews` AS SELECT news.newsID, news.ProductID, news.maintitle, news.newsTitle, products.pType, products.pName, products.pDescription, products.pImgUrl FROM news INNER JOIN products ON news.ProductID = products.ProductID;

ALTER TABLE `transactions` ADD CONSTRAINT `orders to transactions` FOREIGN KEY (`orderID`) REFERENCES `orders`(`orderID`) ON DELETE NO ACTION ON UPDATE NO ACTION; 

DROP TRIGGER IF EXISTS `success`;
DELIMITER //
CREATE TRIGGER `success` AFTER UPDATE ON `orders`
FOR EACH ROW
	BEGIN
    	IF NEW.status = "success" THEN 
        INSERT INTO transactions(transacID,orderID,shipped,timeStamp) values (null,OLD.orderID, 'no', NOW());
        END IF;
     END//
    DELIMITER ;

DROP TRIGGER IF EXISTS `delete_user`;
CREATE TRIGGER `delete_user`
BEFORE DELETE ON `users` 
FOR EACH ROW 
INSERT INTO delUser 
VALUES (null, old.id, old.rank, old.fName, old.lName, old.pass, old.email, NOW());


SET GLOBAL event_scheduler="ON";

DROP EVENT IF EXISTS `del_waiting`; 
CREATE EVENT `del_waiting` 
ON SCHEDULE EVERY 1 HOUR STARTS '2021-12-01 16:23:51' 
ON COMPLETION NOT PRESERVE 
ENABLE COMMENT 'Removes incompleted orders.' 
DO 
DELETE FROM orders WHERE `status`='waiting' AND UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(`timestamp`) > 1800 
