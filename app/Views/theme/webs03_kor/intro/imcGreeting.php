<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-imc-greeting');
$this->setVar('heroTitle', '국제진료센터 소개');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-imc-greeting.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="content-bg"></div>

    <article class="container section">

        <div class="section-header">
            <h3 class="section-title">
                2009년 개원한 동아대학교 국제진료센터는 <br class="d-none d-lg-block">
                지난 3년간 7000여명의 외국인환자를 유치했습니다.
            </h3>
        </div>

        <div class="section-body section-text text-muted">
            <p>
                다국어 코디네이터가 언어적 지원뿐만 아니라 행정적 업무 및 의료관광을 위한 서비스 등을 제공해 환자들에게 두터운 신뢰를 주고 있습니다. 또한, 외국인 환자의 문화적,
                종교적, 언어적 특성을 고려해 진료 및 케어에 힘쓰며, 다양한 편의시설 및 외국인 전용 식단으로 보다 쾌적한 환경에서 최상의 진료를 받을 수 있도록 지원하고 있습니다.
            </p>

            <p>
                동아대학교병원은 외래진료, 입원, 응급진료의 전 과정에 있어 보다 편안한 의료 서비스를 위해 필요한 최선의 지원을 하여 외국인 환자들이 차질 없이 양질의 의료를
                받을 수 있도록 지원하고 있습니다.
            </p>
        </div>

    </article>
<?php echo $this->endSection(); ?>