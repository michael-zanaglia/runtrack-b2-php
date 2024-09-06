<?php
    class DataBase {
        private $_HOST = "localhost:3307";
        private $_PWD = "";
        private $_USER = "root";
        private $_NAMEDB = "laplateforme";
        protected $_db;

        public function __construct(){
            try {
                $this->_db = new PDO("mysql:host=$this->_HOST;dbname=$this->_NAMEDB;character=utf8",$this->_USER,$this->_PWD);
                $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // Pour les caractères spéciaux
                $this->_db->exec("SET NAMES 'utf8mb4'");
            } catch(PDOException $e){
                echo "Erreur : ".$e->getMessage();
            }
        }

        public function getDb(){
            return $this -> _db;
        }

    }
    $exportedDataBase = var_export(new DataBase(), true);
?>