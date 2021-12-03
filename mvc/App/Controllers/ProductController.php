<?php

namespace App\Controllers;

use App\Models\Product;
use Core\View;

class ProductController {

    public function index() {
        $products = Product::all();
        
        View::render('products/index', [
            'category' => "All",
            'products' => $products]);

    }

    public function show(int $id)
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

    public function showSearch(string $searchTerm)
    {
        $products = Product::findByNameOrDescription($searchTerm);
        View::render('products/index', [
            'category' => "All",
            'products' => $products]);
    }

    
}