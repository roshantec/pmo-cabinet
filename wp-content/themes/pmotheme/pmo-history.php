<?php
/*
Template Name: PMO History
*/

get_header();
?>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center text-bhutan-red"><?php echo get_the_title(); ?></h2>

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-md p-8 mb-12">
                <h3 class="text-2xl font-semibold mb-4 text-bhutan-amber">Establishment and Evolution</h3>
                <?php
                $page_content = apply_filters('the_content', $post->post_content);
                echo $page_content;
                ?>
            </div>

            <h3 class="text-2xl font-bold mb-6 text-bhutan-red">Past Prime Ministers</h3>
            <div class="space-y-8">
                <?php
                $args = array(
                    'post_type' => 'pmo_history',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'ASC',
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden flex">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="w-1/3">
                                <?php the_post_thumbnail('medium', array('class' => 'w-full h-full object-cover')); ?>
                            </div>
                        <?php endif; ?>
                        <div class="p-6 <?php echo has_post_thumbnail() ? 'w-2/3' : 'w-full'; ?>">
                            <h4 class="text-xl font-semibold mb-2"><?php the_title(); ?></h4>
                            <p class="text-gray-600 mb-2"><?php echo esc_html(get_post_meta(get_the_ID(), '_pmo_term', true)); ?></p>
                            <div class="text-gray-700"><?php the_content(); ?></div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No PMO history entries found.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>