<?php
class Other{
    public $page;
    
    public function startPrev(){
        if($this->page == 1){
            $pagination['prev'] = '#';
            $pagination['start'] = '#';
        }else{
            $link_prev = ($this->page > 1)? $this->page - 1 : 1 ;
            $pagination['prev'] = 'index.php?page='. $link_prev;
            $pagination['start'] = "index.php?page=1";
        }
        return $pagination;
    }
    public function endNext($jumlah_page){
        if($this->page == $jumlah_page){
            $pagination['next'] = "#";
            $pagination['last'] = "#";
        }else{
            $link_next = ($this->page < $jumlah_page)? $this->page + 1: $jumlah_page;
            $pagination['next'] = 'index.php?page=' . $link_next;
            $pagination['last'] = 'index.php?page=' . $jumlah_page;
        }            
        return $pagination;
    }
    public function getAllFoto(){
        $sql = "SELECT COUNT(*) AS jumlah FROM foto";
        return $sql;
    }
    public function getSomeFoto($where){
        $sql = "SELECT COUNT(*) AS jumlah FROM foto WHERE kode_kategori = " . $where;
        return $sql;
    }
    public function getLimitFoto($limit_start, $limit){
        $sql = "SELECT * FROM foto INNER JOIN ref_foto ON foto.kode_kategori = ref_foto.kode_kategori LIMIT " . $limit_start . "," . $limit."";
        return $sql;
    }
    public function getSelectedFoto($limit_start, $limit, $where){
        $sql = "SELECT * FROM `foto` INNER JOIN ref_foto ON foto.kode_kategori = ref_foto.kode_kategori WHERE foto.kode_kategori = {$where} LIMIT " . $limit_start . "," . $limit."";
        return $sql;
    }
    public function getKategori(){
        $sql = "SELECT * FROM ref_foto";
        return $sql;
    }
}
$other = new Other();
?>