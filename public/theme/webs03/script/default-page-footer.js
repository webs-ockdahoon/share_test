$(function() {
    'use strict';
    $('.js__page-footer__nav .js__item-toggler').on('click', function() {
        var $this = $(this);
        var $parent = $this.closest($this.data('parent'));

        if ($parent.length) {
            toggleTargetOpen($parent, true);
        }
    });
});