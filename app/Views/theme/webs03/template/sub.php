<?php echo $this->extend($THEME_URL.'/layout/subLayout'); ?>

<?php echo $this->section('content'); ?>
<div class="container">
    <h2>서브 페이지 내용 입니다.</h2>

    <a href="/template">메인 페이지 템플릿 보기</a>
</div>
<?php echo $this->endSection(); ?>
