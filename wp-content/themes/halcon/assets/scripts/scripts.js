(function ($) {

/* Careers =================================================== */

function formatCareers() {
  const careers = document.querySelectorAll( '.career-list-career' );
  if(careers.length > 0) {
  	careers.forEach(function(career, i) {
      // add this class so we can target the items to show on mobile
      if($(window).width() < 767 && i > 3) {
        career.classList.add('career-list-career--hidden')
      } else if($(window).width() >= 767) {
        career.classList.remove('career-list-career--hidden')
      }
      career.addEventListener('touchstart', function(e){
        // career.classList.toggle('career-list-career--over');
        // e.preventDefault()
      });
  	});
  }
}

$( window ).on('load resize', function() {
  //debounce(formatCareers())
});

function hasScrolled() {
  let st = $(window).scrollTop();
  let ribbon_height = $('.ribbon-wrapper').height();
  $('.ribbon-wrapper').css('maxHeight', `${ribbon_height}px`).css('opacity', 1);
  let hero_top_padding = ribbon_height + 75;
  $('.hero__headline-wrapper').css('paddingTop', `${hero_top_padding}px` )
  if (st > 0){
    $('.ribbon-wrapper').addClass('ribbon-wrapper--hidden')
    //$('.hero__headline-wrapper').css('paddingTop', `75px` )
    $('.header').addClass('header--sticky');
  } else if(st <= 0) {
    $('.header').removeClass('header--sticky');
  }
}

const careers_button = document.querySelector('.career-list__button')

if( careers_button ) {
  careers_button.addEventListener('click', function(e){
    let hidden_careers = document.querySelectorAll( '.career-list-career--hidden' );
    hidden_careers[0].classList.add('career-list-career--visible')
    hidden_careers[0].classList.remove('career-list-career--hidden')
    if(hidden_careers.length === 1) {
      this.style.display = 'none';
    }
  });
}

/**
* Fade In
*/ 

jQuery( window ).on('scroll load', function() { 
  // fade-in-full is for tall elements that need to fade in as soon as they are on screen
  jQuery('.fade-in-full').each(function(){
    if(jQuery(this).isOnScreen(0, 0)){
      jQuery(this).addClass('fade-in');
    }
  });
  jQuery('.faded-out-1, .faded-out-2, .faded-out-3').each(function(){
    if(jQuery(this).isOnScreen(0.4, 0)){
      jQuery(this).addClass('fade-in');
    }
  });
});

/* Form =================================================== */

// bind the event this way to the body otherwise it stops working after the form validation ajax call
$('body').on('click', '.careers-popup-form__past-employment-button-2' ,function() {
	$('.careers-popup-form__past-employment-company-2').addClass('careers-popup-form__past-employment--visible')
	$('.careers-popup-form__past-employment-date-2').addClass('careers-popup-form__past-employment--visible')
	$('.careers-popup-form__past-employment-rate-2').addClass('careers-popup-form__past-employment--visible')
	$('.careers-popup-form__past-employment-desc-2').addClass('careers-popup-form__past-employment--visible')
	//$(this).addClass('careers-popup-form__button--hidden')
	$('.careers-popup-form__past-employment-button-3').removeClass('careers-popup-form__button--hidden')
})

$('body').on('click', '.careers-popup-form__past-employment-button-3' ,function() {
	$('.careers-popup-form__past-employment-company-3').addClass('careers-popup-form__past-employment--visible')
	$('.careers-popup-form__past-employment-date-3').addClass('careers-popup-form__past-employment--visible')
	$('.careers-popup-form__past-employment-rate-3').addClass('careers-popup-form__past-employment--visible')
	$('.careers-popup-form__past-employment-desc-3').addClass('careers-popup-form__past-employment--visible')
	//$(this).addClass('careers-popup-form__button--hidden')
})
	
/* Images =================================================== */

// add a background image to the parent of the image if the browser doesn't support object fit
function opObjectFit() {
  $('img.op-obj-fit-image').each(function() {
    const imgSrc = $(this).attr('src');
    $(this).parent('.op-obj-fit-image-wrapper').css({'background-image' : `url(${imgSrc})`});
    $(this).remove(); 
  });
}

$( window ).on('load', function() { 
  if(!Modernizr.objectfit) {
    opObjectFit()
  }
});      

/* Image Sliding Animation =================================================== */
	
$( window ).on('scroll load', function() {
  $('.op-images-wrapper').each(function(){
    if($(this).isOnScreen(1, .2)){
      $('.image-sliding-animation',this).addClass('image-sliding-animation--active');
    }
  });
});
	
/* Nav =================================================== */
  
const header_nav_trigger = document.querySelector('.header__nav-trigger')
const hamburger = document.querySelector('.hamburger')
const hamburger_inner = document.querySelector('.hamburger-inner')
const header_logo_image = document.querySelector('.header-logo__image')
const primary_nav = document.querySelector('.primary-nav')
const ribbon_wrapper = document.querySelector('.ribbon-wrapper')
const header_languages = document.querySelector('.header__languages')
var trigger_toggle = 'on';

header_nav_trigger.addEventListener('click', function(){
  if(trigger_toggle === 'on' && window.innerWidth > 1670) {
    $(this).css('padding-right', function( index ) {
      return 450 - (window.innerWidth - 1650) / 2 + 'px';
    })
  }
  if(trigger_toggle === 'off' && $(window).width() > 1670) {
    $(this).css('padding-right', 0)
  }
  hamburger.classList.toggle('is-active');
  primary_nav.classList.toggle('primary-nav--visible');
  if(ribbon_wrapper) {
    ribbon_wrapper.classList.toggle('ribbon-wrapper--hidden');
  }
  this.classList.toggle('header__nav-trigger--visible-nav')
  if(window.innerWidth < 990) {
    hamburger_inner.classList.toggle('hamburger-inner--nav-is-active');
  }
  if(window.innerWidth < 767) {
    header_logo_image.classList.toggle('header-logo__image--nav-is-active');
    if($(window).scrollTop() <= 0) {
      header_languages.classList.toggle('header__languages--hidden');
    }
  }
  trigger_toggle === 'off' ? trigger_toggle = 'on' : trigger_toggle = 'off';
}, false);

// close the slideover nav if the window is resized
window.addEventListener('resize', function(){  
  if (primary_nav.classList.contains('primary-nav--visible')) {
    header_nav_trigger.dispatchEvent(new Event('click'));
  }
});

const nav_links = document.querySelectorAll( '.primary-menu__link' );

// close the slideover nav after clicking on link
if(nav_links.length > 0) {
  nav_links.forEach(function(nav_link) {
    nav_link.addEventListener('click', function(e){
      header_nav_trigger.dispatchEvent(new Event('click'));
    });
  });
}

/* Popups =================================================== */

$('.career-list-career__apply').magnificPopup({
  focus: '#input_1_2',
  midClick: true,
  modal: true,
  type: 'inline'
}).on('click', function(){
  let title = $(this).attr('data-title')
  $('.careers-popup-form__job-title-field input').val(title).attr('readonly','readonly')
  $('.careers-popup-form__job-title').html( title )
});

$('.careers-popup-form__close').on('click', function(){
  $.magnificPopup.close()
});

/* Sliders =================================================== */

const slideshow = new Swiper ('.slideshow__images .swiper-container', {
  autoplay: {
    delay: 1,
  },
  freeMode: true,
  loop: true,
  slidesPerView: 5,
  spaceBetween: 50,
  speed: 6000,
  breakpoints: {
    767: {
      autoplay: {
        delay: 3000,
      },
      freeMode: false,
      slidesPerView: 1,
      speed: 800,
    }
  }
});

const testimonials_slideshow = new Swiper ('.testimonials__items .swiper-container', {
  autoplay: {
    delay: 4000,
  },
  loop: false,
  pagination: {
    bulletClass: 'testimonials-pagination__bullet',
    bulletActiveClass: 'testimonials-pagination__bullet--active',
    clickable: true,
    el: '.testimonials-pagination',
    type: 'bullets',
  },
  slidesPerView: 1,
  speed: 800
});

const testimonials_image_slideshow = new Swiper ('.testimonial__images .swiper-container', {
  centeredSlides: true,
  loop: false,
  slidesPerView: 5,
  spaceBetween: 50,
  speed: 800,
  breakpoints: {
    767: {
      slidesPerView: 1
    }
  }
});

if( typeof testimonials_slideshow.controller !== 'undefined' && typeof testimonials_image_slideshow.controller !== 'undefined' ) {
  testimonials_slideshow.controller.control = testimonials_image_slideshow;
  testimonials_image_slideshow.controller.control = testimonials_slideshow;
}

const two_column_with_images = document.querySelectorAll( '.two-column-with-image' );
// const two_column_images = document.querySelectorAll( '.two-column-with-image__obj-fit-image' );

two_column_with_images.forEach(function(two_column_with_image, i) {
  let images = two_column_with_image.querySelectorAll( '.two-column-with-image__obj-fit-image' );
  if(images.length > 1) {
    let swiper_container = two_column_with_image.querySelector( '.two-column-with-image__images .swiper-container' );
    new Swiper ( swiper_container , {
      autoplay: {
        delay: 4000,
      },
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      loop: true,
      slidesPerView: 1,
      speed: 800
    });
  }
});

// if(two_column_images.length > 1) {
//   const two_column_slideshow = new Swiper ('.two-column-with-image__images .swiper-container', {
//     autoplay: {
//       delay: 4000,
//     },
//     effect: 'fade',
//     fadeEffect: {
//       crossFade: true
//     },
//     loop: true,
//     slidesPerView: 1,
//     speed: 800
//   });
// }

/* Smooth Scrolling =================================================== */

const conditional = document.querySelector('.conditional');
const testElem = document.createElement('div');

// only use js for smooth scrolling if the browser doesn't support css scroll-behavior
if (testElem.style.scrollBehavior === undefined ) {
  $('a[href*=\\#]:not([href=\\#])').click(function(e) {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        var scrollTarget = target.offset().top;
        $('html,body').animate({
          scrollTop: scrollTarget
        }, 600);
        e.preventDefault();
      }
    }
  });
} 

