<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--search');
$this->setVar('heroTitle', '개인정보 취급방침');
?>

<?php echo $this->section('appendHead'); ?>

<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

    <div class="container section mt-0 section-text text-muted">
        <?php echo $terms_content?>
    </div>

<?php echo $this->endSection(); ?>
