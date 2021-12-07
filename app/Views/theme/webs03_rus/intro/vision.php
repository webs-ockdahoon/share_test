<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-vision');
$this->setVar('heroTitle', 'Миссия и видение');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-vision.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<div class="content-bg">
    <div class="mission-wrap">
        <h3 class="section-title white">Mission</h3>
        <p class="mission-text">
            Вклад в жизнь людей через служение, доверие, заботу о человеке.</br>
            Предоставление медицинских услуг высокого уровня
        </p>
    </div>
</div>

<article class="container section">
    <div class="section-header">
        <h3 class="section-title">Vision 2040</h3>
    </div>

    <div class="section-body section-text text-muted">
        <p class="text-title">
            Лечение, основанное на доверие и будущем наших пациентов
        </p>
        <div class="mission-line"></div>
        <p>
            <span>T</span>reatment, <span>R</span>esearch, <span>U</span>s, <span>S</span>afety, <span>T</span>echnology<br>
            Наша больница,включая всех сотрудников, обязуется выполнять роль партнера,который будет вести вас в будущее, основанном на взаимном доверии.
        </p>

        <div class="section-card">
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon01.png);"></div>
                <h5>Специализировання диагностика и лечение(T)</h5>
                <p>больница,где на высшем уровне оказывают квалифицированную помощь и лечение тяжелобольных пациентов.</p>
            </div>
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon02.png);"></div>
                <h5>Исследования(R)</h5>
                <p>инновационные исследования,поддержка талантливых врачей,все это помогает помочь в борьбе с болезнями.</p>
            </div>
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon03.png);"></div>
                <h5>Общение и гармония(U)</h5>
                <p>создание заботливой культурной среды общения между пациентами и местным сообществом.</p>
            </div>
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon04.png);"></div>
                <h5>Безопасность(S)</h5>
                <p>наша больница соблюдает безопасность наших пациентов и сотрудников.</p>
            </div>
            <div class="card-box">
                <div class="card-icon" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/vision-icon05.png);"></div>
                <h5>Передовое медицинское лечение(T)</h5>
                <p>лечение,основанное на передовых методах лечения и новейших достижениях медицины.</p>
            </div>
        </div>
    </div>

</article>
<?php echo $this->endSection(); ?>
