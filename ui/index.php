<!DOCTYPE html>
<?php
$logRequired = false;
include '../ui/session.php';

require_once '../DTO/Project.php';
require_once '../BLL/Project.php';
require_once '../BLL/Funcs.php';
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
        <h3>Public Projects</h3>
        <nav>
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
        </nav>
        
        <p>&nbsp;</p>
        
        <table border="1" cellspacing="0">
            <tr>
                <th>Title</th><th>Manager</th><th>Type</th><th>Visibility</th><th>Initial Date</th><th>Estimated</th><th>Status</th><th>&nbsp;</th>
            </tr>
        <?php
        $funcs = new \BLL\Funcs(); 
        $projectDTO = new \DTO\Project();        
        $projectBLL = new \BLL\Project();
        $res = $projectBLL->listProject($projectDTO, 1);
        while ($row = $res->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['title'] ."</td>";
            echo "<td>" . $row['user_name'] ."</td>";
            echo "<td>" . $row['project_type'] ."</td>";
            echo "<td>" . $row['visibility'] ."</td>";
            echo "<td>" . $funcs->changeDate($row['initial_date']) ."</td>";
            echo "<td>" . $funcs->changeDate($row['estimated_date']) ."</td>";
            echo "<td>" . $row['project_status'] ."</td>";            
            echo "<td><button type='button' onclick='view(".$row['project_id'].")'>View</button></td>";
            echo "</tr>";
        }
        ?>        
        </table>
    </body>
</html>
