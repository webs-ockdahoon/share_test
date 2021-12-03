<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-departments');
    $this->setVar('heroTitle', '진료과 및 의료진');
?>

<?php
    /* 참고용
    // 페이지 디자인 위해 데이터 임시 배열로 저장
    $departments = [
        '가정의학과', '감염내과', '내분비내과', '류마티스내과', '마취통증의학과',
        '방사선종양학과', '병리과', '비뇨기과', '산부인과', '성형외과',
        '소아청소년과', '소화기내과', '순환기내과', '신경과', '신경외과',
        '신장내과', '안과', '알레르기내과', '영상의학과', '외과',
        '응급의학과', '이비인후과', '재활의학과', '정신과', '정형외과',
        '직업환경의학과', '진단검사의학과', '치과', '피부과', '핵의학과',
        '혈액종양내과', '호흡기내과', '흉부외과',
    ]
    */
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-departments.css">
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
                            <span class="d-block card-title text-white text-truncate"><?php echo $department['dep_title_'.$lang]; ?><span class="sr-only">메뉴</span></span>
                            <a href="/kor/medical/departmentInfo/<?php echo $department['dep_idx']; ?>" class="btn btn-block btn-outline-gray card-btn" tabindex="0">소개</a>
                            <a href="/kor/medical/doctor/<?php echo $department['dep_idx']; ?>" class="btn btn-block btn-outline-gray card-btn" tabindex="0">의료진</a>
                        </div>
                    </section>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php echo $this->endSection(); ?>
