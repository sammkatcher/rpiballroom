--
-- Database : ballroom_ballroom
--
-- --------------------------------------------------
-- ---------------------------------------------------
SET AUTOCOMMIT = 0 ;
SET FOREIGN_KEY_CHECKS=0 ;
--
-- Tabel structure for table `FY2014_info`
--
DROP TABLE  IF EXISTS `FY2014_info`;
CREATE TABLE `FY2014_info` (
  `CHANGEDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER` varchar(255) DEFAULT NULL,
  `GOAL` char(1) DEFAULT NULL,
  `PROGRAM` int(12) DEFAULT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `INFOID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INFOID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--
-- Tabel structure for table `FY2014_lines`
--
DROP TABLE  IF EXISTS `FY2014_lines`;
CREATE TABLE `FY2014_lines` (
  `CHANGEDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER` varchar(255) DEFAULT NULL,
  `GOAL` char(1) DEFAULT NULL,
  `PROGRAM` int(12) DEFAULT NULL,
  `LINECODE` varchar(10) DEFAULT NULL,
  `UNITPRICE` decimal(8,2) DEFAULT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `QUANTITY` int(12) DEFAULT NULL,
  `LINEID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`LINEID`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","1","371","55.00","Ballroom Team: Non-RPI-Students (4/semester)","8","1");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","1","371","35.00","Ballroom Team: RPI Students (45/semester)","90","2");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","1","371","75.00","Lesson Tracks: Non-RPI-Students (17/semester)","34","3");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","1","371","50.00","Lesson Tracks: RPI Students (90/semester)","180","4");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","2","047","50.00","Argentine Tango Lessons (1 hour)","40","5");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","2","047","110.00","Ballroom/Latin Lessons (1 hour)","54","6");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","2","047","50.00","Lindy Hop Lessons (1 hour)","44","7");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","2","047","110.00","Team Technique Lesson (1 hour)","18","8");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","3","047","60.00","Small Group Lesson","30","9");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","3","RU0","30.00","Small Group Lesson Fee","30","10");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","A","3","L12","50.00","Syllabus Books (American Style Bronze and Silver Levels)","2","11");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","1","RU0","15.00","Admission (Non-RPI-Students)","12","12");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","1","RU0","0.00","Admission (RPI Students covered by dues)","12","13");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","1","047","100.00","Instruction (2 hours)","4","14");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","2","047","150.00","Instruction (3 hours)","2","15");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","2","RU0","15.00","Workshop Fee (Non-RPI Students)","10","16");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","2","RU0","0.00","Workshop Fee (RPI Students)","20","17");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","3","RU0","0.00","Admission (Non-Members) (5/semester)","10","18");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","3","047","0.00","Instruction (4 hours * 2 instructors at 30/hour)","2","19");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","3","RU0","0.00","Workshop Fee (Members)","10","20");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","4","047","240.00","Bronze American Style Lesson (1 hour, 1 per semester)","2","21");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","4","RU0","20.00","Participation Fee American (24 per workshop, 2 workshops) - RPI Students","48","22");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","4","RU0","30.00","Participation Fee American (2 per workshop, 2 workshops) - Non-RPI-Students","4","23");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","4","047","240.00","Silver American Style Lesson (1 hour, 1 per semester)","2","24");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","4","RU0","30.00","Small Group Lesson Fee American (Split amongst participants)","8","25");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","4","047","60.00","Small Group Lessons American (8 lessons per workshop, 2 workshops)","8","26");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","5","047","240.00","Bronze International Style Lesson (1 hour, 1 workshop per semester)","2","27");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","5","RU0","20.00","Participation Fee International (24 per, 2 workshops) - RPI Students","48","28");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","5","RU0","30.00","Participation Fee International (2 per, 2 workshops) - Non-RPI-Students","8","29");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","5","047","240.00","Silver International Style Lesson (1 hour, 1 workshop per semester)","2","30");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","5","RU0","30.00","Small Group Lesson Fees International (Split amongst participants)","8","31");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","B","5","047","60.00","Small Group Lesson International (8 lessons per workshop, 1 workshop per semester)","8","32");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","C","1","114","2.50","General Food Purchases (90 members/semester * 2 semesters)","180","33");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","1","089","40.00","Competition Registration Fee","40","34");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","1","RU0","35.85","Student Contribution (60%)","40","35");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","1","111","60.00","Travel Expenses (Gas and Tolls)","8","36");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","1","111","155.00","Vehicle Rentals","2","37");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","2","089","40.00","Competition Registration Fee","40","38");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","2","111","150.00","Hotel Rooms","8","39");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","2","RU0","55.50","Student Contribution (60%)","40","40");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","2","111","95.00","Travel Expenses (Gas and Tolls)","8","41");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","2","111","130.00","Van Rental","1","42");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","3","089","40.00","Competition Registration Fee","40","43");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","3","RU0","37.00","Student Contribution (60%)","40","44");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","3","111","75.00","Travel Expenses (Gas and Tolls)","8","45");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","3","111","130.00","Van Rentals","2","46");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","4","089","40.00","Competition Registration Fee","45","47");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","4","RU0","31.00","Student Contribution (60%)","45","48");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","4","111","65.00","Travel Expenses (Gas and Tolls)","9","49");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","4","111","130.00","Van Rental","1","50");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","5","089","40.00","Competition Registration Fee","40","51");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","5","RU0","36.50","Student Contribution (60%)","40","52");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","5","111","70.00","Travel Expense (Gas and Tolls)","8","53");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","5","111","130.00","Van Rentals","2","54");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","6","089","40.00","Competition Registration","40","55");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","6","RU0","32.40","Student Contribution (60%)","40","56");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","D","6","111","70.00","Travel Expenses (Gas and Tolls)","8","57");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: Argentine Tango Milonga","100","58");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: Dancing with the RPI Stars","100","59");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: Fall Activities Fair","100","60");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: Lessons","100","61");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: Masquerave","100","62");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: RPI Ballroom Dance Competition","100","63");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: Spring Activities Fair","100","64");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: Swing Dances","100","65");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: The Introduction Dance","100","66");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","038","0.00","Flyers: Workshops (Argentine Tango, Ballroom/Latin, Lindy Hop)","300","67");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","040","0.00","Posters: RPI Ballroom Dance Competition","2","68");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","1","040","0.15","Tickets: RPI Ballroom Comp","200","69");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","2","PC","0.00","Argentine Tango Milonga","1","70");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","2","PC","0.00","Dancing with the RPI Stars","2","71");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","2","PC","0.00","Lesson Tracks","1","72");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","2","PC","0.00","Live Swing Dances","1","73");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","2","PC","0.00","Masquerave","1","74");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","E","2","PC","0.00","RPI Ballroom Dance Competition","2","75");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","1","092","0.00","Boutonniere (3 for Judges, 2 for MCs)","5","76");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","1","085","0.00","Chairs (Clifton Park Rental)","0","77");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","1","092","0.00","Event DVDs from RPITV (Gifts for Performers)","22","78");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","1","085","0.00","Floor (Clifton Park Rentals)","1","79");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","1","092","0.00","Flower Bouquets (Gifts for Performers)","22","80");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","1","085","0.00","Projector Rental (LiveSound, Inc.)","1","81");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","1","085","0.00","UPAC Lights","1","82");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","1","085","0.00","UPAC Sound","1","83");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","2","RU0","10.00","Admission (Non-RPI-Students)","10","84");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","2","RU0","5.00","Admission (RPI Students)","50","85");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","2","009","20.00","Decorations","1","86");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","2","RU0","2.50","Mask Fee","40","87");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","2","114","150.00","Refreshments","1","88");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","2","564","210.00","UPAC Lights (90 setup +  60 break down + 60 for 3 hours)","1","89");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","2","564","210.00","UPAC Sound (8 hours * 2 technicians * 10/hr + 50 for setup)","1","90");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","3","RU0","10.00","Admission (Non-RPI-Students)","14","91");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","3","047","50.00","Lesson for beginners (1 hour)","2","92");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","3","114","20.00","Refreshments","2","93");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","4","RU0","5.00","Admission (Non-RPI-Students)","4","94");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","4","RU0","0.00","Admission (RPI Student)","50","95");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","4","114","25.00","Refreshments","2","96");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","5","RU0","15.00","Admission (Non-RPI Students)","0","97");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","5","RU0","18.00","Admission (Non-Students)","0","98");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","5","RU0","8.00","Admission (RPI Students)","0","99");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","5","047","1800.00","Live Jazz Band","0","100");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","5","031","25.00","Refreshments","0","101");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","5","047","180.00","UPAC Lights","0","102");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","5","001","180.00","UPAC Sound","0","103");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","6","001","25.00","Decorations (Hanging lights, etc)","1","104");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","6","031","0.00","Food (Fruit, Crackers, etc.)","0","105");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","F","6","564","0.00","UPAC Sound Equipment Rental","1","106");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","1","047","500.00","Chairman of Judges","1","107");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","1","047","400.00","Disc Jockey (DJ)","1","108");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","1","047","100.00","Housing for Professionals","6","109");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","1","047","400.00","Judges","7","110");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","1","047","150.00","Master of Ceremony (MC)","1","111");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","1","114","15.00","Meals For Professionals","12","112");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","1","114","6.00","Meals for Volunteers","30","113");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","1","047","100.00","Registrar","1","114");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","1","047","350.00","Scrutineer","1","115");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","2","009","0.25","Competitor Numbers","400","116");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","2","080","175.00","Food to Sell","1","117");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","2","RU0","350.00","Food Vending","1","118");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","2","009","40.00","Miscellaneous Supplies","1","119");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","2","099","0.35","Ribbons","660","120");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","2","009","10.00","Safety Pins","1","121");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","3","RU0","100.00","1/2 Page Ad","1","122");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","3","RU0","50.00","1/4 Page Ad","1","123");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","3","RU0","25.00","1/8 Page Ad","1","124");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","3","RU0","200.00","Full Page Ad","1","125");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","3","040","0.50","Printed Competition Programs","200","126");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","4","RU0","40.00","Adult Competitor Fee","6","127");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","4","RU0","5.00","Late Registration Fee","5","128");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","4","RU0","5.00","Spectator Admission (Non-RPI-Students)","15","129");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","4","RU0","3.00","Spectator Admission (RPI Students)","30","130");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","4","RU0","40.00","Student Competitor Fee","130","131");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","5","RU0","10.00","Bronze Sponsorship","2","132");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","5","RU0","50.00","Gold Sponsorship","2","133");
