<?php

namespace BLL;

require_once '../DAL/User.php';

class User {
    
    function insertUser($userDTO){
        $userDAL = new \DAL\User();
        return $userDAL->insertUser($userDTO);
    }
    
    function editUser($userDTO){
        $userDAL = new \DAL\User();
        return $userDAL->editUser($userDTO);
    }
    
    function deleteUser(){
        
    }
    
    function selectUser($userDTO){
        $userDAL = new \DAL\User();
        return $userDAL->selectUser($userDTO);
    }
    
    function listUsers($userDTO){
        $userDAL = new \DAL\User();
        return $userDAL->listUsers($userDTO);
    }
    
    function login($userDTO){
        $userDAL = new \DAL\User();
        $result = $userDAL->login($userDTO);
        if(is_array($result) || is_object($result)){
            session_start();
            while ($row = $result->fetch_assoc()){
                $_SESSION['userId'] = $row['user_id'];
                $_SESSION['userName'] = $row['user_name'];
                $_SESSION['userMail'] = $row['user_mail'];
            }
            return 1;
        }else{
            return $result;
        }
    }
    
    function logout(){
        session_start();
        session_unset();
        session_destroy();
        if(!isset($_SESSION['userName'])){
            return true;
        }        
    }
    
    function changePassword($userDTO,$newPassword){
        $userDAL = new \DAL\User();
        $res = $userDAL->changePassword($userDTO, $newPassword);
        return $res;
    }
}
