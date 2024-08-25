<!-- Footer -->
<footer class="bg-bhutan-red text-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="flex flex-col items-center md:items-start">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/rgob.png" alt="Office Logo" class="h-20 mb-6">
                <h2 class="text-xl font-semibold mb-2"><?php bloginfo('name'); ?></h2>
                <p class="text-bhutan-amber">Gyalyong Tshokhang</p>
                <p>Thimphu, Bhutan</p>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-6 pb-2 border-b-2 border-bhutan-amber inline-block">Useful Links</h3>
                <ul class="space-y-3">
                    <?php
                    // Dynamic menu for Useful Links
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-1',
                        'container' => false,
                        'items_wrap' => '%3$s',
                        'link_before' => '<i class="fas fa-chevron-right mr-2 text-bhutan-amber"></i>',
                        'link_after' => '',
                    ));
                    ?>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-6 pb-2 border-b-2 border-bhutan-amber inline-block">Ministries</h3>
                <ul class="space-y-3">
                    <?php
                    // Dynamic menu for Ministries
                    wp_nav_menu(array(
                        'theme_location' => 'footer-menu-2',
                        'container' => false,
                        'items_wrap' => '%3$s',
                        'link_before' => '<i class="fas fa-building mr-2 text-bhutan-amber"></i>',
                        'link_after' => '',
                    ));
                    ?>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-6 pb-2 border-b-2 border-bhutan-amber inline-block">Connect With Us</h3>
                <p class="flex items-center mb-3"><i class="fas fa-envelope mr-3 text-bhutan-amber"></i><?php echo get_option('admin_email'); ?></p>
                <p class="flex items-center mb-6"><i class="fas fa-phone-alt mr-3 text-bhutan-amber"></i>+975 2 323845</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-bhutan-amber transition duration-300"><i class="fab fa-facebook-f text-2xl"></i></a>
                    <a href="#" class="text-white hover:text-bhutan-amber transition duration-300"><i class="fab fa-twitter text-2xl"></i></a>
                    <a href="#" class="text-white hover:text-bhutan-amber transition duration-300"><i class="fab fa-instagram text-2xl"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright -->
<div class="bg-bhutan-amber text-white py-4">
    <div class="container mx-auto px-4 text-center">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
    </div>
</div>

<!-- Scripts -->
<script type="text/javascript"
    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<?php wp_footer(); ?>
</body>

</html>