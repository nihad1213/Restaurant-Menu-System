CREATE DATABASE login_register;
USE login_register;


CREATE TABLE users(
    usersID int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usersName varchar(128) NOT NULL,
    usersEmail varchar(128) NOT NULL,
    usersUid varchar(128) NOT NULL,
    usersPassword varchar(128) NOT NULL
);


