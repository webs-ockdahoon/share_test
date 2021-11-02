<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-department-info');
    $this->setVar('heroTitle', '이비인후과');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-department-info.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<div class="container section mt-0">

    <div class="section-divider-sm">
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="/medical/departmentInfo" aria-selected="true">
                    진료과 소개
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="/medical/departmentDoctors" aria-selected="false">
                    의료진 소개
                </a>
            </li>
        </ul>
    </div>

    <div class="section-divider-sm content-bg bg-light" style="background-image: url('https://via.placeholder.com/1200x320');max-height: 320px;"></div>

    <div class="section-box section-text">
        <p class="mb-3">
            만성중이염과 진주종의 유양동수술 및 고실성형술 만성부비동염의 비내시경수술 외비 및 비중격 성형수술 두경부종양 수술 악안면 외상의 수술을 시행하고 있으며 전정기능검사 내시경을 이용한 음성장애검사 알레르기검사 등을 시행하고 있습니다.
        </p>

        <p class="mb-3">
            난청환자를 위하여 전문화된 정밀난청검사와 보청기검사를 시행하며 전농환자의 인공와우이식술을 실시하고 언어평가 및 치료를 통하여 청각재활에 노력을 기울이고 있습니다.
        </p>
    </div>

    <div class="section-box text-right">
        <a href="/medical/departments" class="btn btn-lg btn-wide btn-outline-light text-gray--dark border">전체 진료과</a>
    </div>
    
</div>
<?php echo $this->endSection(); ?>
