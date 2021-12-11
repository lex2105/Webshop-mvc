<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractUser;
use Core\Traits\SoftDelete;
use Core\Models\DateTime;

class User extends AbstractUser
{

    use SoftDelete;

    public const TABLENAME = 'user';

    public function __construct(
        public ?int $id = null,
        public string $username = '',
        protected string $password = '',
        public string $email = '',
        public string $firstname = '',
        public string $lastname = '',
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = null,
        public bool $is_admin = false
    ) {
    }

    public function save(): bool
    {

        $database = new Database();

        $tablename = self::getTablenameFromClassname();

        if (!empty($this->id)) {
            /**
             * Query ausführen und Ergebnis direkt zurückgeben. Das kann entweder true oder false sein, je nachdem ob
             * der Query funktioniert hat oder nicht.
             */
            $result = $database->query(
                "UPDATE $tablename SET username = ?, password = ?, email = ?, firstname = ?, lastname = ?, is_admin = ? WHERE id = ?",
                [
                    's:username' => $this->username,
                    's:password' => $this->password,
                    's:email' => $this->email,
                    's:firstname' => $this->firstname,
                    's:lastname' => $this->lastname,
                    'i:is_admin' => $this->is_admin,
                    'i:id' => $this->id,
                ]
            );

            return $result;
        } else {
            /**
             * Hat das Objekt keine id, so müssen wir es neu anlegen.
             */
            $result = $database->query(
                "INSERT INTO $tablename SET username = ?, password = ?, email = ?, firstname = ?, lastname = ?, is_admin = ?",
                [
                    's:username' => $this->username,
                    's:password' => $this->password,
                    's:email' => $this->email,
                    's:firstname' => $this->firstname,
                    's:lastname' => $this->lastname,
                    'i:is_admin' => $this->is_admin,
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

    public function userOrders(): array
    {
        return Order::findOrdersByUser($this->id);
    }

    public function getTimeFromFormatted()
    {
        /**
         * Die erste runde Klammer erstellt ein neues \Core\DateTime Objekt und ruft dann direkt die format()-Methode
         * davon auf. Das hat den Sinn, dass wir nicht eine Variable dafür erstellen müssen und dann die
         * format()-Methode auf die Variable ausführen. Es hätte denselben Effekt, aber wir sparen uns eine Variable,
         * da wir ohnehin nur ein einziges Statement in dieser Funktion haben.
         */
        return (new DateTime($this->time_from))->format(DateTime::HUMAN_READABLE_AT_FROM);
    }

    /**
     * End-Zeit der Buchung als String formatieren.
     *
     * @return string
     * @throws \Exception
     */
    public function getTimeToFormatted()
    {
        /**
         * Die erste runde Klammer erstellt ein neues \Core\DateTime Objekt und ruft dann direkt die format()-Methode
         * davon auf. Das hat den Sinn, dass wir nicht eine Variable dafür erstellen müssen und dann die
         * format()-Methode auf die Variable ausführen. Es hätte denselben Effekt, aber wir sparen uns eine Variable,
         * da wir ohnehin nur ein einziges Statement in dieser Funktion haben.
         */
        return (new DateTime($this->time_to))->format(DateTime::HUMAN_READABLE_AT_TO);
    }
}
