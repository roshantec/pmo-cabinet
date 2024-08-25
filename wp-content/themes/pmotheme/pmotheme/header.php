<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <?php wp_head(); ?>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bhutan-amber': '#FF8C00',
                        'bhutan-red': '#D2691E',
                        'bhutan-gold': '#FFD700',
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>

<body <?php body_class('bg-gray-100'); ?>>
    <!-- Top Bar -->
    <div class="bg-bhutan-amber text-white py-2">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <div class="hidden sm:flex items-center space-x-4">
                <span><i class="fas fa-envelope mr-2"></i><?php echo esc_html(get_theme_mod('pmotheme_email_address', get_option('admin_email'))); ?></span>
                <span><i class="fas fa-phone mr-2"></i><?php echo esc_html(get_theme_mod('pmotheme_phone_number', '+975 2 323845')); ?></span>
            </div>
            <div class="flex items-center space-x-4">
                <div id="google_translate_element"></div>
                <div class="flex items-center space-x-2">
                    <button onclick="changeTextSize('decrease')" class="text-sm bg-white text-bhutan-amber px-2 py-1 rounded-full hover:bg-bhutan-red hover:text-white transition duration-300" aria-label="Decrease text size">A-</button>
                    <button onclick="changeTextSize('reset')" class="text-sm bg-white text-bhutan-amber px-2 py-1 rounded-full hover:bg-bhutan-red hover:text-white transition duration-300" aria-label="Reset text size">A</button>
                    <button onclick="changeTextSize('increase')" class="text-sm bg-white text-bhutan-amber px-2 py-1 rounded-full hover:bg-bhutan-red hover:text-white transition duration-300" aria-label="Increase text size">A+</button>
                </div>
                <a href="<?php echo wp_login_url(); ?>" class="bg-white text-bhutan-amber px-3 py-1 rounded-full text-sm hover:bg-bhutan-red hover:text-white transition duration-300" aria-label="Login to admin panel">
                    <i class="fas fa-user mr-1"></i>Login
                </a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <?php if (get_theme_mod('pmotheme_logo')) : ?>
                        <img src="<?php echo esc_url(get_theme_mod('pmotheme_logo')); ?>" alt="Logo" class="h-12 md:h-16">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/rgob.png" alt="RGOB Logo" class="h-12 md:h-16">
                    <?php endif; ?>
                </div>
                <nav class="hidden md:block">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'flex space-x-6',
                        'container' => false,
                    ));
                    ?>
                </nav>
                <div class="flex items-center space-x-4">
                    <button id="searchToggle" class="text-gray-700 hover:text-bhutan-red transition duration-300" aria-label="Toggle search">
                        <i class="fas fa-search"></i>
                    </button>
                    <button id="menuToggle" class="md:hidden text-gray-700 hover:text-bhutan-red transition duration-300" aria-label="Toggle menu">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>