-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2018 at 04:06 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Emran', '258147');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Html'),
(2, 'CSS'),
(3, 'Bootstrap'),
(4, 'Javascript'),
(5, 'Jquery'),
(6, 'Php'),
(7, 'Python'),
(11, 'SQL'),
(12, 'Java');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `userid`, `postid`) VALUES
(1, 'hello', 5, 12),
(2, 'hey\r\n', 10, 12),
(6, 'ki\r\n', 10, 12),
(7, 'CSS stands for Cascading Style Sheets', 10, 2),
(8, 'Bootstrap employs a handful of important global styles and settings that youâ€™ll need to be aware of when using it', 9, 4),
(9, 'Bootstrap employs a handful of important global styles and settings that youâ€™ll need to be aware of when using it', 9, 4),
(10, 'This is my first Tutorial About java....', 11, 13),
(11, 'Thats very nice...\r\n', 5, 13);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `messege` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `messege`, `status`) VALUES
(2, 'Rabbi', 'Rabbi@gmail.com', 'hello hey', 'yes'),
(3, 'bappi', 'bappi@gmail.com', 'How Can we use javascript?', 'no'),
(4, 'Emran', 'e@gmail.com', 'Why delete My member Registration....', 'no'),
(5, 'Tanjila', 'Tanjila@gmail.com', 'What is the Feature of Bootstrap?', 'yes'),
(7, 'Anzar', 'anzar24@gmail.com', 'ki kbr....?', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(15) NOT NULL,
  `user_id` int(150) NOT NULL,
  `status` varchar(6) NOT NULL,
  `time` varchar(252) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `category_id`, `user_id`, `status`, `time`) VALUES
