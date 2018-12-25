/*
Navicat MySQL Data Transfer

Source Server         : 120.79.34.118
Source Server Version : 50720
Source Host           : 120.79.34.118:3306
Source Database       : hysy

Target Server Type    : MYSQL
Target Server Version : 50720
File Encoding         : 65001

Date: 2018-11-22 09:03:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yx_ad
-- ----------------------------
DROP TABLE IF EXISTS `yx_ad`;
CREATE TABLE `yx_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(100) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `imgsrc` varchar(100) DEFAULT NULL,
  `url` varchar(150) NOT NULL,
  `is_show` int(11) DEFAULT '1',
  `addtime` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `orderby` int(11) DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COMMENT='banner图表';

-- ----------------------------
-- Records of yx_ad
-- ----------------------------
INSERT INTO `yx_ad` VALUES ('38', '首页广告1', '', '', '/Public/Uploads/ad/2018-01-24/5a67e0dd313c8.jpg', '', '1', '1516757213', '3', '50');
INSERT INTO `yx_ad` VALUES ('82', '232', null, null, '/Public/Uploads/ad/2018-01-24/5a67e0e71e550.jpg', '', '1', '1516757223', '3', '50');
INSERT INTO `yx_ad` VALUES ('97', '关于我们', null, null, '/Public/Uploads/ad/2018-01-24/5a67e0f5c8f28.jpg', '', '1', '1516757237', '11', '50');
INSERT INTO `yx_ad` VALUES ('98', '合作', null, null, '/Public/Uploads/ad/2018-01-24/5a67e103b32b4.jpg', '', '1', '1516757251', '12', '50');
INSERT INTO `yx_ad` VALUES ('99', '商品展示', null, null, '/Public/Uploads/ad/2018-01-24/5a67e11ab7e29.jpg', '', '1', '1516757274', '13', '50');
INSERT INTO `yx_ad` VALUES ('100', '新闻中心', null, null, '/Public/Uploads/ad/2018-01-24/5a67e146aad3a.jpg', '', '1', '1516757318', '14', '50');
INSERT INTO `yx_ad` VALUES ('101', '招聘', null, null, '/Public/Uploads/ad/2018-01-24/5a67e1580c60b.jpg', '', '1', '1516757336', '15', '50');
INSERT INTO `yx_ad` VALUES ('102', '联系我们', null, null, '/Public/Uploads/ad/2018-01-24/5a67e1679aede.jpg', '', '1', '1516757351', '16', '50');

-- ----------------------------
-- Table structure for yx_ad_position
-- ----------------------------
DROP TABLE IF EXISTS `yx_ad_position`;
CREATE TABLE `yx_ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='banner图位置表';

-- ----------------------------
-- Records of yx_ad_position
-- ----------------------------
INSERT INTO `yx_ad_position` VALUES ('3', '首页', '1516081356');
INSERT INTO `yx_ad_position` VALUES ('11', '关于我们', '1516757130');
INSERT INTO `yx_ad_position` VALUES ('12', '品牌合作展示', '1516757145');
INSERT INTO `yx_ad_position` VALUES ('13', '商品展示', '1516757159');
INSERT INTO `yx_ad_position` VALUES ('14', '新闻中心', '1516757173');
INSERT INTO `yx_ad_position` VALUES ('15', '人才招聘', '1516757183');
INSERT INTO `yx_ad_position` VALUES ('16', '联系我们', '1516757192');

-- ----------------------------
-- Table structure for yx_admin
-- ----------------------------
DROP TABLE IF EXISTS `yx_admin`;
CREATE TABLE `yx_admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `lastlogin` int(11) DEFAULT NULL,
  `lastip` varchar(50) DEFAULT NULL,
  `addtime` int(11) NOT NULL,
  `thislogin` int(11) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of yx_admin
-- ----------------------------
INSERT INTO `yx_admin` VALUES ('1', 'admin', '0192023a7bbd73250516f069df18b500', '1542848194', '183.17.126.85', '1515462410', '1495550263');
INSERT INTO `yx_admin` VALUES ('2', 'root', 'aa7e04700ebc27c23171976be4313bf4', null, null, '1515484951', null);

-- ----------------------------
-- Table structure for yx_article
-- ----------------------------
DROP TABLE IF EXISTS `yx_article`;
CREATE TABLE `yx_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `imgsrc` varchar(100) DEFAULT NULL,
  `is_floor` smallint(5) DEFAULT '1',
  `is_index` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0为否 1为是',
  `addtime` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `orderby` smallint(6) DEFAULT '50',
  `click` int(11) NOT NULL DEFAULT '10',
  `url` varchar(255) DEFAULT NULL,
  `thumb` varchar(150) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  `contents` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=414 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of yx_article
-- ----------------------------
INSERT INTO `yx_article` VALUES ('399', 'XX家居保姆或有望纳入特快入境移民范畴', 'XX称，金牌橱柜前几年推出了网上商城，除了自己公司品牌以外，还链接到各个地方的加盟商，还针对网购建立了一个子品牌—“居家”', '&lt;h1&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;报道，针对XX联邦政府计划改革家居保姆计划(Live-in\r\n Caregiver Program，简称LCP)，可能将家居保姆由明年1月起纳入新的“特快入境”(Express \r\nEntry，简称EE)移民制度之下。加国家居保姆日前召开记者会，要求联邦政府公开咨询，未来把家居保姆纳入技术移民类别，凡是获准申请人士，给予他们永久居民资格。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　XX家庭劳工协会(West Coast Domestic Workers&amp;#39; Association，简称WCDWA)行政总监林XX表示，XX联邦公民及移民部(CIC)指有家居保姆为自己亲友工作，LCP已被利用成为家庭团聚计划的后门，根本没有证据支持。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　她说，即使家居保姆合法申请为加国亲人工作，也无任何不妥，因为亲人自然较信任自己人帮忙照顾长者或子女。目前家居保母在服务两年后，才可申请成为永久居民，加上申请需轮候39个月，平均拿到身份要5到6年。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　据CBC电视报道，有团体指CIC部长亚历山大(Chris\r\n \r\nAlexander)计划将家居保母自明年1月起纳入新的EE制度，但亚历山大未明确表态，仅说无论未来计划如何，至少目前LCP仍可行。亚历山大说：“CIC今年已加快处理申请积压案件，目前达1.75万个，可说史无前例。”&lt;/span&gt;&lt;/h1&gt;', '/Public/Uploads/article/2018-01-29/5a6ebc24d9847.jpg', '1', '1', '1517206564', '151', '50', '12', null, null, null, '');
INSERT INTO `yx_article` VALUES ('400', '智能家居掀起“平台之战” 发展障碍亟待破除', 'XX称，金牌橱柜前几年推出了网上商城，除了自己公司品牌以外，还链接到各个地方的加盟商，还针对网购建立了一个子品牌—“居家”', '&lt;h1&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;报道，针对XX联邦政府计划改革家居保姆计划(Live-in\r\n Caregiver Program，简称LCP)，可能将家居保姆由明年1月起纳入新的“特快入境”(Express \r\nEntry，简称EE)移民制度之下。加国家居保姆日前召开记者会，要求联邦政府公开咨询，未来把家居保姆纳入技术移民类别，凡是获准申请人士，给予他们永久居民资格。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　XX家庭劳工协会(West Coast Domestic Workers&amp;#39; Association，简称WCDWA)行政总监林XX表示，XX联邦公民及移民部(CIC)指有家居保姆为自己亲友工作，LCP已被利用成为家庭团聚计划的后门，根本没有证据支持。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　她说，即使家居保姆合法申请为加国亲人工作，也无任何不妥，因为亲人自然较信任自己人帮忙照顾长者或子女。目前家居保母在服务两年后，才可申请成为永久居民，加上申请需轮候39个月，平均拿到身份要5到6年。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　据CBC电视报道，有团体指CIC部长亚历山大(Chris\r\n \r\nAlexander)计划将家居保母自明年1月起纳入新的EE制度，但亚历山大未明确表态，仅说无论未来计划如何，至少目前LCP仍可行。亚历山大说：“CIC今年已加快处理申请积压案件，目前达1.75万个，可说史无前例。”&lt;/span&gt;&lt;/h1&gt;', '/Public/Uploads/article/2018-01-29/5a6ebc24d9847.jpg', '1', '1', '1516415895', '152', '50', '22', null, null, null, null);
INSERT INTO `yx_article` VALUES ('401', '节后家居行业促销方式 商家大打“贴心”牌', 'XX称，金牌橱柜前几年推出了网上商城，除了自己公司品牌以外，还链接到各个地方的加盟商，还针对网购建立了一个子品牌—“居家”', '&lt;h1&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;报道，针对XX联邦政府计划改革家居保姆计划(Live-in\r\n Caregiver Program，简称LCP)，可能将家居保姆由明年1月起纳入新的“特快入境”(Express \r\nEntry，简称EE)移民制度之下。加国家居保姆日前召开记者会，要求联邦政府公开咨询，未来把家居保姆纳入技术移民类别，凡是获准申请人士，给予他们永久居民资格。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　XX家庭劳工协会(West Coast Domestic Workers&amp;#39; Association，简称WCDWA)行政总监林XX表示，XX联邦公民及移民部(CIC)指有家居保姆为自己亲友工作，LCP已被利用成为家庭团聚计划的后门，根本没有证据支持。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　她说，即使家居保姆合法申请为加国亲人工作，也无任何不妥，因为亲人自然较信任自己人帮忙照顾长者或子女。目前家居保母在服务两年后，才可申请成为永久居民，加上申请需轮候39个月，平均拿到身份要5到6年。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　据CBC电视报道，有团体指CIC部长亚历山大(Chris\r\n \r\nAlexander)计划将家居保母自明年1月起纳入新的EE制度，但亚历山大未明确表态，仅说无论未来计划如何，至少目前LCP仍可行。亚历山大说：“CIC今年已加快处理申请积压案件，目前达1.75万个，可说史无前例。”&lt;/span&gt;&lt;/h1&gt;', '/Public/Uploads/article/2018-01-29/5a6ebc24d9847.jpg', '1', '1', '1516415914', '151', '50', '22', null, null, null, null);
INSERT INTO `yx_article` VALUES ('402', '网友支持率最高的10种家居装饰小招 快来学起', 'XX称，金牌橱柜前几年推出了网上商城，除了自己公司品牌以外，还链接到各个地方的加盟商，还针对网购建立了一个子品牌—“居家”', '&lt;h1&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;报道，针对XX联邦政府计划改革家居保姆计划(Live-in\r\n Caregiver Program，简称LCP)，可能将家居保姆由明年1月起纳入新的“特快入境”(Express \r\nEntry，简称EE)移民制度之下。加国家居保姆日前召开记者会，要求联邦政府公开咨询，未来把家居保姆纳入技术移民类别，凡是获准申请人士，给予他们永久居民资格。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　XX家庭劳工协会(West Coast Domestic Workers&amp;#39; Association，简称WCDWA)行政总监林XX表示，XX联邦公民及移民部(CIC)指有家居保姆为自己亲友工作，LCP已被利用成为家庭团聚计划的后门，根本没有证据支持。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　她说，即使家居保姆合法申请为加国亲人工作，也无任何不妥，因为亲人自然较信任自己人帮忙照顾长者或子女。目前家居保母在服务两年后，才可申请成为永久居民，加上申请需轮候39个月，平均拿到身份要5到6年。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　据CBC电视报道，有团体指CIC部长亚历山大(Chris\r\n \r\nAlexander)计划将家居保母自明年1月起纳入新的EE制度，但亚历山大未明确表态，仅说无论未来计划如何，至少目前LCP仍可行。亚历山大说：“CIC今年已加快处理申请积压案件，目前达1.75万个，可说史无前例。”&lt;/span&gt;&lt;/h1&gt;', '/Public/Uploads/article/2018-01-29/5a6ebc24d9847.jpg', '1', '1', '1516415932', '152', '50', '46', null, null, null, null);
INSERT INTO `yx_article` VALUES ('403', '地毯搭配技巧 家居软装增添层次感', 'XX称，金牌橱柜前几年推出了网上商城，除了自己公司品牌以外，还链接到各个地方的加盟商，还针对网购建立了一个子品牌—“居家”', '&lt;h1&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;报道，针对XX联邦政府计划改革家居保姆计划(Live-in\r\n Caregiver Program，简称LCP)，可能将家居保姆由明年1月起纳入新的“特快入境”(Express \r\nEntry，简称EE)移民制度之下。加国家居保姆日前召开记者会，要求联邦政府公开咨询，未来把家居保姆纳入技术移民类别，凡是获准申请人士，给予他们永久居民资格。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　XX家庭劳工协会(West Coast Domestic Workers&amp;#39; Association，简称WCDWA)行政总监林XX表示，XX联邦公民及移民部(CIC)指有家居保姆为自己亲友工作，LCP已被利用成为家庭团聚计划的后门，根本没有证据支持。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　她说，即使家居保姆合法申请为加国亲人工作，也无任何不妥，因为亲人自然较信任自己人帮忙照顾长者或子女。目前家居保母在服务两年后，才可申请成为永久居民，加上申请需轮候39个月，平均拿到身份要5到6年。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　据CBC电视报道，有团体指CIC部长亚历山大(Chris\r\n \r\nAlexander)计划将家居保母自明年1月起纳入新的EE制度，但亚历山大未明确表态，仅说无论未来计划如何，至少目前LCP仍可行。亚历山大说：“CIC今年已加快处理申请积压案件，目前达1.75万个，可说史无前例。”&lt;/span&gt;&lt;/h1&gt;', '/Public/Uploads/article/2018-01-29/5a6ebc24d9847.jpg', '1', '1', '1516415949', '151', '50', '13', null, null, null, null);
INSERT INTO `yx_article` VALUES ('404', '中XX涉足物联网拟落子智能家居', 'XX称，金牌橱柜前几年推出了网上商城，除了自己公司品牌以外，还链接到各个地方的加盟商，还针对网购建立了一个子品牌—“居家”', '&lt;h1&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;报道，针对XX联邦政府计划改革家居保姆计划(Live-in\r\n Caregiver Program，简称LCP)，可能将家居保姆由明年1月起纳入新的“特快入境”(Express \r\nEntry，简称EE)移民制度之下。加国家居保姆日前召开记者会，要求联邦政府公开咨询，未来把家居保姆纳入技术移民类别，凡是获准申请人士，给予他们永久居民资格。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　XX家庭劳工协会(West Coast Domestic Workers&amp;#39; Association，简称WCDWA)行政总监林XX表示，XX联邦公民及移民部(CIC)指有家居保姆为自己亲友工作，LCP已被利用成为家庭团聚计划的后门，根本没有证据支持。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　她说，即使家居保姆合法申请为加国亲人工作，也无任何不妥，因为亲人自然较信任自己人帮忙照顾长者或子女。目前家居保母在服务两年后，才可申请成为永久居民，加上申请需轮候39个月，平均拿到身份要5到6年。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　据CBC电视报道，有团体指CIC部长亚历山大(Chris\r\n \r\nAlexander)计划将家居保母自明年1月起纳入新的EE制度，但亚历山大未明确表态，仅说无论未来计划如何，至少目前LCP仍可行。亚历山大说：“CIC今年已加快处理申请积压案件，目前达1.75万个，可说史无前例。”&lt;/span&gt;&lt;/h1&gt;', '/Public/Uploads/article/2018-01-29/5a6ebc24d9847.jpg', '1', '1', '1516415964', '152', '50', '14', null, null, null, null);
INSERT INTO `yx_article` VALUES ('405', '亿元智能家居免费送 XX迎接家居新时代', 'XX称，金牌橱柜前几年推出了网上商城，除了自己公司品牌以外，还链接到各个地方的加盟商，还针对网购建立了一个子品牌—“居家”', '&lt;h1&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;报道，针对XX联邦政府计划改革家居保姆计划(Live-in\r\n Caregiver Program，简称LCP)，可能将家居保姆由明年1月起纳入新的“特快入境”(Express \r\nEntry，简称EE)移民制度之下。加国家居保姆日前召开记者会，要求联邦政府公开咨询，未来把家居保姆纳入技术移民类别，凡是获准申请人士，给予他们永久居民资格。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　XX家庭劳工协会(West Coast Domestic Workers&amp;#39; Association，简称WCDWA)行政总监林XX表示，XX联邦公民及移民部(CIC)指有家居保姆为自己亲友工作，LCP已被利用成为家庭团聚计划的后门，根本没有证据支持。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　她说，即使家居保姆合法申请为加国亲人工作，也无任何不妥，因为亲人自然较信任自己人帮忙照顾长者或子女。目前家居保母在服务两年后，才可申请成为永久居民，加上申请需轮候39个月，平均拿到身份要5到6年。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　据CBC电视报道，有团体指CIC部长亚历山大(Chris\r\n \r\nAlexander)计划将家居保母自明年1月起纳入新的EE制度，但亚历山大未明确表态，仅说无论未来计划如何，至少目前LCP仍可行。亚历山大说：“CIC今年已加快处理申请积压案件，目前达1.75万个，可说史无前例。”&lt;/span&gt;&lt;/h1&gt;', '/Public/Uploads/article/2018-01-29/5a6ebc24d9847.jpg', '1', '1', '1516415989', '151', '50', '10', null, null, null, null);
INSERT INTO `yx_article` VALUES ('406', '家居装修效果图 让家成为幸福之地', 'XX称，金牌橱柜前几年推出了网上商城，除了自己公司品牌以外，还链接到各个地方的加盟商，还针对网购建立了一个子品牌—“居家”', '&lt;h1&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;报道，针对XX联邦政府计划改革家居保姆计划(Live-in\r\n Caregiver Program，简称LCP)，可能将家居保姆由明年1月起纳入新的“特快入境”(Express \r\nEntry，简称EE)移民制度之下。加国家居保姆日前召开记者会，要求联邦政府公开咨询，未来把家居保姆纳入技术移民类别，凡是获准申请人士，给予他们永久居民资格。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　XX家庭劳工协会(West Coast Domestic Workers&amp;#39; Association，简称WCDWA)行政总监林XX表示，XX联邦公民及移民部(CIC)指有家居保姆为自己亲友工作，LCP已被利用成为家庭团聚计划的后门，根本没有证据支持。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　她说，即使家居保姆合法申请为加国亲人工作，也无任何不妥，因为亲人自然较信任自己人帮忙照顾长者或子女。目前家居保母在服务两年后，才可申请成为永久居民，加上申请需轮候39个月，平均拿到身份要5到6年。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　据CBC电视报道，有团体指CIC部长亚历山大(Chris\r\n \r\nAlexander)计划将家居保母自明年1月起纳入新的EE制度，但亚历山大未明确表态，仅说无论未来计划如何，至少目前LCP仍可行。亚历山大说：“CIC今年已加快处理申请积压案件，目前达1.75万个，可说史无前例。”&lt;/span&gt;&lt;/h1&gt;', '/Public/Uploads/article/2018-01-29/5a6ebc24d9847.jpg', '1', '1', '1516416005', '152', '50', '24', null, null, null, null);
INSERT INTO `yx_article` VALUES ('410', '组织架构', '一家依托科技信息创新迅速发展的运动服饰集团', '&lt;p&gt;BABY ANGLE是一家跨境保税领域的B2B电商，目前集中澳洲、新西兰、美国等多地的一手货源，实现从国外到国内终端的物流、仓储、清关、配送、售后等所有环节，为客户提供省事省力又省心的采购体验。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年2月----BABY ANGLE正式成立&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年5月---BABY ANGLE确定报税领域B2B的战略方向，并成为N多品牌的授权代理商。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年10月----BABY ANGLE正式运作跨境保税领域的B2B项目。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2017年11月----BABY ANGLE全年销售达到一亿值&lt;/p&gt;&lt;p style=&quot;margin-top: 20px;&quot;&gt;2017年12月---BABY ANGLE确定增加B2B2C的新战略方向，在重庆建立保税仓&lt;/p&gt;', '/Public/Uploads/article/2018-01-24/5a67e8e9466f6.jpg', '1', '1', '1516759464', '148', '50', '10', null, null, null, '');
INSERT INTO `yx_article` VALUES ('411', '企业资质', '一家依托科技信息创新迅速发展的运动服饰集团', '&lt;p&gt;BABY ANGLE是一家跨境保税领域的B2B电商，目前集中澳洲、新西兰、美国等多地的一手货源，实现从国外到国内终端的物流、仓储、清关、配送、售后等所有环节，为客户提供省事省力又省心的采购体验。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年2月----BABY ANGLE正式成立&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年5月---BABY ANGLE确定报税领域B2B的战略方向，并成为N多品牌的授权代理商。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年10月----BABY ANGLE正式运作跨境保税领域的B2B项目。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2017年11月----BABY ANGLE全年销售达到一亿值&lt;/p&gt;&lt;p style=&quot;margin-top: 20px;&quot;&gt;2017年12月---BABY ANGLE确定增加B2B2C的新战略方向，在重庆建立保税仓&lt;/p&gt;', '/Public/Uploads/article/2018-01-24/5a67e8e9466f6.jpg', '1', '1', '1516759336', '147', '50', '10', null, null, null, '');
INSERT INTO `yx_article` VALUES ('412', '企业文化', '一家依托科技信息创新迅速发展的运动服饰集团', '&lt;p&gt;BABY ANGLE是一家跨境保税领域的B2B电商，目前集中澳洲、新西兰、美国等多地的一手货源，实现从国外到国内终端的物流、仓储、清关、配送、售后等所有环节，为客户提供省事省力又省心的采购体验。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年2月----BABY ANGLE正式成立&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年5月---BABY ANGLE确定报税领域B2B的战略方向，并成为N多品牌的授权代理商。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年10月----BABY ANGLE正式运作跨境保税领域的B2B项目。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2017年11月----BABY ANGLE全年销售达到一亿值&lt;/p&gt;&lt;p style=&quot;margin-top: 20px;&quot;&gt;2017年12月---BABY ANGLE确定增加B2B2C的新战略方向，在重庆建立保税仓&lt;/p&gt;', '/Public/Uploads/article/2018-01-24/5a67e8e9466f6.jpg', '1', '1', '1516759324', '146', '50', '10', null, null, null, '');
INSERT INTO `yx_article` VALUES ('413', '公司介绍', 'BABY ANGLE是一家跨境保税领域的B2B电商，目前集中澳洲、新西兰、美国等多地的一手货源，实现从国外到国内终端的物流、仓储、清关、配送、售后等所有环节，为客户提供省事省力又省心的采购体验。', '&lt;p&gt;BABY ANGLE是一家跨境保税领域的B2B电商，目前集中澳洲、新西兰、美国等多地的一手货源，实现从国外到国内终端的物流、仓储、清关、配送、售后等所有环节，为客户提供省事省力又省心的采购体验。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年2月----BABY ANGLE正式成立&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年5月---BABY ANGLE确定报税领域B2B的战略方向，并成为N多品牌的授权代理商。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2016年10月----BABY ANGLE正式运作跨境保税领域的B2B项目。&lt;/p&gt;&lt;p style=&quot;margin-top: 20px&quot;&gt;2017年11月----BABY ANGLE全年销售达到一亿值&lt;/p&gt;&lt;p style=&quot;margin-top: 20px;&quot;&gt;2017年12月---BABY ANGLE确定增加B2B2C的新战略方向，在重庆建立保税仓&lt;/p&gt;', '/Public/Uploads/article/2018-01-24/5a67e8e9466f6.jpg', '1', '1', '1517209894', '145', '50', '10', null, null, null, '&lt;p&gt;BABY ANGLE是一家跨境保税领域的B2B电商，目前集中澳洲、新西兰、美国等多地的一手货源，实现从国外到国内终端的物流、仓储、清关、配送、售后等所有环节，为客户提供省事省力又省心的采购体验。&lt;/p&gt;&lt;p&gt;2016年2月----BABY ANGLE正式成立&lt;/p&gt;&lt;p&gt;2016年5月---BABY ANGLE确定报税领域B2B的战略方向，并成为N多品牌的授权代理商。&lt;/p&gt;&lt;p&gt;2016年10月----BABY ANGLE正式运作跨境保税领域的B2B项目。&lt;/p&gt;&lt;p&gt;2017年11月----BABY ANGLE全年销售达到一亿值&lt;/p&gt;&lt;p&gt;2017年12月---BABY ANGLE确定增加B2B2C的新战略方向，在重庆建立保税仓&lt;/p&gt;');

-- ----------------------------
-- Table structure for yx_comment
-- ----------------------------
DROP TABLE IF EXISTS `yx_comment`;
CREATE TABLE `yx_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '应聘职位',
  `username` varchar(50) NOT NULL COMMENT '姓名',
  `sex` varchar(20) NOT NULL COMMENT '性别',
  `birthday` varchar(50) DEFAULT NULL COMMENT '生日',
  `area` varchar(50) DEFAULT NULL COMMENT '籍贯',
  `tel` varchar(50) DEFAULT NULL COMMENT '联系电话',
  `yb` varchar(20) DEFAULT NULL COMMENT '邮编',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `xl` varchar(50) DEFAULT NULL COMMENT '学历',
  `zy` varchar(100) DEFAULT NULL COMMENT '专业',
  `school` varchar(150) DEFAULT NULL COMMENT '学校',
  `address` varchar(200) DEFAULT NULL COMMENT '地址',
  `content` mediumtext COMMENT '所获奖项',
  `content_a` mediumtext COMMENT '工作经历',
  `content_b` mediumtext COMMENT '业余爱好',
  `img` varchar(100) DEFAULT NULL COMMENT '附件/简历',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yx_comment
-- ----------------------------
INSERT INTO `yx_comment` VALUES ('6', '网页设计', 'dsdsf', '男', '2018-04-01', 'dsdd', '15123456789', '000000', '123486488@qq.com', '485158', 'dsfs54', '216516', '235165', '216351', '15', '315365', null, '1524034036');
INSERT INTO `yx_comment` VALUES ('7', '网页设计', 'dsfsd', '男', '2018-03-25', 'ssdfs', '15123456789', '125512', '356821646@qq.com', '2515', '21513', '.21351', '.213513', '.1336', '135135', '213516', null, '1524034084');

-- ----------------------------
-- Table structure for yx_config
-- ----------------------------
DROP TABLE IF EXISTS `yx_config`;
CREATE TABLE `yx_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL COMMENT '网站名称',
  `title` varchar(150) NOT NULL COMMENT '网站标题',
  `description` varchar(255) NOT NULL COMMENT '网站描述',
  `keywords` varchar(255) NOT NULL COMMENT '网站关键字',
  `url` varchar(255) NOT NULL COMMENT '网址',
  `logo` varchar(100) NOT NULL COMMENT '网站logo',
  `address` varchar(150) NOT NULL COMMENT '联系地址',
  `tel` varchar(50) NOT NULL COMMENT '联系电话',
  `addtime` int(11) NOT NULL,
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `records` varchar(100) NOT NULL,
  `sms` varchar(100) NOT NULL COMMENT 'smtp服务器',
  `smdk` varchar(20) NOT NULL COMMENT 'smtp端口',
  `smuser` varchar(100) NOT NULL COMMENT 'smtp用户名',
  `smpwd` varchar(100) NOT NULL COMMENT 'smtp密码',
  `sendemail` varchar(100) NOT NULL COMMENT 'smtp发件人邮件',
  `jieshou` varchar(100) NOT NULL COMMENT '接收者邮件',
  `smname` varchar(100) NOT NULL COMMENT 'smtp发件人',
  `username` varchar(50) NOT NULL COMMENT '联系人',
  `mobile` varchar(50) NOT NULL COMMENT '联系人电话',
  `phone` varchar(50) NOT NULL COMMENT '免费热线',
  `phones` varchar(220) NOT NULL COMMENT '投诉与建议',
  `img` varchar(150) NOT NULL COMMENT '二维码',
  `wx` varchar(150) DEFAULT NULL COMMENT '客服微信',
  `qq` varchar(100) DEFAULT NULL COMMENT '客服qq',
  `footer_logo` varchar(100) DEFAULT NULL COMMENT '底部logo',
  `is_open` tinyint(1) NOT NULL DEFAULT '0' COMMENT '开启邮件 1为开启 0为关闭',
  `yb` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统设置表';

-- ----------------------------
-- Records of yx_config
-- ----------------------------
INSERT INTO `yx_config` VALUES ('1', '合宜思远（北京）科技有限公司', '合宜思远（北京）科技有限公司', '合宜思远（北京）科技有限公司', '合宜思远（北京）科技有限公司', '', '/Public/Uploads/config/2018-01-24/5a67db6caa2c1.png', '北京市区云城西路11地中心45层', '400-12345678', '1517369967', '13553715883@163.com', '粤ICP备123456号', '', '', '', '', '', '', '', '周先生', '18928499366 (与微信同号) ', '020-86555049/66378851', '020-66378850/66378851', '/Public/Uploads/config/2018-01-24/5a67dc6ab3944.jpg', 'aaaaaa', '12345678', '/Public/Uploads/config/2018-01-24/5a67dc6ab0293.jpg', '0', '510000');

-- ----------------------------
-- Table structure for yx_friendlink
-- ----------------------------
DROP TABLE IF EXISTS `yx_friendlink`;
CREATE TABLE `yx_friendlink` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `imgsrc` varchar(100) DEFAULT NULL,
  `url` varchar(150) NOT NULL,
  `addtime` int(11) NOT NULL,
  `is_show` int(10) unsigned DEFAULT '0',
  `orderby` smallint(6) DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='友情链接表';

-- ----------------------------
-- Records of yx_friendlink
-- ----------------------------
INSERT INTO `yx_friendlink` VALUES ('1', '2cat', '/Public/Uploads/friendLink/2018-01-24/5a67e1e7a1d81.jpg', '', '1516757479', '1', '50');
INSERT INTO `yx_friendlink` VALUES ('2', 'gozebra', '/Public/Uploads/friendLink/2018-01-24/5a67e1f24a589.jpg', '', '1516757490', '1', '50');
INSERT INTO `yx_friendlink` VALUES ('3', 'des', '/Public/Uploads/friendLink/2018-01-24/5a67e1fbb0c5c.jpg', '', '1516757499', '1', '50');
INSERT INTO `yx_friendlink` VALUES ('4', 'SDSDF', '/Public/Uploads/friendLink/2018-01-24/5a67e2055ee05.jpg', '', '1516757509', '1', '50');
INSERT INTO `yx_friendlink` VALUES ('5', 'soc', '/Public/Uploads/friendLink/2018-01-24/5a67e20f4716b.jpg', '', '1516757519', '1', '50');
INSERT INTO `yx_friendlink` VALUES ('6', 'leon', '/Public/Uploads/friendLink/2018-01-24/5a67e2170779e.jpg', '', '1516757527', '1', '50');
INSERT INTO `yx_friendlink` VALUES ('7', 'kpyt', '/Public/Uploads/friendLink/2018-01-24/5a67e21f3c91c.jpg', '', '1516757535', '1', '50');
INSERT INTO `yx_friendlink` VALUES ('8', 'paralle', '/Public/Uploads/friendLink/2018-01-24/5a67e2275612c.jpg', '', '1516757543', '1', '50');
INSERT INTO `yx_friendlink` VALUES ('9', 'biz', '/Public/Uploads/friendLink/2018-01-24/5a67e22fc19ce.jpg', '', '1516757551', '1', '50');
INSERT INTO `yx_friendlink` VALUES ('10', 'mi', '/Public/Uploads/friendLink/2018-01-24/5a67e23a4a218.jpg', '', '1516757562', '1', '50');

-- ----------------------------
-- Table structure for yx_goods_pic
-- ----------------------------
DROP TABLE IF EXISTS `yx_goods_pic`;
CREATE TABLE `yx_goods_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pic` varchar(150) NOT NULL,
  `mid_pic` varchar(150) DEFAULT NULL,
  `goods_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yx_goods_pic
-- ----------------------------
INSERT INTO `yx_goods_pic` VALUES ('90', '/Public/Uploads/ProductImg/2018-01-24/5a67eb0c258b5.jpg', null, '49');
INSERT INTO `yx_goods_pic` VALUES ('91', '/Public/Uploads/ProductImg/2018-01-24/5a67eb0c2b677.jpg', null, '49');
INSERT INTO `yx_goods_pic` VALUES ('92', '/Public/Uploads/ProductImg/2018-01-24/5a67eb0c2fcc8.jpg', null, '49');
INSERT INTO `yx_goods_pic` VALUES ('93', '/Public/Uploads/ProductImg/2018-01-24/5a67ebb22e746.jpg', null, '48');
INSERT INTO `yx_goods_pic` VALUES ('94', '/Public/Uploads/ProductImg/2018-01-24/5a67ebb234cd7.jpg', null, '48');
INSERT INTO `yx_goods_pic` VALUES ('95', '/Public/Uploads/ProductImg/2018-01-24/5a67ebc77e962.jpg', null, '47');
INSERT INTO `yx_goods_pic` VALUES ('96', '/Public/Uploads/ProductImg/2018-01-24/5a67ebc782fb3.jpg', null, '47');
INSERT INTO `yx_goods_pic` VALUES ('97', '/Public/Uploads/ProductImg/2018-01-24/5a67ebe005973.jpg', null, '50');
INSERT INTO `yx_goods_pic` VALUES ('98', '/Public/Uploads/ProductImg/2018-01-24/5a67ebe00a795.jpg', null, '50');
INSERT INTO `yx_goods_pic` VALUES ('99', '/Public/Uploads/ProductImg/2018-01-24/5a67ebfd8d036.jpg', null, '51');
INSERT INTO `yx_goods_pic` VALUES ('100', '/Public/Uploads/ProductImg/2018-01-24/5a67ebfd91687.jpg', null, '51');
INSERT INTO `yx_goods_pic` VALUES ('101', '/Public/Uploads/ProductImg/2018-01-24/5a67ec3b46d48.jpg', null, '52');
INSERT INTO `yx_goods_pic` VALUES ('102', '/Public/Uploads/ProductImg/2018-01-24/5a67ec3b4a3f8.jpg', null, '52');
INSERT INTO `yx_goods_pic` VALUES ('103', '/Public/Uploads/ProductImg/2018-01-24/5a67ec3b4daa9.jpg', null, '52');
INSERT INTO `yx_goods_pic` VALUES ('104', '/Public/Uploads/ProductImg/2018-01-24/5a67ec5017066.jpg', null, '53');
INSERT INTO `yx_goods_pic` VALUES ('105', '/Public/Uploads/ProductImg/2018-01-24/5a67ec501c26f.jpg', null, '53');
INSERT INTO `yx_goods_pic` VALUES ('106', '/Public/Uploads/ProductImg/2018-01-24/5a67ec698482d.jpg', null, '54');
INSERT INTO `yx_goods_pic` VALUES ('107', '/Public/Uploads/ProductImg/2018-01-24/5a67ec6987af6.jpg', null, '54');

-- ----------------------------
-- Table structure for yx_message
-- ----------------------------
DROP TABLE IF EXISTS `yx_message`;
CREATE TABLE `yx_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL COMMENT '姓名',
  `tel` varchar(30) NOT NULL COMMENT '电话',
  `email` varchar(100) NOT NULL COMMENT '邮箱',
  `addtime` int(11) NOT NULL,
  `phone` varchar(250) DEFAULT NULL COMMENT '地址',
  `content` text COMMENT '留言内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='留言表';

-- ----------------------------
-- Records of yx_message
-- ----------------------------
INSERT INTO `yx_message` VALUES ('3', '测试一下', '0755-29904913', '123456@qq.com', '1516065119', '15123424234', '这是测试内容！');
INSERT INTO `yx_message` VALUES ('5', '策划四', '15123424234', '12345645@qq.com', '1516267116', null, null);

-- ----------------------------
-- Table structure for yx_nav
-- ----------------------------
DROP TABLE IF EXISTS `yx_nav`;
CREATE TABLE `yx_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `is_show` int(11) NOT NULL DEFAULT '1',
  `orderby` int(11) NOT NULL DEFAULT '50',
  `cat_img` varchar(200) DEFAULT NULL COMMENT '分类图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8 COMMENT='导航表';

-- ----------------------------
-- Records of yx_nav
-- ----------------------------
INSERT INTO `yx_nav` VALUES ('105', '首页', 'index', '0', '1515379236', '1', '1', null);
INSERT INTO `yx_nav` VALUES ('106', '关于我们', 'about', '0', '1516006749', '1', '2', null);
INSERT INTO `yx_nav` VALUES ('107', '商品展示', 'ProductShow', '0', '1516756442', '1', '4', null);
INSERT INTO `yx_nav` VALUES ('108', '商品分类1', '', '107', '1516434374', '1', '50', '/Public/Uploads/Nav/2018-01-20/5a62f3c6382ee.png');
INSERT INTO `yx_nav` VALUES ('109', '新闻中心', 'news', '0', '1516756418', '1', '5', null);
INSERT INTO `yx_nav` VALUES ('127', '商品分类2', '', '107', '1516434362', '1', '50', '/Public/Uploads/Nav/2018-01-20/5a62f3bad5fbd.png');
INSERT INTO `yx_nav` VALUES ('130', '联系我们', 'contact', '0', '1516007213', '1', '50', null);
INSERT INTO `yx_nav` VALUES ('132', '商品分类3', '', '107', '1516434384', '1', '50', '/Public/Uploads/Nav/2018-01-20/5a62f3d0ca154.png');
INSERT INTO `yx_nav` VALUES ('133', '商品分类4', '', '107', '1516434393', '1', '50', '/Public/Uploads/Nav/2018-01-20/5a62f3d9928aa.png');
INSERT INTO `yx_nav` VALUES ('145', '公司介绍', '', '106', '1516756259', '1', '50', null);
INSERT INTO `yx_nav` VALUES ('146', '企业文化', '', '106', '1516756225', '1', '50', null);
INSERT INTO `yx_nav` VALUES ('147', '企业资质', '', '106', '1516756269', '1', '50', null);
INSERT INTO `yx_nav` VALUES ('148', '组织架构', '', '106', '1516756296', '1', '50', null);
INSERT INTO `yx_nav` VALUES ('149', '品牌合作展示', 'Cooperation', '0', '1516756337', '1', '3', null);
INSERT INTO `yx_nav` VALUES ('150', '人才招聘', 'job', '0', '1516756384', '1', '6', null);
INSERT INTO `yx_nav` VALUES ('151', '公司新闻', '', '109', '1516756507', '1', '50', null);
INSERT INTO `yx_nav` VALUES ('152', '行业动态', '', '109', '1516756519', '1', '50', null);

-- ----------------------------
-- Table structure for yx_product
-- ----------------------------
DROP TABLE IF EXISTS `yx_product`;
CREATE TABLE `yx_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `click` tinyint(10) NOT NULL DEFAULT '10' COMMENT '浏览量',
  `addtime` int(11) NOT NULL,
  `is_floor` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `content` text,
  `description` varchar(255) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL COMMENT '型号',
  `brand` varchar(50) DEFAULT NULL COMMENT '品牌',
  `price` varchar(50) DEFAULT NULL COMMENT '造价',
  `is_on_seal` smallint(6) DEFAULT '0' COMMENT '推荐',
  `contents` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COMMENT='产品列表';

-- ----------------------------
-- Records of yx_product
-- ----------------------------
INSERT INTO `yx_product` VALUES ('47', '商品名称1', '44', '1516760007', '1', '108', '/Public/Uploads/Product/2018-01-24/5a67ebc77aec9.jpg', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;', '眼部细致护理，卸净重点彩妆，注入紧致滋润,持久保湿，淡化细纹', 'sp20170256', 'xxxxx', '', '1', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;');
INSERT INTO `yx_product` VALUES ('48', '商品名称2', '94', '1516759986', '1', '127', '/Public/Uploads/Product/2018-01-24/5a67ebb228d6d.jpg', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;', '眼部细致护理，卸净重点彩妆，注入紧致滋润,持久保湿，淡化细纹', 'sp20170256', 'xxxxx', '', '1', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;');
INSERT INTO `yx_product` VALUES ('49', '商品名称3', '44', '1516759820', '1', '132', '/Public/Uploads/Product/2018-01-24/5a67eb0c202c4.jpg', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;', '眼部细致护理，卸净重点彩妆，注入紧致滋润,持久保湿，淡化细纹', 'sp20170256', 'xxxxx', '', '1', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;');
INSERT INTO `yx_product` VALUES ('50', '1111', '15', '1516760031', '1', '108', '/Public/Uploads/Product/2018-01-24/5a67ebdff1aca.jpg', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;', '眼部细致护理，卸净重点彩妆，注入紧致滋润,持久保湿，淡化细纹', 'sp20170256', 'xxxxx', null, '1', null);
INSERT INTO `yx_product` VALUES ('51', '22222', '12', '1516760061', '1', '127', '/Public/Uploads/Product/2018-01-24/5a67ebfd87a45.jpg', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;', '眼部细致护理，卸净重点彩妆，注入紧致滋润,持久保湿，淡化细纹', 'sp20170256', 'xxxxx', null, '1', null);
INSERT INTO `yx_product` VALUES ('52', '3333', '13', '1516760123', '1', '132', '/Public/Uploads/Product/2018-01-24/5a67ec3b41756.jpg', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;', '眼部细致护理，卸净重点彩妆，注入紧致滋润,持久保湿，淡化细纹', 'sp20170256', 'xxxxx', null, '1', null);
INSERT INTO `yx_product` VALUES ('53', '4444', '11', '1516760144', '1', '133', '/Public/Uploads/Product/2018-01-24/5a67ec500fb34.jpg', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;', '眼部细致护理，卸净重点彩妆，注入紧致滋润,持久保湿，淡化细纹', 'sp20170256', 'xxxxx', null, '1', null);
INSERT INTO `yx_product` VALUES ('54', '32112', '13', '1516760169', '1', '108', '/Public/Uploads/Product/2018-01-24/5a67ec697fa0c.jpg', '&lt;p&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;智能家居可以定义为一个过程或者一个系统。利用先进的计算机技术、网络通讯技术、综合布线技术、将与家居生活有关的各种子系统，有机地结合在一起，通过统筹管理，让家居生活更加舒适、安全、有效。与普通家居相比，智能家居不仅具有传统的居住功能，提供舒适安全、高品位且宜人的家庭生活空间;还由原来的被动静止结构转变为具有能动智慧的工具，提供全方位的信息交换功能，帮助家庭与外部保持信息交流畅通，优化人们的生活方式，帮助人们有效安排时间，增强家居生活的安全性，甚至为各种能源费用节约资金。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家具布置顾名思义包括整个家庭的构造，各种装饰用的家居，包括床，书桌，电脑，台灯等等个体，由这一系列的个体构成了整个主体，就形成了温馨的家居环境。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　其中我们必须谈到的就是床上用品，通常有很多的品牌让我们进行选择，同时我们要注意到家居的布置中还需要零零碎碎的打点用品，如咖啡壶，茶具，纸巾盒等等，它们为家居出了微薄的贡献。&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;　　家居中布置需要牢记几大条：&lt;/span&gt;&lt;br/&gt;&lt;span style=&quot;color: rgb(89, 89, 89); font-family: 微软雅黑, &amp;#39;Microsoft YaHei&amp;#39;; font-size: 14px; line-height: 24px; widows: auto; background-color: rgb(255, 255, 255);&quot;&gt;&amp;nbsp;　 &amp;nbsp;家居风水，最佳的方式要根据主人的特点度身定造。在居家布置中，不能犯一些风水上的大忌，否则会住得不舒适，而且对主人会有不利影响&lt;/span&gt;&lt;/p&gt;', '眼部细致护理，卸净重点彩妆，注入紧致滋润,持久保湿，淡化细纹', 'sp20170256', 'xxxxx', null, '1', null);

-- ----------------------------
-- Table structure for yx_seo
-- ----------------------------
DROP TABLE IF EXISTS `yx_seo`;
CREATE TABLE `yx_seo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL COMMENT '标题',
  `description` text NOT NULL COMMENT '描述',
  `keywords` text NOT NULL COMMENT '关键字',
  `addtime` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yx_seo
-- ----------------------------
INSERT INTO `yx_seo` VALUES ('13', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '1516007282', '106');
INSERT INTO `yx_seo` VALUES ('14', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '1515649953', '107');
INSERT INTO `yx_seo` VALUES ('15', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '1515649965', '109');
INSERT INTO `yx_seo` VALUES ('16', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '1515649976', '110');
INSERT INTO `yx_seo` VALUES ('17', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '深圳市华明博机电设备工程有限公司', '1516007657', '130');

-- ----------------------------
-- Table structure for yx_team
-- ----------------------------
DROP TABLE IF EXISTS `yx_team`;
CREATE TABLE `yx_team` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(50) NOT NULL COMMENT '地区',
  `address` varchar(200) NOT NULL COMMENT '详细地址',
  `pic` varchar(100) NOT NULL COMMENT '头像',
  `addtime` int(11) NOT NULL COMMENT '添加时间',
  `is_floor` tinyint(1) NOT NULL DEFAULT '1',
  `tel` varchar(30) NOT NULL COMMENT '电话',
  `tels` varchar(50) DEFAULT NULL COMMENT '电邮',
  `nicole` varchar(50) DEFAULT NULL COMMENT 'nicole',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yx_team
-- ----------------------------
INSERT INTO `yx_team` VALUES ('3', '香港地址', '香港九龍尖沙咀廣東道9號海港城港威大廈第5座1905室', 'team/2018-01-08/5a53106d22b64.jpg', '1515393133', '1', '+86-755-8230 3069', 'andy@cpc-ep.com', 'lee@cpc-ep.com');
INSERT INTO `yx_team` VALUES ('4', '深圳地址', '深圳市南山區深南大道高新園華潤置地大廈E座32D', 'team/2018-01-08/5a530fcaed869.jpg', '1515393086', '1', '+86-755-8230 3069', 'andy@cpc-ep.com', 'lee@cpc-ep.com');

-- ----------------------------
-- Table structure for yx_zp
-- ----------------------------
DROP TABLE IF EXISTS `yx_zp`;
CREATE TABLE `yx_zp` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL COMMENT '职位名称',
  `cate` char(30) NOT NULL COMMENT '职位类别',
  `address` char(50) NOT NULL COMMENT '工作地点',
  `num` char(20) NOT NULL COMMENT '招聘人数',
  `content` mediumtext NOT NULL COMMENT '职位要求',
  `addtime` int(11) DEFAULT NULL,
  `is_floor` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示 1显示 0不显示',
  `orderby` tinyint(4) NOT NULL DEFAULT '10' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yx_zp
-- ----------------------------
INSERT INTO `yx_zp` VALUES ('1', '网页设计', '设计', '深圳', '5', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;主要工作内容：负责公司界面和公司网站的界面设计等，重视用户体验。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;岗位要求：&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;视觉设计、平面设计或美术相关专业，大专以上学历。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;具有良好的创意设计能力及良好的色彩感，有较高的美术功底，较强的网页设计能力和整体布局感。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;精通photoshop、Illustrator、Fireworks、Dreamweaver等图形设计工具中至少两种。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;了解网页交互设计知识，对作品有不断追求完美的精神特质。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102);&quot;&gt;有网站UI设计同等职位工作经验、能提供过往作品者优先。&lt;/p&gt;', '1512609685', '1', '10');
INSERT INTO `yx_zp` VALUES ('2', '网页设计1', '设计', '深圳', '6', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;主要工作内容：负责公司界面和公司网站的界面设计等，重视用户体验。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;岗位要求：&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;视觉设计、平面设计或美术相关专业，大专以上学历。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;具有良好的创意设计能力及良好的色彩感，有较高的美术功底，较强的网页设计能力和整体布局感。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;精通photoshop、Illustrator、Fireworks、Dreamweaver等图形设计工具中至少两种。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;了解网页交互设计知识，对作品有不断追求完美的精神特质。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102);&quot;&gt;有网站UI设计同等职位工作经验、能提供过往作品者优先。&lt;/p&gt;', '1512609713', '1', '10');
INSERT INTO `yx_zp` VALUES ('3', '网页设计2', '设计', '深圳', '7', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;主要工作内容：负责公司界面和公司网站的界面设计等，重视用户体验。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;岗位要求：&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;视觉设计、平面设计或美术相关专业，大专以上学历。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;具有良好的创意设计能力及良好的色彩感，有较高的美术功底，较强的网页设计能力和整体布局感。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;精通photoshop、Illustrator、Fireworks、Dreamweaver等图形设计工具中至少两种。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;了解网页交互设计知识，对作品有不断追求完美的精神特质。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102);&quot;&gt;有网站UI设计同等职位工作经验、能提供过往作品者优先。&lt;/p&gt;', '1512609717', '1', '10');
INSERT INTO `yx_zp` VALUES ('4', '网页设计3', '设计', '深圳', '8', '&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;主要工作内容：负责公司界面和公司网站的界面设计等，重视用户体验。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;岗位要求：&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;视觉设计、平面设计或美术相关专业，大专以上学历。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;具有良好的创意设计能力及良好的色彩感，有较高的美术功底，较强的网页设计能力和整体布局感。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;精通photoshop、Illustrator、Fireworks、Dreamweaver等图形设计工具中至少两种。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: &quot;&gt;了解网页交互设计知识，对作品有不断追求完美的精神特质。&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(102, 102, 102);&quot;&gt;有网站UI设计同等职位工作经验、能提供过往作品者优先。&lt;/p&gt;', '1512609720', '1', '10');
