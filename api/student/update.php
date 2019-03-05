<?php
require_once $_SERVER['INCLUDE_PATH'].'autoload.php';

use App\Classes\StudentClass;
use App\Models\Student as StudentModel;

try {
    $model = new StudentModel;
    $model->id = $_POST['id'];
    $model->name = $_POST['name'];
    $model->course = $_POST['course'];
    $model->age = $_POST['age'];

    $class = new StudentClass();
    $result = $class->update($model);

    http_response_code(200);

} catch (PDOException $err) {
    echo $err->getMessage();
}