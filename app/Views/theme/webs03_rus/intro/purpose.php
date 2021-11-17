<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-purpose');
$this->setVar('heroTitle', 'Оснвополагающие цели');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-purpose.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<article class="container section">

    <div class="purpose-card">
        <div class="purpose-card-box">
            <div class="card-img" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/purpose-img01.png);"></div>
            <h3>01</h3>
            <p>교육병원으로서 고도의 임상의학 연구로<br>의학 발전의 창조적 역할 수행 </p>
        </div>
        <div class="purpose-card-box">
            <div class="card-img" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/purpose-img02.png);"></div>
            <h3>02</h3>
            <p>의대생의 임상교육과 전공의 수련</p>
        </div>
    </div>
    <div class="purpose-card">
        <div class="purpose-card-box">
            <div class="card-img" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/purpose-img03.png);"></div>
            <h3>03</h3>
            <p>진료권 내 지역민에 대한 보건 의료 수요에 부응하여 양질의 <br>의료서비스 제공으로 봉사와 인간애의 실현</p>
        </div>
        <div class="purpose-card-box">
            <div class="card-img" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/purpose-img04.png);"></div>
            <h3>04</h3>
            <p>의료사회인력의 교육훈련</p>
        </div>
    </div>

</article>
<?php echo $this->endSection(); ?>
