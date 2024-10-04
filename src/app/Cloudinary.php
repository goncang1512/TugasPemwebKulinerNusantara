<?php

namespace App;

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class Cloudinary {
    public function __construct() {
        $this->configCloud(); 
    }

    public function unggah($filePath) {
        try {
            $result = (new UploadApi())->upload($filePath, [
                "folder" => "resep"
            ]);
            return $result; 
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function delete($public_id) {
        try {
            $result = (new UploadApi())->destroy($public_id);
            return $result;
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function configCloud() {
        Configuration::instance([
            'cloud' => [
                'cloud_name' => $_ENV["CLOUD_NAME"],
                'api_key'    => $_ENV["CLOUDINARY_API_KEY"],
                'api_secret' => $_ENV["CLOUDINARY_API_SECRET"]
            ],
            'url' => [
                'secure' => true
            ]
        ]);
    }
}