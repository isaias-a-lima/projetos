<!DOCTYPE html>
<?php
require_once '../DTO/Project.php';
require_once '../BLL/Project.php';
$projectDTO = new \DTO\Project();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gerencimento de Projetos</title>
    </head>
    <body>
        <h1>Gerenciamento de Projetos</h1>
        <?php
        $projectDTO->manager = "Isaias Lima";
        $projectDTO->contractor ="Jericó";
        $projectBLL = new \BLL\Project($projectDTO);
        $projectBLL->insertProject();
        ?>
    </body>
</html>
