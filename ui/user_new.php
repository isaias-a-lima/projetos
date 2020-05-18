<!DOCTYPE html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){        
    require_once '../DTO/User.php';    
    $userDTO = new \DTO\User($_POST);
    require_once '../BLL/User.php';
    $userBLL = new \BLL\User();
    $res = $userBLL->insertUser($userDTO);
    if(is_numeric($res)){
        header("Location:../ui/users.php");
    }else{
        echo $res;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK | Projects | Users</title>
        
        <script>
            function saving(){
                var userName = document.getElementById("userName");
                var userMail = document.getElementById("userMail");
                var userPassword = document.getElementById("userPassword");
                var form_user = document.getElementById("form_user");
                if(userName.value.length < 1){
                    alert("Campo obrigatório!");
                    userName.focus();
                }else if(userMail.value.length < 1){
                    alert("Campo obrigatório!");
                    userMail.focus();
                }else if(userPassword.value.length < 1){
                    alert("Campo obrigatório!");
                    userPassword.focus();
                }else{
                    form_user.submit();
                }
            }
        </script>
    </head>
    <body>
        <h2>Manager Your Projects</h2>
        <h3>New User</h3>
        <p>
            <a href="../ui/users.php">Voltar</a> |            
        </p>
        
        <form id="form_user" method="post" accept-charset="utf-8">
            <label for="userName">Name</label><br>
            <input type="text" id="userName" name="userName"><br>
            
            <label for="userMail">Mail</label><br>
            <input type="text" id="userMail" name="userMail"><br>
            
            <label for="userPassword">Password</label><br>
            <input type="password" id="userPassword" name="userPassword"><br>
            <br>
            <button type="button" onclick="saving()">Save</button>
        </form>
    </body>
</html>
