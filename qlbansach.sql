-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 03:00 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlbansach`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `check_admin` (`username` VARCHAR(45), `password` VARCHAR(45))  BEGIN
	select * from admin where admin.username = username and admin.password = password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_login` (`email` VARCHAR(200), `matkhau` VARCHAR(200))  BEGIN
	select * from khachhang kh where kh.email = email and kh.matkhau = matkhau;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_dm` (`madm` INT)  BEGIN
	delete from danhmuc where danhmuc.madm = madm;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_tl` (`matl` INT)  BEGIN
	delete from theloai where theloai.matl = matl;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getall_dm` ()  BEGIN
	select * from danhmuc;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getall_nxb` ()  BEGIN
	select * from nhaxuatban;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getall_sach` (`madm` INT, `matl` INT)  BEGIN
	if madm = 0 then
			select * from sach;
	else
		begin
			if matl = 0 then
				select * from sach where sach.madm = madm;
			else
				select * from sach where sach.madm = madm and sach.matl = matl;
			end if;
        end;
	end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getall_tg` ()  BEGIN
	select * from tacgia;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getall_tl` ()  BEGIN
	select * from theloai;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_dm` (`madm` INT)  BEGIN
	select * from danhmuc dm where dm.madm = madm;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_sach` (`masach` INT)  BEGIN
	select * 
    from sach join tacgia on sach.matg = tacgia.matg join nhaxuatban on nhaxuatban.manxb = sach.manxb join danhmuc on danhmuc.madm = sach.madm join theloai on theloai.matl = sach.matl
    where sach.masach = masach;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_tl` (`matl` INT)  BEGIN
	select * from theloai where theloai.matl = matl;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `get_tl_dm` (`madm` INT)  BEGIN
	select * from theloai where matl in (select matl from sach where sach.madm = madm);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_dm` (`tendm` VARCHAR(200), `ghichu` VARCHAR(200))  BEGIN
	insert into danhmuc(tendm, ghichu) values(tendm, ghichu);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_tl` (`tentl` VARCHAR(200))  BEGIN
	insert into theloai(tentl) values(tentl);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `login_user` (`email` VARCHAR(200), `matkhau` VARCHAR(200))  BEGIN
	select * from khachhang kh where kh.email = email and kh.matkhau = matkhau;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_dm` (`madm` INT, `tendm` VARCHAR(200), `ghichu` VARCHAR(200))  BEGIN
	update danhmuc dm
    set dm.tendm = tendm, dm.ghichu = ghichu
    where dm.madm = madm;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_tl` (`matl` INT, `tentl` VARCHAR(200))  BEGIN
	update theloai set theloai.tentl = tentl where theloai.matl = matl;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `register` (`hoten` VARCHAR(200), `ngaysinh` DATE, `gioitinh` BOOLEAN, `email` VARCHAR(200), `matkhau` VARCHAR(200), `ngaytao` DATE) RETURNS TINYINT(1) BEGIN

	if(exists(select * from khachhang where khachhang.email = email)) then
		return false;
	end if;
	insert into khachhang(hoten, ngaysinh, gioitinh, email, matkhau, ngaytao) values(hoten, ngaysinh, gioitinh, email, matkhau, ngaytao);
    return true;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '');

-- --------------------------------------------------------

--
-- Table structure for table `bangtin`
--

CREATE TABLE `bangtin` (
  `mabt` int(11) NOT NULL,
  `tenbt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongtinbt` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinh` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `madm` int(11) NOT NULL,
  `tendm` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ghichu` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`madm`, `tendm`, `ghichu`) VALUES
(1, 'Văn học Việt Nam', ''),
(2, 'Văn học nước ngoài', ''),
(3, 'Thiếu nhi', ''),
(4, 'Thời sự - chính trị', ''),
(5, 'Khoa học tự nhiên - nhân văn', '');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `hoten` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` tinyint(4) DEFAULT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaytao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `hoten`, `ngaysinh`, `gioitinh`, `diachi`, `email`, `matkhau`, `ngaytao`) VALUES
(1, 'Nguyễn Văn A', '2000-01-01', 1, '', 'user@user.com', '827ccb0eea8a706c4c34a16891f84e7b', '2017-06-03'),
(2, 'nguyễn', '2000-01-01', 1, NULL, 'user@user1.com', 'd41d8cd98f00b204e9800998ecf8427e', '2017-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `manxb` int(11) NOT NULL,
  `tennxb` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongtinnxb` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`manxb`, `tennxb`, `diachi`, `thongtinnxb`) VALUES
