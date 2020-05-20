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
        $link = $conn->link;
        mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return mysqli_insert_id($link);
        }else{
            return $sql . "<br>" . mysqli_error($link) . "<br>";
        }
        mysqli_close($link);
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
        $link = $conn->link;
        $result = mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return $result;
        }else{
            return $sql . "<br>" . mysqli_error($link) . "<br>";
        }
        mysqli_close($link);
    }
}
