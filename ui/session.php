<?php
session_start();
$logStatus = 0;

if($logRequired == true){
    if(empty($_SESSION['userName'])){
        header("Location:../ui/sign_in.php");
    }
}

if(!empty($_SESSION['userName'])){
    $userId = $_SESSION['userId'];
    $userName = $_SESSION['userName'];
    $userMail = $_SESSION['userMail'];
    $logged = "Hi $userName, you are logged!";
    $logStatus = 1;
}

if($_GET['p'] == 'exit'){
    require_once '../BLL/User.php';
    $userBLL = new \BLL\User();
    $res = $userBLL->logout();
    if($res == true){
        header("Location:../ui/user.php");
    }
}
?>