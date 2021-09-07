<!DOCTYPE html>
<html lang="ko">
    <head>
        <?php echo $header?>
        <?php echo $this->renderSection('appendHead'); ?>
    </head>

    <body class="page">
        <a class="sr-only sr-only-focusable" href="#content">본문 바로가기</a>

        <header class="page-header">
            header
        </header>

        <div id="content" class="page-content">
            <?php echo $this->renderSection('content'); ?>
        </div>
        
        <footer class="page-footer">
            page footer
        </footer>

        <?php echo $this->renderSection('appendBody'); ?>
    </body>
</html>

