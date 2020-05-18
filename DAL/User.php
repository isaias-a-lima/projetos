<?php

namespace DAL;

require_once '../DAL/Connection.php';

class User {
    
    function insertUser($userDTO){
        $sql = "CALL USER_INSERT('" . $userDTO->getUserName() . "','" . $userDTO->getUserMail() . "',";
        $sql .= "'". $userDTO->getUserPassword() . "')";
        $conn = new \DAL\Connection();
        $link = $conn->link;   
        mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return mysqli_insert_id($link);
        }else{
            return $sql . mysqli_error($link);
        }
    }
    
    function editUser(){
        
    }
    
    function deleteUser(){
        
    }
    
    function selectUser(){
        
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
    }
}
