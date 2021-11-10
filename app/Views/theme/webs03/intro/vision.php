<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-vision');
$this->setVar('heroTitle', '미션 및 비전');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-vision.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<div class="content-bg">
    <div class="mission-wrap">
        <h3 class="section-title white">Mission</h3>
        <p class="mission-text">
            <span>신뢰·봉사·인간애</span>의 정신으로</br>
            최고의 의료서비스를 제공하여 인류의 건강한 삶에 기여한다.
        </p>
    </div>
</div>

<article class="container section">
    <div class="section-header">
        <h3 class="section-title">Vision 2040</h3>
    </div>

    <div class="section-body section-text text-muted">
        <p class="text-title">
            고객의 미래를 약속하는 <span>TRUST</span> 의료
        </p>
        <div class="mission-line"></div>
        <p>
            <span>T</span>reatment, <span>R</span>esearch, <span>U</span>s, <span>S</span>afety, <span>T</span>echnology<br>
            환자와 교직원 모두가 신뢰를 바탕으로 믿을 수 있는 미래 동반자의 역할을 수행하는 대학병원
        </p>

        <div class="section-card">
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon01.png);"></div>
                <h5>전문진료(T)</h5>
                <p>특성화된 전문진료를 바탕으로 중증, 응급환자 치료 잘하는 대학병원</p>
            </div>
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon02.png);"></div>
                <h5>교육연구(R)</h5>
                <p>혁신적인 교육으로 인재양성, 끊임없는 연구로 질병 정복</p>
            </div>
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon03.png);"></div>
                <h5>소통화합(U)</h5>
                <p>환자, 지역사회와 구성원이 소통과 화합을 이루어내는 배려문화 정착</p>
            </div>
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon04.png);"></div>
                <h5>안전확립(S)</h5>
                <p>환자와 교직원 모두가 안전한 대학병원</p>
            </div>
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon05.png);"></div>
                <h5>첨단의료(T)</h5>
                <p>첨단의료를 선도하는 초일류 대학병원 </p>
            </div>
        </div>
    </div>

</article>
<?php echo $this->endSection(); ?>
