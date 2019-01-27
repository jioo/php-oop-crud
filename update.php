<?php
include 'Services/StudentService.php';

try {
    $service = new Services\StudentService();

    $student = array (
        'id' => $_POST['id'],
        'name' => $_POST['name'] ?? '',
        'course' => $_POST['course'] ?? '',
        'age' => $_POST['age'] ?? '',
    );

    $model = new Models\Student($student);

    $result = $service->update($model);

    http_response_code(200);

} catch (PDOException $err) {
    echo $err->getMessage();
}