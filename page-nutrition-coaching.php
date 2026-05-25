<?php
/**
 * Template Name: Nutrition Coaching Page
 * Page Template for Nutrition Coaching
 */
get_header();
?>

  <header class="hero" id="hero" aria-label="Hero section">
    <div class="hero-bg" id="heroBgEl" aria-hidden="true">
      <img src="<?php echo strata_theme_image('strata_nc_hero_bg', '/assets/images/food1.webp'); ?>" alt="" fetchpriority="high" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center 40%;">
    </div>
    <div class="hero-overlay" id="heroOverlay"></div>
    <div class="hero-blend"></div>
    <div class="hero-light-wash" id="heroLightWash"></div>

    <div class="hero-reveal-img" id="heroRevealImg">
      <img src="<?php echo strata_theme_image('strata_nc_hero_reveal', '/assets/images/food2.webp'); ?>" alt="Athlete training" width="1280" height="720" decoding="async" loading="lazy" />
    </div>

    <div class="container hero-container">
      <div class="hero-content">
        <div class="eyebrow hero-eyebrow">
          <span class="eyebrow-left"><?php echo get_theme_mod('strata_nc_hero_eyebrow_left', 'Data-Driven'); ?></span>
          <span class="eyebrow-right"><?php echo get_theme_mod('strata_nc_hero_eyebrow_right', 'Protocol'); ?></span>
        </div>
        <h1 class="hero-headline">
          <span class="headline-left"><?php echo get_theme_mod('strata_nc_hero_headline_left', 'Nutrition'); ?></span>
          <span class="headline-right"><em><?php echo get_theme_mod('strata_nc_hero_headline_right', 'Coaching'); ?></em></span>
        </h1>
        <p class="hero-sub" style="margin: 0 auto;">
          <span class="sub-left"><?php echo get_theme_mod('strata_nc_hero_sub_left', 'Strategic macronutrient management designed to optimize'); ?></span><br>
          <span class="sub-right"><?php echo get_theme_mod('strata_nc_hero_sub_right', 'performance, recovery, and body composition.'); ?></span>
        </p>
      </div>
      <div class="scroll-indicator" aria-hidden="true">
        <span class="scroll-line"></span>
        <span class="scroll-label">Scroll</span>
      </div>
    </div>
  </header>

  <!-- STRATEGIC FUELING SECTION -->
  <section class="section" style="padding: 8rem 0 4rem; text-align: center;">
    <div class="container">
      <div data-reveal>
        <span class="eyebrow" style="margin-bottom: 1.5rem; display: inline-block;"><?php echo get_theme_mod('strata_nc_intro_eyebrow', '— STRATEGIC FUELING'); ?></span>
        <h2 style="font-family: var(--font-display); font-size: clamp(3rem, 7vw, 6rem); text-transform: uppercase; line-height: 1; margin-bottom: 1.5rem; letter-spacing: -0.02em;">
          <?php echo get_theme_mod('strata_nc_intro_headline_1', 'PERIODIZED'); ?> <br>
          <em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo get_theme_mod('strata_nc_intro_headline_italic', 'precision.'); ?></em>
        </h2>
        <p style="color: var(--color-text-dim); max-width: 650px; margin: 0 auto; line-height: 1.7; font-size: 1.05rem;">
          <?php echo get_theme_mod('strata_nc_intro_desc', 'Macronutrient targets engineered against your training load, body composition goals, and recovery markers. Adjusted bi-weekly. Built to last. Nutrition is the foundation that programming sits on — we treat it that way.'); ?>
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
          <span class="eyebrow"><?php echo get_theme_mod('strata_nc_includes_eyebrow', '— WHAT\'S INCLUDED'); ?></span>
          <h2 style="font-family: var(--font-display); font-size: clamp(2.5rem, 5vw, 4.5rem); text-transform: uppercase; line-height: 1.05; margin-bottom: 4rem; letter-spacing: -0.02em;">
            <?php echo get_theme_mod('strata_nc_includes_headline_1', 'PROGRAMMING'); ?> <br><?php echo get_theme_mod('strata_nc_includes_headline_2', 'BUILT AROUND'); ?> <em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo get_theme_mod('strata_nc_includes_headline_italic', 'you.'); ?></em>
          </h2>

          <div style="display: flex; flex-direction: column; gap: 2.5rem;" data-stagger data-delay="100">
            <div style="display: flex; gap: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 2.5rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">01</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo get_theme_mod('strata_nc_item1_title', 'Daily Macro & Caloric Targets'); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo get_theme_mod('strata_nc_item1_desc', 'Customized to your physiology, training week, and current adaptation phase.'); ?></p>
              </div>
            </div>

            <div style="display: flex; gap: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 2.5rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">02</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo get_theme_mod('strata_nc_item2_title', 'Pre/Post-Training Nutrient Timing'); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo get_theme_mod('strata_nc_item2_desc', 'Strategic peri-workout fueling to maximize performance and recovery quality.'); ?></p>
              </div>
            </div>

            <div style="display: flex; gap: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 2.5rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">03</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo get_theme_mod('strata_nc_item3_title', 'Supplementation Guidelines'); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo get_theme_mod('strata_nc_item3_desc', 'Evidence-based recommendations tailored to your gaps — no kitchen-sink stacks.'); ?></p>
              </div>
            </div>

            <div style="display: flex; gap: 1.5rem; padding-bottom: 1rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">04</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo get_theme_mod('strata_nc_item4_title', 'Bi-Weekly Adjustments'); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo get_theme_mod('strata_nc_item4_desc', 'Protocols recalibrated against weight, sleep, hunger, and energy data — every two weeks.'); ?></p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Side: Sticky Card -->
        <div class="card" style="position: sticky; top: 120px; padding: 3rem; border: 1px solid rgba(0,0,0,0.06); background: linear-gradient(145deg, rgba(232,228,222,0.95), rgba(240,237,232,0.9)); aspect-ratio: 4/5; display: flex; flex-direction: column; justify-content: space-between;" data-reveal data-delay="200">
          <div style="position: absolute; top: -20%; left: -20%; width: 70%; height: 70%; background: radial-gradient(circle, rgba(211,21,69,0.15) 0%, transparent 70%); pointer-events: none; z-index: 0;"></div>

          <div style="position: relative; z-index: 1; display: flex; justify-content: space-between; align-items: flex-start;">
            <span style="font-family: var(--font-heading); font-size: 0.7rem; letter-spacing: 0.15em; color: var(--color-red); text-transform: uppercase;"><?php echo get_theme_mod('strata_nc_card_badge', 'Discipline 03'); ?></span>
            <a href="<?php echo get_theme_mod('strata_nc_card_apply_url', 'https://go.stratafitnesshk.com/nutrition-discovery-call'); ?>" target="_blank" rel="noopener" class="btn btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.65rem; height: auto;">APPLY &rarr;</a>
          </div>

          <div style="position: relative; z-index: 1;">
            <h3 style="font-family: var(--font-display); font-size: clamp(2.5rem, 4vw, 4rem); text-transform: uppercase; line-height: 1; letter-spacing: -0.02em;">
              <?php echo get_theme_mod('strata_nc_card_headline_1', 'BUILT FOR'); ?> <br><em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo get_theme_mod('strata_nc_card_headline_italic', 'athletes.'); ?></em>
            </h3>
          </div>

          <div style="position: relative; z-index: 1; display: flex; justify-content: space-between; font-family: var(--font-heading); font-size: 0.7rem; letter-spacing: 0.1em; color: rgba(0,0,0,0.35); text-transform: uppercase;">
            <span><?php echo get_theme_mod('strata_nc_card_bottom_left', 'HONG KONG'); ?></span>
            <span><?php echo get_theme_mod('strata_nc_card_bottom_right', '3 MONTH MIN.'); ?></span>
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
            <span class="eyebrow"><?php echo get_theme_mod('strata_nc_inv_eyebrow', '— INVESTMENT'); ?></span>
            <h2 style="font-family: var(--font-display); font-size: clamp(3rem, 6vw, 5rem); text-transform: uppercase; line-height: 1; letter-spacing: -0.02em;">
              <?php echo get_theme_mod('strata_nc_inv_headline_1', 'MONTHLY'); ?> <br><?php echo get_theme_mod('strata_nc_inv_headline_2', 'RETAINER.'); ?><br>
              <em style="color: var(--color-red); font-style: italic; font-weight: 500; text-transform: none; letter-spacing: 0;"><?php echo get_theme_mod('strata_nc_inv_headline_italic', 'Three-month minimum.'); ?></em>
            </h2>
          </div>
          <div>
            <p style="color: var(--color-text-dim); max-width: 420px; line-height: 1.7; font-size: 1.05rem; padding-bottom: 1rem;"><?php echo get_theme_mod('strata_nc_inv_desc', 'We don\'t sell session packages — we sell physiological change, and that requires runway.'); ?></p>
          </div>
        </div>
      </div>

      <!-- Pricing Box -->
      <div class="card" style="padding: var(--spacing-lg); border: 1px solid rgba(0,0,0,0.06); background: rgba(232,228,222,0.7);" data-reveal>
        <div class="grid grid-2" style="gap: var(--spacing-lg); align-items: center;">
          <div>
            <span style="font-family: var(--font-heading); font-size: 0.7rem; letter-spacing: 0.15em; color: var(--color-red); text-transform: uppercase; margin-bottom: 1rem; display: block;"><?php echo get_theme_mod('strata_nc_inv_box_label', 'NUTRITION COACHING'); ?></span>
            <h3 style="font-family: var(--font-display); font-size: 2rem; text-transform: uppercase; line-height: 1.1; margin-bottom: 1.5rem; letter-spacing: -0.01em;"><?php echo get_theme_mod('strata_nc_inv_box_headline_1', 'STANDALONE OR'); ?><br><?php echo get_theme_mod('strata_nc_inv_box_headline_2', 'BUNDLED.'); ?></h3>
            <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin-bottom: 2.5rem; max-width: 90%;"><?php echo get_theme_mod('strata_nc_inv_box_desc', 'Available as a standalone service or bundled with Personal Training or Remote Coaching. 3-month minimum is required to assess true metabolic response.'); ?></p>
            <a href="<?php echo get_theme_mod('strata_nc_inv_btn_url', 'https://go.stratafitnesshk.com/nutrition-discovery-call'); ?>" target="_blank" rel="noopener" class="btn btn-primary"><?php echo get_theme_mod('strata_nc_inv_btn_text', 'GET PRICING'); ?> &rarr;</a>
          </div>

          <!-- Tiers list -->
          <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 1.25rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo get_theme_mod('strata_nc_tier1_name', 'STANDALONE'); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo get_theme_mod('strata_nc_tier1_freq', 'MONTHLY'); ?></span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 1.25rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo get_theme_mod('strata_nc_tier2_name', '+ PERSONAL TRAINING'); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo get_theme_mod('strata_nc_tier2_freq', 'BUNDLED'); ?></span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 0.5rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo get_theme_mod('strata_nc_tier3_name', '+ REMOTE COACHING'); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo get_theme_mod('strata_nc_tier3_freq', 'BUNDLED'); ?></span>
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
        <div class="grid grid-2" style="gap: 4rem; align-items: end;">
          <div>
            <span class="eyebrow"><?php echo get_theme_mod('strata_nc_proc_eyebrow', '— THE PROCESS'); ?></span>
            <h2 style="font-family: var(--font-display); font-size: clamp(3rem, 6vw, 5rem); text-transform: uppercase; line-height: 1; letter-spacing: -0.02em;">
              <?php echo get_theme_mod('strata_nc_proc_headline_1', 'THREE STEPS'); ?><br><?php echo get_theme_mod('strata_nc_proc_headline_2', 'TO'); ?> <em style="color: var(--color-red); font-style: italic; font-weight: 500; text-transform: lowercase;"><?php echo get_theme_mod('strata_nc_proc_headline_italic', 'execution.'); ?></em>
            </h2>
          </div>
          <div>
            <p style="color: var(--color-text-dim); max-width: 420px; line-height: 1.7; font-size: 1.05rem; padding-bottom: 1rem;"><?php echo get_theme_mod('strata_nc_proc_desc', 'Every athlete enters the same architecture. What changes is the prescription.'); ?></p>
          </div>
        </div>
      </div>

      <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;" data-stagger data-delay="100">
        <div style="background: rgba(232,228,222,0.5); padding: 3rem 2rem; border: 1px solid rgba(0,0,0,0.06);">
          <span style="font-family: var(--font-heading); font-size: 0.75rem; letter-spacing: 0.1em; color: var(--color-red); margin-bottom: 1rem; display: block; font-weight: 700; text-transform: uppercase;">Step 01</span>
          <h3 style="font-family: var(--font-display); font-size: 1.5rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: -0.01em;"><?php echo get_theme_mod('strata_nc_proc_step1_title', 'Discovery Call'); ?></h3>
          <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6;"><?php echo get_theme_mod('strata_nc_proc_step1_desc', 'Assessment of dieting history, current metabolic state, training load, and outcome goals. We diagnose before we prescribe.'); ?></p>
        </div>

        <div style="background: rgba(232,228,222,0.5); padding: 3rem 2rem; border: 1px solid rgba(0,0,0,0.06);">
          <span style="font-family: var(--font-heading); font-size: 0.75rem; letter-spacing: 0.1em; color: var(--color-red); margin-bottom: 1rem; display: block; font-weight: 700; text-transform: uppercase;">Step 02</span>
          <h3 style="font-family: var(--font-display); font-size: 1.5rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: -0.01em;"><?php echo get_theme_mod('strata_nc_proc_step2_title', 'Onboarding'); ?></h3>
          <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6;"><?php echo get_theme_mod('strata_nc_proc_step2_desc', 'Baseline metrics established. Client tracks intake honestly for 3-5 days. Your initial protocol is then prescribed.'); ?></p>
        </div>

        <div style="background: rgba(232,228,222,0.5); padding: 3rem 2rem; border: 1px solid rgba(0,0,0,0.06);">
          <span style="font-family: var(--font-heading); font-size: 0.75rem; letter-spacing: 0.1em; color: var(--color-red); margin-bottom: 1rem; display: block; font-weight: 700; text-transform: uppercase;">Step 03</span>
          <h3 style="font-family: var(--font-display); font-size: 1.5rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: -0.01em;"><?php echo get_theme_mod('strata_nc_proc_step3_title', 'Weekly Check-In'); ?></h3>
          <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6;"><?php echo get_theme_mod('strata_nc_proc_step3_desc', 'Morning weight, sleep quality, hunger, and energy levels reported. Bi-weekly recalibration against the data.'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- FINAL CTA SECTION -->
  <section class="section" style="padding: 8rem 0 10rem; text-align: center;">
    <div class="container">
      <div data-reveal>
        <span class="eyebrow" style="margin-bottom: 1.5rem; display: inline-block; color: var(--color-red);"><?php echo get_theme_mod('strata_nc_cta_eyebrow', '— APPLY'); ?></span>
        <h2 style="font-family: var(--font-display); font-size: clamp(3.5rem, 8vw, 6.5rem); text-transform: uppercase; line-height: 0.95; margin-bottom: 1.5rem; letter-spacing: -0.02em;">
          <?php echo get_theme_mod('strata_nc_cta_headline_1', 'ENGINEER YOUR'); ?> <br>
          <em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo get_theme_mod('strata_nc_cta_headline_italic', 'fueling.'); ?></em>
        </h2>
        <p style="color: var(--color-text-dim); max-width: 600px; margin: 0 auto 3.5rem; line-height: 1.7; font-size: 1.05rem;">
          <?php echo get_theme_mod('strata_nc_cta_desc', 'Book a 30-minute discovery call. We\'ll assess your current metabolic state, dieting history, and goals — then show you what your first 90 days under Strata\'s nutrition system look like.'); ?>
        </p>
        <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap; align-items: center;">
          <a href="<?php echo get_theme_mod('strata_nc_cta_btn_url', 'https://go.stratafitnesshk.com/nutrition-discovery-call'); ?>" target="_blank" rel="noopener" class="btn btn-primary" style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em; padding: 1.2rem 2.4rem;">
            <?php echo get_theme_mod('strata_nc_cta_btn_text', 'BOOK DISCOVERY CALL'); ?> &rarr;
          </a>
          <a href="<?php echo home_url('/personal-training/'); ?>" class="btn btn-ghost" style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em; padding: 1.2rem 2.4rem;">
            <?php echo get_theme_mod('strata_nc_cta_secondary_text', 'EXPLORE PERSONAL TRAINING'); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
