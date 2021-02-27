CREATE DATABASE Project1;
USE project1;
CREATE TABLE bookstore (
  userid int NOT NULL AUTO_INCREMENT,
  bookname varchar(50),
  quantity varchar(500),
  image varchar(500),
  PRIMARY KEY (userid)
);