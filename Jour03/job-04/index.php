<?php
    require_once("../functions.php");
    $student = findOneStudent(1);
    $grade = findOneGrade(1);
    $floor = findOneFloor(1);
    $room = findOneRoom(1);
    
    var_dump($student->getConstructVar());
    var_dump($grade->getConstructVar());
    var_dump($floor->getConstructVar());
    var_dump($room->getConstructVar());
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