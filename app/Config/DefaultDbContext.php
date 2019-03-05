<?php
namespace App\Config;

class DefaultDbContext
{
    private $HOST = 'localhost';
    private $DATABASE = 'school';
    private $USERNAME = 'root';
    private $PASSWORD = '';

    protected $db;
    
    public function __construct() 
    {
        try {
            
            $pdo = new \PDO("mysql:host={$this->HOST};dbname={$this->DATABASE}", $this->USERNAME, $this->PASSWORD);
            
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
            $this->db = $pdo;

        } catch (\PDOException $err) {

            echo $err->getMessage();

        }
    }
}