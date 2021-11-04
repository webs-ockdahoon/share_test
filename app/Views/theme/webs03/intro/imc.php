<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-imc');
$this->setVar('heroTitle', '국제진료센터 소개');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-imc.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<article class="container section">

    국제진료센터 소개 페이지입니다.

</article>
<?php echo $this->endSection(); ?>
