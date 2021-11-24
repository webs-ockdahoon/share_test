<!DOCTYPE html>
<html lang="ko">
    <head>
        <?php echo $header?>
        <link href="/assets/fonts/notosanskr.css" rel="stylesheet">
        <?php echo $this->include($THEME_URL.'/_includes/ieBrowserDetection'); ?>
        <?php echo $this->renderSection('appendHead'); ?>
    </head>

    <body class="default-layout page <?php echo $bodyClassName ?? ''; ?>">

        <?php echo $this->include($THEME_URL.'/_includes/ieBrowserUpgradeNotification'); ?>

        <a class="sr-only sr-only-focusable" href="#main">본문 바로가기</a>

        <header class="default-page-header is-fixed">
            <div class="container default-page-header__container">
                <h1 class="default-page-header__brand">
                    <a href="/kor" class="brand-logo">
                        <img src="<?php echo $THEME_URL; ?>/images/logo.png" alt="동아대학교병원" width="162" height="36" class="img-fluid">
                    </a>
                </h1>

                <button type="button" class="btn btn-icon icon icon-hamburger d-lg-none header-toggler js__header-toggler" title="메뉴열기">
                    <span class="icon-hamburger__bars"></span>
                </button>

                <button type="button" class="btn btn-icon header-search-toggler" data-toggle="modal" data-target="#pageSearchModal" title="검색창 열기">
                    <span class="material-icons-round">search</span>
                </button>

                <h2 class="sr-only">병원 정보</h2>
                <dl class="default-page-header__info">
                    <div class="default-page-header__info-item">
                        <dt class="item-label">
                            <span class="material-icons-round">schedule</span>
                            <span class="sr-only">상담시간</span>
                        </dt>
                        <dd class="item-text">
                            월 – 금: 00AM - 00PM<br>
                            토 – 일: 00AM - 00PM
                        </dd>
                    </div>

                    <div class="default-page-header__info-item">
                        <dt class="item-label">
                            <span class="material-icons-round">place</span>
                            <span class="sr-only">주소</span>
                        </dt>
                        <dd class="item-text">
                            부산광역시 서구 대신공원로 26
                        </dd>
                    </div>

                    <div class="default-page-header__info-item default-page-header__info-item--tel">
                        <dt class="item-label">
                            <span class="material-icons-round">call</span>
                            <span class="sr-only">연락처</span>
                        </dt>
                        <dd class="item-text">
                            <span class="d-none d-md-block">Call Us:<br></span>(+82) 51-240-2306
                        </dd>
                    </div>
                </dl>

                <nav id="siteNav" class="default-page-header__navbar js__page-header__navbar">
                    <h2 class="sr-only">주 메뉴</h2>
                    <?php echo $this->include($THEME_URL.'/_includes/primaryNavigation'); ?>
                </nav>
            </div>
        </header>

        <div class="default-page-header__placeholder"></div>

        <?php echo $this->renderSection('beforeContent'); ?>

        <div id="main" class="page-content">
            <?php include "quickMenu.php"; ?>
            <?php echo $this->renderSection('prependContent'); ?>
            <?php echo $this->renderSection('content'); ?>
            <?php echo $this->renderSection('appendContent'); ?>
        </div>

        <footer class="default-page-footer bg-dark text-white-50">
            <div class="container container-lg default-page-footer__container">

                <nav class="default-page-footer__nav js__page-footer__nav">
                    <h2 class="sr-only">주 메뉴</h2>
                    <?php echo $this->include($THEME_URL.'/_includes/primaryNavigation'); ?>
                </nav>

                <div class="default-page-footer__info">
                    <h2 class="sr-only">정보</h2>
                    <img src="<?php echo $THEME_URL ?>/images/logo-text-white.png" alt="" class="img-fluid default-page-footer__info-logo">
                    <dl class="default-page-footer__info-table">
                        <div class="default-page-footer__info-item">
                            <dt class="item-label">
                                <span class="material-icons-round icon">place</span>
                                <span class="sr-only">주소</span>
                            </dt>
                            <dd class="item-text">49201 부산광역시 서구 대신공원로 26</dd>
                        </div>

                        <div class="default-page-footer__info-item">
                            <dt class="item-label">
                                <span class="material-icons-round icon">mail</span>
                                <span class="sr-only">이메일</span>
                            </dt>
                            <dd class="item-text">
                                <a href="mailto:funky293@hanmail.net">funky293@hanmail.net</a>
                            </dd>
                        </div>

                        <div class="default-page-footer__info-item default-page-footer__info-item--tel">
                            <dt class="sr-only">전화번호</dt>
                            <dd class="item-text">+82 51-240-2306</dd>
                        </div>
                    </dl>
                </div>

                <div class="default-page-footer__utils">
                    <div class="default-page-footer__utils-sns">
                        <h2 class="sr-only">소셜 미디어 바로가기</h2>
                        <a href="https://www.facebook.com/" class="icon icon-sns icon-sns--facebook is-white" target="_blank" rel="noopener noreferrer" title="페이스북 새창 열기"></a>
                        <a href="https://www.instagram.com/" class="icon icon-sns icon-sns--instagram is-white" target="_blank" rel="noopener noreferrer" title="인스타그램 새창 열기"></a>
                        <a href="https://www.youtube.com/" class="icon icon-sns icon-sns--youtube is-white" target="_blank" rel="noopener noreferrer" title="유튜브 새창 열기"></a>
                    </div>

                    <div class="default-page-footer__utils-terms">
                        <ul class="bullet-list bullet-list--inline-after term-links">
                            <li class="text-white"><a href="">Privacy Policy</a></li>
                        </ul>
                        <p class="term-copyright">Copyright ⓒ DONG-A UNIVERSITY MEDICAL CENTER. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>
        
        <?php /* 페이지 렌더링 속도 개선을 위해 스크립트 파일은 하단에 배치 */ ?>
        <script src="/assets/plugins/jquery/jquery-3.6.0.min.js"></script>
        <script src="/assets/plugins/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo $THEME_URL; ?>/script/common.js"></script>
        <script>
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

                $('.js__page-footer__nav .js__item-toggler').on('click', function() {
                    var $this = $(this);
                    var $parent = $this.closest($this.data('parent'));

                    if ($parent.length) {
                        toggleTargetOpen($parent, true);
                    }
                });
            });
        </script>

        <?php echo $this->include($THEME_URL.'/_includes/pageSearchModal'); ?>

        <?php echo $this->renderSection('appendBody'); ?>
    </body>
</html>

