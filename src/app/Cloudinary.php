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

    public function vidio($filePath) {
        try {
            $result = (new UploadApi())->upload($filePath, [
                "folder" => "resep-vidio",
                'resource_type' => 'video',
                'chunk_size' => 6000000,
                'eager' => [
                [
                    'width' => 720, // Resolusi video (ubah sesuai kebutuhan)
                    'height' => 480,
                    'crop' => 'limit',
                    'quality' => 'auto', // Optimasi kualitas secara otomatis
                    'format' => 'mp4' // Format file
                ]
            ]
            ]);
            return $result; 
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function delete($public_id, $resourceType = 'image') {
        try {
            $result = (new UploadApi())->destroy($public_id, [
                'resource_type' => $resourceType
            ]);
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