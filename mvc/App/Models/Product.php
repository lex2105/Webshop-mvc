<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;
use Core\Traits\SoftDelete;

class Product extends AbstractModel {

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

    public function save(): bool {
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


}