<?php
include 'Services/StudentService.php';

$service = new Services\StudentService();

$result = $service->getAll();

echo json_encode($result);