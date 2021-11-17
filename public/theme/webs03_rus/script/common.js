function hasTouchEvent() {
    if (typeof window !== 'undefined') {
        return 'ontouchstart' in window;
    }

    return false;
}

function toggleTargetOpen($target, isAccordian, isOpen) {
    if (!$target || !$target.length) {
        console.warn('[toggleTargetOpen] required target');
        return;
    }

    if (isAccordian === true) {
        $target
            .siblings('.is-open').removeClass('is-open')
            .end()
            .find('.is-open').removeClass('is-open')
            .end();
    }

    if (isOpen === true || isOpen === false) {
        $target.toggleClass('is-open', isOpen);
        return;
    }

    $target.toggleClass('is-open');
}