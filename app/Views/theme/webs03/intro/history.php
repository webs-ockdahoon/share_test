<?php echo $this->extend($THEME_URL.'/layout/defaultSubLayout'); ?>

<?php
$this->setVar('bodyClassName', 'page--intro page--intro-history');
$this->setVar('heroTitle', '병원 연혁');
?>

<?php echo $this->section('appendHead'); ?>
<link rel="stylesheet" href="<?php echo $THEME_URL ?>/css/pages/intro-history.css">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<article class="container section">


    <div class="container section mt-0 section-text text-muted">
        <div class="section-divider">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs--v1 nav-tabs--v1-secondary justify-content-center text-center" id="convenienceTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="history01-tab" data-toggle="tab" href="#history01" role="tab" aria-controls="history01" aria-selected="true">
                        현재~2000
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="history02-tab" data-toggle="tab" href="#history02" role="tab" aria-controls="history02" aria-selected="false">
                        1999~1990
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="history03-tab" data-toggle="tab" href="#history03" role="tab" aria-controls="history03" aria-selected="false">
                        1989~1985
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="history01" role="tabpanel" aria-labelledby="history01-tab">
                <h3 class="sr-only">현재~2000</h3>

                    <div class="section-body section-text text-muted">
                        <img src="<?php echo $THEME_URL ?>/images/intro/intro-history(1).jpg" title="">
                    </div>
                </section>
            </div>

            <div class="tab-pane active" id="history02" role="tabpanel" aria-labelledby="history02-tab">
                <h3 class="sr-only">현재~2000</h3>

                <div class="section-body section-text text-muted">
                    <img src="<?php echo $THEME_URL ?>/images/intro/intro-history(2).jpg" title="">
                </div>
                </section>
            </div>

            <div class="tab-pane active" id="history03" role="tabpanel" aria-labelledby="history03-tab">
                <h3 class="sr-only">현재~2000</h3>

                <div class="section-body section-text text-muted">
                    <img src="<?php echo $THEME_URL ?>/images/intro/intro-history(3).jpg" title="">
                </div>
                </section>
            </div>
        </div>

</article>
<?php echo $this->endSection(); ?>
