/**
 * Strata Fitness — Main Script
 *
 * Handles: navbar, scroll reveal, service card toggles, hero GSAP animation,
 *          logo marquee, parallax, testimonial 3D carousel, process tabs.
 *
 * @package StrataFitness
 * @since   1.0.0
 */

'use strict';

document.addEventListener('DOMContentLoaded', () => {

  /* ─────────────────────────────────────────────────────────────
     1. NAVBAR — scroll state & hamburger toggle
  ───────────────────────────────────────────────────────────── */
  const navbar     = document.getElementById('main-nav');
  const menuToggle = document.querySelector('.mobile-menu-toggle');
  const navLinks   = document.getElementById('nav-links');

  const updateNav = () => {
    const scrolled = window.scrollY > 60;
    if (navbar) navbar.classList.toggle('scrolled', scrolled);
  };

  updateNav();
  window.addEventListener('scroll', updateNav, { passive: true });

  if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', () => {
      const isOpen = menuToggle.classList.toggle('active');
      navLinks.classList.toggle('active', isOpen);
      menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    // Close mobile menu when a nav link is tapped
    navLinks.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        menuToggle.classList.remove('active');
        navLinks.classList.remove('active');
        menuToggle.setAttribute('aria-expanded', 'false');
      });
    });
  }

  /* ─────────────────────────────────────────────────────────────
     2. SCROLL REVEAL & STAGGER
     Observes [data-reveal] and [data-stagger] elements; adds
     .is-visible when they enter the viewport.
  ───────────────────────────────────────────────────────────── */
  const revealEls = document.querySelectorAll('[data-reveal], [data-stagger]');

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;

        const el    = entry.target;
        const delay = parseInt(el.dataset.delay || '0', 10);

        setTimeout(() => {
          el.classList.add('is-visible');

          // Apply staggered transition-delay to direct children
          if (el.hasAttribute('data-stagger')) {
            Array.from(el.children).forEach((child, idx) => {
              child.style.transitionDelay = `${idx * 90}ms`;
            });
          }
        }, delay);

        observer.unobserve(el);
      });
    }, { threshold: 0.15, rootMargin: '0px 0px -10% 0px' });

    revealEls.forEach(el => observer.observe(el));
  } else {
    // Fallback for browsers without IntersectionObserver
    revealEls.forEach(el => el.classList.add('is-visible'));
  }

  /* ─────────────────────────────────────────────────────────────
     3. SERVICE CARD — mobile expand/collapse toggle
  ───────────────────────────────────────────────────────────── */
  document.querySelectorAll('.svc-toggle').forEach(btn => {
    btn.addEventListener('click', (e) => {
      // Do NOT stopPropagation — breaks second tap (close) on iOS
      e.preventDefault();
      const card = btn.closest('.svc-card');
      if (!card) return;

      const isOpen = card.classList.contains('is-open');

      // Close any already-open card
      document.querySelectorAll('.svc-card.is-open').forEach(open => {
        open.classList.remove('is-open');
      });

      // Open this card only if it wasn't already open
      if (!isOpen) card.classList.add('is-open');
    });
  });

  /* ─────────────────────────────────────────────────────────────
     4. LOGO MARQUEE — pause animation on hover
  ───────────────────────────────────────────────────────────── */
  const logosTrack   = document.querySelector('.logos-track');
  const logoMarquee  = document.querySelector('.logos-marquee');

  if (logosTrack && logoMarquee) {
    logoMarquee.addEventListener('mouseenter', () => {
      logosTrack.style.animationPlayState = 'paused';
    });
    logoMarquee.addEventListener('mouseleave', () => {
      logosTrack.style.animationPlayState = 'running';
    });
  }

  /* ─────────────────────────────────────────────────────────────
     5. PARALLAX — philosophy section background
     Uses rAF throttling; disabled when prefers-reduced-motion.
  ───────────────────────────────────────────────────────────── */
  const philosophyBg      = document.querySelector('.philosophy-bg');
  const philosophySection = document.getElementById('philosophy');
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!prefersReducedMotion && philosophyBg && philosophySection) {
    let ticking = false;
    const philosophyImg = philosophyBg.querySelector('img');

    window.addEventListener('scroll', () => {
      if (ticking) return;
      requestAnimationFrame(() => {
        const rect = philosophySection.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
          const progress = (window.innerHeight - rect.top) * 0.25;
          if (philosophyImg) {
            philosophyImg.style.transform = `translate3d(0, ${progress}px, 0) scale(1.2)`;
          }
        }
        ticking = false;
      });
      ticking = true;
    }, { passive: true });
  }

  /* ─────────────────────────────────────────────────────────────
     6. HERO — GSAP scroll-driven split-text + image expansion
     Requires gsap.min.js + ScrollTrigger.min.js (loaded via CDN).
     Falls back to instant-visible state if GSAP is unavailable.
  ───────────────────────────────────────────────────────────── */
  const heroSection   = document.getElementById('hero');
  const heroRevealImg = document.getElementById('heroRevealImg');
  const headlineLeft  = document.querySelector('.headline-left');
  const headlineRight = document.querySelector('.headline-right');

  if (
    typeof gsap !== 'undefined' &&
    typeof ScrollTrigger !== 'undefined' &&
    heroSection && heroRevealImg && headlineLeft && headlineRight &&
    !prefersReducedMotion
  ) {
    gsap.registerPlugin(ScrollTrigger);

    // Entrance animations (replaces CSS opacity:0 initial state)
    gsap.fromTo(
      ['.hero-eyebrow', '.hero-headline', '.hero-sub', '.hero-actions'],
      { opacity: 0, y: 40 },
      { opacity: 1, y: 0, duration: 0.9, stagger: 0.1, delay: 0.5, ease: 'power2.out' }
    );
    gsap.fromTo(
      heroRevealImg,
      { opacity: 0, y: 40, xPercent: -50, yPercent: -50 },
      { opacity: 1, y: 0, xPercent: -50, yPercent: -50, duration: 0.9, delay: 0.5, ease: 'power2.out' }
    );

    // Scroll-driven timeline (pinned hero)
    // Snappier scrub on mobile for better responsiveness
    const isMobile = /Mobi|Android/.test(navigator.userAgent);
    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: heroSection,
        start: 'top top',
        end: '+=120%',  // Long scrub distance for cinematic pacing
        scrub: isMobile ? 0.4 : 1,  // Snappier on mobile
        pin: true,
      }
    });

    // Phase 1 (0→0.5): Dark bg + overlay fade out, white wash fades IN
    // → hero goes from dark full-bleed photo to bright white
    tl.to('.hero-bg', { opacity: 0, ease: 'power1.inOut' }, 0);
    tl.to('#heroOverlay', { opacity: 0, ease: 'power1.inOut' }, 0);
    tl.to('#heroLightWash', { opacity: 1, ease: 'power1.inOut' }, 0);

    // Expand reveal image to near-fullscreen (capped for ultra-wide monitors)
    const revealW = `min(85vw, 1400px)`;
    const revealH = `min(85svh, 900px)`;
    tl.to(heroRevealImg, {
      width: revealW,
      height: revealH,
      borderRadius: '16px',
      boxShadow: '0 0 25px 4px rgba(211,21,69,0.3), 0 0 60px 12px rgba(0,0,0,0.6), 0 20px 40px rgba(0,0,0,0.8)',
      ease: 'power1.inOut'
    }, 0);

    // Split headline + sub text off-screen left/right
    // Use a capped pixel value so it doesn't fly too far on wide monitors
    const splitDist = Math.min(window.innerWidth * 0.5, 700);
    tl.to(['.headline-left', '.eyebrow-left', '.sub-left', '.action-left'], {
      x: -splitDist, opacity: 0, ease: 'power1.inOut'
    }, 0);
    tl.to(['.headline-right', '.eyebrow-right', '.sub-right', '.action-right'], {
      x: splitDist, opacity: 0, ease: 'power1.inOut'
    }, 0);

    // Scroll indicator exits downward
    tl.fromTo('.scroll-indicator',
      { opacity: 1, y: 0 },
      { y: '50vh', opacity: 0, ease: 'power1.inOut' },
      0
    );

  } else if (heroSection) {
    // Fallback: reveal hero elements immediately
    document.querySelectorAll('.hero-eyebrow, .hero-headline, .hero-sub, .hero-actions')
      .forEach(el => {
        el.style.opacity = '1';
        el.style.transform = 'none';
      });
    if (heroRevealImg) heroRevealImg.style.opacity = '1';
  }

  /* ─────────────────────────────────────────────────────────────
     7. TESTIMONIALS — 3D carousel
     Supports: click, keyboard arrows, touch swipe, mouse drag, 3D tilt.
  ───────────────────────────────────────────────────────────── */
  const stage   = document.getElementById('testimonials-stage');
  const track   = document.getElementById('testimonials-track');
  const counter = document.getElementById('t-counter');
  const prevBtn = document.getElementById('t-prev');
  const nextBtn = document.getElementById('t-next');

  if (stage && track) {
    const cards = Array.from(track.querySelectorAll('.testimonial-card'));
    const total = cards.length;
    let current = 0;

    function updateCounter() {
      if (counter) counter.innerHTML = `<span>${current + 1}</span> / ${total}`;
    }

    function positionCards() {
      const cardW = cards[0].offsetWidth;
      const gap   = cardW * 0.82;

      cards.forEach((card, i) => {
        // Ensure CSS transition is active for smooth sliding
        card.style.transition = '';

        let offset = i - current;
        if (offset >  total / 2) offset -= total;
        if (offset < -total / 2) offset += total;

        const absOffset = Math.abs(offset);
        const tx      = offset * gap;
        const scale   = absOffset === 0 ? 1   : absOffset === 1 ? 0.78 : 0.62;
        const opacity = absOffset === 0 ? 1   : absOffset === 1 ? 0.45 : absOffset === 2 ? 0.2 : 0;
        const tz      = absOffset === 0 ? 0   : absOffset === 1 ? -120 : -200;
        const zIndex  = absOffset === 0 ? 10  : absOffset === 1 ? 5    : 1;

        card.style.transform    = `translate(-50%, -50%) translate3d(${tx}px, 0, ${tz}px) scale(${scale})`;
        card.style.opacity      = opacity;
        card.style.zIndex       = zIndex;
        card.style.pointerEvents = absOffset === 0 ? 'auto' : 'none';
        card.classList.toggle('is-active', absOffset === 0);
      });

      updateCounter();
    }

    function goTo(index) {
      current = ((index % total) + total) % total;
      positionCards();
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    prevBtn?.addEventListener('click', prev);
    nextBtn?.addEventListener('click', next);

    // Click on a non-active card to bring it to centre
    cards.forEach((card, i) => {
      card.addEventListener('click', () => { if (i !== current) goTo(i); });
    });

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') next();
      if (e.key === 'ArrowLeft')  prev();
    });

    // Touch swipe
    let dragStartX = 0;
    stage.addEventListener('touchstart', (e) => {
      dragStartX = e.touches[0].clientX;
    }, { passive: true });
    stage.addEventListener('touchend', (e) => {
      const diff = dragStartX - e.changedTouches[0].clientX;
      if (Math.abs(diff) > 50) diff > 0 ? next() : prev();
    }, { passive: true });

    // Mouse drag
    let isDragging = false;
    stage.addEventListener('mousedown', (e) => {
      isDragging = false;
      dragStartX = e.clientX;
      stage.style.cursor = 'grabbing';
    });
    stage.addEventListener('mousemove', (e) => {
      if (Math.abs(e.clientX - dragStartX) > 5) isDragging = true;
    });
    stage.addEventListener('mouseup', (e) => {
      stage.style.cursor = 'grab';
      if (!isDragging) return;
      const diff = dragStartX - e.clientX;
      if (Math.abs(diff) > 50) diff > 0 ? next() : prev();
      isDragging = false;
    });
    stage.addEventListener('mouseleave', () => {
      stage.style.cursor = 'grab';
      isDragging = false;
    });

    // 3D tilt on the active card
    let tiltTicking = false;
    stage.addEventListener('mousemove', (e) => {
      if (tiltTicking) return;
      tiltTicking = true;
      requestAnimationFrame(() => {
        const activeCard = cards[current];
        if (!activeCard) { tiltTicking = false; return; }
        const rect = activeCard.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        if (x < 0 || y < 0 || x > rect.width || y > rect.height) { tiltTicking = false; return; }
        const rotateX = ((y - rect.height / 2) / (rect.height / 2)) * -8;
        const rotateY = ((x - rect.width  / 2) / (rect.width  / 2)) *  8;
        // Kill CSS transition during tilt for instant, smooth response
        activeCard.style.transition = 'none';
        activeCard.style.transform =
          `translate(-50%, -50%) translate3d(0, 0, 0) scale(1) perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        tiltTicking = false;
      });
    });

    stage.addEventListener('mouseleave', () => {
      const activeCard = cards[current];
      if (activeCard) {
        // Quick spring-back (200ms feels instant but smooth)
        activeCard.style.transition = 'transform 0.2s ease-out';
        activeCard.style.transform = 'translate(-50%, -50%) translate3d(0, 0, 0) scale(1)';
      }
    });

    positionCards();

    // Reposition cards on container resize (ResizeObserver preferred over resize event)
    if ('ResizeObserver' in window) {
      new ResizeObserver(() => positionCards()).observe(stage);
    } else {
      window.addEventListener('resize', positionCards, { passive: true });
    }
  }

  /* ─────────────────────────────────────────────────────────────
     8. PROCESS TABS — tab switching logic
  ───────────────────────────────────────────────────────────── */
  const tabBtns  = document.querySelectorAll('.tab-btn');
  const tabPanes = document.querySelectorAll('.tab-pane');

  if (tabBtns.length && tabPanes.length) {
    tabBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const targetTab = btn.getAttribute('data-tab');

        tabBtns.forEach(b => {
          b.classList.remove('active');
          b.setAttribute('aria-selected', 'false');
        });
        tabPanes.forEach(p => p.classList.remove('active'));

        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');

        const targetPane = document.getElementById(`tab-${targetTab}`);
        if (targetPane) targetPane.classList.add('active');
      });
    });
  }

  // Smooth scroll for all anchor link internal
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
      const targetId = anchor.getAttribute('href');
      if (targetId === '#') return;
      const target = document.querySelector(targetId);
      if (!target) return;

      e.preventDefault();

      const navbarHeight = navbar ? navbar.offsetHeight : 0;
      const targetTop = target.getBoundingClientRect().top + window.scrollY - navbarHeight;

      window.scrollTo({
        top: targetTop,
        behavior: 'smooth'
      });
    });
  });

  // Handle hash on page load (misalnya dari halaman lain)
  if (window.location.hash) {
    const target = document.querySelector(window.location.hash);
    if (target) {
      // Delay sedikit untuk pastikan halaman sudah fully rendered
      setTimeout(() => {
        const navbarHeight = navbar ? navbar.offsetHeight : 0;
        const targetTop = target.getBoundingClientRect().top + window.scrollY - navbarHeight;
        window.scrollTo({
          top: targetTop,
          behavior: 'smooth'
        });
      }, 300);
    }
  }

  /* ─────────────────────────────────────────────────────────────
     9. APPLY FORM — AJAX submission
  ───────────────────────────────────────────────────────────── */
  const applyForm = document.querySelector('.apply-form');

  if (applyForm) {
    applyForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      const submitBtn = applyForm.querySelector('.submit-btn');
      const originalBtnText = submitBtn.textContent;

      // Remove any existing feedback message
      const existingMsg = applyForm.querySelector('.form-feedback');
      if (existingMsg) existingMsg.remove();

      // Show loading state
      submitBtn.disabled = true;
      submitBtn.textContent = 'Sending...';

      // Gather form data
      const formData = new FormData(applyForm);
      formData.set('action', 'strata_apply_form');
      formData.set('strata_apply_nonce', StrataAjax.nonce);
      // Honeypot — leave empty
      formData.set('website', '');

      try {
        const response = await fetch(StrataAjax.ajaxUrl, {
          method: 'POST',
          body: formData,
        });

        const result = await response.json();

        // Show feedback message
        const feedback = document.createElement('div');
        feedback.className = 'form-feedback';
        feedback.classList.add(result.success ? 'form-feedback--success' : 'form-feedback--error');
        feedback.textContent = result.data?.message || 'Something went wrong.';
        applyForm.appendChild(feedback);

        if (result.success) {
          // Reset form
          applyForm.reset();
        }
      } catch (err) {
        const feedback = document.createElement('div');
        feedback.className = 'form-feedback form-feedback--error';
        feedback.textContent = 'Network error. Please try again.';
        applyForm.appendChild(feedback);
      } finally {
        // Restore button
        submitBtn.disabled = false;
        submitBtn.textContent = originalBtnText;
      }
    });
  }

});
