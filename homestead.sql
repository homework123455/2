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
(1,	'羽球場',	NULL,	NULL),
(2,	'健身房',	NULL,	NULL),
(6,	'桌球室',	NULL,	NULL),
(7,	'撞球室',	NULL,	NULL),
(9,	'網球場',	NULL,	NULL),
(10,	'游泳池',	NULL,	NULL),
(11,	'其他',	NULL,	NULL);

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
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `announcements_id_index` (`id`),
  KEY `announcements_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `news` (`id`, `user_id`, `title`, `content`, `date`, `created_at`, `updated_at`) VALUES
(5,	16,	'羽球場暫停開放一天',	' 羽球場暫停開放一天',	'2019-01-15',	'2019-01-15 09:09:28',	'2019-01-15 09:09:28');

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
(22,	'尤盈宜1',	'user123@gmail.com',	'$2y$10$U0opfxF9oIo/zI4S85tk5.yIpXmM7vCPbA2CAYsbTVzpifTNAV1qS',	'',	'學生',	'0912345678',	1,	1,	'BAEAcFJuN4pMYl1fBRybdwSTw1DpYG9p6WsOrSq3cbkXGcoSyVnWMHhRybRK',	'2019-01-15 08:53:57',	'2019-01-16 15:11:10',	0,	NULL),
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

-- 2019-01-16 15:50:08
