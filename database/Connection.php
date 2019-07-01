<?php
class Connection {
    protected $isConn;
    protected $datab;
    protected $transaction;

    public function __construct($user = "root", $pass = "", $host = "localhost", $dbname = "db_foto", $option = []){
        $this->isConn = TRUE;
        try{
            $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $user, $pass, $option);
            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->transaction = $this->datab;
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //echo 'Connected Successfully';
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function Disconnect(){
        $this->datab = NULL;
        $this->isConn = FALSE;;
    }
}
?>