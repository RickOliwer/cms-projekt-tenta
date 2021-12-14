<form id="login" action="login" method="post">
    <h3>Need account? <a id="pop_signup" href="">Create an Account</a></h3>
    <h2>Login</h2>
    <p class="status"></p>
    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
    <label for="username">Username</label>
    <input type="text" id="username" class="required" name="username">
    <label for="password">Password</label>
    <input type="password" id="password" class="required" name="password">

    <input type="submit" value="LOGIN">

    <a class="close" href="">Close</a>
</form>

<form action="register" id="register" method="post">
    <h3>Already signed up? <a id="pop_login" href="">Login</a></h3>
    <h2>Signup</h2>

    <p class="status"></p>
    <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
    <label for="signonname">Username</label>
    <input type="text" name="signonname" id="signonname" class="required">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" class="required email">
    <label for="signonpassword">Password</label>
    <input type="password" name="signonpassword" id="signonpassword" class="required">
    <label for="password2">Confirm Password</label>
    <input type="password" name="password2" id="password2" class="required">
    <input type="submit" value="SIGNUP">
    <a href="" class="close">Close</a>
</form>