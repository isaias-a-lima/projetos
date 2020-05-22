<?php

namespace DAL;

require_once '../DAL/connection.php';

class Project {
    
    function insertProject($projectDTO){
        $userId = $projectDTO->getUserId();
        $title = $projectDTO->getTitle();
        $contractor = $projectDTO->getContractor();
        $type = $projectDTO->getProjectType();
        $visibility = $projectDTO->getVisibility();
        $initialDate = $projectDTO->getInitialDate();
        $estimatedDate = $projectDTO->getEstimatedDate();
        $finalDate = $projectDTO->getFinalDate();
        $totalCost = $projectDTO->getTotalCost();
        $projectStatus = $projectDTO->getProjectStatus();
        $conn = new \DAL\Connection();
        $sql = "CALL PROJECTS_INSERT ($userId,'$title','$contractor','$type','$visibility',$initialDate,$estimatedDate,$finalDate,$totalCost,'$projectStatus')";        
        $link = $conn->link;
        mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return mysqli_insert_id($link);
        }else{
            return "Erro: $sql <br> " . mysqli_error($link) . "<br>";
        }            
    }
    
    function editProject(){
        
    }
    
    function deleteProject(){
        
    }
    
    function selectProject(){
        
    }
    
    function listProject($projectDTO){
        $conn = new \DAL\Connection();
        $user_id = $projectDTO->getUserId();
        $sql = "CALL PROJECTS_LIST($user_id)";
        $link = $conn->link;
        $result = mysqli_query($link, $sql);
        if(mysqli_affected_rows($link) > 0){
            return $result;
        }else{
            return "Erro: $sql <br> " . mysqli_error($link) . "<br>";
        }
        mysqli_close($link);
    }
    
    function calculateTotalCost(){
        
    }
    
}