(2, 'What is CSS', '<p><span style=\"font-size:20px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">CSS stands for Cascading Style Sheets. It is a style sheet language which is used to describe the look and formatting of a document written in markup language. It provides an additional feature to HTML. It is generally used with HTML to change the style of web pages and user interfaces. It can also be used with any kind of XML documents including plain XML, SVG and XUL. CSS is used along with HTML and JavaScript in most websites to create user interfaces for web applications and user interfaces for many mobile applications.</span></span></p>\r\n\r\n<p>Before CSS, tags like font, color, background style, element alignments, border and size had to be repeated on every web page. This was a very long process. For example: If you are developing a large website where fonts and color information are added on every single page, it will be become a long and expensive process. CSS was created to solve this problem. It was a W3C recommendation.</p>', 2, 5, 'yes', '11 Aug, 2018 20:26:55'),
(4, 'What is the Feature of Bootstrap?', '<h4><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Get started with Bootstrap, the world&rsquo;s most popular framework for building responsive, mobile-first sites, with BootstrapCDN and a template starter page.</span></span></h4>\r\n\r\n<p><span style=\"font-size:16px\">Many of our components require the use of JavaScript to function. Specifically, they require&nbsp;<a href=\"https://jquery.com/\">jQuery</a>,&nbsp;<a href=\"https://popper.js.org/\">Popper.js</a>, and our own JavaScript plugins. Place the following&nbsp;<code>&lt;script&gt;</code>s near the end of your pages, right before the closing&nbsp;<code>&lt;/body&gt;</code>&nbsp;tag, to enable them. jQuery must come first, then Popper.js, and then our JavaScript plugins.Curious which components explicitly require jQuery, our JS, and Popper.js? Click the show components link below. If you&rsquo;re at all unsure about the general page structure, keep reading for an example page template.Be sure to have your pages set up with the latest design and development standards. That means using an HTML5 doctype and including a viewport meta tag for proper responsive behaviors. Put it all together and your pages should look like th</span></p>\r\n\r\n<p><span style=\"font-size:16px\">Bootstrap employs a handful of important global styles and settings that you&rsquo;ll need to be aware of when using it, all of which are almost exclusively geared towards the&nbsp;<em>normalization</em>&nbsp;of cross browser styles. Let&rsquo;s dive in.</span></p>', 3, 9, 'yes', ''),
(12, 'What is PHP and why it is used?', '<p><span style=\"font-size:16px\"><span style=\"font-family:Tahoma,Geneva,sans-serif\">Use your browser to access the file with your web server&#39;s URL, ending with the&nbsp;<em>/hello.php</em>&nbsp;file reference. When developing locally this URL will be something like&nbsp;<em>http://localhost/hello.php</em>&nbsp;or&nbsp;<em>http://127.0.0.1/hello.php</em>&nbsp;but this depends on the web server&#39;s configuration. If everything is configured correctly, this file will be parsed by PHP and the following output will be sent to your browser:</span></span></p>\r\n\r\n<pre>\r\n<span style=\"color:#993366\"><span style=\"font-size:16px\"><span style=\"background-color:#444444\">&lt;html&gt;\r\n &lt;head&gt;\r\n  &lt;title&gt;PHP Test&lt;/title&gt;\r\n &lt;/head&gt;\r\n &lt;body&gt;\r\n &lt;p&gt;Hello World&lt;/p&gt;\r\n &lt;/body&gt;\r\n&lt;/html&gt;</span></span></span></pre>\r\n\r\n<p><span style=\"font-size:16px\">This program is extremely simple and you really did not need to use PHP to create a page like this. All it does is display:&nbsp;<em>Hello World</em>&nbsp;using the PHP&nbsp;<a href=\"http://php.net/manual/en/function.echo.php\">echo</a>&nbsp;statement. Note that the file&nbsp;<em>does not need to be executable</em>&nbsp;or special in any way. The server finds out that this file needs to be interpreted by PHP because you used the &quot;.php&quot; extension, which the server is configured to pass on to PHP. Think of this as a normal HTML file which happens to have a set of special tags available to you that do a lot of interesting things.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">If you tried this example and it did not output anything, it prompted for download, or you see the whole file as text, chances are that the server you are on does not have PHP enabled, or is not configured properly. Ask your administrator to enable it for you using the&nbsp;<a href=\"http://php.net/manual/en/install.php\">Installation</a>&nbsp;chapter of the manual. If you are developing locally, also read the installation chapter to make sure everything is configured properly. Make sure that you access the file via http with the server providing you the output. If you just call up the file from your file system, then it will not be parsed by PHP. If the problems persist anyway, do not hesitate to use one of the many&nbsp;<a href=\"http://www.php.net/support.php\">&raquo;&nbsp;PHP support</a>&nbsp;options.</span></p>\r\n\r\n<p><span style=\"font-size:16px\">The point of the example is to show the special PHP tag format. In this example we used&nbsp;<em>&lt;?php</em>&nbsp;to indicate the start of a PHP tag. Then we put the PHP statement and left PHP mode by adding the closing tag,&nbsp;<em>?&gt;</em>. You may jump in and out of PHP mode in an HTML file like this anywhere you want. For more details, read the manual section on the&nbsp;<a href=\"http://php.net/manual/en/language.basic-syntax.php\">basic PHP syntax</a>.</span></p>', 6, 5, 'yes', '2018-Aug-Wed-12-1-th'),
(13, 'Introduction to Java programming, Part 1: Java language basics', '<p style=\"text-align:justify\"><img alt=\"\" src=\"/blog-project/users/ckeditor/kcfinder/upload/images/1200px-Java_programming_language_logo.svg.png\" style=\"border-style:solid; border-width:3px; float:left; height:80px; margin:4px 5px; width:20%\" /><span style=\"font-size:14px\"><strong>Java</strong>&nbsp;is a programming language that developers use to create applications on your computer. Chances are you&#39;ve downloaded a program that required the&nbsp;<strong>Java</strong>runtime, and so you probably have it installed it on your system.&nbsp;<strong>Java</strong>&nbsp;also has a web plug-in that allows you to run these apps in your browse.&nbsp;A component of the JRE, the Java Plug-in software allows Java applets to&nbsp;<strong>run</strong>&nbsp;inside various browsers. Java is a programming language developed by&nbsp;<strong>James Gosling</strong>and others at Sun Micro systems. It was first introduced to the public in 1995 and is widely used to create Internet applications &nbsp;programs</span></p>\r\n\r\n<p style=\"text-align:justify\"><strong>Java</strong>&nbsp;isn&#39;t &ldquo;typecast&rdquo; like a lot of languages are. ... I believe&nbsp;<strong>Java</strong>&nbsp;is a&nbsp;<strong>good</strong>&nbsp;language to&nbsp;<strong>learn</strong>. It is a cross-platform language and it support Object Oriented Programming. A&nbsp;<strong>good</strong>&nbsp;place to start learning Object Oriented Programming would be Design Patterns.</p>\r\n\r\n<h2><strong>About this tutorial</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:14px\">The two-part&nbsp;<em>Introduction to Java programming</em>&nbsp;tutorial is meant for software developers who are new to Java technology. Work through both parts to get up and running with object-oriented programming (OOP) and real-world application development using the Java language and platform.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">This first part is a step-by-step introduction to OOP using the Java language. The tutorial begins with an overview of the Java platform and language, followed by instructions for setting up a development environment consisting of a Java Development Kit (JDK) and the Eclipse IDE. After you&#39;re introduced to your development environment&#39;s components, you begin learning basic Java syntax hands-on.</span></p>\r\n\r\n<h2><strong>System requirements</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">To complete the exercises in this tutorial, you will install and set up a development environment consisting of:</span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\">JDK 8 from Oracle</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\">Eclipse IDE for Java Developers</span></li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">Download and installation instructions for both are included in the tutorial.</span></p>\r\n\r\n<p style=\"text-align:justify\"><span style=\"font-size:14px\">The recommended system configuration is:</span></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\">A system supporting Java SE 8 with at least 2GB of memory. Java 8 is supported on Linux&reg;, Windows&reg;, Solaris&reg;, and Mac OS X.</span></li>\r\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\">At least 200MB of disk space to install the software components and examples.&nbsp;</span>&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong><span style=\"font-size:18px\">Java platform overview</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px\">Java technology is used to develop applications for a wide range of environments, from consumer devices to heterogeneous enterprise systems. In this section, get a high-level view of the Java platform and its components.</span></p>\r\n\r\n<p><strong><span style=\"font-size:18px\">The Java language</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px\">Like any programming language, the Java language has its own structure, syntax rules, and programming paradigm. The Java language&#39;s programming paradigm is based on the concept of OOP, which the language&#39;s features support.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">The Java language is a C-language derivative, so its syntax rules look much like C&#39;s. For example, code blocks are modularized into methods and delimited by braces (<code>{</code>&nbsp;and&nbsp;<code>}</code>), and variables are declared before they are used.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Structurally, the Java language starts with&nbsp;<em>packages</em>. A package is the Java language&#39;s namespace mechanism. Within packages are classes, and within classes are methods, variables, constants, and more. You learn about the parts of the Java language in this tutorial.</span></p>\r\n\r\n<p><strong><span style=\"font-size:18px\">The Java compiler</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px\">When you program for the Java platform, you write source code in .java files and then compile them. The compiler checks your code against the language&#39;s syntax rules, then writes out&nbsp;<em>bytecode</em>&nbsp;in .class files. Bytecode is a set of instructions targeted to run on a Java virtual machine (JVM). In adding this level of abstraction, the Java compiler differs from other language compilers, which write out instructions suitable for the CPU chipset the program will run on.</span></p>\r\n\r\n<h3><span style=\"font-size:18px\"><strong>The JVM</strong></span></h3>\r\n\r\n<p><span style=\"font-size:14px\">At runtime, the JVM reads and interprets .class files and executes the program&#39;s instructions on the native hardware platform for which the JVM was written. The JVM interprets the bytecode just as a CPU would interpret assembly-language instructions. The difference is that the JVM is a piece of software written specifically for a particular platform. The JVM is the heart of the Java language&#39;s &quot;write-once, run-anywhere&quot; principle. Your code can run on any chipset for which a suitable JVM implementation is available. JVMs are available for major platforms like Linux and Windows, and subsets of the Java language have been implemented in JVMs for mobile phones and hobbyist chips.</span></p>', 12, 11, 'yes', '2018-Aug-Thu-20-1-th'),
(14, 'What is the Feature of Bootstrap?', '<h4>G<img alt=\"\" src=\"/blog-project/users/ckeditor/kcfinder/upload/images/sl1.jpg\" style=\"border-style:solid; border-width:2px; float:left; height:98px; margin:3px 4px; width:250px\" />et started with Bootstrap, the world&rsquo;s most popular framework for building responsive, mobile-first sites, with BootstrapCDN and a template starter page.</h4>\r\n\r\n<p>Many of our components require the use of JavaScript to function. Specifically, they require&nbsp;<a href=\"https://jquery.com/\">jQuery</a>,&nbsp;<a href=\"https://popper.js.org/\">Popper.js</a>, and our own JavaScript plugins. Place the following&nbsp;<code>&lt;script&gt;</code>s near the end of your pages, right before the closing&nbsp;<code>&lt;/body&gt;</code>&nbsp;tag, to enable them. jQuery must come first, then Popper.js, and then our JavaScript plugins.Curious which components explicitly require jQuery, our JS, and Popper.js? Click the show components link below. If you&rsquo;re at all unsure about the general page structure, keep reading for an example page template.Be sure to have your pages set up with the latest design and development standards. That means using an HTML5 doctype and including a viewport meta tag for proper responsive behaviors. Put it all together and your pages should look like th</p>\r\n\r\n<p>Bootstrap employs a handful of important global styles and settings that you&rsquo;ll need to be aware of when using it, all of which are almost exclusively geared towards the&nbsp;<em>normalization</em>&nbsp;of cross browser styles. Let&rsquo;s dive in.</p>', 3, 10, 'yes', '2018-Sep-Sun-15-1-nd');

