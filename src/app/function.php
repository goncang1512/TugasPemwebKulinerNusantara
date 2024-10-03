<?php

function redirect($url) {
    header("location: ".$url);
    die();
}

function view($name_path, $data = []) {
    include_once(APP_NAME."views/layout.view.php");
}

function allowedComponent($pathname, $excluded_paths) {
    $should_exclude = false;
    foreach ($excluded_paths as $excluded_path) {
        if (strpos($pathname, $excluded_path) === 0) {
            $should_exclude = true;
            break;
        }
    }

    return $should_exclude;
}

function getSession() {
    session_start();

    if (isset($_SESSION['session_user'])) {
        return $_SESSION['session_user'];
    } else if (isset($_COOKIE['session_user'])) {
        $cookieData = json_decode($_COOKIE['session_user'], true);
        $_SESSION['session_user'] = $cookieData;
        return $cookieData;
    } else {
        return null;
    }
}