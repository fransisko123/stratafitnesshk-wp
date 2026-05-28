<?php
/**
 * Strata Fitness Theme Functions
 *
 * @package StrataFitness
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'STRATA_VERSION', '1.0.0' );

// ── Theme Setup ──
function stratafitness_theme_setup() {
    // Make theme available for translation
    load_theme_textdomain('stratafitness', get_template_directory() . '/languages');

    // Let WordPress manage the <title> tag
    add_theme_support('title-tag');

    // Enable post thumbnails (featured images)
    add_theme_support('post-thumbnails');

    // HTML5 markup support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'stratafitness'),
        'footer-services' => __('Footer Services Menu', 'stratafitness'),
        'footer-company' => __('Footer Company Menu', 'stratafitness'),
    ));
}
add_action('after_setup_theme', 'stratafitness_theme_setup');

// ── Enqueue Scripts & Styles ──
function stratafitness_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style(
        'stratafitness-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        STRATA_VERSION
    );

    // Google Fonts (loaded with media="print" trick to eliminate render-blocking)
    wp_enqueue_style(
        'stratafitness-fonts',
        'https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400;0,500;0,600;0,700;1,400;1,700&family=Archivo:wght@400;600;800&family=Geist:wght@300;400;500&display=swap',
        array(),
        null
    );

    // Preload key font files to reduce CLS
    add_action('wp_head', 'stratafitness_font_preload', 1);

    // GSAP from CDN
    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
        array(),
        '3.12.5',
        true
    );

    wp_enqueue_script(
        'gsap-scrolltrigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
        array('gsap'),
        '3.12.5',
        true
    );

    // Quiz embed script (only on remote coaching page)
    if (is_page('remote-coaching') && get_theme_mod('strata_rc_quiz_enabled', true)) {
        wp_enqueue_script(
            'stratafitness-quiz-embed',
            get_template_directory_uri() . '/assets/js/quiz-embed.js',
            array(),
            STRATA_VERSION,
            true
        );
    }

    // Main JS
    wp_enqueue_script(
        'stratafitness-script',
        get_template_directory_uri() . '/assets/js/script.js',
        array('gsap', 'gsap-scrolltrigger'),
        STRATA_VERSION,
        true
    );

    // Pass AJAX URL & nonce to script
    wp_localize_script('stratafitness-script', 'StrataAjax', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('strata_apply_form'),
    ));
}
add_action('wp_enqueue_scripts', 'stratafitness_enqueue_assets');

// ── Make Google Fonts non-render-blocking ──
function stratafitness_fonts_media_attribute($html, $handle) {
    if ('stratafitness-fonts' === $handle) {
        // Swap media="print" to "all" on load (eliminates render-blocking)
        return str_replace(
            "media='all'",
            "media='print' onload=\"this.media='all'; this.onload=null;\"",
            $html
        );
    }
    return $html;
}
add_filter('style_loader_tag', 'stratafitness_fonts_media_attribute', 10, 2);

// ── Preload key font files to reduce CLS ──
function stratafitness_font_preload() {
    // Preload the critical display font (Archivo Narrow wght 700 - used in all headings)
    echo '<link rel="preload" href="' . esc_url(get_template_directory_uri() . '/assets/fonts/archivo-narrow-700.woff2') . '" as="font" type="font/woff2" crossorigin="anonymous">' . "\n";
}

// ── Add defer/async to GSAP and main script ──
function stratafitness_add_defer_attribute($tag, $handle) {
    $defer_scripts = array('gsap', 'gsap-scrolltrigger', 'stratafitness-script', 'stratafitness-quiz-embed');
    if (in_array($handle, $defer_scripts, true)) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'stratafitness_add_defer_attribute', 10, 2);

// ── Resource Hints (preconnect / dns-prefetch) ──
function stratafitness_resource_hints($hints, $relation_type) {
    if ('preconnect' === $relation_type) {
        $hints[] = array(
            'href'        => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        );
        $hints[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
        $hints[] = array(
            'href'        => 'https://cdnjs.cloudflare.com',
            'crossorigin' => 'anonymous',
        );
    }
    if ('dns-prefetch' === $relation_type) {
        $hints[] = 'https://cdnjs.cloudflare.com';
    }
    return $hints;
}
add_filter('wp_resource_hints', 'stratafitness_resource_hints', 10, 2);

// ── Skip Navigation Link ──
function stratafitness_skip_link() {
    echo '<a class="skip-link screen-reader-text" href="#main-content">' . esc_html__('Skip to content', 'stratafitness') . '</a>';
}
add_action('wp_body_open', 'stratafitness_skip_link');

// ── Navigation: aria-current for primary menu ──
function stratafitness_nav_menu_link_attributes($atts, $item, $args) {
    if (isset($args->theme_location) && 'primary' === $args->theme_location) {
        if (!isset($atts['aria-current']) && $item->current) {
            $atts['aria-current'] = 'page';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'stratafitness_nav_menu_link_attributes', 10, 3);

// ── Auto Lazy-Load: add loading="lazy" to in-content images & iframes ──
function stratafitness_add_lazy_loading($content) {
    $content = preg_replace(
        '/<img(?!.*?(?:loading|fetchpriority)=[\'"])([^>]+)>/is',
        '<img$1 loading="lazy">',
        $content
    );
    $content = preg_replace(
        '/<iframe(?!.*?loading=[\'"])([^>]+)>/is',
        '<iframe$1 loading="lazy">',
        $content
    );
    return $content;
}
add_filter('the_content', 'stratafitness_add_lazy_loading');
add_filter('widget_text_content', 'stratafitness_add_lazy_loading');

// ── Open Graph Meta Tags ──
function stratafitness_opengraph_tags() {
    global $post;
    if (!is_singular()) return;

    $title       = get_the_title();
    $url         = get_permalink();
    $description = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 30);
    $image_url   = has_post_thumbnail() ? get_the_post_thumbnail_url($post->ID, 'large') : get_template_directory_uri() . '/assets/images/logo.webp';

    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image_url) . '">' . "\n";
    echo '<meta property="og:type" content="website">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
}
add_action('wp_head', 'stratafitness_opengraph_tags', 5);

// ── WordPress Cleanup ──
function stratafitness_clean_head() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}
add_action('init', 'stratafitness_clean_head');

function stratafitness_dequeue_block_styles() {
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('global-styles');
    }
}
add_action('wp_enqueue_scripts', 'stratafitness_dequeue_block_styles', 100);

// ── Mailtrap SMTP (local development only - configure via wp-config.php) ──
// To enable, define these in wp-config.php:
//   define('STRATA_SMTP_HOST', 'sandbox.smtp.mailtrap.io');
//   define('STRATA_SMTP_PORT', 2525);
//   define('STRATA_SMTP_USER', 'your_username');
//   define('STRATA_SMTP_PASS', 'your_password');
if (defined('STRATA_SMTP_HOST') && defined('STRATA_SMTP_USER') && defined('STRATA_SMTP_PASS')) {
    function stratafitness_mailtrap_smtp($phpmailer) {
        $phpmailer->isSMTP();
        $phpmailer->Host       = STRATA_SMTP_HOST;
        $phpmailer->SMTPAuth   = true;
        $phpmailer->Port       = defined('STRATA_SMTP_PORT') ? STRATA_SMTP_PORT : 2525;
        $phpmailer->Username   = STRATA_SMTP_USER;
        $phpmailer->Password   = STRATA_SMTP_PASS;
        $phpmailer->SMTPSecure = 'tls';
    }
    add_action('phpmailer_init', 'stratafitness_mailtrap_smtp');
}

// ── Allow SVG uploads ──
function stratafitness_allow_svg($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'stratafitness_allow_svg');

// ── Apply Form: AJAX Handler ──
function stratafitness_handle_apply_form() {
    // Verify nonce
    if (!isset($_POST['strata_apply_nonce']) || !wp_verify_nonce($_POST['strata_apply_nonce'], 'strata_apply_form')) {
        wp_send_json_error(array('message' => __('Security check failed. Please refresh the page and try again.', 'stratafitness')));
    }

    // Honeypot check
    if (!empty($_POST['website'])) {
        // Silently succeed so bots don't know they were caught
        wp_send_json_success(array('message' => __('Thank you! Your application has been sent.', 'stratafitness')));
    }

    // Sanitize & validate inputs
    $name       = isset($_POST['apply-name']) ? sanitize_text_field(wp_unslash($_POST['apply-name'])) : '';
    $email      = isset($_POST['apply-email']) ? sanitize_email(wp_unslash($_POST['apply-email'])) : '';
    $discipline = isset($_POST['discipline']) ? sanitize_text_field(wp_unslash($_POST['discipline'])) : '';
    $goals      = isset($_POST['apply-goals']) ? sanitize_textarea_field(wp_unslash($_POST['apply-goals'])) : '';

    if (empty($name) || empty($email) || empty($goals)) {
        wp_send_json_error(array('message' => __('Please fill in all required fields.', 'stratafitness')));
    }

    if (!is_email($email)) {
        wp_send_json_error(array('message' => __('Please enter a valid email address.', 'stratafitness')));
    }

    // Build email
    $discipline_labels = array(
        'pt' => 'Personal Training',
        'rc' => 'Remote Coaching',
        'nc' => 'Nutrition Coaching',
    );
    $discipline_label = isset($discipline_labels[$discipline]) ? $discipline_labels[$discipline] : $discipline;

    $to      = get_theme_mod('strata_home_apply_direct_email', 'jon@stratafitnesshk.com');
    $subject = sprintf('[Strata] New Application from %s — %s', $name, $discipline_label);

    $body  = "NEW COACHING APPLICATION\n";
    $body .= "=======================\n\n";
    $body .= "Name:       {$name}\n";
    $body .= "Email:      {$email}\n";
    $body .= "Discipline: {$discipline_label}\n\n";
    $body .= "GOALS / NOTES:\n";
    $body .= "--------------\n";
    $body .= $goals . "\n\n";
    $body .= "— Sent from Strata Fitness Website\n";

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
    );

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => __('Thank you! Your application has been sent. We\'ll get back to you within 24 hours.', 'stratafitness')));
    } else {
        wp_send_json_error(array('message' => __('Sorry, something went wrong. Please email us directly at ', 'stratafitness') . $to));
    }
}
add_action('wp_ajax_strata_apply_form', 'stratafitness_handle_apply_form');
add_action('wp_ajax_nopriv_strata_apply_form', 'stratafitness_handle_apply_form');

// ── Theme Customizer: editable text & images for every page ──
function stratafitness_customize_register($wp_customize) {

    // ================================================================
    //  HELPER: shorthand to add a text field
    // ================================================================
    $add_text = function($section, $id, $label, $default = '') use ($wp_customize) {
        $wp_customize->add_setting($id, array(
            'default'           => $default,
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $label,
            'section' => $section,
            'type'    => 'text',
        ));
    };

    $add_textarea = function($section, $id, $label, $default = '') use ($wp_customize) {
        $wp_customize->add_setting($id, array(
            'default'           => $default,
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $label,
            'section' => $section,
            'type'    => 'textarea',
        ));
    };

    $add_image = function($section, $id, $label) use ($wp_customize) {
        $wp_customize->add_setting($id, array(
            'default'           => '',
            'sanitize_callback' => 'absint',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, $id, array(
            'label'   => $label,
            'section' => $section,
            'mime_type' => 'image',
        )));
    };

    $add_url = function($section, $id, $label, $default = '') use ($wp_customize) {
        $wp_customize->add_setting($id, array(
            'default'           => $default,
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));
        $wp_customize->add_control($id, array(
            'label'   => $label,
            'section' => $section,
            'type'    => 'url',
        ));
    };

    // ================================================================
    //  PANEL: Personal Training
    // ================================================================
    $wp_customize->add_panel('strata_pt_panel', array(
        'title'    => __('Personal Training Page', 'stratafitness'),
        'priority' => 130,
    ));

    // -- Hero Section --
    $wp_customize->add_section('strata_pt_hero', array(
        'title' => __('Hero Section', 'stratafitness'),
        'panel' => 'strata_pt_panel',
    ));
    $add_image('strata_pt_hero', 'strata_pt_hero_bg', __('Hero Background Image', 'stratafitness'));
    $add_image('strata_pt_hero', 'strata_pt_hero_reveal', __('Hero Reveal Image (side)', 'stratafitness'));
    $add_text('strata_pt_hero', 'strata_pt_hero_eyebrow_left', __('Eyebrow Left', 'stratafitness'), 'In-Person');
    $add_text('strata_pt_hero', 'strata_pt_hero_eyebrow_right', __('Eyebrow Right', 'stratafitness'), 'Coaching');
    $add_text('strata_pt_hero', 'strata_pt_hero_headline_left', __('Headline Left', 'stratafitness'), 'Personal');
    $add_text('strata_pt_hero', 'strata_pt_hero_headline_right', __('Headline Right (italic)', 'stratafitness'), 'Training');
    $add_text('strata_pt_hero', 'strata_pt_hero_sub_left', __('Sub Left', 'stratafitness'), 'Elite one-on-one coaching focused on flawless mechanics');
    $add_text('strata_pt_hero', 'strata_pt_hero_sub_right', __('Sub Right', 'stratafitness'), 'and absolute physical development.');

    // -- Intro Section --
    $wp_customize->add_section('strata_pt_intro', array(
        'title' => __('Intro Section', 'stratafitness'),
        'panel' => 'strata_pt_panel',
    ));
    $add_text('strata_pt_intro', 'strata_pt_intro_eyebrow', __('Eyebrow', 'stratafitness'), '— IN-STUDIO ELITE');
    $add_text('strata_pt_intro', 'strata_pt_intro_headline_1', __('Headline Line 1', 'stratafitness'), 'FLAWLESS');
    $add_text('strata_pt_intro', 'strata_pt_intro_headline_italic', __('Headline Italic', 'stratafitness'), 'mechanics.');
    $add_textarea('strata_pt_intro', 'strata_pt_intro_desc', __('Description', 'stratafitness'), 'Elite one-on-one coaching focused on flawless mechanics, intensity management, and absolute physical development. We engineer superior athletes — not workout consumers.');

    // -- What's Included Section --
    $wp_customize->add_section('strata_pt_includes', array(
        'title' => __('What\'s Included', 'stratafitness'),
        'panel' => 'strata_pt_panel',
    ));
    $add_text('strata_pt_includes', 'strata_pt_includes_eyebrow', __('Eyebrow', 'stratafitness'), '— WHAT\'S INCLUDED');
    $add_text('strata_pt_includes', 'strata_pt_includes_headline_1', __('Headline Line 1', 'stratafitness'), 'PROGRAMMING');
    $add_text('strata_pt_includes', 'strata_pt_includes_headline_2', __('Headline Line 2', 'stratafitness'), 'BUILT AROUND');
    $add_text('strata_pt_includes', 'strata_pt_includes_headline_italic', __('Headline Italic', 'stratafitness'), 'you.');

    for ($i = 1; $i <= 4; $i++) {
        $defaults = array(
            1 => array('Customized Training Blocks', 'Macrocycles built to your individual biomechanics, training history, and competitive calendar.'),
            2 => array('Real-time Form Correction', 'Cue-by-cue mechanical refinement and intensity management on every set, every session.'),
            3 => array('Regular Physical Assessments', 'Quarterly metric monitoring — strength, mobility, body composition, work capacity.'),
            4 => array('Direct Coach Access', 'Recovery, lifestyle, and programming questions answered between sessions. You\'re never coaching alone.'),
        );
        $add_text('strata_pt_includes', "strata_pt_item{$i}_title", __("Item {$i} Title", 'stratafitness'), $defaults[$i][0]);
        $add_textarea('strata_pt_includes', "strata_pt_item{$i}_desc", __("Item {$i} Description", 'stratafitness'), $defaults[$i][1]);
    }

    // -- Sticky Card --
    $wp_customize->add_section('strata_pt_card', array(
        'title' => __('Sticky Side Card', 'stratafitness'),
        'panel' => 'strata_pt_panel',
    ));
    $add_text('strata_pt_card', 'strata_pt_card_badge', __('Badge Text', 'stratafitness'), 'Discipline 01');
    $add_text('strata_pt_card', 'strata_pt_card_headline_1', __('Headline Line 1', 'stratafitness'), 'BUILT FOR');
    $add_text('strata_pt_card', 'strata_pt_card_headline_italic', __('Headline Italic', 'stratafitness'), 'athletes.');
    $add_text('strata_pt_card', 'strata_pt_card_bottom_left', __('Bottom Left Text', 'stratafitness'), 'HONG KONG');
    $add_text('strata_pt_card', 'strata_pt_card_bottom_right', __('Bottom Right Text', 'stratafitness'), '3 MONTH MIN.');
    $add_url('strata_pt_card', 'strata_pt_card_apply_url', __('APPLY Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/30-min-consult-assessment');

    // -- Investment Section --
    $wp_customize->add_section('strata_pt_investment', array(
        'title' => __('Investment Section', 'stratafitness'),
        'panel' => 'strata_pt_panel',
    ));
    $add_text('strata_pt_investment', 'strata_pt_inv_eyebrow', __('Eyebrow', 'stratafitness'), '— INVESTMENT');
    $add_text('strata_pt_investment', 'strata_pt_inv_headline_1', __('Headline Line 1', 'stratafitness'), 'MONTHLY');
    $add_text('strata_pt_investment', 'strata_pt_inv_headline_2', __('Headline Line 2', 'stratafitness'), 'RETAINER.');
    $add_text('strata_pt_investment', 'strata_pt_inv_headline_italic', __('Headline Italic', 'stratafitness'), 'Three-month minimum.');
    $add_textarea('strata_pt_investment', 'strata_pt_inv_desc', __('Description', 'stratafitness'), 'We don\'t sell session packages — we sell physiological change, and that requires runway.');
    $add_text('strata_pt_investment', 'strata_pt_inv_box_label', __('Pricing Box Label', 'stratafitness'), 'PERSONAL TRAINING');
    $add_text('strata_pt_investment', 'strata_pt_inv_box_headline_1', __('Pricing Box Headline 1', 'stratafitness'), 'MONTHLY RETAINER.');
    $add_text('strata_pt_investment', 'strata_pt_inv_box_headline_2', __('Pricing Box Headline 2', 'stratafitness'), 'QUARTERLY COMMITMENT.');
    $add_textarea('strata_pt_investment', 'strata_pt_inv_box_desc', __('Pricing Box Description', 'stratafitness'), 'Choose the frequency that matches your goal. Pricing tiers vary based on weekly session volume. Detailed pricing shared during your consultation — built around your training prescription.');
    $add_text('strata_pt_investment', 'strata_pt_inv_btn_text', __('Button Text', 'stratafitness'), 'GET PRICING');
    $add_url('strata_pt_investment', 'strata_pt_inv_btn_url', __('Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/30-min-consult-assessment');

    for ($i = 1; $i <= 3; $i++) {
        $tiers = array(1 => array('TIER 01', '2x / WEEK'), 2 => array('TIER 02', '3x / WEEK'), 3 => array('TIER 03', '4x / WEEK'));
        $add_text('strata_pt_investment', "strata_pt_tier{$i}_name", __("Tier {$i} Name", 'stratafitness'), $tiers[$i][0]);
        $add_text('strata_pt_investment', "strata_pt_tier{$i}_freq", __("Tier {$i} Frequency", 'stratafitness'), $tiers[$i][1]);
    }

    // -- Process Section --
    $wp_customize->add_section('strata_pt_process', array(
        'title' => __('Process Section', 'stratafitness'),
        'panel' => 'strata_pt_panel',
    ));
    $add_text('strata_pt_process', 'strata_pt_proc_eyebrow', __('Eyebrow', 'stratafitness'), '— THE PROCESS');
    $add_text('strata_pt_process', 'strata_pt_proc_headline_1', __('Headline Line 1', 'stratafitness'), 'THREE STEPS');
    $add_text('strata_pt_process', 'strata_pt_proc_headline_2', __('Headline Line 2', 'stratafitness'), 'TO');
    $add_text('strata_pt_process', 'strata_pt_proc_headline_italic', __('Headline Italic', 'stratafitness'), 'execution.');

    $proc_defaults = array(
        1 => array('Consultation & Assessment', 'A 30-minute deep dive into your training history, injury profile, and absolute goals, followed by a movement screening.'),
        2 => array('Onboarding', 'You will be integrated into our systems. We build your initial physiological profile and design phase one of your training macrocycle.'),
        3 => array('Active Client', 'Execution begins. You show up, put in the work under strict supervision, and we track the data to ensure constant progression.'),
    );
    for ($i = 1; $i <= 3; $i++) {
        $add_text('strata_pt_process', "strata_pt_proc_step{$i}_title", __("Step {$i} Title", 'stratafitness'), $proc_defaults[$i][0]);
        $add_textarea('strata_pt_process', "strata_pt_proc_step{$i}_desc", __("Step {$i} Description", 'stratafitness'), $proc_defaults[$i][1]);
    }

    // -- Final CTA Section --
    $wp_customize->add_section('strata_pt_cta', array(
        'title' => __('Final CTA Section', 'stratafitness'),
        'panel' => 'strata_pt_panel',
    ));
    $add_text('strata_pt_cta', 'strata_pt_cta_eyebrow', __('Eyebrow', 'stratafitness'), '— APPLY');
    $add_text('strata_pt_cta', 'strata_pt_cta_headline_1', __('Headline Line 1', 'stratafitness'), 'ENGINEER YOUR');
    $add_text('strata_pt_cta', 'strata_pt_cta_headline_italic', __('Headline Italic', 'stratafitness'), 'performance.');
    $add_textarea('strata_pt_cta', 'strata_pt_cta_desc', __('Description', 'stratafitness'), 'Book a 30-minute consultation. We\'ll assess your current baseline, training history, and goals — then show you what your first 90 days under Strata\'s training system look like.');
    $add_text('strata_pt_cta', 'strata_pt_cta_btn_text', __('Primary Button Text', 'stratafitness'), 'BOOK CONSULTATION');
    $add_url('strata_pt_cta', 'strata_pt_cta_btn_url', __('Primary Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/30-min-consult-assessment');
    $add_text('strata_pt_cta', 'strata_pt_cta_secondary_text', __('Secondary Button Text', 'stratafitness'), 'EXPLORE REMOTE COACHING');

    // ================================================================
    //  PANEL: Remote Coaching
    // ================================================================
    $wp_customize->add_panel('strata_rc_panel', array(
        'title'    => __('Remote Coaching Page', 'stratafitness'),
        'priority' => 131,
    ));

    $wp_customize->add_section('strata_rc_hero', array('title' => __('Hero Section', 'stratafitness'), 'panel' => 'strata_rc_panel'));
    $add_image('strata_rc_hero', 'strata_rc_hero_bg', __('Hero Background Image', 'stratafitness'));
    $add_image('strata_rc_hero', 'strata_rc_hero_reveal', __('Hero Reveal Image', 'stratafitness'));
    $add_text('strata_rc_hero', 'strata_rc_hero_eyebrow_left', __('Eyebrow Left', 'stratafitness'), 'Online');
    $add_text('strata_rc_hero', 'strata_rc_hero_eyebrow_right', __('Eyebrow Right', 'stratafitness'), 'Coaching');
    $add_text('strata_rc_hero', 'strata_rc_hero_headline_left', __('Headline Left', 'stratafitness'), 'Remote');
    $add_text('strata_rc_hero', 'strata_rc_hero_headline_right', __('Headline Right', 'stratafitness'), 'Coaching');
    $add_text('strata_rc_hero', 'strata_rc_hero_sub_left', __('Sub Left', 'stratafitness'), 'High-level programming and accountability for self-motivated');
    $add_text('strata_rc_hero', 'strata_rc_hero_sub_right', __('Sub Right', 'stratafitness'), 'individuals anywhere in the world.');

    $wp_customize->add_section('strata_rc_intro', array('title' => __('Intro Section', 'stratafitness'), 'panel' => 'strata_rc_panel'));
    $add_text('strata_rc_intro', 'strata_rc_intro_eyebrow', __('Eyebrow', 'stratafitness'), '— ANYWHERE ON EARTH');
    $add_text('strata_rc_intro', 'strata_rc_intro_headline_1', __('Headline Line 1', 'stratafitness'), 'SAME STANDARD.');
    $add_text('strata_rc_intro', 'strata_rc_intro_headline_italic', __('Headline Italic', 'stratafitness'), 'No studio required.');
    $add_textarea('strata_rc_intro', 'strata_rc_intro_desc', __('Description', 'stratafitness'), 'The Strata methodology — transplanted into your gym, your schedule, your time zone. The athlete supplies the discipline. We supply the architecture. Built for the disciplined, not the dependent.');

    $wp_customize->add_section('strata_rc_includes', array('title' => __('What\'s Included', 'stratafitness'), 'panel' => 'strata_rc_panel'));
    $add_text('strata_rc_includes', 'strata_rc_includes_eyebrow', __('Eyebrow', 'stratafitness'), '— WHAT\'S INCLUDED');
    $add_text('strata_rc_includes', 'strata_rc_includes_headline_1', __('Headline Line 1', 'stratafitness'), 'PROGRAMMING');
    $add_text('strata_rc_includes', 'strata_rc_includes_headline_2', __('Headline Line 2', 'stratafitness'), 'BUILT AROUND');
    $add_text('strata_rc_includes', 'strata_rc_includes_headline_italic', __('Headline Italic', 'stratafitness'), 'you.');

    $rc_items = array(
        1 => array('Weekly Individualized Programming', 'Custom-built training weeks delivered in advance, with structured feedback loops.'),
        2 => array('Asynchronous Video Form Analysis', 'Submit lifts. Receive cue-by-cue mechanical breakdowns within 24 hours.'),
        3 => array('Weekly Check-Ins', 'Sleep, stress, readiness, and recovery markers — reviewed and adjusted every seven days.'),
        4 => array('Direct Messaging', 'Urgent adjustments, technique questions, and lifestyle pivots — handled in-channel.'),
    );
    for ($i = 1; $i <= 4; $i++) {
        $add_text('strata_rc_includes', "strata_rc_item{$i}_title", __("Item {$i} Title", 'stratafitness'), $rc_items[$i][0]);
        $add_textarea('strata_rc_includes', "strata_rc_item{$i}_desc", __("Item {$i} Description", 'stratafitness'), $rc_items[$i][1]);
    }

    $wp_customize->add_section('strata_rc_card', array('title' => __('Sticky Side Card', 'stratafitness'), 'panel' => 'strata_rc_panel'));
    $add_text('strata_rc_card', 'strata_rc_card_badge', __('Badge Text', 'stratafitness'), 'Discipline 02');
    $add_text('strata_rc_card', 'strata_rc_card_headline_1', __('Headline Line 1', 'stratafitness'), 'BUILT FOR');
    $add_text('strata_rc_card', 'strata_rc_card_headline_italic', __('Headline Italic', 'stratafitness'), 'athletes.');
    $add_text('strata_rc_card', 'strata_rc_card_bottom_left', __('Bottom Left', 'stratafitness'), 'HONG KONG');
    $add_text('strata_rc_card', 'strata_rc_card_bottom_right', __('Bottom Right', 'stratafitness'), '3 MONTH MIN.');
    $add_url('strata_rc_card', 'strata_rc_card_apply_url', __('APPLY Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/remotecoachingcall');

    $wp_customize->add_section('strata_rc_investment', array('title' => __('Investment Section', 'stratafitness'), 'panel' => 'strata_rc_panel'));
    $add_text('strata_rc_investment', 'strata_rc_inv_eyebrow', __('Eyebrow', 'stratafitness'), '— INVESTMENT');
    $add_text('strata_rc_investment', 'strata_rc_inv_headline_1', __('Headline Line 1', 'stratafitness'), 'MONTHLY');
    $add_text('strata_rc_investment', 'strata_rc_inv_headline_2', __('Headline Line 2', 'stratafitness'), 'RETAINER.');
    $add_text('strata_rc_investment', 'strata_rc_inv_headline_italic', __('Headline Italic', 'stratafitness'), 'Three-month minimum.');
    $add_textarea('strata_rc_investment', 'strata_rc_inv_desc', __('Description', 'stratafitness'), 'We don\'t sell session packages — we sell physiological change, and that requires runway.');
    $add_text('strata_rc_investment', 'strata_rc_inv_box_label', __('Pricing Box Label', 'stratafitness'), 'REMOTE COACHING');
    $add_text('strata_rc_investment', 'strata_rc_inv_box_headline_1', __('Pricing Box Headline 1', 'stratafitness'), 'ONE SUBSCRIPTION.');
    $add_text('strata_rc_investment', 'strata_rc_inv_box_headline_2', __('Pricing Box Headline 2', 'stratafitness'), 'FULL COACHING ACCESS.');
    $add_textarea('strata_rc_investment', 'strata_rc_inv_box_desc', __('Pricing Box Description', 'stratafitness'), 'Programming, video review, weekly check-ins, and direct messaging — bundled into a single flat monthly fee. No hidden fees. Pricing shared during your discovery call.');
    $add_text('strata_rc_investment', 'strata_rc_inv_btn_text', __('Button Text', 'stratafitness'), 'GET PRICING');
    $add_url('strata_rc_investment', 'strata_rc_inv_btn_url', __('Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/remotecoachingcall');

    $rc_tiers = array(1 => array('PROGRAMMING', 'WEEKLY'), 2 => array('VIDEO REVIEW', 'ASYNC < 24H'), 3 => array('CHECK-INS', 'WEEKLY'), 4 => array('MESSAGING', 'DIRECT'));
    for ($i = 1; $i <= 4; $i++) {
        $add_text('strata_rc_investment', "strata_rc_tier{$i}_name", __("Tier {$i} Name", 'stratafitness'), $rc_tiers[$i][0]);
        $add_text('strata_rc_investment', "strata_rc_tier{$i}_freq", __("Tier {$i} Value", 'stratafitness'), $rc_tiers[$i][1]);
    }

    // -- Quiz Section --
    $wp_customize->add_section('strata_rc_quiz', array('title' => __('Quiz Section', 'stratafitness'), 'panel' => 'strata_rc_panel'));
    $wp_customize->add_setting('strata_rc_quiz_enabled', array('default' => true, 'sanitize_callback' => 'wp_validate_boolean', 'transport' => 'refresh'));
    $wp_customize->add_control('strata_rc_quiz_enabled', array('label' => __('Show Quiz Section', 'stratafitness'), 'section' => 'strata_rc_quiz', 'type' => 'checkbox'));
    $add_text('strata_rc_quiz', 'strata_rc_quiz_title', __('Quiz Title', 'stratafitness'), 'CrossFit Athlete Performance Quiz');

    // -- Final CTA Section --
    $wp_customize->add_section('strata_rc_cta', array('title' => __('Final CTA Section', 'stratafitness'), 'panel' => 'strata_rc_panel'));
    $add_text('strata_rc_cta', 'strata_rc_cta_eyebrow', __('Eyebrow', 'stratafitness'), '— APPLY');
    $add_text('strata_rc_cta', 'strata_rc_cta_headline_1', __('Headline Line 1', 'stratafitness'), 'ENGINEER YOUR');
    $add_text('strata_rc_cta', 'strata_rc_cta_headline_italic', __('Headline Italic', 'stratafitness'), 'progress.');
    $add_textarea('strata_rc_cta', 'strata_rc_cta_desc', __('Description', 'stratafitness'), 'Book a 30-minute discovery call. We\'ll assess your current baseline, training history, and goals — then show you what your first 90 days under Strata\'s remote system look like.');
    $add_text('strata_rc_cta', 'strata_rc_cta_btn_text', __('Primary Button Text', 'stratafitness'), 'BOOK DISCOVERY CALL');
    $add_url('strata_rc_cta', 'strata_rc_cta_btn_url', __('Primary Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/remotecoachingcall');
    $add_text('strata_rc_cta', 'strata_rc_cta_secondary_text', __('Secondary Button Text', 'stratafitness'), 'EXPLORE NUTRITION COACHING');

    $wp_customize->add_section('strata_rc_process', array('title' => __('Process Section', 'stratafitness'), 'panel' => 'strata_rc_panel'));
    $add_text('strata_rc_process', 'strata_rc_proc_eyebrow', __('Eyebrow', 'stratafitness'), '— THE PROCESS');
    $add_text('strata_rc_process', 'strata_rc_proc_headline_1', __('Headline Line 1', 'stratafitness'), 'THREE STEPS');
    $add_text('strata_rc_process', 'strata_rc_proc_headline_2', __('Headline Line 2', 'stratafitness'), 'TO');
    $add_text('strata_rc_process', 'strata_rc_proc_headline_italic', __('Headline Italic', 'stratafitness'), 'execution.');
    $add_textarea('strata_rc_process', 'strata_rc_proc_desc', __('Description', 'stratafitness'), 'Every athlete enters the same architecture. What changes is the prescription.');

    $rc_steps = array(
        1 => array('Discovery Call', 'A detailed conversation to ensure you are a good fit for remote coaching, discussing your gym access, schedule, and discipline levels.'),
        2 => array('Onboarding', 'You complete a comprehensive physical and lifestyle questionnaire. We set up your app access and deliver your first week of programming.'),
        3 => array('Weekly Execution', 'You train, record specific working sets, and submit your weekly check-in form. We review the data, adjust the variables, and set the target for the next week.'),
    );
    for ($i = 1; $i <= 3; $i++) {
        $add_text('strata_rc_process', "strata_rc_proc_step{$i}_title", __("Step {$i} Title", 'stratafitness'), $rc_steps[$i][0]);
        $add_textarea('strata_rc_process', "strata_rc_proc_step{$i}_desc", __("Step {$i} Description", 'stratafitness'), $rc_steps[$i][1]);
    }

    // ================================================================
    //  PANEL: Nutrition Coaching
    // ================================================================
    $wp_customize->add_panel('strata_nc_panel', array(
        'title'    => __('Nutrition Coaching Page', 'stratafitness'),
        'priority' => 132,
    ));

    $wp_customize->add_section('strata_nc_hero', array('title' => __('Hero Section', 'stratafitness'), 'panel' => 'strata_nc_panel'));
    $add_image('strata_nc_hero', 'strata_nc_hero_bg', __('Hero Background Image', 'stratafitness'));
    $add_image('strata_nc_hero', 'strata_nc_hero_reveal', __('Hero Reveal Image', 'stratafitness'));
    $add_text('strata_nc_hero', 'strata_nc_hero_eyebrow_left', __('Eyebrow Left', 'stratafitness'), 'Data-Driven');
    $add_text('strata_nc_hero', 'strata_nc_hero_eyebrow_right', __('Eyebrow Right', 'stratafitness'), 'Protocol');
    $add_text('strata_nc_hero', 'strata_nc_hero_headline_left', __('Headline Left', 'stratafitness'), 'Nutrition');
    $add_text('strata_nc_hero', 'strata_nc_hero_headline_right', __('Headline Right', 'stratafitness'), 'Coaching');
    $add_text('strata_nc_hero', 'strata_nc_hero_sub_left', __('Sub Left', 'stratafitness'), 'Strategic macronutrient management designed to optimize');
    $add_text('strata_nc_hero', 'strata_nc_hero_sub_right', __('Sub Right', 'stratafitness'), 'performance, recovery, and body composition.');

    $wp_customize->add_section('strata_nc_intro', array('title' => __('Intro Section', 'stratafitness'), 'panel' => 'strata_nc_panel'));
    $add_text('strata_nc_intro', 'strata_nc_intro_eyebrow', __('Eyebrow', 'stratafitness'), '— STRATEGIC FUELING');
    $add_text('strata_nc_intro', 'strata_nc_intro_headline_1', __('Headline Line 1', 'stratafitness'), 'PERIODIZED');
    $add_text('strata_nc_intro', 'strata_nc_intro_headline_italic', __('Headline Italic', 'stratafitness'), 'precision.');
    $add_textarea('strata_nc_intro', 'strata_nc_intro_desc', __('Description', 'stratafitness'), 'Macronutrient targets engineered against your training load, body composition goals, and recovery markers. Adjusted bi-weekly. Built to last. Nutrition is the foundation that programming sits on — we treat it that way.');

    $wp_customize->add_section('strata_nc_includes', array('title' => __('What\'s Included', 'stratafitness'), 'panel' => 'strata_nc_panel'));
    $add_text('strata_nc_includes', 'strata_nc_includes_eyebrow', __('Eyebrow', 'stratafitness'), '— WHAT\'S INCLUDED');
    $add_text('strata_nc_includes', 'strata_nc_includes_headline_1', __('Headline Line 1', 'stratafitness'), 'PROGRAMMING');
    $add_text('strata_nc_includes', 'strata_nc_includes_headline_2', __('Headline Line 2', 'stratafitness'), 'BUILT AROUND');
    $add_text('strata_nc_includes', 'strata_nc_includes_headline_italic', __('Headline Italic', 'stratafitness'), 'you.');

    $nc_items = array(
        1 => array('Daily Macro & Caloric Targets', 'Customized to your physiology, training week, and current adaptation phase.'),
        2 => array('Pre/Post-Training Nutrient Timing', 'Strategic peri-workout fueling to maximize performance and recovery quality.'),
        3 => array('Supplementation Guidelines', 'Evidence-based recommendations tailored to your gaps — no kitchen-sink stacks.'),
        4 => array('Bi-Weekly Adjustments', 'Protocols recalibrated against weight, sleep, hunger, and energy data — every two weeks.'),
    );
    for ($i = 1; $i <= 4; $i++) {
        $add_text('strata_nc_includes', "strata_nc_item{$i}_title", __("Item {$i} Title", 'stratafitness'), $nc_items[$i][0]);
        $add_textarea('strata_nc_includes', "strata_nc_item{$i}_desc", __("Item {$i} Description", 'stratafitness'), $nc_items[$i][1]);
    }

    $wp_customize->add_section('strata_nc_card', array('title' => __('Sticky Side Card', 'stratafitness'), 'panel' => 'strata_nc_panel'));
    $add_text('strata_nc_card', 'strata_nc_card_badge', __('Badge Text', 'stratafitness'), 'Discipline 03');
    $add_text('strata_nc_card', 'strata_nc_card_headline_1', __('Headline Line 1', 'stratafitness'), 'BUILT FOR');
    $add_text('strata_nc_card', 'strata_nc_card_headline_italic', __('Headline Italic', 'stratafitness'), 'athletes.');
    $add_text('strata_nc_card', 'strata_nc_card_bottom_left', __('Bottom Left', 'stratafitness'), 'HONG KONG');
    $add_text('strata_nc_card', 'strata_nc_card_bottom_right', __('Bottom Right', 'stratafitness'), '3 MONTH MIN.');
    $add_url('strata_nc_card', 'strata_nc_card_apply_url', __('APPLY Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/nutrition-discovery-call');

    $wp_customize->add_section('strata_nc_investment', array('title' => __('Investment Section', 'stratafitness'), 'panel' => 'strata_nc_panel'));
    $add_text('strata_nc_investment', 'strata_nc_inv_eyebrow', __('Eyebrow', 'stratafitness'), '— INVESTMENT');
    $add_text('strata_nc_investment', 'strata_nc_inv_headline_1', __('Headline Line 1', 'stratafitness'), 'MONTHLY');
    $add_text('strata_nc_investment', 'strata_nc_inv_headline_2', __('Headline Line 2', 'stratafitness'), 'RETAINER.');
    $add_text('strata_nc_investment', 'strata_nc_inv_headline_italic', __('Headline Italic', 'stratafitness'), 'Three-month minimum.');
    $add_textarea('strata_nc_investment', 'strata_nc_inv_desc', __('Description', 'stratafitness'), 'We don\'t sell session packages — we sell physiological change, and that requires runway.');
    $add_text('strata_nc_investment', 'strata_nc_inv_box_label', __('Pricing Box Label', 'stratafitness'), 'NUTRITION COACHING');
    $add_text('strata_nc_investment', 'strata_nc_inv_box_headline_1', __('Pricing Box Headline 1', 'stratafitness'), 'STANDALONE OR');
    $add_text('strata_nc_investment', 'strata_nc_inv_box_headline_2', __('Pricing Box Headline 2', 'stratafitness'), 'BUNDLED.');
    $add_textarea('strata_nc_investment', 'strata_nc_inv_box_desc', __('Pricing Box Description', 'stratafitness'), 'Available as a standalone service or bundled with Personal Training or Remote Coaching. 3-month minimum is required to assess true metabolic response.');
    $add_text('strata_nc_investment', 'strata_nc_inv_btn_text', __('Button Text', 'stratafitness'), 'GET PRICING');
    $add_url('strata_nc_investment', 'strata_nc_inv_btn_url', __('Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/nutrition-discovery-call');

    $nc_tiers = array(1 => array('STANDALONE', 'MONTHLY'), 2 => array('+ PERSONAL TRAINING', 'BUNDLED'), 3 => array('+ REMOTE COACHING', 'BUNDLED'));
    for ($i = 1; $i <= 3; $i++) {
        $add_text('strata_nc_investment', "strata_nc_tier{$i}_name", __("Tier {$i} Name", 'stratafitness'), $nc_tiers[$i][0]);
        $add_text('strata_nc_investment', "strata_nc_tier{$i}_freq", __("Tier {$i} Value", 'stratafitness'), $nc_tiers[$i][1]);
    }

    $wp_customize->add_section('strata_nc_process', array('title' => __('Process Section', 'stratafitness'), 'panel' => 'strata_nc_panel'));
    $add_text('strata_nc_process', 'strata_nc_proc_eyebrow', __('Eyebrow', 'stratafitness'), '— THE PROCESS');
    $add_text('strata_nc_process', 'strata_nc_proc_headline_1', __('Headline Line 1', 'stratafitness'), 'THREE STEPS');
    $add_text('strata_nc_process', 'strata_nc_proc_headline_2', __('Headline Line 2', 'stratafitness'), 'TO');
    $add_text('strata_nc_process', 'strata_nc_proc_headline_italic', __('Headline Italic', 'stratafitness'), 'execution.');
    $add_textarea('strata_nc_process', 'strata_nc_proc_desc', __('Description', 'stratafitness'), 'Every athlete enters the same architecture. What changes is the prescription.');

    $nc_steps = array(
        1 => array('Discovery Call', 'Assessment of dieting history, current metabolic state, training load, and outcome goals. We diagnose before we prescribe.'),
        2 => array('Onboarding', 'Baseline metrics established. Client tracks intake honestly for 3-5 days. Your initial protocol is then prescribed.'),
        3 => array('Weekly Check-In', 'Morning weight, sleep quality, hunger, and energy levels reported. Bi-weekly recalibration against the data.'),
    );
    for ($i = 1; $i <= 3; $i++) {
        $add_text('strata_nc_process', "strata_nc_proc_step{$i}_title", __("Step {$i} Title", 'stratafitness'), $nc_steps[$i][0]);
        $add_textarea('strata_nc_process', "strata_nc_proc_step{$i}_desc", __("Step {$i} Description", 'stratafitness'), $nc_steps[$i][1]);
    }

    $wp_customize->add_section('strata_nc_cta', array('title' => __('Final CTA Section', 'stratafitness'), 'panel' => 'strata_nc_panel'));
    $add_text('strata_nc_cta', 'strata_nc_cta_eyebrow', __('Eyebrow', 'stratafitness'), '— APPLY');
    $add_text('strata_nc_cta', 'strata_nc_cta_headline_1', __('Headline Line 1', 'stratafitness'), 'ENGINEER YOUR');
    $add_text('strata_nc_cta', 'strata_nc_cta_headline_italic', __('Headline Italic', 'stratafitness'), 'fueling.');
    $add_textarea('strata_nc_cta', 'strata_nc_cta_desc', __('Description', 'stratafitness'), 'Book a 30-minute discovery call. We\'ll assess your current metabolic state, dieting history, and goals — then show you what your first 90 days under Strata\'s nutrition system look like.');
    $add_text('strata_nc_cta', 'strata_nc_cta_btn_text', __('Primary Button Text', 'stratafitness'), 'BOOK DISCOVERY CALL');
    $add_url('strata_nc_cta', 'strata_nc_cta_btn_url', __('Primary Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/nutrition-discovery-call');
    $add_text('strata_nc_cta', 'strata_nc_cta_secondary_text', __('Secondary Button Text', 'stratafitness'), 'EXPLORE PERSONAL TRAINING');

    // ================================================================
    //  PANEL: Homepage
    // ================================================================
    $wp_customize->add_panel('strata_home_panel', array(
        'title'    => __('Homepage', 'stratafitness'),
        'priority' => 129,
    ));

    // --- Hero Section ---
    $wp_customize->add_section('strata_home_hero', array('title' => __('Hero Section', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_image('strata_home_hero', 'strata_home_hero_bg', __('Hero Background Image', 'stratafitness'));
    $add_image('strata_home_hero', 'strata_home_hero_reveal', __('Hero Reveal Image', 'stratafitness'));
    $add_text('strata_home_hero', 'strata_home_hero_eyebrow_left', __('Eyebrow Left', 'stratafitness'), 'Elite Performance');
    $add_text('strata_home_hero', 'strata_home_hero_eyebrow_right', __('Eyebrow Right', 'stratafitness'), 'Coaching · Hong Kong');
    $add_text('strata_home_hero', 'strata_home_hero_headline_left', __('Headline Left', 'stratafitness'), 'We Build');
    $add_text('strata_home_hero', 'strata_home_hero_headline_right', __('Headline Right', 'stratafitness'), 'Athletes.');
    $add_text('strata_home_hero', 'strata_home_hero_sub_left', __('Sub Left', 'stratafitness'), 'Competitive athletes and driven professionals.');
    $add_text('strata_home_hero', 'strata_home_hero_sub_right', __('Sub Right', 'stratafitness'), 'We engineer performance not workouts.');

    // --- Mandate Section ---
    $wp_customize->add_section('strata_home_mandate', array('title' => __('Mandate Section', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_text('strata_home_mandate', 'strata_home_mandate_eyebrow', __('Eyebrow', 'stratafitness'), '— Our Mandate');
    $add_text('strata_home_mandate', 'strata_home_mandate_headline_1', __('Headline Line 1', 'stratafitness'), 'ENGINEER');
    $add_text('strata_home_mandate', 'strata_home_mandate_headline_2', __('Headline Line 2', 'stratafitness'), 'Performance.');
    $add_textarea('strata_home_mandate', 'strata_home_mandate_desc', __('Description', 'stratafitness'), 'For competitive athletes and driven professionals based in Hong Kong and beyond. We build superior athletes through individualized programming, ruthless accountability, and a science-led methodology — not template programs and entertainment.');
    $add_text('strata_home_mandate', 'strata_home_mandate_cta_text', __('CTA Button Text', 'stratafitness'), 'APPLY FOR COACHING');
    $add_url('strata_home_mandate', 'strata_home_mandate_cta_url', __('CTA Button URL', 'stratafitness'), '#apply');
    $add_text('strata_home_mandate', 'strata_home_mandate_outline_text', __('Outline Button Text', 'stratafitness'), 'OUR DISCIPLINES');
    $add_url('strata_home_mandate', 'strata_home_mandate_outline_url', __('Outline Button URL', 'stratafitness'), '#services');

    // --- Credentials Section ---
    $wp_customize->add_section('strata_home_creds', array('title' => __('Credentials Section', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_text('strata_home_creds', 'strata_home_creds_eyebrow', __('Eyebrow', 'stratafitness'), '— Credentials');
    $add_text('strata_home_creds', 'strata_home_creds_title', __('Title', 'stratafitness'), 'Educated by the Best.');
    $add_textarea('strata_home_creds', 'strata_home_creds_sub', __('Subtitle', 'stratafitness'), 'Certifications from the institutions that set the global standard for strength, mobility, sport, and nutrition.');

    // --- Credential Logos managed via CPT "strata_credential" (see bottom of file) ---

    // --- Services Header ---
    $wp_customize->add_section('strata_home_services', array('title' => __('Services Header', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_text('strata_home_services', 'strata_home_services_eyebrow', __('Eyebrow', 'stratafitness'), '— Three Paths');
    $add_text('strata_home_services', 'strata_home_services_headline_1', __('Headline Line 1', 'stratafitness'), 'ONE');
    $add_text('strata_home_services', 'strata_home_services_headline_2', __('Headline Line 2', 'stratafitness'), 'Standard.');
    $add_textarea('strata_home_services', 'strata_home_services_desc', __('Description', 'stratafitness'), 'Every Strata service operates under a single principle: engineer the athlete, don\'t entertain them. Choose your path — every one is built on data, intent, and measurable outcomes.');

    // --- Service Card: Personal Training ---
    $wp_customize->add_section('strata_home_svc_pt', array('title' => __('Service Card: Personal Training', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_image('strata_home_svc_pt', 'strata_home_svc_pt_bg', __('Card Background Image', 'stratafitness'));
    $add_text('strata_home_svc_pt', 'strata_home_svc_pt_tag', __('Tag Number', 'stratafitness'), '01');
    $add_text('strata_home_svc_pt', 'strata_home_svc_pt_title', __('Title', 'stratafitness'), 'In-Person Personal Training');
    $add_textarea('strata_home_svc_pt', 'strata_home_svc_pt_desc', __('Description', 'stratafitness'), 'One-on-one coaching at our gym in Central, HK. Expert guidance, real-time feedback, and direct supervision for maximum results.');
    $add_text('strata_home_svc_pt', 'strata_home_svc_pt_cta_text', __('CTA Button Text', 'stratafitness'), 'Book Assessment');
    $add_url('strata_home_svc_pt', 'strata_home_svc_pt_cta_url', __('CTA Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/30-min-consult-assessment');
    $add_text('strata_home_svc_pt', 'strata_home_svc_pt_learn_text', __('Learn More Text', 'stratafitness'), 'Learn More');
    $add_url('strata_home_svc_pt', 'strata_home_svc_pt_learn_url', __('Learn More URL', 'stratafitness'), '/personal-training/');

    // --- Service Card: Remote Coaching ---
    $wp_customize->add_section('strata_home_svc_rc', array('title' => __('Service Card: Remote Coaching', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_image('strata_home_svc_rc', 'strata_home_svc_rc_bg', __('Card Background Image', 'stratafitness'));
    $add_text('strata_home_svc_rc', 'strata_home_svc_rc_tag', __('Tag Number', 'stratafitness'), '02');
    $add_text('strata_home_svc_rc', 'strata_home_svc_rc_title', __('Title', 'stratafitness'), 'Remote Coaching');
    $add_textarea('strata_home_svc_rc', 'strata_home_svc_rc_desc', __('Description', 'stratafitness'), 'Complete programming tailored to your goals, capacity, and lifestyle. Includes weekly coaching, form reviews, and real-time program adjustments.');
    $add_text('strata_home_svc_rc', 'strata_home_svc_rc_cta_text', __('CTA Button Text', 'stratafitness'), 'Book a Call');
    $add_url('strata_home_svc_rc', 'strata_home_svc_rc_cta_url', __('CTA Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/remotecoachingcall');
    $add_text('strata_home_svc_rc', 'strata_home_svc_rc_learn_text', __('Learn More Text', 'stratafitness'), 'Learn More');
    $add_url('strata_home_svc_rc', 'strata_home_svc_rc_learn_url', __('Learn More URL', 'stratafitness'), '/remote-coaching/');

    // --- Service Card: Nutrition Coaching ---
    $wp_customize->add_section('strata_home_svc_nc', array('title' => __('Service Card: Nutrition Coaching', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_image('strata_home_svc_nc', 'strata_home_svc_nc_bg', __('Card Background Image', 'stratafitness'));
    $add_text('strata_home_svc_nc', 'strata_home_svc_nc_tag', __('Tag Number', 'stratafitness'), '03');
    $add_text('strata_home_svc_nc', 'strata_home_svc_nc_title', __('Title', 'stratafitness'), 'Nutrition Coaching');
    $add_textarea('strata_home_svc_nc', 'strata_home_svc_nc_desc', __('Description', 'stratafitness'), 'Data-driven nutritional periodization. Optimized for body composition, recovery, and peak performance at every phase of training.');
    $add_text('strata_home_svc_nc', 'strata_home_svc_nc_cta_text', __('CTA Button Text', 'stratafitness'), 'Book Discovery Call');
    $add_url('strata_home_svc_nc', 'strata_home_svc_nc_cta_url', __('CTA Button URL', 'stratafitness'), 'https://go.stratafitnesshk.com/nutrition-discovery-call');
    $add_text('strata_home_svc_nc', 'strata_home_svc_nc_learn_text', __('Learn More Text', 'stratafitness'), 'Learn More');
    $add_url('strata_home_svc_nc', 'strata_home_svc_nc_learn_url', __('Learn More URL', 'stratafitness'), '/nutrition-coaching/');

    // --- Process Section Header ---
    $wp_customize->add_section('strata_home_process', array('title' => __('Process Section Header', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_text('strata_home_process', 'strata_home_process_eyebrow', __('Eyebrow', 'stratafitness'), '— The Process');
    $add_text('strata_home_process', 'strata_home_process_headline_1', __('Headline Line 1', 'stratafitness'), 'ASSESSMENT');
    $add_text('strata_home_process', 'strata_home_process_headline_2', __('Headline Line 2', 'stratafitness'), 'execution.');
    $add_textarea('strata_home_process', 'strata_home_process_desc', __('Header Description', 'stratafitness'), 'Every athlete enters the same three-phase architecture. Select a service to see exactly how it unfolds.');
    $add_text('strata_home_process', 'strata_home_process_tab_1', __('Tab 1 Label', 'stratafitness'), 'PERSONAL TRAINING');
    $add_text('strata_home_process', 'strata_home_process_tab_2', __('Tab 2 Label', 'stratafitness'), 'REMOTE COACHING');
    $add_text('strata_home_process', 'strata_home_process_tab_3', __('Tab 3 Label', 'stratafitness'), 'NUTRITION COACHING');

    // --- Process Steps: Personal Training ---
    $wp_customize->add_section('strata_home_process_pt', array('title' => __('Process Steps: Personal Training', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_text('strata_home_process_pt', 'strata_home_process_pt_s1_title', __('Step 1 Title', 'stratafitness'), 'CONSULTATION');
    $add_textarea('strata_home_process_pt', 'strata_home_process_pt_s1_desc', __('Step 1 Description', 'stratafitness'), 'A 30-minute deep-dive into your training history, injury record, lifestyle constraints, and the outcome you actually want. Movement screening included. This is where your prescription begins.');
    $add_text('strata_home_process_pt', 'strata_home_process_pt_s2_title', __('Step 2 Title', 'stratafitness'), 'PROGRAM DESIGN');
    $add_textarea('strata_home_process_pt', 'strata_home_process_pt_s2_desc', __('Step 2 Description', 'stratafitness'), 'Physiological profiling, baseline metrics, and full macrocycle design. Your first training block is built and periodized before you ever step on the floor. No templates.');
    $add_text('strata_home_process_pt', 'strata_home_process_pt_s3_title', __('Step 3 Title', 'stratafitness'), 'COACHED EXECUTION');
    $add_textarea('strata_home_process_pt', 'strata_home_process_pt_s3_desc', __('Step 3 Description', 'stratafitness'), 'Supervised in-person sessions with real-time mechanical feedback and load management. Programming adapts to your readiness, recovery, and trajectory — week after week.');

    // --- Process Steps: Remote Coaching ---
    $wp_customize->add_section('strata_home_process_rc', array('title' => __('Process Steps: Remote Coaching', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_text('strata_home_process_rc', 'strata_home_process_rc_s1_title', __('Step 1 Title', 'stratafitness'), 'DISCOVERY CALL');
    $add_textarea('strata_home_process_rc', 'strata_home_process_rc_s1_desc', __('Step 1 Description', 'stratafitness'), 'A 30-minute call to assess athlete readiness, equipment access, and training discipline. Remote coaching demands self-direction — we confirm it before we start.');
    $add_text('strata_home_process_rc', 'strata_home_process_rc_s2_title', __('Step 2 Title', 'stratafitness'), 'ONBOARDING');
    $add_textarea('strata_home_process_rc', 'strata_home_process_rc_s2_desc', __('Step 2 Description', 'stratafitness'), 'Detailed intake questionnaire, baseline metric collection, app/platform setup, and your Week 1 program delivered before Day 1. You know exactly what\'s coming.');
    $add_text('strata_home_process_rc', 'strata_home_process_rc_s3_title', __('Step 3 Title', 'stratafitness'), 'WEEKLY LOOP');
    $add_textarea('strata_home_process_rc', 'strata_home_process_rc_s3_desc', __('Step 3 Description', 'stratafitness'), 'Train. Submit footage. Check-in. We review readiness, performance data, and recovery markers every seven days. Programming evolves accordingly — measured, intentional.');

    // --- Process Steps: Nutrition Coaching ---
    $wp_customize->add_section('strata_home_process_nc', array('title' => __('Process Steps: Nutrition Coaching', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_text('strata_home_process_nc', 'strata_home_process_nc_s1_title', __('Step 1 Title', 'stratafitness'), 'BASELINE ASSESSMENT');
    $add_textarea('strata_home_process_nc', 'strata_home_process_nc_s1_desc', __('Step 1 Description', 'stratafitness'), 'Body composition review, dietary history, health markers, and performance goals. We baseline everything before prescribing anything — no guesswork, no assumptions.');
    $add_text('strata_home_process_nc', 'strata_home_process_nc_s2_title', __('Step 2 Title', 'stratafitness'), 'NUTRITIONAL ARCHITECTURE');
    $add_textarea('strata_home_process_nc', 'strata_home_process_nc_s2_desc', __('Step 2 Description', 'stratafitness'), 'Calorie targets, macro ratios, and meal frameworks built to your physiology and training load. Not a rigid meal plan — a practical system that integrates with your life.');
    $add_text('strata_home_process_nc', 'strata_home_process_nc_s3_title', __('Step 3 Title', 'stratafitness'), 'PERIODIZATION');
    $add_textarea('strata_home_process_nc', 'strata_home_process_nc_s3_desc', __('Step 3 Description', 'stratafitness'), 'Nutrition phases aligned to your training blocks. Performance, maintenance, and recomposition cycles executed with intent — not intuition. Weekly tracking review included.');

    // --- Philosophy Section ---
    $wp_customize->add_section('strata_home_philosophy', array('title' => __('Philosophy Section', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_image('strata_home_philosophy', 'strata_home_philosophy_bg', __('Background Image', 'stratafitness'));
    $add_text('strata_home_philosophy', 'strata_home_philosophy_eyebrow', __('Eyebrow', 'stratafitness'), '— Our Philosophy');
    $add_text('strata_home_philosophy', 'strata_home_philosophy_headline_1', __('Headline Line 1', 'stratafitness'), 'Intensity.');
    $add_text('strata_home_philosophy', 'strata_home_philosophy_headline_2', __('Headline Line 2', 'stratafitness'), 'Consistency.');
    $add_text('strata_home_philosophy', 'strata_home_philosophy_headline_3', __('Headline Line 3', 'stratafitness'), 'Precision.');
    $add_textarea('strata_home_philosophy', 'strata_home_philosophy_p1', __('Paragraph 1', 'stratafitness'), 'We don\'t do generic workouts. We engineer performance. Our approach is rooted in sports science — relentlessly focused on progressive overload, strict mechanics, and absolute accountability.');
    $add_textarea('strata_home_philosophy', 'strata_home_philosophy_p2', __('Paragraph 2', 'stratafitness'), 'Whether you\'re a competitive athlete or an executive demanding peak physical condition, our standard remains exactly the same.');
    $add_text('strata_home_philosophy', 'strata_home_philosophy_cta_text', __('CTA Button Text', 'stratafitness'), 'Read Our Story');
    $add_url('strata_home_philosophy', 'strata_home_philosophy_cta_url', __('CTA Button URL', 'stratafitness'), '/about/');
    // Philosophy pillars
    $phil_pillars = array(
        1 => array('Science-Led', 'Every programme is grounded in evidence-based sports science and biomechanics.'),
        2 => array('Individually Built', 'No templates. Every protocol is engineered around your specific physiology and goals.'),
        3 => array('Rigorously Accountable', 'We track, adjust, and push. Continuous improvement is non-negotiable.'),
    );
    foreach ($phil_pillars as $i => $p) {
        $add_text('strata_home_philosophy', "strata_home_philosophy_pillar{$i}_title", sprintf(__('Pillar %d Title', 'stratafitness'), $i), $p[0]);
        $add_textarea('strata_home_philosophy', "strata_home_philosophy_pillar{$i}_desc", sprintf(__('Pillar %d Description', 'stratafitness'), $i), $p[1]);
    }

    // --- Testimonials Header ---
    $wp_customize->add_section('strata_home_testimonials', array('title' => __('Testimonials Header', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_text('strata_home_testimonials', 'strata_home_testimonials_eyebrow', __('Eyebrow', 'stratafitness'), '— The Results');
    $add_text('strata_home_testimonials', 'strata_home_testimonials_headline', __('Headline', 'stratafitness'), 'Voices from the floor.');
    $add_textarea('strata_home_testimonials', 'strata_home_testimonials_sub', __('Subtitle', 'stratafitness'), 'Athletes. One standard. Real words from clients who turned up — and turned around.');

    // --- Testimonial Cards (7 cards) ---
    $testimonials_defaults = array(
        array('quote' => 'Excellent strength training.', 'msg' => '"Such a positive experience with Jonathan. He guided me through excellent strength training workouts, and I\'m so proud of the progress I made."', 'client' => 'Sabrina Anderson', 'label' => 'Personal Training'),
        array('quote' => 'Real results — finally.', 'msg' => '"Jon helped resolve my chronic low back pain, and I\'ve felt significantly stronger since. His warm-ups are exceptionally well thought out."', 'client' => 'Janet', 'label' => 'Personal Training'),
        array('quote' => 'Stronger. No injuries.', 'msg' => '"I\'ve been training with Jon for over a year and have never felt stronger without getting injured. I now fully trust him with both my training and my health."', 'client' => 'Hind El Hathout', 'label' => 'Personal Training'),
        array('quote' => 'Holistic & motivating.', 'msg' => '"Jon has been my trainer for over a year, and I continue to see steady progress. His positive and motivating approach makes training enjoyable without unnecessary pressure."', 'client' => 'Michelle', 'label' => 'Personal Training'),
        array('quote' => 'Structure that actually works.', 'msg' => '"Jon\'s patience, attention to detail, and ability to demonstrate and refine movements stood out. I highly recommend Coach Jon Miller."', 'client' => 'Walter', 'label' => 'Personal Training'),
        array('quote' => 'Individualized from day one.', 'msg' => '"Jon takes a highly personalized approach and creates consistently engaging programs. He also adapts training effectively around injuries to support recovery."', 'client' => 'Yasmin', 'label' => 'Personal Training'),
        array('quote' => 'PRs at 43. No plateaus.', 'msg' => '"I\'m stronger than ever at 43, hitting PRs across multiple lifts. His varied and engaging programming has made training enjoyable and consistent."', 'client' => 'Avishay', 'label' => 'Remote Coaching'),
    );

    foreach ($testimonials_defaults as $i => $t) {
        $n = $i + 1;
        $wp_customize->add_section("strata_home_t_{$n}", array('title' => sprintf(__('Testimonial %d', 'stratafitness'), $n), 'panel' => 'strata_home_panel'));
        $add_image("strata_home_t_{$n}", "strata_home_t_{$n}_bg", __('Background Image', 'stratafitness'));
        $add_text("strata_home_t_{$n}", "strata_home_t_{$n}_quote", __('Quote Label', 'stratafitness'), $t['quote']);
        $add_textarea("strata_home_t_{$n}", "strata_home_t_{$n}_msg", __('Message', 'stratafitness'), $t['msg']);
        $add_text("strata_home_t_{$n}", "strata_home_t_{$n}_client", __('Client Name', 'stratafitness'), $t['client']);
        $add_text("strata_home_t_{$n}", "strata_home_t_{$n}_label", __('Client Label', 'stratafitness'), $t['label']);
    }

    // --- Apply Section ---
    $wp_customize->add_section('strata_home_apply', array('title' => __('Apply Section', 'stratafitness'), 'panel' => 'strata_home_panel'));
    $add_text('strata_home_apply', 'strata_home_apply_eyebrow', __('Eyebrow', 'stratafitness'), '— Get In Touch');
    $add_text('strata_home_apply', 'strata_home_apply_headline_1', __('Headline Line 1', 'stratafitness'), 'APPLY FOR');
    $add_text('strata_home_apply', 'strata_home_apply_headline_2', __('Headline Line 2', 'stratafitness'), 'coaching.');
    $add_textarea('strata_home_apply', 'strata_home_apply_desc', __('Description', 'stratafitness'), 'Tell us where you are, what you want, and how serious you are. We\'ll respond within 24 hours.');
    $add_text('strata_home_apply', 'strata_home_apply_direct_label', __('Direct Label', 'stratafitness'), 'DIRECT');
    $add_text('strata_home_apply', 'strata_home_apply_direct_email', __('Direct Email', 'stratafitness'), 'jon@stratafitnesshk.com');
    $add_text('strata_home_apply', 'strata_home_apply_submit_text', __('Submit Button Text', 'stratafitness'), 'Send Application');

    // ================================================================
    //  PANEL: About Page
    // ================================================================
    $wp_customize->add_panel('strata_ab_panel', array(
        'title'    => __('About Page', 'stratafitness'),
        'priority' => 133,
    ));

    $wp_customize->add_section('strata_ab_hero', array('title' => __('Hero Section', 'stratafitness'), 'panel' => 'strata_ab_panel'));
    $add_image('strata_ab_hero', 'strata_ab_hero_bg', __('Hero Background Image', 'stratafitness'));
    $add_image('strata_ab_hero', 'strata_ab_hero_reveal', __('Hero Reveal Image', 'stratafitness'));
    $add_text('strata_ab_hero', 'strata_ab_hero_eyebrow_left', __('Eyebrow Left', 'stratafitness'), 'The');
    $add_text('strata_ab_hero', 'strata_ab_hero_eyebrow_right', __('Eyebrow Right', 'stratafitness'), 'Standard');
    $add_text('strata_ab_hero', 'strata_ab_hero_headline_left', __('Headline Left', 'stratafitness'), 'Our');
    $add_text('strata_ab_hero', 'strata_ab_hero_headline_right', __('Headline Right', 'stratafitness'), 'Philosophy');
    $add_text('strata_ab_hero', 'strata_ab_hero_sub_left', __('Sub Left', 'stratafitness'), 'Strata Fitness was forged to provide uncompromising performance coaching');
    $add_text('strata_ab_hero', 'strata_ab_hero_sub_right', __('Sub Right', 'stratafitness'), 'for those who demand more from themselves.');

    $wp_customize->add_section('strata_ab_mission', array('title' => __('Mission Section', 'stratafitness'), 'panel' => 'strata_ab_panel'));
    $add_image('strata_ab_mission', 'strata_ab_mission_image', __('Section Image', 'stratafitness'));
    $add_text('strata_ab_mission', 'strata_ab_mission_title', __('Title', 'stratafitness'), 'We Build Athletes.');
    $add_textarea('strata_ab_mission', 'strata_ab_mission_p1', __('Paragraph 1', 'stratafitness'), 'We do not believe in quick fixes, arbitrary workouts, or generic advice. The human body is a highly adaptive machine, and driving true physiological change requires a systematic, data-driven approach.');
    $add_textarea('strata_ab_mission', 'strata_ab_mission_p2', __('Paragraph 2', 'stratafitness'), 'Our mission is simple: To engineer performance by optimizing training mechanics, periodizing intensity, and executing relentless accountability.');
    $add_textarea('strata_ab_mission', 'strata_ab_mission_p3', __('Paragraph 3', 'stratafitness'), 'We treat every client—whether a competitive athlete or an executive optimizing for longevity—with the exact same level of scientific rigor.');

    $wp_customize->add_section('strata_ab_coach', array('title' => __('Coach Section', 'stratafitness'), 'panel' => 'strata_ab_panel'));
    $add_image('strata_ab_coach', 'strata_ab_coach_image', __('Coach Image', 'stratafitness'));
    $add_text('strata_ab_coach', 'strata_ab_coach_eyebrow', __('Eyebrow', 'stratafitness'), 'The Coach');
    $add_text('strata_ab_coach', 'strata_ab_coach_title', __('Title', 'stratafitness'), 'Leadership');
    $add_text('strata_ab_coach', 'strata_ab_coach_subtitle', __('Subtitle', 'stratafitness'), 'Head Coach');
    $add_textarea('strata_ab_coach', 'strata_ab_coach_p1', __('Paragraph 1', 'stratafitness'), 'Driven by a background in strength and conditioning and sports science, our methodology has been tested and refined through years of practical application.');
    $add_textarea('strata_ab_coach', 'strata_ab_coach_p2', __('Paragraph 2', 'stratafitness'), 'With a focus on biomechanics and metabolic health, we ensure that you are not just getting tired—you are getting measurably better.');

}
add_action('customize_register', 'stratafitness_customize_register');

// ── Register Testimonials Custom Post Type ──
function stratafitness_register_testimonials() {
    $labels = array(
        'name'               => __('Testimonials', 'stratafitness'),
        'singular_name'      => __('Testimonial', 'stratafitness'),
        'add_new'            => __('Add New', 'stratafitness'),
        'add_new_item'       => __('Add New Testimonial', 'stratafitness'),
        'edit_item'          => __('Edit Testimonial', 'stratafitness'),
        'new_item'           => __('New Testimonial', 'stratafitness'),
        'view_item'          => __('View Testimonial', 'stratafitness'),
        'search_items'       => __('Search Testimonials', 'stratafitness'),
        'not_found'          => __('No testimonials found.', 'stratafitness'),
        'not_found_in_trash' => __('No testimonials found in Trash.', 'stratafitness'),
        'all_items'          => __('All Testimonials', 'stratafitness'),
        'menu_name'          => __('Testimonials', 'stratafitness'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_rest'        => true,  // Gutenberg-friendly
        'menu_position'       => 25,
        'menu_icon'           => 'dashicons-format-quote',
        'hierarchical'        => false,
        'supports'            => array('title', 'thumbnail', 'page-attributes'),
        'has_archive'         => false,
        'rewrite'             => false,
        'delete_with_user'    => false,
    );

    register_post_type('strata_testimonial', $args);
}
add_action('init', 'stratafitness_register_testimonials');

// ── Testimonial Meta Boxes ──
function stratafitness_testimonial_meta_boxes() {
    add_meta_box(
        'strata_testimonial_details',
        __('Testimonial Details', 'stratafitness'),
        'stratafitness_testimonial_meta_callback',
        'strata_testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'stratafitness_testimonial_meta_boxes');

function stratafitness_testimonial_meta_callback($post) {
    wp_nonce_field('strata_testimonial_save', 'strata_testimonial_nonce');

    $quote_label = get_post_meta($post->ID, '_strata_quote_label', true);
    $message     = get_post_meta($post->ID, '_strata_message', true);
    $client_name = get_post_meta($post->ID, '_strata_client_name', true);
    $client_label = get_post_meta($post->ID, '_strata_client_label', true);
    $avatar_text  = get_post_meta($post->ID, '_strata_avatar_text', true);
    $rating       = get_post_meta($post->ID, '_strata_rating', true) ?: 5;
    ?>
    <style>
        .strata-meta-field { margin-bottom: 16px; }
        .strata-meta-field label { display: block; font-weight: 600; margin-bottom: 4px; color: #1d2327; }
        .strata-meta-field input[type="text"],
        .strata-meta-field textarea { width: 100%; }
        .strata-meta-field textarea { resize: vertical; }
        .strata-meta-field .helper { font-size: 12px; color: #646970; margin-top: 2px; }
        .strata-meta-row { display: flex; gap: 16px; }
        .strata-meta-row .strata-meta-field { flex: 1; }
    </style>
    <div class="strata-meta-row">
        <div class="strata-meta-field">
            <label for="strata_quote_label"><?php _e('Quote Label (short headline)', 'stratafitness'); ?></label>
            <input type="text" id="strata_quote_label" name="strata_quote_label" value="<?php echo esc_attr($quote_label); ?>" maxlength="60" placeholder="e.g. Excellent strength training.">
            <div class="helper"><?php _e('Short tagline shown above the stars. Max 60 chars.', 'stratafitness'); ?></div>
        </div>
        <div class="strata-meta-field">
            <label for="strata_client_name"><?php _e('Client Name', 'stratafitness'); ?></label>
            <input type="text" id="strata_client_name" name="strata_client_name" value="<?php echo esc_attr($client_name); ?>" placeholder="e.g. Sabrina Anderson">
        </div>
    </div>
    <div class="strata-meta-row">
        <div class="strata-meta-field">
            <label for="strata_client_label"><?php _e('Client Label', 'stratafitness'); ?></label>
            <input type="text" id="strata_client_label" name="strata_client_label" value="<?php echo esc_attr($client_label); ?>" placeholder="e.g. Personal Training">
        </div>
        <div class="strata-meta-field">
            <label for="strata_avatar_text"><?php _e('Avatar Text', 'stratafitness'); ?></label>
            <input type="text" id="strata_avatar_text" name="strata_avatar_text" value="<?php echo esc_attr($avatar_text); ?>" maxlength="3" placeholder="e.g. SA">
            <div class="helper"><?php _e('Initials displayed in the avatar circle. Max 3 chars.', 'stratafitness'); ?></div>
        </div>
    </div>
    <div class="strata-meta-field">
        <label for="strata_message"><?php _e('Testimonial Message', 'stratafitness'); ?></label>
        <textarea id="strata_message" name="strata_message" rows="4" placeholder="The full testimonial text..."><?php echo esc_textarea($message); ?></textarea>
    </div>
    <div class="strata-meta-field">
        <label for="strata_rating"><?php _e('Star Rating (1-5)', 'stratafitness'); ?></label>
        <input type="number" id="strata_rating" name="strata_rating" value="<?php echo esc_attr($rating); ?>" min="1" max="5" step="1" style="width: 80px;">
    </div>
    <?php
}

function stratafitness_testimonial_save($post_id) {
    // Bail if autosaving
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    // Check nonce
    if (!isset($_POST['strata_testimonial_nonce']) || !wp_verify_nonce($_POST['strata_testimonial_nonce'], 'strata_testimonial_save')) return;
    // Check permissions
    if (!current_user_can('edit_post', $post_id)) return;

    $fields = array(
        '_strata_quote_label'  => 'strata_quote_label',
        '_strata_message'      => 'strata_message',
        '_strata_client_name'  => 'strata_client_name',
        '_strata_client_label' => 'strata_client_label',
        '_strata_avatar_text'  => 'strata_avatar_text',
    );

    foreach ($fields as $meta_key => $post_key) {
        if (isset($_POST[$post_key])) {
            update_post_meta($post_id, $meta_key, sanitize_text_field(wp_unslash($_POST[$post_key])));
        }
    }

    // Rating: integer 1-5
    if (isset($_POST['strata_rating'])) {
        $rating = min(5, max(1, (int) $_POST['strata_rating']));
        update_post_meta($post_id, '_strata_rating', $rating);
    }
}
add_action('save_post_strata_testimonial', 'stratafitness_testimonial_save');

// ── Helper: fetch testimonials sorted by custom order ──
function stratafitness_get_testimonials($limit = 7) {
    $query = new WP_Query(array(
        'post_type'      => 'strata_testimonial',
        'posts_per_page' => $limit,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'no_found_rows'  => true,
    ));

    $testimonials = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $testimonials[] = array(
                'id'           => $post_id,
                'bg'           => get_the_post_thumbnail_url($post_id, 'medium_large') ?: '',
                'quote'        => get_post_meta($post_id, '_strata_quote_label', true),
                'msg'          => get_post_meta($post_id, '_strata_message', true),
                'client'       => get_post_meta($post_id, '_strata_client_name', true),
                'label'        => get_post_meta($post_id, '_strata_client_label', true),
                'avatar'       => get_post_meta($post_id, '_strata_avatar_text', true),
                'rating'       => (int) get_post_meta($post_id, '_strata_rating', true) ?: 5,
            );
        }
        wp_reset_postdata();
    }
    return $testimonials;
}

// ── Register Credential Logos Custom Post Type ──
function stratafitness_register_credentials() {
    $labels = array(
        'name'               => __('Credential Logos', 'stratafitness'),
        'singular_name'      => __('Credential Logo', 'stratafitness'),
        'add_new'            => __('Add New', 'stratafitness'),
        'add_new_item'       => __('Add New Credential Logo', 'stratafitness'),
        'edit_item'          => __('Edit Credential Logo', 'stratafitness'),
        'new_item'           => __('New Credential Logo', 'stratafitness'),
        'view_item'          => __('View Credential Logo', 'stratafitness'),
        'search_items'       => __('Search Credential Logos', 'stratafitness'),
        'not_found'          => __('No credential logos found.', 'stratafitness'),
        'not_found_in_trash' => __('No credential logos found in Trash.', 'stratafitness'),
        'all_items'          => __('All Credential Logos', 'stratafitness'),
        'menu_name'          => __('Credential Logos', 'stratafitness'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => false,
        'show_in_rest'        => true,
        'menu_position'       => 26,
        'menu_icon'           => 'dashicons-images-alt2',
        'hierarchical'        => false,
        'supports'            => array('title', 'thumbnail', 'page-attributes'),
        'has_archive'         => false,
        'rewrite'             => false,
        'delete_with_user'    => false,
    );

    register_post_type('strata_credential', $args);
}
add_action('init', 'stratafitness_register_credentials');

// ── Helper: get credential logos (from CPT, sorted by menu order) ──
function stratafitness_get_credential_logos() {
    $query = new WP_Query(array(
        'post_type'      => 'strata_credential',
        'posts_per_page' => 50,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
        'no_found_rows'  => true,
        'post_status'    => 'publish',
    ));

    $logos = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $thumb_id = get_post_thumbnail_id(get_the_ID());
            if ($thumb_id) {
                $logos[] = array(
                    'post_id'  => get_the_ID(),
                    'thumb_id' => $thumb_id,
                );
            }
        }
        wp_reset_postdata();
    }

    return $logos;
}

// ── Helper: get theme mod image URL (returns default if not set) ──
function strata_theme_image($setting, $default_rel_path) {
    $img_id = get_theme_mod($setting, '');
    if ($img_id) {
        $url = wp_get_attachment_url((int) $img_id);
        if ($url) return $url;
    }
    return get_template_directory_uri() . $default_rel_path;
}

// ── Helper: get theme mod image URL with absolute URL fallback ──
function strata_theme_image_url($setting, $default_url) {
    $img_id = get_theme_mod($setting, '');
    if ($img_id) {
        $url = wp_get_attachment_url((int) $img_id);
        if ($url) return $url;
    }
    return $default_url;
}

// ── Escaping Helpers for template files ──
function strata_esc_mod($setting, $default = '') {
    echo esc_html(get_theme_mod($setting, $default));
}

function strata_esc_mod_textarea($setting, $default = '') {
    echo wp_kses_post(get_theme_mod($setting, $default));
}

function strata_esc_mod_url($setting, $default = '') {
    echo esc_url(get_theme_mod($setting, $default));
}

// ── Auto-create required pages on theme activation ──
function stratafitness_create_pages() {
    $pages = array(
        'personal-training' => array(
            'title'   => 'Personal Training',
            'template' => 'page-personal-training.php',
        ),
        'remote-coaching' => array(
            'title'   => 'Remote Coaching',
            'template' => 'page-remote-coaching.php',
        ),
        'nutrition-coaching' => array(
            'title'   => 'Nutrition Coaching',
            'template' => 'page-nutrition-coaching.php',
        ),
        'about' => array(
            'title'   => 'About',
            'template' => 'page-about.php',
        ),
    );

    foreach ($pages as $slug => $data) {
        // Check if page already exists by slug
        $existing = get_page_by_path($slug, OBJECT, 'page');

        if (!$existing) {
            $page_id = wp_insert_post(array(
                'post_title'     => $data['title'],
                'post_name'      => $slug,
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'post_content'   => '', // Content comes from the template file
                'page_template'  => $data['template'],
                'comment_status' => 'closed',
                'ping_status'    => 'closed',
            ));

            if ($page_id && !is_wp_error($page_id)) {
                // Set the page template meta
                update_post_meta($page_id, '_wp_page_template', $data['template']);
            }
        }
    }

    // Flush rewrite rules so the new slugs are recognised
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'stratafitness_create_pages');

// Also run on admin init (once) in case theme was already active
function stratafitness_maybe_create_pages() {
    if (!get_option('stratafitness_pages_created')) {
        stratafitness_create_pages();
        update_option('stratafitness_pages_created', true);
    }
}
add_action('admin_init', 'stratafitness_maybe_create_pages');

// ── Auto Clear & Preload WP Rocket Cache ──
function stratafitness_auto_clear_rocket_cache($post_id, $post = null) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if ($post && $post->post_status === 'auto-draft') return;
    if (wp_is_post_revision($post_id)) return;

    // Clear cache spesifik halaman/post
    if (function_exists('rocket_clean_post')) {
        rocket_clean_post($post_id);
    }

    // Clear halaman-halaman yang menampilkan CPT (homepage, dll)
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }

    stratafitness_rocket_preload();
}

function stratafitness_auto_clear_rocket_cache_all() {
    if (function_exists('rocket_clean_domain')) {
        rocket_clean_domain();
    }
    stratafitness_rocket_preload();
}

function stratafitness_rocket_preload() {
    if (function_exists('run_rocket_sitemap_preload')) {
        run_rocket_sitemap_preload();
    }
}

// Post / Page biasa
add_action('save_post', 'stratafitness_auto_clear_rocket_cache', 10, 2);
add_action('deleted_post', 'stratafitness_auto_clear_rocket_cache_all');
add_action('trashed_post', 'stratafitness_auto_clear_rocket_cache_all');

// Custom Post Types: Testimonials & Credentials
add_action('save_post_strata_testimonial', 'stratafitness_auto_clear_rocket_cache_all');
add_action('save_post_strata_credential',  'stratafitness_auto_clear_rocket_cache_all');

// Taxonomy / Term
add_action('edited_term',  'stratafitness_auto_clear_rocket_cache_all');
add_action('created_term', 'stratafitness_auto_clear_rocket_cache_all');
add_action('delete_term',  'stratafitness_auto_clear_rocket_cache_all');

// Menu
add_action('wp_update_nav_menu', 'stratafitness_auto_clear_rocket_cache_all');

// Theme Customizer — clear saat save perubahan customizer
add_action('customize_save_after', 'stratafitness_auto_clear_rocket_cache_all');

// Clear cache when plugin/theme is updated
add_action('upgrader_process_complete',      'stratafitness_auto_clear_rocket_cache_all');

// Clear cache when theme file is saved via Theme Editor
add_action('wp_ajax_edit-theme-plugin-file', 'stratafitness_auto_clear_rocket_cache_all', 1);

// Clear cache when a plugin is activated or deactivated
add_action('activated_plugin',               'stratafitness_auto_clear_rocket_cache_all');
add_action('deactivated_plugin',             'stratafitness_auto_clear_rocket_cache_all');

// Clear cache when theme is switched
add_action('switch_theme',                   'stratafitness_auto_clear_rocket_cache_all');