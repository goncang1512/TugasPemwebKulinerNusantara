<?php
namespace Controller;

use Model\Resep;

class ResepCtrl extends Resep {
    public function __construct() {  
        parent::__construct(); 
    }

    public function unggahResep($data, $image) {
        $resep = $this->getByTitle($data["judul"]);

        if($resep) {
            $hasil = [
                "status" => 422,
                "message" => "Nama makanan sudah terdaftar gunakan nama lain"
            ];
        } else  {
            $hasil = $this->uploadResep($data, $image);
        }

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

    public function deleteOne($resep_id) {
        $data = $this->deleteOneData($resep_id);

        return $data;
    }

}
