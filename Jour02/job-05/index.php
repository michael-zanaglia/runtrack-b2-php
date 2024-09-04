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

    function find_full_rooms() : array {
        $db = ConnexionDataBase();
        // LEFT JOIN me permet de comparer deux tableaux , meme ceux possedant aucune cle etrangere entre elles. Group by me permet de check toutes les salles.
        $query = $db -> prepare(
                                "   SELECT name, capacity, COUNT(student.en_salle) AS nbr_etudiant, CASE WHEN COUNT(student.en_salle) >= capacity THEN 'PLEINE' ELSE 'NON PLEINE' END AS is_full
                                    FROM room 
                                    LEFT JOIN student ON room.id = student.en_salle
                                    GROUP BY room.id
                                "
                                ); 
        $query -> execute();
        $aws = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $aws;
    }
    $res = false;

    $res = find_full_rooms();
    echo "<pre>";
    var_dump($res);
    echo "</pre>";
    
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
                        <th>en salle</th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach($res as $row):?>
                <tr>
                    <td><?=$row['name']?></td>
                    <td><?=$row['capacity']?></td>
                    <td><?=$row['is_full']?></td>
                </tr> 
            <?php endforeach ?>    
                </tbody>
            </table>
        <?php endif ?>
</body>
</html>