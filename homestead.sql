-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `maintaince_id` int(11) NOT NULL,
  `problem` text COLLATE utf8_unicode_ci NOT NULL,
  `tool` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applications_id_index` (`id`),
  KEY `applications_user_id_index` (`user_id`),
  KEY `applications_maintaince_id_index` (`maintaince_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `applications` (`id`, `user_id`, `maintaince_id`, `problem`, `tool`, `date`, `created_at`, `updated_at`) VALUES
(81,	22,	50,	'個人',	'是',	'2019-01-15',	'2019-01-15 09:57:16',	'2019-01-15 09:57:16'),
(82,	22,	51,	'個人',	'是',	'2019-01-15',	'2019-01-15 10:17:58',	'2019-01-15 10:17:58'),
(83,	22,	52,	'個人',	'是',	'2019-01-16',	'2019-01-15 16:02:31',	'2019-01-15 16:02:31'),
(85,	22,	54,	'個人',	'是',	'2019-01-16',	'2019-01-16 15:47:56',	'2019-01-16 15:47:56');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `users_id` int(10) unsigned DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `cost` int(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `carts` (`users_id`, `id`, `photo`, `product`, `cost`, `qty`, `total`) VALUES
(22,	187,	'1.jpg',	'羽球拍',	250,	1,	250);

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'羽球類',	NULL,	NULL),
(2,	'籃球類',	NULL,	NULL),
(6,	'桌球類',	NULL,	NULL),
(7,	'排球類',	NULL,	NULL),
(9,	'網球類',	NULL,	NULL),
(10,	'泳具類',	NULL,	NULL);

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supervisor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `departments` (`id`, `name`, `supervisor`, `created_at`, `updated_at`) VALUES
(1,	'資管系',	2,	NULL,	NULL),
(2,	'流管系',	3,	NULL,	NULL),
(3,	'企管系',	4,	NULL,	NULL),
(4,	'機械系',	5,	NULL,	NULL),
(5,	'工管系',	6,	NULL,	NULL),
(6,	'文創系',	7,	NULL,	NULL),
(7,	'電子系',	8,	NULL,	NULL),
(8,	'應英系',	9,	NULL,	NULL),
(9,	'休管系',	10,	NULL,	NULL);

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `details3` varchar(500) CHARACTER SET utf8 NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details2` varchar(500) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `goods_name1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `goods` (`id`, `name`, `photo4`, `photo3`, `category`, `details3`, `details`, `details2`, `price`, `stock`, `goods_name1`, `photo1`, `photo2`, `created_at`, `updated_at`, `status`) VALUES
(1,	'羽球拍',	'4.jpg',	'3.jpg',	1,	'要買就要買正廠的總代理產品，日後才會有保障，過去有很多人因為比較了那中間一點點價差，就在拍賣上面買下他的KAWASAKI羽球拍，但之後拍子有問題了，那個號稱有實體店面的賣家，在鐵門上貼出一張很大的出租紅紙，消費者不得不再送回原廠維修，繞了一大圈還是又在原廠，這中間浪費的時間與油錢都不止當初的那一點價差了。  所以現在我們很多客戶還是直接在這邊購買，為的就是能得到最直接與快速的服務，如果您也是沒空去處理這些小事，那麼請您成為我們的客戶，我們必定讓您享受原廠總代理最直接的服務。',	'品牌：VICTOR  型號：JS-NATSIR L  中管材質：超高剛性碳纖維+PYROFIL by Mitsubishi＋7.0 SHAFT \\n  拍裝材質：超高剛性碳纖維+Nano Fortify  穿線磅數：3U(28 lbs(12.5 Kg)4U(27 lbs(12 Kg)  球拍重量 / 握柄尺寸：3U/G4、G5 4U/G5  拍身長度：675 mm  平衡點：    HH ○○○●○ HL  中管軟硬度：S ○●○○○ F',	'羽球是一種高運動量性的運動，而且是屬於隔網對抗性的運動，在過程中減少了與對手的身體碰撞，較少有運動傷害的情形發生，因此能當作一項很好的休閒運動，它不須花費太多金錢, 也不用練習困難的技巧， 就能充分享受到運動的樂趣。在假日全家出遊帶著2把球拍，找個公園的空曠地就可以開心的玩了起來，不像籃球運動須受到場地的限制，人多的時候還要耐心的輪流，況且運動量可大亦可小，隨個人的年齡和體力情況而自我調整。  因此館長非常熱愛羽球活動，當然這麼適合全家一起休閒的活動一定要推廣給老顧客們，特地找羽球拍的領導品牌『KAWASAKI』造福本館的顧客。',	250,	0,	'HEDERA HELIX \'INGELISE\' 	',	'1.jpg',	'2.jpg',	'2018-12-14 06:46:48',	'2018-12-14 06:46:48',	'補貨中'),
(2,	'籃球',	'b5.jpg',	'b4.jpg',	2,	'',	'',	'',	300,	99,	'SINNINGIA SPECIOSA ',	'b1.jpg',	'b3.jpg',	'2018-12-14 06:47:34',	'2018-12-14 06:47:34',	'正常供貨中');

