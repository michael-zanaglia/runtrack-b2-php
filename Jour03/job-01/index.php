<?php
    require_once("../class/Student.php");
    $studentDefault = new Student();
    $student = new Student(1,1,"email@email.com", "Terry Cristinelli", new DateTime("1990-01-10"), "male");
    $varDefault = $studentDefault->getConstructVar();
    $var = $student->getConstructVar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>StudentDefault</h1>
        <?php foreach($varDefault as $data) :?>
            <p><?= $data; ?></p>
        <?php endforeach; ?>
    </div>

    <div>
        <h1>Student</h1>
        <?php foreach($var as $data) :?>
            <p><?= $data; ?></p>
        <?php endforeach; ?>
    </div>
    
</body>
</html>