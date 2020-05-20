<?php

namespace DTO;

class Member {
    private $memberId;
    private $projectId;
    private $userId;
    private $occupation;
    private $salary;
    private $cost;
    
    function getMemberId() {
        return $this->memberId;
    }

    function getProjectId() {
        return $this->projectId;
    }

    function getUserId() {
        return $this->userId;
    }

    function getOccupation() {
        return $this->occupation;
    }

    function getSalary() {
        return $this->salary;
    }

    function getCost() {
        return $this->cost;
    }

    function setMemberId($memberId) {
        $this->memberId = $memberId;
    }

    function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setOccupation($occupation) {
        $this->occupation = $occupation;
    }

    function setSalary($salary) {
        $this->salary = $salary;
    }

    function setCost($cost) {
        $this->cost = $cost;
    }
    
    function __construct($dados) {
        $this->memberId = $dados['memberId'];
        $this->projectId = $dados['projectId'];
        $this->userId = $dados['userId'];
        $this->occupation = $dados['occupation'];
        $this->salary = $dados['salary'];
        $this->cost = $dados['cost'];
    }

}
