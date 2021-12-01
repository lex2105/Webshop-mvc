<div>
    <?php
    foreach (\Core\Session::getAndForget('errors', []) as $error): ?>
        <p><?php echo $error; ?></p>
    <?php endforeach; ?>
</div>