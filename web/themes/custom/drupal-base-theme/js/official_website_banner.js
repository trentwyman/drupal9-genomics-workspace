/**
 * @file
 * Reveals and hides the official government website banner content.
 */

(function ($) {
  let trigger = $('.official-website-banner__trigger');

  trigger.addClass('content-collapsed');

  trigger.click(function() {
    $('.official-website-banner__content').slideToggle(250);
    if (trigger.hasClass('content-collapsed')) {
      trigger.removeClass('content-collapsed').addClass('content-expanded');
    }
    else if (trigger.hasClass('content-expanded')) {
      trigger.removeClass('content-expanded').addClass('content-collapsed');
    }
  });
})(jQuery);
