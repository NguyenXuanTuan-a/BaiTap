-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: projectweb
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categories` int DEFAULT NULL,
  `sub_id_categories` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mrp` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `short_desc` longtext,
  `description` longtext,
  `best_seller` int DEFAULT NULL,
  `meta_title` varchar(45) DEFAULT NULL,
  `meta_desc` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(45) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,1,'Rolex Sky-Dweller',4000,3800,8,'rolex-datejust-36-126283rbr-mat-so-vang-champaigne-nam-kim-cuong-day-deo-oyster.png','Rolex giá trị đẳng cấp thế gới','1',1,'Dweller','1','1',1),(2,1,1,'Rolex Oyster Perpetual Submariner',6500,5800,3,'rolex-submariner-date-116610ln-40mm.png','Thương hiệu đồng hồ Rolex nổi tiếng với những sản phẩm có khả năng chịu được áp lực lớn và sở hữu sức mạnh khó tin. Một trong những dòng đồng hồ ấy chính là Rolex Submariner. Rolex Submariner Date 116610LN là một trong những mẫu đồng hồ thợ lặn đầu tiên trên thế giới.','1',1,'Submariner','1','1',1),(3,1,1,'ROLEX DAY-DATE',8000,7850,5,'rolex-day-date-36mm-128238-0077.png','Rolex Day-Date 36mm 128238-0077 về tổng thể là một chiếc đồng hồ được làm hoàn toàn bằng chất liệu vàng vàng 18K, kích thước vỏ 36mm, nó là chiếc đồng hồ xa xỉ, mang đến cho người đeo với vẻ ngoài sang trọng, lịch lãm. Sự chắc chắn trong thiết kế, Rolex ref.128238-0077 là một trong những chiếc đồng hồ đặc trưng của thương hiệu.','Bộ sưu tập Day-Date vẫn luôn dành được sự quan tâm khá lớn từ phía người chơi, nhà sưu tập kể từ khi được hãng Rolex cho ra mắt lần đầu vào năm 1956, trải qua nhiều thập kỷ, hãng Rolex vẫn luôn không ngừng cải tiến về chất lượng, nhằm đem đến trải nghiệm giá trị tốt nhất đến người chơi. Boss Luxury xin giới thiệu phiên bản Rolex Day-Date 36mm 128238-0077 mặt số màu trắng.\r\n\r\nMẫu đồng hồ Rolex Day-Date 36mm 128238-0077 xuất hiện với lớp mặt số màu trắng cùng bộ cọc số La Mã giữ trọn lại vẻ đẹp hoàn hảo nhất của các cọc số chỉ báo giờ trên chiếc đồng hồ này, vẫn là những nét nhận diện đặc trưng đó là bộ vành khía, bộ cọc số dạng gậy, kính cyclops cho việc hiện thị ngày trở nên dễ dàng hơn, hay ô cửa sổ chỉ báo thứ góc 12h, đây đều là những nét nhận diện vồn trở thành kinh điển trên những mẫu đồng hồ của thương hiệu Rolex.\r\n\r\nỞ vị trí 3h là cửa sổ hiển thị ngày, còn ở vị trí 12 là cửa sổ báo thứ trong tuần. Bảo vệ mặt đồng hồ là lớp kính được làm từ tinh thể sapphire nên có khả năng chống xước, với tròng kính Cyclops thiết kế lồi giúp phần hiển thị ngày dễ đọc hơn bao giờ hết. Có lẽ, với người hâm mộ Rolex Day Date thì đây là những dấu hiệu cơ bản đặc trưng của bộ sưu tập này giúp phân biệt với những bộ sưu tập khác. Phía bên dưới góc 12h là logo thương hiệu hình vương miện đặc trưng của hãng.\r\n\r\nVới Rolex Day-Date 36mm 128238-0077 nhà sản xuất đã trang bị bộ máy tự động lên cót 3255, có khả năng trữ cót khoảng 70 giờ đồng hồ để cung cấp năng lượng. Bộ máy 3255 cũng nhận được hai chứng nhận đảm bảo tính vận hành chính xác và bền bỉ như Chronometer của tổ chức COSC cũng như chứng nhận Superative Chronometer của riêng Rolex.',0,'ROLEX DAY-DATE','1','1',1),(4,1,1,'ROLEX COSMOGRAPH DAYTONA',3800,3500,10,'rolex-cosmograph-daytona-116503-0009.png','Rolex Cosmograph Daytona 116503-0009 hoàn thiện từ chất liệu thép không gỉ 904L kết hợp với vàng vàng 18k. Mặt số xà cừ đen cuốn hút và nổi vật với các cọc số bằng kim cương. Ba mặt số phụ biểu hiện cho tính năng bấm giờ chronograph bao gồm: mặt số phụ chỉ 12 tiếng ở vị trí 9 giờ, mặt số phụ chỉ 30 phút ở vị trí 3 giờ và mặt số phụ góc 6h hiển thị kim giây của đồng hồ.','Là mẫu đồng hồ bấm giờ thể thao biểu tượng của thương hiệu Rolex, Rolex Cosmograph Daytona 116503-0008 đã từng gắn liền với không ít những sự kiện, giải đấu quang trọng trọng lịch sử. Và cho đến thời điển hiện đại, mức độ được tín nhiệm của những chiếc đồng hồ Rolex Cosmograph Daytona 116503-0004 này vẫn không hề giảm bởi nó không chỉ sở hữu một bộ máy hoạt động vượt bậc mà nó còn mang những đường nét thiết kế hoàn mỹ bên ngoài.\r\n\r\nRolex Cosmograph Daytona 116503-0008 được hoàn thiện từ chất liệu thép không gỉ 904L kết hợp với vàng vàng 18K. Mặt số xà cừ đen đen cuốn hút và nổi bật với các cọc bằng kim cương cùng ba mặt số phụ chronograph bao gồm: mặt số phụ chỉ 12 tiếng ở vị trí 9 giờ, mặt số phụ chỉ 30 phút ở vị trí 3 giờ và mặt số phụ góc 6h hiển thị kim giây của đồng hồ. Vòng bezel bằng vàng vàng 18 Ct được cố định và có khắc thang đo tachymetric.\r\n\r\nSức mạnh của Rolex Cosmograph Daytona 116503-0008 được thực hiện bởi bộ máy Calibre 4130 Perpetual, chronograph cơ học, chuyển động tự lên dây cót. Đặc biệt, chiếc đồng hồ này có thể dự trữ năng lượng trong khoảng 72 giờ và nó có khả năng chống nước lên đến 100 mét / 330 feet. \r\n\r\nCuối cùng, Rolex Cosmograph Daytona 116503-0008 được trang bị với dây đeo Oyster nối ba mảnh kết hợp giữa vàng vàng 18K cùng thép không gỉ 904L. Với những tính năng vượt trội đó, Rolex Cosmograph Daytona 116503-0008 đã trở thành niềm mong ước của mọi quý ông về một mẫu đồng hồ chuẩn xác và nam tính.',1,'ROLEX COSMOGRAPH DAYTONA','1','1',1),(5,1,1,'ROLEX YACHT-MASTER',1230,1150,2,'rolex-yacht-master-116655.png','Đồng hồ Rolex thể thao mới năm 2015 là một phiên bản hấp dẫn của Rolex Yacht-Master có vỏ bằng vàng Everos 18k, vòng đệm gốm Cerachrom màu đen kết hợp với dây đeo Oysterflex. Yacht-Maste 2015 thực sự là hai chiếc đồng hồ có những điểm khác biệt nhỏ nhưng lại là những khác biệt quan trọng.','Yacht-Master luôn tồn tại một vị trí nhất định trong gia đình đồng hồ thể thao Rolex. Nó  không phải là một chiếc đồng hồ lặn chuyên nghiệp hoặc một chiếc đồng hồ du hành không gian. Đó là một chiếc đồng hồ cho những người đi thuyền. Điều đó có nghĩa là khả năng chịu nước rất cao, nhưng vẫn mang phong cách riêng và toát lên được sự sang trọng. Tất cả điều đó đã làm cho Rolex Yacht-Master trở nên mới mẻ hơn bao giờ hết.\r\nVề mặt cá nhân, Rolex Yacht-Master 116655 có tính thẩm mĩ cao. Những chiếc đồng hồ Rolex Yacht-Master chất liệu vàng Everose 18k trộn với gốm đen làm cho nó trông hấp dẫn hơn và tạo nên một sự khác biệt. Trong khi Submariner có vỏ bọc bằng Cerachrom đen bóng với các điểm đánh dấu bằng sơn dầu, vòng đệm gốm Cerachrom của Rolex Yacht-Master 116655 đen mờ (giống như các loại vòng đệm Rolex Yacht-Master khác có trong kim loại quý).',1,'ROLEX YACHT-MASTER','1','1',1),(6,2,5,'Rectangular Ceramic Bracelet',145,110,12,'black-gold-ceramic-bracelet-watch-rectangular-case-AK-2952BKGB_2000x.jpg','1','1',0,'Rectangular Ceramic Bracelet','1','1',1),(7,2,5,'Ceramic Rose-Gold Tone Watch With Swarovski Crystals',350,310,11,'swarovski-crystal-accented-black-rose-gold-tone-ceramic-bracelet-watch-AK-3810BKRG_2000x.jpg','1','1',0,'1','1','1',1),(8,2,3,'Statement Rose Gold Bracelet Watch',289,260,3,'43038236_000_main.jfif','1','1',0,'1','1','1',1),(9,2,3,'Elegance Bracelet Watch',258,249,5,'43032346_000_main.jfif','1','1',0,'1','1','1',1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-22 14:34:14
