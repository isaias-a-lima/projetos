<?php

namespace dto;

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
    
    function getProjectId() {
        return $this->projectId;
    }

    function getTitle() {
        return $this->title;
    }

    function getContractor() {
        return $this->contractor;
    }

    function getManager() {
        return $this->manager;
    }

    function getManagerMail() {
        return $this->managerMail;
    }

    function getManagerPassword() {
        return $this->managerPassword;
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

    function setTitle($title) {
        $this->title = $title;
    }

    function setContractor($contractor) {
        $this->contractor = $contractor;
    }

    function setManager($manager) {
        $this->manager = $manager;
    }

    function setManagerMail($managerMail) {
        $this->managerMail = $managerMail;
    }

    function setManagerPassword($managerPassword) {
        $this->managerPassword = $managerPassword;
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
}
?>