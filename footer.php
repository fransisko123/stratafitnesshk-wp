<?php
/**
 * Footer Template
 */
?>

  <!-- Footer -->
  <footer class="footer" id="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <div class="footer-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.webp" alt="Strata Fitness" width="500" height="154" loading="lazy" decoding="async">
          </div>
          <p class="footer-tagline">Premium fitness and performance coaching for those who demand more.</p>
          <a href="https://www.instagram.com/coachjonmiller/" target="_blank" rel="noopener" class="footer-social-link" aria-label="Instagram @coachjonmiller">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            <span>@coachjonmiller</span>
          </a>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading">Services</h4>
          <ul class="footer-links">
            <li><a href="<?php echo home_url('/personal-training/'); ?>">Personal Training</a></li>
            <li><a href="<?php echo home_url('/remote-coaching/'); ?>">Remote Coaching</a></li>
            <li><a href="<?php echo home_url('/nutrition-coaching/'); ?>">Nutrition Coaching</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading">Company</h4>
          <ul class="footer-links">
            <li><a href="<?php echo home_url('/about/'); ?>">About Us</a></li>
            <li><a href="<?php echo home_url('/#apply'); ?>">Contact</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading">Book a Consult</h4>
          <ul class="footer-links">
            <li><a href="https://go.stratafitnesshk.com/30-min-consult-assessment" target="_blank" rel="noopener">Personal Training</a></li>
            <li><a href="https://go.stratafitnesshk.com/remotecoachingcall" target="_blank" rel="noopener">Remote Coaching</a></li>
            <li><a href="https://go.stratafitnesshk.com/nutrition-discovery-call" target="_blank" rel="noopener">Nutrition Coaching</a></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; <?php echo date('Y'); ?> Strata Fitness. All rights reserved.</p>
        <p class="footer-legal">Hong Kong's Premier Performance Coaching</p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
