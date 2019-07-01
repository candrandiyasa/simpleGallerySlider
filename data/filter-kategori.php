<?php
    session_start();
    if(isset($_REQUEST['filterKategori'])){
        $_SESSION['selectedKategori'] = $_REQUEST['filterKategori'];
    }
    header('Location:../index.php');
?>