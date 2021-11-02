<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-departments');
    $this->setVar('heroTitle', '진료과 및 의료진');
?>

<?php
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
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-departments.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section mt-0">
        <div class="section-divider">
            <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="/medical/departments" aria-selected="true">
                        진료과
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="/medical/departments" aria-selected="false">
                        전문센터
                    </a>
                </li>
            </ul>
        </div>

        <ul class="list-unstyled medical-list">
            <?php foreach($departments as $department_index => $department): ?>
                <li>
                    <section class="medical-card medical-card--focusable text-center" tabindex="0">
                        <div class="card-content">
                            <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/medical/department-icon<?php echo str_pad($department_index+1, 3, '0', STR_PAD_LEFT); ?>.png);"></div>
                            <h3 class="card-title font-weight-normal"><?php echo $department; ?></h3>
                        </div>

                        <div class="card-content card-hover-content bg-secondary">
                            <span class="d-block card-title text-white text-truncate"><?php echo $department; ?> <span class="sr-only">메뉴</span></span>
                            <a href="/medical/departmentInfo" class="btn btn-block btn-outline-gray card-btn" tabindex="0">소개</a>
                            <a href="/medical/departmentDoctors" class="btn btn-block btn-outline-gray card-btn" tabindex="0">의료진</a>
                        </div>
                    </section>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php echo $this->endSection(); ?>
