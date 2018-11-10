-- Drops the client_login_db if it exists currently --
DROP DATABASE IF EXISTS client_login_db;
-- Creates the "client_login_db" database --
CREATE DATABASE client_login_db;
-- Makes it so all of the following code will affect client_login_db --
USE client_login_db;

-- Creates the table "users" within client_login_db --
CREATE TABLE users (
  id INTEGER(11) AUTO_INCREMENT NOT NULL,
  first_name VARCHAR(256) NOT NULL,
  last_name VARCHAR(256) NOT NULL,
  user_email VARCHAR(256) NOT NULL,
  user_uid VARCHAR(256) NOT NULL,
  user_pwd VARCHAR(256) NOT NULL,
  PRIMARY KEY (id)
);

