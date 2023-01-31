<?php

namespace App\Model\User;

require_once('src/lib/database.php');

use App\Lib\Database\DatabaseConnection;

class User
{
    public string $id;
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;
}

class UserRepository
{
    public DatabaseConnection $connection;
    public function checkPassword(string $email, string $password) {
        //die($password);
        $query = $this->connection->getConnection()->prepare( "SELECT * FROM users WHERE email = :email AND password = :password" );
        $query->execute(
            array(  
            'email'     =>     $email,  
            'password'  =>     $password  
        )
        );
        $count = $query->rowCount();
        if($count > 0) {
        return true;
    }
}

    public function getUserbyEmail($email): ?User
    {
        $statement = $this->connection->getConnection()->prepare(
        "SELECT id, firstname, lastname, email, password FROM users WHERE email=?"
             );
        $statement->execute([$email]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
    }

    $user = new User();
    $user->id = $row['id'];
    $user->firstname = $row['firstname'];
    $user->lastname = $row['lastname'];
    $user->email = $row['email'];
    $user->password = $row['password'];

    return $user;
    }

    public function getUserbyEmailPassword($email, $password): ?User
    {
    $user = $this->getUserbyEmail($email); 
    if (empty($user)) {
        return null;
    }
    $passOk = password_verify($password, $user->password);

    if ($passOk) {
        return $user;
    } 
    return null;
    }

    public function createUser(string $firstname, string $lastname, string $email, string $password): bool
    {
        $query = $this->connection->getConnection()->prepare( "SELECT * FROM `users` WHERE `email` = ?" );
        $query->execute([$email]);
        $found = $query->fetch();
        if($found < 1) {
            $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO users(firstname, lastname, email, password) VALUES(?, ?, ?, ?)'
            );
            $affectedLines = $statement->execute([$firstname, $lastname, $email, $password]);
            return ($affectedLines > 0);
    } else 
        {
        return false;
        }
    }
}