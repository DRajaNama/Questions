-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2018 at 07:43 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questions_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adv`
--

CREATE TABLE `tbl_adv` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stoped` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_adv`
--

INSERT INTO `tbl_adv` (`id`, `user_id`, `title`, `image`, `type`, `created`, `stoped`, `status`) VALUES
(1, 6, 'First ', 'wall.png', 'slider', '2018-01-16 09:57:01', '2018-01-21 18:30:00', 'active'),
(2, 6, 'Second', '60886-1280.jpg', 'slider', '2018-01-17 05:30:05', '2018-01-21 18:30:00', 'active'),
(3, 6, 'Third', 'MountainDayNepal_EN-IN9348941841_1920x1080.jpg', 'slider', '2018-01-17 07:19:46', '2018-01-21 18:30:00', 'active'),
(6, 6, 'Fouth', '21151310_2000153776885898_6126462242034165331_n.jpg', 'slider', '2018-01-17 09:11:32', '2018-01-21 18:30:00', 'active'),
(11, 6, 'Fifth', '854131082.png', 'slider', '2018-01-17 12:28:05', '2018-01-23 18:30:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answers`
--

CREATE TABLE `tbl_answers` (
  `id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `answer` longtext NOT NULL,
  `accepted` enum('yes','no') NOT NULL DEFAULT 'no',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_answers`
--

INSERT INTO `tbl_answers` (`id`, `questions_id`, `user_id`, `answer`, `accepted`, `created`, `modified`) VALUES
(1, 3, 2, '<p>Now if i want to go back through a link to back page... How can I divert the user back? I can\'t make the URL go back.</p><p>Now if i want to go back through a link to back page... How can I divert the user back? I can\'t make the URL go back.</p><p>Now if i want to go back through a link to back page... How can I divert the user back? I can\'t make the URL go back.</p>', 'yes', '2017-12-28 06:21:48', '2017-12-28 06:21:48'),
(2, 3, 1, '<p>Now if i want to go back through a link to back page... How can I divert the user back? I can\'t make the URL go back.</p><p>This is First <a href=\"http://WWW.google.com\"><i><strong>Question</strong></i></a> description that contain <strong>error</strong></p>', 'yes', '2017-12-28 06:22:53', '2017-12-28 06:22:53'),
(3, 3, 2, '<p>Now if i want to go back through a link to back page... How can I divert the user back? I can\'t make the URL go back.</p><p>This is First <a href=\"http://WWW.google.com\"><i><strong>Question</strong></i></a> description that contain <strong>error</strong></p><p>&nbsp;</p><p>Unfortunately, the designers of regular expressions (the ones in JavaScript, anyway) did not think much about internationalization when designing them. \\w only matches a-z, A-Z, and _, and so [^\\w\\-]+ means [^a-zA-Z_\\-]+. Other dialects of regular expressions have a unicode-enabled word pattern, but your best bet for JavaScript is to have a blacklist of symbols (you mentioned :!#@$$#@^%#^. You can do that with something like [:!#@$$#@^%#^]+ (instead of [^\\w\\-]+).</p>', 'yes', '2017-12-28 06:23:33', '2017-12-28 06:23:33'),
(4, 6, 2, '<p>I have coded a simple client and server in python, I have no problem to understand and run the client however I have an issue understanding and running the server. This is my code for the client ...</p>', 'no', '2017-12-28 09:03:26', '2017-12-28 09:03:26'),
(5, 6, 2, '<p>I have coded a simple client and server in python, I have no problem to understand and run the client however I have an issue understanding and running the server. This is my code for the client ...</p>', 'no', '2017-12-28 09:03:35', '2017-12-28 09:03:35'),
(6, 6, 2, '<p>I have this object: { 37bb7aa0-ced9-490c-bdae-7e09aabbd92c: { ... }, 13531c7f-a480-4b5b-8b1b-d713e2084d01: { ... }, a61d4ff2-f0e0-4848-a3b6-5df2d9f8e2c9: { ... } } I wanted to create an array ....</p>', 'no', '2017-12-28 09:04:52', '2017-12-28 09:04:52'),
(7, 5, 2, '<p>public static void main(String[] args) {\r\n &nbsp; &nbsp;Scanner in = new Scanner(System.in);\r\n &nbsp; &nbsp;int t = in.nextInt();\r\n &nbsp; &nbsp;for (int j = 1; j &lt;= t; j++) {\r\n &nbsp; &nbsp; &nbsp; &nbsp;String str = in.next();\r\n &nbsp; &nbsp; &nbsp; &nbsp;char[] ch = str.toCharArray();\r\n &nbsp; &nbsp; &nbsp; &nbsp;quicksort(ch,0,ch.length-1);\r\n &nbsp; &nbsp; &nbsp; &nbsp;String s = \"\";\r\n &nbsp; &nbsp; &nbsp; &nbsp;for (int i = 0; i &lt; ch.length / 2; i++) {\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;s += ch[i];\r\n &nbsp; &nbsp; &nbsp; &nbsp;}\r\n &nbsp; &nbsp; &nbsp; &nbsp;s += ch[ch.length - 1];\r\n &nbsp; &nbsp; &nbsp; &nbsp;for (int i = ch.length - 2; i &gt;= ch.length / 2; i--) {\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;s += ch[i];\r\n &nbsp; &nbsp; &nbsp; &nbsp;}\r\n &nbsp; &nbsp; &nbsp; &nbsp;System.out.println(s);\r\n &nbsp; &nbsp;}\r\n}</p>', 'no', '2017-12-28 09:09:48', '2017-12-28 09:09:48'),
(8, 9, 1, '<p>My output string is supposed to give me \"acb\" on my input (t=1 and str=\"abc\"). And yet the compiler on HackerEarth gives me the output 1. What am I doing wrong?</p>', 'no', '2017-12-28 09:24:16', '2017-12-28 09:24:16'),
(9, 2, 2, '<p>I am a novice in angular and I have a silly problem, how can I show actual number of items outside *ngFor loop ?</p><p>I\'m using filter and pagination pipes like this</p><p>*ngFor=\"let item of items| filterBy: [\'name\',\'category\']: queryString | paginate: config; let i = index; let c = count\"</p><p>I know that there is a variable \'count\' but of course it is available only in that loop, how can I get this variable in component, do I need to create new component, put it in that loop and pass \'count\' through directives or there is some simpler, cleaner way?</p>', 'no', '2017-12-28 10:02:11', '2017-12-28 10:02:11'),
(10, 1, 2, '<blockquote><p>Looks like your points field in the database is an integer, and you are trying to access it like a string : your query should look like <strong>UPDATE users SET</strong> points = \'points + 1000\' WHERE username = <i><strong>\'thomas\'</strong></i> ;;; Maybe you have some way of indicating that to CI ? I don\'t know CI well enough to help more, sorry.</p></blockquote>', 'no', '2017-12-28 10:58:00', '2017-12-28 10:58:00'),
(11, 7, 1, '<p>Runs the selection query and returns the result. Can be used by itself to retrieve all records from a table:</p><p>$query = $this-&gt;db-&gt;get(\'mytable\'); &nbsp;// Produces: SELECT * FROM mytable\r\n</p><p>The second and third parameters enable you to set a limit and offset clause:</p><p>$query = $this-&gt;db-&gt;get(\'mytable\', 10, 20);\r\n\r\n// Executes: SELECT * FROM mytable LIMIT 20, 10\r\n// (in MySQL. Other databases have slightly different syntax)\r\n</p>', 'no', '2017-12-29 04:29:12', '2017-12-29 04:29:12'),
(12, 4, 1, '<p>The second parameter enables you to set whether or not the query builder query will be reset (by default it will be reset, just like when using $this-&gt;db-&gt;get()):</p><p>echo $this-&gt;db-&gt;limit(10,20)-&gt;get_compiled_select(\'mytable\', FALSE);\r\n\r\n// Prints string: SELECT * FROM mytable LIMIT 20, 10\r\n// (in MySQL. Other databases have slightly different syntax)\r\n\r\necho $this-&gt;db-&gt;select(\'title, content, date\')-&gt;get_compiled_select();\r\n\r\n// Prints string: SELECT title, content, date FROM mytable LIMIT 20, 10\r\n</p>', 'yes', '2017-12-29 04:30:25', '2017-12-29 04:30:25'),
(13, 3, 1, '<p>$row[\'data\']-&gt;about</p>', 'yes', '2017-12-30 11:42:30', '2017-12-30 11:42:30'),
(14, 3, 3, '<p>Unfortunately, the designers of regular expressions (the ones in JavaScript, anyway) did not think much about internationalization when designing them.</p>', 'yes', '2018-01-02 12:44:04', '2018-01-02 12:44:04'),
(15, 3, 2, '<p>unicode-enabled word pattern, but your best bet for JavaScript is to have a blacklist of symbols (you mentioned :!#@$$#@^%#^. You can do that with something lik</p>', 'no', '2018-01-03 05:13:08', '2018-01-03 05:13:08'),
(16, 11, 6, '<p>Quetion Answers Demo&nbsp;</p>', 'no', '2018-01-16 06:25:25', '2018-01-16 06:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bms_user`
--

CREATE TABLE `tbl_bms_user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bms_user`
--

INSERT INTO `tbl_bms_user` (`id`, `username`, `email`, `password`, `created`) VALUES
(1, 'Raja Nama', 'Rajanamdav@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2018-01-12 11:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bs_page`
--

CREATE TABLE `tbl_bs_page` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` enum('starter','recommended','premium') DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `limits` int(11) NOT NULL,
  `plan_duration` date NOT NULL,
  `time_status` enum('active','inactive') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bs_page`
--

INSERT INTO `tbl_bs_page` (`id`, `user_id`, `plan`, `cost`, `limits`, `plan_duration`, `time_status`, `status`, `created`, `modified`) VALUES
(1, 6, 'starter', 5, 5, '2018-01-24', 'active', 'active', '2018-01-08 11:23:48', '2018-01-17 12:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  `total_link_question` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `description`, `total_link_question`, `status`) VALUES
(1, 'Education', 'This is Education or system', 2, 'active'),
(2, 'Technology', 'This is technology', 2, 'active'),
(4, 'Business', 'In this all type of Business are in here', 2, 'active'),
(5, 'Entertainment', 'This is entertainment', 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cate_ques`
--

CREATE TABLE `tbl_cate_ques` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cate_ques`
--

INSERT INTO `tbl_cate_ques` (`id`, `category_id`, `question_id`) VALUES
(1, 1, 14),
(2, 1, 12),
(3, 1, 11),
(4, 1, 1),
(5, 2, 2),
(6, 4, 3),
(7, 4, 4),
(8, 4, 5),
(9, 2, 6),
(10, 2, 7),
(11, 1, 9),
(12, 1, 10),
(13, 4, 15),
(14, 4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complain`
--

CREATE TABLE `tbl_complain` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(15) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(32) NOT NULL,
  `message` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` enum('pending','process','approved','done') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `email`, `name`, `message`, `created`, `action`) VALUES
(1, 'Rajanamdav@gmail.com', 'Raja Nama', 'This is test message', '2018-01-06 09:03:16', 'process'),
(2, 'Dharmendra@gmail.com', 'Dharmendra', 'this is second test', '2018-01-06 09:03:37', 'done'),
(3, 'Dharmendra@gmail.com', 'Dharmendra', 'this is second test', '2018-01-06 09:03:37', 'approved'),
(4, 'Rajanamdav@gmail.com', 'Raja Nama', 'This is test message', '2018-01-06 09:03:16', 'process');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fav_tag`
--

CREATE TABLE `tbl_fav_tag` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fav_tag`
--

INSERT INTO `tbl_fav_tag` (`id`, `user_id`, `tag_id`) VALUES
(1, 3, 10),
(2, 3, 1),
(3, 3, 14),
(4, 3, 1),
(5, 2, 10),
(7, 2, 1),
(9, 2, 14),
(10, 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow`
--

CREATE TABLE `tbl_follow` (
  `id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_follow`
--

INSERT INTO `tbl_follow` (`id`, `follower_id`, `following_id`, `created`) VALUES
(1, 2, 1, '2018-01-02 12:14:44'),
(2, 3, 3, '2018-01-02 12:41:40'),
(3, 3, 1, '2018-01-02 12:41:44'),
(4, 2, 2, '2018-01-15 09:06:49'),
(5, 2, 6, '2018-01-15 09:06:49'),
(6, 3, 6, '2018-01-15 09:07:04'),
(7, 4, 6, '2018-01-16 09:07:04'),
(8, 3, 6, '2018-01-16 09:07:08'),
(9, 4, 6, '2018-01-17 09:07:08'),
(10, 2, 3, '2018-01-30 12:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `total_no_answer` int(11) NOT NULL,
  `viewers` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `object_link_ld` int(11) NOT NULL,
  `taags` varchar(50) NOT NULL,
  `cats` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`id`, `creator_id`, `question`, `description`, `total_no_answer`, `viewers`, `level`, `status`, `created`, `modified`, `object_link_ld`, `taags`, `cats`) VALUES
(1, 2, 'CSS text ellipsis when using variable width divs', '\"<p>This is First <a href=\\\"WWW.google.com\\\"><i><strong>Question<\\/strong><\\/i><\\/a> description that contain <strong>error<\\/strong><\\/p>\"', 1, 98, 2, 'active', '2017-12-26 11:59:49', '2018-02-15 10:37:36', 0, 'question, new, 2018', '1'),
(2, 2, 'Android TV Portrait Mode', '\"<p>This is First <a href=\\\"WWW.google.com\\\"><i><strong>Question<\\/strong><\\/i><\\/a> description that contain <strong>error<\\/strong><\\/p>\"', 1, 92, 1, 'active', '2017-12-26 11:59:49', '2018-01-30 12:52:11', 0, 'question,first,demo, this tag', '1'),
(3, 1, 'Autocomplete not working in only one ViewController', '\"<p>This is First <a href=\\\"WWW.google.com\\\"><i><strong>Question<\\/strong><\\/i><\\/a> description that contain <strong>error<\\/strong><\\/p>\"', 6, 155, 1, 'active', '2017-12-26 11:59:49', '2018-01-19 05:01:55', 0, 'question,first,demo, this tag , 2020', 'Business'),
(4, 2, 'App terminated by SIGSEGV', '\"<p>1 &nbsp; libsystem_platform.dylib &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0x0000000195d6494c _sigtramp + 52&nbsp;<\\/p><p>2 &nbsp; libobjc.A.dylib &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 0x0000000195551724 + 564&nbsp;<\\/p><p>3 &nbsp; CoreFoundation &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0x0000000183c45074 _CFAutoreleasePoolPop + 28&nbsp;<\\/p><p>4 &nbsp; CoreFoundation &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0x0000000183d198a8 + 1500&nbsp;<\\/p><p>5 &nbsp; CoreFoundation &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0x0000000183c452d4 CFRunLoopRunSpecific + 396&nbsp;<\\/p><p>6 &nbsp; GraphicsServices &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0x000000018d4636fc GSEventRunModal + 168&nbsp;<\\/p><p>7 &nbsp; UIKit &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 0x000000018880afac UIApplicationMain + 1488&nbsp;<\\/p><p>8 &nbsp; iphone-pay &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;0x0000000100065784 iphone-pay + 38788&nbsp;<\\/p><p>9 &nbsp; libdyld.dylib &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 0x0000000195bb6a08 + 4<\\/p>\"', 1, 22, 1, 'active', '2017-12-26 11:59:49', '2018-01-12 10:05:39', 0, 'question,first,demo, this tag , 2018', 'Business'),
(5, 1, 'Query Builder Class', '\"<p>This is First <a href=\\\"WWW.google.com\\\"><i><strong>Question<\\/strong><\\/i><\\/a> description that contain <strong>error<\\/strong><\\/p>\"', 1, 12, 1, 'active', '2017-12-26 11:59:49', '2018-01-16 07:00:34', 0, 'question,first,demo, this tag', 'Business'),
(6, 1, 'Limiting or Counting Results', '\"<p>This is First <a href=\\\"WWW.google.com\\\"><i><strong>Question<\\/strong><\\/i><\\/a> description that contain <strong>error<\\/strong><\\/p>\"', 3, 17, 1, 'active', '2017-12-26 11:59:49', '2018-02-15 10:54:02', 0, 'question,first', 'Technology'),
(7, 2, 'Resetting Query Builder', '\"<p>This is First <a href=\\\"WWW.google.com\\\"><i><strong>Question<\\/strong><\\/i><\\/a> description that contain <strong>error<\\/strong><\\/p>\"', 1, 14, 1, 'active', '2017-12-26 11:59:49', '2018-02-01 06:16:31', 0, 'question,first,demo, this tag', 'Technology'),
(9, 2, 'Why is my string giving me a numeric value?', '\"<p>public static void main(String[] args) { &nbsp; &nbsp;<\\/p><p>Scanner in = new Scanner(System.in); &nbsp; &nbsp;<\\/p><p>int t = in.nextInt(); &nbsp; &nbsp;<\\/p><p>for (int j = 1; j &lt;= t; j++) { &nbsp; &nbsp; &nbsp;<\\/p><p>&nbsp; String str = in.next(); &nbsp; &nbsp; &nbsp;&nbsp;<\\/p><p>&nbsp;char[] ch = str.toCharArray(); &nbsp; &nbsp;&nbsp;<\\/p><p>&nbsp; &nbsp;quicksort(ch,0,ch.length-1); &nbsp; &nbsp; &nbsp;&nbsp;<\\/p><p>&nbsp;String s = \\\"\\\"; &nbsp; &nbsp; &nbsp; &nbsp;<\\/p><p>for (int i = 0; i &lt; ch.length \\/ 2; i++) { &nbsp;&nbsp;<\\/p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;s += ch[i]; &nbsp; &nbsp; &nbsp; &nbsp;<\\/p><p>} &nbsp; &nbsp; &nbsp;&nbsp;<\\/p><p>&nbsp;s += ch[ch.length - 1]; &nbsp; &nbsp; &nbsp;&nbsp;<\\/p><p>&nbsp;for (int i = ch.length - 2; i &gt;= ch.length \\/ 2; i--) { &nbsp;<\\/p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; s += ch[i]; &nbsp;&nbsp;<\\/p><p>&nbsp; &nbsp; &nbsp;} &nbsp;<\\/p><p>&nbsp; &nbsp; &nbsp; System.out.println(s); &nbsp;&nbsp;<\\/p><p>&nbsp;}<\\/p><p>}<\\/p>\"', 1, 15, 1, 'active', '2017-12-28 09:21:56', '2018-01-12 10:06:55', 0, 'Java,Java_program', 'Education'),
(10, 2, 'Update a Table Field to its Value Plus a Constant on MYSQL w/o PHP', '\"<p>3 down vote <a href=\\\"https:\\/\\/stackoverflow.com\\/questions\\/14605924\\/update-a-table-field-to-its-value-plus-a-constant-on-mysql-w-o-php#\\\">favorite<\\/a><\\/p><p><strong>1<\\/strong><\\/p><p>I would like to perform an UPDATE in MYSQL in which I take a field value, add a constant and save the new value in the same field.<\\/p><p>Let\'s assume that we have a column called OldValue in a table called aTable.<\\/p><p>Pseudocode could be:<\\/p><p>UPDATE aTable SET OldValue = OldValue + 220 WHERE someField = someValue<\\/p>\"', 0, 3, 1, 'active', '2018-01-02 06:05:20', '2018-01-12 10:07:03', 0, 'this, datd', 'Education'),
(11, 2, 'block malicious scripts injection on js and php', '\"<p>I am working on a file hosting system that allows users to host static and non static files. By this I mean files such as html and jpg are static. And files such as php and sql are non static. I have ...&nbsp;<\\/p>\"', 1, 24, 1, 'active', '2018-01-02 07:13:21', '2018-02-01 06:04:42', 0, 'javascript, php, codeigniter', 'Education'),
(12, 2, 'How can I split a comma delimited string into an array in PHP?', '\"<p>I need to split my string input into an array at the commas.<\\/p><p>How can I go about accomplishing this?<\\/p><p><strong>Input<\\/strong>:<\\/p><p>9,admin@example.com,8<\\/p>\"', 0, 4, 1, 'active', '2018-01-03 06:07:41', '2018-01-12 10:07:32', 0, 'input, php , string, array', 'Education'),
(14, 2, 'How to access PHP variables in JavaScript or jQuery rather than <?php echo $variable ?> [duplicate]', '\"<p>How do I access PHP variables in JavaScript or jQuery? Do I have to write<\\/p><p><strong>&lt;?php echo $variable1 ?&gt;\\r\\n<\\/strong><\\/p><p><strong>&lt;?php echo $variable2 ?&gt;\\r\\n<\\/strong><\\/p><p><strong>&lt;?php echo $variable3 ?&gt;\\r\\n...\\r\\n<\\/strong><\\/p><p><strong>&lt;?php echo $variablen ?&gt;<\\/strong><\\/p><p>I know I can store some variables in cookies, and access these values via cookies, but values in cookies are relatively stable values. Moreover, there is a limit, you can not store many values in cookies, and the method is not that convenient. Is there a better way to do it?<\\/p>\"', 0, 3, 1, 'active', '2018-01-12 09:12:07', '2018-01-30 12:51:56', 0, '', 'Education'),
(15, 6, 'Questions Demo here', '\"<blockquote><h4><i><strong>this is Question demo<\\/strong><\\/i><\\/h4><\\/blockquote>\"', 0, 0, 1, 'active', '2018-01-18 12:04:35', '2018-01-18 12:04:35', 0, '', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seo`
--

CREATE TABLE `tbl_seo` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(30) NOT NULL,
  `meta_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_seo`
--

INSERT INTO `tbl_seo` (`id`, `meta_key`, `meta_value`) VALUES
(1, 'site_title', 'Questions'),
(2, 'site_description', 'This is the questions and answers website'),
(3, 'site_keyword', '2018'),
(4, 'site_index', 'true'),
(5, 'site_follow', 'true'),
(6, 'question_title', 'Question | %question_title%'),
(7, 'question_index', 'true'),
(8, 'question_follow', 'true'),
(9, 'search_page', 'Search Page'),
(10, 'notfound_page', '404 Page');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_states`
--

CREATE TABLE `tbl_site_states` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `os` varchar(30) NOT NULL,
  `country` varchar(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_site_states`
--

INSERT INTO `tbl_site_states` (`id`, `ip_address`, `browser`, `os`, `country`, `created`) VALUES
(1, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-02-17 12:58:51'),
(2, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-02-21 04:28:56'),
(3, '127.0.0.1', 'Firefox', 'Windows 10', 'US', '2018-02-14 04:29:01'),
(4, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 04:29:10'),
(5, '127.0.0.1', 'Firefox', 'Windows 10', 'US', '2018-02-09 04:29:22'),
(6, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:52:49'),
(7, '127.0.0.1', 'Firefox', 'Windows 10', 'AU', '2018-05-18 05:52:53'),
(8, '127.0.0.1', 'Firefox', 'Windows 10', 'AU', '2018-07-18 05:52:56'),
(9, '127.0.0.1', 'Firefox', 'Windows 10', 'AU', '2018-05-18 05:52:59'),
(10, '127.0.0.1', 'Firefox', 'Windows 10', 'AU', '2018-05-18 05:53:02'),
(11, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-05-18 05:53:04'),
(12, '127.0.0.1', 'Firefox', 'Windows 10', 'AU', '2018-07-18 05:53:07'),
(13, '127.0.0.1', 'Firefox', 'Windows 10', 'AU', '2018-06-18 05:53:14'),
(14, '127.0.0.1', 'Firefox', 'Windows 10', 'AU', '2018-08-18 05:53:21'),
(15, '127.0.0.1', 'Firefox', 'Windows 10', 'AU', '2018-06-18 05:53:24'),
(16, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-09-18 05:53:38'),
(17, '127.0.0.1', 'Firefox', 'Windows 10', 'AU', '2018-11-18 05:53:41'),
(18, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-10-18 05:53:49'),
(19, '127.0.0.1', 'Firefox', 'Windows 10', 'US', '2018-07-18 05:53:51'),
(20, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-07-18 05:54:00'),
(21, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-04-18 05:54:03'),
(22, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-04-18 06:13:49'),
(23, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-04-18 06:13:53'),
(24, '127.0.0.1', 'Firefox', 'Windows 10', 'US', '2018-04-18 06:27:30'),
(25, '127.0.0.1', 'Firefox', 'Windows 10', 'US', '2018-04-18 06:27:33'),
(26, '127.0.0.1', 'Firefox', 'Windows 10', 'US', '2018-04-18 06:27:37'),
(27, '127.0.0.1', 'Firefox', 'Windows 10', 'US', '2018-12-18 06:28:11'),
(28, '127.0.0.1', 'Firefox', 'Windows 10', 'US', '2018-04-18 06:28:15'),
(29, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-04-18 06:29:25'),
(30, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-04-18 06:29:28'),
(31, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-11-18 06:29:33'),
(32, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-11-18 06:29:36'),
(33, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-11-18 08:54:42'),
(34, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-08-18 08:54:47'),
(35, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 08:59:53'),
(36, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-11-18 09:00:17'),
(37, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-03-18 09:43:59'),
(38, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-03-18 09:44:01'),
(39, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-03-18 09:44:04'),
(40, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 09:48:33'),
(41, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 09:48:35'),
(42, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 09:48:39'),
(43, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 09:48:43'),
(44, '127.0.0.1', 'Firefox', 'Windows 10', 'BR', '2018-01-18 09:48:46'),
(45, '127.0.0.1', 'Firefox', 'Windows 10', 'BR', '2018-01-18 09:49:03'),
(46, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-01-18 09:49:06'),
(47, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-01-18 09:49:08'),
(48, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-01-18 09:49:11'),
(49, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-01-18 09:49:14'),
(50, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-01-18 09:49:17'),
(51, '127.0.0.1', 'Firefox', 'Windows 10', 'CA', '2018-01-18 09:49:20'),
(52, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 09:49:22'),
(53, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 09:49:25'),
(54, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 09:49:27'),
(55, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 09:49:29'),
(56, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 09:49:31'),
(57, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 09:49:34'),
(58, '127.0.0.1', 'Firefox', 'Windows 10', 'UA', '2018-01-18 09:49:37'),
(59, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 10:42:01'),
(60, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 10:42:04'),
(61, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 11:26:34'),
(62, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 11:26:36'),
(63, '127.0.0.1', 'Firefox', 'Windows 10', 'RU', '2018-01-18 11:26:39'),
(64, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:26:42'),
(65, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:39:32'),
(66, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:39:35'),
(67, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:39:43'),
(68, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:39:46'),
(69, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:39:49'),
(70, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:39:52'),
(71, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:07'),
(72, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:09'),
(73, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:14'),
(74, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:18'),
(75, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:25'),
(76, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:27'),
(77, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:37'),
(78, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:41'),
(79, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:51'),
(80, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:40:54'),
(81, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:41:26'),
(82, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:41:28'),
(83, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:41:31'),
(84, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:41:34'),
(85, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:41:37'),
(86, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:41:40'),
(87, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 11:41:43'),
(88, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 12:02:25'),
(89, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 12:02:32'),
(90, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 12:02:36'),
(91, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 12:03:45'),
(92, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 12:04:35'),
(93, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 12:04:37'),
(94, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 12:04:58'),
(95, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 12:05:01'),
(96, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-18 12:24:47'),
(97, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:19:31'),
(98, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:19:35'),
(99, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:24:22'),
(100, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:24:26'),
(101, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:30:32'),
(102, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:30:36'),
(103, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:44:37'),
(104, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:44:40'),
(105, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:44:42'),
(106, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:46:59'),
(107, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:47:03'),
(108, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:47:05'),
(109, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:47:21'),
(110, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:47:24'),
(111, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:47:26'),
(112, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:47:37'),
(113, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:47:41'),
(114, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:47:43'),
(115, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:48:54'),
(116, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:48:58'),
(117, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:49:00'),
(118, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:51:44'),
(119, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:51:47'),
(120, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:51:50'),
(121, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:51:57'),
(122, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:51:59'),
(123, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 04:52:02'),
(124, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 05:01:51'),
(125, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 05:01:55'),
(126, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 05:01:58'),
(127, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 05:15:31'),
(128, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 05:15:35'),
(129, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 05:16:31'),
(130, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:37:23'),
(131, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:37:27'),
(132, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:37:33'),
(133, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:37:39'),
(134, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:19'),
(135, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:22'),
(136, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:31'),
(137, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:35'),
(138, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:38'),
(139, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:40'),
(140, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:43'),
(141, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:46'),
(142, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:48'),
(143, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-19 06:39:51'),
(144, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-20 04:17:47'),
(145, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-20 04:17:53'),
(146, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-20 05:26:34'),
(147, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-20 05:26:44'),
(148, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 06:34:20'),
(149, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 06:34:29'),
(150, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 06:34:36'),
(151, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 06:34:42'),
(152, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 06:35:28'),
(153, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 06:35:49'),
(154, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 06:49:40'),
(155, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 06:49:43'),
(156, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 06:49:48'),
(157, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:09:48'),
(158, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:10:10'),
(159, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:10:13'),
(160, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:11:25'),
(161, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:11:29'),
(162, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:12:02'),
(163, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:12:10'),
(164, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:12:13'),
(165, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:13:00'),
(166, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:13:08'),
(167, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:13:14'),
(168, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:13:32'),
(169, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:13:42'),
(170, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:13:45'),
(171, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:15:24'),
(172, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:15:27'),
(173, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:15:37'),
(174, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:15:40'),
(175, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:15:54'),
(176, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:15:56'),
(177, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:16:09'),
(178, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:16:12'),
(179, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:16:22'),
(180, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:16:25'),
(181, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:16:35'),
(182, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:16:38'),
(183, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:16:49'),
(184, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:16:52'),
(185, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:17:04'),
(186, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:17:07'),
(187, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:17:17'),
(188, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:17:21'),
(189, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:17:45'),
(190, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:17:48'),
(191, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:19:43'),
(192, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:20:03'),
(193, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:20:05'),
(194, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:20:08'),
(195, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:20:18'),
(196, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:20:25'),
(197, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:20:28'),
(198, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:20:41'),
(199, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:20:43'),
(200, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:20:45'),
(201, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:21:00'),
(202, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:21:10'),
(203, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:22:14'),
(204, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:22:16'),
(205, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:22:20'),
(206, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:22:41'),
(207, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:22:51'),
(208, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:23:06'),
(209, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:24:28'),
(210, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:24:32'),
(211, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:24:36'),
(212, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:24:39'),
(213, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:24:41'),
(214, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:25:05'),
(215, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:25:09'),
(216, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:25:12'),
(217, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:25:36'),
(218, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 07:26:25'),
(219, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:35:33'),
(220, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:35:36'),
(221, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:35:39'),
(222, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:35:50'),
(223, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:35:53'),
(224, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:35:56'),
(225, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:36:15'),
(226, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:36:18'),
(227, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:36:21'),
(228, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:37:30'),
(229, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:37:34'),
(230, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:37:36'),
(231, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:37:45'),
(232, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:37:48'),
(233, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:37:51'),
(234, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:39:04'),
(235, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:39:07'),
(236, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:39:10'),
(237, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:42:09'),
(238, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:42:13'),
(239, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:42:15'),
(240, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:43:27'),
(241, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:43:32'),
(242, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:43:34'),
(243, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:44:51'),
(244, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:44:54'),
(245, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:44:56'),
(246, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:59:43'),
(247, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 08:59:46'),
(248, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:01:35'),
(249, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:01:40'),
(250, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:11:57'),
(251, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:12:02'),
(252, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:12:10'),
(253, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:12:15'),
(254, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:12:24'),
(255, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:12:28'),
(256, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:23:55'),
(257, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:24:03'),
(258, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:24:06'),
(259, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:24:54'),
(260, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:24:59'),
(261, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:25:07'),
(262, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:25:13'),
(263, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:25:16'),
(264, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:25:19'),
(265, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:25:32'),
(266, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:25:35'),
(267, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:25:38'),
(268, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:26:08'),
(269, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:26:14'),
(270, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:26:17'),
(271, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:26:57'),
(272, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:27:01'),
(273, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:27:31'),
(274, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:27:38'),
(275, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:28:39'),
(276, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:28:45'),
(277, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:28:56'),
(278, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:29:02'),
(279, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:29:12'),
(280, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:29:16'),
(281, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:06'),
(282, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:12'),
(283, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:16'),
(284, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:23'),
(285, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:26'),
(286, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:29'),
(287, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:31'),
(288, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:38'),
(289, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:43'),
(290, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:46'),
(291, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:48'),
(292, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:51'),
(293, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:30:57'),
(294, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:33:27'),
(295, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:33:31'),
(296, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:35:31'),
(297, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:35:40'),
(298, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:35:50'),
(299, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:35:54'),
(300, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:37:35'),
(301, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:37:41'),
(302, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:38:03'),
(303, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:38:09'),
(304, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:41:29'),
(305, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:41:32'),
(306, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:41:57'),
(307, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:42:01'),
(308, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:42:52'),
(309, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:42:55'),
(310, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:03'),
(311, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:05'),
(312, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:07'),
(313, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:10'),
(314, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:12'),
(315, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:15'),
(316, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:17'),
(317, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:19'),
(318, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:22'),
(319, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:24'),
(320, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:27'),
(321, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:30'),
(322, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:32'),
(323, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:35'),
(324, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:38'),
(325, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:43:40'),
(326, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:11'),
(327, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:16'),
(328, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:19'),
(329, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:22'),
(330, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:26'),
(331, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:28'),
(332, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:31'),
(333, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:35'),
(334, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:38'),
(335, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:41'),
(336, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:43'),
(337, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:45'),
(338, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:48'),
(339, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:50'),
(340, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:45:53'),
(341, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:46:03'),
(342, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:46:07'),
(343, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:46:09'),
(344, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:46:12'),
(345, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:50:43'),
(346, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:50:48'),
(347, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:50:54'),
(348, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:50:57'),
(349, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:02'),
(350, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:05'),
(351, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:24'),
(352, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:29'),
(353, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:34'),
(354, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:39'),
(355, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:45'),
(356, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:48'),
(357, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:55'),
(358, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:51:59'),
(359, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:04'),
(360, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:07'),
(361, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:10'),
(362, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:12'),
(363, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:15'),
(364, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:17'),
(365, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:19'),
(366, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:22'),
(367, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:24'),
(368, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:27'),
(369, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:29'),
(370, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:32'),
(371, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:34'),
(372, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:37'),
(373, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:52:59'),
(374, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:53:05'),
(375, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:53:31'),
(376, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:53:34'),
(377, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:53:36'),
(378, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:53:51'),
(379, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:53:53'),
(380, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:53:56'),
(381, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:53:58'),
(382, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:54:08'),
(383, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:54:10'),
(384, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:54:13'),
(385, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:54:15'),
(386, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:57:04'),
(387, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:57:09'),
(388, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:57:17'),
(389, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:57:25'),
(390, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:57:57'),
(391, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:58:02'),
(392, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:59:20'),
(393, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:59:24'),
(394, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:59:43'),
(395, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 09:59:54'),
(396, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 10:06:59'),
(397, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 10:16:37'),
(398, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 10:16:40'),
(399, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 10:17:42'),
(400, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 10:18:28'),
(401, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 10:29:31'),
(402, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 10:30:05'),
(403, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-23 10:31:09'),
(404, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:24:26'),
(405, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:24:31'),
(406, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:24:53'),
(407, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:24:57'),
(408, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:34:20'),
(409, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:34:23'),
(410, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:34:26'),
(411, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:36:35'),
(412, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:36:38'),
(413, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:42:34'),
(414, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:42:36'),
(415, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:42:39'),
(416, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:42:41'),
(417, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:42:43'),
(418, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-24 06:42:47'),
(419, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:21:21'),
(420, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:21:27'),
(421, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:21:33'),
(422, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:21:41'),
(423, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:21:44'),
(424, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:21:57'),
(425, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:22:00'),
(426, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:22:05'),
(427, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:37:58'),
(428, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:38:15'),
(429, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:40:45'),
(430, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:59:13'),
(431, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 11:59:16'),
(432, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:51:22'),
(433, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:51:24'),
(434, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:51:46'),
(435, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:51:49'),
(436, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:51:51'),
(437, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:51:53'),
(438, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:51:55'),
(439, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:51:58'),
(440, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:52:08'),
(441, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:52:11'),
(442, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:52:13'),
(443, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:52:20'),
(444, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-30 12:52:22'),
(445, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:08:54'),
(446, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:09:00'),
(447, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:09:29'),
(448, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:09:32'),
(449, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:27:31'),
(450, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:27:34'),
(451, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:27:39'),
(452, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:27:42'),
(453, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:27:45'),
(454, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:27:57'),
(455, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:28:00'),
(456, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:29:10'),
(457, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:29:19'),
(458, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:29:22'),
(459, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:29:35'),
(460, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:29:38'),
(461, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:30:26'),
(462, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:30:29'),
(463, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:31:05'),
(464, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 04:31:08'),
(465, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:16:30'),
(466, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:16:33'),
(467, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:23:21'),
(468, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:23:24'),
(469, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:24:24'),
(470, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:24:27'),
(471, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:37:08'),
(472, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:37:12'),
(473, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:54:48'),
(474, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:54:52'),
(475, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:55:46'),
(476, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:55:49'),
(477, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:56:38'),
(478, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:56:41'),
(479, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:57:03'),
(480, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:57:06'),
(481, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:57:24'),
(482, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 05:57:28'),
(483, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 06:07:11'),
(484, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 06:07:16'),
(485, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 06:07:58'),
(486, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 06:08:02'),
(487, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 06:08:10'),
(488, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 06:57:46'),
(489, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 06:59:30'),
(490, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 07:00:21'),
(491, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:08:07'),
(492, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:08:12'),
(493, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:08:19'),
(494, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:08:49'),
(495, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:08:54'),
(496, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:08:58'),
(497, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:09:17'),
(498, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:09:21'),
(499, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:09:26'),
(500, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:09:43'),
(501, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:09:47'),
(502, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 10:09:53'),
(503, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:09:47'),
(504, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:09:50'),
(505, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:09:57'),
(506, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:10:00'),
(507, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:10:03'),
(508, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:22:49'),
(509, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:25:29'),
(510, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:25:32'),
(511, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:25:40'),
(512, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:26:24'),
(513, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:26:26'),
(514, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:26:28'),
(515, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:26:30'),
(516, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:26:33'),
(517, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:26:45'),
(518, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:26:48'),
(519, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:27:08'),
(520, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:27:12'),
(521, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:27:20'),
(522, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:27:24'),
(523, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:27:53'),
(524, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:29:13'),
(525, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:29:16'),
(526, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:30:30'),
(527, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:30:35'),
(528, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:30:45'),
(529, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:30:48'),
(530, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:31:41'),
(531, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:31:44'),
(532, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:34:22'),
(533, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:34:29'),
(534, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:36:52'),
(535, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:36:55'),
(536, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:37:03'),
(537, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:49:27'),
(538, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 11:49:53'),
(539, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:12:25'),
(540, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:12:27'),
(541, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:12:30'),
(542, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:12:32'),
(543, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:12:35'),
(544, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:12:37'),
(545, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:12:40'),
(546, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:12:42'),
(547, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:12:45'),
(548, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:13:36'),
(549, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:13:41'),
(550, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:25:17'),
(551, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:25:20'),
(552, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:25:53'),
(553, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:26:02'),
(554, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:26:05'),
(555, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:26:10'),
(556, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:26:33'),
(557, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:26:42'),
(558, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:26:44'),
(559, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:26:46'),
(560, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:26:49'),
(561, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:26:54'),
(562, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:28:57'),
(563, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:29:00'),
(564, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:29:02'),
(565, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:29:04'),
(566, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:29:45'),
(567, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:29:49'),
(568, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:29:52'),
(569, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:29:55'),
(570, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-01-31 12:29:57'),
(571, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:15'),
(572, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:22'),
(573, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:25'),
(574, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:27'),
(575, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:30'),
(576, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:36'),
(577, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:41'),
(578, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:43'),
(579, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:45'),
(580, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:47'),
(581, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:48:57'),
(582, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:49:00'),
(583, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:49:02'),
(584, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:49:04'),
(585, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:49:19'),
(586, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:51:54'),
(587, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:52:15'),
(588, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:55:59'),
(589, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:56:17'),
(590, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:56:22'),
(591, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:56:43'),
(592, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:56:51'),
(593, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:57:08'),
(594, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:57:39'),
(595, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:57:41'),
(596, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:57:43'),
(597, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:57:46'),
(598, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:57:50'),
(599, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:57:52'),
(600, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:57:55'),
(601, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 04:57:57'),
(602, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:00:28'),
(603, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:00:37'),
(604, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:00:42'),
(605, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:00:45'),
(606, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:00:47'),
(607, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:00:50'),
(608, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:01:00'),
(609, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:01:05'),
(610, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:01:07'),
(611, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:01:10'),
(612, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:01:12'),
(613, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:04'),
(614, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:06'),
(615, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:08'),
(616, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:10'),
(617, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:13'),
(618, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:21'),
(619, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:23'),
(620, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:25'),
(621, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:27'),
(622, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:34'),
(623, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:37'),
(624, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:47'),
(625, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:51'),
(626, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:02:53'),
(627, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:22:52'),
(628, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:27:01'),
(629, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:27:21'),
(630, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:28:18'),
(631, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:29:36'),
(632, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:30:01'),
(633, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:30:56'),
(634, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:30:58'),
(635, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:31:01'),
(636, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:31:03'),
(637, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:31:28'),
(638, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:31:31'),
(639, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:31:33'),
(640, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:31:35'),
(641, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:33:06'),
(642, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:33:10'),
(643, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:33:12'),
(644, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:33:14'),
(645, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:33:35'),
(646, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:33:37'),
(647, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:33:39'),
(648, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:35:09'),
(649, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:35:32'),
(650, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:36:02'),
(651, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:36:24'),
(652, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:37:16'),
(653, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:38:06'),
(654, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:38:48'),
(655, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:40:13'),
(656, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:40:41'),
(657, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:41:02'),
(658, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:41:27'),
(659, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:41:54'),
(660, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:47:54'),
(661, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:48:11'),
(662, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:49:13'),
(663, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:50:29'),
(664, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:51:03'),
(665, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:51:22'),
(666, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:52:58'),
(667, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:53:52'),
(668, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:54:18'),
(669, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:54:54'),
(670, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:55:16'),
(671, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:55:44'),
(672, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:56:22'),
(673, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:57:42'),
(674, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:58:39'),
(675, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:58:47'),
(676, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:59:03'),
(677, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 05:59:12'),
(678, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:01:16'),
(679, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:04:38'),
(680, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:04:40'),
(681, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:04:42'),
(682, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:04:44'),
(683, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:07:01'),
(684, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:07:14'),
(685, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:16:25'),
(686, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:16:28'),
(687, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:16:31'),
(688, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:16:33'),
(689, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:18:17'),
(690, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:18:20'),
(691, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:18:22'),
(692, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:18:24'),
(693, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:20:58'),
(694, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:21:01');
INSERT INTO `tbl_site_states` (`id`, `ip_address`, `browser`, `os`, `country`, `created`) VALUES
(695, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:21:36'),
(696, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:21:45'),
(697, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:21:47'),
(698, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:21:50'),
(699, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:21:52'),
(700, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:22:25'),
(701, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:22:27'),
(702, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:22:29'),
(703, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:22:32'),
(704, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:22:36'),
(705, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:22:38'),
(706, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:22:47'),
(707, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:22:50'),
(708, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:27:14'),
(709, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:27:31'),
(710, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:28:31'),
(711, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:28:39'),
(712, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:28:44'),
(713, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:28:47'),
(714, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:28:49'),
(715, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:28:52'),
(716, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:28:55'),
(717, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:28:59'),
(718, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:29:01'),
(719, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:03'),
(720, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:05'),
(721, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:07'),
(722, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:10'),
(723, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:12'),
(724, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:14'),
(725, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:16'),
(726, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:19'),
(727, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:21'),
(728, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:30'),
(729, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:36'),
(730, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:39'),
(731, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:30:42'),
(732, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:36:21'),
(733, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:37:01'),
(734, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:38:21'),
(735, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:38:56'),
(736, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:40:51'),
(737, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:45:09'),
(738, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:45:29'),
(739, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:45:54'),
(740, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:48:18'),
(741, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:48:40'),
(742, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:49:08'),
(743, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:49:10'),
(744, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:49:12'),
(745, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:49:15'),
(746, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:49:17'),
(747, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:49:23'),
(748, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:51:39'),
(749, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:51:42'),
(750, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:51:44'),
(751, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 06:51:46'),
(752, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 11:51:35'),
(753, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 11:51:39'),
(754, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 11:51:41'),
(755, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 11:51:43'),
(756, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 11:51:46'),
(757, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:14:06'),
(758, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:21:46'),
(759, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:21:48'),
(760, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:21:51'),
(761, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:30:14'),
(762, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:30:20'),
(763, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:30:22'),
(764, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:37:08'),
(765, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:37:10'),
(766, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:37:13'),
(767, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:37:17'),
(768, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:54:40'),
(769, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:54:43'),
(770, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 12:54:45'),
(771, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-01 13:02:26'),
(772, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 04:33:42'),
(773, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 04:33:48'),
(774, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 04:33:51'),
(775, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 04:33:54'),
(776, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 04:39:11'),
(777, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 04:39:13'),
(778, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 04:39:15'),
(779, '::1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 05:21:27'),
(780, '::1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 05:21:29'),
(781, '::1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 05:21:32'),
(782, '::1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 05:21:45'),
(783, '::1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 05:21:50'),
(784, '::1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 05:21:52'),
(785, '::1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 05:22:17'),
(786, '::1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 05:22:19'),
(787, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:08:46'),
(788, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:08:50'),
(789, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:08:53'),
(790, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:08:55'),
(791, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:08:57'),
(792, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:09:04'),
(793, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:09:16'),
(794, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:09:22'),
(795, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:09:25'),
(796, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:09:28'),
(797, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:09:37'),
(798, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:10:16'),
(799, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:10:19'),
(800, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:10:22'),
(801, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:10:24'),
(802, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:10:27'),
(803, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:10:35'),
(804, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:11:17'),
(805, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:11:59'),
(806, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:12:01'),
(807, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:12:03'),
(808, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:12:06'),
(809, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:22:24'),
(810, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:22:38'),
(811, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-02 09:24:44'),
(812, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-03 10:02:47'),
(813, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-03 10:02:50'),
(814, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-03 10:02:53'),
(815, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-03 10:02:55'),
(816, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-03 10:03:08'),
(817, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-03 10:03:11'),
(818, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-03 10:03:13'),
(819, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-03 10:03:16'),
(820, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:25:29'),
(821, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:25:36'),
(822, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:25:39'),
(823, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:25:42'),
(824, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:25:45'),
(825, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:25:47'),
(826, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:25:51'),
(827, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:25:54'),
(828, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:25:59'),
(829, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:26:02'),
(830, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:26:07'),
(831, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:26:23'),
(832, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:26:28'),
(833, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:26:31'),
(834, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:26:34'),
(835, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:26:36'),
(836, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:28:41'),
(837, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:29:14'),
(838, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:29:18'),
(839, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:29:22'),
(840, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-05 04:29:28'),
(841, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:43:29'),
(842, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:43:34'),
(843, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:43:36'),
(844, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:43:39'),
(845, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:43:41'),
(846, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:43:44'),
(847, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:44:21'),
(848, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:44:27'),
(849, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:44:29'),
(850, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:44:31'),
(851, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:45:48'),
(852, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:45:51'),
(853, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:45:53'),
(854, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:45:56'),
(855, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:46:05'),
(856, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:46:08'),
(857, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:46:28'),
(858, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:46:30'),
(859, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:46:32'),
(860, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:46:35'),
(861, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:46:44'),
(862, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:46:47'),
(863, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:13'),
(864, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:18'),
(865, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:21'),
(866, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:24'),
(867, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:42'),
(868, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:44'),
(869, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:50'),
(870, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:53'),
(871, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:55'),
(872, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:47:58'),
(873, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:48:17'),
(874, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:48:20'),
(875, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:48:22'),
(876, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:48:25'),
(877, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:49:19'),
(878, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:49:22'),
(879, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:49:24'),
(880, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:49:28'),
(881, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:49:36'),
(882, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:49:38'),
(883, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:49:58'),
(884, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:50:02'),
(885, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:50:04'),
(886, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-06 09:50:06'),
(887, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:11:42'),
(888, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:11:50'),
(889, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:11:55'),
(890, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:11:57'),
(891, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:00'),
(892, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:06'),
(893, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:09'),
(894, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:12'),
(895, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:15'),
(896, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:26'),
(897, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:29'),
(898, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:32'),
(899, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:34'),
(900, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:40'),
(901, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:43'),
(902, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:46'),
(903, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:12:48'),
(904, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:13:04'),
(905, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:13:07'),
(906, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:13:10'),
(907, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:13:12'),
(908, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:13:58'),
(909, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:14:11'),
(910, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:14:30'),
(911, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:14:32'),
(912, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:14:55'),
(913, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:14:58'),
(914, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:15:00'),
(915, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:15:02'),
(916, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:15:33'),
(917, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:19:12'),
(918, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:19:15'),
(919, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:19:21'),
(920, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:21:23'),
(921, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:21:44'),
(922, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:21:47'),
(923, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:21:59'),
(924, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:22:03'),
(925, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:22:07'),
(926, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:22:10'),
(927, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:26:56'),
(928, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:26:59'),
(929, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:27:01'),
(930, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:27:04'),
(931, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 05:27:38'),
(932, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 06:27:01'),
(933, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 06:27:06'),
(934, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 06:27:09'),
(935, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 06:27:11'),
(936, '127.0.0.1', 'Firefox', 'Windows 10', 'IN', '2018-02-13 06:27:13'),
(937, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:42:53'),
(938, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:42:56'),
(939, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:42:59'),
(940, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:43:02'),
(941, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:43:17'),
(942, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:43:20'),
(943, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:43:23'),
(944, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:43:43'),
(945, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:43:46'),
(946, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:43:56'),
(947, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:43:59'),
(948, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:44:03'),
(949, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:44:07'),
(950, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:44:13'),
(951, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:44:15'),
(952, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:44:18'),
(953, '192.168.0.110', 'Firefox', 'Windows 10', 'IN', '2018-02-15 08:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscribe`
--

INSERT INTO `tbl_subscribe` (`id`, `email`, `status`, `created`) VALUES
(1, 'rajanamdav@gmail.com', 'inactive', '2018-01-31 06:59:30'),
(2, 'rajanamdav@gmail.com', 'inactive', '2018-01-31 07:00:21'),
(3, 'rajanamdav@gmail.com', 'inactive', '2018-01-31 10:08:19'),
(4, 'rajanamdav@gmail.com', 'inactive', '2018-01-31 10:08:58'),
(5, 'rajanamdav@gmail.com', 'inactive', '2018-01-31 10:09:26'),
(6, 'rajanamdav@gmail.com', 'inactive', '2018-01-31 10:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `total_linked_question` int(11) NOT NULL,
  `total_intrest_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id`, `title`, `description`, `total_linked_question`, `total_intrest_user`) VALUES
(1, 'php', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 3, 3),
(2, 'array', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 0),
(3, 'string', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 0),
(4, 'question', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 7, 0),
(5, 'new', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 0),
(6, '2018', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 3, 0),
(7, 'first', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 6, 0),
(8, 'demo', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 6, 0),
(9, 'this tag', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 5, 1),
(10, 'Java', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 2),
(11, 'Java_program', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 0),
(12, 'this', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 0),
(13, 'datd', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 0),
(14, 'javascript', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 2, 3),
(15, 'codeigniter', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 0),
(16, 'input', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 0),
(17, '2020', 'a widely used, high-level, dynamic, object-oriented and interpreted scripting language primarily designed for server-side web', 1, 0),
(18, 'BMS', '', 1, 0),
(19, 'Update', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags_question`
--

CREATE TABLE `tbl_tags_question` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `tags_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tags_question`
--

INSERT INTO `tbl_tags_question` (`id`, `question_id`, `tags_id`) VALUES
(19, 4, '4'),
(20, 4, '7'),
(21, 4, '8'),
(22, 4, '9'),
(23, 4, '6'),
(24, 7, '4'),
(25, 7, '7'),
(26, 7, '8'),
(27, 7, '9'),
(28, 9, '10'),
(29, 9, '11'),
(30, 10, '12'),
(31, 10, '13'),
(32, 11, '14'),
(33, 11, '1'),
(34, 11, '15'),
(35, 12, '16'),
(36, 12, '1'),
(37, 12, '3'),
(38, 12, '2'),
(43, 5, '4'),
(44, 5, '7'),
(45, 5, '8'),
(46, 5, '9'),
(53, 6, '4'),
(54, 6, '7'),
(55, 3, '4'),
(56, 3, '7'),
(57, 3, '8'),
(58, 3, '9'),
(59, 3, '17'),
(60, 14, '1'),
(61, 14, '14'),
(90, 1, '4'),
(91, 1, '5'),
(92, 1, '6'),
(93, 1, '18'),
(99, 2, '4'),
(100, 2, '7'),
(101, 2, '8'),
(102, 2, '9'),
(103, 2, '19'),
(104, 15, '8'),
(105, 15, '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(41) NOT NULL,
  `confirm_password` varchar(41) NOT NULL,
  `forget_hint` varchar(41) NOT NULL,
  `gender` enum('male','female','other') DEFAULT 'other',
  `image` varchar(200) NOT NULL DEFAULT 'avatar.png',
  `profession` enum('student','teacher','business','other') NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `location` varchar(200) NOT NULL DEFAULT '{"longitute":"78.96288000000004","latitude":"20.593684","location_name":"India"}',
  `mobile` varchar(15) NOT NULL,
  `institute_name` varchar(200) NOT NULL,
  `about` longtext,
  `dob` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `confirm_password`, `forget_hint`, `gender`, `image`, `profession`, `status`, `location`, `mobile`, `institute_name`, `about`, `dob`, `modified`, `created`) VALUES
(1, 'Raja Nama', 'Rajanamdav@gmail.com', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', '', 'male', 'image.jpg', 'student', 'inactive', '{\"longitute\":\"75.86475270000005\",\"latitude\":\"25.2138156\",\"location_name\":\"Kota\"}', '8890011188', 'CP', 'Hello,I\'m John Doe Creative Graphic Designer & User Experience Desiger based in Website, I create digital Products a more Beautiful and usable place. This is Photoshops version of Lorem Ipsum. Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpuate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt.', '1994-03-06', '2018-01-11 12:37:48', '2017-12-26 11:20:15'),
(2, 'Dharmendra', 'Dharmendra@gmail.com', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', '', 'male', 'index.jpg', 'teacher', 'inactive', '{\"longitute\":\"75.97244909999995\",\"latitude\":\"25.1227718\",\"location_name\":\"Kethun\"}', '7014083771', 'CPUR', 'Hello! I\'m dharmendra Nama', '1994-03-06', '2018-01-31 04:29:10', '2017-12-27 09:07:05'),
(3, 'Pawan Kamboj', 'Pawan@gmail.com', '25f9e794323b453885f5181f1b624d0b', '25f9e794323b453885f5181f1b624d0b', '', 'male', 'avatar.png', 'student', 'active', '{\"longitute\":\"75.89841539999998\",\"latitude\":\"25.1490097\",\"location_name\":\"Raipura\"}', '1234567890', 'RH', NULL, '0000-00-00', '2018-01-10 07:30:20', '2018-01-02 12:41:29'),
(6, 'Hmnspr', 'sandesh@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', '', 'other', '556744_1wYpi51504622425.jpg', 'business', 'active', '{\"longitute\":\"75.89841539999998\",\"latitude\":\"25.1490097\",\"location_name\":\"Raipura\"}', '2147483647', 'Hmnspr Coaching institute', NULL, '0000-00-00', '2018-01-17 10:09:13', '2018-01-08 11:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_visitor`
--

CREATE TABLE `tbl_user_visitor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visitor_ip` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_visitor`
--

INSERT INTO `tbl_user_visitor` (`id`, `user_id`, `visitor_ip`, `created`) VALUES
(1, 2, '127.0.0.1', '2018-01-15 09:08:44'),
(2, 2, '128.0.0.1', '2018-01-15 09:08:44'),
(3, 1, '127.0.0.1', '2018-01-15 09:08:44'),
(4, 3, '127.0.0.1', '2018-01-15 09:08:44'),
(5, 6, '127.0.0.1', '2018-01-16 09:08:44'),
(6, 6, '127.0.0.1', '2018-01-16 09:08:44'),
(7, 6, '127.0.0.1', '2018-01-17 09:08:44'),
(8, 6, '127.0.0.1', '2018-01-15 09:08:44'),
(9, 6, '127.0.0.1', '2018-01-17 09:08:44'),
(10, 6, '127.0.0.1', '2018-01-17 09:08:44'),
(11, 6, '127.0.0.1', '2018-01-17 09:08:44'),
(12, 6, '127.0.0.1', '2018-01-18 09:08:44'),
(13, 2, '192.168.0.110', '2018-02-15 08:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_votes`
--

CREATE TABLE `tbl_votes` (
  `id` int(11) NOT NULL,
  `medium_type` varchar(15) NOT NULL,
  `medium_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_votes`
--

INSERT INTO `tbl_votes` (`id`, `medium_type`, `medium_id`, `user_id`) VALUES
(5, 'question', 2, 1),
(6, 'answer', 2, 1),
(7, 'question', 2, 2),
(24, 'question', 2, 3),
(25, 'answer', 2, 3),
(26, 'question', 3, 3),
(28, 'answer', 3, 3),
(29, 'answer', 13, 3),
(30, 'answer', 1, 3),
(31, 'answer', 15, 3),
(32, 'answer', 14, 3),
(33, 'answer', 2, 2),
(35, 'answer', 15, 2),
(36, 'question', 1, 2),
(37, 'answer', 10, 2),
(38, 'answer', 12, 2),
(39, 'question', 4, 2),
(40, 'question', 5, 1),
(41, 'answer', 7, 1),
(42, 'answer', 10, 3),
(43, 'answer', 16, 2),
(44, 'question', 11, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adv`
--
ALTER TABLE `tbl_adv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_answers`
--
ALTER TABLE `tbl_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_bms_user`
--
ALTER TABLE `tbl_bms_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_bs_page`
--
ALTER TABLE `tbl_bs_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cate_ques`
--
ALTER TABLE `tbl_cate_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fav_tag`
--
ALTER TABLE `tbl_fav_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follower_id` (`follower_id`),
  ADD KEY `following_id` (`following_id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seo`
--
ALTER TABLE `tbl_seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_site_states`
--
ALTER TABLE `tbl_site_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tags_question`
--
ALTER TABLE `tbl_tags_question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_visitor`
--
ALTER TABLE `tbl_user_visitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adv`
--
ALTER TABLE `tbl_adv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_answers`
--
ALTER TABLE `tbl_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_bms_user`
--
ALTER TABLE `tbl_bms_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_bs_page`
--
ALTER TABLE `tbl_bs_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cate_ques`
--
ALTER TABLE `tbl_cate_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_complain`
--
ALTER TABLE `tbl_complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_fav_tag`
--
ALTER TABLE `tbl_fav_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_follow`
--
ALTER TABLE `tbl_follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_seo`
--
ALTER TABLE `tbl_seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_site_states`
--
ALTER TABLE `tbl_site_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=954;

--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_tags_question`
--
ALTER TABLE `tbl_tags_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_visitor`
--
ALTER TABLE `tbl_user_visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
