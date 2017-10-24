/* Creating the Database */

DROP DATABASE IF EXISTS phpquiz;
CREATE DATABASE phpquiz;
USE phpquiz;

/* Creating the Tables */

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `address` varchar(200) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectid` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `answer1` varchar(500) NOT NULL,
  `answer2` varchar(500) NOT NULL,
  `answer3` varchar(500) NOT NULL,
  `answer4` varchar(500) NOT NULL,
  `correctanswer` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subjects_idsubject_idx` (`subjectid`),
  CONSTRAINT `fk_subjects_idsubject` FOREIGN KEY (`subjectid`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_userid_idx` (`userid`),
  KEY `fk_subjects_subjectid_idx` (`subjectid`),
  CONSTRAINT `fk_subjects_subjectid` FOREIGN KEY (`subjectid`) REFERENCES `subjects` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* Inserting the Values */

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `phone`, `address`, `username`, `password`) VALUES
(1,'Admin','Admin','admin@admin.com','6476753311','46 Spadina Avenue','admin','admin'),
(2,'Guilherme','Crozariol','hello@gcrozariol.com','6476753313','12 Deerford Road','guilherme','1234'),
(3,'Alfredo','Fernandes','hello@alfredofernandes.com','4165000594','890 Mount Pleasant Road','alfredo','1234'),
(4,'Juliana','Lacerda','hello@julianalacerda.com','6479388639','32 Erskine Avenue','juliana','1234');

INSERT INTO `subjects` (`id`, `subject`) VALUES
(1,'C'),
(2,'C#');

INSERT INTO `questions` (`id`, `subjectid`, `title`, `answer1`, `answer2`, `answer3`, `answer4`, `correctanswer`) VALUES
(1,1,'We can insert pre written code in a C program by using:','#read','#get','#include','#put','c'),
(2,1,'The first expression in a for loop is:','Step value of loop','Value of the counter variable','Any of above','None of above','b'),
(3,1,'Break statement is used for:','Quit a program','Quit the current iteration','Both of above','None of above','b'),
(4,1,'Continue statement used for:','To continue to the next line of code','To stop the current iteration and begin the next iteration from the beginning','To handle run time error','None of above','b'),
(5,1,'Due to variable scope in c:','Variables created in a function cannot be used another function','Variables created in a function can be used in another function','Variables created in a function can only be used in the main function','None of above','a'),
(6,1,'What is the difference between calloc() and malloc()?','calloc() takes a single argument while malloc() needs two arguments','malloc() takes a single argument while calloc() needs two arguments','malloc() initializes the allocated memory to zero','calloc() initializes the allocated memory to NULL','b'),
(7,1,'Which of the following below is/are valid C keywords?','Integer','int','null','None of above','b'),
(8,1,'Total number of keywords in C are:','30','32','48','132','b'),
(9,1,'rand() function returns:','Float value','Integer value','Any type','None of above','b'),
(10,1,'What is the difference between structure and union?','We can define functions within structures but not within a union','We can define functions within union but not within a structure','The way memory is allocated','There is no difference','c'),
(11,1,'The compiler in C ignores all text till the end of line using:','//','/','*/','None of above','a'),
(12,1,'Which operator in C can\'t be overloaded?','%','+','::','-','a'),
(13,1,'What is the purpose of getc()?','Read a character from STDIN','Read a character from a file','Read all file','Read random file','b'),
(14,1,'What among following is true about stack?','Stack cannot reuse its memory','All elements are of different datatypes','All operation done at one end','None of above','c'),
(15,1,'A member is a:','Variable in a structure','Datatype of structure','Structure pointer','None of above','a'),
(16,1,'Structures can be used:','To hold different datatypes','To have pointers to structures','To assign to one another','All of above','d'),
(17,1,'UML meaning is: ','Unique modeling language','Unified modeling language','Unique modern language','Unique master language','b'),
(18,1,'printf() belongs to which library of C?','stdlib.h','stdio.h','stdout.h','stdoutput.h','b'),
(19,1,'A variable in C:','Must have a valid datatype','Can\'t have a name same as keyword','Must have a name starting with a character','All of above','d'),
(20,1,'What is correct order of precedence in C?','Addition, Division, Modulus','Addition, Modulus, Division','Multiplication, Substration, Modulus','Modulus, Multiplication, Substration','d'),
(21,2,'All members of class have which access to its members?','Private','Public','Protected','Depends','a'),
(22,2,'Constructor is:','A class automatically called whenever a new object of this class is created','A class automatically called whenever a new object of this class is destroyed','A function automatically called whenever a new object of this class is created','A function automatically called whenever a new object of this class is destroyed','c'),
(23,2,'Declaring pointer more than one can cause:','Trap','Abort a program','Error','Non of above','a'),
(24,2,'Meaning of deed copy is:','A deep copy creates a copy of the dynamically allocated objects too','A deep copy just copies the values of the data as they are','A deep copy creates a copy of the statically allocated objects too','Both A and C','a'),
(25,2,'Which is not a correct variable type?','Float','Int','Double','Real','d'),
(26,2,'Difference between static and dynamic memory allocation is:','In static memory allocation memory to be allocated in preknown','In dynamic memory allocation memory to be allocated in preknown','There is no difference','Not exact difference is mentioned','a'),
(27,2,'Expression x.y represents as:','Member x of object y','Member y of object x','Member y of object pointed by x','All of above','b'),
(28,2,'Which of the following cannot be inherited from the base class?','Constructor','Friend','Both A and B cannot be inherited','Both A and B can be inherited','c'),
(29,2,'Count is declared in the _____ standard file within the std namespace:','outstream','stdin','iostream','None of above','c'),
(30,2,'Dereference operator is also called as:','Pointer','Reference operator','Offset operator','Deoffset operator','c'),
(31,2,'Which class has only one unique value for all the objects of class?','this','friend','static','None of above','c'),
(32,2,'Which of the following functions below can be used to allocate space for array in memory?','calloc()','malloc()','realloc()','All of above','a'),
(33,2,'Which type of variables can be referred from anywhere in the c++ code?','All variables','Local variables','Universal variables','Global variables','d'),
(34,2,'What is the value of sizeof(char)?','1','2','4','8','a'),
(35,2,'If value has not type, then the pointer pointing to this value will be known as:','Empty pointer','Null pointer','Void pointer','None of above','c'),
(36,2,'Which arithmetic operation can be done in pointer?','Multiplication','Division','Addition','None of above','c'),
(37,2,'Inline functions are invoked at:','Runtime','Compile time','Debug time','None of above','b'),
(38,2,'What is the size of int datatype for 32-bit system:','1 byte','2 byte','4 byte','8 byte','c'),
(39,2,'How we define our name for constants?','#constant','#define','#define_constant','#constant_define','b'),
(40,2,'C++ programs must contain:','start()','system()','main()','program()','c');