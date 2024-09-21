<?php

function redirect($url) {
    header("location: ".$url);
    die();
}

function view($name, $title = "") {
    global $view_bag;
    include_once(APP_NAME."views/layout.view.php");
}
