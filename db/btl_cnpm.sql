-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2021 lúc 02:53 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl_cnpm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `UserName` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `pwd` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `PhanQuyen` int(11) DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `update_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `UserName`, `pwd`, `PhanQuyen`, `create_time`, `update_time`) VALUES
(1, 'admin', '93e0401156e3d0865f1c8d347c919aea', 1, '2021-10-15', NULL),
(2, 'Duong', 'bb8875485e403ed26d9a8f70bb8c76bf', 0, '2021-10-15', NULL),
(3, 'Nam', 'bb8875485e403ed26d9a8f70bb8c76bf', 0, '2021-10-15', NULL),
(4, 'user01', 'bb8875485e403ed26d9a8f70bb8c76bf', 0, '2021-10-15', NULL),
(5, 'user02', 'bb8875485e403ed26d9a8f70bb8c76bf', 0, '2021-10-15', NULL),
(8, 'account1', 'bb8875485e403ed26d9a8f70bb8c76bf', 0, '2021-11-05', '2021-11-05'),
(9, 'giang', 'bb8875485e403ed26d9a8f70bb8c76bf', 0, '2021-11-08', NULL),
(10, 'user03', 'bb8875485e403ed26d9a8f70bb8c76bf', 0, '2021-11-19', '2021-11-23'),
(11, 'user04', 'bb8875485e403ed26d9a8f70bb8c76bf', 0, '2021-11-22', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `tenNV` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `sdt` varchar(10) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `IDuser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID`, `tenNV`, `sdt`, `IDuser`) VALUES
(2, 'Nguyễn Trung Giang', '0357470170', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadonnhap`
--

