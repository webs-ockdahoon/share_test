<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--medical page--medical-doctor');
    $this->setVar('heroTitle', '의료진 소개');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/medical-doctor.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    <section class="container section">
        의료진 소개 페이지
    </section>
<?php echo $this->endSection(); ?>
