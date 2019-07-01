<?php
require_once('../class/Gallery.php');

function rejectS($val, $status){
    if($val == 0){
        echo $_SESSION['rejectS'] = $status;
        header("Location: ../index.php#modal-add");
        exit;
    }
}

$target_dir = "../assets/img/";
$kategori = $_POST['kategori'];
$file = basename($_FILES['fileImage']['name']);
$target_file = $target_dir . basename($_FILES['fileImage']['name']);
$uploadStatus = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if(isset($_POST['submit'])){
    $check = getimagesize($_FILES['fileImage']['tmp_name']);
    if($check !== FALSE){
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadStatus = 1; 
    }else{
        $uploadStatus = 0;
        rejectS($uploadStatus, "File is not an image");
    }
}
if($kategori == ""){
    $uploadStatus = 0;
    rejectS($uploadStatus, "Sorry, choose kategori");
}else{
    if($gallery->get_id_kategori($kategori)){
        $uploadStatus = 1;
    }else{
        rejectS(0, "Sorry, your category is not find in database");
    }
}
if(file_exists($target_file)){
    $uploadStatus = 0;
    rejectS($uploadStatus, "Sorry, file already exits");
}
if($_FILES['fileImage']['size'] > 500000){
    $uploadStatus = 0;
    rejectS($uploadStatus, "Sorry, your file is too large");
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
    $uploadStatus = 0;
    rejectS($uploadStatus, "Sorry, only format JPG, JPEG, PNG, & GIF files are allowed");
}
if($uploadStatus == 0){
    rejectS($uploadStatus, "Sorry, your file was not uploaded");
}else{
    if(move_uploaded_file($_FILES['fileImage']['tmp_name'], $target_file)){
        try{
            $gallery->add_image($kategori, $file, $imageFileType);
            header('Location: ../index.php#modal-success');
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }else{
        rejectS(0, "sorry, there was an error uploading your file");
    }
}

$gallery->Disconnect();
?>