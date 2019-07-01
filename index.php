<?php
    require_once('data/session.php');
    require_once('class/Other.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Welcome to Gallery</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='assets/css/galleryCSS.css'>
    <link rel='stylesheet' type='text/css' href='assets/css/modalCSS.css'>
</head>
<body>
    <h1 class="title-body">WELCOME<br>TO<br>GALLERY</h1>
    <div class="master-container">
        <div class="container navb">
            <div class="logo-container">
                <div class="logo">
                    <h2>G</h2>
                </div>
                <span>
                    ALLERY<br>
                    <small>PROJECT</small>
                </span>
            </div>
            <div>
                <?php if(isset($_SESSION['logged_id'])){ ?>
                    <a href="#modal-add">ADD</a>
                    <a href="data/logout.php">LOGOUT</a>
                <?php }else{ ?>
                    <a href="#modal-login">LOGIN</a>
                <?php } ?>
            </div>
        </div>
        <div class="container bodys">
            <?php
            $other->page = (isset($_GET['page']))? $_GET['page'] : 1;
            $pagination = $other->startPrev();
            ?>
                <a href="<?php echo $pagination['prev']; ?>" class="navpage-content">
                    <i class="fa fa-angle-left"></i>
                </a>
            <?php
            $limit = 3;
            $limit_start = ($other->page - 1) * $limit; 
            if(isset($_SESSION['selectedKategori']) && $_SESSION['selectedKategori'] !== ""){
                $foto = $datab->getRows($other->getSelectedFoto($limit_start, $limit, $_SESSION['selectedKategori']));
                $jumlah = $datab->getRow($other->getSomeFoto($_SESSION['selectedKategori']));
            }else{
                $foto = $datab->getRows($other->getLimitFoto($limit_start, $limit));
                $jumlah = $datab->getRow($other->getAllFoto());
            }
            foreach($foto as $source){
            ?>
                <div class="content">
                    <img src="assets/img/<?php echo $source['nama_foto'] ?>">
                    <h3><?php echo $source['nama_kategori']; ?></h3>
                </div>
            <?php } ?>
            <?php 
            $jumlah_page = ceil($jumlah['jumlah'] / $limit);
            $pagination2 = $other->endNext($jumlah_page);
            ?>
            <a href="<?php echo $pagination2['next']; ?>" class="navpage-content">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
        <div class="container footer">
            <a href="<?php echo $pagination['start']; ?>" class="navpage">
                STAR<br>PAGE
            </a>
            <div class="second">
                <label>Sort by Category</label>
                <form method="POST" action="data/filter-kategori.php">
                <select name="filterKategori">
                    <option value="" <?php if(isset($_SESSION['selectedKategori']) == ""){echo "selected";} ?>>Show All</option>
                    <?php 
                    $resultdata = $datab->getRows($other->getKategori());
                    foreach($resultdata as $val){
                    ?>
                    <option value="<?php echo $val['kode_kategori']; ?>" <?php if(isset($_SESSION['selectedKategori']) && $_SESSION['selectedKategori'] == $val['kode_kategori']){echo "selected";} ?> ><?php echo $val['nama_kategori']; ?></option>
                    <?php } ?>
                </select>
                <input type="submit" name="submit" value="Filter" class="filter">
                </form>
            </div>
            <a href="<?php echo $pagination2['last']; ?>" class="navpage">
                END<br>PAGE
            </a>
        </div>
        <div class="container copyright">
            <small>BY CANDRANDIYASA</small>
        </div>
    </div>
    <?php 
        include_once('modal/modal-login.php');
        include_once('modal/modal-add-photo.php');
        include_once('modal/modal-success.php');
        $datab->Disconnect();
    ?>
</body>
</html>