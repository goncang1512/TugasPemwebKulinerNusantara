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

    public function loginUser(string $email, string $password, $remember) {
        $user = $this->findEmail($email);

        if(!$user) {
            return [
                "status" => 422,
                "message" => "User tidak terdaftar"
            ];
        }

        if(password_verify($password, $user["password"])) {
            $dataUser = [
                "id" => $user["id"],
                "username" => $user["username"],
                "email" => $user["email"],
                "avatar" => $user["avatar"],
                "role" => $user["role"],
                "created_at" => $user["created_at"]
                ];
            $_SESSION["session_user"] = $dataUser;

            if($remember == 1) {
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie("session_user", json_encode($dataUser), $cookie_time, "/"); 
            }

            return [
                "status" => 200,
                "message" => "Berhasil login"
                ];
        } else {
            return [
                "status" => 422,
                "message" => "Password salah",
                "data" => $user
                ];
        }
    }

    public function logOut() {
        unset($_SESSION["session_user"]);
        session_destroy();

        if (isset($_COOKIE['session_user'])) {
            setcookie("session_user", "", time() - 3600, "/");
        }
    }
}