<?php
include 'Services/StudentService.php';

try {
    $service = new Services\StudentService();

    $id = $_GET['id'];

    $result = $service->findById($id);

    echo json_encode($result);

} catch (PDOException $err) {
    echo $err->getMessage();
}