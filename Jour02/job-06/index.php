<?php
    function ConnexionDataBase() : object {
        $_HOST = "localhost:3307";
        $_PWD = "";
        $_USER = "root";
        $_NAMEDB = "laplateforme";

        try {
            $_db = new PDO("mysql:host=$_HOST;dbname=$_NAMEDB;charset utf8",$_USER,$_PWD);
            $_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Pour les caractères spéciaux
            $_db->exec("SET NAMES 'utf8mb4'");
            return $_db;
        } catch(PDOException $e){
            echo "Erreur :".$e->getMessage();
            return null;
        }
    }

    function find_all_students_grade() : array {
        $db = ConnexionDataBase();
        $query = $db -> prepare("SELECT grade.name, email, fullname FROM student LEFT JOIN grade ON grade.id = grade_id ORDER BY grade.id ASC"); 
        $query -> execute();
        return $query -> fetchAll(PDO::FETCH_ASSOC);
    }
    $res = false;

    $res = find_all_students_grade();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job-01</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        table, thead, th, td {
            border : 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        if($res):?>
            <table>
                <thead>
                    <tr>
                        <th>grade</th>
                        <th>email</th>
                        <th>fullname</th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach($res as $row):?>
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['fullname']?></td>
                </tr> 
            <?php endforeach ?>    
                </tbody>
            </table>
        <?php endif ?>
</body>
</html>