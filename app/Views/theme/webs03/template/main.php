<?php echo $this->extend($THEME_URL.'/layout/defaultLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--main');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="/assets/plugins/swiper@4.5.3/dist/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo $THEME_URL; ?>/css/pages/main.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<main>
    <div class="section py-0 hero-section bg-light">
        <div class="swiper-container js__hero-swiper">
            <div class="swiper-wrapper">
                <?php foreach(range(0, 2) as $t): ?>
                    <div class="swiper-slide">
                        <img src="<?php echo $THEME_URL; ?>/images/main/hero-slide001.jpg" alt="" class="img-fluid">
                        <div class="container"></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-pagination js__hero-swiper__pagination"></div>
        </div>
    </div>

    <article class="section section-lg service-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">병원 <strong class="text-primary">진료과목</strong></h2>
            </div>

            <ul class="list-unstyled row row-sm section-body">
                <li class="col-6 col-md-4 col-lg-auto">
                    <a href="/" class="card service-card">
                        <div class="card-sidebar">
                            <i class="icon icon-xl icon-brain rounded-circle card-icon bg-primary"></i>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">심뇌혈관센터</h3>
                            <span class="btn card-btn">바로가기</span>
                        </div>
                    </a>
                </li>
                <li class="col-6 col-md-4 col-lg-auto">
                    <a href="/" class="card service-card">
                        <div class="card-sidebar">
                            <i class="icon icon-xl icon-microscope rounded-circle card-icon bg-primary"></i>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">건강검진</h3>
                            <span class="btn card-btn">바로가기</span>
                        </div>
                    </a>
                </li>
                <li class="col-6 col-md-4 col-lg-auto">
                    <a href="/" class="card service-card">
                        <div class="card-sidebar">
                            <i class="icon icon-xl icon-dna rounded-circle card-icon bg-primary"></i>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">로봇수술센터</h3>
                            <span class="btn card-btn">바로가기</span>
                        </div>
                    </a>
                </li>
                <li class="col-6 col-md-4 col-lg-auto">
                    <a href="/" class="card service-card">
                        <div class="card-sidebar">
                            <i class="icon icon-xl icon-ribbon rounded-circle card-icon bg-primary"></i>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">심뇌혈관센터</h3>
                            <span class="btn card-btn">바로가기</span>
                        </div>
                    </a>
                </li>
                <li class="col-6 col-md-4 col-lg-auto">
                    <a href="/" class="card service-card">
                        <div class="card-sidebar">
                            <i class="icon icon-xl icon-medicine rounded-circle card-icon bg-primary"></i>
                        </div>

                        <div class="card-body">
                            <h3 class="card-title">암센터</h3>
                            <span class="btn card-btn">바로가기</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </article>

    <article class="section bg-air member-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">병원 <strong class="text-primary">의료진 소개</strong></h2>
            </div>

            <div class="swiper-container js__member-swiper">
                <div class="swiper-wrapper">
                    <?php foreach(range(0, 8) as $t): ?>
                        <div class="swiper-slide">
                            <section class="card member-card">
                                <div class="card-thumbnail">
                                    <img src="<?php echo $THEME_URL ?>/images/main/member-profile001.png" alt="" loading="lazy" decoding="async" class="img-fluid">
                                </div>

                                <div class="card-header">
                                    <h3 class="card-title text-muted">의료진 이름</h3>
                                    <p class="card-subtitle text-primary">진료과목</p>
                                </div>

                                <div class="card-body">
                                    <p class="card-text text-muted">
                                        그들은 있으며, 그들의 것은 같은 때문이다. 이상이 밝은 풀이 열락의 뿐이다. 귀는 곳으로 꽃이 어디 끝까지 산야에 봄바람이다. 없으면 바이며, 영원히 인생을 그리하였는가? 봄날의 동산에는 살 충분히 귀는 무엇을 운다.
                                    </p>
                                </div>
                            </section>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-pagination js__member-swiper__pagination"></div>
            </div>

        </div>
    </article>
    
    <article class="section counselling-section">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">상담신청</h2>
                    <p>
                        언제나 친절하게상담하여 드립니다. 궁금하신 사항이 있으시면 상담신청을 통해 질문해주세요. 최선을 다해 답변해드리겠습니다.
                    </p>
                    <a href="">바로가기</a>
                </div>
            </div>
        </div>
    </article>

    <article class="section news-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">병원 <strong class="text-primary">소식</strong></h2>
            </div>

            <ul>
                <li class="card">
                    <div class="card-body">
                        <h3 class="card-title text-truncate">못하다 커다란 주는 사막이다. 산야에 귀는 이상이 얼마나 것이다.</h3>
                        <p class="card-text text-truncate">
                            간에 이상 몸이 평화스러운 이것이다. 오아이스도 풀이 목숨이 불어가 속에... 것이다. 두기 그들의 거친 대한 자신과 사람은 운다.
                        </p>
                    </div>

                    <div class="card-sidebar">
                        <p class="date">
                            <span class="date-day">23</span>
                            <span class="date-month">Aug</span>
                        </p>
                    </div>
                </li>
            </ul>

            <div class="embed-responsive-16by9">
                <iframe width="100%" height="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/YlhOIzvUT0A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </article>

    <article class="section network-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">건강 <strong class="text-primary">네트워크</strong></h2>
            </div>

            <ul class="list-unstyled">
                <li>
                    <a href="/" class="card">
                        <div class="card-body">
                            <h3>제목</h3>
                            <p>내용</p>
                        </div>
                        <div class="card-thumbnail">
                            <img src="" alt="" loading="lazy" decoding="async" class="img-fluid">
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </article>

    <article class="section faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">병원 <strong class="text-primary">FAQ</strong></h2>
            </div>

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Collapsible Group Item #2
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Some placeholder content for the second accordion panel. This panel is hidden by default.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            And lastly, the placeholder content for the third and final accordion panel. This panel is hidden by default.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>

<?php echo $this->endSection(); ?>

<?php echo $this->section('appendBody'); ?>
    <script src="/assets/plugins/swiper@4.5.3/dist/js/swiper.min.js"></script>
    <script>
        new Swiper(".js__hero-swiper", {
            pagination: {
                el: ".js__hero-swiper__pagination",
                clickable: true,
            },
        });

        new Swiper('.js__member-swiper', {
            slidesPerView: 3,
            spaceBetween: 24,
            pagination: {
                el: ".js__member-swiper__pagination",
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 2,
                },
                767: {
                    slidesPerView: 1,
                },
            },
        })
    </script>
<?php echo $this->endSection(); ?>
