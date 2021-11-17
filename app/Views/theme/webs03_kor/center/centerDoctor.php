<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--center page--center-center-doctor');
    $this->setVar('heroTitle', '의료진 소개');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/center-center-doctor.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section section-text text-muted">
        <section class="section-box section-card border-top is-2 border-dark doctor-brief">
            <div class="row mb-n4">
                <div class="col-12 col-md-6 mb-4">
                    <div class="doctor-name">
                        <div class="doctor-name__thumbnail">
                            <!-- // image size: 96px x 128px (3:4) -->
                            <div class="doctor-name__thumbnail-img bg-light rounded" style="background-image: url('<?php echo $THEME_URL; ?>/images/center/doctor06.jpg');"></div>
                        </div>

                        <div class="doctor-name__content">
                            <h3 class="section-title mb-0">
                                <small class="d-block mb-3 font-weight-bold">소아청소년과 (어린이센터)</small>
                                <strong class="d-block h2 mb-0 font-weight-bold title-lined title-lined--top text-dark">최희원</strong>
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 mb-4">
                    <h4 class="section-subtitle text-primary">전문 진료분야</h4>
                    <ul class="list-bullet list-bullet--reset">
                        <li>혈액종양(조혈모세포 이식), 성조숙증, 신장, 영아혈관종</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="section-box  border-top border-dark">
            <div class="section-card section-card-sm border-bottom">
                <h4 class="section-title mb-0 text-dark">학력 및 경력</h4>
            </div>

            <div class="section-card">
                <div class="row mb-n4">
                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle text-dark">학력</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>동아대학교 의과대학 졸업</li>
                            <li>동아대학교 의과대학 대학원 의학 석사</li>
                            <li>동아대학교 의과대학 대학원 의학 박사</li>
                            <li>소아과 전문의</li>
                            <li>소아혈액종양 분과 세부전문의</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle text-dark">경력/연수</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>삼성서울병원 소아청소년과 소아혈액종양분과 임상강사</li>
                            <li>동아대학교병원 소아청소년과 소아혈액종양분과 임상강사</li>
                            <li>삼성서울병원 소아청소년과 신장분과 연수</li>
                            <li>현 동아대학교병원 소아청소년과 부교수</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box border-top border-dark">
            <div class="section-card section-card-sm border-bottom">
                <h4 class="section-title mb-0  text-dark">학회 활동</h4>
            </div>

            <div class="section-card">
                <div class="row mb-n4">
                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle text-dark">학회 활동</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>대한소아청소년과학회 정회원</li>
                            <li>대한소아혈액종양학회 정회원</li>
                            <li>대한혈액학회 정회원</li>
                            <li>대한조혈모세포이식학회 정회원</li>
                            <li>대한소아뇌종양학회 정회원</li>
                            <li>대한암학회 정회원</li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle  text-dark">학회 인증</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>등록된 내용이 없습니다.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box border-top border-dark">
            <div class="section-card section-card-sm border-bottom">
                <h4 class="section-title mb-0 text-dark">수상내역 및 기타</h4>
            </div>

            <div class="section-card">
                <div class="row mb-n4">
                    <div class="col-12 col-md-6 mb-4">
                        <h5 class="mb-3 section-subtitle  text-dark">수상내역</h5>
                        <ul class="list-bullet list-bullet--reset">
                            <li>등록된 내용이 없습니다.</li>
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

        <div class="section-box text-right">
            <a href="/center/specializedDoctors" class="btn btn-lg btn-wide btn-outline-gray text-gray--dark border">진료과 의료진</a>
        </div>
    </div>
<?php echo $this->endSection(); ?>
