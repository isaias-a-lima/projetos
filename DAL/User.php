<?php

namespace DAL;

require_once '../DAL/Connection.php';

class User {
    
    function insertUser($userDTO){
        $signDate = $userDTO->getSignDate();
        $userName = $userDTO->getUserName();
        $userMail = $userDTO->getUserMail();
        $userPassword = $userDTO->getUserPassword();
        $sql = "CALL USER_INSERT('$signDate','$userName','$userMail','$userPassword')";
        $conn = new \DAL\Connection();
        $res = $conn->link->query($sql);
        if($res->num_rows > 0){
            return $res->num_rows;
        }else{
            return $sql . "<BR>" . $conn->link->error;
        }
    }
    
    function editUser($userDTO){
        $userId = $userDTO->getUserId();
        $userName = $userDTO->getUserName();
        $userMail = $userDTO->getUserMail();
        $userPassword = $userDTO->getUserPassword();
        $sql = "CALL USER_EDIT('$userId','$userName','$userMail','$userPassword')";        
        $conn = new \DAL\Connection();                
        if($conn->link->query($sql)){
            return $userId;
        }else{
            return $sql . "<BR>" . $conn->link->error;
        }
    }
    
    function deleteUser(){
        
    }
    
    function selectUser($userDTO){
        $userId = $userDTO->getUserId();
        $conn = new \DAL\Connection();
        $sql = "CALL USER_SELECT($userId)";
        $result = $conn->link->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return $sql . "<br>" . $conn->link->error . "<br>";
        }
    }
    
    function listUsers($userDTO){
        $userMail = $userDTO->getUserMail();
        $sql = "CALL USER_LIST('$userMail')";
        $conn = new \DAL\Connection();
        $result = $conn->link->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return $sql . "<br>" . $conn->link->error . "<br>";
        }
    }
    
    function login($userDTO){
        $email = $userDTO->getUserMail();
        $password = $userDTO->getUserPassword();
        $conn = new \DAL\Connection();
        $sql = "CALL USER_LOGIN ('$email','$password')";
        $result = $conn->link->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return $sql . "<br>" . $conn->link->error . "<br>";
        }
    }
    
    function changePassword($userDTO,$newPassword){
        $userId = $userDTO->getUserId();
        $password = $userDTO->getUserPassword();
        $sql = "CALL USER_CHANGE_PASSWORD($userId,$password,$newPassword)";
        $conn = new \DAL\Connection();        
        if($conn->link->query($sql)){
            return true;
        }else{
            return $sql . "<br>" . $conn->link->error . "<br>";
        }
    }
}
