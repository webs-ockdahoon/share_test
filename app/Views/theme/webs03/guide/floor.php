<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--guide-floor');
$this->setVar('heroTitle', '층별 안내');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/guide-floor.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<article class="container section">

    층별 안내 페이지입니다.

</article>
<?php echo $this->endSection(); ?>
