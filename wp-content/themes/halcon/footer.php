<?php
/**
 * @package WordPress
 * @subpackage HALCON Microsite
 */
?>
<footer class="footer">
  <div class="op-row">
    <div class="op-col-start-1 op-col-end-9">
      <?php
        if(get_theme_mod('copyright')) {
          printf( '<p class="footer__copyright">&copy; %1$s %2$s</p>',
            esc_html__( date( 'Y ') ),
            esc_html__( get_theme_mod( 'copyright' ) )
          );
        }
        bem_menu('footer', 'footer-menu');
      ?>
    </div>
    <div class="op-col-start-10 op-col-end-12">
      <nav class="footer__utility">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Social Media') ) : ?><?php endif; ?>
        <a href="#top" class="footer__back-to-top"></a>
      </nav>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
<!-- Privacy policy at http://tag.brandcdn.com/privacy -->
<script type="text/javascript" src="//tag.brandcdn.com/autoscript/halcon_vfzsamvrmtzheja9/Halcon.js"></script>
</body>
</html>