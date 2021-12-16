<form id="login" action="login" method="post">
    <div class="mb-3">
        <h2>Login</h2>
    </div>
    <div class="mb-3">
        <p class="status form-text"></p>
    </div>
    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
    <div class="mb-3">
        <label class="form-label" for="username">Username</label>
        <input  type="text" id="username" class="required form-control" name="username">
    </div>
    <div class="mb-3">

        <label class="form-label" for="password">Password</label>
        <input  type="password" id="password" class="required form-control" name="password">
    </div>

    <input class="btn btn-primary" type="submit" value="LOGIN">
    <p class="form-text">Need account? <a id="show_signup" href="">Create an Account</a></p>
    <!-- <a class="close" href="">Close</a> -->
</form>

<form action="register" id="register" method="post">
    <div class="mb-3">
        <h2>Signup</h2>
    </div>
    <p class="status form-text"></p>
    <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>
    <div class="mb-3">
        <label class="form-label" for="signonname">Username</label>
        <input type="text" name="signonname" id="signonname" class="required form-control">
    </div>
    <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input type="text" name="email" id="email" class="required form-control email">
    </div>
    <div class="mb-3">
        <label class="form-label" for="signonpassword">Password</label>
        <input type="password" name="signonpassword" id="signonpassword" class="required form-control">
    </div>
    <div class="mb-3">
        <label class="form-label" for="password2">Confirm Password</label>
        <input type="password" name="password2" id="password2" class="required form-control">
    </div>
    <input type="submit" value="SIGNUP" class="btn btn-primary">
    <!-- <a href="" class="close">Close</a> -->
    <p class="form-text">Already signed up? <a id="pop_login" class="show_login" href="">Login</a></p>
</form>