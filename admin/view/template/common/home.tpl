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
        <div class="alert alert-success alert-block square fade in alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <p><strong>Welcome!</strong></p>
            <p>You probably here cause wanna know how is <a class="alert-link" href="#fakelink">Sentir UI kits template</a>, or you have purchased it. But whatever! I just wanna 
                say thank you for viewing or purchasing my work.
                This is the new dashboard page, hope it more usable for your awesome projects. 
                And let me know your feedback! <i class="fa fa-smile-o"></i></p>
        </div>
        <p>Begin your content here</p>
    </div><!-- /.container-fluid -->
    <?php echo $footer?>