<?php
/*
Template Name: Feedback Page
*/

get_header();
?>

<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-8 text-center text-bhutan-red"><?php echo get_theme_mod('feedback_title', 'Your Voice Matters'); ?></h2>
        <p class="text-center mb-8 text-gray-600"><?php echo get_theme_mod('feedback_subtitle', 'We value your honest feedback. Help us improve our services by sharing your thoughts anonymously.'); ?></p>

        <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-md p-8">
            <div class="mb-8">
                <h3 class="text-xl font-semibold mb-4 text-bhutan-amber"><?php echo get_theme_mod('feedback_question', 'How was your experience?'); ?></h3>
                <div class="flex justify-center space-x-4">
                    <?php
                    $feedback_icons = [
                        1 => 'fa-angry',
                        2 => 'fa-frown',
                        3 => 'fa-meh',
                        4 => 'fa-smile',
                        5 => 'fa-grin-stars'
                    ];
                    foreach ($feedback_icons as $rating => $icon) :
                    ?>
                        <button class="feedback-btn" data-rating="<?php echo $rating; ?>"><i class="fas <?php echo $icon; ?> text-4xl"></i></button>
                    <?php endforeach; ?>
                </div>
            </div>

            <form id="feedbackForm" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                <?php wp_nonce_field('submit_feedback', 'feedback_nonce'); ?>
                <input type="hidden" name="action" value="submit_feedback">
                <div class="mb-6">
                    <label for="department" class="block mb-2 font-semibold text-gray-700"><?php echo get_theme_mod('feedback_department_label', 'Which department does your feedback concern?'); ?></label>
                    <select id="department" name="department" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-bhutan-amber">
                        <option value=""><?php echo esc_html__('Select a department', 'your-theme-textdomain'); ?></option>
                        <?php
                        $departments = get_theme_mod('feedback_departments', [
                            'general' => 'General Administration',
                            'finance' => 'Finance',
                            'foreign' => 'Foreign Affairs',
                            'health' => 'Health',
                            'education' => 'Education'
                        ]);
                        foreach ($departments as $value => $label) :
                        ?>
                            <option value="<?php echo esc_attr($value); ?>"><?php echo esc_html($label); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="feedback" class="block mb-2 font-semibold text-gray-700"><?php echo get_theme_mod('feedback_textarea_label', 'Your Feedback'); ?></label>
                    <textarea id="feedback" name="feedback" rows="5" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-bhutan-amber" placeholder="<?php echo esc_attr(get_theme_mod('feedback_textarea_placeholder', 'Share your thoughts, suggestions, or concerns...')); ?>"></textarea>
                </div>
                <div class="mb-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="subscribe" class="form-checkbox text-bhutan-amber">
                        <span class="ml-2 text-gray-700"><?php echo get_theme_mod('feedback_subscribe_label', 'I\'d like to receive updates on how my feedback is being addressed (optional)'); ?></span>
                    </label>
                </div>
                <div id="emailField" class="mb-6 hidden">
                    <label for="email" class="block mb-2 font-semibold text-gray-700"><?php echo esc_html__('Email Address', 'your-theme-textdomain'); ?></label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-bhutan-amber">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-bhutan-amber text-white px-6 py-3 rounded-md hover:bg-bhutan-red transition duration-300">
                        <?php echo get_theme_mod('feedback_submit_button', 'Submit Feedback'); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<style>
    .feedback-btn {
        color: #ccc;
        transition: color 0.3s ease;
    }

    .feedback-btn:hover,
    .feedback-btn.selected {
        color: #FFD700;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const feedbackBtns = document.querySelectorAll('.feedback-btn');
        const subscribeCheckbox = document.querySelector('input[name="subscribe"]');
        const emailField = document.getElementById('emailField');

        feedbackBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                feedbackBtns.forEach(b => b.classList.remove('selected'));
                this.classList.add('selected');
            });
        });

        subscribeCheckbox.addEventListener('change', function() {
            emailField.style.display = this.checked ? 'block' : 'none';
        });

        document.getElementById('feedbackForm').addEventListener('submit', function(e) {
            // Form submission is now handled by WordPress
        });
    });
</script>

<?php get_footer(); ?>