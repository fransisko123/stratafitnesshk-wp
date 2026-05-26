<?php
/**
 * Homepage Template
 *
 * @package StrataFitness
 */
get_header();
?>

  <!-- ============================================================
       HERO SECTION
  ============================================================ -->
<header class="hero" id="hero" aria-label="<?php esc_attr_e('Hero section', 'stratafitness'); ?>">
  <!-- Hero BG: use <img> for LCP discoverability, hidden visually -->
  <div class="hero-bg" id="heroBgEl" aria-hidden="true">
    <img
      src="<?php echo esc_url(strata_theme_image('strata_home_hero_bg', '/assets/images/10.webp')); ?>"
      alt=""
      fetchpriority="high"
      decoding="async"
      width="1920"
      height="1080"
      style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center 20%;"
    >
  </div>
  <div class="hero-overlay" id="heroOverlay"></div>
  <div class="hero-light-wash" id="heroLightWash"></div>

  <!-- Secondary image revealed during hero scroll animation -->
  <div class="hero-reveal-img" id="heroRevealImg">
    <img src="<?php echo esc_url(strata_theme_image('strata_home_hero_reveal', '/assets/images/5.webp')); ?>" alt="<?php esc_attr_e('Athlete in training', 'stratafitness'); ?>" width="1280" height="720" decoding="async" loading="lazy">
  </div>

  <div class="container hero-container">
    <div class="hero-content">
      <div class="eyebrow hero-eyebrow">
        <span class="eyebrow-left"><?php echo esc_html(get_theme_mod('strata_home_hero_eyebrow_left', 'Elite Performance')); ?></span>
        <span class="eyebrow-right"><?php echo esc_html(get_theme_mod('strata_home_hero_eyebrow_right', 'Coaching · Hong Kong')); ?></span>
      </div>
      <h1 class="hero-headline">
        <span class="headline-left"><?php echo esc_html(get_theme_mod('strata_home_hero_headline_left', 'We Build')); ?></span>
        <span class="headline-right"><em><?php echo esc_html(get_theme_mod('strata_home_hero_headline_right', 'Athletes.')); ?></em></span>
      </h1>
      <p class="hero-sub">
        <span class="sub-left"><?php echo esc_html(get_theme_mod('strata_home_hero_sub_left', 'Competitive athletes and driven professionals.')); ?></span><br>
        <span class="sub-right"><?php echo esc_html(get_theme_mod('strata_home_hero_sub_right', 'We engineer performance not workouts.')); ?></span>
      </p>
    </div>
    <div class="scroll-indicator" aria-hidden="true">
      <span class="scroll-line"></span>
      <span class="scroll-label">Scroll</span>
    </div>
  </div>
