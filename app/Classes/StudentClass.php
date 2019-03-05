<?php
namespace App\Classes;

require_once $_SERVER['INCLUDE_PATH'].'App/Config/DefaultDbContext.php';
require_once $_SERVER['INCLUDE_PATH'].'App/Interfaces/StudentInterface.php';

use App\Config\DefaultDbContext;
use App\Interfaces\StudentInterface;
use App\Models\Student;

class StudentClass extends DefaultDbContext implements StudentInterface
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

        return $stmt->fetchAll(\PDO::FETCH_CLASS, Student::class);
    }

    public function create(Student $model): bool
    {
        $query = "INSERT INTO students (id, name, course, age) value (:id, :name, :course, :age)";
        $stmt = $this->db->prepare($query);
        
        return $stmt->execute((array) $model);
    }

    public function findById(int $id): Student
    {
        $stmt = $this->db->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        // Fetch result and map to model
        $result = $stmt->fetchObject(Student::class);
        
        // If course does not exists, return empty object
        return ($result != false) ? $result : new Student();
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