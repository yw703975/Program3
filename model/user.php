<?php
class User{
    private  $userID,$firstName, $lastName,$userName,$passWord,$email,$sex,$birthDay,$height,$userPhoto;

    
    function __construct($firstName, $lastName, $userName, $passWord, $email, $sex, $birthDay, $height, $userPhoto) {
      //  $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->passWord = $passWord;
        $this->email = $email;
        $this->sex = $sex;
        $this->birthDay = $birthDay;
        $this->height = $height;
        $this->userPhoto = $userPhoto;
    }

    function getUserID() {
        return $this->userID;
    }

    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function getUserName() {
        return $this->userName;
    }

    function getPassWord() {
        return $this->passWord;
    }

    function getEmail() {
        return $this->email;
    }

    function getSex() {
        return $this->sex;
    }

    function getBirthDay() {
        return $this->birthDay;
    }

    function getHeight() {
        return $this->height;
    }

    function getUserPhoto() {
        return $this->userPhoto;
    }

    function setUserID($userID) {
        $this->userID = $userID;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassWord($passWord) {
        $this->passWord = $passWord;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSex($sex) {
        $this->sex = $sex;
    }

    function setBirthDay($birthDay) {
        $this->birthDay = $birthDay;
    }

    function setHeight($height) {
        $this->height = $height;
    }

    function setUserPhoto($userPhoto) {
        $this->userPhoto = $userPhoto;
    }




}
?>