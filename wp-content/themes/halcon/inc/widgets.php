<?php
/**
* Widgets
*/

if ( function_exists('register_sidebars') ) {
  register_sidebar(array(
    'name'=>'Footer Social Media',
    'id'=> 'footer-social-media', 
    'description'   => 'The social media icons that show up in the footer. Set the links in the theme options.', 
    'before_widget' => '<div class="footer__social-media-widget">',
    'after_widget'  => '</div>',)
  );
}

add_action( 'widgets_init', function(){
	register_widget( 'Social_Media' );
});

// the fields in this widget are added through acf
class Social_Media extends WP_Widget {
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'social media',
			'description' => 'A Widget for Social Media',
		);
		parent::__construct( 'social_media', 'Social Media', $widget_ops );
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
    echo $args['before_widget'];
    $sites = get_field('links', 'widget_' . $args['widget_id']);
    echo '<ul class="social-media">';
      foreach ($sites as $site) {
        if( $site['link'] ){
          $link = $site['link'];
					$fa = $site['font_awesome_class'];
          printf('<li class="social-media__item"><a href="%1$s" class="social-media__link fa fa-%3$s" target="%2$s"></a></li>',
            esc_url( $link['url'] ),
            esc_attr( $link['target'] ),
						esc_attr( $fa )
          );
        } 
      }
    echo '</ul>';
    echo $args['after_widget'];
	}

	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}