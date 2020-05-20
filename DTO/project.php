<?php

namespace DTO;

class Project {
    private $projectId;
    private $userId;
    private $title;
    private $contractor;    
    private $projectType;
    private $visibility;
    private $initialDate;
    private $estimatedDate;
    private $finalDate;
    private $totalCost;
    private $projectStatus;
    
    function getProjectId() {
        return $this->projectId;
    }

    function getUserId() {
        return $this->userId;
    }

    function getTitle() {
        return $this->title;
    }

    function getContractor() {
        return $this->contractor;
    }

    function getProjectType() {
        return $this->projectType;
    }

    function getVisibility() {
        return $this->visibility;
    }

    function getInitialDate() {
        return $this->initialDate;
    }

    function getEstimatedDate() {
        return $this->estimatedDate;
    }

    function getFinalDate() {
        return $this->finalDate;
    }

    function getTotalCost() {
        return $this->totalCost;
    }

    function getProjectStatus() {
        return $this->projectStatus;
    }

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContractor($contractor) {
        $this->contractor = $contractor;
    }

    function setProjectType($projectType) {
        $this->projectType = $projectType;
    }

    function setVisibility($visibility) {
        $this->visibility = $visibility;
    }

    function setInitialDate($initialDate) {
        $this->initialDate = $initialDate;
    }

    function setEstimatedDate($estimatedDate) {
        $this->estimatedDate = $estimatedDate;
    }

    function setFinalDate($finalDate) {
        $this->finalDate = $finalDate;
    }

    function setTotalCost($totalCost) {
        $this->totalCost = $totalCost;
    }

    function setProjectStatus($projectStatus) {
        $this->projectStatus = $projectStatus;
    }
    
    function __construct($dados) {
        $this->projectId = $dados['projectId'];
        $this->userId = $dados['userId'];
        $this->title = $dados['title'];
        $this->contractor = $dados['contractor'];
        $this->projectType = $dados['projectType'];
        $this->visibility = $dados['visibility'];
        $this->initialDate = $dados['initialDate'];
        $this->estimatedDate = $dados['estimatedDate'];
        $this->finalDate = $dados['finalDate'];
        $this->totalCost = $dados['totalCost'];
        $this->projectStatus = $dados['projectStatus'];
    }

}
?>