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
