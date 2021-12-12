<div class="userProfile-background">
    <h1 class="userProfile-title">Hello, <?php echo $user->username ?>!</h1>

    <div class="userProfile-cards">
        <div class="userProfile-card card-bottom-margin left-align">
            <h3>My info</h3>
            <p class="userProfile-text">First name: <?php echo $user->firstname ?></p>
            <p class="userProfile-text">Last name: <?php echo $user->lastname ?></p>
            <p class="userProfile-text">Email: <?php echo $user->email ?></p>
        </div>

        <div class="userProfile-card">
            <h3>Update profile</h3>
            <form action="<?php echo BASE_URL; ?>/profile/update" method="post" class="form">

                <div class="userProfile-card__input ">
                    <label for="username" class="userProfile-text">Username:</label>
                    <input type="text" name="username" id="username" value="<?php echo $user->username; ?>" class="form-control">
                </div>

                <div class="userProfile-card__input ">
                    <label for="email" class="userProfile-text">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $user->email; ?>" class="form-control">
                </div>

                <div class="userProfile-card__input ">
                    <label for="password" class="userProfile-text">Change password:</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="userProfile-card__input ">
                    <label for="password_repeat" class="userProfile-text">Repeat password:</label>
                    <input type="password" name="password_repeat" id="password_repeat" class="form-control">
                </div>

                <button class="userProfile-card__save-bttn" type="submit">Save</button>
            </form>
        </div>
    </div>

    <a href="<?php echo BASE_URL . "/userOrders/" .  $user->id ?>" class="userProfile-link">Show my orders</a>
</div>