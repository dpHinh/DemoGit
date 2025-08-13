-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2025 at 04:37 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom_66`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `ma_donhang` varchar(255) DEFAULT NULL,
  `nguoinhan_ten` varchar(255) DEFAULT NULL,
  `nguoinhan_diachi` varchar(255) DEFAULT NULL,
  `nguoinhan_sdt` int DEFAULT NULL,
  `nguoinhan_email` varchar(255) DEFAULT NULL,
  `pt_thanhtoan` tinyint DEFAULT NULL,
  `voucher` varchar(255) DEFAULT NULL,
  `ship` int DEFAULT NULL,
  `tong_thanhtoan` int DEFAULT NULL,
  `ngay_dat_hang` date DEFAULT NULL,
  `order_notes` varchar(255) DEFAULT NULL,
  `trangthai` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int NOT NULL,
  `san_pham_id` int DEFAULT NULL,
  `tai_khoan_id` int DEFAULT NULL,
  `noi_dung` text,
  `ngay_bl` date DEFAULT NULL,
  `trang_thai` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_bl`, `trang_thai`) VALUES
(1, 5, 1, 'quá đẹp', '2025-06-02', 0),
(2, 5, 1, 'quá đẹp', '2025-06-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int NOT NULL,
  `don_hang_id` int DEFAULT NULL,
  `san_pham_id` int DEFAULT NULL,
  `don_gia` decimal(10,2) DEFAULT NULL,
  `so_luong` int DEFAULT NULL,
  `ngay_bat_dau` text,
  `thanh_tien` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `ngay_bat_dau`, `thanh_tien`) VALUES
(2, 10, 13, '1111.00', 3, NULL, '3333.00'),
(3, 10, 3, '123.00', 13, NULL, '1599.00'),
(4, 11, 3, '123.00', 1, NULL, '123.00'),
(5, 12, 3, '123.00', 1, NULL, '123.00'),
(6, 13, 13, '1111.00', 1, NULL, '1111.00');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `id` int NOT NULL,
  `gio_hang_id` int DEFAULT NULL,
  `san_pham_id` int DEFAULT NULL,
  `so_luong` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hang`
--

INSERT INTO `chi_tiet_gio_hang` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(1, 1, 5, 1),
(3, 3, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `ten_loai` varchar(255) DEFAULT NULL,
  `mota` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_loai`, `mota`) VALUES
(1, 'iphone', '123'),
(3, 'samsung', '123\r\n'),
(4, 'oppo', 'bán cực chạy'),
(6, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(255) DEFAULT NULL,
  `tai_khoan_id` int DEFAULT NULL,
  `ten_nguoi_nhan` varchar(255) DEFAULT NULL,
  `email_nguoi_nhan` varchar(255) DEFAULT NULL,
  `sdt_nguoi_nhan` varchar(20) DEFAULT NULL,
  `dia_chi_nguoi_nhan` text,
  `ngay_dat` date DEFAULT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int DEFAULT NULL,
  `trang_thai_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(10, 'DH-3616', 7, 'binh', 'binhdtph53286@gmail.com', '0987654321', '13 Trịnh Văn Bô, Hà Nội', '2025-06-16', '11.10', '11.1', 1, 1),
(11, 'DH-1148', 6, 'binh', 'binhdtph53286@gmail.com', '0987654321', '13 Trịnh Văn Bô, Hà Nội', '2025-06-16', '123456.00', '123456', 1, 11),
(12, 'DH-5105', 7, 'binh', 'binhdtph53286@gmail.com', '0987654321', '13 Trịnh Văn Bô, Hà Nội', '2025-06-16', '10000.00', '10000', 1, 1),
(13, 'DH-3359', 7, 'binh', 'binhdtph53286@gmail.com', '0987654321', 'số 2 hà nội, việt nam', '2025-06-16', '1.00', '1', 1, 1),
(14, 'DH-7364', 7, 'binh', 'binhdtph53286@gmail.com', '0987654321', '13 Trịnh Văn Bô, Hà Nội', '2025-06-16', '10000.00', '1', 1, 1),
(15, 'DH-7213', 7, 'binh', 'binhdtph53286@gmail.com', '0987654321', '13 Trịnh Văn Bô, Hà Nội', '2025-06-16', '121111.00', '', 1, 1),
(16, 'DH-4537', 7, 'binh', 'binhdtph53286@gmail.com', '0987654321', '13 Trịnh Văn Bô, Hà Nội', '2025-06-19', '133133.00', '123123123', 1, 11),
(17, 'DH-9443', 6, 'binh44', 'anhnd120@gmail.com', '0987654321', 'số 3 hà nội, việt nam', '2025-06-19', '353333.00', '', 1, 11),
(18, 'DH-1320', 6, 'binh', 'anhnd120@gmail.com', '0987654321', 'số 3 hà nội, việt nam', '2025-06-19', '133256.00', 'acccc', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id` int NOT NULL,
  `tai_khoan_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id`, `tai_khoan_id`) VALUES
(3, NULL),
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(1, 1),
(17, 6);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_pham`
--

CREATE TABLE `hinh_anh_san_pham` (
  `id` int NOT NULL,
  `san_pham_id` int DEFAULT NULL,
  `link_hinh_anh` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinh_anh_san_pham`
--

