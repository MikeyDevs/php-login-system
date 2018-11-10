-- Drops the client_info_db if it exists currently --
DROP DATABASE IF EXISTS client_info_db;
-- Creates the "client_info_db" database --
CREATE DATABASE client_info_db;
-- Makes it so all of the following code will affect client_info_db --
USE client_info_db;

-- Creates the table "clients" within client_info_db --
CREATE TABLE clients (
  id INTEGER(11) AUTO_INCREMENT NOT NULL,
  client_name VARCHAR(256) NOT NULL,
  client_uid VARCHAR(256) NOT NULL,
  PRIMARY KEY (id)
);

-- Creates new rows containing data in all named columns --
INSERT INTO clients (client_name, client_uid)
VALUES ("House Targaryen, INC", "Fire & Blood");

INSERT INTO clients (client_name, client_uid)
VALUES ("House Stark, INC", "Winter is Coming");

INSERT INTO clients (client_name, client_uid)
VALUES ("House Lannister, INC", "Hear Me Roar");

INSERT INTO clients (client_name, client_uid)
VALUES ("House Baratheon, INC", "Ours is the Fury");

INSERT INTO clients (client_name, client_uid)
VALUES ("House Tyrell, INC", "Growing Strong");

INSERT INTO clients (client_name, client_uid)
VALUES ("House Arryn, INC", "As High as Honor");

INSERT INTO clients (client_name, client_uid)
VALUES ("House Martell, INC", "Unbowed, Unbent, Unbroken");