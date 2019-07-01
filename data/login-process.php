<?php
    require_once('../class/Gallery.php');

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $password = md5($password);
        $result = $gallery->login($username, $password);

        if($result > 0){
            $return['logged'] = TRUE;

            $_SESSION['logged_id'] = $result['nama_user'];
            $_SESSION['logged_type'] = $result['level'];
            $_SESSION['uniqid'] = uniqid();
         }else{
             $return['logged'] = FALSE;
         }
    }
    $gallery->Disconnect();
    if($return['logged']){
        header('Location:../index.php');
    }else{
        header('Location:../index.php');
    }
?>