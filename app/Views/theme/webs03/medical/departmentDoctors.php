<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-department-doctors');
    $this->setVar('heroTitle', '이비인후과');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-department-doctors.css">
<?php echo $this->endSection(); ?>

<?php
    // dummy data
    $doctors = [
            [
                'name' => '강명구',
                'department' => '이비인후과',
                'specialized_field' => '이과, 진주종, 중이염, 난청, 안면마비',
                'image_src' => $THEME_URL.'/images/medical/doctor01.jpg',
                'educations' => ['서울의대졸업', '서울의대 의학박사'],
                'experiences' => ['서울의대 전임의'],
                'society_activities' => [],
                'society_certifications' => [],
                'awards' => [],
            ],
            [
                'name' => '박헌수',
                'department' => '이비인후과',
                'specialized_field' => '갑상선암, 두경부암, 음성장애, 인후두 역류성질환, 안면외상, 경부림프절클리닉',
                'image_src' => $THEME_URL.'/images/medical/doctor02.jpg',
                'educations' => ['부산의대졸업', '동아의대 의학박사'],
                'experiences' => ['동아대학교의료원 전임의'],
                'society_activities' => [],
                'society_certifications' => [],
                'awards' => [],
            ],
            [
                'name' => '배우용',
                'department' => '이비인후과',
                'specialized_field' => '축농증, 코성형술, 알레르기, 코골이, 수면무호흡, 후각장애, 비종양, 비강암, 미각장애',
                'image_src' => $THEME_URL.'/images/medical/doctor03.jpg',
                'educations' => ['동아대학교 의대졸업', '동아대학교 의대의학박사'],
                'experiences' => ['2009-2010년 미국 UC San Diego 연수', '2008년 미국 스탠포드 대학 수면 센터'],
                'society_activities' => ['대한 이비인후과학회 정회원', '대한 안면성형재건학회 정회원', '대한 천식알레르기학회 정회원', '대한 생화학분자생물학회 정회원', '한국 의료 QA 학회 정회원'],
                'society_certifications' => [],
                'awards' => [],
            ],
            [
                'name' => '정성욱',
                'department' => '이비인후과',
                'specialized_field' => '인공와우이식, 이식형 보청기, 난청, 중이염, 진주종, 어지럼증, 두개저종양',
                'image_src' => $THEME_URL.'/images/medical/doctor04.jpg',
                'educations' => ['1999년 동아대학교 의과대학 졸업', '2004년 동아대학교 의과대학 의학박사'],
                'experiences' => ['현) 동아대학교 의과대학 이비인후과학교실 교수', '대한이비인후과학회 기획위원', '대한청각학회 교육이사', '대한이과학회 학술위원', '2011 아시아 태평양 인공와우이식 학회 scientific committee', '2015 아시아 태평양 인공와우이식 학회 Faculty member', '대한청각학회 정보이사, 학술이사, 국제이사', '대한이과학회 기획위원'],
                'society_activities' => ['대한이비인후과학회 회원', '대한청각학회 평생회원', '대한이과학회 회원'],
                'society_certifications' => [],
                'awards' => ['2014 대한청각학회 학술대회 우수상', '2016 한림인술상 (학술부문)', '2017 ICORL 2017, Best oral presentation award', ],
            ],
    ];
?>

<?php echo $this->section('content'); ?>
    <div class="container section mt-0">

        <div class="section-divider-sm">
            <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/medical/departmentInfo" aria-selected="false">
                        진료과 소개
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="/medical/departmentDoctors" aria-selected="true">
                        의료진 소개
                    </a>
                </li>
            </ul>
        </div>

        <div class="section-box section-text">
            <h3 class="sr-only">의료진 소개</h3>
            <ul class="list-unstyled row row-sm mb-n4">
                <?php foreach ($doctors as $doctor): ?>
                    <li class="col-12 col-lg-6 mb-4">
                        <section class="card doctor-card">
                            <div class="card-thumbnail-body">
                                <div class="card-thumbnail">
                                    <!-- // image size: 96px x 128px (3:4) -->
                                    <span class="card-thumbnail__img bg-light rounded" style="background-image: url('<?php echo $doctor['image_src']; ?>');"></span>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $doctor['name']; ?></h4>
                                    <dl class="data-table data-table--responsive-lg mb-0">
                                        <div class="data-table__row">
                                            <dt class="data-table__row-label text-primary">진료과</dt>
                                            <dd class="data-table__row-text"><?php echo $doctor['department']; ?></dd>
                                        </div>
                                        <div class="data-table__row">
                                            <dt class="data-table__row-label text-primary">전문 진료분야</dt>
                                            <dd class="data-table__row-text">
                                                <div class="text-truncate--multiple"><?php echo $doctor['specialized_field']; ?></div>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <a href="/medical/doctor" class="card-action">의료진 정보</a>
                        </section>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="section-box text-right">
            <a href="/medical/departments" class="btn btn-lg font-base btn-outline-primary--air text-muted border">전체 진료과</a>
        </div>
    </div>
<?php echo $this->endSection(); ?>
