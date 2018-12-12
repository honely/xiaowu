/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100135
 Source Host           : localhost:3306
 Source Schema         : ddxx

 Target Server Type    : MySQL
 Target Server Version : 100135
 File Encoding         : 65001

 Date: 12/12/2018 09:41:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dcxw_admin
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_admin`;
CREATE TABLE `dcxw_admin`  (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `ad_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '员工编号',
  `ad_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码',
  `ad_realname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '员工真实姓名',
  `ad_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员邮箱，用于登录',
  `ad_branch` int(10) NULL DEFAULT NULL COMMENT '归属站点，对应站点id',
  `ad_p_id` int(11) NULL DEFAULT NULL COMMENT '管理员省份id',
  `ad_c_id` int(11) NULL DEFAULT NULL COMMENT '管理员城市id',
  `ad_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '管理员手机号，用于登录',
  `ad_qq` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员QQ号码',
  `ad_birth` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '出生年月日',
  `ad_sex` tinyint(2) NULL DEFAULT 3 COMMENT '性别；1 男；2 女； 3 未知',
  `ad_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员图像',
  `ad_createtime` int(11) NULL DEFAULT NULL COMMENT '开通时间',
  `ad_isable` tinyint(2) NULL DEFAULT NULL COMMENT '是否在职 1 在职；2 离职',
  `ad_role` int(11) NULL DEFAULT NULL COMMENT '权限，对应权限的id',
  `ad_admin` int(255) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  PRIMARY KEY (`ad_id`, `ad_phone`, `ad_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_admin
-- ----------------------------
INSERT INTO `dcxw_admin` VALUES (1, '201806010001', 'e10adc3949ba59abbe56e057f20f883e', 'Boss', '1549089944@qq.com', 22, 1, 3, '13572246244', '31123123', '2010-05-18', 1, '/uploads/20180519/9c478cec4a8460e814d8b2a20bb94ae5.jpg', 1525592904, 1, 1, 1);
INSERT INTO `dcxw_admin` VALUES (53, '201809210001', 'e10adc3949ba59abbe56e057f20f883e', '培训专用', '18633335555@qq.com', NULL, 1, 3, '18633335555', NULL, NULL, 1, '/uploads/20180506/2eb695a99f106b4265100dd3d9ebee14.jpg', 1537522261, 1, 27, 1);
INSERT INTO `dcxw_admin` VALUES (54, '201809220001', 'e10adc3949ba59abbe56e057f20f883e', '内部员工管理员', '154@qq.com', NULL, 1, 3, '18566665555', NULL, NULL, 1, '/uploads/20180506/2eb695a99f106b4265100dd3d9ebee14.jpg', 1537601212, 1, 28, 1);
INSERT INTO `dcxw_admin` VALUES (55, '201809290001', 'e10adc3949ba59abbe56e057f20f883e', '王丽莎', '15990154780@qq.com', NULL, 1, 3, '15990154780', NULL, NULL, 2, '/uploads/20180506/2eb695a99f106b4265100dd3d9ebee14.jpg', 1538189020, 1, 28, 1);
INSERT INTO `dcxw_admin` VALUES (56, '201809290002', 'e10adc3949ba59abbe56e057f20f883e', '王艳梅', '13038106585@qq.com', NULL, 1, 3, '13038106585', NULL, NULL, 1, '/uploads/20180506/2eb695a99f106b4265100dd3d9ebee14.jpg', 1538189105, 1, 28, 1);

