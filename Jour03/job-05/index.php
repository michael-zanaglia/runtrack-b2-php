<?php
    require_once("../functions.php");
    
    $grade = findOneGrade(2);

    $list = $grade->getStudents();
    
    var_dump($list);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>