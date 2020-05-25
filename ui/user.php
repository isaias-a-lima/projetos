<?php
$logRequired = true;
include '../ui/session.php';

require_once '../DTO/User.php';    
require_once '../BLL/User.php';
require_once '../BLL/Funcs.php';

$userBLL = new \BLL\User();
$userDTO = new \DTO\User();
$funcs = new \BLL\Funcs();

$userDTO->setUserId($userId);
$res = $userBLL->selectUser($userDTO);
if(is_array($res) || is_object($res)){
    while ($row = $res->fetch_assoc()){
        $id = $row['user_id'];
        $date = $funcs->changeDate($row['sign_date'],0);
        $name = $row['user_name'];
        $mail = $row['user_mail'];        
    }
}else{
    $alert = $res;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">    
        <title>iK | User area</title>
    </head>
    <body>
        <div><?=$logged?>&nbsp;</div>
        <hr>
        
        <h2>iK Projects</h2>        
        
        <nav>
            <a href="../ui/">Home</a> |
            <a href="user_edit.php">Edit account</a> |
            <a href="user_password.php">Change password</a> |
            <a href="?p=exit">Exit</a> |
        </nav>
        
        <p><?=$alert?></p>
        
        <h3>User area</h3>
        
        <table border="1" cellspacing="0">
            <tr>
                <th>Id</th><td><?=$id?></td>
            </tr>
            <tr>
                <th>Sign Date</th><td><?=$date?></td>
            </tr>
            <tr>
                <th>Name</th><td><?=$name?></td>
            </tr>
            <tr>
                <th>Email</th><td><?=$mail?></td>
            </tr>
        </table>
    </body>
</html>
