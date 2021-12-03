<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Services\CartService;
use Core\Helpers\Redirector;
use Core\View;
use Core\Validator;
use Core\Session;

/**
 * Cart Controller
 */
class CartController
{

    /**
     * Cart Übersicht anzeigen
     */
    public function index()
    {
        /**
         * Inhalt des Cart laden.
         */
        $productsInCart = CartService::get();

        /**
         * View laden und Daten übergeben.
         */
        View::render('/cart', [
            'products' => $productsInCart
        ]);
    }

    /**
     * Equipment in Cart hinzufügen (+1)
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function add(int $id)
    {
        /**
         * Equipment, das hinzugefügt werden soll, laden.
         */
        $product = Product::findOrFail($id);

        /**
         * Equipment in Cart hinzufügen.
         */
        CartService::add($product);

        /**
         * Redirect.
         */
        Redirector::redirect('/cart');
    } 

    /**
     * Equipment in Cart entfernen (-1)
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function remove(int $id)
    {
        /**
         * Equipment, von dem ein Element entfernt werden soll, laden.
         */
        $product = Product::findOrFail($id);

        /**
         * Ein Element des Equipments entfernen.
         */
        CartService::remove($product);

        /**
         * Redirect.
         */
        Redirector::redirect('/cart');
    }

    /**
     * Equipment komplett aus Cart entfernen (-all)
     *
     * @param int $id
     *
     * @throws \Exception
     */
    public function removeAll(int $id)
    {
        /**
         * Products, das komplett aus dem Cart entfernt werden soll, laden.
         */
        $product = Product::findOrFail($id);

        /**
         * Aus dem Cart entfernen.
         */
        CartService::removeAll($product);

        /**
         * Redirect.
         */
        Redirector::redirect('/cart');
    }

    public function checkout ()
    {
        /**
         * [x] prikaz svih proizvoda koje je korisnik kupio sa ukupnom cijenom
         * [] prikaz formulara za unos adrese za dostavu i način plaćanja
         * [] provjera da su svi podaci ispravno popunjeni
         * [] spremanje podataka u bazu
         */

        $productsInCart = CartService::get();

        /**
         * View laden und Daten übergeben.
         */
        View::render('checkout', ['products' => $productsInCart]);
    }

    public function validateOrder ()
    {
        /* 
         * [] spremanje svih podataka o narudžbi u databazu
         * [x] model za narudžbu
         */
        $validator = new Validator();
        $validator->letters($_POST['address'], label: 'Address', required: true);
        $validator->numeric($_POST['number'], label: 'Number', required: true);
        $validator->numeric($_POST['postal_code'], label: 'Postal code', required: true);
        $validator->letters($_POST['city'], label: 'City', required: true);
        $validator->letters($_POST['state'], label: 'State', required: true);
        /* $validator->letters($_POST['card_type'], label: 'Card type', required: true); */
        $validator->letters($_POST['card_holder'], label: 'Card name', required: true);
        $validator->numeric($_POST['card_number'], label: 'Card number', required: true);
        $validator->numeric($_POST['expire_date'], label: 'Expire date', required: true);
        $validator->numeric($_POST['cvv'], label: 'CVV', min: 8, required: true);

        $errors = $validator->getErrors();

        if(!empty($errors)){
            Session::set('errors', $errors);
            Redirector::redirect('/checkout');
        }

        $order = new Order();
        $order->fill($_POST);
        /**
         * ako validacija prođe onda ovdje pišemo kod za snimanje i prikaz thank you ekrana
         * 
         */

        if ($order->save()) {
            /**
             * Hat alles funktioniert und sind keine Fehler aufgetreten, leiten wir zum Login Formular.
             *
             * Um eine Erfolgsmeldung ausgeben zu können, verwenden wir dieselbe Mechanik wie für die errors.
             */
            Session::set('success', ['Thank you!']);
            Redirector::redirect('/thankyou');
            // $order->('/thankyou');
        } else {
            /**
             * Fehlermeldung erstellen und in die Session speichern.
             */
            $errors[] = 'An error occurred. Please try again!';
            Session::set('errors', $errors);

            Redirector::redirect('/checkout');
        }
    }
}
