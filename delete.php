<?php
include 'Services/StudentService.php';

try {
    $service = new Services\StudentService();

    $id = $_POST['id'];

    $result = $service->delete($id);

    http_response_code(200);

} catch (PDOException $err) {
    echo $err->getMessage();
}