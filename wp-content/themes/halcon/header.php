<?php
/**
 * @package WordPress
 * @subpackage HALCON Microsite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<script type="text/javascript">
	if((window.devicePixelRatio===undefined?1:window.devicePixelRatio)>1)
		document.cookie='HTTP_IS_RETINA=1;path=/';
</script>
<title><?php wp_title('&laquo;', true, 'right'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<a name="top"></a>
<header class="header">
  <?php get_template_part( 'template-parts/content','ribbon'); ?>
  <div class="op-row">
    <div class="op-col-start-1 op-col-end-12">
      <div class="header-inner">
        <?php 
      		if ( get_theme_mod( 'theme_logo' ) ) {
      	  	printf('<a href="%1$s" title="%2$s" rel="home" class="header-logo">%3$s</a>',
      				esc_url( home_url( '/' ) ),
      				esc_attr( get_bloginfo( 'name', 'display' ) ),
      				wp_get_attachment_image( get_theme_mod( 'theme_logo' ), 'full', false, array( 'class' => 'header-logo__image' ) ),
      			);
        	}
      	?>
        <div class="header__languages">
          <a  class="header__language-link" href="/">EN</a> <a  class="header__language-link" href="/?lang=es">ES</a>
        </div>
        <div class="header__nav-trigger">
          <div class="hamburger hamburger--squeeze">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
	<nav class="primary-nav">
    <?php 
      bem_menu('primary', 'primary-menu'); 
    
      if( get_theme_mod('address') ) {
        printf( '<p class="primary-nav__address">%1$s</p>',
          nl2br( esc_html__( get_theme_mod('address') ) )
        );
      }
    
      if( get_theme_mod('phone') ) {
        printf( '<p class="primary-nav__phone">P: %1$s</p>',
          esc_html__( get_theme_mod( 'phone' ) )
        );
      }
    
      if( get_theme_mod('email') ) {
        printf( '<p class="primary-nav__email">E: <a href="mailto:%1$s" class="primary-nav__link">%1$s</a></p>',
          esc_html__( antispambot( get_theme_mod( 'email' ) ) )
        );
      }
    
      if( get_theme_mod('hours') ) {
        printf( '<p class="primary-nav__hours">%1$s</p>',
          esc_html__( get_theme_mod( 'hours' ) )
        );
      }
    ?>
  </nav>
</header>