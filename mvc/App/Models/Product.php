<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;
use Core\Traits\SoftDelete;

class Product extends AbstractModel
{

    use SoftDelete;

    public function __construct(
        public ?int $id = null,
        public string $name = '',
        public string $price = '',
        public string $description = '',
        public string $image = '[]',
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = null,
        public string $category = ''
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
                "UPDATE $tablename SET name = ?, price = ?, description = ?, category = ? WHERE id = ?",
                [
                    's:name' => $this->name,
                    'd:price' => $this->price,
                    's:description' => $this->description,
                    's:category' => $this->category,
                    'i:id' => $this->id
                ]
            );

            return $result;
        } else {
            /**
             * Hat das Objekt keine id, so müssen wir es neu anlegen.
             */
            $result = $database->query(
                "INSERT INTO $tablename SET name = ?, price = ?, description = ?, category = ?",
                [
                    's:name' => $this->name,
                    'd:price' => $this->price,
                    's:description' => $this->description,
                    's:category' => $this->category,
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

    public static function findByCategory(string $category, ?string $orderBy = null, ?string $direction = null): array
    {
        /**
         * Datenbankverbindung herstellen.
         */
        $database = new Database();
        /**
         * Tabellennamen berechnen.
         */
        $tablename = self::getTablenameFromClassname();

        /**
         * Query ausführen.
         *
         * Wurde in den Funktionsparametern eine Sortierung definiert, so wenden wir sie hier an, andernfalls rufen wir
         * alles ohne Sortierung ab.
         */
        if ($orderBy === null) {
            $result = $database->query("SELECT * FROM $tablename WHERE `category` = '$category'");
        } else {
            $result = $database->query("SELECT * FROM $tablename WHERE `category` = '$category' ORDER BY $orderBy $direction");
        }

        /**
         * Datenbankergebnis verarbeiten und zurückgeben.
         */
        return self::handleResult($result);
    }

    public static function findByNameOrDescription(string $search, ?string $orderBy = null, ?string $direction = null): array
    {
        /**
         * Datenbankverbindung herstellen.
         */
        $database = new Database();
        /**
         * Tabellennamen berechnen.
         */
        $tablename = self::getTablenameFromClassname();

        /**
         * Query ausführen.
         *
         * Wurde in den Funktionsparametern eine Sortierung definiert, so wenden wir sie hier an, andernfalls rufen wir
         * alles ohne Sortierung ab.
         */
        if ($orderBy === null) {
            $result = $database->query("SELECT * FROM $tablename WHERE `name` like '%$search%' OR `description` like '%$search%'");
        } else {
            $result = $database->query("SELECT * FROM $tablename WHERE `name` like '%$search%' OR `description` like '%$search%' ORDER BY $orderBy $direction");
        }

        /**
         * Datenbankergebnis verarbeiten und zurückgeben.
         */
        return self::handleResult($result);
    }
}
