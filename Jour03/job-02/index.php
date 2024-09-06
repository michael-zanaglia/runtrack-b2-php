<?php
    require_once("../class/Grade.php");
    require_once("../class/Room.php");
    require_once("../class/Floor.php");

    $grade = new Grade(1, 8, "Bachelor 1", new DateTime("2023-01-09"));
    $gradeDefault = new Grade();
    $varGrade = $grade->getConstructVar();
    $varGradeDef = $gradeDefault->getConstructVar();

    $room = new Room(1, 1, "RDC Food and Drinks", 90);
    $roomDefault = new Room();
    $varRoom = $room->getConstructVar();
    $varRoomDef = $roomDefault->getConstructVar();

    $floor = new Floor(1, "Rez-de-chaussée", 0);
    $floorDefault = new Floor();
    $varFloor = $floor->getConstructVar();
    $varFloorDef = $floorDefault->getConstructVar();
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
        <h1>Grade</h1>
        <div>
            <h3>Instance 1</h3>
            <?php foreach($varGrade as $data) :?>
                <p><?= $data; ?></p>
            <?php endforeach; ?>
        </div>
        <div>
            <h3>Default Instance</h3>
            <?php foreach($varGradeDef as $data) :?>
                <p><?= $data; ?></p>
            <?php endforeach; ?>
        </div>
    </div>
    <div>
        <h1>Room</h1>
        <div>
            <h3>Instance 1</h3>
            <?php foreach($varRoom as $data) :?>
                <p><?= $data; ?></p>
            <?php endforeach; ?>
        </div>
        <div>
            <h3>Default Instance</h3> 
            <?php foreach($varRoomDef as $data) :?>
                <p><?= $data; ?></p>
            <?php endforeach; ?>        
        </div>
    </div>
    <div>
        <h1>Floor</h1>
        <div>
            <h3>Instance 1</h3> 
            <?php foreach($varFloor as $data) :?>
                <p><?= $data; ?></p>
            <?php endforeach; ?>
        </div>
        <div>
            <h3>Default Instance</h3>   
            <?php foreach($varFloorDef as $data) :?>
                <p><?= $data; ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>