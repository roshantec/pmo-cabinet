<?php
/*
Template Name: Contact Us
*/

get_header();
?>

<!-- Contact Us Hero Section -->
<section class="bg-bhutan-red text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold mb-4"><?php echo get_theme_mod('contact_page_title', 'Contact Us'); ?></h1>
        <p class="text-xl"><?php echo get_theme_mod('contact_page_subtitle', 'Get in touch with the Prime Minister\'s Office of Bhutan'); ?></p>
    </div>
</section>

<!-- Contact Information and Map Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-6 text-bhutan-red">Contact Information</h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt text-bhutan-amber mt-1 mr-3"></i>
                        <span><?php echo get_theme_mod('contact_address', 'Gyalyong Tshokhang Langjophakha, Thimphu'); ?></span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone-alt text-bhutan-amber mt-1 mr-3"></i>
                        <div>
                            <p><?php echo get_theme_mod('contact_phone_1', '+975-2-337100 (PMO)'); ?></p>
                            <p><?php echo get_theme_mod('contact_phone_2', '+975-2-336667, +975-2-336065 (PABX Gyalyong Tshogkhang)'); ?></p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-envelope text-bhutan-amber mt-1 mr-3"></i>
                        <div>
                            <p><?php echo get_theme_mod('contact_email_1', 'pmo@cabinet.gov.bt'); ?></p>
                            <p><?php echo get_theme_mod('contact_email_2', 'info@cabinet.gov.bt'); ?></p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-clock text-bhutan-amber mt-1 mr-3"></i>
                        <span><?php echo get_theme_mod('contact_hours', '9:00 AM – 5:00 PM Monday – Friday'); ?></span>
                    </li>
                </ul>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-bold mb-6 text-bhutan-red">Location</h2>
                <iframe
                    src="<?php echo get_theme_mod('contact_map_url', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.812308315838!2d89.63651611505995!3d27.471612082893553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e1941a00697d83%3A0x61f23a7f5d6e62a!2sGyalyong%20Tshogkhang!5e0!3m2!1sen!2s!4v1650000000000!5m2!1sen!2s'); ?>"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 bg-gray-200">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center text-bhutan-red">Send Us a Message</h2>
        <form class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <input type="hidden" name="action" value="submit_contact_form">
            <?php wp_nonce_field('submit_contact_form', 'contact_form_nonce'); ?>
            <div class="mb-6">
                <label for="name" class="block mb-2 font-semibold text-gray-700">Full Name</label>
                <input type="text" id="name" name="name" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-bhutan-amber">
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 font-semibold text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-bhutan-amber">
            </div>
            <div class="mb-6">
                <label for="subject" class="block mb-2 font-semibold text-gray-700">Subject</label>
                <input type="text" id="subject" name="subject" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-bhutan-amber">
            </div>
            <div class="mb-6">
                <label for="message" class="block mb-2 font-semibold text-gray-700">Message</label>
                <textarea id="message" name="message" rows="5" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-bhutan-amber"></textarea>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="bg-bhutan-amber text-white px-6 py-3 rounded-md hover:bg-bhutan-red transition duration-300">
                    Send Message
                </button>
            </div>
        </form>
    </div>
</section>

<?php get_footer(); ?>