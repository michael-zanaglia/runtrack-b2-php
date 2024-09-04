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

    function find_one_student(string $email) : array {
        $db = ConnexionDataBase();
        $query = $db -> prepare("SELECT * FROM student WHERE email = ? "); 
        $query -> execute([$email]);
        return $query -> fetchAll();
    }
    $res = false;
    if(isset($_GET['name'])){
       $res = find_all_students($_GET['name']); 
    }
    
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
    <form action="" method="get">
        <label for="name">Inserer Email :</label>
        <input type="email" name="name" required>
        <button type="submit">Rechercher</button>
    </form>
    <?php
        if($res){
            echo "<table>
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
                <tbody>";
            foreach($res as $row){
                echo "<tr><td>".$row['id']."</td>
                        <td>".$row['grade_id']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['fullname']."</td>
                        <td>".$row['birthdate']."</td>
                        <td>".$row['gender']."</td></tr>"; 
            }
            echo "</tbody>
            </table>";
        }
    ?>
</body>
</html>