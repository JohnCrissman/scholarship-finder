create table Users (
    userID int NOT NULL AUTO_INCREMENT, 
    email varchar(100) NOT NULL, 
    position varchar(20) NOT NULL, 
    firstName varchar(20) NOT NULL, 
    lastName varchar(39) NOT NULL, 
    startDay date, 
    endDay date, 
    u_status int,
    PRIMARY KEY (userID), 
    UNIQUE (email)
    );

create table Login(
    userID int not null,
    hashedPassword varchar(100) not null,
    Primary KEY(userID),
    foreign key (userID) references Users(userID)
    on delete cascade
    );

create table Sponsor(
    sponsorID int not null AUTO_INCREMENT,
    spCompanyName varchar(20),
    spAgentName varchar(20),
    spPhone varchar(20),
    spEmail varchar(100),
    spURL varchar(20),
    PRIMARY KEY(sponsorID)
    );

create table Scholarship(
    scholarshipID int not null AUTO_INCREMENT,
    title varchar(100),
    amount int,
    deadline date,
    minRequirements varchar(100),
    gpa int default 1,
    applyURL varchar(200),
    state boolean,
    sponsorID int,
    regDay date,
    PRIMARY KEY(scholarshipID),
    FOREIGN KEY(sponsorID) REFERENCES Sponsor(sponsorID)
    );


create table StudentSaves(
    studentID int not null,
    scholarshipID int not null,
    dateSaved date,
    PRIMARY KEY(studentID,scholarshipID),
    FOREIGN KEY(studentID) REFERENCES Users(userID),
    FOREIGN KEY(scholarshipID) REFERENCES Scholarship(scholarshipID)
    );

--# check syntax
create procedure ScholarshipAndSponsor() 
    select s.title, p.spCompanyName, minRequirements, gpa, amount, deadline
    from Scholarship s 
    join Sponsor p 
    where s.sponsorID=p.sponsorID ;
    
--# check syntax
create procedure ShowSavesToStudent(in userID int)
    select s.title, p.spCompanyName, minRequirements, gpa, amount, deadline
    from Scholarship s
    join Sponsor p
    join StudentSaves t
    where s.sponsorID=p.sponsorID
    and s.scholarshipID = t.scholarshipID
    and userID = t.studentID;


insert ignore into Users (email, position, firstName, lastName, startDay, u_status)
values ("kbroflovski123456@neiu.edu", "student", "Kyle", "Broflovski", "2019-01-11", 1),
("ECartman123456@neiu.edu", "student", "Eric", "Cartman", "2019-01-12", 1),
("KMcCormick123456@neiu.edu", "student", "Kenny", "McCormick", "2019-01-13", 1),
("SMarsh123456@neiu.edu", "student", "Stan", "Marsh", "2019-01-14", 1),
("BWallace123456@neiu.edu", "coordinator", "Barret", "Wallace", "2018-02-04", 1),
("CHighwind123456@neiu.edu", "coordinator", "Cid", "Highwind", "2017-09-08", 1),
("TLockhart123456@neiu.edu", "supervisor", "Tifa", "Lockhart", "2015-02-012", 1),
("CStrife123456@neiu.edu", "student", "Cloud", "Strife", "1999-03-05", 1),
("AGainsborough123456@neiu.edu", "student", "Aerith", "Gainsborough", "1999-03-05", 1),
("VValentine123456@neiu.edu", "student", "Vincent", "Valentine", "1994-08-21", 1),
("HSimpson123456@neiu.edu", "supervisor", "Homer", "Simpson", "1989-12-30", 1);

insert ignore into Login values
(1, "cat"),
(2, "dog"),
(3, "bird"),
(4, "fish"),
(5, "penguin"),
(6, "elephant"),
(7, "turtle"),
(8, "lion"),
(9, "monkey"),
(10, "wolf"),
(11, "whale");

insert ignore into Sponsor(spCompanyName, spAgentName, spPhone, spEmail, spURL)
values ("A Company", "Dwight Schrute", "000-000-0000-0000", "DSchrute123456@neiu.edu", "ACompany.dwightschrute"),
("B Company", "Pam Beesly", "111-111-1111-1111", "PBeesly123456@neiu.edu", "BCompany.pambeesly"),
("C Company", "Michael Scott", "222-222-2222-2222", "MScott1234567@neiu.edu", "CCompany.michaelscott"),
("D Company", "Kelly Kapoor", "333-333-3333-3333", "KKapoor123456@neiu.edu", "DCompany.kellykapoor");

insert ignore into Scholarship (title, amount, deadline, minRequirements, gpa, applyURL, sponsorID, regDay) values
("Newton Scholarship", 1000, "2020-01-01", "be a student", 3, "NewtonScholarship.newton", 1, "2019-06-01"),
("Euclid Scholarship", 2000, "2019-08-01", "love math", 2, "EuclidScholarship.euclid", 1, "2019-02-01"),
("Gauss Scholarship", 3000, "2020-02-01", "be familiar Gaussian distributions", 3, "GaussScholarship.gauss", 1, "2019-05-01"),
("Euler Scholarship", 4000, "2019-10-01", "be able to thoroughly discuss Eurler's Identity in an interview", 1, "EulerScholarship.euler", 1, "2019-05-01"),
("Pythagoras Scholaship", 5000, "2020-01-01", "know all of Pythagoras's theorems", 4, "PythagorasScholarship.pythagoras", 2, "2018-01-01"),
("Archimedes Scholarship", 6000, "2020-12-01", "Be able to discuss all the contributions Archimedes gave to mathematics", 2, "ArchimedesScholarship.archimedes", 2, "2019-12-01"),
("Bernhard Riemann Scholarship", 7000, "2019-11-15", "submit a valid solution to the Riemann hypothesis", 1, "RiemannScholarship.riemann", 2, "2019-11-14"),
("Srinivasa Ramanujan Scholarship", 8000, "2020-01-15", "only enjoy doing math", 4, "RamanujanScholarship.ramanujan", 3, "2019-10-15"),
("Alan Turing Scholarship", 9000, "2021-01-01", "have made as much contribution to mathematics as Alan Turing has", 3, "TuringScholarship.turing", 3, "2020-01-01"),
("Fibonacci Scholarship", 500, "2020-01-01", "find the Nth term of the Fibonacci sequence in constant time", 3, "FibonacciScholarship.Fibonacci", 4, "2019-04-01"),
("Brahmagupta Scholarship", 10000, "2020-01-10", "submit a proof of Brahmagupta's formula and be able to defend it in person", 4, "BrahmaguptaScholarship.brahmagupta", 4, "2019-03-01");

insert ignore into StudentSaves values
(1, 3),
(2, 7),
(3, 10);

create view Students AS
SELECT * from Users where position= 'student'

create view Coordinators as 
SELECT * from Users where position= 'coordinator'

INSERT INTO Users (email, position, firstName, lastName,startDay) VALUES ('$email','coordinator', '$firstName', '$lastName',NOW());

UPDATE Users SET email='$email', firstName='$firstName', lastName='$lastName' where userID = $id;

UPDATE Sponsor SET spCompanyName='$name', spAgentName = '$agent', spPhone='$phone', spEmail='$email', spURL='$sponsorUrl' where sponsorID = $id;

UPDATE Scholarship SET title='$title', deadline= '$deadline', amount= $award, gpa=$gpa where scholarshipID = $id;

