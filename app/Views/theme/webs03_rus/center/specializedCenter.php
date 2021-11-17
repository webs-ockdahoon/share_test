<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout');


    $this->setVar('bodyClassName', 'page--center page--center-specialized-enter');
    $this->setVar('heroTitle', '전문센터 및 의료진');



    // 페이지 디자인 위해 데이터 임시 배열로 저장
    $specialized = [
        '간담췌센터', '갑상선센터', '건강검진센터', '노발리스방사선수술센터', '로봇수술센터',
        '소화기센터', '스포츠의학센터', '심뇌혈관센터', '암센터', '유방센터',
        '응급의료센터', '장기이식센터', '전문특화센터', '척추센터', '파키슨병센터',
    ];
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/center-specializedCenter.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section mt-0">
        <ul class="list-unstyled medical-list">
            <?php foreach($specialized as $specialized_index => $specialized): ?>
                <li>
                    <section class="medical-card medical-card--focusable text-center" tabindex="0">
                        <div class="card-content">
                            <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/center/specialized-icon<?php echo str_pad($specialized_index+1, 3, '0', STR_PAD_LEFT); ?>.png);"></div>
                            <h3 class="card-title font-weight-normal"><?php echo $specialized; ?></h3>
                        </div>

                        <div class="card-content card-hover-content bg-secondary">
                            <span class="d-block card-title text-white text-truncate"><?php echo $specialized; ?> <span class="sr-only">메뉴</span></span>
                            <a href="/center/specializedInfo" class="btn btn-block btn-outline-gray card-btn" tabindex="0">소개</a>
                            <a href="/center/specializedDoctors" class="btn btn-block btn-outline-gray card-btn" tabindex="0">의료진</a>
                        </div>
                    </section>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php echo $this->endSection(); ?>
