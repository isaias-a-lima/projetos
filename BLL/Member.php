<?php

namespace BLL;

require_once '../DAL/Member.php';
require_once '../BLL/Funcs.php';

class Member {
    
    function insertMember($memberDTO){
        $func = new \BLL\Funcs();
        $salary = $func->changeNull($memberDTO->getSalary());
        $cost = $func->changeNull($memberDTO->getCost());
        $memberDTO->setSalary($salary);
        $memberDTO->setCost($cost);
        $memberDAL = new \DAL\Member();
        $res = $memberDAL->insertMember($memberDTO);
        return $res;
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