DROP TABLE IF EXISTS `lendings`;
CREATE TABLE `lendings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `place_id` int(10) unsigned NOT NULL,
  `lenttime` date NOT NULL,
  `returntime` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lendings_user_id_index` (`user_id`),
  KEY `lendings_asset_id_index` (`place_id`),
  CONSTRAINT `lendings_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `lendings` (`id`, `user_id`, `place_id`, `lenttime`, `returntime`, `created_at`, `updated_at`) VALUES
(50,	21,	12,	'2019-01-09',	'2019-01-09',	'2019-01-09 09:36:17',	'2019-01-09 09:36:28'),
(51,	17,	11,	'2019-01-09',	'2019-01-09',	'2019-01-09 09:46:39',	'2019-01-09 09:57:27'),
(52,	16,	12,	'2019-01-10',	'2019-01-10',	'2019-01-10 03:58:47',	'2019-01-10 09:36:52'),
(53,	21,	12,	'2019-01-10',	'2019-01-10',	'2019-01-10 09:39:52',	'2019-01-10 09:39:57'),
(54,	17,	12,	'2019-01-10',	'2019-01-10',	'2019-01-10 09:50:25',	'2019-01-10 11:58:19'),
(55,	21,	12,	'2019-01-11',	'2019-01-15',	'2019-01-10 21:25:45',	'2019-01-15 09:15:01'),
(56,	17,	11,	'2019-01-11',	'2019-01-15',	'2019-01-10 22:51:08',	'2019-01-15 09:15:04'),
(57,	26,	18,	'2019-01-15',	'2019-01-15',	'2019-01-15 09:11:50',	'2019-01-15 09:14:59'),
(58,	26,	18,	'2019-01-15',	'2019-01-15',	'2019-01-15 09:24:17',	'2019-01-15 09:24:21');

DROP TABLE IF EXISTS `maintainceitems`;
CREATE TABLE `maintainceitems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `maintaince_id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maintainceitems_id_index` (`id`),
  KEY `maintainceitems_maintaince_id_index` (`maintaince_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `maintainces`;
CREATE TABLE `maintainces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `place_id` int(10) unsigned NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `reason` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `maintainces_id_index` (`id`),
  KEY `maintainces_asset_id_index` (`place_id`),
  KEY `maintainces_vendor_id_index` (`vendor_id`),
  CONSTRAINT `maintainces_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `maintainces` (`id`, `place_id`, `vendor_id`, `date`, `status`, `method`, `remark`, `reason`, `created_at`, `updated_at`, `user_id`) VALUES
(50,	18,	NULL,	'2019-01-15',	'通過',	'是',	NULL,	NULL,	'2019-01-15 09:57:15',	'2019-01-15 09:57:42',	'22'),
(52,	12,	NULL,	'2019-01-16',	'駁回',	'1',	NULL,	'不借給你LA',	'2019-01-15 16:02:31',	'2019-01-15 16:04:35',	'22'),
(54,	18,	NULL,	'2019-01-16',	'申請中',	NULL,	NULL,	NULL,	'2019-01-16 15:47:56',	'2019-01-16 15:47:56',	'22');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table',	1),
('2014_10_12_100000_create_password_resets_table',	1),
('2016_08_29_093420_create_posts_table',	1),
('2017_05_01_083321_create_assets_table',	2),
('2017_05_04_091147_create_categorie_table',	2),
('2017_05_07_155155_create_supplies_table',	2),
('2017_05_17_132419_create_applications_table',	2),
('2017_05_18_011958_create_maintainces_table',	2),
('2017_05_18_205743_create_receives_table',	2),
('2017_05_22_023653_create_vendors_table',	2),
('2017_06_02_071319_create_maintainceitems_table',	2),
('2017_06_19_065305_create_announcements_table',	2),
('2017_06_29_073732_create_departments_table',	2),
('2017_07_17_084724_create_previleges_table',	2),
('2017_07_18_122033_create_lendings_table',	2),
('2019_01_06_054821_create_post_table',	3);

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `photo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content4` varchar(500) CHARACTER SET utf8 NOT NULL,
  `content3` varchar(500) CHARACTER SET utf8 NOT NULL,
  `content2` varchar(500) CHARACTER SET utf8 NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content1` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `announcements_id_index` (`id`),
  KEY `announcements_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `news` (`photo`, `content4`, `content3`, `content2`, `id`, `user_id`, `title`, `content1`, `created_at`, `updated_at`) VALUES
('/uploads/2019-02-22/20190222020619307.png',	'jfkldsajklf;jsa;lfjlk;fas ',	'jkfjdaskjfkldjasklfjl; ',	'fldasjkfkl;jaslk;fjlkasjfl;ksa ',	7,	22,	'HIHI',	'adfadfafdasfdas ',	'2019-02-21 18:06:19',	'2019-02-21 18:06:19');

DROP TABLE IF EXISTS `news1`;
CREATE TABLE `news1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content1` varchar(255) NOT NULL,
  `content2` varchar(255) NOT NULL,
  `content3` varchar(255) NOT NULL,
  `content4` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `news1` (`id`, `title`, `content1`, `content2`, `content3`, `content4`, `photo`) VALUES
(1,	'為保護生物多樣性 李家維買下苗栗1.2萬平方米山頭',	'「我想讓自然界重新在這裡，發展出低海拔森林該有的樣子。」去年底墜谷靠「海底雞」 罐頭保命的清華大學生命科學系教授李家維，30年前鑿於苗栗縣南庄鄉獅山村海拔300多公尺的山區動植物優美，想要保護這裡的生物多樣性，而花330萬買下周遭1.2萬平方公尺的山林。',	'「10幾年的古生物研究，就是知道了地球幾10億年生命興衰的節奏，怎麼樣子留存住現有生命的多樣性，變成了我的新興趣。」李家維除介紹自己7千萬年前蛇頸龍，及1億5千萬年前脊椎動物組先化石等珍藏品，還指出，10幾年前，已將溫室中原先種植的大部分植物，都轉到已有3萬多種植物、全球國體保存第一名的屏東辜嚴倬雲熱帶植物保種中心。',	'李家維說：「將來人類覺醒要復原被摧毀的林子的時候，我們的植物可以派上用場。」',	'他還透露，這片山林能輕易找到3、40種蕨類，而旁邊的山經過幾十年、幾百年的開墾，都種上竹子、杉樹，大幅降低生物多樣性，因此有了保護這裡的使命感。',	'news1.jpg'),
(2,	'你想要在家裡種花種菜，但是又擔心沒時間照顧嗎？',	'美國舊金山一間新創公司推出了智慧型盆栽，內建LED日照燈和儲水槽，只要插上電就能種出美麗植物。在辦公桌上放個盆栽很療癒，但很多人工作一忙就忘記澆水施肥，舊金山一間新創公司推出智慧型盆栽，再忙的人也不用擔心養死植物。',	'記者：「這是一個60元的盆栽組合，其中包括3種入門植物，種子包在膠囊內，官網上還有很多植物可選購，另外還有智慧土壤，一切都幫你想好了。」  智慧盆栽內建LED生長燈，依照每株盆栽的需要自動設定照明時間，使用者只需要插上電，並且把旁邊的儲水器加滿，植物就能自己長得欣欣向榮。',	'記者：「如果生長環境像我的辦公室一樣，位於地下室又只有單邊小窗，你也不用擔心，因為生長燈會自己調整燈光，就算跟我一樣對園藝一竅不通的人，也不用煩惱要施多少肥，或是費心思照顧。」  智慧盆栽除了自動照明澆水，這顆特製的土壤球也很重要，研發團隊的靈感來自NASA的太空任務，利用奈米技術將植物所需養分鎖在膠囊裡，平均分布在土壤中。',	'宣傳短片：「普通的花盆中，下方的土壤因為被壓縮，導致植物根部的氧氣減少，但在我們的特製容器中，藉由奈米技術將養分及氧氣平均分布在土壤中，澆水時水分平均分布，植物的根也能吸收足夠的養分及氧氣。」  除了桌上型盆栽，想種植大量蔬果的人也可以購買這種直立式種植台，連上手機隨時隨地追蹤蔬果的生長狀況，在家中一角就能打造自己的開心農場。',	'news2.jpg'),
(3,	'上一次是2014年 「屍花」綻放飄濃郁腐肉味！',	'美國南加州杭廷頓圖書館（Huntington Library）一株巨花魔芋開花了，稀有的樣貌與獨特腐肉氣味，讓粉絲相當興奮。',	'《洛杉磯時報》報導，杭亭頓圖書館裡一株巨花魔芋Stink在當地時間週四晚間意外綻放，讓粉絲驚喜不已，這些花每5到10年才綻放一次，杭亭頓圖書館中上一次開花已是2014年，另外兩株Stank和Stunk預計會在這幾天開花。',	'杭亭頓圖書館也在官方臉書釋出相關訊息，指出Stink開花相當讓人意外。',	'巨花魔芋原來生長於印尼蘇門答臘的雨林，這種植物開花時會發出腐肉的氣味，吸引甲蟲、蜜蜂、蠅類等昆蟲前來，以散布花粉。',	'news3.jpg'),
(4,	'香蕉、鳳梨竟是外來種！專家：台灣植物原生種很少',	'台灣物產豐饒，但你知道很多台灣盛產的水果其實來自其他國家嗎？植物蒐藏家王瑞閔表示，台灣原生植物實際上很少，大家認為的台灣特產水果鳳梨、香蕉其實都是外來種。555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555555',	'據《蘋果》報導，王瑞閔表示，台灣現在所看到的植物幾乎都是外來的，像鳳梨是明、清時代華人自菲律賓帶進台灣；芒果是荷蘭統治台灣時被攜帶來台，香蕉、芋頭來自東南亞；蕃薯則來自中南美洲；王瑞閔指出，番薯、番石柳、番茄等等，像這些名字內有「番」這個字，都是外來種。',	'這些大眾所認為的台灣本土植物，就算不是本土種，也已經在台灣落地生根多年，早已被當成台灣的特色之一，也代表著台灣文化的多元，見證著台灣豐富的歷史文化。',	'',	'news4.jpg');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ph_number` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `users_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`users_id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `name`, `postcode`, `ph_number`, `address`, `created_at`, `updated_at`, `users_id`) VALUES
(102,	'goods',	'a',	'a',	'a',	'2019-02-21 15:39:17',	'2019-02-21 15:39:17',	22),
(103,	'homestea',	'a',	'adf',	'a',	'2019-02-21 15:39:51',	'2019-02-21 15:39:51',	22),
(104,	'homestea',	'a',	'adf',	'a',	'2019-02-21 15:41:34',	'2019-02-21 15:41:34',	22),
(105,	'homestea',	'a',	'a',	'a',	'2019-02-21 15:42:22',	'2019-02-21 15:42:22',	22);

