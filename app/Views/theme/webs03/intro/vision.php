<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-vision');
$this->setVar('heroTitle', '미션 및 비전');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-vision.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<article class="container section">

    미션 및 비전 페이지입니다.

</article>
<?php echo $this->endSection(); ?>
