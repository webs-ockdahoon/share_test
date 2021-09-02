/**
 *  해당 테마에서만 사용되는 스크립트를 작성해 주세요.
 */

$(function() {
    'use strict';

    /*
     * data-show-target 속성 가진 요소 클릭시 target 요소에 is-show 클래스 토글
     */
    $('[data-show-target]').on('click', function(e) {
        var data = $(this).data(),
            id = data['showTarget'],
            action = data['showAction'] || 'toggle',
            $target = $('[data-show-id="'+id+'"]'),
            className = 'is-show'
        ;

        if ($target.length) {
            switch (action) {
                case "open":
                    $target.addClass(className);
                    break;

                case "close":
                    $target.removeClass(className);
                    break;

                default:
                    $target.toggleClass(className);
            }
        }
    });


    /*
     * 페이지 상단 메뉴 좌우 스크롤
     */
    var swipeNav = initDestroyedSlickDependOnBreakpoint($('.js__swipe-nav'), {
        mobileFirst: true,
        infinite: true,
        swipeToSlide: true,
        slidesToShow: 1,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    infinite: false,
                    slidesToShow: 5,
                    variableWidth: false,
                }
            },
            {
                breakpoint: 991,
                settings: "unslick"
            }
        ]
    }, 991);

    var toggleFixed = toggleFixedClass($('[data-toggle-fixed]'));

    $(window)
        .on('resize', swipeNav.handleResize)
        .on('resize', toggleFixed.init)
        .on('scroll', toggleFixed.handleScroll)
    ;

});


/* 
 * slick 라이브러리 
 * - 반응형 일 경우 특정 브레이크포인트에서 슬라이더 해제시 슬라이더 재설정되지 않는 상황 대비
 */
function initDestroyedSlickDependOnBreakpoint(target, options, breakpoint) {
    'use strict';

    var $target = target || null,
        _options = options || null,
        _breakpoint = breakpoint || null,
        resizeTimeout = 50,
        resizeTimeoutID = null,
        isDestroyedSwipeNav = false
    ;

    _init();

    function _init() {
        isDestroyedSwipeNav = false;

        $target
            .on('destroy', function() {
                isDestroyedSwipeNav = true;
            })
            .slick(_options);
    }

    function handleResize (e) {

        if (!isDestroyedSwipeNav || !_breakpoint) {
            return;
        }

        var $this = $(this);

        if (resizeTimeoutID) {
            clearTimeout(resizeTimeoutID);
        }

        resizeTimeoutID = setTimeout(function() {
            if ($this.width() < _breakpoint) {
                _init();
            }
        }, resizeTimeout);
    }

    return { el: $target, handleResize: handleResize };
}



/*
 * 스크롤한 높이에 따라 is-fixed 클래스 제어
 * - 커스텀 속성 data-toggle-fixed="이름" 을 가진 html 요소만 적용
 * - 해당 요소에 `is-fixed`, body 요소에 `is-fixed-이름` 클래스가 추가 또는 삭제
 * TODO
 *  추후 범용적으로 사용하기 위해 라이브러리로 형태로 제작이 필요한지 검토하기
 */
function toggleFixedClass($targets) {
    var toggleClassName = 'is-fixed',
        timeout = 10,
        timeoutID = null
    ;

    _init();

    function _init() {
        $targets.each(function() {
          var $target = $(this);

          $target.data('toggleBoundary', $target.offset().top + $target.outerHeight());
        })
    }

    function handleScroll() {
        if (!$targets.length) {
            return;
        }

        var $this = $(this),
            scrollTop = $this.scrollTop()
        ;

        if (timeoutID) {
            clearTimeout(timeoutID);
        }

        timeoutID = setTimeout(function() {

            $targets.each(function() {
                var $target = $(this),
                    isFixed = scrollTop > $target.data('toggleBoundary')
                ;

                $target.toggleClass(toggleClassName, isFixed);
                $('body').toggleClass(toggleClassName+'-'+$target.data('toggleFixed'), isFixed);
            });
        }, timeout);
    }

    return {
        el: $targets,
        init: _init,
        handleScroll: handleScroll
    }
}