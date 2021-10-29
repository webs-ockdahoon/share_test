<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-department-info');
    $this->setVar('heroTitle', '이비인후과');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-department-info.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <section class="container section">
        진료과 소개 페이지
    </section>
<?php echo $this->endSection(); ?>
