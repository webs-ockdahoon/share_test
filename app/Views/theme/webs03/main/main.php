<?php echo $this->extend($THEME_URL.'/layout/defaultLayout'); ?>

<?php
// dummy text
$faqs = [
    [
        'title' => '청춘예찬',
        'content' => '
            되려니와, 우리는 되는 얼음과 가는 주며, 바이며, 듣는다. 그들은 청춘에서만 방지하는 얼마나 사는가 것이 피어나는 생의 것이다.보라, 것이다. 위하여 위하여 날카로우나 방지하는 역사를 얼마나 소담스러운 것은 운다. 수 그들은 노년에게서 있으랴? 천지는 황금시대의 뭇 것이 끝에 우리의 청춘의 따뜻한 동산에는 교향악이다. 이것을 가슴이 바로 위하여서.                    
        ',
    ],
    [
        'title' => '별 헤는 밤',
        'content' => '
            같이, 인류의 되려니와, 인간이 같지 같이, 예수는 있을 사막이다. 청춘을 구할 이 귀는 이상은 미묘한 아니더면, 부패뿐이다. 그러므로 없는 위하여서 청춘의 피가 구할 피어나기 있는 말이다. 같은 노래하며 품었기 그들의 밝은 힘있다. 같은 인생의 것은 것이다. 것은 들어 안고, 우리 이상 때문이다. 꽃이 그들의 있음으로써 간에 피가 천자만홍이 위하여 그러므로 있는가? 없으면 몸이 그들은 바이며, 무엇이 그들은 부패뿐이다. 놀이 끓는 풀이 가장 미인을 풍부하게 것은 어디 아니다. 보는 갑 품고 뿐이다. 무엇을 구하지 있는 힘차게 하였으며, 황금시대다.
        ',
    ],
    [
        'title' => '청춘예찬 두번째',
        'content' => '
            하는 고행을 피부가 가는 사는가 인간은 청춘이 인도하겠다는 그리하였는가? 위하여 꽃이 봄날의 일월과 풀이 보이는 구하지 끝까지 생의 사막이다. 위하여, 이상, 크고 아름다우냐? 두기 얼음과 맺어, 밝은 따뜻한 오직 피다. 없는 싹이 실로 위하여서, 가치를 약동하다. 같은 별과 밥을 무엇이 것이다.                
        ',
    ],
]
?>

<?php
    $this->setVar('bodyClassName', 'page--main');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="/assets/plugins/swiper@4.5.3/dist/css/swiper.min.css">
<link rel="stylesheet" href="<?php echo $THEME_URL; ?>/css/pages/main.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<main>
    <div class="section my-0 hero-section bg-light">
        <div class="swiper-container hero-swiper js__hero-swiper">
            <div class="swiper-wrapper">
                <?php foreach(range(0, 2) as $t): ?>
                    <div class="swiper-slide hero-card" style="background-image: url('<?php echo $THEME_URL; ?>/images/main/hero-slide001.jpg');">
                        <div class="container container--max-md">
                            <div class="card-body">
                                <p class="card-text text-dark">사랑과 인술로 늘 함께하는 동아대학교병원</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-pagination swiper-pagination--v1 js__hero-swiper__pagination"></div>
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

            <div class="swiper-container member-swiper js__member-swiper">
                <div class="swiper-wrapper">
                    <?php foreach(range(0, 4) as $t): ?>
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

                <div class="swiper-pagination swiper-pagination--v1 js__member-swiper__pagination"></div>
            </div>

        </div>
    </article>

    <article class="section counselling-section">
        <div class="container">
            <div class="card cta-card">
                <div class="card-body">
                    <h2 class="card-title">상담신청</h2>
                    <p class="card-text">
                        언제나 친절하게상담하여 드립니다. 궁금하신 사항이 있으시면 상담신청을 통해 질문해주세요. 최선을 다해 답변해드리겠습니다.
                    </p>
                </div>
                <div class="card-action">
                    <a href="/" class="btn btn-primary card-btn">바로가기</a>
                </div>
            </div>
        </div>
    </article>

    <article class="section section-column2 news-section">
        <div class="container">
            <div class="section-content">
                <div class="section-header">
                    <h2 class="section-title">병원 <strong class="text-primary">소식</strong></h2>
                </div>

                <ul class="list-unstyled mb-0 news-cards">
                    <?php foreach(range(0, 2) as $t): ?>
                        <li class="card news-card">
                            <div class="card-sidebar">
                                <time class="card-date">
                                    <span class="date-day">23</span>
                                    <span class="date-month">Aug</span>
                                </time>
                            </div>

                            <div class="card-body">
                                <h3 class="card-title text-truncate text-dark">
                                    <a href="/">못하다 커다란 주는 사막이다. 산야에 귀는 이상이 얼마나 것이다.</a>
                                </h3>

                                <p class="card-text text-muted text-truncate">
                                    간에 이상 몸이 평화스러운 이것이다. 오아이스도 풀이 목숨이 불어가 속에... 것이다. 두기 그들의 거친 대한 자신과 사람은 운다.
                                </p>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="section-sidebar">
                <div class="embed-responsive embed-responsive-16by9 media-frame">
                    <iframe width="100%" height="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/YlhOIzvUT0A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </article>

    <article class="section network-section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">건강 <strong class="text-primary">네트워크</strong></h2>
            </div>

            <ul class="list-unstyled mb-0 row row-xs network-list">
                <?php foreach(range(1, 12) as $ni): ?>
                    <li class="col-3 col-lg-2">
                        <a href="/" class="link-hover--img-zoom">
                            <img src="<?php echo $THEME_URL; ?>/images/main/network-img<?php echo $ni < 10 ? "0{$ni}" : $ni; ?>.jpg" alt="" class="img-fluid">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </article>

    <article class="section section-lg section-column2 faq-section">
        <div class="container">
            <div class="section-content">
                <div class="section-header">
                    <h2 class="section-title">병원 <strong class="text-primary">FAQ</strong></h2>
                </div>

                <div class="accordion" id="accordionFaq">
                    <?php foreach($faqs as $faq_index => $faq): ?>
                        <div class="card collapse-card">
                            <div class="card-header" id="faqHeading<?php echo $faq_index; ?>">
                                <h2 class="mb-0 card-title">
                                    <button class="btn card-title__toggler" type="button" data-toggle="collapse" data-target="#faqContent<?php echo $faq_index; ?>" aria-expanded="<?php echo $faq_index === 0 ? 'true' : 'false'; ?>" aria-controls="faqContent<?php echo $faq_index; ?>">
                                        <i class="icon icon-toggle"></i>
                                        <?php echo $faq['title']; ?>
                                    </button>
                                </h2>
                            </div>

                            <div id="faqContent<?php echo $faq_index; ?>" class="collapse <?php echo $faq_index === 0 ? 'show' : ''; ?>" aria-labelledby="faqHeading<?php echo $faq_index; ?>" data-parent="#accordionFaq">
                                <div class="card-body">
                                    <?php echo $faq['content']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="section-sidebar">
                <div class="section-background"></div>
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

