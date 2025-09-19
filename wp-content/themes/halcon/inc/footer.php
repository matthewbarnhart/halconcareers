<?php
/** 
* Footer
*/

// output Footer Tracking Code to wp_footer hook 
add_action( 'wp_footer', 'theme_footer_code' );

function theme_footer_code() {
  if (get_theme_mod('tracking_id') ){
    
    $tracking_id = get_theme_mod('tracking_id');
    
//     echo "<script type='text/javascript'>
// (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
// (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
// m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
// })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
//
// ga('create', '".esc_js(get_theme_mod('tracking_id'))."', 'auto');
// ga('send', 'pageview');
// </script>\n";

    echo "<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src='https://www.googletagmanager.com/gtag/js?id=".$tracking_id."'></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '".$tracking_id."');
    </script>\n";
  }
}