<?php get_header(); ?>

<!-- Main content -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center text-bhutan-red">Latest Posts</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
            ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-48 object-cover">
                        <?php endif; ?>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 hover:text-bhutan-red">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-bhutan-amber"><?php echo get_the_date(); ?></span>
                                <a href="<?php the_permalink(); ?>" class="text-bhutan-red hover:underline">Read More</a>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
            else :
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>