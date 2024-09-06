<?php
    require_once("database.php");
    require_once("Grade.php");

    class Room extends DataBase {
        private $_id;
        private $_floor_id;
        private $_name;
        private $_capacity;

        public function __construct(int $id = 0, int $floor_id = 0, string $name = "DEFAULT", int $capacity = 0 ){
            parent::__construct();
            $this->_id = $id;
            $this->_floor_id = $floor_id;
            $this->_name = $name;
            $this->_capacity = $capacity;
        }

        public function getConstructVar(): array{
            return [
                $this->_id,
                $this->_floor_id,
                $this->_name,
                $this->_capacity
            ];
        }

        public function getId() : int{
            return $this->_id;
        }
        public function setId(int $newId) : static{
            $this->_id = $newId;
        }

        public function getFloor() : int{
            return $this->_floor_id;
        }
        public function setFloor(int $newFloor): static{
            $this->_floor_id = $newFloor;
        }

        public function getName() : string{
            return $this->_name;
        }
        public function setName(string $newName): static{
            $this->_name = $newName;
        }

        public function getCapacity() : int{
            return $this->_capacity;
        }
        public function setCapacity(int $newCapacity): static{
            $this->_capacity = $newCapacity;
        }

        public function getGrades(){
            $stmt = $this->_db->prepare("SELECT * FROM grade WHERE room_id = ?");
            $stmt->execute([$this->getId()]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $send = [];
            foreach($res as $instance){
                $objet = new Grade($instance['id'], $instance['room_id'], $instance['name'], new DateTime($instance['year']));
                array_push($send, $objet);
            }
            return $send;
        }
    }
    $exportRoom = var_export(new Room(), true);
?>