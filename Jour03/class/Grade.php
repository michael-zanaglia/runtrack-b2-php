<?php
    require_once("database.php");
    require_once("Student.php");
    

    class Grade extends DataBase {
        private $_id;
        private $_room_id;
        private $_name;
        private $_year;

        public function __construct(int $id = 0, int $room_id = 1, string $name = "DEFAULT", DateTime $year = new DateTime("1970-01-01")){
            parent::__construct();
            $this -> _id = $id;
            $this -> _room_id = $room_id;
            $this -> _name = $name;
            $this -> _year = $year->format("Y-m-d");  
        }

        public function getConstructVar() : array{
            return [
                $this->_id,
                $this->_room_id,
                $this->_name,
                $this->_year
            ];
        }

        public function getId() : int{
            return $this->_id;
        }
        public function setId(int $newId): static{
            $this->_id = $newId;
        }

        public function getRoom() : int{
            return $this->_room_id;
        }
        public function setRoom(int $newRoom): static{
            $this->_room_id = $newRoom;
        }

        public function getName() : string{
            return $this->_name;
        }
        public function setName(string $newName): static{
            $this->_name = $newName;
        }

        public function getYear() : string{
            return $this->_year;
        }
        public function setYear(DateTime $newYear): static{
            $this->_year = $newYear -> format("Y-m-d");
        }

        public function getStudents(): array{
            $stmt = $this->_db->prepare("SELECT * FROM student WHERE grade_id = ?");
            $stmt->execute([$this->getId()]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $send = [];
            foreach($res as $instance){
                $objet = new Student($instance['id'], $instance['grade_id'], $instance['email'], $instance['fullname'], new DateTime($instance['birthdate']), $instance['gender']);
                array_push($send, $objet);
            }
            return $send;
        }
    }
    $exportGrade = var_export(new Grade(), true);
?>