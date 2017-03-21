<?php
header('Content-type: application/json');
spl_autoload_register('AutoLoader');

function AutoLoader($className)
{
    $file = 'classes' . '/' . str_replace('\\','/',$className). '.php';
    require_once $file; 
}

$data = file_get_contents('php://input');
if($data) $_DATA = json_decode($data, true);

$err = new app\error\ErrorList();
$pro = new app\Project($_DATA);

require 'Methods.php';