<?php
namespace Services;

include 'Models/Student.php';
use Models\Student;

interface IStudentService
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
     * @return  array
     */
    public function findById(int $id): array;

    /**
     * Update existing student
     *
     * @param   `Student`  $model   model for Student class
     * @return  array
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