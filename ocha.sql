-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2016 at 09:13 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ocha`
--

-- --------------------------------------------------------

--
-- Table structure for table `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authassignment`
--

INSERT INTO `authassignment` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('general manager', '4', NULL, 'N;'),
('member', '5', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('AccessAmin', 0, 'Truy cập trang quản lý', NULL, 'N;'),
('admin', 2, 'admin\r\n', NULL, NULL),
('Admin.Customer.Create', 0, 'thêm thành viên', NULL, 'N;'),
('Admin.Customer.Delete', 0, 'xóa thành viên', NULL, 'N;'),
('Admin.Customer.Index', 0, 'xem danh sách thành viên', NULL, 'N;'),
('Admin.Customer.Update', 0, 'thay đổi thành viên', NULL, 'N;'),
('Admin.Customer.View', 0, 'xem chi tiết thành viên', NULL, 'N;'),
('Admin.Image.Create', 0, 'upload hình ảnh', NULL, 'N;'),
('Admin.Image.Delete', 0, 'xóa hình ảnh', NULL, 'N;'),
('Admin.Image.Index', 0, 'xem danh sách hình', NULL, 'N;'),
('Admin.News.Create', 0, 'thêm tin tức', NULL, 'N;'),
('Admin.News.Delete', 0, 'xóa tin tức', NULL, 'N;'),
('Admin.News.Index', 0, 'xem danh sách tin tức', NULL, 'N;'),
('Admin.News.Update', 0, 'cập nhập tin tức', NULL, 'N;'),
('Admin.News.View', 0, 'xem chi tiết tin', NULL, 'N;'),
('Admin.Order.Delete', 0, 'hủy đơn hàng', NULL, 'N;'),
('Admin.Order.DeleteItem', 0, 'xóa sản phẩm trong đơn hàng', NULL, 'N;'),
('Admin.Order.Delivered', 0, 'xác nhận giao hàng', NULL, 'N;'),
('Admin.Order.Detail', 0, 'xem chi tiết đơn hàng', NULL, 'N;'),
('Admin.Order.Index', 0, 'xem danh sách đơn hàng', NULL, 'N;'),
('Admin.Order.Update', 0, 'cập nhập đơn hàng', NULL, 'N;'),
('Admin.Product.Create', 0, 'thêm sản phẩm', NULL, 'N;'),
('Admin.Product.Delete', 0, 'xóa sản phẩm', NULL, 'N;'),
('Admin.Product.Detail', 0, 'xem chi tiết sản phẩm', NULL, 'N;'),
('Admin.Product.Index', 0, 'xem danh sách sản phẩm', NULL, 'N;'),
('Admin.Product.Update', 0, 'cập nhập sản phẩm', NULL, 'N;'),
('Admin.Suggest.Done', 0, 'xử lý request', NULL, 'N;'),
('Admin.Suggest.Index', 0, 'danh sách request', NULL, 'N;'),
('Admin.Suggest.Update', 0, 'cập nhập request', NULL, 'N;'),
('Admin.Suggest.View', 0, 'xem chi tiết request', NULL, 'N;'),
('custom2', 2, 'custom2', NULL, 'N;'),
('custom3', 2, 'custom3', NULL, 'N;'),
('custom4', 2, 'custom4', NULL, 'N;'),
('general manager', 2, 'quản lý chung', NULL, 'N;'),
('member', 2, 'member', NULL, 'N;');

-- --------------------------------------------------------

--
-- Table structure for table `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authitemchild`
--

INSERT INTO `authitemchild` (`parent`, `child`) VALUES
('general manager', 'AccessAmin'),
('general manager', 'Admin.Customer.Create'),
('Admin.Customer.Create', 'Admin.Customer.Delete'),
('general manager', 'Admin.Customer.Index'),
('general manager', 'Admin.Customer.Update'),
('general manager', 'Admin.Customer.View'),
('general manager', 'Admin.Image.Create'),
('general manager', 'Admin.Image.Delete'),
('general manager', 'Admin.Image.Index'),
('general manager', 'Admin.News.Create'),
('general manager', 'Admin.News.Delete'),
('general manager', 'Admin.News.Index'),
('general manager', 'Admin.News.Update'),
('general manager', 'Admin.News.View'),
('general manager', 'Admin.Order.Delete'),
('general manager', 'Admin.Order.DeleteItem'),
('general manager', 'Admin.Order.Delivered'),
('general manager', 'Admin.Order.Detail'),
('general manager', 'Admin.Order.Index'),
('general manager', 'Admin.Order.Update'),
('general manager', 'Admin.Product.Create'),
('general manager', 'Admin.Product.Delete'),
('general manager', 'Admin.Product.Detail'),
('general manager', 'Admin.Product.Index'),
('general manager', 'Admin.Product.Update'),
('general manager', 'Admin.Suggest.Done'),
('general manager', 'Admin.Suggest.Index'),
('general manager', 'Admin.Suggest.Update'),
('general manager', 'Admin.Suggest.View'),
('custom4', 'custom3'),
('custom2', 'general manager'),
('custom3', 'general manager');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saleoff` tinyint(1) NOT NULL DEFAULT '0',
  `role_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `username`, `password`, `phone`, `address`, `saleoff`, `role_name`) VALUES
(1, '', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '1234567833', '86 Nguyễn Thông P9 Q3', 0, 'admin'),
(3, '1359013@itec.hcmus.edu.vn', 'phanthehung', '81dc9bdb52d04dc20036dbd8313ed055', '1234567890', '', 0, 'member'),
(4, '1359013@itec.hcmus.edu.vn', 'pthung', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 0, 'general manager'),
(5, '', 'phanthehung2', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 0, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `directory` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `name`, `url`, `directory`) VALUES
(12, 'empty', '/ocha/images/upload/1468378217empty.jpg', '/images/upload/1468378217empty.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `ID` int(11) NOT NULL,
  `index` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `imgUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `index`, `title`, `content`, `description`, `imgUrl`, `inserted`) VALUES
