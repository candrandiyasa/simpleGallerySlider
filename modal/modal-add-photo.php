<div id="modal-add" class="overlay">
    <a href="#" class="cancel"></a>
    <div class="modal">
        <div class="mark-container">
            <div class="mark">
                <h2>G</h2>
            </div>
            <span>
                Add Photo Into Gallery
            </span>
        </div>
        <div class="content-modal">
            <form action="data/add-image.php" method="POST" enctype="multipart/form-data">
                <select name="kategori" class="select">
                    <?php 
                    foreach($resultdata as $val){
                    ?>
                        <option value="<?php echo $val['kode_kategori'] ?>"><?php echo $val['nama_kategori']; ?></option>
                    <?php } ?>
                </select>
                <input type="file" name="fileImage" id="file" placeholder="Import Your Photo">
                <label for="file">Choose a file</label>
                <input type="submit" name="submit" value="Save Image">
            </form>
            <small>
                <?php
                    if(isset($_SESSION['rejectS'])){
                        echo "* " . $_SESSION['rejectS'];
                        unset($_SESSION['rejectS']);
                    }else{
                        echo "*Format JPG, GIF, JPEG and Max. 500KB";
                    }
                ?>    
            </small>
        </div>
    </div>
</div>