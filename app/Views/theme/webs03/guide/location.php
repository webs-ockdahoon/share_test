<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--guide page--guide-location');
    $this->setVar('heroTitle', '주차 및 오시는 길');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/guide-location.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <div class="container section">
        지도 이미지
    </div>

    <section class="container section">
        <div class="section-header">
            <h3 class="section-title">지하철</h3>
        </div>
        <div class="section-body section-text">
            내용 입력
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <h3 class="section-title">버스</h3>
        </div>
        <div class="section-body section-text">
            내용 입력
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <h3 class="section-title">순환버스</h3>
        </div>
        <div class="section-body section-text">
            내용 입력
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <h3 class="section-title">택시</h3>
        </div>
        <div class="section-body section-text">
            내용 입력
        </div>
    </section>

    <section class="container section">
        <div class="section-header">
            <h3 class="section-title">타지역</h3>
        </div>
        <div class="section-body section-text">
            내용 입력
        </div>
    </section>
<?php echo $this->endSection(); ?>
