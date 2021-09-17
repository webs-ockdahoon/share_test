$(function() {
    'use strict';

    var $body = $('body');
    var $pageHeader = $('.default-page-header');
    var $siteNav = $pageHeader.find('#siteNav');

    $('.js__header-toggler').on('click', function(e) {
        $body.toggleClass('is-page-header-open');
    });

    $('.js__page-header__navbar>.primary-nav>.nav-item').on('mouseenter mouseleave', function(e) {
        if (hasTouchEvent()) {
            return;
        }

        toggleTargetOpen($(this), true, e.type === 'mouseenter');
    })

    $('.js__page-header__navbar .js__item-toggler').on('click', function() {
        var $this = $(this);
        var $parent = $this.closest($this.data('parent'));

        if ($parent.length) {
            toggleTargetOpen($parent, true);
        }
    });

    $(window).on('scroll', function () {
        var scrollTop = $(this).scrollTop();
        var siteNavTop = $siteNav.position().top;

        $pageHeader.toggleClass('is-folded', scrollTop > siteNavTop);
    });
});