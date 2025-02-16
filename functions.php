<?php
function borny_theme_setup() {
    add_theme_support('title-tag');
    register_nav_menus(array(
        'primary' => __('Hlavní menu', 'borny-store')
    ));
}
add_action('after_setup_theme', 'borny_theme_setup');

function borny_register_menus() {
    register_nav_menus(array(
        'primary' => __('Hlavní menu', 'borny-store')
    ));
}
add_action('init', 'borny_register_menus');

function borny_add_menu_items() {
    if (wp_get_nav_menu_object('Hlavní menu')) return;
    
    $menu_id = wp_create_nav_menu('Hlavní menu');
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' => __('Domů', 'borny-store'),
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish'
    ));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' => __('O Nás', 'borny-store'),
        'menu-item-url' => home_url('/o-nas'),
        'menu-item-status' => 'publish'
    ));
    wp_update_nav_menu_item($menu_id, 0, array(
        'menu-item-title' => __('Produkty', 'borny-store'),
        'menu-item-url' => home_url('/produkty'),
        'menu-item-status' => 'publish'
    ));
}
add_action('after_setup_theme', 'borny_add_menu_items');

function custom_breadcrumbs() {
//Settings
$seperator = '>';
// Separator between crumbs
$home = 'Home';
//Text for the "Home" link.
$before = '<span class="current">'
    //Tag before the current crumb
    $after = '</span>';
// Tag after the current crumb

if (!is_front_page()){
echo '<nav class="breadcrumbs">;
    echo '<a href=" ' .home_url() . '">' . $home . '</a> . $separator;

    if (is_category() || is_single()) {
    the_category(' ');
    if (is_single()) {
    echo $separator . $before . get_the_title(). $after;
    }
    } elseif (is_page()) {
    echo $before . get_the_title() . $after;
    } elseif (is_home()) {
    echo $before. 'Blog' . $after;
    }

    echo '</nav>';
}
}
?>
