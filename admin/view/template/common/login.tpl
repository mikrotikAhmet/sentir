
<?php echo $header?>
<!--
===========================================================
BEGIN PAGE
===========================================================
-->
<div class="login-header text-center">
    <img src="view/assets/img/egaming.png" class="logo" alt="Logo">
</div>
<div class="login-wrapper">
    <?php if ($error_warning) { ?>
    <div class="alert alert-warning alert-bold-border fade in alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $error_warning?>
    </div>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <div class="form-group has-feedback lg left-feedback no-label">
            <input type="text" class="form-control no-border input-lg rounded" name="username" value="<?php echo $username; ?>" placeholder="<?php echo $entry_username?>" autofocus>
            <span class="fa fa-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback lg left-feedback no-label">
            <input type="password" class="form-control no-border input-lg rounded" name="password" value="<?php echo $password; ?>" placeholder="<?php echo $entry_password?>">
            <span class="fa fa-unlock-alt form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback lg left-feedback no-label">
            <input type="password" class="form-control no-border input-lg rounded" name="twofactor" value="" placeholder="<?php echo $entry_two_factor?>">
            <span class="fa fa-shield form-control-feedback"></span>
            <h6><?php echo $text_two_factor?></h6>
        </div>
        
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" class="i-yellow-flat" name="remember"> <?php echo $text_remember?>
                </label>
            </div>
        </div>
        <div class="form-group">
            <button onclick="$('#form').submit();" class="btn btn-warning btn-success btn-perspective btn-block"><?php echo $button_login; ?></button>
        </div>
        <?php if ($redirect) { ?>
        <input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
        <?php } ?>
    </form>
    <p class="text-center"><strong><a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten?></a></strong></p>
</div><!-- /.login-wrapper -->
<!--
===========================================================
END PAGE
===========================================================
-->
<?php echo $footer?>