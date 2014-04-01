// Browser detection. Yes, really. Guess for which browser? Nope! Chrome.
var b = document.documentElement;
b.setAttribute('data-useragent',  navigator.userAgent);
b.setAttribute('data-platform', navigator.platform);

// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
// Only fires on body class (working off strictly WordPress body_class)

var ExampleSite = {
  // All pages
  common: {
    init: function() {
      // JS here
    },
    finalize: function() { }
  },
  // Home page
  home: {
    init: function() {
      // JS here
    }
  },
  // About page
  about: {
    init: function() {
      // JS here
    }
  }
};

var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = ExampleSite;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {

    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });

    UTIL.fire('common', 'finalize');
  }
};

$(document).ready(UTIL.loadEvents);


// var resizeHero = function() {
//   var off_canvas_nav_display = $('.off-canvas-navigation').css('display');
//   if (off_canvas_nav_display === 'block') {
//       //$('.single-product .main .product').height($(window).height()-($('.off-canvas-navigation').offset().top + $('.off-canvas-navigation').height()));
//   } else {
//     //$('.single-post .main .post').css('min-height', $(window).height() - $('.main').offset().top );
//   }
// };


var showMenu = function() {
  $('body').toggleClass("active-nav");
  $('.menu-button').toggleClass("active-button");
};

// add/remove classes everytime the window resize event fires
jQuery(window).resize(function(){
  var off_canvas_nav_display = $('.off-canvas-navigation').css('display');
  var menu_button_display = $('.menu-button').css('display');
  if (off_canvas_nav_display === 'block') {
    $("body").removeClass("two-column").addClass("small-screen");
  }
  if (off_canvas_nav_display === 'none') {
    $("body").removeClass("active-nav small-screen").addClass("two-column");
  }
  //resizeHero();
});

jQuery(document).ready(function($){
  $('.menu-button').click(function(e) {
    e.preventDefault();
    showMenu();
  });
  //resizeHero();


  /************* Man navigation Fixing ***********/
  if ( $('#nav-main').length ){
    var top = $('#nav-main').offset().top - parseFloat($('#nav-main').css('marginTop').replace(/auto/, 0));
    $(window).scroll(function (event) {
      var y = $(this).scrollTop();
      if (y >= top) {
        $('#nav-main').addClass('fixed');
      } else {
        $('#nav-main').removeClass('fixed');
      }
    });
  }

});


/********** Filter Control Scripts *********/
$(window).load(function(){
  var $container = $('.main .ize-list'),
    filters = {};

  $container.isotope({
    itemSelector : '.ize-mini',
    animationOptions: {
      duration: 750,
      easing: 'linear',
      queue: false
    }
  });

  // filter buttons
  $('.filt-item-input').click(function(){
    
    $('.filtro li').removeClass('active');
    $(this).parent().toggleClass('active');
    
    var $optionSet = $(this).parents('.filt-item');


    // don't proceed if already selected
    // if ( $this.hasClass('selected') ) {
    //   return;
    // }
    
    var group = $optionSet.attr('data-filter-group');
    
    $optionSet.find('.selected').each(function(){
      $(this).removeClass('selected');
    });

    $(this).addClass('selected');
    if ( $(this).hasClass('selected') ) {
      filters[ group ] = $(this).attr('data-filter-value');
    }
     

    // convert object into array
    var isoFilters = [];
    for ( var prop in filters ) {
      isoFilters.push( filters[ prop ] );
    }
    var selector = isoFilters.join('');
    $container.isotope({ filter: selector });
    return false;
  });

  // $('.filt-item li input').each(function(){
  //   if ( $('.activity-list '+$(this).attr('data-filter-value')).length < 1)  {
  //    $(this).parent().remove();
  //   }
  // });

});


jQuery(document).ready(function($){
  $('.main').fitVids();
});
