<style>
    .hero-banner__item {
        position: relative;
        padding-bottom: 78.125%; /* 600 / 768 (세로/가로) */
        color: inherit;
        background: url('https://via.placeholder.com/768x600') no-repeat 50% 50%;
        background-size: cover;
    }
    .hero-banner__item-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
    }
    @media (min-width: 768px) {
        .hero-banner__item {
            height: 650px;
            padding-bottom: 0;
            background-image: url('https://via.placeholder.com/1920x650');
        }
    }

    .hero-card .card-title {
        margin-bottom: 0.5rem;
        font-size: 1.5rem;
        letter-spacing: -0.04em;
        line-height: 1.35;
    }
    .hero-card .card-description {
        font-size: 2.25rem;
        line-height: 1.2;
    }
    @media (min-width: 768px) {
        .hero-card .card-title {
            font-size: 1.75rem;
        }
        .hero-card .card-description {
            font-size: 3rem;
        }
    }
</style>
<section>
    <div id="mainbanner401619505242" class="mainbanner40 hero-banner">
        <div class="swiper-container hero-banner__slider">
            <div class="swiper-wrapper">
                <?php foreach(range(0, 2) as $t): ?>
                    <div class="swiper-slide">
                        <div class="hero-banner__item">
                            <a href="#" class="hero-banner__item-overlay" data-sm-bg-src="https://tip.bluecomet.kr/data/banner/65" data-big-bg-src="https://tip.bluecomet.kr/data/banner/50">
                                <div class="container-fluid sr-only">
                                    <div class="hero-card">
                                        <h2 class="card-title font-weight-light">정수기의 새로운 변신</h2>
                                        <p class="card-description font-weight-bold">물맛이 다른 <br>코웨이 한뻠정수기</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="container-fluid swiper-control-container">
                <div class="swiper-control swiper-control-fraction">
                    <div class="swiper-pagination"></div>

                    <div class="swiper-button swiper-button-next">
                        <span class="material-icons-round">navigate_next</span>
                    </div>

                    <div class="swiper-button swiper-button-prev">
                        <span class="material-icons-round">navigate_before</span>
                    </div>

                    <button type="button" class="swiper-button swiper-button-autoplay">
                        <span class="material-icons-round autoplay-play">play_arrow</span>
                        <span class="material-icons-round autoplay-stop">pause</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // TODO: 분리 및 특정 분기점에 따라 이미지 변경 작업 필요
    $(function() {
        'use strict';

        var bannerID = "mainbanner401619505242",
            swiperClassName = '#'+bannerID+' .swiper-container',
            $swiperAutoplayBtn = $(swiperClassName).find('.swiper-button-autoplay')
        ;

        var swiper = new Swiper(swiperClassName, {
            autoplay: {
                delay: 4000, // 자동실행 시간
            },
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // autoplay 버튼 이벤트
        if ($swiperAutoplayBtn.length) {
            $swiperAutoplayBtn.on('click', function(e) {
                var isPlay = swiper.autoplay.running;

                isPlay ? swiper.autoplay.stop() : swiper.autoplay.start();
                $(this).toggleClass('is-stop', isPlay);
            });
        }
    });

</script>

<div class="main-section main-section--gutter main-section--best">
    <div class="container-fluid">
        <div class="main-section__header">
            <div class="main-section__title-group">
                <h2 class="font-family-secondary main-section__title">베스트 렌탈 제품</h2>
                <p class="main-section__description">#요즘 가장 인기많은 제품 #꾸준한 인기</p>
            </div>
        </div>

        <div class="main-section___body">
            <div class="row">
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <section class="main-section__event">
                        <h2 class="sr-only">이벤트 배너</h2>
                        <div id="banner" class="swiper-container swiper--v1 js__swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#" class="swiper-item bg-primary" style="display: block; width: 100%; height: 10rem;">
                                        <span class="sr-only">이벤트입니다.</span>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-item bg-light" style="height: 10rem;">
                                        <span class="sr-only">이벤트입니다.</span>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#" class="swiper-item bg-primary--air" style="display: block; width: 100%; height: 10rem;">
                                        <span class="sr-only">이벤트입니다.</span>
                                    </a>
                                </div>
                            </div>

                            <div class="swiper-button swiper-button-next">
                                <span class="material-icons-round">navigate_next</span>
                            </div>
                            <div class="swiper-button swiper-button-prev">
                                <span class="material-icons-round">navigate_before</span>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </section>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row" class="main-section__products">
                        <?php foreach(range(0, 1) as $t): ?>
                            <div class="col-12 col-sm-6">
                                <div class="text-center bg-light main-section__product">
                                    <?php echo $this->include($THEME_URL."/common/productCardBrief"); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="text-center bg-light main-section__product">
                                    <?php echo $this->include($THEME_URL."/common/productCardRentalBrief"); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        new Swiper('#banner', {
            loop: false,
            speed: 600,
            slidesPerView: 1,
            pagination : {
                el : '#banner .swiper-pagination',
                clickable : true
            },
            navigation: {
                prevEl: '#banner .swiper-button-prev',
                nextEl: '#banner .swiper-button-next',
            }
        });
    })
</script>

