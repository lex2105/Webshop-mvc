<div class="main__registrierung">
    <form class="main__registrierung-form" action="<?php echo BASE_URL; ?>/sign-up/do" method="post">
        <div class="main__registrierung-form__input">
            <label for="firstname">First name:</label>
            <input type="text" name="firstname" id="firstname" class="input">
        </div>
        <div class="main__registrierung-form__input">
            <label for="lastname">Last name:</label>
            <input type="text" name="lastname" id="lastname" class="input">
        </div>
        <div class="main__registrierung-form__input">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="input">
        </div>
        <div class="main__registrierung-form__input">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="input">
        </div>
        <div class="main__registrierung-form__input">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="input">
        </div>
        <div class="main__registrierung-form__input">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="input">
        </div>
        <div class="main__registrierung-form__input">
            <label for="repeat-password">Repeat password:</label>
            <input type="password" name="repeat-password" id="repeat-password" class="input">
        </div>

        <button type="submit" class="register-bttn">Create an account</button>
    </form>
</div>