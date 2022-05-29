<?php

namespace App\Repository;

interface UserRepositoryInterface
{
    public function login($user);
    public function register($user);
    public function logout();
    public function updateUser($userId,$user);
}