-- ----------------------------
-- Table structure for dcxw_alisign
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_alisign`;
CREATE TABLE `dcxw_alisign`  (
  `ali_sign_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '阿里短信签名id',
  `ali_sign_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '阿里短信签名名称',
  `ali_sign_remarks` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '描述说明',
  `ali_sign_addtime` int(11) NULL DEFAULT NULL COMMENT '签名添加时间',
  `ali_sign_admin` int(10) NULL DEFAULT NULL COMMENT '添加人',
  `ali_sign_able` tinyint(2) NULL DEFAULT NULL COMMENT '是否可用 1 是  2  否',
  PRIMARY KEY (`ali_sign_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '阿里云短信签名' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_area
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_area`;
CREATE TABLE `dcxw_area`  (
  `area_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '县区表自增id',
  `area_p_id` int(10) NULL DEFAULT NULL,
  `area_c_id` int(10) NULL DEFAULT NULL,
  `area_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `area_isable` tinyint(2) NULL DEFAULT NULL,
  `area_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '生成房源编号用的区域编码',
  `area_addtime` int(11) NULL DEFAULT NULL COMMENT '添加操作时间',
  `area_admin` int(11) NULL DEFAULT NULL COMMENT '管理员id',
  PRIMARY KEY (`area_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_area
-- ----------------------------
INSERT INTO `dcxw_area` VALUES (3, 1, 3, '未央区', NULL, '11', 1541389158, 1);
INSERT INTO `dcxw_area` VALUES (4, 1, 3, '新城区', NULL, '15', 1541389212, 1);
INSERT INTO `dcxw_area` VALUES (5, 1, 3, '碑林区', NULL, '10', 1541389150, 1);
INSERT INTO `dcxw_area` VALUES (6, 1, 3, '莲湖区', NULL, '14', 1541389202, 1);
INSERT INTO `dcxw_area` VALUES (7, 1, 3, '雁塔区', NULL, '16', 1541389219, 1);
INSERT INTO `dcxw_area` VALUES (8, 1, 3, '灞桥区', NULL, '13', 1541389170, 1);
INSERT INTO `dcxw_area` VALUES (10, 4, 55, '青羊区', NULL, '21', 1541389227, 1);
INSERT INTO `dcxw_area` VALUES (11, 1, 3, '长安区', NULL, '12', 1541389164, 1);
INSERT INTO `dcxw_area` VALUES (12, 4, 55, '武侯区', NULL, '55', 1541389329, 1);

-- ----------------------------
-- Table structure for dcxw_article
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_article`;
CREATE TABLE `dcxw_article`  (
  `art_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `art_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文章编号。系统还是能成的编号，规则同客户编号生成规则',
  `art_p_id` int(10) NULL DEFAULT NULL COMMENT '文章省份',
  `art_c_id` int(10) NULL DEFAULT NULL COMMENT '文章城市',
  `art_b_id` int(10) NULL DEFAULT NULL COMMENT '文章站点',
  `art_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关键词 同seo关键词',
  `art_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章标题 同seo标题',
  `art_subtitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '文章子标题 同seo 描述',
  `art_type` tinyint(2) NULL DEFAULT NULL COMMENT '文章分类：1.房租优势；2精彩瞬间，3企业优势，4.小屋快讯，5.装修风格',
  `art_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '文章封面图',
  `art_img_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '封面图alt',
  `art_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '文章内容',
  `art_createtime` int(11) NULL DEFAULT NULL COMMENT '添加时间',
  `art_updatetime` int(10) NULL DEFAULT NULL COMMENT '更新时间',
  `art_view` int(11) NULL DEFAULT 0 COMMENT '浏览量',
  `art_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示，1是，2否',
  `art_istop` tinyint(2) NULL DEFAULT 2 COMMENT '是否置顶，1是，2否',
  `art_admin` int(10) NULL DEFAULT NULL COMMENT '发布人，对应管理员的id',
  PRIMARY KEY (`art_id`, `art_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 106 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '文章' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_article
-- ----------------------------
INSERT INTO `dcxw_article` VALUES (97, '201809140001', 0, 0, 0, '房租优势,', '房租优势', '大城小屋用心走访房屋周边，通过数据对比，直击租房底价。让租价大众化、亲民化，力争给想要租房的你一个温馨、合适、放心、安全的居住之所。', 1, '/uploads/article/20181009/d88884bd8a84742d7eeb91731ad2f395.jpg', '123', '<p><img src=\"/uploads/20180921/2efc5ba3cac54db51c7fcb906be4e052.jpg\" alt=\"undefined\"/></p><p style=\"text-align: right; \">&nbsp; <span style=\"text-align: right;\">陕西大城小屋不动产管理有限公司</span></p>', 1536888470, 1539224941, 121, 1, 1, 1);
INSERT INTO `dcxw_article` VALUES (98, '201809140002', NULL, NULL, NULL, '装修风格', '装修风格', '自定义多种生活场景，前期通过装修（硬装）定性整体造型，后期软装饰品进场确定风格特点，多个设备的控制，从此告别繁琐传感联动控制用户自由组合设备联动构建属于自己的个性化生活方式。', 5, '/uploads/article/20181009/0ab593d2a9824f93d8f6ef02ffd8786e.jpg', '123', '<p class=\"MsoNormal\"><br/></p><p><br/></p><p><br/></p><p><br/></p><p style=\"text-align: center;\">北欧风格的优点在于兼顾不同人士对家居的审美追求</p><p style=\"text-align: center;\">其人性化的设计、周全的思想、无微不至的理念</p><p style=\"text-align: center;\">将整体家居舒适性和便捷性展现的淋漓尽致</p><p style=\"text-align: center;\"><img src=\"/uploads/20180921/34063de391a444aae50c604d3e84b91e.jpg\" alt=\"undefined\"/><br/></p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\">在这个生活水准越来越高的时代</p><p style=\"text-align: center;\">北欧式的装修更是迎合了当下人们对于艺术的追捧</p><p style=\"text-align: center;\">不但具现出室内古朴典雅和简洁明快</p><p style=\"text-align: center;\">同时也调和了世界前沿的时尚文化。</p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/20180921/a328059755801f39a4637d961989fb04.png\" alt=\"undefined\"/><br/></p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\">高端后现代风格囊括了软装搭配、家具设计、空间布局等多个方面</p><p style=\"text-align: center;\">北欧现代风格在注重生活品位的同时还注重健康时尚</p><p style=\"text-align: center;\">注重合理节约科学消费</p><p style=\"text-align: center;\">以简洁时尚的视觉效果营造出时尚前卫的感觉。</p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/20180921/afa8af3f667558bacb0acaff98caec10.jpg\" alt=\"undefined\"/><br/></p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\">中端后现代风格是注重人与自然、社会、与环境的有机的科学的结合</p><p style=\"text-align: center;\">它的身上集中体现了绿色设计、环保设计、可持续发展设计的理念</p><p style=\"text-align: center;\">它显示了对手工艺传统和天然材料的尊重与偏爱，它在形式上更为柔和与有机。</p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: right;\">陕西大城小屋不动产管理有限公司</p>', 1536888692, 1539051385, 63, 1, 2, 1);
INSERT INTO `dcxw_article` VALUES (99, '201809140003', NULL, NULL, NULL, '企业优势', '企业优势', '大城小屋拥有完善的部门配备、精良的基础设施、以及领先同业的运营理念，成熟的公司管理机制使得各部门能明确自身的职责范围，也能有效提高各部门的沟通意识，公司拥有雄厚的实力和开阔的眼界以及娴熟的业务开展，让客户能享受到更尽心、更优质、更效率的品质服务体验。', 3, '/uploads/article/20181009/4a1b1fcd847ac4a694693b4e3aaf1d71.jpg', '123', '<p class=\"MsoNormal\"><img src=\"/uploads/20180921/bd5ab60f18fe790ff020538567988566.jpg\" alt=\"undefined\"/><br/></p><p>陕西大城小屋不动产管理有限公司</p>', 1536889696, 1539051372, 62, 1, 2, 1);
INSERT INTO `dcxw_article` VALUES (100, '201809140004', NULL, NULL, NULL, '新闻摘录', '小屋快讯', '八九十月的装修旺季还在持续，我们在购房装修的时候也一定得擦亮眼睛，服务和质量永远是第一位，不能听信商家鼓唇弄舌去打折送奖就进行交易，这其实真的就因小失大了，我们得对自身、对家人的身心健康负责，对自己的辛苦所赚负责', 4, '/uploads/article/20181009/845f8910bf276fcacd5df4201260a5be.jpg', '123', '<p class=\"MsoNormal\" style=\"text-align: left;\">选自北方网</p><p class=\"MsoNormal\" style=\"text-align: center;\"><br/></p><p class=\"MsoNormal\" style=\"text-align: center;\">租房买房装修——论大城小屋不动产公司的利民模式</p><p class=\"MsoNormal\" style=\"text-align: center;\"><br/></p><p class=\"MsoNormal\" style=\"text-align: center;\"><img src=\"/uploads/20180921/9e7d0f262602b58ca73758097617aa68.png\" alt=\"undefined\"/><br/></p><p class=\"MsoNormal\" style=\"text-align: center;\"><br/></p><p class=\"MsoNormal\" style=\"text-align: center;\"><br/></p><p>陕西大城小屋不动产管理有限公司</p>', 1536889746, 1539051359, 46, 1, 2, 1);
INSERT INTO `dcxw_article` VALUES (101, '201809140005', NULL, NULL, NULL, '团体活动', '精彩瞬间', '大城小屋“擎域而搏 革故鼎新”的企业文化在团建时已经慢慢植入，\r\n\r\n在领航同业的基础下，不断拼搏进取，不断摒除陈旧，\r\n\r\n以更好的开拓创新。公司以昂扬的斗志和百折不挠的气魄，\r\n\r\n铸就屹立房屋回租服务行业前沿的豪情！', 2, '/uploads/article/20181009/4a140e419d6ad9ea6e0349253521a2bb.jpg', '123', '<p style=\"text-align: center;\"><img src=\"/uploads/20180921/5d33b9d16485c3b0b98f8f08b4e58c0d.jpg\" alt=\"undefined\"/><br/></p><p style=\"text-align: center;\">有人说</p><p style=\"text-align: center;\"><strong>采菊东篱下，悠然见南山</strong></p><p style=\"text-align: center;\">也有人说</p><p style=\"text-align: center;\"><strong>鱼鸟亲人濠濮想，桂山留客楚骚辞</strong></p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\">还有人直接说</p><p style=\"text-align: center;\"><strong>大城小屋团建活动</strong></p><p style=\"text-align: center;\"><strong>赞！赞！赞！</strong></p><p style=\"text-align: center;\">&nbsp;</p><p style=\"text-align: center;\">真是天苍苍野茫茫</p><p style=\"text-align: center;\">我们的团建不一<strong>YOUNG!~~</strong></p><p style=\"text-align: center;\">跟随小编的镜头</p><p style=\"text-align: center;\">一起回顾</p><p style=\"text-align: center;\">团建的精彩瞬间吧！</p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/20180921/e41b565ce3f4084ed857ede76006f400.jpg\" alt=\"undefined\"/><br/></p><p style=\"text-align: center;\"><br/></p><section><section><section><p style=\"text-align: center;\">淅淅沥沥，秋雨绵绵</p><p style=\"text-align: center;\"><strong>大城小屋团建热情不减</strong></p><p style=\"text-align: center;\">&nbsp;来小编带你看看周边的美</p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/20180921/51313659317968d51b3b4b0f41634c13.jpg\" alt=\"undefined\"/><br/></p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">大城小屋“擎域而搏&nbsp;革故鼎新”的</span><span style=\"text-align: justify;\">企业文化在团建时已经慢慢植入，</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">在领航同业的基础下，不断拼搏进取，不断摒除陈旧，</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">以更好的开拓创新。公司以昂扬的斗志和百折不挠的气魄，</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">铸就屹立房屋回租服务行业前沿的豪情！</span></p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\"><img src=\"/uploads/20180921/1defd8d924fcb70787082a2e96e56d4f.jpg\" alt=\"undefined\"/><br/></p><p style=\"text-align: center;\"><br/></p><p style=\"text-align: center;\"><span style=\"text-align: left;\">着微风，大家开始行动起来，</span></p><p style=\"text-align: center;\"><span style=\"text-align: left;\">有的忙生火、有的忙择菜、有的忙准备食材</span></p><p style=\"text-align: center;\"><span style=\"text-align: left;\">大家忙得不亦乐乎。整个过程充满着欢声笑语</span></p><p style=\"text-align: center;\"><span style=\"text-align: left;\">随着缕缕炊烟萦绕在空中。</span></p><p style=\"text-align: center;\"><span style=\"text-align: left;\"><br/></span></p><p style=\"text-align: center;\"><span style=\"text-align: left;\"><img src=\"/uploads/20180921/d86c2a5e009c0d473083a24aced1d4c0.jpg\" alt=\"undefined\"/><br/></span></p><p style=\"text-align: center;\"><span style=\"text-align: left;\"><br/></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">英姿飒爽，扬帆起航</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">大城小屋团队的每一个人</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">都那么的热情洋溢</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">拉起公司的旗帜，高喊自己的口号。</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><img src=\"/uploads/20180921/e6e8a1507abcb11020255ff979ff5d1b.jpg\" alt=\"undefined\"/><br/></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><br/></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">沉默中风雨同路，无声处惊雷起航。</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">一天的活动，累并快乐着，</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">大城小屋的全体员工不仅收获了一份难忘的回忆</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">也将彼此拉进了距离</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">使大家在未来事业发展的道路上能够更好的相互协作</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">共同努力，一起创造大城小屋更辉煌的明天。</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><br/></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><img src=\"/uploads/20180921/b6c7bf13d53b9dcc424699549ace348b.jpg\" alt=\"undefined\"/><br/></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><br/></span></p><p><br/></p></section></section></section><p style=\"text-align: right;\">陕西大城小屋不动产管理有限公司</p>', 1536889799, 1539051402, 76, 1, 2, 1);
INSERT INTO `dcxw_article` VALUES (105, '201810080001', NULL, NULL, NULL, 'qwe', 'qwe', 'qwe', 6, '/uploads/article/20181008/f9e57b14a8beb173e72810c10facf6ca.jpg', 'qweqwe', '<p>qwe</p>', 1538988032, 1538988032, 4, 1, 2, 1);

-- ----------------------------
-- Table structure for dcxw_banner
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_banner`;
CREATE TABLE `dcxw_banner`  (
  `ba_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'banner轮播ID',
  `ba_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'banner编号',
  `ba_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'banner主题',
  `ba_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'banner 图片路径',
  `ba_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'banner图片alt',
  `ba_url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'banner图跳转路径',
  `ba_p_id` int(11) NULL DEFAULT NULL COMMENT '显示省份',
  `ba_c_id` int(11) NULL DEFAULT NULL COMMENT '显示城市',
  `ba_branch` int(11) NULL DEFAULT 1 COMMENT '显示站点；分站的id',
  `ba_createtime` int(11) NULL DEFAULT NULL COMMENT 'banner 添加时间',
  `ba_updatetime` int(11) NULL DEFAULT NULL COMMENT 'banner 修改更新时间',
  `ba_via` tinyint(2) NULL DEFAULT NULL COMMENT '显示端：1 PC端； 2 移动端;',
  `ba_order` tinyint(4) NULL DEFAULT 1 COMMENT 'banner图排序',
  `ba_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示：1 显示：2隐藏',
  `ba_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  `ba_type` tinyint(2) NULL DEFAULT NULL COMMENT 'banner类型1 首页banner，2 文章banner',
  PRIMARY KEY (`ba_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 85 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_banner
-- ----------------------------
INSERT INTO `dcxw_banner` VALUES (76, '201809070002', '123', '/uploads/banner/20180909/fa557c930735e1499db1f2bec0f986a6.jpg', '123', '', NULL, NULL, 1, 1537061821, NULL, NULL, 1, 2, 1, 1);
INSERT INTO `dcxw_banner` VALUES (75, '201809070002', '123', '/uploads/banner/20180909/0d902981233dbe8117453025185e5128.jpg', '123', '1231', NULL, NULL, 1, 1536485940, NULL, NULL, 1, 2, 1, 1);
INSERT INTO `dcxw_banner` VALUES (77, '201809160001', '智能公寓', '/uploads/banner/20180916/0aaf642a0cd47367fe20c521733c31eb.jpg', '智能公寓', '', NULL, NULL, 1, 1538204501, NULL, 1, 3, 2, 1, 1);
INSERT INTO `dcxw_banner` VALUES (78, '201809160002', '人性化自由化', '/uploads/banner/20180916/5e18c0a72371ba7c0c1b15fe8cd465c0.jpg', '人性化自由化', '', NULL, NULL, 1, 1538204507, NULL, 1, 2, 1, 1, 1);
INSERT INTO `dcxw_banner` VALUES (79, '201809260001', '十一', '/uploads/banner/20181031/38318eac295109bda5c152ab8fe953ab.jpg', '', '', NULL, NULL, 1, 1540973496, NULL, 1, 5, 1, 1, 1);
INSERT INTO `dcxw_banner` VALUES (80, '201809290004', '123', '/uploads/banner/20181031/f123d87dffc809521f7b908d62e687a7.jpg', '123321', '', NULL, NULL, 1, 1540973459, NULL, 2, 4, 1, 1, 1);
INSERT INTO `dcxw_banner` VALUES (81, '201809290005', '213', '/uploads/banner/20181031/227e99cacb574bd29f2595453efcdf2e.jpg', '123', '', NULL, NULL, 1, 1540973472, NULL, 2, 3, 1, 1, 1);
INSERT INTO `dcxw_banner` VALUES (82, '201809290006', '123', '/uploads/banner/20181031/55fc3a078df5bc639daf32e5ddbb09ae.png', '', '', NULL, NULL, 1, 1540973484, NULL, 1, 5, 1, 1, 1);
INSERT INTO `dcxw_banner` VALUES (83, '201809290007', '123', '/uploads/banner/20181031/38f2c25d226302294cc83016964a425f.png', '', '', NULL, NULL, 1, 1540973449, NULL, 2, 5, 1, 1, 1);
INSERT INTO `dcxw_banner` VALUES (84, '201810300001', '123123', '/uploads/banner/20181030/17b536f248a25382d7e14b391714f8ed.jpg', '123', '123', NULL, NULL, 1, 1540886294, NULL, 1, 2, 1, 1, 1);

-- ----------------------------
-- Table structure for dcxw_branch
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_branch`;
CREATE TABLE `dcxw_branch`  (
  `b_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '站点id',
  `b_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '站点编号',
  `b_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '站点名称',
  `b_logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '站点logo',
  `b_logo_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图片alt',
  `b_prex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '该分站的首页链接',
  `b_tel` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '站点电话（装修咨询）',
  `b_weichat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微信二维码',
  `b_weibo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微博二维码',
  `b_city` int(10) NULL DEFAULT NULL COMMENT '城市id',
  `b_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '站点地址',
  `b_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '站点地理坐标',
  `b_record` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '站点备案号',
  `b_codecount` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '统计代码',
  `b_thridcode` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '客服代码',
  `b_othercode` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '其他代码',
  `b_serviceurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '客服链接',
  `b_createtime` int(11) NULL DEFAULT NULL COMMENT '站点开通时间',
  `b_adminphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '站点管理员手机号(接受预约短信)',
  `b_isopen` tinyint(2) NULL DEFAULT NULL COMMENT '是否开通：1.是：2 否',
  `b_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  `b_sign` int(10) NULL DEFAULT NULL COMMENT '站点签名',
  PRIMARY KEY (`b_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '站点管理' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_buildings
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_buildings`;
CREATE TABLE `dcxw_buildings`  (
  `bu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '楼盘小区表',
  `bu_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '楼盘编号。系统自动生成的编号，规则同客户编号生成规则',
  `bu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '楼盘名称',
  `bu_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '楼盘描述',
  `bu_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '楼盘地理坐标',
  `bu_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '楼盘封面图',
  `bu_img_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图片alt',
  `bu_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '楼盘地址',
  `bu_p_id` int(11) NULL DEFAULT NULL COMMENT '省份id',
  `bu_c_id` int(11) NULL DEFAULT NULL COMMENT '城市id',
  `bu_branch` int(255) NULL DEFAULT NULL COMMENT '站点id',
  `bu_seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo标题',
  `bu_seo_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo关键词',
  `bu_seo_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'seo描述',
  `bu_activity` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '优惠活动内容',
  `bu_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '活动链接',
  `bu_view` int(10) NULL DEFAULT 0 COMMENT '浏览量热度，浏览次数',
  `bu_ordered` int(10) NULL DEFAULT 0 COMMENT '报名户数（数字），前端在这个楼盘下的预约数量',
  `bu_case_num` int(11) NULL DEFAULT 0 COMMENT '案例数量（在这个楼盘下所展示的案例的数量）',
  `bu_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示：1，显示；2，隐藏',
  `bu_istop` tinyint(2) NULL DEFAULT 2 COMMENT '是否置顶：1是；2否',
  `bu_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  `bu_createtime` int(11) NULL DEFAULT NULL COMMENT '操作时间',
  `bu_updatetime` int(11) NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`bu_id`, `bu_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 44 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '楼盘小区表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_case
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_case`;
CREATE TABLE `dcxw_case`  (
  `case_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '案例id',
  `case_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '案例编号。系统自动生成的编号，规则同客户编号生成规则',
  `case_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '案例名称',
  `case_style` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '案例风格',
  `case_p_id` int(10) NULL DEFAULT NULL COMMENT '省份id',
  `case_c_id` int(10) NULL DEFAULT NULL COMMENT '城市id',
  `case_b_id` int(11) NULL DEFAULT NULL COMMENT '分站id',
  `case_price` int(10) NULL DEFAULT NULL COMMENT '案例造价（单位：万元）',
  `case_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '案例户型',
  `case_type_iamge` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '户型图',
  `case_type_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '户型图alt',
  `case_type_title` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '户型标题',
  `case_type_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '户型描述',
  `case_bulid` int(11) NULL DEFAULT NULL COMMENT '楼盘id 对应楼盘表（小区）',
  `case_decotime` int(11) NULL DEFAULT NULL COMMENT '案例发布日期',
  `case_updatetime` int(11) NULL DEFAULT NULL COMMENT '案例更新日期',
  `case_view` int(10) NULL DEFAULT 0 COMMENT '浏览量',
  `case_url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '案例全景URL',
  `case_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '图片,多张图用‘，’分割',
  `case_img_alt` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '案例图片alt,个数同图片数量，多个用“，”隔开',
  `case_img_title` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '案例图片描述，个数同图片数量，多个用“，”隔开',
  `case_img_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '图片的描述，个数同图片，多个用“，”分割',
  `case_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '面积',
  `case_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '案例简介',
  `case_designer` int(11) NULL DEFAULT NULL COMMENT '案例设计师id对应设计师表id',
  `case_seo_tilte` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo标题',
  `case_seo_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo关键词',
  `case_seo_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo描述',
  `case_istop` tinyint(4) NULL DEFAULT 2 COMMENT '置顶: 1 是；2否',
  `case_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示：1，显示；2，隐藏',
  `case_admin` int(10) NULL DEFAULT NULL COMMENT '案例发布人，对应管理员的id',
  `case_order_num` int(10) NULL DEFAULT 0 COMMENT '案例预约数量',
  `case_sort` tinyint(2) NULL DEFAULT NULL COMMENT '案例类型：1 正常案例；2，产品效果',
  PRIMARY KEY (`case_id`, `case_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 138 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '装修案例表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_chapter
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_chapter`;
CREATE TABLE `dcxw_chapter`  (
  `lc_id` int(11) NOT NULL AUTO_INCREMENT,
  `lc_ls_id` int(11) NOT NULL COMMENT '课程的id',
  `lc_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lc_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图片',
  `lc_files` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '附件内容',
  `lc_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '章节内容',
  `lc_view` int(11) NULL DEFAULT 0 COMMENT '浏览量',
  `lc_order` int(10) NULL DEFAULT NULL COMMENT '排序',
  `lc_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示；1，是；2，否',
  `lc_addtime` int(11) NULL DEFAULT NULL,
  `lc_updatetime` int(11) NULL DEFAULT NULL,
  `lc_admin` int(11) NULL DEFAULT NULL,
  `lc_remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '课程简介',
  PRIMARY KEY (`lc_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 42 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '培训课程-章节内容' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_chapter
-- ----------------------------
INSERT INTO `dcxw_chapter` VALUES (2, 12, 'qqqqqqqq', NULL, '/uploads/learn/20180921/b691f19093d622dd72c208a9b911dd08.pdf', '<p style=\"text-align: left;\"><span style=\"text-align: justify;\"><img src=\"http://www.bbb.com/layui/src/images/face/37.gif\" alt=\"[色]\">沉默中风雨同路，<img src=\"http://www.bbb.com/layui/src/images/face/63.gif\" alt=\"[给力]\">无声处惊雷起航。<img src=\"http://www.bbb.com/layui/src/images/face/51.gif\" alt=\"[兔子]\">一天的活动，累并快乐着<img src=\"http://www.bbb.com/layui/src/images/face/37.gif\" alt=\"[色]\"></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><img src=\"/uploads/20180921/15f7dea78723ca39d3596ea62c6a2a80.jpg\" alt=\"undefined\"><br></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">大城小屋的全体员工不仅收获了一份难忘的回忆，也将彼此拉进了距离</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">。<img src=\"/uploads/20180921/ad7cb8615bfe5bb2dd1cbd467ca39088.jpg\" alt=\"undefined\"></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">使大家在未来事业发展的道路上能够更好的相互协作，共同努力，一起创造大城小屋更辉煌的明天。</span></p><p><span style=\"text-align: justify;\">沉默中风雨同路，无声处惊雷起航。一天的活动，累并快乐着</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><img src=\"http://www.bbb.com/uploads/20180921/15f7dea78723ca39d3596ea62c6a2a80.jpg\" alt=\"undefined\"><br></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">大城小屋的全体员工不仅收获了一份难忘的回忆，也将彼此拉进了距离</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">。<img src=\"/uploads/20180921/5bc0753ce10213a42ea07525efb59895.jpg\" alt=\"undefined\"></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">使大家在未来事业发展的道路上能够更好的相互协作，共同努力，一起创造大城小屋更辉煌的明天。</span></p><p><span style=\"text-align: justify;\">沉默中风雨同路，无声处惊雷起航。一天的活动，累并快乐着</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><img src=\"http://www.bbb.com/uploads/20180921/15f7dea78723ca39d3596ea62c6a2a80.jpg\" alt=\"undefined\"><br></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">大城小屋的全体员工不仅收获了一份难忘的回忆，也将彼此拉进了距离</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">。<img src=\"http://www.bbb.com/uploads/20180921/ad7cb8615bfe5bb2dd1cbd467ca39088.jpg\" alt=\"undefined\"></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">使大家在未来事业发展的道路上能够更好的相互协作，共同努力，一起创造大城小屋更辉煌</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><br></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><br></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><br></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><img src=\"/uploads/20180921/5f1313babfdc1ee0f29a7945bd7632d5.jpg\" alt=\"undefined\">。</span></p><p><span style=\"text-align: justify;\">沉默中风雨同路，无声处惊雷起航。一天的活动，累并快乐着</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\"><img src=\"http://www.bbb.com/uploads/20180921/15f7dea78723ca39d3596ea62c6a2a80.jpg\" alt=\"undefined\"><br></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">大城小屋的全体员工不仅收获了一份难忘的回忆，也将彼此拉进了距离</span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">。<img src=\"http://www.bbb.com/uploads/20180921/ad7cb8615bfe5bb2dd1cbd467ca39088.jpg\" alt=\"undefined\"></span></p><p style=\"text-align: center;\"><span style=\"text-align: justify;\">使大家在未来事业发展的道路上能够更好的相互协作，共同努力，一起创造大城小屋更辉煌的明天。</span></p>', 121, 1, 1, 1537426966, 1537514412, 1, NULL);
INSERT INTO `dcxw_chapter` VALUES (4, 12, '12312', NULL, '/uploads/learn/20180920/ca7d85afba89288acc8ff8fa3c7b47b7.pdf', '123123122312312313<img src=\"http://www.bbb.com/layui/src/images/face/13.gif\" alt=\"[偷笑]\">asddsadsdsas', 10, 1, 1, 1537434266, 1537520609, 1, NULL);
INSERT INTO `dcxw_chapter` VALUES (5, 13, 'qwegffh', NULL, NULL, 'qweqwesdfdsg', 3, 1, 1, 1537602292, 1537602300, 1, NULL);
INSERT INTO `dcxw_chapter` VALUES (6, 13, 'qwe', NULL, NULL, 'qweqwe', 6, 12, 1, 1537602292, 1537602292, 1, NULL);
INSERT INTO `dcxw_chapter` VALUES (7, 16, '123', '/uploads/article/20180922/59dae0265e0c62d7642f08bffe7090f4.png', NULL, '<p><span style=\"font-size: 20px;\">123123<img src=\"/ueditor/php/upload/image/20180922/1537608207302466.png\" title=\"1537608207302466.png\" alt=\"write.png\"/></span></p>', 28, NULL, 1, 1537603716, 1537608209, 1, '请问请问');
INSERT INTO `dcxw_chapter` VALUES (8, 16, '132', '/uploads/article/20180922/e0037b87eedbead59214ddceefaf0b51.jpg', NULL, '<p>123123213<img src=\"/ueditor/php/upload/image/20180922/1537606990.jpg\" title=\"1537606990.jpg\" alt=\"yingzheng02.jpg\"/></p>', 12, NULL, 1, 1537604093, 1537606995, 1, '111');
INSERT INTO `dcxw_chapter` VALUES (12, 19, '备用金(借款）申请制度', '/uploads/article/20180923/bffb270dd84c0c70bac921c5d0f55351.jpg', NULL, '<p style=\"text-align: left;\"><span style=\"font-size: 20px;\">个人借款和报销手续程序：</span></p><p style=\"text-align: left;\"><span style=\"font-size: 20px;\">1、工作人员需借用款项时，先在钉钉上走付款申请流程，借款人按规定的格式内容填写借款单（必须填写借款用途、金额、收款人、收款人银行卡号及开户行），按流程等各个领导审批同意，将申请单打印出来交于财务部，财务人员经审核无误后才能办理付款手续；</span></p><p style=\"text-align: left;\"><span style=\"font-size: 20px;\">2、借款人员完成业务后应在<span style=\"font-size: 20px; color: rgb(255, 0, 0);\">三日内</span>在钉钉上填写好“报销申请”的各项规定内容，并经主管领导审批后，再将“报销单”打印出来，贴上发票后交于财务部，财务人员根据财务制度规定认真审核无误后，办理报销手续；</span></p><p style=\"text-align: left;\"><span style=\"font-size: 20px;\">3、借款人办理报销手续时，财务人员应查阅“现金流”台账，查明报销人员原借款金额，对报销的超支款项应及时付现退还本人，对报销后低于备用金金额款项的，应让其退回余额以结清原借款单所借账款；</span></p><p style=\"text-align: left;\"><span style=\"font-size: 20px;\">4、因业务原因长期借用款项的人员可由财务部根据实际情况核定，拨出一笔固定数额的备用金并规定使用范围;使用部门必须设立专人经管定额备用金，备用金经管人员必须妥善保存支付备用金的收据、发票以及各种报销凭证，并设备用金登记簿，记录各种零星支出。经管人员必须按月定期向公司财务部申报备用金使用情况，前账未清，不得继续借款。对因特殊原因不能按时结算的，须提前向财务负责人说明原因，经财务负责人同意后，方可延期；</span></p><p style=\"text-align: left;\"><span style=\"font-size: 20px;\">5、借款人员<strong><span style=\"font-size: 20px; color: rgb(255, 0, 0);\">最晚应在两周内冲账，对无故拖延者，财务部发出最后一次催办通知后还不办理者，财务部有权从下月起直接从借款人工资中抵扣，不再另行通知。</span></strong></span></p><p style=\"text-align: left;\"><span style=\"font-size: 20px;\">6、所有各种借款，必须在年末进行彻底清理，不允许跨年度使用。对因特殊原因必须跨年度使用借款时，年底必须重新办理借款手续，并冲销当年借款。</span></p><p style=\"text-align: left;\"><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537666340105846.png\" title=\"1537666340105846.png\" alt=\"图片1.png\"/></p>', 32, NULL, 1, 1537666344, 1537666423, 54, '备用金(借款）申请制度');
INSERT INTO `dcxw_chapter` VALUES (11, 18, '123123', '/uploads/article/20180922/1d16fa7c14b96b61834df6b3029b7e08.jpg', NULL, '<p>123312<img src=\"/public/ueditor/php/upload/image/20180922/1537610542739516.jpg\" title=\"1537610542739516.jpg\" alt=\"yingzheng01.jpg\"/><img src=\"http://img.baidu.com/hi/jx2/j_0010.gif\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180922/1537610549327072.jpg\" title=\"1537610549327072.jpg\" alt=\"yingzheng02.jpg\"/><img src=\"http://img.baidu.com/hi/jx2/j_0047.gif\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180922/1537610556963115.jpg\" title=\"1537610556963115.jpg\" alt=\"yingzheng03.jpg\"/></p>', 12, NULL, 1, 1537609582, 1537610640, 1, '123123');
INSERT INTO `dcxw_chapter` VALUES (13, 19, '财务管理制度-报销票据黏贴要求', '/uploads/article/20180923/aec517c18c2a3c4d09ab2934f04c2738.jpg', NULL, '<p><span style=\"font-size: 20px;\">报销票据黏贴所需材料/工具：</span></p><p><span style=\"font-size: 20px;\">报销单/专用的粘贴单、固体胶/胶水、票据。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">报销票据黏贴方法：</span></p><p><span style=\"font-size: 20px;\">步骤一：将需要粘贴的同类票据分类集中放在一起，比如：火车票、出租车票、停车票等；</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537666624578985.png\" title=\"1537666624578985.png\" alt=\"图片2.png\"/></p><p><span style=\"font-size: 20px;\">步骤二：在粘贴单上粘贴票据。粘贴时，将固体胶水涂抹在票据背面左上角，必须采用鱼鳞式粘贴票据，按照上下、左右起止的顺序均匀粘贴；</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537666738816456.png\" title=\"1537666738816456.png\" alt=\"image.png\"/><img src=\"/public/ueditor/php/upload/image/20180923/1537666746848278.png\" title=\"1537666746848278.png\" alt=\"image.png\"/></p><p><span style=\"font-size: 20px;\">步骤三：不要将票据贴出报销单外，较大票据将其折叠在报销单大小范围内，否则票据容易破损；</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537666783661306.png\" title=\"1537666783661306.png\" alt=\"image.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537666799604284.png\" title=\"1537666799604284.png\" alt=\"image.png\"/></p>', 8, NULL, 1, 1537666807, 1537667248, 54, '财务管理制度-报销票据黏贴要求');
INSERT INTO `dcxw_chapter` VALUES (14, 20, '员工行为规范', '/uploads/article/20180923/9b6324fb744fed480dbdab725ad57f91.jpg', NULL, '<p><span style=\"font-size: 20px;\">★严格遵守公司办公纪律以及作息时间的规定。办公期间不准干私活；上班时间不得无故脱岗、窜岗、聊天、睡觉；严禁看小说、看杂志、吃东西、不得利用公司网络设备下载与业务无关的网络资源，挤占公司现有宽带流量；禁止玩电脑游戏、看电影、使用公司网络下载或上传与工作无关的内容；禁止在办公区域内大声喧哗、嬉戏打闹，自觉维护好办公秩序。&nbsp;&nbsp;</span></p><p><span style=\"font-size: 20px;\">★ 工作时间拨打、接听电话应简短扼要、用语礼貌、语音适度、严禁闲谈；能用内线联系工作时不用外线电话，不得占用工作电话长时间联系私事；严禁使用工作电话拨打信息台。</span></p><p><span style=\"font-size: 20px;\">★&nbsp; 员工个人物品应摆放整齐有序，保持台面清洁、美观，开关抽屉动作要轻，爱护公用物品。不得随意挪用他人物品。与工作有关的资料、纸张只能用透明胶粘贴，严禁用图钉、铁钉等固定。不得在办公室通道处摆放物品，阻碍通行。</span></p><p><span style=\"font-size: 20px;\">★为了避免影响他人工作，各部门接待客人应安排在接待区，不得带领无关人员进入公司。</span></p><p><span style=\"font-size: 20px;\">★员工离开办公区域，柜、抽屉应及时上锁。废弃的文件应及时销毁。机要传真内容不得随便传阅泄密。重要文件不得放在桌面，看过后应锁抽屉。不得在公共场所翻看公司文件、资料，谈论涉及公司秘密的问题。</span></p><p><span style=\"font-size: 20px;\">★&nbsp; 严禁在办公区域（含厕所内）吸烟，需吸烟者自觉到楼梯间（消防通道）、公共过道区吸，烟头扔进垃圾桶内。</span></p><p><span style=\"font-size: 20px;\">★ 午休时间员工可在本人座位上休息，不得占用过道、接待室等公共区域，不得私自拔掉办公电话；午休时间结束时，要按时开启办公室灯光，迅速恢复正常办公秩序。</span></p><p><span style=\"font-size: 20px;\">★ 员工下班应及时关闭电源、门窗，注意防火、防盗。做到：电脑关机、抽屉上锁、桌面整洁、座位归位。使用后的办公用品应归位。</span></p><p><span style=\"font-size: 20px;\">★&nbsp; 要节约用水用电，最后离开的人员必须检查门窗、水电的关闭情况，锁好房门方可离开，要及时关闭所有用电设施（电灯、空调、饮水机、电脑等）。</span></p><p></p>', 20, NULL, 1, 1537668101, 1537674983, 54, '员工行为规范\r\n');
INSERT INTO `dcxw_chapter` VALUES (15, 20, '员工仪容仪表规范', '/uploads/article/20180923/36653f316fd17004a9be5187c9962b5a.jpg', NULL, '<p><span style=\"font-size: 20px;\">●员工上班应佩戴工作牌，男同志须着西服或衬衣、穿黑色或深色皮鞋；女同志须着职业套装，化淡妆；注重仪容仪表，精神饱满，举止文明。着装整洁、衣裤平整；头发清洁、梳理整齐，不留过于怪异的发型，不得染两种（或两种以上）颜色的头发；上班时间不准穿拖鞋（含拖鞋式凉鞋）。</span></p><p><span style=\"font-size: 20px;\">●女员工不允许浓妆艳抹，不得涂色彩鲜艳和有图案的指甲；不得在公共办公区化妆。</span></p><p><span style=\"font-size: 20px;\">● 行政前台作为公司窗口部门的工作人员，必须时刻精神饱满、坐姿端正。接听电话语气亲切、口齿清楚，用语标准。接待客人要礼貌、周全，客人来访应及时通报，进入领导办公室应先敲门通报，待领导允许后方可进入，并及时送上茶水。对推销人员应礼貌拒绝，严禁进入办公区域。</span></p>', 11, NULL, 1, 1537668149, 1537846993, 54, '员工仪容仪表规范\r\n');
INSERT INTO `dcxw_chapter` VALUES (20, 20, '物品领用规定', '/uploads/article/20180923/bef0d7e582862361da62f13eea83894e.jpg', NULL, '<p style=\"text-align: center;\"><span style=\"font-size: 24px;\">物品领用规定</span><span style=\"font-size: 20px;\"><br/></span></p><p><span style=\"font-size: 24px;\"><br/></span></p><p><span style=\"font-size: 20px;\">●领用物品应在钉钉系统上提交物品领用申请，待各级审核人审批通过后方可领取。</span></p><p><span style=\"font-size: 20px;\">●电脑耗材品（鼠标、键盘、墨盒、硒鼓等），如有故障或损坏，应以旧换新，如有遗失，由个人或部门赔偿或自购。</span></p><p><span style=\"font-size: 20px;\">●新进人员入职时，由部门助理提出申请向行政部领取办公用品，人员离职时，应将所领物品一并移交行政部，若有损坏，应照价赔偿。</span></p><p><br/></p><p><br/></p><p style=\"text-align: center;\"><span style=\"font-size: 24px;\">物品领用流程</span></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674408818201.png\" title=\"1537674408818201.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674408499192.png\" title=\"1537674408499192.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674408219672.png\" title=\"1537674408219672.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537669236983965.png\" title=\"1537669236983965.png\" alt=\"image.png\"/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;注意：“*”标记处为必填项</p><p><br/></p>', 12, NULL, 1, 1537669272, 1537847017, 54, '物品领用规定\r\n');
INSERT INTO `dcxw_chapter` VALUES (17, 20, '车辆管理制度', '/uploads/article/20180923/dca97461b93aef79bc98a1dbe22de8d2.jpg', NULL, '<p style=\"white-space: normal;\"><span style=\"font-size: 20px;\"><br/></span></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\"></span></p><p style=\"text-align: center;\"><span style=\"font-size: 24px;\">车辆管理制度</span></p><p><span style=\"font-size: 24px;\"><br/></span></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\">一、公司车辆应由驾龄熟练司机驾驶，司机应开车前实行定期车辆检查及保养，确保行车安全。</span><br/></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\">二、车辆的有关证件及保险资料统一由行政部保管，按车分类建立资料、费用档案，并负责维修、检验、清洁等工作。</span></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\">三、用车部门在用车前须在钉钉上提交用车审批流程，经相关负责人审批通过后方可调派。行政部负责人依重要性顺序派车，不按规定办理申请者，不得派车。</span></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\">四、车辆使用前须进行安全检查，车辆行车途中应安全行驶并严格遵守交通规则，若有违规罚款，由驾驶员自行承担。</span></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\">五、节假日或业余时间车辆的使用应呈请行政人事部负责人核准后方可调派。</span></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\">六、用车结束后和节假日应将车停放在公司指定场所或指定专人负责保管，并将车门锁妥。</span></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\">七、车辆状况须时常检修，发现问题应及时进行处理。</span></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\">八、车辆于行驾途中发生故障或其他耗损急需修复或更换零件时，可视实际情况进行修理，但无迫切需要或修理费超过500元时，须与行政人事部负责人联系请求批示。</span></p><p style=\"white-space: normal;\"><span style=\"font-size: 20px;\">九、如因驾驶人使用不当或行政部车管专人保养不当，而致使车辆损坏或机件故障所产生的修理费，应视情节轻重，由公司与驾驶人或车管专人共同承担。</span></p><p><br/></p><p><br/></p><p style=\"text-align: center;\"><span style=\"font-size: 24px;\">用车申请钉钉流程</span></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674075676975.png\" title=\"1537674075676975.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674075675470.png\" title=\"1537674075675470.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674075759316.png\" title=\"1537674075759316.png\"/></p><p><br/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537668604615498.png\" title=\"1537668604615498.png\" alt=\"image.png\"/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 注意：“*”标记处为必填项</p><p><br/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537668694495230.png\" title=\"1537668694495230.png\" alt=\"image.png\"/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 注意：“*”标记处为必填项</p><p><br/></p>', 14, NULL, 1, 1537668390, 1537847046, 54, '车辆管理制度及用车申请钉钉流程\r\n');
INSERT INTO `dcxw_chapter` VALUES (18, 20, '物品申购规定', '/uploads/article/20180923/db985165c7bba49281216a78a460c62f.jpg', NULL, '<p><span style=\"font-size: 20px;\">各部门应于每月25日根据工作需要编制下月的物品需求计划，由部门主管汇总交行政部，行政部统一汇总、整理各部门的采购申请，并经核查库存现状后，呈报总经理审核同意后实施采购任务。</span></p><p><span style=\"font-size: 20px;\">超过上述时间节点未提交采购申请的，行政部不再受理，视为该部门无采购需求，由此产生的后果，由各部门自行承担。对于急需的物品，需由申购物品部门负责人发起，行政部审核，经总经理同意后，方可购买。</span></p>', 11, NULL, 1, 1537668763, 1537668763, 54, '物品申购规定\r\n');
INSERT INTO `dcxw_chapter` VALUES (19, 20, '物品采购规定', '/uploads/article/20180923/8a8f71a6b5bd74c1969fdd46a1f81f6b.jpg', NULL, '<p><span style=\"font-size: 20px;\">为了有效的完成采购任务，原则上由行政部统一负责采购。对于专业性物资的采购，由所需部门协助行政部共同进行采购。所购买的物品需有报销凭证，无法提供发票时，应向供应商要求开取带有印章的收据，便于后期财务报销。</span></p><p><span style=\"font-size: 20px;\">对单价大于500元以上的办公用品采购，应先进行询价、比价、议价，并将最终议定价格呈报部门领导同意后，方可实施采购任务。对于单价大于5000元以上的还需与供应商签订合同。</span></p><p><br/></p>', 6, NULL, 1, 1537668799, 1537668861, 54, '物品采购规定\r\n');
INSERT INTO `dcxw_chapter` VALUES (27, 23, '招聘管理规定', '/uploads/article/20180923/d90f22e34695bb70cf3551924a3f00f3.png', NULL, '<p><span style=\"font-size: 24px;\">第一章招聘目的与范围</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第一条为完善规范员工招聘录用程序，充分体现公开、公平、公正的原则，为公司选拔人才，制定本制度。本制度适用于公司所有岗位。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第二条人力资源部应确保招聘活动符合国家法律法规和公司有关制度，并不断拓宽招聘渠道，改进测试评价手段，降低招聘成本，提高招聘效率。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第三条人力资源部负责对内和对外招聘信息的发布形式和内容。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第四条公司招聘主要为外部招聘，外部招聘是指在出现职位空缺时，公司从社会中选拔人员的过程。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第五条招聘范围：</span></p><p><span style=\"font-size: 20px;\">社会招聘非技术人员原则上以大专以上文化程度、有经验的各类人才为主，包括录用正规院校的应届毕业生；社会招聘设计人员原则上招聘同类从业经验丰富的设计师，其它职业可恰当放宽到个人单项能力（如手绘）很强的人员。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第六条招聘渠道主要有各个网络招聘渠道、人才市场、校园招聘等。</span></p><p><br/></p><p><br/></p><p><span style=\"font-size: 24px;\">第二章招聘原则和标准</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第七条公司的招聘遵循多重考查原则：所有招聘职位都需经过人事部及其他部门的多重考查，经总经理批准后由人事部门发放录用通知。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第八条所有成功的应征者应具备良好的职业操守，无不良记录，身体健康，具有大学专科以上学历(含)，特殊岗位和经验特别丰富的应征者可以适当放宽要求。</span></p><p><br/></p><p><br/></p><p><span style=\"font-size: 24px;\">第三章招聘申请程序</span></p><p><span style=\"font-size: 24px;\"><br/></span></p><p><span style=\"font-size: 20px;\">第九条每次招聘前由用人部门负责人提交钉钉招聘申请，经总经理批准后由人力资源部门进行备案，以作为招聘的依据。</span></p><p><span style=\"font-size: 20px;\">第十条如因员工离职或其他特殊情况需补充人员，部门负责人提交钉钉招聘申请，经部门总经理批准后交人力资源部。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">具体操作如下：</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537689225102123.png\" title=\"1537689225102123.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537689225276994.png\" title=\"1537689225276994.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537689258491585.png\" title=\"1537689258491585.png\" alt=\"image.png\"/></p>', 17, NULL, 1, 1537689331, 1537846361, 54, '招聘管理规定\r\n');
INSERT INTO `dcxw_chapter` VALUES (21, 20, '印章使用管理', '/uploads/article/20180923/2b7c0780ccc99031770c02508b9d3cf8.jpg', NULL, '<p style=\"text-align: center;\"><span style=\"font-size: 24px;\">印章使用管理</span></p><p><br/></p><p><span style=\"font-size: 20px;\">印章的使用依照以下手续进行：</span></p><p><span style=\"font-size: 20px;\">★使用公司印章须在钉钉上提交用印申请，待审批流程通过后，连同需盖章文件一并交印章管理人进行审核盖章；</span></p><p><span style=\"font-size: 20px;\">★公司印章和公司法人代表印章原则上由总经理或是指定的他人保管，印章使用人必须严格控制用印范围，仔细检查用印申请单上是否有批准人的印章或签名；</span></p><p><span style=\"font-size: 20px;\">★公司财务部印章由财务部负责人负责管理使用；</span></p><p><span style=\"font-size: 20px;\">★公司公章、合同章由行政负责管理使用。</span></p><p><span style=\"font-size: 24px;\"><br/></span><br/></p><p style=\"text-align: center;\"><span style=\"font-size: 24px;\">用印申请</span></p><p><span style=\"font-size: 24px;\"><br/></span></p><p><span style=\"font-size: 24px;\"></span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674478963838.png\" title=\"1537674478963838.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674478901715.png\" title=\"1537674478901715.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674478912785.png\" title=\"1537674478912785.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537669482309972.png\" title=\"1537669482309972.png\" alt=\"image.png\"/></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 注意：“*”标记处为必填项</p><p>&nbsp;</p>', 10, NULL, 1, 1537669512, 1537674531, 54, '印章使用管理\r\n');
INSERT INTO `dcxw_chapter` VALUES (22, 20, '房屋开工交接', '/uploads/article/20180923/d3e5f7ca04cb3a497a8e0bf513c5a194.jpg', NULL, '<p><span style=\"font-size: 24px;\">事业部签单完成后，由事业部助理将房屋附属品交由工程部助理</span></p><p><br/></p><p><span style=\"font-size: 20px;\">1.交接单上注明通天然气时间(什么时候可以通天然气)，如通天然气厨房是否可以不安装门，是否有特殊要求等。</span></p><p><span style=\"font-size: 20px;\">2.交接水电卡及注明上面的余额，装修钥匙门禁卡及装修许可证(装修许可证办理周期，如办理周期超过两天，则应顺延工期)，是否有増项及小区物业指定垃圾堆放点，交接单内容登记台账。</span></p><p><span style=\"font-size: 20px;\">3.设计部装修全套图纸对接行政部，下发工程部两份，材料部一份。行政接收检查没有问题之后交接给工程部主管安排项目经理（工长）进场施工。</span></p><p><span style=\"font-size: 20px;\">4.设计部装修全套图纸对接行政部，下发工程部两份，材料部一份。行政接收检查没有问题之后交接给工程部主管安排项目经理（工长）进场施工。</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537673197844152.png\" title=\"1537673197844152.png\" alt=\"image.png\"/></p>', 11, NULL, 1, 1537669601, 1537673203, 54, '房屋开工交接\r\n');
INSERT INTO `dcxw_chapter` VALUES (23, 19, '报销申请流程', '/uploads/article/20180923/33f5ab20fd9c862e591933222c8adc21.png', NULL, '<p><img src=\"/public/ueditor/php/upload/image/20180923/1537674644793831.png\" title=\"1537674644793831.png\" alt=\"图片11.png\"/></p><p><span style=\"font-size: 20px;\">步骤一：打开钉钉主页；</span></p><p><span style=\"font-size: 20px;\">步骤二：点击“报销”；</span></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674705832516.png\" title=\"1537674705832516.png\" alt=\"图片12.png\"/></p><p><br/></p><p><span style=\"font-size: 20px;\">步骤三：填写需报销金额；</span></p><p><span style=\"font-size: 20px;\">步骤四：填写报销类别---根据实际情况选择报销类别，其中包括办公费、物耗品、油费、运费、水电话费（物业）、装修费、差旅费、车辆保险理赔、其他；</span></p><p><span style=\"font-size: 20px;\">步骤五：填写费用明细---根据步骤四所选报销类别，清楚写明具体事由；</span></p><p><span style=\"font-size: 20px;\">（如需增加报销明细，点击蓝框“增加报销明细”，继续重复步骤三、四、五；</span></p><p><span style=\"font-size: 20px;\">如报销明细增加太多，点击本报销明细的右上角“删除”，即可删除多余报销明细）</span></p><p><span style=\"font-size: 20px;\">步骤六：填写<span style=\"font-size: 20px; color: rgb(255, 0, 0);\">收款人、收款人开户行及收款人卡号</span>；</span></p><p><span style=\"font-size: 20px;\">步骤七：票据、发票等<span style=\"font-size: 20px; color: rgb(255, 0, 0);\">原始凭证拍照上传附件</span>；</span></p><p><span style=\"font-size: 20px;\">步骤八：提交报销申请，等待各级领导审批；</span></p><p><span style=\"font-size: 20px;\"><br/></span></p><p><br/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674729476182.png\" title=\"1537674729476182.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674729568806.png\" title=\"1537674729568806.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674774736309.png\" title=\"1537674774736309.png\" alt=\"图片15.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674761305545.png\" title=\"1537674761305545.png\"/></p><p><br/></p><p><span style=\"font-size: 20px;\">步骤九：所有的领导审批通过之后，会收到例如图三一样的通知，点击查看详情；</span></p><p><span style=\"font-size: 20px;\">步骤十：如图四，点击打印键；</span></p><p><span style=\"font-size: 20px;\">步骤十一：点击打印键后退出，会出现一个如图五一样PDF格式的文件，点击下载并打开，将文件打印出来，并把发票、收据等原始凭证粘贴起来；</span></p><p><span style=\"font-size: 20px;\">步骤十二：将打印好的钉钉申请交于财务部，财务给予支付，<span style=\"font-size: 20px; color: rgb(255, 0, 0);\">财务见单付款（支付金额超过3000元需领导手签确认）</span>；</span></p><p><span style=\"font-size: 20px;\">步骤十三：等钱到账，给财务<span style=\"font-size: 20px; color: rgb(255, 0, 0);\">到账回执</span>/截图到账记录。</span></p>', 17, NULL, 1, 1537670340, 1537846939, 54, '报销申请流程');
INSERT INTO `dcxw_chapter` VALUES (24, 19, '出差', '/uploads/article/20180923/2a9e8114c58a1c2f3722b32cbfc646cc.png', NULL, '<p><span style=\"font-size: 24px;\">出差报备：</span></p><p><span style=\"font-size: 20px;\">（1）根据各城市消费情况，公司住宿标准以行政区域划分为四类地区住宿标准，依次为260/210/180/150/天/间：&nbsp;</span></p><p><span style=\"font-size: 20px;\">一类地区260元/天/间：西藏、北京、上海、新疆、大连、珠海、佛山、厦门、海南、深圳</span></p><p><span style=\"font-size: 20px;\">二类地区210元/天/间：天津、江苏、福建（除厦门）、山东、浙江、河北、广东（除珠海、佛山）、满洲里</span></p><p><span style=\"font-size: 20px;\">三类地区180元/天/间：吉林、辽宁（除大连）、黑龙江、河南、甘肃、贵州、湖北、内蒙（除满洲里）、青海、湖南</span></p><p><span style=\"font-size: 20px;\">四类地区150元/天/间：重庆、四川、江西、广西、宁夏、陕西、安徽、云南、山西</span></p><p><span style=\"font-size: 20px;\">（2）出差至省会城市市区或直辖市市区住宿费可按最高值280/天/间标准；</span></p><p><span style=\"font-size: 20px;\">（3）住宿房间为普通标准间（2人内---限同性），即1人或2人均按此标准执行,凭机打发票报销住宿费。</span></p><p><span style=\"font-size: 20px;\">（4）乘坐高铁或动车超4小时及火车硬卧超15小时可乘坐飞机经济舱；</span></p><p><span style=\"font-size: 20px;\">（5）乘坐火车6小时以上（含）可乘坐火车硬卧；</span></p><p><span style=\"font-size: 20px;\">（6）旅游城市（青岛，大连，秦皇岛，厦门，苏州，三亚）在旅游高峰期（暑假期间7月8月），可按最高值280/天/间标准；</span></p><p><br/></p><p><span style=\"font-size: 24px;\">报销要求：</span></p><p><span style=\"font-size: 20px;\">（1）出差人员自愿提高标准，按实际选择的交通工具及当次车公司标准等级报销。例如：选择高铁一等座位按二等座位标准报销，动车一等座位按二等座位标准报销，飞机商务舱或头等舱按经济舱标准报销，火车软卧按火车硬卧标准报销等。未达到飞机乘坐标准选择坐飞机，按动车二等座报销，如未开通动车，按火车硬卧中铺标准报销。</span></p><p><span style=\"font-size: 20px;\">（2）出差人员应提前计划好出差时间，提前订票，不能因为买不到高铁或动车票，不愿意选择火车硬卧或硬坐而影响出差。</span></p><p><span style=\"font-size: 20px;\">（3）原则上出差人员超标准乘坐交通工具，超标自理，如果总经理临时委派工作，需要在最短时间达到等特殊情况，（如飞机票、软卧火车票、一等座），须经总经理签字同意后方可报销；在钉钉“出差申请单”上写明交通工具。</span></p><p><span style=\"font-size: 20px;\">（4）员工出差白天乘坐空调快速火车时间在6小时以下，夜间（指晚9时至次日凌晨7时）4小时以下，只能乘坐硬座，不报销火车硬卧标准。动车及高铁不得乘坐一等座及卧铺。</span></p><p><span style=\"font-size: 20px;\">（5）长途交通票据遗失，出差事项真实，提供购买截图，按报销标准的90%抵票报销；</span></p><p><span style=\"font-size: 20px;\">（6）出差途中，经批准回家探亲的，按工作地至出差地直达车费标准据实报销；</span></p><p><span style=\"font-size: 20px;\">（7）出差期间因病住院，按60元/天给餐饮补助，住院超过10天的停发补助；</span></p><p><br/></p><p><span style=\"font-size: 24px;\">报销发票要求：</span></p><p><span style=\"font-size: 20px;\">（1）住宿费凭发票据实报销，且住宿费发票必须与实际出差地相符，发现虚假，不予报销并罚款处理；</span></p><p><span style=\"font-size: 20px;\">（2）出差属实，因住宿发票遗失，按出差地标准凭抵票报销50%；</span></p><p><span style=\"font-size: 20px;\">车辆过路费：</span></p><p><span style=\"font-size: 20px;\">（1）过路费实行据实报销，过路费票据日期必须与出差日期相符，否则不予报销；</span></p><p><span style=\"font-size: 20px;\">（2）出差人员不得随意涂改过路费票据上的内容，否则不予报销；</span></p><p><span style=\"font-size: 20px;\">车辆停车费：</span></p><p><span style=\"font-size: 20px;\">（1）出差人员出差期间，必须将车辆存放到有人看守的停车场，凭停车场出具的停车费票据据实报销，并在停车票背面注明停车时间、地点；</span></p><p><span style=\"font-size: 20px;\">（2）停车费为白条或收据不符合规定的不予报销。</span></p><p><span style=\"font-size: 20px;\">洗车费：</span></p><p><span style=\"font-size: 20px;\">公务用车的洗车费凭票报销；</span></p><p><span style=\"font-size: 20px;\"><br/></span></p><p></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537674890585542.png\" title=\"1537674890585542.png\" alt=\"图片17.png\"/></p><p><span style=\"font-size: 20px;\">步骤一：自行填写出差事由、交通工具、单程/往返、出发城市、目的城市、开始时间、结束时间（时长及出差天数自动计算）；</span></p><p><span style=\"color: rgb(255, 0, 0); font-size: 20px;\">（如若增加行程，自行重复步骤一）</span></p><p><span style=\"font-size: 20px;\">步骤二：出差备注需自行填写，注明出差主要目的；</span></p><p><span style=\"font-size: 20px;\">步骤三：同行人根据实际情况，进行增减。</span></p><p><span style=\"font-size: 20px;\">认真阅读公司出差制度，考虑自己可报销水准，回到公司后三日内进行报销申请。</span></p><p><br/></p>', 13, NULL, 1, 1537670520, 1537674928, 54, '出差');
INSERT INTO `dcxw_chapter` VALUES (25, 21, '事业部签约流程', '/uploads/article/20180923/addee308001c6cd743dc5c69fea6e2ab.png', NULL, '<p><br/></p><p><span style=\"font-size: 20px;\">签约流程图</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537670749987271.png\" title=\"1537670749987271.png\" alt=\"image.png\"/></p>', 10, NULL, 1, 1537670764, 1537670764, 54, '事业部签约流程');
INSERT INTO `dcxw_chapter` VALUES (37, 24, '运营部岗位职责表', '/uploads/article/20180925/0128060b1f31a8d7ab11d63d3a34283c.png', NULL, '<p><span style=\"letter-spacing: 0px; font-family: 等线; font-size: 24px;\">网络运营专员</span></p><p><span style=\"font-size: 20px;\">•负责公司网站或服务网站及电子商务平台产品信息的发布及维护、优化；</span></p><p><span style=\"font-size: 20px;\">•独立运营微信公众号，负责微信公众号的日常运营及维护工作；</span></p><p><span style=\"font-size: 20px;\">•独立运营微博、百家号、一点号等新媒体平台的维护；</span></p><p><span style=\"font-size: 20px;\">•负责制定微信运营策略及活动策划，定期与粉丝互动，策划并执行线上推广活动；</span></p><p><span style=\"font-size: 20px;\">•跟踪微信推广效果，分析反馈数据，建立有效的运营手段提升用户活跃度，增加粉丝数量；</span></p><p><span style=\"font-size: 20px;\">•利用各种平台构建公司对外形象，为公司获取潜在客户资源。</span></p><p><span style=\"letter-spacing: 0px; font-family: 等线; font-size: 24px;\">文案策划</span></p><p><span style=\"font-size: 20px;\">•负责公司企业形象的树立、宣传、维护、提升；</span></p><p><span style=\"font-size: 20px;\">•负责展开市场调研，分析市场信息，掌握竞争对手的状况，把握市场现有局势；</span></p><p><span style=\"font-size: 20px;\">•负责促销方案的出台及落实，负责对促销效果进行总结、评估；</span></p><p><span style=\"font-size: 20px;\">•负责公司员工活动方案及客户活动方案的策划落实；</span></p><p><span style=\"font-size: 20px;\">•负责公司产品文案、品牌文案及项目文案的创意与撰写。</span></p><p><span style=\"font-size: 20px;\">•参与项目创意策略讨论，提出合理化的创意观点；</span></p><p><span style=\"font-size: 20px;\">•配合上级完成相关创意的文字表现工作；</span></p><p><span style=\"font-size: 20px;\">•完成领导布置的其它工作内容。</span></p><p><span style=\"letter-spacing: 0px; font-family: 等线; font-size: 24px;\">平面设计</span></p><p><span style=\"font-size: 20px;\">•配合网络运营专员及其它岗位完成公司宣传相关的设计工作。</span></p><p><span style=\"letter-spacing: 0px; font-family: 等线; font-size: 24px;\">PHP程序员</span></p><p><span style=\"font-size: 20px;\">•负责协助运营部总监进行技术评测，BUG处理，代码开发；</span></p><p><span style=\"font-size: 20px;\">•负责网站数据库、栏目、程序模块的设计与开发；</span></p><p><span style=\"font-size: 20px;\">•负责根据公司要求完成公司需求项目的开发；</span></p><p><span style=\"font-size: 20px;\">•按时按质完成公司下达程度开发、系统评测等工作任务；</span></p><p><span style=\"font-size: 20px;\">•定期维护网站程序，处理反馈回来的系统BUG；</span></p><p><span style=\"font-size: 20px;\">•网站程序开发文档的编写。</span></p><p><span style=\"letter-spacing: 0px; font-family: 等线; font-size: 24px;\">行政助理岗位</span></p><p><span style=\"font-size: 20px;\">•和工程部对接完成房屋的接收工作并盘点建立资产清单</span></p><p><span style=\"font-size: 20px;\">•部门档案的建立及整理</span></p><p><span style=\"font-size: 20px;\">•部门内人员的协调对接及公司内部部门间的协调对接；</span></p><p><span style=\"font-size: 20px;\">•完成公寓产品的上线展示工作。</span></p><p><span style=\"letter-spacing: 0px; font-family: 等线; font-size: 24px;\">运营主管</span></p><p><span style=\"font-size: 20px;\">•市区内房屋出租租金及租赁需求调研；</span></p><p><span style=\"font-size: 20px;\">•公寓产品定价与分析；</span></p><p><span style=\"font-size: 20px;\">•运营策略制定与分析；</span></p><p><span style=\"font-size: 20px;\">•客户需求调研分析；</span></p><p><span style=\"font-size: 20px;\">•包装公寓产品及短租产品，编写包装策划方案和推广渠道分析，制定有效的产品推广计划。</span></p><p><span style=\"font-size: 20px;\">•组建运营团队，落地公司运营政策，完成公寓产品的出租。</span></p><p><span style=\"letter-spacing: 0px; font-family: 等线; font-size: 24px;\">运营专员</span></p><p><span style=\"font-size: 20px;\">•负责客户接待，办理住户入住、退租、清算等工作；</span></p><p><span style=\"font-size: 20px;\">•负责公寓招租工作，开展招租信息发布，减少空房数；</span></p><p><span style=\"font-size: 20px;\">•解决住户需求，处理住户报修、投诉等日常服务工作；</span></p><p><span style=\"font-size: 20px;\">•维护客户关系，组织住户活动，提升住户满意度。</span></p><p><span style=\"letter-spacing: 0px; font-size: 20px; font-family: 等线;\"><br/></span><br/></p><p><br/></p><p><br/></p>', 11, NULL, 1, 1537853280, 1537853489, 1, '运营管理制度运营管理制度运营管理制度');
INSERT INTO `dcxw_chapter` VALUES (28, 23, '招聘管理规定', '/uploads/article/20180923/1f1b7d36e2b63b9136c697e99a91f6aa.png', NULL, '<p><br/></p><p><span style=\"font-size: 24px;\">第四章 招聘组织程序</span></p><p><span style=\"font-size: 20px;\">第十一条 招聘按下列步骤进行：</span></p><p><span style=\"font-size: 20px;\">（一）人力资源部根据批准后的申请表制定人员招聘计划，并负责联系有关部门进行招聘事宜；</span></p><p><span style=\"font-size: 20px;\">（二）人力资源部选择适合的招聘渠道发布招聘信息，收集人员资料(应聘人员填写《应聘员工面试表》，收到应聘资料后，进行初步的筛选，然后交需求部门负责人，由需求部门负责人根据岗位任职资格确定需面试的人选。人力资源部负责通知初选合格人员来公司进行复试；</span></p><p><span style=\"font-size: 20px;\">（三）人力资源部与需求部门负责人协同组织应聘人员的面试工作，由人力资源部和需求部门负责人分别面试应聘者，填写《面试记录表》，也可结合具体情况以会议的方式组织考核，填写考核记录。必要的时候也可进行其它方式的测试；</span></p><p><span style=\"font-size: 20px;\">（四）所有通过人事部、招聘需求部门负责人入职的应聘者由总经理在《员工入职登记表》《员工录用审批表》上签署最终意见。<span style=\"font-size: 18px;\">（具体表格见下页）</span></span></p><p><br/></p><p><span style=\"font-size: 20px;\">面试所需表格（仅供未带简历应聘者）：</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537689625480300.png\" title=\"1537689625480300.png\" alt=\"图片4.png\"/><img src=\"/public/ueditor/php/upload/image/20180923/1537689630386928.png\" title=\"1537689630386928.png\" alt=\"微信图片_20180923155952.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537689672237040.png\" title=\"1537689672237040.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537689673911543.png\" title=\"1537689673911543.png\"/></p><p><span style=\"font-size: 18px; color: rgb(192, 0, 0);\">注：所有入职登记表内容应根据自身情况 如实进行填报，要求本人填写所有内容所附证明文件，均真实和有效；如若有刻意隐瞒行为，作辞退处理，如果因本人提供的信息、文件和资料不实或不全，导致招聘单位作出错误的判断，由此引发的一切后果，包括法律责任， 完全由本人承担。</span></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537689734547973.png\" title=\"1537689734547973.png\" alt=\"图片7.png\"/></p><p><span style=\"font-size: 18px; color: rgb(192, 0, 0);\">注：录用录用审批应填写完整里面内容，包括（姓名、部门、岗位以及面试时和人力资源部经理谈的试用期时间，试用期薪酬以及转正后薪酬等）</span></p><p><br/></p><p><br/></p>', 11, NULL, 1, 1537689784, 1537689784, 54, '招聘管理规定\r\n');
INSERT INTO `dcxw_chapter` VALUES (29, 23, '考勤制度', '/uploads/article/20180923/d3c085ffe368421055f9744a51970df0.png', NULL, '<p><span style=\"font-size: 24px;\">第一章&nbsp; 考勤管理</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第一条为规范员工劳动纪律管理，加强全体员工的纪律意识，进一步适应公司精细化管理的需要，根据国家相关法律法规及公司实际情况，特制定本制度。</span></p><p><span style=\"font-size: 20px;\">第二条本制度适用于公司全体员工。</span></p><p><span style=\"font-size: 20px;\">第三条基本定义：</span></p><p><span style=\"font-size: 20px;\">(一)迟到：上班时间已到仍未到岗。</span></p><p><span style=\"font-size: 20px;\">(二)早退：未到下班时间而提前离岗。</span></p><p><span style=\"font-size: 20px;\">(三)脱岗：工作时间未经领导批准离开工作岗位。</span></p><p><span style=\"font-size: 20px;\">(四)旷工：无任何手续无故不上班。有下列情况者均按旷工论处：迟到、早退或脱岗连续超过60分钟；未经批准而不到岗者；不服从工作调动，经教育仍不到岗者；采取不正当手段，涂改，骗取、伪造休假证明者；违纪、违规行为造成的缺勤；无离职手续而擅自离职的；上下班未打卡者。</span></p><p><span style=\"font-size: 20px;\">（五） 考勤统计时间：每月考勤周期按自然月计算。</span></p><p><span style=\"font-size: 20px;\">（六） 全勤：正常考勤，无任何迟到、早退、旷工、事假、病假、婚假、产假、计划生育假、丧假、工伤假等情况出现；</span></p><p><span style=\"font-size: 20px;\">第四条考勤是计发工资、奖金、绩效、其它福利等待遇的重要依据。</span></p><p><span style=\"font-size: 20px;\">第五条考勤时间规定： 上午：09:00--12:00，下午：13:00--18:00。</span></p><p><span style=\"font-size: 20px;\">第六条由公司发文组织的活动、会议、培训学习及各类值班等须统一按考勤管理，迟到、早退、无故缺席等人员将按文件相关规定予以惩戒。</span></p><p><span style=\"font-size: 20px;\">第四条考勤是计发工资、奖金、绩效、其它福利等待遇的重要依据。</span></p><p><span style=\"font-size: 20px;\">第五条考勤时间规定： 上午：09:00--12:00，下午：13:00--18:00。</span></p><p><span style=\"font-size: 20px;\">第六条由公司发文组织的活动、会议、培训学习及各类值班等须统一按考勤管理，迟到、早退、无故缺席等人员将按文件相关规定予以惩戒。</span></p><p><span style=\"font-size: 20px;\">第七条公司员工须每天上午上班、下午下班考勤两次。全体员工须在公司钉钉平台上进行打卡方视为有效考勤；如若忘记打卡，如及时在人事部登记考勤异动表；发文组织的活动、会议、培训学习及各类值班以点名或钉钉进行考勤（《员工请假审批单》和《员工外出证明单》同样适用）。</span></p><p><span style=\"font-size: 20px;\">第八条&nbsp; 违反考勤制度者，按以下标准予以处罚：每人每月一次10分钟以内的迟到，不做处罚；超过一次后，迟到1-10分钟之内按10元给予处罚，迟到10-20分钟按20元给予处罚；上午10：30前未到岗的按旷工半天计，旷工半天按员工个人1天平均工资处罚；超过12：00仍未到岗的按旷工一天计，旷工按员工个人3天平均工资处罚。</span></p><p><span style=\"font-size: 20px;\">正常工作时间未经所在部门负责人同意未在岗的行为视为旷工，连续旷工三天，视为自动离职，不结算当月工资。</span></p><p><span style=\"font-size: 20px;\">第九条&nbsp; &nbsp;员工因公需要外出时，在钉钉平台走审批流程，经部门负责人审批通过后方可外出。</span></p><p><span style=\"font-size: 20px;\">第十条 请假及出差批准权限如下：</span></p><p><span style=\"font-size: 20px;\">(一)请假或出差1个工作日以内（含2个工作日），一般员工须经所在直属上级与人事部门负责人处审批；</span></p><p><span style=\"font-size: 20px;\">(二)请假或出差超过3个工作日（含3个工作日），由部门负责人、人事部门负责人、部门总经理审批。</span></p><p><span style=\"font-size: 20px;\">第十一条 请假规定：</span></p><p><span style=\"font-size: 20px;\">请假包括：事假、病假、婚假、产假、丧假、工伤假等。</span></p><p><span style=\"font-size: 20px;\">(一)事假：办理事假须提出事假理由。</span></p><p><span style=\"font-size: 20px;\">(二)病假：办理病假须提供医疗或住院证明材料。</span></p><p><span style=\"font-size: 20px;\">&nbsp;1.1病假在1天以上（含2天），需提供医疗证明。</span></p><p><span style=\"font-size: 20px;\">&nbsp;1.2病假在3天（含3天以上），需提供三甲医院医疗证明。</span></p><p><span style=\"font-size: 20px;\">(三)婚假：凡符合《中华人民共和国婚姻法》，已履行正式登记手续者，给予带薪婚假，具体按当事人实际情况并参照当地法律法规标准执行。</span></p><p><span style=\"font-size: 20px;\">(四)产假：计划生育假按国家相关法律执行。</span></p><p><span style=\"font-size: 20px;\">(五)丧假：员工（直系）亲属过世，根据国家相关法律给予三天假期。</span></p><p><span style=\"font-size: 20px;\">(六)工伤假：因公负伤，持医院诊断证明及工伤鉴定，可办理工伤假。</span></p><p><span style=\"font-size: 20px;\">(七)年休假：公司员工原则上每年春节期间享受七天带薪年假（含法定节假日），员工的探亲假及年休假统一安排在春节假期中，不另行给假。</span></p><p><span style=\"font-size: 20px;\">第九条&nbsp; &nbsp;员工因公需要外出时，在钉钉平台走审批流程，经部门负责人审批通过后方可外出。</span></p><p><span style=\"font-size: 20px;\">第十条 请假及出差批准权限如下：</span></p><p><span style=\"font-size: 20px;\">(一)请假或出差1个工作日以内（含2个工作日），一般员工须经所在直属上级与人事部门负责人处审批；</span></p><p><span style=\"font-size: 20px;\">(二)请假或出差超过3个工作日（含3个工作日），由部门负责人、人事部门负责人、部门总经理审批。</span></p><p><span style=\"font-size: 20px;\">第十一条 请假规定：</span></p><p><span style=\"font-size: 20px;\">请假包括：事假、病假、婚假、产假、丧假、工伤假等。</span></p><p><span style=\"font-size: 20px;\">(一)事假：办理事假须提出事假理由。</span></p><p><span style=\"font-size: 20px;\">(二)病假：办理病假须提供医疗或住院证明材料。</span></p><p><span style=\"font-size: 20px;\">&nbsp;1.1病假在1天以上（含2天），需提供医疗证明。</span></p><p><span style=\"font-size: 20px;\">&nbsp;1.2病假在3天（含3天以上），需提供三甲医院医疗证明。</span></p><p><span style=\"font-size: 20px;\">(三)婚假：凡符合《中华人民共和国婚姻法》，已履行正式登记手续者，给予带薪婚假，具体按当事人实际情况并参照当地法律法规标准执行。</span></p><p><span style=\"font-size: 20px;\">(四)产假：计划生育假按国家相关法律执行。</span></p><p><span style=\"font-size: 20px;\">(五)丧假：员工（直系）亲属过世，根据国家相关法律给予三天假期。</span></p><p><span style=\"font-size: 20px;\">(六)工伤假：因公负伤，持医院诊断证明及工伤鉴定，可办理工伤假。</span></p><p><span style=\"font-size: 20px;\">(七)年休假：公司员工原则上每年春节期间享受七天带薪年假（含法定节假日），员工的探亲假及年休假统一安排在春节假期中，不另行给假。</span></p><p><br/></p><p><br/></p><p><span style=\"font-size: 24px;\">第二章 全勤奖制度</span></p><p><span style=\"font-size: 20px;\">一、目的</span></p><p><span style=\"font-size: 20px;\">为了更好的促进公司管理工作，提高员工的积极性和工作效率，完善内部考勤管理制度，特设立本制度。</span></p><p><span style=\"font-size: 20px;\">二、全勤奖标准和方法</span></p><p><span style=\"font-size: 20px;\">标准：当月全勤者，获得当月全勤资金200元。</span></p><p><span style=\"font-size: 20px;\">发放：当月有考核，次月15日同员工工资一起发放。</span></p><p><span style=\"font-size: 20px;\">三、权责</span></p><p><span style=\"font-size: 20px;\">1、行政人事部负责考勤管理、条件审核等。</span></p><p><span style=\"font-size: 20px;\">2、财务部门负责全勤资金的核发。</span></p><p><span style=\"font-size: 20px;\">四、全勤奖实施程序</span></p><p><span style=\"font-size: 20px;\">1、考勤管理</span></p><p><span style=\"font-size: 20px;\">员工考勤表由行政人事部根据员工上班时间进行汇总。</span></p><p><span style=\"font-size: 20px;\">五、发放要求</span></p><p><span style=\"font-size: 20px;\">1、凡是根据作息时间规定，月内上班达全勤奖要求的，均可获得当月全勤奖，但有下列行为之一者取消全勤奖：</span></p><p><span style=\"font-size: 20px;\">2、考核当月内请假行为者，不予享受全勤奖，婚假、丧假均视为正常出勤，不影响全勤奖考评；</span></p><p><span style=\"font-size: 20px;\">3、出现怠工，罢工者取消当月全勤奖；</span></p><p><span style=\"font-size: 20px;\">4、当月迟到早退达到3次的，取消当月全勤奖，并根据公司的《考勤管理制度》相关规定并惩戒；</span></p><p><span style=\"font-size: 20px;\">5、新进员工未满一个月，按实际天数发放当月全勤奖；当月未做满整个月的离职的人员（包括自动辞职，解除劳动合同等）不计发当月全勤奖；未按规定离职者，计发工资时不享受全勤奖；</span></p><p><span style=\"font-size: 20px;\">6、当月处理停薪留职期间员工或处于长期休假的员工，停发全勤奖，待正式恢复工作后，再参考公司考勤规定重新计发。</span></p><p><span style=\"font-size: 20px;\">7、本制度自2018年5月有11日起实施，本制度最终解释权归人力资源部所有。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第十三条 出差手续的办理：</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;员工出差须提前一天填写在钉钉办理出差手续，按审批权限报相关领导审批后及时备案。</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537690007525468.png\" title=\"1537690007525468.png\" alt=\"微信图片_20180923160604.png\"/></p><p><br/></p><p><span style=\"font-size: 20px;\">第十二条 请假手续的办理：</span></p><p><span style=\"font-size: 20px;\">(一)请假须至少提前一日在钉钉上申请，按审批权限报相关领导审批后及时报备。未办理请假手续擅自离岗者，视不同情况按早退、旷工等相关处罚规定处理。</span></p><p><span style=\"font-size: 20px;\">(二)特殊情况不能提前办理请假手续者，须于当日按审批权限电话向上级负责人说明原因，经同意后可请假，并于事后一天内补办请假手续，否则视同旷工。</span></p><p><span style=\"font-size: 20px;\">(三)如有特殊情况需续假者，须提前一天按审批流程电话向上级负责人说明原因，经批准后方可顺延，否则超假部分按旷工处理。假期结束后须补办请假手续，未补办天数按旷工处理。</span></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537690397701048.png\" title=\"1537690397701048.png\" alt=\"图片10.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537690091387713.png\" title=\"1537690091387713.png\" alt=\"微信图片_20180923160721.png\"/></p><p><br/></p><p><br/></p>', 13, NULL, 1, 1537690214, 1537846701, 54, '考勤制度\r\n');
INSERT INTO `dcxw_chapter` VALUES (30, 23, '试用期制度', '/uploads/article/20180923/24d6dd7d20374e7cc2a0a430d4635426.png', NULL, '<p><span style=\"font-size: 24px;\">目的与适用范围</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第一条&nbsp; 为使新员工尽快熟悉工作，融入所属团队和公司文化，同时明确新员工在试用期期间，人事部、所在部门和新员工本人的职责，加强试用期管理，制定本制度。</span></p><p><span style=\"font-size: 20px;\">第二条&nbsp; 所有通过外部招聘加入公司到达新岗位的员工都要进行新岗位试用期考察。外聘员工的试用期，试用期期限根据所签署的合同年限决定，常规都在1-2个月</span></p><p><span style=\"font-size: 20px;\">第三条&nbsp; 试用期员工在入职一个月内签订劳动合同。</span></p><p><br/></p><p><br/></p><p><span style=\"font-size: 24px;\">试用期考核及不符合录用条件</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第二章&nbsp; 试用期管理程序</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第四条&nbsp; 员工的试用期管理按下列步骤进行：</span></p><p><br/></p><p><span style=\"font-size: 20px;\">&nbsp;(一)外聘新员工的入职当日人事部将为新员工安排的包含对公司发展历程、概况、发展前景、企业文化、组织架构、管理制度、员工礼仪、业务介绍对同事的介绍等入职培训；</span></p><p><span style=\"font-size: 20px;\">&nbsp;(二)新员工所在部门负责人应对部门职责、规章制度、岗位业务技能等进行入职培训；</span></p><p><span style=\"font-size: 20px;\">&nbsp;(三)在员工入职两个月结束之前的前一周，由人事部和部门负责人分别与之谈话，评价新员工的工作业绩，并给予指导，了解新员工需要的支持；</span></p><p><span style=\"font-size: 20px;\">&nbsp;(四)新员工转正日的前一周，应提交《试用人员转正审批表》，部门经理、人事部负责人和新员工做转正面谈并签署意见。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第五条 试用期的员工由人事部及所在部门共同负责考查。</span></p><p><br/></p><p><br/></p><p><span style=\"font-size: 20px;\">试用人员转正审批表如下：</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537690849773081.png\" title=\"1537690849773081.png\" alt=\"微信图片_20180923162022.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537690906620352.png\" title=\"1537690906620352.png\" alt=\"image.png\"/></p><p><span style=\"font-size: 20px;\"><br/></span><br/></p><p><span style=\"font-size: 20px;\">第三章&nbsp; 试用期薪酬福利</span></p><p><span style=\"font-size: 20px;\">第六条&nbsp; 试用期工资按公司有关规定执行，试用期期间一般按应聘时谈定的正式工资的80%发放工资。（特殊情况除外）</span></p><p><br/></p>', 8, NULL, 1, 1537690924, 1537846750, 54, '试用期制度');
INSERT INTO `dcxw_chapter` VALUES (31, 23, '劳动合同签订', '/uploads/article/20180923/4806f886384fa4179fcc062e4d94d379.png', NULL, '<p><span style=\"font-size: 20px;\">第一条&nbsp; 为确保公司员工双方的权益均受到尊重，使公司和员工之间形成正常的并符合国家劳动法规用工关系，特制订本规定。</span></p><p><span style=\"font-size: 20px;\">(一)第二条&nbsp; 根据公司的用工情况，招聘录用与第三方无其他劳动关系的人员，公司与之签订《劳动合同书》；</span></p><p><span style=\"font-size: 20px;\">第二条&nbsp; 签订《劳动合同书》的员工须向人事部门出示：</span></p><p><span style=\"font-size: 20px;\">(一)与原单位解除（终止）劳动合同的证明；</span></p><p><span style=\"font-size: 20px;\">(二)失业证或待业证；</span></p><p><span style=\"font-size: 20px;\">(三)其他形式与第三方无劳动关系的证明。</span></p><p><span style=\"font-size: 20px;\">第三条 《劳动合同书》签订的时间和年限。《劳动合同书》签订期限：公司员工劳动合同的签订和续签期限，分别根据公司统一规定；</span></p><p><span style=\"font-size: 20px;\">(一)新员工签订劳动合同期限1年，其中双方约定试用期1-2个月；</span></p><p><span style=\"font-size: 20px;\">(二)员工续签劳动合同期限为1年；</span></p><p><span style=\"font-size: 20px;\">(三)员工若隐瞒与第三方之间的劳动关系或提供不实资料，就用工事宜造成我司于其他单位产生纠纷的，由员工承担由此造成的直接或间接的经济损失和法律责任。</span></p><p><span style=\"font-size: 20px;\">(四)《劳动合同书》一式贰份，甲乙双方各持一份。</span></p><p><span style=\"font-size: 20px;\">第四条&nbsp; 《劳动合同书》的鉴证：公司员工签订的《劳动合同书》，由公司职能部门送到劳动局鉴证。</span></p><p><span style=\"font-size: 20px;\">第五条&nbsp; 《劳动合同书》的变更、解除、终止：根据《劳动合同书》的约定、按《劳动法》的规定或经双方协商一致，可以依法变更、解除。</span></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p>', 8, NULL, 1, 1537691085, 1537691085, 54, '劳动合同签订\r\n\r\n');
INSERT INTO `dcxw_chapter` VALUES (32, 23, '培训管理制度', '/uploads/article/20180923/5e9019658abf92032cfd3409eb17466e.png', NULL, '<p><span style=\"font-size: 24px;\">第一章 总则</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第一条为进一步规范公司的培训管理工作，理顺培训管理关系，提高培训工作的质量和成效，打造学习型组织，特制定本制度。</span></p><p><span style=\"font-size: 20px;\"><br/></span></p><p><span style=\"font-size: 20px;\">第二条公司系统的培训主要分为新员工入职培训、部门业务培训、专题培训等。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第三条人事部为系统培训统一管理的职能部门，对公司各类系统培训工作业务进行指导、协调和监督，同时负责组织实施员工入职培训</span></p><p><span style=\"font-size: 20px;\">等；公司和部门配合人事部组织实施统一培训工作，同时负责本单位业务培训及专题培训等。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第四条公司人事部门根据公司各类培训计划协调、准备、落实会议场地和培训设备等。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第五条公司各组织培训责任部门在申报培训费用前，须报人力资源部备案，财务部据此列支费用。</span></p><p><br/></p><p><br/></p><p><span style=\"font-size: 20px;\">劳动合同签订的时间</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537691144316636.png\" title=\"1537691144316636.png\" alt=\"image.png\"/></p><p><br/></p><p><br/></p><p><span style=\"font-size: 24px;\">第二章 部门业务培训</span></p><p><span style=\"font-size: 24px;\"><br/></span></p><p><span style=\"font-size: 20px;\">第七条&nbsp; 部门业务培训由公司各部门根据年度培训计划自行组织实施：</span></p><p><span style=\"font-size: 20px;\">(一)部门业务培训对象为公司本业务员工。</span></p><p><span style=\"font-size: 20px;\">(二)部门业务培训时间由部门具体安排。</span></p><p><span style=\"font-size: 20px;\">(三)部门业务培训单次授课总课时不得少于2小时（不包含培训考核及评估时间）。</span></p><p><span style=\"font-size: 20px;\">(四)公司各部门授课讲师原则上为部门业务骨干、部门中层及以上领导。</span></p><p><span style=\"font-size: 20px;\">(五)部门业务培训考核由各部门自行安排实施。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第八条按要求参加公司统一组织的培训；因故请假者原则上由培训组织单位负责人审批。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第九条公司各部门在业务培训结束后三天内须将培训课件及考试成绩等交人力资源部备案。</span></p><p><br/></p><p><br/></p><p><span style=\"font-size: 24px;\">第三章 专题培训</span></p><p><span style=\"font-size: 24px;\"><br/></span></p><p><span style=\"font-size: 20px;\">第十条公司专题培训须报公司首席执行官审批，并由人事部负责统一组织实施。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第十一条公司各部门专题培训经主管领导审批同意后，由各部门自行负责组织实施，并在培训结束后三天内将培训交人事部备案。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第十二条公司各部门专题培训自行组织安排。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">第四章 培训记录归档</span></p><p><span style=\"font-size: 20px;\">第十三条 公司各类培训成绩由人力资源部及时纳入员工个人档案。</span></p><p><br/></p>', 11, NULL, 1, 1537691278, 1537846834, 54, '培训管理制度\r\n\r\n');
INSERT INTO `dcxw_chapter` VALUES (33, 23, '离职管理规定', '/uploads/article/20180923/4d69b50754e6760cba6e90895142c47a.png', NULL, '<p><span style=\"font-size: 24px;\">第一章&nbsp; 目的与范围</span></p><p><span style=\"font-size: 24px;\"><br/></span></p><p><span style=\"font-size: 20px;\">第一条 为规范公司人事管理制度，保证劳动合同的有效执行，维护公司和员工的合法权益，制定本制度。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">第二条&nbsp;&nbsp;</span><span style=\"font-size: 20px;\">本制度适用于公司正式员工辞退、辞职。</span></p><p><span style=\"font-size: 20px;\">第三条 不按此办法执行，追究人事部和其他相关责任人的责任，给公司造成经济损失的，依照公司相关规章制度的规定，有责人赔偿其经济损失。</span></p><p><span style=\"font-size: 20px;\"><br/></span></p><p><span style=\"font-size: 24px;\">第二章&nbsp; 离职程序</span></p><p><span style=\"font-size: 24px;\"><br/></span></p><p><span style=\"font-size: 20px;\">第四条 员工离职要严格执行劳动合同中的变更、解除、终止等有关条款。员工主动离职时应提前三十天向公司提出书面申请，经公司批准后按劳动合同有关规定处理。</span></p><p><span style=\"font-size: 20px;\">第五条 劳动合同没有到期而由公司提出解聘的或合同到期但公司没有继续聘任的，由公司人事部应提前三十天通知当事人，并说明解聘或不续约理由，并按劳动合同和公司相关规定办理有关事宜。</span></p><p><span style=\"font-size: 20px;\">第六条 员工离职应填写《员工离职申请单》，经部门经理签字后，由人事部送交至首席执行官批准后，办理相关手续。</span></p><p><span style=\"font-size: 20px;\">第七条 离职人员必须按《员工离职移交手续清单》完成工作及相关事宜交接后方可办理离职手续。</span></p><p><span style=\"font-size: 20px;\">第八条 员工离职未按公司要求办理完离职手续而离司者，公司可暂停办理其工资结算和其他相关手续。</span></p><p><span style=\"font-size: 20px;\">第九条 员工离职不办手续，携款或携带公司财产、资料离开公司者公司追究其责任，并要求赔偿对公司造成的损失。</span></p><p><span style=\"font-size: 20px;\">&nbsp;</span></p><p><span style=\"font-size: 20px;\">具体流程如下：</span></p><p><img src=\"/public/ueditor/php/upload/image/20180923/1537691608821559.png\" title=\"1537691608821559.png\" alt=\"微信图片_20180923163050.png\"/></p>', 25, NULL, 1, 1537691492, 1537846893, 54, '离职管理规定');
INSERT INTO `dcxw_chapter` VALUES (39, 21, '民宿酒店的将来', '/uploads/article/20180926/ef6cc58d6f47065d5f3cb3f65d374c38.png', NULL, '<p><span style=\"font-size: 20px;\"><br/></span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537932626428262.png\" title=\"1537932626428262.png\" alt=\"113.png\"/></p><p><br/></p><p><br/></p><p><span style=\"font-size: 24px;\">一、民宿的发展史：</span></p><p><span style=\"font-size: 20px;\">发展历史：</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; “民宿”的起源有很多说法，有研究说来自日本，也有的说来自于法国。探究民宿一词，更多的是来自于英国。公元1960年代初期，英国的西南部与中部人口较稀疏的农家，为了增加收入开始出现民宿，当时的民宿数量并不多，是采用B&amp;B（Bed and Breakfast）的经营方式，它的性质是属于家庭式的招待，这就是英国最早的民宿。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; Bed and Breakfast： 住宿加次日早餐</span></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537932704833887.png\" title=\"1537932704833887.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537932704365513.png\" title=\"1537932704365513.png\"/></p><p><br/></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; “民宿”在台湾的发展有很长的历史，最早大规模民宿发展的地区是垦丁国家公园，时间约在1981年左右，当初是解决住宿不足的问题。只是一种简单住宿型态，没有导览或餐饮服务。起因于游憩区假日的大饭店旅馆住宿供应不足或缺乏服务，或登山旅游借住山区房舍工寮缘起，有空屋人家因而起意挂起民宿的招牌，或直接到饭店门口、车站等地招揽游客，而兴起此行业。</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537932776327091.png\" title=\"1537932776327091.png\" alt=\"114.png\"/></p><p><br/></p><p><span style=\"font-size: 24px;\">全球各地民宿特色</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;法国：仍以“B&amp;B”方式经营，民宿经营以保护农舍为目的，民宿收入仅作为家庭补贴。</span></p><p><span style=\"font-size: 20px;\">　　(B&amp;B全称BED AND BREADFIRST，意思为含一人次的早餐的一夜住宿费)</span></p><p><span style=\"font-size: 20px;\">　　英国：以观光农场经营民宿的方式呈现，属副业经营，40%的游客选择民宿过夜。</span></p><p><span style=\"font-size: 20px;\">　　台湾：源起于80年代，后来居上，成为全球民宿发展最成熟的地区，民宿自身成为核心吸引力之一。</span></p><p><span style=\"font-size: 20px;\">　　日本：民宿属于旅馆的一种，多位于景区、地域特色鲜明的区域，目前拥有2.5万家民宿。</span></p><p><span style=\"font-size: 20px;\">　　美国：居家式的民宿最为突出，多以青年旅舍、家庭旅馆的形式呈现，价格便宜。</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537932811506979.png\" title=\"1537932811506979.png\" alt=\"图片4.png\"/></p><p><br/></p><p><span style=\"font-size: 24px;\">国内住宿发展历程</span></p><p><span style=\"font-size: 20px;\">以客栈为代表的个性化住宿产品进入爆发增长期。</span></p><p><span style=\"font-size: 20px;\">　　1、国营住宿产品 (20世纪80年代以前)：住宿产品以国营饭店、招待所为主。</span></p><p><span style=\"font-size: 20px;\">　&nbsp; &nbsp;2、外资高端酒店(20世纪80年代) ：1980-1988年，外资进入中国，带来先进管理经验和服务标准，合资或外资单体酒店成为高端酒店的市场主体。</span></p><p><span style=\"font-size: 20px;\">　　3、星级标准酒店(20世纪90年代) ： 1989-1998年，市场经济的发展催生高端酒店标准化需求，外资、合资和民营酒店数量迅速增加，酒店评星体系逐渐完善。</span></p><p><span style=\"font-size: 20px;\">　&nbsp; &nbsp;4、经济标准化酒店(20世纪90年代-2010年代) ：20世纪90年代以来，大众雏形需求迅速增加，经济型酒店盛行;商务出行是主体，对服务标准化的需求催生经济连锁酒店迅速扩张。</span></p><p><span style=\"font-size: 20px;\">　&nbsp; &nbsp;5、个性化住宿(目前) ：近年，我国旅游度假需求增长迅速，大众出行主体由商务转向个人，消费主体由60后、70后转向80后乃至90后，客栈等个性化住宿的需求明显增加。</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537932948687029.png\" title=\"1537932948687029.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537932948582243.png\" title=\"1537932948582243.png\"/></p><p><br/></p><p><span style=\"font-size: 20px;\">20世纪90年代萌芽阶段：</span></p><p><span style=\"font-size: 20px;\">　　重点区域——丽江、大理、北戴河</span></p><p><span style=\"font-size: 20px;\">　　客栈性质——纯住宿补充</span></p><p><span style=\"font-size: 20px;\">　　发展特点——发展区域有限;居民自发开发为主;价格低廉、产品简单。</span></p><p><span style=\"font-size: 20px;\">　　21世纪初期发展阶段：</span></p><p><span style=\"font-size: 20px;\">　　重点区域——丽江、大理、北戴河; 阳朔、凤凰、厦门等</span></p><p><span style=\"font-size: 20px;\">　　客栈性质——特色体验为主要吸引</span></p><p><span style=\"font-size: 20px;\">　　发展特点——有特色建筑和风情的休闲度假型古城古镇为主要发展区域;强调个性化、特色化风格与体验;外来经营者普遍。</span></p><p><span style=\"font-size: 20px;\">　　2010年以后拓展升级阶段：</span></p><p><span style=\"font-size: 20px;\">　　重点区域——丽江、大理、北戴河; 阳朔、凤凰、厦门等; 杭州、西塘、同里等</span></p><p><span style=\"font-size: 20px;\">　　客栈性质——群体成为目的地吸引，单体开始走向精品化</span></p><p><span style=\"font-size: 20px;\">　　发展特点——古城古镇和特色旅游城市为主，区域快速拓展;</span></p><p><span style=\"font-size: 20px;\">　　多元发展，出现品牌化、精品化、连锁化趋势;出现客栈联盟等行业组织;电商进军客栈在线预订领域。</span></p><p><span style=\"font-size: 20px;\">　　</span></p><p><span style=\"font-size: 24px;\">数据统计</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;根据去哪儿网客栈频道数据显示，目前国内客栈主要分布在非大城市的热门旅游目的地，如丽江、大理、凤凰、阳朔、香格里拉、泸沽湖、拉萨、三亚、厦门鼓浪屿、厦门曾厝垵、杭州、西塘、乌镇、秦皇岛等。</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537933168544033.png\" title=\"1537933168544033.png\" alt=\"图片7.png\"/></p><p><br/></p><p><span style=\"font-size: 24px;\">二、民宿发展前景：</span></p><p><span style=\"font-size: 20px;\">多样性的民宿类型</span></p><p><strong><span style=\"font-size: 20px;\">从形式上来分</span></strong></p><p><span style=\"font-size: 20px;\">　　农家乐、家庭旅馆、青年旅社、乡村别墅、酒店式公寓、客栈</span></p><p><span style=\"font-size: 20px;\"><strong>从功能上来分</strong></span></p><p><span style=\"font-size: 20px;\">　　农业体验型——以农林渔牧业为基础，含吃、住、娱、休闲度假于一体的综合型场所。</span></p><p><span style=\"font-size: 20px;\">　　民俗体验型——以地理人文景观为特色，为游客提供休闲度假场所。</span></p><p><span style=\"font-size: 20px;\">　　度假休闲型——海滨、草原，海岛，森林，雪山、温泉等拥有独特旅游资源的地方，可以满足游客放松休闲需求的场所。</span></p><p><span style=\"font-size: 20px;\">　　艺术体验型——会体现出强烈的店主的风格，有较多的设计元素，酒店本身能给用户带来猎奇的心理，或能提供一些个性化产品或体验活动的地方。</span></p><p><span style=\"font-size: 20px;\">　　自助体验型——强调自助互助、实惠、不浪费，以社群生活和文化交流著称。顾客多为背包客、夫妻或结伴而行的游客。</span></p><p><span style=\"font-size: 20px;\">　　</span></p><p><span style=\"font-size: 24px;\">各区域的民宿风格划分</span></p><p><span style=\"font-size: 20px;\">历史古建的古朴：丽江束河花间堂唯美的人文客栈墨香院</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537933231549380.png\" title=\"1537933231549380.png\" alt=\"图片8.png\"/></p><p><span style=\"font-size: 20px;\"><br/></span></p><p><span style=\"font-size: 20px;\">禅意的虚无：南京无锡拈花湾</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537933255879605.png\" title=\"1537933255879605.png\" alt=\"图片9.png\"/></p><p><span style=\"font-size: 20px;\"><br/></span></p><p><span style=\"font-size: 20px;\">欧式的典雅：台湾南投弗莱堡庄园</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537933280781917.png\" title=\"1537933280781917.png\" alt=\"图片10.png\"/></p><p><br/></p><p><span style=\"font-size: 24px;\">民宿间的差异性</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp; 客栈：专业化经营，管家式服务，有独特的文化内涵，在建筑和装修上呈现出古色古香，雕梁画栋，古朴典雅、小桥流水的特点。</span></p><p><span style=\"font-size: 20px;\">　　乡村酒店：专业化经营，酒店式服务，规模大，装修较奢华。</span></p><p><span style=\"font-size: 20px;\">　　民俗村：集传统的地域性民族民俗文化特色，自然景观环境或人文景观，具有一定文化欣赏价值，并能提供旅游者吃、住、游、娱的旅游胜地。民俗村具有以下几种形式:原始的传统民族村、主题性民俗村与乡村休闲民俗旅游村(乡村风情民俗旅游与乡村农业旅游)。</span></p><p><span style=\"font-size: 20px;\">　　农家乐：个性化经营、装修简单、文化单一。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">民宿客栈与旅游</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 客栈跟着游客走：客栈成熟区域都具有大规模(1000万以上，客栈开始快速发展时至少200万)的游客基础;且都是休闲度假型的旅游目的地，游客都是长停留(停留时间基本都在2天以上)。</span></p><p><span style=\"font-size: 20px;\">　　游客为客栈而停留：鲜明的地域特色是客栈发展的良好基础;特色客栈的集聚，其本身就会成为旅游吸引，而不仅仅是配套(如丽江);客栈是观光型景区转型的抓手之一(如周庄)。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">典型案例——丽江</span></p><p><span style=\"font-size: 20px;\">&nbsp;1、丽江旅游起步阶段(1990-1995)玉龙雪山风景区等开发建设开始。</span></p><p><span style=\"font-size: 20px;\">&nbsp;2、丽江旅游巩固阶段(1999-2004)游客量年均增长5%。</span></p><p><span style=\"font-size: 20px;\">&nbsp;3、1995-1999年客栈起步;</span></p><p><span style=\"font-size: 20px;\">　　1995年第一家民居客栈开办;</span></p><p><span style=\"font-size: 20px;\">　　1999年世博期间，政府动员当地居民办家庭旅馆，提供优惠条件。</span></p><p><span style=\"font-size: 20px;\">&nbsp;4、丽江旅游兴盛阶段(2005-2008)丽江旅游上市、印象丽江启动、玉龙雪山获评5A。</span></p><p><span style=\"font-size: 20px;\">　　2005-2008年客栈开始兴盛，新一代年轻外来经营者为实现梦想、追求新的生活方式，客栈风格更多样、更个性，兴建客栈500多家。</span></p><p><span style=\"font-size: 20px;\">&nbsp;5、丽江旅游转型阶段(2008至今)国际精品旅游胜地目标、新城开发、国际品牌酒店纷纷进入。</span></p><p><span style=\"font-size: 20px;\">&nbsp;6、2010至今，客栈加速发展，逐步出现一些规模较大的品牌连锁客栈与企业型投资者规模总数在100间客房以上，日均营业额上万的客栈出现了几家。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">未来趋势</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537933420504901.png\" title=\"1537933420504901.png\" alt=\"115.png\"/></p><p><br/></p><p><span style=\"font-size: 24px;\">政策扶持</span></p><p><span style=\"font-size: 20px;\">一.试点</span></p><p><span style=\"font-family: 宋体; font-size: 20px;\">&nbsp; &nbsp; 2014年<span style=\"font-size: 20px; font-family: Calibri;\">12</span>月<span style=\"font-size: 20px; font-family: Calibri;\">31</span>日，中共中央办公厅、国务院办公厅引发《关于农村土地征收、集体经营建设用地入市、宅基地制度改革试点工作的意见》，决定在全国选出<span style=\"font-size: 20px; font-family: Calibri;\">30</span>个左右县<span style=\"font-size: 20px; font-family: Calibri;\">(</span>市）行政区域试点。</span></p><p><span style=\"font-family: 宋体; font-size: 20px;\">二.合法化</span></p><p><span style=\"font-family: 宋体; font-size: 20px;\">&nbsp;&nbsp;&nbsp;&nbsp;2015年<span style=\"font-size: 20px; font-family: Calibri;\">11</span>月<span style=\"font-size: 20px; font-family: Calibri;\">9</span>日，国务院网站发布《国务院办公厅关于加快发展生活性服务业促进消费结构升级的指导意见》国办发【<span style=\"font-size: 20px; font-family: Calibri;\">2015</span>】<span style=\"font-size: 20px; font-family: Calibri;\">85</span>号，首次点名：“积极发展客栈民宿、短租公寓、长租公寓等细分业态”，将其定性为生活性服务业，将在多维度给予政策扶持。推动了民宿合法化。</span></p><p><span style=\"font-size: 20px;\">三.鼓励支持发展</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; 2017年2月，中国社会科学院发布的《旅游绿皮书：2016-2017年中国旅游发展分析与预测》中提出，建议各地探索合理合法、高效一体的民宿行业管理政策，推出行业许可经营制度，建立统一的民宿审批和监管制度，提高民宿经营的规范性和稳定性。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">三、公司实力：</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 公司发展进程与前景</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 大城小屋不动产管理有限公司成立于2018年3月22日，总部位于陕西西安、同年6月份成都分公司正式成立。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 大城小屋不动产管理有限公司是一家专业从事长租公寓行业，涉及房产管理、交易服务、金融服务、后房地产服务一体的综合性不动产管理服务公司。业务覆盖房地产租赁买卖、标准装修、家政服务、抵押贷款等领域。我们致力于全产业链服务能力的不动产020平台。为闲置业主提供一站式托管服务。打造闲置房屋的共享经济时代，实现互联网共享营销的020商业模式。同时也是为城市租房人群提供高档社区+星级酒店服务+智能与科技完美融合为一体的高档智能型酒店。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;在未来三年内，我们将以西安为中心辐射全国主要城市。一期计划覆盖全国各大旅游城市（成都、重庆郑州、杭州、青岛、贵州、长沙等）构建覆盖全国主要城市的长租、短租、公寓平台，实现自营公寓10000+的战略目标，致力打造中国智能型公寓领导品牌。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">公司风采展示</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;截止目前与我公司合作业主已达近200人，在整个西安三环内外皆有我公司所收的房源也有200多套，以下是与我公司签署完合作协议的与一部分业主的合影</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537939471741199.png\" title=\"1537939471741199.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537939471865540.png\" title=\"1537939471865540.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537939471270250.png\" title=\"1537939471270250.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537939471152064.png\" title=\"1537939471152064.png\"/></p><p><br/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537939532407427.png\" title=\"1537939532407427.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537939532274079.png\" title=\"1537939532274079.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537939532777068.png\" title=\"1537939532777068.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537939532990797.png\" title=\"1537939532990797.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537939533889087.png\" title=\"1537939533889087.png\"/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537940021406918.png\" title=\"1537940021406918.png\" alt=\"116.png\"/></p><p><br/></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;9月19日，为了增强团队合作力增进员工情感交流，提升团队凝聚力，大城小屋西安公司组织开展了以“勇往无前，携手并进”为主题的团建活动。</span></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537940064173587.png\" title=\"1537940064173587.png\" alt=\"图片22.png\"/></p><p><br/></p><p><span style=\"font-size: 24px;\">员工风采展示</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;团队因个人而卓越，个人因团队而优秀，两者结合才能创造出更加卓越的成就所有搭火车呢过小屋不仅仅要组建一支强有力的队伍，更要把这支队伍紧紧的融合在一起。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 众所周知，大城小屋的员工颜值都高，大城小屋不仅CEO长得好看，整个团队颜值也不低，也都贼会玩。</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537940148743561.png\" title=\"1537940148743561.png\" alt=\"image.png\"/></p><p><br/></p><p><span style=\"font-size: 24px;\">成都分公司介绍</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;7月29日，大城小屋分公司正式落地成都。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;大城小屋成都分公司座落与成都环球中心，由中央游艺区和四周酒店、商业办公等部分组成的一个集游艺、展览、商务、传媒、购物、酒店于一体的多功能建筑。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;成都分公司的成立，让大城小屋在成都这个全球瞩目的金融中心和经济中心跨出了全国房屋回租拓展战略性的一步，同时标志着大城小屋在扩大市场的道路上迈出实质性的一步。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;分公司成立至今，我们的业务团队用非凡的业绩向人们展示了其一往无前的精神，整体人员秉承总公司携手共赢的企业总之，贯彻总公司服务至上的企业理念，用良好的大众口碑在成都房屋回租市场上树立了企业品牌。他们用真诚和锲而不舍的精神奠定公司全国性战略发展的基础，他们每一个人都将载入公司发展史册，我们同时也永远会铭记我们所有工作人员的辛勤劳动和付出。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">成都公司员工风采展示</span></p><p><span style=\"font-size: 24px;\"></span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537953472725103.jpg\" title=\"1537953472725103.jpg\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537953472820894.jpg\" title=\"1537953472820894.jpg\"/></p><p><br/></p><p>&nbsp; &nbsp; &nbsp; &nbsp;<span style=\"font-size: 20px;\">大城小屋相关负责人表示，在今后的发展中，成都分公司将充分利用其地理区位优势，在以下几个方面发挥重要作用：</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 一是对接市场和服务客户，成都是首批国家历史文化名城、中国最佳旅游城市和世界优秀旅游目的地，成都分公司的设立将极大地履行我们服务于长短租公寓和毛坯房屋回租的战略方向，提高我们对市场的品质服务力度以及和客户合作的紧密成都。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 二是吸纳人才的功能，成都是各类高层次人才、国际化人才的集聚地，成都分公司的设立将为公司吸引这些人才提供最基本的服务保障，有助于公司进一步凝聚优质的人才团队；</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 三是将先进的公寓理念和毛坯房屋回租服务带进成都这个悠久的文化名城，让成都人民也能切实感受到便捷、高端、品质的房屋回租和租赁服务。</span></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537953622264618.jpg\" title=\"1537953622264618.jpg\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537953622923906.jpg\" title=\"1537953622923906.jpg\"/></p><p></p><p><span style=\"font-size: 24px;\">成都公司团建活动</span></p><p><span style=\"font-size: 20px;\">为丰富员工的业余生活、增强部门之间的沟通交流，加强公司的凝聚力，提高工作效率和员工的积极性。为此成都分公司特别组织了此次团建拓展之旅。</span></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537952862359734.png\" title=\"1537952862359734.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537952863247815.png\" title=\"1537952863247815.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537952863983058.png\" title=\"1537952863983058.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180926/1537952863520731.png\" title=\"1537952863520731.png\"/></p><p><span style=\"font-size: 24px;\">四、运营模式：</span></p><p><span style=\"font-size: 20px;\">我们如何保证把房屋快速的出租？</span></p><p><span style=\"font-size: 20px;\">我们合作的五大优势：</span></p><p><span style=\"font-size: 20px;\">1、无中介费</span></p><p><span style=\"font-size: 20px;\">2、智能化系统，便捷轻松：智能门锁、线上签约、线上付款、线上预约、线上保修、线上退房；</span></p><p><span style=\"font-size: 20px;\">3、全屋品牌家电；</span></p><p><span style=\"font-size: 20px;\">4、付款灵活：支持日付、月付、季付、半年付、年付；</span></p><p><span style=\"font-size: 20px;\">5、支持同城换房。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">运营的优势讲解</span></p><p><span style=\"font-size: 20px;\">1、无中介费：公司直租，没有中间商赚差价，租客少花钱，业主多赚钱。</span></p><p><span style=\"font-size: 20px;\">2、智能系统、轻松便捷：租客通过APP或旅游网站，预定我公司的房屋，支持线上付款，</span></p><p><span style=\"font-size: 20px;\">房间有智能密码锁，不用在像传统酒店一样，省去登记，领房卡开门等琐碎程序。</span></p><p><span style=\"font-size: 20px;\">3、全屋品牌家电：TCL、格力、荣事达、坚果等知名品牌家电。</span></p><p><span style=\"font-size: 20px;\">4、付款灵活：日租支持日付，短租支持月付及季付，长租支持年付。</span></p><p><span style=\"font-size: 20px;\">5、支持同城换房：在西安的任何一个角落，只要附近有我公司的房源，都支持业主同城更换房屋。</span></p><p><br/></p>', 5, NULL, 1, 1537940452, 1537953709, 54, '民宿酒店的将来\r\n');
INSERT INTO `dcxw_chapter` VALUES (38, 21, '拓客资源', '/uploads/article/20180926/e121545566028778a5a66f8d7ac40c4d.png', NULL, '<p></p><p><span style=\"font-size: 24px;\">一.拓客渠道</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;作为客户经理工作的第一步，首先要知道从哪里获取适合我们的客户资源，什么叫适合我们的客户资源，闲置不用，投资不住，长期空置的毛坯房都是适合我们的客户。</span></p><p><span style=\"font-size: 20px;\">什么是拓客渠道，就是客户来源的方式方法，只有掌握了更多的拓客渠道，才能有效的积累更多的意向客户，由意向客户转化为我们的精准客户，然后促成交。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">1.公司发放的电话资源</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;新入职业务员对工作本身没有充分的认知，公司出于其尽快成长考虑，会统一为新入职客户经理下发准确楼盘资源，供其拨打，寻找意向客户。这是新客户经理积累独家客源最为快速有效的一种方法。客户经理每天需要拨打200-300组陌电，经过一周左右的时间，对公司的基本业务模式以及基本沟通话术就能得到很好的淬炼，这1500-2000组电话也可以让客户经理积累到20-30组左右的意向客户，根据转化率来讲，可以促成2-3组左右的成交。由此看来，这是最为快速有效的成长方法之一。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">2、网上获取客户资源</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;网拓的渠道主要来源于以下几个主流网站：58同城、赶集网、安居客等等信息发布类网站。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;58同城同城部落每天可以发布5组求租信息，客户经理一定要每天按时发布求租信息，在关注度较高的部落里每天定时发布，可以被动获取到很多的来电。客户经理一定要及时关注回帖内容，并且对帖子第一时间做出回复，因为圈子的内容及评论是公开的，有的回帖人会留下联系方式，如果你关注不及时的话，很有可能被别人截客，这一点一定要注意。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 打开58同城租房频道，搜索毛坯房出租信息，筛选个人，整租，可以看到很多的业主发布的出租信息。这些都属于精准出租客户，可以占到签约率的30%-40%，所以一定及时更新，积极拨打电话，转换成为有效意向。因为58同城发布的信息会被很多人拨打，所以一定要精炼自己的话术，只有这样你才能在众多人群中脱颖而出，去淬炼自己的话术，磨练自己的套路。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;赶集网和安居客的获客同58，大家以此做参考，就不多做赘述了。</span></p><p><span style=\"font-size: 20px;\"><br/></span></p><p><span style=\"font-size: 20px;\">3、外出楼盘贴条</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;外出贴条的第一步，寻找合适的楼盘，以新交房1-2年内的楼盘为主，空置率最高，同样贴条效率也最高。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;每次外出贴条张数，不少于300张。贴条获取的客户也更为精准，所以不要怕苦，不要怕累，条子贴起来，票子赚起来。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;贴条同样需要维护，大概一周左右的时间，对自己贴过条的小区看一遍，看看条子还在不在，不在的话，重新贴一遍，不要怕麻烦。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;同样贴条的成交占比在20-30%。</span></p><p><span style=\"font-size: 20px;\"><br/></span></p><p><span style=\"font-size: 20px;\">4、物业渠道</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;在外出贴条的同时，可以去小区物业转一转，找物业经理聊一聊，可以以小区广告位作为突破口，进而介绍公司模式，一定要留下物业经理的电话或者微信，方便私下沟通。毕竟物业办公室人多嘴杂，有些话不方便说。私下可以联系物业经理，让物业经理转介绍客户，给予其提成。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 物业经理这个突破口虽然很难打开，但是如果你手上有20组维护好的物业渠道，那么你就可以坐在公司，坐等接电话，坐等开单了。相对比而言，打电话资源、外出楼盘贴条等等都是挑水吃，而物业渠道的拓展就是打了一口井，虽然难，虽然慢，但是只要维护好，积极拓展，那么永远都会有水吃。</span></p><p><br/></p><p><span style=\"font-size: 20px;\">5、中介渠道</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 中介渠道和物业渠道一样重要，相对比而言中介渠道更为直接，只需要寻找经纪人，介绍合作模式，算好分成比例，直截了当谈合作就OK了。人嘛，都是感情动物，维护好，大家都是好朋友，好朋友有钱一起赚，这样就够了。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;&nbsp;</span></p><p><span style=\"font-size: 20px;\">6. 外出扎点</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;外出扎点，顾名思义，就是带上我们的宣传用品，易拉宝以及宣传单，宣传手册，去小区碰业主，尤其我们踩到的优质楼盘，近期交房，收房业主比较多的小区，碰到业主就可以介绍我们的合作模式，留下业主的微信和电话，让业主成为你们的意向客户，后期跟进，转化为准客户，邀约到公司促成交。</span><br/></p><p><br/></p><p><span style=\"font-size: 24px;\">二.电话邀约技以及话述</span></p><p><span style=\"font-size: 20px;\"><br/></span></p><p><span style=\"font-size: 24px;\">电话话术：</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;接通电话我们应该跟客户怎样去沟通？首先要询问，然后介绍公司，介绍自己，让客户了解你是做什么的，最后留联系方式，方便于后期跟进邀约客户到公司促成交。正常电话接通到结束只需要几分钟，在电话里不需要讲细节问题，尽量邀约到公司来谈。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">询问客户:您是不是有套毛坯房要出租？</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 介绍：我是大城小屋智能公寓不动产管理有限公司的，我是客户经理某某，我们想要租您的房子，做民宿公寓，租金我们给的是30元每平方，当然根据地段可以上调，租赁期限是3到15年，3年起租，您这个房子可以接受长租吧？我们公司实力打造自己品牌公寓，有自己统一的装修风格，装修必须严格统一风格，公司统一装修，装修费业主承，60平方以下的房子装修费46600元，60平方以上装修费每平米900元。我们属于房屋托管，给您高租金，带来收益稳定，您房子长期不住，很适合跟我们合作，时间越久，租金收益越高，回报率直观可见，租赁期结束，屋内全部装修以及家具家电都保持可使用状态还给您，当然也可以继续跟我们续租。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp;留联系方式：方便的话加一下您微信吧，我把相关公司具体的合作模式发到微信给您看看，您也可以让家人看看，一起商量一下，然后您最好看什么时间有空来公司了解了解，我跟您说再多，也比不上您亲自来公司实地了解的好。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">客户经理谈判技巧的问题</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp; 关于谈判技巧，每个人都有自己的谈判方式，同样针对不同的客户，也需要需要使用不同的技巧。</span></p><p><span style=\"font-size: 20px;\">从我个人角度而言，我觉得谈判最重要的是个人的气势，从第一次打电话开始，就要拿出气势，因为气势可以体现出你的专业度以及自己的信心，对公司的信心。这些都可以让客户产生信任。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;其次的话，谈判技巧跟个人的业务知识熟练程度也是挂钩的，熟练的业务知识，可以让你在面对客户提问的时候，更加的从容，回答的逻辑有序，条理清楚。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 再次的话，需要去站在客户的角度去考虑一些问题，主动的提出来，看似给自己制造了一些问题，但实际心里对这些问题已经有了好的答案，可以为客户解疑。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; 综上所述，扎实的基础业务知识，充足的气势以及换位思考的能力，足以促成客户签约。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">客户经理回访客户、邀约客户的问题</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;如果积累意向客户是工作的第一步，那么适时的回访和及时的邀约就是工作的第二部了。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;经过第一次的通话以及微信全面介绍合作模式之后，客户已经对合作模式有了了解，可是他们心中肯定会或多或少有不少的疑问。客户经理就要对客户进行引导性的发问，为客户及时解决问题。在解决之后，顺势提出来公司的邀请，参观样板间。这两个步骤是同时进行的，解疑之后顺势提出来公司邀请。如果客户推却没有时间的话，紧接着问他什么时候有时间，这个时候就要步步紧逼的，问出一个大概准确的时间，在确定时间的前一天再给客户打电话，确定当天的准确时间，是上午还是下午，是上午几点钟或者下午几点钟。如果客户爽约的话，再一次发问，确定一个大概准确的时间，接着上面的步骤再进行确认和邀约。一般的客户，最多在两次邀约之后，肯定会来公司，如果在你三次邀约之后，依然推却没有时间的话，这样的客户就可以暂时不理他了，晾一晾。</span></p><p><span style=\"font-size: 20px;\">&nbsp; &nbsp; &nbsp; &nbsp;邀约的底线是，不能谄媚。一定要用很客观的态度对其进行诚意邀约，一定不要让自己太过于被动。这样的话，后续的工作会顺利一些。</span></p><p><br/></p>', 3, NULL, 1, 1537931949, 1537931949, 54, '拓客资源');
INSERT INTO `dcxw_chapter` VALUES (36, 24, '精装房收房标准', '/uploads/article/20180924/75e1e0feb5fd2fab734019723e7bd799.png', NULL, '<p style=\"text-align:center\"><span style=\"font-family: 宋体; font-size: 24px;\">精装房收房标准</span></p><p><span style=\"font-family: 宋体; font-size: 20px;\">1、房屋地段</span></p><p><span style=\"font-family: 宋体; font-size: 20px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 地段必须在东西南北二环及二环内，在地铁沿线，门口须有多路公交或在地铁口。</span></p><p><span style=\"font-family: 宋体; font-size: 20px;\">2、房屋条件</span></p><p><span style=\"font-family: 宋体; font-size: 19px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-size: 20px; font-family: 宋体;\">精装房收房需注重房源内部的装修条件及成色，要求装修风格前卫，装修使用年限短，各软硬件达八成新以上，保证屋内配套设施齐全，冰箱、洗衣机、电视、炉灶、沙发、床、空调、桌椅板凳、灯具、水电暖必须齐全，并确保所有家具家电完好，无损坏不影响正常使用。如果有部分家具家电影响使用或者不能使用，需向房东提出配置费。</span></span></p><p><span style=\"font-family: 宋体; font-size: 20px;\">3、房屋小区环境及周边配套</span></p><p><span style=\"font-family: 宋体; font-size: 20px;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 应是醒目成熟小区，紧邻路边或十字路口为宜，需掌握房屋在楼盘中所处位置是否便利及楼层、朝向、水电费的相关信息。小区外围环境是否便利周全，如停车场、餐饮、购物、超市、菜市、银行、医院等，需步行不超过一公里就能满足的为宜。</span></p><p><br/></p>', 10, NULL, 1, 1537780776, 1537847192, 54, '精装房收房标准');
INSERT INTO `dcxw_chapter` VALUES (40, 21, '合同讲解', '/uploads/article/20180927/e0e71687d7ca0d31feb2d5d0fd05f2f8.png', NULL, '<p><br/></p><p><br/></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538033515288268.png\" title=\"1538033515288268.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538033516258075.png\" title=\"1538033516258075.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538033516939367.png\" title=\"1538033516939367.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538033516712066.png\" title=\"1538033516712066.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538033516204453.png\" title=\"1538033516204453.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538033517815730.png\" title=\"1538033517815730.png\"/></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538033517874368.png\" title=\"1538033517874368.png\"/></p><p><br/></p>', 2, NULL, 1, 1538033556, 1538033556, 54, '合同讲解');
INSERT INTO `dcxw_chapter` VALUES (41, 21, '公司运营业务模式', '/uploads/article/20180927/71c3a8c521d3caafdeb9b41ef4ab7c23.png', NULL, '<p><span style=\"font-size: 24px;\">&nbsp; 一、毛坯整租</span></p><p><span style=\"font-size: 20px;\">&nbsp;1）、毛坯整租——900</span></p><p><span style=\"font-size: 20px;\">1、收房范围：西安市三环以内，三环边上附近交通便利均可回租。</span></p><p><span style=\"font-size: 20px;\">2、收房标准：商品住宅，公寓，回迁房，小产权，通水通电通电梯，30平以上，上不封顶。</span></p><p><span style=\"font-size: 20px;\">3、合作模式：</span></p><p><span style=\"font-size: 20px;\">1、租金：30-35元每平米（房产证建筑面积为准）最低2000元起租（租金最高每平米35元，部分房源看具体位置可以上下浮动参考市场价）</span></p><p><span style=\"font-size: 20px;\">2、三年起租，最长十五年；</span></p><p><span style=\"font-size: 20px;\">3、两个月装修期，装修期内水电物业费及采暖费装修押金业主承担（两个月过后所有物业水电采暖垃圾电梯等费用均由公司承担）</span></p><p><span style=\"font-size: 20px;\">4、装修费用：每平米900元（中端半智能）或1200元（高端全智能以及全屋定制家具）包含所有家具家电，最低46600元；</span></p><p><span style=\"font-size: 20px;\">5、付租方式及时间：月付，装修期结束后次月20号开始付租；</span></p><p><span style=\"font-size: 20px;\">6、免租期限：两个月的装修期；</span></p><p><span style=\"font-size: 20px;\">备注：装修费用不含：封阳台、铲墙、结构改造、砸墙、垃圾清运、防盗网及主材清单之外等项目。</span></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538034016403398.png\" title=\"1538034016403398.png\" alt=\"图片1.png\"/>&nbsp;&nbsp;<img src=\"http://www.xiaowugroup.com/public/ueditor/php/upload/image/20180927/1538034023949000.png\" title=\"1538034023949000.png\" alt=\"图片33.png\"/></p><p><br/></p><p><span style=\"font-size: 20px;\">2）、毛坯整租——600</span></p><p><span style=\"font-size: 20px;\">（备注：与九百收房范围标准完全一样，必须三套或者三套以上起租）</span></p><p><span style=\"font-size: 20px;\">合作模式：</span></p><p><span style=\"font-size: 20px;\">1、租金：市场价（取各租房网站的最高最低的中间价）；</span></p><p><span style=\"font-size: 20px;\">2、三年起租，最长十五年；</span></p><p><span style=\"font-size: 20px;\">3、两个月装修期，装修期内水电物业费及采暖费装修押金业主承担（两个月过后所有物业水电采暖垃圾电梯等费用均由公司承担）</span></p><p><span style=\"font-size: 20px;\">4、装修费用：每平米600（包含所有软装硬装家具家电，与900有稍许差别）</span></p><p><span style=\"font-size: 20px;\">5、付租方式及时间：月付，装修期结束后次月20号开始付租；</span></p><p><span style=\"font-size: 20px;\">6、免租期期限：装修期两个月和每年二月份春节空置期（因为每年春节酒店入住率不到20%）</span></p><p><span style=\"font-size: 20px;\">备注：装修费用不含：封阳台、铲墙、结构改造、砸墙、垃圾清运、防盗网及主材清单之外等项目。</span></p><p><br/></p><p><span style=\"font-size: 24px;\">二、简装：</span></p><p><span style=\"font-size: 20px;\">1.收房标准及范围</span></p><p><span style=\"font-size: 20px;\">通水通电通电梯，装修必须达到七八成新，只限三环以内，或地铁沿线，周围商圈成熟，小区配套设施齐全</span></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538034109743159.png\" title=\"1538034109743159.png\"/><span style=\"font-size: 20px;\">&nbsp;</span><img src=\"/public/ueditor/php/upload/image/20180927/1538034109103532.png\" title=\"1538034109103532.png\"/><span style=\"font-size: 20px;\">&nbsp;</span><img src=\"/public/ueditor/php/upload/image/20180927/1538034109470339.png\" title=\"1538034109470339.png\"/></p><p><span style=\"font-size: 20px;\">2、装修费用</span></p><p><span style=\"font-size: 20px;\">需承担配齐到精装程度那一部分费用，具体费用如下，</span></p><p><span style=\"font-size: 20px;\">小户型大开间须支付软装家具家电配套设施费用20000元</span></p><p><span style=\"font-size: 20px;\">一室一厅须支付软装家具家电配套设施费用24000元</span></p><p><span style=\"font-size: 20px;\">两室一厅须支付软装家具家电配套设施费用30000元</span></p><p><span style=\"font-size: 20px;\">三室一厅须支付软装家具家电配套设施费用36000元</span></p><p><span style=\"font-size: 20px;\">3、租金报价参考租房网站为主，最终成交价不得超过网站最高报价；</span></p><p><span style=\"font-size: 20px;\">4、付款方式：月付（装修期为一个月，次月20号支付租金，每年二月份为空置期</span></p><p><br/></p><p><span style=\"font-size: 20px;\">三、精装</span></p><p><span style=\"font-size: 20px;\">1、收房标准及范围：通水通电通电梯，装修必须达到七八成新，所有硬装软装家具家电必须齐全，只限三环以内，地铁沿线，周围商圈成熟，小区配套设施齐全；</span></p><p><img src=\"/public/ueditor/php/upload/image/20180927/1538034226107172.png\" title=\"1538034226107172.png\"/><span style=\"font-size: 20px;\">&nbsp;</span><img src=\"/public/ueditor/php/upload/image/20180927/1538034226229150.png\" title=\"1538034226229150.png\"/></p><p><span style=\"font-size: 20px;\">3、租金报价参考租房网站为主，最终成交价不得超过网站最高报价；</span></p><p><span style=\"font-size: 20px;\">4、付款方式：月付（装修期为一个月，次月20号支付租金，每年二月份为空置期</span></p><p><br/></p>', 1, NULL, 1, 1538034365, 1538034365, 54, '公司运营业务模式');

-- ----------------------------
-- Table structure for dcxw_city
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_city`;
CREATE TABLE `dcxw_city`  (
  `c_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '城市id',
  `p_id` int(10) NULL DEFAULT NULL COMMENT '省份id对应省份表的id',
  `c_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '城市名称',
  `c_q_id` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '装修品质，对应品质id，多个id用\'，\'隔开',
  `c_q_price` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '品质单价，与装修id对应，多个用‘，’隔开',
  `c_opeatime` int(11) NULL DEFAULT NULL COMMENT '操作时间',
  `c_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '生成房源编号用的城市编码',
  `c_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  PRIMARY KEY (`c_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 58 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_city
-- ----------------------------
INSERT INTO `dcxw_city` VALUES (3, 1, '西安', '36,39,40', '', 1541389115, '10', 1);
INSERT INTO `dcxw_city` VALUES (56, 5, '重庆', '', '', 1541389132, '10', 1);
INSERT INTO `dcxw_city` VALUES (55, 4, '成都', '', '', 1541389121, '11', 1);

-- ----------------------------
-- Table structure for dcxw_coupon
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_coupon`;
CREATE TABLE `dcxw_coupon`  (
  `cp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cp_bid` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '优惠券系统id',
  `cp_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '优惠券名称',
  `cp_money` decimal(10, 2) NULL DEFAULT NULL COMMENT '优惠券金额',
  `cp_deadline` int(11) NULL DEFAULT NULL COMMENT '优惠券截止日期',
  `cp_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '优惠券详细信息',
  `cp_isable` tinyint(2) NULL DEFAULT NULL COMMENT '是否可用',
  `cp_addtime` int(11) NULL DEFAULT NULL COMMENT '添加时间',
  `cp_admin` int(10) NULL DEFAULT NULL COMMENT '添加管理员',
  PRIMARY KEY (`cp_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '优惠券表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_coupon
-- ----------------------------
INSERT INTO `dcxw_coupon` VALUES (1, '201809300001', '区位', 123.00, 1538582400, '123123123', 1, 1538273773, 1);

-- ----------------------------
-- Table structure for dcxw_customer
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_customer`;
CREATE TABLE `dcxw_customer`  (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '客户id',
  `cus_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '客户编号系统生成的编号，做客户唯一标识生成规则，如：“201804210001”,前面8位是年与日，后面4位1-9999；不够的用0补空位。',
  `cus_openid` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微信端客户id',
  `cus_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '客户名字',
  `cus_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '客户电话',
  `cus_phone2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备用联系方式',
  `cus_qq` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '客户qq',
  `cus_sex` tinyint(2) NULL DEFAULT NULL COMMENT '性别：1 男； 2 女； 3 不明',
  `cus_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户邮箱',
  `cus_provid` int(10) NULL DEFAULT 0 COMMENT '省份id，对应省份表id',
  `cus_cityid` int(10) NULL DEFAULT NULL COMMENT '城市id，对应城市表id',
  `cus_areaid` int(10) NULL DEFAULT NULL COMMENT '站点id，对应分站id',
  `cus_area` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房屋面积',
  `cus_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房屋类型：1：新房；2：二手房',
  `cus_style` tinyint(4) NULL DEFAULT NULL COMMENT '装修风格对应 风格表ID',
  `cus_quality` tinyint(4) NULL DEFAULT NULL COMMENT '装修品质（档次）对应档次表ID',
  `cus_house_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房屋户型：如：两室一厅，存储文字；',
  `cus_build` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '小区名称',
  `cus_addtime` int(11) NULL DEFAULT NULL COMMENT '预约时间',
  `cus_opeater` int(10) NULL DEFAULT NULL COMMENT '操作人id 对应登陆管理员id',
  `cus_isrent` tinyint(2) NULL DEFAULT 2 COMMENT '是否已租房子给我们；1.已经租给我们。2，未租；',
  PRIMARY KEY (`cus_id`, `cus_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1036 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '客户预约表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_department
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_department`;
CREATE TABLE `dcxw_department`  (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '部门名称',
  `d_f_id` int(10) NULL DEFAULT NULL COMMENT '部门的父级部门，若为顶级部门则为零，是下级部门，则是上级部门的id',
  `d_addtime` int(11) NULL DEFAULT NULL COMMENT '部门添加时间',
  PRIMARY KEY (`d_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '部门表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_department
-- ----------------------------
INSERT INTO `dcxw_department` VALUES (1, '事业部', 0, 1540878084);
INSERT INTO `dcxw_department` VALUES (2, '工程部', 0, 1540878093);
INSERT INTO `dcxw_department` VALUES (3, '运营专员', 0, 1540878102);
INSERT INTO `dcxw_department` VALUES (4, '管理层', 0, 1540878894);
INSERT INTO `dcxw_department` VALUES (5, '行政部', 0, 1542247763);
INSERT INTO `dcxw_department` VALUES (6, '运营部-运营主管', 0, 1542962677);

-- ----------------------------
-- Table structure for dcxw_deposit
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_deposit`;
CREATE TABLE `dcxw_deposit`  (
  `dp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房屋托管表自增id',
  `dp_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '托管人称呼',
  `dp_phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '托管人电话',
  `dp_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dp_remarks` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '房屋托管备注',
  `dp_p_id` int(10) NULL DEFAULT NULL COMMENT '省份id',
  `dp_c_id` int(10) NULL DEFAULT NULL COMMENT '城市id',
  `dp_addtime` int(11) NULL DEFAULT NULL COMMENT '提交时间',
  `dp_updatetime` int(11) NULL DEFAULT NULL COMMENT '回访时间',
  `dp_admin` int(10) NULL DEFAULT NULL COMMENT '回访人',
  `dp_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '回访备注',
  PRIMARY KEY (`dp_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '房屋托管表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_deposit
-- ----------------------------
INSERT INTO `dcxw_deposit` VALUES (2, '宋昌', '15619020161', NULL, NULL, NULL, NULL, 1537520515, 1537520515, NULL, NULL);
INSERT INTO `dcxw_deposit` VALUES (6, '吕先生', '15939859630', NULL, NULL, NULL, NULL, 1538286030, 1538286030, NULL, NULL);
INSERT INTO `dcxw_deposit` VALUES (5, 'Jin Yi', '13392126997', NULL, NULL, NULL, NULL, 1538217708, 1538217708, NULL, NULL);
INSERT INTO `dcxw_deposit` VALUES (7, '慈女生', '13541233682', NULL, NULL, NULL, NULL, 1538372601, 1538372601, NULL, NULL);
INSERT INTO `dcxw_deposit` VALUES (8, '慈女生', '13541233682', NULL, NULL, NULL, NULL, 1538372604, 1538372604, NULL, NULL);
INSERT INTO `dcxw_deposit` VALUES (9, '蔡秋明', '13008127963', NULL, NULL, NULL, NULL, 1538381136, 1538381136, NULL, NULL);
INSERT INTO `dcxw_deposit` VALUES (10, '宋林翰', '13521259466', NULL, NULL, NULL, NULL, 1538895525, 1538895525, NULL, NULL);
INSERT INTO `dcxw_deposit` VALUES (11, '张欢', '13772416092', NULL, NULL, NULL, NULL, 1538906866, 1538906866, NULL, NULL);
INSERT INTO `dcxw_deposit` VALUES (12, '张欢', '13772416092', NULL, NULL, NULL, NULL, 1538906873, 1538906873, NULL, NULL);
INSERT INTO `dcxw_deposit` VALUES (13, '李', '15308095811', NULL, NULL, NULL, NULL, 1538909390, 1538909390, NULL, NULL);

-- ----------------------------
-- Table structure for dcxw_designer
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_designer`;
CREATE TABLE `dcxw_designer`  (
  `des_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '设计师id',
  `des_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '设计师编号。系统自动生成的编号，规则同客户编号生成规则',
  `des_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '设计师名称',
  `des_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '设计师头像长方形',
  `des_avatar` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '设计师头像正方形',
  `des_img_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图片alt',
  `des_age` tinyint(4) NULL DEFAULT NULL COMMENT '年龄',
  `des_exp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '从业经验',
  `des_tanlent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '擅长风格',
  `des_guand` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '毕业院校',
  `des_remarks` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '设计师简介',
  `des_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示： 1 是；2 否',
  `des_istop` tinyint(2) NULL DEFAULT 2 COMMENT '置顶： 1 是 ；2 否',
  `des_view` int(11) NULL DEFAULT 0 COMMENT '设计师的浏览量',
  `des_p_id` int(11) NULL DEFAULT NULL COMMENT '省份id',
  `des_c_id` int(11) NULL DEFAULT NULL COMMENT '城市id',
  `des_b_id` int(11) NULL DEFAULT NULL COMMENT '分站id',
  `des_createtime` int(11) NULL DEFAULT NULL COMMENT '发布时间',
  `des_updatetime` int(11) NULL DEFAULT NULL COMMENT '更新时间',
  `dec_admin` int(11) NULL DEFAULT NULL COMMENT '发布人，对应管理员的id',
  `des_seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo标题',
  `des_seo_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'seo描述',
  `des_seo_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo关键词',
  PRIMARY KEY (`des_id`, `des_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 75 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_house
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house`;
CREATE TABLE `dcxw_house`  (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_b_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '系统自动生成的房屋编号',
  `h_p_id` int(10) NULL DEFAULT NULL,
  `h_c_id` int(10) NULL DEFAULT NULL,
  `h_a_id` int(11) NULL DEFAULT NULL,
  `h_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房源名称',
  `h_type` int(10) NULL DEFAULT NULL COMMENT '房屋类型，对应type表sort=1的数据',
  `h_house_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房屋户型几室几 厅几卫几厨',
  `h_area` int(10) NULL DEFAULT NULL COMMENT '房屋面积单位平方米',
  `h_head` tinyint(2) NULL DEFAULT NULL COMMENT '房屋朝向,1东，2南，3西，4北，5东南，6西南，7东北，8西北',
  `h_rent` decimal(10, 2) NULL DEFAULT NULL COMMENT '房屋月租金额',
  `h_rent_type` tinyint(2) NULL DEFAULT 1 COMMENT '租金类型：1，月租；2，日租；3，季租。',
  `h_floor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房屋楼层',
  `h_nearbus` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '附近公交路线',
  `h_subway` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '附近地铁',
  `h_building` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '所在小区',
  `h_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '房源地址',
  `h_house_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '房源封面图',
  `h_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '房源图片多图之间用逗号‘，’隔开',
  `h_img_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '封面图alt',
  `h_video` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '视频链接。',
  `h_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '房源描述',
  `h_view` int(10) NULL DEFAULT 0 COMMENT '房源浏览量',
  `h_isnew` tinyint(2) NULL DEFAULT NULL COMMENT '是否为最新，1最新，2非最新',
  `h_iscop` tinyint(2) NULL DEFAULT 1 COMMENT '是否合租；1.整租，2.合租',
  `h_discount` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否为特价，为空不是特价，反之为特价，内容为特价内容。',
  `h_config` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房源配置这存type表的id集，多个逗号隔开',
  `h_addtime` int(11) NULL DEFAULT NULL COMMENT '房源添加时间(合同签订时间)',
  `h_updatetime` int(11) NULL DEFAULT NULL COMMENT '更新时间',
  `h_istop` tinyint(2) NULL DEFAULT 2 COMMENT '是否置顶：1，置顶；2，常规',
  `h_isable` tinyint(2) NULL DEFAULT 4 COMMENT '是否可租，1，事业部，2，工程部装修中；3,运营部配置中，4，可出租，5，已出租,6,已签单,7.分配中,8.分派中',
  `h_admin` int(10) NULL DEFAULT NULL COMMENT '添加人员，当前登陆后台的管理员(对应客户经理)，对应admin_id',
  `h_add_type` tinyint(2) NULL DEFAULT NULL COMMENT '房源添加的方式（1.后台添加，2，前端添加）',
  PRIMARY KEY (`h_id`, `h_b_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 112 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '房源表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house
-- ----------------------------
INSERT INTO `dcxw_house` VALUES (111, '1010100001', 1, 3, 5, '123123', NULL, '3,1,1,2', 158111234, 5, 123123.00, 1, NULL, '12312', '1231231', '泰华金贸国际1234', '陕西省西安市雁塔区1234', '/uploads/operation/20181210/678f573ce864a1aab7cf9f4c50d26fac.jpg', '/uploads/operation/20181210/678f573ce864a1aab7cf9f4c50d26fac.jpg,/uploads/operation/20181210/5fa805e3321b1c6e9eba462f180c7a5b.jpg,/uploads/operation/20181210/72a7713144b94484373194e4bd9b50c7.jpg,/uploads/operation/20181210/678f573ce864a1aab7cf9f4c50d26fac.jpg', NULL, NULL, NULL, 0, NULL, 1, NULL, '99,103,106,107', 1544235787, 1544420642, 2, 4, 90, 2);

-- ----------------------------
-- Table structure for dcxw_house_allocate
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_allocate`;
CREATE TABLE `dcxw_house_allocate`  (
  `hat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id号',
  `hat_house_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房源编号',
  `hat_c_id` int(11) NULL DEFAULT NULL COMMENT '房源的区域id(城市的自增编号）',
  `hat_assign_to` int(11) NULL DEFAULT NULL COMMENT '房源分配给工程监理，编号为改区的监理id',
  `hat_assigner` int(11) NULL DEFAULT NULL COMMENT '谁分配的。操作人，改区的行政角色人id',
  `hat_is_msg` tinyint(2) NULL DEFAULT NULL COMMENT '是否发送短信消息提醒：1是，2否',
  `hat_is_wechat` tinyint(2) NULL DEFAULT NULL COMMENT '是否微信发送消息提醒：1是，2否',
  `hat_is_assign` tinyint(2) NULL DEFAULT 2 COMMENT '是否分配：1.已分配，2.待分配',
  `hat_sub_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '提交备注',
  `hat_assign_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分配备注',
  `hat_assign_time` int(11) NULL DEFAULT NULL COMMENT '分配时间(管理员手动分配的时间)',
  `hat_add_time` int(11) NULL DEFAULT NULL COMMENT '添加时间(这条记录入库的时间)',
  `hat_admin` int(11) NULL DEFAULT NULL COMMENT '房源转交人，数据提交人',
  `hat_type` tinyint(2) NULL DEFAULT NULL COMMENT '分配类型：1.事业部->工程部；2.工程部->运营部',
  `hat_ishow` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示:1.显示，2，删除',
  PRIMARY KEY (`hat_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 41 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '房源分配表（事业部->工程部）' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_allocate
-- ----------------------------
INSERT INTO `dcxw_house_allocate` VALUES (40, '1010100001', 3, 17, 19, 2, NULL, 1, '123123', '12331323123', 1544420289, 1544412843, 73, 2, 1);
INSERT INTO `dcxw_house_allocate` VALUES (39, '1010100001', 3, 73, 13, 2, 2, 1, '23423432', '12132321231', 1544239131, 1544238246, 90, 1, 1);

-- ----------------------------
-- Table structure for dcxw_house_attachment
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_attachment`;
CREATE TABLE `dcxw_house_attachment`  (
  `ha_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房屋附属物品',
  `ha_house_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '房源编号',
  `ha_keys` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '钥匙',
  `ha_keys_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '钥匙备注',
  `ha_water_start` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '水表底数',
  `ha_water_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '水费单价（元）',
  `ha_water_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '缴费方式',
  `ha_elect_start` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '电表底数',
  `ha_elect_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '电费单价（元）',
  `ha_elect_type` tinyint(2) NULL DEFAULT 1 COMMENT '电费缴纳方式:1.物业代缴；2.国家电网自己交',
  `ha_air_start` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '天然气底数',
  `ha_air_end` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '燃气结数',
  `ha_air_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '天然气备注',
  `ha_warm_type` tinyint(2) NULL DEFAULT 1 COMMENT '供暖方式:1.集中供暖；2.天然气自烧',
  `ha_warm_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '暖气费（元/平方米）',
  `ha_warm_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '暖气备注',
  `ha_contact_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '合同编号',
  `ha_contact_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '合同扫描件',
  `ha_rent_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '租金(每月)',
  `ha_rent_time` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '租期（单位：月）',
  `ha_decorate_permit` int(11) NULL DEFAULT NULL COMMENT '装修许可证办理日期',
  `ha_deadline` int(11) NULL DEFAULT NULL COMMENT '房源租赁到期时间',
  `ha_door_ban` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '门禁',
  `ha_door_ban_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '门禁备注',
  `ha_elect_card` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '电卡',
  `ha_elect_card_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '电卡备注',
  `ha_water_card` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '水卡',
  `ha_water_card_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '水卡备注',
  `ha_air_card` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '气卡',
  `ha_air_card_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '气卡备注',
  `ha_car_park` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '车位情况',
  `ha_wuye_phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '物业电话',
  `ha_remarks` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '其他备注附属内容',
  `ha_cat_eye` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '猫眼',
  `ha_cat_eye_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '猫眼备注',
  `ha_view_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '可视电话',
  `ha_view_phone_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '可视电话备注',
  `ha_wuye_fee` decimal(8, 2) NULL DEFAULT 0.00 COMMENT '物业费价格（元）',
  `ha_wuye_fee_type` tinyint(2) NULL DEFAULT NULL COMMENT '物业费类型：1。每平米单价；2.每月单价',
  `ha_user` int(11) NULL DEFAULT NULL COMMENT '录入人',
  `ha_addtime` int(11) NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`ha_id`, `ha_house_code`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '房源附属表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_attachment
-- ----------------------------
INSERT INTO `dcxw_house_attachment` VALUES (38, '1010100001', '123我444', '1232 3123', '123', 222.22, '123', '2222.22', 123.00, 2, '222.22', NULL, '123', 2, 123.00, '123', 'dcxw_002224444', '/uploads/market/20181208/626f0edddb37a3a797338babdb3b7ad9.jpg,/uploads/market/20181208/86af96da9b0f633d3a0b0ad9b0a9b2d0.png,/uploads/market/20181210/5404123f16820ff3ef91cbbf51fa4929.png,/uploads/operation/20181210/be24f4d40ff43ba76be9de627c6db7d8.png', 123123.00, '11211144', 1548345599, 1545494399, '1231', '23', '123', '123', '123', '123', NULL, NULL, '123', '123', '这是我修改后的12332123123123改改改', '123', '123', '123', '123', 123.00, 2, 17, 1544420565);

-- ----------------------------
-- Table structure for dcxw_house_decorate
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_decorate`;
CREATE TABLE `dcxw_house_decorate`  (
  `hd_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房屋装修id',
  `hd_house_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '房屋编号',
  `hd_addtime` int(11) NULL DEFAULT NULL COMMENT '开工时间',
  `hd_status` tinyint(255) NULL DEFAULT NULL COMMENT '装修状态',
  `hd_admin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '监督责任人',
  `hd_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '装修备注',
  PRIMARY KEY (`hd_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 77 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '房屋转到工程部（房屋装修表）' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_decorate
-- ----------------------------
INSERT INTO `dcxw_house_decorate` VALUES (76, '1010100001', 1544239131, 6, '13', '12132321231');

-- ----------------------------
-- Table structure for dcxw_house_decorate_log
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_decorate_log`;
CREATE TABLE `dcxw_house_decorate_log`  (
  `hdl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '装修日志表',
  `hdl_house_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房源编号',
  `hdl_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '日志标题',
  `hdl_status` tinyint(2) NULL DEFAULT NULL COMMENT '装修状态',
  `hdl_addtime` int(11) NULL DEFAULT NULL COMMENT '日志添加时间',
  `hdl_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '封面图片',
  `hdl_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '装修内容',
  `hdl_admin` int(255) NULL DEFAULT NULL COMMENT '日志提交人',
  PRIMARY KEY (`hdl_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 176 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '装修日志表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_decorate_log
-- ----------------------------
INSERT INTO `dcxw_house_decorate_log` VALUES (171, '1010100001', '123', 1, 1544412778, '/uploads/decorate/20181210/ec748df9fee3c905e9184e65c28bc316.jpg', '123123', 73);
INSERT INTO `dcxw_house_decorate_log` VALUES (172, '1010100001', '2222', 2, 1544412795, '/uploads/decorate/20181210/e2828ac788d33857396548ecdbe9eb7e.jpg', '12123123', 73);
INSERT INTO `dcxw_house_decorate_log` VALUES (173, '1010100001', '1111', 3, 1544412808, '/uploads/decorate/20181210/8a23f9ff5731edde92c7ca27da4673d1.jpg', '13123', 73);
INSERT INTO `dcxw_house_decorate_log` VALUES (174, '1010100001', '123123123', 4, 1544412822, '/uploads/decorate/20181210/3743eeb28aa4c73f89a191819c0ce49d.jpg', '123123123', 73);
INSERT INTO `dcxw_house_decorate_log` VALUES (175, '1010100001', '33333333', 5, 1544412843, '/uploads/decorate/20181210/cbc91ec131b81506f07ac734f6ac1ffd.png', '123123123', 73);

-- ----------------------------
-- Table structure for dcxw_house_decorate_status
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_decorate_status`;
CREATE TABLE `dcxw_house_decorate_status`  (
  `hds_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `hds_house_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房源编号',
  `hds_start_status` int(10) NULL DEFAULT NULL COMMENT '变更前的状态号',
  `hds_change_time` int(11) NULL DEFAULT NULL COMMENT '变更时间',
  `hds_end_status` int(10) NULL DEFAULT NULL COMMENT '变更后的状态号',
  `hds_change_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '变更备注',
  `hds_user_id` int(11) NULL DEFAULT NULL COMMENT '变更人ID',
  PRIMARY KEY (`hds_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 238 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '房屋装修状态变更表1.事业部专项工程部；2工程部开始开工；3进场检查；4水电验证；5防水验收；6瓦工验收，7乳胶漆验收；8主材验收；9软装验收；10；自检;11,移交给运营部' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_decorate_status
-- ----------------------------
INSERT INTO `dcxw_house_decorate_status` VALUES (237, '1010100001', 5, 1544412843, 6, '123123', 73);
INSERT INTO `dcxw_house_decorate_status` VALUES (236, '1010100001', 4, 1544412822, 5, '123123', 73);
INSERT INTO `dcxw_house_decorate_status` VALUES (235, '1010100001', 3, 1544412808, 4, '123123', 73);
INSERT INTO `dcxw_house_decorate_status` VALUES (233, '1010100001', 1, 1544412778, 2, '1231233', 73);
INSERT INTO `dcxw_house_decorate_status` VALUES (234, '1010100001', 2, 1544412795, 3, '123123', 73);
INSERT INTO `dcxw_house_decorate_status` VALUES (232, '1010100001', 1, 1544239131, 1, '12132321231', 13);

-- ----------------------------
-- Table structure for dcxw_house_maintenance
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_maintenance`;
CREATE TABLE `dcxw_house_maintenance`  (
  `hmt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房源维护记录自增id',
  `hmt_house_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '房源id',
  `hmt_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '维护标题',
  `hmt_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '图片凭据',
  `hmt_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '维护内容',
  `hmt_add_time` int(11) NULL DEFAULT NULL COMMENT '提交时间',
  `hmt_admin` int(11) NULL DEFAULT NULL COMMENT '维护管理员',
  PRIMARY KEY (`hmt_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '房源维护记录' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_maintenance
-- ----------------------------
INSERT INTO `dcxw_house_maintenance` VALUES (16, '1010100001', '交电费', '/uploads/operation/20181210/f00da9673de168d2e02974245380ea4c.jpg', '123123123', 1544420601, 17);

-- ----------------------------
-- Table structure for dcxw_house_master
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_master`;
CREATE TABLE `dcxw_house_master`  (
  `hm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '户主信息表',
  `hm_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '户主姓名',
  `hm_phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '联系电话',
  `hm_idcard` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '身份证号码',
  `hm_bank_card` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '银行卡号',
  `hm_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '现居地址',
  `hm_house_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '房源编号',
  `hm_addtime` int(11) NULL DEFAULT NULL COMMENT '录入时间',
  `hm_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '户主备注',
  `hm_assign_time` int(11) NULL DEFAULT NULL COMMENT '合同签订时间',
  `hm_admin` int(11) NULL DEFAULT NULL COMMENT '录入人员',
  PRIMARY KEY (`hm_id`, `hm_house_code`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 51 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '房屋户主信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_master
-- ----------------------------
INSERT INTO `dcxw_house_master` VALUES (50, '大傻子', '15233336666', '612501199309106322', '12312312312312', '陕西省宝鸡市陈仓区', '1010100001', 1544237030, '陕西省宝鸡市陈仓区', NULL, 90);

-- ----------------------------
-- Table structure for dcxw_house_order
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_order`;
CREATE TABLE `dcxw_house_order`  (
  `ho_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '预约看房',
  `ho_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '预约人姓名',
  `ho_phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '预约人电话',
  `ho_remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '预约备注',
  `ho_addtime` int(11) NULL DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`ho_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_house_pay
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_pay`;
CREATE TABLE `dcxw_house_pay`  (
  `hp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房源装修款信息表',
  `hp_house_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '房源编号',
  `hp_money` decimal(10, 2) NULL DEFAULT NULL COMMENT '总装修款',
  `hp_paid` decimal(10, 2) NULL DEFAULT NULL COMMENT '已回收装修款',
  `hp_will_pay` decimal(10, 2) NULL DEFAULT NULL COMMENT '待回收款项',
  `hp_paid_ratio` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '回款比率',
  `hp_addtime` int(11) NULL DEFAULT NULL COMMENT '装修款总额添加时间',
  `hp_admin` int(11) NULL DEFAULT NULL COMMENT '录入人',
  PRIMARY KEY (`hp_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 78 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '房源回款信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_pay
-- ----------------------------
INSERT INTO `dcxw_house_pay` VALUES (77, '1010100001', 123456.00, 123456.00, 0.00, '1', 1544237039, 90);

-- ----------------------------
-- Table structure for dcxw_house_pay_log
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_pay_log`;
CREATE TABLE `dcxw_house_pay_log`  (
  `hpl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '回款记录表',
  `hpl_house_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '回款房屋编号',
  `hpl_money` decimal(10, 2) NULL DEFAULT NULL COMMENT '回款金额',
  `hpl_addtime` int(11) NULL DEFAULT NULL COMMENT '回款时间',
  `hpl_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '回款凭证',
  `hpl_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '回款备注',
  `hpl_user` int(11) NULL DEFAULT NULL COMMENT '回款提交人',
  PRIMARY KEY (`hpl_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 104 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '回款记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_pay_log
-- ----------------------------
INSERT INTO `dcxw_house_pay_log` VALUES (103, '1010100001', 123456.00, 1544237078, '/uploads/market/20181208/39541d892072a9cb9b230dddc1412440.jpg,/uploads/market/20181208/00e71a3e56eb055d8584c6d5c4fef48e.jpg', '全额收款无优惠。', 90);

-- ----------------------------
-- Table structure for dcxw_house_rent
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_rent`;
CREATE TABLE `dcxw_house_rent`  (
  `hr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '租客id',
  `hr_house_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '房源编号',
  `hr_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '租客姓名',
  `hr_idcard` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '租客身份证号',
  `hr_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '联系方式',
  `hr_addtime` int(11) NULL DEFAULT NULL COMMENT '租客添加时间',
  `hr_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '租客备注信息',
  `hr_rank` int(11) NULL DEFAULT 1 COMMENT '租客等级',
  `hr_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否拉黑，是否可以租住我们的房子；1是，2否',
  `hr_admin` int(11) NULL DEFAULT NULL COMMENT '操作人',
  PRIMARY KEY (`hr_id`, `hr_house_code`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '租客信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_house_rent_channel
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_rent_channel`;
CREATE TABLE `dcxw_house_rent_channel`  (
  `hrc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '出租渠道id',
  `hrc_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hrc_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hrc_isable` tinyint(2) NULL DEFAULT NULL COMMENT '是否可用：1.是，2，否',
  `hrc_addtime` int(11) NULL DEFAULT NULL,
  `hrc_admin` int(10) NULL DEFAULT 1 COMMENT '添加人',
  PRIMARY KEY (`hrc_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_house_rent_channel
-- ----------------------------
INSERT INTO `dcxw_house_rent_channel` VALUES (1, '爱彼迎', '/uploads/20181110/bd62442a31be2657d15a28718581a052.jpg', 2, 1541817967, 1);
INSERT INTO `dcxw_house_rent_channel` VALUES (2, '贝壳找房', '/uploads/channel/20181110/81dae8fd55c42b2423fc735e0e738cc7.jpg', 1, 1541818130, 1);
INSERT INTO `dcxw_house_rent_channel` VALUES (3, '链家', '/uploads/channel/20181110/b07077c9cf073ec1a737ebd17fd8f2ea.jpg', 1, 1541818206, 1);
INSERT INTO `dcxw_house_rent_channel` VALUES (4, '58同城', '/uploads/channel/20181110/75c1052b47d088e2d31571a7bca69d72.jpg', 1, 1541818289, 1);
INSERT INTO `dcxw_house_rent_channel` VALUES (5, '美团', '/uploads/channel/20181110/f3875a5aa2e0f8769646f49712a2918e.png', 1, 1541818539, 1);
INSERT INTO `dcxw_house_rent_channel` VALUES (6, '大众点评', '/uploads/channel/20181110/48849246d7d7f419bbdedf5b3253b61d.jpg', 1, 1541818559, 1);
INSERT INTO `dcxw_house_rent_channel` VALUES (7, '蚂蚁短租', '/uploads/channel/20181110/5941774fdf71c6b7194e5abcd9f0d54f.png', 1, 1541818761, 1);
INSERT INTO `dcxw_house_rent_channel` VALUES (8, '去哪儿', '/uploads/channel/20181110/72131b08bd14b157877c120fa1a05810.png', 1, 1541818792, 1);
INSERT INTO `dcxw_house_rent_channel` VALUES (9, '途家', '/uploads/channel/20181110/0d697b017d7a30f85802dd65aa388cb8.png', 1, 1541818858, 1);
INSERT INTO `dcxw_house_rent_channel` VALUES (10, '携程', '/uploads/channel/20181110/645024166b3de1e610f30106ad381090.png', 1, 1541818885, 1);

-- ----------------------------
-- Table structure for dcxw_house_rent_log
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_rent_log`;
CREATE TABLE `dcxw_house_rent_log`  (
  `hrl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '房屋出租信息表',
  `hrl_house_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '房屋编号',
  `hrl_renter_id` int(11) NULL DEFAULT NULL COMMENT '租客id',
  `hrl_elect_start` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '电表底数',
  `hrl_elect_end` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '电表终额',
  `hrl_water_start` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '水表底数',
  `hrl_water_end` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '水表终额',
  `hrl_air_start` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '燃气底数',
  `hrl_air_end` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '燃气终额',
  `hrl_rent_time` int(11) NULL DEFAULT NULL COMMENT '租房日期',
  `hrl_dead_time` int(11) NULL DEFAULT NULL COMMENT '租房合同截止日期',
  `hrl_contact_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '租房合同编号',
  `hrl_contact_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '租房合同照片',
  `hrl_foregift` decimal(10, 2) NULL DEFAULT NULL COMMENT '租房押金',
  `hrl_rent_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '租房单价',
  `hrl_rent_type` tinyint(2) NULL DEFAULT NULL COMMENT '出租类型；1.日租金；2月租金',
  `hrl_pay_type` tinyint(2) NULL DEFAULT 1 COMMENT '租金支付方式；1，月付；2，季付；3，年付',
  `hrl_remark` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '租房备注',
  `hrl_status` tinyint(2) NULL DEFAULT 1 COMMENT '出租状态；1.出租中；2，已完成',
  `hrl_rent_channel` tinyint(2) NULL DEFAULT NULL COMMENT '出租渠道:1.爱彼迎；2.贝壳；3.58同城',
  `hrl_addtime` int(11) NULL DEFAULT NULL COMMENT '出租信息添加时间',
  `hrl_admin` int(11) NULL DEFAULT NULL COMMENT '操作人员',
  PRIMARY KEY (`hrl_id`, `hrl_house_code`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '房屋出租信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_house_rent_pay_log
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_house_rent_pay_log`;
CREATE TABLE `dcxw_house_rent_pay_log`  (
  `hrpl_id` int(11) NOT NULL AUTO_INCREMENT,
  `hrpl_rent_id` int(11) NOT NULL COMMENT '租房记录id',
  `hrpl_money` decimal(10, 2) NULL DEFAULT NULL COMMENT '收租金额',
  `hrpl_addtime` int(11) NULL DEFAULT NULL COMMENT '收租记录添加时间',
  `hrpl_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '收租凭证',
  `hrpl_tips` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收租备注',
  `hrpl_next_rent` int(11) NULL DEFAULT NULL COMMENT '下次收租时间',
  `hrpl_user` int(11) NULL DEFAULT NULL COMMENT '操作人',
  PRIMARY KEY (`hrpl_id`, `hrpl_rent_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '租金收取记录表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_lession
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_lession`;
CREATE TABLE `dcxw_lession`  (
  `ls_id` int(11) NOT NULL AUTO_INCREMENT,
  `ls_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '课程标题',
  `ls_view` int(11) NULL DEFAULT 0 COMMENT '浏览量',
  `ls_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '封面图',
  `ls_img_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '封面图alt',
  `ls_remarks` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '课程简介',
  `ls_video` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '视频资料',
  `ls_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '课程详情',
  `ls_addtime` int(11) NULL DEFAULT NULL COMMENT '课程添加时间',
  `ls_updatetime` int(11) NULL DEFAULT NULL COMMENT '更新时间',
  `ls_order` int(10) NULL DEFAULT NULL COMMENT '排序',
  `ls_admin` int(10) NULL DEFAULT NULL COMMENT '操作人',
  `ls_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示；1，是；2，否',
  PRIMARY KEY (`ls_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '学习课程-课程表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_lession
-- ----------------------------
INSERT INTO `dcxw_lession` VALUES (19, '财务规章制度', 59, '/uploads/article/20180923/c306882d41bd2b1b6ad609552530a116.jpg', '财务规章制度，请认真阅读！', NULL, NULL, NULL, 1537665616, 1537665616, NULL, 54, 1);
INSERT INTO `dcxw_lession` VALUES (20, '行政审批流程', 40, '/uploads/article/20180923/86f0cc63a7b7a76f160e4d834782038c.jpg', '行政审批流程，请认真阅读！', NULL, NULL, NULL, 1537667856, 1537669998, 5, 54, 1);
INSERT INTO `dcxw_lession` VALUES (21, '事业部签约流程', 29, '/uploads/article/20180923/14e4751e9dac8fda105db4bb9242dc75.png', '事业部签约流程，请认真阅读！', NULL, NULL, NULL, 1537670573, 1537670573, NULL, 54, 1);
INSERT INTO `dcxw_lession` VALUES (23, '人事管理制度', 54, '/uploads/article/20180923/c6dac93c8b98a9059fb67aebc419f0eb.png', '人事管理制度，请认真阅读！', NULL, NULL, NULL, 1537689000, 1537689000, NULL, 54, 1);
INSERT INTO `dcxw_lession` VALUES (24, '运营管理制度', 41, '/uploads/article/20180924/235a045c0af35c9543d423dcfbc1a095.png', '', NULL, NULL, NULL, 1537759016, 1537759016, NULL, 54, 1);

-- ----------------------------
-- Table structure for dcxw_loginlog
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_loginlog`;
CREATE TABLE `dcxw_loginlog`  (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_admin` int(11) NULL DEFAULT NULL COMMENT '管理员，对应admin_id',
  `log_time` int(11) NULL DEFAULT NULL COMMENT '登录时间',
  `log_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '登录ip',
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '登录日志表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_menu
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_menu`;
CREATE TABLE `dcxw_menu`  (
  `m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单id',
  `m_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '菜单名称',
  `m_fid` int(11) NULL DEFAULT NULL COMMENT '菜单父级id',
  `m_control` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '控制器名称，小写',
  `m_action` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '方法名，小写',
  `m_sort` int(10) NULL DEFAULT NULL COMMENT '排序',
  `m_type` int(10) NULL DEFAULT NULL COMMENT '菜单类型1.菜单；2.操作',
  `m_icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '菜单图标',
  `m_opeatime` int(11) NULL DEFAULT NULL COMMENT '操作时间',
  `m_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  PRIMARY KEY (`m_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 161 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '菜单表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_menu
-- ----------------------------
INSERT INTO `dcxw_menu` VALUES (1, '平台员工', 0, 'admin', 'admin', 1, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (2, '员工列表', 1, 'admin', 'admin', 1, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (4, '角色列表', 1, 'admin', 'role', 1, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (39, '新增', 32, 'banner', 'addbanner', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (40, '修改', 32, 'banner', 'editbanner', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (41, '删除', 32, 'banner', 'delbanner', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (10, '系统配置', 0, 'setinfo', 'setlist', 2, 1, '123', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (11, '基础配置', 10, 'setinfo', 'setlist', 0, 1, '123', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (12, '分站配置', 10, 'setinfo', 'branch', 0, 1, '123', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (13, '新增', 12, 'setinfo', 'addbranch', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (14, '客户管理', 0, 'user', 'userlist', 6, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (87, '模块配置', 10, 'admin', 'menu', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (17, '批量删除', 15, 'user', 'delBatch', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (18, '单个删除', 15, 'user', 'delUser', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (19, '类型参数', 10, 'setinfo', 'typelist', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (20, '信息配置', 10, 'msg', 'msg', 0, 1, '11111', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (21, '区域配置', 10, 'district', 'district', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (22, '内容管理', 0, 'article', 'article', 5, 1, '5', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (23, '文章管理', 22, 'article', 'article', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (24, '案例列表', 22, 'example', 'example', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (25, '楼盘管理', 22, 'building', 'builds', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (26, '设计团队', 22, 'designer', 'team', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (27, '专题模板', 22, 'topic', 'topic', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (28, '推广页面', 22, 'topics', 'topics', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (29, '导航管理', 0, 'nav', 'nav', 4, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (30, '导航列表', 29, 'nav', 'navlist', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (31, '广告管理', 0, 'banner', 'bannerlist', 3, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (42, '新增', 30, 'nav', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (82, '回收站', 14, 'user', 'back', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (37, '菜单管理', 36, 'admin', 'menu', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (83, '首页轮播', 31, 'banner', 'banner', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (43, '编辑', 30, 'nav', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (44, '删除', 30, 'nav', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (45, '新增', 28, 'topics', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (46, '编辑', 28, 'topics', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (47, '删除', 28, 'topics', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (48, '新增', 27, 'topic', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (49, '编辑', 27, 'topic', 'edit', 0, 2, '9', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (50, '删除', 27, 'topic', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (51, '新增', 26, 'designer', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (52, '编辑', 26, 'designer', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (53, '删除', 26, 'designer', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (54, '新增', 25, 'building', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (55, '编辑', 25, 'building', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (56, '删除', 25, 'building', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (57, '新增', 24, 'example', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (58, '编辑', 24, 'example', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (59, '删除', 24, 'example', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (60, '新增', 23, 'article', 'addarticle', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (61, '编辑', 23, 'article', 'editarticle', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (62, '删除', 23, 'article', 'delarticle', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (65, '导出数据表', 15, 'excel', 'excel', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (64, '编辑', 15, 'user', 'editUser', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (66, '批量恢复', 16, 'user', 'backBatch', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (67, '单个恢复', 16, 'user', 'backNormal', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (68, '批量彻删', 16, 'user', 'absdelBatch', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (69, '单个彻删', 16, 'user', 'absdelete', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (70, '新增', 2, 'admin', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (71, '编辑', 2, 'admin', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (72, '删除', 2, 'admin', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (76, '新增', 4, 'admin', 'addrole', 2, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (77, '编辑', 4, 'admin', 'editrole', 2, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (78, '删除', 4, 'admin', 'delrole', 1, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (81, '客户列表', 14, 'user', 'user', 2, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (90, '在施工地', 22, 'worksite', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (91, '施工团队', 22, 'worker', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (92, '产品效果', 31, 'banner', 'product', 4, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (93, '文章轮播', 31, 'banner', 'artbanner', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (94, '编辑', 81, 'user', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (95, '删除', 81, 'user', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (96, '导出', 81, 'user', 'export', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (97, '恢复', 82, 'back', 'recover', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (98, '删除', 82, 'back', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (99, '新增', 90, 'worksite', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (100, '编辑', 90, 'worksite', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (101, '删除', 90, 'worksite', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (102, '新增', 91, 'worker', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (103, '编辑', 91, 'worker', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (104, '删除', 91, 'worker', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (105, '新增', 92, 'banner', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (106, '编辑', 92, 'banner', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (107, '删除', 92, 'banner', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (108, '新增', 83, 'banner', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (109, '编辑', 83, 'banner', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (110, '删除', 83, 'banner', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (111, '新增', 93, 'banner', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (112, '编辑', 93, 'banner', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (113, '删除', 93, 'banner', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (114, '新增', 11, 'setinfo', 'add', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (115, '编辑', 11, 'setinfo', 'edit', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (116, '删除', 11, 'setinfo', 'del', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (117, '编辑', 12, 'setinfo', 'editbranch', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (118, '删除', 12, 'setinfo', 'delbranch', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (119, '新增', 87, 'admin', 'addmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (120, '编辑', 87, 'admin', 'editmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (121, '删除', 87, 'admin', 'delmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (122, '新增', 19, 'admin', 'addmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (123, '编辑', 19, 'admin', 'editmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (124, '删除', 19, 'admin', 'delmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (125, '新增', 20, 'admin', 'addmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (126, '编辑', 20, 'admin', 'editmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (127, '删除', 20, 'admin', 'delmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (128, '新增', 21, 'admin', 'addmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (129, '编辑', 21, 'admin', 'editmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (130, '删除', 21, 'admin', 'delmenu', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (131, '客服列表', 14, 'user', 'cusservice', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (132, '推广列表', 14, 'user', 'spread', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (133, '查看', 132, 'user', 'spread', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (134, '编辑', 131, 'user', 'cusservice', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (135, '删除', 131, 'user', 'deluser', 0, 2, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (136, '房源管理', 0, 'house', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (137, '房源管理', 136, 'house', 'index', 1, 1, '房源管理', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (140, '添加', 137, 'house', 'add', 0, 2, '123', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (139, '查看', 137, 'house', 'index', 0, 2, '123', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (141, '编辑', 137, 'house', 'edit', 0, 2, '123', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (142, '房屋托管', 136, 'house', 'seek', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (143, '预约看房', 136, 'house', 'orders', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (144, '会员管理', 0, 'costomer', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (145, '会员列表', 144, 'customer', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (146, '营销管理', 144, 'customer', 'conpon', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (147, '培训管理', 0, 'learn', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (148, '培训管理', 147, 'learn', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (149, '题库管理', 147, 'learn', 'exam', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (150, '部门管理', 0, 'department', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (151, '部门管理', 150, 'department', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (152, '内部员工', 0, 'staff', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (153, '员工管理', 152, 'staff', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (154, '调查问卷', 0, 'question', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (155, '调查问卷', 154, 'question', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (156, '合作伙伴', 22, 'partner', 'index', 0, 1, 'index', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (157, '出租渠道', 136, 'channel', 'index', 0, 1, 'index', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (158, '前端添加', 136, 'market', 'index', 0, 1, '123', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (159, '操作日志', 0, 'operatelog', 'index', 0, 1, '1', NULL, NULL);
INSERT INTO `dcxw_menu` VALUES (160, '操作记录', 159, 'operatelog', 'index', 0, 1, '1', NULL, NULL);

-- ----------------------------
-- Table structure for dcxw_nav
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_nav`;
CREATE TABLE `dcxw_nav`  (
  `nav_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '导航id',
  `nav_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '导航标题',
  `nav_fid` int(10) NULL DEFAULT NULL COMMENT '导航父级id',
  `nav_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '导航图片',
  `nav_hover_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '悬停图片',
  `nav_seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo标题',
  `nav_seo_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo关键词',
  `nav_seo_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo描述',
  `nav_order` tinyint(255) NULL DEFAULT NULL COMMENT '导航排序数字越大越靠前',
  `nav_isable` tinyint(4) NULL DEFAULT NULL COMMENT '是否显示：1 显示；2 隐藏',
  `nav_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '导航链接',
  `nav_opeatime` int(11) NULL DEFAULT NULL COMMENT '操作时间',
  `nav_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  PRIMARY KEY (`nav_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '前端网站导航' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_nav
-- ----------------------------
INSERT INTO `dcxw_nav` VALUES (51, '首页', 0, '', '', '大城小屋智能公寓-知名的白领公寓|合租公寓|单身公寓出租', '白领公寓,合租公寓,单身公寓出租,智能公寓,陕西租房,大城小屋,陕西房屋托管,公寓出租,小屋智能公寓,陕西大城小屋,陕西大城小屋不动产管理有限公司,陕西毛坯房出租,大城小屋', '大城小屋智能公寓,知名的智能租房网,房源遍布西安成都各区,专为城市白领打造时尚公寓出租服务,统一时尚装修,免中介费,定期保洁,拎包即住,可整租,可合租,临近地铁,交通便利,租房形式灵活多样,满足您的各种租房需求!', 7, 1, 'index/index', 1536288075, 1);
INSERT INTO `dcxw_nav` VALUES (52, '轻松找房', 0, '', '', '轻松找房', '轻松找房', '轻松找房', 6, 1, 'seek/index', 1536376754, 1);
INSERT INTO `dcxw_nav` VALUES (53, '房屋托管', 0, '', '', '房屋托管', '房屋托管', '房屋托管', 5, 1, 'house/index', 1536376013, 1);
INSERT INTO `dcxw_nav` VALUES (54, '关于我们', 0, '', '', '关于我们', '关于我们', '关于我们', 3, 1, 'about/index', 1536376935, 1);
INSERT INTO `dcxw_nav` VALUES (55, '新闻资讯', 0, '', '', '新闻资讯', '新闻资讯', '新闻资讯', 4, 1, 'news/index', 1536376084, 1);
INSERT INTO `dcxw_nav` VALUES (56, '123', 0, '', '', '123', '123', '123', 1, 1, '123', 1540886313, 1);

-- ----------------------------
-- Table structure for dcxw_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_operation_log`;
CREATE TABLE `dcxw_operation_log`  (
  `ol_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '操作日志自增id',
  `ol_admin` int(11) NULL DEFAULT NULL COMMENT '操作人管理员id',
  `ol_add_time` int(11) NULL DEFAULT NULL COMMENT '操作时间',
  `ol_net_states` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户网络状态',
  `ol_user_device` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户设备类型',
  `ol_user_browser` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户浏览器类型',
  `ol_ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户IP',
  `ol_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '操作内容',
  `ol_type` tinyint(2) NULL DEFAULT NULL COMMENT '记录类型：1.房源主表修改;2.房源附属信息修改',
  `ol_is_delete` tinyint(2) NULL DEFAULT 1 COMMENT '是否删除，1正常；2删除',
  PRIMARY KEY (`ol_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '操作日志表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_operation_log
-- ----------------------------
INSERT INTO `dcxw_operation_log` VALUES (2, 73, 1544409155, 'Internet', 'iPhone', 'Safari', '127.0.0.1', '把h_area:【123】->【158】；\n把h_building:【大册亨啊数据库的概率】->【泰华金贸国际】；\n把h_address:【陕西省西安市未央区】->【陕西省西安市雁塔区】；\n把h_updatetime:【1544235787】->【1544409155】；\n', 1, 2);
INSERT INTO `dcxw_operation_log` VALUES (3, 73, 1544412132, 'Internet', 'iPhone', 'Safari', '127.0.0.1', '把h_area:【158】->【158111】；\n把h_building:【泰华金贸国际】->【泰华金贸国际1】；\n把h_address:【陕西省西安市雁塔区】->【陕西省西安市雁塔区1】；\n把h_updatetime:【1544409155】->【1544412132】；\n', 1, 1);
INSERT INTO `dcxw_operation_log` VALUES (4, 73, 1544412445, 'Internet', 'iPhone', 'Safari', '127.0.0.1', '把ha_contact_code:【dcxw_00123】->【dcxw_00222】；\n把ha_contact_img:【/uploads/market/20181208/626f0edddb37a3a797338babdb3b7ad9.jpg,/uploads/market/20181208/86af96da9b0f633d3a0b0ad9b0a9b2d0.png,/uploads/decorate/20181208/598f7f5e0a63ee71a6440124aec3c76f.png】->【/uploads/market/20181208/626f0edddb37a3a797338babdb3b7ad9.jpg,/uploads/market/20181208/86af96da9b0f633d3a0b0ad9b0a9b2d0.png】；\n把ha_remarks:【123123132312】->【这是我修改后的】；\n把ha_addtime:【1544249898】->【1544412445】；\n', 1, 1);
INSERT INTO `dcxw_operation_log` VALUES (5, 73, 1544412749, 'Internet', 'iPhone', 'Safari', '127.0.0.1', '把ha_addtime:【1544412445】->【1544412749】；\n', 2, 1);
INSERT INTO `dcxw_operation_log` VALUES (6, 19, 1544420057, 'Internet', 'iPhone', 'Safari', '127.0.0.1', '把h_area:【158111】->【1581112】；\n把h_building:【泰华金贸国际1】->【泰华金贸国际12】；\n把h_address:【陕西省西安市雁塔区1】->【陕西省西安市雁塔区12】；\n把h_updatetime:【1544412132】->【1544420057】；\n', 1, 1);
INSERT INTO `dcxw_operation_log` VALUES (7, 19, 1544420112, 'Internet', 'iPhone', 'Safari', '127.0.0.1', '把ha_keys:【123】->【123我】；\n把ha_keys_remarks:【123】->【1232 3123】；\n把ha_rent_time:【1123】->【112111】；\n把ha_decorate_permit:【1544457599】->【1546531199】；\n把ha_deadline:【1544457599】->【1545926399】；\n把ha_remarks:【这是我修改后的】->【这是我修改后的12332123】；\n把ha_user:【73】->【19】；\n把ha_addtime:【1544412749】->【1544420112】；\n', 2, 1);
INSERT INTO `dcxw_operation_log` VALUES (8, 19, 1544420172, 'Internet', 'iPhone', 'Safari', '127.0.0.1', '把ha_contact_img:【/uploads/market/20181208/626f0edddb37a3a797338babdb3b7ad9.jpg,/uploads/market/20181208/86af96da9b0f633d3a0b0ad9b0a9b2d0.png】->【/uploads/market/20181208/626f0edddb37a3a797338babdb3b7ad9.jpg,/uploads/market/20181208/86af96da9b0f633d3a0b0ad9b0a9b2d0.png,/uploads/market/20181210/5404123f16820ff3ef91cbbf51fa4929.png】；\n把ha_addtime:【1544420112】->【1544420172】；\n', 2, 1);
INSERT INTO `dcxw_operation_log` VALUES (9, 17, 1544420529, 'Internet', 'iPhone', 'Safari', '127.0.0.1', '把h_area:【15811123】->【158111234】；\n把h_building:【泰华金贸国际123】->【泰华金贸国际1234】；\n把h_address:【陕西省西安市雁塔区123】->【陕西省西安市雁塔区1234】；\n把h_updatetime:【1544420493】->【1544420529】；\n', 1, 1);
INSERT INTO `dcxw_operation_log` VALUES (10, 17, 1544420565, 'Internet', 'iPhone', 'Safari', '127.0.0.1', '把ha_keys:【123我】->【123我444】；\n把ha_contact_code:【dcxw_00222】->【dcxw_002224444】；\n把ha_contact_img:【/uploads/market/20181208/626f0edddb37a3a797338babdb3b7ad9.jpg,/uploads/market/20181208/86af96da9b0f633d3a0b0ad9b0a9b2d0.png,/uploads/market/20181210/5404123f16820ff3ef91cbbf51fa4929.png】->【/uploads/market/20181208/626f0edddb37a3a797338babdb3b7ad9.jpg,/uploads/market/20181208/86af96da9b0f633d3a0b0ad9b0a9b2d0.png,/uploads/market/20181210/5404123f16820ff3ef91cbbf51fa4929.png,/uploads/operation/20181210/be24f4d40ff43ba76be9de627c6db7d8.png】；\n把ha_rent_time:【112111】->【11211144】；\n把ha_decorate_permit:【1546531199】->【1548345599】；\n把ha_deadline:【1545926399】->【1545494399】；\n把ha_remarks:【这是我修改后的12332123】->【这是我修改后的12332123123123改改改】；\n把ha_user:【19】->【17】；\n把ha_addtime:【1544420172】->【1544420565】；\n', 2, 1);

-- ----------------------------
-- Table structure for dcxw_partner
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_partner`;
CREATE TABLE `dcxw_partner`  (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '合作伙伴名称',
  `pt_order` int(3) NULL DEFAULT 0 COMMENT '合作伙伴排序',
  `pt_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'logo图片',
  PRIMARY KEY (`pt_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '合作伙伴表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_province
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_province`;
CREATE TABLE `dcxw_province`  (
  `p_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '省份id',
  `p_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '省份名称',
  `p_opeatime` int(11) NULL DEFAULT NULL COMMENT '操作时间',
  `p_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  `p_code` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '生成房源编号用的数码',
  PRIMARY KEY (`p_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dcxw_province
-- ----------------------------
INSERT INTO `dcxw_province` VALUES (1, '陕西', 1541387914, 1, '10');
INSERT INTO `dcxw_province` VALUES (4, '四川', 1541387978, 1, '11');
INSERT INTO `dcxw_province` VALUES (5, '重庆', 1541387984, 1, '12');

-- ----------------------------
-- Table structure for dcxw_question
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_question`;
CREATE TABLE `dcxw_question`  (
  `q_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '调查问卷',
  `q_user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '填表人姓名(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_user_phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '填表人电话(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_rent_step` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '短租流程(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_service_step` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '服务流程(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_aroundings` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '居住环境(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_security` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '安保措施(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_layout` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '小屋的布局(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_clean` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '小屋的整洁(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_setinfo` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '配套设施(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_transport` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '居住的交通(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_shopping` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '购物便利(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_experience` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '居住体验(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注内容',
  `q_addtime` int(11) NULL DEFAULT NULL COMMENT '提交时间',
  `q_user_wechat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微信名称',
  PRIMARY KEY (`q_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '调查问卷答案表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_question
-- ----------------------------
INSERT INTO `dcxw_question` VALUES (1, '党萌萌', '18220995991', '10', '10', '10', '5', '10', '5', '3', '3', '10', '3', '我觉得还可以', 1539149207, NULL);
INSERT INTO `dcxw_question` VALUES (2, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149245, NULL);
INSERT INTO `dcxw_question` VALUES (3, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149249, NULL);
INSERT INTO `dcxw_question` VALUES (4, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149249, NULL);
INSERT INTO `dcxw_question` VALUES (5, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149250, NULL);
INSERT INTO `dcxw_question` VALUES (6, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149250, NULL);
INSERT INTO `dcxw_question` VALUES (7, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149250, NULL);
INSERT INTO `dcxw_question` VALUES (8, '张欢', '15236523652', '10', '8', '8', '5', '5', '8', '8', '8', '5', '3', '123123123', 1539149358, NULL);
INSERT INTO `dcxw_question` VALUES (9, '123123', '15966663333', '3', '3', '3', '5', '1', '8', '1', '8', '3', '8', '东风公司电话', 1539149459, NULL);
INSERT INTO `dcxw_question` VALUES (10, '代码，吗', '18255556666', '1', '8', '5', '3', '5', '10', '3', '10', '3', '5', '我觉得还差点家的感觉！', 1539149633, NULL);

-- ----------------------------
-- Table structure for dcxw_question_copy1
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_question_copy1`;
CREATE TABLE `dcxw_question_copy1`  (
  `q_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '调查问卷',
  `q_user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '填表人姓名(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_user_phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '填表人电话(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_rent_step` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '短租流程(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_service_step` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '服务流程(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_aroundings` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '居住环境(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_security` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '安保措施(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_layout` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '小屋的布局(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_clean` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '小屋的整洁(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_setinfo` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '配套设施(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_transport` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '居住的交通(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_shopping` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '购物便利(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_experience` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '居住体验(10.非常满意;8.基本满意,5分为一般，3分为不满意，1分为极度不满意)',
  `q_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注内容',
  `q_addtime` int(11) NULL DEFAULT NULL COMMENT '提交时间',
  `q_user_wechat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微信名称',
  PRIMARY KEY (`q_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '调查问卷答案表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_question_copy1
-- ----------------------------
INSERT INTO `dcxw_question_copy1` VALUES (1, '党萌萌', '18220995991', '10', '10', '10', '5', '10', '5', '3', '3', '10', '3', '我觉得还可以', 1539149207, NULL);
INSERT INTO `dcxw_question_copy1` VALUES (2, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149245, NULL);
INSERT INTO `dcxw_question_copy1` VALUES (3, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149249, NULL);
INSERT INTO `dcxw_question_copy1` VALUES (4, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149249, NULL);
INSERT INTO `dcxw_question_copy1` VALUES (5, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149250, NULL);
INSERT INTO `dcxw_question_copy1` VALUES (6, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149250, NULL);
INSERT INTO `dcxw_question_copy1` VALUES (7, '党萌萌', '18220995991', '5', '8', '10', '10', '10', '5', '3', '3', '5', '1', '我觉得还不错', 1539149250, NULL);
INSERT INTO `dcxw_question_copy1` VALUES (8, '张欢', '15236523652', '10', '8', '8', '5', '5', '8', '8', '8', '5', '3', '123123123', 1539149358, NULL);
INSERT INTO `dcxw_question_copy1` VALUES (9, '123123', '15966663333', '3', '3', '3', '5', '1', '8', '1', '8', '3', '8', '东风公司电话', 1539149459, NULL);
INSERT INTO `dcxw_question_copy1` VALUES (10, '代码，吗', '18255556666', '1', '8', '5', '3', '5', '10', '3', '10', '3', '5', '我觉得还差点家的感觉！', 1539149633, NULL);

-- ----------------------------
-- Table structure for dcxw_role
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_role`;
CREATE TABLE `dcxw_role`  (
  `r_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `r_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '权限编号',
  `r_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '权限名称',
  `r_power` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '权限设置，对应菜单的id',
  `r_opeatime` int(11) NULL DEFAULT NULL COMMENT '操作时间',
  `r_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  PRIMARY KEY (`r_id`, `r_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 29 CHARACTER SET = utf8 COLLATE = utf8_bin COMMENT = '管理员权限表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_role
-- ----------------------------
INSERT INTO `dcxw_role` VALUES (1, '201806010001', '超级管理员', '22,23,60,61,62,156,29,30,42,43,44,31,83,108,109,110,10,11,114,115,116,87,119,120,121,19,122,123,124,20,125,126,127,21,128,129,130,1,2,70,71,72,4,76,77,78,136,137,140,139,141,142,143,157,158,144,145,146,147,148,149,150,151,152,153,154,155,159,160', NULL, NULL);
INSERT INTO `dcxw_role` VALUES (27, '201809210001', '培训', '147,148', NULL, NULL);
INSERT INTO `dcxw_role` VALUES (28, '201809220001', '内部员工管理', '136,137,140,139,141,142,143,147,148,152,153', NULL, NULL);

-- ----------------------------
-- Table structure for dcxw_setinfo
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_setinfo`;
CREATE TABLE `dcxw_setinfo`  (
  `s_id` int(100) NOT NULL AUTO_INCREMENT COMMENT '基本配置自增键',
  `s_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '系统配置key',
  `s_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '解释说明',
  `s_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '配置值',
  `s_is_able` tinyint(2) NULL DEFAULT 1 COMMENT '是否可用',
  `s_opeatime` int(11) NULL DEFAULT NULL COMMENT '操作时间',
  `s_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  `s_type` tinyint(2) NULL DEFAULT NULL COMMENT '设置的类型；1 短信配置',
  PRIMARY KEY (`s_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '系统配置表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_setinfo
-- ----------------------------
INSERT INTO `dcxw_setinfo` VALUES (10, 'hotline', '热线电话', '400-996-1585', 1, 1536301983, 1, 0);
INSERT INTO `dcxw_setinfo` VALUES (4, 'ali_sms_key', '阿里短信key', 'LTAIjXLJsJZqdlvr', 1, 1526987006, 1, 1);
INSERT INTO `dcxw_setinfo` VALUES (5, 'ali_sms_secret', '阿里短信serect', 'w2GYchE2ea8WSeA44oFRBtqxpqkCDj', 1, 1526986991, 1, 1);
INSERT INTO `dcxw_setinfo` VALUES (8, 'webname', '网站名称', '大城小屋', 1, 1536287404, 1, 0);

-- ----------------------------
-- Table structure for dcxw_smstem
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_smstem`;
CREATE TABLE `dcxw_smstem`  (
  `sms_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '阿里云短信模板id',
  `sms_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '短信模板名称',
  `sms_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '短信模板,以sms开头的一串字母',
  `sms_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '模板内容',
  `sms_remarks` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '模板说明',
  `sms_addtime` int(11) NULL DEFAULT NULL COMMENT '操作时间',
  `sms_admin` int(10) NULL DEFAULT NULL COMMENT '操作人',
  `sms_type` tinyint(2) NULL DEFAULT NULL COMMENT '模板类型：1.管理员通知；2.普通预约；3报价预约；4量房预约；5活动预约，6设计预约',
  PRIMARY KEY (`sms_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '阿里云短信模板' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_topic
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_topic`;
CREATE TABLE `dcxw_topic`  (
  `tp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '专题id',
  `tp_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专题编号。系统自动生成的编号，规则同客户编号生成规则',
  `tp_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '专题名称',
  `tp_p_id` int(10) NULL DEFAULT NULL COMMENT '省份',
  `tp_c_id` int(10) NULL DEFAULT NULL COMMENT '城市',
  `tp_b_id` int(10) NULL DEFAULT NULL COMMENT '站点id',
  `tp_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '专题内容（万能编辑器）',
  `tp_view` int(11) NULL DEFAULT 0 COMMENT '浏览量',
  `tp_seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo标题',
  `tp_seo_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo关键词',
  `tp_seo_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo描述',
  `tp_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示',
  `tp_createtime` int(11) NULL DEFAULT NULL COMMENT '发布时间',
  `tp_admin` int(10) NULL DEFAULT NULL COMMENT '发布人，对应管理员的id',
  PRIMARY KEY (`tp_id`, `tp_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '专题文章' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_topics
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_topics`;
CREATE TABLE `dcxw_topics`  (
  `tp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '专题id',
  `tp_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '专题二编号。系统自动生成的编号，规则同客户编号生成规则',
  `tp_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '专题名称',
  `tp_p_id` int(10) NULL DEFAULT NULL COMMENT '省份',
  `tp_c_id` int(10) NULL DEFAULT NULL COMMENT '城市',
  `tp_b_id` int(10) NULL DEFAULT NULL COMMENT '站点',
  `tp_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '专题内容（万能编辑器）',
  `tp_topic_url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '推广链接',
  `tp_view` int(11) NULL DEFAULT 0 COMMENT '浏览量',
  `tp_seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo标题',
  `tp_seo_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo关键词',
  `tp_seo_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo描述',
  `tp_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示',
  `tp_createtime` int(11) NULL DEFAULT NULL COMMENT '发布时间',
  `tp_admin` int(10) NULL DEFAULT NULL COMMENT '发布人，对应管理员的id',
  PRIMARY KEY (`tp_id`, `tp_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '专题文章' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_type
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_type`;
CREATE TABLE `dcxw_type`  (
  `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类型id',
  `type_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '类型名称',
  `type_branch` int(255) NULL DEFAULT NULL COMMENT '对应的站点ID（仅装修品质）',
  `type_price` int(10) NULL DEFAULT NULL COMMENT '品质单价（仅装修品质）',
  `type_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '封面图',
  `type_remarks` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '类型描述',
  `type_addtime` int(11) NULL DEFAULT NULL COMMENT '添加时间',
  `type_sort` tinyint(4) NULL DEFAULT NULL COMMENT '类型分类1，房屋类型，5.月租范围,2,房屋配置',
  `type_isable` tinyint(2) NULL DEFAULT NULL COMMENT '是否可用',
  `type_admin` int(10) NULL DEFAULT NULL COMMENT '操作人，对应管理员id',
  `type_order` int(10) NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`type_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 112 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '各种类型表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_type
-- ----------------------------
INSERT INTO `dcxw_type` VALUES (89, '一室', NULL, NULL, NULL, '一室', 1536392642, 1, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (90, '￥0-2000', NULL, NULL, NULL, '0-2000', 1536393040, 5, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (91, '两室', NULL, NULL, NULL, '两室', 1536392634, 1, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (92, '三室', NULL, NULL, NULL, '三室', 1536392730, 1, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (93, '四室', NULL, NULL, NULL, '四室四室', 1536392742, 1, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (94, '五室', NULL, NULL, NULL, '五室', 1536392764, 1, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (95, '复式', NULL, NULL, NULL, '复式复式', 1536392779, 1, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (96, '￥2001-4000', NULL, NULL, NULL, '2001-4000', 1536393029, 5, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (97, '￥4001-6000', NULL, NULL, NULL, '4001-6000', 1536392994, 5, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (98, '￥6001-10000', NULL, NULL, NULL, '6001-10000', 1536393019, 5, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (99, '冰箱', NULL, NULL, '/uploads/20181206/4458f7c219c773954661873b7d2c9c7c.jpg', NULL, 1544082987, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (101, '衣柜', NULL, NULL, '/uploads/20181206/dcec62218000c83bdafe20c3f714d4cc.jpg', NULL, 1544082998, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (102, '洗衣机', NULL, NULL, '/uploads/20181206/dab714a1818ee8e8caffcc85dd601535.jpg', NULL, 1544083012, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (103, '空调', NULL, NULL, '/uploads/20181206/45237407ea3e376d4b95a699093d60ca.jpg', NULL, 1544083026, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (104, '热水器', NULL, NULL, '/uploads/20181206/5fd062a435920ee49411f69a4ad14b1a.jpg', NULL, 1544083038, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (105, '宽带', NULL, NULL, '/uploads/20181206/64f5aea2f202af13d30207c382606e7b.jpg', NULL, 1544083047, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (106, '床头柜', NULL, NULL, '/uploads/20181206/cfccc72e36935bdff2987308fbbe1b54.jpg', NULL, 1544083060, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (107, '天然气', NULL, NULL, '/uploads/20181206/6464ebdc4f7bb2e68f9319a8be084142.jpg', NULL, 1544083070, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (108, '电视机', NULL, NULL, '/uploads/20181206/a0725edddb3da7356f3205edb34ceb61.jpg', NULL, 1544083105, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (109, '床', NULL, NULL, '/uploads/20181206/9c88f345e14bcdf9e59ee80a6859e4cb.jpg', NULL, 1544083115, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (110, '智能锁', NULL, NULL, '/uploads/20181206/69731b918a2f627d9315b30758b3d203.jpg', NULL, 1544083094, 2, 1, 1, 0);
INSERT INTO `dcxw_type` VALUES (111, '微波炉', NULL, NULL, '/uploads/20181206/7dce5502fda7f3c4cf9e8d7e3b325a8a.jpg', NULL, 1544083085, 2, 1, 1, 0);

-- ----------------------------
-- Table structure for dcxw_user
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_user`;
CREATE TABLE `dcxw_user`  (
  `u_id` int(10) NOT NULL AUTO_INCREMENT,
  `u_c_id` int(10) NULL DEFAULT NULL COMMENT '员工城市id',
  `u_openid` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微信的openid',
  `u_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户名称',
  `u_sex` tinyint(2) NULL DEFAULT NULL COMMENT '1男  2 女 ',
  `u_nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户昵称（微信昵称）',
  `u_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '登陆密码(MD5加密）',
  `u_job` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职位',
  `u_depart_id` int(10) NULL DEFAULT NULL COMMENT '所属部门id',
  `u_birth` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '出生日期',
  `u_phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '手机号',
  `u_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮箱',
  `u_isable` tinyint(2) NULL DEFAULT NULL COMMENT '是否在职',
  `u_isadmin` tinyint(2) NULL DEFAULT 2 COMMENT '是否为该部门管理员，1是。2，否',
  `u_addtime` int(11) NULL DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`u_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 116 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '企业内员工表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_user
-- ----------------------------
INSERT INTO `dcxw_user` VALUES (72, NULL, '', '李通', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '安装工', 0, '', '13259829870', '62@qq.com', 1, 0, 1537695765);
INSERT INTO `dcxw_user` VALUES (71, NULL, '', '樊园青', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '材料员', 0, '', '18535815926', '61@qq.com', 0, 0, 1537695764);
INSERT INTO `dcxw_user` VALUES (70, NULL, '', '葛琳娟', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '材料员', 0, '', '15902910793', '60@qq.com', 0, 0, 1537695763);
INSERT INTO `dcxw_user` VALUES (69, NULL, '', '雷珍', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '材料主管', 0, '', '15829788064', '59@qq.com', 0, 0, 1537695762);
INSERT INTO `dcxw_user` VALUES (68, NULL, '', '付嘉明', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '17730705336', '58@qq.com', 0, 0, 1537695761);
INSERT INTO `dcxw_user` VALUES (67, NULL, '', '李照峰', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15686325983', '57@qq.com', 0, 0, 1537695760);
INSERT INTO `dcxw_user` VALUES (66, NULL, '', '寇岩', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13679211252', '56@qq.com', 0, 0, 1537695759);
INSERT INTO `dcxw_user` VALUES (65, NULL, '', '王涛', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13072394557', '55@qq.com', 0, 0, 1537695758);
INSERT INTO `dcxw_user` VALUES (64, NULL, '', '颜豪威', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15389055430', '54@qq.com', 0, 0, 1537695757);
INSERT INTO `dcxw_user` VALUES (63, NULL, '', '张亮', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18082210809', '53@qq.com', 0, 0, 1537695756);
INSERT INTO `dcxw_user` VALUES (62, NULL, '', '刘天祥', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18221613614', '52@qq.com', 0, 0, 1537695755);
INSERT INTO `dcxw_user` VALUES (61, NULL, '', '牛占国', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18502935552', '51@qq.com', 0, 0, 1537695754);
INSERT INTO `dcxw_user` VALUES (60, NULL, '', '蒋鹏', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15193360112', '50@qq.com', 0, 0, 1537695753);
INSERT INTO `dcxw_user` VALUES (59, NULL, '', '孙鹏飞', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '17691335636', '49@qq.com', 0, 0, 1537695752);
INSERT INTO `dcxw_user` VALUES (58, NULL, '', '马安彤', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15029918600', '48@qq.com', 0, 0, 1537695751);
INSERT INTO `dcxw_user` VALUES (57, NULL, '', '郭梦梦', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '17729075205', '47@qq.com', 0, 0, 1537695750);
INSERT INTO `dcxw_user` VALUES (56, NULL, '', '许程杰', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '17729075203', '46@qq.com', 1, 0, 1537695749);
INSERT INTO `dcxw_user` VALUES (55, NULL, '', '刘敏帅', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '17391651077', '45@qq.com', 0, 0, 1537695748);
INSERT INTO `dcxw_user` VALUES (54, NULL, '', '包晨玉', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18791352110', '44@qq.com', 0, 0, 1537695747);
INSERT INTO `dcxw_user` VALUES (53, NULL, '', '刘娜', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18658256907', '43@qq.com', 0, 0, 1537695746);
INSERT INTO `dcxw_user` VALUES (52, NULL, '', '王雪芹', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18681779805', '42@qq.com', 0, 0, 1537695745);
INSERT INTO `dcxw_user` VALUES (51, NULL, '', '王文博', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15214076775', '41@qq.com', 0, 0, 1537695744);
INSERT INTO `dcxw_user` VALUES (50, NULL, '', '赵超凡', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15349138999', '40@qq.com', 0, 0, 1537695743);
INSERT INTO `dcxw_user` VALUES (49, NULL, '', '郑国涛', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15991901042', '39@qq.com', 0, 0, 1537695742);
INSERT INTO `dcxw_user` VALUES (48, NULL, '', '郭铎', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18792854644', '38@qq.com', 0, 0, 1537695741);
INSERT INTO `dcxw_user` VALUES (47, NULL, '', '张斌斌', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13892373729', '37@qq.com', 0, 0, 1537695740);
INSERT INTO `dcxw_user` VALUES (46, NULL, '', '牛昊田', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '17612926114', '36@qq.com', 0, 0, 1537695739);
INSERT INTO `dcxw_user` VALUES (45, NULL, '', '周冰', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18729558517', '35@qq.com', 0, 0, 1537695738);
INSERT INTO `dcxw_user` VALUES (44, NULL, '', '杨琛', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15829986624', '34@qq.com', 0, 0, 1537695737);
INSERT INTO `dcxw_user` VALUES (43, NULL, '', '周文顺', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15002926795', '33@qq.com', 0, 0, 1537695736);
INSERT INTO `dcxw_user` VALUES (42, NULL, '', '杨森', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '团队经理', 0, '', '15929898934', '32@qq.com', 0, 0, 1537695735);
INSERT INTO `dcxw_user` VALUES (41, NULL, '', '李佳敏', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18840341500', '31@qq.com', 0, 0, 1537695734);
INSERT INTO `dcxw_user` VALUES (40, NULL, '', '孟余锋', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18690565958', '30@qq.com', 0, 0, 1537695733);
INSERT INTO `dcxw_user` VALUES (39, NULL, '', '马真遥', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13060485283', '29@qq.com', 0, 0, 1537695732);
INSERT INTO `dcxw_user` VALUES (38, NULL, '', '尹江', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18092399453', '28@qq.com', 0, 0, 1537695731);
INSERT INTO `dcxw_user` VALUES (37, NULL, '', '赵文凯', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '17829180793', '27@qq.com', 0, 0, 1537695730);
INSERT INTO `dcxw_user` VALUES (36, NULL, '', '赵佳伟', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '17629000330', '26@qq.com', 0, 0, 1537695729);
INSERT INTO `dcxw_user` VALUES (35, NULL, '', '王晨', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13087578950', '25@qq.com', 0, 0, 1537695728);
INSERT INTO `dcxw_user` VALUES (34, NULL, '', '张坛', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18066922826', '24@qq.com', 0, 0, 1537695727);
INSERT INTO `dcxw_user` VALUES (33, NULL, '', '杨琼', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13679287304', '23@qq.com', 0, 0, 1537695726);
INSERT INTO `dcxw_user` VALUES (32, NULL, '', '郜嘉泽', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13119139377', '22@qq.com', 0, 0, 1537695725);
INSERT INTO `dcxw_user` VALUES (31, NULL, '', '贺红霞', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15594189771', '21@qq.com', 0, 0, 1537695724);
INSERT INTO `dcxw_user` VALUES (30, NULL, '', '宋歌', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18700038746', '20@qq.com', 0, 0, 1537695723);
INSERT INTO `dcxw_user` VALUES (29, NULL, '', '尚莎', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18710329367', '19@qq.com', 0, 0, 1537695722);
INSERT INTO `dcxw_user` VALUES (28, NULL, '', '李茂', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18792609901', '18@qq.com', 0, 0, 1537695721);
INSERT INTO `dcxw_user` VALUES (27, NULL, '', '魏晨阳', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18706887727', '17@qq.com', 0, 0, 1537695720);
INSERT INTO `dcxw_user` VALUES (26, NULL, '', '姜高飞', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18592092838', '16@qq.com', 0, 0, 1537695719);
INSERT INTO `dcxw_user` VALUES (25, NULL, '', '秦玉', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13488401195', '15@qq.com', 0, 0, 1537695718);
INSERT INTO `dcxw_user` VALUES (24, NULL, '', '周萍', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18706721121', '14@qq.com', 0, 0, 1537695717);
INSERT INTO `dcxw_user` VALUES (23, NULL, '', '刘泽鹏', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15202464641', '13@qq.com', 0, 0, 1537695716);
INSERT INTO `dcxw_user` VALUES (22, NULL, '', '马财良', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '区域总监', 0, '', '18291435205', '12@qq.com', 0, 0, 1537695715);
INSERT INTO `dcxw_user` VALUES (21, NULL, '', '张欢', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '文案策划', 0, '', '18710602581', '11@qq.com', 0, 0, 1537695714);
INSERT INTO `dcxw_user` VALUES (20, NULL, '', '王力', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '平面设计', 0, '', '15291047613', '10@qq.com', 0, 0, 1537695713);
INSERT INTO `dcxw_user` VALUES (19, 3, '', '孙志琳', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '运营主管', 6, '', '13919000740', '9@qq.com', 1, 0, 1542962755);
INSERT INTO `dcxw_user` VALUES (18, 3, '', '许新文', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '运营部总监', 4, '', '13572246244', '8@qq.com', 1, 0, 1542604673);
INSERT INTO `dcxw_user` VALUES (17, 3, '', '沈莹莹', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '新媒体运营', 3, '', '18092462307', '7@qq.com', 1, 0, 1543912404);
INSERT INTO `dcxw_user` VALUES (16, NULL, '', '郝婷莉', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '会计', 0, '', '15249271554', '6@qq.com', 0, 0, 1537695709);
INSERT INTO `dcxw_user` VALUES (15, NULL, '', '杨叶', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '行政助理', 0, '', '17612943383', '5@qq.com', 0, 0, 1537695708);
INSERT INTO `dcxw_user` VALUES (14, NULL, '', '黄冉', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '行政前台', 0, '', '17691173119', '4@qq.com', 0, 0, 1537695707);
INSERT INTO `dcxw_user` VALUES (13, 3, '', '陈慧东', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '行政总监', 5, '', '18220995991', '3@qq.com', 1, 0, 1543825976);
INSERT INTO `dcxw_user` VALUES (12, NULL, '', '王丽莎', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '人事主管', 0, '', '15990154780', '2@qq.com', 0, 0, 1537695705);
INSERT INTO `dcxw_user` VALUES (11, NULL, NULL, '岳甜', 2, NULL, 'e10adc3949ba59abbe56e057f20f883e', '行政主管', NULL, NULL, '18829220174', '1@qq.com', 1, 2, 1537695704);
INSERT INTO `dcxw_user` VALUES (73, 3, '', '杨阳', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '工程监理', 2, '', '17691074991', '63@qq.com', 1, 0, 1543830931);
INSERT INTO `dcxw_user` VALUES (74, NULL, '', '姚伟龙', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '工程主管', 0, '', '17719540677', '64@qq.com', 0, 0, 1537695767);
INSERT INTO `dcxw_user` VALUES (75, NULL, '', '郭小龙', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '工程总监', 0, '', '13201773706', '65@qq.com', 0, 0, 1537695768);
INSERT INTO `dcxw_user` VALUES (76, NULL, '', '齐海洲', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '工程监理', 0, '', '15829705906', '66@qq.com', 0, 0, 1537695769);
INSERT INTO `dcxw_user` VALUES (77, NULL, '', '梁鹏飞', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '设计师', 0, '', '13572491341', '67@qq.com', 0, 0, 1537695770);
INSERT INTO `dcxw_user` VALUES (78, NULL, '', '蒋金贵', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '设计师助理', 0, '', '18729710528', '68@qq.com', 0, 0, 1537695771);
INSERT INTO `dcxw_user` VALUES (79, NULL, '', '蒲海定', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '人事专员', 0, '', '15291404624', '69@qq.com', 0, 0, 1537695772);
INSERT INTO `dcxw_user` VALUES (80, NULL, '', '杨琴琴', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '保洁', 0, '', '17730750318', '70@qq.com', 0, 0, 1537695773);
INSERT INTO `dcxw_user` VALUES (81, 3, '', '叶朝', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '工程监理', 2, '', '15389071653', '71@qq.com', 1, 0, 1542696188);
INSERT INTO `dcxw_user` VALUES (82, NULL, '', '宋昊', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '17602902613', '72@qq.com', 0, 0, 1537695775);
INSERT INTO `dcxw_user` VALUES (84, NULL, '', '王轩', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13572177845', '74@qq.com', 0, 0, 1537695777);
INSERT INTO `dcxw_user` VALUES (85, NULL, '', '方勇', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '团队经理', 0, '', '13572983019', '75@qq.com', 0, 0, 1537695778);
INSERT INTO `dcxw_user` VALUES (86, 3, '', '余超', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '团队经理', 1, '', '18392394238', '76@qq.com', 1, 0, 1542604517);
INSERT INTO `dcxw_user` VALUES (87, NULL, '', '郝柯松', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '15029253423', '77@qq.com', 0, 0, 1537695780);
INSERT INTO `dcxw_user` VALUES (88, NULL, '', '惠小康', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '18829561054', '78@qq.com', 0, 0, 1537695781);
INSERT INTO `dcxw_user` VALUES (89, NULL, '', '杨雷可', 1, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 0, '', '13891397780', '79@qq.com', 0, 0, 1537695782);
INSERT INTO `dcxw_user` VALUES (90, 3, '', '李小倩', 2, '', 'e10adc3949ba59abbe56e057f20f883e', '客户经理', 1, '', '18571517738', '80@qq.com', 1, 0, 1540879100);
INSERT INTO `dcxw_user` VALUES (103, NULL, NULL, '陈璟莹', 2, NULL, 'e10adc3949ba59abbe56e057f20f883e', '会计', NULL, NULL, '13669281792', '81@qq.com', 1, 2, 1537837991);
INSERT INTO `dcxw_user` VALUES (104, NULL, NULL, '张潘婷', 2, NULL, 'e10adc3949ba59abbe56e057f20f883e', '行政主管', NULL, NULL, '13474603130', '82@qq.com', 1, 2, 1537838030);
INSERT INTO `dcxw_user` VALUES (105, NULL, NULL, '张子旭', 1, NULL, 'e10adc3949ba59abbe56e057f20f883e', '客户经理', NULL, NULL, '17602912742', '83@qq.com', 1, 2, 1537838070);
INSERT INTO `dcxw_user` VALUES (106, 3, NULL, '汪亚鹏', 1, NULL, 'e10adc3949ba59abbe56e057f20f883e', '工程监理', 2, NULL, '15352302716', '84@qq.com', 1, 2, 1542696108);
INSERT INTO `dcxw_user` VALUES (107, NULL, NULL, '李学辉', 1, NULL, 'e10adc3949ba59abbe56e057f20f883e', '安装工', NULL, NULL, '13571893712', '85@qq.com', 1, 2, 1537838144);
INSERT INTO `dcxw_user` VALUES (108, NULL, NULL, '韦丽倩', 2, NULL, 'e10adc3949ba59abbe56e057f20f883e', '设计师', NULL, NULL, '18189555866', '86@qq.com', 1, 2, 1537838186);
INSERT INTO `dcxw_user` VALUES (109, NULL, NULL, '王菲菲', 2, NULL, 'e10adc3949ba59abbe56e057f20f883e', '设计师助理', NULL, NULL, '18709186763', '87@qq.com', 1, 2, 1537838233);
INSERT INTO `dcxw_user` VALUES (110, NULL, NULL, '孙强', 1, NULL, 'e10adc3949ba59abbe56e057f20f883e', '客户经理', NULL, NULL, '13474684889', '88@qq.com', 1, 2, 1537838277);
INSERT INTO `dcxw_user` VALUES (111, NULL, NULL, '宋昊', 1, NULL, 'e10adc3949ba59abbe56e057f20f883e', '客户经理', NULL, NULL, '15291964431', '89@qq.com', 1, 2, 1537838312);
INSERT INTO `dcxw_user` VALUES (112, NULL, NULL, '张东', 1, NULL, 'e10adc3949ba59abbe56e057f20f883e', '客户经理', NULL, NULL, '13909232307', '90@qq.com', 1, 2, 1537838355);
INSERT INTO `dcxw_user` VALUES (113, NULL, NULL, '刘勇', 1, NULL, 'e10adc3949ba59abbe56e057f20f883e', '客户经理', NULL, NULL, '18802968696', '91@qq.com', 1, 2, 1537838385);

-- ----------------------------
-- Table structure for dcxw_worker
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_worker`;
CREATE TABLE `dcxw_worker`  (
  `wk_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '工长id',
  `wk_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '工长编号',
  `wk_p_id` int(10) NULL DEFAULT NULL COMMENT '省份id',
  `wk_c_id` int(10) NULL DEFAULT NULL COMMENT '城市id',
  `wk_b_id` int(10) NULL DEFAULT NULL COMMENT '站点id',
  `wk_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '工长姓名',
  `wk_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '工长头像长方形',
  `wk_avatar` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '工长头像正方形',
  `wk_img_alt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图像alt',
  `wk_num` int(10) NULL DEFAULT 0 COMMENT '工地数量',
  `wk_view` int(10) NULL DEFAULT 0 COMMENT '浏览 热度',
  `wk_des` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '工长简介',
  `wk_istop` tinyint(2) NULL DEFAULT 2 COMMENT '是否置顶 1 置顶 2 常规',
  `wk_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示 1显示 2 隐藏',
  `wk_addtime` int(11) NULL DEFAULT NULL COMMENT '添加时间',
  `wk_updatetime` int(11) NULL DEFAULT NULL COMMENT '更新时间',
  `wk_admin` int(10) NULL DEFAULT NULL COMMENT '管理员id',
  `wk_seo_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo标题',
  `wk_seo_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'seo关键词',
  `wk_seo_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'seo描述',
  PRIMARY KEY (`wk_id`, `wk_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '工长表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for dcxw_worksite
-- ----------------------------
DROP TABLE IF EXISTS `dcxw_worksite`;
CREATE TABLE `dcxw_worksite`  (
  `w_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '工地的id',
  `w_bid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '工地编号，生成规则同客户编号',
  `w_p_id` int(10) NULL DEFAULT NULL COMMENT '省份id  关联省份表',
  `w_c_id` int(10) NULL DEFAULT NULL COMMENT '城市id  关联城市表',
  `w_b_id` int(10) NULL DEFAULT NULL COMMENT '站点id  关联分站表',
  `w_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '工地标题',
  `w_keywords` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关键词 多个用逗号隔开',
  `w_descript` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '工地描述',
  `w_house_type` int(10) NULL DEFAULT NULL COMMENT '房屋户型  对应房屋户型id ',
  `w_des_style` int(10) NULL DEFAULT NULL COMMENT '装修风格  对应装修风格id',
  `w_des_level` int(10) NULL DEFAULT NULL COMMENT '装修品质  对应装修品质id',
  `w_house_area` int(10) NULL DEFAULT NULL COMMENT '房屋面积 （输入）',
  `w_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '工地地址',
  `w_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '工地坐标',
  `w_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '工地图片',
  `w_worker` int(10) NULL DEFAULT NULL COMMENT '工长id 关联工长表',
  `w_desinger` int(10) NULL DEFAULT NULL COMMENT '设计师id 关联设计师表',
  `w_view` int(10) NULL DEFAULT NULL COMMENT '工地浏览量',
  `w_step_one_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '阶段一，拆除工程 图片  多图逗号隔开',
  `w_step_one_des` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '阶段一 阶段描述',
  `w_step_two_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '阶段二，水电工程 图片  多图逗号隔开',
  `w_step_two_des` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '阶段二 阶段描述',
  `w_step_three_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '阶段三，瓦工工程 图片  多图逗号隔开',
  `w_step_three_des` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '阶段三 阶段描述',
  `w_step_four_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '阶段四，油工工程 图片  多图逗号隔开',
  `w_step_four_des` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '阶段四 阶段描述',
  `w_step_five_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '阶段五，木作安装 图片  多图逗号隔开',
  `w_step_five_des` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '阶段五 阶段描述',
  `w_step_six_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '阶段六，竣工保洁 图片  多图逗号隔开',
  `w_step_six_des` varchar(0) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '阶段六 阶段描述',
  `w_addtime` int(11) NULL DEFAULT NULL COMMENT '添加时间',
  `w_updatetime` int(10) NULL DEFAULT NULL COMMENT '更新时间',
  `w_admin` int(10) NULL DEFAULT NULL COMMENT '操作人id  对应管理员表',
  `w_isable` tinyint(2) NULL DEFAULT 1 COMMENT '是否显示 1 显示  2 隐藏',
  `w_istop` tinyint(2) NULL DEFAULT 2 COMMENT '是否置顶 1 置顶  2 常规',
  PRIMARY KEY (`w_id`, `w_bid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '在施工地表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dcxw_worksite
-- ----------------------------
INSERT INTO `dcxw_worksite` VALUES (1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 1, 2);

SET FOREIGN_KEY_CHECKS = 1;
