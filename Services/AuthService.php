<?php
namespace Services;

include($_SERVER['INCLUDE_PATH'].'Config/DefaultDbContext.php');
include($_SERVER['INCLUDE_PATH'].'Services/IAuthService.php');

use Config\DefaultDbContext;
use Services\IAuthService;
use Models\User;

class AuthService extends DefaultDbContext implements IAuthService
{
    public function __construct() {
        parent::__construct();
    }

    public function login(User $model): bool {
        // Get the hashed password in db
        $model = $this->findByuserName($model['username']);
        $hashed_password = $model['password'];

        // Validate password
        $validate = password_verify($model['password'], $hashed_password);

        return $validate;
    }

    public function register(User $model): bool {
        // hash password
        $model['password'] = password_hash($model['password'], PASSWORD_DEFAULT);
        
        $query = "INSERT INTO users (id, name, username, password) value (:id, :name, :username, :password)";
        $stmt = $this->db->prepare($query);

        return $stmt->execute((array) $model);
    }

    public function findById(int $id): User {
        $query = "SELECT * FROM users WHERE id = :id";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":id", $id);
        
        $stmt->execute();

        return  $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    
    public function findByUsername(string $username): User {
        $query = "SELECT * FROM users WHERE username = :username";

        $stmt = $this->db->prepare($query);

        $stmt->bindParam(":username", $username);

        $stmt->execute();

        return  $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}