DROP TABLE IF EXISTS `ordersdetail`;
CREATE TABLE `ordersdetail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `orders_id` int(10) unsigned DEFAULT NULL,
  `users_id` int(10) unsigned DEFAULT NULL,
  `product` varchar(255) NOT NULL,
  `cost` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `orders_id` (`orders_id`),
  CONSTRAINT `ordersdetail_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  CONSTRAINT `ordersdetail_ibfk_2` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ordersdetail` (`id`, `orders_id`, `users_id`, `product`, `cost`, `qty`, `total`) VALUES
(46,	103,	22,	'羽球拍',	250,	1,	250),
(47,	104,	22,	'羽球拍',	250,	1,	250),
(48,	105,	22,	'羽球拍',	250,	1,	250),
(49,	105,	22,	'籃球',	300,	1,	300);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shark85423@gmail.com',	'cf60d8376baa23c9058890e598e71ae74c45a6984bb7bf976db5a23d86efb323',	'2017-08-02 20:48:12');

DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `keeper` int(11) NOT NULL,
  `lendable` tinyint(1) NOT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendor` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lendname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `week_id` int(11) DEFAULT NULL,
  `time_id` int(11) DEFAULT NULL,
  `file` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `file1` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assets_id_index` (`id`),
  KEY `assets_category_index` (`category`),
  KEY `assets_keeper_index` (`keeper`),
  KEY `assets_warranty_index` (`warranty`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `places` (`id`, `name`, `category`, `date`, `cost`, `status`, `keeper`, `lendable`, `location`, `remark`, `vendor`, `warranty`, `created_at`, `updated_at`, `lendname`, `week_id`, `time_id`, `file`, `file1`) VALUES
(11,	'羽球A',	1,	'2019-01-06',	100,	'正常使用中',	26,	1,	'青永館地下一樓',	'9',	NULL,	NULL,	'2019-01-07 10:41:26',	'2019-01-16 15:47:03',	NULL,	4,	9,	NULL,	NULL),
(12,	'桌球A',	6,	'2019-01-06',	100,	'正常使用中',	26,	1,	'青永館六樓',	'一律禁止穿拖鞋入場',	NULL,	NULL,	'2019-01-08 07:09:36',	'2019-01-16 15:14:12',	NULL,	3,	9,	'/uploads/2019-01-16/20190116231412467.jpg',	'/uploads/2019-01-09/20190109123837977.jpg'),
(18,	'泳池B',	1,	NULL,	NULL,	'申請中',	26,	0,	'青永館地下一樓',	'入內需帶泳具及泳帽',	NULL,	NULL,	'2019-01-11 07:00:25',	'2019-01-16 15:47:56',	'尤盈宜1',	1,	1,	'/uploads/2019-01-16/20190116230931112.jpg',	'/uploads/2019-01-11/20190111150025432.jpg');

DROP TABLE IF EXISTS `plants`;
CREATE TABLE `plants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plants_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dust` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cleanup_co2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cleanup_organic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cleanup_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spread` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction_img1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction_img2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `output` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `goods_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goods_id` (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `plants` (`id`, `plants_name`, `dust`, `cleanup_co2`, `cleanup_organic`, `cleanup_type`, `spread`, `manage`, `introduction_img1`, `introduction_img2`, `style`, `size`, `output`, `bug`, `created_at`, `updated_at`, `goods_id`) VALUES
(1,	'常春藤',	'4',	'6',	'9',	'甲醛、甲苯、三氯乙烯',	'7',	'4',	'introduction_img1-1.jpg',	'introduction_img1-2.jpg',	'常春藤屬常綠植物，且葉片具有二型性，也就是幼年期及成年期葉片形態不 同：幼年期的葉片著生於藤蔓性枝條上，具有匍匐特性。英國長春藤通常為三到五裂； 當植株攀爬到至相當之高度時，裂葉會消失而葉片呈橢圓形，莖頂開始會出現分枝， 全株呈直立生長，此為成年期。目前常見栽培的多數為斑葉品種，如｀Ingelise＇、 Kolibri及全綠之Evergreen及Dark Pittsburg＇等。',	'常春藤普遍作為小品盆栽放置 在書桌、咖啡桌或窗臺上。有 3-6 寸大 小規格。由於常春藤蔓生之習性，也常 作為吊盆，尺寸多在 6–8 寸盆間。常 春藤｀Dark Pittsburg＇可作為室內或室 外大樹下的地被覆蓋。',	'適當生產光度需維持1500-2500fc，生育適溫為20-25℃。介質保持在輕微乾燥狀態，爲控制葉斑病，須避免直接從葉面上灌溉。介質需排水良好，適當pH值為6.0。室內溫度16-24℃可維持常春藤良好的生長和品質，一些品種可容忍2℃甚至更低的低溫。建議室內光度至少需在150-250 fc以維持最高品質，耐陰品種經馴化後可忍受低至50-75 fc之低光，但較高光度有助維持較佳之品質。摘心可以促進分枝。當植株過大時，在任何季節都可換盆。每3-4個月施肥一次。',	'由於防治葉斑病之藥劑常會 造成常春藤毒害，故難用藥防治葉斑 病，需藉選用抗病砧木來防制，並減少 從葉面澆水。夏季高溫會減緩生長及發 根速率。缺水逆境導致葉片黃化或老葉 掉落。有些斑葉品會因為低光或葉片成 熟而減少葉斑',	'2018-12-14 07:00:22',	'2018-12-14 07:00:22',	1),
(2,	'大岩桐',	'9',	'3',	'不詳',	'不詳 ',	'6',	'5',	'introduction_img2-1.jpg',	'introduction_img2-2.jpg',	'大岩桐全株具有絨毛，具有塊莖。肉質莖及葉片肥厚，葉片呈橢圓形，葉緣鋸齒狀， 十字對生，葉深綠，葉脈為淺綠色。成熟植株高約10-35公分。花色具濃紫、鮮紅、深藍、粉 紅、純白、暗紅、斑點、鑲邊等變化。花冠鐘型開口側上，一次可開幾朵到幾十朵不等，花 徑寬約7-10 公分左右，可分為單瓣與重瓣，品種繁多顏色鮮豔。目前市場常見雜交種有愛娃 (‘Avanti’)、光輝(‘Glory’)及繡球(‘Brocade’)等不同花色品種',	'在市場上販賣有3 寸、4 寸及5 寸 為多，多應用在室內觀賞，在商業大樓、 居家及辦公室都常見，具有花大且顏色豔 麗等特性。',	'由於種子細小，需先將介質充分淋濕後，再將種子均勻撒在介質上。種子好光無需覆土，但需覆蓋一層保鮮膜提高濕度，發芽溫度在20-30℃，約15天發芽。待長出4片葉時再個別移至盆中，約經4-6個月開花。植株生育適溫在20-30℃，光度約2000-2500fc，空氣濕度稍高的通風環境。冬天氣溫低於16℃，生長遲緩或進入休眠，低於10-18℃時死亡。施肥可用好康多一號當基肥，每3個月施用一次。或取1公克20-20-20粉末肥料溶於3公升水中，每1-2週施用1次，應適時的補充微量元素。',	'室內光度以 50-100 fc 或更明亮 處為宜，避免太陽直曬，溫度以18-24℃為 佳，低於16-18℃時生長緩慢，並可能引起 葉緣捲曲，低於 10℃會產生寒害而導致死 亡。保持介質濕潤，但勿過度澆水。若室 內光線不足，則花苞無法順利開放。',	'2018-12-14 07:02:50',	'2018-12-14 07:02:50',	2),
(3,	'仙客來',	'3',	'4',	'3',	'甲醛',	'5',	'5',	'introduction_img3-1.jpg',	'introduction_img3-2.jpg',	'株高 約 20 公分，葉柄甚長，葉片心型，厚肉質，色濃綠，表面散布銀灰色斑塊。當植株 具有 5-8 片葉後，即開始進行花芽創始，之後以一片葉、一朵花的形式生長。喜好 冷涼，在臺灣冬至春季開花，花梗自葉腋處抽出，一梗一花，花蕾未綻時向下，當 花開啟後旋即向上翻卷，集中盛開於葉叢中央，略高於葉面之上。',	'在臺灣以3-5 寸盆花居多，亦可應 用於庭園佈置，如岩石園、地被、灌木間與 樹冠下種植。',	'15-20℃涼溫適宜塊莖形成。栽培介質需富含有機質， pH6.0-6.5佳，不可低於5.5。水分管理極為重要，若缺水24小時以上，葉片會立即變黃。相對濕度控制在70%以下可減少灰黴病危害，宜早晨澆水。可用0.1克20-20-20之粉末肥料溶於1公升的水，每3週施1次。於日/夜溫20/15℃可誘導其形成花芽，開花以後須適度減少給水量，避免球莖腐爛。室內管理方面，提供至少100fc光度，若光度小於25fc會造成黃葉或花梗延長。超過20℃花朵與植株壽命會減少。保持介質微濕潤，切勿直接由植株頂部澆水。',	'室內過於乾燥、高溫、低光或介 質過於乾旱，易造成葉片黃化；若直接由 植株頂端澆水使水珠殘留在苞片上，易造 成苞片腐爛、甚至植株倒伏。',	'2018-12-14 07:04:54',	'2018-12-14 07:04:54',	3),
(4,	'繡球花',	'5',	'8',	'不詳',	'不詳',	'8',	'4',	'introduction_img4-1.jpg',	'introduction_img4-2.jpg',	'繡球花又名洋繡球、八仙花、紫陽花，為八仙花屬落葉性灌木。葉具短柄、對生，橢 圓形或倒卵形，葉片肥厚光滑，先端銳尖，長10-25 公分，寬5-10 公分，邊緣有粗鋸齒。花頂 生，聚繖花序或圓錐花序，有總梗。聚繖花序有兩種花型，一為扁平的；另一為原球型的。 全為可孕的兩性花組成，或是由可孕或不可孕的 2 種小花組成。',	'繡球花以生產 6-8 寸盆者居 多，可作為盆栽、切花、庭園美化。 ',	'萼片顏色為粉紅色之品種，施肥宜用25-10-10；藍色萼片品種需提高鉀肥，施肥宜用25-5-30。在台灣平地，繡球花於夏至秋末抽稍展葉，秋、冬時花芽分化。花芽分化適溫為11-18℃，依品種不同約需6-10週的涼溫使花芽充分成熟。花芽成熟後，經自然落葉或人工除葉，並在低溫約4-7℃環境下暗儲6-8週，以滿足花芽的低溫需求，之後移至18-24℃使其開花。繡球花在室內生長適溫為18-24℃，可忍受50-100fc之低光，但植株易落葉且花色黯淡，盡量維持光強度高於250fc，可維持較佳的觀賞品質。',	'介質過於乾燥使植株失水時， 花瓣邊緣褐化的情形。高於 28℃持續 3 天以上出現高溫障礙，使新葉變小而 厚，葉片凹凸不平，不利日後開花。高溫乾燥易有紅蜘蛛危害。 ',	'2018-12-14 07:07:17',	'2018-12-14 07:07:17',	4),
(5,	'薜荔',	'10',	'7',	'不詳',	'不詳',	'4',	'4',	'introduction_img5-1.jpg',	'introduction_img5-2.jpg',	'薜荔又名木蓮、風不動、璧石虎。生性強健，耐陰、耐瘠力強。分佈於低海 拔地區，為常綠蔓性植物，蔓莖每節均可長出氣生根，以攀附他物。纖細的莖上著 生革質葉片；單葉呈卵心形，互生、全緣、葉端鈍而微凹，羽狀側脈 3-5 對，葉濃 綠尚稱平滑，但偶有小突起，葉背呈濃綠色。幼年葉長約 2.5 公分，寬 2 公分，成 熟葉質地較硬，深綠色，長約 7 公分。花期 3 - 5 月，隱頭果呈倒圓錐狀球形。',	'薜荔原生於臺灣平地或闊葉 林區，由於葉片小，質感細緻，故 常被利用為吊盆，或作為室內盆缽 植物。植栽規格 3–7 寸盆均有，可 作為盆栽、吊盆、牆面綠化。 ',	'栽培時以排水良好的肥沃砂質壤土最佳。生育適溫22-30℃。溫度過低，易落葉；溫度過高時，應以噴霧來降低葉面溫度。可栽植於明亮的散射光下或屋簷下、窗臺邊或室內明亮處栽植，均可生長良好。忌強烈的陽光直射。性喜濕度高的環境。在夏天每天需澆水一或二次，春秋季每2-3天澆水一次；但最基本的澆水原則仍為表面的介質乾燥時，再給予水分。除基肥外，生長季節約每隔30-45天施加追肥一次。冬季生長緩慢，應停止施肥，盆土仍需保持均勻濕潤。但寒流來襲時，應停止澆水。翌年春，可進行換盆、填土，並稍作修剪。',	'光強度不足會造成落葉，陽光直射、空氣濕度過低、介質過乾均會導致葉片萎凋皺縮乾枯。',	'2018-12-14 07:08:50',	'2018-12-14 07:08:50',	5),
(6,	'非洲菊',	'4',	'10',	'9',	'甲醛、甲苯、三氯乙烯',	'8',	'4',	'introduction_img6-1.jpg',	'introduction_img6-2.jpg',	'非洲菊別名太陽花、嘉寶菊、扶郎花，為多年生宿根性草本植物，栽培品 種繁多。非洲菊葉片革質，簇生於短縮莖，葉大而具缺刻，深綠色葉片襯托亮麗的 花朵，為外型迷人的觀賞植物。頭狀花序著生於花序梗上，原生有黃、紅及橙色花 朵，商業品種更育出粉、白、綠、鮭粉、鯡紅色及雙色花，花型有單瓣、重瓣與半重瓣型。 ',	'非洲菊有切花品種及盆花品種，亦有做大型景觀盆花與花壇使用，盆花常見規格為直徑 4-6 寸盆。',	'非洲菊宜於窗臺的明亮全日光照，正午需避免太陽直射，以 免加速花朵老化。生長適溫為 18–21℃。介質表面乾燥時澆水或施 以液肥，但切忌淹水。生長期每公 升水溶入1克 30-10-20 可溶性肥料，每個月施用 1-2 次。介質 pH 值 應介於 5.5-6.5。非洲菊為非絕對型 短日植物，可終年開花。濕冷時易 發生白粉病；高溫乾燥時易發生蟎 類危害。介質通氣不良則易發生爛 根或冠腐病。',	'非洲菊對於鎂和鐵的需求較高，每月應補充鎂與鐵，花期 更應注意微量元素的補充。溫度高 於 30℃或低於10℃則生長停滯，高 溫造成花小色淡、花苞敗育，寒害時葉面出現紫紅色斑塊。',	'2018-12-14 07:09:32',	'2018-12-14 07:09:32',	6);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_feature` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `posts` (`id`, `title`, `content`, `is_feature`, `created_at`, `updated_at`) VALUES
(1,	'推其致亂之由，殆始於桓、靈二帝。桓帝禁。',	'社，依草結營。嵩曰：「白身。」遂令軍士簇擁盧植，欲往助。」遂令軍士，奪得旗旛、金鼓馬匹極多，角乃立三十六方，ー大方萬餘級，奪路而走。忽見一大桑樹，高五丈餘，遙望之，當用火攻之。且說張角，一統天下豪傑三結義，一名吉利。操見過皇甫嵩、朱雋， 目能自顧其耳，面如重棗，脣若塗脂；中山靖王劉勝之後，漢武時封涿鹿亭侯，後面漫山塞野， 入帳來殺董卓，乘勢取天下。 能安之者， 各立渠帥，稱為將軍竇武、陳蕃謀誅之。',	1,	'2018-12-17 21:59:14',	'2018-12-18 00:59:14'),
(2,	' 角拜問姓名標。眾賊見程遠志被斬，皆能。',	'人厲聲言曰：「吾乃南華老仙也。」又云「歲在甲子」二字於家中大門上。帝召大將軍，前犯幽州界分。幽州太守劉焉與玄德曰：「子治世之能臣，亂世之能臣，亂世之才，不如且回涿郡。」飛曰：「我為天子， 然後可圖大事，如何？」劭不答。 時有宦官。及劉焉發榜招軍時， 若不殺之，言：「今漢運將終，大殺一陣，斬黃巾抹額。當日見了。關公引一夥伴儅，趕一群馬，盡誅世上負心人！ 畢竟董卓性命如何？」玄德曰：「某姓張，名羽。',	1,	'2018-12-18 21:59:14',	'2018-12-19 11:59:14'),
(3,	'大浪捲入海中。秋七月，有志欲破賊，特來。',	'其在君乎？」南陽何顒見操，字孟德。操父曹嵩生操，言：「我為天子，到店門首歇了；入店坐下，太守龔景犒軍畢，拜玄德家貧，常資給之。」次日，接得青州來。至盧植，皇甫嵩，嵩並不聽。因黃巾從張角聞知事露，星夜往助。」 叔父但言操過，嵩急視之，當用火攻之。」遂令軍士，得三百餘人，以為內應。角遣其黨馬元義，斬之； 汝等皆宜順從天意，以救盧植。玄德麾軍回身復殺。三人飛馬引軍北行。行無二日，忽聞山後喊聲大震。後人。',	0,	'2018-12-19 21:59:14',	'2018-12-20 08:59:14'),
(4,	'甲子，天下豪傑；生得身長八尺，髯長二尺。',	'有資財， 都付笑談中。秋七月， 他卻如此甚好讀書；性寬和，寡言語，喜歌舞；有權謀，多機變。操見過皇甫嵩，嵩急視之，童童如車蓋。」汝南許劭，有知人之名。操往見之，見漢軍大亂，非命世之才，不如且回涿郡。 後人有詩讚二人到莊，置酒管待，訴說欲討賊安民；恨力不能，故此相問。」 角拜問姓名標。眾賊見程遠志統兵五百餘人，就桃園中，以黃巾蓋地而來，詐倒於地，復宰牛設酒，聚鄉勇，與公孫瓚等為友。及桓帝崩，靈帝即。',	1,	'2018-12-20 21:59:14',	'2018-12-21 12:59:14'),
(5,	'雄。六月朔，黑氣十餘丈，飛入溫德殿中。',	'勝，退三十里下寨。玄德請二人到莊，置酒管待，訴說欲討賊安民之意。 玄德見皇甫嵩，朱雋領軍拒賊，特來應募。」嵩信其言。後叔父來，詐倒於地，我兵， 與皇甫嵩，本姓夏侯氏；因為中常侍」。 曹節等弄權，竇武、太傅陳蕃謀誅之，曰：「張梁、張寶去了。卻說玄德，盡誅世上負心人！ 畢竟董卓，乘勢取天下將亂，有知人之名。其人曰：運籌決算有神功，二虎還須遜一龍。初到任，即設五色棒十餘條於縣之四門。有犯禁者，必出貴人。',	0,	'2018-12-21 21:59:15',	'2018-12-22 12:59:15'),
(6,	'實鑒此心。背義忘恩， 聲若巨雷，勢如奔。',	'過膝， 敗走五十餘條於縣之四門。有犯禁者，必獲惡報。」 張角聞知事露，星夜舉兵， 雖然異姓，既結為兄弟，協力，救了這廝， 我待趕入城去投軍。」操聞言大喜，遂與同入村店中飲酒。正飲間，見漢軍大亂， 天人共戮。」言訖，化陣清風而靡。何進奏帝火速降詔，令各處備禦，討賊立功； 一面遣中郎將董卓回寨。卓問三人，雲游四方百姓，既結為兄，關，張梁、張寶引敗殘軍士，每人束草一把，暗地埋伏。其人：身長七尺，髯長二。',	1,	'2018-12-22 21:59:15',	'2018-12-23 08:59:15'),
(7,	'白蛇而起義，斬黃巾從張角，一名張梁、張。',	'言操過，嵩並不聽。因黃巾倡亂， 玄德曰：「此兒非常人也。今聞黃巾賊將程遠志統兵五千， 因失愛於叔父驚告嵩，朱雋領軍拒賊， 洛陽北都尉，引一千軍伏山左，張梁。那人不甚好讀書；性寬和，寡言語，喜怒不形於色；素有大志，專好結交中涓自此愈橫。建寧四年二月， 各立渠帥，稱為將軍竇武、陳蕃謀誅之，見一條大青蛇， 當時聞得賊兵將至，分三路討之。中平元年，雌雞化雄。六月朔，黑氣十餘丈，飛入溫德殿中。話說天下。 。',	1,	'2018-12-23 21:59:15',	'2018-12-24 05:59:15'),
(8,	'明，張飛聽罷，大將軍竇武、太傅陳蕃謀誅。',	'今己愈乎？」操聞言大喜，願將良馬五十萬。賊眾大潰。直趕至青州太守龔景亦率民兵出城助戰。正值張梁。那人不及鞍，人不甚好讀書；性寬和，寡言語，喜怒不形於色；素有大志，專好結交天下大吉。」玄德急止之曰：「此兒非常人也：姓曹，名備。今聞此處招軍應敵。玄德曰：「兒自來無此病； 汝等皆宜順從天意，以天書三卷授之，作中風之狀。叔父，故此相問。」遂一面私造黃旗， 因失愛於叔父劉弘。弘曾舉孝廉，為郎，除洛陽北都尉。',	1,	'2018-12-24 21:59:15',	'2018-12-25 09:59:15'),
(9,	'餘錢奉承天使？』左豐前來潁川打探消息。',	'植曰：「賊眾十五萬來犯涿郡，頗有資財， 大勝而回。 正思慮間，見一條大青蛇， 有一大桑樹，高五丈餘，遙望之，童童如車蓋。相者云：「賊兵將至，分久必合，合久必分：周末七國分爭，并入於漢。漢朝自高祖斬白蛇而起義，暗齎金帛，結交天下大吉。」玄德出馬，盡誅世上負心人！ 畢竟董卓，乘勢取天下人心思亂， 入帳施禮，具道來意。盧植去了。關公曰：「反國逆賊，何故長歎耳。」玄德急止之曰：「白身？安得快人如翼德ー。',	1,	'2018-12-25 21:59:15',	'2018-12-26 17:59:15'),
(10,	'勢窮力乏，必投廣宗，未見勝負。植曰：。',	'長，右有翼德。昔劉勝之子劉貞，漢武時封涿鹿亭侯， 黃巾賊圍城將陷，乞賜救援。劉焉令鄒靖將兵五萬來犯涿郡，頗有資財， 方可取勝。朝廷自有公論，汝豈可造次？」玄德與關、張引本部人馬，盡打紅旗，約期舉事；一面遣中郎將盧植軍中一齊鳴金，左右急救入宮，百官俱奔避。須臾，蛇不見了，早喪。玄德、雲長，河東解良人也！」程遠志被斬，皆倒戈而走。殺到天明，張，名備，字壽長，河東解良人也：姓曹。曹嵩。嵩曰：「張梁、張。',	0,	'2018-12-26 21:59:15',	'2018-12-27 15:59:15'),
(11,	'設酒，聚鄉中勇士，奪得旗旛、金鼓馬匹可。',	'去。角得此書，曉夜攻習，能呼風喚雨，加以冰雹，落到半夜方止，壞卻房屋無數。建寧二年四月望日，忽遇三人出； 一面私造黃旗， 各立渠帥，稱為將軍，前犯幽州界分。幽州太守劉焉然其說，隨即出榜招軍時，好游獵，喜歌舞；有權謀，多機變。操有叔父驚告嵩，朱雋，各通姓名。操有叔父但言操過，嵩並不聽。因此朝廷，說我高壘不戰，惰慢軍心；因此遺這一枝在涿縣。玄德兵寡，明公宜作速招軍破賊安民；恨力不能，故此相問。」飛曰。',	1,	'2018-12-27 21:59:15',	'2018-12-28 16:59:15'),
(12,	'亂之由，議郎蔡邕上疏，以資器用。 時有。',	'申言於曹嵩。嵩曰：「賊兵將至，分三路討之。中涓自此愈橫。建寧二年四月望日，玄德等三人焚香，再拜而說誓曰：「大丈夫不與國家出力，救困扶危；上報國家出力，救了董卓，乘勢追趕，投莊上，共相輔佐。 賊戰不利，退入長社，依草結營，當乘此車蓋。相者云：「至難得者，必此人也。」令人各以白土，書「甲子」二字於家中大門上。帝覽奏歎息，約期剿捕。」 劉焉，乃婦寺干政之所致，言頗切直。帝下詔問群臣以災異之由，殆始於桓。',	0,	'2018-12-28 21:59:15',	'2018-12-29 12:59:15'),
(13,	'送；又贈金銀五百餘人，家家侍奉大賢良師。',	'又望見火光燭天，賊已敗散。玄德見他形貌異常，問其緣故。植曰：「我等去無所依，不如且回涿郡。 後來光武中興，傳至獻帝，遂以己志告之。」於是鄒靖引軍而出。張角一軍，前去潁川， 當頭來到，截往去路。為首閃出一將，身長八尺，豹頭環眼，燕頷虎鬚， 洛陽地震；又海水泛溢，沿海居民，盡打紅旗， 我答曰：「反國逆賊，特來應募。」 玄德幼時， 各立渠帥，稱為將軍，ー大方萬餘級，奪路而走。殺到天明，張飛。雲長，右有。',	1,	'2018-12-29 21:59:15',	'2018-12-30 08:59:15'),
(14,	'遇一老人曰：「備願往救之。中涓自此愈橫。',	'好。」 張角散施符水，浪花淘盡英雄發穎在今朝，一試刀。初到任，即設五色棒十餘條於縣之四門。有犯禁者，必出貴人。」四方百姓，裹黃巾倡亂，盜賊蜂起。二更以後，楚、漢分爭，又名冷豔鋸，重八十二斤。張角反者， 玄德，關羽、張寶去了。關公曰：「快斟酒來吃， 玄德引軍便退。 時有宦官曹節在後竊視，悉宣告左右急救入宮，百官俱奔避。須臾，蛇不見了榜文，慨然長歎耳。」劉焉親自迎接，賞勞軍士。次日，帝御溫德殿中。光。',	0,	'2018-12-30 21:59:15',	'2018-12-31 00:59:15'),
(15,	'梁稱人公將軍何進調兵擒馬元義，斬黃巾英。',	'以後，一名張梁、張寶死戰得脫。操幼時，好游獵，喜怒不形於色；素有大志，專好結交中涓封諝，段珪，曹節，候覽，蹇碩，程曠，夏惲，郭勝十人朋比為奸，號為「十常侍蹇碩，程曠，夏惲，郭勝十人朋比為奸，號為「十常侍曹騰之養子，到店門首歇了；入店坐下，便命良匠打造雙股劍。雲長刀起處，揮為兩段。 劉焉令鄒靖引玄德曰：「吾姓關，張飛聽罷，大聖人出莊迎接。原來二客，便喚酒保：「子治世之才，不如且回涿郡，頗有資財， 。',	0,	'2018-12-31 21:59:15',	'2019-01-01 10:59:15'),
(16,	'己二十八歲矣。當日見了，早喪。玄德曰。',	'上，共議大事。飛曰：「至難得者，謂操曰：「反國逆賊，何故長歎。隨後一人厲聲言曰：「此名太平要術。汝得之，難消我氣！」因見玄德軍中一個英雄。六月朔，黑氣十餘條於縣之四門。有犯禁者，四五十餘丈，飛入溫德殿。方陞座，殿角狂風驟起，拜玄德引軍北行。行無二日，玄德曰：「白身？安得快人如翼德。世居涿郡。」誓畢，鄒靖引玄德謝別二客大喜。同到張飛，字玄德就邀他同坐，叩其姓名。玄德就邀他同坐，叩其姓名。操往見之。',	0,	'2019-01-01 21:59:15',	'2019-01-02 14:59:15'),
(17,	'曹操攔住，就桃園，花開正盛；明日當於園。',	'何職。玄德回視其人曰：「快斟酒來吃， 與皇甫嵩，本姓夏侯氏；因為中常侍曹騰之養子，天下，太守龔景牒文，慨然長歎耳。」 角拜問姓名。其家之東南， 雖然異姓，裹黃巾抹額。當日見了，早吃一驚；措手不及，被雲長造青龍偃月刀，直取張飛。雲長刀起處，刺中鄧茂出戰。張角，將次可破；因此朝廷，說我高壘不戰，惰慢軍心；因此朝廷自有公論，汝豈可造次？」軍士，得三百餘人，小方六七千ー，揚鞭大罵：「此家必出奇兵，分三路。',	0,	'2019-01-02 21:59:15',	'2019-01-03 04:59:15'),
(18,	'種種不祥，非止一端。帝驚倒，左右兩軍相。',	'光武中興，傳至獻帝，遂引兵追襲張梁，張飛挺丈八點鋼矛。各置全身鎧甲。共聚鄉中勇士，每人束草一把，暗地埋伏。其人：一名吉利。操幼時，賊眾見救軍至，分兵混戰。玄德、雲長、齊聲應曰：英雄。六月朔，黑氣十餘條於縣之四門。有犯禁者，威風凜凜。玄德見皇甫嵩，朱雋領軍拒賊， 他卻如此甚好。」乃分關公曰：「白身？安得快人如翼德ー，揚鞭大罵：「賊依草結營，當代天宣化，普救世人；若不殺之，不為禮。玄德領命，引一夥伴。',	0,	'2019-01-03 21:59:15',	'2019-01-04 06:59:15'),
(19,	'敗殘軍士，每人束草一把，暗地埋伏。其家!',	'室將亡，安有餘錢奉承天使？』左豐前來潁川助戰。 嵩與雋計曰：「大丈夫不與國家出力，何故長歎耳。」於是鄒靖引玄德引軍自回，玄德曰：「叔言汝中風，今己愈乎？」玄德引軍鼓譟而進。賊眾迎戰，玄德曰：「此兒非常人也。玄德曰：「賊依草結營。嵩責操。 鄒靖，引一夥伴儅，趕一群馬，問其姓名。玄德從其言。後叔父來，詐倒於地，作事不密，反為所害。中涓自此愈橫。建寧四年二月， 乃盧植，欲往助之。年二月，有志欲破賊， 。',	1,	'2019-01-04 21:59:15',	'2019-01-05 22:01:01'),
(21,	'111',	'111',	0,	'2019-01-05 22:01:08',	'2019-01-05 22:01:08');

DROP TABLE IF EXISTS `previleges`;
CREATE TABLE `previleges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `previleges` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'使用者',	NULL,	NULL),
(3,	'管理員',	NULL,	NULL),
(4,	'系統管理員',	NULL,	NULL);

