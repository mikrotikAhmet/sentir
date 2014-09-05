
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
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="reset">
        <div class="form-group has-feedback lg left-feedback no-label">
            <input type="password" class="form-control no-border input-lg rounded" name="password" value="<?php echo $password; ?>" placeholder="<?php echo $entry_password; ?>" autofocus>
            <span class="fa fa-lock form-control-feedback"></span>
            <?php if ($error_password) { ?>
              <h6 class="error"><?php echo $error_password; ?></h6>
              <?php } ?>
        </div>  
        <div class="form-group has-feedback lg left-feedback no-label">
            <input type="password" class="form-control no-border input-lg rounded" name="confirm" value="<?php echo $confirm; ?>" placeholder="<?php echo $entry_confirm; ?>" autofocus>
            <span class="fa fa-lock form-control-feedback"></span>
            <?php if ($error_confirm) { ?>
              <h6 class="error"><?php echo $error_confirm; ?></h6>
              <?php } ?>
        </div>  
        <div class="form-group">
            <button onclick="$('#reset').submit();" class="btn btn-warning btn-perspective"><?php echo $button_save; ?></button>
            <a href="<?php echo $cancel; ?>" class="btn btn-warning btn-perspective"><?php echo $button_cancel; ?></a>
        </div>
    </form>
</div><!-- /.login-wrapper -->
<!--
===========================================================
END PAGE
===========================================================
-->
<script type="text/javascript"><!--
$('#form input').keydown(function(e) {
	if (e.keyCode == 13) {
		$('#form').submit();
	}
});
//--></script> 
<?php echo $footer?>