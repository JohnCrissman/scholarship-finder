create table Users (
    userID int NOT NULL AUTO_INCREMENT, 
    email varchar(100) NOT NULL, 
    position varchar(20) NOT NULL, 
    firstName varchar(20) NOT NULL, 
    lastName varchar(39) NOT NULL, 
    startDay datetime, 
    endDay datetime, 
    u_status int,
    PRIMARY KEY (userID), 
    UNIQUE (email)
    );

create table Login(
    userID int not null,
    hashedPassword varchar(100) not null,
    Primary KEY(userID),
    foreign key (userID) references Users(userID)
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
    deadline datetime,
    minRequirements varchar(100),
    gpa int default 1,
    applyURL varchar(200),
    state boolean,
    sponsorID int,
    regDay datetime,
    PRIMARY KEY(scholarshipID),
    FOREIGN KEY(sponsorID) REFERENCES Sponsor(sponsorID)
    );


create table StudentSaves(
    studentID int not null,
    scholarshipID int not null,
    dateSaved datetime,
    PRIMARY KEY(studentID,scholarshipID),
    FOREIGN KEY(studentID) REFERENCES Users(userID),
    FOREIGN KEY(scholarshipID) REFERENCES Scholarship(scholarshipID)
    );



