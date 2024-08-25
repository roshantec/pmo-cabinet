<?php
/*
Template Name: PMO Visits
*/

get_header();

// Query for visits
$args = array(
    'post_type' => 'pmo_visit',
    'posts_per_page' => -1,
    'meta_key' => 'visit_date',
    'orderby' => 'meta_value',
    'order' => 'DESC'
);
$visits_query = new WP_Query($args);

?>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center text-bhutan-red"><?php the_title(); ?></h2>

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-md p-8 mb-12">
                <h3 class="text-2xl font-semibold mb-4 text-bhutan-amber">Recent and Upcoming Visits</h3>
                <?php
                $intro_text = get_post_meta(get_the_ID(), 'intro_text', true);
                echo '<p class="text-gray-700 mb-4">' . esc_html($intro_text) . '</p>';
                ?>
                <a href="#" class="text-bhutan-red hover:underline">View All Visits</a>
            </div>

            <div class="space-y-8">
                <?php
                if ($visits_query->have_posts()) :
                    while ($visits_query->have_posts()) : $visits_query->the_post();
                        $visit_date = get_post_meta(get_the_ID(), 'visit_date', true);
                        $visit_status = get_post_meta(get_the_ID(), 'visit_status', true);
                        $visit_description = get_post_meta(get_the_ID(), 'visit_description', true);
                        $joint_statement_url = get_post_meta(get_the_ID(), 'joint_statement_url', true);
                        $photo_gallery_url = get_post_meta(get_the_ID(), 'photo_gallery_url', true);
                        $visit_report_url = get_post_meta(get_the_ID(), 'visit_report_url', true);
                        $video_highlights_url = get_post_meta(get_the_ID(), 'video_highlights_url', true);

                        $border_color = 'border-gray-300';
                        $status_bg = 'bg-gray-300';
                        $status_text = 'text-gray-700';

                        if ($visit_status === 'upcoming') {
                            $border_color = 'border-bhutan-gold';
                            $status_bg = 'bg-bhutan-gold';
                            $status_text = 'text-white';
                        } elseif ($visit_status === 'recent') {
                            $border_color = 'border-bhutan-red';
                            $status_bg = 'bg-bhutan-red';
                            $status_text = 'text-white';
                        }
                ?>
                        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 <?php echo $border_color; ?>">
                            <div class="flex justify-between items-start mb-4">
                                <h4 class="text-xl font-semibold text-bhutan-red"><?php the_title(); ?></h4>
                                <span class="<?php echo $status_bg . ' ' . $status_text; ?> text-sm font-semibold px-3 py-1 rounded-full">
                                    <?php echo ucfirst($visit_status); ?>
                                </span>
                            </div>
                            <p class="text-gray-600 mb-2">
                                <i class="far fa-calendar-alt mr-2 text-bhutan-amber"></i><?php echo esc_html($visit_date); ?>
                            </p>
                            <p class="text-gray-700 mb-4"><?php echo esc_html($visit_description); ?></p>
                            <div class="flex space-x-4 mt-4">
                                <?php if ($joint_statement_url) : ?>
                                    <a href="<?php echo esc_url($joint_statement_url); ?>" class="text-bhutan-red hover:underline flex items-center">
                                        <i class="far fa-file-alt mr-2"></i>Joint Statement
                                    </a>
                                <?php endif; ?>
                                <?php if ($photo_gallery_url) : ?>
                                    <a href="<?php echo esc_url($photo_gallery_url); ?>" class="text-bhutan-red hover:underline flex items-center">
                                        <i class="far fa-images mr-2"></i>Photo Gallery
                                    </a>
                                <?php endif; ?>
                                <?php if ($visit_report_url) : ?>
                                    <a href="<?php echo esc_url($visit_report_url); ?>" class="text-bhutan-red hover:underline flex items-center">
                                        <i class="far fa-file-alt mr-2"></i>Visit Report
                                    </a>
                                <?php endif; ?>
                                <?php if ($video_highlights_url) : ?>
                                    <a href="<?php echo esc_url($video_highlights_url); ?>" class="text-bhutan-red hover:underline flex items-center">
                                        <i class="fab fa-youtube mr-2"></i>Video Highlights
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="text-center">No visits found.</p>';
                endif;
                ?>
            </div>

            <div class="mt-12 text-center">
                <a href="#" class="bg-bhutan-red text-white px-6 py-3 rounded-full inline-block hover:bg-bhutan-amber transition duration-300">
                    View All Official Visits
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>