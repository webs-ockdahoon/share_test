<!DOCTYPE html>
<html lang="ko">
    <head>
    <?php echo $header?>
    </head>

    <body class="page">

        <main id="content" class="page-content">
            <?php foreach($views as $v){
                echo $v;
            }?>
        </main>

    </body>
</html>