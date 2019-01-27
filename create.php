<?php
include 'Services/StudentService.php';

try {
    $service = new Services\StudentService();

    $student = array(
        'name'   => $_POST['name'] ?? '',
        'age'    => $_POST['age'] ?? '',
        'course' => $_POST['course'] ?? '',
    );

    $model = new Models\Student($student);
    
    $service->create($model);
    
    http_response_code(201);

} catch (PDOException $err) {
    echo $err->getMessage();
}