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
            <div class="col-sm-12">
                <div class="the-box">
                    <div class="form-group">
                        <label><?php echo $entry_name; ?></label>
                        <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        <?php if ($error_name) { ?>
                        <small data-bv-validator="notEmpty" class="help-block field-error" style=""><?php echo $error_name; ?></small>
                        <?php } ?>
                    </div>

                </div><!-- /.the-box -->
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="right-content">
                            <button type="button" class="btn btn-default btn-sm btn-rounded-lg to-collapse" data-toggle="collapse" data-target="#access"><i class="fa fa-chevron-up"></i></button>
                        </div>
                        <h3 class="panel-title"><?php echo $entry_access; ?></h3>
                    </div>
                    <div id="access" class="collapse in">
                        <div class="panel-body">
                            <table class="table table-hover">
                                <?php foreach ($permissions as $permission) { ?>
                                <tr>
                                    <td>
                                        <?php if (in_array($permission, $access)) { ?>
                                        <input type="checkbox" name="permission[access][]" value="<?php echo $permission; ?>" checked="checked" />
                                        <?php echo $permission; ?>
                                        <?php } else { ?>
                                        <input type="checkbox" name="permission[access][]" value="<?php echo $permission; ?>" />
                                        <?php echo $permission; ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.panel-body -->
                        <div class="panel-footer"><a onclick="$(this).parent().parent().find(':checkbox').attr('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$(this).parent().parent().find(':checkbox').attr('checked', false);"><?php echo $text_unselect_all; ?></a></div>
                    </div><!-- /.collapse in -->
                </div><!-- /.panel panel-default -->
            </div>
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="right-content">
                            <button type="button" class="btn btn-default btn-sm btn-rounded-lg to-collapse" data-toggle="collapse" data-target="#modify"><i class="fa fa-chevron-up"></i></button>
                        </div>
                        <h3 class="panel-title"><?php echo $entry_modify; ?></h3>
                    </div>
                    <div id="modify" class="collapse in">
                        <div class="panel-body">
                            <table class="table table-hover">
                                <?php foreach ($permissions as $permission) { ?>
                                <tr>
                                    <td>
                                        <?php if (in_array($permission, $modify)) { ?>
                                        <input type="checkbox" name="permission[modify][]" value="<?php echo $permission; ?>" checked="checked" />
                                        <?php echo $permission; ?>
                                        <?php } else { ?>
                                        <input type="checkbox" name="permission[modify][]" value="<?php echo $permission; ?>" />
                                        <?php echo $permission; ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div><!-- /.panel-body -->
                        <div class="panel-footer"><a onclick="$(this).parent().parent().find(':checkbox').attr('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$(this).parent().parent().find(':checkbox').attr('checked', false);"><?php echo $text_unselect_all; ?></a></div>
                    </div><!-- /.collapse in -->
                </div><!-- /.panel panel-default -->
            </div>
            <div class="col-sm-12">
                <div class="the-box">
                    <div class="alert alert-info alert-bold-border square fade in alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $text_assign?>
                    </div>
                    <div class="form-group">
                        <label><?php echo $entry_application?></label>
                        <div class="input-group">
                            <select name="application_id" class="form-control"></select>
                            <span class="input-group-btn">
                                <span class="btn btn-primary btn-file">
                                    <i class="fa fa-link" onclick="assignApplication($('select[name=\'application_id\']').val())"> <?php echo $button_assign?></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <table class="table table-hover table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Application</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Vevo Gaming</td>
                                <td class=""><button class="btn btn-danger pull-right"><i class="fa fa-minus-circle"></i> <?php echo $button_remove?></button></td>
                            </tr>
                            <tr>
                                <td>Arabian Gaming</td>
                                <td class=""><button class="btn btn-danger pull-right"><i class="fa fa-minus-circle"></i> <?php echo $button_remove?></button></td>
                            </tr>
                            <tr>
                                <td>Imajbet Gaming</td>
                                <td class=""><button class="btn btn-danger pull-right"><i class="fa fa-minus-circle"></i> <?php echo $button_remove?></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="<?php echo $cancel; ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> <?php echo $button_cancel; ?></a>
                    <button type="button" onclick="$('#form').submit();" class="btn btn-success"><i class="fa fa-check"></i> <?php echo $button_save; ?></button>
                </div><!-- /.the-box -->
            </div>
        </form>
    </div><!-- /.container-fluid -->
    <script>

        function assignApplication(application_id) {
            alert(application_id);
        }

    </script>
    <?php echo $footer?>