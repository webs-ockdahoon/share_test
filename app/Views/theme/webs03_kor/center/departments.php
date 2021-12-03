<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout');


    $this->setVar('bodyClassName', 'page--center page--center-specialized-enter');
    $this->setVar('heroTitle', '전문센터 및 의료진');


    /* 참고용
    // 페이지 디자인 위해 데이터 임시 배열로 저장
    $specialized = [
        '간담췌센터', '갑상선센터', '건강검진센터', '노발리스방사선수술센터', '로봇수술센터',
        '소화기센터', '스포츠의학센터', '심뇌혈관센터', '암센터', '유방센터',
        '응급의료센터', '장기이식센터', '전문특화센터', '척추센터', '파키슨병센터',
    ];
    */
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/center-specializedCenter.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section mt-0">
        <ul class="list-unstyled medical-list">
           <?php foreach($department_list as $department): ?>
                <li>
                    <section class="medical-card medical-card--focusable text-center" tabindex="0">
                        <div class="card-content">
                            <div class="card-icon" style="background-image: url(/uploaded/file/<?php echo $department['dep_image']; ?>);"></div>
                            <h3 class="card-title font-weight-normal"><?php echo $department['dep_title_'.$lang]; ?></h3>
                        </div>

                        <div class="card-content card-hover-content bg-secondary">
                            <span class="d-block card-title text-white text-truncate"><?php echo $val['csp_title']; ?><span class="sr-only">메뉴</span></span>
                            <a href="/kor/center/specializedInfo?idx=<?php echo $department['dep_idx']; ?>" class="btn btn-block btn-outline-gray card-btn" tabindex="0">소개</a>
                            <a href="/kor/center/specializedDoctors?idx=<?php echo $department['dep_idx']; ?>" class="btn btn-block btn-outline-gray card-btn" tabindex="0">의료진</a>
                        </div>
                    </section>
                </li>
           <?php endforeach; ?>
        </ul>
    </div>
<?php echo $this->endSection(); ?>
