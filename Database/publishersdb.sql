-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 08:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publishersdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$fCOiMky4n5hCJx3cpsG20Od4wHtlkCLKmO6VLobJNRIg9ooHTkgjK');

-- --------------------------------------------------------

--
-- Table structure for table `author_proposal_tbl`
--

CREATE TABLE `author_proposal_tbl` (
  `proposalid` int(11) NOT NULL,
  `booknature` text NOT NULL,
  `booktitle` text NOT NULL,
  `booksubject` text NOT NULL,
  `bookcourse` text NOT NULL,
  `bookcurrentstatus` text NOT NULL,
  `bookkeyfeatures` text NOT NULL,
  `authorname` text NOT NULL,
  `designation` text NOT NULL,
  `insname` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `pincode` text NOT NULL,
  `telephone` text NOT NULL,
  `email` text NOT NULL,
  `dt` date NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author_proposal_tbl`
--

INSERT INTO `author_proposal_tbl` (`proposalid`, `booknature`, `booktitle`, `booksubject`, `bookcourse`, `bookcurrentstatus`, `bookkeyfeatures`, `authorname`, `designation`, `insname`, `address`, `city`, `country`, `pincode`, `telephone`, `email`, `dt`, `status`) VALUES
(4, 'ajay', 'kem', 'saru chhe', 'khbr nathi', 'Manuscript/Typescript', 'sjfsjdb', 'AJay mAyani', 'Programmer', 'MSU', 'nathi kevu ja', 'e to sav narhi kevu', 'BHARAT', '123', '123', 'jensi123@gmail.com', '2022-01-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `author_tbl`
--

CREATE TABLE `author_tbl` (
  `authorid` int(11) NOT NULL,
  `author_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author_tbl`
--

INSERT INTO `author_tbl` (`authorid`, `author_name`) VALUES
(1, 'Channarayappa'),
(2, 'Sudha Gangal'),
(3, 'Ruchi Singh'),
(4, 'L N Chavali'),
(5, 'R Keshavachandran'),
(6, 'S Janarthanan'),
(7, 'Kunthala Jayaraman');

-- --------------------------------------------------------

--
-- Table structure for table `booksinfo_tbl`
--

CREATE TABLE `booksinfo_tbl` (
  `id` int(11) NOT NULL,
  `bookname` varchar(50) NOT NULL,
  `book_cate_id` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `ISBN` int(20) NOT NULL,
  `pyear` int(4) NOT NULL,
  `booktype` varchar(10) NOT NULL,
  `bookpage` int(5) NOT NULL,
  `language` varchar(10) NOT NULL,
  `booksize` text NOT NULL,
  `bookrights` varchar(20) NOT NULL,
  `bookprice` int(5) NOT NULL,
  `aboutbook` text NOT NULL,
  `bookurl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booksinfo_tbl`
--

INSERT INTO `booksinfo_tbl` (`id`, `bookname`, `book_cate_id`, `authorid`, `ISBN`, `pyear`, `booktype`, `bookpage`, `language`, `booksize`, `bookrights`, `bookprice`, `aboutbook`, `bookurl`) VALUES
(9, 'Molecular Biology', 1, 1, 2147483647, 2015, 'Paperback', 508, 'English', '216 X 280 mm', 'World', 995, 'This book is a comprehensive overview of the subject and is written in a clear and simple language. It also incorporates several student-friendly features. There are numerous illustrations and tables that will enable the readers to grasp the concepts easily. Each chapter begins with Learning Objectives and includes Key Points and Self-assessment Questions. The Further Reading section guides the students towards advanced discussion of the topics. It is hoped that the book will be a valuable textbook to students of biotechnology, genetics and other courses which have molecular biology as a component.', 'uploads/books/1.jpg'),
(10, 'Textbook of Basic and Clinical Immunology', 1, 2, 2147483647, 2013, 'Paperback', 572, 'English', '216 X 280 mm', 'World', 1175, 'The book is thematically divided into two sections.\r\n\r\nThe first sixteen chapters deal with basic immunology. This part deals with development and maturation of cells of the immune system, molecular basis of diversity of immune response, movement of cells to the site of infection directed by soluble mediators, functions of effector cells and molecules, and careful control of harmful effects of activated immune effectors. Chapter 17 is entirely devoted to the principles of laboratory techniques used in immunology.', 'uploads/books/2.jpg'),
(11, 'Cell Biology', 1, 1, 2147483647, 2010, 'Paperback', 624, 'English', '216 X 280 mm', 'World', 1150, 'Cell Biology covers one of the most fundamental and elaborately studied areas of biology: the cell. The cell is the basic unit of life and has all the structural and functional properties required for life. The book has been divided into 20 chapters—beginning with the origin of biological systems and ending with tools for the study of cells. Every effort has been made to include the most recent information. Each chapter is provided with an adequate number of illustrations.\r\nThis book can serve as a basic textbook for students of molecular biology, genetics, biochemistry, agriculture and biotechnology, or as a reference book for those interested in learning the fundamentals of cell biology, in particular, the origin, organization and functions of subcellular components and cell types.', 'uploads/books/3.jpg'),
(12, 'Bioinformatics: Basics, Algorithms and Application', 1, 3, 2147483647, 2010, 'Paperback', 272, 'English', '216 X 280 mm', 'World', 525, 'Bioinformatics has been recognised and studied as a separate discipline only in the last decade. Being a multidisciplinary subject it requires knowledge of several subjects, such as molecular biology, biochemistry, computer science and others. Students in a bioinformatics course are from different academic backgrounds; those who have studied biology (i.e., botany, zoology, biochemistry, microbiology, etc.), will require an introduction to mathematics and computer science, while those with a background in physics, chemistry and mathematics will need explanations of biological principles.', 'uploads/books/4.jpg'),
(13, 'Research Methodology', 2, 4, 2147483647, 2015, 'Paperback', 320, 'English', '216 X 280 mm', 'World', 795, 'Research Methodology addresses empirical research issues with a focus on research design, the problems involved in constructing an appropriate research design and the means to overcome these problems. Data, its sources, methods employed to obtain data, experimental techniques employed, types of errors that may creep in, how to measure, check and control errors are all addressed. Once the data is collected, methods to analyse the data, present them as a cogent report and the limitations of research are dealt with. A detailed case study illustrates all the concepts explained in the book and the chapter-wise assignments will definitely help the student to understand the basic issues of market research. The book is primarily intended to serve as a textbook for the students of Management at the undergraduate and postgraduate levels.', 'uploads/books/9788173719523.jpg'),
(14, 'Collective Bargaining', 2, 7, 2147483647, 2014, 'Paperback', 564, 'English', '216 X 280 mm', 'World', 950, 'This book outlines the concept of collective bargaining as it has developed in many industrial countries. It does not restrict itself to the development and present status of collective bargaining in the industrialised market economies alone, but analyses its development and practice in Indian industries too.', 'uploads/books/9788173716881.jpg'),
(15, 'Production and Operations Management: Theory and P', 2, 5, 2147483647, 2012, 'Paperback', 512, 'English', '216 X 280 mm', 'World', 795, 'Production and Operations Management is a core subject for MBA students; it is compulsory reading for them. This book conforms to the syllabus requirements of most national and international MBA/PGDBM programmes.', 'uploads/books/9788173717765.jpg'),
(16, 'Industrial Psychology', 2, 5, 2147483647, 2012, 'Paperback', 300, 'English', '216 X 280 mm', 'World', 525, 'It is a comprehensive textbook for engineering and management students. The subject is covered in relation to the specific areas of syllabus as well as emerging thoughts in the field. Industrial Psychology or IP is a scientific study of factors affecting employees or workers. It comprises of work and time study, motivation and leadership. It also encompasses highly critical human resource management functions like recruitment, training and development. The modern challenges of managing diversity, change, technology and innovation can be effectively met only with training in IP. The book covers all these aspects in a lucid manner with a student-friendly approach.', 'uploads/books/9788173717840.jpg'),
(17, 'Informatics Practices for CBSE Class XII', 3, 3, 2147483647, 2022, 'Paperback', 228, 'English', '216 X 280 mm', 'World', 250, 'This book deals at length with Series, Data Frames and data visualization using the Python Pandas library module. The book also explores how SQL queries are designed using aggregate functions and data is transferred between SQL database and Pandas. Spread across 6 chapters, the book is replete with programming problems of varying difficulty levels to help students ace their board exams and campus recruitment interviews with ease. Amply supported by illustrative diagrams, keywords and topic highlights, this book is an ideal text that helps students build a firm foundation in the subject.', 'uploads/books/9789389211931.jpg'),
(18, 'Informatics Practices for CBSE Class XI', 3, 1, 2147483647, 2022, 'Paperback', 372, 'English', '216 X 280 mm', 'World', 375, 'This book introduces the student to the components of a computer system and the use of Python as a programming language. Spread across 14 chapters, it explores the use of Python to create programs using different data types, lists and dictionaries and helps the student understand database concepts and Relational Database Management Systems (RDBMS). The book exposes students to programming problems of varying difficulty levels to help them ace their board exams with ease. Amply supported by illustrative diagrams, keywords and topic highlights, this book is an ideal text that helps students build a firm foundation in the subject.', 'uploads/books/9789389211924.jpg'),
(19, 'Computer Science with Python for CBSE Class XII', 3, 2, 2147483647, 2022, 'Paperback', 396, 'English', '216 X 280 mm', 'World', 395, 'This builds on the concepts of Python programming language introduced in Class XI and explores its advanced features such as file handling, recursive functions and data structures. Spread across 11 chapters, the book is replete with a rich pedagogy comprising true-or-false, multiple-choice and NCERT questions apart from programming problems of varying difficulty levels to help students ace their board exams with ease. Amply supported by illustrative diagrams, keywords and topic highlights, this book is an ideal text that helps students build a firm foundation in the subject.', 'uploads/books/9789389211917.jpg'),
(20, 'Computer Science with Python for CBSE Class XI', 3, 4, 2147483647, 2022, 'Paperback', 392, 'English', '216 X 280 mm', 'World', 395, 'This book focuses on the basics of computer science and builds on the concepts, step by step, before introducing Python, a programming language that helps to integrate systems more effectively. Spread across 17 chapters, it exposes students to programming problems of varying difficulty levels to help them ace their board exams with ease. Amply supported by illustrative diagrams, keywords and topic highlights, this book is an ideal text that helps students build a firm foundation in the subject.', 'uploads/books/9789389211900.jpg'),
(21, 'Textbook of Environmental Studies for Undergraduat', 4, 5, 2147483647, 2021, 'Paperback', 288, 'English', '216 X 280 mm', 'World', 325, 'For a decade and a half, this book has been considered the most reliable textbook on the subject for all undergraduate students. This third edition has been revised as per the new AECC syllabus set down by the UGC and has been made extremely user-friendly. The aim of this edition is not only to create an awareness of environmental issues, but also to bring about pro-environmental action.\r\n\r\nThe new, two-colour design of this edition will appeal to students and aid in reading and retention. The unique feature of this textbook is the accompanying App containing additional questions, colour pictures and video lectures.', 'uploads/books/9789389211788.jpg'),
(22, 'Birds, Wild Animals and Agriculture: Conflict and ', 4, 5, 2147483647, 2015, 'Paperback', 224, 'English', '216 X 280 mm', 'World', 895, 'The agriculture–wildlife relationship in India is a multidimensional one, ranging from serious conflict situations to varying levels of tolerance and coexistence. Changes in land use patterns and the population explosion have resulted in increased proximity between humans and wildlife. Birds, however, are generally welcomed by farmers for their many useful roles in agriculture.\r\n\r\nIt is increasingly evident that a way has to be found for humans and wild fauna to live together, ideally in mutually beneficial situations. This book explains the need for a multi-sectoral, locale-specific approach to mitigate distress and to encourage an agreeable relationship between humans and animals. It examines the complexities of the problems concerning conflict and looks at examples of harmonious co-habitation. It is hoped that this work will be useful for agriculturists, wildlife conservationists, students and NGOs working in this field, and also stimulate interest among government policy makers and implementation agencies.', 'uploads/books/9788173719516.jpg'),
(23, 'Textbook of Environmental Studies for Undergraduat', 4, 7, 2147483647, 2014, 'Paperback', 352, 'English', '216 X 280 mm', 'World', 325, 'Environmental studies’ has become an undisputed requirement in the syllabi of all undergraduate courses. The first edition of this textbook was the outcome of the efforts of the Expert Committee constituted by the UGC in response to the directive given by the Supreme Court of India, on the necessity for a basic course on the environment. The Second Edition has incorporated the feedback from the students and faculty to make it more user-friendly. In this JNTU specific edition, apart from focus on sustainable development and the ecological footprint, several topics that were specifically required as per the JNTU syllabus have been added. ', 'uploads/books/9788173719431.jpg'),
(24, 'Textbook of Environmental Studies for Undergraduat', 4, 5, 2147483647, 2013, 'Paperback', 324, 'English', '216 X 280 mm', 'World', 325, 'Environmental studies’ has become an undisputed requirement in the syllabi of all undergraduate courses. The first edition of this textbook was the outcome of the efforts of the Expert Committee constituted by the UGC in response to the directive given by the Supreme Court of India, on the necessity for a basic course on the environment. The Second Edition has incorporated the feedback from the students and faculty to make it more user-friendly.', 'uploads/books/9788173718625.jpg'),
(25, 'Shifting Orbits: Decoding the Trajectory of the In', 5, 5, 2147483647, 2021, 'Paperback', 332, 'English', '216 X 280 mm', 'World', 1250, 'In the new millennium, the shape of India’s vibrant entrepreneurial economy has changed significantly to move towards one driven by technology and innovation. Today, India is one of the largest start-up and innovation hubs in the world, and the Indian start-up ecosystem has become an important contributor in our journey to become a $5 trillion economy.\r\n\r\nShifting Orbits chronicles the spectacular rise of the startup landscape in India in four different sections: innovation, incubation, funding and industry perspectives.', 'uploads/books/9789389211955.jpg'),
(26, 'Ever Upwards: ISRO in Images', 5, 5, 2147483647, 2019, 'Hardcover', 304, 'English', '216 X 280 mm', 'World', 3700, 'The Indian space programme has the unique distinction of being born in a place of worship: the St. Mary Magdalene Church in Thumba, a fishing hamlet near Thiruvananthapuram, the capital of Kerala. From those humble beginnings in 1963, the national space programme grew under the visionary guidance of Vikram Sarabhai and Satish Dhawan to become a technological giant, known today as the Indian Space Research Organisation (ISRO). Sarabhai created ISRO in 1969.', 'uploads/books/9789389211139.jpg'),
(27, 'Nursing Research and Statistics', 5, 4, 2147483647, 2015, 'Paperback', 424, 'English', '216 X 280 mm', 'World', 525, 'This book provides step-by-step instructions how to undertake and execute a research project and how to use statistics and statistical tools to analyse and interpret the findings of the project. With complete coverage of the Nursing syllabus for this subject, this book includes real-life examples tailored to the Indian context. Simple language, tables, graphs and examples help students grasp the main concepts and principles of research and statistics. The book also provides self-evaluation questions to enable students to check their understanding of the subject. Distribution and probability tables are given for easy reference. Previous years’ questions papers enhance this book’s exam-oriented approach.', 'uploads/books/9788173719790.jpg'),
(28, 'Wave Optics and its Applications', 6, 5, 2147483647, 2013, 'Paperback', 420, 'English', '216 X 280 mm', 'World', 875, 'Dr Kalam calls for an Indian Renaissance, which he describes in seven steps involving the common people of the land, and in particular, the youth. He urges people to arise out of servitude to a vested ruling class, awake from the slumber of a passive democracy, and advance to manifest our destiny of a developed nation. He recommends that by turning inward and listening to the voice of our conscience, we can live a virtuous life and thereby build a strong and secure India.', 'uploads/books/9788173719097.jpg'),
(29, 'Objective Questions in Mathematics for JEE Main an', 6, 5, 2147483647, 2022, 'Paperback', 452, 'English', '216 X 280 mm', 'World', 475, 'This book has been designed to provide students with intensive as well as extensive practice of the questions and problems they will encounter in the JEE Mathematics exams. The aim of this book is to improve and enhance the aptitude, proficiency and problem-solving ability of students in Mathematics to enable them to crown their endeavours with success.', 'uploads/books/9789389211870.jpg'),
(30, 'Topics in Abstract Algebra, Third edition', 6, 4, 2147483647, 2019, 'Paperback', 548, 'English', '216 X 280 mm', 'World', 650, 'Replete with thought-provoking examples and worked-out exercises, this third edition of Topics in Abstract Algebra is designed in accordance with the new Choice Based Credit System (CBCS) syllabus of Abstract Algebra and Advanced Abstract Algebra prescribed by UGC for all Indian universities at the UG Honours/Advanced level. Students appearing for competitive entrance examinations such as NET, JAM, ISI, IISc., TIFR, NBHM, GATE, SET or MCA will benefit immensely from the carefully selected Solved Problems, about a hundred of which (of MCQ type) have been newly added to the present edition. Interesting insights to the history of mathematics and mathematicians are also provided in the course of discussion to enable the readers understand the concepts in the right perspective. ', 'uploads/books/9789386235701.jpg'),
(31, 'A Textbook of Complex Analysis', 6, 4, 2147483647, 2018, 'Paperback', 476, 'English', '216 X 280 mm', 'World', 595, 'This book is a comprehensive resource for students of undergraduate postgraduate courses in mathematics, physics and engineering. It makes use of numerous worked-out examples to show how the study of complex numbers and their derivatives and properties helps in solving many physical problems. Beginning with the algebraic and analytic properties of complex numbers, the reader is introduced to topological notions of sets in the complex plane, sequence and series representation of complex numbers, limit, continuity and differentiability of complex functions, and branch cut and branch points in multi-valued functions. Important theorems such as Ascoli–Arzela theorem, Montel’s theorem, Riemann mapping theorem, and the concept of Schawarz–Cristoffel transformations widely used in various fields are established. The notion of entire functions and their properties and direct and indirect analytic continuation of an analytic function, too, are covered. ', 'uploads/books/9789386235657.jpg'),
(32, 'Physics for NEET, Volume 2', 7, 4, 2147483647, 2022, 'Paperback', 624, 'English', '216 X 280 mm', 'World', 624, 'This second volume of Physics for NEET covers the NCERT syllabus for Class XII. The book provides a clear and logical presentation of the basic concepts, principles and their applications. It discusses a broad range of problems with sound physical arguments and problem solving methodology. The questions have been compiled to reflect the current pattern seen in the CBSE and NEET examinations. Chapter-wise MCQs provide an idea of the relative weightage given to the various topics. The book also has app-based content that includes daily practice problems and mock tests for quick revision.', 'uploads/books/9789389211689.jpg'),
(33, 'Physics for NEET, Volume 1', 7, 3, 2147483647, 2022, 'Paperback', 784, 'English', '216 X 280 mm', 'World', 795, 'This first volume of Physics for NEET covers the NCERT syllabus for Class XI. The book provides a clear and logical presentation of the basic concepts, principles and their applications. It discusses a broad range of problems with sound physical arguments and problem solving methodology. The questions have been compiled to reflect the current pattern seen in the CBSE and NEET examinations. Chapter-wise MCQs provide an idea of the relative weightage given to the various topics. The book also has app-based content that includes daily practice problems and mock tests for quick revision.', 'uploads/books/9789389211672.jpg'),
(34, 'Objective Questions in Physics for JEE Main and Ad', 7, 4, 2147483647, 2022, 'Paperback', 440, 'English', '216 X 280 mm', 'World', 475, 'This book has been designed to provide students with intensive as well as extensive practice of the questions and problems they will encounter in the JEE Physics exams. The aim of this book is to improve and enhance the aptitude, proficiency and problem-solving ability of students in Physics to enable them to crown their endeavours with success.', 'uploads/books/9789389211856.jpg'),
(35, 'Nuclear and Particle Physics: An Introduction', 7, 4, 2147483647, 2020, 'Paperback', 334, 'English', '216 X 280 mm', 'World', 475, 'This book is intended primarily for BSc Honours and General students pursuing Physics in various Indian universities. It provides complete and comprehensive coverage of Nuclear and Particle Physics as specified by the new Choice-Based Credit System (CBCS) syllabus. Topics include the properties of nuclei, different nuclear models, radioactive decay, nuclear reactions, interaction of radiation with', 'uploads/books/9789389211153.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `books_category_tbl`
--

CREATE TABLE `books_category_tbl` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_category_tbl`
--

INSERT INTO `books_category_tbl` (`id`, `cat_name`) VALUES
(1, 'Biotechnology'),
(2, 'Business and Management'),
(3, 'Computer Science'),
(4, 'Environment & Biodiversity'),
(5, 'General Interest'),
(6, 'Mathematics'),
(7, 'Physics and Chemistry');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`id`, `name`, `email`, `message`) VALUES
(1, 'Mayani ajay bhikhabhai', 'ajmayani7@gmail.com', 'dvfdjkbvdfjbfdjh');

