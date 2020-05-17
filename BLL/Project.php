<?php

namespace BLL;

class Project {
    
    private $projectId;
    private $title;
    private $contractor;
    private $manager;
    private $managerMail;
    private $managerPassword;
    private $projectType;
    private $visibility;
    private $initialDate;
    private $estimatedDate;
    private $finalDate;
    private $totalCost;
    private $projectStatus;
    
    function insertProject(){
        echo "O nome do manager é: " . $this->manager;
        echo "<br>O nome do contractor é: " . $this->contractor;
    }
    
    function editProject($project){
        
    }
    
    function deleteProject($project){
        
    }
    
    function selectProject($project){
        
    }
    
    function listProject($project){
        
    }
    
    function calculateTotalCost($project){
        
    }
    
    function __construct($project) {
        if(!is_null($project) && !is_object($project)){
            echo "<p>ERRO: O construtor da classe ProjectBLL espera um parâmetro do tipo Object!</p>";
        }
        $this->projectId = $project->projectId;
        $this->title = $project->title;
        $this->contractor = $project->contractor;
        $this->manager = $project->manager;
        $this->managerMail = $project->managerMail;
        $this->managerPassword = $project->managerPassword;
        $this->projectType = $project->projectType;
        $this->visibility = $project->visibility;
        $this->initialDate = $project->initialDate;
        $this->estimatedDate = $project->estimatedDate;
        $this->finalDate = $project->finalDate;
        $this->totalCost = $project->totalCost;
        $this->projectStatus = $project->projectStatus;
    }
}
