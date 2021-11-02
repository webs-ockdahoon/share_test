<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-doctor');
    $this->setVar('heroTitle', '의료진 소개');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-doctor.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section section-text text-muted">
        <section class="section-divider-sm section-card border-top is-2 border-dark doctor-brief">
            <div class="row mb-n4">
                <div class="col-12 col-md-6 mb-4">
                    <div class="doctor-name">
                        <div class="doctor-name__thumbnail">
                            <!-- // image size: 96px x 128px (3:4) -->
                            <div class="doctor-name__thumbnail-img bg-light rounded" style="background-image: url('<?php echo $THEME_URL; ?>/images/medical/doctor04.jpg');"></div>
                        </div>

                        <div class="doctor-name__content">
                            <h3 class="section-title mb-0">
                                <small class="d-block mb-3 font-weight-bold">이비인후과</small>
                                <strong class="d-block h2 mb-0 font-weight-bold title-lined title-lined--top text-dark">정성욱</strong>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <h4 class="section-subtitle text-primary">전문 진료분야</h4>
                    <ul class="list-bullet list-bullet--reset">
                        <li>인공와우이식, 이식형 보청기, 난청, 중이염, 진주종, 어지럼증, 두개저종양</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="section-divider-sm  border-top border-dark">
            <div class="section-card section-card-sm border-bottom">
                <h4 class="section-title mb-0 text-dark">학력 및 경력</h4>
            </div>

            <div class="section-card">
                <div class="row mb-n4">
                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle text-dark">학력</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>1999년 동아대학교 의과대학 졸업</li>
                            <li>2004년 동아대학교 의과대학 의학박사</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle text-dark">경력/연수</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>현) 동아대학교 의과대학 이비인후과학교실 교수</li>
                            <li>대한이비인후과학회 기획위원</li>
                            <li>대한청각학회 교육이사</li>
                            <li>대한이과학회 학술위원</li>
                            <li>2011 아시아 태평양 인공와우이식 학회 scientific committee</li>
                            <li>2015 아시아 태평양 인공와우이식 학회 Faculty member</li>
                            <li>대한청각학회 정보이사, 학술이사, 국제이사</li>
                            <li>대한이과학회 기획위원</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-divider-sm border-top border-dark">
            <div class="section-card section-card-sm border-bottom">
                <h4 class="section-title mb-0  text-dark">학회 활동</h4>
            </div>

            <div class="section-card">
                <div class="row mb-n4">
                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle text-dark">학회 활동</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>대한이비인후과학회 회원</li>
                            <li>대한청각학회 평생회원</li>
                            <li>대한이과학회 회원</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle  text-dark">학회 인증</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>-</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-divider-sm border-top border-dark">
            <div class="section-card section-card-sm border-bottom">
                <h4 class="section-title mb-0 text-dark">수상내역 및 기타</h4>
            </div>

            <div class="section-card">
                <div class="row mb-n4">
                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle  text-dark">수상내역</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>2014 대한청각학회 학술대회 우수상</li>
                            <li>2016 한림인술상 (학술부문)</li>
                            <li>2017 ICORL 2017, Best oral presentation award</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle text-dark">기타</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>등록된 내용이 없습니다.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php echo $this->endSection(); ?>
