<!DOCTYPE html>
    <html lang="ko">
    <head>
        <?php echo $header?>
        <?php echo $this->renderSection('appendHead'); ?>
    </head>

    <body class="sub-layout page">
        <a class="sr-only sr-only-focusable" href="#content">본문 바로가기</a>

        <?php echo $this->include($THEME_URL.'/_includes/defaultPageHeader'); ?>

        <nav class="page-breadcrumb page-breadcrumb--responsive">
            <div class="container container-lg">
                <ol class="page-breadcrumb__list">
                    <li>
                        <a href="/template" class="btn btn-icon page-breadcrumb__link-home" title="홈으로 이동하기">
                            <span class="material-icons-round">home</span>
                        </a>
                    </li>

                    <li>
                        <a href="/template/sub" class="page-breadcrumb__link">Depth 1</a>
                    </li>

                    <li class="dropdown">
                        <a href="/template/sub" role="button" id="subDepth2" class="page-breadcrumb__toggler" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Depth 2 <span class="icon icon-xs icon-toggle"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="subDepth2">
                            <a class="dropdown-item" href="#">Depth 2 - menu 1</a>
                            <a class="dropdown-item" href="#">Depth 2 - menu 2</a>
                            <a class="dropdown-item" href="#">Depth 2 - menu 3</a>
                        </div>
                    </li>

                    <li class="dropdown is-current">
                        <a href="/template/sub" role="button" id="subDepth3" class="page-breadcrumb__toggler" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Depth 3 <span class="icon icon-xs icon-toggle"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="subDepth3">
                            <a class="dropdown-item" href="#">Depth 3 - menu 1</a>
                            <a class="dropdown-item" href="#">Depth 3 - menu 2</a>
                            <a class="dropdown-item" href="#">Depth 3 - menu 3</a>
                        </div>
                    </li>
                </ol>
            </div>
        </nav>

        <main id="content" class="page-content">
            <?php echo $this->renderSection('hero-header'); ?>
            <?php echo $this->renderSection('content'); ?>
        </main>

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
