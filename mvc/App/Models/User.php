<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractUser;
use Core\Traits\SoftDelete;

class User extends AbstractUser{

    use SoftDelete;

    public function __construct(
        public ?int $id = null,
        public string $username = '',
        protected string $password = '',
        public string $email = '',
        public string $firstname = '',
        public string $lastname = '',
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = null
    ) {
    }

    public function save(): bool{

        $database = new Database();

        $tablename = self::getTablenameFromClassname();

        if (!empty($this->id)) {
            /**
             * Query ausführen und Ergebnis direkt zurückgeben. Das kann entweder true oder false sein, je nachdem ob
             * der Query funktioniert hat oder nicht.
             */
            $result = $database->query(
                "UPDATE $tablename SET username = ?, password = ?, email = ?, firstname = ?, lastname = ? WHERE id = ?",
                [
                    's:username' => $this->username,
                    's:password' => $this->password,
                    's:email' => $this->email,
                    's:firstname' => $this->firstname,
                    's:lastname' => $this->lastname,
                    'i:id' => $this->id
                ]
            );

            return $result;
        } else {
            /**
             * Hat das Objekt keine id, so müssen wir es neu anlegen.
             */
            $result = $database->query(
                "INSERT INTO $tablename SET username = ?, password = ?, email = ?, firstname = ?, lastname = ?",
                [
                    's:username' => $this->username,
                    's:password' => $this->password,
                    's:email' => $this->email,
                    's:firstname' => $this->firstname,
                    's:lastname' => $this->lastname,
                ]
            );

            /**
             * Ein INSERT Query generiert eine neue id, diese müssen wir daher extra abfragen und verwenden daher die
             * von uns geschrieben handleInsertResult()-Methode, die über das AbstractModel verfügbar ist.
             */
            $this->handleInsertResult($database);

            /**
             * Ergebnis zurückgeben. Das kann entweder true oder false sein, je nachdem ob der Query funktioniert hat
             * oder nicht.
             */
            return $result;
        }
    }
}