INSERT INTO `FY2014_lines`  VALUES ( "2014-02-09 15:32:32","scraper","G","5","RU0","25.00","Silver Sponsorship","2","134");


--
-- Tabel structure for table `FY2014_trans`
--
DROP TABLE  IF EXISTS `FY2014_trans`;
CREATE TABLE `FY2014_trans` (
  `CHANGEDATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USER` varchar(255) DEFAULT NULL,
  `GOAL` char(1) DEFAULT NULL,
  `PROGRAM` int(12) DEFAULT NULL,
  `LINECODE` varchar(10) DEFAULT NULL,
  `UNITPRICE` decimal(8,2) DEFAULT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `QUANTITY` int(12) DEFAULT NULL,
  `LINEID` int(11) DEFAULT NULL,
  `TRANSID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`TRANSID`),
  FULLTEXT KEY `DESCRIPTION` (`DESCRIPTION`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 22:54:41","lentis","A","1","371","2.00","test123","2","1","18");
INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 22:44:36","lentis","A","1","371","2.00","test2","1","4","15");
INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 22:54:49","lentis","A","1","371","1.00","test456","1","3","19");
INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 22:54:58","lentis","A","2","047","4.00","trst12","1","8","20");
INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 22:55:05","lentis","B","1","RU0","5.00","test3","4","13","21");
INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 22:55:31","lentis","A","3","047","2.50","rwstdsf","2","9","22");
INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 22:55:41","lentis","B","2","RU0","45.00","tesdt","2","16","23");
INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 22:56:14","lentis","A","1","371","1.00","This is a very long descriptuon which hopefully will format well.","1","1","24");
INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 23:28:50","bivons","F","2","564","100.00","test again","1","90","25");
INSERT INTO `FY2014_trans`  VALUES ( "2014-02-09 23:31:31","bivons","F","6","001","25.00","another test","1","104","26");


SET FOREIGN_KEY_CHECKS = 1 ; 
COMMIT ; 
SET AUTOCOMMIT = 1 ; 
