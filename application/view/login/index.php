<div class="container">

    <?php $this->renderFeedbackMessages(); ?>

    <div class="login-default-box">
        <h1>Login</h1>
        <form action="<?php echo URL; ?>login/login" method="post">
                <label>Username (or email)</label>
                <input type="text" name="user_name"  />
                <label>Password</label>
                <input type="password" name="user_password"  />
                <input type="checkbox" name="user_rememberme" class="remember-me-checkbox" />
                <label class="remember-me-label">Keep me logged in (for 2 weeks)</label>
                <input type="submit" class="login-submit-button" />
        </form>
        <a href="<?php echo URL; ?>login/register">Register</a>
        |
        <a href="<?php echo URL; ?>login/requestpasswordreset">Forgot my Password</a>
    </div>

   

</div>