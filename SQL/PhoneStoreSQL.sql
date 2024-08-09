-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2024 lúc 06:34 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phonestore`

-- CREATE DATABASE PhoneStore;
USE PhoneStore;

--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `don_gia` int(10) UNSIGNED NOT NULL,
  `so_luong` int(10) UNSIGNED NOT NULL,
  `thanh_tien` int(10) UNSIGNED NOT NULL,
  `ma_don_hang` int(10) UNSIGNED NOT NULL,
  `ma_sp` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`don_gia`, `so_luong`, `thanh_tien`, `ma_don_hang`, `ma_sp`) VALUES
(22990000, 1, 22990000, 23, 3),
(34990000, 1, 34990000, 23, 11),
(29490000, 1, 29490000, 23, 12),
(22990000, 6, 137940000, 24, 3),
(10990000, 3, 32970000, 24, 4),
(29490000, 4, 117960000, 24, 12),
(22990000, 5, 114950000, 25, 1),
(7990000, 4, 31960000, 25, 26),
(34990000, 8, 279920000, 26, 11),
(29490000, 5, 147450000, 26, 12),
(2490000, 4, 9960000, 26, 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctpnk`
--

CREATE TABLE `ctpnk` (
  `MaPhieu` int(10) UNSIGNED NOT NULL,
  `MaSanPham` int(10) UNSIGNED NOT NULL,
  `DonGia` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `ma_don_hang` int(10) UNSIGNED NOT NULL,
  `ngay_tao_don_hang` datetime NOT NULL,
  `tong_gia_tri` int(255) UNSIGNED NOT NULL,
  `ma_tk` int(10) UNSIGNED NOT NULL,
  `phuong_thuc_thanh_toan` int(10) UNSIGNED NOT NULL COMMENT '1=tiền mặt,2=chuyển khoản',
  `tinh_trang_don_hang` int(10) UNSIGNED NOT NULL COMMENT '0=chưa xác nhận, 1=đã xác nhận,2=thành công\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ma_don_hang`, `ngay_tao_don_hang`, `tong_gia_tri`, `ma_tk`, `phuong_thuc_thanh_toan`, `tinh_trang_don_hang`) VALUES
(23, '2024-05-14 02:03:49', 87470000, 1, 2, 2),
(24, '2024-05-14 08:37:42', 288870000, 3, 2, 2),
(25, '2024-05-14 09:00:32', 146910000, 1, 1, 2),
(26, '2024-05-14 09:24:08', 437330000, 4, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `ma_loai_sp` int(10) UNSIGNED NOT NULL,
  `ten_loai_sp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`ma_loai_sp`, `ten_loai_sp`) VALUES
(1, 'All'),
(2, 'Iphone'),
(6, 'Nokia'),
(7, 'Oppo'),
(4, 'Realme'),
(3, 'Samsung'),
(5, 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ma_tk` int(10) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `so_dien_thoai` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`ma_tk`, `ho_ten`, `so_dien_thoai`, `dia_chi`) VALUES
(1, 'Dương Văn Minh Vi', '0772912452', '63/2e Mỹ Hòa 3, Hóc Môn'),
(2, 'Dương Văn Minh Vi Admin', '0772912452', 'Hóc Môn'),
(3, 'Dương Quỳnh Như', '0896371680', 'Quận 8'),
(4, 'Dương Quỳnh Như Cute', '0896371680', 'Gia Lai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPhieu` int(10) UNSIGNED NOT NULL,
  `TongGiaTri` bigint(30) UNSIGNED NOT NULL,
  `NgayTao` datetime NOT NULL,
  `TrangThai` enum('DangTao','DaTao') NOT NULL DEFAULT 'DangTao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPhieu`, `TongGiaTri`, `NgayTao`, `TrangThai`) VALUES
(7, 880000000, '2024-05-11 02:10:59', 'DaTao'),
(8, 360000000, '2024-05-12 14:58:25', 'DaTao'),
(9, 232500000, '2024-05-12 16:10:17', 'DaTao'),
(10, 618000000, '2024-05-12 17:19:53', 'DaTao'),
(11, 42000000, '2024-05-12 21:27:51', 'DangTao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `trang_thai_sp` int(10) NOT NULL COMMENT '0 là xóa, 1 là bình thường',
  `ten_sp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `anh_sp` longtext DEFAULT NULL,
  `ma_loai_sp_khoa_ngoai` int(10) UNSIGNED NOT NULL,
  `gia_sp` int(10) UNSIGNED NOT NULL,
  `so_luong` int(11) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ma_sp`, `trang_thai_sp`, `ten_sp`, `anh_sp`, `ma_loai_sp_khoa_ngoai`, `gia_sp`, `so_luong`, `mo_ta`) VALUES
(1, 1, 'Samsung Galaxy S24 5G', 'https://product.hstatic.net/1000370129/product/samsung-galaxy-s21-plus-128gb_dbc46d184aec4d8ca5c62601d602bd23_master_d51e08bfc9254262a5ee7880469e8a8c_master.jpg', 3, 22990000, 195, 'Thiết kế đẹp mắt, camera chất lượng cao, hỗ trợ 5G.'),
(2, 1, 'Nokia 8210 4G', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/n/o/nokia-8210_4g-sand-front_back-int.png', 6, 1590000, 50, 'Phiên bản mới của Nokia 8210, hỗ trợ kết nối 4G.'),
(3, 1, 'iPhone 15', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-pro-max_3.png', 2, 22990000, 89, 'iPhone mới nhất với nhiều tính năng đột phá.'),
(4, 1, 'OPPO Reno11 5G', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/i/dien-thoai-oppo-reno-11-f-2.png', 7, 10990000, 155, 'OPPO Reno11 hỗ trợ 5G, camera sắc nét.'),
(5, 1, 'Samsung Galaxy S24 Ultra 5G', 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-s24-ultra-5g-sm-s928-stylus.jpg', 3, 37490000, 50, 'Phiên bản cao cấp của Samsung Galaxy S24, hỗ trợ 5G.'),
(6, 1, 'Samsung Galaxy A25 5G', 'https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_75/https://cdn.tgdd.vn/Products/Images/42/319904/samsung-galaxy-a25-5g-vang-thumb-200x200.jpg', 3, 6990000, 120, 'Samsung Galaxy A25 hỗ trợ kết nối 5G, pin trâu.'),
(7, 1, 'Samsung Galaxy Z Flip5 5G', 'https://th.bing.com/th?id=OIP.5DV3Lejr5sHwJa1qTso6mwAAAA&w=200&h=200&c=9&rs=1&qlt=99&o=6&dpr=1.3&pid=13.1', 3, 25990000, 36, 'Thiết kế gập gọn độc đáo, màn hình AMOLED.'),
(8, 1, 'Samsung Galaxy Z Fold5 5G', 'https://cdn.tgdd.vn/Products/Images/42/301608/samsung-galaxy-zfold5-xanh-256gb-1-1.jpg', 3, 40990000, 56, 'Thiết kế màn hình gập, sử dụng công nghệ màn hình mới.'),
(9, 1, 'Samsung Galaxy M34 5G', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-galaxy-m34-5g_1_2.png', 3, 7990000, 104, 'Samsung Galaxy M34 với thiết kế hiện đại, camera đa chức năng.'),
(10, 1, 'Samsung Galaxy S23 FE 5G', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/g/r/group_307_1_.png', 3, 14890000, 91, 'Phiên bản Fan Edition của Samsung Galaxy S23, hỗ trợ 5G.'),
(11, 1, 'iPhone 15 Pro Max', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-plus_1__1.png', 2, 34990000, 247, 'Phiên bản cao cấp nhất của iPhone 15, hiệu năng mạnh mẽ.'),
(12, 1, 'iPhone 14 Pro Max', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-14-pro_2__5.png', 2, 29490000, 66, 'iPhone 14 Pro Max với camera chất lượng cao.'),
(13, 1, 'iPhone 11', 'https://th.bing.com/th?id=OIP.vJUEj19xy8raWdZ1B10s3QAAAA&w=298&h=298&c=10&rs=1&qlt=99&bgcl=fffffe&r=0&o=6&dpr=1.3&pid=13.1', 2, 11790000, 60, 'iPhone 11, một trong những dòng sản phẩm phổ biến của Apple.'),
(14, 1, 'iPhone 12', 'https://th.bing.com/th?id=OSK.mmcolL69XLgaQFtI-LiZ1o64u7BgYJCJJMxPkrMB5KXlxuyQ&w=76&h=100&c=8&o=6&dpr=1.3&pid=SANGAM', 2, 14890000, 75, 'iPhone 12, tính năng và hiệu năng ấn tượng.'),
(15, 1, 'OPPO Reno11 F 5G', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/d/i/dien-thoai-oppo-reno-11-f-2.png', 7, 8990000, 126, 'OPPO Reno11 phiên bản thân thiện với ngân sách, hỗ trợ 5G.'),
(16, 1, 'OPPO Reno10 Pro 5G', 'https://th.bing.com/th?id=OIP.iiqaXi0lKDYxVigmz5K_5AAAAA&w=200&h=200&c=9&rs=1&qlt=99&o=6&dpr=1.3&pid=13.1', 7, 13990000, 78, 'OPPO Reno10 Pro, hiệu năng ổn định, camera chất lượng.'),
(17, 1, 'OPPO Find N3 Flip 5G', 'https://th.bing.com/th?id=OIP.S7747aiFO2f8cJSgqurtRAAAAA&w=200&h=200&c=9&rs=1&qlt=99&o=6&dpr=1.3&pid=13.1', 7, 22990000, 96, 'Thiết kế gập độc đáo, camera chất lượng cao.'),
(18, 1, 'OPPO Reno8 T 5G', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/6/3/638091158554197072_oppo-reno8-t-5g-dd.jpg', 7, 10990000, 84, 'OPPO Reno8 T, smartphone 5G với giá phải chăng.'),
(19, 1, 'Nokia 215 4G', 'https://img.tgdd.vn/imgt/f_webp,fit_outside,quality_75/https://cdn.tgdd.vn/Products/Images/42/228366/nokia-215-lucbao-600-200x200.jpg', 6, 990000, 158, 'Nokia 215, điện thoại cơ bản hỗ trợ kết nối 4G.'),
(20, 1, 'Nokia 110 4G Pro', 'https://cdn.hoanghamobile.com/i/productlist/dsp/Uploads/2023/06/28/110pro-0.png', 6, 720000, 93, 'Nokia 110 4G Pro, phiên bản mới với nhiều tính năng hấp dẫn.'),
(21, 1, 'Nokia 105 4G Pro', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/n/o/nokia-105-4g-pro_1__1.png', 6, 680000, 29, 'Nokia 105 4G Pro, điện thoại cơ bản hỗ trợ kết nối 4G.'),
(22, 1, 'Nokia 105', 'https://cdn.tgdd.vn/Products/Images/42/240194/nokia-105-4g-1-1-org.jpg', 6, 590000, 76, 'Nokia 105, điện thoại cơ bản với pin lâu.'),
(23, 1, 'Realme Note 50', 'https://th.bing.com/th/id/OIP.lAbdGCmWugUhOg8D-d3XOQHaHa?rs=1&pid=ImgDetMain', 4, 2490000, 163, 'realme Note 50, thiết kế trẻ trung, hiệu năng mạnh mẽ.'),
(24, 1, 'Realme C55', 'https://th.bing.com/th?id=OIP.UeJfjtXoi0DbQs_vftDlLAHaHa&w=200&h=200&c=9&rs=1&qlt=99&o=6&dpr=1.3&pid=13.1', 3, 4990000, 78, 'realme C55, smartphone đa dụng với giá cả hợp lý.'),
(25, 1, 'Realme C67', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:358:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/r/e/realme-c67-1_1.png', 4, 4790000, 161, 'realme C67, tính năng đáp ứng nhu cầu sử dụng hàng ngày.'),
(26, 1, 'Realme 11', 'https://th.bing.com/th/id/OIP.bjufWv_zZnfN103skH-ntwHaHa?rs=1&pid=ImgDetMain', 4, 7990000, 69, 'realme 11, thiết kế đẹp, camera chất lượng.'),
(27, 1, 'Realme 11 Pro+ 5G', 'https://th.bing.com/th?id=OIP.jmQ51lj6ariJftmw2fhmcAHaHa&w=298&h=298&c=10&rs=1&qlt=99&bgcl=fffffe&r=0&o=6&dpr=1.3&pid=MultiSMRSV2Source', 4, 14990000, 99, 'realme 11 Pro+ 5G, smartphone 5G cao cấp.'),
(28, 1, 'Xiaomi 14 5G', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-14_3__3.png', 5, 24490000, 59, 'Xiaomi 14 5G, thiết kế sang trọng, hiệu năng mạnh mẽ.'),
(29, 1, 'Xiaomi Redmi Note 13 Pro 5G', 'https://cdn.mobilecity.vn/mobilecity-vn/images/2023/09/w300/xiaomi-redmi-note-13-pro-5g-trang.jpg.webp', 5, 9490000, 49, 'Xiaomi Redmi Note 13 Pro 5G, camera nổi bật.'),
(30, 1, 'Xiaomi 13T Pro 5G', 'https://th.bing.com/th?id=OIP.rrnuEtnyEaWmQ2EJH3cPPAAAAA&w=200&h=200&c=9&rs=1&qlt=99&o=6&dpr=1.3&pid=13.1', 5, 14990000, 156, 'Xiaomi 13T Pro 5G, smartphone 5G tích hợp nhiều tính năng.'),
(31, 1, 'Xiaomi Redmi Note 13', 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-redmi-note-13_7_.png', 5, 5290000, 43, 'Xiaomi Redmi Note 13, thiết kế đẹp, pin trâu.'),
(32, 1, 'Xiaomi Redmi 12', 'https://cdn.tgdd.vn/Products/Images/42/307245/xiaomi-redmi-12-xanh-1.jpg', 5, 3490000, 76, 'Xiaomi Redmi 12, smartphone tầm trung đáng mua.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `ma_tk` int(10) UNSIGNED NOT NULL,
  `email_tk` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mat_khau_tk` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `trang_thai_tk` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=bikhoa, 1=binhthuong\r\n',
  `ngay_tao_tk` datetime NOT NULL DEFAULT current_timestamp(),
  `quyen_tk` enum('User','Admin') DEFAULT NULL COMMENT '1 là user, 10 là admin\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ma_tk`, `email_tk`, `mat_khau_tk`, `trang_thai_tk`, `ngay_tao_tk`, `quyen_tk`) VALUES
(1, 'dvmv2017@gmail.com', 'minhvi', 1, '2024-04-02 17:11:37', 'User'),
(2, 'dvmv2021@gmail.com', 'minhvi', 1, '2024-04-08 09:56:57', 'Admin'),
(3, 'quynhnhu@gmail.com', 'quynhnhu', 1, '2024-04-15 01:02:36', 'User'),
(4, 'duongquynhnhu@gmail.com', 'quynhnhu', 1, '2024-04-23 17:09:38', 'User');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`ma_don_hang`,`ma_sp`),
  ADD KEY `ma_sp` (`ma_sp`);

--
-- Chỉ mục cho bảng `ctpnk`
--
ALTER TABLE `ctpnk`
  ADD PRIMARY KEY (`MaPhieu`,`MaSanPham`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ma_don_hang`),
  ADD KEY `fk_taikhoan_ma_tk` (`ma_tk`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`ma_loai_sp`),
  ADD UNIQUE KEY `ten_loai_sp` (`ten_loai_sp`),
  ADD UNIQUE KEY `ten_loai_sp_2` (`ten_loai_sp`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`ma_tk`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPhieu`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD UNIQUE KEY `ten_sp` (`ten_sp`),
  ADD KEY `ma_loai_sp_khoa_ngoai` (`ma_loai_sp_khoa_ngoai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`ma_tk`),
  ADD UNIQUE KEY `ten_dang_nhap_tk` (`email_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ma_don_hang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `ma_loai_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `ma_tk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPhieu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ma_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `ma_tk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_3` FOREIGN KEY (`ma_don_hang`) REFERENCES `donhang` (`ma_don_hang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_4` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ctpnk`
--
ALTER TABLE `ctpnk`
  ADD CONSTRAINT `ctpnk_ibfk_1` FOREIGN KEY (`MaPhieu`) REFERENCES `phieunhap` (`MaPhieu`),
  ADD CONSTRAINT `ctpnk_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`ma_sp`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_taikhoan_ma_tk` FOREIGN KEY (`ma_tk`) REFERENCES `taikhoan` (`ma_tk`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ma_loai_sp_khoa_ngoai`) REFERENCES `loaisanpham` (`ma_loai_sp`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`ma_tk`) REFERENCES `nguoidung` (`ma_tk`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
