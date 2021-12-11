<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\ProductController;
use App\Controllers\CartController;
use App\Controllers\NewsletterController;
use App\Controllers\ProfileController;

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
    '/products/{id}/showProduct' => [ProductController::class, 'showProduct'],
    '/products/{category}' => [ProductController::class, 'showCategory'],
    '/search' => [ProductController::class, 'showSearch'],
    '/products/create' => [ProductController::class, 'create'],
    '/products/create/do' => [ProductController::class, 'addProduct'],
    '/products/{id}/delete' => [ProductController::class, 'delete'],
    '/products/{id}/delete/confirm' => [ProductController::class, 'deleteConfirm'],


    /**
     * Users Routes
     */
    '/users' => [UserController::class, 'index'],
    '/users/{id}/show' => [UserController::class, 'show'],
    '/admin/allUsers' => [UserController::class, 'index'],
    '/users/{id}/delete' => [UserController::class, 'delete'],
    '/users/{id}/delete/confirm' => [UserController::class, 'deleteConfirm'],

    /**
     * Cart Routes
     */
    '/cart' => [CartController::class, 'index'],
    '/products/{id}/add-to-cart' => [CartController::class, 'add'],
    '/products/{id}/remove-from-cart' => [CartController::class, 'remove'],
    '/products/{id}/remove-all-from-cart' => [CartController::class, 'removeAll'],
    '/admin/allOrders' => [CartController::class, 'allOrders'],

    /**
     * Checkout Routes
     */
    '/checkout' => [CartController::class, 'checkout'],
    '/validateOrder' => [CartController::class, 'validateOrder'],

    /**
     * Newsletter Route
     */
    '/newsletter' => [NewsletterController::class, 'validateNewsletter'],

    /**
     * Profile Route
     */
    '/profile' => [ProfileController::class, 'index'],
    '/profile/update' => [ProfileController::class, 'update'],
    '/userOrders/{id}' => [CartController::class, 'allUsersOrders'],
];
