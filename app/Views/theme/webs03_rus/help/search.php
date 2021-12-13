<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--search');
$this->setVar('heroTitle', '검색결과');
?>

<?php echo $this->section('appendHead'); ?>

<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

    <div class="container section mt-0 section-text text-muted">
        검색결과
    </div>

<?php echo $this->endSection(); ?>