CREATE TABLE `cthoadonnhap` (
  `ID` int(11) NOT NULL,
  `IDHangSX` int(11) DEFAULT NULL,
  `TenSP` varchar(500) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `gia` varchar(20) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `NgayTao` date DEFAULT NULL,
  `IDHDN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadonnhap`
--

INSERT INTO `cthoadonnhap` (`ID`, `IDHangSX`, `TenSP`, `gia`, `soluong`, `NgayTao`, `IDHDN`) VALUES
(1, 6, 'Warrior Raider Series – WGC206', '3,290,000', 25, '2021-10-15', 1),
(2, 6, 'AMG Serial Chân Xoay', '2,100,000', 20, '2021-10-15', 1),
(3, 6, 'Extreme Zero Black-Blue', '2,300,000', 35, '2021-10-15', 1),
(4, 5, 'Ghế Văn Phòng GCDU01', '600,000', 25, '2021-10-20', 2),
(5, 5, 'Ghế Văn Phòng D259OM', '1,200,000', 20, '2021-10-20', 2),
(6, 2, 'GZ-AMG CHÂN QUỲ', '2,550,000', 30, '2021-10-30', 3),
(7, 3, 'EXTREME ZERO S ĐỎ ĐEN', '1,600,000', 20, '2021-11-04', 5),
(8, 3, 'GX015 có gác', '2,490,000', 25, '2021-11-04', 5),
(9, 4, 'GHẾ XOAY LƯỚI GIÁM ĐỐC 5679', '2,000,000', 15, '2021-10-30', 4),
(10, 4, 'Model Luxury', '450,000', 15, '2021-10-30', 4),
(11, 5, 'Ghế gấp G04', '350,000', 25, '2021-10-20', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `IDGioHang` int(11) NOT NULL,
  `TenSP` varchar(500) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `SoLuong` int(10) DEFAULT NULL,
  `TenMau` varchar(100) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `Gia` varchar(20) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `anh` varchar(500) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `update_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID` int(11) NOT NULL,
  `IDKH` int(11) DEFAULT NULL,
  `NgayTao` date DEFAULT NULL,
  `TongGia` varchar(20) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonct`
--

CREATE TABLE `hoadonct` (
  `ID` int(11) NOT NULL,
  `IDSP` int(11) DEFAULT NULL,
  `IDHD` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `Gia` varchar(20) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `IDHDN` int(11) NOT NULL,
  `IDHangSX` int(11) DEFAULT NULL,
  `NgayNhap` date DEFAULT NULL,
  `tonggia` varchar(20) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`IDHDN`, `IDHangSX`, `NgayNhap`, `tonggia`) VALUES
(1, 6, '2021-10-15', '204,750,000'),
(2, 5, '2021-10-20', '47,750,000'),
(3, 2, '2021-10-30', '76,500,000'),
(4, 4, '2021-10-30', '36,750,000'),
(5, 3, '2021-11-04', '94,250,000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `IDKH` int(11) NOT NULL,
  `tenkhachhang` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `tuoi` int(10) DEFAULT NULL,
  `sdt` varchar(10) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `IDuser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`IDKH`, `tenkhachhang`, `tuoi`, `sdt`, `IDuser`) VALUES
(1, 'Nguyễn Văn Nam', 25, '0357329999', 3),
(2, 'Vũ Đức Dương', 21, '0982464378', 2),
(3, 'Nguyễn Trung Giang', 21, '0123456789', 9),
(4, 'Nguyễn Văn A', 25, '0987654321', 4),
(5, 'Nguyễn Văn B', 34, '0978564321', 5),
(6, 'Nguyễn Văn C', 46, '0172839465', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `IDLoaiSP` int(11) NOT NULL,
  `tenloai` varchar(500) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`IDLoaiSP`, `tenloai`) VALUES
(1, 'Gaming'),
(2, 'Văn Phòng'),
(3, 'gỗ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau`
--

CREATE TABLE `mau` (
  `IDMau` int(11) NOT NULL,
  `IDSP` int(11) DEFAULT NULL,
  `anh` varchar(500) COLLATE utf16_vietnamese_ci NOT NULL,
  `TenMau` varchar(20) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `mau`
--

INSERT INTO `mau` (`IDMau`, `IDSP`, `anh`, `TenMau`) VALUES
(1, 1, 'quy-blue.jpg', 'pink'),
(2, 2, 'AMG_Serial.jpg', 'white'),
(3, 3, 'ghe-extreme-zero-xanh-den.jpg', 'blue'),
(4, 4, 'GCDU01.jpg', 'gray'),
(5, 5, 'D2590M-1.jpeg', 'Brown'),
(6, 6, 'ghe-gap.jpeg', 'blue'),
(7, 7, 'quy-blue.jpg', 'Blue'),
(8, 12, 'quy-green.jpg', 'green'),
(9, 13, 'quy-red.jpg', 'red'),
(10, 15, 'quy-vang.jpg', 'yellow'),
(11, 8, 'ghe-giam-doc-luoi.jpg', 'orange'),
(12, 9, 'Model Luxury.webp', 'black'),
(13, 10, 'zero-red.jpg', 'red'),
(14, 11, 'GX015-co-gac.jpg', 'pink'),
(15, 16, 'anston-chan-quy-mau-vang-1.png', 'yellow'),
(16, 17, 'aston-chan-quy-mau-den-1.png', 'black'),
(17, 18, 'Martin-mau-cam.png', 'orange'),
(18, 19, 'Martin-mau-den-trang.png', 'black'),
(19, 20, 'hong-s550-xoay.jpg', 'pink'),
(20, 21, 's550-xanhla-xoay.jpg', 'green'),
(21, 22, 'vang-s550-xoay.jpg', 'yellow'),
(22, 23, 'Ghe-gap-nhua-xanh-VB-3200-1.jpg', 'blue'),
(23, 24, 'Ghe-xoay-da-lung-thap-VB-3803.jpg', 'black'),
(24, 25, 'Ghe-xoay-giam-doc-VB-3602.jpg', 'black'),
(25, 26, 'ghe-bar-4210BN.jpg', NULL),
(26, 27, 'ghe-go-tai-tho.jpg', NULL),
(27, 28, 'ghe-go-cafe-bcf07.jpg', NULL),
(28, 29, 'ghe-go-cafe-xuat-khau-han-quoc-panda-10.jpg', NULL),
(29, 30, 'Ghe-go-mat-tron.png', NULL),
(30, 31, 'ghe-go-mat-tron.webp', NULL),
(31, 32, 'ghe-go-navy.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhasx`
--

CREATE TABLE `nhasx` (
  `IDNSX` int(11) NOT NULL,
  `TenHangSX` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `SDT` varchar(10) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhasx`
--

INSERT INTO `nhasx` (`IDNSX`, `TenHangSX`, `SDT`) VALUES
(1, 'HyperX', '0987654321'),
(2, 'HyperX', '0987654321'),
(3, 'Chateau d’Ax', '0982164678'),
(4, 'Tiền Phong', '0365462222'),
(5, 'Nội Thất Xinh', '0366210953'),
(6, 'MSI', '0987654321');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSP` int(11) NOT NULL,
  `TenSp` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `IDHangSX` int(11) DEFAULT NULL,
  `IDLoai` int(11) DEFAULT NULL,
  `Gia` varchar(20) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `chitietsp` varchar(500) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `update_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSP`, `TenSp`, `IDHangSX`, `IDLoai`, `Gia`, `SoLuong`, `chitietsp`, `create_time`, `update_time`) VALUES
(1, 'Warrior Raider Series – WGC206', 6, 1, '3,490,000', 20, 'Chất lượng tốt nhất: <br>-Vải Nỉ siêu bền, không sợ bị rạng nứt trầy xước như da PU. <br>-Được làm từ những chất liệu cao cấp bền đẹp kết hợp với công nghệ sản xuất tiên tiến, ghế chơi game đảm bảo chất lượng tốt nhất, chất lượng đạt chuẩn châu Âu. Người sử dụng có thể sở hữu một sản phẩm vừa mang tính bền bỉ lâu dài, vừa có độ chắc chắn cho người ngồi. Chất lượng tốt làm nên giá trị sử dụng lâu dài cho sản phẩm.', '2021-10-15', NULL),
(2, 'AMG Serial Chân Xoay', 6, 1, '2,390,000', 15, '- Các chi tiết tháo lắp đơn giản, dễ thay thế. Có thể tăng giảm chiều cao dễ dàng <br> - Ghế Game AMG chân quỳ ống sắt dày 2,0 ly <br> - Ghế có trọng lượng là 19kg <br> - Chịu được tải trọng 230kg <br> - Khung xương 100% bằng sắt', '2021-10-15', NULL),
(3, 'Extreme Zero Black-Blue', 6, 1, '2,500,000', 30, '- Khung ghế bằng nhựa đúc nguyên khối <br> - Đệm ghế bằng mút xốp PU Foam nguyên khối bọc da CN <br> - Tay ghế chữ T có thể thay đổi chiều cao <br> - Cơ chế ngả 170 độ, xoay 360 độ và chân có Piston thủy lực <br> - Bánh xe bằng nhựa bọc cao su <br> Có tựa lưng và gối đầu', '2021-10-15', NULL),
(4, 'Ghế Văn Phòng GCDU01', 5, 2, '600,000', 20, '- Chân ghế : Bánh xe xoay 360 độ linh hoạt trong quá trình di chuyển <br> - Nâng hạ : Cần hơi thủy lực nâng hạ độ cao tùy thích <br> - Tay ghế nhựa tiện lợi dễ dàng tháo lắp nếu cần', '2021-10-20', NULL),
(5, 'Ghế Văn Phòng D259OM', 5, 2, '1,200,000', 23, '- Hệ thống ngả lưng đồng bộ, ngả lưng ghế lên đến 45°. Khóa 3 vị trí. <br> - Đệm bọc da simili cao cấp không nhồi mút kết hợp với nhựa nguyên sinh đỡ hõm lưng phù hợp cơ thể -> chống đau mỏi lưng. <br> - Tựa đỡ tay phù hợp chiều dài cánh tay và tư thế làm việc -> chống căng mỏi cơ vai – tay. <br> - Khung ghế bằng thép mạ crom đỡ phần lưng da simili cao cấp, chống tích nhiệt và chống ẩm mốc tốt -> Cảm giác ngồi êm ái và thoải mái.', '2021-10-20', NULL),
(6, 'Ghế gấp G04', 5, 2, '350,000', 16, '- Khung chân thép sơn tĩnh điện, thép mạ, hoặc inox. Đệm tựa mút bọc pvc.<br> - Ghế 4 chân, có thể gấp khi không sử dụng. Tựa lưng dài.', '2021-10-20', NULL),
(7, 'GZ-AMG CHÂN QUỲ BLUE', 2, 1, '2,749,000', 25, '- Da PU cao cấp <br> - Đệm dày chuyên dụng, mang tới cảm giác ngồi dễ chịu <br> - Ống chân quỳ sơn tĩnh điện, độ bền cực cao <br> - Tháo lắp đơn giản, dễ vận chuyển, dễ dàng thay thế linh kiện <br> - Chân thép mạ crom chịu lực.', '2021-10-30', NULL),
(8, 'GHẾ XOAY LƯỚI GIÁM ĐỐC 5679', 4, 2, '2,299,000', 19, '- Tay ghế chứ T hiện đại bằng nhựa, lưng bọc lưới cao cấp độ bền cao <br>- Cao 1120 mm đến 1250 mm, sâu 680mm, dài 700mm <br>- Lưng nhựa 2 lớp bọc lưới <br>- Tay nhựa chữ T, điều chỉnh lên xuống<br>- Đệm mút bọc lưới <br>- Chân sao nhựa nylon cao cấp <br> - Có gối đầu thư giãn', '2021-10-30', NULL),
(9, 'Model Luxury', 4, 2, '599,000', 25, '- Chất liệu : Lưới, vải, sắt, nệm cao su non. <br> - Cấu tạo đơn giản tạo sự chắn chắn - độ bền cao. <br> - Cấu tạo khung thép mạ chrome chắc chắn, phần tựa lưng hơi cong giúp ôm sát cơ thể và hỗ trợ nâng đỡ bộ phận cột sống thẳng tự nhiên <br> - Phần ngồi bọc đệm mút hình vuông rộng rãi, êm ái giúp tư thế ngồi luôn thoải mái, không bị gò bó <br> - Kích thước: Cao 103cm, rộng 58cm, sâu 58cm', '2021-10-30', NULL),
(10, 'EXTREME ZERO S ĐỎ ĐEN', 3, 1, '2,599,000', 20, '- Khung ghế bằng nhựa đúc nguyên khối <br> - Đệm ghế bằng mút xốp PU Foam nguyên khối bọc da CN <br> - Tay ghế chữ T có thể thay đổi chiều cao <br>  -Cơ chế ngả 170 độ, xoay 360 độ và chân có Piston thủy lực <br> - Bánh xe bằng nhựa bọc cao su <br> - Có tựa lưng và gối đầu', '2021-11-04', NULL),
(11, 'GX015 có gác', 4, 1, '3,490,000', 20, 'Chất lượng tốt nhất: <br>-Vải Nỉ siêu bền, không sợ bị rạng nứt trầy xước như da PU.<br>-Được làm từ những chất liệu cao cấp bền đẹp kết hợp với công nghệ sản xuất tiên tiến, ghế chơi game đảm bảo chất lượng tốt nhất, chất lượng đạt chuẩn châu Âu. Người sử dụng có thể sở hữu một sản phẩm vừa mang tính bền bỉ lâu dài, vừa có độ chắc chắn cho người ngồi. Chất lượng tốt làm nên giá trị sử dụng lâu dài cho sản phẩm.', '2021-11-04', NULL),
(12, 'GZ-AMG CHÂN QUỲ GREEN', 2, 1, '2,749,000', 25, '- Da PU cao cấp <br> - Đệm dày chuyên dụng, mang tới cảm giác ngồi dễ chịu <br> - Ống chân quỳ sơn tĩnh điện, độ bền cực cao <br> - Tháo lắp đơn giản, dễ vận chuyển, dễ dàng thay thế linh kiện <br> - Chân thép mạ crom chịu lực.', '2021-10-30', NULL),
(13, 'GZ-AMG CHÂN QUỲ RED', 2, 1, '2,749,000', 25, '- Da PU cao cấp <br> - Đệm dày chuyên dụng, mang tới cảm giác ngồi dễ chịu <br> - Ống chân quỳ sơn tĩnh điện, độ bền cực cao <br> - Tháo lắp đơn giản, dễ vận chuyển, dễ dàng thay thế linh kiện <br> - Chân thép mạ crom chịu lực.', '2021-10-30', NULL),
(15, 'GZ-AMG CHÂN QUỲ YELLOW', 2, 1, '2,749,000', 25, '- Da PU cao cấp <br> - Đệm dày chuyên dụng, mang tới cảm giác ngồi dễ chịu <br> - Ống chân quỳ sơn tĩnh điện, độ bền cực cao <br> - Tháo lắp đơn giản, dễ vận chuyển, dễ dàng thay thế linh kiện <br> - Chân thép mạ crom chịu lực.', '2021-10-30', NULL),
(16, 'Anston Chân Quỳ', 6, 1, '2,499,000', 15, '- Các chi tiết tháo lắp đơn giản, dễ thay thế. Có thể tăng giảm chiều cao dễ dàng <br> - Ghế Game AMG chân quỳ ống sắt dày 2,0 ly <br> - Ghế có trọng lượng là 19kg <br> - Chịu được tải trọng 230kg <br> - Khung xương 100% bằng sắt', '2021-11-10', NULL),
(17, 'Anston Chân Quỳ Đen', 6, 1, '2,499,000', NULL, '- Các chi tiết tháo lắp đơn giản, dễ thay thế. Có thể tăng giảm chiều cao dễ dàng <br> - Ghế Game AMG chân quỳ ống sắt dày 2,0 ly <br> - Ghế có trọng lượng là 19kg <br> - Chịu được tải trọng 230kg <br> - Khung xương 100% bằng sắt', '2021-11-10', NULL),
(18, 'Martin cam', 6, 1, '2,499,000', 20, '- Các chi tiết tháo lắp đơn giản, dễ thay thế. Có thể tăng giảm chiều cao dễ dàng <br> - Ghế Game AMG chân quỳ ống sắt dày 2,0 ly <br> - Ghế có trọng lượng là 19kg <br> - Chịu được tải trọng 230kg <br> - Khung xương 100% bằng sắt', '2021-11-10', NULL),
(19, 'Martin Đen', 6, 1, '2,499,000', 25, '- Các chi tiết tháo lắp đơn giản, dễ thay thế. Có thể tăng giảm chiều cao dễ dàng <br> - Ghế Game AMG chân quỳ ống sắt dày 2,0 ly <br> - Ghế có trọng lượng là 19kg <br> - Chịu được tải trọng 230kg <br> - Khung xương 100% bằng sắt', '2021-11-10', NULL),
(20, 'S550 Chân Xoay hồng', 2, 1, '1,549,000', 25, '- Các chi tiết tháo lắp đơn giản, dễ thay thế. Có thể tăng giảm chiều cao dễ dàng <br> - Ghế Game AMG chân quỳ ống sắt dày 2,0 ly <br> - Ghế có trọng lượng là 19kg <br> - Chịu được tải trọng 230kg <br> - Khung xương 100% bằng sắt', '2021-11-13', NULL),
(21, 'S550 Chân Xoay xanh', 2, 1, '1,549,000', NULL, '- Các chi tiết tháo lắp đơn giản, dễ thay thế. Có thể tăng giảm chiều cao dễ dàng <br> - Ghế Game AMG chân quỳ ống sắt dày 2,0 ly <br> - Ghế có trọng lượng là 19kg <br> - Chịu được tải trọng 230kg <br> - Khung xương 100% bằng sắt', '2021-11-13', NULL),
(22, 'S550 Chân Xoay vàng', 2, 1, '1,549,000', 15, '- Các chi tiết tháo lắp đơn giản, dễ thay thế. Có thể tăng giảm chiều cao dễ dàng <br> - Ghế Game AMG chân quỳ ống sắt dày 2,0 ly <br> - Ghế có trọng lượng là 19kg <br> - Chịu được tải trọng 230kg <br> - Khung xương 100% bằng sắt', '2021-11-13', NULL),
(23, 'Ghế văn phòng B3200', 4, 2, '699,000', 20, '- Chất liệu : nhựa.<br> - Cấu tạo đơn giản tạo sự chắn chắn - độ bền cao. <br> - Cấu tạo khung thép mạ chrome chắc chắn.', '2021-11-08', NULL),
(24, 'Ghế xoay da lưng', 4, 2, '3,490,000', 25, '- Tay ghế chứ T hiện đại bằng nhựa, lưng bọc lưới cao cấp độ bền cao <br>- Cao 1120 mm đến 1250 mm, sâu 680mm, dài 700mm <br>- Lưng nhựa 2 lớp bọc lưới <br>- Tay nhựa chữ T, điều chỉnh lên xuống<br>- Đệm mút bọc lưới <br>- Chân sao nhựa nylon cao cấp <br> - Có gối đầu thư giãn', '2021-11-08', NULL),
(25, 'Ghế xoay giám đốc', 4, 2, '2,749,000', 20, '- Tay ghế chứ T hiện đại bằng nhựa, lưng bọc lưới cao cấp độ bền cao <br>- Cao 1120 mm đến 1250 mm, sâu 680mm, dài 700mm <br>- Lưng nhựa 2 lớp bọc lưới <br>- Tay nhựa chữ T, điều chỉnh lên xuống<br>- Đệm mút bọc lưới <br>- Chân sao nhựa nylon cao cấp <br> - Có gối đầu thư giãn', '2021-11-08', NULL),
(26, 'Ghế bar 10BN', 5, 3, '1,499,000', 25, '- Chất liệu: gỗ. <br> - Ghế cao 1.3m phần tự thấp.', '2021-11-15', NULL),
(27, 'Ghế gỗ tai thỏ', 5, 3, '550,000', 35, '- Chất liệu: gỗ sồi. <br> - Kiểu dáng mới, mặt ghế tròn, tựa ghế hình tai thỏ. <br> - Ghế kiểu thấp, 3 chân ghế tạo sự chắc chắn.', '2021-11-15', NULL),
(28, 'Ghế gỗ cafe BCF07', 5, 3, '400,000', 25, '- Chất liệu: gỗ sồi. <br>- Dáng ghế thấp, mặt tròn, chân ghế chữ x tạo sự chắc chắn.', '2021-11-05', NULL),
(29, 'Ghế gỗ panda', 5, 3, '1,400,000', 25, '- Chất liệu: gỗ. <br> - Có lớp đệm tạo sự thoải mái khi ngồi. <br> - Sản phẩm đạt tiêu chuẩn được nhập khẩu từ Hàn Quốc.', '2021-11-05', NULL),
(30, 'ghế tự mặt tròn', 5, 3, '350,000', 25, '- Chất liệu: gỗ sồi. <br> - Kiểu dáng mới, mặt ghế tròn, tựa ghế hình tai thỏ. <br> - Ghế kiểu thấp, 3 chân ghế tạo sự chắc chắn.', '2021-11-05', NULL),
(31, 'Ghế gỗ mặt tròn', 5, 3, '400,000', 25, '- Chất liệu: gỗ sồi. <br>- Dáng ghế thấp, mặt tròn, chân ghế được gắn kết tạo sự chắc chắn.', '2021-11-05', NULL),
(32, 'Ghế gỗ navy', 5, 3, '500,000', 25, '- Chất liệu: gỗ. <br> - Có lớp đệm tạo sự thoải mái khi ngồi. <br> - Sản phẩm đạt tiêu chuẩn được nhập khẩu từ Na Uy.', '2021-11-07', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDuser` (`IDuser`);

--
-- Chỉ mục cho bảng `cthoadonnhap`
--
ALTER TABLE `cthoadonnhap`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDHangSX` (`IDHangSX`),
  ADD KEY `IDHDN` (`IDHDN`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`IDGioHang`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDKH` (`IDKH`);

--
-- Chỉ mục cho bảng `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDSP` (`IDSP`),
  ADD KEY `IDHD` (`IDHD`);

--
-- Chỉ mục cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`IDHDN`),
  ADD KEY `IDHangSX` (`IDHangSX`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`IDKH`),
  ADD KEY `IDuser` (`IDuser`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`IDLoaiSP`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`IDMau`),
  ADD KEY `IDSP` (`IDSP`);

--
-- Chỉ mục cho bảng `nhasx`
--
ALTER TABLE `nhasx`
  ADD PRIMARY KEY (`IDNSX`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`IDSP`),
  ADD KEY `IDLoai` (`IDLoai`),
  ADD KEY `IDHangSX` (`IDHangSX`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cthoadonnhap`
--
ALTER TABLE `cthoadonnhap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `IDGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `hoadonct`
--
ALTER TABLE `hoadonct`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `IDHDN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `IDKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `IDLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mau`
--
ALTER TABLE `mau`
  MODIFY `IDMau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `nhasx`
--
ALTER TABLE `nhasx`
  MODIFY `IDNSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `cthoadonnhap`
--
ALTER TABLE `cthoadonnhap`
  ADD CONSTRAINT `cthoadonnhap_ibfk_1` FOREIGN KEY (`IDHangSX`) REFERENCES `nhasx` (`IDNSX`),
  ADD CONSTRAINT `cthoadonnhap_ibfk_2` FOREIGN KEY (`IDHDN`) REFERENCES `hoadonnhap` (`IDHDN`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`IDKH`) REFERENCES `khachhang` (`IDKH`);

--
-- Các ràng buộc cho bảng `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD CONSTRAINT `hoadonct_ibfk_1` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`IDSP`),
  ADD CONSTRAINT `hoadonct_ibfk_2` FOREIGN KEY (`IDHD`) REFERENCES `hoadon` (`ID`);

--
-- Các ràng buộc cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD CONSTRAINT `hoadonnhap_ibfk_2` FOREIGN KEY (`IDHangSX`) REFERENCES `nhasx` (`IDNSX`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `mau`
--
ALTER TABLE `mau`
  ADD CONSTRAINT `mau_ibfk_1` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`IDSP`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IDLoai`) REFERENCES `loaisp` (`IDLoaiSP`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`IDHangSX`) REFERENCES `nhasx` (`IDNSX`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
