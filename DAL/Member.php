<?php

namespace DAL;

require_once '../DAL/Connection.php';

class Member {
    
    function insertMember($memberDTO){
        $projectId = $memberDTO->getProjectId();
        $userId = $memberDTO->getUserId();
        $occupation = $memberDTO->getOccupation();
        $salary = $memberDTO->getSalary();
        $cost = $memberDTO->getCost();
        $sql = "CALL MEMBER_INSERT($projectId,$userId,'$occupation',$salary,$cost)";
        $conn = new Connection();
        $result = $conn->link->query($sql);
        $res = $result->fetch_array();
        if($result->num_rows > 0){
            return $res['out_id'];
        }else{
            return "Erro: $sql <br> " . $conn->link->error . "<br>";
        }
    }
    
    function editMember(){
        
    }
    
    function deleteMember(){
        
    }
    
    function selectMember(){
        
    }
    
    function listMembers($memberDTO){
        $projectId = $memberDTO->getProjectId();
        $sql = "CALL MEMBER_LIST($projectId)";
        $conn = new Connection();
        $result = $conn->link->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return $sql . "<br>" . $conn->link->error . "<br>";
        }
    }
}
