<?php
$logRequired = true;
include '../ui/session.php';

require_once '../BLL/Funcs.php';
require_once '../DTO/Member.php';
require_once '../BLL/Member.php';

if(!empty($_POST['memberId']) && !empty($_POST['projectId']) && $_POST['action']==1){
    $projectId = $_POST['projectId'];
    $memberDTO = new \DTO\Member($_POST);
    $memberBLL = new \BLL\Member();
    $res = $memberBLL->editMember($memberDTO);
    if(is_numeric($res)){
        echo "<form id='form_member' method='post' action='../ui/project_view.php'><input type='hidden' name='projectId' value='$projectId'></form>";
        echo "<script>"
        . "function view(){document.getElementById('form_member').submit();}"
        . "setTimeout('view()',250);"
        . "</script>";
    }else{
        $alert = $res;
    }
}

$memberId = filter_input(INPUT_POST, "memberId",FILTER_VALIDATE_INT);
$projectId = filter_input(INPUT_POST, "projectId",FILTER_VALIDATE_INT);

$memberDTO = new \DTO\Member();
$memberDTO->setMemberId($memberId);
$memberBLL = new \BLL\Member();
$res = $memberBLL->selectMember($memberDTO);
$row = $res->fetch_array();
$lock = "readonly";
if($row['occupation'] != 'Manager'){
    $lock = "";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK | Member edit</title>
        <script>
            function editMember(){
                var test = confirm("Do you want to edit this member?")
                if(test == true){
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
        
        <h3>My projects | Project view | Member edit</h3>
        
        <p><button type="button" onclick="document.getElementById('form_left').submit()">Backward</button></p>
        
        <form id="form_member" method="post" accept-charset="utf-8" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input type="hidden" name="memberId" value="<?=$memberId?>">
            <input type="hidden" name="projectId" value="<?=$projectId?>">
            <input type="hidden" name="action" value="1">

            <label for="userName">User Name</label><br>
            <input type="text" name="userName" id="userName" readonly value="<?=$row['user_name']?>"><br>

            <label for="occupation">Occupation</label><br>
            <input type="text" name="occupation" id="occupation" autofocus <?=$lock?> value="<?=$row['occupation']?>"><br>

            <label for="salary">Salary</label><br>
            <input type="number" step="500" min="0" name="salary" id="salary" value="<?=$row['salary']?>"><br>
            
            <label for="cost">Cost</label><br>
            <input type="text" name="cost" id="cost" readonly value="<?=$row['cost']?>"><br>

            <button type="button" onclick="editMember()">Edit Member</button>
        </form>
        
        <form id="form_left" method="post" action="project_view.php">
            <input type="hidden" name="projectId" value="<?=$projectId?>">
        </form>
    </body>
</html>
