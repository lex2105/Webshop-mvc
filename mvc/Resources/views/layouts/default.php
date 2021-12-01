<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunar Beauty</title>

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/products.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/detail.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/login.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/signup-form.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/cart.css">

</head>
<body>
    <?php require_once __DIR__ . '/../Partials/header.php'; ?>

    <?php require_once __DIR__ . '/../Partials/flashMessagesAndErrors.php'; ?>

    <?php require_once $templatePath; ?>

    <?php require_once __DIR__ . '/../Partials/footer.php'; ?>
</body>
</html>