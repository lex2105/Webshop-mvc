<h1>Hello, <?php echo $user->username ?>!</h1>

<div class="col-4">
    <h3>My info</h3>
    <p>First name: <?php echo $user->firstname ?></p>
    <p>Last name: <?php echo $user->lastname ?></p>
    <p>Email: <?php echo $user->email ?></p>
</div>

<div class="col-4">
    <h3>Update profile</h3>
    <form action="<?php echo BASE_URL; ?>/profile/update" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $user->username; ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $user->email; ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Change password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_repeat">Repeat password</label>
            <input type="password" name="password_repeat" id="password_repeat" class="form-control">
        </div>

        <button class="btn btn-primary mt-2" type="submit">Save</button>
    </form>
</div>

<a href="<?php echo BASE_URL . "/userOrders/" .  $user->id ?>">Show my orders</a>