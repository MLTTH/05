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

    public function getUser($id): ?User
    {
        $statement = $this->connection->getConnection()->prepare(
        "SELECT id, firstname, lastname, email FROM users"
             );
        $statement->execute([$id]);

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

    public function createUser(string $firstname, string $lastname, string $email, string $password): bool
    {
        $query = $this->connection->getConnection()->prepare( "SELECT * FROM `users` WHERE `email` = ?" );
        //$query->bindValue( 1, $email );
        $query->execute([$email]);
        $found = $query->fetch();
        if($found > 0) {
        return false;
    }
else {
    $statement = $this->connection->getConnection()->prepare(
        'INSERT INTO users(firstname, lastname, email, password) VALUES(?, ?, ?, ?)'
    );
    $affectedLines = $statement->execute([$firstname, $lastname, $email, $password]);
    return ($affectedLines > 0);
}
    }
}