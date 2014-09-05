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
        <?php if ($success) { ?>
        <div class="alert alert-success alert-block fade in alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $success; ?>
      </div>
        <?php } ?>
        <!-- BEGIN DATA TABLE -->
        <div class="the-box no-border">

            <div class="btn-toolbar top-table" role="toolbar">
                <div class="btn-group">
                    <form role="form">
                         <select class="form-control" onchange="">
                            <?php foreach ($data_list_values as $data_list_value) { ?>
                            <option value="<?php echo $data_list_value?>"><?php echo $data_list_value?></option>
                            <?php } ?>
                        </select>
                    </form>
                </div>
                <div class="btn-group">
                    <a href="<?php echo $insert; ?>" class="btn btn-success"><i class="fa fa-plus"></i> <?php echo $button_insert; ?></a>
                </div>
                <div class="btn-group">
                    <a onclick="$('form').submit();" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo $button_delete; ?></a>
                </div>
            </div><!-- /.btn-toolbar top-table -->

            <div class="table-responsive">
                <form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
                <table class="table table-th-block table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="1" style="text-align: center;"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></th>
                            <th class="left"><?php if ($sort == 'name') { ?>
                                <a href="<?php echo $sort_name; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_name; ?></a>
                                <?php } else { ?>
                                <a href="<?php echo $sort_name; ?>"><?php echo $column_name; ?></a>
                                <?php } ?></th>
                            <th class="right"><?php echo $column_action; ?></th>
                    </thead>
                    <tbody>
                        <?php if ($user_groups) { ?>
                        <?php foreach ($user_groups as $user_group) { ?>
                        <tr>
                            <td style="text-align: center;"><?php if ($user_group['selected']) { ?>
                                <input type="checkbox" name="selected[]" value="<?php echo $user_group['user_group_id']; ?>" checked="checked" />
                                <?php } else { ?>
                                <input type="checkbox" name="selected[]" value="<?php echo $user_group['user_group_id']; ?>" />
                                <?php } ?></td>
                            <td class="left"><?php echo $user_group['name']; ?></td>
                            <td class="right"><?php foreach ($user_group['action'] as $action) { ?>
                                [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
                                <?php } ?></td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <tr>
                            <td class="center" colspan="3"><?php echo $text_no_results; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </form>
            </div><!-- /.table-responsive -->
            <div class="pagination"><?php echo $pagination; ?></div>
        </div><!-- /.the-box -->
        <!-- End example member table -->

        <!-- END DATA TABLE -->

    </div><!-- /.container-fluid -->
    <?php echo $footer?>