<?php

namespace Controller;
use Model\User;
use Middleware\UserWare;

class UserCtrl extends User {
    private $userware;

    public function __construct() {
        parent::__construct();
        $this->userware = new UserWare();
    }

    public function createAccount($data) {
        $checkpassword = $this->userware->checkRePassword($data["password"], $data["re-password"]);

        if($checkpassword["status"] == 422) {
            return $checkpassword;
        }

        $res = $this->userware->exitsAccount($data);

        if($res["status"] == 422) {
            return $res;
        }

        $result = $this->create($data);
        return $result;
    }
}