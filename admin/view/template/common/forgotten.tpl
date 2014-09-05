
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
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="forgotten">
        <div class="form-group has-feedback lg left-feedback no-label">
            <input type="text" class="form-control no-border input-lg rounded" name="email" value="" placeholder="<?php echo $entry_email; ?>" autofocus>
            <span class="fa fa-envelope form-control-feedback"></span>
        </div>       
        <div class="form-group">
            <button onclick="$('#forgotten').submit();" class="btn btn-warning btn-perspective"><?php echo $button_reset; ?></button>
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