-- --------------------------------------------------------

--
-- Table structure for table `events_tbl`
--

CREATE TABLE `events_tbl` (
  `eventid` int(11) NOT NULL,
  `eventtitle` varchar(50) NOT NULL,
  `eventauthor` varchar(20) NOT NULL,
  `launchdate` date NOT NULL,
  `eventvenue` varchar(20) NOT NULL,
  `eventimg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events_tbl`
--

INSERT INTO `events_tbl` (`eventid`, `eventtitle`, `eventauthor`, `launchdate`, `eventvenue`, `eventimg`) VALUES
(18, 'CONSERVATION BIOLOGY: A PRIMER FOR SOUTH ASIA', 'Kamaljit S Bawa;Rich', '2011-03-26', 'New Delhi', 'uploads/events/1.jpg'),
(19, 'EFFECTIVE E-LEARNING: DESIGN, DEVELOPMENT AND DELI', 'Madhuri Dubey', '2011-03-04', 'Hyderabad', 'uploads/events/2.jpg'),
(20, 'KNOW YOUR ENGLISH (VOL. 1): IDIOMS AND THEIR STORI', 'S Upendran', '2011-09-07', 'Chennai', 'uploads/events/3.jpg'),
(21, 'KNOW YOUR ENGLISH VOL.2: WORDS FREQUENTLY CONFUSED', 'S Upendran', '2013-02-09', 'Chennai', 'uploads/events/4.jpg'),
(22, 'WHAT ARE THE STARS?', 'G Srinivasan', '2022-01-26', 'Bangalore', 'uploads/events/5.jpg'),
(23, 'CAN STARS FIND PEACE?', 'G Srinivasan', '2022-01-26', 'Bangalore', 'uploads/events/6.jpg'),
(24, 'THE MANAGEMENT OF LABOUR', 'Sir Sabaratnam Arulk', '2022-01-26', 'Chennai', 'uploads/events/7.jpg'),
(25, 'KARIAMANIKKAM SRINIVASA KRISHNAN: HIS LIFE AND WOR', 'D C V Mallik;S Chatt', '2022-01-26', 'Bangalore', 'uploads/events/8.jpg'),
(26, 'PATHS OF INNOVATORS, VOLUME I', 'R Parthasarathy', '2022-01-26', 'Venue: Sir Sivaswamy', 'uploads/events/9.jpg'),
(27, 'SQUARING THE CIRCLE: SEVEN STEPS TO INDIAN RENAISS', 'APJ Abdul Kalam;Arun', '2022-01-26', 'Hyderabad', 'uploads/events/10.jpg'),
(28, 'A PRACTICAL GUIDE TO OBSTETRICS: COST-EFFECTIVE, E', 'Gita Arjun, Lakshmi ', '2022-01-26', 'Chennai', 'uploads/events/11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specimen_req_tbl`
--

CREATE TABLE `specimen_req_tbl` (
  `request_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `book_category_id` varchar(2) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specimen_req_tbl`
--

INSERT INTO `specimen_req_tbl` (`request_id`, `name`, `book_category_id`, `book_name`, `telephone`, `email`, `address`, `dt`, `status`) VALUES
(2, 'Ajay', '2', 'ba', '123', 'a@gmai.com', 'velaja', '2022-02-02 11:37:37', 1),
(6, 'Abhay', '1', 'Bio Technology', '9712552155', 'abhay@mail.com', 'Gadhpur', '2022-02-02 20:37:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `userid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobilenumber` text NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `dt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`userid`, `name`, `mobilenumber`, `emailid`, `password`, `dt`) VALUES
(5, 'Ajay Mayani', '9712552155', 'ajmayani7@gmail.com', '$2y$10$rK.O2z1k8rclxzoyFb3h1O55fC2FS9xiMx9L3kZ4Y7xAGtxvJ6psC', '2022-01-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author_proposal_tbl`
--
ALTER TABLE `author_proposal_tbl`
  ADD PRIMARY KEY (`proposalid`);

--
-- Indexes for table `author_tbl`
--
ALTER TABLE `author_tbl`
  ADD PRIMARY KEY (`authorid`);

--
-- Indexes for table `booksinfo_tbl`
--
ALTER TABLE `booksinfo_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_category_tbl`
--
ALTER TABLE `books_category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_tbl`
--
ALTER TABLE `events_tbl`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `specimen_req_tbl`
--
ALTER TABLE `specimen_req_tbl`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `author_proposal_tbl`
--
ALTER TABLE `author_proposal_tbl`
  MODIFY `proposalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `author_tbl`
--
ALTER TABLE `author_tbl`
  MODIFY `authorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booksinfo_tbl`
--
ALTER TABLE `booksinfo_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `books_category_tbl`
--
ALTER TABLE `books_category_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events_tbl`
--
ALTER TABLE `events_tbl`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `specimen_req_tbl`
--
ALTER TABLE `specimen_req_tbl`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
