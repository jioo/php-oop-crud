<?php
namespace Services;

include 'Config/DefaultDbContext.php';
include 'IStudentService.php';

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
        $query = "SELECT * FROM students";
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

    public function findById(int $id): array
    {
        $stmt = $this->db->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
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