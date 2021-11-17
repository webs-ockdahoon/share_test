<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--board');
$this->setVar('heroTitle', '게시판');
$this->setVar('heroText', NULL);
?>

<?php echo $this->section('content'); ?>
    <div class="container">
        <a href="/template/board/basic">기본 게시판</a>
        <a href="/template/board/gallery">갤러리 게시판</a>
        <a href="/template/board/faq">FAQ 게시판</a>
    </div>
<?php echo $this->endSection(); ?>
