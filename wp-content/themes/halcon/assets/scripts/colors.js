(function ($) {
  acf.add_filter('color_picker_args', function( args, $field ){
  	args.palettes = ['#3D3D3C', '#8C8C8C', '#F2F2F2', '#FF5919']
  	return args;
  });
})(jQuery);