(1, 'NXB Văn Học', '', ''),
(2, 'Hội Nhà Văn', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `masach` int(11) NOT NULL,
  `madm` int(11) DEFAULT NULL,
  `matl` int(11) DEFAULT NULL,
  `matg` int(11) DEFAULT NULL,
  `manxb` int(11) DEFAULT NULL,
  `tensach` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kichthuoc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongtinsach` mediumtext COLLATE utf8_unicode_ci,
  `giabia` int(11) DEFAULT NULL,
  `giamgia` double DEFAULT NULL,
  `sotrang` int(11) DEFAULT NULL,
  `ngayxuatban` date DEFAULT NULL,
  `biasach` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`masach`, `madm`, `matl`, `matg`, `manxb`, `tensach`, `kichthuoc`, `thongtinsach`, `giabia`, `giamgia`, `sotrang`, `ngayxuatban`, `biasach`) VALUES
(1, 2, 1, 1, 1, 'Nhà giả kim', '13 x 20.5 cm', '<h5>Nhà Giả Kim</h5>\n<br>\n<div>Tất cả những trải nghiệm trong chuyến phiêu du theo đuổi vận mệnh của mình đã giúp Santiago thấu hiểu được ý nghĩa sâu xa nhất của hạnh phúc, hòa hợp với vũ trụ và con người.</div>\n<br>\n<div>Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.</div>\n<br>\n<div>“Nhưng nhà luyện kim đan không quan tâm mấy đến những điều ấy. Ông đã từng thấy nhiều người đến rồi đi, trong khi ốc đảo và sa mạc vẫn là ốc đảo và sa mạc. Ông đã thấy vua chúa và kẻ ăn xin đi qua biển cát này, cái biển cát thường xuyên thay hình đổi dạng vì gió thổi nhưng vẫn mãi mãi là biển cát mà ông đã biết từ thuở nhỏ. Tuy vậy, tự đáy lòng mình, ông không thể không cảm thấy vui trước hạnh phúc của mỗi người lữ khách, sau bao ngày chỉ có cát vàng với trời xanh nay được thấy chà là xanh tươi hiện ra trước mắt. ‘Có thể Thượng đế tạo ra sa mạc chỉ để cho con người biết quý trọng cây chà là,’ ông nghĩ.”</div>\n<br>\n<strong>- Trích Nhà giả kim</strong>', 59000, 0.3, 228, '2013-10-01', 'nha-gia-kim.u84.d20161102.t102644.515752.jpg'),
(2, 1, 1, 2, 2, 'Giông tố', '14 x 20,5 cm', NULL, 98000, 0.2, 485, '2014-10-02', 'giong-to.jpg'),
(3, 1, 2, 3, 2, 'Nắng trong vườn', '14 x 20.5 cm', NULL, 42000, 0.2, 172, '2015-06-24', 'nang-trong-vuon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tacgia`
--

CREATE TABLE `tacgia` (
  `matg` int(11) NOT NULL,
  `tentg` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongtintg` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tacgia`
--

INSERT INTO `tacgia` (`matg`, `tentg`, `thongtintg`) VALUES
(1, 'Paulo Coelho', ''),
(2, 'Vũ Trọng Phụng', NULL),
(3, 'Thạch Lam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `matl` int(11) NOT NULL,
  `tentl` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`matl`, `tentl`) VALUES
(1, 'Tiểu thuyết'),
(2, 'Truyện ngắn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bangtin`
--
ALTER TABLE `bangtin`
  ADD PRIMARY KEY (`mabt`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`madm`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`manxb`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`),
  ADD KEY `madm_idx` (`madm`),
  ADD KEY `matl_idx` (`matl`),
  ADD KEY `matg_idx` (`matg`),
  ADD KEY `manxb_idx` (`manxb`);

--
-- Indexes for table `tacgia`
--
ALTER TABLE `tacgia`
  ADD PRIMARY KEY (`matg`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`matl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bangtin`
--
ALTER TABLE `bangtin`
  MODIFY `mabt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `madm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `manxb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
  MODIFY `masach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tacgia`
--
ALTER TABLE `tacgia`
  MODIFY `matg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `matl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `madm` FOREIGN KEY (`madm`) REFERENCES `danhmuc` (`madm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `manxb` FOREIGN KEY (`manxb`) REFERENCES `nhaxuatban` (`manxb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matg` FOREIGN KEY (`matg`) REFERENCES `tacgia` (`matg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matl` FOREIGN KEY (`matl`) REFERENCES `theloai` (`matl`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
