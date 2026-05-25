<?php
/**
 * Header Template
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f0ede8">

  <!-- Preconnects -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>

  <!-- DNS Prefetch -->
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

  <!-- Preload LCP hero image (conditionally set per page) -->
  <?php if (is_front_page()) : ?>
  <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/images/10.webp" fetchpriority="high">
  <?php endif; ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Navigation -->
  <nav class="navbar navbar-dark" id="main-nav">
    <div class="container nav-inner">
      <a href="<?php echo home_url('/'); ?>" class="logo" aria-label="Strata Fitness Home">
        <img
          src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp"
          alt="Strata Fitness"
          width="500"
          height="154"
          loading="eager"
        >
      </a>
      <button class="mobile-menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false">
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
          <a href="<?php echo home_url('/'); ?>" class="nav-link">Home</a>
          <a href="<?php echo home_url('/personal-training/'); ?>" class="nav-link">Personal Training</a>
          <a href="<?php echo home_url('/remote-coaching/'); ?>" class="nav-link">Remote Coaching</a>
          <a href="<?php echo home_url('/nutrition-coaching/'); ?>" class="nav-link">Nutrition Coaching</a>
          <a href="<?php echo home_url('/about/'); ?>" class="nav-link">About</a>
        <?php } ?>
        <a href="<?php echo home_url('/#apply'); ?>" class="btn btn-primary mandate">
          APPLY
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>
    </div>
  </nav>
