<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ProductController;
use App\Controllers\CartController;

return [
    
    /**
     * Index Route
     */
    '/' => [HomeController::class, 'index'],

    /**
     * Home Route
     */
    '/home' => [ProductController::class, 'index'],

    /**
     * Auth Routes
     */
    '/login' => [AuthController::class, 'loginForm'],
    '/login/do' => [AuthController::class, 'loginDo'],
    '/logout' => [AuthController::class, 'logout'],
    '/sign-up' => [AuthController::class, 'signupForm'],
    '/sign-up/do' => [AuthController::class, 'signupDo'],

    /**
     * Products Routes
     */
    '/products' => [ProductController::class, 'index'],
    '/products/{id}/show' => [ProductController::class, 'show'],
    '/products/{category}' => [ProductController::class, 'showCategory'],

    /**
     * Users Routes
     */
    '/users' => [UserController::class, 'index'],
    '/users/{id}/show' => [UserController::class, 'show'],

    /**
     * Cart Routes
     */
    '/cart' => [CartController::class, 'index'],
    '/products/{id}/add-to-cart' => [CartController::class, 'add'],
    '/products/{id}/remove-from-cart' => [CartController::class, 'remove'],
    '/products/{id}/remove-all-from-cart' => [CartController::class, 'removeAll'],
    
    /**
     * Checkout Routes
     */
    '/checkout' => [CartController::class, 'checkout'],
    '/checkout/my-order' => [CartController::class, 'saveOrder'],
    '/validateOrder' => [CartController::class, 'validateOrder']
];