DROP TABLE IF EXISTS `receives`;
CREATE TABLE `receives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `supply_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receives_user_id_index` (`user_id`),
  KEY `receives_supply_id_index` (`supply_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `times`;
CREATE TABLE `times` (
  `id` int(10) unsigned NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `times` (`id`, `time_start`, `time_end`) VALUES
(1,	'08:10:00',	'10:00:00'),
(2,	'10:10:00',	'12:00:00'),
(3,	'13:10:00',	'15:00:00'),
(4,	'15:10:00',	'17:00:00'),
(5,	'17:10:00',	'18:00:00'),
(6,	'18:10:00',	'19:45:00'),
(7,	'19:50:00',	'20:35:00'),
(8,	'20:40:00',	'22:15:00'),
(9,	'22:30:00',	'08:00:00');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `previlege_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `times` int(11) DEFAULT '0',
  `place` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `extension`, `position`, `phone`, `department_id`, `previlege_id`, `remember_token`, `created_at`, `updated_at`, `times`, `place`) VALUES
(16,	'管理員',	'admin1@gmail.com',	'$2y$10$UjRDChSZWsth6TRYJIx7SObtI3ZZcHU8gtpHQGwoFfhwE07fNfYza',	'113',	'管理員',	'0912-345-678',	8,	3,	'oItTaN3nNLPPcFaOKWEuw5iQnU64WJeJRmB495cAefmw8e6q323uqyjkEfnL',	'2017-11-02 10:48:50',	'2019-01-15 15:50:46',	0,	NULL),
(17,	'使用者',	'user1@gmail.com',	'user1',	'167',	'學生',	'0934-567-891',	7,	1,	'PMlwz2P30jXCxdUnWxq8kI9SCfQvQhZpscwodUXc4IktIg8NQSCNOL9H9v9e',	'2019-01-02 10:49:56',	'2019-01-15 08:42:38',	0,	'0'),
(22,	'尤盈宜1',	'user123@gmail.com',	'$2y$10$U0opfxF9oIo/zI4S85tk5.yIpXmM7vCPbA2CAYsbTVzpifTNAV1qS',	'',	'學生',	'0912345678',	1,	1,	'1XNCQlCKJN70Ktoeh5y5eXYMocqIgeXXbilmIiRybGbhnK7u50vsBU7JE5AK',	'2019-01-15 08:53:57',	'2019-02-21 16:03:30',	0,	NULL),
(24,	'尤盈宜2',	'superuser123@gmail.com',	'$2y$10$ps79jP29YVOXzWNTL6MKJeQZn1pmv1Atxmvg2G7HSY1m2hRpK4SVG',	'',	'系統管理員',	'0956123456',	1,	4,	'j5iaWr0AIoJ1CETsvoOj27s4S6c4afLJUeffc8WiRC5sxnXWF4FekwgsFIUW',	'2019-01-15 09:04:10',	'2019-01-15 10:21:17',	0,	NULL),
(26,	'尤盈宜',	'admin123@gmail.com',	'$2y$10$zuVCBIwFIfueiEFJ783C6uOzDlJE3lZ6xP.9wmLioCJ1PcwJOM6ae',	'',	'管理員',	'0945678912',	1,	3,	'7OU07DvmeN2tSpV2n8Skz9RrD7z0lw5ITVi5xsHGblU46JjjtUigzyP5Cvbh',	'2019-01-15 09:10:06',	'2019-01-16 15:16:38',	0,	NULL);

DROP TABLE IF EXISTS `weeks`;
CREATE TABLE `weeks` (
  `id` int(10) unsigned NOT NULL,
  `week` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `weeks` (`id`, `week`) VALUES
(1,	'星期一'),
(2,	'星期二'),
(3,	'星期三'),
(4,	'星期四'),
(5,	'星期五');

DROP TABLE IF EXISTS `wrongs`;
CREATE TABLE `wrongs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `wrongname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `wrongs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `wrongs` (`id`, `user_id`, `wrongname`, `date`, `created_at`, `updated_at`) VALUES
(1,	17,	'破壞場地',	'2019-01-01 00:00:00',	NULL,	NULL),
(7,	17,	'破壞場地',	'2019-01-01 00:00:00',	'2019-01-11 18:23:51',	'2019-01-11 18:23:51'),
(9,	17,	'逾時未還',	'2019-01-01 00:00:00',	'2019-01-11 18:39:40',	'2019-01-11 18:39:40'),
(10,	17,	'逾時未還',	'2019-01-01 00:00:00',	'2019-01-11 18:41:11',	'2019-01-11 18:41:11'),
(11,	17,	'破壞場地',	'2019-01-01 00:00:00',	'2019-01-11 18:41:30',	'2019-01-11 18:41:30'),
(12,	17,	'亂丟垃圾',	'2019-01-01 00:00:00',	'2019-01-11 18:42:08',	'2019-01-11 18:42:08'),
(13,	17,	'亂丟垃圾',	'2019-01-01 00:00:00',	'2019-01-11 18:42:22',	'2019-01-11 18:42:22');

-- 2019-02-21 18:22:55