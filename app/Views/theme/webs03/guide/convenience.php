<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
    $this->setVar('bodyClassName', 'page--guide page--guide-convenience');
    $this->setVar('heroTitle', '편의시설 안내');
?>

<?php echo $this->section('appendHead'); ?>
    <link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/guide-convenience.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
    
<?php echo $this->endSection(); ?>
