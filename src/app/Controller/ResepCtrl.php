<?php
namespace Controller;

use Model\Resep;
use App\Cloudinary;

class ResepCtrl extends Resep {
    private $cloud;
    public function __construct() {   
        parent::__construct();
        $this->cloud = new Cloudinary();  
    }

    public function unggahResep($data, $image) {
        $image = $this->cloud->unggah($image);
        $image = [
            "public_id" => $image["public_id"],
            "url_secure" => $image["secure_url"]
            ];
        $hasil = $this->uploadResep($data, $image);

        return $hasil;
    }

    public function getAll() {
        $data = $this->ambilData();

        return $data;
    }

    public function getByUser($user_id) {
        $data = $this->findByUserId($user_id);

        return $data;
    }

    public function getOne($resep_id) {
        $data = $this->ambilSatu($resep_id);

        return $data;
    }

    public function deleteOne($resep_id) {
        $oneData = $this->getOneById($resep_id);

        if($oneData) {
            $public_id = $oneData['gambar_id'];

            $this->cloud->delete($public_id);

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

    public function updateResep($data, $resep_id, $file) {
        $resep = $this->getOneById($resep_id);

        if (!empty($file["gambar"]["tmp_name"])) {
            if (isset($resep["gambar_id"])) {
                $this->cloud->delete($resep["gambar_id"]);
            }
            $image = $this->cloud->unggah($file["gambar"]["tmp_name"]);
            $this->updateGambar($image["secure_url"], $image["public_id"], $resep_id);
        }

        $result = $this->update($data, $resep_id);

        return $result;
    }
}
