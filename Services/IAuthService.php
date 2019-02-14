<?php
namespace Services;

include($_SERVER['INCLUDE_PATH'].'Models/User.php');

use Models\User;

interface IAuthService 
{
    public function login(User $model): bool;
    public function register(User $model): bool;
    public function findById(int $id): User;
    public function findByUsername(string $username): User;
}