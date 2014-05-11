<?php $this->conf->inc("header"); ?>
    <h1 class="page-header">Login</h1>

    <div class="panel-body col-sm-5">
        <form class="form-signin" role="form">
            <h2 class="form-signin-heading">Reset password</h2>

            <input type="email" class="form-control" placeholder="Email address" required autofocus>

            <div class="spacer"></div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>

            <div class="spacer"></div>

            <a href="<?php echo site_url("login/login"); ?>">Login</a>
            |
            <a href="<?php echo site_url("login/register"); ?>">Register</a>


        </form>


    </div>
<?php $this->conf->inc("footer"); ?>