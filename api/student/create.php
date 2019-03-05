<?php
require_once $_SERVER['INCLUDE_PATH'].'autoload.php';

use App\Classes\StudentClass;
use App\Models\Student as StudentModel;

try {
    $model = new StudentModel;
    $model->name    = $_POST['name'] ?? '';
    $model->age     = $_POST['age'] ?? '';
    $model->course  = $_POST['course'] ?? '';

    $class = new StudentClass();
    $class->create($model);
    
    http_response_code(201);

} catch (PDOException $err) {
    echo $err->getMessage();
}