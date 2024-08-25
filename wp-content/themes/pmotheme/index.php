<?php get_header(); ?>

<!-- Main Content Area -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <?php
        // Check if there are any posts/pages to display
        if (have_posts()) :
            // Start the Loop
            while (have_posts()) : the_post();
        ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden mb-8'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="relative h-64 overflow-hidden">
                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover transition duration-300 ease-in-out transform hover:scale-105">
                        </div>
                    <?php endif; ?>

                    <div class="p-6">
                        <h1 class="text-3xl font-bold mb-4 text-center text-bhutan-red"><?php the_title(); ?></h1>

                        <div class="entry-content text-gray-700">
                            <?php
                            // Display the content of the page/post
                            the_content();
                            ?>
                        </div>
                    </div>
                </article>
            <?php
            endwhile; // End the Loop
        else :
            ?>
            <p class="text-center text-gray-600">Sorry, no content found.</p>
        <?php
        endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>