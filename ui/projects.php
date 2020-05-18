<?php
$logRequired = true;
include '../ui/session.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>iK Projects | Projects</title>
    </head>
    <body>
        <div><?=$logged?>&nbsp;</div>
        <hr>
        
        <h2>iK Projects</h2>
        <h3>Projects</h3>
        
        <nav>
            <a href="../ui/">Home</a> |
            <a href="projects_new.php">New Project</a> |
            <a href="user.php">User area</a> |
        </nav>
        
        <p><?=$alert?>&nbsp;</p>
    </body>
</html>
