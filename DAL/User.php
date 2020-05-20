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
        $link = $conn->link;   
        mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return mysqli_insert_id($link);
        }else{
            return $sql . mysqli_error($link);
        }
        mysqli_close($link);
    }
    
    function editUser($userDTO){
        $userId = $userDTO->getUserId();
        $userName = $userDTO->getUserName();
        $userMail = $userDTO->getUserMail();
        $userPassword = $userDTO->getUserPassword();
        $sql = "CALL USER_EDIT('$userId','$userName','$userMail','$userPassword')";        
        $conn = new \DAL\Connection();
        $link = $conn->link;   
        mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return mysqli_insert_id($link);
        }else{
            return $sql . mysqli_error($link);
        }
        mysqli_close($link);
    }
    
    function deleteUser(){
        
    }
    
    function selectUser($userDTO){
        $userId = $userDTO->getUserId();
        $conn = new \DAL\Connection();
        $sql = "CALL USER_SELECT($userId)";
        $link = $conn->link;
        $result = mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return $result;
        }else{
            return $sql . "<br>" . mysqli_error($link) . "<br>";
        }
        mysqli_close($link);
    }
    
    function listUsers(){
        $sql = "CALL USER_LIST()";
        $conn = new \DAL\Connection();
        $link = $conn->link;   
        $result = mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return $result;
        }else{
            return $sql . "<BR>" . mysqli_error($link) . "<BR>";
        }
        mysqli_close($link);
    }
    
    function login($userDTO){
        $email = $userDTO->getUserMail();
        $password = $userDTO->getUserPassword();
        $conn = new \DAL\Connection();
        $sql = "CALL USER_LOGIN ('$email','$password')";
        $link = $conn->link;
        $result = mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return $result;
        }else{
            return "Error: " . $sql . "<br>" . mysqli_error($link) . "<br>";
        }
        mysqli_close($link);
    }
}
