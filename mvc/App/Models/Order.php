<?php

namespace App\Models;

use Core\Database;
use Core\Models\AbstractModel;
use Core\Traits\SoftDelete;

class Order extends AbstractModel{

    use SoftDelete; 

    public function __construct(
        public ?int $id = null,
        public string $user_id = '',
        public string $price = '',
        public string $created_at = '',
        public string $updated_at = '',
        public ?string $deleted_at = null,
        public string $address = '',
        public int $number = 0,
        public int $postal_code = 0,
        public string $city = '',
        public string $state = '',
        public string $card_holder = '',
        public int $card_number = 0,
        public string $expire_date = '',
        public int $cvv = 0,
    ){
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
                "UPDATE $tablename SET user_id = ?, price = ?, address = ?, number = ?, postal_code = ?, city = ?, state = ?, card_holder = ?, card_number = ?, expire_date = ?, cvv = ?  WHERE id = ?",
                [
                    's:user_id' => $this->user_id,
                    's:price' => $this->price,
                    's:address' => $this->address,
                    's:number' => $this->number,
                    's:postal_code' => $this->postal_code,
                    's:city' => $this->city,
                    's:state' => $this->state,
                    's:card_holder' => $this->card_holder,
                    's:card_number' => $this->card_number,
                    's:expire_date' => $this->expire_date,
                    's:cvv' => $this->cvv,
                    'i:id' => $this->id
                ]
            );

            return $result;
        } else {
            /**
             * Hat das Objekt keine id, so müssen wir es neu anlegen.
             */
            $result = $database->query(
                "INSERT INTO $tablename SET user_id = ?, price = ?, address = ?, number = ?, postal_code = ?, city = ?, state = ?, card_holder = ?, card_number = ?, expire_date = ?, cvv = ?",
                [
                    's:user_id' => $this->user_id,
                    's:price' => $this->price,
                    's:address' => $this->address,
                    's:number' => $this->number,
                    's:postal_code' => $this->postal_code,
                    's:city' => $this->city,
                    's:state' => $this->state,
                    's:card_holder' => $this->card_holder,
                    's:card_number' => $this->card_number,
                    's:expire_date' => $this->expire_date,
                    's:cvv' => $this->cvv
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