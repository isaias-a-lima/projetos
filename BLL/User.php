<?php

namespace BLL;

require_once '../DAL/User.php';

class User {
    
    function insertUser($userDTO){
        $userDAL = new \DAL\User();
        return $userDAL->insertUser($userDTO);
    }
    
    function editUser(){
        
    }
    
    function deleteUser(){
        
    }
    
    function selectUser(){
        
    }
    
    function listUsers(){
        $userDAL = new \DAL\User();
        return $userDAL->listUsers();
    }
}
