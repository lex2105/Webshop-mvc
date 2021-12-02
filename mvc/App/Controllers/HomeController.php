<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\User;
use Core\View;

class HomeController{
    public function index(){
        $products = product::all();

        View::render('products/index', ['category' => "All", 'products' => $products]);
    }
}