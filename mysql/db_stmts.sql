create table Users (
    userID int NOT NULL AUTO_INCREMENT, 
    email varchar(100) NOT NULL, 
    position varchar(20) NOT NULL, 
    firstName varchar(20) NOT NULL, 
    lastName varchar(39) NOT NULL, 
    startDay DATE, 
    endDay DATE, 
    u_status int,
    PRIMARY KEY (userID), 
    UNIQUE (email)
    );

CREATE TABLE Logins(
    userID int not null,
    hashedPassword varchar(100) not null,
    Primary KEY(userID),
    foreign key (userID) references Users(userID)
);

