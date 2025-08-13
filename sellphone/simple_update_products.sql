
ALTER TABLE `sanpham` AUTO_INCREMENT = 1;

-- Add 5 new iPhone products
INSERT INTO `sanpham` (`ten_sp`, `gia`, `giam_gia`, `hinh`, `soluong`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`, `so_luot_xem`, `is_hot`) VALUES
('iPhone 15 Pro Max', 34990000, 3000000, './uploads/iphone15-pro-max.jpg', 50, '2025-01-20', 'iPhone 15 Pro Max với chip A17 Pro mạnh mẽ, camera 48MP, màn hình 6.7 inch Super Retina XDR OLED, pin 4441mAh, sạc nhanh 20W. Thiết kế titan cao cấp, hỗ trợ 5G và iOS 17.', 1, 1, 0, 1),
('iPhone 15 Pro', 29990000, 2500000, './uploads/iphone15-pro.jpg', 45, '2025-01-20', 'iPhone 15 Pro với chip A17 Pro, camera 48MP, màn hình 6.1 inch Super Retina XDR OLED, pin 3274mAh, sạc nhanh 20W. Thiết kế titan, hỗ trợ 5G và iOS 17.', 1, 1, 0, 1),
('iPhone 15 Plus', 26990000, 2000000, './uploads/iphone15-plus.jpg', 60, '2025-01-20', 'iPhone 15 Plus với chip A16 Bionic, camera 48MP, màn hình 6.7 inch Super Retina XDR OLED, pin 4383mAh, sạc nhanh 20W. Thiết kế nhôm, hỗ trợ 5G và iOS 17.', 1, 1, 0, 0),
('iPhone 15', 22990000, 1500000, './uploads/iphone15.jpg', 80, '2025-01-20', 'iPhone 15 với chip A16 Bionic, camera 48MP, màn hình 6.1 inch Super Retina XDR OLED, pin 3349mAh, sạc nhanh 20W. Thiết kế nhôm, hỗ trợ 5G và iOS 17.', 1, 1, 0, 0),
('iPhone 14 Pro Max', 28990000, 4000000, './uploads/iphone14-pro-max.jpg', 30, '2025-01-20', 'iPhone 14 Pro Max với chip A16 Bionic, camera 48MP, màn hình 6.7 inch Super Retina XDR OLED, pin 4323mAh, sạc nhanh 20W. Thiết kế thép không gỉ, hỗ trợ 5G và iOS 16.', 1, 1, 0, 0);

-- Clear product images table
DELETE FROM `hinh_anh_san_pham`;

-- Reset auto increment for images
ALTER TABLE `hinh_anh_san_pham` AUTO_INCREMENT = 1;

-- Add product images for each iPhone
INSERT INTO `hinh_anh_san_pham` (`san_pham_id`, `link_hinh_anh`) VALUES
(1, './uploads/iphone15-pro-max-1.jpg'),
(1, './uploads/iphone15-pro-max-2.jpg'),
(1, './uploads/iphone15-pro-max-3.jpg'),
(2, './uploads/iphone15-pro-1.jpg'),
(2, './uploads/iphone15-pro-2.jpg'),
(2, './uploads/iphone15-pro-3.jpg'),
(3, './uploads/iphone15-plus-1.jpg'),
(3, './uploads/iphone15-plus-2.jpg'),
(3, './uploads/iphone15-plus-3.jpg'),
(4, './uploads/iphone15-1.jpg'),
(4, './uploads/iphone15-2.jpg'),
(4, './uploads/iphone15-3.jpg'),
(5, './uploads/iphone14-pro-max-1.jpg'),
(5, './uploads/iphone14-pro-max-2.jpg'),
(5, './uploads/iphone14-pro-max-3.jpg'); 