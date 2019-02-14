<?php
namespace Models;

class User
{
    public $id;
    public $name;
    public $username;
    public $password;

    public function __contruct(array $param) {
        $this->id = $param['id'] ?? '';
        $this->name = $param['name'];
        $this->username = $param['username'];
        $this->password = $param['password'];
    }
}