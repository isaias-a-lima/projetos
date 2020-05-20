<!DOCTYPE html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){        
    require_once '../DTO/User.php';    
    $userDTO = new \DTO\User($_POST);
    require_once '../BLL/User.php';
    $userBLL = new \BLL\User();
    $res = $userBLL->insertUser($userDTO);
    if(is_numeric($res)){
        header("Location:../ui/sign_in.php");
    }else{
        echo $res;
    }
}

$todayDate = date("Ymd");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK Projects | Create Account</title>
        
        <script>
            function saving(){
                var signDate = document.getElementById("signDate");
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
                }else if(signDate.value.length < 1){
                    alert("Date is required!")
                }else{
                    form_user.submit();
                }
            }
        </script>
    </head>
    <body>
        <h2>iK Projects</h2>
        <h3>Create an account</h3>
        <p>
            <a href="../ui/">Home</a> |          
            <a href="../ui/sign_in.php">Sign-In</a> |
        </p>
        
        <form id="form_user" method="post" accept-charset="utf-8">
            
            <input type="hidden" name="signDate" id="signDate" value="<?=$todayDate?>">
            
            <label for="userName">Name</label><br>
            <input type="text" id="userName" name="userName"><br>
            
            <label for="userMail">Email</label><br>
            <input type="text" id="userMail" name="userMail"><br>
            
            <label for="userPassword">Password</label><br>
            <input type="password" id="userPassword" name="userPassword"><br>
            
            <button type="button" onclick="saving()">Save</button>
        </form>
    </body>
</html>
