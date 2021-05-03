<?php
class Userdata{
    private  $userName,$mydate, $miles,$weight;
    function __construct($userName, $mydate, $miles, $weight) {
        $this->userName = $userName;
        $this->mydate = $mydate;
        $this->miles = $miles;
        $this->weight = $weight;
    }

    function getUserName() {
        return $this->userName;
    }

    function getMydate() {
        return $this->mydate;
    }

    function getMiles() {
        return $this->miles;
    }

    function getWeight() {
        return $this->weight;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setMydate($mydate) {
        $this->mydate = $mydate;
    }

    function setMiles($miles) {
        $this->miles = $miles;
    }

    function setWeight($weight) {
        $this->weight = $weight;
    }




}
?>