-- --------------------------------------------------------

--
-- Table structure for table `reaply`
--

CREATE TABLE `reaply` (
  `id` int(11) NOT NULL,
  `reaplies` varchar(255) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `useid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(15) NOT NULL,
  `images` varchar(150) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `images`, `title`) VALUES
(1, 'images/ss.jpg', 'First Slider'),
(2, 'images/sb.jpg', 'Second image'),
(3, 'images/sa.jpg', 'Third Image');

-- --------------------------------------------------------

--
-- Table structure for table `user_regi`
--

CREATE TABLE `user_regi` (
  `id` int(50) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gander` varchar(20) NOT NULL,
  `trem` varchar(25) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_regi`
--

INSERT INTO `user_regi` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `gander`, `trem`, `path`) VALUES
(5, 'haron', 'rasid', 'Haron', 'haron@gmail.com', '258147', 'male', 'yes', 'uploads/5b7457c24deb4.jpg'),
(9, 'ismail', 'hossain', 'Ismail', 'ismail@gmail.com', '258147', 'male', 'yes', 'uploads/5b73e9a20c7fa.jpg'),
(10, 'Ariful', 'Islam', 'Shove', 'shove22@gmail.vom', '1234567', 'male', 'yes', 'uploads/5b7458b102f9a.jpg'),
(11, 'Anzar', 'Babu', 'Anzar', 'anzar24@gmail.com', '01740390', 'male', 'yes', 'uploads/5b75a8ee6d578.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reaply`
--
ALTER TABLE `reaply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_regi`
--
ALTER TABLE `user_regi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reaply`
--
ALTER TABLE `reaply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_regi`
--
ALTER TABLE `user_regi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
