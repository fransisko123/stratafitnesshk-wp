<?php
/**
 * Header Template
 *
 * @package StrataFitness
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f0ede8">

  <?php if (is_front_page()) : ?>
  <link rel="preload" as="image" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/10.webp'); ?>" fetchpriority="high">
  <?php endif; ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Navigation -->
  <?php
  // Only use dark (white-text) navbar on pages that have a dark hero background
  $is_dark_hero = is_front_page()
      || is_page(array('personal-training', 'remote-coaching', 'nutrition-coaching', 'about'));
  $navbar_class = $is_dark_hero ? 'navbar navbar-dark' : 'navbar';
  ?>
  <nav class="<?php echo esc_attr($navbar_class); ?>" id="main-nav" aria-label="<?php esc_attr_e('Main navigation', 'stratafitness'); ?>">
    <div class="container nav-inner">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" aria-label="<?php esc_attr_e('Strata Fitness Home', 'stratafitness'); ?>">
        <!-- Light logo: tampil saat navbar dark/transparan (hero) -->
        <img
          class="logo-light"
          src="<?php echo esc_url(strata_theme_image('strata_site_logo', '/assets/images/logo.webp')); ?>"
          alt="<?php echo esc_attr(get_theme_mod('strata_site_logo_alt', 'Strata Fitness')); ?>"
          width="500"
          height="154"
          loading="eager"
        >
        <!-- Dark logo: tampil saat navbar scrolled (background terang) -->
        <img
          class="logo-dark"
          src="<?php echo esc_url(strata_theme_image('strata_site_logo_dark', '/assets/images/logo-dark.webp')); ?>"
          alt="<?php echo esc_attr(get_theme_mod('strata_site_logo_alt', 'Strata Fitness')); ?>"
          width="500"
          height="154"
          loading="eager"
        >
      </a>
      <button class="mobile-menu-toggle" aria-label="<?php esc_attr_e('Toggle navigation menu', 'stratafitness'); ?>" aria-expanded="false">
        <span class="hamburger"></span>
      </button>
      <div class="nav-links" id="nav-links">
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'fallback_cb'    => false,
                'depth'          => 1,
            ));
        } else {
            // Fallback links if no menu is set
        ?>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link"<?php echo is_front_page() ? ' aria-current="page"' : ''; ?>><?php esc_html_e('Home', 'stratafitness'); ?></a>
          <a href="<?php echo esc_url(home_url('/personal-training/')); ?>" class="nav-link"<?php echo is_page('personal-training') ? ' aria-current="page"' : ''; ?>><?php esc_html_e('Personal Training', 'stratafitness'); ?></a>
          <a href="<?php echo esc_url(home_url('/remote-coaching/')); ?>" class="nav-link"<?php echo is_page('remote-coaching') ? ' aria-current="page"' : ''; ?>><?php esc_html_e('Remote Coaching', 'stratafitness'); ?></a>
          <a href="<?php echo esc_url(home_url('/nutrition-coaching/')); ?>" class="nav-link"<?php echo is_page('nutrition-coaching') ? ' aria-current="page"' : ''; ?>><?php esc_html_e('Nutrition Coaching', 'stratafitness'); ?></a>
          <a href="<?php echo esc_url(home_url('/about/')); ?>" class="nav-link"<?php echo is_page('about') ? ' aria-current="page"' : ''; ?>><?php esc_html_e('About', 'stratafitness'); ?></a>
        <?php } ?>
        <a href="<?php echo esc_url(home_url('/#apply')); ?>" class="btn btn-primary mandate">
          <?php esc_html_e('APPLY', 'stratafitness'); ?>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>
    </div>
  </nav>