(7, 0, 'Sự thật về claim “Hàm lượng chất chống oxi hóa trong matcha gấp 137 lần so với trà xanh”', '\nMatcha, cũng giống như nhiều loại sản phẩm dinh dưỡng, có lợi cho sức khỏe khác, thường bị nhiều website, shop bán hàng đẩy lên quá mức các tác dụng có lợi của nó. <br/>\nBạn có thể thấy rất nhiều website, shop bán matcha nói là matcha có hàm lượng chất chống oxi hóa (antioxidant) cao hơn gấp 137 lần so với trà xanh thông thường! Trong đó có những trang bán hàng phổ biến như DoMatcha, Zenmatcha cũng có claim như vậy. Điều này có đúng không?<br/>\nNếu ích lợi như vậy thì việc uống 1 ly matcha mỗi ngày sẽ nguy hiểm hơn là có lợi. Khả năng chống oxi hóa, lão hóa trong trà liên quan chủ yếu đến hợp chất EGCG có trong thành phần lá trà. Theo báo cáo của USDA năm 2007, lượng trung bình EGCG trong 1 ly trà xanh thông thường (225ml) khoảng 145mg, tương đương với việc một ly matcha sẽ có hàm lượng trung bình là gần 20g EGCG! Trong khi đó lượng sử dụng hàng ngày đề nghị của EGCG chỉ là khoảng 300mg! (dựa trên các nghiên cứu trên người của thành phẩm Teavigo của DSM, FDA vẫn chưa đưa ra khuyến cáo RDA cho EGCG). Như vậy thì matcha sẽ trở thành chất độc hơn là chất có lợi cho sức khỏe do hàm lượng EGCG quá cao!<br/>\nCâu hỏi được đặt là tại sao lại có claim như vậy. Hầu hết các trang web đều dẫn chứng từ một nghiên cứu của Anderton, C. R. & Weiss trên Journal of Chromatography A. Và cách diễn giải lập lờ của các website, các shop bán matcha này dẫn đến 1 kết luận HOÀN TOÀN SAI SỰ THẬT. <br/>\nBáo cáo này kết luận như sau: “Kết quả chỉ ra rằng hàm lượng EGCG trong matcha uống gấp 137 lần lượng EGCG trong trà xanh China Green Tips, và cao ít nhất gấp 3 lần so với các loại trà xanh khác”. Kết quả kiểm tra  của báo cáo này:\n0.42mg EGCG/g Tazo China Green Tips Tea (tương đương với 1.2mg EGCG trong 1 ly Tazo China Green Tips)\n57.4mg EGCG/g matcha (tương đương với 120 mg EGCG trong 1 ly matcha)<br/>\nTazo China Green Tips là một brand trà Green Tips của Starbuck. Loại trà Green Tips có nguồn gốc là một loại trà búp nổi tiếng của Trung Quốc, còn gọi là trà Maojian trồng ở Hà Nam, Trung Quốc. Kết quả của báo cáo trên KHÔNG chứng tỏ được hàm lượng ECGC trong matcha cao hơn 137 lần so với là trà xanh thông thường. Kết quả đó chứng tỏ là mẫu matcha kiểm tra có EGCG gấp 137 lần so với mẫu Tazo China Green Tips Tea, và mẫu này hoàn toàn không đại diện cho trà xanh thông thường. Mẫu Tazo Green Tips này có hàm lượng EGCG rất thấp, chỉ bằng 0.8% so với trà xanh thông thường. <br/>\nNhư vậy, kết luận matcha có hàm lượng EGCG cao hơn khoảng 3 lần so với các loại trà xanh thông thường khác thì có vẻ hợp lý hơn. Do matcha thường được thu hoạch ở Nhật nơi có điều kiện khí hậu phù hợp để cho lượng EGCG cao và matcha được thu hoạch từ toàn bộ lá trà đã được rút gân lá, thay vì các loại trà xanh thông thường thường được uống bằng cách ngâm/trích ly lá trà.  \nNguồn tham khảo:<br/>\n<a href="http://www.ars.usda.gov/SP2UserFiles/Place/80400525/Data/Flav/Flav_R03.pdf" title="">www.teavigoinfo.com/pdf/medical-safety-opinion.pdf</a><br/>\n<a href="http://www.ncbi.nlm.nih.gov/pubmed/14518774" title="">http://www.ncbi.nlm.nih.gov/pubmed/14518774</a><br/>\n<a href="http://www.ars.usda.gov/SP2UserFiles/Place/80400525/Data/Flav/Flav_R03.pdf" title="">www.ars.usda.gov/SP2UserFiles/Place/12354500/Data/Flav/Flav_R03.pdf</a><br/>\n', 'Bạn có thể thấy rất nhiều website, shop bán matcha nói là matcha có hàm lượng chất chống oxi hóa (antioxidant) cao hơn gấp 137 lần so với trà xanh thông thường! Trong đó có những trang bán hàng phổ biến như DoMatcha, Zenmatcha cũng có claim như vậy. Điều này có đúng không?', '/ocha/images/blogs/1.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `orderId` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(15) NOT NULL,
  `total` double unsigned NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `state` int(11) NOT NULL DEFAULT '0',
  `inserted` datetime NOT NULL,
  `updater` int(11) NOT NULL DEFAULT '0',
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `address`, `phone`, `total`, `user`, `email`, `note`, `state`, `inserted`, `updater`, `updated`) VALUES
(41, '86 Nguyễn Thông P9 Q3', 12345678, 150000, 'Adminddd', '', 'empty', -1, '2016-07-05 15:51:47', 1, '2016-07-12 16:58:58'),
(42, '86 Nguyễn Thông P9 Q3', 12345678, 200000, 'Admin', '', 'empty', 1, '2016-07-05 15:55:37', 1, '2016-07-12 17:00:13'),
(43, '86 Nguyễn Thông P9 Q3', 12345678, 0, 'Admin', '', 'empty', 0, '2016-07-05 15:57:48', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `ID` int(11) NOT NULL,
  `orId` int(11) NOT NULL,
  `proId` int(11) NOT NULL,
  `proTitle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `proPrice` double NOT NULL,
  `proImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `inserted` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`ID`, `orId`, `proId`, `proTitle`, `proPrice`, `proImg`, `quantity`, `inserted`) VALUES
