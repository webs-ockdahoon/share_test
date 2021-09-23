<!DOCTYPE html>
<html lang="ko">
    <head>
        <?php echo $header?>
        <?php echo $this->renderSection('appendHead'); ?>
    </head>

    <body class="default-layout page">
        <a class="sr-only sr-only-focusable" href="#content">본문 바로가기</a>

        <?php echo $this->include($THEME_URL.'/_includes/defaultPageHeader'); ?>

        <div id="content" class="page-content">
            <?php echo $this->renderSection('content'); ?>
        </div>

        <?php echo $this->include($THEME_URL.'/_includes/defaultPageFooter'); ?>
        
        <?php /* 페이지 렌더링 속도 개선을 위해 스크립트 파일은 하단에 배치 */ ?>
        <script src="/assets/plugins/jquery/jquery-3.6.0.min.js"></script>
        <script src="/assets/plugins/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo $THEME_URL; ?>/script/common.js"></script>
        <script src="<?php echo $THEME_URL; ?>/script/default-page-header.js"></script>
        <script src="<?php echo $THEME_URL; ?>/script/default-page-footer.js"></script>

        <?php echo $this->include($THEME_URL.'/_includes/pageSearchModal'); ?>

        <?php echo $this->renderSection('appendBody'); ?>
    </body>
</html>

