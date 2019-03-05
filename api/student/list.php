<?php
require_once $_SERVER['INCLUDE_PATH'].'autoload.php';

use App\Classes\StudentClass;

$service = new StudentClass();

$result = $service->getAll();

echo json_encode($result);