</header>

  <!-- ============================================================
       MANDATE SECTION
  ============================================================ -->
  <section class="mandate-section section" id="main-content">
    <div class="container">
      <div class="mandate-content" data-reveal>
        <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_home_mandate_eyebrow', '— Our Mandate')); ?></span>
        <h2 class="mandate-headline">
          <?php echo esc_html(get_theme_mod('strata_home_mandate_headline_1', 'ENGINEER')); ?><br><span class="text-red"><?php echo esc_html(get_theme_mod('strata_home_mandate_headline_2', 'Performance.')); ?></span>
        </h2>
        <p class="mandate-sub"><?php echo esc_html(get_theme_mod('strata_home_mandate_desc', 'For competitive athletes and driven professionals based in Hong Kong and beyond. We build superior athletes through individualized programming, ruthless accountability, and a science-led methodology — not template programs and entertainment.')); ?></p>
        <div class="mandate-actions">
          <a href="<?php echo esc_url(get_theme_mod('strata_home_mandate_cta_url', '#apply')); ?>" class="btn btn-primary mandate-cta">
            <?php echo esc_html(get_theme_mod('strata_home_mandate_cta_text', 'APPLY FOR COACHING')); ?>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </a>
          <a href="<?php echo esc_url(get_theme_mod('strata_home_mandate_outline_url', '#services')); ?>" class="btn btn-outline mandate-outline"><?php echo esc_html(get_theme_mod('strata_home_mandate_outline_text', 'OUR DISCIPLINES')); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       CREDENTIALS SECTION
  ============================================================ -->
  <section class="credentials section" id="credentials">
    <div class="container">
      <div class="credentials-header" data-reveal>
        <p class="eyebrow"><?php echo esc_html(get_theme_mod('strata_home_creds_eyebrow', '— Credentials')); ?></p>
        <h2 class="credentials-title"><?php echo esc_html(get_theme_mod('strata_home_creds_title', 'Educated by the Best.')); ?></h2>
        <p class="credentials-sub"><?php echo esc_html(get_theme_mod('strata_home_creds_sub', 'Certifications from the institutions that set the global standard for strength, mobility, sport, and nutrition.')); ?></p>
      </div>

      <!-- Logo marquee -->
      <div class="logos-marquee" aria-label="Certification logos" role="region">
        <div class="logos-track" aria-hidden="true">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logos/logo1.png" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logos/logo2.png" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logos/logo3.svg" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logos/logo4.svg" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logos/logo1.png" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logos/logo2.png" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logos/logo3.svg" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/logos/logo4.svg" alt="" width="120" height="28" loading="lazy" decoding="async">
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       SERVICES SECTION
  ============================================================ -->
  <section class="services-section section" id="services" aria-label="Our Services">
    <div class="container">

      <!-- Editorial section header (centered) -->
      <div class="svc-editorial-header" data-reveal>
        <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_home_services_eyebrow', '— Three Paths')); ?></span>
        <h2 class="svc-editorial-headline">
          <?php echo esc_html(get_theme_mod('strata_home_services_headline_1', 'ONE')); ?><br>
          <em class="text-red" style="font-style: italic; font-weight: 500; font-family: var(--font-display); text-transform: none; letter-spacing: -0.02em;"><?php echo esc_html(get_theme_mod('strata_home_services_headline_2', 'Standard.')); ?></em>
        </h2>
        <p class="svc-editorial-body"><?php echo esc_html(get_theme_mod('strata_home_services_desc', 'Every Strata service operates under a single principle: engineer the athlete, don\'t entertain them. Choose your path — every one is built on data, intent, and measurable outcomes.')); ?></p>
      </div>

      <!-- Service cards grid -->
      <div class="services-grid-premium" id="services-grid" data-stagger data-delay="200">

        <!-- Card 1: Personal Training -->
        <article class="svc-card" id="svc-personal-training" aria-label="Personal Training service card">
          <div class="svc-bg" aria-hidden="true"><img src="<?php echo esc_url(strata_theme_image('strata_home_svc_pt_bg', '/assets/images/6.webp')); ?>" alt="" width="600" height="560" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;"></div>
          <div class="svc-overlay"></div>
          <div class="svc-body">
            <div class="svc-meta">
              <span class="svc-tag"><?php echo esc_html(get_theme_mod('strata_home_svc_pt_tag', '01')); ?></span>
              <button class="svc-toggle" aria-label="Expand Personal Training details">
                <svg class="icon-plus" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <svg class="icon-close" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>
            <div class="svc-foot">
              <h3 class="svc-title"><?php echo esc_html(get_theme_mod('strata_home_svc_pt_title', 'In-Person Personal Training')); ?></h3>
              <p class="svc-desc"><?php echo esc_html(get_theme_mod('strata_home_svc_pt_desc', 'One-on-one coaching at our gym in Central, HK. Expert guidance, real-time feedback, and direct supervision for maximum results.')); ?></p>
              <div class="svc-actions">
                <a href="<?php echo esc_url(get_theme_mod('strata_home_svc_pt_cta_url', 'https://go.stratafitnesshk.com/30-min-consult-assessment')); ?>" class="svc-cta btn btn-primary" target="_blank" rel="noopener" id="svc-pt-cta">
                  <?php echo esc_html(get_theme_mod('strata_home_svc_pt_cta_text', 'Book Assessment')); ?>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('strata_home_svc_pt_learn_url', '/personal-training/')); ?>" class="svc-learn"><?php echo esc_html(get_theme_mod('strata_home_svc_pt_learn_text', 'Learn More')); ?></a>
              </div>
            </div>
          </div>
        </article>

        <!-- Card 2: Remote Coaching -->
        <article class="svc-card" id="svc-remote-coaching" aria-label="Remote Coaching service card">
          <div class="svc-bg" aria-hidden="true"><img src="<?php echo esc_url(strata_theme_image('strata_home_svc_rc_bg', '/assets/images/7.webp')); ?>" alt="" width="600" height="560" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;"></div>
          <div class="svc-overlay"></div>
          <div class="svc-body">
            <div class="svc-meta">
              <span class="svc-tag"><?php echo esc_html(get_theme_mod('strata_home_svc_rc_tag', '02')); ?></span>
              <button class="svc-toggle" aria-label="Expand Remote Coaching details">
                <svg class="icon-plus" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <svg class="icon-close" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>
            <div class="svc-foot">
              <h3 class="svc-title"><?php echo esc_html(get_theme_mod('strata_home_svc_rc_title', 'Remote Coaching')); ?></h3>
              <p class="svc-desc"><?php echo esc_html(get_theme_mod('strata_home_svc_rc_desc', 'Complete programming tailored to your goals, capacity, and lifestyle. Includes weekly coaching, form reviews, and real-time program adjustments.')); ?></p>
              <div class="svc-actions">
                <a href="<?php echo esc_url(get_theme_mod('strata_home_svc_rc_cta_url', 'https://go.stratafitnesshk.com/remotecoachingcall')); ?>" class="svc-cta btn btn-primary" target="_blank" rel="noopener" id="svc-rc-cta">
                  <?php echo esc_html(get_theme_mod('strata_home_svc_rc_cta_text', 'Book a Call')); ?>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('strata_home_svc_rc_learn_url', '/remote-coaching/')); ?>" class="svc-learn"><?php echo esc_html(get_theme_mod('strata_home_svc_rc_learn_text', 'Learn More')); ?></a>
              </div>
            </div>
          </div>
        </article>

        <!-- Card 3: Nutrition Coaching -->
        <article class="svc-card" id="svc-nutrition-coaching" aria-label="Nutrition Coaching service card">
          <div class="svc-bg" aria-hidden="true"><img src="<?php echo esc_url(strata_theme_image('strata_home_svc_nc_bg', '/assets/images/8.webp')); ?>" alt="" width="600" height="560" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;"></div>
          <div class="svc-overlay"></div>
          <div class="svc-body">
            <div class="svc-meta">
              <span class="svc-tag"><?php echo esc_html(get_theme_mod('strata_home_svc_nc_tag', '03')); ?></span>
              <button class="svc-toggle" aria-label="Expand Nutrition Coaching details">
                <svg class="icon-plus" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <svg class="icon-close" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>
            <div class="svc-foot">
              <h3 class="svc-title"><?php echo esc_html(get_theme_mod('strata_home_svc_nc_title', 'Nutrition Coaching')); ?></h3>
              <p class="svc-desc"><?php echo esc_html(get_theme_mod('strata_home_svc_nc_desc', 'Data-driven nutritional periodization. Optimized for body composition, recovery, and peak performance at every phase of training.')); ?></p>
              <div class="svc-actions">
                <a href="<?php echo esc_url(get_theme_mod('strata_home_svc_nc_cta_url', 'https://go.stratafitnesshk.com/nutrition-discovery-call')); ?>" class="svc-cta btn btn-primary" target="_blank" rel="noopener" id="svc-nc-cta">
                  <?php echo esc_html(get_theme_mod('strata_home_svc_nc_cta_text', 'Book Discovery Call')); ?>
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('strata_home_svc_nc_learn_url', '/nutrition-coaching/')); ?>" class="svc-learn"><?php echo esc_html(get_theme_mod('strata_home_svc_nc_learn_text', 'Learn More')); ?></a>
              </div>
            </div>
          </div>
        </article>

      </div><!-- /services-grid-premium -->
    </div><!-- /container -->
  </section>

  <!-- ============================================================
       PROCESS TABS SECTION
  ============================================================ -->
  <section class="process-tabs-section section" id="process-architecture">
    <div class="container">
      <div class="process-tabs-header" data-reveal>
        <div class="header-left">
          <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_home_process_eyebrow', '— The Process')); ?></span>
          <h2 class="pt-headline"><?php echo esc_html(get_theme_mod('strata_home_process_headline_1', 'ASSESSMENT')); ?><br>TO <em class="text-red text-lowercase"><?php echo esc_html(get_theme_mod('strata_home_process_headline_2', 'execution.')); ?></em></h2>
        </div>
        <div class="header-right">
          <p><?php echo esc_html(get_theme_mod('strata_home_process_desc', 'Every athlete enters the same three-phase architecture. Select a service to see exactly how it unfolds.')); ?></p>
        </div>
      </div>

      <div class="process-tabs-wrapper" data-reveal data-delay="100">
        <div class="process-tabs-nav" role="tablist">
          <button role="tab" class="tab-btn active" data-tab="pt" aria-selected="true"><?php echo esc_html(get_theme_mod('strata_home_process_tab_1', 'PERSONAL TRAINING')); ?></button>
          <button role="tab" class="tab-btn" data-tab="rc" aria-selected="false"><?php echo esc_html(get_theme_mod('strata_home_process_tab_2', 'REMOTE COACHING')); ?></button>
          <button role="tab" class="tab-btn" data-tab="nc" aria-selected="false"><?php echo esc_html(get_theme_mod('strata_home_process_tab_3', 'NUTRITION COACHING')); ?></button>
        </div>

        <div class="process-tabs-content">
          <!-- PT Tab -->
          <div class="tab-pane active" id="tab-pt" role="tabpanel">
            <div class="process-grid">
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">01</span><span class="lbl">STEP</span></div>
                <h3><?php echo esc_html(get_theme_mod('strata_home_process_pt_s1_title', 'CONSULTATION')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('strata_home_process_pt_s1_desc', 'A 30-minute deep-dive into your training history, injury record, lifestyle constraints, and the outcome you actually want. Movement screening included. This is where your prescription begins.')); ?></p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">02</span><span class="lbl">STEP</span></div>
                <h3><?php echo esc_html(get_theme_mod('strata_home_process_pt_s2_title', 'PROGRAM DESIGN')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('strata_home_process_pt_s2_desc', 'Physiological profiling, baseline metrics, and full macrocycle design. Your first training block is built and periodized before you ever step on the floor. No templates.')); ?></p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">03</span><span class="lbl">STEP</span></div>
                <h3><?php echo esc_html(get_theme_mod('strata_home_process_pt_s3_title', 'COACHED EXECUTION')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('strata_home_process_pt_s3_desc', 'Supervised in-person sessions with real-time mechanical feedback and load management. Programming adapts to your readiness, recovery, and trajectory — week after week.')); ?></p>
              </div>
            </div>
          </div>

          <!-- RC Tab -->
          <div class="tab-pane" id="tab-rc" role="tabpanel">
            <div class="process-grid">
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">01</span><span class="lbl">STEP</span></div>
                <h3><?php echo esc_html(get_theme_mod('strata_home_process_rc_s1_title', 'DISCOVERY CALL')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('strata_home_process_rc_s1_desc', 'A 30-minute call to assess athlete readiness, equipment access, and training discipline. Remote coaching demands self-direction — we confirm it before we start.')); ?></p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">02</span><span class="lbl">STEP</span></div>
                <h3><?php echo esc_html(get_theme_mod('strata_home_process_rc_s2_title', 'ONBOARDING')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('strata_home_process_rc_s2_desc', 'Detailed intake questionnaire, baseline metric collection, app/platform setup, and your Week 1 program delivered before Day 1. You know exactly what\'s coming.')); ?></p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">03</span><span class="lbl">STEP</span></div>
                <h3><?php echo esc_html(get_theme_mod('strata_home_process_rc_s3_title', 'WEEKLY LOOP')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('strata_home_process_rc_s3_desc', 'Train. Submit footage. Check-in. We review readiness, performance data, and recovery markers every seven days. Programming evolves accordingly — measured, intentional.')); ?></p>
              </div>
            </div>
          </div>

          <!-- NC Tab -->
          <div class="tab-pane" id="tab-nc" role="tabpanel">
            <div class="process-grid">
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">01</span><span class="lbl">STEP</span></div>
                <h3><?php echo esc_html(get_theme_mod('strata_home_process_nc_s1_title', 'BASELINE ASSESSMENT')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('strata_home_process_nc_s1_desc', 'Body composition review, dietary history, health markers, and performance goals. We baseline everything before prescribing anything — no guesswork, no assumptions.')); ?></p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">02</span><span class="lbl">STEP</span></div>
                <h3><?php echo esc_html(get_theme_mod('strata_home_process_nc_s2_title', 'NUTRITIONAL ARCHITECTURE')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('strata_home_process_nc_s2_desc', 'Calorie targets, macro ratios, and meal frameworks built to your physiology and training load. Not a rigid meal plan — a practical system that integrates with your life.')); ?></p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">03</span><span class="lbl">STEP</span></div>
                <h3><?php echo esc_html(get_theme_mod('strata_home_process_nc_s3_title', 'PERIODIZATION')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('strata_home_process_nc_s3_desc', 'Nutrition phases aligned to your training blocks. Performance, maintenance, and recomposition cycles executed with intent — not intuition. Weekly tracking review included.')); ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       PHILOSOPHY SECTION
  ============================================================ -->
  <section class="philosophy-section section" id="philosophy" aria-label="Our Philosophy">
    <div class="philosophy-bg" aria-hidden="true"><img src="<?php echo esc_url(strata_theme_image('strata_home_philosophy_bg', '/assets/images/1.webp')); ?>" alt="" width="1920" height="1080" loading="lazy" decoding="async" style="position:absolute;inset:-15%;width:calc(100% + 30%);height:calc(100% + 30%);object-fit:cover;object-position:center 30%;opacity:0.18;"></div>
    <div class="philosophy-overlay"></div>

    <div class="container philosophy-container">
      <div class="philosophy-content" data-reveal>
        <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_home_philosophy_eyebrow', '— Our Philosophy')); ?></span>
        <h2 class="philosophy-headline">
          <?php echo esc_html(get_theme_mod('strata_home_philosophy_headline_1', 'Intensity.')); ?><br>
          <?php echo esc_html(get_theme_mod('strata_home_philosophy_headline_2', 'Consistency.')); ?><br>
          <?php echo esc_html(get_theme_mod('strata_home_philosophy_headline_3', 'Precision.')); ?>
        </h2>
        <p class="philosophy-body"><?php echo esc_html(get_theme_mod('strata_home_philosophy_p1', 'We don\'t do generic workouts. We engineer performance. Our approach is rooted in sports science — relentlessly focused on progressive overload, strict mechanics, and absolute accountability.')); ?></p>
        <p class="philosophy-body"><?php echo esc_html(get_theme_mod('strata_home_philosophy_p2', 'Whether you\'re a competitive athlete or an executive demanding peak physical condition, our standard remains exactly the same.')); ?></p>
        <a href="<?php echo esc_url(get_theme_mod('strata_home_philosophy_cta_url', '/about/')); ?>" class="btn btn-ghost btn-lg philosophy-cta" id="philosophy-about-btn">
          <span><?php echo esc_html(get_theme_mod('strata_home_philosophy_cta_text', 'Read Our Story')); ?></span>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>

      <div class="philosophy-pillars" data-stagger data-delay="150">
        <div class="pillar" id="pillar-science">
          <span class="pillar-num">—</span>
          <h4>Science-Led</h4>
          <p>Every programme is grounded in evidence-based sports science and biomechanics.</p>
        </div>
        <div class="pillar" id="pillar-individual">
          <span class="pillar-num">—</span>
          <h4>Individually Built</h4>
          <p>No templates. Every protocol is engineered around your specific physiology and goals.</p>
        </div>
        <div class="pillar" id="pillar-accountable">
          <span class="pillar-num">—</span>
          <h4>Rigorously Accountable</h4>
          <p>We track, adjust, and push. Continuous improvement is non-negotiable.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       TESTIMONIALS SECTION
  ============================================================ -->
  <section class="testimonials-section section" id="testimonials" aria-label="Client Results and Testimonials">
    <div class="container">
      <div class="testimonials-header" data-reveal>
        <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_home_testimonials_eyebrow', '— The Results')); ?></span>
        <h2 class="testimonials-headline"><?php echo esc_html(get_theme_mod('strata_home_testimonials_headline', 'Voices from the floor.')); ?></h2>
        <p class="testimonials-sub"><?php echo esc_html(get_theme_mod('strata_home_testimonials_sub', 'Athletes. One standard. Real words from clients who turned up — and turned around.')); ?></p>
      </div>
    </div>

    <div class="testimonials-stage" id="testimonials-stage">
      <div class="testimonials-track" id="testimonials-track">

        <?php
        $testimonials = stratafitness_get_testimonials(7);

        // Fallback: if no testimonials exist in CPT, pull from Customizer (back compat)
        if (empty($testimonials)):
            $fallback_defaults = array(
                array('bg' => 'https://stratafitnesshk.com/wp-content/uploads/2025/10/i-progress.webp', 'quote' => 'Excellent strength training.', 'msg' => '"Such a positive experience with Jonathan. He guided me through excellent strength training workouts, and I\'m so proud of the progress I made."', 'client' => 'Sabrina Anderson', 'label' => 'Personal Training', 'avatar' => 'SA'),
                array('bg' => 'https://stratafitnesshk.com/wp-content/uploads/2025/10/s-progress.webp', 'quote' => 'Real results — finally.', 'msg' => '"Jon helped resolve my chronic low back pain, and I\'ve felt significantly stronger since. His warm-ups are exceptionally well thought out."', 'client' => 'Janet', 'label' => 'Personal Training', 'avatar' => 'J'),
                array('bg' => 'https://stratafitnesshk.com/wp-content/uploads/2026/04/Me.png', 'quote' => 'Stronger. No injuries.', 'msg' => '"I\'ve been training with Jon for over a year and have never felt stronger without getting injured. I now fully trust him with both my training and my health."', 'client' => 'Hind El Hathout', 'label' => 'Personal Training', 'avatar' => 'HE'),
                array('bg' => 'https://stratafitnesshk.com/wp-content/uploads/2025/10/a-progress.webp', 'quote' => 'Holistic & motivating.', 'msg' => '"Jon has been my trainer for over a year, and I continue to see steady progress. His positive and motivating approach makes training enjoyable without unnecessary pressure."', 'client' => 'Michelle', 'label' => 'Personal Training', 'avatar' => 'M'),
                array('bg' => 'https://stratafitnesshk.com/wp-content/uploads/2025/08/b-progress.jpg', 'quote' => 'Structure that actually works.', 'msg' => '"Jon\'s patience, attention to detail, and ability to demonstrate and refine movements stood out. I highly recommend Coach Jon Miller."', 'client' => 'Walter', 'label' => 'Personal Training', 'avatar' => 'W'),
                array('bg' => 'https://stratafitnesshk.com/wp-content/uploads/2025/08/me.jpg', 'quote' => 'Individualized from day one.', 'msg' => '"Jon takes a highly personalized approach and creates consistently engaging programs. He also adapts training effectively around injuries to support recovery."', 'client' => 'Yasmin', 'label' => 'Personal Training', 'avatar' => 'Y'),
                array('bg' => 'https://stratafitnesshk.com/wp-content/uploads/2026/04/Ahmed-Kindy.png', 'quote' => 'PRs at 43. No plateaus.', 'msg' => '"I\'m stronger than ever at 43, hitting PRs across multiple lifts. His varied and engaging programming has made training enjoyable and consistent."', 'client' => 'Avishay', 'label' => 'Remote Coaching', 'avatar' => 'A'),
            );
            foreach ($fallback_defaults as $i => $t):
                $n = $i + 1;
                $testimonials[] = array(
                    'bg'     => strata_theme_image_url("strata_home_t_{$n}_bg", $t['bg']),
                    'quote'  => get_theme_mod("strata_home_t_{$n}_quote", $t['quote']),
                    'msg'    => get_theme_mod("strata_home_t_{$n}_msg", $t['msg']),
                    'client' => get_theme_mod("strata_home_t_{$n}_client", $t['client']),
                    'label'  => get_theme_mod("strata_home_t_{$n}_label", $t['label']),
                    'avatar' => $t['avatar'],
                    'rating' => 5,
                );
            endforeach;
        endif;

        $total = count($testimonials);
        foreach ($testimonials as $t):
        ?>
        <div class="testimonial-card">
          <div class="t-bg" aria-hidden="true"><img src="<?php echo esc_url($t['bg']); ?>" alt="" width="360" height="480" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center top;"></div>
          <div class="t-overlay"></div>
          <div class="t-content">
            <div class="t-quote"><?php echo esc_html($t['quote']); ?></div>
            <div class="t-stars" aria-hidden="true">
              <?php for ($s = 0; $s < 5; $s++): ?>
              <svg viewBox="0 0 24 24" fill="<?php echo $s < $t['rating'] ? 'currentColor' : 'none'; ?>" stroke="currentColor" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <?php endfor; ?>
            </div>
            <p class="t-msg"><?php echo esc_html($t['msg']); ?></p>
            <div class="t-client-row">
              <div class="t-avatar" aria-hidden="true"><?php echo esc_html($t['avatar']); ?></div>
              <div class="t-client-info">
                <div class="t-client"><?php echo esc_html($t['client']); ?></div>
                <div class="t-label"><?php echo esc_html($t['label']); ?></div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>

    <div class="testimonials-nav" id="testimonials-nav">
      <button class="t-nav-btn" id="t-prev" aria-label="Previous testimonial">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
      </button>
      <div class="t-counter" id="t-counter"><span>1</span> / <?php echo $total; ?></div>
      <button class="t-nav-btn" id="t-next" aria-label="Next testimonial">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
      </button>
    </div>
  </section>

  <!-- ============================================================
       APPLY SECTION
  ============================================================ -->
  <section class="apply-section section" id="apply">
    <div class="container">
      <div class="apply-grid">
        <div class="apply-info" data-reveal>
          <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_home_apply_eyebrow', '— Get In Touch')); ?></span>
          <h2 class="apply-headline"><?php echo esc_html(get_theme_mod('strata_home_apply_headline_1', 'APPLY FOR')); ?><br><em class="text-red text-lowercase" style="font-family: var(--font-heading); font-weight: normal; font-style: italic;"><?php echo esc_html(get_theme_mod('strata_home_apply_headline_2', 'coaching.')); ?></em></h2>
          <p class="apply-desc"><?php echo esc_html(get_theme_mod('strata_home_apply_desc', 'Tell us where you are, what you want, and how serious you are. We\'ll respond within 24 hours.')); ?></p>
          <div class="apply-direct">
            <span class="direct-lbl"><?php echo esc_html(get_theme_mod('strata_home_apply_direct_label', 'DIRECT')); ?></span>
            <a href="mailto:<?php echo esc_html(get_theme_mod('strata_home_apply_direct_email', 'jon@stratafitnesshk.com')); ?>" class="direct-email"><?php echo esc_html(get_theme_mod('strata_home_apply_direct_email', 'jon@stratafitnesshk.com')); ?></a>
          </div>
        </div>

        <div class="apply-form-container" data-reveal data-delay="100">
          <div style="position: absolute; top: -26%; right: 0%; width: 100%; height: 125%; background: radial-gradient(circle closest-corner, rgba(211,21,69,0.12) 0%, transparent 70%); pointer-events: none; z-index: 0;"></div>
          <form class="apply-form" style="position: relative; z-index: 1;">
            <div class="form-row">
              <div class="form-group">
                <label for="apply-name">FULL NAME</label>
                <input type="text" id="apply-name" placeholder="Your full name" required>
              </div>
              <div class="form-group">
                <label for="apply-email">EMAIL</label>
                <input type="email" id="apply-email" placeholder="you@example.com" required>
              </div>
            </div>

            <div class="form-group">
              <label>DISCIPLINE OF INTEREST</label>
              <div class="discipline-radios">
                <label class="radio-btn">
                  <input type="radio" name="discipline" value="pt" checked>
                  <span class="radio-ui">PERSONAL<br>TRAINING</span>
                </label>
                <label class="radio-btn">
                  <input type="radio" name="discipline" value="rc">
                  <span class="radio-ui">REMOTE<br>COACHING</span>
                </label>
                <label class="radio-btn">
                  <input type="radio" name="discipline" value="nc">
                  <span class="radio-ui">NUTRITION<br>COACHING</span>
                </label>
              </div>
            </div>

            <div class="form-group">
              <label for="apply-goals">TELL US ABOUT YOUR GOALS</label>
              <textarea id="apply-goals" rows="4" placeholder="Training history, injuries, what you're chasing..." required></textarea>
            </div>

            <button type="submit" class="btn btn-primary submit-btn"><?php echo esc_html(get_theme_mod('strata_home_apply_submit_text', 'Send Application')); ?></button>
          </form>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
