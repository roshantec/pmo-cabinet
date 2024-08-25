<?php
function pmotheme_setup() {
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'pmotheme'),
        'mobile' => __('Mobile Menu', 'pmotheme'),
        'footer-menu-1' => __('Footer Useful Links', 'pmotheme'),
        'footer-menu-2' => __('Footer Ministries', 'pmotheme'),
    ));

    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'pmotheme_setup');

function pmotheme_customize_register($wp_customize) {

    $wp_customize->add_section('pmotheme_logo_section', array(
        'title'       => __('Logo', 'pmotheme'),
        'priority'    => 30,
    ));

    $wp_customize->add_setting('pmotheme_logo');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pmotheme_logo', array(
        'label'    => __('Upload Logo', 'pmotheme'),
        'section'  => 'pmotheme_logo_section',
        'settings' => 'pmotheme_logo',
    )));

    $wp_customize->add_section('pmotheme_contact_section', array(
        'title'       => __('Contact Information', 'pmotheme'),
        'priority'    => 40,
    ));

    $wp_customize->add_setting('pmotheme_phone_number', array(
        'default' => '+975 2 323845',
    ));

    $wp_customize->add_control('pmotheme_phone_number', array(
        'label'    => __('Phone Number', 'pmotheme'),
        'section'  => 'pmotheme_contact_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('pmotheme_email_address', array(
        'default' => get_option('admin_email'),
    ));

    $wp_customize->add_control('pmotheme_email_address', array(
        'label'    => __('Email Address', 'pmotheme'),
        'section'  => 'pmotheme_contact_section',
        'type'     => 'text',
    ));
}

add_action('customize_register', 'pmotheme_customize_register');


function pmotheme_enqueue_assets() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', false);

    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', false);

    wp_enqueue_style('tailwind', 'https://cdn.tailwindcss.com');

    wp_enqueue_style('pmotheme-style', get_template_directory_uri() . '/assets/css/style.css');

    wp_enqueue_script('pmotheme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), null, true);

    wp_enqueue_script('google-translate', 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit', array(), null, true);
}

add_action('wp_enqueue_scripts', 'pmotheme_enqueue_assets');



function pmotheme_slider_post_type() {
    register_post_type('slider', array(
        'labels' => array(
            'name' => __('Slides'),
            'singular_name' => __('Slide'),
            'add_new_item' => __('Add New Slide'),  // Change the add new label
            'edit_item' => __('Edit Slide'),
            'new_item' => __('New Slide'),
            'view_item' => __('View Slide'),
            'search_items' => __('Search Slides'),
            'not_found' => __('No slides found'),
            'not_found_in_trash' => __('No slides found in Trash'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail', 'editor'),
        'menu_icon' => 'dashicons-images-alt2',
    ));
}
add_action('init', 'pmotheme_slider_post_type');


add_theme_support('post-thumbnails');

