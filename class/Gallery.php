<?php
require_once('../database/Database.php');

class Gallery extends Database{
    public function login($username, $password){
        $sql = 'SELECT * FROM user 
                WHERE nama_user = ?
                AND password = ?   
        ';
        return $this->getRow($sql, [$username, $password]);
    }
    public function add_image($kode_ktg, $nama_foto, $file_foto){
        $sql = "INSERT INTO foto (kode_kategori, nama_foto, file_foto)
                VALUES (?, ?, ?)
        ";
        return $this->insertRow($sql, [$kode_ktg, $nama_foto, $file_foto]);
    }
    public function get_id_kategori($kode_ktg){
        $sql = "SELECT kode_kategori
                FROM ref_foto
                WHERE kode_kategori = ?
        ";
        return $this->getRow($sql,[$kode_ktg]);
    }
}

$gallery = new Gallery();
?>