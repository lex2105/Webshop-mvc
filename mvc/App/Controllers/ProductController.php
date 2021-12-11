<?php

namespace App\Controllers;

use App\Models\Product;
use Core\View;
use Core\Middlewares\AuthMiddleware;
use Core\Validator;
use Core\Session;
use Core\Helpers\Redirector;

class ProductController
{

    public function index()
    {
        $products = Product::all();

        View::render('products/index', [
            'category' => "All our products",
            'products' => $products
        ]);
    }

    public function showProduct(int $id)
    {
        $product = Product::findOrFail($id);

        View::render('products/detail', [
            'product' => $product
        ]);
    }

    public function showCategory(string $category)
    {
        $products = Product::findByCategory($category);

        View::render('products/index', [
            'category' => $category,
            'products' => $products
        ]);
    }

    public function showSearch()
    {
        $searchTerm = $_POST['search'];
        $products = Product::findByNameOrDescription($searchTerm);
        View::render('products/index', [
            'category' => "All our products",
            'products' => $products
        ]);
    }


    public function create()
    {

        AuthMiddleware::isAdminOrFail();

        View::render('products/create');
    }

    private function validateFormData(int $id = 0): array
    {
        /**
         * Neues Validator Objekt erstellen.
         */
        $validator = new Validator();

        /**
         * Gibt es überhaupt Daten, die validiert werden können?
         */
        if (!empty($_POST)) {
            /**
             * Daten validieren. Für genauere Informationen zu den Funktionen s. Core\Validator.
             *
             * Hier verwenden wir "named params", damit wir einzelne Funktionsparameter überspringen können.
             */
            $validator->textnum($_POST['name'], label: 'Name', required: true, max: 255);
            $validator->textnum($_POST['description'], label: 'Description');
            // $validator->file($_FILES['images'], label: 'Images', type: 'image');
            $validator->int((int)$_POST['price'], label: 'Price');
            /**
             * @todo: implement Validate Array + Contents
             */
        }

        /**
         * Fehler aus dem Validator zurückgeben.
         */
        return $validator->getErrors();
    }


    public function addProduct()
    {
        /**
         * Prüfen, ob ein*e User*in eingeloggt ist und ob diese*r eingeloggte User*in Admin ist. Wenn nicht, geben wir
         * einen Fehler 403 Forbidden zurück. Dazu haben wir eine Art Middleware geschrieben, damit wir nicht immer
         * dasselbe if-Statement kopieren müssen, sondern einfach diese Funktion aufrufen können.
         */
        AuthMiddleware::isAdminOrFail();

        /**
         * 1) Daten validieren
         * 2) Model aus der DB abfragen, das aktualisiert werden soll
         * 3) Model in PHP überschreiben
         * 4) Model in DB zurückspeichern
         * 5) Redirect irgendwohin
         */

        /**
         * Nachdem wir exakt dieselben Validierungen durchführen für update und create, können wir sie in eine eigene
         * Methode auslagern und überall dort verwenden, wo wir sie brauchen.
         */

        $validationErrors = $this->validateFormData();

        /**
         * Sind Validierungsfehler aufgetreten ...
         */
        if (!empty($validationErrors)) {
            /**
             * ... dann speichern wir sie in die Session um sie in den Views dann ausgeben zu können ...
             */
            Session::set('errors', $validationErrors);
            /**
             * ... und leiten zurück zum Bearbeitungsformular. Der Code weiter unten in dieser Funktion wird dadurch
             * nicht mehr ausgeführt.
             */
            Redirector::redirect("/products/create");
        }

        /**
         * Neuen Room erstellen und mit den Daten aus dem Formular befüllen.
         */
        $product = new Product();
        $product->fill($_POST);

        /**
         * Schlägt die Speicherung aus irgendeinem Grund fehl ...
         */
        if (!$product->save()) {
            /**
             * ... so speichern wir einen Fehler in die Session und leiten wieder zurück zum Bearbeitungsformular.
             */
            Session::set('errors', ['Something went wrong :(']);
            Redirector::redirect("/products/create");
        }

        /**
         * Wenn alles funktioniert hat, leiten wir zurück zur /home-Route.
         */
        Session::set('success', ['Product successfully added']);
        Redirector::redirect('/home');
    }

    /**
     * @todo: change here
     */

    public function handleUploadedFiles(Product $product): ?Product
    {
        /**
         * Wir erstellen zunächst einen Array an Objekten, damit wir Logik, die zu einer Datei gehört, in diesen
         * Objekten kapseln können.
         */
        $files = File::createFromUploadedFiles('images');

        /**
         * Nun gehen wir alle Dateien durch ...
         */
        foreach ($files as $file) {
            /**
             * ... speichern sie in den Uploads Ordner ...
             */
            $storagePath = $file->putToUploadsFolder();
            /**
             * ... und verknüpfen sie mit dem Raum.
             */
            $product->addImages([$storagePath]);
        }
        /**
         * Nun geben wir den aktualisierten Raum wieder zurück.
         */
        return $product;
    }
}
