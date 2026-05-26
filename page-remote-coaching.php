<?php
/**
 * Template Name: Remote Coaching Page
 * Page Template for Remote Coaching
 */
get_header();
?>

    <header class="hero" id="hero" aria-label="Hero section">
    <div class="hero-bg" id="heroBgEl" aria-hidden="true">
      <img src="<?php echo esc_url(strata_theme_image('strata_rc_hero_bg', '/assets/images/7.webp')); ?>" alt="" fetchpriority="high" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center 40%;">
    </div>
    <div class="hero-overlay" id="heroOverlay"></div>
    <div class="hero-blend"></div>
    <div class="hero-light-wash" id="heroLightWash"></div>

    <div class="hero-reveal-img" id="heroRevealImg">
      <img src="<?php echo esc_url(strata_theme_image('strata_rc_hero_reveal', '/assets/images/9.webp')); ?>" alt="Athlete training" width="1280" height="720" decoding="async" loading="lazy" />
    </div>

    <div class="container hero-container">
      <div class="hero-content">
        <div class="eyebrow hero-eyebrow">
          <span class="eyebrow-left"><?php echo esc_html(get_theme_mod('strata_rc_hero_eyebrow_left', 'Online')); ?></span>
          <span class="eyebrow-right"><?php echo esc_html(get_theme_mod('strata_rc_hero_eyebrow_right', 'Coaching')); ?></span>
        </div>
        <h1 class="hero-headline">
          <span class="headline-left"><?php echo esc_html(get_theme_mod('strata_rc_hero_headline_left', 'Remote')); ?></span>
          <span class="headline-right"><em><?php echo esc_html(get_theme_mod('strata_rc_hero_headline_right', 'Coaching')); ?></em></span>
        </h1>
        <p class="hero-sub" style="margin: 0 auto;">
          <span class="sub-left"><?php echo esc_html(get_theme_mod('strata_rc_hero_sub_left', 'High-level programming and accountability for self-motivated')); ?></span><br>
          <span class="sub-right"><?php echo esc_html(get_theme_mod('strata_rc_hero_sub_right', 'individuals anywhere in the world.')); ?></span>
        </p>
      </div>
      <div class="scroll-indicator" aria-hidden="true">
        <span class="scroll-line"></span>
        <span class="scroll-label">Scroll</span>
      </div>
    </div>
  </header>

  <!-- ANYWHERE ON EARTH SECTION -->
  <section class="section" id="main-content" style="padding: 8rem 0 4rem; text-align: center;">
    <div class="container">
      <div data-reveal>
        <span class="eyebrow" style="margin-bottom: 1.5rem; display: inline-block;"><?php echo esc_html(get_theme_mod('strata_rc_intro_eyebrow', '— ANYWHERE ON EARTH')); ?></span>
        <h2 style="font-family: var(--font-display); font-size: clamp(3rem, 7vw, 6rem); text-transform: uppercase; line-height: 1; margin-bottom: 1.5rem; letter-spacing: -0.02em;">
          <?php echo esc_html(get_theme_mod('strata_rc_intro_headline_1', 'SAME STANDARD.')); ?> <br>
          <em style="color: var(--color-red); text-transform: none; font-style: italic; font-weight: 500;"><?php echo esc_html(get_theme_mod('strata_rc_intro_headline_italic', 'No studio required.')); ?></em>
        </h2>
        <p style="color: var(--color-text-dim); max-width: 600px; margin: 0 auto; line-height: 1.7; font-size: 1.05rem;">
          <?php echo esc_html(get_theme_mod('strata_rc_intro_desc', 'The Strata methodology — transplanted into your gym, your schedule, your time zone. The athlete supplies the discipline. We supply the architecture. Built for the disciplined, not the dependent.')); ?>
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
          <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_rc_includes_eyebrow', '— WHAT\'S INCLUDED')); ?></span>
          <h2 style="font-family: var(--font-display); font-size: clamp(2.5rem, 5vw, 4.5rem); text-transform: uppercase; line-height: 1.05; margin-bottom: 4rem; letter-spacing: -0.02em;">
            <?php echo esc_html(get_theme_mod('strata_rc_includes_headline_1', 'PROGRAMMING')); ?> <br><?php echo esc_html(get_theme_mod('strata_rc_includes_headline_2', 'BUILT AROUND')); ?> <em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo esc_html(get_theme_mod('strata_rc_includes_headline_italic', 'you.')); ?></em>
          </h2>

          <div style="display: flex; flex-direction: column; gap: 2.5rem;" data-stagger data-delay="100">
            <div style="display: flex; gap: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 2.5rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">01</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo esc_html(get_theme_mod('strata_rc_item1_title', 'Weekly Individualized Programming')); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo esc_html(get_theme_mod('strata_rc_item1_desc', 'Custom-built training weeks delivered in advance, with structured feedback loops.')); ?></p>
              </div>
            </div>

            <div style="display: flex; gap: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 2.5rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">02</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo esc_html(get_theme_mod('strata_rc_item2_title', 'Asynchronous Video Form Analysis')); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo esc_html(get_theme_mod('strata_rc_item2_desc', 'Submit lifts. Receive cue-by-cue mechanical breakdowns within 24 hours.')); ?></p>
              </div>
            </div>

            <div style="display: flex; gap: 1.5rem; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 2.5rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">03</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo esc_html(get_theme_mod('strata_rc_item3_title', 'Weekly Check-Ins')); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo esc_html(get_theme_mod('strata_rc_item3_desc', 'Sleep, stress, readiness, and recovery markers — reviewed and adjusted every seven days.')); ?></p>
              </div>
            </div>

            <div style="display: flex; gap: 1.5rem; padding-bottom: 1rem;">
              <div style="font-family: var(--font-display); color: var(--color-red); font-size: 1.1rem; font-weight: 700;">04</div>
              <div>
                <h4 style="font-family: var(--font-display); text-transform: uppercase; font-size: 1.1rem; letter-spacing: 0.05em; margin-bottom: 0.75rem;"><?php echo esc_html(get_theme_mod('strata_rc_item4_title', 'Direct Messaging')); ?></h4>
                <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin: 0;"><?php echo esc_html(get_theme_mod('strata_rc_item4_desc', 'Urgent adjustments, technique questions, and lifestyle pivots — handled in-channel.')); ?></p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Side: Sticky Card -->
        <div class="card" style="position: sticky; top: 120px; padding: 3rem; border: 1px solid rgba(0,0,0,0.06); background: linear-gradient(145deg, rgba(232,228,222,0.95), rgba(240,237,232,0.9)); aspect-ratio: 4/5; display: flex; flex-direction: column; justify-content: space-between;" data-reveal data-delay="200">
          <!-- Background accent glow -->
          <div style="position: absolute; top: -20%; left: -20%; width: 70%; height: 70%; background: radial-gradient(circle, rgba(211,21,69,0.15) 0%, transparent 70%); pointer-events: none; z-index: 0;"></div>

          <div style="position: relative; z-index: 1; display: flex; justify-content: space-between; align-items: flex-start;">
            <span style="font-family: var(--font-heading); font-size: 0.7rem; letter-spacing: 0.15em; color: var(--color-red); text-transform: uppercase;"><?php echo esc_html(get_theme_mod('strata_rc_card_badge', 'Discipline 02')); ?></span>
            <a href="<?php echo esc_html(get_theme_mod('strata_rc_card_apply_url', 'https://go.stratafitnesshk.com/remotecoachingcall')); ?>" target="_blank" rel="noopener" class="btn btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.65rem; height: auto;">APPLY &rarr;</a>
          </div>

          <div style="position: relative; z-index: 1;">
            <h3 style="font-family: var(--font-display); font-size: clamp(2.5rem, 4vw, 4rem); text-transform: uppercase; line-height: 1; letter-spacing: -0.02em;">
              <?php echo esc_html(get_theme_mod('strata_rc_card_headline_1', 'BUILT FOR')); ?> <br><em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;"><?php echo esc_html(get_theme_mod('strata_rc_card_headline_italic', 'athletes.')); ?></em>
            </h3>
          </div>

          <div style="position: relative; z-index: 1; display: flex; justify-content: space-between; font-family: var(--font-heading); font-size: 0.7rem; letter-spacing: 0.1em; color: rgba(0,0,0,0.35); text-transform: uppercase;">
            <span><?php echo esc_html(get_theme_mod('strata_rc_card_bottom_left', 'HONG KONG')); ?></span>
            <span><?php echo esc_html(get_theme_mod('strata_rc_card_bottom_right', '3 MONTH MIN.')); ?></span>
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
            <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_rc_inv_eyebrow', '— INVESTMENT')); ?></span>
            <h2 style="font-family: var(--font-display); font-size: clamp(3rem, 6vw, 5rem); text-transform: uppercase; line-height: 1; letter-spacing: -0.02em;">
              <?php echo esc_html(get_theme_mod('strata_rc_inv_headline_1', 'MONTHLY')); ?> <br><?php echo esc_html(get_theme_mod('strata_rc_inv_headline_2', 'RETAINER.')); ?><br>
              <em style="color: var(--color-red); font-style: italic; font-weight: 500; text-transform: none; letter-spacing: 0;"><?php echo esc_html(get_theme_mod('strata_rc_inv_headline_italic', 'Three-month minimum.')); ?></em>
            </h2>
          </div>
          <div>
            <p style="color: var(--color-text-dim); max-width: 420px; line-height: 1.7; font-size: 1.05rem; padding-bottom: 1rem;"><?php echo esc_html(get_theme_mod('strata_rc_inv_desc', 'We don\'t sell session packages — we sell physiological change, and that requires runway.')); ?></p>
          </div>
        </div>
      </div>

      <!-- Pricing Box -->
      <div class="card" style="padding: var(--spacing-lg); border: 1px solid rgba(0,0,0,0.06); background: rgba(232,228,222,0.7);" data-reveal>
        <div class="grid grid-2" style="gap: var(--spacing-lg); align-items: center;">
          <div>
            <span style="font-family: var(--font-heading); font-size: 0.7rem; letter-spacing: 0.15em; color: var(--color-red); text-transform: uppercase; margin-bottom: 1rem; display: block;"><?php echo esc_html(get_theme_mod('strata_rc_inv_box_label', 'REMOTE COACHING')); ?></span>
            <h3 style="font-family: var(--font-display); font-size: 2rem; text-transform: uppercase; line-height: 1.1; margin-bottom: 1.5rem; letter-spacing: -0.01em;"><?php echo esc_html(get_theme_mod('strata_rc_inv_box_headline_1', 'ONE SUBSCRIPTION.')); ?><br><?php echo esc_html(get_theme_mod('strata_rc_inv_box_headline_2', 'FULL COACHING ACCESS.')); ?></h3>
            <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6; margin-bottom: 2.5rem; max-width: 90%;"><?php echo esc_html(get_theme_mod('strata_rc_inv_box_desc', 'Programming, video review, weekly check-ins, and direct messaging — bundled into a single flat monthly fee. No hidden fees. Pricing shared during your discovery call.')); ?></p>
            <a href="<?php echo esc_html(get_theme_mod('strata_rc_inv_btn_url', 'https://go.stratafitnesshk.com/remotecoachingcall')); ?>" target="_blank" rel="noopener" class="btn btn-primary"><?php echo esc_html(get_theme_mod('strata_rc_inv_btn_text', 'GET PRICING')); ?> &rarr;</a>
          </div>

          <!-- Tiers list -->
          <div style="display: flex; flex-direction: column; gap: 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 1.25rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo esc_html(get_theme_mod('strata_rc_tier1_name', 'PROGRAMMING')); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo esc_html(get_theme_mod('strata_rc_tier1_freq', 'WEEKLY')); ?></span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 1.25rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo esc_html(get_theme_mod('strata_rc_tier2_name', 'VIDEO REVIEW')); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo esc_html(get_theme_mod('strata_rc_tier2_freq', 'ASYNC < 24H')); ?></span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(0,0,0,0.06); padding-bottom: 1.25rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo esc_html(get_theme_mod('strata_rc_tier3_name', 'CHECK-INS')); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo esc_html(get_theme_mod('strata_rc_tier3_freq', 'WEEKLY')); ?></span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 0.5rem;">
              <span style="font-family: var(--font-display); font-weight: 700; font-size: 1.25rem;"><?php echo esc_html(get_theme_mod('strata_rc_tier4_name', 'MESSAGING')); ?></span>
              <span style="font-family: var(--font-heading); font-size: 0.85rem; color: var(--color-text-dim); letter-spacing: 0.1em;"><?php echo esc_html(get_theme_mod('strata_rc_tier4_freq', 'DIRECT')); ?></span>
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
            <span class="eyebrow"><?php echo esc_html(get_theme_mod('strata_rc_proc_eyebrow', '— THE PROCESS')); ?></span>
            <h2 style="font-family: var(--font-display); font-size: clamp(3rem, 6vw, 5rem); text-transform: uppercase; line-height: 1; letter-spacing: -0.02em;">
              <?php echo esc_html(get_theme_mod('strata_rc_proc_headline_1', 'THREE STEPS')); ?><br><?php echo esc_html(get_theme_mod('strata_rc_proc_headline_2', 'TO')); ?> <em style="color: var(--color-red); font-style: italic; font-weight: 500; text-transform: lowercase;"><?php echo esc_html(get_theme_mod('strata_rc_proc_headline_italic', 'execution.')); ?></em>
            </h2>
          </div>
          <div>
            <p style="color: var(--color-text-dim); max-width: 420px; line-height: 1.7; font-size: 1.05rem; padding-bottom: 1rem;"><?php echo esc_html(get_theme_mod('strata_rc_proc_desc', 'Every athlete enters the same architecture. What changes is the prescription.')); ?></p>
          </div>
        </div>
      </div>

      <div class="grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 4rem;" data-stagger data-delay="100">
        <div style="border-top: 1px solid rgba(0,0,0,0.08); padding-top: 2rem;">
          <span style="font-family: var(--font-display); font-size: 1.1rem; color: var(--color-red); margin-bottom: 1.5rem; display: block; font-weight: 700;">01</span>
          <h3 style="font-family: var(--font-display); font-size: 1.5rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: -0.01em;"><?php echo esc_html(get_theme_mod('strata_rc_proc_step1_title', 'Discovery Call')); ?></h3>
          <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6;"><?php echo esc_html(get_theme_mod('strata_rc_proc_step1_desc', 'A detailed conversation to ensure you are a good fit for remote coaching, discussing your gym access, schedule, and discipline levels.')); ?></p>
        </div>

        <div style="border-top: 1px solid rgba(0,0,0,0.08); padding-top: 2rem;">
          <span style="font-family: var(--font-display); font-size: 1.1rem; color: var(--color-red); margin-bottom: 1.5rem; display: block; font-weight: 700;">02</span>
          <h3 style="font-family: var(--font-display); font-size: 1.5rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: -0.01em;"><?php echo esc_html(get_theme_mod('strata_rc_proc_step2_title', 'Onboarding')); ?></h3>
          <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6;"><?php echo esc_html(get_theme_mod('strata_rc_proc_step2_desc', 'You complete a comprehensive physical and lifestyle questionnaire. We set up your app access and deliver your first week of programming.')); ?></p>
        </div>

        <div style="border-top: 1px solid rgba(0,0,0,0.08); padding-top: 2rem;">
          <span style="font-family: var(--font-display); font-size: 1.1rem; color: var(--color-red); margin-bottom: 1.5rem; display: block; font-weight: 700;">03</span>
          <h3 style="font-family: var(--font-display); font-size: 1.5rem; text-transform: uppercase; margin-bottom: 1rem; letter-spacing: -0.01em;"><?php echo esc_html(get_theme_mod('strata_rc_proc_step3_title', 'Weekly Execution')); ?></h3>
          <p style="color: var(--color-text-dim); font-size: 0.95rem; line-height: 1.6;"><?php echo esc_html(get_theme_mod('strata_rc_proc_step3_desc', 'You train, record specific working sets, and submit your weekly check-in form. We review the data, adjust the variables, and set the target for the next week.')); ?></p>
        </div>
      </div>
    </div>
  </section>

  <section class="section" style="background-color: #f3f1ec; padding: 6rem 0;">
    <div class="container">
      <h2 style="font-family: var(--font-display); font-size: clamp(1.8rem, 4vw, 2.5rem); text-transform: uppercase; margin-bottom: 2.5rem; color: #111; font-weight: 700; letter-spacing: -0.01em; text-align: center;">CROSSFIT ATHLETE PERFORMANCE QUIZ</h2>
      <div id="quiz-smart-widget-a620aca2-2031-49ec-97cb-87b8306645c7" style="max-width: 960px; margin: 0 auto;"></div>
      <script>
        (function(){
          var iframe=document.createElement('iframe');
          iframe.src='https://quiz.thecollective.inc/q/a620aca2-2031-49ec-97cb-87b8306645c7?embed=true';
          iframe.style.width='100%';
          iframe.style.minHeight='800px';
          iframe.style.border='none';
          iframe.style.borderRadius='12px';
          iframe.id='quiz-smart-frame-a620aca2-2031-49ec-97cb-87b8306645c7';
          iframe.loading='lazy';
          document.getElementById('quiz-smart-widget-a620aca2-2031-49ec-97cb-87b8306645c7').appendChild(iframe);
          window.addEventListener('message',function(e){
            if(e.data.type==='quizAI:resize'){iframe.style.height=e.data.height+'px';}
            if(e.data.type==='quizAI:trackingEvent'&&e.source===iframe.contentWindow&&e.data.quizId==='a620aca2-2031-49ec-97cb-87b8306645c7'){
              var d=e.data;
              var mp={content_name:'quiz_lead',value:d.value||0,currency:'USD'};
              if(d.hashedEmail){mp.em=d.hashedEmail;}
              if(d.hashedPhone){mp.ph=d.hashedPhone;}
              if(typeof fbq==='function'){fbq('track','Lead',mp,{eventID:d.eventId});}
              var gp={value:d.value||0,currency:'USD',transaction_id:d.eventId,method:'quiz'};
              if(d.hashedEmail){gp.sha256_email_address=d.hashedEmail;}
              if(d.hashedPhone){gp.sha256_phone_number=d.hashedPhone;}
              if(typeof gtag==='function'){gtag('event','generate_lead',gp);}
              if(typeof ttq!=='undefined'&&ttq&&typeof ttq.track==='function'){
                if(d.hashedEmail&&typeof ttq.identify==='function'){ttq.identify({sha256_email:d.hashedEmail,sha256_phone_number:d.hashedPhone||''});}
                ttq.track('SubmitForm',{value:d.value||0,currency:'USD',event_id:d.eventId});
              }
            }
          });
        })();
      </script>
    </div>
  </section>

  <!-- FINAL CTA SECTION -->
  <section class="section" style="padding: 8rem 0 10rem; text-align: center;">
    <div class="container">
      <div data-reveal>
        <span class="eyebrow" style="margin-bottom: 1.5rem; display: inline-block; color: var(--color-red);">— APPLY</span>
        <h2 style="font-family: var(--font-display); font-size: clamp(3.5rem, 8vw, 6.5rem); text-transform: uppercase; line-height: 0.95; margin-bottom: 1.5rem; letter-spacing: -0.02em;">
          ENGINEER YOUR <br>
          <em style="color: var(--color-red); text-transform: lowercase; font-style: italic; font-weight: 500;">progress.</em>
        </h2>
        <p style="color: var(--color-text-dim); max-width: 600px; margin: 0 auto 3.5rem; line-height: 1.7; font-size: 1.05rem;">
          Book a 30-minute discovery call. We'll assess your current baseline, training history, and goals — then show you what your first 90 days under Strata's remote system look like.
        </p>
        <div style="display: flex; gap: 1.5rem; justify-content: center; flex-wrap: wrap; align-items: center;">
          <a href="https://go.stratafitnesshk.com/remotecoachingcall" target="_blank" rel="noopener" class="btn btn-primary" style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em; padding: 1.2rem 2.4rem;">
            BOOK DISCOVERY CALL &rarr;
          </a>
          <a href="<?php echo home_url('/nutrition-coaching/'); ?>" class="btn btn-ghost" style="text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.1em; padding: 1.2rem 2.4rem;">
            EXPLORE NUTRITION COACHING
          </a>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
