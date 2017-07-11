-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 27, 2016 at 11:44 PM
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `admin`
-- 


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
  `dienthoainn` int(11) NOT NULL,
  `emailnn` varchar(20) collate utf8_unicode_ci NOT NULL,
  `ghichu` text collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`idhoadon`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `hoadon`
-- 


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `khachhang`
-- 


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

INSERT INTO `loaisanpham` VALUES (1, 'opbaove', 1);
INSERT INTO `loaisanpham` VALUES (2, 'capketnoi', 1);
INSERT INTO `loaisanpham` VALUES (3, 'dochoi', 1);
INSERT INTO `loaisanpham` VALUES (4, 'danmanhinh', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `nhomsanpham`
-- 

INSERT INTO `nhomsanpham` VALUES (1, 'iphone', 1);
INSERT INTO `nhomsanpham` VALUES (2, 'ipad', 1);
INSERT INTO `nhomsanpham` VALUES (3, 'macbook', 1);
INSERT INTO `nhomsanpham` VALUES (4, 'tv', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `nhomsanphamchitiet`
-- 

CREATE TABLE `nhomsanphamchitiet` (
  `idnhomsanphamchitiet` int(11) NOT NULL auto_increment,
  `ten` varchar(20) collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  `idnhomsanpham` int(11) NOT NULL,
  PRIMARY KEY  (`idnhomsanphamchitiet`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `nhomsanphamchitiet`
-- 

INSERT INTO `nhomsanphamchitiet` VALUES (1, 'iphone5', 1, 1);
INSERT INTO `nhomsanphamchitiet` VALUES (2, 'iphone6', 1, 1);
INSERT INTO `nhomsanphamchitiet` VALUES (3, 'iphone6p', 1, 1);
INSERT INTO `nhomsanphamchitiet` VALUES (4, 'air', 1, 2);
INSERT INTO `nhomsanphamchitiet` VALUES (5, 'mini', 1, 2);
INSERT INTO `nhomsanphamchitiet` VALUES (6, 'pro', 1, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `phanhoi`
-- 

CREATE TABLE `phanhoi` (
  `idphanhoi` int(11) NOT NULL auto_increment,
  `idkhach` int(11) NOT NULL,
  `ngayphanhoi` date NOT NULL,
  `tieude` varchar(30) collate utf8_unicode_ci NOT NULL,
  `noidung` text collate utf8_unicode_ci NOT NULL,
  `traloi` text collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`idphanhoi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `phanhoi`
-- 


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
  `idnhomchitiet` int(11) NOT NULL,
  `idmausac` int(11) NOT NULL,
  `idloai` int(11) NOT NULL,
  `tensanpham` varchar(20) collate utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `ngaynhap` date NOT NULL,
  `mota` text collate utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` text collate utf8_unicode_ci NOT NULL,
  `trangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`idsanpham`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `sanpham`
-- 


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

INSERT INTO `thanhtoan` VALUES (1, 'tructiep', 1);
INSERT INTO `thanhtoan` VALUES (2, 'chuyenkhoan', 1);
