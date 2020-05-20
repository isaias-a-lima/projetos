<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once '../DTO/project.php';
    require_once '../BLL/project.php';
    
    $projectBLL = new \BLL\Project();
    
    if(!filter_var($_POST['title'])){
        $alert = "Title inválido!";
    }else if(!filter_var($_POST['projectType'])){
        $alert = "Type é obrigatório!";
    }else if(!filter_var($_POST['visibility'])){
        $alert = "Visibility é obrigatório!";
    }else if(!filter_var($_POST['projectStatus'])){
        $alert = "Status é obrigatório!";
    }else if(!filter_var($_POST['userId'])){
        $alert = "User Id é obrigatório!";
    }else{
        
        $projectDTO = new \DTO\Project($_POST);
        
        $res = $projectBLL->insertProject($projectDTO);
        if(is_numeric($res)){
            header("Location:../ui/projects.php");
        }else{
            $alert = $res;
        }
    }
}


$logRequired = true;
include '../ui/session.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK Projects | Create a project</title>
    </head>
    <body>
        <div><?=$logged?>&nbsp;</div>
        <hr>
        
        <h2>iK Projects</h2>
        <h3>Projects => Create a project</h3>
        
        <nav>
            <a href="../ui/">Home</a> |
            <a href="projects.php">Projects</a> |            
            <a href="?p=exit">Exit</a> |
        </nav>
        
        <p><?=$alert?>&nbsp;</p>
        
        <form id="form_project" method="post" accept-charset="utf-8" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            
            <input type="hidden" id="userId" name="userId" value="<?=$userId?>">
            
            <label for="title">Title</label><br>
            <input type="text" id="title" name="title" value="<?=$_POST['title']?>"><br>
            
            <label for="contractor">Contractor</label><br>
            <input type="text" id="contractor" name="contractor" value="<?=$_POST['contractor']?>"><br>
            
            <label for="projectType">Type</label><br>
            <select id="projectType" name="projectType">
                <option value="<?=$_POST['projectType']?>"><?=$_POST['projectType']?></option>
                <option value="Single">Single</option>
                <option value="Team">Team</option>                
            </select><br>
            
            <label for="visibility">Visibility</label><br>            
            <select id="visibility" name="visibility">
                <option value="<?=$_POST['visibility']?>"><?=$_POST['visibility']?></option>
                <option value="Private">Private</option>
                <option value="Public">Public</option>                
            </select><br>
            
            <label for="initialDate">Initial Date</label><br>
            <input type="date" id="initialDate" name="initialDate" value="<?=$_POST['initialDate']?>"><br>
            
            <label for="estimatedDate">Estimated Date</label><br>
            <input type="date" id="estimatedDate" name="estimatedDate" value="<?=$_POST['estimatedDate']?>"><br>
            <!--
            <label for="finalDate">Final Date</label><br>
            <input type="date" id="finalDate" name="finalDate"><br>
            
            <label for="totalCost">Total Cost</label><br>
            <input type="text" id="totalCost" name="totalCost" readonly><br>
            -->
            <label for="projectStatus">Type</label><br>
            <select id="projectStatus" name="projectStatus">
                <option value="<?=$_POST['projectStatus']?>"><?=$_POST['projectStatus']?></option>
                <option value="To Do">To Do</option>
                <option value="In Progress">In Progress</option>
                <option value="Done">Done</option>
            </select><br>
            
            <button>Save</button>
        </form>
    </body>
</html>
