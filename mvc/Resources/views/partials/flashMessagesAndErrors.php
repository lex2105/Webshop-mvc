<div>
    <?php
    foreach (\Core\Session::getAndForget('errors', []) as $error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endforeach; ?>

    <?php
    foreach (\Core\Session::getAndForget('success', []) as $success): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endforeach; ?>
</div>