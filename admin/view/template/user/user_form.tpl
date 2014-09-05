<?php echo $header?>
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="container-fluid">
        <!-- Begin page heading -->
        <h1 class="page-heading"><?php echo $heading_title?></h1>
        <!-- End page heading -->

        <!-- Begin breadcrumb -->
        <ol class="breadcrumb default square rsaquo sm">
            <?php foreach ($breadcrumbs as $breadcrumb) { ?>
            <?php if ($breadcrumb['home']) { ?>
            <li><a href="<?php echo $breadcrumb['href']; ?>"><i class="fa fa-home"></i></a></li>
            <?php } else { ?>
            <li><?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
            <?php } ?>
            <?php } ?>
        </ol>
        <!-- End breadcrumb -->
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger alert-block fade in alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $error_warning; ?>
        </div>
        <?php } ?>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form" role="form">
            <div class="col-sm-6">
                <div class="the-box">
                    <div class="form-group">
                        <label><?php echo $entry_username; ?></label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                        <?php if ($error_username) { ?>
                        <small data-bv-validator="notEmpty" class="help-block field-error" style=""><?php echo $error_username; ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo $entry_firstname; ?></label>
                        <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                        <?php if ($error_firstname) { ?>
                        <small data-bv-validator="notEmpty" class="help-block field-error" style=""><?php echo $error_firstname; ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo $entry_lastname; ?></label>
                        <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                        <?php if ($error_lastname) { ?>
                        <small data-bv-validator="notEmpty" class="help-block field-error" style=""><?php echo $error_lastname; ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo $entry_email; ?></label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <label><?php echo $entry_user_group; ?></label>
                        <select name="user_group_id" class="form-control">
                            <?php foreach ($user_groups as $user_group) { ?>
                            <?php if ($user_group['user_group_id'] == $user_group_id) { ?>
                            <option value="<?php echo $user_group['user_group_id']; ?>" selected="selected"><?php echo $user_group['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $user_group['user_group_id']; ?>"><?php echo $user_group['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><?php echo $entry_password; ?></label>
                        <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                        <?php if ($error_password) { ?>
                        <small data-bv-validator="notEmpty" class="help-block field-error" style=""><?php echo $error_password; ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <label><?php echo $entry_confirm; ?></label>
                        <input type="password" class="form-control" name="confirm" value="<?php echo $confirm; ?>">
                        <?php if ($error_confirm) { ?>
                        <small data-bv-validator="notEmpty" class="help-block field-error" style=""><?php echo $error_confirm; ?></small>
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        
                        <div class="checkbox">
                        <label>
                            <?php if ($token) { ?>
                              <input type="checkbox" name="token" class="i-grey" value="1" checked>
                              <?php } else { ?>
                              <input type="checkbox" name="token" class="i-grey" value="1">
                              <?php } ?>
                              <?php echo $entry_token; ?>
                        </label>

                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label><?php echo $entry_status; ?></label>
                        <select name="status" class="form-control">
                            <?php if ($status) { ?>
                            <option value="0"><?php echo $text_disabled; ?></option>
                            <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                            <?php } else { ?>
                            <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                            <option value="1"><?php echo $text_enabled; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <a href="<?php echo $cancel; ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> <?php echo $button_cancel; ?></a>
                    <button type="button" onclick="$('#form').submit();" class="btn btn-success"><i class="fa fa-check"></i> <?php echo $button_save; ?></button>
                </div><!-- /.the-box -->
            </div>
        </form>
    </div><!-- /.container-fluid -->
    <?php echo $footer?>