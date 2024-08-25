<?php get_header(); ?>

<article class="">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!-- Hero Section -->
        <div class="w-full bg-bhutan-red text-white py-16 md:py-24">
            <div class="container mx-auto px-4">
                <h1 class="text-3xl md:text-5xl font-bold mb-4 max-w-4xl mx-auto text-center"><?php the_title(); ?></h1>
                <div class="flex justify-center items-center text-bhutan-amber mb-6 text-sm md:text-base">
                    <span class="mr-4"><i class="far fa-calendar-alt mr-2"></i><?php the_date(); ?></span>
                    <span><i class="far fa-user mr-2"></i><?php the_author(); ?></span>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 mt-12">
            <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="w-full h-96 relative overflow-hidden">
                        <?php the_post_thumbnail('large', ['class' => 'absolute inset-0 w-full h-full object-cover transition-transform duration-300 hover:scale-105', 'alt' => get_the_title()]); ?>
                    </div>
                <?php endif; ?>
                <div class="p-8 md:p-12">
                    <div class="prose max-w-none">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <!-- Related Articles -->
            <div class="max-w-4xl mx-auto mt-12">
                <h3 class="text-2xl font-bold mb-6 text-bhutan-red">Related Articles</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <?php
                    $related_posts = get_posts(array(
                        'category__in' => wp_get_post_categories(get_the_ID()),
                        'numberposts' => 2,
                        'post__not_in' => array(get_the_ID())
                    ));
                    
                    foreach ($related_posts as $post) : setup_postdata($post);
                    ?>
                        <a href="<?php the_permalink(); ?>" class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="w-full h-48 relative overflow-hidden">
                                    <?php the_post_thumbnail('medium', ['class' => 'absolute inset-0 w-full h-full object-cover transition-transform duration-300 hover:scale-105']); ?>
                                </div>
                            <?php endif; ?>
                            <div class="p-6">
                                <h4 class="font-semibold text-xl mb-2 hover:text-bhutan-red transition duration-300"><?php the_title(); ?></h4>
                                <p class="text-gray-600 text-sm"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
                        </a>
                    <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
</article>


<?php get_footer(); ?>