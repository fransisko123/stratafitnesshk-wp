<?php
/**
 * Strata Fitness Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

// ── Theme Setup ──
function stratafitness_theme_setup() {
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
        '1.0.0'
    );

    // Google Fonts (non-blocking)
    wp_enqueue_style(
        'stratafitness-fonts',
        'https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital,wght@0,400;0,500;0,600;0,700;1,400;1,700&family=Archivo:wght@400;600;800&family=Geist:wght@300;400;500&display=swap',
        array(),
        null
    );

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

    // Main JS
    wp_enqueue_script(
        'stratafitness-script',
        get_template_directory_uri() . '/assets/js/script.js',
        array('gsap', 'gsap-scrolltrigger'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'stratafitness_enqueue_assets');

// ── Add defer/async to GSAP and main script ──
function stratafitness_add_defer_attribute($tag, $handle) {
    $defer_scripts = array('gsap', 'gsap-scrolltrigger', 'stratafitness-script');
    if (in_array($handle, $defer_scripts, true)) {
        return str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'stratafitness_add_defer_attribute', 10, 2);

// ── Allow SVG uploads ──
function stratafitness_allow_svg($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'stratafitness_allow_svg');

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

// ── Helper: get theme mod image URL (returns default if not set) ──
function strata_theme_image($setting, $default_rel_path) {
    $img_id = get_theme_mod($setting, '');
    if ($img_id) {
        $url = wp_get_attachment_url((int) $img_id);
        if ($url) return $url;
    }
    return get_template_directory_uri() . $default_rel_path;
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
