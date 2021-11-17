<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--center page--center-specialized-doctors');
$this->setVar('heroTitle', '암센터');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/center-specialized-doctors.css">
<?php echo $this->endSection(); ?>

<?php
// dummy data
$doctors = [
    [
        'name' => '김성현',
        'department' => '진료과 혈액종양내과 (암센터)',
        'specialized_field' => '혈액(혈액암, 빈혈, 혈소판감소증, 조혈모세포 이식)',
        'image_src' => $THEME_URL.'/images/center/doctor-default.jpg',
    ],
    [
        'name' => '오성용',
        'department' => '진료과 혈액종양내과 (암센터)',
        'specialized_field' => '종양(위암, 대장암, 췌장암, 간담도암), 혈액',
        'image_src' => $THEME_URL.'/images/center/doctor02.jpg',
    ],
    [
        'name' => '이수이',
        'department' => '진료과 혈액종양내과 (암센터)',
        'specialized_field' => '종양(유방암, 폐암, 두경부암, 희귀암), 혈액',
        'image_src' => $THEME_URL.'/images/center/doctor03.jpg',
    ],
    [
        'name' => '이지현',
        'department' => '진료과 혈액종양내과 (암센터)',
        'specialized_field' => '혈액(혈액암, 희귀혈액질환, 빈혈, 혈소판감소증, 조혈모세포 이식)',
        'image_src' => $THEME_URL.'/images/center/doctor04.jpg',
    ],
    [
        'name' => '허석재',
        'department' => '진료과 혈액종양내과 (암센터)',
        'specialized_field' => '종양(대장암, 췌장암, 간담도암, 비뇨의학암, 부인암), 혈액',
        'image_src' => $THEME_URL.'/images/center/doctor05.jpg',
    ],
    [
        'name' => '최희원',
        'department' => '소아청소년과 (어린이센터)',
        'specialized_field' => '혈액종양(조혈모세포 이식), 성조숙증, 신장, 영아혈관종',
        'image_src' => $THEME_URL.'/images/center/doctor06.jpg',
    ],
];
?>

<?php echo $this->section('content'); ?>
<div class="container section mt-0">

    <div class="section-divider">
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="/center/specializedInfo" aria-selected="false">
                    진료과 소개
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="/center/specializedDoctors" aria-selected="true">
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

                        <a href="/center/centerDoctor" class="card-action">의료진 정보</a>
                    </section>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="section-box text-right">
        <a href="/center/specializedCenter" class="btn btn-lg btn-wide btn-outline-gray text-gray--dark  border">전체 진료과</a>
    </div>
</div>
<?php echo $this->endSection(); ?>
