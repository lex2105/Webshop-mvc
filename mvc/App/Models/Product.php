<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;
use Core\Traits\SoftDelete;

class Product extends AbstractModel {

    use SoftDelete;

    // todo: zamijeniti sa svojim podacima
    public function __construct(
        public ?int $id = null,
        public string $name = '',
        public string $price = '',
        public string $description = '',
        public string $image = '[]',
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = null
    ) {
    }

    public function save(): bool {
        $database = new Database();
      
        $tablename = self::getTablenameFromClassname();

        if (!empty($this->$id)) {
           $result = $database->query(
                "UPDATE $tablename SET name = ?, price = ?, description = ?, image = ? WHERE id = ?",
                [
                    's:name' => $this->name,
                    's:price' => $this->price,
                    's:description' => $this->description,
                    's:images' => $this->image,
                    'i:id' => $this->id
                ]
            );
            return $result;
        } else {
            $result = $database->query("INSERT INTO $tablename SET name = ?,price = ?, description = ?, image = ?, id = ?", [
                's:name' => $this->name,
                's:price' => $this->price,
                's:description' => $this->description,
                's:images' => $this->image,
                'i:id' => $this->id,
            ]);

            $this->handleInsertResult($database);

            return $result;
        }
    }
}