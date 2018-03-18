jQuery('.mobile-header-nav-button').click(function () {
  jQuery('.mobile-header-nav').removeClass('close');
});

jQuery(document).mouseup(function (e) {
  var container = jQuery(".mobile-header-nav");
  if (!container.is(e.target) && container.has(e.target).length === 0 && !container.hasClass('close')) {
    container.addClass('close');
  }
});

jQuery('.mobile-search-options').click(function () {
  jQuery('.left-column').removeClass('mobile-left-column-close');
});

jQuery('.mobile-options-submit').click(function () {
  jQuery('.left-column').addClass('mobile-left-column-close');
});

jQuery(document).mouseup(function (e) {
  var container = jQuery(".left-column");
  if (!container.is(e.target) && container.has(e.target).length === 0 && !container.hasClass('mobile-left-column-close')) {
    container.addClass('mobile-left-column-close');
  }
});
