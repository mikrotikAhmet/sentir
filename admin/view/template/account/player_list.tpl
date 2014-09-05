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
                    <a onclick="$('form').attr('action', '<?php echo $approve; ?>'); $('form').submit();" class="btn btn-info"><i class="fa fa-check-square-o"></i> <?php echo $button_approve; ?></a>
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
                                <th class="left"><?php if ($sort == 'c.email') { ?>
                                    <a href="<?php echo $sort_email; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_email; ?></a>
                                    <?php } else { ?>
                                    <a href="<?php echo $sort_email; ?>"><?php echo $column_email; ?></a>
                                    <?php } ?></th>
                                <th class="left"><?php if ($sort == 'c.status') { ?>
                                    <a href="<?php echo $sort_status; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_status; ?></a>
                                    <?php } else { ?>
                                    <a href="<?php echo $sort_status; ?>"><?php echo $column_status; ?></a>
                                    <?php } ?></th>
                                <th class="left"><?php if ($sort == 'c.approved') { ?>
                                    <a href="<?php echo $sort_approved; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_approved; ?></a>
                                    <?php } else { ?>
                                    <a href="<?php echo $sort_approved; ?>"><?php echo $column_approved; ?></a>
                                    <?php } ?></th>
                                <th class="left"><?php if ($sort == 'c.ip') { ?>
                                    <a href="<?php echo $sort_ip; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_ip; ?></a>
                                    <?php } else { ?>
                                    <a href="<?php echo $sort_ip; ?>"><?php echo $column_ip; ?></a>
                                    <?php } ?></th>
                                <th class="left"><?php if ($sort == 'c.date_added') { ?>
                                    <a href="<?php echo $sort_date_added; ?>" class="<?php echo strtolower($order); ?>"><?php echo $column_date_added; ?></a>
                                    <?php } else { ?>
                                    <a href="<?php echo $sort_date_added; ?>"><?php echo $column_date_added; ?></a>
                                    <?php } ?></th>
                                <th class="right"><?php echo $column_action; ?></th>
                            <tr class="filter">
                                <th></th>
                                <th><input type="text" class="form-control" name="filter_name" value="<?php echo $filter_name; ?>" /></th>
                                <th><input type="email" class="form-control" name="filter_email" value="<?php echo $filter_email; ?>" /></th>
                                <th><select name="filter_status" class="form-control">
                                        <option value="*"></option>
                                        <?php if ($filter_status) { ?>
                                        <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_enabled; ?></option>
                                        <?php } ?>
                                        <?php if (!is_null($filter_status) && !$filter_status) { ?>
                                        <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                        <?php } else { ?>
                                        <option value="0"><?php echo $text_disabled; ?></option>
                                        <?php } ?>
                                    </select></th>
                                <th><select name="filter_approved"  class="form-control">
                                        <option value="*"></option>
                                        <?php if ($filter_approved) { ?>
                                        <option value="1" selected="selected"><?php echo $text_yes; ?></option>
                                        <?php } else { ?>
                                        <option value="1"><?php echo $text_yes; ?></option>
                                        <?php } ?>
                                        <?php if (!is_null($filter_approved) && !$filter_approved) { ?>
                                        <option value="0" selected="selected"><?php echo $text_no; ?></option>
                                        <?php } else { ?>
                                        <option value="0"><?php echo $text_no; ?></option>
                                        <?php } ?>
                                    </select></th>
                                <th><input type="text"  class="form-control" name="filter_ip" value="<?php echo $filter_ip; ?>" /></th>
                                <th><input type="text"  class="form-control datepicker" name="filter_date_added" value="<?php echo $filter_date_added; ?>" size="12" id="" data-date-format="yyyy-mm-dd"/></th>
                                <th align=""><a onclick="filter();" class="btn btn-success"><?php echo $button_filter; ?></a></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if ($players) { ?>
                            <?php foreach ($players as $player) { ?>
                            <tr>
                                <td style="text-align: center;"><?php if ($player['selected']) { ?>
                                    <input type="checkbox" name="selected[]" value="<?php echo $player['player_id']; ?>" checked="checked" />
                                    <?php } else { ?>
                                    <input type="checkbox" name="selected[]" value="<?php echo $player['player_id']; ?>" />
                                    <?php } ?></td>
                                <td class="left"><?php echo $player['name']; ?></td>
                                <td class="left"><?php echo $player['email']; ?></td>
                                <td class="left"><?php echo $player['status']; ?></td>
                                <td class="left"><?php echo $player['approved']; ?></td>
                                <td class="left"><?php echo $player['ip']; ?></td>
                                <td class="left"><?php echo $player['date_added']; ?></td>
                                <td class="right"><?php foreach ($player['action'] as $action) { ?>
                                    [ <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a> ]
                                    <?php } ?></td>
                            </tr>
                            <?php } ?>
                            <?php } else { ?>
                            <tr>
                                <td class="center" colspan="8"><?php echo $text_no_results; ?></td>
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
    <script type="text/javascript"><!--
function filter() {
            url = 'index.php?route=account/player&token=<?php echo $token; ?>';

            var filter_name = $('input[name=\'filter_name\']').val();

            if (filter_name) {
                url += '&filter_name=' + encodeURIComponent(filter_name);
            }

            var filter_email = $('input[name=\'filter_email\']').val();

            if (filter_email) {
                url += '&filter_email=' + encodeURIComponent(filter_email);
            }

            var filter_status = $('select[name=\'filter_status\']').val();

            if (filter_status != '*') {
                url += '&filter_status=' + encodeURIComponent(filter_status);
            }

            var filter_approved = $('select[name=\'filter_approved\']').val();

            if (filter_approved != '*') {
                url += '&filter_approved=' + encodeURIComponent(filter_approved);
            }

            var filter_ip = $('input[name=\'filter_ip\']').val();

            if (filter_ip) {
                url += '&filter_ip=' + encodeURIComponent(filter_ip);
            }

            var filter_date_added = $('input[name=\'filter_date_added\']').val();

            if (filter_date_added) {
                url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
            }

            location = url;
        }
//--></script>
    <?php echo $footer?>