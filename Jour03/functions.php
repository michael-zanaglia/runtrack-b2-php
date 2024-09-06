<?php
    require_once("class/database.php");
    require_once("class/Student.php");
    require_once("class/Grade.php");
    require_once("class/Floor.php");
    require_once("class/Room.php");

    
    function getMyDb() : ?PDO {
        $database = new DataBase();
        $db = $database->getDb();
        if ($db){
            return $db;
        }
        return null;
    }

    function findOneStudent(int $id) : ?Student{

        $db = getMyDb();
        
        if($db){

            $query = $db -> prepare("SELECT * FROM student WHERE id = ?");
            $query -> execute([$id]);
            $res = $query->fetch(PDO::FETCH_ASSOC);
            var_dump($res);
            if($res){
                return new Student(
                    $res['id'],
                    $res['grade_id'],
                    $res['email'],
                    $res['fullname'],
                    new DateTime($res['birthdate']),
                    $res['gender']
                );
            }

            return null;
        } 
            return null;
        
    
    }

    function findOneGrade(int $id) : ?Grade{
        $db = getMyDb();
        
        if($db){
            $query = $db -> prepare("SELECT * FROM grade WHERE id = ?");
            $query -> execute([$id]);
            $res = $query->fetch(PDO::FETCH_ASSOC);

            if($res){

                return new Grade(
                    $res['id'],
                    $res['room_id'],
                    $res['name'],
                    new DateTime($res['year'])
                );
            }

            return null;
        }
            return null;

    }

    function findOneFloor(int $id): ?Floor{

        $db = getMyDb();
        
        if($db){
            $query = $db -> prepare("SELECT * FROM floor WHERE id = ?");
            $query -> execute([$id]);
            $res = $query->fetch(PDO::FETCH_ASSOC);

            if($res){

                return new Floor(
                    $res['id'],
                    $res['name'],
                    $res['level']
                );
            }

            return null;
        }
            return null;
        
    }

    function findOneRoom(int $id): ?Room{
        $db = getMyDb();
        
        if($db){
            $query = $db -> prepare("SELECT * FROM room WHERE id = ?");
            $query -> execute([$id]);
            $res = $query->fetch(PDO::FETCH_ASSOC);

            if($res){

                return new Room(
                    $res['id'],
                    $res['floor_id'],
                    $res['name'],
                    $res['capacity']
                );
            }

            return null;
        }
            return null;
        
    }
?>