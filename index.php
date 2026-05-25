<?php
/**
 * Homepage Template
 */
get_header();
?>

  <!-- ============================================================
       HERO SECTION
  ============================================================ -->
<header class="hero" id="hero" aria-label="Hero section">
  <!-- Hero BG: use <img> for LCP discoverability, hidden visually -->
  <div class="hero-bg" id="heroBgEl" aria-hidden="true">
    <img
      src="<?php echo get_template_directory_uri(); ?>/assets/images/10.webp"
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
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/5.webp" alt="Athlete in training" width="1280" height="720" decoding="async" loading="lazy">
  </div>

  <div class="container hero-container">
    <div class="hero-content">
      <div class="eyebrow hero-eyebrow">
        <span class="eyebrow-left">Elite Performance</span>
        <span class="eyebrow-right">Coaching · Hong Kong</span>
      </div>
      <h1 class="hero-headline">
        <span class="headline-left">We Build</span>
        <span class="headline-right"><em>Athletes.</em></span>
      </h1>
      <p class="hero-sub">
        <span class="sub-left">Competitive athletes and driven professionals.</span><br>
        <span class="sub-right">We engineer performance not workouts.</span>
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
  <section class="mandate-section section" id="mandate">
    <div class="container">
      <div class="mandate-content" data-reveal>
        <span class="eyebrow">— Our Mandate</span>
        <h2 class="mandate-headline">
          ENGINEER<br><span class="text-red">Performance.</span>
        </h2>
        <p class="mandate-sub">For competitive athletes and driven professionals based in Hong Kong and beyond. We build superior athletes through individualized programming, ruthless accountability, and a science-led methodology — not template programs and entertainment.</p>
        <div class="mandate-actions">
          <a href="#apply" class="btn btn-primary mandate-cta">
            APPLY FOR COACHING
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </a>
          <a href="#services" class="btn btn-outline mandate-outline">OUR DISCIPLINES</a>
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
        <p class="eyebrow">— Credentials</p>
        <h2 class="credentials-title">Educated by the Best.</h2>
        <p class="credentials-sub">Certifications from the institutions that set the global standard for<br>strength, mobility, sport, and nutrition.</p>
      </div>

      <!-- Logo marquee -->
      <div class="logos-marquee" aria-label="Certification logos" role="region">
        <div class="logos-track" aria-hidden="true">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo1.png" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo2.png" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo3.svg" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo4.svg" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo1.png" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo2.png" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo3.svg" alt="" width="120" height="28" loading="lazy" decoding="async">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logos/logo4.svg" alt="" width="120" height="28" loading="lazy" decoding="async">
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
        <span class="eyebrow">— Three Paths</span>
        <h2 class="svc-editorial-headline">
          ONE<br>
          <em class="text-red" style="font-style: italic; font-weight: 500; font-family: var(--font-display); text-transform: none; letter-spacing: -0.02em;">Standard.</em>
        </h2>
        <p class="svc-editorial-body">Every Strata service operates under a single principle: engineer the athlete, don't entertain them. Choose your path — every one is built on data, intent, and measurable outcomes.</p>
      </div>

      <!-- Service cards grid -->
      <div class="services-grid-premium" id="services-grid" data-stagger data-delay="200">

        <!-- Card 1: Personal Training -->
        <article class="svc-card" id="svc-personal-training" aria-label="Personal Training service card">
          <div class="svc-bg" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/6.webp" alt="" width="600" height="560" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;"></div>
          <div class="svc-overlay"></div>
          <div class="svc-body">
            <div class="svc-meta">
              <span class="svc-tag">01</span>
              <button class="svc-toggle" aria-label="Expand Personal Training details">
                <svg class="icon-plus" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <svg class="icon-close" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>
            <div class="svc-foot">
              <h3 class="svc-title">In-Person Personal Training</h3>
              <p class="svc-desc">One-on-one coaching at our gym in Central, HK. Expert guidance, real-time feedback, and direct supervision for maximum results.</p>
              <div class="svc-actions">
                <a href="https://go.stratafitnesshk.com/30-min-consult-assessment" class="svc-cta btn btn-primary" target="_blank" rel="noopener" id="svc-pt-cta">
                  Book Assessment
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="<?php echo home_url('/personal-training/'); ?>" class="svc-learn">Learn More</a>
              </div>
            </div>
          </div>
        </article>

        <!-- Card 2: Remote Coaching -->
        <article class="svc-card" id="svc-remote-coaching" aria-label="Remote Coaching service card">
          <div class="svc-bg" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/7.webp" alt="" width="600" height="560" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;"></div>
          <div class="svc-overlay"></div>
          <div class="svc-body">
            <div class="svc-meta">
              <span class="svc-tag">02</span>
              <button class="svc-toggle" aria-label="Expand Remote Coaching details">
                <svg class="icon-plus" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <svg class="icon-close" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>
            <div class="svc-foot">
              <h3 class="svc-title">Remote Coaching</h3>
              <p class="svc-desc">Complete programming tailored to your goals, capacity, and lifestyle. Includes weekly coaching, form reviews, and real-time program adjustments.</p>
              <div class="svc-actions">
                <a href="https://go.stratafitnesshk.com/remotecoachingcall" class="svc-cta btn btn-primary" target="_blank" rel="noopener" id="svc-rc-cta">
                  Book a Call
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="<?php echo home_url('/remote-coaching/'); ?>" class="svc-learn">Learn More</a>
              </div>
            </div>
          </div>
        </article>

        <!-- Card 3: Nutrition Coaching -->
        <article class="svc-card" id="svc-nutrition-coaching" aria-label="Nutrition Coaching service card">
          <div class="svc-bg" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/8.webp" alt="" width="600" height="560" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;"></div>
          <div class="svc-overlay"></div>
          <div class="svc-body">
            <div class="svc-meta">
              <span class="svc-tag">03</span>
              <button class="svc-toggle" aria-label="Expand Nutrition Coaching details">
                <svg class="icon-plus" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                <svg class="icon-close" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
              </button>
            </div>
            <div class="svc-foot">
              <h3 class="svc-title">Nutrition Coaching</h3>
              <p class="svc-desc">Data-driven nutritional periodization. Optimized for body composition, recovery, and peak performance at every phase of training.</p>
              <div class="svc-actions">
                <a href="https://go.stratafitnesshk.com/nutrition-discovery-call" class="svc-cta btn btn-primary" target="_blank" rel="noopener" id="svc-nc-cta">
                  Book Discovery Call
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </a>
                <a href="<?php echo home_url('/nutrition-coaching/'); ?>" class="svc-learn">Learn More</a>
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
          <span class="eyebrow">— The Process</span>
          <h2 class="pt-headline">ASSESSMENT<br>TO <em class="text-red text-lowercase">execution.</em></h2>
        </div>
        <div class="header-right">
          <p>Every athlete enters the same three-phase architecture. Select a service to see exactly how it unfolds.</p>
        </div>
      </div>

      <div class="process-tabs-wrapper" data-reveal data-delay="100">
        <div class="process-tabs-nav" role="tablist">
          <button role="tab" class="tab-btn active" data-tab="pt" aria-selected="true">PERSONAL TRAINING</button>
          <button role="tab" class="tab-btn" data-tab="rc" aria-selected="false">REMOTE COACHING</button>
          <button role="tab" class="tab-btn" data-tab="nc" aria-selected="false">NUTRITION COACHING</button>
        </div>

        <div class="process-tabs-content">
          <!-- PT Tab -->
          <div class="tab-pane active" id="tab-pt" role="tabpanel">
            <div class="process-grid">
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">01</span><span class="lbl">STEP</span></div>
                <h3>CONSULTATION</h3>
                <p>A 30-minute deep-dive into your training history, injury record, lifestyle constraints, and the outcome you actually want. Movement screening included. This is where your prescription begins.</p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">02</span><span class="lbl">STEP</span></div>
                <h3>PROGRAM DESIGN</h3>
                <p>Physiological profiling, baseline metrics, and full macrocycle design. Your first training block is built and periodized before you ever step on the floor. No templates.</p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">03</span><span class="lbl">STEP</span></div>
                <h3>COACHED EXECUTION</h3>
                <p>Supervised in-person sessions with real-time mechanical feedback and load management. Programming adapts to your readiness, recovery, and trajectory — week after week.</p>
              </div>
            </div>
          </div>

          <!-- RC Tab -->
          <div class="tab-pane" id="tab-rc" role="tabpanel">
            <div class="process-grid">
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">01</span><span class="lbl">STEP</span></div>
                <h3>DISCOVERY CALL</h3>
                <p>A 30-minute call to assess athlete readiness, equipment access, and training discipline. Remote coaching demands self-direction — we confirm it before we start.</p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">02</span><span class="lbl">STEP</span></div>
                <h3>ONBOARDING</h3>
                <p>Detailed intake questionnaire, baseline metric collection, app/platform setup, and your Week 1 program delivered before Day 1. You know exactly what's coming.</p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">03</span><span class="lbl">STEP</span></div>
                <h3>WEEKLY LOOP</h3>
                <p>Train. Submit footage. Check-in. We review readiness, performance data, and recovery markers every seven days. Programming evolves accordingly — measured, intentional.</p>
              </div>
            </div>
          </div>

          <!-- NC Tab -->
          <div class="tab-pane" id="tab-nc" role="tabpanel">
            <div class="process-grid">
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">01</span><span class="lbl">STEP</span></div>
                <h3>BASELINE ASSESSMENT</h3>
                <p>Body composition review, dietary history, health markers, and performance goals. We baseline everything before prescribing anything — no guesswork, no assumptions.</p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">02</span><span class="lbl">STEP</span></div>
                <h3>NUTRITIONAL ARCHITECTURE</h3>
                <p>Calorie targets, macro ratios, and meal frameworks built to your physiology and training load. Not a rigid meal plan — a practical system that integrates with your life.</p>
              </div>
              <div class="process-step-tab">
                <div class="step-num-wrap"><span class="num text-red">03</span><span class="lbl">STEP</span></div>
                <h3>PERIODIZATION</h3>
                <p>Nutrition phases aligned to your training blocks. Performance, maintenance, and recomposition cycles executed with intent — not intuition. Weekly tracking review included.</p>
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
    <div class="philosophy-bg" aria-hidden="true"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/1.webp" alt="" width="1920" height="1080" loading="lazy" decoding="async" style="position:absolute;inset:-15%;width:calc(100% + 30%);height:calc(100% + 30%);object-fit:cover;object-position:center 30%;opacity:0.18;"></div>
    <div class="philosophy-overlay"></div>

    <div class="container philosophy-container">
      <div class="philosophy-content" data-reveal>
        <span class="eyebrow">— Our Philosophy</span>
        <h2 class="philosophy-headline">
          Intensity.<br>Consistency.<br>Precision.
        </h2>
        <p class="philosophy-body">We don't do generic workouts. We engineer performance. Our approach is rooted in sports science — relentlessly focused on progressive overload, strict mechanics, and absolute accountability.</p>
        <p class="philosophy-body">Whether you're a competitive athlete or an executive demanding peak physical condition, our standard remains exactly the same.</p>
        <a href="<?php echo home_url('/about/'); ?>" class="btn btn-ghost btn-lg philosophy-cta" id="philosophy-about-btn">
          <span>Read Our Story</span>
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
        <span class="eyebrow">— The Results</span>
        <h2 class="testimonials-headline">Voices from<br>the <em>floor.</em></h2>
        <p class="testimonials-sub">Athletes. One standard. Real words from clients who turned up — and turned around.</p>
      </div>
    </div>

    <div class="testimonials-stage" id="testimonials-stage">
      <div class="testimonials-track" id="testimonials-track">

        <div class="testimonial-card">
          <div class="t-bg" aria-hidden="true"><img src="https://stratafitnesshk.com/wp-content/uploads/2025/10/i-progress.webp" alt="" width="360" height="480" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center top;"></div>
          <div class="t-overlay"></div>
          <div class="t-content">
            <div class="t-quote">Excellent strength training.</div>
            <div class="t-stars" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <p class="t-msg">"Such a positive experience with Jonathan. He guided me through excellent strength training workouts, and I'm so proud of the progress I made."</p>
            <div class="t-client-row">
              <div class="t-avatar" aria-hidden="true">SA</div>
              <div class="t-client-info">
                <div class="t-client">Sabrina Anderson</div>
                <div class="t-label">Personal Training</div>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="t-bg" aria-hidden="true"><img src="https://stratafitnesshk.com/wp-content/uploads/2025/10/s-progress.webp" alt="" width="360" height="480" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center top;"></div>
          <div class="t-overlay"></div>
          <div class="t-content">
            <div class="t-quote">Real results — finally.</div>
            <div class="t-stars" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <p class="t-msg">"Jon helped resolve my chronic low back pain, and I've felt significantly stronger since. His warm-ups are exceptionally well thought out."</p>
            <div class="t-client-row">
              <div class="t-avatar">J</div>
              <div class="t-client-info">
                <div class="t-client">Janet</div>
                <div class="t-label">Personal Training</div>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="t-bg" aria-hidden="true"><img src="https://stratafitnesshk.com/wp-content/uploads/2026/04/Me.png" alt="" width="360" height="480" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center top;"></div>
          <div class="t-overlay"></div>
          <div class="t-content">
            <div class="t-quote">Stronger. No injuries.</div>
            <div class="t-stars" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <p class="t-msg">"I've been training with Jon for over a year and have never felt stronger without getting injured. I now fully trust him with both my training and my health."</p>
            <div class="t-client-row">
              <div class="t-avatar">HE</div>
              <div class="t-client-info">
                <div class="t-client">Hind El Hathout</div>
                <div class="t-label">Personal Training</div>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="t-bg" aria-hidden="true"><img src="https://stratafitnesshk.com/wp-content/uploads/2025/10/a-progress.webp" alt="" width="360" height="480" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center top;"></div>
          <div class="t-overlay"></div>
          <div class="t-content">
            <div class="t-quote">Holistic & motivating.</div>
            <div class="t-stars" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <p class="t-msg">"Jon has been my trainer for over a year, and I continue to see steady progress. His positive and motivating approach makes training enjoyable without unnecessary pressure."</p>
            <div class="t-client-row">
              <div class="t-avatar">M</div>
              <div class="t-client-info">
                <div class="t-client">Michelle</div>
                <div class="t-label">Personal Training</div>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="t-bg" aria-hidden="true"><img src="https://stratafitnesshk.com/wp-content/uploads/2025/08/b-progress.jpg" alt="" width="360" height="480" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center top;"></div>
          <div class="t-overlay"></div>
          <div class="t-content">
            <div class="t-quote">Structure that actually works.</div>
            <div class="t-stars" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <p class="t-msg">"Jon's patience, attention to detail, and ability to demonstrate and refine movements stood out. I highly recommend Coach Jon Miller."</p>
            <div class="t-client-row">
              <div class="t-avatar">W</div>
              <div class="t-client-info">
                <div class="t-client">Walter</div>
                <div class="t-label">Personal Training</div>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="t-bg" aria-hidden="true"><img src="https://stratafitnesshk.com/wp-content/uploads/2025/08/me.jpg" alt="" width="360" height="480" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center top;"></div>
          <div class="t-overlay"></div>
          <div class="t-content">
            <div class="t-quote">Individualized from day one.</div>
            <div class="t-stars" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <p class="t-msg">"Jon takes a highly personalized approach and creates consistently engaging programs. He also adapts training effectively around injuries to support recovery."</p>
            <div class="t-client-row">
              <div class="t-avatar">Y</div>
              <div class="t-client-info">
                <div class="t-client">Yasmin</div>
                <div class="t-label">Personal Training</div>
              </div>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="t-bg" aria-hidden="true"><img src="https://stratafitnesshk.com/wp-content/uploads/2026/04/Ahmed-Kindy.png" alt="" width="360" height="480" loading="lazy" decoding="async" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center top;"></div>
          <div class="t-overlay"></div>
          <div class="t-content">
            <div class="t-quote">PRs at 43. No plateaus.</div>
            <div class="t-stars" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
            <p class="t-msg">"I'm stronger than ever at 43, hitting PRs across multiple lifts. His varied and engaging programming has made training enjoyable and consistent."</p>
            <div class="t-client-row">
              <div class="t-avatar">A</div>
              <div class="t-client-info">
                <div class="t-client">Avishay</div>
                <div class="t-label">Remote Coaching</div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="testimonials-nav" id="testimonials-nav">
      <button class="t-nav-btn" id="t-prev" aria-label="Previous testimonial">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
      </button>
      <div class="t-counter" id="t-counter"><span>1</span> / 7</div>
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
          <span class="eyebrow">— Get In Touch</span>
          <h2 class="apply-headline">APPLY FOR<br><em class="text-red text-lowercase" style="font-family: var(--font-heading); font-weight: normal; font-style: italic;">coaching.</em></h2>
          <p class="apply-desc">Tell us where you are, what you want, and how serious you are. We'll respond within 24 hours.</p>
          <div class="apply-direct">
            <span class="direct-lbl">DIRECT</span>
            <a href="mailto:jon@stratafitnesshk.com" class="direct-email">jon@stratafitnesshk.com</a>
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

            <button type="submit" class="btn btn-primary submit-btn">Send Application</button>
          </form>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
