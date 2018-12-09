-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: mysql
-- Thời gian đã tạo: Th12 09, 2018 lúc 02:58 PM
-- Phiên bản máy phục vụ: 5.7.24
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ProductManager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Admin`
--

CREATE TABLE `Admin` (
  `AdminID` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `Admin`
--

INSERT INTO `Admin` (`AdminID`, `UserName`, `Password`, `Email`, `Phone`) VALUES
(1, 'hoa', 123456, 'hoa@gmail.com', '1234567'),
(2, 'wow', 123456, 'mail', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Bill`
--

CREATE TABLE `Bill` (
  `BillId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `PayTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `Bill`
--

INSERT INTO `Bill` (`BillId`, `UserId`, `ProductId`, `Quantity`, `PayTime`) VALUES
(11, 5, 7, 1, '2018-12-04 00:00:00'),
(12, 5, 9, 1, '2018-12-03 12:16:23'),
(13, 29, 1, 1, '2018-12-03 20:12:16'),
(14, 29, 2, 1, '2018-12-03 20:12:16'),
(15, 29, 1, 2, '2018-12-09 13:25:49'),
(16, 29, 2, 1, '2018-12-09 13:25:49'),
(17, 29, 9, 1, '2018-12-09 13:25:49'),
(18, 5, 1, 1, '2018-12-09 21:52:54'),
(19, 5, 34, 1, '2018-12-09 21:53:10'),
(20, 5, 28, 9, '2018-12-09 21:55:17'),
(21, 5, 5, 3, '2018-12-09 21:55:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Product`
--

CREATE TABLE `Product` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(1000) NOT NULL,
  `Descriptions` varchar(3000) DEFAULT NULL,
  `SupplierId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `TypeOfUnit` varchar(50) NOT NULL,
  `SuggestedPrice` int(11) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `Product`
--

INSERT INTO `Product` (`ProductId`, `ProductName`, `Descriptions`, `SupplierId`, `CategoryId`, `TypeOfUnit`, `SuggestedPrice`, `Image`) VALUES
(1, 'Iphone 6', 'Màn hình\r\nCông nghệ màn hình	LED-backlit IPS LCD\r\nĐộ phân giải	HD (750 x 1334 Pixels)\r\nMàn hình rộng	4.7\"\r\nMặt kính cảm ứng	Kính oleophobic (ion cường lực)\r\nCamera sau\r\nĐộ phân giải	8 MP\r\nQuay phim	Quay phim FullHD 1080p@60fps\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama\r\nCamera trước\r\nĐộ phân giải	1.2 MP\r\nVideocall	Có\r\nThông tin khác	Tự động lấy nét\r\nHệ điều hành - CPU\r\nHệ điều hành	iOS 11\r\nChipset (hãng SX CPU)	Apple A8 2 nhân 64-bit\r\nTốc độ CPU	1.4 GHz\r\nChip đồ họa (GPU)	PowerVR GX6450\r\nBộ nhớ & Lưu trữ\r\nRAM	1 GB\r\nBộ nhớ trong	32 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 26 GB\r\nThẻ nhớ ngoài	Không\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 4\r\nSIM	1 Nano SIM\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	Có, A-GPS\r\nBluetooth	A2DP, V4.0\r\nCổng kết nối/sạc	Lightning\r\nJack tai nghe	3.5 mm\r\nKết nối khác	Air Play, OTG, HDMI\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Hợp kim nhôm\r\nKích thước	Dài 138.1 mm - Ngang 67 mm - Dày 6.9 mm\r\nTrọng lượng	124 g\r\nThông tin pin & Sạc\r\nDung lượng pin	1810 mAh\r\nLoại pin	Pin chuẩn Li-Po\r\nCông nghệ pin	Tiết kiệm pin\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay\r\nTính năng đặc biệt	Mặt kính 2.5D\r\nGhi âm	Có\r\nRadio	Không\r\nXem phim	3GP, MP4, AVI, WMV\r\nNghe nhạc	Lossless, MP3, WAV, WMA\r\nThông tin khác\r\nThời điểm ra mắt	3/2017', 1, 1, 'Cái', 7000000, 'images/Product/iphone6.png'),
(2, 'Galaxy S8', 'Màn hình\r\nCông nghệ màn hình	Super AMOLED\r\nĐộ phân giải	2K+ (1440 x 2960 Pixels)\r\nMàn hình rộng	5.8\"\r\nMặt kính cảm ứng	Corning Gorilla Glass 5\r\nCamera sau\r\nĐộ phân giải	12 MP\r\nQuay phim	Quay phim 4K 2160p@30fps\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	Ảnh Raw, Chống rung kỹ thuật số (EIS), Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Chế độ chụp chuyên nghiệp\r\nCamera trước\r\nĐộ phân giải	8 MP\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng\r\nThông tin khác	Tự động lấy nét, Quay video Full HD, Chế độ làm đẹp, Selfie ngược sáng HDR, Nhận diện khuôn mặt, Chụp bằng giọng nói, Selfie bằng cử chỉ\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 7.0 (Nougat)\r\nChipset (hãng SX CPU)	Exynos 8895 8 nhân 64-bit\r\nTốc độ CPU	4 nhân 2.3 GHz và 4 nhân 1.7 GHz\r\nChip đồ họa (GPU)	Mali™ G71\r\nBộ nhớ & Lưu trữ\r\nRAM	4 GB\r\nBộ nhớ trong	64 GB\r\nBộ nhớ còn lại (khả dụng)	52.3 GB\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 256 GB\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 9\r\nSIM	2 SIM Nano (SIM 2 chung khe thẻ nhớ)\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	EDR, apt-X, A2DP, LE, v5.0\r\nCổng kết nối/sạc	USB Type-C\r\nJack tai nghe	3.5 mm\r\nKết nối khác	OTG, Miracast\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Khung kim loại + mặt kính cường lực\r\nKích thước	Dài 148.9 mm - Ngang 68.1 mm - Dày 8 mm\r\nTrọng lượng	155 g\r\nThông tin pin & Sạc\r\nDung lượng pin	3000 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Tiết kiệm pin, Sạc pin nhanh\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay, Quét mống mắt\r\nTính năng đặc biệt	Chuẩn Kháng nước, Chuẩn kháng bụi\r\nMặt kính 2.5D\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Không\r\nXem phim	H.265, 3GP, MP4, AVI, WMV, H.263, H.264(MPEG4-AVC), DivX, WMV9, Xvid\r\nNghe nhạc	Lossless, Midi, MP3, WAV, WMA, AAC++, OGG, AC3, FLAC\r\nThông tin khác\r\nThời điểm ra mắt	4/2017', 2, 1, 'Cái', 8000000, 'images/Product/galaxys8.jpeg'),
(3, 'Xperia XZ1', 'Màn hình\r\nCông nghệ màn hình	IPS HDR LCD\r\nĐộ phân giải	Full HD (1080 x 1920 Pixels)\r\nMàn hình rộng	5.2\"\r\nMặt kính cảm ứng	Corning Gorilla Glass 5\r\nCamera sau\r\nĐộ phân giải	19 MP\r\nQuay phim	Quay phim siêu chậm 960 fps, Quay phim 4K 2160p@30fps\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	Chống rung kỹ thuật số (EIS), Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama\r\nCamera trước\r\nĐộ phân giải	13 MP\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng\r\nThông tin khác	Quay video Full HD, Chế độ làm đẹp, Camera góc rộng, Nhận diện khuôn mặt\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 8.0 (Oreo)\r\nChipset (hãng SX CPU)	Qualcomm Snapdragon 835 8 nhân 64-bit\r\nTốc độ CPU	4 nhân 2.45 GHz Kryo & 4 nhân 1.9 GHz Kryo\r\nChip đồ họa (GPU)	Adreno 540\r\nBộ nhớ & Lưu trữ\r\nRAM	4 GB\r\nBộ nhớ trong	64 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 53 GB\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 256 GB\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 16\r\nSIM	2 Nano SIM\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	apt-X, EDR, A2DP, LE, v5.0\r\nCổng kết nối/sạc	USB Type-C\r\nJack tai nghe	3.5 mm\r\nKết nối khác	NFC, OTG\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Kim loại\r\nKích thước	Dài 148 mm - Ngang 73.4 mm - Dày 7.4 mm\r\nTrọng lượng	155 g\r\nThông tin pin & Sạc\r\nDung lượng pin	2700 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Siêu tiết kiệm pin, Sạc nhanh Quick Charge 3.0\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay\r\nTính năng đặc biệt	Chuẩn Kháng nước, Chuẩn kháng bụi\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Không\r\nXem phim	H.265, 3GP, MP4, AVI, WMV, H.263, H.264(MPEG4-AVC), DivX\r\nNghe nhạc	Lossless, Midi, MP3, WAV, WMA9, WMA, AAC, AAC+, AAC++\r\nThông tin khác\r\nThời điểm ra mắt	08/2017', 3, 1, 'Cái', 1000000, 'images/Product/xperiaxz1.jpeg\r\n'),
(4, 'Iphone X', 'Màn hình\r\nCông nghệ màn hình	OLED\r\nĐộ phân giải	1125 x 2436 Pixels\r\nMàn hình rộng	5.8\"\r\nMặt kính cảm ứng	Kính oleophobic (ion cường lực)\r\nCamera sau\r\nĐộ phân giải	2 camera 12 MP\r\nQuay phim	Quay phim 4K 2160p@60fps\r\nĐèn Flash	4 đèn LED (2 tông màu)\r\nChụp ảnh nâng cao	Chụp ảnh xóa phông, Lấy nét dự đoán, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)\r\nCamera trước\r\nĐộ phân giải	7 MP\r\nVideocall	Có\r\nThông tin khác	Selfie ngược sáng HDR, Quay video Full HD, Nhận diện khuôn mặt, Camera góc rộng\r\nHệ điều hành - CPU\r\nHệ điều hành	iOS 11\r\nChipset (hãng SX CPU)	Apple A11 Bionic 6 nhân\r\nTốc độ CPU	2.39 GHz\r\nChip đồ họa (GPU)	Apple GPU 3 nhân\r\nBộ nhớ & Lưu trữ\r\nRAM	3 GB\r\nBộ nhớ trong	64 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 55 GB\r\nThẻ nhớ ngoài	Không\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 16\r\nSIM	1 Nano SIM\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	EDR, LE, A2DP, v5.0\r\nCổng kết nối/sạc	Lightning\r\nJack tai nghe	Không\r\nKết nối khác	NFC, OTG\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Khung kim loại + mặt kính cường lực\r\nKích thước	Dài 143.6 mm - Ngang 70.9 mm - Dày 7.7 mm\r\nTrọng lượng	174 g\r\nThông tin pin & Sạc\r\nDung lượng pin	2716 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây\r\nTiện ích\r\nBảo mật nâng cao	Nhận diện khuôn mặt Face ID\r\nTính năng đặc biệt	3D Touch\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Không\r\nXem phim	H.265, 3GP, MP4, AVI, WMV, H.263, H.264(MPEG4-AVC)\r\nNghe nhạc	Lossless, Midi, MP3, WAV, WMA, WMA9, AAC, AAC+, AAC++, eAAC+\r\nThông tin khác\r\nThời điểm ra mắt	09/2017', 1, 1, 'Cái', 20000000, 'images/Product/iphonex.jpg'),
(5, 'Iphone 7', 'Màn hình\r\nCông nghệ màn hình	LED-backlit IPS LCD\r\nĐộ phân giải	Full HD (1080 x 1920 Pixels)\r\nMàn hình rộng	5.5\"\r\nMặt kính cảm ứng	Kính oleophobic (ion cường lực)\r\nCamera sau\r\nĐộ phân giải	2 camera 12 MP\r\nQuay phim	Quay phim 4K 2160p@30fps\r\nĐèn Flash	4 đèn LED (2 tông màu)\r\nChụp ảnh nâng cao	Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS)\r\nCamera trước\r\nĐộ phân giải	7 MP\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng\r\nThông tin khác	Selfie ngược sáng HDR, Tự động lấy nét, Quay video Full HD, Retina Flash, Nhận diện khuôn mặt\r\nHệ điều hành - CPU\r\nHệ điều hành	iOS 11\r\nChipset (hãng SX CPU)	Apple A10 Fusion 4 nhân 64-bit\r\nTốc độ CPU	2.3 GHz\r\nChip đồ họa (GPU)	Chip đồ họa 6 nhân\r\nBộ nhớ & Lưu trữ\r\nRAM	3 GB\r\nBộ nhớ trong	32 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 28 GB\r\nThẻ nhớ ngoài	Không\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 9\r\nSIM	1 Nano SIM\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	A2DP, LE, v4.2\r\nCổng kết nối/sạc	Lightning\r\nJack tai nghe	Không\r\nKết nối khác	NFC, Air Play, OTG, HDMI\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối, mặt kính cong 2.5D\r\nChất liệu	Hợp kim Nhôm + Magie\r\nKích thước	Dài 158.2 mm - Ngang 77.9 mm - Dày 7.3 mm\r\nTrọng lượng	188 g\r\nThông tin pin & Sạc\r\nDung lượng pin	2900 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Tiết kiệm pin\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay\r\nTính năng đặc biệt	3D Touch\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Không\r\nXem phim	H.265, 3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), DivX, WMV9, Xvid\r\nNghe nhạc	Midi, Lossless, MP3, WAV, WMA, AAC, eAAC+\r\nThông tin khác\r\nThời điểm ra mắt	11/2016', 1, 1, 'Cái', 8000000, 'images/Product/iphone7.jpeg'),
(6, 'Galaxy Note 8', 'Màn hình\r\nCông nghệ màn hình	Super AMOLED\r\nĐộ phân giải	2K+ (1440 x 2960 Pixels)\r\nMàn hình rộng	6.3\"\r\nMặt kính cảm ứng	Corning Gorilla Glass 5\r\nCamera sau\r\nĐộ phân giải	2 camera 12 MP\r\nQuay phim	Quay phim 4K 2160p@30fps\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	Zoom quang học (Camera kép), Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Chế độ chụp chuyên nghiệp\r\nCamera trước\r\nĐộ phân giải	8 MP\r\nVideocall	Có\r\nThông tin khác	Selfie ngược sáng HDR, Camera góc rộng, Chế độ làm đẹp, Nhận diện khuôn mặt, Selfie bằng cử chỉ, Chụp bằng giọng nói\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 7.1 (Nougat)\r\nChipset (hãng SX CPU)	Exynos 8895 8 nhân 64-bit\r\nTốc độ CPU	4 nhân 2.3 GHz và 4 nhân 1.7 GHz\r\nChip đồ họa (GPU)	Mali-G71 MP20\r\nBộ nhớ & Lưu trữ\r\nRAM	6 GB\r\nBộ nhớ trong	64 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 50 GB\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 256 GB\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 16\r\nSIM	2 Nano SIM\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, DLNA, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	apt-X, A2DP, LE, EDR, v5.0\r\nCổng kết nối/sạc	USB Type-C\r\nJack tai nghe	3.5 mm\r\nKết nối khác	NFC, Kết nối nhanh™, OTG, Miracast\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Khung kim loại + mặt kính cường lực\r\nKích thước	Dài 162,5 mm - Ngang 74,8 mm - Dày 8,6 mm\r\nTrọng lượng	195 g\r\nThông tin pin & Sạc\r\nDung lượng pin	3300 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Siêu tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay, Mở khóa bằng khuôn mặt, Quét mống mắt\r\nTính năng đặc biệt	Chuẩn Kháng nước, Chuẩn kháng bụi\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Không\r\nXem phim	H.265, 3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), DivX, WMV9, Xvid\r\nNghe nhạc	Lossless, Midi, MP3, WAV, WMA, AAC++, eAAC+, OGG, AC3, FLAC\r\nThông tin khác\r\nThời điểm ra mắt	08/2017\r\n', 2, 1, 'Cái', 20000000, 'images/Product/note8.jpeg'),
(7, 'Galaxy Tab A2', 'Camera sau	8MP\r\nCảm ứng	Đa điểm\r\nKhối lượng	364g\r\nCamera trước	5MP\r\nMàu màn hình	16 triệu màu\r\nDung lượng pin	5000mAh\r\nKích thước màn hình	8inches\r\nHỗ trợ thẻ nhớ	256GB\r\nModel	T385\r\nNguồn gốc	Hàng chính hãng\r\nChipset	Qualcomm MSM8917 Snapdragon 425\r\nLoại màn hình	IPS LCD\r\nBộ nhớ trong	16GB\r\nKết nối	4G LTE, 3G, 2G, Wi-Fi 802.11 a/b/g/n, dual-band, WiFi Direct, hotspot, Bluetooth v4.2, GPS\r\nTốc độ CPU	1.4GHz\r\nKích thước	212.1 x 124.1 x 8.9 mm\r\nHệ điều hành	Android 7.0 (Nougat)\r\nThời hạn bảo hành	12tháng\r\nBộ vi xử lý	Quad-core 1.4 GHz Cortex-A53\r\nRAM	2GB\r\nĐộ phân giải màn hình	800 x 1280 pixels\r\nLoại pin	Li-ion\r\nQuay phim	1080p@30fps\r\nJack âm thanh	3.5mm\r\nChip đồ họa	Adreno 308\r\nLoại SIM	Nano SIM\r\nSố khe SIM	1', 2, 2, 'Cái', 5000000, 'images/Product/A2.jpg'),
(8, 'Galaxy Tab 4', 'Bộ vi xử lý\r\nTốc độ CPU\r\n1.2GHz\r\nLoại CPU\r\n4 nhân\r\nHiển Thị\r\nKích cỡ (Màn hình chính)\r\n7.0\" (177.7mm)\r\nĐộ phân giải (Màn hình chính)\r\n1280 x 800 (WXGA)\r\nCông nghệ màn hình (màn hình chính)\r\nTFT\r\nĐộ sâu màu sắc (Màn hình chính)\r\n16M\r\nHỗ trợ S Pen\r\nKhông\r\nCamera\r\nCamera chính - Độ phân giải\r\nCMOS 3.0 MP\r\nCamera chính - Tự động lấy nét\r\nKhông\r\nCamera trước - Độ phân giải\r\nCMOS 1.3 MP\r\nCamera chính - Flash\r\nKhông\r\nBộ nhớ\r\nRAM (GB)\r\n1.5 GB\r\nROM (GB)\r\n8\r\nBộ nhớ khả dụng (GB) *\r\n4.49 GB\r\nHỗ trợ thẻ nhớ ngoài\r\nMicroSD (lên đến 32GB)\r\nMạng hỗ trợ\r\nKích thước SIM\r\nSIM Micro (3FF)\r\nInfra\r\n2G GSM, 3G WCDMA\r\n2G GSM\r\nGSM850, GSM900, DCS1800, PCS1900\r\n3G UMTS\r\nB1(2100), B2(1900), B5(850), B8(900)\r\nKết Nối\r\nANT+\r\nKhông\r\nPhiên bản USB\r\nUSB 2.0\r\nCông nghệ định vị\r\nGPS, Glonass\r\nEarjack\r\n3.5mm Stereo\r\nWi-Fi\r\n802.11 a/b/g/n 2.4+5GHz\r\nWi-Fi Direct\r\nOK\r\nHỗ trợ DLNA\r\nKhông\r\nPhiên bản Bluetooth\r\nBluetooth v4.0\r\nNFC\r\nKhông\r\nHồ sơ Bluetooth\r\nDI, MAP, PBAP, HOGP, PAN, A2DP, AVRCP, HFP, HSP, OPP, SAP, HID\r\nPC Sync.\r\nKIES\r\nHệ điều hành\r\nAndroid\r\nThông tin chung\r\nMàu sắc\r\nĐEN EBONY / TRẮNG\r\nHình dạng thiết bị\r\nTablet\r\nCảm biến\r\nGia tốc\r\nĐặc điểm kỹ thuật\r\nKích thước (HxWxD, mm)\r\n186.9 x 107.9 x 9\r\nTrọng lượng (g)\r\n281\r\nPin\r\nThời gian sử dụng Internet (3G) (Hours)\r\nLên tới 9\r\nThời gian sử dụng Internet (Wi-Fi) (Giờ)\r\nLên tới 11\r\nThời gian phát lại Video (Giờ)\r\nLên tới 10\r\nDung lượng pin tiêu chuẩn (mAh)\r\n4000\r\nThời gian phát Audio (Giờ)\r\nLên tới 127\r\nThời gian thoại (3G WCDMA) (Giờ)\r\nLên tới 22\r\nÂm thanh và Video\r\nĐịnh Dạng Phát Video\r\nFLV, M4V, MKV, MP4, WEBM, WMV, 3G2, 3GP, ASF, AVI\r\nĐịnh Dạng Phát Âm thanh\r\n3GA, AWB, FLAC, MID, MXMF, OGA, OTA, RTX, RTTTL, XMF, AAC, AMR, IMY, M4A, MIDI, MP3, OGG, WAV, WMA\r\nDịch vụ và Ứng dụng\r\nỨng dụng Gear Manager\r\nCó\r\nS-Voice\r\nOK\r\nMobile TV\r\nKhông', 2, 2, 'Cái', 6000000, 'images/Product/tab4.jpeg'),
(9, 'Galaxy Tab A', 'hông số kỹ thuật chi tiết\r\nChụp hình & Quay phim\r\nCamera trước :	5.0 MP\r\nCamera sau :	8.0 MP\r\nCấu hình phần cứng\r\nLoại CPU (Chipset) :	Qualcomm Snapdragon 425\r\nSố nhân :	4 Nhân\r\nRAM :	2 GB\r\nTốc độ CPU :	1.4 GHz\r\nThiết kế & Trọng lượng\r\nTrọng lượng :	364 g\r\nPin & Dung lượng\r\nDung lượng pin :	5000 mAh\r\nBộ nhớ & Lưu trữ\r\nHỗ trợ thẻ nhớ tối đa :	256GB\r\nThẻ nhớ ngoài :	Micro SD\r\nROM :	16 GB\r\nMàn hình\r\nKích thước màn hình :	8.0 inch\r\nĐộ phân giải :	1280 x 800 pixels\r\nCông nghệ màn hình :	TFT', 2, 2, 'Cái', 5000000, 'images/Product/tabA.jpg'),
(10, 'Ipad Pro 10.5 inch', 'Màn hình\r\nCông nghệ màn hình	IPS LCD\r\nĐộ phân giải	2224 x 1668 pixels\r\nKích thước màn hình	10.5\"\r\nChụp ảnh & Quay phim\r\nCamera sau	12 MP\r\nQuay phim	Ultra HD@30fps\r\nTính năng camera	F/1.8, Chống rung OIS, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, Nhận diện nụ cười, HDR, Panorama\r\nCamera trước	7 MP\r\nCấu hình\r\nHệ điều hành	iOS 11\r\nLoại CPU (Chipset)	Apple A10X 6 nhân 64-bit\r\nTốc độ CPU	Hãng không công bố\r\nChip đồ hoạ (GPU)	Power VR\r\nRAM	4 GB\r\nBộ nhớ trong (ROM)	64 GB\r\nBộ nhớ khả dụng	Khoảng 59.5 GB\r\nThẻ nhớ ngoài	Không\r\nHỗ trợ thẻ tối đa	Không\r\nCảm biến	Tiệm cận, La bàn, Con quay hồi chuyển 3 chiều, Khí áp kế, Gia tốc, Ánh sáng, Fingerprint Sensor\r\nKết nối\r\nSố khe SIM	Không\r\nLoại SIM	Không\r\nThực hiện cuộc gọi	FaceTime\r\nHỗ trợ 3G	Không 3G\r\nHỗ trợ 4G	Không hỗ trợ 4G\r\nWiFi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot\r\nBluetooth	A2DP, 4.2\r\nGPS	Không\r\nCổng kết nối/sạc	Lightning\r\nJack tai nghe	3.5 mm\r\nHỗ trợ OTG	Không\r\nKết nối khác	Không\r\nChức năng khác\r\nGhi âm	Không\r\nRadio	Không\r\nTính năng đặc biệt	4 stereo speakers, Mở khóa bằng vân tay\r\nThiết kế & Trọng lượng\r\nChất liệu	Nhôm nguyên khối\r\nKích thước	Dài 250.6 mm - Ngang 174.1 mm - Dày 6.1 mm\r\nTrọng lượng	469 g\r\nPin & Dung lượng\r\nLoại pin	Lithium - Polymer\r\nMức năng lượng tiêu thụ	30.4 Wh', 1, 2, 'Cái', 15000000, 'images/Product/ipad pro 10.5.jpg'),
(11, 'Macbook Air 2015', 'macbook air 2015Bộ xử lý\r\nCông nghệ CPU	\r\nLoại CPU	5250U\r\nTốc độ CPU	1.60 GHz\r\nTốc độ tối đa	Turbo Boost 2.7 GHz\r\nTốc độ Bus	1600 MHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM	4 GB\r\nLoại RAM	DDR3L(On board)\r\nTốc độ Bus RAM	1600 MHz\r\nHỗ trợ RAM tối đa	Không hỗ trợ nâng cấp\r\nỔ cứng	\r\nMàn hình\r\nKích thước màn hình	11.6 inch\r\nĐộ phân giải	HD (1366 x 768)\r\nCông nghệ màn hình	LED Backlit\r\nMàn hình cảm ứng	Không\r\nĐồ họa và Âm thanh\r\nThiết kế card	Card đồ họa tích hợp\r\nCard đồ họa	Intel HD Graphics 6000\r\nCông nghệ âm thanh	Combo Microphone & Headphone\r\nCổng kết nối & tính năng mở rộng\r\nCổng giao tiếp	MagSafe 2, 2 x USB 3.0, Thunderbolt 2\r\nKết nối không dây	Bluetooth v4.0\r\nKhe đọc thẻ nhớ	\r\nỔ đĩa quang	Không\r\nWebcam	HD webcam\r\nĐèn bàn phím	\r\nTính năng khác	Micro kép\r\nPIN\r\nLoại PIN	\r\nThông tin Pin	Lithium- polymer\r\nHệ điều hành\r\nHệ điều hành	\r\nKích thước & trọng lượng\r\nKích thước	Dài 300 mm - Ngang 192 mm - Dày 17 mm\r\nTrọng lượng	1.08\r\nChất liệu	Vỏ kim loại nguyên khối', 1, 3, 'Cái', 23000000, 'images/Product/air2015.jpeg'),
(12, 'Macbook Air 2018', 'Thương hiệu	Apple\r\nKích thước	(D x R x C) 32.5 x 22.7 x 1.7 cm\r\nModel	MQD42\r\nSKU	5301719379421\r\nMàu/Mẫu	Bạc\r\nPhụ kiện đi kèm	Pin, Cáp sạc\r\nLoại lõi chip	Intel Core i5\r\nTốc độ chip (GHz)	1,8\r\nHệ điều hành	macOS Sierra\r\nKích thước màn hình	13.3 inch\r\nĐộ phân giải màn hình	1440 x 900 pixels\r\nLoại / Công nghệ màn hình	LED Backlight\r\nCard đồ họa	Intel HD Graphics 6000\r\nBộ nhớ đồ họa	2GB\r\nDung lượng ổ cứng	256GB\r\nLoại ổ đĩa	SSD\r\nBộ nhớ RAM	8GB\r\nChuẩn bộ nhớ RAM	LPDDR3\r\nBus	1600MHz\r\nCamera	Có\r\nCông nghệ âm thanh	Stereo speakers, Dual microphone, cổng Headphone\r\nỔ đĩa quang	Không\r\nCổng kết nối	2 cổng USB 3.0, Thunderbolt 2, SDXC card, 1 jack headphone 3.5mm\r\nCard Reader	3 in 1\r\nCổng internet (LAN)	Không\r\nWifi	802.11b/g/n\r\nBluetooth	v4.0\r\nKết nối không dây khác	Không\r\nLoại pin	Lithium Polymer\r\nThời gian pin	54 WHr', 1, 3, 'Cái', 30000000, 'images/Product/air2018.jpeg'),
(13, 'Macbook Pro 2015', 'Bộ xử lý\r\nCông nghệ CPU	Intel Core i5 Broadwell\r\nLoại CPU	Hãng không công bố\r\nTốc độ CPU	2.70 GHz\r\nTốc độ tối đa	Turbo Boost 3.1GHz\r\nTốc độ Bus	1866 MHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM	8 GB\r\nLoại RAM	DDR3L(On board)\r\nTốc độ Bus RAM	1866 MHz\r\nHỗ trợ RAM tối đa	Không hỗ trợ nâng cấp\r\nỔ cứng	SSD: 128 GB\r\nMàn hình\r\nKích thước màn hình	13.3 inch\r\nĐộ phân giải	Retina (2560 x 1600)\r\nCông nghệ màn hình	LED Backlit\r\nMàn hình cảm ứng	Không\r\nĐồ họa và Âm thanh\r\nThiết kế card	Card đồ họa tích hợp\r\nCard đồ họa	Intel HD Graphics 6100\r\nCông nghệ âm thanh	Combo Microphone & Headphone\r\nCổng kết nối & tính năng mở rộng\r\nCổng giao tiếp	MagSafe 2, 2 x USB 3.0, HDMI, 2 x Thunderbolt 2\r\nKết nối không dây	Bluetooth v4.0, Wi-Fi 802.11 a/b/g/n\r\nKhe đọc thẻ nhớ	SDXC\r\nỔ đĩa quang	Không\r\nWebcam	1.3 MP, HD webcam\r\nĐèn bàn phím	Có\r\nTính năng khác	Micro kép\r\nPIN\r\nLoại PIN	PIN liền\r\nThông tin Pin	Khoảng 10 tiếng\r\nHệ điều hành\r\nHệ điều hành	Mac OS\r\nKích thước & trọng lượng\r\nKích thước	Dài 314 mm - Ngang 219 mm - Dày 18 mm\r\nTrọng lượng	1.58 kg\r\nChất liệu	Vỏ kim loại nguyên khối', 1, 3, 'Cái', 40000000, 'images/Product/macbookpro2015.jpeg'),
(14, 'HP Pavilion 14', 'Hp Pavilion 14Bộ xử lý\r\nCông nghệ CPU	Intel Core i3 Kabylake Refresh\r\nLoại CPU	8130U\r\nTốc độ CPU	2.20 GHz\r\nTốc độ tối đa	Turbo Boost 3.4 GHz\r\nTốc độ Bus	2400 MHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM	4 GB\r\nLoại RAM	DDR4 (1 khe)\r\nTốc độ Bus RAM	2400 MHz\r\nHỗ trợ RAM tối đa	8 GB\r\nỔ cứng	HDD: 1 TB SATA3\r\nMàn hình\r\nKích thước màn hình	14 inch\r\nĐộ phân giải	Full HD (1920 x 1080)\r\nCông nghệ màn hình	Viền màn hình mỏng, WLED, LED Backlit\r\nMàn hình cảm ứng	Không\r\nĐồ họa và Âm thanh\r\nThiết kế card	Card đồ họa tích hợp\r\nCard đồ họa	Intel® HD Graphics 620\r\nCông nghệ âm thanh	Loa kép (2 kênh), Bang & Olufsen audio, HP Audio Boost, Combo Microphone & Headphone\r\nCổng kết nối & tính năng mở rộng\r\nCổng giao tiếp	2 x USB 3.1, HDMI, LAN (RJ45), USB Type-C\r\nKết nối không dây	Wi-Fi 802.11 a/b/g/n, Bluetooth v4.0\r\nKhe đọc thẻ nhớ	SD, SDHC, SDXC\r\nỔ đĩa quang	Không\r\nWebcam	1 MP, HP TrueVision Webcam\r\nĐèn bàn phím	Không\r\nTính năng khác	Multi TouchPad\r\nPIN\r\nLoại PIN	PIN liền\r\nThông tin Pin	Li-Ion 3 cell\r\nHệ điều hành\r\nHệ điều hành	Windows 10 Home SL\r\nKích thước & trọng lượng\r\nKích thước	Dài 320.68 mm - Rộng 220.17 mm - Dày 17.79 mm\r\nTrọng lượng	1.59 kg\r\nChất liệu	Vỏ nhựa', 4, 3, 'Cái', 13000000, 'images/Product/HP Pavilion 14.jpg'),
(15, 'Dell Vostro 3468', 'Bộ xử lý\r\nCông nghệ CPU	Intel Core i5 Kabylake\r\nLoại CPU	7200U\r\nTốc độ CPU	2.50 GHz\r\nTốc độ tối đa	Turbo Boost 3.1GHz\r\nTốc độ Bus	2133 MHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM	4 GB\r\nLoại RAM	DDR4 (2 khe)\r\nTốc độ Bus RAM	2400 MHz\r\nHỗ trợ RAM tối đa	16 GB\r\nỔ cứng	HDD: 1 TB\r\nMàn hình\r\nKích thước màn hình	14 inch\r\nĐộ phân giải	HD (1366 x 768)\r\nCông nghệ màn hình	TrueLife LED-Backlit Display\r\nMàn hình cảm ứng	Không\r\nĐồ họa và Âm thanh\r\nThiết kế card	Card đồ họa tích hợp\r\nCard đồ họa	Intel® HD Graphics 620\r\nCông nghệ âm thanh	Waves MaxxAudio, Loa kép (2 kênh), Combo Microphone & Headphone\r\nCổng kết nối & tính năng mở rộng\r\nCổng giao tiếp	2 x USB 3.0, HDMI, LAN (RJ45), USB 2.0, VGA (D-Sub)\r\nKết nối không dây	Bluetooth v4.0, Wi-Fi 802.11 a/b/g/n\r\nKhe đọc thẻ nhớ	SD, SDHC, SDXC\r\nỔ đĩa quang	Có (đọc, ghi dữ liệu)\r\nWebcam	1 MP, HD webcam\r\nĐèn bàn phím	Không\r\nTính năng khác	Fingerprint, Multi TouchPad\r\nPIN\r\nLoại PIN	PIN rời\r\nThông tin Pin	Li-Ion 4 cell\r\nHệ điều hành\r\nHệ điều hành	Windows 10 Home SL\r\nKích thước & trọng lượng\r\nKích thước	Dài 345 mm - Ngang 243 mm - Dày 23.35 mm\r\nTrọng lượng	1.96 kg\r\nChất liệu	Vỏ nhựa', 5, 3, 'Cái', 14000000, 'images/Product/Dell Vostro 3468.jpg'),
(16, 'Dell Inspiron 3578', 'Bộ xử lý\r\nCông nghệ CPU	Intel Core i5 Kabylake Refresh\r\nLoại CPU	8250U\r\nTốc độ CPU	1.60 GHz\r\nTốc độ tối đa	Turbo Boost 3.4 GHz\r\nTốc độ Bus	2400 MHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM	4 GB\r\nLoại RAM	DDR4 (2 khe)\r\nTốc độ Bus RAM	2400 MHz\r\nHỗ trợ RAM tối đa	16 GB\r\nỔ cứng	HDD: 1 TB\r\nMàn hình\r\nKích thước màn hình	15.6 inch\r\nĐộ phân giải	Full HD (1920 x 1080)\r\nCông nghệ màn hình	TrueLife LED-Backlit Display\r\nMàn hình cảm ứng	Không\r\nĐồ họa và Âm thanh\r\nThiết kế card	Card đồ họa tích hợp\r\nCard đồ họa	Intel® UHD Graphics 620\r\nCông nghệ âm thanh	Waves MaxxAudio, Combo Microphone & Headphone, Loa kép (2 kênh)\r\nCổng kết nối & tính năng mở rộng\r\nCổng giao tiếp	HDMI 1.4, 2 x USB 3.0, LAN (RJ45), USB 2.0\r\nKết nối không dây	Bluetooth 4.1, Wi-Fi 802.11 a/b/g/n/ac\r\nKhe đọc thẻ nhớ	SD\r\nỔ đĩa quang	Có (đọc, ghi dữ liệu)\r\nWebcam	HD webcam\r\nĐèn bàn phím	Không\r\nTính năng khác	Multi TouchPad\r\nPIN\r\nLoại PIN	PIN rời\r\nThông tin Pin	Li-Ion 4 cell\r\nHệ điều hành\r\nHệ điều hành	Windows 10 Home SL\r\nKích thước & trọng lượng\r\nKích thước	Dài 380 mm - Rộng 260.3 mm - Dày 23.65 mm\r\nTrọng lượng	2.3 Kg\r\nChất liệu	Vỏ nhựa', 5, 3, 'Cái', 15000000, 'images/Product/Dell Inspiron 3578.jpeg'),
(24, 'Galaxy Tab E 9.6', 'Màn hình\r\nCông nghệ màn hình	TFT\r\nĐộ phân giải	1280 x 800 pixels\r\nKích thước màn hình	9.6\"\r\nChụp ảnh & Quay phim\r\nCamera sau	5 MP\r\nQuay phim	HD 720p\r\nTính năng camera	Gắn thẻ địa lý, Tự động lấy nét\r\nCamera trước	2 MP\r\nCấu hình\r\nHệ điều hành	Android 4.4\r\nLoại CPU (Chipset)	Spreadtrum 4 nhân\r\nTốc độ CPU	1.3 GHz\r\nChip đồ hoạ (GPU)	Mali-400\r\nRAM	1.5 GB\r\nBộ nhớ trong (ROM)	8 GB\r\nBộ nhớ khả dụng	4.98 GB\r\nThẻ nhớ ngoài	Micro SD\r\nHỗ trợ thẻ tối đa	128 GB\r\nCảm biến	Con quay hồi chuyển 3 chiều, Gia tốc\r\nKết nối\r\nSố khe SIM	1 SIM\r\nLoại SIM	Micro sim\r\nThực hiện cuộc gọi	Có\r\nHỗ trợ 3G	Có 3G (tốc độ Download 21Mbps/42 Mbps; Upload 5.76 Mbps)\r\nHỗ trợ 4G	Không hỗ trợ 4G\r\nWiFi	Wi-Fi 802.11 b/g/n, Wi-Fi hotspot\r\nBluetooth	Có\r\nGPS	A-GPS, GLONASS\r\nCổng kết nối/sạc	Micro USB\r\nJack tai nghe	3.5 mm\r\nHỗ trợ OTG	Có\r\nKết nối khác	OTG\r\nChức năng khác\r\nGhi âm	Có\r\nRadio	Không\r\nTính năng đặc biệt	Không\r\nThiết kế & Trọng lượng\r\nChất liệu	Nhựa\r\nKích thước	Dài 241.9 mm - Ngang 149.5 mm - Dày 8.5 mm\r\nTrọng lượng	495 g\r\nPin & Dung lượng\r\nLoại pin	Lithium - Ion\r\nDung lượng pin	5000 mAh', 2, 2, 'cái', 4000000, 'images/Product/Galaxy Tab E 9.6.jpeg'),
(25, 'Galaxy Tab S4', 'Màn hình\r\nCông nghệ màn hình	Super AMOLED\r\nĐộ phân giải	2560 x 1600 pixels\r\nKích thước màn hình	10.5\"\r\nChụp ảnh & Quay phim\r\nCamera sau	13 MP\r\nQuay phim	Có quay phim\r\nTính năng camera	Đèn Flash\r\nCamera trước	8 MP\r\nCấu hình\r\nHệ điều hành	Android 8.0\r\nLoại CPU (Chipset)	Qualcomm MSM 8998\r\nTốc độ CPU	4 nhân 2.35GHz + 4 nhân 1.9GHz\r\nChip đồ hoạ (GPU)	Adreno 540\r\nRAM	4 GB\r\nBộ nhớ trong (ROM)	64 GB\r\nBộ nhớ khả dụng	Khoảng 48GB\r\nThẻ nhớ ngoài	Micro SD\r\nHỗ trợ thẻ tối đa	400 GB\r\nCảm biến	\r\nKết nối\r\nSố khe SIM	1 SIM\r\nLoại SIM	Nano Sim\r\nThực hiện cuộc gọi	Có\r\nHỗ trợ 3G	Có\r\nHỗ trợ 4G	Hỗ trợ 4G\r\nWiFi	Wi-Fi 802.11 a/b/g/n/ac, Wi-Fi Direct, Dual-band, Wi-Fi hotspot\r\nBluetooth	5.0\r\nGPS	A-GPS, GLONASS\r\nCổng kết nối/sạc	USB Type-C\r\nJack tai nghe	Đang cập nhật\r\nHỗ trợ OTG	Đang cập nhật\r\nKết nối khác	\r\nChức năng khác\r\nGhi âm	\r\nRadio	Đang cập nhật\r\nTính năng đặc biệt	Hỗ trợ bút Spen, 4 stereo speakers, Sạc pin nhanh\r\nThiết kế & Trọng lượng\r\nChất liệu	Kim loại\r\nKích thước	Dài 249.3 mm - Ngang 164.3 mm - Dày 7.1 mm\r\nTrọng lượng	482 g\r\nPin & Dung lượng\r\nLoại pin	Đang cập nhật\r\nDung lượng pin	7300 mAh', 2, 2, 'cái', 17990000, 'images/Product/Galaxy Tab S4.jpg'),
(26, 'Xiaomi Mi8 Pro', 'Màn hình\r\nCông nghệ màn hình	Super AMOLED\r\nĐộ phân giải	Full HD+ (1080 x 2248 Pixels)\r\nMàn hình rộng	6.21\"\r\nMặt kính cảm ứng	Corning Gorilla Glass 5\r\nCamera sau\r\nĐộ phân giải	2 camera 12 MP\r\nQuay phim	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@120fps, Quay phim 4K 2160p@30fps\r\nĐèn Flash	Đèn LED kép\r\nChụp ảnh nâng cao	Chụp ảnh xóa phông, Chế độ Slow Motion, A.I Camera, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Beautify\r\nCamera trước\r\nĐộ phân giải	20 MP\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng\r\nThông tin khác	Sticker AR (biểu tượng thực tế ảo), Quay video HD, Nhận diện khuôn mặt, Chế độ làm đẹp, Quay video Full HD, Tự động lấy nét, Camera góc rộng, Selfie ngược sáng HDR, Chụp ảnh xoá phông, Công nghệ Selfie A.I Beauty\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 8.1 (Oreo)\r\nChipset (hãng SX CPU)	Snapdragon 845 8 nhân\r\nTốc độ CPU	4 nhân 2.8 GHz Kryo & 4 nhân 1.8 GHz Kryo\r\nChip đồ họa (GPU)	Adreno 630\r\nBộ nhớ & Lưu trữ\r\nRAM	8 GB\r\nBộ nhớ trong	128 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 116 GB\r\nThẻ nhớ ngoài	Không\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 16\r\nSIM	2 Nano SIM\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	A2DP, LE, v5.0\r\nCổng kết nối/sạc	USB Type-C\r\nJack tai nghe	Không\r\nKết nối khác	NFC, OTG\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Khung kim loại + mặt kính cường lực\r\nKích thước	Dài 154.9 mm - Ngang 74.8 mm - Dày 7.6 mm\r\nTrọng lượng	177 g\r\nThông tin pin & Sạc\r\nDung lượng pin	3000 mAh\r\nLoại pin	Pin chuẩn Li-Po\r\nCông nghệ pin	Tiết kiệm pin, Siêu tiết kiệm pin, Sạc nhanh Quick Charge 4.0\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng khuôn mặt, Mở khoá vân tay dưới màn hình\r\nTính năng đặc biệt	Màn hình luôn hiển thị AOD, Nhân bản ứng dụng, Đèn pin, Chạm 2 lần sáng màn hình, Chặn cuộc gọi, Báo rung khi kết nối cuộc gọi, Sạc pin nhanh, Mặt kính 2.5D, Nhắc thời gian gọi, Đa cửa sổ (chia đôi màn hình), Không gian thứ hai, Khoá ứng dụng, Ghi âm cuộc gọi\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Không\r\nXem phim	3GP, MP4, AVI, WMV, DivX, Xvid\r\nNghe nhạc	Midi, MP3, WAV, WMA, AAC, OGG, FLAC\r\nThông tin khác\r\nThời điểm ra mắt	11/2018', 7, 1, 'cái', 15000000, 'images/Product/xiaomi-mi-8-pro.jpg'),
(27, 'Xiaomi Mi A2', 'Màn hình\r\nCông nghệ màn hình	IPS LCD\r\nĐộ phân giải	Full HD+ (1080 x 2160 Pixels)\r\nMàn hình rộng	5.99\"\r\nMặt kính cảm ứng	Mặt kính cong 2.5D\r\nCamera sau\r\nĐộ phân giải	20 MP và 12 MP (2 camera)\r\nQuay phim	Quay phim FullHD 1080p@30fps, Quay phim 4K 2160p@30fps\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	A.I Camera, Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Beautify\r\nCamera trước\r\nĐộ phân giải	20 MP\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng\r\nThông tin khác	Nhận diện khuôn mặt, Công nghệ Selfie A.I Beauty, Selfie ngược sáng HDR, Đèn Flash trợ sáng, Tự động lấy nét, Quay video Full HD, Chế độ làm đẹp\r\nHệ điều hành - CPU\r\nHệ điều hành	Android One\r\nChipset (hãng SX CPU)	Qualcomm Snapdragon 660 8 nhân\r\nTốc độ CPU	2.2 GHz\r\nChip đồ họa (GPU)	Adreno 512\r\nBộ nhớ & Lưu trữ\r\nRAM	4 GB\r\nBộ nhớ trong	64 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 50 GB\r\nThẻ nhớ ngoài	Không\r\nKết nối\r\nMạng di động	Hỗ trợ 4G\r\nSIM	2 Nano SIM\r\nWifi	Wi-Fi 802.11 b/g/n, Dual-band, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	BDS, A-GPS, GLONASS\r\nBluetooth	LE, A2DP, v5.0\r\nCổng kết nối/sạc	USB Type-C\r\nJack tai nghe	Không\r\nKết nối khác	Hồng Ngoại\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Kim loại\r\nKích thước	Dài 158.7 mm - Ngang 75.4 mm - 7.3 mm\r\nTrọng lượng	168 g\r\nThông tin pin & Sạc\r\nDung lượng pin	3010 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Tiết kiệm pin, Sạc nhanh Quick Charge 3.0\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay, Mở khóa bằng khuôn mặt\r\nTính năng đặc biệt	Sạc pin nhanh\r\nMặt kính 2.5D\r\nGhi âm	Có\r\nRadio	Có\r\nXem phim	3GP, MP4, WMV, H.263, H.264(MPEG4-AVC), DivX, Xvid\r\nNghe nhạc	AMR, MP3, WAV, AAC, FLAC\r\nThông tin khác\r\nThời điểm ra mắt	08/2018', 7, 1, 'cái', 6690000, 'images/Product/Xiaomi Mi A2.jpg'),
(28, 'Xiaomi Mi 8 Lite', 'Màn hình\r\nCông nghệ màn hình	IPS LCD\r\nĐộ phân giải	Full HD+ (1080 x 2280 Pixels)\r\nMàn hình rộng	6.26\"\r\nMặt kính cảm ứng	Kính cường lực\r\nCamera sau\r\nĐộ phân giải	12 MP và 5 MP (2 camera)\r\nQuay phim	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim FullHD 1080p@120fps, Quay phim 4K 2160p@30fps\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	Chụp ảnh xóa phông, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Beautify\r\nCamera trước\r\nĐộ phân giải	24 MP\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng\r\nThông tin khác	Chế độ làm đẹp, Quay video Full HD, Tự động lấy nét, Nhận diện khuôn mặt\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 8.1 (Oreo)\r\nChipset (hãng SX CPU)	Qualcomm Snapdragon 660 8 nhân\r\nTốc độ CPU	4 nhân 2.2 GHz & 4 nhân 1.8 GHz\r\nChip đồ họa (GPU)	Adreno 512\r\nBộ nhớ & Lưu trữ\r\nRAM	6 GB\r\nBộ nhớ trong	128 GB\r\nBộ nhớ còn lại (khả dụng)	Đang cập nhật\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 128 GB\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 6\r\nSIM	2 SIM Nano (SIM 2 chung khe thẻ nhớ)\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	BDS, A-GPS, GLONASS\r\nBluetooth	LE, A2DP, v5.0\r\nCổng kết nối/sạc	USB Type-C\r\nJack tai nghe	Không\r\nKết nối khác	Không\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Khung kim loại + mặt kính cường lực\r\nKích thước	Dài 156.4 mm - Ngang 75.8 mm - Dày 7.5 mm\r\nTrọng lượng	169 g\r\nThông tin pin & Sạc\r\nDung lượng pin	3350 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Tiết kiệm pin, Siêu tiết kiệm pin, Sạc nhanh Quick Charge 3.0\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay, Mở khóa bằng khuôn mặt\r\nTính năng đặc biệt	Mặt kính 2.5D\r\nSạc pin nhanh\r\nĐèn pin\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Không\r\nXem phim	MP4, Xvid\r\nNghe nhạc	AMR, MP3, WAV, AAC, FLAC\r\nThông tin khác\r\nThời điểm ra mắt	10/2018', 7, 1, 'cái', 7490000, 'images/Product/Xiaomi Mi 8 Lite.jpeg'),
(29, 'Asus Vivobook S15 S530UA', 'Bộ xử lý\r\nCông nghệ CPU	Intel Core i5 Coffee Lake\r\nLoại CPU	8250U\r\nTốc độ CPU	1.60 GHz\r\nTốc độ tối đa	Turbo Boost 3.4 GHz\r\nTốc độ Bus	2400 MHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM	4 GB\r\nLoại RAM	DDR4 (2 khe)\r\nTốc độ Bus RAM	2400 MHz\r\nHỗ trợ RAM tối đa	16 GB\r\nỔ cứng	HDD: 1 TB, Hỗ trợ khe cắm SSD M.2 SATA3, Intel Optane 16GB\r\nMàn hình\r\nKích thước màn hình	15.6 inch\r\nĐộ phân giải	Full HD (1920 x 1080)\r\nCông nghệ màn hình	Màn hình chống chói, FHD (1920x1080)\r\nMàn hình cảm ứng	Không\r\nĐồ họa và Âm thanh\r\nThiết kế card	Card đồ họa tích hợp\r\nCard đồ họa	Intel® UHD Graphics 620\r\nCông nghệ âm thanh	SonicMaster audio\r\nCổng kết nối & tính năng mở rộng\r\nCổng giao tiếp	2 x USB 2.0, USB Type-C, USB 3.0\r\nKết nối không dây	Bluetooth 4.2\r\nKhe đọc thẻ nhớ	Micro SD\r\nỔ đĩa quang	Không\r\nWebcam	HD webcam\r\nĐèn bàn phím	Có\r\nTính năng khác	Bảo mật vân tay\r\nPIN\r\nLoại PIN	PIN liền\r\nThông tin Pin	Li-Ion 3 cell (4240mAh)\r\nHệ điều hành\r\nHệ điều hành	Windows 10 Home SL\r\nKích thước & trọng lượng\r\nKích thước	Dài 361mm - Rộng 243mm - Dày 18mm\r\nTrọng lượng	1.8kg kèm pin\r\nChất liệu	Vỏ kim loại', 8, 3, 'cái', 17390000, 'images/Product/Asus Vivobook S15 S530UA.jpg'),
(30, 'Asus VivoBook X507UF', 'Bộ xử lý\r\nCông nghệ CPU	Intel Core i5 Coffee Lake\r\nLoại CPU	8250U\r\nTốc độ CPU	1.60 GHz\r\nTốc độ tối đa	Turbo Boost 3.4 GHz\r\nTốc độ Bus	\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM	4 GB\r\nLoại RAM	DDR4 (2 khe)\r\nTốc độ Bus RAM	2400 MHz\r\nHỗ trợ RAM tối đa	16 GB\r\nỔ cứng	HDD: 1 TB SATA3\r\nMàn hình\r\nKích thước màn hình	15.6 inch\r\nĐộ phân giải	Full HD (1920 x 1080)\r\nCông nghệ màn hình	LED Backlight - AntiGlare\r\nMàn hình cảm ứng	Không\r\nĐồ họa và Âm thanh\r\nThiết kế card	Card đồ họa rời\r\nCard đồ họa	NVIDIA Geforce MX130, 2GB\r\nCông nghệ âm thanh	Realtek High Definition Audio\r\nCổng kết nối & tính năng mở rộng\r\nCổng giao tiếp	2 x USB 2.0, HDMI, USB 3.0\r\nKết nối không dây	Bluetooth v4.0\r\nKhe đọc thẻ nhớ	Micro SD\r\nỔ đĩa quang	Không\r\nWebcam	VGA Webcam\r\nĐèn bàn phím	Không\r\nTính năng khác	Bảo mật vân tay\r\nPIN\r\nLoại PIN	PIN liền\r\nThông tin Pin	Li-Ion 3 cell\r\nHệ điều hành\r\nHệ điều hành	Windows 10 Home SL\r\nKích thước & trọng lượng\r\nKích thước	Dài 365mm - Rộng 266mm - Dày 21.9mm\r\nTrọng lượng	1.8 kg\r\nChất liệu	Vỏ nhựa', 8, 3, 'cái', 14590000, 'images/Product/Asus VivoBook X507UF.jpg'),
(31, 'Asus ROG Strix Scar GL504GM', 'Bộ xử lý\r\nCông nghệ CPU	Intel Core i7 Coffee Lake\r\nLoại CPU	8750H\r\nTốc độ CPU	2.20 GHz\r\nTốc độ tối đa	Turbo Boost 4.1 GHz\r\nTốc độ Bus	2666 MHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM	16 GB\r\nLoại RAM	DDR4 (2 khe)\r\nTốc độ Bus RAM	2666 MHz\r\nHỗ trợ RAM tối đa	32 GB\r\nỔ cứng	HDD: 1 TB + SSD: 128GB, Hỗ trợ khe cắm SSD M.2 PCIe\r\nMàn hình\r\nKích thước màn hình	15.6 inch\r\nĐộ phân giải	Full HD (1920 x 1080)\r\nCông nghệ màn hình	Màn hình chống chói, Tấm nền IPS, 144Hz, LED Backlit, ASUS Splendid Video\r\nMàn hình cảm ứng	Không\r\nĐồ họa và Âm thanh\r\nThiết kế card	Card đồ họa rời\r\nCard đồ họa	NVIDIA GeForce GTX1060, 6GB\r\nCông nghệ âm thanh	Loa kép (2 kênh), Combo Microphone & Headphone\r\nCổng kết nối & tính năng mở rộng\r\nCổng giao tiếp	HDMI 2.0, 3 x USB 3.1, LAN (RJ45), Mini DisplayPort, USB Type-C\r\nKết nối không dây	Bluetooth v5.0, Wi-Fi 802.11 a/b/g/n/ac\r\nKhe đọc thẻ nhớ	SD\r\nỔ đĩa quang	Không\r\nWebcam	1 MP, HD webcam\r\nĐèn bàn phím	Có\r\nTính năng khác	Đèn bàn phím đổi màu, HyperCool Pro, Multi TouchPad\r\nPIN\r\nLoại PIN	PIN liền\r\nThông tin Pin	Li-Ion 4 cell\r\nHệ điều hành\r\nHệ điều hành	Windows 10 Home SL\r\nKích thước & trọng lượng\r\nKích thước	Dài 361 mm - Rộng 262 mm - Dày 26.1 mm\r\nTrọng lượng	2.4 kg\r\nChất liệu	Vỏ kim loại', 8, 3, 'cái', 45490000, 'images/Product/Asus ROG Strix Scar GL504GM.jpg'),
(32, 'Huawei Mate 20 Pro', 'Màn hình\r\nCông nghệ màn hình	OLED\r\nĐộ phân giải	2K+ (1440 x 3120 Pixels)\r\nMàn hình rộng	6.39\"\r\nMặt kính cảm ứng	Mặt kính cong 3D\r\nCamera sau\r\nĐộ phân giải	40 MP, 20 MP và 8 MP (3 camera)\r\nQuay phim	Quay phim FullHD 1080p@30fps, Quay phim FullHD 1080p@60fps, Quay phim 4K 2160p@30fps\r\nĐèn Flash	Đèn LED 2 tông màu\r\nChụp ảnh nâng cao	Lấy nét bằng laser, Chụp ảnh xóa phông, Chế độ Slow Motion, Chế độ Time-Lapse, Chế độ Light Painting, Chế độ chụp ban đêm (ánh sáng yếu), A.I Camera, Lấy nét theo pha, Điều chỉnh khẩu độ, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chống rung quang học (OIS), Beautify, Chế độ chụp chuyên nghiệp\r\nCamera trước\r\nĐộ phân giải	24 MP\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng\r\nThông tin khác	Quay video HD, Selfie bằng cử chỉ, Nhận diện khuôn mặt, Chế độ làm đẹp, Quay video Full HD, Tự động lấy nét, Selfie ngược sáng HDR, Sticker AR (biểu tượng thực tế ảo), Flash màn hình\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 9.0 (Pie)\r\nChipset (hãng SX CPU)	Hisilicon Kirin 980 8 nhân 64-bit\r\nTốc độ CPU	2 nhân 2.6 GHz Cortex A76 & 2 nhân 1.92 GHz Cortex A76 & 4 nhân 1.8 GHz Cortex A55\r\nChip đồ họa (GPU)	Mali-G76 MP10\r\nBộ nhớ & Lưu trữ\r\nRAM	6 GB\r\nBộ nhớ trong	128 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 112 GB\r\nThẻ nhớ ngoài	NM card, hỗ trợ tối đa 512 GB\r\nKết nối\r\nMạng di động	Hỗ trợ 4G\r\nSIM	2 SIM Nano (SIM 2 chung khe thẻ nhớ)\r\nWifi	Wi-Fi 802.11 a/b/g/n/ac, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	LE, A2DP, v5.0\r\nCổng kết nối/sạc	USB Type-C\r\nJack tai nghe	Không\r\nKết nối khác	NFC\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Khung kim loại + mặt lưng kính\r\nKích thước	Dài 157.8 mm - Ngang 72.3 mm - Dày 8.6 mm\r\nTrọng lượng	189 g\r\nThông tin pin & Sạc\r\nDung lượng pin	4200 mAh\r\nLoại pin	Pin chuẩn Li-Po\r\nCông nghệ pin	Tiết kiệm pin, Siêu tiết kiệm pin, Sạc pin nhanh, Sạc pin không dây\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng khuôn mặt, Mở khoá vân tay dưới màn hình\r\nTính năng đặc biệt	Chặn tin nhắn\r\nNhân bản ứng dụng\r\nThu nhỏ màn hình sử dụng một tay\r\nChặn cuộc gọi\r\nSạc pin nhanh\r\nĐèn pin\r\nSạc pin cho thiết bị khác\r\nChuẩn Kháng nước, Chuẩn kháng bụi\r\nDolby Audio™\r\nVẽ lên màn hình để mở nhanh ứng dụng\r\nMáy ảnh kép, ống kính Leica\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Không\r\nXem phim	3GP, MP4\r\nNghe nhạc	Midi, AMR, MP3, WAV, AAC, OGG, FLAC\r\nThông tin khác\r\nThời điểm ra mắt	10/2018', 9, 1, 'cái', 21990000, 'images/Product/Huawei Mate 20 Pro.jpeg'),
(33, 'Huawei Nova 3i', 'Màn hình\r\nCông nghệ màn hình	LTPS LCD\r\nĐộ phân giải	Full HD+ (1080 x 2340 Pixels)\r\nMàn hình rộng	6.3\"\r\nMặt kính cảm ứng	Mặt kính cong 2.5D\r\nCamera sau\r\nĐộ phân giải	16 MP và 2 MP (2 camera)\r\nQuay phim	Quay phim FullHD 1080p@60fps\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	Chụp ảnh xóa phông, Chế độ Time-Lapse, A.I Camera, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Beautify\r\nCamera trước\r\nĐộ phân giải	24 MP và 2 MP (2 camera)\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng\r\nThông tin khác	Nhận diện khuôn mặt, Chế độ làm đẹp, Quay video Full HD, Tự động lấy nét, Camera góc rộng, Công nghệ Selfie A.I Beauty, Camera kép\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 8.1 (Oreo)\r\nChipset (hãng SX CPU)	HiSilicon Kirin 710\r\nTốc độ CPU	4 nhân 2.2 GHz Cortex-A73 & 4 nhân 1.7 GHz Cortex-A53\r\nChip đồ họa (GPU)	Mali-G51 MP4\r\nBộ nhớ & Lưu trữ\r\nRAM	4 GB\r\nBộ nhớ trong	128 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 111 GB\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 256 GB\r\nKết nối\r\nMạng di động	Hỗ trợ 4G\r\nSIM	2 SIM Nano (SIM 2 chung khe thẻ nhớ)\r\nWifi	Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	apt-X, v4.2\r\nCổng kết nối/sạc	Micro USB\r\nJack tai nghe	3.5 mm\r\nKết nối khác	OTG\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Viền kim loại + mặt lưng kính\r\nKích thước	Dài 157.6 mm - Ngang 75.2 mm - Dày 7.6 mm\r\nTrọng lượng	169 g\r\nThông tin pin & Sạc\r\nDung lượng pin	3340 mAh\r\nLoại pin	Pin chuẩn Li-Po\r\nCông nghệ pin	Tiết kiệm pin\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay, Mở khóa bằng khuôn mặt\r\nTính năng đặc biệt	Đèn pin\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Có\r\nXem phim	3GP, MP4\r\nNghe nhạc	Midi, AMR, MP3, WAV, AAC, OGG, FLAC\r\nThông tin khác\r\nThời điểm ra mắt	07/2018', 9, 1, 'cái', 6490000, 'images/Product/Huawei Nova 3i.jpeg'),
(34, 'Huawei Nova 3e', 'Màn hình\r\nCông nghệ màn hình	IPS LCD\r\nĐộ phân giải	Full HD+ (1080 x 2280 Pixels)\r\nMàn hình rộng	5.84\"\r\nMặt kính cảm ứng	Mặt kính cong 2.5D\r\nCamera sau\r\nĐộ phân giải	16 MP và 2 MP (2 camera)\r\nQuay phim	Quay phim FullHD 1080p@30fps\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	Chụp ảnh xóa phông, A.I Camera, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama\r\nCamera trước\r\nĐộ phân giải	16 MP\r\nVideocall	Hỗ trợ VideoCall thông qua ứng dụng\r\nThông tin khác	Chế độ làm đẹp, Quay video Full HD, Sticker AR (biểu tượng thực tế ảo), Nhận diện khuôn mặt\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 8.0 (Oreo)\r\nChipset (hãng SX CPU)	HiSilicon Kirin 659 8 nhân\r\nTốc độ CPU	4 nhân 2.36GHz + 4 nhân 1.7GHz\r\nChip đồ họa (GPU)	Mali-T830\r\nBộ nhớ & Lưu trữ\r\nRAM	4 GB\r\nBộ nhớ trong	64 GB\r\nBộ nhớ còn lại (khả dụng)	Khoảng 50 GB\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 256 GB\r\nKết nối\r\nMạng di động	Hỗ trợ 4G\r\nSIM	2 Nano SIM\r\nWifi	Wi-Fi 802.11 b/g/n, DLNA, Wi-Fi Direct, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS, S-GPS\r\nBluetooth	LE, apt-X, v4.2\r\nCổng kết nối/sạc	USB Type-C\r\nJack tai nghe	3.5 mm\r\nKết nối khác	OTG\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối\r\nChất liệu	Khung kim loại + mặt kính cường lực\r\nKích thước	Dài 148.6 mm - Ngang 71.2 mm - Dày 7.4 mm\r\nTrọng lượng	145 g\r\nThông tin pin & Sạc\r\nDung lượng pin	3000 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Tiết kiệm pin, Sạc pin nhanh\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay, Mở khóa bằng khuôn mặt\r\nTính năng đặc biệt	Mặt kính 2.5D\r\nGhi âm	Có, microphone chuyên dụng chống ồn\r\nRadio	Không\r\nXem phim	H.265, 3GP, MP4, H.263, H.264(MPEG4-AVC)\r\nNghe nhạc	Lossless, MP3, WAV, AAC, eAAC+, FLAC\r\nThông tin khác\r\nThời điểm ra mắt	03/2018', 9, 1, 'cái', 5490000, 'images/Product/Huawei Nova 3e.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ProductCategory`
--

CREATE TABLE `ProductCategory` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `ParentCategoryId` int(11) DEFAULT NULL,
  `SortOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ProductCategory`
--

INSERT INTO `ProductCategory` (`CategoryId`, `CategoryName`, `ParentCategoryId`, `SortOrder`) VALUES
(1, 'Điện thoại', NULL, 0),
(2, 'Máy tính bảng', NULL, 0),
(3, 'Laptop', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ProductPhoto`
--

CREATE TABLE `ProductPhoto` (
  `PhotoId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `DisplayOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ProductPhoto`
--

INSERT INTO `ProductPhoto` (`PhotoId`, `ProductId`, `FileName`, `DisplayOrder`) VALUES
(4, 1, 'Hinhsanpham/iphone_6_1.jpg', 1),
(5, 1, 'Hinhsanpham/iphone_6_2.jpeg', 1),
(6, 1, 'Hinhsanpham/iphone_6_3.jpeg', 1),
(7, 2, 'Hinhsanpham/galaxy_s8_1.jpeg', 1),
(8, 2, 'Hinhsanpham/galaxy_s8_2.jpeg', 1),
(9, 2, 'Hinhsanpham/galaxy_s8_3.jpeg', 1),
(10, 3, 'Hinhsanpham/xperia_xz1_1.jpeg', 1),
(11, 3, 'Hinhsanpham/xperia_xz1_2.jpeg', 1),
(12, 3, 'Hinhsanpham/xperia_xz1_3.jpeg', 1),
(13, 4, 'Hinhsanpham/iphone_x_1.jpeg', 1),
(14, 4, 'Hinhsanpham/iphone_x_2.jpeg', 1),
(15, 4, 'Hinhsanpham/iphone_x_3.jpeg', 1),
(16, 6, 'Hinhsanpham/galaxy_note8_1.jpeg', 1),
(17, 6, 'Hinhsanpham/galaxy_note8_2.jpeg', 1),
(18, 6, 'Hinhsanpham/galaxy_note8_3.jpeg', 1),
(19, 5, 'Hinhsanpham/iphone_7_1.jpg', 1),
(20, 5, 'Hinhsanpham/iphone_7_2.jpg', 1),
(21, 5, 'Hinhsanpham/iphone_7_3.jpg', 1),
(22, 7, 'Hinhsanpham/galaxy_tab_a2_1.jpeg', 1),
(23, 7, 'Hinhsanpham/galaxy_tab_a2_2.jpeg', 1),
(24, 7, 'Hinhsanpham/galaxy_tab_a2_3.jpeg', 1),
(25, 8, 'Hinhsanpham/galaxy_tab4_1.jpeg', 1),
(26, 8, 'Hinhsanpham/galaxy_tab4_2.jpeg', 1),
(27, 8, 'Hinhsanpham/galaxy_tab4_3.jpeg', 1),
(28, 10, 'Hinhsanpham/ipad_pro10.5_1.jpeg', 1),
(29, 10, 'Hinhsanpham/ipad_pro10.5_2.jpeg', 1),
(30, 10, 'Hinhsanpham/ipad_pro10.5_3.jpeg', 1),
(31, 11, 'Hinhsanpham/macbook_air_2015_1.jpeg', 1),
(32, 11, 'Hinhsanpham/macbook_air_2015_2.jpeg', 1),
(33, 11, 'Hinhsanpham/macbook_air_2015_3.jpeg', 1),
(34, 12, 'Hinhsanpham/macbook_air_2018_1.jpeg', 1),
(35, 12, 'Hinhsanpham/macbook_air_2018_2.jpeg', 1),
(36, 12, 'Hinhsanpham/macbook_air_2018_3.jpeg', 1),
(37, 13, 'Hinhsanpham/macbook_pro_2015_1.jpeg', 1),
(38, 13, 'Hinhsanpham/macbook_pro_2015_2.jpeg', 1),
(39, 13, 'Hinhsanpham/ipad_pro10.5_3.jpeg', 1),
(40, 14, 'Hinhsanpham/hp_pavilion_1.jpg', 1),
(41, 14, 'Hinhsanpham/hp_pavilion_2.jpg', 1),
(42, 14, 'Hinhsanpham/hp_pavilion_3.jpg', 1),
(43, 15, 'Hinhsanpham/dell_vostro3468_1.jpeg', 1),
(44, 15, 'Hinhsanpham/dell_vostro3468_2.jpeg', 1),
(45, 15, 'Hinhsanpham/dell_vostro3468_3.jpeg', 1),
(46, 16, 'Hinhsanpham/dell_inspiron3578_1.jpg', 1),
(47, 16, 'Hinhsanpham/dell_inspiron3578_2.jpg', 1),
(48, 16, 'Hinhsanpham/dell_inspiron3578_3.jpg', 1),
(49, 24, 'Hinhsanpham/galaxy_tabe_1.jpeg', 1),
(50, 24, 'Hinhsanpham/galaxy_tabe_2.jpeg', 1),
(51, 24, 'Hinhsanpham/galaxy_tab4_3.jpeg', 1),
(52, 25, 'Hinhsanpham/galaxy_tab_s4_1.jpeg', 1),
(53, 25, 'Hinhsanpham/galaxy_tab_s4_2.jpeg', 1),
(54, 25, 'Hinhsanpham/galaxy_tab_s4_3.jpeg', 1),
(55, 9, 'Hinhsanpham/galaxy_tab_a_1.jpeg', 1),
(56, 9, 'Hinhsanpham/galaxy_tab_a_2.jpeg', 1),
(57, 9, 'Hinhsanpham/galaxy_tab_a_3.jpeg', 1),
(58, 26, 'Hinhsanpham/xiaomi_mi8_pro_1.jpg', 1),
(59, 26, 'Hinhsanpham/xiaomi_mi8_pro_2.jpg', 1),
(60, 26, 'Hinhsanpham/xiaomi_mi8_pro_3.jpg', 1),
(61, 27, 'Hinhsanpham/xiaomi_mia2_1.jpg', 1),
(62, 27, 'Hinhsanpham/xiaomi_mia2_2.jpg', 1),
(63, 27, 'Hinhsanpham/xiaomi_mia2_3.jpg', 1),
(64, 28, 'Hinhsanpham/xiaomi_mi8_lite_1.png', 1),
(65, 28, 'Hinhsanpham/xiaomi_mi8_lite_2.jpeg', 1),
(66, 28, 'Hinhsanpham/xiaomi_mi8_lite_3.jpeg', 1),
(67, 29, 'Hinhsanpham/asus_vivobook_s15_s530ua_3.jpeg', 1),
(68, 29, 'Hinhsanpham/asus_vivobook_s15_s530ua_2.jpeg', 1),
(69, 29, 'Hinhsanpham/asus_vivobook_s15_s530ua_1.jpeg', 1),
(70, 30, 'Hinhsanpham/asus_vivobook_x507UF_3.jpg', 1),
(71, 30, 'Hinhsanpham/asus_vivobook_x507UF_2.jpg', 1),
(72, 30, 'Hinhsanpham/asus_vivobook_x507UF_1.png', 1),
(73, 31, 'Hinhsanpham/Asus ROG Strix Scar GL504GM 3.jpeg', 1),
(74, 31, 'Hinhsanpham/Asus ROG Strix Scar GL504GM 2.jpeg', 1),
(75, 31, 'Hinhsanpham/Asus ROG Strix Scar GL504GM 1.jpeg', 1),
(76, 32, 'Hinhsanpham/Huawei Mate 20 Pro 3.jpeg', 1),
(77, 32, 'Hinhsanpham/Huawei Mate 20 Pro 2.jpeg', 1),
(78, 32, 'Hinhsanpham/Huawei Mate 20 Pro 1.jpeg', 1),
(79, 33, 'Hinhsanpham/Huawei Nova 3i 3.jpeg', 1),
(80, 33, 'Hinhsanpham/Huawei Nova 3i 2.jpg', 1),
(81, 33, 'Hinhsanpham/Huawei Nova 3i 1.jpeg', 1),
(82, 34, 'Hinhsanpham/Huawei Nova 3e 3.jpg', 1),
(83, 34, 'Hinhsanpham/Huawei Nova 3e 2.jpeg', 1),
(84, 34, 'Hinhsanpham/Huawei Nova 3e 1.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Review`
--

CREATE TABLE `Review` (
  `ReviewId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Content` varchar(200) NOT NULL,
  `CommentDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `Review`
--

INSERT INTO `Review` (`ReviewId`, `ProductId`, `UserId`, `Content`, `CommentDate`) VALUES
(1, 1, 5, 'wow', '2018-12-04 00:00:00'),
(2, 1, 6, 'wow2', '2018-12-03 00:00:00'),
(3, 1, 3, 'lolol', '2018-12-08 00:00:00'),
(4, 1, 5, 'askdfnskljdfn', '2018-12-04 13:22:42'),
(5, 2, 5, 'ngon', '2018-12-04 13:55:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Supplier`
--

CREATE TABLE `Supplier` (
  `SupplierId` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `TradeName` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Fax` varchar(50) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `Supplier`
--

INSERT INTO `Supplier` (`SupplierId`, `FullName`, `TradeName`, `Address`, `Phone`, `Email`, `Fax`, `Image`) VALUES
(1, 'Apple Inc', 'Apple', 'abc', '', '', '', 'images/Supplier/apple.jpg'),
(2, 'SAMSUNG', 'SAMSUNG', NULL, NULL, NULL, NULL, 'images/supplier/samsung.jpg'),
(3, 'SONY', 'SONY', NULL, NULL, NULL, NULL, 'images/supplier/sony.png'),
(4, 'HP', 'HP', NULL, NULL, NULL, NULL, 'images/supplier/hp.jpg'),
(5, 'DELL', 'DELL', NULL, NULL, NULL, NULL, 'images/supplier/dell.jpg'),
(7, 'Xiaomi', 'Xiaomi', '', '', '', '', 'images/Supplier/xiaomi.png'),
(8, 'ASUS', 'ASUS', '', '', '', '', 'images/Supplier/asus.png'),
(9, 'Huawei', 'Huawei', '', '', '', '', 'images/Supplier/Huawei.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `User`
--

CREATE TABLE `User` (
  `UserId` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Phone` varchar(11) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `User`
--

INSERT INTO `User` (`UserId`, `Email`, `Password`, `UserName`, `Phone`, `Address`) VALUES
(1, 'admin@admin.comd', 'admind', 'admind', '0123456789', 'sdfsdf1'),
(2, 'admin1@admin.com', '1admin', 'admin', NULL, NULL),
(3, 'admin2@admin.com', 'admin', 'admin', NULL, NULL),
(4, 'sadfsadf', '123456', 'asdfsdf', NULL, NULL),
(5, 'hoa@email.com', '123456', 'Truong phuoc hoa', '123123', 'sdfsdfsd'),
(6, 'hoa1@email.com', '123', 'Truong phuoc hoa', NULL, NULL),
(8, 'hoa3@email.com', '123', 'Truong phuoc hoa', NULL, NULL),
(9, 'hoa4@email.com', '123', 'Truong phuoc hoa', NULL, NULL),
(25, 'hoa6@email.com', '123', 'Truong phuoc hoa', NULL, NULL),
(26, 'hoa', '121234567', 'dss', '12312', '45456456'),
(28, 'test123', '', 'test123', '1234567', 'test123'),
(29, 'wow@wow.com', '123456', 'wow', NULL, NULL),
(30, '123456', '', 'wow2', '433', 'sdf');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `Bill`
--
ALTER TABLE `Bill`
  ADD PRIMARY KEY (`BillId`),
  ADD KEY `UserId` (`UserId`,`ProductId`),
  ADD KEY `FK_Bill_Product` (`ProductId`);

--
-- Chỉ mục cho bảng `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ProductId`),
  ADD KEY `FK_Product_Supplier` (`SupplierId`),
  ADD KEY `FK_Product_ProductCategory` (`CategoryId`);

--
-- Chỉ mục cho bảng `ProductCategory`
--
ALTER TABLE `ProductCategory`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Chỉ mục cho bảng `ProductPhoto`
--
ALTER TABLE `ProductPhoto`
  ADD PRIMARY KEY (`PhotoId`),
  ADD KEY `FK_ProductPhoto_Product` (`ProductId`);

--
-- Chỉ mục cho bảng `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`ReviewId`),
  ADD KEY `ProductId` (`ProductId`),
  ADD KEY `UserId` (`UserId`);

--
-- Chỉ mục cho bảng `Supplier`
--
ALTER TABLE `Supplier`
  ADD PRIMARY KEY (`SupplierId`);

--
-- Chỉ mục cho bảng `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Admin`
--
ALTER TABLE `Admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `Bill`
--
ALTER TABLE `Bill`
  MODIFY `BillId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `Product`
--
ALTER TABLE `Product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `ProductCategory`
--
ALTER TABLE `ProductCategory`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ProductPhoto`
--
ALTER TABLE `ProductPhoto`
  MODIFY `PhotoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `Review`
--
ALTER TABLE `Review`
  MODIFY `ReviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `Supplier`
--
ALTER TABLE `Supplier`
  MODIFY `SupplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `User`
--
ALTER TABLE `User`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Bill`
--
ALTER TABLE `Bill`
  ADD CONSTRAINT `FK_Bill_Product` FOREIGN KEY (`ProductId`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Bill_User` FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `FK_Product_ProductCategory` FOREIGN KEY (`CategoryId`) REFERENCES `ProductCategory` (`CategoryId`),
  ADD CONSTRAINT `FK_Product_Supplier` FOREIGN KEY (`SupplierId`) REFERENCES `Supplier` (`SupplierId`);

--
-- Các ràng buộc cho bảng `ProductPhoto`
--
ALTER TABLE `ProductPhoto`
  ADD CONSTRAINT `FK_ProductPhoto_Product` FOREIGN KEY (`ProductId`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `FK_Review_Product` FOREIGN KEY (`ProductId`) REFERENCES `Product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Review_User` FOREIGN KEY (`UserId`) REFERENCES `User` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
