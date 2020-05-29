<?php
$logRequired = true;
include '../ui/session.php';

require_once '../BLL/Funcs.php';
$funcs = new \BLL\Funcs();
require_once '../DTO/project.php';
require_once '../BLL/project.php';
require_once '../BLL/User.php';
require_once '../DTO/User.php';
require_once '../DTO/Member.php';
require_once '../BLL/Member.php';

if($_POST['action']==1){
    $projectId = $_REQUEST['projectId'];
    $projectType = $_REQUEST['projectType'];
    $memberBLL = new \BLL\Member();
    $memberDTO = new \DTO\Member($_POST);
    $res = $memberBLL->insertMember($memberDTO,$projectType);
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

$projectId = filter_var($_REQUEST['projectId'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$addEmail = filter_var($_REQUEST['addEmail'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$projectBLL = new \BLL\Project();
$projectDTO = new \DTO\Project();
$projectDTO->setProjectId($projectId);
$res = $projectBLL->selectProject($projectDTO);
$row = mysqli_fetch_array($res);
$projectType = $row['project_type'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK | Add member</title>
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
        
        <h3>My projects | Add member</h3>
        
        <h4>Project Title: <?=$row['title']?></h4>
        
        <form method="post" accept-charset="utf-8" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <input type="hidden" name="projectId" value="<?=$projectId?>">
            
            <label for="addEmail">Email to add</label><br>
            <input type="email" name="addEmail" id="addEmail" value="<?=$addEmail?>"><br>
            <button>Verify</button>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] !== 1){
        ?>
        <h4>User to add to the project</h4>
        <?php
        $userBLL = new \BLL\User();
        $userDTO = new \DTO\User();
        $userDTO->setUserMail($addEmail);
        $res = $userBLL->listUsers($userDTO);
        if(!is_array($res) && !is_object($res)){
            echo "User not found!";
        }else{
            $row = mysqli_fetch_array($res);            
            ?>
            <form method="post" accept-charset="utf-8" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <input type="hidden" name="projectId" value="<?=$projectId?>">
                <input type="hidden" name="userId" value="<?=$row['user_id']?>">
                <input type="hidden" name="action" value="1">
                <input type="hidden" name="projectType" value="<?=$projectType?>">

                <label for="userName">User Name</label><br>
                <input type="text" name="userName" id="userName" value="<?=$row['user_name']?>"><br>

                <label for="occupation">Occupation</label><br>
                <input type="text" name="occupation" id="occupation" autofocus><br>

                <label for="salary">Salary</label><br>
                <input type="number" step="500" min="0" name="salary" id="salary"><br>

                <button>Add Member</button>
            </form>
            <?php
        }
    }
    ?>
    </body>
</html>
