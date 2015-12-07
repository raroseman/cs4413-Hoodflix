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

DROP TABLE if EXISTS Review;
CREATE TABLE Review (
  reviewId           int(11) NOT NULL AUTO_INCREMENT,
  movieTitle         varchar(255) COLLATE utf8_unicode_ci,
  reviewedBy         varchar(255) COLLATE utf8_unicode_ci,
  reviewedOn         varchar(255) COLLATE utf8_unicode_ci,
  review             varchar (4096) COLLATE utf8_unicode_ci,
  PRIMARY KEY (reviewId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE if EXISTS Movies;
CREATE TABLE Movies (
  movieId            int(11) NOT NULL AUTO_INCREMENT,
  movieTitle         varchar (255) UNIQUE NOT NULL COLLATE utf8_unicode_ci,
  releaseDate        varchar(255) COLLATE utf8_unicode_ci,
  returnBy           varchar(255) COLLATE utf8_unicode_ci,
  copyAvailable      boolean,
  PRIMARY KEY (movieId)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;