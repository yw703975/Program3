-- Create the MyFitness database
DROP DATABASE IF EXISTS MyFitness;
CREATE DATABASE MyFitness;
USE MyFitness;  -- MySQL command
CREATE TABLE Users(
  userID       INT(11)        NOT NULL,
  firstName     VARCHAR(30)   NOT NULL,
  lastName      VARCHAR(30)   NOT NULL,
  userName      VARCHAR(30)   NOT NULL,
  passWord      VARCHAR(80)   NOT NULL,
  email          VARCHAR(30)  NOT NULL,
  sex           VARCHAR(10)    NULL,
  birthDay       DATE          NULL,
  height         VARCHAR(30)   NOT NULL,
  userPhoto    VARCHAR(30)    NULL,
constraint pk PRIMARY KEY(userName)
);

CREATE TABLE userdata(
    userName     VARCHAR(30)       NOT NULL,
    mydate      DATE                  NULL,
    miles         decimal(4.2)           NULL,
    weight       decimal(4.2)             NULL,
constraint fk foreign key(userName) references Users(userName)
)