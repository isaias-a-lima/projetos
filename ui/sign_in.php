<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(!filter_var($_POST['userMail'], FILTER_VALIDATE_EMAIL)){
        $alert = "Email inválido!";
    }else if(!filter_var($_POST['userPassword'], FILTER_SANITIZE_STRING)){
        $alert = "Password inválido!";
    }else{
        require_once '../DTO/User.php';
        require_once '../BLL/User.php';
        $userDTO = new \DTO\User($_POST);
        $userBLL = new \BLL\User();
        $res = $userBLL->login($userDTO);
        if($res == 1){
            header("Location:../ui/user.php");
        }else{
            $alert = substr($res, 0, 30) . "...";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK Projects | Sign-In</title>
    </head>
    <body>
        <h2>iK Projects</h2>
        <h3>Sign-In</h3>
        <nav>
            <a href="../ui/">Home</a> |
            <a href="user_new.php">Create an account</a> |
            <!--
            <a href="users.php">Users</a> |
            <a href="">Projects</a> |
            -->
        </nav>
        
        <p><?=$alert?>&nbsp;</p>
        
        <form id="form_sign_in" method="post" accept-charset="utf-8" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <label for="userMail">Email</label><br>
            <input type="text" id="userMail" name="userMail" maxlength="255"><br>
            <label for="userPassword">Password</label><br>
            <input type="password" id="userPassword" name="userPassword" maxlength="12"><br>
            <button>Enter</button>
        </form>
        <?php
        
        ?>
    </body>
</html>
