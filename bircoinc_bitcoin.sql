-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2020 at 11:03 PM
-- Server version: 5.6.41
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bircoinc_bitcoin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `login_time` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `mobile`, `image`, `status`, `login_time`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '0123456789', 'admin_1531922370.jpg', 1, '2018-05-04 14:36:07', '$2y$10$NH6c3meHWlLRtLlz1ybAo.HQXTv4aAYBPn0PLRwYDYDhn0sGbz5hu', '47xcbHWVKhRUBPO6e328CkBck8Ixze3c20cAe1ViqylGVkWPOxBhhj5wCUO5', '2018-03-26 06:08:23', '2020-02-02 18:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertise_deals`
--

CREATE TABLE `advertise_deals` (
  `id` int(10) UNSIGNED NOT NULL,
  `add_type` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `trans_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usd_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coin_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `addvertises_id` int(11) NOT NULL,
  `cancell_reason` text COLLATE utf8mb4_unicode_ci,
  `from_user_send` tinyint(1) DEFAULT '0',
  `to_user_send` int(11) NOT NULL DEFAULT '0',
  `comp_state` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertise_deals`
--

INSERT INTO `advertise_deals` (`id`, `add_type`, `to_user_id`, `from_user_id`, `trans_id`, `amount_to`, `usd_amount`, `coin_amount`, `status`, `gateway_id`, `method_id`, `currency_id`, `price`, `term_detail`, `payment_detail`, `created_at`, `updated_at`, `addvertises_id`, `cancell_reason`, `from_user_send`, `to_user_send`, `comp_state`) VALUES
(35, 1, 52, 51, '195823', '2', '1', '3', 2, 505, 1, 1, '3', 'sell', 'sell', '2020-05-04 12:13:52', '2020-05-04 12:16:48', 53, 'I am not currently trading', 0, 0, 1),
(36, 1, 53, 54, '670843', '0.00067', '1', '0', 1, 505, 1, 2, '0', 'I want to sell bitcoin', 'I want to sell bitcoin by PayPal', '2020-05-04 13:01:37', '2020-05-04 13:21:34', 54, NULL, 0, 1, 0),
(37, 1, 51, 52, '352066', '0.4', '1', '0.5', 1, 505, 1, 1, '0.5', 'س', 'س', '2020-05-04 13:09:51', '2020-05-04 13:10:59', 50, NULL, 0, 0, 0),
(38, 1, 54, 53, '844300', '0.00007', '1', '0', 1, 505, 1, 1, '0', 'wfWEFEW', 'ghtyewf', '2020-05-04 13:17:41', '2020-05-04 13:18:42', 55, NULL, 0, 0, 0),
(39, 1, 51, 54, '654798', '0.19', '1', '0.2', 2, 505, 1, 1, '0.2', 'sell', 'sell', '2020-05-10 10:56:25', '2020-05-10 13:39:13', 51, 'I did not agree with the buyer', 0, 0, 0),
(40, 1, 51, 52, '494811', '0.01', '1', '0.2', 2, 505, 1, 1, '0.2', 'sell', 'sell', '2020-05-10 11:00:03', '2020-05-10 13:39:24', 51, 'I did not agree with the buyer', 0, 0, 0),
(41, 1, 54, 53, '733185', '0.0003', '1', '0', 2, 505, 6, 1, '0', 'grfaewgreag', 'egteagg', '2020-05-10 12:41:39', '2020-05-10 12:46:38', 57, 'I am not currently trading', 0, 0, 0),
(42, 1, 54, 53, '800144', '0.00031', '1', '0', 1, 505, 6, 1, '0', 'grfaewgreag', 'egteagg', '2020-05-10 12:47:59', '2020-05-10 12:56:23', 57, NULL, 0, 0, 0),
(43, 1, 51, 52, '918332', '0.2', '1', '0.2', 2, 505, 1, 1, '0.2', 'sell', 'sell', '2020-05-10 13:58:36', '2020-05-10 14:00:15', 51, 'I did not agree with the buyer', 0, 0, 0),
(44, 1, 51, 52, '556353', '0.19', '1', '0.2', 2, 505, 1, 1, '0.2', 'sell', 'sell', '2020-05-10 14:00:43', '2020-05-10 14:01:22', 51, 'I stopped selling', 0, 0, 0),
(45, 1, 51, 52, '258479', '0.17', '1', '0.2', 2, 505, 1, 1, '0.2', 'sell', 'sell', '2020-05-10 14:02:23', '2020-05-10 14:04:58', 51, 'I am not currently trading', 0, 0, 0),
(46, 1, 51, 52, '796026', '0.155', '1', '0.2', 2, 505, 1, 1, '0.2', 'sell', 'sell', '2020-05-10 14:05:22', '2020-05-10 14:07:59', 51, 'I am not currently trading', 0, 0, 0),
(47, 1, 54, 53, '963819', '0.000008', '1', '0', 1, 505, 9, 1, '0', 'wdfefgrdg', 'rghgad\\frthtag', '2020-05-14 11:00:09', '2020-05-14 11:04:34', 58, NULL, 0, 0, 0),
(48, 1, 53, 54, '675423', '0.0003', '1', '0', 1, 505, 13, 2, '0', 'Hello', 'Hello', '2020-05-14 11:08:13', '2020-05-14 11:13:10', 59, NULL, 0, 0, 0),
(49, 1, 54, 53, '107640', '0.0002988342', '1', '0', 2, 505, 11, 3, '0', 'fore sell', 'for sell', '2020-05-14 18:39:27', '2020-05-14 19:13:45', 60, 'I stopped selling', 0, 0, 0),
(50, 1, 54, 53, '193555', '0.0002988342', '1', '0', 1, 505, 11, 3, '0', 'fore sell', 'for sell', '2020-05-14 19:25:22', '2020-05-14 19:27:42', 60, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `basic_settings`
--

CREATE TABLE `basic_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usd_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_sym` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration` tinyint(1) NOT NULL DEFAULT '0',
  `email_verification` tinyint(1) NOT NULL DEFAULT '0',
  `sms_verification` tinyint(1) NOT NULL DEFAULT '0',
  `email_notification` tinyint(1) NOT NULL DEFAULT '0',
  `sms_notification` tinyint(4) NOT NULL DEFAULT '0',
  `withdraw_status` tinyint(1) NOT NULL DEFAULT '0',
  `withdraw_charge` double DEFAULT '0',
  `captcha` tinyint(4) NOT NULL DEFAULT '0',
  `decimal` int(2) NOT NULL,
  `refcom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `about` blob NOT NULL,
  `policy` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_map` text COLLATE utf8mb4_unicode_ci,
  `terms` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_comment` text COLLATE utf8mb4_unicode_ci,
  `trx_charge` double NOT NULL,
  `banner_title` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_sub_title` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_settings`
--

INSERT INTO `basic_settings` (`id`, `sitename`, `color`, `phone`, `email`, `address`, `currency`, `usd_rate`, `currency_sym`, `registration`, `email_verification`, `sms_verification`, `email_notification`, `sms_notification`, `withdraw_status`, `withdraw_charge`, `captcha`, `decimal`, `refcom`, `about`, `policy`, `google_map`, `terms`, `copyright`, `fb_comment`, `trx_charge`, `banner_title`, `banner_sub_title`, `created_at`, `updated_at`) VALUES
(1, 'BirCoin', 'ffffff', '+905526752038', 'support@bircoin.co', 'Selenium Panorama\r\nGayrettepe, Hoşsohbet Sokaği No:13, 34349 Beşiktaş/İstanbul, Turkey', 'BDT', '84.21', 'Tk', 1, 1, 1, 1, 1, 0, 12, 0, 8, '0', 0x3c70207374796c653d226d617267696e2d626f74746f6d3a20313570783b2070616464696e673a203070783b20746578742d616c69676e3a206a7573746966793b20636f6c6f723a2072676228302c20302c2030293b20666f6e742d66616d696c793a202671756f743b4f70656e2053616e732671756f743b2c20417269616c2c2073616e732d73657269663b223e49742069732061206c6f6e672065737461626c6973686564206661637420746861742061207265616465722077696c6c206265206469737472616374656420627920746865207265616461626c6520636f6e74656e74206f6620612070616765207768656e206c6f6f6b696e6720617420697473206c61796f75742e2054686520706f696e74206f66207573696e67204c6f72656d20497073756d2069732074686174206974206861732061206d6f72652d6f722d6c657373206e6f726d616c20646973747269627574696f6e206f66206c6574746572732c206173206f70706f73656420746f207573696e672027436f6e74656e7420686572652c20636f6e74656e742068657265272c206d616b696e67206974206c6f6f6b206c696b65207265616461626c6520456e676c6973682e204d616e79206465736b746f70207075626c697368696e67207061636b6167657320616e6420776562207061676520656469746f7273206e6f7720757365204c6f72656d20497073756d2061732074686569722064656661756c74206d6f64656c20746578742c20616e6420612073656172636820666f7220276c6f72656d20697073756d272077696c6c20756e636f766572206d616e7920776562207369746573207374696c6c20696e20746865697220696e66616e63792e20566172696f75732076657273696f6e7320686176652065766f6c766564206f766572207468652079656172732c20736f6d6574696d6573206279206163636964656e742c20736f6d6574696d6573206f6e20707572706f73652028696e6a65637465642068756d6f757220616e6420746865206c696b65293c2f703e3c6469763e3c62723e3c2f6469763e, '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga vel \r\nlaudantium, itaque repellendus fugiat nostrum, nulla libero aliquam, \r\nducimus aut quisquam. Minus quod aperiam blanditiis explicabo commodi \r\nperspiciatis aut facere, voluptatum ad sit. Expedita totam dignissimos \r\nadipisci alias reprehenderit nam culpa soluta cum veniam et aut odio \r\nexcepturi perferendis maiores possimus impedit officia hic incidunt \r\nquas, quidem ea sint tempore accusamus magni. Quidem sunt placeat, \r\ndolorem iure dicta asperiores accusantium quaerat cum veritatis. Facilis\r\n numquam laboriosam delectus sit quam et deleniti, blanditiis itaque \r\nullam nobis!!!</div><div><br></div><div><br></div><div>earum laborum \r\niste, eum. Qui nihil quod, praesentium minima dolorum deleniti \r\nrepudiandae officia corrupti perspiciatis earum distinctio, omnis \r\nfacilis, quibusdam eligendi minus delectus id? Ex voluptate fuga \r\nquibusdam, molestiae quam, iste cum, non sed veritatis alias eveniet. \r\nDolore deleniti natus officiis voluptatibus animi vel sapiente recusand</div><div><br></div><div align=\"center\">ae\r\n porro debitis illum aliquam, expedita! Debitis alias, fugit nostrum \r\nexpedita. Ea architecto libero et, nobis nulla accusamus sequi eveniet \r\nut eius adipisci sit commodi qui eaque voluptatum culpa doloremque atque\r\n vitae pariatur recusandae labore illum aspernatur corrupti. Fugiat \r\nratione sequi minima iure, debitis corrupti at amet enim voluptatem, \r\nrepellat vel perferendis. Perspiciatis animi, natus tempore alias \r\nsimilique quod vero a, impedit ratione quae nisi laborum, eos rerum \r\nerror esse repellendus suscipit cupiditate totam magni accusantium \r\ndicta, explicabo? Omnis vero quisquam blanditiis, amet numquam optio cu</div><div><br></div><div><b>lpa, commodi ea, aspernatur qui accusamus unde.</b></div><div><br></div><ul><li> Repellat laboriosam aspernatur fugiat, quisquam tempore</li><li> nulla tempora dicta animi aliquid ab repelle</li><li>ndus dolore, deserunt, accusamus cumque volupta</li><li>tibus magni corrupti quod. Consequuntur rem deserunt eaque </li><li>enim fuga perferendis iste voluptate sequi. </li><li>Necessitatibus accusamus, omnis hic rerum possim</li><li>us doloremque recusandae soluta quaerat explicab</li></ul><div><br></div><div><br></div><div>o\r\n dolore laboriosam, natus molestias, dicta ad excepturi? Amet non est at\r\n ex, quidem, facere deserunt corrupti, suscipit reprehenderit dolor a \r\nminus animi laboriosam atque nesciunt fuga perspiciatis accusamus \r\nconsectetur ullam. Molestias reprehenderit non quidem magnam, culpa qui \r\nsimilique illum distinctio assumenda aliquid odit molestiae obcaecati \r\nexcepturi, nostrum placeat consequuntur vitae. Inventore nobis harum \r\nsunt doloremque facilis, a est ab reprehenderit aut rem ipsam similique \r\nplaceat error modi non suscipit, accusantium voluptas iste odio minus. \r\nQuis dolore nam inventore delectus molestias facere earum. Neque ullam, \r\nimpedit quasi mollitia voluptate, cupiditate vel aut provident quos \r\nveritatis consequatur quisquam ducimus cum. Consectetur eos perspiciatis\r\n obcaecati earum. Labore, ipsam, cum. Nostrum quia blanditiis a, \r\nrecusandae iste. Incidunt labo</div><div><br></div><div>re autem qui \r\nveritatis explicabo est harum laborum. Mollitia ullam unde harum, ut \r\nipsum doloremque nisi culpa repudiandae eveniet quo fuga laudantium, \r\nfacilis deleniti, nobis laborum. Qui animi temporibus eveniet, sint quod\r\n neque omnis nihil adipisci quam corporis esse velit, aliquam nisi a \r\nfacilis ipsa voluptatibus magnam nulla! Illum obcaecati vel, facere. Est\r\n quisquam aspernatur, qui dolorum nihil aut excepturi consequuntur quod \r\nsoluta suscipit cupiditate veritatis. Fugiat culpa saepe eligendi \r\narchitecto hic alias ex incidunt. Iure ipsa repellat ex! Totam earum, \r\nquod quibusdam nisi hic, placeat nobis et eveniet fugiat consectetur \r\nrecusandae, magni ea asperiores dolor saepe, aliquam sed. Voluptate \r\nperspiciatis, error consequuntur animi nobis totam omnis et officia, \r\ndistinctio culpa voluptas suscipit possimus dignissimos hic ea fugiat \r\nvoluptatibus fuga adipisci sit iure?</div><br><br>', '<iframe width=\"600\" height=\"352\" id=\"gmap_canvas\" src=\"https://maps.google.com/maps?q=Gayrettepe%2C%20Selenium%20Panorama%2C%20Ho%C5%9Fsohbet%20Soka%C4%9Fi%20No%3A13%2C%2034349%20Be%C5%9Fikta%C5%9F%2F%C4%B0stanbul%2C%20Turkey&t=&z=13&ie=UTF8&iwloc=&output=embed\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\"></iframe>', '<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga vel laudantium, itaque repellendus fugiat nostrum, nulla libero aliquam, ducimus aut quisquam. Minus quod aperiam blanditiis explicabo commodi perspiciatis aut facere, voluptatum ad sit. Expedita totam dignissimos adipisci alias reprehenderit nam culpa soluta cum veniam et aut odio excepturi perferendis maiores possimus impedit officia hic incidunt quas, quidem ea sint tempore accusamus magni. Quidem sunt placeat, dolorem iure dicta asperiores accusantium quaerat cum veritatis. Facilis numquam laboriosam delectus sit quam et deleniti, blanditiis itaque ullam nobis!!!</div><div><br></div><div><br></div><div>earum laborum iste, eum. Qui nihil quod, praesentium minima dolorum deleniti repudiandae officia corrupti perspiciatis earum distinctio, omnis facilis, quibusdam eligendi minus delectus id? Ex voluptate fuga quibusdam, molestiae quam, iste cum, non sed veritatis alias eveniet. Dolore deleniti natus officiis voluptatibus animi vel sapiente recusand</div><div><br></div><div align=\"center\">ae porro debitis illum aliquam, expedita! Debitis alias, fugit nostrum expedita. Ea architecto libero et, nobis nulla accusamus sequi eveniet ut eius adipisci sit commodi qui eaque voluptatum culpa doloremque atque vitae pariatur recusandae labore illum aspernatur corrupti. Fugiat ratione sequi minima iure, debitis corrupti at amet enim voluptatem, repellat vel perferendis. Perspiciatis animi, natus tempore alias similique quod vero a, impedit ratione quae nisi laborum, eos rerum error esse repellendus suscipit cupiditate totam magni accusantium dicta, explicabo? Omnis vero quisquam blanditiis, amet numquam optio cu</div><div><br></div><div><b>lpa, commodi ea, aspernatur qui accusamus unde.</b></div><div><br></div><ul><li> Repellat laboriosam aspernatur fugiat, quisquam tempore</li><li> nulla tempora dicta animi aliquid ab repelle</li><li>ndus dolore, deserunt, accusamus cumque volupta</li><li>tibus magni corrupti quod. Consequuntur rem deserunt eaque </li><li>enim fuga perferendis iste voluptate sequi. </li><li>Necessitatibus accusamus, omnis hic rerum possim</li><li>us doloremque recusandae soluta quaerat explicab</li></ul><div><br></div><div><br></div><div>o dolore laboriosam, natus molestias, dicta ad excepturi? Amet non est at ex, quidem, facere deserunt corrupti, suscipit reprehenderit dolor a minus animi laboriosam atque nesciunt fuga perspiciatis accusamus consectetur ullam. Molestias reprehenderit non quidem magnam, culpa qui similique illum distinctio assumenda aliquid odit molestiae obcaecati excepturi, nostrum placeat consequuntur vitae. Inventore nobis harum sunt doloremque facilis, a est ab reprehenderit aut rem ipsam similique placeat error modi non suscipit, accusantium voluptas iste odio minus. Quis dolore nam inventore delectus molestias facere earum. Neque ullam, impedit quasi mollitia voluptate, cupiditate vel aut provident quos veritatis consequatur quisquam ducimus cum. Consectetur eos perspiciatis obcaecati earum. Labore, ipsam, cum. Nostrum quia blanditiis a, recusandae iste. Incidunt labo</div><div><br></div><div>re autem qui veritatis explicabo est harum laborum. Mollitia ullam unde harum, ut ipsum doloremque nisi culpa repudiandae eveniet quo fuga laudantium, facilis deleniti, nobis laborum. Qui animi temporibus eveniet, sint quod neque omnis nihil adipisci quam corporis esse velit, aliquam nisi a facilis ipsa voluptatibus magnam nulla! Illum obcaecati vel, facere. Est quisquam aspernatur, qui dolorum nihil aut excepturi consequuntur quod soluta suscipit cupiditate veritatis. Fugiat culpa saepe eligendi architecto hic alias ex incidunt. Iure ipsa repellat ex! Totam earum, quod quibusdam nisi hic, placeat nobis et eveniet fugiat consectetur recusandae, magni ea asperiores dolor saepe, aliquam sed. Voluptate perspiciatis, error consequuntur animi nobis totam omnis et officia, distinctio culpa voluptas suscipit possimus dignissimos hic ea fugiat voluptatibus fuga adipisci sit iure?</div><br><br>', 'Copyright © 2020 BirCoin -  All Right  Reserved.', '<div id=\"fb-root\"></div>\r\n<script>\r\n    (function(d, s, id) {\r\n        var js, fjs = d.getElementsByTagName(s)[0];\r\n        if (d.getElementById(id)) return;\r\n        js = d.createElement(s); js.id = id;\r\n        js.src = \'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=205856110142667&autoLogAppEvents=1\';\r\n        fjs.parentNode.insertBefore(js, fjs);\r\n    }(document, \'script\', \'facebook-jssdk\'));\r\n</script>', 0.5, 'Buy & Sell Coins Near You', 'Bircoin group trying to provide better services in fintech field. In mentioned way, we have launched Bircoin startup. In first step our main aim is cryptocurrencies sell and buying without problem.In Bircoin website you are able to publish cryptocurrencies selling advertising with current price. You can reach to same point and sell your crypto.', NULL, '2018-04-26 04:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `from_` varchar(128) NOT NULL,
  `complaint_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `img` text,
  `state` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addvertise_id` int(11) NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `from_`, `complaint_user_id`, `message`, `img`, `state`, `date`, `addvertise_id`, `view`) VALUES
(14, '51', 52, 'why??', NULL, 0, '2020-05-04 10:45:48', 35, 1),
(15, '0', 52, 'oooy', NULL, 0, '2020-05-04 10:45:54', 35, 1),
(16, '51', 52, 'aaayyy', '1588589207.jpg', 0, '2020-05-04 10:47:05', 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cond`
--

CREATE TABLE `cond` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cond`
--

INSERT INTO `cond` (`id`, `text`) VALUES
(1, 'Please open your mouth and take a picture'),
(2, 'Please take a photo of the left side of your face'),
(3, 'Please take a photo of the right side of your face'),
(4, 'Please smile and take a picture'),
(5, 'Please smile so that your teeth are clear and take pictures');

-- --------------------------------------------------------

--
-- Table structure for table `cryptos`
--

CREATE TABLE `cryptos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cryptos`
--

INSERT INTO `cryptos` (`id`, `name`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', '1588169130.png', 1, '2020-04-27 11:19:39', '2020-04-29 15:35:30'),
(4, 'Cash deposit', '1588664597.png', 1, '2020-05-05 09:13:17', '2020-05-05 09:30:55'),
(5, 'International Wire (SWIFT)', '1588664782.png', 1, '2020-05-05 09:16:22', '2020-05-05 09:16:22'),
(6, 'Western Union', '1588664912.png', 1, '2020-05-05 09:18:32', '2020-05-05 09:18:32'),
(7, 'Skrill', '1588664998.png', 1, '2020-05-05 09:19:58', '2020-05-05 09:19:58'),
(8, 'Payeer', '1588665051.png', 1, '2020-05-05 09:20:51', '2020-05-05 09:20:51'),
(9, 'Payza', '1588665106.png', 1, '2020-05-05 09:21:46', '2020-05-05 09:21:46'),
(10, 'Perfect Money', '1588665191.png', 1, '2020-05-05 09:23:11', '2020-05-05 09:23:11'),
(11, 'Web Money', '1588665248.png', 1, '2020-05-05 09:24:08', '2020-05-05 09:24:08'),
(12, 'Master Card', '1588665314.png', 1, '2020-05-05 09:25:14', '2020-05-05 09:25:14'),
(13, 'Visa Card', '1588665363.png', 1, '2020-05-05 09:26:03', '2020-05-05 09:26:03'),
(14, 'Tether altcoin', '1588665490.png', 1, '2020-05-05 09:28:10', '2020-05-05 09:28:10'),
(15, 'Etherium altcoin', '1588665542.png', 1, '2020-05-05 09:29:02', '2020-05-05 09:29:02'),
(16, 'Litecoin altcoin', '1588665594.png', 1, '2020-05-05 09:29:54', '2020-05-05 09:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `crypto_addvertises`
--

CREATE TABLE `crypto_addvertises` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_type` int(11) NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `method_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `margin` int(11) NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trusted_sell` int(11) NOT NULL DEFAULT '0',
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `deposite_id` int(11) DEFAULT NULL,
  `reject` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crypto_addvertises`
--

INSERT INTO `crypto_addvertises` (`id`, `user_id`, `add_type`, `gateway_id`, `method_id`, `currency_id`, `margin`, `price`, `min_amount`, `max_amount`, `term_detail`, `payment_detail`, `status`, `created_at`, `updated_at`, `trusted_sell`, `view`, `deposite_id`, `reject`) VALUES
(49, 54, 1, 505, 1, 1, 0, '0', '0.0001', '0.00030845', 'frrffgth', 'ytyrgf', -1, '2020-05-03 21:47:05', '2020-05-03 22:20:30', 0, 1, NULL, 1),
(50, 51, 1, 505, 1, 1, 0, '0.5', '0.1', '0.49750000', 'س', 'س', 0, '2020-05-03 22:04:01', '2020-05-03 22:20:10', 0, 1, NULL, 0),
(51, 51, 1, 505, 1, 1, 0, '0.2', '0.01', '0.2', 'sell', 'sell', 0, '2020-05-03 22:33:17', '2020-05-03 22:33:28', 0, 1, NULL, 0),
(52, 51, 1, 505, 1, 1, 0, '0.6', '0.2', '0.6', 'sell', 'sell', -1, '2020-05-04 12:00:12', '2020-05-04 12:00:30', 0, 1, NULL, 1),
(53, 52, 1, 505, 1, 1, 0, '3', '1', '3', 'sell', 'sell', 0, '2020-05-04 12:12:24', '2020-05-04 12:12:47', 0, 1, NULL, 0),
(54, 53, 1, 505, 1, 2, 0, '0', '0.00001', '0.0006782915', 'I want to sell bitcoin', 'I want to sell bitcoin by PayPal', 0, '2020-05-04 12:49:42', '2020-05-04 12:51:10', 0, 1, NULL, 0),
(55, 54, 1, 505, 1, 1, 0, '0', '0.00001', '0.00007', 'wfWEFEW', 'ghtyewf', 0, '2020-05-04 13:16:09', '2020-05-04 13:16:26', 0, 1, NULL, 0),
(56, 54, 1, 505, 6, 1, 0, '0', '0.000009', '0.0000095', 'earfaerf', 'agrager', -1, '2020-05-10 10:58:20', '2020-05-10 11:34:42', 0, 1, NULL, 0),
(57, 54, 1, 505, 6, 1, 0, '0', '0.0003', '0.00031', 'grfaewgreag', 'egteagg', 0, '2020-05-10 12:33:24', '2020-05-10 12:37:20', 0, 1, NULL, 0),
(58, 54, 1, 505, 9, 1, 0, '0', '0.000001', '0.000008223', 'wdfefgrdg', 'rghgad\\frthtag', 0, '2020-05-14 10:53:15', '2020-05-14 10:54:07', 0, 1, NULL, 0),
(59, 53, 1, 505, 13, 2, 1, '0', '0.0001', '0.0003', 'Hello', 'Hello', 0, '2020-05-14 10:57:04', '2020-05-14 10:58:01', 0, 1, NULL, 0),
(60, 54, 1, 505, 11, 3, 1, '0', '0.0002', '0.0002988342', 'fore sell', 'for sell', 0, '2020-05-14 18:27:22', '2020-05-14 18:28:18', 0, 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usd_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `usd_rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USD', '1', 1, '2020-03-11 22:27:17', '2020-04-29 14:02:13'),
(2, 'TRY', '1', 1, '2020-04-29 14:02:30', '2020-04-29 14:02:30'),
(3, 'EUR', '1', 1, '2020-04-29 14:02:39', '2020-04-29 14:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `deal_convertions`
--

CREATE TABLE `deal_convertions` (
  `id` int(10) UNSIGNED NOT NULL,
  `deal_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `deal_detail` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_convertions`
--

INSERT INTO `deal_convertions` (`id`, `deal_id`, `type`, `deal_detail`, `image`, `created_at`, `updated_at`) VALUES
(38, 35, 1, 'want to buy', NULL, '2020-05-04 12:13:52', '2020-05-04 12:13:52'),
(39, 35, 2, 'pay first', NULL, '2020-05-04 12:14:26', '2020-05-04 12:14:26'),
(40, 36, 1, 'erftgtrae', NULL, '2020-05-04 13:01:37', '2020-05-04 13:01:37'),
(41, 36, 2, 'salam', NULL, '2020-05-04 13:02:24', '2020-05-04 13:02:24'),
(42, 36, 2, 'chetori?', '1588591971.jpg', '2020-05-04 13:02:51', '2020-05-04 13:02:51'),
(43, 37, 1, 'buy', NULL, '2020-05-04 13:09:51', '2020-05-04 13:09:51'),
(44, 37, 2, 'ok', NULL, '2020-05-04 13:10:44', '2020-05-04 13:10:44'),
(45, 38, 1, 'send btc', NULL, '2020-05-04 13:17:41', '2020-05-04 13:17:41'),
(46, 38, 2, 'OK TANX', NULL, '2020-05-04 13:18:12', '2020-05-04 13:18:12'),
(47, 39, 1, 'hi im by', NULL, '2020-05-10 10:56:25', '2020-05-10 10:56:25'),
(48, 40, 1, 'buy', NULL, '2020-05-10 11:00:03', '2020-05-10 11:00:03'),
(49, 39, 2, 'I am sell you should pay first', NULL, '2020-05-10 11:31:27', '2020-05-10 11:31:27'),
(50, 41, 1, 'Hi I want to buy bitcoin', NULL, '2020-05-10 12:41:39', '2020-05-10 12:41:39'),
(51, 41, 2, 'ok kach para verisan', NULL, '2020-05-10 12:42:23', '2020-05-10 12:42:23'),
(52, 41, 1, 'مفته وردااا منیم پولوم یوخده', NULL, '2020-05-10 12:43:09', '2020-05-10 12:43:09'),
(53, 42, 1, 'منه ور موفته بیت کوین 😛', NULL, '2020-05-10 12:47:59', '2020-05-10 12:47:59'),
(54, 42, 2, 'sana sipilayjam abi', NULL, '2020-05-10 12:49:34', '2020-05-10 12:49:34'),
(55, 42, 1, 'سند', '1589109665.jpg', '2020-05-10 12:51:07', '2020-05-10 12:51:07'),
(56, 43, 1, 'میخرم', NULL, '2020-05-10 13:58:36', '2020-05-10 13:58:36'),
(57, 44, 1, 'میخرم', NULL, '2020-05-10 14:00:43', '2020-05-10 14:00:43'),
(58, 45, 1, 'سلام', NULL, '2020-05-10 14:02:23', '2020-05-10 14:02:23'),
(59, 46, 1, 'ی', NULL, '2020-05-10 14:05:22', '2020-05-10 14:05:22'),
(60, 47, 1, 'i want', NULL, '2020-05-14 11:00:09', '2020-05-14 11:00:09'),
(61, 47, 2, 'ok hi', NULL, '2020-05-14 11:01:03', '2020-05-14 11:01:03'),
(62, 48, 1, 'hi im buying', NULL, '2020-05-14 11:08:13', '2020-05-14 11:08:13'),
(63, 48, 2, 'hello', NULL, '2020-05-14 11:09:13', '2020-05-14 11:09:13'),
(64, 49, 1, 'من میخوام', NULL, '2020-05-14 18:39:27', '2020-05-14 18:39:27'),
(65, 49, 1, 'کجا باید بیام؟', NULL, '2020-05-14 18:40:11', '2020-05-14 18:40:11'),
(66, 49, 2, 'sana ziplim alan', NULL, '2020-05-14 18:40:14', '2020-05-14 18:40:14'),
(67, 50, 1, 'من میخوام کجا باید بیام؟', NULL, '2020-05-14 19:25:22', '2020-05-14 19:25:22'),
(68, 50, 2, 'hamam', NULL, '2020-05-14 19:26:08', '2020-05-14 19:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usd_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btc_wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '-1',
  `try` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `ad` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `address`, `user_id`, `gateway_id`, `amount`, `charge`, `usd_amo`, `btc_amo`, `btc_wallet`, `trx`, `status`, `try`, `created_at`, `updated_at`, `view`, `ad`) VALUES
(35, '1NsaXQTSkSWqrKaJ1ym11Yup6y6gW9FNmJ', 51, 505, '0.3', '0', NULL, '0', NULL, '', 0, 0, '2020-05-03 22:31:07', '2020-05-03 22:31:24', 1, 'No'),
(36, '17YwaG2zRtGoxh9zP6a5DCNPJvdCur9yWm', 51, 505, '0.5005', '0', NULL, '0', NULL, '', 0, 0, '2020-05-04 11:59:09', '2020-05-04 11:59:29', 1, 'No'),
(37, '182i1e3VLY3KL5vbkpBeAxTSK77uCyLCzD', 52, 505, '1', '0', NULL, '0', NULL, '', -1, 0, '2020-05-04 12:11:54', '2020-05-04 12:12:41', 1, 'No'),
(38, '13hmbqXnjpoqM6sLhjXY6Dq41CQnrnAvJu', 53, 505, '0.00034', '0', NULL, '0', NULL, '', -1, 0, '2020-05-04 12:34:57', '2020-05-04 12:42:16', 1, 'No'),
(39, '14JPj824znPLB74MU2qCbAEJ5Q3uoU2KJ5', 53, 505, '0.00034', '0', NULL, '0', NULL, 'f25d7882adbaddeaeb3f3bb6a9b359733564410f27e7b5ce13c8dcca8a3f8c85', 0, 0, '2020-05-04 12:36:20', '2020-05-04 12:43:27', 1, 'No'),
(40, '1Q4iEsTgdfmzTjTitugo69rvbtV1f5g9LF', 51, 505, '2', '0', NULL, '0', NULL, '', 0, 0, '2020-05-04 12:45:19', '2020-05-04 12:45:53', 1, 'No'),
(41, '1PSvtVyo4pDygf4DvFVJVcncr4dGA8gXqz', 51, 505, '0.5', '0', NULL, '0', NULL, '', 0, 0, '2020-05-06 12:48:47', '2020-05-06 12:49:54', 1, 'No'),
(43, '1PkhRihDcmVNVCiZb7kmz9UgXrEKxobdQa', 54, 505, '0.00032', '0', NULL, '0', NULL, '5ae9f7396152c90aaa565b8ea9837ff9a0f40f2a776f71387f5776577590fb73', 0, 0, '2020-05-10 11:14:14', '2020-05-10 11:33:29', 1, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `etemplates`
--

CREATE TABLE `etemplates` (
  `id` int(10) UNSIGNED NOT NULL,
  `esender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emessage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `smsapi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etemplates`
--

INSERT INTO `etemplates` (`id`, `esender`, `mobile`, `emessage`, `smsapi`, `created_at`, `updated_at`) VALUES
(1, 'support@bircoin.co', '+01234567890', '<br><br>\r\n	<div class=\"contents\" style=\"max-width: 600px; margin: 0 auto; border: 2px solid #000036;\">\r\n\r\n<div class=\"header\" style=\"background-color: #000036; padding: 15px; text-align: center;\">\r\n	<h1 style=\"width: 260px;text-align: center; margin: 0 auto;\"><img src=\"https://bircoin.co/assets/images/logo/logo.png\" alt=\"THESOFTKING\" style=\"width: 40%;\"><font size=\"5\" style=\"\" color=\"#ffffff\">Bircoin</font></h1>\r\n</div>\r\n\r\n<div class=\"mailtext\" style=\"padding: 30px 15px; background-color: #f0f8ff; font-family: \'Open Sans\', sans-serif; font-size: 16px; line-height: 26px;\">\r\n\r\nHi {{name}},\r\n<br><br>\r\n{{message}}\r\n<br><br>\r\n<br><br>\r\n</div>\r\n\r\n<div class=\"footer\" style=\"background-color: #000036; padding: 15px; text-align: center;\">\r\n<a href=\"http://bircoin.co/\" style=\"	background-color: #2ecc71;\r\n	padding: 10px 0;\r\n	margin: 10px;\r\n	display: inline-block;\r\n	width: 100px;\r\n	text-transform: uppercase;\r\n	text-decoration: none;\r\n	color: #ffff;\r\n	font-weight: 600;\r\n	border-radius: 4px;\" title=\"\" target=\"\">Website</a>&nbsp;\r\n<a href=\"http://bircoin.co/contact\" style=\"	background-color: #2ecc71;\r\n	padding: 10px 0;\r\n	margin: 10px;\r\n	display: inline-block;\r\n	width: 100px;\r\n	text-transform: uppercase;\r\n	text-decoration: none;\r\n	color: #ffff;\r\n	font-weight: 600;\r\n	border-radius: 4px;\" title=\"\" target=\"\">Contact</a>\r\n</div>\r\n\r\n\r\n<div class=\"footer\" style=\"background-color: #000036; padding: 15px; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.2);\">\r\n\r\n<strong style=\"color: #fff;\">© 2019 - 2020 BIRCOIN. All Rights Reserved.</strong>\r\n<p style=\"color: #ddd;\">Bircoin is not partnered with any other \r\ncompany or person. We work as a team and do not have any reseller, \r\ndistributor or partner!</p>\r\n\r\n\r\n</div>\r\n\r\n	</div>\r\n<br><br>', 'https://api-mapper.clicksend.com/http/v2/send.php?method=http&username=hamed.golbahar1@gmail.com&key=DEA656FD-628F-6091-3CC1-DD56757D7D11&to={{number}}&message={{message}}', '2018-01-09 23:45:09', '2020-04-29 11:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` int(10) UNSIGNED NOT NULL,
  `main_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxamo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `main_name`, `name`, `minamo`, `maxamo`, `fixed_charge`, `percent_charge`, `currency`, `rate`, `val1`, `val2`, `status`, `created_at`, `updated_at`) VALUES
(505, 'CoinPayment - BTC', 'BitCoin', '0', '50000', '0', '0', 'BTC', '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 1, NULL, '2019-03-30 09:24:50'),
(506, 'CoinPayment - ETH', 'Etherium', '0', '50000', '0', '0', 'ETH', '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 0, NULL, '2019-03-30 09:24:50'),
(509, 'CoinPayment - DOGE', 'Doge', '0', '50000', '0', '0', 'DOGE', '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 0, NULL, '2019-03-30 09:24:50'),
(510, 'CoinPayment - LTC', 'LiteCoin', '0', '50000', '0', '0', 'LTC', '80', '596f0097ed9d1ab8cfed05eb59c70e9f066513dfe4df64a8fc3917d309328315', '7472928395208f70E3cE30B9e10dc882cBDD3e9967b7942AaE492106d9C7bE44', 0, NULL, '2019-03-30 09:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `value` double NOT NULL,
  `cr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `user_id`, `date`, `value`, `cr_id`) VALUES
(18, 53, '2020-05-04 11:34:47', 0.00000335, 36),
(19, 51, '2020-05-04 11:40:58', 0.002, 37),
(20, 54, '2020-05-04 11:48:40', 0.00000035, 38),
(21, 54, '2020-05-10 11:26:20', 0.00000155, 42),
(22, 54, '2020-05-14 09:34:33', 0.00000004, 47),
(23, 53, '2020-05-14 09:43:08', 0.0000014999999999999998, 48),
(24, 54, '2020-05-14 17:57:41', 0.000001494171, 50);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `description` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'How It\'s Work', 'how-its-work', 0x3c7374726f6e673e486f7720697420776f726b73203c2f7374726f6e673e0d0a3c62723e0d0a3c62723e0d0a576520686176652070726f7669646564206120646563656e7472616c697a656420616e642073616665206261736520666f722073656c6c696e6720616e6420627579696e672e2054686520736572766963657320697320503250206279206372656174696e672061647665727469736520616e64207468657265206e6f20696e7465726d65646961746520706572736f6e732e20496e20746869732073797374656d207468652073656c6c6572206172652061626c6520746f2073616c65207468656d73656c7665732063727970746f63757272656e63696573206469726563746c79206279206372656174696e67206164766572746973652e200d0a5765206172652070726f756420746f2070726f7669646520736572766963657320666f7220626974636f696e2c20657468657269756d2c206c697465636f696e20616e6420646f6765636f696e20616e6420626974636f696e2073656c6c696e6720616e6420627579206973206163746976652e0d0a3c62723e3c62723e0d0a3c7374726f6e673e53746570733c2f7374726f6e673e0d0a3c62723e3c62723e0d0a3c7374726f6e673e526567697374726174696f6e3c2f7374726f6e673e0d0a3c62723e0d0a496620796f752068617665206163636f756e74207369676e20696e206f7220796f7520686176656e2774206163636f756e74207369676e2075702e0d0a596f75722070686f6e65206e756d62657220616e6420656d61696c2061646472657373206973206e656365737361727920666f7220726563656976696e6720636f6465732e0d0a3c62723e3c62723e0d0a3c7374726f6e673e4964656e74697479203c2f7374726f6e673e0d0a3c62723e0d0a466f72207573696e672074686520736572766963657320796f75206e65656420746f2076657269667920796f75206964656e746974792e0d0a54686520696d616765206f662070617373706f72742c2066726f6e7420616e64206261636b20696d616765206f66206964656e7469747920636172642c206c6976652073656c666973682070686f746f20616e64207370656369616c2070686f746f732069732064656d616e642e0d0a416674657220766572696669636174696f6e20796f75206172652061626c6520746f2075736520706c6174666f726d2073657276696365732e0d0a3c62723e3c62723e0d0a3c7374726f6e673e4c6574277320626567696e203c2f7374726f6e673e0d0a3c62723e0d0a576520776f756c64206c696b6520746f207361792077656c636f6d6520746f2063727970746f63757272656e6369657320776f726c642c20796f752063616e2073656c6c20796f75722063727970746f63757272656e63696573206f7220627579207468656d206265747765656e2072656c656173656420616476657274697365732e0d0a3c62723e3c62723e0d0a3c7374726f6e673e43726561746520796f7572206164766572746973653c2f7374726f6e673e0d0a3c62723e0d0a4c6f6f6b206174206164766572746973652073656374696f6e20616e64207468656e20637265617465206164766572746973652e0d0a466f72206372656174696e6720612073656c6c696e672061647665727469736520796f75206d7573742073656c6563742061206d6178696d756d20616e64206d696e696d756d20616d6f756e74206f6620636f696e20796f752077616e7420746f2073656c6c20616e642064657465726d696e65206d617267696e20616d6f756e74206f662074686174206f7220646f6e277420616374696f6e2e2049662074686520616d6f756e74206f662073656c6c696e672063727970746f206973206c6f77657220616d6f756e74207468616e20796f75722062616c616e63652c20796f75206d757374206265206465706f7369746520796f752063727970746f63757272656e6369657320616e6420696e63726561736520796f752062616c616e63652e20596f75206172652061626c6520746f2073656c6563742074776f207761792e0d0a312e205768696c6520796f7520617265206372656174696e6720616e206164766572746973652c20696e63726561736520796f752062616c616e63652073616d65206f72206d6f7265207468616e2073656c6c696e6720616d6f756e742e0d0a322e20496e2064617368626f61726420616e642062616c616e63652c20796f75206d757374206265206465706f73697420616e642073656c6c20686f77206d616e7920796f752077616e7420746f2073656c6c2e0d0a496e70757420796f7520666561747572657320616e642064657461696c73206f6620796f75722061647665727469736520616e6420646f6e277420707574207365637572652c2070617373776f7264732c2070686f6e65206e756d62657220616e64206574632e204f7572207465616d2077696c6c2072656c65617365207468652061647665727469736520616674657220696e7665737469676174696f6e206f6620746861742e0d0a3c62723e3c62723e0d0a3c7374726f6e673e546865206d6574686f64206f66206465616c696e673c2f7374726f6e673e0d0a3c62723e0d0a53656c6c65723a2041667465722063726561746520616e642072656c65617365206f66206164766572746973652c2069742077696c6c207265666c65637420696e207765627369746520616e6420627579657273206172652061626c6520746f2073686f772069742c20796f75206d757374207761697420666f7220627579696e6720726571756573742e0d0a4966206120637573746f6d6572207265717565737420746f2062757920796f75722063727970746f63757272656e63792c2061206d6573736167652077696c6c2073656e6420746f20796f7520696e2070616e656c20616e6420616d6f756e74206f662063727970746f63757272656e6379207265717565737420697320617661696c61626c6520746f2073686f7720796f752e204576656e20796f75206172652061626c6520746f206368617420616e64206d616b6520636f6d6d756e69636174696f6e20776974682062757965722e204966207468652062757965722070616964207468652063727970746f63757272656e637920636f7374732c20796f75206d75737420636c69636b202249207265636569766564206d6f6e6579222e205468652062757920616e642073656c6c206f662063727970746f63757272656e63792066696e697368656420616e6420696620616c6c206f6620796f752063727970746f63757272656e637920736f6c64206f75742c20796f75206164766572746973652077696c6c206572617365206175746f6d61746963616c6c792e20496620796f752077616e7420746f2073656c6c20616e206f746865722063727970746f63757272656e637920796f75206d75737420637265617465206e6577206164766572746973652e20546865206e6f74652069732069742c204966206120736d616c6c20616d6f756e74206f6620796f75722063727970746f63757272656e637920736f6c64206f757420616e6420796f7572206861766520616e20616d6f756e7420746f2073656c6c207965742c20746865206d656e74696f6e656420616d6f756e742077696c6c206d696e7573206f6620746f74616c20616e642077696c6c2072656c656173652061206e6577206164766572746973652c20666f72206578616d706c6520696620796f752077616e7420746f2073656c6c203120626974636f696e20616e6420302e3520626974636f696e20736f6c64206f75742c20302e3520626974636f696e206f6620746f74616c20616d6f756e742077696c6c206d696e75732028312d20302e353d302e35292c20616e642061206e6577206164766572746973652077696c6c2062652073686f776e20746f2073656c6c2e200d0a42652061776172652c2074686520616c6c206f6620696e746572616374696f6e2068617665206c696d697465642074696d6520746f20616374696f6e20616e64206166746572206578706972652074686174206c696d697465642074696d6520746f20627579657220616e642073656c6c65722c20496620796f75206469646e27742066696e69736820746865206465616c696e672c2069742077696c6c2063616e63656c206279207765627369746520616e6420697420686173206e6567617469766520706f696e7420666f7220626f7468206f66207468656d2e2049662069742077696c6c2073686f7720616761696e2c2074686520637573746f6d6572732077696c6c2062652062616e6e65642e0d0a42757965723a2074686520616c6c206f6620616476657274697365732061726520617661696c61626c6520696e207765627369746520796f752063616e2064657465726d696e6520616e642070757368207468652022427579222c207768656e20796f7520646f2069742c20796f752077696c6c2064697265637420746f206e6577207061676520616e642069742068617320696e666f726d6174696f6e206f662073656c6c65722c2072756c657320616e642064657461696c732e2052656164206f66207468656d20616e642073656c65637420796f757220616d6f756e74206265747765656e206d696e696d756d20616e64206d6178696d756d20616d6f756e7420616e64206f726465722069742e20427920646f696e6720746861742061206d6573736167652077696c6c2073656e6420746f2073656c6c657220616e6420697420696e636c75646520746865206f7264657220616d6f756e742e20546865206368617474696e6720706167652077696c6c2073686f7720746f20796f7520616e6420796f75206172652061626c6520737065616b20776974682073656c6c65722e20496e2064657465726d696e65642074696d652e20496620796f7520646964207061792c20796f75206d75737420636c69636b2022492070616964206d6f6e6579222e2054686520616d6f756e742077696c6c207472616e7366657220746f206275796572206163636f756e742061667465722073656c6c657220636f6e6669726d6174696f6e20616e642062757965722069732061626c6520746f2077697468647261772069742e0d0a20546865206e6f74652069732069742c206966207468652073656c6c657220646f6e277420636c69636b202249207265636569766564206d6f6e657922207468652062757965722069732061626c6520746f20766973697420636f6d706c61696e74207061676520616e6420637265617465206120636f6d706c61696e74207769746820656e6f75676820706179696e6720646f63756d656e74732e2054686520737570706f7274207465616d2077696c6c20696e766573746967617465207468656d20617320736f6f6e20617320717569636b6c792e0d0a3c62723e3c62723e0d0a3c7374726f6e673e496e63726561736520746865206465706f736974203c2f7374726f6e673e0d0a3c62723e0d0a596f75206172652061626c6520746f20696e63726561736520796f7572206465706f7369742c20686f77206d7563682063727970746f63757272656e637920796f752077616e7420616e642064657369726520696e2064617368626f6172642e20546865206d6178696d756d20616d6f756e74206f662061647665727469736520746f2073656c6c696e672069732073616d65206f6620796f7572206465706f73697420616d6f756e742e20466f72206578616d706c6520696620796f752077616e7420746f2073656c6c203120626974636f696e2c20796f75206d75737420696e63726561736520796f75722061737365747320746f203120626974636f696e20616e6420696620796f752077616e742073656c6c206d6f7265207468616e206d656e74696f6e656420616d6f756e7420796f75206d75737420616464206d6f726520616d6f756e7420746f20796f75722062616c616e63652e20496e20616476657274697365206372656174696e6720737465702c20496620796f752077616e7420746f2073656c6c20796f75722061737365747320627574207468657920617265206c6f776572207468616e20796f75722062616c616e636520616d6f756e742c20796f75206172652061626c6520746f20696e63726561736520796f75722062616c616e636520616e642070757273756520746861742e200d0a3c62723e3c62723e0d0a3c7374726f6e673e43727970746f63757272656e63792077697468647261773c2f7374726f6e673e0d0a3c62723e0d0a466f7220646f696e672077697468647261772c20796f752063616e20636c69636b20746f2022526571756573742061207061796d656e742220696e20796f7572206163636f756e742e204279206f72646572696e6720697420616e642073656c65637420796f75722064657369726520616d6f756e7420616e642077616c6c657420616464726573732c20796f75206172652061626c6520746f207472616e7366657220697420746f20796f75722077616c6c65742e0d0a3c62723e3c62723e0d0a3c7374726f6e673e436f6d706c61696e20616e6420697373756573203c2f7374726f6e673e0d0a3c62723e0d0a426972636f696e207465616d20747279696e6720746f206372656174652073616665206261736520666f7220637573746f6d6572732c207468657265666f7265206974206861732070726f7669646564206120636f6d706c61696e207469636b657420666f7220757365727320696e206465616c2070726f636573732e20596f75206172652061626c6520746f2073656c65637420226f70656e2074726164696e672220616e6420636f706c61696e732c207469636b6574206120636f6d706c61696e20616e64207075727375652069742e0d0a3c62723e0d0a0d0a3c62723e0d0a3c7374726f6e673e53616665207472616e73616374696f6e3c2f7374726f6e673e0d0a3c62723e0d0a54686520426972636f696e2061696d2069732070726f766964652061207361666520616e6420636f6e666964656e7420706c61636520746f207472616e73616374696f6e732c20736f20796f75206172652061626c6520746f2072657175657374202254727573742073656c6c2220616e64207468652062757965727320666f72207075726368617365206f662063727970746f63757272656e636965732c206d757374206265207061792074686520636f7374206f66207468617420746f20776562736974652e20596f7520776f6e2774207472616465206120706572736f6e206469726563746c7920616e642077686f6c65206f662070726963652077696c6c2073656e6420746f20796f752e2054686520636f6d6d697373696f6e20697320686967686572207468616e20796f7520646f20796f7572207472616465206e6f726d616c6c792e0d0a53616665207472616e73616374696f6e2061732073686f776e20696e20686f6d6520706167652077697468207370656369616c2073796d626f6c2e0d0a3c62723e3c62723e0d0a3c7374726f6e673e526174696e673c2f7374726f6e673e0d0a3c62723e0d0a54686520637573746f6d657273206166746572207472616e73616374696f6e206172652061626c6520746f2073656c656374207261746520746f2065616368697468657220616e6420746865207375626d697474656420706f696e742077696c6c20636f6e736964657220696e207468696572206163636f756e742e, '2018-05-04 08:26:57', '2020-05-04 21:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2018_05_15_060641_create_events_table', 2),
(4, '2018_05_15_073146_create_matches_table', 3),
(5, '2018_05_15_130147_create_bet_questions_table', 4),
(7, '2018_05_16_060816_create_bet_options_table', 5),
(8, '2018_05_23_102456_create_bet_invests_table', 6),
(9, '2018_06_20_122315_create_cryptos_table', 7),
(10, '2018_06_20_191838_create_user_crypto_balances_table', 8),
(11, '2018_07_02_183422_create_crypto_addvertises_table', 9),
(12, '2018_07_07_121201_create_advertise_deals_table', 10),
(13, '2018_07_07_121757_create_deal_convertions_table', 10),
(14, '2018_07_07_131613_create_deal_attachments_table', 11),
(15, '2018_07_07_172234_create_currencies_table', 12),
(16, '2018_07_21_124756_create_tickets_table', 13),
(17, '2018_07_21_124923_create_ticket_comments_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `id` varchar(128) NOT NULL,
  `am` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `am`) VALUES
('USD', 9647.53),
('TRY', 66958.7),
('EUR', 8945.53);

-- --------------------------------------------------------

--
-- Table structure for table `request_a_payment`
--

CREATE TABLE `request_a_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `wallet` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` int(11) NOT NULL DEFAULT '0',
  `message` text,
  `view` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_a_payment`
--

INSERT INTO `request_a_payment` (`id`, `user_id`, `amount`, `wallet`, `date`, `state`, `message`, `view`) VALUES
(7, 54, 0.0009, 'pkpojkpfoekfpokefpwksodjepodkw[dpdklw[qdpkp', '2020-05-04 11:42:08', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Buy & Sell Coins Near You', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam sed officiis in excepturi unde, vel? Illum dolorum nobis, labore iusto!', 'slider_1534583724.jpg', '2018-06-10 06:50:32', '2018-10-25 11:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `code`, `link`, `created_at`, `updated_at`) VALUES
(5, 'Linkedin', '<i class=\"fa fa-telegram\"></i>', 'https://telegram.me/bircoin_co', '2018-05-22 23:58:14', '2020-03-11 00:51:53'),
(7, 'G+', '<i class=\"fa fa-instagram\"></i>', 'https://instagram.com/bircoin.co', '2018-06-27 09:36:43', '2020-03-11 00:51:58'),
(8, 'FaceBook', '<i class=\"fa fa-facebook\"></i>', 'https://facebook.com/bircoin.co', '2020-04-24 10:11:13', '2020-04-24 10:12:03'),
(9, 'Twitter', '<i class=\"fa fa-twitter\"></i>', 'https://twitter.com/1_bircoin', '2020-04-24 10:11:43', '2020-04-24 10:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket`, `subject`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(4, '5E47FBC1', 'reject', 51, 9, '2020-05-04 12:01:54', '2020-05-04 12:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE `ticket_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_comments`
--

INSERT INTO `ticket_comments` (`id`, `ticket_id`, `type`, `comment`, `created_at`, `updated_at`) VALUES
(1, '5E47FBC1', 1, 'Why my advertise reject ?', '2020-05-04 12:01:54', '2020-05-04 12:01:54'),
(2, '5E47FBC1', 0, 'because I love it', '2020-05-04 12:02:16', '2020-05-04 12:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `trxes`
--

CREATE TABLE `trxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `main_amo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxes`
--

INSERT INTO `trxes` (`id`, `user_id`, `amount`, `main_amo`, `charge`, `type`, `title`, `trx`, `created_at`, `updated_at`) VALUES
(39, 51, '0.3', '0.8', '0', '+', 'Deposit ViaBitCoin', '', '2020-05-03 22:31:23', '2020-05-03 22:31:23'),
(40, 51, '0.5005', '1.3005', '0', '+', 'Deposit ViaBitCoin', '', '2020-05-04 11:59:27', '2020-05-04 11:59:27'),
(41, 52, '2 BTC', '7.0000305 BTC', '0', '+', 'SELL-BTCCancel', 'SELLBTC1588589093', '2020-05-04 12:14:53', '2020-05-04 12:14:53'),
(42, 53, '0.00034', '0.0006817', '0', '+', 'Deposit ViaBitCoin', 'f25d7882adbaddeaeb3f3bb6a9b359733564410f27e7b5ce13c8dcca8a3f8c85', '2020-05-04 12:43:25', '2020-05-04 12:43:25'),
(43, 51, '2', '3.3005', '0', '+', 'Deposit ViaBitCoin', '', '2020-05-04 12:45:51', '2020-05-04 12:45:51'),
(44, 54, '0.00067 BTC', '0.00098 BTC', '0', '+', 'BUY-BTCfrom-Hamed Golbahar', 'BUYBTC1588592087', '2020-05-04 13:04:47', '2020-05-04 13:04:47'),
(45, 53, '0.00067 BTC', '8.35E-6 BTC', '0', '-', 'SELL-BTCto-bey hesam', 'SELLBTC1588592087', '2020-05-04 13:04:47', '2020-05-04 13:04:47'),
(46, 53, '3.35E-6 BTC', '0.0000033500 BTC', '0', '+', 'Wage-From-Sell 0.00067 BTC', 'Site IncomeBTC1588592087', '2020-05-04 13:04:47', '2020-05-04 13:04:47'),
(47, 52, '0.4 BTC', '7.4000305 BTC', '0', '+', 'BUY-BTCfrom-mahdi rahani', 'BUYBTC1588592458', '2020-05-04 13:10:58', '2020-05-04 13:10:58'),
(48, 51, '0.4 BTC', '2.3985 BTC', '0', '-', 'SELL-BTCto-Mehti rahani', 'SELLBTC1588592458', '2020-05-04 13:10:58', '2020-05-04 13:10:58'),
(49, 51, '0.002 BTC', '0.0020033500 BTC', '0', '+', 'Wage-From-Sell 0.4 BTC', 'Site IncomeBTC1588592458', '2020-05-04 13:10:58', '2020-05-04 13:10:58'),
(50, 54, '0.0009', '-0.00082', '0', '-', 'Withdrawal Requset', 'Withdrawal Requset', '2020-05-04 13:13:33', '2020-05-04 13:13:33'),
(51, 53, '0.00007 BTC', '7.835E-5 BTC', '0', '+', 'BUY-BTCfrom-bey hesam', 'BUYBTC1588592920', '2020-05-04 13:18:40', '2020-05-04 13:18:40'),
(52, 54, '0.00007 BTC', '9.65E-6 BTC', '0', '-', 'SELL-BTCto-Hamed Golbahar', 'SELLBTC1588592920', '2020-05-04 13:18:40', '2020-05-04 13:18:40'),
(53, 54, '3.5E-7 BTC', '0.0020037000 BTC', '0', '+', 'Wage-From-Sell 0.00007 BTC', 'Site IncomeBTC1588592920', '2020-05-04 13:18:40', '2020-05-04 13:18:40'),
(54, 51, '0.5', '2.8985', '0', '+', 'Deposit ViaBitCoin', '', '2020-05-06 12:49:52', '2020-05-06 12:49:52'),
(55, 54, '0.00032', '0.00032965', '0', '+', 'Deposit ViaBitCoin', '5ae9f7396152c90aaa565b8ea9837ff9a0f40f2a776f71387f5776577590fb73', '2020-05-10 11:33:26', '2020-05-10 11:33:26'),
(56, 54, '0.0003 BTC', '0.00032965 BTC', '0', '+', 'SELL-BTCCancel', 'SELLBTC1589109398', '2020-05-10 12:46:38', '2020-05-10 12:46:38'),
(57, 53, '0.00031 BTC', '0.00038835 BTC', '0', '+', 'BUY-BTCfrom-bey hesam', 'BUYBTC1589109980', '2020-05-10 12:56:20', '2020-05-10 12:56:20'),
(58, 54, '0.00031 BTC', '1.81E-5 BTC', '0', '-', 'SELL-BTCto-Hamed Golbahar', 'SELLBTC1589109980', '2020-05-10 12:56:20', '2020-05-10 12:56:20'),
(59, 54, '1.55E-6 BTC', '0.0020052500 BTC', '0', '+', 'Wage-From-Sell 0.00031 BTC', 'Site IncomeBTC1589109980', '2020-05-10 12:56:20', '2020-05-10 12:56:20'),
(60, 51, '0.19 BTC', '2.6985 BTC', '0', '+', 'SELL-BTCCancel', 'SELLBTC1589112553', '2020-05-10 13:39:13', '2020-05-10 13:39:13'),
(61, 51, '0.01 BTC', '2.8985 BTC', '0', '+', 'SELL-BTCCancel', 'SELLBTC1589112565', '2020-05-10 13:39:25', '2020-05-10 13:39:25'),
(62, 51, '0.2 BTC', '2.8985 BTC', '0', '+', 'SELL-BTCCancel', 'SELLBTC1589113815', '2020-05-10 14:00:15', '2020-05-10 14:00:15'),
(63, 51, '0.19 BTC', '2.8985 BTC', '0', '+', 'SELL-BTCCancel', 'SELLBTC1589113882', '2020-05-10 14:01:22', '2020-05-10 14:01:22'),
(64, 51, '0.17 BTC', '2.8985 BTC', '0', '+', 'SELL-BTCCancel', 'SELLBTC1589114098', '2020-05-10 14:04:58', '2020-05-10 14:04:58'),
(65, 51, '0.155 BTC', '2.8985 BTC', '0', '+', 'SELL-BTCCancel', 'SELLBTC1589114279', '2020-05-10 14:07:59', '2020-05-10 14:07:59'),
(66, 53, '0.000008 BTC', '0.00039635 BTC', '0', '+', 'BUY-BTCfrom-bey hesam', 'BUYBTC1589448873', '2020-05-14 11:04:33', '2020-05-14 11:04:33'),
(67, 54, '0.000008 BTC', '1.006E-5 BTC', '0', '-', 'SELL-BTCto-Hamed Golbahar', 'SELLBTC1589448873', '2020-05-14 11:04:33', '2020-05-14 11:04:33'),
(68, 54, '4.0E-8 BTC', '0.0020052900 BTC', '0', '+', 'Wage-From-Sell 0.000008 BTC', 'Site IncomeBTC1589448873', '2020-05-14 11:04:33', '2020-05-14 11:04:33'),
(69, 54, '0.0003 BTC', '0.00031006 BTC', '0', '+', 'BUY-BTCfrom-Hamed Golbahar', 'BUYBTC1589449388', '2020-05-14 11:13:08', '2020-05-14 11:13:08'),
(70, 53, '0.0003 BTC', '9.485E-5 BTC', '0', '-', 'SELL-BTCto-bey hesam', 'SELLBTC1589449388', '2020-05-14 11:13:08', '2020-05-14 11:13:08'),
(71, 53, '1.5E-6 BTC', '0.0020067900 BTC', '0', '+', 'Wage-From-Sell 0.0003 BTC', 'Site IncomeBTC1589449388', '2020-05-14 11:13:08', '2020-05-14 11:13:08'),
(72, 54, '0.0002988342 BTC', '0.00031006 BTC', '0', '+', 'SELL-BTCCancel', 'SELLBTC1589478225', '2020-05-14 19:13:45', '2020-05-14 19:13:45'),
(73, 53, '0.0002988342 BTC', '0.0003936842 BTC', '0', '+', 'BUY-BTCfrom-bey hesam', 'BUYBTC1589479061', '2020-05-14 19:27:41', '2020-05-14 19:27:41'),
(74, 54, '0.0002988342 BTC', '9.7316289999999E-6 BTC', '0', '-', 'SELL-BTCto-Hamed Golbahar', 'SELLBTC1589479061', '2020-05-14 19:27:41', '2020-05-14 19:27:41'),
(75, 54, '1.494171E-6 BTC', '0.0020082842 BTC', '0', '+', 'Wage-From-Sell 0.0002988342 BTC', 'Site IncomeBTC1589479061', '2020-05-14 19:27:41', '2020-05-14 19:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_image` text COLLATE utf8mb4_unicode_ci,
  `selfi_request` text COLLATE utf8mb4_unicode_ci,
  `selfie_image` text COLLATE utf8mb4_unicode_ci,
  `custom_image` text COLLATE utf8mb4_unicode_ci,
  `passport_image_state` tinyint(1) NOT NULL DEFAULT '0',
  `selfi_request_state` tinyint(1) NOT NULL DEFAULT '0',
  `selfie_image_state` tinyint(1) NOT NULL DEFAULT '0',
  `custom_image_state` tinyint(1) NOT NULL DEFAULT '0',
  `custom_image_cond` int(11) NOT NULL,
  `expert_message` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verify` tinyint(4) NOT NULL DEFAULT '0',
  `email_verify` tinyint(4) NOT NULL DEFAULT '0',
  `email_time` datetime DEFAULT NULL,
  `phone_time` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `login_time` datetime DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tauth` int(11) NOT NULL DEFAULT '1',
  `tfver` int(11) DEFAULT NULL,
  `secretcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `auth_flag` tinyint(1) NOT NULL DEFAULT '0',
  `ads_expr_count` int(11) NOT NULL DEFAULT '0',
  `star` double NOT NULL DEFAULT '2.5',
  `star_unit` int(11) NOT NULL DEFAULT '1',
  `exp_4` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `image`, `passport_image`, `selfi_request`, `selfie_image`, `custom_image`, `passport_image_state`, `selfi_request_state`, `selfie_image_state`, `custom_image_state`, `custom_image_cond`, `expert_message`, `password`, `verification_code`, `sms_code`, `phone_verify`, `email_verify`, `email_time`, `phone_time`, `status`, `login_time`, `city`, `zip_code`, `address`, `country`, `tauth`, `tfver`, `secretcode`, `remember_token`, `created_at`, `updated_at`, `auth_flag`, `ads_expr_count`, `star`, `star_unit`, `exp_4`) VALUES
(50, 'behnam', 'behnam', 'kohegammm@yahoo.com', '00989147838160', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 4, NULL, '$2y$10$hplU9YtynHbIcVCoSYxwMukh1jqqkB.jssL/iA1s7yAyY/OQa7Hmi', '32672', '116298', 1, 1, '2020-03-16 04:52:39', '2020-03-16 04:53:02', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 'EzQrqfA0oN2UorgZD5xOdS6CQhgtwtr975w3hymPgSP948N2kZMBhUMnKsDi', '2020-04-21 19:30:00', '2020-04-25 17:10:53', 0, 0, 2.5, 1, 0),
(51, 'mahdi rahani', 'mahdi123', 'mahdirahani@gmail.com', '+989360919794', NULL, 'image_secret_users/wM2XJzD4JS1584314683d9b17c978010901c3d2fc59990787d3279262aa7a86eec9e0dde495d9a634640.jpg', 'image_secret_users/5X2WgrniyI15843146831584314683d9b17c978010901c3d2fc59990787d3279262aa7a86eec9e0dde495d9a634640.jpg', 'image_secret_users/FuImwIAHiO15843146831584314683d9b17c978010901c3d2fc59990787d3279262aa7a86eec9e0dde495d9a634640.png', 'image_secret_users/XmCmNSJQAv15843146831584314683d9b17c978010901c3d2fc59990787d3279262aa7a86eec9e0dde495d9a634640.png', 1, 1, 1, 1, 1, NULL, '$2y$10$IkSA1zxvvN/iF56itUl1YeJjMYpWBqeHfnq/kfqBDudbum.00zZhi', '75313', '128635', 1, 1, '2020-03-16 05:19:13', '2020-03-16 05:23:06', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 'CW3ACIZFDH3S24SZ', 'PQXFymW4KlhRhALhuhRfB0eN05BPHlpNRAPZ4i6BH7xGDcMoiTIjHHZHiNp2', '2020-03-16 01:17:10', '2020-05-13 08:35:17', 0, 0, 2.5, 1, 0),
(52, 'Mehti rahani', 'mehti', 'mehtirahanii@gmail.com', '+989034697059', NULL, 'image_secret_users/GWymh8VfOP15843417134e66ee82954260029421ddc7a5c04ea979262aa7a86eec9e0dde495d9a634640.jpg', 'image_secret_users/jsWMqhPZz615843417751584341775010fae30e3e029ba847a5de97fca4f2879262aa7a86eec9e0dde495d9a634640.jpg', 'image_secret_users/8z0xJZTFFl15843417751584341775010fae30e3e029ba847a5de97fca4f2879262aa7a86eec9e0dde495d9a634640.png', 'image_secret_users/yx3xUMntwM15843417751584341775010fae30e3e029ba847a5de97fca4f2879262aa7a86eec9e0dde495d9a634640.png', 1, 1, 1, 1, 3, NULL, '$2y$10$8UWaHkksyYgCAH99N9Src.XeDIMNo99ApRr6lteHa3QNyZnWiW9i2', '56204', '491257', 1, 1, '2020-03-16 11:42:55', '2020-03-16 11:43:40', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, 'ZEXTEZBA43G6F7EA', 'XEkb7d7KLbfWKbwmFG7GsVA6X8qLkPCZ2vg9EAax49v5HfUiTH1eSlU4BziE', '2020-03-16 01:39:43', '2020-05-13 10:21:31', 0, 0, 2.5, 1, 0),
(53, 'Hamed Golbahar', 'hamed', 'hamed.golbahar1@gmail.com', '+989332363530', NULL, 'image_secret_users/iB0o9WaoWd15844386542136029c6a373884314f16734e75e99b79262aa7a86eec9e0dde495d9a634640.jpg', 'image_secret_users/vJr5qmaWeE158443865415844386542136029c6a373884314f16734e75e99b79262aa7a86eec9e0dde495d9a634640.jpg', 'image_secret_users/urKs5mBDry15844396921584439692a38afbe9d6645fcdd280836780d5e47279262aa7a86eec9e0dde495d9a634640.png', 'image_secret_users/HErR6IqToO15844396921584439692a38afbe9d6645fcdd280836780d5e47279262aa7a86eec9e0dde495d9a634640.png', 1, 1, 1, 1, 2, 'Your auth confirmed', '$2y$10$5WVWBpyHVvDRpG.KbhAykeGMrdPaviju/1KchvE/2zn9.ECfPJTmK', '26953', '115062', 1, 1, '2020-03-17 15:12:39', '2020-03-17 15:13:05', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 'DK6QWIBMKUQK4GHP', 'dyifGMznbL3Z1k5OmVrooHoIBGw3Q0KGvR9rALTtkspOeYfEwMt89YNURuw7', '2020-03-17 11:32:26', '2020-05-14 19:24:39', 0, 0, 7.333333333333333, 3, 0),
(54, 'bey hesam', 'beyhesam', 'beyhesam@gmail.com', '00905526752038', NULL, 'image_secret_users/KRy4a4Wn1z15853938816592483c61a8107aab06e45ce766d45379262aa7a86eec9e0dde495d9a634640.jpeg', 'image_secret_users/bKdrbrU6s5158539388115853938816592483c61a8107aab06e45ce766d45379262aa7a86eec9e0dde495d9a634640.jpeg', 'image_secret_users/okhZFjPARN1585391319158539131953eca0f9cc78b32aed590654820f599279262aa7a86eec9e0dde495d9a634640.png', 'image_secret_users/GdWJx6xtH415853913641585391364acc4589481f61c444074e5676fd410b079262aa7a86eec9e0dde495d9a634640.png', 1, 1, 1, 1, 5, NULL, '$2y$10$68zVKPseiqv79zbKRZSe6uxL5laisorCwbpkDy/qxvVsozZCsaPLy', '82928', '169482', 1, 1, '2020-03-28 16:00:03', '2020-03-28 16:04:23', 1, NULL, 'istanbul', '22387787', 'sari yer hoshsohbat sokagi 5 8', 'turkey', 1, 1, 'G4CA6XLIOYWDTQ5Z', 'nKvbHfarsrmOPPrMFAZjRv2rBjNchYShC7OSkAXNJbBCYGwZ3NXkYYFD9fSH', '2020-03-28 11:20:34', '2020-05-14 18:21:50', 0, 0, 2.5, 1, 0),
(55, 'Yaghoub Adelzadeh', 'yaghoub_adelzadeh', 'adelzadeh74@gmail.com', '+989126908194', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 5, NULL, '$2y$10$ywJNgbSMJorQbVL7ga3VXuJmtRLxdleDhy.3qSxvomx3jK94YYiRW', '15813', '136879', 1, 1, '2020-04-01 02:59:11', '2020-04-01 02:59:49', 1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, '2020-03-31 22:23:37', '2020-03-31 22:29:49', 0, 0, 2.5, 1, 0),
(56, 'Karen Jazmín López García', 'KarenLopez007', 'seo.relacionespublicas@gmail.com', '+50379544227', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 4, NULL, '$2y$10$.AE9XQXruklFotbjipveK.qPjSckzy0fZ/RgEl8VK4zzut56tLPny', '93144', '13483', 0, 1, '2020-04-05 23:15:03', '2020-04-05 23:27:38', 1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, '2020-04-05 18:37:30', '2020-04-05 18:57:38', 0, 0, 2.5, 1, 0),
(58, 'behnam1', 'behnam1', 'kohegamm@yahoo.com', '00989147838168', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 4, NULL, '$2y$10$hplU9YtynHbIcVCoSYxwMukh1jqqkB.jssL/iA1s7yAyY/OQa7Hmi', '32672', '116298', 1, 1, '2020-03-16 04:52:39', '2020-03-16 04:53:02', 1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'ECoxS5GCRdsPE0UAM3DKBYDyCZEgixLCRnTpAzAA4NRloUazQTuW12du0jJd', '2020-04-21 19:30:00', '2020-04-22 13:00:44', 0, 0, 2.5, 1, 0),
(59, 'behnamsds', 'adminsdsd', 'kohegeeeam@yahoo.com', '00989147838166', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 4, NULL, '$2y$10$G8Q6qHmxb4vcAMLgMFB2Fu4ysI66d14t8b4V05JvuVgcSufASR/gC', '48290', '73175', 0, 0, '2020-04-23 20:24:50', '2020-04-23 20:24:50', 1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'YnKCpLxgbtyNMmMJ7rgpmrh8qfrTBClFPjcEnU2xebfrw1CvxrzirPrkxfYP', '2020-04-23 15:53:50', '2020-04-23 15:53:50', 0, 0, 2.5, 1, 0),
(60, 'hesamsohrabi', 'hesams', 'sohrabiazarhesam@gmail.com', '00905519443765', NULL, NULL, NULL, 'image_secret_users/ZOpIncw0ED158781476115878147611759000bc5e6ad995cc3656c8c0d0cdb79262aa7a86eec9e0dde495d9a634640.png', 'image_secret_users/oe2ybl0sJD158781476115878147611759000bc5e6ad995cc3656c8c0d0cdb79262aa7a86eec9e0dde495d9a634640.png', 1, 1, 1, 1, 4, NULL, '$2y$10$Jb1.bL47oapTCydWWVpJ2ehT.tSnLppMjN7/xQB1eaMiZ5o1TJj9O', '29617', '112024', 1, 1, '2020-04-25 17:35:31', '2020-04-25 17:36:02', 1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, '2020-04-25 12:53:33', '2020-04-25 13:09:50', 0, 0, 2.5, 1, 0),
(61, 'behnamfghfh', 'behttnam', 'koheggggam@yahoo.com', '00989147838161', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 4, NULL, '$2y$10$Gi.Fk5kZA7e4hbvs6MU9Cum/Hi65VVWblCUV15/gCA0kqG0Y/KsQK', '93653', '98378', 0, 0, '2020-04-25 20:29:31', '2020-04-25 20:29:31', 1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 'Zs3J707HEu49GWCfeIMUszm3y3pYcy2PwLA3aVu9cDZndte1yILgdEgQoKOe', '2020-04-25 15:58:31', '2020-04-25 15:58:31', 0, 0, 2.5, 1, 0),
(62, 'Mehdi Motaharinejad', 'Mehdi', 'mahdimotahari@gmail.com', '00905383105573', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 5, NULL, '$2y$10$N6fQW4YVE3W07oedgxFh7.U.mWeMlFMDBWtbej2wj9qt6bFBLE7Bu', '66192', '888929', 1, 1, '2020-05-04 18:31:56', '2020-05-04 18:32:13', 1, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2020-05-04 13:56:47', '2020-05-04 14:02:13', 0, 0, 2.5, 1, 0),
(63, 'bahram', 'bahram', 'abdollahzadebahram@gmail.com', '00989366936864', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 5, NULL, '$2y$10$2YKBhsi.qvzQAmvNdQeN5ufBPk/ba8BLtLRI.yvDjACE9FmElJZrm', '57879', '622674', 1, 1, '2020-05-10 18:04:14', '2020-05-10 18:04:36', 1, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, '2020-05-10 13:29:50', '2020-05-11 20:07:56', 0, 0, 2.5, 1, 0),
(64, 'parinaz', 'parinazzz', 'parinazalipourmogaddam@gmail.com', '09145669275', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 3, NULL, '$2y$10$dom0ozZ9PUYWj0Ti1FfhsedRgg1akx0uQn2qTxh2IXuSg01MAc1aq', '3992', '25448', 0, 0, '2020-05-13 13:59:15', '2020-05-13 13:59:15', 1, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2020-05-13 09:28:15', '2020-05-13 09:28:15', 0, 0, 2.5, 1, 0),
(79, 'MahdiRahani', 'mahdi85', 'mehtirahani@gmail.com', '+989034697058', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 3, NULL, '$2y$10$fpfZHuBBuN/1SPgqlRfOIuY4zvdj4D92IyuPuhBFLfPxwI.AKEGSq', '77290', '79267', 1, 1, '2020-05-14 13:00:28', '2020-05-14 13:00:52', 1, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, '2020-05-14 08:29:50', '2020-05-14 08:30:52', 0, 0, 2.5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_crypto_balances`
--

CREATE TABLE `user_crypto_balances` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `gateway_id` int(11) NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_crypto_balances`
--

INSERT INTO `user_crypto_balances` (`id`, `user_id`, `gateway_id`, `balance`, `created_at`, `updated_at`) VALUES
(21, 44, 505, '0', '2020-03-15 23:58:23', '2020-05-14 20:03:07'),
(22, 44, 506, '0', '2020-03-15 23:58:23', '2020-05-14 20:03:07'),
(23, 44, 509, '0', '2020-03-15 23:58:23', '2020-05-14 20:03:07'),
(24, 44, 510, '0', '2020-03-15 23:58:23', '2020-05-14 20:03:07'),
(25, 45, 505, '0', '2020-03-16 00:03:10', '2020-05-14 20:03:07'),
(26, 45, 506, '0', '2020-03-16 00:03:10', '2020-05-14 20:03:07'),
(27, 45, 509, '0', '2020-03-16 00:03:10', '2020-05-14 20:03:07'),
(28, 45, 510, '0', '2020-03-16 00:03:10', '2020-05-14 20:03:07'),
(29, 46, 505, '0', '2020-03-16 00:07:38', '2020-05-14 20:03:07'),
(30, 46, 506, '0', '2020-03-16 00:07:38', '2020-05-14 20:03:07'),
(31, 46, 509, '0', '2020-03-16 00:07:38', '2020-05-14 20:03:07'),
(32, 46, 510, '0', '2020-03-16 00:07:38', '2020-05-14 20:03:07'),
(33, 47, 505, '0', '2020-03-16 00:27:07', '2020-05-14 20:03:07'),
(34, 47, 506, '0', '2020-03-16 00:27:07', '2020-05-14 20:03:07'),
(35, 47, 509, '0', '2020-03-16 00:27:07', '2020-05-14 20:03:07'),
(36, 47, 510, '0', '2020-03-16 00:27:07', '2020-05-14 20:03:07'),
(37, 48, 505, '0', '2020-03-16 00:31:29', '2020-05-14 20:03:07'),
(38, 48, 506, '0', '2020-03-16 00:31:29', '2020-05-14 20:03:07'),
(39, 48, 509, '0', '2020-03-16 00:31:29', '2020-05-14 20:03:07'),
(40, 48, 510, '0', '2020-03-16 00:31:29', '2020-05-14 20:03:07'),
(41, 49, 505, '0', '2020-03-16 00:32:59', '2020-05-14 20:03:07'),
(42, 49, 506, '0', '2020-03-16 00:32:59', '2020-05-14 20:03:07'),
(43, 49, 509, '0', '2020-03-16 00:32:59', '2020-05-14 20:03:07'),
(44, 49, 510, '0', '2020-03-16 00:32:59', '2020-05-14 20:03:07'),
(45, 50, 505, '0', '2020-03-16 01:16:59', '2020-05-14 20:03:07'),
(46, 50, 506, '0', '2020-03-16 01:16:59', '2020-05-14 20:03:07'),
(47, 50, 509, '0', '2020-03-16 01:16:59', '2020-05-14 20:03:07'),
(48, 50, 510, '0', '2020-03-16 01:16:59', '2020-05-14 20:03:07'),
(49, 51, 505, '2.8985', '2020-03-16 01:17:10', '2020-05-10 14:07:59'),
(50, 51, 506, '0', '2020-03-16 01:17:10', '2020-05-14 20:03:07'),
(51, 51, 509, '0', '2020-03-16 01:17:10', '2020-05-14 20:03:07'),
(52, 51, 510, '0', '2020-03-16 01:17:10', '2020-05-14 20:03:07'),
(53, 52, 505, '0', '2020-03-16 01:39:43', '2020-05-14 20:03:07'),
(54, 52, 506, '0', '2020-03-16 01:39:43', '2020-05-14 20:03:07'),
(55, 52, 509, '0', '2020-03-16 01:39:43', '2020-05-14 20:03:07'),
(56, 52, 510, '0', '2020-03-16 01:39:43', '2020-05-14 20:03:07'),
(57, 53, 505, '0.0003936842', '2020-03-17 11:32:26', '2020-05-14 19:27:41'),
(58, 53, 506, '0', '2020-03-17 11:32:26', '2020-05-14 20:03:07'),
(59, 53, 509, '0', '2020-03-17 11:32:26', '2020-05-14 20:03:07'),
(60, 53, 510, '0', '2020-03-17 11:32:26', '2020-05-14 20:03:07'),
(61, 54, 505, '0.000009731628999999945', '2020-03-28 11:20:34', '2020-05-14 19:27:41'),
(62, 54, 506, '0', '2020-03-28 11:20:34', '2020-05-14 20:03:07'),
(63, 54, 509, '0', '2020-03-28 11:20:34', '2020-05-14 20:03:07'),
(64, 54, 510, '0', '2020-03-28 11:20:34', '2020-05-14 20:03:07'),
(65, 55, 505, '0', '2020-03-31 22:23:37', '2020-05-14 20:03:07'),
(66, 55, 506, '0', '2020-03-31 22:23:37', '2020-05-14 20:03:07'),
(67, 55, 509, '0', '2020-03-31 22:23:37', '2020-05-14 20:03:07'),
(68, 55, 510, '0', '2020-03-31 22:23:37', '2020-05-14 20:03:07'),
(69, 56, 505, '0', '2020-04-05 18:37:30', '2020-05-14 20:03:07'),
(70, 56, 506, '0', '2020-04-05 18:37:30', '2020-05-14 20:03:07'),
(71, 56, 509, '0', '2020-04-05 18:37:30', '2020-05-14 20:03:07'),
(72, 56, 510, '0', '2020-04-05 18:37:30', '2020-05-14 20:03:07'),
(73, 59, 505, '0', '2020-04-23 15:53:51', '2020-05-14 20:03:07'),
(74, 59, 506, '0', '2020-04-23 15:53:51', '2020-05-14 20:03:07'),
(75, 59, 509, '0', '2020-04-23 15:53:51', '2020-05-14 20:03:07'),
(76, 59, 510, '0', '2020-04-23 15:53:51', '2020-05-14 20:03:07'),
(77, 58, 505, '0', '2020-04-23 15:53:51', '2020-05-14 20:03:07'),
(78, 60, 505, '0', '2020-04-25 12:53:33', '2020-05-14 20:03:07'),
(79, 60, 506, '0', '2020-04-25 12:53:33', '2020-05-14 20:03:07'),
(80, 60, 509, '0', '2020-04-25 12:53:33', '2020-05-14 20:03:07'),
(81, 60, 510, '0', '2020-04-25 12:53:33', '2020-05-14 20:03:07'),
(82, 61, 505, '0', '2020-04-25 15:58:31', '2020-05-14 20:03:07'),
(83, 61, 506, '0', '2020-04-25 15:58:31', '2020-05-14 20:03:07'),
(84, 61, 509, '0', '2020-04-25 15:58:31', '2020-05-14 20:03:07'),
(85, 61, 510, '0', '2020-04-25 15:58:31', '2020-05-14 20:03:07'),
(86, 62, 505, '0', '2020-05-04 13:56:47', '2020-05-14 20:03:07'),
(87, 62, 506, '0', '2020-05-04 13:56:47', '2020-05-14 20:03:07'),
(88, 62, 509, '0', '2020-05-04 13:56:47', '2020-05-14 20:03:07'),
(89, 62, 510, '0', '2020-05-04 13:56:47', '2020-05-14 20:03:07'),
(90, 63, 505, '0', '2020-05-10 13:29:50', '2020-05-14 20:03:07'),
(91, 63, 506, '0', '2020-05-10 13:29:50', '2020-05-14 20:03:07'),
(92, 63, 509, '0', '2020-05-10 13:29:50', '2020-05-14 20:03:07'),
(93, 63, 510, '0', '2020-05-10 13:29:50', '2020-05-14 20:03:07'),
(94, 64, 505, '0', '2020-05-13 09:28:15', '2020-05-14 20:03:07'),
(95, 64, 506, '0', '2020-05-13 09:28:15', '2020-05-14 20:03:07'),
(96, 64, 509, '0', '2020-05-13 09:28:15', '2020-05-14 20:03:07'),
(97, 64, 510, '0', '2020-05-13 09:28:15', '2020-05-14 20:03:07'),
(98, 65, 505, '0', '2020-05-13 10:23:41', '2020-05-14 20:03:07'),
(99, 65, 506, '0', '2020-05-13 10:23:41', '2020-05-14 20:03:07'),
(100, 65, 509, '0', '2020-05-13 10:23:41', '2020-05-14 20:03:07'),
(101, 65, 510, '0', '2020-05-13 10:23:41', '2020-05-14 20:03:07'),
(102, 67, 505, '0', '2020-05-13 14:33:11', '2020-05-14 20:03:07'),
(103, 67, 506, '0', '2020-05-13 14:33:11', '2020-05-14 20:03:07'),
(104, 67, 509, '0', '2020-05-13 14:33:11', '2020-05-14 20:03:07'),
(105, 67, 510, '0', '2020-05-13 14:33:11', '2020-05-14 20:03:07'),
(106, 68, 505, '0', '2020-05-13 14:34:47', '2020-05-14 20:03:07'),
(107, 68, 506, '0', '2020-05-13 14:34:47', '2020-05-14 20:03:07'),
(108, 68, 509, '0', '2020-05-13 14:34:47', '2020-05-14 20:03:07'),
(109, 68, 510, '0', '2020-05-13 14:34:47', '2020-05-14 20:03:07'),
(110, 69, 505, '0', '2020-05-13 14:36:32', '2020-05-14 20:03:07'),
(111, 69, 506, '0', '2020-05-13 14:36:32', '2020-05-14 20:03:07'),
(112, 69, 509, '0', '2020-05-13 14:36:32', '2020-05-14 20:03:07'),
(113, 69, 510, '0', '2020-05-13 14:36:32', '2020-05-14 20:03:07'),
(114, 70, 505, '0', '2020-05-13 14:38:16', '2020-05-14 20:03:07'),
(115, 70, 506, '0', '2020-05-13 14:38:16', '2020-05-14 20:03:07'),
(116, 70, 509, '0', '2020-05-13 14:38:16', '2020-05-14 20:03:07'),
(117, 70, 510, '0', '2020-05-13 14:38:16', '2020-05-14 20:03:07'),
(118, 71, 505, '0', '2020-05-13 14:44:50', '2020-05-14 20:03:07'),
(119, 71, 506, '0', '2020-05-13 14:44:50', '2020-05-14 20:03:07'),
(120, 71, 509, '0', '2020-05-13 14:44:50', '2020-05-14 20:03:07'),
(121, 71, 510, '0', '2020-05-13 14:44:50', '2020-05-14 20:03:07'),
(122, 72, 505, '0', '2020-05-13 14:46:02', '2020-05-14 20:03:07'),
(123, 72, 506, '0', '2020-05-13 14:46:02', '2020-05-14 20:03:07'),
(124, 72, 509, '0', '2020-05-13 14:46:02', '2020-05-14 20:03:07'),
(125, 72, 510, '0', '2020-05-13 14:46:02', '2020-05-14 20:03:07'),
(126, 73, 505, '0', '2020-05-13 14:53:46', '2020-05-14 20:03:07'),
(127, 73, 506, '0', '2020-05-13 14:53:46', '2020-05-14 20:03:07'),
(128, 73, 509, '0', '2020-05-13 14:53:46', '2020-05-14 20:03:07'),
(129, 73, 510, '0', '2020-05-13 14:53:46', '2020-05-14 20:03:07'),
(130, 74, 505, '0', '2020-05-13 14:54:47', '2020-05-14 20:03:07'),
(131, 74, 506, '0', '2020-05-13 14:54:47', '2020-05-14 20:03:07'),
(132, 74, 509, '0', '2020-05-13 14:54:47', '2020-05-14 20:03:07'),
(133, 74, 510, '0', '2020-05-13 14:54:47', '2020-05-14 20:03:07'),
(134, 75, 505, '0', '2020-05-13 14:56:35', '2020-05-14 20:03:07'),
(135, 75, 506, '0', '2020-05-13 14:56:35', '2020-05-14 20:03:07'),
(136, 75, 509, '0', '2020-05-13 14:56:35', '2020-05-14 20:03:07'),
(137, 75, 510, '0', '2020-05-13 14:56:35', '2020-05-14 20:03:07'),
(138, 76, 505, '0', '2020-05-13 15:15:59', '2020-05-14 20:03:07'),
(139, 76, 506, '0', '2020-05-13 15:15:59', '2020-05-14 20:03:07'),
(140, 76, 509, '0', '2020-05-13 15:15:59', '2020-05-14 20:03:07'),
(141, 76, 510, '0', '2020-05-13 15:15:59', '2020-05-14 20:03:07'),
(142, 77, 505, '0', '2020-05-13 16:53:10', '2020-05-14 20:03:07'),
(143, 77, 506, '0', '2020-05-13 16:53:10', '2020-05-14 20:03:07'),
(144, 77, 509, '0', '2020-05-13 16:53:10', '2020-05-14 20:03:07'),
(145, 77, 510, '0', '2020-05-13 16:53:10', '2020-05-14 20:03:07'),
(146, 78, 505, '0', '2020-05-13 16:56:46', '2020-05-14 20:03:07'),
(147, 78, 506, '0', '2020-05-13 16:56:46', '2020-05-14 20:03:07'),
(148, 78, 509, '0', '2020-05-13 16:56:46', '2020-05-14 20:03:07'),
(149, 78, 510, '0', '2020-05-13 16:56:46', '2020-05-14 20:03:07'),
(150, 79, 505, '0', '2020-05-14 08:29:50', '2020-05-14 20:03:07'),
(151, 79, 506, '0', '2020-05-14 08:29:50', '2020-05-14 20:03:07'),
(152, 79, 509, '0', '2020-05-14 08:29:50', '2020-05-14 20:03:07'),
(153, 79, 510, '0', '2020-05-14 08:29:50', '2020-05-14 20:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `advertise_deals`
--
ALTER TABLE `advertise_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_settings`
--
ALTER TABLE `basic_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cond`
--
ALTER TABLE `cond`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cryptos`
--
ALTER TABLE `cryptos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crypto_addvertises`
--
ALTER TABLE `crypto_addvertises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_convertions`
--
ALTER TABLE `deal_convertions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etemplates`
--
ALTER TABLE `etemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_a_payment`
--
ALTER TABLE `request_a_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trxes`
--
ALTER TABLE `trxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_crypto_balances`
--
ALTER TABLE `user_crypto_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertise_deals`
--
ALTER TABLE `advertise_deals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `basic_settings`
--
ALTER TABLE `basic_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cond`
--
ALTER TABLE `cond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cryptos`
--
ALTER TABLE `cryptos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `crypto_addvertises`
--
ALTER TABLE `crypto_addvertises`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deal_convertions`
--
ALTER TABLE `deal_convertions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `etemplates`
--
ALTER TABLE `etemplates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=511;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_a_payment`
--
ALTER TABLE `request_a_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trxes`
--
ALTER TABLE `trxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user_crypto_balances`
--
ALTER TABLE `user_crypto_balances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
