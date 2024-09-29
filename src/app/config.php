<?php

$CONFIG = [
    'data_file' => 'data.json',
    'users' => [
        'goncang@gmail.com' => '123'
        ],
    'db' => [
            'host' => getenv("HOST"),
            'port' => 5432,
            'dbname' => 'resep_nusantara_db',
            'user' => 'postgres',
            'password' => 'samudera1512'
        ]
    ];

?>