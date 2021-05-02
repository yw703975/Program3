<?php
class Userdata{
    private  $userID,$mydate, $miles,$weight;
    function __construct($userID, $mydate, $miles, $weight) {
        $this->userID = $userID;
        $this->mydate = $mydate;
        $this->miles = $miles;
        $this->weight = $weight;
    }
    function getUserID() {
        return $this->userID;
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

    function setUserID($userID) {
        $this->userID = $userID;
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