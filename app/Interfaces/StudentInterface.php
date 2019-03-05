<?php
namespace App\Interfaces;

require_once $_SERVER['INCLUDE_PATH'].'App/Models/Student.php';

use App\Models\Student;

interface StudentInterface
{
    /**
     * Get all students
     *
     * @return  array
     */
    public function getAll(): array;
    
    /**
     * Create new student
     *
     * @param   `Student`  $model   model for Student class
     * @return  bool   rows affected
     */
    public function create(Student $model): bool;

    /**
     * Get details of specific student
     *
     * @param   int  $id   model Id to find
     * @return  Student
     */
    public function findById(int $id): Student;

    /**
     * Update existing student
     *
     * @param   `Student`  $model   model for Student class
     * @return  bool
     */
    public function update(Student $model): bool;

    /**
     * Delete student
     *
     * @param   int  $id   model Id to delete
     * @return  array
     */
    public function delete(int $id): bool;
}