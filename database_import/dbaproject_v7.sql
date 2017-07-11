-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 12, 2016 at 10:09 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `dbaproject`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL auto_increment,
  `taikhoan` varchar(20) collate utf8_unicode_ci NOT NULL,
  `matkhau` varchar(32) collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idadmin`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` VALUES (2, 'duytan', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `chitiethoadon`
-- 

CREATE TABLE `chitiethoadon` (
  `idhoadon` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `chitiethoadon`
-- 

INSERT INTO `chitiethoadon` VALUES (0, 13, 1, 0);
INSERT INTO `chitiethoadon` VALUES (0, 13, 1, 100000);
INSERT INTO `chitiethoadon` VALUES (0, 13, 1, 100000);
INSERT INTO `chitiethoadon` VALUES (0, 12, 1, 400000);
INSERT INTO `chitiethoadon` VALUES (4, 13, 1, 100000);
INSERT INTO `chitiethoadon` VALUES (5, 13, 1, 100000);
INSERT INTO `chitiethoadon` VALUES (5, 10, 1, 200000);
INSERT INTO `chitiethoadon` VALUES (5, 12, 1, 400000);
INSERT INTO `chitiethoadon` VALUES (6, 13, 1, 100000);
INSERT INTO `chitiethoadon` VALUES (6, 10, 1, 200000);
INSERT INTO `chitiethoadon` VALUES (6, 12, 1, 400000);
INSERT INTO `chitiethoadon` VALUES (7, 13, 1, 100000);
INSERT INTO `chitiethoadon` VALUES (7, 10, 1, 200000);
INSERT INTO `chitiethoadon` VALUES (8, 12, 1, 400000);
INSERT INTO `chitiethoadon` VALUES (9, 13, 1, 100000);
INSERT INTO `chitiethoadon` VALUES (9, 12, 1, 400000);
INSERT INTO `chitiethoadon` VALUES (10, 13, 1, 100000);
INSERT INTO `chitiethoadon` VALUES (10, 12, 1, 400000);
INSERT INTO `chitiethoadon` VALUES (11, 15, 2, 300000);
INSERT INTO `chitiethoadon` VALUES (11, 13, 1, 100000);
INSERT INTO `chitiethoadon` VALUES (11, 12, 1, 400000);
INSERT INTO `chitiethoadon` VALUES (11, 0, 1, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `hoadon`
-- 

CREATE TABLE `hoadon` (
  `idhoadon` int(11) NOT NULL auto_increment,
  `idkhach` int(11) NOT NULL,
  `idthanhtoan` int(11) NOT NULL,
  `ngaymua` date NOT NULL,
  `ngaygiao` date NOT NULL,
  `tennn` varchar(20) collate utf8_unicode_ci NOT NULL,
  `diachinn` varchar(20) collate utf8_unicode_ci NOT NULL,
  `dienthoainn` varchar(15) collate utf8_unicode_ci NOT NULL,
  `emailnn` varchar(20) collate utf8_unicode_ci NOT NULL,
  `ghichu` text collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`idhoadon`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `hoadon`
-- 

INSERT INTO `hoadon` VALUES (1, 0, 2, '2016-06-05', '0000-00-00', 'a', '12', '12', 'a@a.a', '', 1);
INSERT INTO `hoadon` VALUES (2, 0, 0, '2016-06-05', '0000-00-00', 'a', '12', '12', 'a@a.a', '', 2);
INSERT INTO `hoadon` VALUES (3, 0, 0, '2016-06-05', '0000-00-00', 'duy tan', 'hanoi', '0990', 'duytan9790@gmail.com', '', 1);
INSERT INTO `hoadon` VALUES (4, 0, 0, '2016-06-05', '0000-00-00', 'a', '12', '12', 'a@a.a', '', 1);
INSERT INTO `hoadon` VALUES (5, 0, 0, '2016-06-06', '0000-00-00', 'duy tan', 'hanoi', '0990', 'duytan9790@gmail.com', '', 1);
INSERT INTO `hoadon` VALUES (6, 0, 0, '2016-06-06', '0000-00-00', 'duy tan', 'hanoi', '0990', 'duytan9790@gmail.com', '', 2);
INSERT INTO `hoadon` VALUES (7, 0, 0, '2016-06-06', '0000-00-00', 'duy tan', 'hanoi', '0990', 'duytan9790@gmail.com', '', 0);
INSERT INTO `hoadon` VALUES (8, 0, 0, '2016-06-06', '0000-00-00', 'duy tan', 'hanoi', '0990', 'duytan9790@gmail.com', '', 0);
INSERT INTO `hoadon` VALUES (9, 0, 0, '2016-06-07', '0000-00-00', 'duy tan', 'hanoi', '0990', 'duytan9790@gmail.com', '', 0);
INSERT INTO `hoadon` VALUES (10, 0, 0, '2016-06-07', '0000-00-00', 'duy tan', 'hanoi', '0990', 'duytan9790@gmail.com', '', 0);
INSERT INTO `hoadon` VALUES (11, 0, 0, '2016-06-11', '0000-00-00', 'duy tan', 'hanoi', '0990', 'duytan9790@gmail.com', '', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `khachhang`
-- 

CREATE TABLE `khachhang` (
  `idkhach` int(11) NOT NULL auto_increment,
  `hoten` varchar(30) collate utf8_unicode_ci NOT NULL,
  `taikhoan` varchar(20) collate utf8_unicode_ci NOT NULL,
  `matkhau` varchar(32) collate utf8_unicode_ci NOT NULL,
  `diachi` text collate utf8_unicode_ci NOT NULL,
  `email` varchar(30) collate utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(15) collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idkhach`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `khachhang`
-- 

INSERT INTO `khachhang` VALUES (5, 'duy tan', 'duytan', 'c20ad4d76fe97759aa27a0c99bff6710', 'hanoi', 'duytan9790@gmail.com', '0990', 1);
INSERT INTO `khachhang` VALUES (16, 'duytan', 'duytan2', 'c4ca4238a0b923820dcc509a6f75849b', '23452345', 'a@a.a', '23452345', 1);
INSERT INTO `khachhang` VALUES (15, 'Duy Tân', 'duytan22', 'c4ca4238a0b923820dcc509a6f75849b', '1234', 'duytan22@a.a', '1', 0);
INSERT INTO `khachhang` VALUES (14, 'aa', 'aa', 'c4ca4238a0b923820dcc509a6f75849b', '123123', 'a@a.a', '12', 0);
INSERT INTO `khachhang` VALUES (13, 'a', 'a', 'c4ca4238a0b923820dcc509a6f75849b', '12', 'a@a.a', '12', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `loaisanpham`
-- 

CREATE TABLE `loaisanpham` (
  `idloaisanpham` int(11) NOT NULL auto_increment,
  `tenloai` varchar(20) collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idloaisanpham`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `loaisanpham`
-- 

INSERT INTO `loaisanpham` VALUES (1, 'Ốp Bảo Vệ', 1);
INSERT INTO `loaisanpham` VALUES (2, 'Cáp Kết Nối', 1);
INSERT INTO `loaisanpham` VALUES (3, 'Đồ Chơi', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `mausac`
-- 

CREATE TABLE `mausac` (
  `idmausac` int(11) NOT NULL auto_increment,
  `ten` varchar(20) collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idmausac`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `mausac`
-- 

INSERT INTO `mausac` VALUES (1, 'den', 1);
INSERT INTO `mausac` VALUES (2, 'trang', 1);
INSERT INTO `mausac` VALUES (3, 'xanh', 1);
INSERT INTO `mausac` VALUES (4, 'do', 1);
INSERT INTO `mausac` VALUES (5, 'vang', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `nhomsanpham`
-- 

CREATE TABLE `nhomsanpham` (
  `idnhomsanpham` int(11) NOT NULL auto_increment,
  `tennhom` varchar(20) collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idnhomsanpham`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `nhomsanpham`
-- 

INSERT INTO `nhomsanpham` VALUES (1, 'iPhone', 1);
INSERT INTO `nhomsanpham` VALUES (2, 'iPad', 1);
INSERT INTO `nhomsanpham` VALUES (3, 'Macbook', 1);
INSERT INTO `nhomsanpham` VALUES (4, 'Watch', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `phanhoi`
-- 

CREATE TABLE `phanhoi` (
  `idphanhoi` int(11) NOT NULL auto_increment,
  `idkhach` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `ngayphanhoi` date NOT NULL,
  `tieude` varchar(30) collate utf8_unicode_ci NOT NULL,
  `noidung` text collate utf8_unicode_ci NOT NULL,
  `traloi` text collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idphanhoi`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

-- 
-- Dumping data for table `phanhoi`
-- 

INSERT INTO `phanhoi` VALUES (1, 5, 13, '2016-06-08', 'Sản phẩm rất tốt', 'Tuyệt vời ông mặt dời!!!!!', 'ok thanks!', 0);
INSERT INTO `phanhoi` VALUES (2, 5, 13, '2016-06-08', 'Sản phẩm rất tốt', 'Tuyệt vời ông mặt dời!!!!!', '', 1);
INSERT INTO `phanhoi` VALUES (22, 5, 13, '2016-06-08', 'tieu de 2', 'noi dung 2', '', 1);
INSERT INTO `phanhoi` VALUES (21, 5, 13, '2016-06-08', 'Tieu de', 'noi dung', '', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `quangcao`
-- 

CREATE TABLE `quangcao` (
  `idquangcao` int(11) NOT NULL auto_increment,
  `hinhanh` varchar(255) collate utf8_unicode_ci NOT NULL,
  `duongdan` varchar(255) collate utf8_unicode_ci NOT NULL,
  `vitri` int(11) NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idquangcao`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `quangcao`
-- 

INSERT INTO `quangcao` VALUES (1, 'qc_iphone', '', 0, 1);
INSERT INTO `quangcao` VALUES (2, 'qc_ipad', '', 0, 1);
INSERT INTO `quangcao` VALUES (3, 'qc_watch', '', 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `sanpham`
-- 

CREATE TABLE `sanpham` (
  `idsanpham` int(11) NOT NULL auto_increment,
  `idnhom` int(11) NOT NULL,
  `idmausac` int(11) NOT NULL,
  `idloai` int(11) NOT NULL,
  `tensanpham` varchar(50) collate utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `ngaynhap` date NOT NULL,
  `mota` text collate utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` text collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idsanpham`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `sanpham`
-- 

INSERT INTO `sanpham` VALUES (12, 2, 2, 1, 'Ốp Silicone iPad mini', 400000, '2015-06-01', '', 8, 'Ốp Silicone iPad mini', 1);
INSERT INTO `sanpham` VALUES (13, 1, 2, 2, 'Cáp sạc 1m', 100000, '2016-05-10', 'asdf', 0, 'Cáp sạc 1m', 1);
INSERT INTO `sanpham` VALUES (15, 1, 0, 1, 'Ốp da iPhone 6', 300000, '2016-06-08', 'Dành cho iPhone 6', 10, 'opdaiphone6', 1);
INSERT INTO `sanpham` VALUES (16, 1, 0, 1, 'tế', 1, '2016-06-08', 'đẹp', 10, 'test', 1);
INSERT INTO `sanpham` VALUES (14, 4, 0, 3, 'test', 1, '0000-00-00', 'test', 21, 'aaaa', 1);
INSERT INTO `sanpham` VALUES (10, 1, 2, 1, 'Ốp da iPhone 5', 200000, '2015-06-03', 'Ốp da iPhone 5', 5, 'Ốp da iPhone 5', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `thanhtoan`
-- 

CREATE TABLE `thanhtoan` (
  `idthanhtoan` int(11) NOT NULL auto_increment,
  `hinhthuc` varchar(20) collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idthanhtoan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `thanhtoan`
-- 

INSERT INTO `thanhtoan` VALUES (1, 'trực tiếp', 1);
INSERT INTO `thanhtoan` VALUES (2, 'chuyển khoản', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `wishlist`
-- 

CREATE TABLE `wishlist` (
  `idsanpham` int(11) NOT NULL,
  `idkhach` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Dumping data for table `wishlist`
-- 

INSERT INTO `wishlist` VALUES (16, 0);
INSERT INTO `wishlist` VALUES (15, 5);
INSERT INTO `wishlist` VALUES (10, 5);
INSERT INTO `wishlist` VALUES (16, 5);
