<?php echo $header?>
<!--
===========================================================
BEGIN PAGE
===========================================================
-->
<div class="login-header text-center">
    <img src="view/assets/img/logo-login.png" class="logo" alt="Logo">
</div>
<div class="login-wrapper">
    <div class="alert alert-warning alert-bold-border fade in alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Warning!</strong> Better check yourself, you're <a href="#fakelink" class="alert-link">not looking too good</a>.
    </div>
    <form role="form" action="http://diliat.in/themeforest/sentir/1.2/index.html">
        <div class="form-group has-feedback lg left-feedback no-label">
            <input type="text" class="form-control no-border input-lg rounded" placeholder="Enter username" autofocus>
            <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback lg left-feedback no-label">
            <input type="password" class="form-control no-border input-lg rounded" placeholder="Enter password">
            <span class="fa fa-unlock-alt form-control-feedback"></span>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="i-yellow-flat"> Remember me
                </label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-warning btn-lg btn-perspective btn-block">LOGIN</button>
        </div>
    </form>
    <p class="text-center"><strong><a href="forgot-password.html">Forgot your password?</a></strong></p>
    <p class="text-center">or</p>
    <p class="text-center"><strong><a href="register.html">Create new account</a></strong></p>
</div><!-- /.login-wrapper -->
<!--
===========================================================
END PAGE
===========================================================
-->
<?php echo $footer?>