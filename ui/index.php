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
        <title>iK | Home</title>
        <script>
            function view(id){
                var id = id;
                if(id !== "" && id !== null){
                    document.getElementById("projectId").value = id;
                    document.getElementById("form_project").submit();
                }else{
                    alert("Project id do not to be null!");
                }
            }
        </script>
    </head>
    <body>
        <div><?=$logged?>&nbsp;</div>
        <hr>
        
        <h2>iK Projects</h2>
        
        <nav>
            <?php
            if($logStatus==1){
            ?>
            <a href="projects.php">My projects</a> |
            <a href="user.php">User area</a> |
            <a href="?p=exit">Exit</a> |
            <?php
            }else{
            ?>            
            <a href="sign_in.php">Sign-In</a> |
            <a href="user_new.php">Create an account</a> |
            <?php
            }
            ?>
        </nav>
        
        <h3>Public projects</h3>
        
        <table border="1" cellspacing="0">
            <tr>
                <th>Title</th><th>Manager</th><!--<th>Type</th><th>Visibility</th><th>Initial Date</th><th>Estimated</th><th>Status</th>--><th>&nbsp;</th>
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
            /*
            echo "<td>" . $row['project_type'] ."</td>";
            echo "<td>" . $row['visibility'] ."</td>";
            echo "<td>" . $funcs->changeDate($row['initial_date']) ."</td>";
            echo "<td>" . $funcs->changeDate($row['estimated_date']) ."</td>";
            echo "<td>" . $row['project_status'] ."</td>";
             * 
             */
            echo "<td><button type='button' onclick='view(".$row['project_id'].")'>View</button></td>";
            echo "</tr>";
        }
        ?>        
        </table>
        <form id="form_project" method="post" accept-charset="utf-8" action="project_view_public.php">
            <input type="hidden" name="projectId" id="projectId">
        </form>
    </body>
</html>
