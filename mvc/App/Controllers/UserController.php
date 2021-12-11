<?php

namespace App\Controllers;

use App\Models\User;
use Core\Helpers\Redirector;
use Core\Session;
use Core\View;
use Core\Validator;
use Core\Middlewares\AuthMiddleware;

class UserController
{

    /**
     * Alle Einträge listen.
     */
    public function index()
    {
        /**
         * Alle Objekte über das Model aus der Datenbank laden.
         */
        $users = User::all();

        /**
         * View laden und Daten übergeben.
         */
        View::render('users/index', [
            'users' => $users
        ]);
    }

    /**
     * Einzelnes User anzeigen.
     */
    public function show(int $id)
    {
        /**
         * Gewünschtes User aus der DB laden.
         */
        $user = User::findOrFail($id);

        /**
         * View laden und Daten übergeben.
         */
        View::render('users/show', [
            'user' => $user
        ]);
    }

    public function validateUser()
    {

        $validator = new Validator();
        $validator->letters($_POST['firstname'], label: 'Firstname', required: true);
        $validator->letters($_POST['lastname'], label: 'Lastname', required: true);
        $validator->email($_POST['email'], label: 'Email', required: true);
        $validator->unique($_POST['email'], 'E-Mail', User::TABLENAME, 'email');
        $validator->unique($_POST['username'], 'Username', User::TABLENAME, 'username');
        $validator->password($_POST['password'], 'Passwort', min: 8, required: true);
        $validator->compare([
            $_POST['password'],
            'Password'
        ], [
            $_POST['password_repeat'],
            'Repeat password'
        ]);



        $errors = $validator->getErrors();

        if (!empty($errors)) {
            Session::set('errors', $errors);
            Redirector::redirect('/sign-up');
        }

        $user = new User();
        $user->fill($_POST);
        /**
         * ako validacija prođe onda ovdje pišemo kod za snimanje i prikaz thank you ekrana
         * 
         */

        if ($user->save()) {
            /**
             * Hat alles funktioniert und sind keine Fehler aufgetreten, leiten wir zum Login Formular.
             *
             * Um eine Erfolgsmeldung ausgeben zu können, verwenden wir dieselbe Mechanik wie für die errors.
             */
            Session::set('success', ['Thank you!']);
            Redirector::redirect('/login/do');
            //View::render('thankyou',[]);
            // $order->('/thankyou');
        } else {
            /**
             * Fehlermeldung erstellen und in die Session speichern.
             */
            $errors[] = 'An error occurred. Please try again!';
            Session::set('errors', $errors);

            Redirector::redirect('/');
        }
    }

    public function delete(int $id)
    {
        AuthMiddleware::isAdminOrFail();

        $user = User::findOrFail($id);

        View::render('helpers/confirmation', [
            'objectType' => 'User',
            'objectTitle' => $user->username,
            'confirmUrl' => BASE_URL . '/users/' . $user->id . '/delete/confirm',
            'abortUrl' => BASE_URL . '/users'
        ]);
    }

    public function deleteConfirm(int $id)
    {
        AuthMiddleware::isAdminOrFail();

        $user = User::findOrFail($id);

        $user->delete();

        Session::set('success', ['User was successfully deleted!']);

        Redirector::redirect('/home');
    }
}
