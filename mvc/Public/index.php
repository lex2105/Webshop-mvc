<?php

spl_autoload_register(function ($namespaceAndClassname) {
    
    $namespaceAndClassname = str_replace('Core', 'core', $namespaceAndClassname);
    $namespaceAndClassname = str_replace('App', 'app', $namespaceAndClassname);

    $filepath = str_replace('\\', '/', $namespaceAndClassname);

    require_once __DIR__ . "/../$filepath.php";
});

/**
 * Error Reporting
 */
\Core\Bootloader::setDisplayErrors();
$app = new \Core\Bootloader();