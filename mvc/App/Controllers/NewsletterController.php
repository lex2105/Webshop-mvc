<?php

namespace App\Controllers;

use Core\Validator;
use Core\Session;
use Core\Database;
use Core\Models\AbstractModel;
use App\Models\Newsletter;
use Core\Helpers\Redirector;

class NewsletterController extends AbstractModel
{
    public function __construct(
        public ?int $id = null,
        public string $email = '',
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
                "UPDATE $tablename SET email = ? WHERE id = ?",
                [
                    's:email' => $this->email,
                    'i:id' => $this->id,
                ]
            );

            return $result;
        } else {
            /**
             * Hat das Objekt keine id, so müssen wir es neu anlegen.
             */
            $result = $database->query(
                "INSERT INTO $tablename SET email = ?",
                [
                    's:email' => $this->email,
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

    public function validateNewsletter ()
    {

        $validator = new Validator();
        $validator->email($_POST['email'], label: 'Email', required: true);

        $errors = $validator->getErrors();

        if(!empty($errors)){
            Session::set('errors', $errors);
            Redirector::redirect('/');
        }
        

        $newsletter = new Newsletter();
        $newsletter->fill($_POST);

        if($newsletter->save())
        {
            Session::set('success', ['You have been successfully added to the newsletter list.']);
        }
        else
        {
            Session::set('errors', ['There has been a problem. Please try again later.']);
        }
        Redirector::redirect('/home');
    }
}