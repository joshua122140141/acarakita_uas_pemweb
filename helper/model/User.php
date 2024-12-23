<?php

class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $created_at;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $this->hashPassword($password);
        $this->created_at = date('Y-m-d H:i:s');
    }

    private function hashPassword($password)
    {
        // Use a secure hashing algorithm like bcrypt to hash the password
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password)
    {
        return password_verify($password, $this->password);
    }
}