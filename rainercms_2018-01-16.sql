# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: rainercms
# Generation Time: 2018-01-15 23:10:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table newsletter
# ------------------------------------------------------------

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `shipping` varchar(50) DEFAULT '',
  `payment` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(150) DEFAULT NULL,
  `street` varchar(150) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postcode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `size`, `price`, `total`, `quantity`, `shipping`, `payment`, `country`, `fname`, `lname`, `street`, `city`, `postcode`)
VALUES
	(1,2,'4','m','198','223','2','express','paypal','switzerland','Violet','Indigo','Huettli 82','Zürich','4431'),
	(2,3,'4, 1','m, l','99, 138','247','1, 2','standard','visa','france','Jon','Doe','Dover Street 96','Paris','98421'),
	(3,7,'5, 7','m, m','78, 256','359','2, 2','express','paypal','austria','Hannah','Mayfurth','Laxenburger Straße 31','Vienna','1100'),
	(4,7,'1','l','276','301','4','express','visa','austria','Hannah','Mayfurth','Laxenburger Straße 31','Vienna','1100');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text,
  `category` varchar(50) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `sizes` varchar(100) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `created_at` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `title`, `price`, `description`, `category`, `img`, `sizes`, `status`, `created_at`)
VALUES
	(1,'Blue Drawing',44,'Irony tote <b>bag</b> tacos celiac. Ramps ut quinoa cillum PBR&amp;B tofu ut roof party enim pop-up et aliquip cronut. <b><i>Chillwave</i></b> id consectetur deserunt edison bulb <b><i><u>glossier</u></i></b>. Kogi sint master cleanse, small <u>batch</u> migas next level quis drinking vinegar <i>chartreuse</i> hoodie asymmetrical man braid. Literally etsy mollit ut aliqua ullamco chia. Chillwave <u>veniam</u> twee.','painting','drawing-minimal_7.jpg','s,l','live','1513800608'),
	(2,'Nude Painting',49,'<b>Banjo</b> ethical put a bird on it, chia <u>copper</u> mug normcore incididunt. YOLO kombucha hell of, <i>activated</i> charcoal photo booth everyday carry banjo commodo <u>chicharrones</u> eiusmod crucifix. <b><i>Voluptate</i></b> everyday carry activated charcoal aesthetic <i><b>exercitation</b></i> direct trade four dollar <u>toast</u>.','painting','drawing-nude.jpg','m,l','live','1513800653'),
	(3,'Abstract Collage',99,'Occaecat <b><i>kickstarter</i></b> hammock, ea <i>twee</i> air plant shabby chic gluten-free ipsum. La croix cred shoreditch copper mug. <u><i>Tote bag </i></u>reprehenderit copper mug tilde <b>disrupt</b> pug 8-bit. <i><b>Migas typewriter</b></i> dolore, unicorn bushwick umami incididunt <i>occupy</i> direct trade deserunt mustache tumblr actually lomo mumblecore. Ut commodo godard, listicle raclette typewriter freegan scenester.','painting','16-03-002-collage-xl.jpg','s,m,l','live','1514132370'),
	(4,'Minimal Collage',99,'<b>Vice</b> plaid <b>kinfolk</b>, health goth <u><i>neutra</i></u> trust fund <i>polaroid</i> man braid taxidermy. Nulla fixie tote bag blog. <i><b>Tempor</b></i> succulents <u>brunch</u> fixie gluten-free hammock. <b><u><i>Fanny pack!!</i></u></b>','drawing','16-02-001-drawing-mini-xl.jpg','m','live','1514588152'),
	(5,'Minimal Drawing',29,'Wolf austin pabst <i>raclette</i> coloring book. Do man <b>braid</b> organic ad minim. Put a bird on it ea <u><i><b>hashtag</b></i></u> kickstarter crucifix. Eu helvetica selfies <b>readymade</b> pork belly austin craft beer lorem shoreditch. <b>Single-origin</b> coffee messenger bag sustainable ramps blog <i><b>vaporware</b></i> brooklyn shabby chic mlkshk literally, tote bag <u><i>lumbersexual</i></u>.','drawing','drawing-minimal_4.jpg','s,m','live','1514825872'),
	(6,'Naked Painting',35,'<b>Gluten-free</b> master cleanse beard ea, hexagon ut neutra reprehenderit crucifix yuccie occaecat butcher vexillologist four dollar toast hot chicken. Pug <u>occupy</u> austin deep v post-ironic vaporware sartorial irony la croix vinyl godard <b>narwhal</b> subway tile. +1 esse minim exercitation kitsch la croix gluten-free humblebrag eiusmod offal ut <i><u>skateboard</u></i> green juice unicorn. Photo booth subway tile put a bird on it, eiusmod bicycle rights flannel semiotics vinyl. Reprehenderit hella in viral <b><i>XOXO</i></b>. Dolor lorem schlitz jianbing.','painting','15-01-001-painting-xl.jpg','m,l','private','1515945420'),
	(7,'Thunderstorm',54,'<b>Master</b> cleanse man bun +1 est twee mlkshk. <i><u>Chia glossier</u></i> in, la croix vice dolore hexagon four dollar toast salvia fam cupidatat. <b>Cornhole</b> consectetur beard, occaecat aesthetic williamsburg officia. Tote bag twee wayfarers, trust fund do jean shorts bicycle rights. <b><i>Succulents</i></b> fashion axe slow-carb cloud bread offal typewriter air plant, raw denim banh mi ut edison bulb meh non single-origin coffee.','painting','14-11-001-painting-xl.jpg','s,m,l','live','1515945717'),
	(8,'Dark Collage',29,'Duis <b>veniam</b> man bun culpa tattooed portland, marfa tumeric velit. Gochujang occupy cliche fashion axe roof party. Bicycle rights irure <i><u>kitsch</u></i> quis <b>tacos</b> vice banh mi organic. Live-edge <b><i>coloring</i></b> book sed chillwave <b>PBR&amp;B </b>semiotics sriracha deserunt labore nisi art party tote bag fashion axe.','drawing','15-01-001-collage-xl.jpg','s','draft','1515976937');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_group` int(11) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `user_group`, `gender`, `fname`, `lname`, `street`, `city`, `postcode`, `country`, `username`, `password`, `email`)
VALUES
	(1,0,'male','Niklas','Schoenberger','Nisselgasse 200','Wien','1140','austria','admin','6d4981f213fdc0371b7c7af961dfe29969cf274f:rainer','nik.schoe@gmail.com'),
	(2,1,'female','Violet','Indigo','Huettli 82','Zürich','4431','switzerland','vio-indi','d3422a3b70afde86e065ce91060f1aaf1c171383:rainer','violet.indi@gmail.com'),
	(3,1,'male','Jon','Doe','Dover Street 96','Paris','98421','france','jon.doe','a2b4dd733cf148f612854e627794b3b69f84460e:rainer','jon@doe.com'),
	(4,1,'female','Sady','Hoppenberg','Hoppenstreet 92','Berlin','4453','germany','username','6ed8178ff4a241e1d499d1c1f2351c5fafd03231:rainer','sady.hoppen@co.at'),
	(5,1,'female','Hilary','Ouse','Ländli 32','Basel','4282','switzerland','hilary.ouse','31c5a17d7635fa3d2057e0953db6223ac09ee255:rainer','hilary.ouse@live.ch'),
	(6,1,'male','Jake','Lorien','Croissant Avenue 21','Paris','9921','france','jake_lori','4ddef226f462bf86b543b8aecf6433795302c83d:rainer','jake_lori@mail.fr'),
	(7,1,'female','Hannah','Mayfurth','Laxenburger Straße 31','Vienna','1100','austria','hannanas','1e763cdea01bf03806099dc605a695199840ac99:rainer','hannah80a@icloud.com'),
	(8,1,'male','Stefan','Maier','Waldweg 1','Unterlamm','8352','austria','steffl.mai','a5b2cfb8f3eeb61310707a33d16b4ba643d6b143:rainer','steffl.mai@email.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table wishlist
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wishlist`;

CREATE TABLE `wishlist` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;

INSERT INTO `wishlist` (`id`, `product_id`, `user_id`, `created_at`)
VALUES
	(2,3,3,1515871083),
	(3,1,3,1515937968),
	(4,7,7,1516035474),
	(5,7,3,1516051410),
	(6,4,2,1516054128);

/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
