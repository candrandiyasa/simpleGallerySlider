<?php
include_once('Connection.php');

class Database extends Connection {

    public function __construct(){
        parent::__construct();
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }

    public function getRow($query, $params = []){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetch();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    } 
    public function getRows($query, $params = []){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll();
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function insertRow($query, $params = []){
        try{
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return TRUE;
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }

}
?>