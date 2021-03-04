CREATE DATABASE Project1;
USE project1;
CREATE TABLE bookstore (
  userid int NOT NULL AUTO_INCREMENT,
  bookname varchar(50),
  price decimal(10,2),
  quantity INT,
  image varchar(500),
  PRIMARY KEY (userid)
);


CREATE TABLE orders (
  orderid int NOT NULL AUTO_INCREMENT,
  firstname varchar(50),
  email varchar(50),
  address varchar(500),
  PRIMARY KEY (orderid)
);