<?php
header('Content-type: application/json');
require 'dbconnect.php';
require './error/errlist.php';

$err = new ErrorList;

$data = file_get_contents('php://input');
if($data) $_DATA = json_decode($data, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($data) {
        require 'new.php';
    } else {
    echo json_encode($err->empty(), JSON_PRETTY_PRINT);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    echo json_encode($err->put(), JSON_PRETTY_PRINT);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($err->get(), JSON_PRETTY_PRINT);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if($data){
    require 'delete.php';
    }
}  



