<?php
namespace Controller;

use Model\Resep;

class ResepCtrl extends Resep {
    public function __construct() {   
        parent::__construct();  
    }

    public function unggahResep($data, $image) {
        $hasil = $this->uploadResep($data, $image);

        return $hasil;
    }

    public function getAll() {
        $data = $this->ambilData();

        return $data;
    }

    public function getOne($resep_id) {
        $data = $this->ambilSatu($resep_id);

        return $data;
    }

}
