-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 06:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(30, 'Sports', 2),
(31, 'Business', 2),
(32, 'International', 2),
(33, 'Entertainment', 1),
(34, 'Technology', 1),
(35, 'Features', 0),
(36, 'Gio-Politics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(36, 'first sports news', 'you know i have settled for his loves ones', '30', '08 Feb, 2023', 24, 'Red Phone Gadgets and Electronics Shop Business Logo.png'),
(39, '2nd technology news', 'excuse me i wanna drive', '34', '08 Feb, 2023', 29, '2.png'),
(40, '1st entertainment news', 'listen, why don\'t you give me a call when you start taking thing a little more seriously', '33', '08 Feb, 2023', 29, 'tshirt-hanging.jpg'),
(44, '2nd sports news', 'Read 3 floating-point numbers. After, print the roots of bhaskara’s formula. If it\'s impossible to calculate the roots because a division by zero or a square root of a negative number, presents the message “Impossivel calcular”.', '30', '11 Feb, 2023', 24, '8.png'),
(43, 'business news', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publica', '31', '09 Feb, 2023', 24, '0_Om5dgq9c82RyuK8v.jpg'),
(50, 'Another International News', 'Personalize it to your needs\r\nWith Editor, you can add custom words (like names you frequently use or acronyms) to create your personal dictionary; look for “Add to dictionary” when Editor makes a spelling suggestion. Your personal dictionary roams with you wherever you use Editor – across the web with browser extension and built-in to your Microsoft 365 apps.  We’ve also made it easy to skip all occurrences of a spelling correction by selecting Ignore All, or skip unwanted grammar suggestions by selecting Ignore. Editor will now automatically correct misspelled words as you type. A new green highlight will show you that a word has been autocorrected. In addition, Settings gives you a way to fine-tune your preferences for writing suggestions and personalize it even further.', '32', '13 Feb, 2023', 33, 'Capture.PNG'),
(47, '1st gio politics news', 'Your username and password are only for your own use. This is not permitted to share with anyone. In case of sharing your account can be terminated at any time and you will no longer be able to access your course materials.\r\nny type of copy and distribution of course materials is completely prohibited without the permission of the authority. In these cases, the authority can take legal action. We hope all will cooperate for betterment.\r\nny kind of misbehavior or disrespectful behavior towards institute or official members (Course-related group/ Institutional page/Phone call/Inboxing) will not be tolerable. For this kind of activity any student, SR DREAM IT Authority has the ability to take legal action and cancel the admission without any refund. This is applicable to both Affiliates and Students.', '36', '12 Feb, 2023', 30, '1.png'),
(48, 'another features news', 'Your username and password are only for your own use. This is not permitted to share with anyone. In case of sharing your account can be terminated at any time and you will no longer be able to access your course materials.\r\n• Any type of copy and distribution of course materials is completely prohibited without the permission of the authority. In these cases, the authority can take legal action. We hope all will cooperate for betterment.\r\n• Any kind of misbehavior or disrespectful behavior towards institute or official members (Course-related group/ Institutional page/Phone call/Inboxing) will not be tolerable. For this kind of activity any student, SR DREAM IT Authority has the ability to take legal action and cancel the admission without any refund. This is applicable to both Affiliates and Students.', '35', '12 Feb, 2023', 30, 'meme snap.PNG'),
(51, 'International SS news', 'Editor provides advanced writing assistance with grammar, spelling, and style suggestions across the web (1) so you can confidently write clear, concise posts and emails. \r\n\r\nWrite like a pro with intelligent writing assistance\r\nNail the basics with free grammar, spelling, and punctuation proofing. Go beyond basics with advanced style-checking for issues like clarity, conciseness, formality, vocabulary, and much more with premium (requires a Microsoft 365 subscription).\r\n\r\nPersonalize it to your needs\r\nWith Editor, you can add custom words (like names you frequently use or acronyms) to create your personal dictionary; look for “Add to dictionary” when Editor makes a spelling suggestion. Your personal dictionary roams with you wherever you use Editor – across the web with browser extension and built-in to your Microsoft 365 apps.  We’ve also made it easy to skip all occurrences of a spelling correction by selecting Ignore All, or skip unwanted grammar suggestions by selecting Ignore. Editor will now automatically correct misspelled words as you type. A new green highlight will show you that a word has been autocorrected. In addition, Settings gives you a way to fine-tune your preferences for writing suggestions and personalize it even further.\r\n\r\nWrite anywhere\r\nGet writing assistance on sites like LinkedIn, Gmail, Facebook, and other favorites with this browser extension. If you want Editor’s assistance in the Office apps where you write the most, open Word or Outlook on the web and get suggestions to improve your documents and email.\r\n\r\nGet assistance in multiple languages\r\nCheck spelling and grammar for up to three languages at the same time with multi-language proofing. Editor checks spelling in more than 80 languages and provides grammar checking and writing-style refinements in 21 languages (2). See the full list of supported languages below.\r\n\r\nLanguages available for spellchecking: Afrikaans, Albanian, Arabic, Armenian, Assamese, Azerbaijani - (Latin), Bangla (Bengali India), Bangla (Bangladesh), Basque (Basque), Bosnian – (Latin), Bulgarian, Catalan, Chinese (Simplified), Chinese (Traditional), Croatian, Czech, Danish, Dutch, English, Estonian, Finnish, French, Galician, Georgian, German, Greek, Gujarati, Hausa - Latin script, Hebrew, Hindi, Hungarian, Icelandic, Igbo, Indonesian, Irish Gaelic, isiXhosa, isiZulu, Italian, Japanese, Kannada, Kazakh, Kinyarwanda, Kiswahili, Konkani, Korean, Kyrgyz, Latvian, Lithuanian, Luxembourgish, Macedonian (North Macedonia), Malay (Brunei), Malay (Latin), Malayalam, Maltese, M?ori, Marathi, Nepali, Norwegian (Bokmål), Norwegian (Nynorsk), Odia, Pashto, Persian (Farsi), Polish, Portuguese (Brazil), Portuguese (Portugal), Punjabi (Gurmukhi), Romanian, Romansh, Russian, Scottish Gaelic, Serbian - (Cyrillic, Serbia), Serbian - (Latin, Serbia), Sesotho sa Leboa, Setswana, Sinhala, Slovak, Slovenian, Spanish, Swedish, Tamil, Tatar (Cyrillic), Telugu, Thai, Turkish, Ukrainian, Urdu, Uzbek - (Latin), Valencian, Vietnamese, Welsh, Wolof, Yoruba. \r\n\r\nLanguages available for grammar and refinements: Arabic, Czech, Danish, Dutch, English, Finnish, French, German, Hebrew, Hungarian, Italian, Japanese, Korean, Norwegian (Bokmål), Polish, Portuguese (Brazil), Portuguese (Portugal), Russian, Spanish, Swedish, Turkish\r\n\r\nYou can find more information on language availability here: https://support.microsoft.com/office/editor-s-spelling-grammar-and-refinement-availability-by-language-ecd60e9f-6b2e-4070-b30c-42efa6cff55a\r\n \r\nGet Editor for Chrome here: https://chrome.google.com/webstore/detail/microsoft-editor-spelling/gpaiobkfhnonedkhhfjpmhdalgeoebfa?authuser=2\r\n\r\n1.	Available for Edge or Chrome browsers and requires a Microsoft Account. Editor connects to a Microsoft online service that offers spelling, grammar, and refinement suggestions for your writing on most websites. \r\n2.	Not all languages have the same set of refinements.\r\n \r\nBy installing the app, you agree to these terms and conditions:  \r\n \r\nPLEASE NOTE: Refer to your license terms for your Microsoft Account or Microsoft 365 subscription as applicable (the \"extension\") to identify the entity licensing this extension to you and for support information. The license terms for the Microsoft Account or Microsoft 365 subscription as applicable apply to your use of this extension. ', '32', '13 Feb, 2023', 35, 'Screenshot (1).png'),
(53, '2nd Business News', 'ma das melhores disputas de título por pênalti. Não é porque o Palmeiras não venceu, mas apenas porque sou flamenguista! fhdsi fdskof foidjfoidsjfoijds foidjsoifdosif oijsdiof dosfkdsjoifh dsoifkjosfs fdf dskjfhjisdnf jjsf dskjfnjisdf jsfs fsijdf sjijfds fishf jsifs jifis fsifu9shfuhdsif kjsjfhjsifh ishaijhdfji kjj kjshfijsh kjdfkdjsihfji', '31', '13 Feb, 2023', 35, '1676307467-Book-Wallpapers-HD-Free-Download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `website_name` varchar(40) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `footer_desc` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`website_name`, `logo`, `footer_desc`) VALUES
('News Sites', 'news 2.png', '© Copyright 2023 News | Powered by Ariful Asfake Sunny');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'Hasib', 'Tanvir', 'hasibtan', '21232f297a57a5a743894a0e4a801fc3', 1),
(27, 'Alex', 'Enne', 'enne', '21232f297a57a5a743894a0e4a801fc3', 1),
(28, 'Rokib', 'Hasan', 'rokibhassan', '21232f297a57a5a743894a0e4a801fc3', 1),
(29, 'Javir', 'Ahsan', 'javirsan', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(30, 'Wahid', 'Iqbal', 'iqbalwahi', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(31, 'Israr', 'Sifat', 'israrsomoy', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(32, 'Kamruzzaman', 'Kamal', 'kamal5', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(33, 'Rifat', 'Karim', 'rifathk', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(35, 'Slavator', 'Maroni', 'smaroni', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
