-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 26, 2016 at 09:58 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `dbaproject`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `hoadon`
-- 

CREATE TABLE `hoadon` (
  `HDID` int(11) NOT NULL auto_increment,
  `HDTenKhachHang` varchar(30) NOT NULL,
  `HDNgayMua` date NOT NULL,
  `HDNgayGiao` date NOT NULL,
  `HDEmail` varchar(30) NOT NULL,
  `HDDiaChi` text NOT NULL,
  `HDDienThoai` int(20) NOT NULL,
  `HDGhiChu` varchar(50) NOT NULL,
  `HDTrangThai` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`HDID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `hoadon`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `khachhang`
-- 

CREATE TABLE `khachhang` (
  `KHID` int(11) NOT NULL auto_increment,
  `KHTaiKhoan` varchar(20) NOT NULL,
  `KHMatKhau` varchar(32) NOT NULL,
  `KHEmail` varchar(30) NOT NULL,
  `KHDienThoai` int(20) NOT NULL,
  `KHDiaChi` text NOT NULL,
  `KHTenKhachHang` varchar(20) NOT NULL,
  `KHTrangThai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`KHID`),
  UNIQUE KEY `KHTaiKhoan` (`KHTaiKhoan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `khachhang`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `loaisanpham`
-- 

CREATE TABLE `loaisanpham` (
  `LSPID` int(11) NOT NULL auto_increment,
  `LSPTen` varchar(20) NOT NULL,
  `LSPTrangThai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`LSPID`),
  UNIQUE KEY `LSPTen` (`LSPTen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `loaisanpham`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `nhomsanpham`
-- 

CREATE TABLE `nhomsanpham` (
  `NSPID` int(11) NOT NULL auto_increment,
  `NSPTen` varchar(20) NOT NULL,
  `NSPTrangThai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`NSPID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `nhomsanpham`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `phanhoi`
-- 

CREATE TABLE `phanhoi` (
  `PHID` int(11) NOT NULL auto_increment,
  `PHThoiGian` date NOT NULL,
  `PHTieuDe` varchar(30) NOT NULL,
  `PHNoiDung` text NOT NULL,
  `PHTraLoi` text NOT NULL,
  `PHDanhGia` tinyint(4) NOT NULL default '1',
  `PHTrangThai` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`PHID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `phanhoi`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `quangcao`
-- 

CREATE TABLE `quangcao` (
  `QCID` int(11) NOT NULL auto_increment,
  `QCHinhAnh` text NOT NULL,
  `QCDuongDan` text NOT NULL,
  `QCViTri` varchar(30) NOT NULL,
  `QCTrangThai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`QCID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `quangcao`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `quantri`
-- 

CREATE TABLE `quantri` (
  `QTTen` varchar(20) NOT NULL,
  `QTMatKhau` varchar(32) NOT NULL,
  `QTTrangThai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`QTTen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `quantri`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `sanpham`
-- 

CREATE TABLE `sanpham` (
  `SPID` int(11) NOT NULL auto_increment,
  `SPTen` varchar(30) NOT NULL,
  `SPGia` int(20) NOT NULL,
  `SPNgayNhap` text NOT NULL,
  `SPLoai` tinyint(4) NOT NULL,
  `SPNhom` tinyint(4) NOT NULL,
  `SPGhiChu` text NOT NULL,
  `SPTrangThai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`SPID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `sanpham`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `thanhtoan`
-- 

CREATE TABLE `thanhtoan` (
  `TTID` int(11) NOT NULL auto_increment,
  `TTHinhThuc` varchar(20) NOT NULL,
  `TTTrangThai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`TTID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `thanhtoan`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `vanchuyen`
-- 

CREATE TABLE `vanchuyen` (
  `vcid` int(11) NOT NULL auto_increment,
  `vchinhthuc` varchar(20) NOT NULL,
  `vctrangthai` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`vcid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `vanchuyen`
-- 

