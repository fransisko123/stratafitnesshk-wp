<?php
/**
 * Template Name: About Page
 * Page Template for About page
 */
get_header();
?>

  <header class="hero" id="hero" aria-label="Hero section">
    <div class="hero-bg" id="heroBgEl" aria-hidden="true">
      <img src="<?php echo strata_theme_image('strata_ab_hero_bg', '/assets/images/2.webp'); ?>" alt="" fetchpriority="high" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center 40%;">
    </div>
    <div class="hero-overlay" id="heroOverlay"></div>
    <div class="hero-blend"></div>
    <div class="hero-light-wash" id="heroLightWash"></div>

    <div class="hero-reveal-img" id="heroRevealImg">
      <img src="<?php echo strata_theme_image('strata_ab_hero_reveal', '/assets/images/3.webp'); ?>" alt="Athlete training" width="1280" height="720" decoding="async" loading="lazy" />
    </div>

    <div class="container hero-container">
      <div class="hero-content">
        <div class="eyebrow hero-eyebrow">
          <span class="eyebrow-left"><?php echo get_theme_mod('strata_ab_hero_eyebrow_left', 'The'); ?></span>
          <span class="eyebrow-right"><?php echo get_theme_mod('strata_ab_hero_eyebrow_right', 'Standard'); ?></span>
        </div>
        <h1 class="hero-headline">
          <span class="headline-left"><?php echo get_theme_mod('strata_ab_hero_headline_left', 'Our'); ?></span>
          <span class="headline-right"><em><?php echo get_theme_mod('strata_ab_hero_headline_right', 'Philosophy'); ?></em></span>
        </h1>
        <p class="hero-sub" style="margin: 0 auto; max-width: 700px;">
          <span class="sub-left"><?php echo get_theme_mod('strata_ab_hero_sub_left', 'Strata Fitness was forged to provide uncompromising performance coaching'); ?></span><br>
          <span class="sub-right"><?php echo get_theme_mod('strata_ab_hero_sub_right', 'for those who demand more from themselves.'); ?></span>
        </p>
      </div>
      <div class="scroll-indicator" aria-hidden="true">
        <span class="scroll-line"></span>
        <span class="scroll-label">Scroll</span>
      </div>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <div class="grid grid-2 align-center">
        <div>
          <h2><?php echo get_theme_mod('strata_ab_mission_title', 'We Build Athletes.'); ?></h2>
          <p><?php echo get_theme_mod('strata_ab_mission_p1', 'We do not believe in quick fixes, arbitrary workouts, or generic advice. The human body is a highly adaptive machine, and driving true physiological change requires a systematic, data-driven approach.'); ?></p>
          <p><?php echo get_theme_mod('strata_ab_mission_p2', 'Our mission is simple: To engineer performance by optimizing training mechanics, periodizing intensity, and executing relentless accountability.'); ?></p>
          <p><?php echo get_theme_mod('strata_ab_mission_p3', 'We treat every client—whether a competitive athlete or an executive optimizing for longevity—with the exact same level of scientific rigor.'); ?></p>
        </div>
        <div style="background-image: url('<?php echo strata_theme_image('strata_ab_mission_image', '/assets/images/3.webp'); ?>'); background-size: cover; background-position: center; height: 500px;">
        </div>
      </div>
    </div>
  </section>

  <section class="section section-gray">
    <div class="container">
      <div class="text-center mb-lg">
        <span class="eyebrow"><?php echo get_theme_mod('strata_ab_coach_eyebrow', 'The Coach'); ?></span>
        <h2><?php echo get_theme_mod('strata_ab_coach_title', 'Leadership'); ?></h2>
      </div>
      <div class="grid grid-2 align-center">
        <div style="background-image: url('<?php echo strata_theme_image('strata_ab_coach_image', '/assets/images/5.webp'); ?>'); background-size: cover; background-position: top center; height: 400px;">
        </div>
        <div>
          <h3><?php echo get_theme_mod('strata_ab_coach_subtitle', 'Head Coach'); ?></h3>
          <p><?php echo get_theme_mod('strata_ab_coach_p1', 'Driven by a background in strength and conditioning and sports science, our methodology has been tested and refined through years of practical application.'); ?></p>
          <p><?php echo get_theme_mod('strata_ab_coach_p2', 'With a focus on biomechanics and metabolic health, we ensure that you are not just getting tired—you are getting measurably better.'); ?></p>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
