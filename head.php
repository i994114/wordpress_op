<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title(); ?></title>
        <link rel="stylesheet" href="<?php get_stylesheet_uri(); ?>">
        <link rel="stylesheet" href="responsive.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>