<section class="main-section main-section--gutter main-section--categories bg-light">
    <div class="container-fluid">
        <div class="main-section__header">
            <div class="main-section__title-group">
                <h2 class="font-family-secondary main-section__title">카테고리별 렌탈 제품</h2>
                <p class="main-section__description">#핫하다 핫해! 인기만점</p>
            </div>
        </div>

        <div class="main-section__body">
            <div class="row">
                <?php foreach(range(0, 1) as $t): ?>
                    <div class="col-12 col-sm-6 col-lg-3 mb-3">
                        <?php echo $this->include($THEME_URL."/common/productCard"); ?>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 mb-3">
                        <?php echo $this->include($THEME_URL."/common/productCardRental"); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="main-section main-section--gutter main-section--weekly-new">
    <div class="container-fluid">
        <div class="main-section__header main-section__header--link">
            <div class="main-section__title-group">
                <h2 class="font-family-secondary main-section__title">WEEKLY SHOP 신규상품</h2>
                <p class="main-section__description">#신상품은 고민하지말고 바로 Get!</p>
            </div>
            <a href="#" class="go-to-link main-section__link d-none d-md-block">
                <span class="go-to-link__text">더보기</span>
                <span class="material-icons-round go-to-link__icon">navigate_next</span>
            </a>
        </div>

        <div class="main-section__body">
            <div class="border">
                <?php echo $this->include($THEME_URL."/common/productCardFeature"); ?>
            </div>
        </div>

        <div class="main-section__footer text-center d-md-none">
            <a href="#" class="go-to-link d-inline-flex btn btn-action btn-outline-gray rounded-pill">
                <span class="go-to-link__text mr-2">더보기</span>
                <span class="material-icons-round go-to-link__icon">east</span>
            </a>
        </div>
    </div>
</section>

<section class="main-section main-section--gutter main-section--special-event">
    <div class="container-fluid">
        <div class="main-section__header main-section__header--link">
            <div class="main-section__title-group">
                <h2 class="font-family-secondary main-section__title">SPECIAL EVENT</h2>
                <p class="main-section__description">#이달의 이벤트</p>
            </div>
            <a href="#" class="go-to-link main-section__link d-none d-md-block">
                <span class="go-to-link__text">더보기</span>
                <span class="material-icons-round go-to-link__icon">navigate_next</span>
            </a>
        </div>

        <div class="main-section__body">
            <div id="" class="swiper-container swiper--v1 js__event-swiper">
                <div class="swiper-wrapper">
                    <?php foreach(range(0, 2) as $t): ?>
                        <div class="swiper-slide">
                            <a href="#" class="link-reset card gallery-card hover--underline" >
                                <div class="card-thumbnail">
                                    <img src="https://via.placeholder.com/400x300" alt="" class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title text-truncate"><span class="hover-target">다양한 제품을 추가 렌탈시 할인 적용!</span></h3>
                                    <p class="opacity-56 text-truncate card-description">
                                        다양한 혜택과 사은품 팡팡! 위하여, 따뜻한 뜨거운지라, 원질이 현저하게 낙원을 인생에 때문이다. 피부가 얼마나 내려온 불러 할지니, 아름다우냐?
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-button swiper-button-next">
                    <span class="material-icons-round">navigate_next</span>
                </div>
                <div class="swiper-button swiper-button-prev">
                    <span class="material-icons-round">navigate_before</span>
                </div>
                <div class="swiper-scrollbar"></div>
            </div>
        </div>

        <div class="main-section__footer text-center d-md-none">
            <a href="#" class="go-to-link d-inline-flex btn btn-action btn-outline-gray rounded-pill">
                <span class="go-to-link__text mr-2">더보기</span>
                <span class="material-icons-round go-to-link__icon">east</span>
            </a>
        </div>
    </div>
</section>

<script>
    $(function() {
        'use strict';

        new Swiper('.js__event-swiper', {
            slidesPerView: 3,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                hide: true,
            },
            breakpoints: {
                992: {
                    slidesPerView: 2,
                },
                576: {
                    slidesPerView: 'auto',
                    spaceBetween: 15,
                    freeMode: true,
                }
            }
        });
    })
</script>

<section class="main-section main-section--gutter main-section--shop-hot bg-dark text-white">
    <div class="container-fluid">
        <div class="main-section__header">
            <h2 class="main-section__badge">SHOP HOT ITEM</h2>
            <div class="main-section__title-group">
                <h3 class="font-family-secondary main-section__title text-reset">당신의 활기찬 매일을 위해!</h3>
                <p class="main-section__description text-reset">#단독특가 #지금이기회</p>
            </div>
        </div>

        <div class="main-section__body">
            내용
        </div>
    </div>
</section>

<section class="main-section main-section--gutter main-section--tip-hot">
    <div class="container-fluid">
        <div class="main-section__header main-section__title-group">
            <h2 class="font-family-secondary main-section__title">TIP HOT ITEM</h2>
            <p class="main-section__description">#핫하다 핫해! 인기만점</p>
        </div>

        <div class="main-section__body">
            <div class="row">
                <?php foreach(range(0, 5) as $t): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                        <?php echo $this->include($THEME_URL."/common/productCard"); ?>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                        <?php echo $this->include($THEME_URL."/common/productCardRental"); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


