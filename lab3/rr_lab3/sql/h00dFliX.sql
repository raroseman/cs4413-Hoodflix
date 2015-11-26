DROP DATABASE if EXISTS h00dFlix;
CREATE DATABASE h00dFliX;
USE h00dFliX;

DROP TABLE if EXISTS Users;
CREATE TABLE Users (
  userId             int(11) NOT NULL AUTO_INCREMENT,
  userName           varchar (255) UNIQUE NOT NULL COLLATE utf8_unicode_ci,
  password           varchar(255) COLLATE utf8_unicode_ci,
  picture            blob,
  firstName          varchar(255) COLLATE utf8_unicode_ci,
  lastName           varchar(255) COLLATE utf8_unicode_ci,
  address            varchar(255) COLLATE utf8_unicode_ci,
  neighborhood       varchar(255) COLLATE utf8_unicode_ci,
  dateOfBirth        DATE,
  gender             varchar(255) COLLATE utf8_unicode_ci,
  genres             varchar(255) COLLATE utf8_unicode_ci,
  email              varchar(255) COLLATE utf8_unicode_ci,
  phone              varchar(255) COLLATE utf8_unicode_ci,
  url                varchar(255) COLLATE utf8_unicode_ci,
  PRIMARY KEY (userId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE if EXISTS Reviews;
CREATE TABLE Reviews (
  reviewId           int(11) NOT NULL AUTO_INCREMENT,
  movieTitle         varchar(255) COLLATE utf8_unicode_ci,
  reviewerId         int(11) NOT NULL COLLATE utf8_unicode_ci,
  review             varchar (4096) NOT NULL COLLATE utf8_unicode_ci,
  dateCreated        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (reviewId),
  FOREIGN KEY (reviewerId) REFERENCES Users(userId),
  CONSTRAINT rid_subid UNIQUE (reviewerId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;