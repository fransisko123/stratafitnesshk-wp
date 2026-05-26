<?php
/**
 * Footer Template
 *
 * @package StrataFitness
 */
?>

  <!-- Footer -->
  <footer class="footer" id="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <div class="footer-logo">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.webp'); ?>" alt="<?php esc_attr_e('Strata Fitness', 'stratafitness'); ?>" width="500" height="154" loading="lazy" decoding="async">
          </div>
          <p class="footer-tagline"><?php esc_html_e('Premium fitness and performance coaching for those who demand more.', 'stratafitness'); ?></p>
          <a href="https://www.instagram.com/coachjonmiller/" target="_blank" rel="noopener noreferrer" class="footer-social-link" aria-label="<?php esc_attr_e('Instagram @coachjonmiller', 'stratafitness'); ?>">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-instagram" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            <span>@coachjonmiller</span>
          </a>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading"><?php esc_html_e('Services', 'stratafitness'); ?></h4>
          <ul class="footer-links">
            <li><a href="<?php echo esc_url(home_url('/personal-training/')); ?>"><?php esc_html_e('Personal Training', 'stratafitness'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/remote-coaching/')); ?>"><?php esc_html_e('Remote Coaching', 'stratafitness'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/nutrition-coaching/')); ?>"><?php esc_html_e('Nutrition Coaching', 'stratafitness'); ?></a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading"><?php esc_html_e('Company', 'stratafitness'); ?></h4>
          <ul class="footer-links">
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>"><?php esc_html_e('About Us', 'stratafitness'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/#apply')); ?>"><?php esc_html_e('Contact', 'stratafitness'); ?></a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4 class="footer-heading"><?php esc_html_e('Book a Consult', 'stratafitness'); ?></h4>
          <ul class="footer-links">
            <li><a href="https://go.stratafitnesshk.com/30-min-consult-assessment" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Personal Training', 'stratafitness'); ?></a></li>
            <li><a href="https://go.stratafitnesshk.com/remotecoachingcall" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Remote Coaching', 'stratafitness'); ?></a></li>
            <li><a href="https://go.stratafitnesshk.com/nutrition-discovery-call" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Nutrition Coaching', 'stratafitness'); ?></a></li>
          </ul>
        </div>
      </div>

      <div class="footer-bottom">
        <p>&copy; <?php echo esc_html(wp_date('Y')); ?> <?php esc_html_e('Strata Fitness. All rights reserved.', 'stratafitness'); ?></p>
        <p class="footer-legal"><?php esc_html_e("Hong Kong's Premier Performance Coaching", 'stratafitness'); ?></p>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
</body>
</html>
