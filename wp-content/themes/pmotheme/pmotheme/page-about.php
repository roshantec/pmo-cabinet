<?php
/*
Template Name: About Us Page
*/
get_header();
?>

<!-- About Us Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center text-bhutan-red">About the Prime Minister's Office</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <!-- Static Image -->
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pmo-office.jpg" alt="Prime Minister's Office" class="rounded-lg shadow-md">
            </div>

            <!-- Dynamic Mission Statement -->
            <div>
                <h3 class="text-2xl font-semibold mb-4 text-bhutan-amber">Our Mission</h3>
                <p class="text-gray-700 mb-6">
                    The Prime Minister's Office of Bhutan is dedicated to serving the people of Bhutan by implementing policies that promote Gross National Happiness, sustainable development, and good governance. We aim to lead by example and inspire others to contribute positively to society.
                </p>
                <h3 class="text-2xl font-semibold mb-4 text-bhutan-amber">Our Vision</h3>
                <p class="text-gray-700">
                    We envision a harmonious, sustainable, and prosperous Bhutan where every citizen can thrive and contribute to the nation's well-being.
                </p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8 mb-16">
            <h3 class="text-2xl font-semibold mb-6 text-bhutan-amber">Key Responsibilities</h3>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-bhutan-red mt-1 mr-3"></i>
                    <span>Coordinate and implement national policies</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-bhutan-red mt-1 mr-3"></i>
                    <span>Ensure effective governance across all sectors</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-bhutan-red mt-1 mr-3"></i>
                    <span>Foster international relations and diplomacy</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-bhutan-red mt-1 mr-3"></i>
                    <span>Promote sustainable economic development</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-bhutan-red mt-1 mr-3"></i>
                    <span>Preserve and promote Bhutanese culture and traditions</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-bhutan-red mt-1 mr-3"></i>
                    <span>Address citizens' concerns and feedback</span>
                </li>
            </ul>
        </div>

        <div class="text-center">
            <h3 class="text-2xl font-semibold mb-6 text-bhutan-amber">Our Commitment to Transparency</h3>
            <p class="text-gray-700 mb-8">We believe in open and transparent governance. Our office is committed to keeping the public informed about government activities, decisions, and plans.</p>
            <a href="#" class="bg-bhutan-amber text-white px-6 py-3 rounded-md hover:bg-bhutan-red transition duration-300">
                View Our Latest Reports
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>