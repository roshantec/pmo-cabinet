<?php
/*
Template Name: Team Page
*/

get_header();
?>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center text-bhutan-red"><?php echo get_field('team_title', get_the_ID()); ?></h2>
        <p class="text-center mb-12 text-gray-600"><?php echo get_field('team_description', get_the_ID()); ?></p>

        <!-- Search and Filter Section -->
        <div class="mb-8">
            <input type="text" id="team-search" placeholder="Search members..." class="w-full p-2 border border-gray-300 rounded-md">
            <select id="team-filter" class="mt-4 p-2 border border-gray-300 rounded-md">
                <option value="">All Departments</option>
                <?php
                $departments = get_terms(array(
                    'taxonomy' => 'department',
                    'hide_empty' => false,
                ));
                foreach ($departments as $department) {
                    echo '<option value="' . esc_attr($department->slug) . '">' . esc_html($department->name) . '</option>';
                }
                ?>
            </select>
        </div>

        <div id="team-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $args = array(
                'post_type' => 'team_member',
                'posts_per_page' => -1,
            );
            $team_query = new WP_Query($args);

            while ($team_query->have_posts()) : $team_query->the_post();
                $member_department = wp_get_post_terms(get_the_ID(), 'department', array('fields' => 'slugs'));
            ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden team-member" data-department="<?php echo esc_attr(implode(' ', $member_department)); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-64 object-cover')); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/placeholder.jpg" alt="<?php the_title(); ?>" class="w-full h-64 object-cover">
                    <?php endif; ?>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2"><?php the_title(); ?></h3>
                        <p class="text-bhutan-amber mb-4"><?php echo get_field('position'); ?></p>
                        <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                        <div class="flex space-x-4">
                            <?php if (get_field('twitter_url')) : ?>
                                <a href="<?php echo esc_url(get_field('twitter_url')); ?>" class="text-bhutan-red hover:text-bhutan-amber transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_field('linkedin_url')) : ?>
                                <a href="<?php echo esc_url(get_field('linkedin_url')); ?>" class="text-bhutan-red hover:text-bhutan-amber transition duration-300">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <div class="mt-16 text-center">
            <h3 class="text-2xl font-semibold mb-6 text-bhutan-amber"><?php echo get_field('join_team_title', get_the_ID()); ?></h3>
            <p class="text-gray-700 mb-8"><?php echo get_field('join_team_description', get_the_ID()); ?></p>
            <a href="<?php echo esc_url(get_field('career_opportunities_url', get_the_ID())); ?>" class="bg-bhutan-amber text-white px-6 py-3 rounded-md hover:bg-bhutan-red transition duration-300">
                <?php echo get_field('career_opportunities_button_text', get_the_ID()); ?>
            </a>
        </div>
    </div>
</section>


<?php get_footer(); ?>