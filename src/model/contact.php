<?php

namespace App\Model\Contact;

require_once('src/lib/database.php');


use App\Lib\Database\DatabaseConnection;


class Contact
{
    public string $lastname;
    public string $firstname;
    public string $email;
    public string $content;
}

class ContactRepository
{
    public DatabaseConnection $connection;

    public function createContact(string $lastname, string $firstname, string $email, string $content): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO contacts(lastname, firstname, email, content) VALUES(?, ?, ?, ?)'
        );
        $affectedLines = $statement->execute([$lastname, $firstname, $email, $content]);
        return ($affectedLines > 0);
    }
}