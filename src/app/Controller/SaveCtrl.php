<?php

namespace Controller;

use Model\Save;

class SaveCtrl extends Save {
    public function __construct() {
        parent::__construct();
    }

    public function saveResep($data) {
        $exists = $this->getUsRs($data["user_id"], $data["resep_id"]);

        if($exists) {
            $this->deleteSave($exists["id"]);
            return [
                "status" => 200,
                "message" => "Resep dihapus"
            ];
        } else {
            $res = $this->post($data["user_id"], $data["resep_id"]);
    
            if($res["status"] == 201) {
                return $res;
            } else {
                return [
                    "status" => 422,
                    "message" => "Gagal save resep"
                ];
            }
        }
    }

    public function byUser($user_id) {
        $res = $this->getByUser($user_id);

        return $res;
    }

    public function getBySaveUser($user_id) {
        $res = $this->getSave($user_id);

        return $res;
    }
}