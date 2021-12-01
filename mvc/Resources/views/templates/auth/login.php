<div class="main__login-registrierung">
        <div class="main__login-registrierung__cards">
            <h2>Login</h2>
            <form class="form" action="<?php echo BASE_URL; ?>/login/do" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" class="signin-bttn">Sign in</button>
            </form>
            <a class="forgot-pass" href="#">Forgot password?</a>
        </div>

        <div class="main__login-registrierung__cards">
            <h2>Don't have an account?</h2>
            <p>Register and join the Lunar Beauty Family!</p>
            <a class="register-link" href="<?php echo BASE_URL; ?>/sign-up">Create an account</a>
        </div>
    </div>