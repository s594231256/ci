/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ci

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-04-26 00:31:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(60) NOT NULL DEFAULT '' COMMENT '书名',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `category` int(11) NOT NULL DEFAULT '0' COMMENT '分类id',
  `status` tinyint(10) NOT NULL DEFAULT '1' COMMENT '状态 1-可用，2-借出，3-下架',
  `location` varchar(60) NOT NULL DEFAULT '' COMMENT '图书位置',
  `borrow_num` int(11) NOT NULL DEFAULT '0' COMMENT '借出次数',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='图书表';

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', '书1', '书1简介', '1', '1', '301室F1书架', '0', '0000-00-00 00:00:00');
INSERT INTO `books` VALUES ('2', '书2', '书2简介', '2', '1', '302室F2书架', '0', '0000-00-00 00:00:00');
INSERT INTO `books` VALUES ('3', '书3', '书3简介', '2', '1', '123123撒地方', '0', '2016-04-07 15:51:32');
INSERT INTO `books` VALUES ('4', 'ddd', '剑姬', '1', '1', '123', '0', '2016-04-10 14:52:44');
INSERT INTO `books` VALUES ('5', '十万个为什么', '你愁啥', '2', '1', '出门左拐', '0', '2016-04-11 19:00:13');

-- ----------------------------
-- Table structure for `book_borrow`
-- ----------------------------
DROP TABLE IF EXISTS `book_borrow`;
CREATE TABLE `book_borrow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户id',
  `book_id` int(11) NOT NULL DEFAULT '0' COMMENT '图书id',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间-借书时间',
  `expect_back_time` date NOT NULL DEFAULT '0000-00-00' COMMENT '约定归还时间',
  `back_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '归还时间',
  `borrow_status` tinyint(10) NOT NULL DEFAULT '1' COMMENT '状态 1-借出，2-归还，3-丢失',
  `admin_id` int(11) NOT NULL DEFAULT '0' COMMENT '管理员id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='借阅关系表';

-- ----------------------------
-- Records of book_borrow
-- ----------------------------
INSERT INTO `book_borrow` VALUES ('5', '1', '1', '2016-04-08 17:10:46', '2016-04-09', '2016-04-09 12:21:07', '2', '1');
INSERT INTO `book_borrow` VALUES ('6', '4', '1', '2016-04-09 11:24:47', '2016-04-16', '2016-04-09 12:21:07', '2', '1');
INSERT INTO `book_borrow` VALUES ('7', '4', '3', '2016-04-09 11:24:55', '2016-04-21', '2016-04-10 14:55:26', '2', '1');
INSERT INTO `book_borrow` VALUES ('8', '3', '3', '2016-04-10 14:55:02', '2016-04-14', '2016-04-10 14:55:26', '2', '1');

-- ----------------------------
-- Table structure for `book_category`
-- ----------------------------
DROP TABLE IF EXISTS `book_category`;
CREATE TABLE `book_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(60) NOT NULL DEFAULT '' COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='图书分类表';

-- ----------------------------
-- Records of book_category
-- ----------------------------
INSERT INTO `book_category` VALUES ('1', '文学');
INSERT INTO `book_category` VALUES ('2', '经济');
INSERT INTO `book_category` VALUES ('3', '测试新增1');

-- ----------------------------
-- Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '1' COMMENT '状态：1-启用，0-禁用，-1-删除',
  `createtime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updatetime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  `student_code` varchar(50) NOT NULL DEFAULT '0' COMMENT '学号',
  `user_type` tinyint(10) NOT NULL DEFAULT '2' COMMENT '用户类型：1-管理员，2-学生',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '12', '1');
INSERT INTO `user_info` VALUES ('2', '测试1', '', '123@qq.com', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '123456', '2');
INSERT INTO `user_info` VALUES ('3', '测试2', '', 'dsdfg', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3333', '2');
INSERT INTO `user_info` VALUES ('4', '测试3', 'e10adc3949ba59abbe56e057f20f883e', '123123@qq.com', '1', '2016-04-09 10:45:46', '0000-00-00 00:00:00', '66666', '2');
INSERT INTO `user_info` VALUES ('5', 'admin2', '4297f44b13955235245b2497399d7a93', '123123@qq.com', '1', '2016-04-09 10:46:44', '0000-00-00 00:00:00', '0', '1');

-- ----------------------------
-- Table structure for `video`
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(60) NOT NULL DEFAULT '' COMMENT '视频名称',
  `video_content` varchar(255) NOT NULL DEFAULT '' COMMENT '简介',
  `video_url` varchar(255) NOT NULL DEFAULT '' COMMENT '存放路径',
  `video_status` tinyint(10) NOT NULL DEFAULT '1' COMMENT '状态 1-可用，2-下架',
  `video_num` int(11) NOT NULL DEFAULT '0' COMMENT '观看次数',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频图书表';

-- ----------------------------
-- Records of video
-- ----------------------------
