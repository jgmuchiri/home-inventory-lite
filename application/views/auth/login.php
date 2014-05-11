<?php $this->conf->inc("header"); ?>
    <h1 class="page-header">Login</h1>

    <div class="panel-body col-sm-5">
        <form class="form-signin" role="form">
            <h2 class="form-signin-heading">Please sign in</h2>

            <input type="email" class="form-control" placeholder="Email address" required autofocus>

            <input type="password" class="form-control" placeholder="Password" required>

            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <div class="spacer"></div>



            <a href="<?php echo site_url("login/register"); ?>">Register</a>
            |
            <a href="<?php echo site_url("login/password"); ?>">Reset password</a>

        </form>


    </div>
<?php $this->conf->inc("footer"); ?>