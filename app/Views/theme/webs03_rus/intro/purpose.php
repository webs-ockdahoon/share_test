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
            <p>Проведение клинических исследований высокого уровня для успешного развития медицины </p>
        </div>
        <div class="purpose-card-box">
            <div class="card-img" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/purpose-img02.png);"></div>
            <h3>02</h3>
            <p>Клиническая подготовка и обучение студентов медицинских ВУЗов</p>
        </div>
    </div>
    <div class="purpose-card">
        <div class="purpose-card-box">
            <div class="card-img" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/purpose-img03.png);"></div>
            <h3>03</h3>
            <p>Постоянные научные исследования и внедрение инновационных методов лечения</p>
        </div>
        <div class="purpose-card-box">
            <div class="card-img" style="background-image: url(<?php echo $THEME_URL; ?>/images/intro/purpose-img04.png);"></div>
            <h3>04</h3>
            <p>Обучение и подготовка медицинских работников</p>
        </div>
    </div>

</article>
<?php echo $this->endSection(); ?>
