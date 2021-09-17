<?php echo $this->extend($THEME_URL.'/layout/defaultLayout'); ?>

<?php echo $this->section('content'); ?>

<main class="container">
    <h2>메인 페이지 내용 입니다.</h2>
    
    <a href="/template/sub">서브 페이지 템플릿 보기</a>
</main>

<?php echo $this->endSection(); ?>
