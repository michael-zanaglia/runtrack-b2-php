<?php
    require_once("database.php");
    require_once("Room.php");

    class Floor extends DataBase {
        private $_id;
        private $_name;
        private $_level;

        public function __construct(int $id = 0, string $name = "DEFAULT", int $level = 0){
            parent::__construct();
            $this->_id = $id;
            $this->_name = $name;
            $this->_level = $level;

        }

        public function getConstructVar(): array{
            return [
                $this->_id,
                $this->_name,
                $this->_level
            ];
        }

        public function getId() : int{
            return $this->_id;
        }
        public function setId(int $newId): static{
            $this->_id = $newId;
        }

        public function getName() : string{
            return $this->_name;
        }
        public function setName(string $newName): static{
            $this->_name = $newName;
        }

        public function getLevel() : int{
            return $this->_level;
        }
        public function setLevel(int $newLevel): static{
            $this->_level = $newLevel;
        }

        public function getRooms(){
            $stmt = $this->_db->prepare("SELECT * FROM room WHERE floor_id = ?");
            $stmt->execute([$this->getId()]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $send = [];
            foreach($res as $instance){
                $objet = new Room($instance['id'], $instance['floor_id'], $instance['name'], $instance['capacity']);
                array_push($send, $objet);
            }
            return $send;
        }
    }
    $exportFloor = var_export(new Floor(), true);
?>