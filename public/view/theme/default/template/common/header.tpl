<!DOCTYPE html>
<html dir="<?php echo $direction; ?>" lang="<?php echo $lang; ?>">
    <head>
        <meta charset="UTF-8" />
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="<?php echo $base; ?>" />
        <?php if ($description) { ?>
        <meta name="description" content="<?php echo $description; ?>" />
        <?php } ?>
        <?php if ($keywords) { ?>
        <meta name="keywords" content="<?php echo $keywords; ?>" />
        <?php } ?>
        <?php if ($icon) { ?>
        <link href="<?php echo $icon; ?>" rel="icon" />
        <?php } ?>
        <?php foreach ($links as $link) { ?>
        <link href="<?php echo $link['href']; ?>" rel="<?php echo $link['rel']; ?>" />
        <?php } ?>
        <!-- CSS -->
        <link rel="stylesheet" media="screen" href="public/view/theme/semitepayment/css/public.css">
        <link href="public/view/theme/semitepayment/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="public/view/theme/semitepayment/css/main.css">
        <!-- Fonts -->
        <link href='//fonts.googleapis.com/css?family=Ubuntu+Mono:700|Ubuntu:300,400,400italic,500' rel='stylesheet' type='text/css'>
        <?php foreach ($styles as $style) { ?>
        <link rel="<?php echo $style['rel']; ?>" type="text/css" href="<?php echo $style['href']; ?>" media="<?php echo $style['media']; ?>" />
        <?php } ?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php echo $google_analytics; ?>
    </head>
    <body>
        
        