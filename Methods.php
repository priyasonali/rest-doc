<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if($data) {
        echo $pro->addData();
    } else {
        echo json_encode($err->empty(), JSON_PRETTY_PRINT);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
     if($data) {
        echo $pro->upProject();
    } else {
        echo json_encode($err->empty(), JSON_PRETTY_PRINT);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($err->get(), JSON_PRETTY_PRINT);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if($data) {
        echo $pro->delProject();
    } else {
        echo json_encode($err->empty(), JSON_PRETTY_PRINT);
    }
}  