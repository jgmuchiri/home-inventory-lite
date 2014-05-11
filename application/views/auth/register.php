<?php $this->conf->inc("header"); ?>
    <h1 class="page-header">Login</h1>

    <div class="panel-body col-sm-5">
        <form class="form-signin" role="form">
            <h2 class="form-signin-heading">Account registration</h2>

            <input type="email" class="form-control" placeholder="Email address" required autofocus>

            <input type="password" class="form-control" placeholder="Password" required>

            <input type="password" class="form-control" placeholder="Re-enter password" required>


            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

            <div class="spacer"></div>

            <a href="<?php echo site_url("login/login"); ?>">Login</a>
            |
            <a href="<?php echo site_url("login/password"); ?>">Reset password</a>

        </form>


    </div>
<?php $this->conf->inc("footer"); ?>