INSERT INTO `hinh_anh_san_pham` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(1, 1, NULL),
(3, 3, './uploads/1748529280_iPhone-14-plus-thumb-xanh-1-600x600.jpg'),
(5, 5, './uploads/1749034747_iPhone-14-plus-thumb-xanh-1-600x600.jpg'),
(6, 5, './uploads/1749034747_contact2.png'),
(7, 5, './uploads/1749034747_fl03.png'),
(17, 3, './uploads/1748529280_sp02.png'),
(18, 13, './uploads/1748529406f6de74a317a2dfb336b0b9217b98ff31.jpg'),
(19, 13, './uploads/1748529422_Hinh-nen-linh-ho-tro-thoi-chien-4k-1024x685.png'),
(20, 13, './uploads/1748529422_hinh-nen-may-tinh-co-ke-de-icon-desktop-blogchiasekienthuc-1-min.jpg'),
(22, 15, './uploads/174980986817490346101654660392_493_Tim-hieu-ve-ty-le-man-hinh-dien-thoai-thong-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toan`
--

CREATE TABLE `phuong_thuc_thanh_toan` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toan`
--

INSERT INTO `phuong_thuc_thanh_toan` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD(Thanh toán khi nhận hàng)'),
(2, 'Thanh toán VNpay');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `ten_sp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gia` int NOT NULL,
  `giam_gia` int DEFAULT NULL,
  `hinh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `soluong` int NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL,
  `so_luot_xem` int DEFAULT NULL,
  `is_hot` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_sp`, `gia`, `giam_gia`, `hinh`, `soluong`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`, `so_luot_xem`, `is_hot`) VALUES
(1, 'iphone', 123133, 123333, './uploads/1749207573samsung-galaxy-s24-ultra-grey-thumbnew-600x600.jpg', 123, '2025-05-11', '123', 1, 1, NULL, NULL),
(3, 'samsung', 123133, 123, './uploads/1748354146hinh-nen-ngau-4.jpg', 123, '2025-05-03', '123', 1, 1, NULL, NULL),
(5, 'ios', 123, 123, './uploads/1748354139f6de74a317a2dfb336b0b9217b98ff31.jpg', 123, '2025-05-22', '123', 1, 2, NULL, NULL),
(13, 'samsung22', 111111, 1111, './uploads/1748529406hinh-nen-may-tinh-fantasy-4k-blogchiasekienthuc.com-12-scaled.jpg', 123, '2025-05-14', '123', 4, 1, 23, 1),
(15, 'abcd', 10000, 9000, './uploads/17498098681748837090857379.jpg', 5, '2025-06-13', 'abcd', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hinh` text,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:user 1:admin',
  `diachi` varchar(255) DEFAULT NULL,
  `gioi_tinh` tinyint NOT NULL DEFAULT '1',
  `mat_khau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dienthoai` int DEFAULT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `hoten`, `hinh`, `ngay_sinh`, `email`, `role`, `diachi`, `gioi_tinh`, `mat_khau`, `dienthoai`, `trang_thai`) VALUES
(1, 'canh', './uploads/1731655775anh18.jpg', '2024-10-30', 'canh@gmail.com', 1, 'Xuân Phương, Nam Từ Liêm, Hà Nội', 1, '123456789', 985635484, 1),
(2, 'admin', '123', '2025-04-16', 'admin@gmail.com', 1, 'hanoi', 1, '123', 3222332, 1),
(4, 'admin', '123', '2025-04-16', 'admin@gmail.com', 1, 'hanoi', 1, '$2y$10$6CuJZ2...mã dài...', 3222332, 1),
(5, 'Admin Demo', './uploads/default.jpg', '1990-01-01', 'admin@example.com', 1, '123 Admin Street, HCM', 1, '$2y$10$WzF9xEpbZkbq3rq1ILaVZ.mADfjTu7nHg8k7mOzO6vCKMNK/0cQ1e', 123456789, 1),
(6, 'binh', NULL, NULL, 'anhnd120@gmail.com', 0, NULL, 1, '$2y$10$hzLrQtMAROBaohAQyKUHNuFJIffYFX7HtKyjmjF9bbdU1AjgN5xq.', NULL, 1),
(7, 'binh', NULL, NULL, 'binhdtph53286@gmail.com', 0, NULL, 1, '$2y$10$aDCs8Z9REK4JsMKwQQrN0O7V3ScPGJVjMQbzBP50QYwfLO6NTpIJO', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hang`
--

INSERT INTO `trang_thai_don_hang` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Chưa thanh toán'),
(4, 'Đã thanh toán'),
(5, 'Đang chuẩn bị hàng'),
(6, 'Đang giao'),
(7, 'Đã giao'),
(8, 'Đã nhận'),
(9, 'Thành công'),
(10, 'Hoàn hàng'),
(11, 'Hủy đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_id` (`don_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_id` (`gio_hang_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`),
  ADD KEY `phuong_thuc_thanh_toan_id` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `trang_thai_id` (`trang_thai_id`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_muc_id` (`danh_muc_id`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tai_khoan` (`id`);

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoan` (`id`);

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hang` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_1` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hang` (`id`),
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoan` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toan` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_3` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hang` (`id`);

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoan` (`id`);

--
-- Constraints for table `hinh_anh_san_pham`
--
ALTER TABLE `hinh_anh_san_pham`
  ADD CONSTRAINT `hinh_anh_san_pham_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danh_muc_id`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
