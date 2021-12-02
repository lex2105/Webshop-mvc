<?php

namespace App\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Core\Helpers\Redirector;
use Core\View;

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
         * Equipment, das komplett aus dem Cart entfernt werden soll, laden.
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
         * omogući unos adrese za dostavu i načina plaćanja
         * 
         * na tom ekranu treba također prikazati i sve stavke koje je korisnik kupio
         * odaberi način dostave
         * kontrola da svi podaci moraju biti popunjeni
         *   
         * 
         */

        $productsInCart = CartService::get();

        /**
         * View laden und Daten übergeben.
         */
        View::render('checkout', ['products' => $productsInCart]);
    }

    public function saveOrder ()
    {
        /* 
         * snimi sve podatke o narudžbi u bazu
         *  moramo imati model za narudžbu
         */

    }
}
