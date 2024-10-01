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

    public function deleteOne($resep_id) {
        $oneData = $this->getOneById($resep_id);

        if($oneData) {
            $imagePath = $oneData['gambar'];

            if ($imagePath) {
                $fullImagePath = __DIR__ . "/../../../assets/images/" . $imagePath;
                if (file_exists($fullImagePath)) {
                    unlink($fullImagePath);
                }
            }

            $data = $this->deleteOneData($resep_id);
            return $data;
        } else {
            return "Gagal delete resep";
        }
    }

    public function searchResep(string $keyword) {
        $result = $this->search($keyword);

        return $result;
    }
}
