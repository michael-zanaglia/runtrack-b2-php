<?php 
    require_once("database.php");

    class Student extends Database {
        private $_id;
        private $_grade_id;
        private $_email;
        private $_fullname;
        private $_birthdate;
        private $_gender;

        public function __construct(int $id = 0, int $grade_id = 1, string $email = "default@example.com", string $fullname = "Jane Doe", DateTime $birthdate = new DateTime("1970-01-01"), string $gender="X"){
            parent::__construct();
            $this-> _id = $id;
            $this-> _grade_id = $grade_id;
            $this-> _email = $email;
            $this-> _fullname = $fullname;
            $this-> _birthdate = $birthdate->format("Y-m-d");            
            $this-> _gender = $gender;
        }

        public function getConstructVar() : array{
            return [
                $this->_id,
                $this->_grade_id,
                $this->_email,
                $this->_fullname,
                $this->_birthdate,
                $this->_gender
            ];
        }

        public function getId() : int{
            return $this->_id;
        }
        public function setId(int $newId): static{
            $this->_id = $newId;
        }

        public function getGrade() : int{
            return $this->_grade_id;
        }
        public function setGrade(int $newGrade): static{
            $this->_grade_id = $newGrade;
        }

        public function getEmail() : string{
            return $this->_email;
        }
        public function setEmail(string $newMail): static{
            $this->_email = $newMail;
        }

        public function getFullName() : string{
            return $this->_fullname;
        }
        public function setFullName(string $newName): static{
            $this->_fullname = $newName;
        }

        public function getBirthDate() : string{
            return $this->_birthdate;
        }
        public function setBirthDate(DateTime $newBirth): static{
            $this->_birthdate = $newBirth -> format("Y-m-d");
        }

        public function getGender() : string{
            return $this->_gender;
        }
        public function setGender(string $newGender): static{
            $this->_gender = $newGender;
        }

    }

    $exportStudent = var_export(new Student(), true);
?>