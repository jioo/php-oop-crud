<?php
namespace Models;

// Plain Old PHP Objects (POHO)
class User
{
    public $id;
    public $name;
    public $username;
    public $password;
    
    // class constructor
    function __construct(array $param) {

        $this->id = $param['id'] ?? '';

        $this->name = $param['name'] ?? '';

        $this->username = $param['username'] ?? '';
        
        $this->password = $param['password'] ?? '';
    }
}