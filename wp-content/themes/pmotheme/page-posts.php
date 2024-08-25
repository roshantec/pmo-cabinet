<?php
/*
Template Name: Custom Posts Page
*/
?>

<?php get_header(); ?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-bhutan-red to-bhutan-amber py-20 text-white">
    <div class="container mx-auto px-4">
        <h1 class="text-5xl font-bold mb-4 text-center">Explore Our Latest Articles</h1>
        <p class="text-xl text-center max-w-2xl mx-auto">Discover insights, stories, and knowledge from our diverse collection of posts.</p>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <!-- Improved Sorting Form -->
        <div class="mb-12 bg-white rounded-lg shadow-lg p-6 max-w-3xl mx-auto">
            <form method="GET" class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center flex-grow">
                    <label for="sort-by" class="mr-4 text-gray-700 font-medium">Sort by:</label>
                    <select name="sort" id="sort-by" class="p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-bhutan-red focus:border-transparent flex-grow">
                        <option value="date_desc" <?php selected(isset($_GET['sort']) && $_GET['sort'] == 'date_desc'); ?>>Newest</option>
                        <option value="date_asc" <?php selected(isset($_GET['sort']) && $_GET['sort'] == 'date_asc'); ?>>Oldest</option>
                        <option value="category" <?php selected(isset($_GET['sort']) && $_GET['sort'] == 'category'); ?>>Category</option>
                    </select>
                </div>
                <button type="submit" class="px-6 py-2 bg-bhutan-red text-white rounded-md hover:bg-bhutan-amber transition duration-300 ease-in-out shadow-md">
                    Apply Filter
                </button>
            </form>
        </div>

        <?php
        // Get all categories
        $categories = get_categories();

        // Loop through each category
        foreach ($categories as $category) :
            // Category title with decorative elements
            echo '<div class="flex items-center justify-center mb-10">';
            echo '<div class="w-16 h-1 bg-bhutan-red mr-4"></div>';
            echo '<h2 class="text-3xl font-bold text-bhutan-red">' . esc_html($category->name) . '</h2>';
            echo '<div class="w-16 h-1 bg-bhutan-red ml-4"></div>';
            echo '</div>';

            // Set up query for posts in this category
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'category__in' => array($category->term_id),
                'orderby' => isset($_GET['sort']) && $_GET['sort'] == 'date_asc' ? 'date' : 'date',
                'order' => isset($_GET['sort']) && $_GET['sort'] == 'date_asc' ? 'ASC' : 'DESC',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
        ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                    <?php
                    while ($query->have_posts()) : $query->the_post();
                    ?>
                        <!-- Enhanced Article Card -->
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="relative h-56 overflow-hidden">
                                    <img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover transition duration-300 ease-in-out transform hover:scale-105">
                                    <div class="absolute bottom-0 left-0 bg-bhutan-red text-white px-4 py-2 text-sm font-semibold">
                                        <?php echo get_the_date(); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-3 hover:text-bhutan-red transition duration-300 ease-in-out">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-bhutan-amber font-medium"><?php echo get_the_category_list(', '); ?></span>
                                    <a href="<?php the_permalink(); ?>" class="text-bhutan-red hover:underline transition duration-300 ease-in-out font-semibold">Read More &rarr;</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>
                </div>
        <?php
            else :
                echo '<p class="text-center text-gray-600 italic mb-16">No posts found in this category.</p>';
            endif;

            wp_reset_postdata();
        endforeach;
        ?>

        <!-- Improved Pagination -->
        <div class="mt-12 flex justify-center">
            <?php
            // Pagination
            $pagination = get_the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&laquo; Previous', 'pmotheme'),
                'next_text' => __('Next &raquo;', 'pmotheme'),
            ));

            // Customize pagination output
            $pagination = str_replace('class="page-numbers"', 'class="page-numbers px-4 py-2 mx-1 bg-white text-bhutan-red border border-bhutan-red rounded-md hover:bg-bhutan-red hover:text-white transition duration-300 ease-in-out"', $pagination);
            $pagination = str_replace('class="prev page-numbers"', 'class="prev page-numbers px-4 py-2 mx-1 bg-white text-bhutan-red border border-bhutan-red rounded-md hover:bg-bhutan-red hover:text-white transition duration-300 ease-in-out"', $pagination);
            $pagination = str_replace('class="next page-numbers"', 'class="next page-numbers px-4 py-2 mx-1 bg-white text-bhutan-red border border-bhutan-red rounded-md hover:bg-bhutan-red hover:text-white transition duration-300 ease-in-out"', $pagination);
            $pagination = str_replace('class="page-numbers current"', 'class="page-numbers current px-4 py-2 mx-1 bg-bhutan-red text-white border border-bhutan-red rounded-md"', $pagination);

            echo $pagination;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>