<?php
require_once '../DTO/User.php';    
require_once '../BLL/User.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(!filter_var($_POST['userId'], FILTER_VALIDATE_INT)){
        $alert = "User id invalid!";
    }else if(!filter_var($_POST['userName'], FILTER_DEFAULT)){
        $alert = "Name field invalid!";
    }else if(!filter_var($_POST['userMail'], FILTER_VALIDATE_EMAIL)){
        $alert = "Email field invalid!";
    }else if(!filter_var($_POST['userPassword'], FILTER_SANITIZE_STRING)){
        $alert = "Password field invalid!";
    }else{
        $userDTO = new \DTO\User($_POST);
        $userBLL = new \BLL\User();
        $res = $userBLL->editUser($userDTO);
        if(is_numeric($res)){
            header("Location:../ui/user.php");
        }else{
            echo $res;
        }
    }
}

$logRequired = true;
include '../ui/session.php';

$todayDate = date("Ymd");

$userBLL = new \BLL\User();
$userDTO = new \DTO\User();
$userDTO->setUserId($userId);
$res = $userBLL->selectUser($userDTO);
if(is_array($res) || is_object($res)){
    while ($row = $res->fetch_assoc()){
        $rowDate = $row['sign_date'];
        $rowName = $row['user_name'];
        $rowMail = $row['user_mail'];
        $rowPassword = $row['user_password'];
    }
}else{
    $alert = $res;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK | Edit Account</title>
    </head>
    <body>
        <div><?=$logged?>&nbsp;</div>
        <hr>
        
        <h2>iK Projects</h2>
        
        <nav>
            <a href="../ui/">Home</a> |
            <a href="user.php">User area</a> |
            <a href="?p=exit">Exit</a> |
        </nav>
        
        <p><?=$alert?></p>
        
        <h3>User area | Edit account</h3>
        
        <form id="form_user" method="post" accept-charset="utf-8">
            
            <input type="hidden" name="userId" id="userId" value="<?=$userId?>">
            
            <input type="hidden" name="signDate" id="signDate" value="<?=$rowDate?>">
            
            <label for="userName">Name</label><br>
            <input type="text" id="userName" name="userName" value="<?=$rowName?>"><br>
            
            <label for="userMail">Email</label><br>
            <input type="text" id="userMail" name="userMail" value="<?=$rowMail?>"><br>
            
            <label for="userPassword">Password</label><br>
            <input type="password" id="userPassword" name="userPassword" readonly value="<?=$rowPassword?>"><br>
            
            <button>Save</button>
        </form>
    </body>
</html>
