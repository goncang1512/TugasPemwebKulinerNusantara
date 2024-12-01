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

    public function unggahResep($data, $image, $video) {
        $image = $this->cloud->unggah($image);
        $image = [
            "public_id" => $image["public_id"],
            "url_secure" => $image["secure_url"]
        ];
        
        if($video) {
            $vidio = $this->cloud->vidio($video);
            $vidio = [
                'public_id' => $vidio['public_id'],
                'url_secure' => $vidio['secure_url']
            ];
        }

        $hasil = $this->uploadResep($data, $image, $vidio);

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
            $vidio_id = $oneData['vidio_id'];

            $this->cloud->delete($public_id);
            
            if($vidio_id) {
                $this->cloud->delete($vidio_id, 'video');
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

    public function updateResep($data, $resep_id, $file) {
        $resep = $this->getOneById($resep_id);

        if (!empty($file["gambar"]["tmp_name"])) {
            if (isset($resep["gambar_id"])) {
                $this->cloud->delete($resep["gambar_id"]);
            }
            $image = $this->cloud->unggah($file["gambar"]["tmp_name"]);
            $this->updateGambar($image["secure_url"], $image["public_id"], $resep_id);
        } 

        if(!empty($file['vidio']['tmp_name'])) {
            if(isset($resep['vidio_id'])) {
                $this->cloud->delete($resep['vidio_id'], 'video');
            }

            $video = $this->cloud->vidio($file['vidio']['tmp_name']);
            $this->udpateVidio($video['secure_url'], $video['public_id'], $resep_id);
        }

        $result = $this->update($data, $resep_id);

        return $result;
    }
}
