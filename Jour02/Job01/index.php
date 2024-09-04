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

    function find_all_students() : array {
        $db = ConnexionDataBase();
        $query = $db -> prepare("SELECT * FROM student"); 
        $query -> execute();
        return $query -> fetchAll();
    }

    $res = find_all_students();
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
        table, thead, tbody, th {
            border : 1px solid black;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>grade_id</th>
                <th>email</th>
                <th>fullname</th>
                <th>birthdate</th>
                <th>gender</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($res as $ligne){
                    echo "<tr><th>".$ligne['id']."</th>
                        <th>".$ligne['grade_id']."</th>
                        <th>".$ligne['email']."</th>
                        <th>".$ligne['fullname']."</th>
                        <th>".$ligne['birthdate']."</th>
                        <th>".$ligne['gender']."</th></tr>"; 
                }      
            ?>
        </tbody>
    </table>
</body>
</html>