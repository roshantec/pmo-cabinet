<?php

// Theme Setup: Menus, Post Thumbnails, and Title Tag Support
function pmotheme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'pmotheme'),
        'mobile' => __('Mobile Menu', 'pmotheme'),
        'footer-menu-1' => __('Footer Useful Links', 'pmotheme'),
        'footer-menu-2' => __('Footer Ministries', 'pmotheme'),
    ));
}
add_action('after_setup_theme', 'pmotheme_setup');

// Enqueue Styles and Scripts
function pmotheme_enqueue_assets()
{
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', false);
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', false);
    wp_enqueue_style('tailwind', 'https://cdn.tailwindcss.com');
    wp_enqueue_style('pmotheme-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('pmotheme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), null, true);
    wp_enqueue_script('google-translate', 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit', array(), null, true);
}
add_action('wp_enqueue_scripts', 'pmotheme_enqueue_assets');

// Theme Customizer: Logo, Contact Information, and SMTP Settings
function pmotheme_customize_register($wp_customize)
{
    // Logo Section
    $wp_customize->add_section('pmotheme_logo_section', array(
        'title' => __('Logo', 'pmotheme'),
        'priority' => 30,
    ));
    $wp_customize->add_setting('pmotheme_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'pmotheme_logo', array(
        'label' => __('Upload Logo', 'pmotheme'),
        'section' => 'pmotheme_logo_section',
        'settings' => 'pmotheme_logo',
    )));

    // Contact Information Section
    $wp_customize->add_section('pmotheme_contact_section', array(
        'title' => __('Contact Information', 'pmotheme'),
        'priority' => 40,
    ));
    $wp_customize->add_setting('pmotheme_phone_number', array('default' => '+975 2 323845'));
    $wp_customize->add_control('pmotheme_phone_number', array('label' => __('Phone Number', 'pmotheme'), 'section' => 'pmotheme_contact_section', 'type' => 'text'));
    $wp_customize->add_setting('pmotheme_email_address', array('default' => get_option('admin_email')));
    $wp_customize->add_control('pmotheme_email_address', array('label' => __('Email Address', 'pmotheme'), 'section' => 'pmotheme_contact_section', 'type' => 'text'));

    // SMTP Settings Section
    $wp_customize->add_section('smtp_settings', array(
        'title' => 'SMTP Settings',
        'priority' => 35,
    ));
    $wp_customize->add_setting('smtp_host', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('smtp_host', array('label' => 'SMTP Host', 'section' => 'smtp_settings', 'type' => 'text'));
    $wp_customize->add_setting('smtp_port', array('default' => '587', 'sanitize_callback' => 'absint'));
    $wp_customize->add_control('smtp_port', array('label' => 'SMTP Port', 'section' => 'smtp_settings', 'type' => 'number'));
    $wp_customize->add_setting('smtp_username', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('smtp_username', array('label' => 'SMTP Username', 'section' => 'smtp_settings', 'type' => 'text'));
    $wp_customize->add_setting('smtp_password', array('default' => '', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('smtp_password', array('label' => 'SMTP Password', 'section' => 'smtp_settings', 'type' => 'password'));

    // Contact Page Section
    $wp_customize->add_section('contact_page_section', array('title' => 'Contact Page Settings', 'priority' => 30));
    $wp_customize->add_setting('contact_page_title', array('default' => 'Contact Us', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_page_title', array('label' => 'Page Title', 'section' => 'contact_page_section', 'type' => 'text'));
    $wp_customize->add_setting('contact_page_subtitle', array('default' => 'Get in touch with the Prime Minister\'s Office of Bhutan', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_page_subtitle', array('label' => 'Page Subtitle', 'section' => 'contact_page_section', 'type' => 'text'));
    $wp_customize->add_setting('contact_address', array('default' => 'Gyalyong Tshokhang Langjophakha, Thimphu', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_address', array('label' => 'Address', 'section' => 'contact_page_section', 'type' => 'text'));
    $wp_customize->add_setting('contact_phone_1', array('default' => '+975-2-337100 (PMO)', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_phone_1', array('label' => 'Phone Number 1', 'section' => 'contact_page_section', 'type' => 'text'));
    $wp_customize->add_setting('contact_phone_2', array('default' => '+975-2-336667, +975-2-336065 (PABX Gyalyong Tshogkhang)', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_phone_2', array('label' => 'Phone Number 2', 'section' => 'contact_page_section', 'type' => 'text'));
    $wp_customize->add_setting('contact_email_1', array('default' => 'pmo@cabinet.gov.bt', 'sanitize_callback' => 'sanitize_email'));
    $wp_customize->add_control('contact_email_1', array('label' => 'Email Address 1', 'section' => 'contact_page_section', 'type' => 'email'));
    $wp_customize->add_setting('contact_email_2', array('default' => 'info@cabinet.gov.bt', 'sanitize_callback' => 'sanitize_email'));
    $wp_customize->add_control('contact_email_2', array('label' => 'Email Address 2', 'section' => 'contact_page_section', 'type' => 'email'));
    $wp_customize->add_setting('contact_hours', array('default' => '9:00 AM – 5:00 PM Monday – Friday', 'sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control('contact_hours', array('label' => 'Office Hours', 'section' => 'contact_page_section', 'type' => 'text'));
    $wp_customize->add_setting('contact_map_url', array('default' => 'https://www.google.com/maps/embed?pb=!1m18...', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control('contact_map_url', array('label' => 'Google Maps Embed URL', 'section' => 'contact_page_section', 'type' => 'url'));
}
add_action('customize_register', 'pmotheme_customize_register');

// Register Slider Post Type
function pmotheme_slider_post_type()
{
    register_post_type('slider', array(
        'labels' => array(
            'name' => __('Slides'),
            'singular_name' => __('Slide'),
            'add_new_item' => __('Add New Slide'),
            'edit_item' => __('Edit Slide'),
            'new_item' => __('New Slide'),
            'view_item' => __('View Slide'),
            'search_items' => __('Search Slides'),
            'not_found' => __('No slides found'),
            'not_found_in_trash' => __('No slides found in Trash'),
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'thumbnail', 'editor'),
        'menu_icon' => 'dashicons-images-alt2',
    ));
}
add_action('init', 'pmotheme_slider_post_type');

// Configure SMTP Settings for PHPMailer
function configure_smtp($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = get_theme_mod('smtp_host');
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = get_theme_mod('smtp_port');
    $phpmailer->Username = get_theme_mod('smtp_username');
    $phpmailer->Password = get_theme_mod('smtp_password');
    $phpmailer->SMTPSecure = 'tls';
}
add_action('phpmailer_init', 'configure_smtp');

// Handle Contact Form Submission via AJAX
function handle_contact_form_submission()
{
    if (isset($_POST['action']) && $_POST['action'] == 'submit_contact_form') {
        if (!wp_verify_nonce($_POST['contact_form_nonce'], 'submit_contact_form')) {
            wp_send_json_error('Security check failed');
            return;
        }

        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        $to = get_option('admin_email');
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $headers[] = 'From: ' . $name . ' <' . $email . '>';

        $email_content = "
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Subject:</strong> {$subject}</p>
            <p><strong>Message:</strong></p>
            <p>{$message}</p>
        ";

        $sent = wp_mail($to, 'New Contact Form Submission: ' . $subject, $email_content, $headers);

        if ($sent) {
            wp_send_json_success('Message sent successfully');
        } else {
            wp_send_json_error('Failed to send message');
        }
    }
}
add_action('wp_ajax_submit_contact_form', 'handle_contact_form_submission');
add_action('wp_ajax_nopriv_submit_contact_form', 'handle_contact_form_submission');

// Enqueue Contact Page Scripts
function enqueue_contact_page_assets()
{
    wp_enqueue_script('contact-page-script', get_template_directory_uri() . '/js/contact-page.js', array('jquery'), '1.0', true);
    wp_localize_script('contact-page-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_contact_page_assets');


function feedback_customizer_settings($wp_customize)
{
    $wp_customize->add_section('feedback_settings', array(
        'title' => __('Feedback Page Settings', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Add settings for title, subtitle, question, etc.
    $settings = [
        'feedback_title' => 'Your Voice Matters',
        'feedback_subtitle' => 'We value your honest feedback. Help us improve our services by sharing your thoughts anonymously.',
        'feedback_question' => 'How was your experience?',
        'feedback_department_label' => 'Which department does your feedback concern?',
        'feedback_textarea_label' => 'Your Feedback',
        'feedback_textarea_placeholder' => 'Share your thoughts, suggestions, or concerns...',
        'feedback_subscribe_label' => 'I\'d like to receive updates on how my feedback is being addressed (optional)',
        'feedback_submit_button' => 'Submit Feedback',
    ];

    foreach ($settings as $setting => $default) {
        $wp_customize->add_setting($setting, array(
            'default' => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control($setting, array(
            'label' => ucfirst(str_replace('_', ' ', $setting)),
            'section' => 'feedback_settings',
            'type' => 'text',
        ));
    }

    // Add setting for departments
    $wp_customize->add_setting('feedback_departments', array(
        'default' => json_encode([
            'general' => 'General Administration',
            'finance' => 'Finance',
            'foreign' => 'Foreign Affairs',
            'health' => 'Health',
            'education' => 'Education'
        ]),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('feedback_departments', array(
        'label' => 'Departments (JSON format)',
        'section' => 'feedback_settings',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'feedback_customizer_settings');

// Handle form submission
function handle_feedback_submission()
{
    if (isset($_POST['action']) && $_POST['action'] == 'submit_feedback') {
        if (!wp_verify_nonce($_POST['feedback_nonce'], 'submit_feedback')) {
            wp_die('Security check failed');
        }

        $rating = intval($_POST['rating']);
        $department = sanitize_text_field($_POST['department']);
        $feedback = sanitize_textarea_field($_POST['feedback']);
        $subscribe = isset($_POST['subscribe']) ? true : false;
        $email = $subscribe ? sanitize_email($_POST['email']) : '';

        // Here you can process the feedback, e.g., save to database or send email
        // For this example, we'll just print a success message
        wp_redirect(add_query_arg('feedback', 'success', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_nopriv_submit_feedback', 'handle_feedback_submission');
add_action('admin_post_submit_feedback', 'handle_feedback_submission');


// Add this to your theme's functions.php file or in a custom plugin

function create_team_member_post_type()
{
    register_post_type(
        'team_member',
        array(
            'labels' => array(
                'name' => __('Team Members'),
                'singular_name' => __('Team Member')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-groups',
        )
    );

    register_taxonomy('department', 'team_member', array(
        'label' => __('Department'),
        'hierarchical' => true,
        'show_admin_column' => true,
    ));
}
add_action('init', 'create_team_member_post_type');

function add_team_member_meta_boxes()
{
    add_meta_box('team_member_details', 'Team Member Details', 'team_member_details_callback', 'team_member', 'normal', 'default');
}
add_action('add_meta_boxes', 'add_team_member_meta_boxes');

function team_member_details_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'team_member_nonce');
    $position = get_post_meta($post->ID, 'position', true);
    $twitter_url = get_post_meta($post->ID, 'twitter_url', true);
    $linkedin_url = get_post_meta($post->ID, 'linkedin_url', true);
?>
    <p>
        <label for="position">Position:</label>
        <input type="text" name="position" id="position" value="<?php echo esc_attr($position); ?>" class="widefat">
    </p>
    <p>
        <label for="twitter_url">Twitter URL:</label>
        <input type="url" name="twitter_url" id="twitter_url" value="<?php echo esc_url($twitter_url); ?>" class="widefat">
    </p>
    <p>
        <label for="linkedin_url">LinkedIn URL:</label>
        <input type="url" name="linkedin_url" id="linkedin_url" value="<?php echo esc_url($linkedin_url); ?>" class="widefat">
    </p>
<?php
}

function save_team_member_meta($post_id)
{
    if (!isset($_POST['team_member_nonce']) || !wp_verify_nonce($_POST['team_member_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('team_member' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } else {
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    $fields = array('position', 'twitter_url', 'linkedin_url');

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_team_member_meta');


function create_pmo_visit_post_type()
{
    $labels = array(
        'name' => 'PMO Visits',
        'singular_name' => 'PMO Visit',
        'menu_name' => 'PMO Visits',
        'add_new_item' => 'Add New Visit',
        'edit_item' => 'Edit Visit',
        'view_item' => 'View Visit',
        'all_items' => 'All Visits',
        'search_items' => 'Search Visits',
        'not_found' => 'No visits found',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-location-alt',
        'supports' => array('title', 'editor'),
        'rewrite' => array('slug' => 'pmo-visits'),
    );

    register_post_type('pmo_visit', $args);
}
add_action('init', 'create_pmo_visit_post_type');

// Add Custom Fields
function add_pmo_visit_custom_fields()
{
    add_meta_box(
        'pmo_visit_details',
        'Visit Details',
        'pmo_visit_custom_fields_callback',
        'pmo_visit',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_pmo_visit_custom_fields');

function pmo_visit_custom_fields_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'pmo_visit_nonce');
    $visit_date = get_post_meta($post->ID, 'visit_date', true);
    $visit_status = get_post_meta($post->ID, 'visit_status', true);
    $visit_description = get_post_meta($post->ID, 'visit_description', true);
    $joint_statement_url = get_post_meta($post->ID, 'joint_statement_url', true);
    $photo_gallery_url = get_post_meta($post->ID, 'photo_gallery_url', true);
    $visit_report_url = get_post_meta($post->ID, 'visit_report_url', true);
    $video_highlights_url = get_post_meta($post->ID, 'video_highlights_url', true);
?>
    <p>
        <label for="visit_date">Visit Date:</label>
        <input type="date" id="visit_date" name="visit_date" value="<?php echo esc_attr($visit_date); ?>">
    </p>
    <p>
        <label for="visit_status">Visit Status:</label>
        <select id="visit_status" name="visit_status">
            <option value="upcoming" <?php selected($visit_status, 'upcoming'); ?>>Upcoming</option>
            <option value="recent" <?php selected($visit_status, 'recent'); ?>>Recent</option>
            <option value="past" <?php selected($visit_status, 'past'); ?>>Past</option>
        </select>
    </p>
    <p>
        <label for="visit_description">Visit Description:</label>
        <textarea id="visit_description" name="visit_description" rows="4" cols="50"><?php echo esc_textarea($visit_description); ?></textarea>
    </p>
    <p>
        <label for="joint_statement_url">Joint Statement URL:</label>
        <input type="url" id="joint_statement_url" name="joint_statement_url" value="<?php echo esc_url($joint_statement_url); ?>">
    </p>
    <p>
        <label for="photo_gallery_url">Photo Gallery URL:</label>
        <input type="url" id="photo_gallery_url" name="photo_gallery_url" value="<?php echo esc_url($photo_gallery_url); ?>">
    </p>
    <p>
        <label for="visit_report_url">Visit Report URL:</label>
        <input type="url" id="visit_report_url" name="visit_report_url" value="<?php echo esc_url($visit_report_url); ?>">
    </p>
    <p>
        <label for="video_highlights_url">Video Highlights URL:</label>
        <input type="url" id="video_highlights_url" name="video_highlights_url" value="<?php echo esc_url($video_highlights_url); ?>">
    </p>
<?php
}

function save_pmo_visit_custom_fields($post_id)
{
    if (!isset($_POST['pmo_visit_nonce']) || !wp_verify_nonce($_POST['pmo_visit_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('pmo_visit' !== $_POST['post_type']) {
        return $post_id;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    $fields = array(
        'visit_date',
        'visit_status',
        'visit_description',
        'joint_statement_url',
        'photo_gallery_url',
        'visit_report_url',
        'video_highlights_url'
    );

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'save_pmo_visit_custom_fields');

// Add custom field for intro text on the PMO Visits page template
function add_pmo_visits_page_custom_fields()
{
    add_meta_box(
        'pmo_visits_intro',
        'Intro Text',
        'pmo_visits_intro_callback',
        'page',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_pmo_visits_page_custom_fields');

function pmo_visits_intro_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'pmo_visits_intro_nonce');
    $intro_text = get_post_meta($post->ID, 'intro_text', true);
?>
    <p>
        <label for="intro_text">Intro Text:</label>
        <textarea id="intro_text" name="intro_text" rows="4" cols="50"><?php echo esc_textarea($intro_text); ?></textarea>
    </p>
<?php
}

function save_pmo_visits_page_custom_fields($post_id)
{
    if (!isset($_POST['pmo_visits_intro_nonce']) || !wp_verify_nonce($_POST['pmo_visits_intro_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('page' !== $_POST['post_type']) {
        return $post_id;
    }

    if (!current_user_can('edit_page', $post_id)) {
        return $post_id;
    }

    if (isset($_POST['intro_text'])) {
        update_post_meta($post_id, 'intro_text', sanitize_textarea_field($_POST['intro_text']));
    }
}
add_action('save_post', 'save_pmo_visits_page_custom_fields');


require_once get_template_directory() . '/acf-fields.php';

function create_pmo_history_post_type() {
    register_post_type('pmo_history',
        array(
            'labels' => array(
                'name' => __('PMO History'),
                'singular_name' => __('PMO History Entry'),
                'add_new' => __('Add New Entry'),
                'add_new_item' => __('Add New PMO History Entry'),
                'edit_item' => __('Edit PMO History Entry'),
                'new_item' => __('New PMO History Entry'),
                'view_item' => __('View PMO History Entry'),
                'search_items' => __('Search PMO History Entries'),
                'not_found' => __('No PMO history entries found'),
                'not_found_in_trash' => __('No PMO history entries found in Trash'),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-building',
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'pmo-history'),
        )
    );
}
add_action('init', 'create_pmo_history_post_type');

// Add custom meta boxes for additional fields
function add_pmo_history_meta_boxes() {
    add_meta_box(
        'pmo_history_details',
        'PMO History Details',
        'render_pmo_history_meta_box',
        'pmo_history',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_pmo_history_meta_boxes');

function render_pmo_history_meta_box($post) {
    wp_nonce_field('pmo_history_meta_box', 'pmo_history_meta_box_nonce');

    $term = get_post_meta($post->ID, '_pmo_term', true);
    ?>
    <p>
        <label for="pmo_term">Term:</label>
        <input type="text" id="pmo_term" name="pmo_term" value="<?php echo esc_attr($term); ?>" size="25" />
    </p>
    <?php
}

function save_pmo_history_meta_box_data($post_id) {
    if (!isset($_POST['pmo_history_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['pmo_history_meta_box_nonce'], 'pmo_history_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['pmo_term'])) {
        update_post_meta($post_id, '_pmo_term', sanitize_text_field($_POST['pmo_term']));
    }
}
add_action('save_post', 'save_pmo_history_meta_box_data');