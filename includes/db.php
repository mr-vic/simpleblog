<?php

require_once 'config.php';

$connection = mysqli_connect(
    $config['db']['server'],
    $config['db']['username'],
    $config['db']['password'],
    $config['db']['dbname']
);

if( $connection == false ) {
    echo 'Не удалось подключится к бд! <br>';
    echo mysqli_connect_error();
    exit();
}