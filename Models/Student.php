<?php
namespace Models;

// Plain Old PHP Objects (POHO)
class Student
{
    public $id;
    public $name;
    public $course;
    public $age;
    
    // class constructor
    function __construct(array $param) {

        $this->id = $param['id'] ?? '';

        $this->name = $param['name'];

        $this->course = $param['course'];
        
        $this->age = $param['age'];
    }
}