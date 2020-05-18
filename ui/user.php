<?php
$logRequired = true;
include '../ui/session.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">    
        <title>iK Projects | User area</title>
    </head>
    <body>
        <div><?=$logged?>&nbsp;</div>
        <hr>
        
        <h2>iK Projects</h2>
        <h3>User area</h3>
        
        <nav>
            <a href="../ui/">Home</a> |            
            <a href="projects.php">Projects</a> |
            <a href="projects_new.php">New Project</a> |
            <a href="?p=exit">Exit</a> |
        </nav>
        
        <p><?=$alert?>&nbsp;</p>
    </body>
</html>
