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
        $res = $conn->link->query($sql);
        if($res->num_rows > 0){
            return $res->num_rows;
        }else{
            return "Erro: $sql <br> " . $conn->link->error . "<br>";
        }            
    }
    
    function editProject($projectDTO){
        $projectId = $projectDTO->getProjectId();
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
        $sql = "CALL PROJECT_EDIT ($projectId,'$title','$contractor','$type','$visibility',$initialDate,$estimatedDate,$finalDate,$totalCost,'$projectStatus')";
        $res = $conn->link->query($sql);
        if($res->num_rows > 0){
            return $projectId;
        }else{
            return "Erro: $sql <br> " . $conn->link->error . "<br>";
        }
    }
    
    function deleteProject(){
        
    }
    
    function selectProject($projectDTO){
        $projectId = $projectDTO->getProjectId();
        $conn = new \DAL\Connection();        
        $sql = "CALL PROJECT_SELECT($projectId)";
        $result = $conn->link->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return "Erro: $sql <br> " . $conn->link->error . "<br>";
        }        
    }
    
    function listProject($projectDTO, $option){
        $conn = new \DAL\Connection();
        $user_id = $projectDTO->getUserId();
        if($option==0 || empty($option)){
            $sql = "CALL PROJECTS_LIST($user_id)";
        }else{
            $sql = "CALL PROJECTS_LIST_VISIBILITY('public')";
        }        
        $result = $conn->link->query($sql);
        if($result->num_rows > 0){
            return $result;
        }else{
            return "Erro: $sql <br> " . $conn->link->error . "<br>";
        }
    }
    
    function calculateTotalCost(){
        
    }
    
}
