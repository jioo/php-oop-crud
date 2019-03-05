<?php
require_once $_SERVER['INCLUDE_PATH'].'autoload.php';

use App\Classes\StudentClass;

try {
    $class = new StudentClass();

    $id = $_POST['id'];

    $result = $class->delete($id);

    http_response_code(200);

} catch (PDOException $err) {
    echo $err->getMessage();
}