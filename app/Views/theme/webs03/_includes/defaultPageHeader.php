<header class="default-page-header is-fixed">
    <div class="container default-page-header__container">
        <h1 class="default-page-header__brand">
            <a href="/" class="brand-logo">
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
