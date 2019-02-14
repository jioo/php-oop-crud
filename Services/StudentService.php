<?php
namespace Services;

include($_SERVER['INCLUDE_PATH'] . "Config/DefaultDbContext.php");
include($_SERVER['INCLUDE_PATH'] . "Services/IStudentService.php");

use Config\DefaultDbContext;
use Services\IStudentService;
use Models\Student;

class StudentService extends DefaultDbContext implements IStudentService
{
    // class constructor
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM students ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function create(Student $model): bool
    {
        $query = "INSERT INTO students (id, name, course, age) value (:id, :name, :course, :age)";
        $stmt = $this->db->prepare($query);
        
        return $stmt->execute((array) $model);
    }

    public function findById(int $id)
    {
        $stmt = $this->db->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return $result ?? array();
    }

    public function update(Student $model): bool
    {
        $query = "UPDATE students SET name = :name, course = :course, age = :age WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        return $stmt->execute((array) $model);
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM students WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }
}