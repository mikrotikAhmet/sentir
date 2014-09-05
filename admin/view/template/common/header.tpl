<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <base href="<?php echo $base; ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
        <?php if ($description) { ?>
        <meta name="description" content="<?php echo $description; ?>" />
        <?php } ?>
        <?php if ($keywords) { ?>
        <meta name="keywords" content="<?php echo $keywords; ?>" />
        <?php } ?>
        <?php foreach ($links as $link) { ?>
        <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
        <?php } ?>
        <meta name="author" content="Ahmet GOUDENOGLU">

        <!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
        <link href="view/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- PLUGINS CSS -->
        <?php foreach ($styles as $style) { ?>
        <link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
        <?php } ?>

        <!-- MAIN CSS (REQUIRED ALL PAGE)-->
        <link href="view/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="view/assets/css/style.css" rel="stylesheet">
        <link href="view/assets/css/style-responsive.css" rel="stylesheet">
        <link href="view/assets/css/main.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php if ($this->user->isLogged() && isset($permission) && $permission && $this->response->isPageExist()) { ?>
    <body class="tooltips">
        <?php } else { ?>
    <body class="login tooltips">
        <?php } ?>
        <?php if ($this->user->isLogged() && isset($permission) && $permission && $this->response->isPageExist()) { ?>
        <!--
                ===========================================================
                BEGIN PAGE
                ===========================================================
        -->
        <div class="wrapper">
            <!-- BEGIN TOP NAV -->
            <div class="top-navbar dark-color">
                <div class="top-navbar-inner">

                    <!-- Begin Logo brand -->
                    <div class="logo-brand">
                        <a href="index.html"><img src="view/assets/img/egaming.png" alt="Sentir logo"></a>
                    </div><!-- /.logo-brand -->
                    <!-- End Logo brand -->

                    <div class="top-nav-content">

                        <!-- Begin button sidebar left toggle -->
                        <div class="btn-collapse-sidebar-left">
                            <i class="fa fa-bars"></i>
                        </div><!-- /.btn-collapse-sidebar-left -->
                        <!-- End button sidebar left toggle -->
                        <!-- End button nav toggle -->

                        <!-- Begin user session nav -->
                        <ul class="nav-user navbar-right">
                            <li class="dropdown">
                                <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo $this->user->getAvatar()?>" class="avatar img-circle" alt="Avatar">
                                    <strong><?php echo $this->user->getFullName()?></strong>
                                </a>
                                <ul class="dropdown-menu square primary margin-list-rounded with-triangle">
                                    <li><a href="<?php echo $account_setting?>"><?php echo $text_account_setting?></a></li>
                                    <li><a href="<?php echo $payment_setting?>"><?php echo $text_payment_setting?></a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo $lock_screen?>"><?php echo $text_lock_screen?></a></li>
                                    <li><a href="<?php echo $logout?>"><?php echo $text_logout?></a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- End user session nav -->

                        <!-- Begin Collapse menu nav -->
                        <div class="collapse navbar-collapse" id="main-fixed-nav">
                            <ul class="nav navbar-nav navbar-left">
                                <!-- Begin nav notification -->
                                <li class="dropdown">
                                    <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell"></i>
                                    </a>
                                    <ul class="dropdown-menu square with-triangle">
                                        <li>
                                            <div class="nav-dropdown-heading">
                                                <?php echo $text_notification?>
                                            </div><!-- /.nav-dropdown-heading -->
                                            <div class="nav-dropdown-content scroll-nav-dropdown">
                                                <ul>

                                                </ul>
                                            </div><!-- /.nav-dropdown-content scroll-nav-dropdown -->
                                            <button class="btn btn-primary btn-square btn-block"><?php echo $text_see_all_notification?></button>
                                        </li>
                                    </ul>
                                </li>
                                <!-- End nav notification -->
                                <!-- Begin nav task -->
                                <li class="dropdown">
                                    <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-tasks"></i>
                                    </a>
                                    <ul class="dropdown-menu square margin-list-rounded with-triangle">
                                        <li>
                                            <div class="nav-dropdown-heading">
                                                <?php echo $text_task?>
                                            </div><!-- /.nav-dropdown-heading -->
                                            <div class="nav-dropdown-content scroll-nav-dropdown">
                                                <ul>

                                                </ul>
                                            </div><!-- /.nav-dropdown-content scroll-nav-dropdown -->
                                            <button class="btn btn-primary btn-square btn-block"><?php echo $text_see_all_task?></button>
                                        </li>
                                    </ul>
                                </li>
                                <!-- End nav task -->
                                <!-- Begin nav message -->
                                <li class="dropdown">
                                    <a href="#fakelink" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                    <ul class="dropdown-menu square margin-list-rounded with-triangle">
                                        <li>
                                            <div class="nav-dropdown-heading">
                                                <?php echo $text_message?>
                                            </div><!-- /.nav-dropdown-heading -->
                                            <div class="nav-dropdown-content scroll-nav-dropdown">
                                                <ul>

                                                </ul>
                                            </div><!-- /.nav-dropdown-content scroll-nav-dropdown -->
                                            <button class="btn btn-primary btn-square btn-block"><?php echo $text_see_all_message?></button>
                                        </li>
                                    </ul>
                                </li>
                                <!-- End nav message -->
                            </ul>
                        </div><!-- /.navbar-collapse -->
                        <!-- End Collapse menu nav -->
                    </div><!-- /.top-nav-content -->
                </div><!-- /.top-navbar-inner -->
            </div><!-- /.top-navbar -->
            <!-- END TOP NAV -->



            <!-- BEGIN SIDEBAR LEFT -->
            <div class="sidebar-left sidebar-nicescroller">
                <ul class="sidebar-menu">
                    <li id='dashboard'>
                        <a href="<?php echo $dashboard?>">
                            <i class="fa fa-dashboard icon-sidebar"></i>
                            <?php echo $text_dashboard?>
                        </a>
                    </li>
                    <li id="player">
                        <a href="javascript::void()">
                            <i class="fa fa-users icon-sidebar"></i>
                            <i class="fa fa-angle-right chevron-icon-sidebar"></i>
                            <?php echo $text_player?>
                        </a>
                        <ul class="submenu">
                            <li id="player"><a href="<?php echo $player?>"><?php echo $text_player?></a></li>
                        </ul>
                    </li>
                    <li id="user">
                        <a href="javascript::void()">
                            <i class="fa fa-leaf icon-sidebar"></i>
                            <i class="fa fa-angle-right chevron-icon-sidebar"></i>
                            <?php echo $text_user?>
                        </a>
                        <ul class="submenu">
                            <li id="user"><a href="<?php echo $user?>"><?php echo $text_users?></a></li>
                            <li id="user_group"><a href="<?php echo $user_group?>"><?php echo $text_user_group?></a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.sidebar-left -->
            <!-- END SIDEBAR LEFT -->
            <?php } ?>