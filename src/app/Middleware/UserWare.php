<?php

namespace Middleware;

use Model\User;

$user = new User();

class UserWare {
    private $user;

    public function __construct()   {
        $this->user = new User();
    }

    public function exitsAccount($data) {
        $res = $this->user->findOne($data);

        if($res) {
            return [
                "status" => 422,
                "message" => "Pengguna sudah terdaftar"
            ];
        } else {
            return [
                "status" => 200,
                "message" => "Pengguna belum terdaftar"
                ];
        }
    }

    public function checkRePassword($password, $re_password) {
        if($password != $re_password) {
            return [
                "status" => 422,
                "message" => "Password dan Re-Password tidak sama"
            ];
        } else {
            return [
                "status" => 200,
                "message" => "Password dan Re-Password sama"
            ];
        }
    }
}