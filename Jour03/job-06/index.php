<?php
    require_once("../functions.php");
    
    $room = findOneRoom(6);
    $floor = findOneFloor(3);

    $list = $room->getGrades();
    $list2 = $floor->getRooms();
    
    var_dump($list);
    var_dump($list2);
    
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