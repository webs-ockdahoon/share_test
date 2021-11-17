<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--center page--center-specializedcenter-info');
$this->setVar('heroTitle', '암센터');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/center-specialized-info.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<div class="container section mt-0">

    <div class="section-divider">
        <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="/center/specializedInfo" aria-selected="true">
                    전문센터 소개
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" href="/center/specializedDoctors" aria-selected="false">
                    의료진 소개
                </a>
            </li>
        </ul>
    </div>

    <div class="section-divider-sm content-bg bg-light" style="background-image: url('https://via.placeholder.com/1200x320');max-height: 320px;"></div>

    <div class="section-box section-text">
        <p class="mb-3">
            각종 암을 조기에 진단하여 전문적이고 체계적인 진료 (항암·방사선요법)와 종합적인 관리를 위해 혈액종양내과와 소아청소년과, 방사선종양학과
            를 중심으로 진료 각과와의 협진체계를 갖추어 양질의 의료서비스를 제공하고 있습니다.
        </p>
    </div>

    <div class="section-box text-right">
        <a href="/center/specializedCenter" class="btn btn-lg btn-wide btn-outline-light text-gray--dark border">전체 전문센터</a>
    </div>

</div>
<?php echo $this->endSection(); ?>
