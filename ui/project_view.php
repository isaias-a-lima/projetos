<?php
$logRequired = true;
include '../ui/session.php';

require_once '../BLL/Funcs.php';
require_once '../DTO/project.php';
require_once '../BLL/project.php';
require_once '../DTO/Member.php';
require_once '../BLL/Member.php';

$funcs = new \BLL\Funcs();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $funcs = new \BLL\Funcs();
    
    $projectDTO = new \DTO\Project();
    $projectDTO->setProjectId($_REQUEST['projectId']);

    $projectBLL = new \BLL\Project();
    $res = $projectBLL->selectProject($projectDTO);
    while ($row = $res->fetch_assoc()){
        $projectId = $row['project_id'];
        $userId = $row['user_id'];
        $title = $row['title'];
        $contractor = $row['contractor'];
        $projectType = $row['project_type'];
        if($projectType == 'Single'){ $lock = 'disabled'; }else{ $lock = ''; }
        $visibility = $row['visibility'];
        $initialDate = $funcs->changeDate($row['initial_date'], 0);
        $estimatedDate = $funcs->changeDate($row['estimated_date'], 0);
        $finalDate = $funcs->changeDate($row['final_date'], 0);
        $totalCost = $row['total_cost'];
        $projectStatus = $row['project_status'];
    }
}else{
    $alert = "The parameter projectId is null";
}
        

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>iK | Project view</title>
        <script>
            function addMember(id){
                var projectId = id;
                var url = "../ui/member_add.php?projectId=" + projectId;
                window.location.href = url;
            }
            
            function editMember(memberId,projectId){
                var memberId = memberId;
                var projectId = projectId;
                if(memberId.length < 1 && projectId.length > 1){
                    alert("Parametros invalidos!");
                }else{
                    document.getElementById("memberId").value = memberId;
                    document.getElementById("projectId").value = projectId;
                    document.getElementById("form_member").submit();
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
            <a href="projects.php">My projects</a> |            
            <a href="?p=exit">Exit</a> |
        </nav>
        
        <p><?=$alert?></p>
        
        <h3>My projects | Project view</h3>
        
        <table border="1" cellspacing="0">
            <tr><th colspan="2">Project Title</th></tr>
            <tr><td colspan="2" style="text-align: center;"><?=$title?></td></tr>
            <tr><th>Contractor</th><td><?=$contractor?></td></tr>
            <tr><th>Type</th><td><?=$projectType?></td></tr>
            <tr><th>Visibility</th><td><?=$visibility?></td></tr>
            <tr><th>Initial date</th><td><?=$initialDate?></td></tr>
            <tr><th>Estimated date</th><td><?=$estimatedDate?></td></tr>
            <tr><th>Final date</th><td><?=$finalDate?></td></tr>
            <tr><th>Total Cost</th><td><?=$totalCost?></td></tr>
            <tr><th>Status</th><td><?=$projectStatus?></td></tr>            
        </table>
        <br>
        <?php
        $memberBLL = new \BLL\Member();
        $memberDTO = new \DTO\Member();
        $memberDTO->setProjectId($projectId);
        $res = $memberBLL->listMembers($memberDTO);
        ?>
        <table border="1" cellspacing="0">
            <tr><th colspan="3">Project Members</th></tr>
            <tr><th>Nome</th><th>Cargo</th><th>&nbsp;</th></tr>
            <?php
            while($row = $res->fetch_assoc()){
                $memberId = $row['member_id'];
                $userName = $row['user_name'];
                $occupation = $row['occupation'];
                echo "<tr><td>$userName</td><td>$occupation</td>";
                echo "<td><button onclick='editMember($memberId,$projectId)'>Edit</button></tr>";
                echo "</tr>";
            }
            ?>
            <tr>
                <th colspan="3">
                    <button onclick="addMember(<?=$projectId?>)">Add Member</button>
                </th>
            </tr>
        </table>
        
        <form id="form_member" method="post" accept-charset="utf-8" action="member_edit.php">
            <input type="hidden" name="memberId" id="memberId">
            <input type="hidden" name="projectId" id="projectId">
        </form>
    </body>
</html>
