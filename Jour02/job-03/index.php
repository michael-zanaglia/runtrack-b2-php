<?php
    function ConnexionDataBase() : ?PDO{
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

    function insert_student(string $email, string $fullname, string $gender, DateTime $birthdate, int $grade_id) : bool {
        $db = ConnexionDataBase();
        try {
            $query = $db -> prepare("INSERT INTO student(grade_id, email, fullname, birthdate, gender) VALUES(?,?,?,?,?)"); 
            $query -> execute([$grade_id, $email, $fullname, $birthdate->format('Y-m-d'), $gender]);  
            return true;
        } catch (PDOException $e){
            return false;
        }
    }

    $res = false;
    if(isset($_GET['add'])) {
        //mettre au format de date
        $birthdate = DateTime::createFromFormat('Y-m-d', $_GET['input-birthdate']);
        $res = insert_student($_GET['input-email'], $_GET['input-fullname'], $_GET['input-gender'], $birthdate, $_GET['input-grade_id']);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>job-03</title>
    <style>
      
    </style>
</head>
<body>
    <form action="" method="get">
        <label for="input-email">Inserer Email :</label>
        <input type="email" name="input-email" required>
        
        <label for="input-fullname">Inserer Fullname :</label>
        <input type="text" name="input-fullname" required>
        
        <label for="">Civilité</label>
        <select name="input-gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <label for="input-birthdate">Inserer Date de naissance</label>
        <input type="date" name="input-birthdate" required>
        
        <label for="input-grade_id">Inserer Grade :</label>
        <input type="text" name="input-grade_id" required>
        
        <button type="submit" name='add'>Rechercher</button>
    </form>
    <?php
        if($res){
            echo "Ajoute a la BDD.";
        }
    ?>
</body>
</html>