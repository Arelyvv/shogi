/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.shogi = {
    attach: function (context, settings) {
      $("#block-shogi-main-menu li.dropdown").click(function (eventoo) {
        if (screen.width > 992) {
          $(this).children('a').removeAttr("data-toggle");
          window.location = $(this).children('a').attr("href");
        }
      });
    }
  };

})(jQuery, Drupal);
;
/**
 * @file
 * Affix for Bootstrap 4.
 * https://www.codeply.com/users/skelly
 *
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.bootstrap_barrio_affix = {
    attach: function (context, settings) {
      var toggleAffix = function(affixElement, scrollElement, wrapper) {
  
        var height = affixElement.outerHeight(),
            top = wrapper.offset().top;
    
        if (scrollElement.scrollTop() >= top){
            wrapper.height(height);
            affixElement.addClass("affix");
        }
        else {
            affixElement.removeClass("affix");
            wrapper.height('auto');
        }
      
      };

      $('[data-toggle="affix"]').once().each(function() {
        var ele = $(this),
            wrapper = $('<div></div>');
    
        ele.before(wrapper);
        $(window).on('scroll resize', function() {
            toggleAffix(ele, $(this), wrapper);
        });
    
        // init
        toggleAffix(ele, $(window), wrapper);
      });
    }
  }
})(jQuery, Drupal);
;
