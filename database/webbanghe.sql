-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2021 lúc 04:38 PM
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
-- Cơ sở dữ liệu: `webbanghe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `UserName` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `PassWord` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `PhanQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `UserName`, `PassWord`, `PhanQuyen`) VALUES
(1, 'admin', 'admin123', 1),
(2, 'Nam', 'kh01', 0),
(3, 'Duong', 'kh02', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `tenNV` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `IDuser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`ID`, `tenNV`, `sdt`, `IDuser`) VALUES
(1, 'A', 352228888, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadonnhap`
--

CREATE TABLE `cthoadonnhap` (
  `ID` int(11) NOT NULL,
  `IDHangSX` int(11) DEFAULT NULL,
  `TenSP` varchar(500) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `NgayTao` date DEFAULT NULL,
  `TongGIa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsx`
--

CREATE TABLE `hangsx` (
  `ID` int(11) NOT NULL,
  `TenHangSX` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `SDT` varchar(10) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsx`
--

INSERT INTO `hangsx` (`ID`, `TenHangSX`, `SDT`) VALUES
(1, 'HyperX', '0975244742'),
(2, 'Tiền Phong', '0365462222'),
(3, 'Razor', '0983768888'),
(4, 'Chateau d’Ax', '0982164678'),
(5, 'Nội Thất Xinh', '0366210953'),
(6, 'MSI', '0987654321');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID` int(11) NOT NULL,
  `IDHDCT` int(11) DEFAULT NULL,
  `NgayTao` date DEFAULT NULL,
  `TongGIa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonct`
--

CREATE TABLE `hoadonct` (
  `ID` int(11) NOT NULL,
  `IDSP` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `id` int(11) NOT NULL,
  `IDCTHD` int(11) DEFAULT NULL,
  `IDHangSX` int(11) DEFAULT NULL,
  `NgayNhap` date DEFAULT NULL,
  `tonggia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `tenkhachhang` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `tuoi` int(255) DEFAULT NULL,
  `sdt` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `IDuser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `tenkhachhang`, `tuoi`, `sdt`, `IDuser`) VALUES
(1, 'Nguyễn Văn Nam', 21, '0357329999', 2),
(2, 'Vũ Dức Dương', 21, '0982464378', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `IDLoaiSP` int(11) NOT NULL,
  `tenloai` varchar(500) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `TenSp` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `IDHangSX` int(11) DEFAULT NULL,
  `Mau` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `Loai` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf16_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `TenSp`, `IDHangSX`, `Mau`, `Loai`, `Gia`, `SoLuong`, `img`) VALUES
(1, 'Ghế MSI MAG CH120', 6, 'red', 'gaming', 5190000, 25, 'https://product.hstatic.net/1000026716/product/thumb-gearvn-ghe-msi_1c1d1f647e5b482c9b6f754d932953be.png'),
(2, 'Warrior Raider Series – WGC206', 3, 'pink', 'gaming', 3290000, 15, 'https://product.hstatic.net/1000037809/product/thegioigear_ghe_game_warrior_wgc206_whitepink_f9039de425724bfead0b26bcbea04774_1024x1024.jpg'),
(3, 'GCDU01', 5, 'gray', 'văn phòng', 600000, 30, 'https://voidiung.cdn.vccloud.vn/wp-content/uploads/2020/02/gh%E1%BA%BF-xoay.jpg'),
(4, 'D259OM', 1, 'Brown', 'văn phòng', 1200000, 25, 'https://hoaphatnoithat.net.vn/wp-content/uploads/2019/10/ghe-xoay-van-phong-D2590M-1.jpeg'),
(6, 'AMG Serial Chân Xoay', 6, 'while', 'gaming', 2100000, 20, 'https://longhungpc.vn/wp-content/uploads/2020/11/s2-1.jpg'),
(7, 'Extreme Zero Black-Blue', 1, 'blue', 'gaming', 2300000, 35, 'https://banghehatram.com/wp-content/uploads/2017/09/ghe-extreme-zero-xanh-den.jpg'),
(8, 'GZ-AMG CHÂN QUỲ', 1, 'blue', 'gaming', 2550000, 25, 'https://gz.com.vn/wp-content/uploads/2018/08/38746708_260820041400161_7430301324819824640_n-1-1.jpg'),
(9, 'GZ-AMG CHÂN QUỲ', 1, 'green', 'gaming', 2550000, 25, 'https://gz.com.vn/wp-content/uploads/2018/08/38752186_2577351532282433_4628588329644851200_n-1.jpg'),
(10, 'GZ-AMG CHÂN QUỲ', 1, 'red', 'gaming', 2550000, 25, 'https://gz.com.vn/wp-content/uploads/2018/08/38747227_269262140337362_1894034299263385600_n-1.jpg'),
(11, 'GZ-AMG CHÂN QUỲ', 1, 'yellow', 'gaming', 2550000, 15, 'https://gz.com.vn/wp-content/uploads/2018/08/38755347_318756702029146_1631736746666360832_n-1.jpg');

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
  ADD KEY `IDHangSX` (`IDHangSX`);

--
-- Chỉ mục cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDHDCT` (`IDHDCT`);

--
-- Chỉ mục cho bảng `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDSP` (`IDSP`);

--
-- Chỉ mục cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDHangSX` (`IDHangSX`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDuser` (`IDuser`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`IDLoaiSP`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDHangSX` (`IDHangSX`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cthoadonnhap`
--
ALTER TABLE `cthoadonnhap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadonct`
--
ALTER TABLE `hoadonct`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `IDLoaiSP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `cthoadonnhap_ibfk_1` FOREIGN KEY (`IDHangSX`) REFERENCES `hangsx` (`ID`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`IDHDCT`) REFERENCES `hoadonct` (`ID`);

--
-- Các ràng buộc cho bảng `hoadonct`
--
ALTER TABLE `hoadonct`
  ADD CONSTRAINT `hoadonct_ibfk_1` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD CONSTRAINT `hoadonnhap_ibfk_1` FOREIGN KEY (`IDHangSX`) REFERENCES `hangsx` (`ID`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`IDuser`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IDHangSX`) REFERENCES `hangsx` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
