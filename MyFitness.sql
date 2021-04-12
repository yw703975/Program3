-- Create the MyFitness database
DROP DATABASE IF EXISTS MyFitness;
CREATE DATABASE MyFitness;
USE MyFitness;  -- MySQL command
CREATE TABLE userProfile(
  userID       INT(11)        NOT NULL   AUTO_INCREMENT,
  firstName     VARCHAR(30)   NOT NULL,
  lastName      VARCHAR(30)   NOT NULL,
  userName      VARCHAR(30)   NOT NULL,
  passWord      VARCHAR(80)   NOT NULL,
  email          VARCHAR(30)  NOT NULL,
  sex           VARCHAR(10)    NULL,
  birthDay       date          NULL,
  height         VARCHAR(30)   NOT NULL,
  userPhoto    VARCHAR(30)    NULL,
constraint pkuserID  PRIMARY KEY (userID)
);

CREATE TABLE userData(
    userID       INT(11)        NOT NULL,
    beginWorkout  SMALLDATETIME    NULL,
    endWorkout    SMALLDATETIME    NULL,
    stepNumber    INT(6)           NULL,
    weight        INT(6)           NULL,
constraint fkuserID foreign key(userID) references userProfile(userID)
);