/* Sticky Header =================================================== */

$( window ).on('scroll load', function() {
  if( !$('.primary-nav').hasClass('primary-nav--open') ){
    debounce(hasScrolled())
  }
});

function hasScrolled() {
  let st = $(window).scrollTop();
  let ribbon_height = $('.ribbon-wrapper').height();
  $('.ribbon-wrapper').css('maxHeight', `${ribbon_height}px`).css('opacity', 1);
  let hero_top_padding = ribbon_height + 75;
  $('.hero__headline-wrapper').css('paddingTop', `${hero_top_padding}px` )
  if (st > 0){
    $('.ribbon-wrapper').addClass('ribbon-wrapper--hidden')
    $('.header').addClass('header--sticky');
    $('.header__languages').addClass('header__languages--hidden');
  } else if(st <= 0) {
    $('.header').removeClass('header--sticky');
    $('.header__languages').removeClass('header__languages--hidden');
  }
}

})(jQuery);

/**
* This calls a function after resize instead of during resize
*/ 

function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
}

function initMap() {
  if(!document.getElementById('halcon-map')){
    return false;
  }
  var address = scripts_vars.address;
  var siteTitle = scripts_vars.siteTitle;
  var themePath = scripts_vars.themePath;

  var myOptions = {
    zoom: 11,
    //disableDefaultUI: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    streetViewControl: true,
    zoomControl: true
  };

  var map = new google.maps.Map(document.getElementById('halcon-map'),
  myOptions);
    
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {

      var latlng = results[0].geometry.location; // otherwise get them from the geocoder

      map.setCenter(latlng);
      
      var marker = new google.maps.Marker({
        icon: `${themePath}/assets/images/HF_Google_Maps-icon.svg`,
        map: map,
        optimized: false,
        position: latlng
      });
            
			var mapBounds = new google.maps.LatLngBounds(
        latlng, 
        new google.maps.LatLng( 44.016369, -92.475395 ) // rochester
			);
      
      // they want the map to include rochester
      map.fitBounds(mapBounds); 
      
      // marker.addListener('click', function() {
      //   infowindow.open(map, marker);
      // });
      
      var contentString = `<strong>${siteTitle}</strong><br/><br/>${address}<br/><br/><a href="https://maps.google.com/maps?daddr=${address}" target="_blank" style="white-space:nowrap">Get Directions</a>`;
      
      var infowindow = new google.maps.InfoWindow({
        content: contentString,
      });

      //infowindow.open(map, marker);
    }
  });
}
