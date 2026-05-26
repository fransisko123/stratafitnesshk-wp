<?php
/**
 * Template Name: Personal Training Page
 * Page Template for Personal Training
 */
get_header();
?>

    <header class="hero" id="hero" aria-label="Hero section">
    <div class="hero-bg" id="heroBgEl" aria-hidden="true">
      <img src="<?php echo esc_url(strata_theme_image('strata_pt_hero_bg', '/assets/images/6.webp')); ?>" alt="" fetchpriority="high" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center 40%;">
    </div>
    <div class="hero-overlay" id="heroOverlay"></div>
    <div class="hero-blend"></div>
    <div class="hero-light-wash" id="heroLightWash"></div>

    <div class="hero-reveal-img" id="heroRevealImg">
      <img src="<?php echo esc_url(strata_theme_image('strata_pt_hero_reveal', '/assets/images/10.webp')); ?>" alt="Athlete training" width="1280" height="720" decoding="async" loading="lazy" />
    </div>

    <div class="container hero-container">
      <div class="hero-content">
        <div class="eyebrow hero-eyebrow">
          <span class="eyebrow-left"><?php echo esc_html(get_theme_mod('strata_pt_hero_eyebrow_left', 'In-Person')); ?></span>
          <span class="eyebrow-right"><?php echo esc_html(get_theme_mod('strata_pt_hero_eyebrow_right', 'Coaching')); ?></span>
        </div>
        <h1 class="hero-headline">
          <span class="headline-left"><?php echo esc_html(get_theme_mod('strata_pt_hero_headline_left', 'Personal')); ?></span>
          <span class="headline-right"><em><?php echo esc_html(get_theme_mod('strata_pt_hero_headline_right', 'Training')); ?></em></span>
        </h1>
        <p class="hero-sub" style="margin: 0 auto;">
          <span class="sub-left"><?php echo esc_html(get_theme_mod('strata_pt_hero_sub_left', 'Elite one-on-one coaching focused on flawless mechanics')); ?></span><br>
          <span class="sub-right"><?php echo esc_html(get_theme_mod('strata_pt_hero_sub_right', 'and absolute physical development.')); ?></span>
        </p>
      </div>
      <div class="scroll-indicator" aria-hidden="true">
        <span class="scroll-line"></span>
        <span class="scroll-label">Scroll</span>
      </div>
    </div>
  </header>

  <!-- IN-STUDIO ELITE SECTION -->
  <section class="section" id="main-content" style="padding: 8rem 0 4rem; text-align: center;">
    <div class="container">
      <div data-reveal>
        <span class="eyebrow" style="margin-bottom: 1.5rem; display: inline-block;"><?php echo esc_html(get_theme_mod('strata_pt_intro_eyebrow', '— IN-STUDIO ELITE')); ?></span>
        <h2 style="font-family: var(--font-display); font-size: clamp(3rem, 7vw, 6rem); text-transform: uppercase; line-height: 1; margin-bottom: 1.5rem; letter-spacing: -0.02em;">
          <?php echo esc_html(get_theme_mod('strata_pt_intro_headline_1', 'FLAWLESS')); ?> <br>
          <em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo esc_html(get_theme_mod('strata_pt_intro_headline_italic', 'mechanics.')); ?></em>
        </h2>
        <p style="color: var(--color-text-dim); max-width: 600px; margin: 0 auto; line-height: 1.7; font-size: 1.05rem;">
          <?php echo esc_html(get_theme_mod('strata_pt_intro_desc', 'Elite one-on-one coaching focused on flawless mechanics, intensity management, and absolute physical development. We engineer superior athletes — not workout consumers.')); ?>
        </p>
      </div>
    </div>
  </section>

  <!-- WHAT'S INCLUDED SECTION -->
  <section class="section" style="padding: 6rem 0; background-color: var(--color-surface);">
    <div class="container">
      <div class="grid grid-2" style="gap: 6rem; align-items: start;">

        <!-- Left Side: List -->
        <div data-reveal>
          <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_pt_includes_eyebrow', '— WHAT\'S INCLUDED')); ?></span>
          <h2 style="font-family: var(--font-display); font-size: clamp(2.5rem, 5vw, 4.5rem); text-transform: uppercase; line-height: 1.05; margin-bottom: 4rem; letter-spacing: -0.02em;">
            <?php echo esc_html(get_theme_mod('strata_pt_includes_headline_1', 'PROGRAMMING')); ?> <br><?php echo esc_html(get_theme_mod('strata_pt_includes_headline_2', 'BUILT AROUND')); ?> <em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo esc_html(get_theme_mod('strata_pt_includes_headline_italic', 'you.')); ?></em>
          </h2>

          <div style="display: flex; flex-direction: column; gap: 2.5rem;" data-stagger data-delay="100">
            <div style="display: flex; gap: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 2.5rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">01</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo esc_html(get_theme_mod('strata_pt_item1_title', 'Customized Training Blocks')); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo esc_html(get_theme_mod('strata_pt_item1_desc', 'Macrocycles built to your individual biomechanics, training history, and competitive calendar.')); ?></p>
              </div>
            </div>

            <div style="display: flex; gap: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 2.5rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">02</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo esc_html(get_theme_mod('strata_pt_item2_title', 'Real-time Form Correction')); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo esc_html(get_theme_mod('strata_pt_item2_desc', 'Cue-by-cue mechanical refinement and intensity management on every set, every session.')); ?></p>
              </div>
            </div>

            <div style="display: flex; gap: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 2.5rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">03</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo esc_html(get_theme_mod('strata_pt_item3_title', 'Regular Physical Assessments')); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo esc_html(get_theme_mod('strata_pt_item3_desc', 'Quarterly metric monitoring — strength, mobility, body composition, work capacity.')); ?></p>
              </div>
            </div>

            <div style="display: flex; gap: 1.5rem; padding-bottom: 1rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">04</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo esc_html(get_theme_mod('strata_pt_item4_title', 'Direct Coach Access')); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo esc_html(get_theme_mod('strata_pt_item4_desc', 'Recovery, lifestyle, and programming questions answered between sessions. You\'re never coaching alone.')); ?></p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Side: Sticky Card -->
        <div class="card" style="position: sticky; top: 120px; padding: 3rem; border: 1px solid rgba(0,0,0,0.06); background: linear-gradient(145deg, rgba(232,228,222,0.95), rgba(240,237,232,0.9)); aspect-ratio: 4/5; display: flex; flex-direction: column; justify-content: space-between;" data-reveal data-delay="200">
          <!-- Background accent glow -->
          <div style="position: absolute; top: -20%; left: -20%; width: 70%; height: 70%; background: radial-gradient(circle, rgba(211,21,69,0.15) 0%, transparent 70%); pointer-events: none; z-index: 0;"></div>

          <div style="position: relative; z-index: 1; display: flex; justify-content: space-between; align-items: flex-start;">
            <span style="font-family: var(--font-heading); font-size: 0.7rem; letter-spacing: 0.15em; color: var(--color-red); text-transform: uppercase;"><?php echo esc_html(get_theme_mod('strata_pt_card_badge', 'Discipline 01')); ?></span>
            <a href="<?php echo esc_html(get_theme_mod('strata_pt_card_apply_url', 'https://go.stratafitnesshk.com/30-min-consult-assessment')); ?>" target="_blank" rel="noopener" class="btn btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.65rem; height: auto;">APPLY &rarr;</a>
          </div>

          <div style="position: relative; z-index: 1;">
            <h3 style="font-family: var(--font-display); font-size: clamp(2.5rem, 4vw, 4rem); text-transform: uppercase; line-height: 1; letter-spacing: -0.02em;">
              <?php echo esc_html(get_theme_mod('strata_pt_card_headline_1', 'BUILT FOR')); ?> <br><em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo esc_html(get_theme_mod('strata_pt_card_headline_italic', 'athletes.')); ?></em>
            </h3>
          </div>

          <div style="position: relative; z-index: 1; display: flex; justify-content: space-between; font-family: var(--font-heading); font-size: 0.7rem; letter-spacing: 0.1em; color: rgba(0,0,0,0.35); text-transform: uppercase;">
            <span><?php echo esc_html(get_theme_mod('strata_pt_card_bottom_left', 'HONG KONG')); ?></span>
            <span><?php echo esc_html(get_theme_mod('strata_pt_card_bottom_right', '3 MONTH MIN.')); ?></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- INVESTMENT SECTION -->
  <section class="section" style="padding: 8rem 0;">
    <div class="container">
      <div style="margin-bottom: 5rem;" data-reveal>
        <div class="grid grid-2" style="gap: 4rem; align-items: end;">
          <div>
            <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_pt_inv_eyebrow', '— INVESTMENT')); ?></span>
            <h2 style="font-family: var(--font-display); font-size: clamp(3rem, 6vw, 5rem); text-transform: uppercase; line-height: 1; letter-spacing: -0.02em;">
              <?php echo esc_html(get_theme_mod('strata_pt_inv_headline_1', 'MONTHLY')); ?> <br><?php echo esc_html(get_theme_mod('strata_pt_inv_headline_2', 'RETAINER.')); ?><br>
              <em style="color: var(--color-red); font-style: italic; font-weight: 500; text-transform: none; letter-spacing: 0;"><?php echo esc_html(get_theme_mod('strata_pt_inv_headline_italic', 'Three-month minimum.')); ?></em>
            </h2>
          </div>
          <div>
            <p style="color: var(--color-text-dim); max-width: 420px; line-height: 1.7; font-size: 1.05rem; padding-bottom: 1rem;"><?php echo esc_html(get_theme_mod('strata_pt_inv_desc', 'We don\'t sell session packages — we sell physiological change, and that requires runway.')); ?></p>
          </div>
        </div>
      </div>

      <!-- Pricing Box -->
      <div class="card" style="padding: var(--spacing-lg); border: 1px solid rgba(0,0,0,0.06); background: rgba(232,228,222,0.7);" data-reveal>
        <div class="grid grid-2" style="gap: var(--spacing-lg); align-items: center;">
          <div>
            <span style="font-family: var(--font-heading); font-size: 0.7rem; letter-spacing: 0.15em; color: var(--color-red); text-transform: uppercase; margin-bottom: 1rem; display: block;"><?php echo esc_html(get_theme_mod('strata_pt_inv_box_label', 'PERSONAL TRAINING')); ?></span>
            <h3 style="font-family: var(--font-display); font-size: 2rem; text-transform: uppercase; line-height: 1.1; margin-bottom: 1.5rem; letter-spacing: -0.01em;"><?php echo esc_html(get_theme_mod('strata_pt_inv_box_headline_1', 'MONTHLY RETAINER.')); ?><br><?php echo esc_html(get_theme_mod('strata_pt_inv_box_headline_2', 'QUARTERLY COMMITMENT.')); ?></h3>
            <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin-bottom: 2.5rem; max-width: 90%;"><?php echo esc_html(get_theme_mod('strata_pt_inv_box_desc', 'Choose the frequency that matches your goal. Pricing tiers vary based on weekly session volume. Detailed pricing shared during your consultation — built around your training prescription.')); ?></p>
            <a href="<?php echo esc_html(get_theme_mod('strata_pt_inv_btn_url', 'https://go.stratafitnesshk.com/30-min-consult-assessment')); ?>" target="_blank" rel="noopener" class="btn btn-primary"><?php echo esc_html(get_theme_mod('strata_pt_inv_btn_text', 'GET PRICING')); ?> &rarr;</a>
          </div>

          <!-- Tiers list -->
          <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 1.25rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo esc_html(get_theme_mod('strata_pt_tier1_name', 'TIER 01')); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo esc_html(get_theme_mod('strata_pt_tier1_freq', '2x / WEEK')); ?></span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 1.25rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo esc_html(get_theme_mod('strata_pt_tier2_name', 'TIER 02')); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo esc_html(get_theme_mod('strata_pt_tier2_freq', '3x / WEEK')); ?></span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 0.5rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo esc_html(get_theme_mod('strata_pt_tier3_name', 'TIER 03')); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo esc_html(get_theme_mod('strata_pt_tier3_freq', '4x / WEEK')); ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- THE PROCESS SECTION -->
  <section class="section" style="padding: 6rem 0 10rem; background-color: var(--color-surface);">
    <div class="container">
      <div style="margin-bottom: 5rem;" data-reveal>
        <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_pt_proc_eyebrow', '— THE PROCESS')); ?></span>
        <h2 style="font-family: var(--font-display); font-size: clamp(3rem, 6vw, 5rem); text-transform: uppercase; line-height: 1; letter-spacing: -0.02em;">
          <?php echo esc_html(get_theme_mod('strata_pt_proc_headline_1', 'THREE STEPS')); ?><br><?php echo esc_html(get_theme_mod('strata_pt_proc_headline_2', 'TO')); ?> <em style="color: var(--color-red); font-style: italic; font-weight: 500; text-transform: lowercase;"><?php echo esc_html(get_theme_mod('strata_pt_proc_headline_italic', 'execution.')); ?></em>
        </h2>
      </div>

      <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 4rem;" data-stagger data-delay="100">
        <div style="border-top: 1px solid rgba(0,0,0,0.08); padding-top: 2rem;">
          <span style="font-family: var(--font-display); font-size: 1.1rem; color: var(--color-red); margin-bottom: 1.5rem; display: block; font-weight: 700;">01</span>
          <h3 style="font-family: var(--font-display); font-size: 1.5rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: -0.01em;"><?php echo esc_html(get_theme_mod('strata_pt_proc_step1_title', 'Consultation & Assessment')); ?></h3>
          <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6;"><?php echo esc_html(get_theme_mod('strata_pt_proc_step1_desc', 'A 30-minute deep dive into your training history, injury profile, and absolute goals, followed by a movement screening.')); ?></p>
        </div>

        <div style="border-top: 1px solid rgba(0,0,0,0.08); padding-top: 2rem;">
          <span style="font-family: var(--font-display); font-size: 1.1rem; color: var(--color-red); margin-bottom: 1.5rem; display: block; font-weight: 700;">02</span>
          <h3 style="font-family: var(--font-display); font-size: 1.5rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: -0.01em;"><?php echo esc_html(get_theme_mod('strata_pt_proc_step2_title', 'Onboarding')); ?></h3>
          <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6;"><?php echo esc_html(get_theme_mod('strata_pt_proc_step2_desc', 'You will be integrated into our systems. We build your initial physiological profile and design phase one of your training macrocycle.')); ?></p>
        </div>

        <div style="border-top: 1px solid rgba(0,0,0,0.08); padding-top: 2rem;">
          <span style="font-family: var(--font-display); font-size: 1.1rem; color: var(--color-red); margin-bottom: 1.5rem; display: block; font-weight: 700;">03</span>
          <h3 style="font-family: var(--font-display); font-size: 1.5rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: -0.01em;"><?php echo esc_html(get_theme_mod('strata_pt_proc_step3_title', 'Active Client')); ?></h3>
          <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6;"><?php echo esc_html(get_theme_mod('strata_pt_proc_step3_desc', 'Execution begins. You show up, put in the work under strict supervision, and we track the data to ensure constant progression.')); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- FINAL CTA SECTION -->
  <section class="section" style="padding: 8rem 0 10rem; text-align: center;">
    <div class="container">
      <div data-reveal>
        <span class="eyebrow" style="margin-bottom: 1.5rem; display: inline-block; color: var(--color-red);"><?php echo esc_html(get_theme_mod('strata_pt_cta_eyebrow', '— APPLY')); ?></span>
        <h2 style="font-family: var(--font-display); font-size: clamp(3.5rem, 8vw, 6.5rem); text-transform: uppercase; line-height: 0.95; margin-bottom: 1.5rem; letter-spacing: -0.02em;">
          <?php echo esc_html(get_theme_mod('strata_pt_cta_headline_1', 'ENGINEER YOUR')); ?> <br>
          <em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo esc_html(get_theme_mod('strata_pt_cta_headline_italic', 'performance.')); ?></em>
        </h2>
        <p style="color: var(--color-text-dim); max-width: 600px; margin: 0 auto 3.5rem; line-height: 1.7; font-size: 1.05rem;">
          <?php echo esc_html(get_theme_mod('strata_pt_cta_desc', 'Book a 30-minute consultation. We\'ll assess your current baseline, training history, and goals — then show you what your first 90 days under Strata\'s training system look like.')); ?>
        </p>
        <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap; align-items: center;">
          <a href="<?php echo esc_html(get_theme_mod('strata_pt_cta_btn_url', 'https://go.stratafitnesshk.com/30-min-consult-assessment')); ?>" target="_blank" rel="noopener" class="btn btn-primary" style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em; padding: 1.2rem 2.4rem;">
            <?php echo esc_html(get_theme_mod('strata_pt_cta_btn_text', 'BOOK CONSULTATION')); ?> &rarr;
          </a>
          <a href="<?php echo home_url('/remote-coaching/'); ?>" class="btn btn-ghost" style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em; padding: 1.2rem 2.4rem;">
            <?php echo esc_html(get_theme_mod('strata_pt_cta_secondary_text', 'EXPLORE REMOTE COACHING')); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
