<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
<header>
    <h1>Borny Store</h1>
    <nav>
        <?php wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_id' => 'main-menu',
            'container' => 'ul',
            'fallback_cb' => false,
        )); ?>
    </nav>
    <?php
if (function_exists('custom_breadcrumbs'))
    custom_breadcrumbs();
?>
</header>