(52, 41, 154, 'Ocha Chawan CW04', 150000, '/ocha/images/products/Ocha Chawan CW04A.jpg', 1, '2016-07-05 15:51:48'),
(53, 42, 2, 'Loại tiêu chuẩn SD3', 200000, '/ocha/images/products/3.jpg', 1, '2016-07-05 15:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `proId` int(11) NOT NULL,
  `proTitle` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `proPrice` double unsigned NOT NULL,
  `index` tinyint(1) DEFAULT '0',
  `proDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `proStt` tinyint(1) DEFAULT NULL,
  `proImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `proImg2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proImg3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proId`, `proTitle`, `proPrice`, `index`, `proDescription`, `proStt`, `proImg`, `proImg2`, `proImg3`, `category`) VALUES
(1, 'Loại cao cấp PL1', 330000, 1, 'Matcha  - Loại cao cấp PL1: loại matcha được thu hái từ lá trà thu hái vào mùa xuân, Ichabancha, là lá trà cao cấp, xanh nhất và dinh dưỡng hơn lá trà thu hái các mùa vụ khác trong năm. Lá trà này được che phủ trước khi thu hoạch, thu hái bằng tay và qua một quy trình sấy, nghiền tạo nên dạng bột màu xanh ngọc bích rất tươi.   <br/>\r\n<b>Hương vị:</b> Hương  ngọt ngào nồng nàn với mùi xanh lá trà tươi mới ngay từ khi bạn pha matcha loại cao cấp PL1 vào nước , khiến bạn như đang đứng trước đồi trà và chạm tay vào từng lá trà tươi xanh. Vị ngọt dậy hầu như ngay lúc đầu sau khi nếm và nổi trội  hơn nhiều so với vị xanh lá. Vị ngọt tinh tế này kéo dài thành hậu vị, lấn át hậu vị xanh lá non. <br/>\r\n<b>Cách dùng:</b> phối trộn trong các thực phẩm khác nhau như smoothie, trà sữa, latte, bánh,..  Bạn cũng có thể pha ½ muỗng matcha với 100ml nước để uống.  <br/>\r\n<b>Khối lượng:</b> 100g<br/>\r\n', 0, '/ocha/images/products/1.jpg', '/images/products/1.jpg', '', 1),
(2, 'Loại tiêu chuẩn SD3', 200000, 1, 'Matcha - loại tiêu chuẩn SD3: loại matcha được thu hái từ lá trà thu hái vào mùa xuân, Ichabancha, là lá trà cao cấp, xanh nhất và dinh dưỡng hơn lá trà thu hái các mùa vụ khác trong năm. Nhờ đó mang đến hương vị đặc trưng  và cao cấp cho những người sành trà matcha. Hãy cảm nhận sự khác biệt cao cấp của matcha.<br/>\n<b>Hương vị:</b> Lúc đầu lên thơm xanh mùi lá non, cảm giác đầy trong miệng nhưng nhẹ và trơn, và vị cuối là mùi xanh nhẹ kết hợp hài hòa với vị ngọt nhẹ. <br/>\n<b>Cách dùng:</b> phối trộn trong các thực phẩm khác nhau như smoothie, trà sữa, latte, bánh,..  Bạn cũng có thể pha ½ muỗng matcha với 100ml nước để uống. <br/>\n<b>Khối lượng:</b> 100g<br/>\n', 0, '/ocha/images/products/3.jpg', NULL, NULL, 1),
(3, 'Loại tiêu chuẩn SD4', 255000, 1, 'Matcha - Loại tiêu chuẩn SD4: loại matcha được thu hái từ lá trà thu hái vào mùa xuân, Ichabancha, là lá trà cao cấp, xanh nhất và dinh dưỡng hơn lá trà thu hái các mùa vụ khác trong năm. Lá trà này được chephủ trước khi thu hoạch, thu hái bằng tay và qua một quy trình sấy, nghiền tạo nên dạng bột màu xanh ngọc bích rất tươi. <br/>\n<b>Hương vị:</b> Hương ngọt ngào nồng nàn với mùi xanh lá trà tươi mới ngay từ khi bạn pha matcha loại cao cấp PL1 vào nước , khiến bạn như đang đứng trước đồi trà và chạm tay vào từng lá trà tươi xanh. Vị ngọt dậy hầu như ngay lúc đầu sau khi nếm và nổi trội hơn nhiều so với vị xanh lá. Vị ngọt tinh tế này kéo dài thành hậu vị, lấn át hậu vị xanh lá non. <br/>\n<b>Cách dùng:</b> phối trộn trong các thực phẩm khác nhau như smoothie, trà sữa, latte, bánh,..  Bạn cũng có thể pha ½ muỗng matcha với 100ml nước để uống.  <br/>\n<b>Khối lượng:</b> 100g<br/>', 0, '/ocha/images/products/5.jpg', NULL, NULL, 1),
(151, 'Ocha Chawan CW01', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW01A.jpg', '/images/products/Ocha Chawan CW01B.jpg', NULL, 3),
(152, 'Ocha Chawan CW02', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW02A.jpg', '/images/products/Ocha Chawan CW02B.jpg', NULL, 3),
(153, 'Ocha Chawan CW03', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW03A.jpg', '/images/products/Ocha Chawan CW03B.jpg', NULL, 3),
(154, 'Ocha Chawan CW04', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW04A.jpg', '/images/products/Ocha Chawan CW04B.jpg', NULL, 3),
(155, 'Ocha Chawan CW05', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW05A.jpg', '/images/products/Ocha Chawan CW05B.jpg', NULL, 3),
(156, 'Ocha Chawan CW06', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW06A.jpg', '/images/products/Ocha Chawan CW06B.jpg', NULL, 3),
(157, 'Ocha Chawan CW07', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW07A.jpg', '/images/products/Ocha Chawan CW07B.jpg', NULL, 3),
(158, 'Ocha Chawan CW08', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW08A.jpg', '/images/products/Ocha Chawan CW08B.jpg', NULL, 3),
(159, 'Ocha Chawan CW09', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW09A.jpg', '/images/products/Ocha Chawan CW09B.jpg', NULL, 3),
(160, 'Ocha Chawan CW01', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW01A.jpg', '/images/products/Ocha Chawan CW01B.jpg', NULL, 3),
(161, 'Ocha Chawan CW02', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW02A.jpg', '/images/products/Ocha Chawan CW02B.jpg', NULL, 3),
(162, 'Ocha Chawan CW03', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW03A.jpg', '/images/products/Ocha Chawan CW03B.jpg', NULL, 3),
(163, 'Ocha Chawan CW04', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW04A.jpg', '/images/products/Ocha Chawan CW04B.jpg', '', 3),
(164, 'Ocha Chawan CW05', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW05A.jpg', 'images/products/Ocha Chawan CW05B.jpg', NULL, 3),
(165, 'Ocha Chawan CW06', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW06A.jpg', '/images/products/Ocha Chawan CW06B.jpg', NULL, 3),
(166, 'Ocha Chawan CW07', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW07A.jpg', '/images/products/Ocha Chawan CW07B.jpg', NULL, 3),
(167, 'Ocha Chawan CW08', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW08A.jpg', '/images/products/Ocha Chawan CW08B.jpg', NULL, 3),
(168, 'Ocha Chawan CW09', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW09A.jpg', '/images/products/Ocha Chawan CW09B.jpg', NULL, 3),
(169, 'Ocha Chawan CW10', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW10A.jpg', '/images/products/Ocha Chawan CW10B.jpg', NULL, 3),
(170, 'Ocha Chawan CW11', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW11A.jpg', '/images/products/Ocha Chawan CW11B.jpg', NULL, 3),
(171, 'Ocha Chawan CW12', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW12A.jpg', '/images/products/Ocha Chawan CW12B.jpg', NULL, 3),
(172, 'Ocha Chawan CW13', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW13A.jpg', '/images/products/Ocha Chawan CW13B.jpg', NULL, 3),
(173, 'Ocha Chawan CW14', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW14A.jpg', 'images/products/Ocha Chawan CW14B.jpg', NULL, 3),
(174, 'Ocha Chawan CW15', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW15A.jpg', 'images/products/Ocha Chawan CW15B.jpg', NULL, 3),
(175, 'Ocha Chawan CW16', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW16A.jpg', '/images/products/Ocha Chawan CW16B.jpg', NULL, 3),
(176, 'Ocha Chawan CW17', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW17A.jpg', '/images/products/Ocha Chawan CW17B.jpg', NULL, 3),
(177, 'Ocha Chawan CW18', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW18A.jpg', '/images/products/Ocha Chawan CW18B.jpg', NULL, 3),
(178, 'Ocha Chawan CW19', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW19A.jpg', '/images/products/Ocha Chawan CW19B.jpg', NULL, 3),
(179, 'Ocha Chawan CW20', 150000, 0, 'Chén pha trà, hay còn gọi là chawan, thường được sử dụng trong các lễ trà đạo truyền thống của người Nhật. Người ta dùng chawan để pha matcha và cũng có thế uống trực tiếp matcha bằng chawan. Đơn giản, tíncmh tế và được nhập từ Nhật với giá cả hợp lý.<br><br> <b> Kích thước:</b> 5.5cm x 8cm <br><br><b>Xuất xứ:</b> Nhật Bản', 0, '/ocha/images/products/Ocha Chawan CW20A.jpg', '/images/products/Ocha Chawan CW20B.jpg', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rights`
--

CREATE TABLE IF NOT EXISTS `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suggest`
--

CREATE TABLE IF NOT EXISTS `suggest` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggest`
--

INSERT INTO `suggest` (`id`, `username`, `email`, `content`, `state`, `created`) VALUES
(1, 'dsa', 'asdasd', 'dasdasd', 2, '0000-00-00 00:00:00'),
(2, 'sdads', 'sadads', 'sdaasd', 1, '0000-00-00 00:00:00'),
(3, 'sdads', 'sadads', 'sdaasd', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authassignment`
--
ALTER TABLE `authassignment`
  ADD PRIMARY KEY (`itemname`,`userid`);

--
-- Indexes for table `authitem`
--
ALTER TABLE `authitem`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD PRIMARY KEY (`parent`,`child`), ADD KEY `child` (`child`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proId`);

--
-- Indexes for table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`itemname`);

--
-- Indexes for table `suggest`
--
ALTER TABLE `suggest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `suggest`
--
ALTER TABLE `suggest`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authassignment`
--
ALTER TABLE `authassignment`
ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authitemchild`
--
ALTER TABLE `authitemchild`
ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rights`
--
ALTER TABLE `rights`
ADD CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
