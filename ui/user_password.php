<?php
$logRequired = true;
include '../ui/session.php';

require_once '../BLL/User.php';
require_once '../DTO/User.php';

if($_SERVER['REQUEST_METHOD']=='POST'){    
    $userBLL = new \BLL\User();
    $userDTO = new \DTO\User($_POST);
    if(!empty($_POST['newPassword'])){
        $res = $userBLL->changePassword($userDTO, $_POST['newPassword']);
        if(is_bool($res)){
            header("Location:../ui/?p=exit&alert=You need to login again!");
        }else{
            $alert = substr($res, 0, 32);
        }
    }else{
        $alert = "New password is empty!";
    }
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK | Change password</title>
        <script>
            function save(){
                var userId = document.getElementById("userId").value;
                var userPassword = document.getElementById("userPassword").value;
                var newPassword = document.getElementById("newPassword").value;
                var newPassword2 = document.getElementById("newPassword2").value;
                if(userId.length < 1){
                    document.getElementById("alert").innerHTML="User id is required!";
                }else if(userPassword.length < 1){
                    document.getElementById("alert").innerHTML="Current password is required!";
                }else if(newPassword.length < 1){
                    document.getElementById("alert").innerHTML="New password is required!";
                }else if(newPassword2.length < 1){
                    document.getElementById("alert").innerHTML="Confirm password is required!";
                }else if(userPassword == newPassword || userPassword == newPassword2){
                    document.getElementById("alert").innerHTML="The new password and the current password cannot be the same!";
                }else if(newPassword !== newPassword2){
                    document.getElementById("alert").innerHTML="The new password was not confirmed!";
                    document.getElementById("newPassword2").focus();
                }else{
                    document.getElementById("form_user").submit();
                }
            }
        </script>
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
        
        <p id="alert"><?=$alert?></p>
        
        <h3>User area | Change password</h3>
        
        <form id="form_user" method="post" accept-charset="utf-8" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <input type="hidden" name="userId" id="userId" value="<?=$userId?>">
            
            <label for="userPassword">Enter Current password</label><br>
            <input type="password" name="userPassword" id="userPassword"><br>
            
            <label for="newPassword">Enter New password</label><br>
            <input type="password" name="newPassword" id="newPassword"><br>
            
            <label for="newPassword2">Confirm New password</label><br>
            <input type="password" name="newPassword2" id="newPassword2"><br>
            
            <button type="button" onclick="save()">Save</button>
        </form>
        
    </body>
</html>
