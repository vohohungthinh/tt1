CREATE TABLE `thongtin_nha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sonha` varchar(255) NOT NULL,
  `tenduong` varchar(255) NOT NULL,
  `phuongxa` varchar(255) NOT NULL,
  `quanhuyen` varchar(255) NOT NULL,
  `dientich_dat` float NOT NULL,
  `dientich_xaydung` float NOT NULL,
  `dientich_san` float NOT NULL,
  `soto` varchar(255) NOT NULL,
  `sothua` varchar(255) NOT NULL,
  `chusohuu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (1, '123', 'Nguyễn Huệ', 'Bến Nghé', 'Quận 1', 100.5, 80, 85, '10', '20', 'Nguyễn Văn A');
INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (2, '456', 'Lê Lợi', 'Bến Thành', 'Quận 1', 150, 120, 130, '11', '21', 'Trần Thị B');
INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (3, '789', 'Võ Văn Kiệt', 'Cô Giang', 'Quận 1', 200, 180, 190, '12', '22', 'Lê Văn C');
INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (4, '1011', 'Phan Xích Long', '3', 'Phú Nhuận', 90, 70, 75, '13', '23', 'Nguyễn Thị D');
INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (5, '1213', 'Trường Chinh', '14', 'Tân Bình', 120, 100, 110, '14', '24', 'Phạm Văn E');
INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (6, '111', 'abc', '23', 'Quận 9', 333, 333, 333, '13', '23', 'Võ Hồ F');
INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (7, '223', 'dâdada', '21', 'adda', 222, 333, 111, '21', '32', 'adac');
INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (8, '241', 'adada', '211', 'adada', 555, 222, 222, '21', '33', 'sdada');
INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (9, '1213', 'avava', '2323', 'adada', 456, 345, 222, '21', 'ad', 'fffa');
INSERT INTO `thongtin_nha` (`id`, `sonha`, `tenduong`, `phuongxa`, `quanhuyen`, `dientich_dat`, `dientich_xaydung`, `dientich_san`, `soto`, `sothua`, `chusohuu`) VALUES (10, '2121', 'adada', '1122', 'dâdda', 12121, 154, 123, 'adda', '12', 'ádad');
