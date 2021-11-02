<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-department-info');
    $this->setVar('heroTitle', '가정의학과');
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

    <div class="section-divider-sm content-bg bg-light" style="background-image: url('https://via.placeholder.com/1200x400');"></div>

    <div class="section-box section-text">
        <p class="mb-2">
            가정의학과는 우리 몸 전반에 관련된 병에 대해 폭 넓은 지식을 가지고, 가족 관계나 생활적인 관심까지 포함한 진정한 가족의 주치의 역할을 하는 것을 목적으로 합니다.
            이미 미국 등의 선진국에서는 이러한 주치의 제도가 정착되어 있는 상태입니다.
        </p>

        <p class="mb-2">
            가정의학과는 나이, 남녀노소, 질병의 종류에 관계없이 가족전체의 건강문제를 지속적이고 종합적으로 다루는 과입니다.
            만약 아픈 부위나 , 병의 종류에 따라 각각을 나누어 진료 받게 되면, 상호 관련성이 있는 증상이라도 여러 과를 방문하여 많은 의사에게 나누어서 진료를 받아야 하는 불편함이 생기게 되고, 이로 인해 의료비 부담 또한 증가하게 됩니다.
        </p>

        <p class="mb-2">
            가정의학은 이러한 문제를 개선하고 해결하기 위해 한명의 의사가 지속적으로 환자를 관리하는 과입니다.
        </p>
    </div>

    <div class="section-box text-right">
        <a href="/medical/departments" class="btn btn-lg font-base btn-outline-gray--dark">진료과 전체보기</a>
    </div>
    
</div>
<?php echo $this->endSection(); ?>
