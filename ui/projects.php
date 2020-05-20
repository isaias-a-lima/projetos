<?php
$logRequired = true;
include '../ui/session.php';
require_once '../BLL/project.php';
require_once '../DTO/project.php';
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
            <a href="?p=exit">Exit</a> |
        </nav>
        
        <p><?=$alert?>&nbsp;</p>
        
        <table border="1" cellspacing="0">
            <tr>
                <th>Id</th><th>Title</th><th>Type</th><th>Visibility</th><th>Estimated</th><th>Status</th><th>&nbsp;</th>
            </tr>
        <?php
        $projectDTO = new \DTO\Project();
        $projectDTO->setUserId($userId);
        
        $projectBLL = new \BLL\Project();
        $res = $projectBLL->listProject($projectDTO);
        while ($row = $res->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['project_id'] ."</td>";
            echo "<td>" . $row['title'] ."</td>";
            echo "<td>" . $row['project_type'] ."</td>";
            echo "<td>" . $row['visibility'] ."</td>";
            echo "<td>" . $projectBLL->changeDate($row['estimated_date']) ."</td>";
            echo "<td>" . $row['project_status'] ."</td>";
            echo '<td><button type="button">See</button></td>';
            echo "</tr>";
        }
        ?>            
        </table>
    </body>
</html>
