<?php
/*
Template Name: Custom Homepage
*/
?>


<?php get_header(); ?>

<!-- Main content -->
<!-- Slider Area -->
<section class="bg-gray-200 py-12">
    <div class="container mx-auto px-4">
        <div class="slider-wrapper relative bg-white rounded-lg shadow-md overflow-hidden">
            <?php
            $slider_query = new WP_Query(array(
                'post_type' => 'slider',
                'posts_per_page' => -1,
            ));

            if ($slider_query->have_posts()) :
                echo '<p>Slider posts found.</p>';  // Debugging line
                $slider_count = 0;
                while ($slider_query->have_posts()) : $slider_query->the_post();
                    $slider_count++;
            ?>

                    <div class="slider-item absolute inset-0 transition-opacity duration-1000 <?php echo $slider_count === 1 ? 'opacity-100' : 'opacity-0'; ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="relative w-full h-full md:h-full">
                                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="absolute inset-0 w-full h-full object-cover z-0">
                                <div class="absolute inset-0 bg-black bg-opacity-50 z-10 flex items-center justify-center">
                                    <div class="text-center text-white p-6">
                                        <h2 class="text-3xl md:text-4xl font-bold mb-4"><?php the_title(); ?></h2>
                                        <p class="text-lg md:text-xl"><?php the_content(); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No sliders found.</p>';  // Debugging output if no sliders are found
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Latest News and Posts -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6">Latest News and Updates</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $latest_posts_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            ));
            if ($latest_posts_query->have_posts()) :
                while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post();
            ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-40 object-cover">
                        <?php endif; ?>
                        <div class="p-4">
                            <h3 class="font-bold mb-2"><?php the_title(); ?></h3>
                            <p class="text-gray-600 text-sm"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="text-bhutan-red hover:text-bhutan-amber transition duration-300 mt-2 inline-block">Read More</a>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Members Showcase -->
<section class="bg-gray-100 py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-6">Cabinet Members</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Add your static or dynamic content for members here -->
        </div>
    </div>
</section>

<?php get_footer(); ?>