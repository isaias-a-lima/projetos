<?php

namespace BLL;

require_once '../DAL/Project.php';
require_once '../BLL/Funcs.php';

class Project {
            
    function insertProject($projectDTO){
        $projectDAL = new \DAL\Project();
        $func = new \BLL\Funcs();
        //data filter to MySQL BEGIN
        $initialDate = $func->changeDate($projectDTO->getInitialDate(),1);
        $estimatedDate = $func->changeDate($projectDTO->getEstimatedDate(), 1);
        $finalDate = $func->changeDate($projectDTO->getFinalDate(), 1);
        $totalCost = $func->changeNull($projectDTO->getTotalCost());
        $projectDTO->setInitialDate($initialDate);
        $projectDTO->setEstimatedDate($estimatedDate);
        $projectDTO->setFinalDate($finalDate);
        $projectDTO->setTotalCost($totalCost);
        //data filter to MySQL END
        $res = $projectDAL->insertProject($projectDTO);
        return $res;
    }
    
    function editProject($project){
        
    }
    
    function deleteProject($project){
        
    }
    
    function selectProject($project){
        
    }
    
    function listProject($projectDTO){
        $projectDAL = new \DAL\Project();
        $res = $projectDAL->listProject($projectDTO);
        return $res;
    }
    
    function calculateTotalCost($project){
        
    }
}
?>