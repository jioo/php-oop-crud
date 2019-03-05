<?php
require_once $_SERVER['INCLUDE_PATH'].'autoload.php';

use App\Classes\StudentClass;

try {
    $service = new StudentClass();

    $id = $_GET['id'];

    $result = $service->findById($id);

    echo json_encode($result);

} catch (PDOException $err) {
    echo $err->getMessage();
}