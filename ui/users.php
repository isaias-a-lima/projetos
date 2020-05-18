<!DOCTYPE html>
<?php
require_once '../DTO/User.php';
require_once '../BLL/User.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>iK | Projects | Users</title>
    </head>
    <body>
        
        <h2>Manager Your Projects</h2>
        <h3>Users</h3>
        
        <p>
            <a href="../ui/">Voltar</a> |
            <a href="user_new.php">New User</a>
        </p>
        
        <table border="1" cellspacing="0">
            <tr>
                <th>Id</th><th>Name</th><th>Mail</th><th>&nbsp;</th>
            </tr>
        <?php
        $userBLL = new \BLL\User();
        $res = $userBLL->listUsers();
        while ($row = $res->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row['user_id'] ."</td>";
            echo "<td>" . $row['user_name'] ."</td>";
            echo "<td>" . $row['user_mail'] ."</td>";
            echo "<td>&nbsp;</td>";
            echo "</tr>";
        }
        ?>
            <tr>
                <th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th>
            </tr>
        </table>
    </body>
</html>
