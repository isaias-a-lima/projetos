<?php

namespace DTO;

class User {
    private $userId;
    private $userName;
    private $userMail;
    private $userPassword;
    
    function getUserId() {
        return $this->userId;
    }

    function getUserName() {
        return $this->userName;
    }

    function getUserMail() {
        return $this->userMail;
    }

    function getUserPassword() {
        return $this->userPassword;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setUserMail($userMail) {
        $this->userMail = $userMail;
    }

    function setUserPassword($userPassword) {
        $this->userPassword = $userPassword;
    }
    
    function __construct($user) {
        $this->userId = $user['userID'];
        $this->userName = $user['userName'];
        $this->userMail = $user['userMail'];
        $this->userPassword = $user['userPassword'];
    }
}
