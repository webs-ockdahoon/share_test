<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--guide page--guide-convenience');
    $this->setVar('heroTitle', '편의시설 안내');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/guide-convenience.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section mt-0 section-text text-muted">
        <div class="section-divider">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="eat-tab" data-toggle="tab" href="#eat" role="tab" aria-controls="eat" aria-selected="true">
                        식당/커피숍
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="false">
                        편의시설
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="etc-tab" data-toggle="tab" href="#etc" role="tab" aria-controls="etc" aria-selected="false">
                        기타시설
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="eat" role="tabpanel" aria-labelledby="eat-tab">
                <h3 class="sr-only">식당/커피숍</h3>

                <ul class="list-unstyled row convenience-list">
                    <li class="col-12 col-sm-12 col-lg-4">
                        <section class="card gallery-card gallery-card--responsive">
                            <div class="card-box card-thumbnail">
                                <img src="<?php echo $THEME_URL; ?>/images/guide/convenience-eat01.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="card-box card-header">
                                <h4 class="card-title mb-0">동백죽</h4>
                            </div>

                            <div class="card-box card-body">
                                <ul class="list-bullet">
                                    <li>죽, 국수</li>
                                    <li>위치 : 중앙관 1층</li>
                                    <li>
                                        이용시간 : 평일07:00 ~ 19:00 / 토요일
                                        08:30 ~ 17:00 / 일요일 휴무 / 공휴일 변동
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </li>

                    <li class="col-12 col-sm-12 col-lg-4">
                        <section class="card gallery-card gallery-card--responsive">
                            <div class="card-box card-thumbnail">
                                <img src="<?php echo $THEME_URL; ?>/images/guide/convenience-eat02.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="card-box card-header">
                                <h4 class="card-title mb-0">앤티앤스프레즐</h4>
                            </div>

                            <div class="card-box card-body">
                                <ul class="list-bullet">
                                    <li>프레즐, 커피</li>
                                    <li>위치 : 중앙관 1층</li>
                                    <li>
                                        이용시간 : 평일07:00 ~ 19:00 / 토요일
                                        09:00 ~ 15:00 / 일요일 휴무 / 공휴일 변동
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </li>

                    <li class="col-12 col-sm-12 col-lg-4">
                        <section class="card gallery-card gallery-card--responsive">
                            <div class="card-box card-thumbnail">
                                <img src="<?php echo $THEME_URL; ?>/images/guide/convenience-eat03.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="card-box card-header">
                                <h4 class="card-title mb-0 text-truncate">커피지연(세가프레도)</h4>
                            </div>

                            <div class="card-box card-body">
                                <ul class="list-bullet">
                                    <li>커피 및 음료, 다과 등</li>
                                    <li>위치 :  본관 1층 아뜨리움</li>
                                    <li>
                                        이용시간 : 평일 07:00 ~ 16:30 / 주말‧
                                        공휴일 09:00 ~ 13:30
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </li>

                    <li class="col-12 col-sm-12 col-lg-4">
                        <section class="card gallery-card gallery-card--responsive">
                            <div class="card-box card-thumbnail">
                                <img src="<?php echo $THEME_URL; ?>/images/guide/convenience-eat04.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="card-box card-header">
                                <h4 class="card-title mb-0">WINGO(윙고)</h4>
                            </div>

                            <div class="card-box card-body">
                                <ul class="list-bullet">
                                    <li>커피, 유기농 아이스크림, 유기농 요구르트</li>
                                    <li>위치 : 중앙관 1층</li>
                                    <li>
                                        이용시간 : 평일 07:30 ~ 19:30 / 토요일
                                        09:00 ~ 17:00 / 일요일 휴무 / 공휴일 변동
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </li>

                    <li class="col-12 col-sm-12 col-lg-4">
                        <section class="card gallery-card gallery-card--responsive">
                            <div class="card-box card-thumbnail">
                                <img src="<?php echo $THEME_URL; ?>/images/guide/convenience-eat05.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="card-box card-header">
                                <h4 class="card-title mb-0">FOOD O CLOCK(푸드코트)</h4>
                            </div>

                            <div class="card-box card-body">
                                <ul class="list-bullet">
                                    <li>한식, 분식, 양식, cafe오가다</li>
                                    <li>위치 : 중앙관 1층</li>
                                    <li>
                                        이용시간 : 평일 09:00 ~ 19:00 / 토요일
                                        10:00 ~ 16:00 / 일·공휴일 휴무
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </li>
                </ul>
            </div>

            <div class="tab-pane" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                <h3 class="sr-only">편의시설</h3>

                <ul class="list-unstyled row convenience-list">
                    <?php foreach(range(1, 6) as $i): ?>
                    <li class="col-12 col-sm-12 col-lg-4">
                        <section class="card gallery-card gallery-card--responsive">
                            <div class="card-box card-thumbnail">
                                <img src="<?php echo $THEME_URL; ?>/images/guide/convenience-eat01.jpg" class="img-fluid" alt="">
                            </div>

                            <div class="card-box card-header">
                                <h4 class="card-title mb-0">편의시설 이름</h4>
                            </div>

                            <div class="card-box card-body">
                                <ul class="list-bullet">
                                    <li>편의시설 설명</li>
                                    <li>위치 : -</li>
                                    <li>
                                        이용시간: -
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="tab-pane" id="etc" role="tabpanel" aria-labelledby="etc-tab">
                <h3 class="sr-only">기타시설</h3>

                <ul class="list-unstyled row convenience-list">
                    <?php foreach(range(1, 6) as $i): ?>
                        <li class="col-12 col-sm-12 col-lg-4">
                            <section class="card gallery-card gallery-card--responsive">
                                <div class="card-box card-thumbnail">
                                    <img src="<?php echo $THEME_URL; ?>/images/guide/convenience-eat01.jpg" class="img-fluid" alt="">
                                </div>

                                <div class="card-box card-header">
                                    <h4 class="card-title mb-0">기타시설 이름</h4>
                                </div>

                                <div class="card-box card-body">
                                    <ul class="list-bullet">
                                        <li>기타시설 설명</li>
                                        <li>위치 : -</li>
                                        <li>
                                            이용시간: -
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php echo $this->endSection(); ?>
