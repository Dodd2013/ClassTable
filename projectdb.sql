/*
Navicat MySQL Data Transfer

Source Server         : 1
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : projectdb

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-01-08 00:41:59
*/
create database projectDB;
use projectDB;
SET SQL_SAFE_UPDATES=0;
alter database projectdb  character set utf8;
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_ans
-- ----------------------------
DROP TABLE IF EXISTS `tb_ans`;
CREATE TABLE `tb_ans` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) NOT NULL,
  `ans` text NOT NULL,
  PRIMARY KEY (`ans_id`),
  KEY `ANS_PR` (`pro_id`),
  CONSTRAINT `ANS_PR` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_ans
-- ----------------------------
INSERT INTO `tb_ans` VALUES ('1', '1', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('2', '1', '2 - Average');
INSERT INTO `tb_ans` VALUES ('3', '1', '3 - Satisfactory');
INSERT INTO `tb_ans` VALUES ('4', '1', '4 - Good');
INSERT INTO `tb_ans` VALUES ('5', '1', '5 - Excellent');
INSERT INTO `tb_ans` VALUES ('6', '2', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('7', '2', '2 - Average');
INSERT INTO `tb_ans` VALUES ('8', '2', '3 - Satisfactory');
INSERT INTO `tb_ans` VALUES ('9', '2', '4 - Good');
INSERT INTO `tb_ans` VALUES ('10', '2', '5 - Excellent');
INSERT INTO `tb_ans` VALUES ('11', '3', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('12', '3', '2 - Average');
INSERT INTO `tb_ans` VALUES ('13', '3', '3 - Satisfactory');
INSERT INTO `tb_ans` VALUES ('14', '3', '4 - Good');
INSERT INTO `tb_ans` VALUES ('15', '3', '5 - Excellent');
INSERT INTO `tb_ans` VALUES ('16', '4', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('17', '4', '2 - Average');
INSERT INTO `tb_ans` VALUES ('18', '4', '3 - Satisfactory');
INSERT INTO `tb_ans` VALUES ('19', '4', '4 - Good');
INSERT INTO `tb_ans` VALUES ('20', '4', '5 - Excellent');
INSERT INTO `tb_ans` VALUES ('21', '5', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('22', '5', '2 - Average');
INSERT INTO `tb_ans` VALUES ('23', '5', '3 - Satisfactory');
INSERT INTO `tb_ans` VALUES ('24', '5', '4 - Good');
INSERT INTO `tb_ans` VALUES ('25', '5', '5 - Excellent');
INSERT INTO `tb_ans` VALUES ('26', '6', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('27', '6', '2 - Average');
INSERT INTO `tb_ans` VALUES ('28', '6', '3 - Satisfactory');
INSERT INTO `tb_ans` VALUES ('29', '6', '4 - Good');
INSERT INTO `tb_ans` VALUES ('30', '6', '5 - Excellent');
INSERT INTO `tb_ans` VALUES ('31', '7', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('32', '7', '2 - Average');
INSERT INTO `tb_ans` VALUES ('33', '7', '3 - Satisfactory');
INSERT INTO `tb_ans` VALUES ('34', '7', '4 - Good');
INSERT INTO `tb_ans` VALUES ('35', '7', '5 - Excellent');
INSERT INTO `tb_ans` VALUES ('36', '8', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('37', '8', '2 - Average');
INSERT INTO `tb_ans` VALUES ('38', '8', '3 - Satisfactory');
INSERT INTO `tb_ans` VALUES ('39', '8', '4 - Good');
INSERT INTO `tb_ans` VALUES ('40', '8', '5 - Excellent');
INSERT INTO `tb_ans` VALUES ('41', '9', '1 - Poor');
INSERT INTO `tb_ans` VALUES ('42', '9', '2 - Average');
INSERT INTO `tb_ans` VALUES ('43', '9', '3 - Satisfactory');
INSERT INTO `tb_ans` VALUES ('44', '9', '4 - Good');
INSERT INTO `tb_ans` VALUES ('45', '9', '5 - Excellent');

-- ----------------------------
-- Table structure for tb_fb_pro
-- ----------------------------
DROP TABLE IF EXISTS `tb_fb_pro`;
CREATE TABLE `tb_fb_pro` (
  `fb_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  KEY `FB_PR1` (`fb_id`),
  KEY `FB_PR2` (`pro_id`),
  CONSTRAINT `FB_PR1` FOREIGN KEY (`fb_id`) REFERENCES `tb_feedbacks` (`fb_id`),
  CONSTRAINT `FB_PR2` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_fb_pro
-- ----------------------------
INSERT INTO `tb_fb_pro` VALUES ('1', '1');
INSERT INTO `tb_fb_pro` VALUES ('1', '2');
INSERT INTO `tb_fb_pro` VALUES ('1', '3');
INSERT INTO `tb_fb_pro` VALUES ('1', '4');
INSERT INTO `tb_fb_pro` VALUES ('1', '5');
INSERT INTO `tb_fb_pro` VALUES ('1', '6');
INSERT INTO `tb_fb_pro` VALUES ('1', '7');
INSERT INTO `tb_fb_pro` VALUES ('1', '8');
INSERT INTO `tb_fb_pro` VALUES ('1', '9');
INSERT INTO `tb_fb_pro` VALUES ('1', '10');
INSERT INTO `tb_fb_pro` VALUES ('2', '1');
INSERT INTO `tb_fb_pro` VALUES ('2', '2');
INSERT INTO `tb_fb_pro` VALUES ('2', '3');
INSERT INTO `tb_fb_pro` VALUES ('2', '4');
INSERT INTO `tb_fb_pro` VALUES ('2', '5');
INSERT INTO `tb_fb_pro` VALUES ('2', '6');
INSERT INTO `tb_fb_pro` VALUES ('2', '7');
INSERT INTO `tb_fb_pro` VALUES ('2', '8');
INSERT INTO `tb_fb_pro` VALUES ('2', '9');
INSERT INTO `tb_fb_pro` VALUES ('2', '10');
INSERT INTO `tb_fb_pro` VALUES ('3', '1');
INSERT INTO `tb_fb_pro` VALUES ('3', '2');
INSERT INTO `tb_fb_pro` VALUES ('3', '3');
INSERT INTO `tb_fb_pro` VALUES ('3', '4');
INSERT INTO `tb_fb_pro` VALUES ('3', '5');
INSERT INTO `tb_fb_pro` VALUES ('3', '6');
INSERT INTO `tb_fb_pro` VALUES ('3', '7');
INSERT INTO `tb_fb_pro` VALUES ('3', '8');
INSERT INTO `tb_fb_pro` VALUES ('3', '9');
INSERT INTO `tb_fb_pro` VALUES ('3', '10');
INSERT INTO `tb_fb_pro` VALUES ('4', '1');
INSERT INTO `tb_fb_pro` VALUES ('4', '2');
INSERT INTO `tb_fb_pro` VALUES ('4', '3');
INSERT INTO `tb_fb_pro` VALUES ('4', '4');
INSERT INTO `tb_fb_pro` VALUES ('4', '5');
INSERT INTO `tb_fb_pro` VALUES ('4', '6');
INSERT INTO `tb_fb_pro` VALUES ('4', '7');
INSERT INTO `tb_fb_pro` VALUES ('4', '8');
INSERT INTO `tb_fb_pro` VALUES ('4', '9');
INSERT INTO `tb_fb_pro` VALUES ('4', '10');

-- ----------------------------
-- Table structure for tb_feedbacks
-- ----------------------------
DROP TABLE IF EXISTS `tb_feedbacks`;
CREATE TABLE `tb_feedbacks` (
  `fb_id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_name` varchar(50) NOT NULL,
  `fb_des` text,
  `fb_begin` datetime NOT NULL,
  `fb_end` datetime NOT NULL,
  `fb_create_time` datetime NOT NULL,
  `fb_create_user` varchar(40) NOT NULL,
  `fb_askgroup` int(11) DEFAULT NULL,
  PRIMARY KEY (`fb_id`),
  KEY `FB_US` (`fb_create_user`),
  CONSTRAINT `FB_US` FOREIGN KEY (`fb_create_user`) REFERENCES `tb_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_feedbacks
-- ----------------------------
INSERT INTO `tb_feedbacks` VALUES ('1', 'NIIT Feedback Form', 'Your feedback is invaluable! It helps us measure and improve our training effectiveness to give you the best in terms of Quality!! Please fill up the form frankly and completely. Please indicate your opinion by a tick mark where necessary, keeping in mind the response interpretation. Before you begin, please go through the form fully and clarify any doubts with your feedback co-ordinator.', '2016-01-01 00:00:00', '2016-01-15 06:30:00', '2016-01-08 00:31:15', 'Dodd', '1');
INSERT INTO `tb_feedbacks` VALUES ('2', 'NIIT Feedback Form', 'Your feedback is invaluable! It helps us measure and improve our training effectiveness to give you the best in terms of Quality!! Please fill up the form frankly and completely. Please indicate your opinion by a tick mark where necessary, keeping in mind the response interpretation. Before you begin, please go through the form fully and clarify any doubts with your feedback co-ordinator.', '2016-01-01 00:00:00', '2016-01-15 06:30:00', '2016-01-08 00:31:19', 'Dodd', '0');
INSERT INTO `tb_feedbacks` VALUES ('3', 'NIIT Feedback Form', 'Your feedback is invaluable! It helps us measure and improve our training effectiveness to give you the best in terms of Quality!! Please fill up the form frankly and completely. Please indicate your opinion by a tick mark where necessary, keeping in mind the response interpretation. Before you begin, please go through the form fully and clarify any doubts with your feedback co-ordinator.', '2016-01-29 00:00:00', '2016-02-11 14:30:00', '2016-01-08 00:31:34', 'Dodd', '0');
INSERT INTO `tb_feedbacks` VALUES ('4', 'NIIT Feedback Form', 'Your feedback is invaluable! It helps us measure and improve our training effectiveness to give you the best in terms of Quality!! Please fill up the form frankly and completely. Please indicate your opinion by a tick mark where necessary, keeping in mind the response interpretation. Before you begin, please go through the form fully and clarify any doubts with your feedback co-ordinator.', '2015-11-03 09:45:00', '2015-12-09 10:50:00', '2016-01-08 00:31:46', 'Dodd', '0');

-- ----------------------------
-- Table structure for tb_job
-- ----------------------------
DROP TABLE IF EXISTS `tb_job`;
CREATE TABLE `tb_job` (
  `title` varchar(40) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `comname` varchar(40) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `jstatus` varchar(40) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_job
-- ----------------------------
INSERT INTO `tb_job` VALUES ('programmer', 'JAVA', 'NIIT', 'beijing', 'active', 'Dodd@Dodd2014.com');
INSERT INTO `tb_job` VALUES ('programmer', 'JAVA', 'NIIT', 'shanghai', 'active', 'Dodd@Dodd2014.com');
INSERT INTO `tb_job` VALUES ('analyst', 'PHP', 'NIIT', 'shanghai', 'active', 'Dodd@Dodd2014.com');
INSERT INTO `tb_job` VALUES ('designer', 'JAVA', 'NIIT', 'nanjing', 'active', 'Dodd@Dodd2014.com');
INSERT INTO `tb_job` VALUES ('programmer', 'JAVA', 'NIIT', 'nanjing', 'active', 'Dodd@Dodd2014.com');

-- ----------------------------
-- Table structure for tb_problems
-- ----------------------------
DROP TABLE IF EXISTS `tb_problems`;
CREATE TABLE `tb_problems` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_des` text NOT NULL,
  `pro_type` int(11) NOT NULL,
  `pro_create_user` varchar(40) NOT NULL,
  `pro_create_time` datetime NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `PR_US` (`pro_create_user`),
  CONSTRAINT `PR_US` FOREIGN KEY (`pro_create_user`) REFERENCES `tb_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_problems
-- ----------------------------
INSERT INTO `tb_problems` VALUES ('1', 'You are satisfied with the faculty memberâ€™s ability to draw participation from the class. <BR>\r\nä½ æ˜¯å¦æ»¡æ„æ•™å¸ˆé©¾å¾¡è¯¾å ‚çš„èƒ½åŠ› ï¼Œä¾‹å¦‚åè°ƒçºªå¾‹ï¼Œåè°ƒå„ç»„ä¹‹é—´çš„é…åˆï¼Œæ´»è·ƒè¯¾å ‚æ°”æ°›', '1', 'Dodd', '2016-01-08 00:28:20');
INSERT INTO `tb_problems` VALUES ('2', 'Your sessions begin and end on time. <BR>\r\næ¯èŠ‚è¯¾æ˜¯å¦éƒ½èƒ½å‡†æ—¶ä¸Šä¸‹è¯¾', '1', 'Dodd', '2016-01-08 00:28:32');
INSERT INTO `tb_problems` VALUES ('3', 'You are satisfied with the presentation skills of your faculty. <BR>\r\nä½ æ˜¯å¦æ»¡æ„æ•™å¸ˆçš„æ¼”è®²å’Œè¡¨è¿°èƒ½åŠ›ã€‚', '1', 'Dodd', '2016-01-08 00:28:43');
INSERT INTO `tb_problems` VALUES ('4', 'You are given satisfactory answer to your queries related to the course in this module <BR>\r\nä½ æ˜¯å¦æ»¡æ„æ•™å¸ˆåœ¨è¯¾å ‚ä¸­å¯¹äºŽä½ æ‰€æå‡ºçš„é—®é¢˜è€Œç»™å‡ºçš„å›žç­”ã€‚', '1', 'Dodd', '2016-01-08 00:29:00');
INSERT INTO `tb_problems` VALUES ('5', 'The faculty has thorough knowledge of the contents of the module. <BR>\r\nä½ çš„æ•™å¸ˆæ˜¯å¦ç†Ÿç»ƒæŽŒæ¡äº†æ•´ä¸ªè¯¾å ‚ä¸­çš„çŸ¥è¯†å†…å®¹ã€‚', '1', 'Dodd', '2016-01-08 00:29:11');
INSERT INTO `tb_problems` VALUES ('6', 'You are able to understand what your faculty communicates to you. <BR>\r\nä½ æ˜¯å¦èƒ½å¤Ÿç†è§£æ•™å¸ˆä¸Žä½ æ²Ÿé€šçš„çŸ¥è¯†å†…å®¹ã€‚', '1', 'Dodd', '2016-01-08 00:29:22');
INSERT INTO `tb_problems` VALUES ('7', 'You are satisfied with the attitude of your faculty. <BR>\r\nä½ æ˜¯å¦æ»¡æ„æ•™å¸ˆçš„æ•™å­¦æ€åº¦ã€‚', '1', 'Dodd', '2016-01-08 00:29:32');
INSERT INTO `tb_problems` VALUES ('8', 'You are confident about your grasp of the contents of the module. <BR>\r\nåœ¨æ¯èŠ‚è¯¾ä¸Šå®Œä¹‹åŽä½ æ˜¯å¦è§‰å¾—è‡ªå·±å¯¹äºŽåŠ å…¥ITè¡Œä¸šçš„è‡ªä¿¡å¿ƒå¾—åˆ°äº†æé«˜ã€‚', '1', 'Dodd', '2016-01-08 00:29:45');
INSERT INTO `tb_problems` VALUES ('9', 'You are able to complete all Machine Room/Practice sessions on time. <BR>\r\nä½ èƒ½å¦å®Œæˆè€å¸ˆåœ¨è¯¾å ‚ä¸­å¸ƒç½®çš„æ‰€æœ‰ä½œä¸šå’Œç‹¬ç«‹å®žè·µã€‚(For IT Classes)', '1', 'Dodd', '2016-01-08 00:29:56');
INSERT INTO `tb_problems` VALUES ('10', 'Additional Comments / Suggestions (If Any)', '3', 'Dodd', '2016-01-08 00:30:04');

-- ----------------------------
-- Table structure for tb_resume
-- ----------------------------
DROP TABLE IF EXISTS `tb_resume`;
CREATE TABLE `tb_resume` (
  `username` varchar(40) NOT NULL,
  `chname` varchar(40) DEFAULT NULL,
  `ginder` varchar(10) DEFAULT NULL,
  `birth` varchar(40) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `town` varchar(20) DEFAULT NULL,
  `career` varchar(100) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `track` varchar(40) DEFAULT NULL,
  `project` varchar(200) DEFAULT NULL,
  `skill` varchar(40) DEFAULT NULL,
  `joblocation1` varchar(20) DEFAULT NULL,
  `joblocation2` varchar(20) DEFAULT NULL,
  `joblocation3` varchar(20) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`username`),
  CONSTRAINT `fk` FOREIGN KEY (`username`) REFERENCES `tb_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_resume
-- ----------------------------
INSERT INTO `tb_resume` VALUES ('Dodd', 'Dodd', 'male', '2016-01-01', '15381422278', 'é’å²›å¤§å­¦', 'å±±ä¸œçœ', 'é’å²›å¸‚', 'å´‚å±±åŒº', 'JAVA', 'OS', 'Open Source Track', 'JAVA IS A GOOD LG', 'PHP', 'beijing', 'beijing', 'beijing', 'null');

-- ----------------------------
-- Table structure for tb_submit
-- ----------------------------
DROP TABLE IF EXISTS `tb_submit`;
CREATE TABLE `tb_submit` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(40) NOT NULL,
  `sub_time` datetime NOT NULL,
  `fb_id` int(11) NOT NULL,
  `groups` text,
  PRIMARY KEY (`sub_id`),
  KEY `SUB_FB` (`fb_id`),
  KEY `SUB_US` (`user_id`),
  CONSTRAINT `SUB_FB` FOREIGN KEY (`fb_id`) REFERENCES `tb_feedbacks` (`fb_id`),
  CONSTRAINT `SUB_US` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_submit
-- ----------------------------
INSERT INTO `tb_submit` VALUES ('1', 'Dodd', '2016-01-08 00:32:34', '2', 'null');
INSERT INTO `tb_submit` VALUES ('2', 'Dodd', '2016-01-08 00:32:56', '1', '.Net class1');

-- ----------------------------
-- Table structure for tb_sub_detail
-- ----------------------------
DROP TABLE IF EXISTS `tb_sub_detail`;
CREATE TABLE `tb_sub_detail` (
  `sub_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `ans` text,
  `ans_id` int(11) DEFAULT NULL,
  KEY `SUB_DET` (`sub_id`),
  KEY `DET_PRO` (`pro_id`),
  CONSTRAINT `DET_PRO` FOREIGN KEY (`pro_id`) REFERENCES `tb_problems` (`pro_id`),
  CONSTRAINT `SUB_DET` FOREIGN KEY (`sub_id`) REFERENCES `tb_submit` (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_sub_detail
-- ----------------------------
INSERT INTO `tb_sub_detail` VALUES ('1', '1', null, '3');
INSERT INTO `tb_sub_detail` VALUES ('1', '2', null, '6');
INSERT INTO `tb_sub_detail` VALUES ('1', '3', null, '11');
INSERT INTO `tb_sub_detail` VALUES ('1', '4', null, '17');
INSERT INTO `tb_sub_detail` VALUES ('1', '5', null, '23');
INSERT INTO `tb_sub_detail` VALUES ('1', '6', null, '27');
INSERT INTO `tb_sub_detail` VALUES ('1', '7', null, '32');
INSERT INTO `tb_sub_detail` VALUES ('1', '8', null, '39');
INSERT INTO `tb_sub_detail` VALUES ('1', '9', null, '43');
INSERT INTO `tb_sub_detail` VALUES ('1', '10', 'HGFDH', null);
INSERT INTO `tb_sub_detail` VALUES ('2', '1', null, '3');
INSERT INTO `tb_sub_detail` VALUES ('2', '2', null, '8');
INSERT INTO `tb_sub_detail` VALUES ('2', '3', null, '12');
INSERT INTO `tb_sub_detail` VALUES ('2', '4', null, '16');
INSERT INTO `tb_sub_detail` VALUES ('2', '5', null, '21');
INSERT INTO `tb_sub_detail` VALUES ('2', '6', null, '26');
INSERT INTO `tb_sub_detail` VALUES ('2', '7', null, '32');
INSERT INTO `tb_sub_detail` VALUES ('2', '8', null, '38');
INSERT INTO `tb_sub_detail` VALUES ('2', '9', null, '42');
INSERT INTO `tb_sub_detail` VALUES ('2', '10', '', null);

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `user_id` varchar(40) NOT NULL,
  `user_pwd` varchar(40) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_img` text,
  `user_identity` varchar(20) DEFAULT NULL,
  `user_regdate` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES ('Dodd', '123456', 'Dodd@Dodd2014.com', null, 'admin', '2016-01-08 00:24:23');
INSERT INTO `tb_users` VALUES ('hr', '123456', 'traininglab@sina.com', null, 'hr', '2016-01-01 00:41:43');
INSERT INTO `tb_users` VALUES ('teacher', '123456', '291106637@qq.com', null, 'teacher', '2016-01-08 03:40:40');
