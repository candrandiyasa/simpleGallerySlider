<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    require_once('database/Database.php');
    $datab = new Database();
    //print_r($_SESSION);
?>