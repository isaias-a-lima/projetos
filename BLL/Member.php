<?php

namespace BLL;

require_once '../DAL/Member.php';
require_once '../BLL/Funcs.php';

class Member {
    
    function insertMember($memberDTO,$projectType){
        if($projectType=='Single' || empty($projectType)){
            $msg = "This project is single user type.<br>";
            $msg .= "You cannot insert new members.<br>";
            $msg .= "Edit your project, change to team<BR>";
            $msg .= "to insert more members";
            return $msg;
        }else{
            $func = new \BLL\Funcs();
            $salary = $func->changeNull($memberDTO->getSalary());
            $cost = $func->changeNull($memberDTO->getCost());
            $memberDTO->setSalary($salary);
            $memberDTO->setCost($cost);
            $memberDAL = new \DAL\Member();
            $res = $memberDAL->insertMember($memberDTO);
            return $res;
        }
    }
    
    function editMember(){
        
    }
    
    function deleteMember(){
        
    }
    
    function selectMember(){
        
    }
    
    function listMembers($memberDTO){
        $memberDAL = new \DAL\Member();
        $res = $memberDAL->listMembers($memberDTO);
        return $res;
    }
}
