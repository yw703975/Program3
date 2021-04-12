-- Create the MyFitness database
DROP DATABASE IF EXISTS MyFitness;
CREATE DATABASE MyFitness;
USE MyFitness;  -- MySQL command
CREATE TABLE Users(
  userID       INT(11)        NOT NULL   AUTO_INCREMENT  PRIMARY KEY,
  firstName     VARCHAR(30)   NOT NULL,
  lastName      VARCHAR(30)   NOT NULL,
  userName      VARCHAR(30)   NOT NULL,
  passWord      VARCHAR(80)   NOT NULL,
  email          VARCHAR(30)  NOT NULL,
  sex           VARCHAR(10)    NULL,
  birthDay       DATE          NULL,
  height         VARCHAR(30)   NOT NULL,
  userPhoto    VARCHAR(30)    NULL
);

CREATE TABLE userData(
    userID       INT(11)        NOT NULL,
    beginWorkout  DATE            NULL,
    endWorkout    DATE             NULL,
    stepNumber    INT(6)           NULL,
    weight        INT(6)           NULL,
constraint fkuserID foreign key(userID) references Users(userID)
);


