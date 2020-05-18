<!DOCTYPE html>
<?php
$logRequired = false;
include '../ui/session.php';

require_once '../DTO/Project.php';
require_once '../BLL/Project.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK Projects | Home</title>
    </head>
    <body>
        <div><?=$logged?>&nbsp;</div>
        <hr>
        
        <h2>iK Projects</h2>
        <h3>Project management</h3>
        <p>
            <a href="projects.php">Projects</a> |
            <a href="user.php">User area</a> |
            <?php
            if($logStatus==1){
                echo '<!--';
            }
            ?>
            <a href="sign_in.php">Sign-In</a> |
            <a href="user_new.php">Create an account</a> |
            <?php
            if($logStatus==1){
                echo '-->';
                echo '<a href="?p=exit">Exit</a>';
            }
            ?>            
        </p>
        <?php
        
        ?>
    </body>
</html>
